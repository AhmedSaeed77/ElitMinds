@php
    $thisUser = Auth::user();
    $userCourses = Cache::remember('userCoursesCached'.$thisUser->id, 300, function()use($thisUser){
        return \Illuminate\Support\Facades\DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->join('courses', 'packages.course_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title'
            )
            ->groupBy('courses.id')
            ->get();
    });
   
    $coursematerial = \App\Material::where('course_id', '=', $course_id)->where('title','=','COURSE MATERIAL')->first();
@endphp

@extends('layouts.layoutV2')

@section('content')
<link rel="stylesheet" href="{{asset('helper/css/studyIndex.css')}}">

    <div class="container">
     <header class="study-header">
        <h1>Study resources</h1>
        <p>
            <span>
            Empower your career with our extensive
            </span> 
        study resources for achieving success in professional certification exams!</p>
     </header>
        <div class="row desktop-view">
            <div class="col-12 col-lg-4">
                <ul class="study-items">
                    @foreach($userCourses as $c)
                    <a href="{{ route('material.show', $c->id) }}">
                    <li  class="study-item 
                        @isset($course_id)
                        @if($course_id == $c->id)  active @endif
                        @endisset " >{{$c->title}}</li>
                    </a>
                        @endforeach
                </ul>
            </div>
            <div class="col-12 row col-lg-8">
                @isset($course_id)
                    @if(\App\Material::where('course_id', '=', $course_id)->get()->first())
                        <div class="material-card col-12  ">
                            <img src="{{asset('storage/material/'.basename($coursematerial->cover_url))}}" alt="">
                            <h2>{{$coursematerial->title}}</h2>
                            <a href="{{route('download.material', $coursematerial->id)}}">Download now</a>
                        </div>
                        @foreach(\App\Material::where('course_id', '=', $course_id)->get() as $m)
                            @if($m->title != 'COURSE MATERIAL')
                                <div class="material-card col-12 col-md-4 ">
                                    <img src="{{asset('storage/material/'.basename($m->cover_url))}}" alt="">
                                    <h2>{{$m->title}}</h2>
                                    <a href="{{route('download.material', $m->id)}}">Download now</a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endisset
                
            </div>
        </div>
        <div class="mobile-view">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($userCourses as $c)
                
                <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $c->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{$c->title}}
                            </button>
                        </h2>
                        <div id="flush-collapseOne{{ $c->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                @isset($course_id)
                                    @if(\App\Material::where('course_id', '=', $course_id)->get()->first())
                                        <div class="material-card col-12  ">
                                            <h2>{{$coursematerial->title}}</h2>
                                            <a href="{{route('download.material', $coursematerial->id)}}">Download now</a>
                                        </div>
                                        @foreach(\App\Material::where('course_id', '=', $course_id)->get() as $m)
                                            @if($m->title != 'COURSE MATERIAL')
                                                <div class="material-card col-12 col-md-5 ">
                                                    <h2>{{$m->title}}</h2>
                                                    <a href="{{route('download.material', $m->id)}}">Download now</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endisset 
                            </div>
                        </div>
                </div>
                
                @endforeach
            </div>
            </div>
        </div> 
@endsection