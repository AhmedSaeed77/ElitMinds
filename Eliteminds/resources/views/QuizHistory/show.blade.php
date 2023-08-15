@extends('layouts.layoutV2')
@section('head')
<style>
        .main-text{
            color:var(--text-primary);
        }
        .accent-text{
            color:var(--text-accent)
        }
        .accordion-toggle.collapsed svg{
            transform: rotate(0deg);
        }
        .accordion-toggle svg{
            transform: rotate(90deg);
            transition:all 0.3s ease-in-out;
        }
        .page-title-container h1{
            font-size:2rem;
            font-weight: 700;
        }
        .card-btn{
            position: absolute;
            left:0px;
        }
        .body-row {
            padding:30px 0px;
        }
        .body-row{
            border-top:1px solid #56595B;
        }
        .body-row strong{
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            color:var(--text-primary);
            margin-right:10px;
        }
        .body-row span{
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 18px;
            color:var(--text-primary);
        }
        .table-header{
            border-bottom: 2px solid #56595B;
            padding-bottom:30px;
            margin-bottom:20px;
        }
        .accord-card{
            background: var(--bg-primary);
            box-shadow: 0px 1px 0px rgba(44, 47, 50, 0.06);
            border-radius: 13px;
            margin-bottom:10px;
        }
        .mobile-view{
            display:none !important;
        }
        @media screen and (max-width:992px){
            .mobile-view{
                display:block !important
            }
            .desktop-view{
                display:none !important;
            }
            
        }
    </style>
<link rel="stylesheet" href="{{asset('helper/css/analytics.css')}}"> 

@endsection

@section('content')

