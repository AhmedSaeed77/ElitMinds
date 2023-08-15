@extends('layouts.public')
@php
    use Illuminate\Support\Facades\DB;
    $topic = DB::table('course_details')->join('courses', 'course_details.course_id', '=', 'courses.id')
        // ->where('course_details.id', request()->topic_id)
        ->select('course_details.*', 'courses.title AS course_title')
        ->get();
    if(!$topic){
        return redirect()->to(route('index'));
    }
@endphp


{{-- @php

    use Illuminate\Support\Facades\DB;
    $courses_array = [];
    $courses = DB::table('courses')->where('private', 0)->orderBy('z_index')->get();

    $courses_details = DB::table('course_details')->whereIn('course_id', $courses->pluck(['id']))->get();
    foreach($courses as $course){
        array_push($courses_array, [
            'course_id'     => $course->id,
            'slug'          => $course->slug,
            'course_title'  => $course->title,
            'topics'        => $courses_details->filter(function($row)use($course){return $row->course_id == $course->id;})
        ]);
    }
    $routeName = Route::currentRouteName();
@endphp
 --}}



@section('content')
    <div class="section page-banner">

        <img class="shape-1 animation-round" src="{{asset('index-assets/images/shape/shape-8.png')}}" alt="Shape">

        <img class="shape-2" src="{{asset('index-assets/images/shape/shape-23.png')}}" alt="Shape">

        <div class="container">
            <!-- Page Banner Start -->
            <div class="page-banner-content">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"> AllCourses </li>
                </ul>
                <h2 class="title"></h2>
            </div>
            <!-- Page Banner End -->
        </div>


        <!-- Shape Icon Box Start -->
        <div class="shape-icon-box">

            <img class="icon-shape-1 animation-left" src="{{asset('index-assets/images/shape/shape-5.png')}}" alt="Shape">

            <div class="box-content">
                <div class="box-wrapper">
                    <i class="flaticon-badge"></i>
                </div>
            </div>

            <img class="icon-shape-2" src="{{asset('index-assets/images/shape/shape-6.png')}}" alt="Shape">

        </div>
        <!-- Shape Icon Box End -->

        <img class="shape-3" src="{{asset('index-assets/images/shape/shape-24.png')}}" alt="Shape">

        <img class="shape-author" src="{{asset('index-assets/images/author/author-11.jpg')}}" alt="Shape">

    </div>
    {{-- @foreach ($topic as $t )
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-12">
                    <!-- Blog Details Wrapper Start -->
                         <div class="blog-details-wrapper">
                        <div class="blog-details-description">
                            <p>{!! $t->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      @endforeach --}}
  <div class="container mb-5">
     <div class="row">
   
              
                    <!-- All Courses Wrapper Start -->

                       
                            @foreach($popular_courses as $package)
                            
                                <div class="col-lg-4 col-md-6">
                                    <!-- Single Courses Start -->
                                     <a href="{{route('public.package.view', $package->package->id)}}">
                                    <div class="single-courses">
                                        <div class="courses-images">
                                            <a href="{{route('public.package.view', $package->package->id)}}"><img src="{{url('storage/package/imgs/'.basename($package->package->img))}}" alt="Courses"></a>
                                        </div>
                                       
                                        <div class="courses-content">
                                             
                                            <div class="courses-author">
                                                <a href="{{route('public.package.view', $package->package->id)}}">
                                                <div class="author">
                                                    <div class="author-name">
                                                        <a class="name"href="{{route('public.package.view', $package->package->id)}}">{{$package->package->course_title}}</a>
                                                    </div>
                                                </div>
                                               
                                                </a>
                                            </div>
                                                
                                            <h4 class="title"><a href="{{route('public.package.view', $package->package->id)}}">{{$package->package->name}}</a></h4>
                                            <a href="{{route('public.package.view', $package->package->id)}}">
                                            <div class="courses-meta">
                                               
                                                <span> <i class="icofont-clock-time"></i> {{$package->package->total_time}} Hrs</span>
                                                <span> <i class="icofont-read-book"></i> {{$package->lessons_number}} Lectures </span>
                                               
                                            </div>
                                             </a>
                                            <div class="courses-price-review">
                                                {{-- {{ route('paytabs_payment_test',$package->package->id) }} --}}
                                                <a href="" class="courses-price">
                                                    @if($package->pricing['localized_price'] == $package->pricing['localized_original_price'])
                                                    <span class="sale-parice">{{$package->pricing['localized_price']}} {{$package->pricing['currency_code']}}</span>
                                                    @else
                                                    <span class="sale-parice">{{$package->pricing['localized_price']}} {{$package->pricing['currency_code']}}</span>
                                                    <span class="old-parice">{{$package->pricing['localized_original_price']}} {{$package->pricing['currency_code']}}</span>
                                                    @endif
                                                </a>
                                                 
                                                <div class="courses-review">
                                                    <span class="rating-count">{{round($package->package->rate, 2)}}</span>
                                                    <span class="rating-star">
                                                            <span class="rating-bar" style="width: {{round($package->package->rate)*100/5}}%;"></span>
                                                    </span>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    <!-- Single Courses End -->
                                </div>
                                
                          @endforeach
                
                
                    <!-- All Courses Wrapper End -->
      
              
                </div>
          </div>
@endsection
