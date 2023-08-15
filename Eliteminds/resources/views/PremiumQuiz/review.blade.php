    @extends('layouts.layoutV2')

@section('head')
    <link rel="stylesheet" href="{{asset('helper/css/quiz.css')}}">
    <link rel="stylesheet" href="{{asset('helper/css/quizV2.css')}}">
<style>
    /* .fa-star {
        font-size: 120px;
        color: black;
    }
    .checked ,.fa-star:hover{
        color: orange;
    } */
    .radio {
        display: block;
    }
.rate {
    display: flex;
    justify-content: center;
    flex-direction: row-reverse;
    
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:120px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
    
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


    .radio {
        display: block;
        min-width: 100%;
        margin: 5px 0;
        border-radius: 9px !important;
        border: 1px solid rgb(204, 204, 204);
        min-height: 40px;
        padding: 12px 0 10px 20px;
        margin-bottom: 10px;
    }

    .active-outline {
        box-shadow: inset 0 0 0 1px white !important;
        background-color: var(--foreground);
        color: var(--primary) !important;
    }
    input[type='checkbox']:hover + .active-outline {
        box-shadow: inset 0 0 0 1px var(--primary) !important;
    }
    input[type='checkbox']:disabled + .active-outline {
        box-shadow: inset 0 0 0 1px white !important;
    }
    .nav-tabs-line-title > li > .nav-link.active:after {
        bottom: -20px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" id="app-1">
   

    <div class="ps-2"  id="qReview"> 
        <h2 style="font-weight: 700;font-size: 32px; ">
            Name of the certificate
            </h2>
            @php
                $attempt = count(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get());
            @endphp
        <select class=" form-select" style="width:max-content; margin-top:20px; cursor:pointer;" name="section_id" id="section_id" onchange="func11()" >
            
            <!--@foreach($exams as $ex)-->
            <!--<option value="{{ $ex->id }}">PMI-ACP Exam 01: 100 Questions</option>-->
            <!--@endforeach-->
            
            @foreach(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get() as $quiz_z)
                <option value="{{ $quiz_z->id }}" @if($quiz_z->id == request()->id) selected @endif>
                    @if($quiz_z->topic_type == 'chapter')
                        {{Transcode::evaluate(\App\Chapters::find($quiz_z->topic_id))['name'] }}
                    @elseif($quiz_z->topic_type == 'process')
                        {{Transcode::evaluate(\App\Process_group::find($quiz_z->topic_id))['name']}} {{ $quiz_z->part_id ? '[Part '.$quiz_z->part_id.']': '' }}
                    @elseif($quiz_z->topic_type == 'mistake')
                        @if($quiz_z->topic_id == 1)
                            {{__('User/quizHistory.chapters-mistakes')}}
                        @elseif($quiz_z->topic_id == 2)
                            {{__('User/quizHistory.processes-mistakes')}}
                        @elseif($quiz_z->topic_id == 3)
                            {{__('User/quizHistory.exam-mistakes')}}
                        @endif
                    @else
                        {{Transcode::evaluate(\App\Exam::find($quiz_z->topic_id))['name']}}
                    @endif
                </option>
            @endforeach
        </select>    
    </div>

    <div class="ps-2" id="sReview" style="display:none">
        <h2 style="font-weight: 700;font-size: 32px;margin-bottom:30px">
                {{__('User/quiz.your-score')}}: @{{overallScore}}%
        </h2>
        <div class="row my-1" style="font-style: normal;!importantfont-weight: 600 !important;font-size: 16px;!important">
            <p v-html="ScoreMsg"></p>
        </div>
    </div>


    <br>
    <hr>
    <br>
        <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" id="lineTitleTabsContainer" role="tablist" 
        style="background: var(--bg-primary) !important;border-radius: 18px 18px 0px 0px;   position: relative; z-index:5;">
            <li class="nav-item" role="presentation" onclick="toggleTab(1)">
                <a class="nav-link active" data-bs-toggle="tab" href="#firstLineTitleTab" role="tab" aria-selected="true">Quiz Question Review</a>
            </li>
            <li class="nav-item" role="presentation" onclick="toggleTab(2)">
                <a class="nav-link" data-bs-toggle="tab" href="#secondLineTitleTab" role="tab" aria-selected="false">Score Review</a>
            </li>
        </ul>
        <div class="card mb-5" style="margin-top: -11px;border-top: 1px solid #959798 !important;">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="firstLineTitleTab" role="tabpanel">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-12 form-1" id="quiz_app_container" style="">

                                    <div id="loading1" style="margin:auto">
                                        <span uk-spinner="ratio: 4.5"></span>
                                    </div>
                                    <div id="quiz"  style="display:none; background-size:cover; background-position: center;">
                                        <div class="row">
                                            <div class="col-md-9 mb-3">
                                                <div class="d-flex align-items-center gap-2" style="font-size:16px;padding-left:23px">
                                                   Question 
                                                    <select class="uk-input form-select" style="width:85px; margin:0; padding-left:15px" v-on:change="push_question(current_question_number)" v-model="current_question_number" >
                                                        <option  v-for="(i ,index) in questions " > @{{  index + 1 }}</option>
                                                    </select>
                                                    <span>
                                                        of @{{ questions.length }}
                                                    </span>

                                                    <div class="question-flag " v-if="current_question_flag">
                                                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 14C1 14 2 13 5 13C8 13 10 15 13 15C16 15 17 14 17 14V2C17 2 16 3 13 3C10 3 8 1 5 1C2 1 1 2 1 2V21" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-3 ">
                                                <select  v-model="answers_filter" class="uk-input form-select" style="width:100%; margin:0;" v-on:change="toggleFilter" id = "toggle_answers" style="font-size:16px;">
                                                    <option value="3">{{__('User/quiz.all')}}</option>
                                                    <option value="0">{{__('User/quiz.incorrect')}}</option>
                                                    <option value="1">{{__('User/quiz.correct')}}</option>
                                                    <option value="2">{{__('User/quiz.skipped')}}</option>
                                                    <option value="4">{{__('User/quiz.flaged')}}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="container primeQuizViewWM"   id="quiz" style="min-height: 50px; margin:20px 0; ">
                                       
                                        <!-- Question Body -->
                                           
                                            <div class="d-flex flex-row align-content-center align-items-center my-5">
                                                <div class="heading mb-0 " style="font-size:16px!important;" v-html="current_question_title"></div>
                                            </div>
                                            <div class="row" v-if="current_question_image">
                                                <div class="fig" id="fig" style="margin: 0 0 10px 50px;">
                                                    <img class="img-responsive" v-bind:src="current_question_image" width="550" alt="fig0-0">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex row g-4 align-content-center align-items-center">
                                                
                                                {{--  MultipleChoice  --}}
                                                <div class="question-item d-flex mr-5 col-12 col-lg-4 align-content-center align-items-center position-relative mb-3"
                                                    v-for="choice,idx in current_question_choices"
                                                    v-if="isMultipleChoice">
                                                    <div class="question-number  sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <input type="radio" class="btn-check" :value="choice.id" :id="'item_' +choice.id" v-model="multipleChoiceValue" disabled/>
                                                            <label
                                                                    class="question-icon  sw-4 sh-4 p-0 rounded-xl d-flex justify-content-center align-items-center stretched-link"
                                                                    :for="'item_' +choice.id"
                                                                    :style="[choice.id == user_answers[currentQuestionId].answers.filter(row => row.is_correct)[0].answer_id ? 
                                                                    {
                                                                    'box-shadow': '0px 3px 11px rgba(102, 245, 52, 0.6) !important',
                                                                    'background':' rgba(102, 245, 52, 0.2) !important',
                                                                    'color':'#66F534 !important'
                                                                    }
                                                                    :
                                                                      user_answers[currentQuestionId].answer && choice.id == user_answers[currentQuestionId].answer.answer_id 
                                                                    ?
                                                                     {
                                                                        'box-shadow': '0px 1px 0px rgba(44, 47, 50, 0.06) !important',
                                                                        'background':'#f58634',
                                                                        'color':'var(--text-reverse)'}
                                                                    : {}
                                                                    ]"
                                                            >
                                                               <span v-if="!(user_answers[currentQuestionId].answer && choice.id == user_answers[currentQuestionId].answer.answer_id)"
                                                               >@{{ alpha[idx] }}</span> 
                                                                <span v-if="user_answers[currentQuestionId].answer && choice.id == user_answers[currentQuestionId].answer.answer_id">X</span> 
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 ">
                                                        @{{  renderChoice(choice) }}
                                                    </div>
                                                </div>

                                                {{--  MultipleResponse  --}}
                                                <div class="question-item d-flex col-12 col-lg-4 align-content-center align-items-center position-relative mb-3"
                                                    v-for="choice,idx in current_question_choices"
                                                    v-if="isMultipleResponses">
                                                    <div class="question-number sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <input type="checkbox" class="btn-check"
                                                                :value="choice.id"
                                                                v-model="multipleChoiceValue"
                                                                :id="'item_' +choice.id"
                                                                :disabled="currentSelectedAnswersCount == current_question_correct_answers_required && !user_answers[choice.question_id].answers[choice.id].selected"/>
                                                            <label
                                                                    class="btn hover-outline btn-foreground  sw-4 sh-4 p-0 rounded-xl d-flex justify-content-center align-items-center stretched-link"
                                                                    :for="'item_' +choice.id"
                                                                    :style="[user_answers[currentQuestionId].answers.filter(row => row.is_correct && row.answer_id == choice.id).length ? {'box-shadow':'inset 0 0 0 1px green !important'}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'box-shadow':'inset 0 0 0 1px red !important'}: {}]"
                                                            >
                                                                @{{ alpha[idx] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-0 text-alternate ">
                                                        @{{renderChoice(choice)}}
                                                    </div>
                                                </div>
 

                                                {{--  FillInTheBlank  --}}
                                                <div v-if="isFillInTheBlank" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                                    <div v-for="choice in current_question_choices" class="radio" :style="[user_answers[currentQuestionId].answers.filter(row => row.is_correct && row.answer_id == choice.id).length ? {'border-color': 'green'}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'border-color': 'red'}: {}]">
                                                        <label style="display:flex; padding: 0 10px;">
                                                            @{{renderChoice(choice)}}
                                                            {{--                                                @{{language == 'ar' ? choice.transcodes.answer: choice.answer}}--}}
                                                        </label>
                                                    </div>
                                                </div>
                                                {{-- Matching To Right --}}
                                                <div v-if="isMatchingToRight" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                                    <div class="match-right">
                                                        <div class="right">
                                                            <h4>Correct Answers</h4>
                                                            <div v-for="draggable in user_answers[currentQuestionId].right" v-if="draggable" class="empty" :data-right-id="draggable.id" data-max="2">
                                                                <div class="m-2">
                                                                    @{{ renderDragRightChoice(draggable, 'right_sentence') }}
                                                                    {{--                                                        @{{ language == 'ar' ? draggable.transcodes.right_sentence: draggable.right_sentence }}--}}
                                                                </div>
                                                                <div class="fill" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragRightChoice(draggable, 'left_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? draggable.transcodes.left_sentence: draggable.left_sentence }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="right">
                                                            <h4>Your Answers</h4>
                                                            <div v-for="draggable in user_answers[currentQuestionId].right" v-if="draggable" class="empty" :data-right-id="draggable.id" data-max="2">
                                                                <div class="m-2">
                                                                    @{{ renderDragRightChoice(draggable, 'right_sentence') }}
                                                                    {{--                                                        @{{ language == 'ar' ? draggable.transcodes.right_sentence: draggable.right_sentence }}--}}
                                                                </div>
                                                                <div v-if="draggable.left" :data-left-id="draggable.left.id" class="fill" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragCenterChoice(draggable, 'left', 'left_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? draggable.left.transcodes.left_sentence: draggable.left.left_sentence }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Matching To Center --}}
                                                <div v-if="isMatchingToCenter" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                                    <div class="match-center">
                                                        <div v-for="question in user_answers[currentQuestionId].center" v-if="question" class="match-row">
                                                            <div class="empty" :data-accept-id="question.id" data-position="left">
                                                                <div class="fill" v-if="!question.left.selected" :data-id="question.id" data-position="left" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragCenterChoice(question, 'left', 'left_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? question.left.transcodes.left_sentence: question.left.left_sentence  }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="empty" id="center-item" data-max="2" :data-accept-id="question.id" data-position="center">
                                                                <div class="m-2">
                                                                    @{{ renderDragCenterChoice(question, 'center_sentence', null) }}
                                                                    {{--                                                        @{{ language == 'ar' ? question.transcodes.center_sentence: question.center_sentence  }}--}}
                                                                </div>
                                                                <div class="fill" v-if="question.left.selected" :data-id="question.id" data-position="left" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[question.left.left_sentence == question.correct_sentence ? {'border-color': 'green'}: {'border-color': 'red'}]">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragCenterChoice(question, 'left', 'left_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? question.left.transcodes.left_sentence: question.left.left_sentence  }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="fill" v-if="question.right.selected" :data-id="question.id" data-position="right" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[question.right.right_sentence == question.correct_sentence ? {'border-color': 'green'}: {'border-color': 'red'}]">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragCenterChoice(question, 'right', 'right_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? question.right.transcodes.right_sentence: question.right.right_sentence  }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="empty" :data-accept-id="question.id" data-position="right">
                                                                <div class="fill" v-if="!question.right.selected" :data-id="question.id" data-position="right" draggable="true">
                                                                    <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                                        <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                            @{{ renderDragCenterChoice(question, 'right', 'right_sentence') }}
                                                                            {{--                                                                @{{ language == 'ar' ? question.right.transcodes.right_sentence: question.right.right_sentence  }}--}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-row align-items-center gap-3 py-4 ">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 1L1 13M1 1L13 13" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg> 
                                                <span class="text-bold Roboto">Unfortunately your answer is incorrect</span>
                                            </div>
                                           <hr>

                                            <div class="row py-4">
                                                <div class="container-fluid">
                                                    <p>
                                                        <b class="d-flex align-items-center gap-2 text-bold">
                                                        <svg  width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11 7V11M11 15H11.01M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>    
                                                        {{__('User/quiz.explanation')}}</b> <br>
                                                        <b v-html="current_question_feedback"></b>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="nav-next-prev">
                                                <div class="col-md-2 {{app()->getLocale() == 'ar' ? 'offset-md-8': ''}}" style="  min-height: 30px; font-size: 18px;">
                                                    <a id="prev" v-on:click="prev">
                                                        <b>  <i class="fa fa-angle-{{app()->getLocale() == 'ar' ? 'right': 'left'}}" style="font-weight: bold; font-size: 21px; padding-right:2px;"></i> </b>
                                                    </a>
                                                </div>


                                                <div class="col-md-2 {{app()->getLocale() == 'ar' ? '':'offset-md-8'}}" style="  min-height: 30px; text-align: right; font-size: 18px;margin-bottom: 15px;">
                                                    <a id="next" v-on:click="next">
                                                        <b>  <i class="fa fa-angle-{{app()->getLocale() == 'ar' ? 'left': 'right'}}" style="font-weight: bold; font-size: 21px; padding-left:5px;"></i></b>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="secondLineTitleTab" role="tabpanel">
                            <div class="row score-review-icons">
                                <div class="col-12 col-lg-3 d-flex gap-4 justify-content-center ">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M58.3327 43.7502V19.8335C58.3327 14.933 58.3327 12.4828 57.3789 10.6111C56.5401 8.96465 55.2016 7.62608 53.5552 6.78719C51.6833 5.8335 49.2333 5.8335 44.3327 5.8335H25.666C20.7655 5.8335 18.3153 5.8335 16.4436 6.78719C14.7972 7.62608 13.4586 8.96465 12.6197 10.6111C11.666 12.4828 11.666 14.933 11.666 19.8335V50.1668C11.666 55.0674 11.666 57.5174 12.6197 59.3893C13.4586 61.0358 14.7972 62.3743 16.4436 63.2131C18.3153 64.1668 20.7655 64.1668 25.666 64.1668H40.8327M40.8327 32.0835H23.3327M29.166 43.7502H23.3327M46.666 20.4168H23.3327" stroke="#F58634" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.7 50.5C11.7 55.3496 11.3008 57.6199 12.2613 59.4722C13.1062 61.1015 14.4542 62.4262 16.1124 63.2564C17.9977 64.2002 20.4652 64.2002 25.4008 64.2002L44.2008 64.2002C49.1362 64.2002 51.604 64.2002 53.4891 63.2564C55.1473 62.4262 56.4954 61.1015 57.3403 59.4722C58.3008 57.6199 58.3008 55.1951 58.3008 50.3455L58.3008 20.327" stroke="#F58634" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h2>Chapter</h2>
                                        <p id="chapterTopic">{{ $topic }}</p>
                                    </div>
                                </div>
                                    <div class="col-12 col-lg-3 d-flex gap-4 justify-content-center ">
                                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M58.3327 27.7085V19.8335C58.3327 14.933 58.3327 12.4828 57.3789 10.6111C56.5401 8.96465 55.2016 7.62608 53.5552 6.78719C51.6833 5.8335 49.2333 5.8335 44.3327 5.8335H25.666C20.7655 5.8335 18.3153 5.8335 16.4436 6.78719C14.7972 7.62608 13.4586 8.96465 12.6197 10.6111C11.666 12.4828 11.666 14.933 11.666 19.8335V50.1668C11.666 55.0674 11.666 57.5174 12.6197 59.3893C13.4586 61.0358 14.7972 62.3743 16.4436 63.2131C18.3153 64.1668 20.7655 64.1668 25.666 64.1668H40.8327M40.8327 32.0835H23.3327M29.166 43.7502H23.3327M46.666 20.4168H23.3327M48.1243 43.7566C48.6383 42.2959 49.6527 41.0639 50.9876 40.2793C52.3229 39.4945 53.8926 39.2077 55.4189 39.4697C56.9452 39.7313 58.3298 40.5249 59.327 41.7097C60.3245 42.8944 60.8702 44.3939 60.8678 45.9426C60.8678 50.3144 54.3103 52.5002 54.3103 52.5002M54.3949 61.2502H54.4241" stroke="#F58634" stroke-width="4"             stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h2>Number of questions</h2>
                                        <p>@{{ questions.length }}</p>
                                    </div>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex gap-4 justify-content-center">
                                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M58.3327 36.4585V19.8335C58.3327 14.933 58.3327 12.4828 57.3789 10.6111C56.5401 8.96465 55.2016 7.62608 53.5552 6.78719C51.6833 5.8335 49.2333 5.8335 44.3327 5.8335H25.666C20.7655 5.8335 18.3153 5.8335 16.4436 6.78719C14.7972 7.62608 13.4586 8.96465 12.6197 10.6111C11.666 12.4828 11.666 14.933 11.666 19.8335V50.1668C11.666 55.0674 11.666 57.5174 12.6197 59.3893C13.4586 61.0358 14.7972 62.3742 16.4436 63.2131C18.3153 64.1668 20.7655 64.1668 25.666 64.1668H34.9993M40.8327 32.0835H23.3327M29.166 43.7502H23.3327M46.666 20.4168H23.3327M42.291 55.4168L48.1243 61.2502L61.2493 48.1252" stroke="#F58634" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg> 
                                        <div>
                                            <h2>Correct answers</h2>
                                            <p> @{{ user_answers?.filter(ele => ele.user_answer_is_correct).length }} </p>
                                        </div>
                                        </div>
                                    <div class="col-12 col-lg-3 d-flex gap-4 justify-content-center">
                                        <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M58.3327 36.4585V19.8335C58.3327 14.933 58.3327 12.4828 57.3789 10.6111C56.5401 8.96465 55.2016 7.62608 53.5552 6.78719C51.6833 5.8335 49.2333 5.8335 44.3327 5.8335H25.666C20.7655 5.8335 18.3153 5.8335 16.4436 6.78719C14.7972 7.62608 13.4586 8.96465 12.6197 10.6111C11.666 12.4828 11.666 14.933 11.666 19.8335V50.1668C11.666 55.0674 11.666 57.5174 12.6197 59.3893C13.4586 61.0358 14.7972 62.3743 16.4436 63.2131C18.3153 64.1668 20.7655 64.1668 25.666 64.1668H34.9993M40.8327 32.0835H23.3327M29.166 43.7502H23.3327M46.666 20.4168H23.3327M45.5 61L57.5 45.5M59.4708 58.5H59.5M43.9708 47.5H44" stroke="#F58634" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div>
                                            <h2>Correct in percentage</h2>
                                            <p>@{{ overallScore }}%</p>
                                        </div>
                                        </div>
                                </div>
                                <hr>
                            <div id="menu1">
                                <!-- <center>
                                    <h3>{{__('User/quiz.score-analysis')}}</h3>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            {{--                                                    @if($quiz)--}}
                                            {{--                                                        <a class="btn btn-primary" v-if="!cx_quiz" style="color:white;" href="{{route('QuizHistory.show', $quiz->id)}}">{{__('User/quiz.review')}} </a>--}}
                                            {{--                                                    @else--}}
                                            {{--                                                        <a class="btn btn-primary" style="color:white;" v-if="saved_quiz_id != 0 && !cx_quiz" v-on:click = "showReview">{{__('User/quiz.review')}}</a>--}}
                                            {{--                                                    @endif--}}
                                        </div>
                                    </div>
                                </center> -->
                               
                                <!-- <h3 style="color:#5bbae3; text-decoration:underline;" >
                                    Results By Chapter
                                </h3>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <th>Chapter</th>
                                    <th>{{__('User/quiz.no-questions')}}</th>
                                    <th>{{__('User/quiz.correct-answers')}}</th>
                                    <th>%{{__('User/quiz.correct')}}</th>
                                    </thead>
                                    <tbody id="resultByChapter">
                                    </tbody>
                                </table> -->
                                <br>
                                <!-- <h3 style="color:#5bbae3; text-decoration:underline;" >
                                    Results By Question
                                </h3> -->
                                <table class="table table-borderles table-hover">
                                    <thead style="font-weight: 600;font-size: 16px;">
                                    <th style="width:30%">{{__('User/quiz.question-no')}}</th>
                                    <th>Chapter</th>
                                    <th>Flaged</th>
                                    <th>{{__('User/quiz.score')}}</th>
                                    </thead>
                                    <tbody id="resultByProcess">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jscode')
    <script type="text/javascript">
        $(document).ready(function(){
            document.addEventListener('contextmenu', event => event.preventDefault());

            $(window).keyup(function(e){
                if(e.keyCode == 44){
                    $(".page-content").hide();
                    $(".prsc-msg").show();


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax ({
                        type: 'GET',
                        url: '{{ route('ScreenShot') }}',
                        success: function(res){

                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });

                }
            });
            // app.markExam();
        });
        
        function func11()
        {
            var input = document.getElementById("section_id");
            console.log(input.value);
            var inputvalue = input.value;
            window.location.href = 'https://demo.eliteminds.co/QuizHistory/review/'+inputvalue;
        }
    </script>
    
    
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="{{asset('helper/js/jQuery.tagify.min.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif

    <script>
        quizHistoryAttr = {
            language: '{{\Session('locale')}}',
            quiz_id: '{{$quiz->id}}',
            base_url: '{{url('')}}',
            api: {
                csrf: '{{csrf_token()}}',
                quizHistory : '{{route('QuizHistory.load')}}',
                quizHistoryFeedback: '{{route('QuizHistory.score.feedback')}}',
            },
            translation: {
                overallPerformance  : '{{__('User/quiz.overall-performance')}}',
                passed              : '{{__('User/quiz.passed')}}',
                failed              : '{{__('User/quiz.failed')}}',
                needImprove         : '{{__('User/quiz.need-improve')}}',
                belowTarget         : '{{__('User/quiz.below-target')}}',
                target              : '{{__('User/quiz.target')}}',
                aboveTarget         : '{{__('User/quiz.above-target')}}',
            },
        };
    </script>
    <!-- This is script to change the top content based on the opend tab (quiz question review, score review) -->
    
    <script src="{{asset('helper/js/quizHistory-V0.2.js')}}"></script>

    <script>
        let topContent1 = document.getElementById("qReview");
        let topContent2 = document.getElementById("sReview");

        let chapterTopic = document.getElementById("chapterTopic")
        function toggleTab(tabNum){
          if(tabNum === 1){
            topContent1.style.display= "block";
            topContent2.style.display= "none";
          }else if(tabNum === 2){
            topContent1.style.display= "none";
            topContent2.style.display= "block";
          }
        }
        onload =(event)=>{
            let newName = chapterTopic.textContent.split("Exam");
            chapterTopic.textContent = newName[0];
        }

    </script>

@endsection