<div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container" style="margin-bottom:66px;">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7 analytics-heading">
                    <h1  id="title">Analytics</h1>
                    <p>Analytics presents a comprehensive
                        analysis of quiz results, giving a clear picture of performance!</p>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->

        <div class="row desktop-view table-header">
            <div class="table-heading d-flex justify-content-between">
                <div class="col-lg-3 mb-2 mb-lg-1" >
                    <div class="text-start" style="padding-left:45px !important">Name</div>
                </div>
                <div class="col-lg-2">
                    <div class="text-start">Num of questions</div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">Grade</div>
                </div>
                <div class="col-lg-1">
                    <div class="text-center">Overall</div>
                </div>
                <div class="col-lg-2">
                    <div class="text-center">Duration</div>
                </div>
                <div class="col-lg-2">
                    <div class="text-center">Time of completion</div>
                </div>
                <div class="col-lg-2">
                    <div class="text-center"></div>
                </div>
                
            </div>
        </div>
        @php
            $attempt = \App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get();
            
        @endphp
        @php
            $attempts = \Illuminate\Support\Facades\DB::table('quizzes')->where('user_id', Auth::user()->id)->where('complete', 1)
                                    ->join('packages', 'quizzes.package_id', '=', 'packages.id')
                                    ->select('packages.id','packages.name','quizzes.*')
                                    ->orderBy('quizzes.updated_at', 'desc')
                                    ->get();
                                  
        @endphp
        
        
        <!-- <div class="row g-3 mb-5">
            @php
                $attempt = count(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get());
            @endphp
            @foreach(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get() as $quiz_z)
             
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <div class="row g-0 h-auto sh-lg-12">
                        <div class="col-12 col-lg p-0 h-100">
                            <div class="card-body h-100">
                                <div class="row gx-2 d-flex h-100 align-items-lg-center">
                                    <div class="col-lg-3 mb-2 mb-lg-1">
                                        <a href="{{route('QuizHistory.show', $quiz_z->id)}}" class="stretched-link body-link" style="font-size:16px; font-weight:700">
                                            <div class="lh-1-5 mb-0">
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
                                                @php
                                                    $st = explode('Exam', Transcode::evaluate(\App\Exam::find($quiz_z->topic_id))['name']);
                                                @endphp
                                                    {{ $st[0].' Exam' }}
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 mb-2 mb-lg-1">
                                        <a href="{{route('QuizHistory.show', $quiz_z->id)}}" class="stretched-link body-link" style="font-size:16px; font-weight:700">
                                            <div class="lh-1-5 mb-0">
                                                {{ $st[1] }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-auto d-lg-none">
                                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-badge text-primary"><path d="M13 11L13.8819 17.1734C13.9258 17.4809 13.9478 17.6347 13.8803 17.7191C13.8518 17.7547 13.8142 17.7819 13.7713 17.7976C13.6699 17.835 13.531 17.7655 13.2532 17.6266L10.3913 16.1957C10.2271 16.1136 10.1451 16.0725 10.0578 16.0624C10.0194 16.0579 9.98059 16.0579 9.94217 16.0624C9.85494 16.0725 9.77286 16.1136 9.60869 16.1957L6.74684 17.6266C6.46901 17.7655 6.3301 17.835 6.22866 17.7976C6.18584 17.7819 6.14815 17.7547 6.11967 17.7191C6.05219 17.6347 6.07416 17.4809 6.11809 17.1734L7 11"></path><circle cx="10" cy="7" r="5"></circle></svg>
                                                </div>
                                            </div>
                                            <div class="col col-lg-12">
                                                <div class="row g-0">
                                                    <div class="col d-lg-none">
                                                        <div class="text-alternate sh-4 d-flex align-items-center lh-1-25" style="font-size:12px;font-weight:bold">Overall</div>
                                                    </div>
                                                    <div class="col-auto col-lg-12">
                                                        <div class="sh-4 d-flex align-items-center text-alternate justify-content-center">
                                                            @if($quiz_z->score >= 75)
                                                                <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                                            @else
                                                                <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-auto d-lg-none">
                                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center" style="color: var(--primary);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                                        <path d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col col-lg-12">
                                                <div class="row g-0">
                                                    <div class="col d-lg-none">
                                                        <div class="text-alternate sh-4 d-flex align-items-center lh-1-25" style="font-size:12px;font-weight:bold">Score</div>
                                                    </div>
                                                    <div class="col-auto col-lg-12">
                                                        <div class="sh-4 d-flex align-items-center text-alternate justify-content-lg-end gap-1">
                                                            <b> {{$quiz_z->score}}% </b>  {{__('User/quizHistory.correct')}} 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-auto d-lg-none">
                                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center" style="color: var(--primary);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col col-lg-12">
                                                <div class="row g-0">
                                                    <div class="col d-lg-none">
                                                        <div class="text-alternate sh-4 d-flex align-items-center lh-1-25" style="font-size:12px;font-weight:bold">Time</div>
                                                    </div>
                                                    <div class="col-auto col-lg-12">
                                                        <div class="sh-4 d-flex align-items-center text-alternate justify-content-lg-end">
                                                            @php
                                                                $hours = 0;
                                                                $mins = 0;
                                                                $sec = 0;
                                                                if($quiz_z->time_left != 0){
                                                                    $hours = floor($quiz_z->time_left/3600);
                                                                    $mins = floor( ($quiz_z->time_left%3600) / 60);
                                                                    $sec = floor(($quiz_z->time_left%3600) % 60);
                                                                }

                                                            @endphp
                                                            {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-auto d-lg-none">
                                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-clock text-primary"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                                                </div>
                                            </div>
                                            <div class="col col-lg-12">
                                                <div class="row g-0">
                                                    <div class="col d-lg-none">
                                                        <div class="text-alternate sh-4 d-flex align-items-center lh-1-25" style="font-size:12px;font-weight:bold">Time</div>
                                                    </div>
                                                    <div class="col-auto col-lg-12">
                                                        <div class="sh-4 d-flex align-items-center text-alternate justify-content-lg-end">
                                                            {{$quiz_z->updated_at->diffForHumans()}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> -->


<!-- Desktop cards -->
            <div id="accordionCards" class="row desktop-view card d-flex " style="background:var(--bg-main)">
                @foreach($attempts as $attempt)
                    <div class="accord-card ">
                    <div class="d-flex collapsed accordion-toggle" role="button" data-bs-toggle="collapse" data-bs-target="#collapseOneCards-{{ $attempt->id }}"  aria-expanded="true" aria-controls="collapseOneCards-1">
                        <div class="card-body" style="min-height: 89px;">
                            <div class="row d-none d-lg-flex g-0">
                            <button type="button"class="card-btn btn" >
                                    <b class="header-title float-left"></b>
                                        <div class="d-flex align-items-center me-3">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 0.999999L7 7L1 13" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                </button>
                                <div class="table-heading d-flex justify-content-between">
                                    <div class="col-lg-3 mb-2 mb-lg-1" >
                                        <div class="text-start" style="padding-left:12px !important">{{ $attempt->name }}</div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-start">
                                            @if($attempt->topic_type == 'chapter')
                                                {{Transcode::evaluate(\App\Chapters::find($attempt->topic_id))['name'] }}
                                            @elseif($attempt->topic_type == 'process')
                                                {{Transcode::evaluate(\App\Process_group::find($attempt->topic_id))['name']}} {{ $attempt->part_id ? '[Part '.$attempt->part_id.']': '' }}
                                            @elseif($attempt->topic_type == 'mistake')
                                                @if($attempt->topic_id == 1)
                                                    {{__('User/quizHistory.chapters-mistakes')}}
                                                @elseif($attempt->topic_id == 2)
                                                    {{__('User/quizHistory.processes-mistakes')}}
                                                @elseif($attempt->topic_id == 3)
                                                    {{__('User/quizHistory.exam-mistakes')}}
                                                @endif
                                            @else
                                                @php
                                                    $st = explode('Exam', Transcode::evaluate(\App\Exam::find($attempt->topic_id))['name']);
                                                @endphp
                                                {{ $st[1] }} 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="text-center">{{$attempt->score}}% </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="text-center">
                                            @if($attempt->score >= 75)
                                                <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                            @else
                                                <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-center">
                                            @php
                                                $hours = 0;
                                                $mins = 0;
                                                $sec = 0;
                                                if($attempt->time_left != 0)
                                                {
                                                    $hours = floor($attempt->time_left/3600);
                                                    $mins = floor( ($attempt->time_left%3600) / 60);
                                                    $sec = floor(($attempt->time_left%3600) % 60);
                                                }
                                            @endphp
                                            {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="text-center">Not completed</div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOneCards-{{ $attempt->id }}" class="collapse " data-bs-parent="#accordionCards" >
                        <div class="card-body accordion-content py-0 row">
                            <div class="table-heading body-row  d-flex justify-content-between">
                                <div class="col-lg-3 mb-2 mb-lg-1" >
                                    <div class="text-start" style="padding-left:25px !important">{{ $st[0].' Exam' }}</div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="text-start">{{ $st[1] }}</div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="text-center">{{$attempt->score}}%</div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="text-center">
                                        @if($attempt->score >= 75)
                                                <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                            @else
                                                <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="text-center">
                                        @php
                                            $hours = 0;
                                            $mins = 0;
                                            $sec = 0;
                                            if($attempt->time_left != 0)
                                            {
                                                $hours = floor($attempt->time_left/3600);
                                                $mins = floor( ($attempt->time_left%3600) / 60);
                                                $sec = floor(($attempt->time_left%3600) % 60);
                                            }
                                        @endphp
                                        {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @php
                                        $date = \Carbon\Carbon::parse($attempt->updated_at);
                                    @endphp
                                    <div class="text-center">{{$date->diffForHumans()}}</div>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{route('QuizHistory.show', $attempt->id)}}" class="d-block text-start" style="color: var(--text-accent) !important;cursor: pointer;font-weight: 400;font-size: 16px;margin-left: -15px;width: 72%;}">Review questions</a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>

<!-- Mobile cards -->
            <div  id="accordionCards" class="row mobile-view card d-flex " style="background:var(--bg-main)">
                @foreach($attempts as $attempt)
                    <div class="accord-card">
                    <div class="d-flex accordion-toggle" role="button" data-bs-toggle="collapse" data-bs-target="#collapseOneCards-{{ $attempt->id }}"  aria-expanded="true" aria-controls="collapseOneCards-1">
                        <div class="card-body" style="min-height: 64px; padding: 13px 16px 0px 21px;">
                            <button type="button"class="card-btn btn" data-toggle="collapse" data-target="#collapseOne">
                                    <b class="header-title float-left"></b>
                                        <div class="d-flex align-items-center me-3">
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 0.999999L7 7L1 13" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                </button>
                                <div class="table-heading d-flex justify-content-between">
                                    <div class="col-12 mb-2 mb-lg-1" >
                                        <div class="text-start" style="padding-top:6px !important;padding-left: 19px;"><bold></bold> <span>{{ $attempt->name }}</span> </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div id="collapseOneCards-{{ $attempt->id }}" class="collapse" data-bs-parent="#accordionCards" style="">
                        <div class="card-body accordion-content py-0 row">
                            @if($attempt->topic_type == 'chapter')
                                {{Transcode::evaluate(\App\Chapters::find($attempt->topic_id))['name'] }}
                            @elseif($attempt->topic_type == 'process')
                                {{Transcode::evaluate(\App\Process_group::find($attempt->topic_id))['name']}} {{ $attempt->part_id ? '[Part '.$attempt->part_id.']': '' }}
                            @elseif($attempt->topic_type == 'mistake')
                                @if($attempt->topic_id == 1)
                                    {{__('User/quizHistory.chapters-mistakes')}}
                                @elseif($attempt->topic_id == 2)
                                    {{__('User/quizHistory.processes-mistakes')}}
                                @elseif($attempt->topic_id == 3)
                                    {{__('User/quizHistory.exam-mistakes')}}
                                @endif
                            @else
                                @php
                                    $st = explode('Exam', Transcode::evaluate(\App\Exam::find($attempt->topic_id))['name']);
                                @endphp
                                 
                            @endif
                            <div class="table-heading body-row  d-flex flex-column justify-content-between align-items-start gap-4">
                                <div class="text-start"><strong>Num of questions</strong> <span>{{ $st[1] }}</span> </div>
                                <div class="text-center"><strong>Grade</strong> <span>{{$attempt->score}}%</span> </div>
                                <div class="text-center"><strong>Overall</strong><span>
                                    @if($attempt->score >= 75)
                                        <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                    @else
                                        <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                    @endif
                                </span></div>
                                <div class="text-center"><strong>Duration</strong><span>
                                     @php
                                        $hours = 0;
                                        $mins = 0;
                                        $sec = 0;
                                        if($attempt->time_left != 0)
                                        {
                                            $hours = floor($attempt->time_left/3600);
                                            $mins = floor( ($attempt->time_left%3600) / 60);
                                            $sec = floor(($attempt->time_left%3600) % 60);
                                        }
                                    @endphp
                                {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                </span></div>
                                <div class="text-center"><strong>Time of completion</strong><span>15 days ago</span></div>
                            </div>
                            <div class="table-heading body-row  d-flex flex-column justify-content-between align-items-start gap-4">
                                <div class="text-start"><strong>Name : </strong> <span>{{ $st[0].' Exam' }}</span> </div>
                                <div class="text-start"><strong>Num of questions</strong> <span>{{ $st[1] }}</span> </div>
                                <div class="text-center"><strong>Grade</strong> <span>{{$attempt->score}}%</span> </div>
                                <div class="text-center"><strong>Overall</strong><span>
                                    @if($attempt->score >= 75)
                                        <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                    @else
                                        <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                    @endif
                                </span></div>
                                <div class="text-center"><strong>Duration</strong><span>
                                    @php
                                        $hours = 0;
                                        $mins = 0;
                                        $sec = 0;
                                        if($attempt->time_left != 0)
                                        {
                                            $hours = floor($attempt->time_left/3600);
                                            $mins = floor( ($attempt->time_left%3600) / 60);
                                            $sec = floor(($attempt->time_left%3600) % 60);
                                        }
                                    @endphp
                                {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                </span></div>
                                @php
                                    $date = \Carbon\Carbon::parse($attempt->updated_at);
                                @endphp
                                <div class="text-center"><strong>Time of completion</strong><span>
                                    {{$date->diffForHumans()}}
                                </span></div>
                                <div class="text-center"><a href="{{route('QuizHistory.show', $attempt->id)}}" style="color: var(--text-accent) !important;font-weight: 400;font-size: 16px;}">Review questions</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

{{--        <div class="row">--}}
{{--            <div class="col-12 text-center">--}}
{{--                <button class="btn btn-outline-primary sw-25">Load More</button>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Content End -->
</div>
@endsection
