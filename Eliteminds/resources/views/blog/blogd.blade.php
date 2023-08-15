@extends('layouts.layoutV3')
@section('css')
    <link rel="stylesheet" href="{{ asset('layV3/style/blogs.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <style>
               .blogItemFix img {
            width: 100%;
        }
        .pagination{
            display:none !important;
        }
        @media only screen and (max-width: 700px) {
            .container{
                   overflow-x :hidden !important;
            }

* {
font-family: "Roboto" !important;
}

            .card{
                width:290px!important;
                max-width:290px!important;
                margin-left:20px!important;
            }
            .blog-in-small-screen{
               margin:0; padding-left:0!important;
               padding-right:0!important;
            }
            .feature-blog-card{
            position: relative !important;
            left: 0.5em !important;
            }
        }
        .feature-blogs-title{
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            color: #4B4B4D;
            margin-bottom:5px;
        }
        .feature-blogs li{
            display:flex;
            align-items:center;
            gap:2px;
        }
        .feature-blogs li a{
            font-family: 'Roboto';
            font-style: normal !important;
            font-weight: 400 !important;
            font-size: 16px !important;
            color: #ADADAD !important;
            line-height: 19px !important;
        }
        .feature-blogs li a:hover{
            color: #F58634 !important;
            cursor: pointer !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
@endsection
@section('seodata')
    <!-- part 1 -->
    @php
            $setting = \App\AllSetting::where('id',1)->first();
        @endphp
    <div class="col-12 container marginTop">
        <div class="row col-12 d-flex">
            <div class="col-md-7 col-12">
                <h1 class="Roboto textGrey fw-bold h1">{{__('messages.Blogs')}}</h1>

                <p class="Roboto textGrey blog-in-small-screen fw-lighter fs-6 mb-5 ">
                    {!!  $setting->allblog !!}
                  
                </p>
            </div>
        </div>
    </div>

    <!-- part2 -->
    <div class="container">
        <div class="category-tabs">
            <div class="form-group">
                <select name="section_id" id="section_id" class="form-control"
                    onchange="window.location.replace('{{ route('public.blog.indexelement') . '?section_id=' }}'+this.value)">
                    <option value="">Choose the blog</option>
                    @foreach (\App\Section::all() as $section)
                        <option value="{{ $section->id }}" {{ request()->section_id == $section->id ? 'selected' : '' }}>
                            {{ Transcode::evaluate($section)['title'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 py-5 " >
                <!-- search -->
                <!-- <form class="col-12">
                    <div class="mb-3 col-12">
                      <input
                        type="search"
                        class="form-control col-12 py-3"
                        id="search"
                        aria-describedby="search"
                        name="search"
                        placeholder="Search in Certificate"
                      />
                    </div>
                  </form> -->
                <!-- card s -->
                <div class="row col-12  justify-content-start align-items-center">
                    <div class="row ">
                        <!-- card -->
                        @foreach($posts as $post)
                        <div class="col-12 col-md-5 mb-4 me-5" style="max-width: 285px">
                            <div class="card borderwarning rounded-4">
                                @php
                                    $urls = [];
                                    preg_match('~<img.*?src=["\']+(.*?)["\']+~', $post->content, $urls);
                                    $cover = '';
                                    if(count($urls) >= 2) 
                                    {
                                        $cover = $urls[1];
                                    }
                                   
                                @endphp
                                <img src="{{$cover ? $cover: 'https://via.placeholder.com/300'}}" class="card-img-top imageCardBlog" alt="..." />
                                <div class="card-body">
                                    <p class="Roboto textGrey fw-normal">
                                        {{$post->title}}
                                    </p>
                                    <div
                                        class="col-12 d-flex align-items-center justify-content-between flex-md-row flex-column">
                                        <p class="col-md-12 col-12 d-flex justify-content-start align-items-center gap-2">
                                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="19" cy="19" r="18" stroke="#F2F2F2"
                                                    stroke-width="2" />
                                                <path
                                                    d="M11 11V27C11 28.1046 11.8954 29 13 29H24C25.1046 29 26 28.1046 26 27V11C26 9.89543 25.1046 9 24 9H13C11.8954 9 11 9.89543 11 11Z"
                                                    stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                                                <path
                                                    d="M11 16.5H16M26 16.5H21M11 20.5H26M11 24.5H26M16 16.5V29M16 16.5H21M21 16.5V29M16 10.5V6.5M21.5 10.5V6.5"
                                                    stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                                            </svg>

                                            {{\Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </p>
                                        <!--<div class="col-md-6 col-12 d-flex justify-content-end align-items-center">-->
                                        <!--    <img src="./images/image 41.png" alt="" />-->
                                        <!--</div>-->
                                    </div>
                                    <div>
                                        <hr class="opacity-75 hr" />
                                        <a href="{{route('public.post.view', $post->slug ?? $post->id)}}"
                                            class="d-flex justify-content-center align-items-center textOrang text-decoration-none">
                                            Read Articale
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                                <path d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1" stroke="#F58634"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {!! $posts->links() !!}
                    </div>
                </div>
                <!--<a type="button" class="btn Roboto mt-5" href="{{ route('public.blog.indexelement') }}"-->
                <!--    style="-->
                <!--color: #f58634;-->
                <!--border: 1px solid #f58634;-->
                <!--border-radius: 40px;-->
                <!--display: block;-->
                <!--margin: 0 auto;-->
                <!--padding: 13px 50px;-->
                <!--font-size: 16px;">-->
                <!--    Load More-->
                <!--</a>-->
            </div>
<div class="col-12 col-lg-4 mt-5 feature-blog-card">
                <div class="bg-light p-4 rounded-4 mb-4 w-100" >
                    <input placeholder="Search in Blogs" class="form-control py-3 mb-5" type="search" style="background-color: #fff !important"> 
                    <p class="Roboto fw-normal feature-blogs-title">Feature Blogs</p>
                    <ul class="feature-blogs" >
                         @foreach(\App\Post::inRandomOrder()->limit(5)->get(); as $poppost)
                         <li>
                            <a href="#">
                                {{ $poppost->title }} 
                            </a>    
                        </li>
                        @endforeach
                    </ul>
                    <p class="Roboto feature-blogs-title" style="margin-top:28px">Most Popular Blogs</p>
                    <ul class="feature-blogs" >
                        <li> <a href="#">Professional in Business Analysis</a> </li>
                        <li> <a href="#">Professional in Business Analysis</a> </li>
                        <li> <a href="#">Professional in Business Analysis</a> </li>
                        <li> <a href="#">Professional in Business Analysis</a> </li>

                    </ul> 
                </div>
                <div style="position: sticky;top: 100px;">
                    <div class="bg-light p-4 rounded-4">
                        <p class="Roboto fw-semibold textGrey">Contact Us</p>
                        <div class="col-12 d-flex justify-content-start align-items-center flex-column">
                            <form class="w-100 col-12" action="{{ route('review.storemesasage') }}" method="POST">
                                @csrf
                                <div class="mb-3 col-12">
                                    <input type="text" class="form-control" id="fullName" name="fullName"
                                        placeholder="Full Name" required/>
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        name="email" placeholder="Email" required/>
                                </div>
                                <div class="mb-3 col-12">
                                    <textarea class="form-control rounded-4" id="exampleFormControlTextarea1" rows="4" name="Message"
                                        placeholder="Message" required></textarea>
                                </div>
                                <div class="mt-3 col-12">
                                    <button type="submit" class="btn bgorange text-white col-12 text-center Roboto">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        </div>
    </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
@endsection
