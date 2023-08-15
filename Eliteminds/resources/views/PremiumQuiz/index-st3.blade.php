@extends('layouts.layoutV2')

@section('head')
    <link rel="stylesheet" href="{{asset('helper/css/tagify.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('helper/css/quiz.css')}}">
    <style>
        .main-text{
            color: var(--text-primary) !important;
        }
        .accent-text{
            color: var(--text-accent) !important;
        }
        .prim-btn{
            background-color:var(--text-accent);
        }
        .sec-btn{
            background-color:transparent;
            border:1px solid var(--text-accent);
            color:var(--text-accent) !important;
        }
        .sec-btn:hover{
            background-color:transparent;
            border:1px solid var(--text-accent);
            color:var(--text-accent) !important;
        }
        textarea.form-control{
            resize:vertical;
        }
        textarea.form-control:focus{
            outline: none;
            border-color:var(--text-accent);
        }
        textarea{
            color: var(--text-primary)
        }
        iframe {
            width: 100% !important;
        }
        @media only screen and (min-width: 320px) {
          iframe {
            height: 150px !important;
          }
        }
        
        @media only screen and (min-width: 768px) {
          iframe {
            height: 450px !important;
          }
        }
        
        @media only screen and (min-width: 1024px) {
          iframe {
            height: 550px !important;
          }
        }
        
        @media only screen and (min-width: 1200px) {
          iframe {
            height: 720px !important;
          }
        }
        
        .tagify__tag > div {
            height: unset !important;
        }
        /*input[type='checkbox'].btn-foreground.hover-outline:hover {}*/
        /*input[type='checkbox']:checked .btn-foreground.hover-outline {*/
        /*    background-color: var(--foreground);*/
        /*    color: var(--primary) !important;*/
        /*}*/

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


        /* Progress circle */
         /* circular progress bar */
         .progress-circle {
            width:42px;
            height:42px;
            margin-top: -5px;
            background: none;
            position: relative;
        }
        .progress-circle::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }
        .progress-circle>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }
        .progress-circle .progress-left {
            left: 0;
        }
        .progress-circle .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 3px;
            border-style: solid;
            border-color: var(--text-accent) !important;
            position: absolute;
            top: 0;
        }
        .progress-circle .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }
        .progress-circle .progress-right {
            right: 0;
        }
        .progress-circle .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }
        .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }
        .progress-circle {
            display: inline-block;
            /* margin-left: 20px;
            margin-right: 10px; */
        }
    </style>

    <link rel="stylesheet" href="{{asset('user-assets/css/video.css')}}" />
@endsection

@section('content')
    <div class="container d-flex flex-column" id="app-1">
        <!-- Title and Top Buttons Start -->
        <!--<div class="page-title-container ps-3 pt-5">-->

        <!--    @if($video)-->
        <!--    <div class="row my-1">-->
                <!-- Title Start -->
        <!--        <div class="col-12 col-sm-12">-->
        <!--            <h1 class="mb-0 pb-0 display-4 main-text" id="title">{{$video->title}}</h1>-->
        <!--        </div>-->
                <!-- Title End -->
        <!--    </div>-->
        <!--    @endif-->
        <!--    @if($explanation)-->
        <!--        <div class="row my-1">-->
                    <!-- Title Start -->
        <!--            <div class="col-12 col-sm-12">-->
        <!--                <h1 class="mb-0 pb-0 display-4 main-text" id="title">{{$explanation->title}}</h1>-->
        <!--            </div>-->
                    <!-- Title End -->
        <!--        </div>-->
        <!--    @endif-->
        <!--</div>-->
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
        <div class="row d-flex flex-grow-1 overflow-hidden pb-2 h-100">
            @if(!$video & !$explanation)
            <div class="col-12" v-if="!video_id">
                <div class="card mb-3">
                    <div class="card-body">

                        {{-- Quiz Init FOrm --}}
                        <form @submit.prevent="optimizeQuiz" id="optimizeForm"  style="display:block;">
                            <div class="optimization_form" style="padding-top: 16px; padding-left: 50px; width:100%; ">

                                <div>
                                    <div class="row g-3 mb-5 d-flex justify-content-center">
                                        <div class="col-12 col-lg-6 col-xxl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                        <span class="main-text">{{__('User/quiz.questions')}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 16 16" stroke="currentColor" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-star accent-text">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="text-medium text-muted mb-1">
                                                    </div>
                                                    <div class="cta-1 accent-text ">@{{max_questions_num}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xxl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                        <span class="main-text">{{__('User/quiz.score-required')}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diploma accent-text"><path d="M15 3.99999V3.99999C16.1046 3.99999 17 4.89542 17 5.99999L17 14.5C17 15.9044 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18L6.5 18C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9044 3 14.5L3 7.49999C3 6.09553 3 5.3933 3.33706 4.88886C3.48298 4.67047 3.67048 4.48297 3.88886 4.33706C4.39331 4 5.09554 4 6.5 4L9.5 3.99999"></path><path d="M14 6L14 13.3252C14 13.5663 14 13.6868 13.9433 13.7319C13.9196 13.7507 13.8908 13.7619 13.8606 13.764C13.7884 13.7691 13.7069 13.6803 13.544 13.5025L13.29 13.2255C12.7767 12.6655 12.5201 12.3856 12.2057 12.3195C12.0701 12.2909 11.9299 12.2909 11.7943 12.3195C11.4799 12.3856 11.2233 12.6655 10.71 13.2255L10.456 13.5025C10.2931 13.6803 10.2116 13.7691 10.1394 13.764C10.1092 13.7619 10.0804 13.7507 10.0567 13.7319C10 13.6868 10 13.5663 10 13.3252L10 6"></path><circle cx="12" cy="4" r="3"></circle><path d="M6 15H7M6 12H7M6 9H7"></path></svg>
                                                    </div>
                                                    <div class="text-medium text-muted mb-1">
                                                    </div>
                                                    <div class="cta-1 accent-text">75%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xxl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                        <span class="main-text">{{__('User/quiz.min')}}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-clock accent-text"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                                                    </div>
                                                    <div class="text-medium text-muted mb-1">
                                                    </div>
                                                    <div class="cta-1 accent-text">@{{Math.round(examTimeMin > 0 ? examTimeMin: max_questions_num*76.7/60)}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <h4 class="main-text">{{__('User/quiz.instructions')}}: </h4>
                                        <ul type="circle" class="main-text" style="overflow: auto; max-width: 800px; text-align: {{\Session('locale') == 'ar'? 'right': 'left'}};">
                                            <li>{{__('User/quiz.instructions-1')}}</li>
                                            <li>{{__('User/quiz.instructions-2')}}</li>
                                            <li>{{__('User/quiz.instructions-3')}}</li>
                                            <li>{{__('User/quiz.instructions-4')}}</li>
                                            <li>{{__('User/quiz.instructions-5')}}</li>
                                            <li>{{__('User/quiz.instructions-6')}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group" style="display:flex; justify-content: center; align-items: center;">
                                        @if($quiz)
                                            @if($quiz->complete == 1)
                                                <a v-on:click="optimizeQuiz" class="btn btn-primary" id="startQuiz">{{__('User/quiz.review')}}</a>
                                            @else
                                                <a v-on:click="optimizeQuiz" class="btn btn-primary" id="startQuiz">{{__('User/quiz.continue')}}</a>
                                            @endif
                                        @else

                                            <a v-on:click="optimizeQuiz" style="background-color:var(--text-accent) !important" class="btn btn-primary white-color" id="startQuiz">{{__('User/quiz.start-test')}}</a>
                                        @endif
                                        <a  class="btn btn-warning" style="display:none;" id="continueQuiz" v-on:click="continueQuize"  style="margin-top:23px;" >{{__('User/quiz.continue')}}</a>
                                        {{-- <a  class="btn btn-success" style="display:none;" id="saveforlateron" v-on:click="saveForLaterOn"  style="margin-top:23px;" >Save</a> --}}


                                    </div>
                                </div>
                            </div>

                            <div class="row saving_form" style="display:none; margin: 40px 0;">
                                {{__('User/quiz.answers-being-saved')}}
                            </div>
                        </form>
                        {{-- Loader --}}
                        <div id="quizLoading" style="margin: auto; display:none;">
                            <div class="spinner-border" style="width: 3rem; height: 3rem" role="status"></div>
                        </div>

                        {{-- Quiz View --}}
                        <div class="container-fluid primeQuizViewWM" id="quiz" style="min-height: 50px; margin:20px 0; display:none; background-image: url('{{asset('img/wm-n.png')}}'); background-size:cover;">


{{--                            <a class="btn" type="button" style="background-color: #ccc; max-width: 200px; margin-bottom: 10px;" id="toggleCorrectAnswer" v-on:click="openWhiteBoard">--}}
{{--                                <i class="fa fa-edit"></i> {{__('User/quiz.white-board')}}--}}
{{--                            </a>--}}
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="d-flex">
                                    <span style="font-size: 1.5em;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                        </svg>
                                    </span>
                                    <span style="font-size: 1.5em; margin-top: 3px;">
                                        @{{current_question_number}}/@{{question_number}}
                                    </span>
                                </div>
                                <div style="display: flex;justify-content: center;gap: 30px;">
                                    <a id="pause" v-on:click="stopTimer_pause" style="margin-right:15px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pause-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>
                                        </svg>
                                    </a>
                                    <a v-on:click="Confirmation">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-stop-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div>
                                    <span style="font-size: 1.5em;" class="d-flex">
                                        <svg style="margin-top: 3px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                          <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                          <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                          <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        <div style="padding: 0 5px;" id="timer">00:00</div>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="display:flex; justify-content: center; flex-direction: column; align-items: center;">
                                    <div class="progress sh-2 w-100 my-2">
                                        <div class="progress-bar" id="progress_bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                    </div>
                                </div>
                            </div>


                            <hr style="margin-top:0">
                            <!-- Rating  -->

                            <!-- Question Body -->
                            <div class="d-flex flex-row align-content-center align-items-center mb-5">
                                <div class="sw-5 me-4">
                                    <div class="border border-1 border-primary rounded-xl sw-5 sh-5 accent-text d-flex justify-content-center align-items-center">@{{ current_question_number }}</div>
                                </div>
                                <div class="heading mb-0" v-html="current_question_title"></div>
                            </div>
                            <div class="row" v-if="current_question_image">
                                <div class="fig" id="fig" style="margin: 0 0 10px 50px;">
                                    <img class="img-responsive" v-bind:src="current_question_image" width="550" alt="fig0-0">
                                </div>
                            </div>
                            {{--  MultipleChoice  --}}
                            <div class="d-flex flex-row align-content-center align-items-center position-relative mb-3"
                                 v-for="choice,idx in current_question_choices"
                                 v-if="isMultipleChoice">
                                <div class="sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="radio" class="btn-check" :value="choice.id" :id="'item_' +choice.id" v-model="multipleChoiceValue"
                                               @click="applyUserChoice(choice.id, choice.question_id)"/>
                                        <label
                                                class="btn btn-foreground hover-outline sw-4 sh-4 p-0 rounded-xl d-flex justify-content-center align-items-center stretched-link"
                                                :for="'item_' +choice.id"
                                                :style="[seeAnswer ? choice.id == user_answers[currentQuestionId].answers.filter(row => row.is_correct)[0].answer_id ? {'box-shadow':'inset 0 0 0 1px green !important'}:  user_answers[currentQuestionId].answer && choice.id == user_answers[currentQuestionId].answer.answer_id ? {'box-shadow':'inset 0 0 0 1px red !important'}: {} : {}]"

                                        >
                                            @{{ alpha[idx] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-0 text-alternate">
                                    @{{renderChoice(choice)}}
                                </div>
                            </div>

                            {{--  MultipleResponse  --}}
                            <div class="d-flex flex-row align-content-center align-items-center position-relative mb-3"
                                 v-for="choice,idx in current_question_choices"
                                 v-if="isMultipleResponses">
                                <div class="sw-5 me-4 d-flex justify-content-center flex-grow-0 flex-shrink-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input type="checkbox" class="btn-check"
                                               :value="choice.id"
                                               v-model="multipleChoiceValue"
                                               :id="'item_' +choice.id"
                                               :disabled="currentSelectedAnswersCount == current_question_correct_answers_required && !user_answers[choice.question_id].answers[choice.id].selected"
                                               @click="applyUserChoice(choice.id, choice.question_id)"/>
                                        <label
                                                class="btn active-outline  sw-4 sh-4 p-0 rounded-xl d-flex justify-content-center align-items-center stretched-link"
                                                :for="'item_' +choice.id"
                                                :style="[seeAnswer ? user_answers[currentQuestionId].answers.filter(row => row.is_correct && row.answer_id == choice.id).length ? {'box-shadow':'inset 0 0 0 1px green !important'}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'box-shadow':'inset 0 0 0 1px red !important'}: {}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'box-shadow':'inset 0 0 0 1px var(--primary) !important'}: {}]"
                                        >
                                            @{{ alpha[idx] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-0 text-alternate">
                                    @{{renderChoice(choice)}}
                                </div>
                            </div>
{{--                            <div v-if="isMultipleResponses" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">--}}
{{--                                <div v-for="choice in current_question_choices" class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? user_answers[currentQuestionId].answers.filter(row => row.is_correct && row.answer_id == choice.id).length ? {'border-color': 'green'}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'border-color': 'red'}: {}: {}]">--}}
{{--                                    <label style="display:flex;"><input style=" margin: 5px 15px auto 15px; flex: 0 0 17px;" class="uk-checkbox" type="checkbox"--}}
{{--                                                                        :disabled="currentSelectedAnswersCount == current_question_correct_answers_required && !user_answers[choice.question_id].answers[choice.id].selected"--}}
{{--                                                                        @click="applyUserChoice(choice.id, choice.question_id)"--}}
{{--                                                                        :id="'item_' +choice.id"--}}
{{--                                                                        v-model="multipleResponseValue[choice.id].selected">--}}
{{--                                        @{{renderChoice(choice)}}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            {{--  FillInTheBlank  --}}
                            <div v-if="isFillInTheBlank" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                <div v-for="choice in current_question_choices" class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? user_answers[currentQuestionId].answers.filter(row => row.is_correct && row.answer_id == choice.id).length ? {'border-color': 'green'}: user_answers[currentQuestionId].answers.filter(row => row.answer_id == choice.id && row.selected).length ? {'border-color': 'red'}: {}: {}]">
                                    <label style="display:flex; padding: 0 10px;">
                                        @{{renderChoice(choice)}}
                                    </label>
                                </div>
                                <input id="fillInTheBlank" placeholder="Write Answer">
                            </div>
                            {{-- Matching To Right --}}
                            <div v-if="isMatchingToRight" class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                <div class="match-right">
                                    <div class="left">
                                        <div class="empty">
                                            <div v-for="draggable in [...user_answers[currentQuestionId].left].sort(function() { return 0.5 - Math.random() })" v-if="draggable" :data-left-id="draggable.id" class="fill" draggable="true">
                                                <div  class="radio" style="padding-right: 0; padding-left: 0;">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragRightChoice(draggable, 'left_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? draggable.left_sentence : draggable.transcodes['left_sentence_'+language] }}--}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right" style="margin-top: 5px;">
                                        <div v-for="draggable in user_answers[currentQuestionId].right" v-if="draggable" class="empty" :data-right-id="draggable.id" data-max="2">
                                            <div class="m-2">
                                                @{{ renderDragRightChoice(draggable, 'right_sentence') }}
                                                {{--                                            @{{ language == 'en' ? draggable.right_sentence: draggable.transcodes['right_sentence_'+language] }}--}}
                                            </div>
                                            <div v-if="draggable.left" :data-left-id="draggable.left.id" class="fill" draggable="true">
                                                <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragRightChoice(draggable, 'left_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? draggable.left.left_sentence: draggable.left.transcodes['left_sentence_'+language] }}--}}
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
                                                <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? question.left.left_sentence == question.correct_sentence ? {'border-color': 'green'}: {} : {}]">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragCenterChoice(question, 'left', 'left_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? question.left.left_sentence: question.left.transcodes['left_sentence_'+language]  }}--}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="empty" id="center-item" data-max="2" :data-accept-id="question.id" data-position="center">
                                            <div class="m-2">
                                                @{{ renderDragCenterChoice(question, 'center_sentence', null) }}
                                                {{--                                        @{{ language == 'en' ? question.center_sentence: question.transcodes['center_sentence_'+language]  }}--}}
                                            </div>
                                            <div class="fill" v-if="question.left.selected" :data-id="question.id" data-position="left" draggable="true">
                                                <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? question.left.left_sentence == question.correct_sentence ? {}: {'border-color': 'red'} : {}]">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragCenterChoice(question, 'left', 'left_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? question.left.left_sentence: question.left.transcodes['left_sentence_'+language] }}--}}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="fill" v-if="question.right.selected" :data-id="question.id" data-position="right" draggable="true">
                                                <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? question.right.right_sentence == question.correct_sentence ? {} : {'border-color': 'red'} : {}]">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragCenterChoice(question, 'right', 'right_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? question.right.right_sentence: question.right.transcodes['right_sentence_'+language] }}--}}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="empty" :data-accept-id="question.id" data-position="right">
                                            <div class="fill" v-if="!question.right.selected" :data-id="question.id" data-position="right" draggable="true">
                                                <div class="radio" style="padding-right: 0; padding-left: 0;" :style="[seeAnswer ? question.right.right_sentence == question.correct_sentence ? {'border-color': 'green'}: {} : {}]">
                                                    <label style="display:flex; padding: 0 10px; cursor: move;">
                                                        @{{ renderDragCenterChoice(question, 'right', 'right_sentence') }}
                                                        {{--                                                    @{{ language == 'en' ? question.right.right_sentence: question.right.transcodes['right_sentence_'+language] }}--}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="box-body d-flex flex-wrap justify-content-between" style="font-size: 1rem !important;">
                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end" style="max-width: 120px;" id="prev" v-on:click="prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                            </svg> previous
                                        </button>
                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end" v-on:click="openCalc">  calculator</button>
                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end" data-bs-toggle="modal" data-bs-target="#myModal"> All Questions</button>

                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end" v-on:click="feedMeBack" v-if="!isMatchingToRight"> See Answer</button>
                                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-end" v-on:click="feedMeBack" v-if="isMatchingToRight" data-toggle="modal" data-target="#dragRightAnswer"> See Answer</button>

                                        <button type="button" class="btn m-1 btn-icon btn-icon-end " :class="{'btn-outline-primary': !current_question_flag, 'btn-primary': current_question_flag}" @click="toggleFlag"> Flag</button>
                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end " id="next" style="max-width: 120px;" v-on:click="next">
                                            Next <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn m-1 btn-outline-primary btn-icon btn-icon-end " style="max-width: 120px;" id="finish_btn" v-on:click="Confirmation">
                                            Finish Test <i data-cs-icon="check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Draggable Answer Modal -->
                        <div class="modal" id="dragRightAnswer" @if(app()->getLocale() == 'ar') dir="rtl" style="text-align:right;" @else dir="ltr" style="text-align:left;" @endif>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Correct Answers</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="match-right" v-if="isMatchingToRight">
                                            <div class="right">
                                                <div v-for="draggable in user_answers[currentQuestionId].right" v-if="draggable" class="empty" :data-right-id="draggable.id" data-max="2">
                                                    <div class="m-2">
                                                        @{{ language == 'ar' ? draggable.transcodes.right_sentence: draggable.right_sentence }}
                                                    </div>
                                                    <div class="fill">
                                                        <div class="radio" style="padding-right: 0; padding-left: 0;">
                                                            <label style="display:flex; padding: 0 10px; cursor: move;">
                                                                @{{ language == 'ar' ? draggable.transcodes.left_sentence: draggable.left_sentence }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- All Question Modal -->
                        <div class="modal" tabindex="-1" id="myModal">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Questions List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="filled custom-control-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                            </svg>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" v-model="flagged_question_only" style="height: 20px; width: 30px; opacity:1;">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Flagged Only</label>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-borderless" >
                                            <thead>
                                            <tr>
                                                <th>{{__('User/quiz.title')}}</th>
                                                <th>{{__('User/quiz.points')}}</th>
                                                <th>Flag</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="i in question_title_list" v-if="!flagged_question_only">
                                                <td data-dismiss="modal" v-on:click="push_question(i.id)" data-bs-dismiss="modal" style="cursor: pointer;" v-html="i.title"></td>
                                                <td>1</td>
                                                <td v-if="Object.entries(user_answers).length > 0 && Object.entries(user_answers).filter(r => r[1].question_number == i.id)[0][1].flag" class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                                    </svg>
                                                </td>
                                                <td v-else>--</td>
                                            </tr>
                                            <tr v-for="i in question_title_list" v-if="flagged_question_only && Object.entries(user_answers).length > 0 && Object.entries(user_answers).filter(r => r[1].question_number == i.id)[0][1].flag">
                                                <td data-dismiss="modal" v-on:click="push_question(i.id)" data-bs-dismiss="modal" style="cursor: pointer;" v-html="i.title"></td>
                                                <td>1</td>
                                                <td class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                                    </svg>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container result"  style="display:none;" >
                            <h2>
                                {{__('User/quiz.your-score')}}: @{{overallScore}} %
                            </h2>
                            <div class="row my-1">
                                <p v-html="ScoreMsg"></p>
                            </div>

                            <div id="menu1">
                                <center>
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
                                </center>
                                <h3 style="color:#5bbae3; text-decoration:underline;" >
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
                                </table>
                                <br>
                                <h3 style="color:#5bbae3; text-decoration:underline;" >
                                    Results By Question
                                </h3>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <th>{{__('User/quiz.question-no')}}</th>
                                    <th>Chapter</th>
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
            @endif


            @if($video)
            <nav class="exames-nav show">
                    <div
                            class="d-flex justify-content-between p-3 pe-5 mb-4 py-5"
                            style="border-bottom: 1px solid #95979834"
                    >
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center gap-3 main-text" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#noteModal">
                                <svg
                                        width="19"
                                        height="19"
                                        viewBox="0 0 19 19"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M16.5007 17.4998H9.83398M1.08398 17.9165L5.70838 16.1379C6.00416 16.0241 6.15205 15.9672 6.29042 15.893C6.41332 15.827 6.53048 15.7508 6.64068 15.6653C6.76475 15.569 6.87679 15.457 7.10088 15.2329L16.5007 5.83314C17.4212 4.91267 17.4212 3.42028 16.5007 2.4998C15.5802 1.57933 14.0878 1.57933 13.1673 2.4998L3.76755 11.8995C3.54347 12.1236 3.43142 12.2357 3.33514 12.3598C3.24963 12.47 3.17348 12.5871 3.10751 12.71C3.03324 12.8484 2.97636 12.9963 2.86259 13.2921L1.08398 17.9165ZM1.08398 17.9165L2.79908 13.4573C2.92182 13.1382 2.98318 12.9786 3.08843 12.9055C3.18042 12.8417 3.29423 12.8175 3.40423 12.8385C3.53009 12.8625 3.65097 12.9835 3.89272 13.2252L5.77529 15.1078C6.01704 15.3495 6.13792 15.4704 6.16195 15.5962C6.18296 15.7062 6.15881 15.82 6.09493 15.912C6.02186 16.0173 5.86231 16.0786 5.54321 16.2014L1.08398 17.9165Z"
                                            stroke="#F58634"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                                Notes
                            </div>
                            <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title main-text" id="exampleModalLabel"> Add new note </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:transparent"></button>
                                  </div>
                                  <div class="modal-body">
                                    <textarea name="newnote" v-model="note" style="width: 100%" class="form-control" rows="5"> </textarea>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary sec-btn" data-bs-dismiss="modal">Close</button>
                                    <button type="button" @click="storeNote" class="btn btn-primary prim-btn">Save </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div style="cursor: pointer" class="main-text" >
                                <svg
                                        width="20"
                                        height="17"
                                        viewBox="0 0 20 17"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M13.3327 1.8898C14.5674 2.50343 15.416 3.77762 15.416 5.25C15.416 6.72238 14.5674 7.99658 13.3327 8.61017M14.9993 12.972C16.2589 13.5419 17.3931 14.4708 18.3327 15.6667M1.66602 15.6667C3.28809 13.6022 5.49033 12.3333 7.91602 12.3333C10.3417 12.3333 12.5439 13.6022 14.166 15.6667M11.666 5.25C11.666 7.32107 9.9871 9 7.91602 9C5.84495 9 4.16602 7.32107 4.16602 5.25C4.16602 3.17893 5.84495 1.5 7.91602 1.5C9.9871 1.5 11.666 3.17893 11.666 5.25Z"
                                            stroke="#F58634"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                                Community
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-3" >
                            <div
                                    class="d-flex align-items-center gap-3 exam-nav-border-right main-text" style="cursor: pointer;border-right: 1px solid #e0e1e1;padding-right: 16px;"  data-bs-toggle="modal" data-bs-target="#ratingForm" 
                            >
                                <svg
                                        width="22"
                                        height="22"
                                        viewBox="0 0 22 22"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M10.2389 1.91658C10.4835 1.39698 10.6057 1.13717 10.7717 1.05417C10.9161 0.981945 11.0839 0.981945 11.2283 1.05417C11.3943 1.13717 11.5165 1.39698 11.7611 1.91658L14.081 6.84623C14.1531 6.99963 14.1892 7.07633 14.242 7.13588C14.2887 7.18861 14.3447 7.23133 14.4069 7.26168C14.4772 7.29595 14.5579 7.30832 14.7193 7.33306L19.9085 8.12864C20.455 8.21241 20.7282 8.2543 20.8546 8.3943C20.9646 8.5161 21.0164 8.68347 20.9954 8.84981C20.9714 9.04099 20.7736 9.24307 20.3779 9.64724L16.6244 13.482C16.5074 13.6015 16.4489 13.6613 16.4111 13.7324C16.3777 13.7954 16.3563 13.8645 16.348 13.9361C16.3386 14.0169 16.3524 14.1013 16.3801 14.2702L17.2657 19.6866C17.3591 20.2579 17.4058 20.5435 17.3181 20.713C17.2417 20.8605 17.1059 20.9639 16.9486 20.9945C16.7678 21.0297 16.5232 20.8948 16.0342 20.625L11.395 18.066C11.2505 17.9863 11.1782 17.9464 11.1021 17.9308C11.0347 17.9169 10.9653 17.9169 10.8979 17.9308C10.8218 17.9464 10.7495 17.9863 10.605 18.066L5.96584 20.625C5.47675 20.8948 5.23221 21.0297 5.05138 20.9945C4.89406 20.9639 4.75831 20.8605 4.68194 20.713C4.59416 20.5435 4.64087 20.2579 4.73428 19.6866L5.61995 14.2702C5.64756 14.1013 5.66136 14.0169 5.65202 13.9361C5.64375 13.8645 5.62231 13.7954 5.58888 13.7324C5.55113 13.6613 5.49263 13.6015 5.37562 13.482L1.62206 9.64724C1.22645 9.24307 1.02864 9.04099 1.00457 8.84981C0.983627 8.68347 1.03537 8.5161 1.14538 8.3943C1.27182 8.2543 1.54505 8.21241 2.0915 8.12864L7.28073 7.33306C7.44211 7.30832 7.5228 7.29595 7.59307 7.26168C7.65529 7.23133 7.71131 7.18861 7.75801 7.13588C7.81076 7.07633 7.84686 6.99963 7.91905 6.84623L10.2389 1.91658Z"
                                            stroke="#F58634"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                                Leave a rating
                            </div>
                             <div class="modal" tabindex="-1" id="ratingForm">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h2 class="uk-modal-title main-text">{{__('User/video.rating-question')}}</h2>
                                            <p>
                                                <center>
                                            <p style="color:#333; font-size: 20px; font-weight: 10; min-height: 30px;">
                                                @{{rate_sentance}}
                                            </p>

                                            <div class="row rate" style=" min-height: 50px; margin: 0px 0 15px 0;">

                                                <input type="radio"  id="star5"   name="rate" value="5" />
                                                <label for="star5" title="text"></label>


                                                <input type="radio"  id="star4"  name="rate" value="4" />
                                                <label for="star4" title="text" ></label>


                                                <input type="radio" id="star3"   name="rate" value="3" />
                                                <label for="star3" title="text" ></label>


                                                <input type="radio"  id="star2" name="rate" value="2" />
                                                <label for="star2" title="text"></label>


                                                <input type="radio" id="star1"  name="rate" value="1" />
                                                <label for="star1" title="text" ></label>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" id="rateTextBox" >
                                                    <div class="form-group">
                                                        <textarea v-model="user_review" placeholder="{{__('User/video.tell-us-something')}}" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </center>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  v-on:click="post_review" class="btn btn-primary" data-bs-dismiss="modal">{{__('User/video.submit')}}</button>
                                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center package-details-progress gap-2 mt-4 mt-lg-0">
                                <a href="javascript:;" class="d-flex align-items-center">
                                    <div class="progress-circle" data-value="70">
                                            <span class="progress-left">
                                                <span class="progress-bar border-primary"></span>
                                            </span>
                                            <span class="progress-right">
                                                    <span class="progress-bar border-primary"></span>
                                            </span>
                                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="margin-top:3px;">
                                            <div class="h1 font-weight-bold" >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.5">
                                                <path d="M12 17C8.41015 17 5.5 14.0899 5.5 10.5V4.55556C5.5 4.03739 5.5 3.77831 5.59369 3.57738C5.69305 3.36431 5.86431 3.19305 6.07738 3.09369C6.27831 3 6.53739 3 7.05556 3H16.9444C17.4626 3 17.7217 3 17.9226 3.09369C18.1357 3.19305 18.3069 3.36431 18.4063 3.57738C18.5 3.77831 18.5 4.03739 18.5 4.55556V10.5C18.5 14.0899 15.5899 17 12 17ZM12 17V21M17 21H7M22 5V10M2 5V10" stroke="#959798" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        <div class="dropdown">
                            <a
                            class="dropdown-toggle mb-1"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            Your progress
                            </a>
                            <div class="dropdown-menu progress-menu" aria-labelledby="dropdownMenuLink">
                                <p style="font-weight:bold;"  class="main-text"><span>10 </span> completed out of <span>20</span> </p>
                                <!-- <p style="margin:10px 0px">Complete <span>85</span>% to get a certificate</p>
                                <button class="package-details-reset-button">Reset course
                                </button>  -->
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </nav>
            <div class="container p-5">
                <!-- Video Content -->
                <div class="exam-video">
                    {!! $video->html !!}
                </div>

                <ul
                        class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs"
                        id="lineTitleTabsContainer"
                        role="tablist"
                >
                    <li class="nav-item exames-nav-alternative" role="presentation">
                        <a
                                class="nav-link"
                                data-bs-toggle="tab"
                                href="#tab-1"
                                role="tab"
                                aria-selected="false"
                        >Course content</a
                        >
                    </li>
                    <li class="nav-item exames-nav-alternative" role="presentation">
                        <a
                                class="nav-link"
                                data-bs-toggle="tab"
                                href="#tab-2"
                                role="tab"
                                aria-selected="false"
                        >Exams</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                                class="nav-link"
                                data-bs-toggle="tab"
                                href="#tab-3"
                                role="tab"
                                aria-selected="false"
                        >Overview</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                                class="nav-link"
                                data-bs-toggle="tab"
                                href="#tab-4"
                                role="tab"
                                aria-selected="false"
                        >Notes</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                                class="nav-link"
                                data-bs-toggle="tab"
                                href="#tab-5"
                                role="tab"
                                aria-selected="false"
                        >Course material</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                                class="nav-link active"
                                data-bs-toggle="tab"
                                href="#tab-6"
                                role="tab"
                                aria-selected="true"
                        >Reviews</a
                        >
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade " id="tab-1" role="tabpanel">
                            <div :class="video_id  || topic_type=='chapter'? 'active show':''" class="tab-pane fade" role="tabpanel">
                                <!--------- Accordion Item 1 -->
                                    <div class="accordion accordion-flush black-fuckin-color" id="accordionFlushExample2">
                                    <div class="accordion-item" v-for="i,idx in chapters_inc" v-if="i.questions_number > 1 || i.videos.length > 0">
                                        <div class="accordion-header" id="flush-headingOne">
                                            <button
                                                    class="accordion-button d-flex flex-column align-items-start position-relative"
                                                    :class="topic_id == i.id && topic_type == i.key ? '': 'collapsed'"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    :data-bs-target="'#chapterCollapse_'+i.id"
                                                    :aria-expanded="topic_id == i.id && topic_type == i.key ? 'true': 'false'"
                                                    :aria-controls="'chapterCollapse_'+i.id"
                                                    @click="loadTopic('exam')"
                                            >
                                                <h6>@{{ i.name }}</h6>
                                                {{--                                                <p>--}}
                                                {{--                                                    <span class="course-item-count"> 2/7 </span>--}}
                                                {{--                                                    <span class="course-item-duration">12 min</span>--}}
                                                {{--                                                </p>--}}
                                            </button>
                                        </div>
                                        <div
                                                :id="'chapterCollapse_'+i.id"
                                                :class="topic_id == i.id && topic_type == i.key ? 'show': ''"
                                                data-bs-parent="#accordionFlushExample2"
                                                class="accordion-collapse collapse"
                                        >
                                            <div class="accordion-body">
                                                <ul class="courses-list">
                                                    <li class="courses-list-item" :class="itemHighlighted('video', j.video_id)" v-for="j in i.videos.filter(row => !row.after_chapter_quiz)">
                                                        <a :href="topicURL(i.key, i.id)+'?video_id='+j.video_id" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                @{{ j.title }}
                                                            </div>
                                                            <div>
                                                            <span :class="j.watched > 0 || isItemActive('video', j.video_id)? 'courses-play-icon': ''"
                                                            >

                                                                <svg v-if="isItemActive('video', j.video_id)" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_412_5456)">
                                                                    <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" fill="#F58634" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <rect x="5.33301" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    <rect x="8.66699" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    </g>
                                                                    <defs>
                                                                    <clipPath id="clip0_412_5456">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                    </clipPath>
                                                                    </defs>
                                                                </svg>

                                                                <svg v-else-if="j.watched > 0 && !isItemActive('video', j.video_id)"
                                                                     class="play-icon"
                                                                     width="5"
                                                                     height="6"
                                                                     viewBox="0 0 5 6"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                >
                                                                <path
                                                                        d="M0.333008 0.976663C0.333008 0.658476 0.333008 0.499383 0.399501 0.410563C0.457448 0.333156 0.546148 0.284736 0.642595 0.277843C0.753275 0.269943 0.887075 0.355969 1.15474 0.528036L4.30181 2.55118C4.53407 2.70044 4.65021 2.77511 4.69027 2.87004C4.72534 2.95298 4.72534 3.04658 4.69027 3.12951C4.65021 3.22444 4.53407 3.29911 4.30181 3.44838L1.15474 5.47151C0.887075 5.64358 0.753275 5.72964 0.642595 5.72171C0.546148 5.71484 0.457448 5.66638 0.399501 5.58898C0.333008 5.50018 0.333008 5.34111 0.333008 5.02291V0.976663Z"
                                                                        fill="#fff"
                                                                />
                                                              </svg>
                                                              <svg v-else
                                                                   width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_412_656)">
                                                                <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" stroke="#F58634" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6.33301 5.97666C6.33301 5.65848 6.33301 5.49938 6.3995 5.41056C6.45745 5.33316 6.54615 5.28474 6.64259 5.27784C6.75327 5.26994 6.88707 5.35597 7.15474 5.52804L10.3018 7.55118C10.5341 7.70044 10.6502 7.77511 10.6903 7.87004C10.7253 7.95298 10.7253 8.04658 10.6903 8.12951C10.6502 8.22444 10.5341 8.29911 10.3018 8.44838L7.15474 10.4715C6.88707 10.6436 6.75327 10.7296 6.64259 10.7217C6.54615 10.7148 6.45745 10.6664 6.3995 10.589C6.33301 10.5002 6.33301 10.3411 6.33301 10.0229V5.97666Z" fill="#F58634"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_412_656">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                              </svg>
                                                            </span>
                                                                <span>@{{ j.duration }}</span>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="courses-list-item" v-if="i.questions_number > 1" :class="itemHighlighted(i.key, i.id)">
                                                        <a :href="topicURL(i.key, i.id)" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                QUIZ
                                                            </div>
                                                            <div>
                                                                <p class="course-item-description">
                                                                    <input type="checkbox" :checked="i.completedQuizNumber || 1? 'checked': ''" disabled />
                                                                    @{{ i.questions_number }} questions
                                                                </p>
                                                                <i v-if="i.savedQuizNumber > 0" style="color:#c6112d; float: right;"> [{{__('User/quiz.saved')}}]</i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="courses-list-item" :class="itemHighlighted('video', j.video_id)" v-for="j in i.videos.filter(row => row.after_chapter_quiz)">
                                                        <a :href="topicURL(i.key, i.id)+'?video_id='+j.video_id" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                @{{ j.title }}
                                                            </div>
                                                            <div>
                                                            <span :class="j.watched > 0 || isItemActive('video', j.video_id)? 'courses-play-icon': ''"
                                                            >

                                                                <svg v-if="isItemActive('video', j.video_id)" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_412_5456)">
                                                                    <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" fill="#F58634" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <rect x="5.33301" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    <rect x="8.66699" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    </g>
                                                                    <defs>
                                                                    <clipPath id="clip0_412_5456">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                    </clipPath>
                                                                    </defs>
                                                                </svg>

                                                                <svg v-else-if="j.watched > 0 && !isItemActive('video', j.video_id)"
                                                                     class="play-icon"
                                                                     width="5"
                                                                     height="6"
                                                                     viewBox="0 0 5 6"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                >
                                                                <path
                                                                        d="M0.333008 0.976663C0.333008 0.658476 0.333008 0.499383 0.399501 0.410563C0.457448 0.333156 0.546148 0.284736 0.642595 0.277843C0.753275 0.269943 0.887075 0.355969 1.15474 0.528036L4.30181 2.55118C4.53407 2.70044 4.65021 2.77511 4.69027 2.87004C4.72534 2.95298 4.72534 3.04658 4.69027 3.12951C4.65021 3.22444 4.53407 3.29911 4.30181 3.44838L1.15474 5.47151C0.887075 5.64358 0.753275 5.72964 0.642595 5.72171C0.546148 5.71484 0.457448 5.66638 0.399501 5.58898C0.333008 5.50018 0.333008 5.34111 0.333008 5.02291V0.976663Z"
                                                                        fill="#fff"
                                                                />
                                                              </svg>
                                                              <svg v-else
                                                                   width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_412_656)">
                                                                <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" stroke="#F58634" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6.33301 5.97666C6.33301 5.65848 6.33301 5.49938 6.3995 5.41056C6.45745 5.33316 6.54615 5.28474 6.64259 5.27784C6.75327 5.26994 6.88707 5.35597 7.15474 5.52804L10.3018 7.55118C10.5341 7.70044 10.6502 7.77511 10.6903 7.87004C10.7253 7.95298 10.7253 8.04658 10.6903 8.12951C10.6502 8.22444 10.5341 8.29911 10.3018 8.44838L7.15474 10.4715C6.88707 10.6436 6.75327 10.7296 6.64259 10.7217C6.54615 10.7148 6.45745 10.6664 6.3995 10.589C6.33301 10.5002 6.33301 10.3411 6.33301 10.0229V5.97666Z" fill="#F58634"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_412_656">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                              </svg>
                                                            </span>
                                                                <span>@{{ j.duration }}</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                            <ul class="courses-list ">
                                <li class="course-item" :class="itemHighlighted(i.key, i.id)" v-for="i,idx in exams_inc" v-if="i.questions_number > 0">
                                    <a :href="topicURL(i.key, i.id)">
                                        <h3 class="course-item-title">@{{ i.name }}</h3>
                                        <p class="course-item-description">
                                            <input type="checkbox" :checked="i.completedQuizNumber? 'checked': ''" disabled />
                                            @{{ i.questions_number }} questions
                                            <i v-if="i.savedQuizNumber > 0" style="color:#c6112d; float: right;"> [{{__('User/quiz.saved')}}]</i>
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                            {!! $video->description !!}
                        </div>
                        <div class="tab-pane fade" id="tab-4" role="tabpanel">
                            <ul v-for="n in Notes">
                                <li> @{{ n.note }} </li>
                       
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="tab-5" role="tabpanel">
                            @if($video->attachment_url)
                                <div class="sw-30 me-2 mb-2">
                                    <div class="row g-0 rounded-sm sh-8 border">
                                        <div class="col-auto">
                                            <div class="sw-10 d-flex justify-content-center align-items-center h-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-file-text accent-text"><path d="M6.5 18H13.5C14.9045 18 15.6067 18 16.1111 17.6629C16.3295 17.517 16.517 17.3295 16.6629 17.1111C17 16.6067 17 15.9045 17 14.5V7.44975C17 6.83775 17 6.53175 16.9139 6.24786C16.8759 6.12249 16.8256 6.00117 16.7638 5.88563C16.624 5.62399 16.4076 5.40762 15.9749 4.97487L14.0251 3.02513L14.0251 3.02512C13.5924 2.59238 13.376 2.37601 13.1144 2.23616C12.9988 2.1744 12.8775 2.12415 12.7521 2.08612C12.4682 2 12.1622 2 11.5503 2H6.5C5.09554 2 4.39331 2 3.88886 2.33706C3.67048 2.48298 3.48298 2.67048 3.33706 2.88886C3 3.39331 3 4.09554 3 5.5V14.5C3 15.9045 3 16.6067 3.33706 17.1111C3.48298 17.3295 3.67048 17.517 3.88886 17.6629C4.39331 18 5.09554 18 6.5 18Z"></path><path d="M13 6 7 6M13 10 7 10M13 14 7 14"></path></svg>
                                            </div>
                                        </div>
                                        <div class="col rounded-sm-end d-flex flex-column justify-content-center pe-3">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 clamp-line" data-line="1" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 1;">{{__('User/video.attachment')}}</p>
                                                <a href="{{route('download.material', $video->attachment_id )}}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-delay="{&quot;show&quot;:&quot;1000&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-original-title="Download">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-download text-alternate"><path d="M2 14V14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18H14.5C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5V14"></path><path d="M14 10 10.7071 13.2929C10.3166 13.6834 9.68342 13.6834 9.29289 13.2929L6 10M10 2 10 13"></path></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>{{__('User/video.no-resources')}}</p>
                            @endif
                        </div>
                        <div class="tab-pane fade active show" id="tab-6" role="tabpanel">
         
                                                               @foreach($rating_reviews as $review)
                    @php
                        $profile_pic =asset('user-assets/img/profile/profile-11.jpg');
                        if($review->profile_pic){
                            $profile_pic =url('storage/profile_picture/'.basename($review->profile_pic));
                        }

                    @endphp
                    <div class="d-flex align-items-center @if(!$loop->last) border-bottom border-separator-light @endif pb-3">
                        <div class="row g-0 w-100">
                            <div class="col-auto">
                                <div class="sw-5 me-3">
                                    <img src="{{$profile_pic}}" class="img-fluid rounded-xl" alt="thumb" />
                                </div>
                            </div>
                            <div class="col pe-3">
                                <div>{{$review->name}}</div>
                                <div class="text-muted text-small mb-2">{{$review->created_at}}</div>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{$review->rate}}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="text-medium text-alternate lh-1-25">{{$review->review}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                        </div>
                    </div>
                </div>


            </div>
            @endif

            <div class="exames-sidenav" style="padding:0;">
                    <ul
                            class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs"
                            id="lineTitleTabsContainer"
                            role="tablist"
                    >
                        <li class="nav-item" role="presentation">
                            <a
                                    class="nav-link"
                                    :class="video_id  || topic_type=='chapter'? 'active': ''"
                                    data-bs-toggle="tab"
                                    href="#courses-tab"
                                    role="tab"
                                    :aria-selected="video_id  || topic_type=='chapter'? 'true':'false'"
                            >Course content</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                    class="nav-link"
                                    :class="video_id  || topic_type=='chapter'? '': 'active'"
                                    data-bs-toggle="tab"
                                    href="#exames-tab"
                                    role="tab"
                                    :aria-selected="video_id  || topic_type=='chapter'? 'false':'true'"
                            >Exams</a>
                        </li>
                    </ul>
                    <div class="exames-sidenav-toggler" onclick="toggleExamesSide()">
                        <svg
                                width="7"
                                height="17"
                                viewBox="0 0 7 17"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M1 1L5.5 8.5L0.999999 16"
                                    stroke="white"
                                    stroke-width="2.2"
                            />
                        </svg>
                    </div>
                    <div class="card-body" id="content-list-card-body">
                        <div class="tab-content">
                            <div :class="video_id  || topic_type=='chapter'? 'active show':''" class="tab-pane fade" id="courses-tab" role="tabpanel">
                                <!--------- Accordion Item 1 -->
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item" v-for="i,idx in chapters_inc" v-if="i.questions_number > 1 || i.videos.length > 0">
                                        <div class="accordion-header" id="flush-headingOne">
                                            <button
                                                    class="accordion-button d-flex flex-column align-items-start position-relative"
                                                    :class="topic_id == i.id && topic_type == i.key ? '': 'collapsed'"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    :data-bs-target="'#chapterCollapse_'+i.id"
                                                    :aria-expanded="topic_id == i.id && topic_type == i.key ? 'true': 'false'"
                                                    :aria-controls="'chapterCollapse_'+i.id"
                                                    @click="loadTopic('exam')"
                                            >
                                                <h6>@{{ i.name }}</h6>
{{--                                                <p>--}}
{{--                                                    <span class="course-item-count"> 2/7 </span>--}}
{{--                                                    <span class="course-item-duration">12 min</span>--}}
{{--                                                </p>--}}
                                            </button>
                                        </div>
                                        <div
                                                :id="'chapterCollapse_'+i.id"
                                                :class="topic_id == i.id && topic_type == i.key ? 'show': ''"
                                                data-bs-parent="#accordionFlushExample"
                                                class="accordion-collapse collapse"
                                        >
                                            <div class="accordion-body">
                                                <ul class="courses-list">
                                                    <li class="courses-list-item" :class="itemHighlighted('video', j.video_id)" v-for="j in i.videos.filter(row => !row.after_chapter_quiz)">
                                                        <a :href="topicURL(i.key, i.id)+'?video_id='+j.video_id" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                @{{ j.title }}
                                                            </div>
                                                            <div>
                                                            <span :class="j.watched > 0 || isItemActive('video', j.video_id)? 'courses-play-icon': ''"
                                                            >

                                                                <svg v-if="isItemActive('video', j.video_id)" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_412_5456)">
                                                                    <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" fill="#F58634" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <rect x="5.33301" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    <rect x="8.66699" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    </g>
                                                                    <defs>
                                                                    <clipPath id="clip0_412_5456">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                    </clipPath>
                                                                    </defs>
                                                                </svg>

                                                                <svg v-else-if="j.watched > 0 && !isItemActive('video', j.video_id)"
                                                                     class="play-icon"
                                                                     width="5"
                                                                     height="6"
                                                                     viewBox="0 0 5 6"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                >
                                                                <path
                                                                        d="M0.333008 0.976663C0.333008 0.658476 0.333008 0.499383 0.399501 0.410563C0.457448 0.333156 0.546148 0.284736 0.642595 0.277843C0.753275 0.269943 0.887075 0.355969 1.15474 0.528036L4.30181 2.55118C4.53407 2.70044 4.65021 2.77511 4.69027 2.87004C4.72534 2.95298 4.72534 3.04658 4.69027 3.12951C4.65021 3.22444 4.53407 3.29911 4.30181 3.44838L1.15474 5.47151C0.887075 5.64358 0.753275 5.72964 0.642595 5.72171C0.546148 5.71484 0.457448 5.66638 0.399501 5.58898C0.333008 5.50018 0.333008 5.34111 0.333008 5.02291V0.976663Z"
                                                                        fill="#fff"
                                                                />
                                                              </svg>
                                                              <svg v-else
                                                                      width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_412_656)">
                                                                <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" stroke="#F58634" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6.33301 5.97666C6.33301 5.65848 6.33301 5.49938 6.3995 5.41056C6.45745 5.33316 6.54615 5.28474 6.64259 5.27784C6.75327 5.26994 6.88707 5.35597 7.15474 5.52804L10.3018 7.55118C10.5341 7.70044 10.6502 7.77511 10.6903 7.87004C10.7253 7.95298 10.7253 8.04658 10.6903 8.12951C10.6502 8.22444 10.5341 8.29911 10.3018 8.44838L7.15474 10.4715C6.88707 10.6436 6.75327 10.7296 6.64259 10.7217C6.54615 10.7148 6.45745 10.6664 6.3995 10.589C6.33301 10.5002 6.33301 10.3411 6.33301 10.0229V5.97666Z" fill="#F58634"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_412_656">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                              </svg>
                                                            </span>
                                                                <span>@{{ j.duration }}</span>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="courses-list-item" v-if="i.questions_number > 1" :class="itemHighlighted(i.key, i.id)">
                                                        <a :href="topicURL(i.key, i.id)" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                QUIZ
                                                            </div>
                                                            <div>
                                                                <p class="course-item-description">
                                                                    <input type="checkbox" :checked="i.completedQuizNumber || 1? 'checked': ''" disabled />
                                                                    @{{ i.questions_number }} questions
                                                                </p>
                                                                <i v-if="i.savedQuizNumber > 0" style="color:#c6112d; float: right;"> [{{__('User/quiz.saved')}}]</i>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="courses-list-item" :class="itemHighlighted('video', j.video_id)" v-for="j in i.videos.filter(row => row.after_chapter_quiz)">
                                                        <a :href="topicURL(i.key, i.id)+'?video_id='+j.video_id" class="heading" >
                                                            <div class="courses-list-item-title">
                                                                @{{ j.title }}
                                                            </div>
                                                            <div>
                                                            <span :class="j.watched > 0 || isItemActive('video', j.video_id)? 'courses-play-icon': ''"
                                                            >

                                                                <svg v-if="isItemActive('video', j.video_id)" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_412_5456)">
                                                                    <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" fill="#F58634" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <rect x="5.33301" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    <rect x="8.66699" y="5.3335" width="2" height="5.33333" rx="1" fill="white"/>
                                                                    </g>
                                                                    <defs>
                                                                    <clipPath id="clip0_412_5456">
                                                                    <rect width="16" height="16" fill="white"/>
                                                                    </clipPath>
                                                                    </defs>
                                                                </svg>

                                                                <svg v-else-if="j.watched > 0 && !isItemActive('video', j.video_id)"
                                                                     class="play-icon"
                                                                     width="5"
                                                                     height="6"
                                                                     viewBox="0 0 5 6"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                >
                                                                <path
                                                                        d="M0.333008 0.976663C0.333008 0.658476 0.333008 0.499383 0.399501 0.410563C0.457448 0.333156 0.546148 0.284736 0.642595 0.277843C0.753275 0.269943 0.887075 0.355969 1.15474 0.528036L4.30181 2.55118C4.53407 2.70044 4.65021 2.77511 4.69027 2.87004C4.72534 2.95298 4.72534 3.04658 4.69027 3.12951C4.65021 3.22444 4.53407 3.29911 4.30181 3.44838L1.15474 5.47151C0.887075 5.64358 0.753275 5.72964 0.642595 5.72171C0.546148 5.71484 0.457448 5.66638 0.399501 5.58898C0.333008 5.50018 0.333008 5.34111 0.333008 5.02291V0.976663Z"
                                                                        fill="#fff"
                                                                />
                                                              </svg>
                                                              <svg v-else
                                                                   width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_412_656)">
                                                                <path d="M7.99967 14.6668C11.6815 14.6668 14.6663 11.682 14.6663 8.00016C14.6663 4.31826 11.6815 1.3335 7.99967 1.3335C4.31777 1.3335 1.33301 4.31826 1.33301 8.00016C1.33301 11.682 4.31777 14.6668 7.99967 14.6668Z" stroke="#F58634" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6.33301 5.97666C6.33301 5.65848 6.33301 5.49938 6.3995 5.41056C6.45745 5.33316 6.54615 5.28474 6.64259 5.27784C6.75327 5.26994 6.88707 5.35597 7.15474 5.52804L10.3018 7.55118C10.5341 7.70044 10.6502 7.77511 10.6903 7.87004C10.7253 7.95298 10.7253 8.04658 10.6903 8.12951C10.6502 8.22444 10.5341 8.29911 10.3018 8.44838L7.15474 10.4715C6.88707 10.6436 6.75327 10.7296 6.64259 10.7217C6.54615 10.7148 6.45745 10.6664 6.3995 10.589C6.33301 10.5002 6.33301 10.3411 6.33301 10.0229V5.97666Z" fill="#F58634"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_412_656">
                                                                <rect width="16" height="16" fill="white"/>
                                                                </clipPath>
                                                                </defs>
                                                              </svg>
                                                            </span>
                                                                <span>@{{ j.duration }}</span>
                                                                <span v-if="j.watched > 0">Watched!</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div
                                    :class="video_id || topic_type=='chapter'? '':'active show'"
                                    class="tab-pane fade"
                                    id="exames-tab"
                                    role="tabpanel"
                            >
                                <ul class="courses-list">
                                    <li class="course-item" :class="itemHighlighted(i.key, i.id)" v-for="i,idx in exams_inc" v-if="i.questions_number > 0">
                                        <a :href="topicURL(i.key, i.id)">
                                            <h3 class="course-item-title">@{{ i.name }}</h3>
                                            <p class="course-item-description">
                                                <input type="checkbox" :checked="i.completedQuizNumber? 'checked': ''" disabled />
                                                @{{ i.questions_number }} questions
                                                <i v-if="i.savedQuizNumber > 0" style="color:#c6112d; float: right;"> [{{__('User/quiz.saved')}}]</i>
                                            </p>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


    </div>
@endsection

@section('jscode')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="{{asset('user-assets/js/vendor/movecontent.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="{{asset('helper/js/jQuery.tagify.min.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script src="{{asset('js/easyTimer.min.js')}}"></script>
    <script>
        (function() {
            $('#wrapper').show();
            $('#loading').hide();
            document.addEventListener('contextmenu', event => event.preventDefault());

            $(window).keyup(function(e){
                if(e.keyCode == 44){
                    $("#app-1").hide();
                    $("#prsc-msg").show();


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
        })();
        quizAttr = {
            package_id: '{{$package_id}}',
            topic_type: '{{$topic}}',
            topic_id: {{$topic_id}},
            package: '{{$package_name}}',
            max_questions_num: {{$questionNum}},
            scoreAnalysis: {
                @if(count($process))
                        @foreach($process as $type)
                '{{$type}}': {msg: '',count: 0 , data: [], score: 0},
                @endforeach
                @endif
            },
            scoreAnalysisByChapter: {
                @php
                    $loaded = [];
                @endphp
                        @if(count(\App\Chapters::where('course_id', \App\Packages::find($package_id)->course_id)->get()))

                        @foreach(\App\Chapters::all() as $type)
                        @if(!in_array($type->name, $loaded))
                '{{$type->name}}': {msg: '',count: 0 , data: [], score: 0},
                @endif
                @php
                    array_push($loaded, $type->name);
                @endphp
                @endforeach
                @endif
            },
            topics_included_arr: [],
            language: '{{\Session('locale')}}',
            chapters_inc: JSON.parse('{!! $chapters_inc !!}'),
            process_inc: JSON.parse('{!! $process_inc !!}'),
            exams_inc: JSON.parse('{!! $exams_inc !!}'),
            base_url: '{{url('')}}',
            calculator_url: '{{route('calculator')}}',
            whiteBoard_url: 'https://pm-white.herokuapp.com/',
            api: {
                csrf            : '{{csrf_token()}}',
                getNotes        : '{{ route('getNotes')}}',
                storeNote       : '{{ route('storeNote')}}',
                generate_quiz   : '{{ route('PremiumQuiz.generate')}}',
                init_topic      : '{{ route('init.topic')}}',
                load_topic      : '{{ route('load.topic')}}',
                saveForLaterOn  : '{{ route('saveForLaterOn') }}',
                scoreStore      : '{{ route('PremiumQuiz.scoreStore')}}',
                postReview      : '{{ route('user.review')}}',
                userRate        : '{{ route('user.rate')}}',
                quizHistoryShow : '{{ route('QuizHistory.show', '') }}',
                feedback        : '{{url('PremiumQuiz/feedback')}}',
                cxQuiz          : '{{ route('PremiumQuiz.generateCX')}}',
                part_id         : '{{request()->part_id}}',
            },
            saved_quiz_id: @if($quiz) {{$quiz->id}} @else 'realtime' @endif,
            translation: {
                overallPerformance  : '{{__('User/quiz.overall-performance')}}',
                passed              : '{{__('User/quiz.passed')}}',
                failed              : '{{__('User/quiz.failed')}}',
                needImprove         : '{{__('User/quiz.need-improve')}}',
                belowTarget         : '{{__('User/quiz.below-target')}}',
                target              : '{{__('User/quiz.target')}}',
                aboveTarget         : '{{__('User/quiz.above-target')}}',
            },
            video_id: '{{request()->video_id}}',
            explanation_id: '{{request()->explanation_id}}',
            examTimeMin: '{{isset($examTimeMin) ? $examTimeMin: 0}}',
        };
    </script>
    <script src="{{asset('helper/js/quiz-V0.3.js')}}"></script>

    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
    
        
        
        $(function() {
            
            var iframe = document.querySelector('iframe');
            var player = new Vimeo.Player(iframe);
        
            player.on('loaded', function(){
                player.play();
            });
            player.on('ended', onFinish);
            
            // Call the API when a button is pressed
            function onFinish() {
                @if($next_video)
                    window.location.href = "{{route('PremiumQuiz-st3', [$package->package_id, 'chapter', $next_video->chapter_id, 'realtime']).'?video_id='.$next_video->video_id}}";
                @endif
            }
    
        });
    
    
    </script>
    <script>
        (function() {
            $(".progress-circle").each(function() {
                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');
                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }
            });
            function percentageToDegrees(percentage) {
                return percentage / 100 * 360
            }
        })(window, document);
    </script>
@endsection
