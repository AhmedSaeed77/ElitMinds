@extends('layouts.layoutV3')


@section('seodata')
    <title>
        {{ app()->getLocale() == 'en' ? $courseModel->title : Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}
    </title>
    <meta name="title" content="{{ $coursdetails->meta_title ?? '' }}">
    <meta name="description" content="{{ $coursdetails->meta_description ?? '' }}">
    <meta property="og:site_name" content="Eliteminds">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:description" content="{{ $coursdetails->meta_description ?? '' }}">
    <meta property="og:title"
        content="{{ app()->getLocale() == 'en' ? $courseModel->title : Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ $courseModel->cover ?? '' }}" />
    <meta name="twitter:site"
        content="{{ app()->getLocale() == 'en' ? $courseModel->title : Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}" />
    <meta name="twitter:card" content="">
    <meta name="twitter:title"
        content="{{ app()->getLocale() == 'en' ? $courseModel->title : Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}">
    <meta name="twitter:description" content="{{ $coursdetails->meta_description ?? '' }}">
    <meta name="twitter:image" content="{{ $courseModel->cover ?? '' }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta name="keywords" content="{{ $coursdetails->keywords ?? '' }}">
    <meta name="author" content="Eliteminds">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "article",
      "url":"{{Request::url() }}",
      "name": "{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}",
      "description": "{{ $coursdetails->meta_description ?? ''  }}",
      "provider": {
        "@type": "Organization",
        "name": "Eliteminds",
        "sameAs": "https://eliteminds.co"
      }
    }
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "Course",
            "url":"{{Request::url() }}",
            "name": "{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}",
            "description": "{{ $coursdetails->meta_description ?? ''  }}",
            "provider": {
              "@type": "Organization",
              "name": "Eliteminds",
              "sameAs": "https://eliteminds.co"
           }
          }
        }
      ]
    }
    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('layV3/style/certifione.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <style>
        .blogItemFix img {
            width: 100%;
        }

        .img-svg:before {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);

        }
        * {
font-family: "Roboto" !important;
}

        .img-svg.active {
            /*transition:all 0.5s;*/
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);

        }
                 /* Thumbnail */
        .video-wrapper{
            position: relative;
            height:auto;
            overflow:hidden;
        }
        #vimeoPlayer, #vimeoPlayerLg{
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        border: 4px solid #D8D8D8 !important;
        border-radius:30px;
        overflow:hidden;
        }
        #vimeoPlayerLg{
        border: 10px solid #4B4B4D !important;
        margin-top: 140px;
        }
        #vimeoPlayer iframe, #vimeoPlayerLg iframe{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
        #videoThumb, #videoThumbLg{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        z-index: 5;
        background:#F2F4F6;
        cursor: pointer;
        }
        #videoThumb img, #videoThumbLg img{
            width:100%;
        }
        #videoThumbLg img{
            height:100%
        }
        
        #videoContainer > iframe
        {
            max-width: 100% !important;
        }

        iframe {
            width: 100%
        }

        .active-card {
            border: 2px solid orange;
            display:none;
        }
        .accordion{
         --bs-accordion-active-color: none !important;
        --bs-accordion-active-bg: none !important;
        }


        /* Reviews section */

        .reviews{
        background: #FFFFFF;
        border: 2px solid #F2F2F2;
        border-radius: 18px;
        padding: 53px 10%;
        width: 90%;
        margin: 0 auto;
        position: relative;
        min-height:418px;
        }
        .reviews-img{
        position:relative;
        height:250px;
        margin-top: 50px !important;

        }
        .reviews-img img {
        position: relative;
        z-index: 2;
        width:175px;
        height:175px;
        border-radius:50%;
        }
        .reviews-img .img-mask{
        position: absolute;
        top: 8px;
        left: 13px;
        }
        .reviews-content{
        position: relative;
        padding: 42px 10px 30px 45px !important;
        }
        .reviews-content .left-quote{
        position: absolute;
        top:0px;
        left:0px;
        z-index: -1;
        }
        .reviews-content .right-quote{
        position: absolute;
        bottom:0px;
        right:0px;
        z-index: -1;
        }
        .reviews-name{
        font-weight: 700;
        font-size: 20px;
        color: #4B4B4D;
        }
        .reviews-para{
        font-weight: 300;
        font-size: 16px;
        color: #4B4B4D;
        }
        @media screen and (max-width:992px){
        .reviews{
            width:100%;
        }
        .reviews-img  {
            text-align:center;
        }
        .reviews-img .img-mask{
            left: 50%;
            transform: translateX(-50%);
        }
        
        .reviews-content .left-quote{
            left:20px;
        }
        .reviews-content .right-quote{
            right:20px;
            }
        }
        .swiper-pagination-bullet{
        width: 18px;
        height: 18px; 
        background: #F2F2F2;
        border: 1px solid #000;

        }
        .swiper-pagination-bullet-active{
        border: 2px solid #F58634;
        }
        .swiper-pagination-2{
        bottom: 30px;
        }
    
        /* Accordion */
        .accordion-button:focus{
            box-shadow: none !important;

        }
        /* FAQ section */
        #faq{
            position: relative;
        }
        .faq-icon{
            position: absolute;
            right:0;
            top:170px;
            transform: translateY(-50%)
        }
        #faqAccordion{
            width:70%
        }
        @media screen and (max-width:992px){
            #faqAccordion{
            width:100%
        }   
        .faq-icon{
            display:none;
            }
        }
        .accordion-item{
            border: none !important;
        }
        #faqAccordion .accordion-button{
            background: #f2f2f2;
            border:none;
            border-radius:14px;
            margin: 13px 0px;
            height:57px;
        }
        .accordion-button:not(.collapsed)::after{
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23F58634'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e") !important;
        }
        
         .section-title{
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            color: #4B4B4D;
            text-align:center

        }
        #TrainingOptions{
            padding-top:140px !important
        }
        .popular{
            background:#F58634 !important;
            color:#fff !important
        }
         .certification-container{
             position:relative;
            }
         .certification-container svg{
             position:absolute;
             right:0;
             top:-33px;
            }
        .certification-img{
            max-width: 100%;
            max-height: 574px;
            z-index:3;
            margin-right: 15px;
            background: #FFF;
            box-shadow: 2px 3px 4px 0px rgba(0, 0, 0, 0.25), -1px -1px 4px 0px rgba(0, 0, 0, 0.25);
            padding:10px;
        }
        @media screen and (max-width:992px) {
            .certification-container{
                margin-top:40px !important;
            }
        }

         .accordion.example2{
             box-shadow:none;
             border:2px solid orange;
             border-radius:18px;
         }
         .accordion-item{
             border-bottom: 1px solid #F58634 !important;

         }
        .accordion.example2::after{
           content:"";
           height:16px;
           width:100%;
           display:block;
           background: #F58634;
           border-radius: 0px 0px 18px 18px;
        } 
        .accordion.example2::before{
        content: "";
        height: 16px;
        width: 100%;
        display: block;
        background: #F58634;
        opacity: 0.1;
        border-radius: 18px 18px 0px 0px;
        } 
        .dynamic-para > *{
            color:  #4B4B4D;
            font-size: 16px;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            line-height: 126.688%;
            letter-spacing: -0.24px;
            max-width:78%;
        }
        .dynamic-para-2 *{
            /*color: var(--black, #4B4B4D);*/
            /*font-size: 14px;*/
            /*font-family: Roboto;*/
            /*font-style: normal;*/
            /*font-weight: 300;*/
            /*line-height: 124.688%;*/
            /*letter-spacing: -0.21px;*/
        }
        .cer-feature{
            border-radius: 11px;
            border: 2px solid #D8D8D8;
            background: var(--light-blue, #F2F5F6);
            padding:22px 24px;
            display:flex;
            align-items:center;
            gap:18px;
            margin-bottom:21px;
        }
        .cer-feature h4{
            color:  #4B4B4D;
            font-size: 20px;
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.3px;
        }
        .cer-feature p{
            color:  #4B4B4D !important;
            text-align: justify;
            font-size: 14px !important;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300 !important;
            line-height: 124.688%;
            letter-spacing: -0.21px;
        }
        .accordion-button span:first-of-type{
            color: #4B4B4D;
            font-size: 16px;
            font-family: Roboto;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: -0.24px;
 
        }
        .accordion-button span:last-of-type{
            color: #4B4B4D;
            font-size: 14px;
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: -0.21px;
        }
        .review-img{
            width:95px;
            height:95px;
            border-radius: 50%;
        }
        .review-img-alternative{
            width:95px;
            height:95px;
            border-radius: 50%;
            color: #000;
            font-size: 36px;
            font-family: Roboto;
            font-weight: 700;
            letter-spacing: -2.54px;
            background: #D9D9D9;
            display:flex;
            align-items:center;
            justify-content:center;
            text-transform:uppercase;
        }
        .review-comment{
            margin-top:26px;
            color:  #4B4B4D;
            text-align: justify;
            font-size: 16px;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            line-height: normal;
            letter-spacing: -0.24px;
        }
        #navbar-example2{
            position: sticky;
            top: 79px;
            left: 0;
            z-index:99;
        }
        #navbar-example2 .nav-item a{
            border-radius:0px;
            border-bottom: 2px solid transparent !important;
            transition:all 0.3s ease-in-out;
        }
        #navbar-example2 .nav-item a.active, #navbar-example2 .nav-item:hover a{
            color:#f58634 !important;
             border-bottom: 2px solid #D8D8D8 !important;
        }
    </style>

    <meta property="og:type" content="article" />
@endsection
@section('content')
    {{-- 
 @if ($i->package->preview_video_url == null && $i->package->preview_video_url == '')
                            <img src="{{ url('storage/package/imgs/'.basename($i->package->img_large))}}" alt="Courses Details">
                            @endif
                            @if ($i->package->preview_video_url != null && $i->package->preview_video_url != '')
                                <video oncontextmenu="return false;" width="100%" controls controlsList="nodownload">
                                    <source src="{{url('storage/package/preview/'.basename($i->package->preview_video_url) )}}" type="video/mp4">
                                </video>
                            @endif --}}

    <!-- part 1 -->
<div class="col-12 container mb-5 marginTop ps-3" >
    <a href="{{ route('public.certificates') }}" class="Roboto textOrang fw-semibold fs-6 mb-5 text-decoration-none "> Back to
        Certficates </a>
    <div class="row col-12 d-flex my-5">
        <div class="col-md-6 col-12 mb-3 d-flex flex-column justify-content-between">
           <h2 class="Roboto textGrey fw-bold "> {{ $courseModel->title }}</h2>
           <div class="dynamic-para">
               {!! $coursdetails->short_description !!}
           </div>
            <div class=" d-flex flex-nowrap col-12 mt-4">
                <a type="button" class="btn bgorange  btnorange text-white  text-center Roboto px-5 py-2" href="#TrainingOptions">Enroll Now </a>
            </div>
        </div>

        <div class="col-md-6 col-12">
             <div id="vimeoPlayer">
                <!--<div id="videoThumb" onClick="playVideo()"><img src="{{asset('layV3/images/certificateThumbnail.png')}}" alt=""/></div>-->
                 <div id="videoThumb" onClick="playVideo()">
                    <img src="{{asset('images/certificate/thumnile/' .$coursdetails->thumnile1)}}" alt=""/>
                    <svg style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); cursor:pointer" width="98" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_1527_2591)">
                        <circle cx="50.5" cy="47.5" r="47.5" fill="#F2F2F2"/>
                        <circle cx="50.5" cy="47.5" r="45.5" stroke="#F58634" stroke-width="4"/>
                        </g>
                        <path d="M71 48L41 65.3205L41 30.6795L71 48Z" fill="#F58634"/>
                        <defs>
                        <filter id="filter0_d_1527_2591" x="0" y="0" width="98" height="98" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dx="-2" dy="2"/>
                        <feGaussianBlur stdDeviation="0.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1527_2591"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1527_2591" result="shape"/>
                        </filter>
                        </defs>
                    </svg>  
                </div>
            </div>
        <!-- {!! $courseModel->v1 !!} -->
        </div>
    </div>

</div>

<nav id="navbar-example2" class="navbar bg-light  mb-3 d-flex justify-content-center align-items-center">
        <ul class="nav nav-pills d-flex justify-content-center align-items-center gap-4 ">
            <li class="nav-item" >
                <a class="nav-link  p-3 " href="#Overviewes">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  p-3" href="#TrainingOptions">Training Options</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  p-3" href="#Curriculum">Curriculum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-3" href="#Certification">Certification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-3" href="#Reviews">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-3" href="#FAQ">FAQ</a>
            </li>

        </ul>
    </nav>
    <!-- Overview -->
    <div id="Overviewes" class="container section">
        <div class="row col-12">
            <div class="col-lg-8 col-md-6 col-12">
                <p class="Roboto fw-semibold textGrey">Certificate Description</p>
                <div >
                    {!! $coursdetails->description  !!}
                </div>    
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="col-12 bg-light p-4 rounded-4">
                    <p class="Roboto fw-semibold textGrey">Contact Us</p>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="col-12 d-flex justify-content-start align-items-center flex-column">
                        <form class="w-100 col-12 px-3" action="{{ route('review.storemesasage') }}"
                            method="POST">
                            @csrf
                            <div class="mb-3 col-12">
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    placeholder="Full Name" required>
                            </div>
                            <div class="mb-3 col-12">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3 col-12">
                                <textarea class="form-control rounded-4" id="exampleFormControlTextarea1" rows="4" name="Message"
                                    placeholder="Message" required></textarea>
                            </div>
                            <div class="mt-3 col-12">
                                <button type="submit"
                                    class="btn bgorange text-white col-12 text-center Roboto">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div id="vimeoPlayerLg">
                <!--<div id="videoThumbLg" onClick="playVideoLg()"><img src="{{asset('layV3/images/videoThumb-certificate-lg.png')}}" alt=""/></div>-->
                <div id="videoThumbLg" onClick="playVideoLg()">
                    <img src="{{asset('images/certificate/thumnile/'.$coursdetails->thumnile2)}}" alt=""/>
                    <svg style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); cursor:pointer" width="98" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_1527_2591)">
                        <circle cx="50.5" cy="47.5" r="47.5" fill="#F2F2F2"/>
                        <circle cx="50.5" cy="47.5" r="45.5" stroke="#F58634" stroke-width="4"/>
                        </g>
                        <path d="M71 48L41 65.3205L41 30.6795L71 48Z" fill="#F58634"/>
                        <defs>
                        <filter id="filter0_d_1527_2591" x="0" y="0" width="98" height="98" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dx="-2" dy="2"/>
                        <feGaussianBlur stdDeviation="0.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1527_2591"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1527_2591" result="shape"/>
                        </filter>
                        </defs>
                    </svg>    
                </div>
            </div>


    </div>
    
    <div id="TrainingOptions" class="col-12 py-5 bg section">
        <p class=" container Roboto section-title">Training Options</p>
        <div class="container  py-5 d-flex justify-content-start align-items-center">
            <div class="d-flex col-12 flex-column flex-lg-row  justify-content-center gap-5 align-items-center align-items-lg-stretch px-2">
                @if ($coursdetails->plan_a)
                    @php
                        $plan_a = \App\Packages::find($coursdetails->plan_a);
                    @endphp
                    <div onclick="showPlanA()" id="planAToggle"
                        class="card plan-card col-lg-3 col-md-4 col-12 rounded-5 mb-md-0 mb-3"
                        style="width:300px;cursor:pointer; border: 2px solid transparent;">
                        <div class="card-body  rounded-5 position-relative d-flex flex-column">
                            <div style="height:22px;"></div>
                            <h3 class="card-title  fw-bold Roboto fs-5 textGrey text-center rounded-5" style="margin-top: 5px;    margin-bottom: 0px !important;">{{ $coursdetails->nameplan_a }}
                            </h3>
                            <!--<h6 class="card-subtitle mb-2 text-center textGrey Roboto fs-6 my-3">-->
                            <!--    {{ $plan_a->name }} </h6>-->
                            <div class="col-12 my-2 g-0 m-0">
                                <svg class="w-100" height="2" viewBox="0 0 262 2" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1H262" stroke="#F2F2F2" stroke-width="2" />
                                </svg>

                            </div>

                            {!! $plan_a->plandes !!}

                            <!--<p class="d-flex col-12">  <svg  width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                            <!--  <path d="M10.9529 21C16.4546 21 20.9058 16.5179 20.9058 11C20.9058 5.48211 16.4546 1 10.9529 1C5.45111 1 1 5.48211 1 11C1 16.5179 5.45111 21 10.9529 21Z" stroke="#F2F2F2" stroke-width="2"/>-->
                            <!--  <path d="M6.06934 13.0452L7.38066 14.4123C8.16496 15.2299 9.47117 15.2334 10.2598 14.42L16 8.5" stroke="#F58634" stroke-width="2" stroke-linecap="round"/>-->
                            <!--  </svg> <span  class="ps-2 textGrey Roboto fs-6">Lorem Ipsum is simply dummy text of the printing</span>-->
                            <!--</p>-->
                            <p class=" fw-bold Roboto fs-5 textGrey text-center mt-auto"> {{ $plan_a->price }}$
                            </p>
                            <div class="d-flex align-items-center justify-content-center px-4  fw-semibold Roboto fs-5 textGrey text-center ">
                               <a href="{{ route('public.package.view', $plan_a->slug) }}" class="btn bgorangeInline  text-center Roboto px-4 Roboto  textGrey text-center" style="font-size:16px; font-weight:500">Enroll Now</a>
                            </div>


                        </div>
                    </div>
                @endif
                <!-- card 2 -->
                @if ($coursdetails->plan_b)
                    @php
                        $plan_b = \App\Packages::find($coursdetails->plan_b);
                    @endphp
                    <div onclick="showPlanB()" id="planBToggle"
                        class="card plan-card col-lg-3 col-md-4 col-12 rounded-5  mb-md-0 mb-3"
                        style="width:300px;cursor:pointer;border: 2px solid orange;">
                        <div class="card-body  rounded-5 position-relative">
                            <div style="color:#fff; background: #F58634;border-radius: 20px;font-size: 13px; width:94px; height:22px; display:flex; justify-content:center; align-items:center; margin-left:auto"> Most Popular</div>
                            <h3 class="card-title  fw-bold Roboto fs-5 textGrey text-center" style="margin-top: 5px;">{{ $coursdetails->nameplan_b }}</h3>
                            <!--<h6 class="card-subtitle mb-2 text-center textGrey Roboto fs-6 my-3">{{ $plan_b->name }}</h6>-->
                            <div class="col-12 my-2 g-0 m-0">
                                <svg class="w-100" height="2" viewBox="0 0 262 2" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1H262" stroke="#F2F2F2" stroke-width="2" />
                                </svg>
                            </div>
                            {!! $plan_b->plandes !!}
                            <p class=" fw-bold Roboto fs-5 textGrey text-center"> {{ $plan_b->price }}$</p>
                            <div class="d-flex  align-items-center justify-content-center px-4  fw-semibold Roboto fs-5 textGrey text-center ">
                                <a href="{{ route('public.package.view', $plan_b->slug) }}" class="btn bgorangeInline popular text-center Roboto px-4 Roboto  textGrey text-center" style="font-size:16px; font-weight:500" style="color: #fff !important;">Enroll Now</a>

                            </div>


                        </div>
                    </div>                    
                    @endif
                <!-- card 3 -->
                @if ($coursdetails->plan_c)
                    @php
                        $plan_c = \App\Packages::find($coursdetails->plan_c);
                    @endphp
                    <div id="planCToggle"
                        onclick="showPlanC()"  class="card plan-card col-lg-3 col-md-4 col-12 rounded-5  mb-md-0 mb-3"
                        style="width:300px;cursor:pointer;border: 2px solid transparent;">
                        <div class="card-body  rounded-5 position-relative">
                           <div style="height:22px;"></div>

                            <h3 class="card-title  fw-bold Roboto fs-5 textGrey text-center rounded-5" style="margin-top: 5px;">{{ $coursdetails->nameplan_c }}
                            </h3>
                            <!--<h6 class="card-subtitle mb-2 text-center textGrey Roboto fs-6 my-3">Risk management-->
                            <!--    professional Risk management professional professional</h6>-->
                            <div class="col-12 my-2 g-0 m-0">
                                <svg class="w-100" height="2" viewBox="0 0 262 2" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1H262" stroke="#F2F2F2" stroke-width="2" />
                                </svg>

                            </div>

                            {!! $plan_c->plandes !!}

                            <p class=" fw-bold Roboto fs-5 textGrey text-center"> {{ $plan_c->price }}$
                            </p>
                            <div
                                class="   d-flex  align-items-center justify-content-center px-4  fw-semibold Roboto fs-5 textGrey text-center ">
                                @if (Auth::check() &&
                                        \App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $plan_c->id)->get()->first())
                                    <a href="{{ route('public.package.view', $plan_c->slug) }}"
                                        class="btn bgorangeInline  text-center Roboto   px-4  fw-semibold Roboto fs-5 textGrey text-center ">Enroll
                                        Now</a>
                                @else
                                    <a href="#"class="btn bgorangeInline  text-center Roboto px-4 Roboto  textGrey text-center" style="font-size:16px; font-weight:500">Already bought</a>
                                @endif
                            </div>


                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
    
    <!-- Curriculum -->
    <div id="Curriculum" class="col-12 py-5 section">
        <div class="container">
            <p style="color: #4B4B4D;font-size: 20px;font-family: Roboto;font-weight: 700;">Certificate Course Curriculum </p>
              <div class="row">
            <div class="col-12 col-lg-8">
                @include('course.contentdisplay')
            </div>
            <div class="col-12 col-lg-4 d-flex flex-column">
                <div class="cer-feature">
                    <img src="{{asset('layV3/images/feature-1.png')}}" alt=""/>
                    <div>
                        <h4> {{ $coursdetails->caredname1 }} </h4>
                        <p> {!! $coursdetails->careddesc1 !!} </p>
                    </div>
                </div> 
                <div class="cer-feature">
                    <img src="{{asset('layV3/images/feature-2.png')}}" alt=""/>
                    <div>
                        <h4> {{ $coursdetails->caredname2 }} </h4>
                        <p> {!! $coursdetails->careddesc2 !!} </p>
                    </div>
                </div> 
                <div class="cer-feature">
                    <img src="{{asset('layV3/images/feature-3.png')}}" alt=""/>
                    <div>
                        <h4> {{ $coursdetails->caredname3 }} </h4>
                        <p> {!! $coursdetails->careddesc3 !!} </p>
                    </div>
                </div> 
                <div class="cer-feature">
                    <img src="{{asset('layV3/images/feature-4.png')}}" alt=""/>
                    <div>
                        <h4> {{ $coursdetails->caredname4 }} </h4>
                        <p> {!! $coursdetails->careddesc4 !!} </p>
                    </div>
                </div>
                <div class="cer-feature">
                    <img src="{{asset('layV3/images/feature-5.png')}}" alt=""/>
                    <div>
                        <h4> {{ $coursdetails->caredname5 }} </h4>
                        <p> {!! $coursdetails->careddesc5 !!} </p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
      



        <!-- Reviews -->
<div id="Reviews" class="col-12 py-5 g-0 m-0  imageCertification" >
    <p class=" container Roboto text-center section-title">Reviews</p>
    <!-- <div
        class="container d-flex justify-content-center align-items-center bg-white rounded-5 p-5 flex-column">
        {{-- <div class="slideshow-container  d-flex justify-content-center align-items-center flex-column">
            <div class="mySlides flex-md-row flex-column justify-content-between">
                @foreach (\App\Rating::whereIn('package_id', [$coursdetails->plan_b, $coursdetails->plan_a, $coursdetails->plan_a])->orderBy('created_at', 'desc')->paginate(8) as $rate)
                    @if (\App\User::find($rate->user_id))
                        @php
                            $pic = asset('index-assets/images/author/author-' . rand(12, 16) . '.jpg');
                            if (\App\UserDetail::where('user_id', $rate->user_id)->first()) {
                                if (
                                    \App\UserDetail::where('user_id', $rate->user_id)
                                        ->get()
                                        ->first()->profile_pic != null
                                ) {
                                    $pic = url(
                                        'storage/profile_picture/' .
                                            basename(
                                                \App\UserDetail::where('user_id', $rate->user_id)
                                                    ->get()
                                                    ->first()->profile_pic,
                                            ),
                                    );
                                }
                            }
                        @endphp
                        <div
                            class=" col-md-5 col-12 d-flex flex-column justify-content-center align-items-center">
                            <img src="./images/Group 30.png" class="w-25">
                            <div class=" col-12 d-flex  justify-content-between ">
                                <p class="Roboto fw-semibold">john doe</p>
                                <p class="me-5"><svg width="88" height="16" viewBox="0 0 88 16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M80.4755 3.84549L80 2.38197L79.5245 3.84549L78.5142 6.95492H75.2447H73.7059L74.9508 7.85942L77.5959 9.78115L76.5855 12.8906L76.11 14.3541L77.355 13.4496L80 11.5279L82.645 13.4496L83.89 14.3541L83.4145 12.8906L82.4041 9.78115L85.0492 7.85942L86.2941 6.95492H84.7553H81.4858L80.4755 3.84549Z"
                                            fill="#F2F2F2" stroke="#D8D8D8" />
                                        <path
                                            d="M62.4755 3.84549L62 2.38197L61.5245 3.84549L60.5142 6.95492H57.2447H55.7059L56.9508 7.85942L59.5959 9.78115L58.5855 12.8906L58.11 14.3541L59.355 13.4496L62 11.5279L64.645 13.4496L65.89 14.3541L65.4145 12.8906L64.4041 9.78115L67.0492 7.85942L68.2941 6.95492H66.7553H63.4858L62.4755 3.84549Z"
                                            fill="#F2F2F2" stroke="#D8D8D8" />
                                        <path
                                            d="M44.4755 3.84549L44 2.38197L43.5245 3.84549L42.5142 6.95492H39.2447H37.7059L38.9508 7.85942L41.5959 9.78115L40.5855 12.8906L40.11 14.3541L41.355 13.4496L44 11.5279L46.645 13.4496L47.89 14.3541L47.4145 12.8906L46.4041 9.78115L49.0492 7.85942L50.2941 6.95492H48.7553H45.4858L44.4755 3.84549Z"
                                            fill="#F58634" stroke="#F58634" />
                                        <path
                                            d="M26.4755 3.84549L26 2.38197L25.5245 3.84549L24.5142 6.95492H21.2447H19.7059L20.9508 7.85942L23.5959 9.78115L22.5855 12.8906L22.11 14.3541L23.355 13.4496L26 11.5279L28.645 13.4496L29.89 14.3541L29.4145 12.8906L28.4041 9.78115L31.0492 7.85942L32.2941 6.95492H30.7553H27.4858L26.4755 3.84549Z"
                                            fill="#F58634" stroke="#F58634" />
                                        <path
                                            d="M8.47553 3.84549L8 2.38197L7.52447 3.84549L6.51416 6.95492H3.24472H1.70588L2.95082 7.85942L5.59586 9.78115L4.58555 12.8906L4.11002 14.3541L5.35497 13.4496L8 11.5279L10.645 13.4496L11.89 14.3541L11.4145 12.8906L10.4041 9.78115L13.0492 7.85942L14.2941 6.95492H12.7553H9.48584L8.47553 3.84549Z"
                                            fill="#F58634" stroke="#F58634" />
                                    </svg>
                                </p>
                            </div>
                            <div class="textGrey Roboto"> {{ $rate->review }} </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div> --}}

        {{-- <div style="text-align:center" class="mt-4">
            @foreach (\App\Rating::whereIn('package_id', [$coursdetails->plan_b, $coursdetails->plan_a, $coursdetails->plan_a])->orderBy('created_at', 'desc')->paginate(8) as $ratee)
                <span class="dot" onclick="currentSlide({{ $ratee->id }})"></span>
            @endforeach
        </div> --}}

    </div> -->
    <div class="reviews">
        <div class="swiper reviewsSwiper">
            <div class="swiper-wrapper ">
                @php
                    $reviews = DB::table('reviews')->where('course_id', $coursdetails->course_id)->get();
                  
                @endphp
            
                       @foreach($reviews as $review) 
                       
                        @php
                            $country = DB::table('newcountry')->where('id',$review->country_id)->first();
                        @endphp
                        
                        
                        @php
                            $first_character1 = substr($review->fname, 0, 1);
                            $first_character2 = substr($review->lname, 0, 1);
                            $name = $first_character1 ." ".$first_character2;
                         @endphp
                            <div class="swiper-slide px-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3" style="position:relative">
                                            @if($review->image)
                                            <img class="review-img" src="{{asset('/images/review/' . $review->image)}}" alt="" />
                                            @else
                                            <div class="review-img-alternative">
                                                {{ $name }}
                                            </div>
                                            @endif
                                            <img src="{{asset('/images/flags-medium/' . $review->imagecountry)}}" alt="" 
                                                style="width:32px; height:32px; position:absolute; bottom:0; right:0;border-radius: 50%;">
                                        </div>
                                        <div>
                                            <p class="Roboto" style="color: #4B4B4D;font-size: 20px;font-weight: 700;margin: 13px 0px 11px 0px;">{{ $review->fname }} {{ $review->lname }}</p>
                                            <p style="color: var(--black, #4B4B4D);font-size: 18px;margin:0">{{ $country->countryname }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        @php
                                            $star = $review->rates;
                                            $nostar = 5-$review->rates;
                                       @endphp
                                        @for($i=0;$i<$star;$i++)
                                        <!--Stared-->
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.47553 3.84549L8 2.38197L7.52447 3.84549L6.51416 6.95492H3.24472H1.70588L2.95082 7.85942L5.59586 9.78115L4.58555 12.8906L4.11002 14.3541L5.35497 13.4496L8 11.5279L10.645 13.4496L11.89 14.3541L11.4145 12.8906L10.4041 9.78115L13.0492 7.85942L14.2941 6.95492H12.7553H9.48584L8.47553 3.84549Z" fill="#F58634" stroke="#F58634"/>
                                        </svg>
                                        @endfor
                                        @for($i=0;$i<$nostar;$i++)
                                        <!--Not stared-->
                                       <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.47553 3.84549L8 2.38197L7.52447 3.84549L6.51416 6.95492H3.24472H1.70588L2.95082 7.85942L5.59586 9.78115L4.58555 12.8906L4.11002 14.3541L5.35497 13.4496L8 11.5279L10.645 13.4496L11.89 14.3541L11.4145 12.8906L10.4041 9.78115L13.0492 7.85942L14.2941 6.95492H12.7553H9.48584L8.47553 3.84549Z" fill="#F2F2F2" stroke="#D8D8D8"/>
                                        </svg>
                                        @endfor
                                    </div>
                                </div>
                                    <div class="review-comment"> {{ $review->comment }} </div>

                                <!--<div class="d-flex flex-column justify-content-center align-items-center">-->
                                <!--    <img src="{{asset('/images/review/' . $review->image)}}" class="w-25">-->
                                <!--    <div class=" col-12 d-flex justify-content-between mt-5">-->
                                <!--        <p class="Roboto fw-semibold">{{ $name }}</p>-->
                                <!--        <p class="me-5">-->
                                <!--            <svg width="88" height="16" viewBox="0 0 88 16"-->
                                <!--                fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                <!--                <path-->
                                <!--                    d="M80.4755 3.84549L80 2.38197L79.5245 3.84549L78.5142 6.95492H75.2447H73.7059L74.9508 7.85942L77.5959 9.78115L76.5855 12.8906L76.11 14.3541L77.355 13.4496L80 11.5279L82.645 13.4496L83.89 14.3541L83.4145 12.8906L82.4041 9.78115L85.0492 7.85942L86.2941 6.95492H84.7553H81.4858L80.4755 3.84549Z"-->
                                <!--                    fill="#F58634" stroke="#F58634" />-->
                                <!--                <path-->
                                <!--                    d="M62.4755 3.84549L62 2.38197L61.5245 3.84549L60.5142 6.95492H57.2447H55.7059L56.9508 7.85942L59.5959 9.78115L58.5855 12.8906L58.11 14.3541L59.355 13.4496L62 11.5279L64.645 13.4496L65.89 14.3541L65.4145 12.8906L64.4041 9.78115L67.0492 7.85942L68.2941 6.95492H66.7553H63.4858L62.4755 3.84549Z"-->
                                <!--                    fill="#F58634" stroke="#F58634" />-->
                                <!--                <path-->
                                <!--                    d="M44.4755 3.84549L44 2.38197L43.5245 3.84549L42.5142 6.95492H39.2447H37.7059L38.9508 7.85942L41.5959 9.78115L40.5855 12.8906L40.11 14.3541L41.355 13.4496L44 11.5279L46.645 13.4496L47.89 14.3541L47.4145 12.8906L46.4041 9.78115L49.0492 7.85942L50.2941 6.95492H48.7553H45.4858L44.4755 3.84549Z"-->
                                <!--                    fill="#F58634" stroke="#F58634" />-->
                                <!--                <path-->
                                <!--                    d="M26.4755 3.84549L26 2.38197L25.5245 3.84549L24.5142 6.95492H21.2447H19.7059L20.9508 7.85942L23.5959 9.78115L22.5855 12.8906L22.11 14.3541L23.355 13.4496L26 11.5279L28.645 13.4496L29.89 14.3541L29.4145 12.8906L28.4041 9.78115L31.0492 7.85942L32.2941 6.95492H30.7553H27.4858L26.4755 3.84549Z"-->
                                <!--                    fill="#F58634" stroke="#F58634" />-->
                                <!--                <path-->
                                <!--                    d="M8.47553 3.84549L8 2.38197L7.52447 3.84549L6.51416 6.95492H3.24472H1.70588L2.95082 7.85942L5.59586 9.78115L4.58555 12.8906L4.11002 14.3541L5.35497 13.4496L8 11.5279L10.645 13.4496L11.89 14.3541L11.4145 12.8906L10.4041 9.78115L13.0492 7.85942L14.2941 6.95492H12.7553H9.48584L8.47553 3.84549Z"-->
                                <!--                    fill="#F58634" stroke="#F58634" />-->
                                <!--            </svg>-->
                                <!--        </p>-->
                                <!--    </div>-->
                                <!--    <div class="textGrey Roboto  align-self-start"> {{ $review->comment }} </div>-->
                                <!--    <p>{{ $country->countryname }}</p>-->
                                <!--</div>-->
                        </div>
                    @endforeach

        </div>
        </div>
        <div class="swiper-pagination swiper-pagination-2"></div>
        </div>
    </div>
</div>

    <div id="Certification" class="col-12 py-5  container section">
            <p class="Roboto fw-semibold textGrey h3">Certification</p>
            <div class="row">
                <div class="col-12 col-lg-6">
                    {!! $coursdetails->certificatedesc_en !!}
                </div>
                <div class="col-12 col-lg-6  d-flex justify-content-end align-items-center certification-container">
                    <svg width="397" height="371" viewBox="0 0 397 371" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M207.5 0H397V371H0L207.5 0Z" fill="#F58634"/>
                    </svg>
                    <!--<img src="{{asset('layV3/images/certification.png')}}" alt="certification" class="certification-img" >-->
                    <img src="{{asset('/images/certificate/' . $coursdetails->certificateimage)}}" alt="certification" class="certification-img" >
                </div>
            </div>
            <div class=" container Roboto textGrey">
                <div style="width:40%">
                    
                </div>
            </div>
            <!--<div class="container d-flex justify-content-end align-items-center certification-container" >-->
            <!--     <svg width="397" height="371" viewBox="0 0 397 371" fill="none" xmlns="http://www.w3.org/2000/svg">-->
            <!--            <path d="M207.5 0H397V371H0L207.5 0Z" fill="#F58634"/>-->
            <!--        </svg>-->

                <!--<img src="{{asset('layV3/images/certification.png')}}" alt="certification" class="certification-img" >-->
            <!--    <img src="{{asset('/images/certificate/' . $coursdetails->certificateimage)}}" alt="certification" class="certification-img" >-->
            <!--</div>-->
    </div>

    <div id="FAQ" class="position-relative section">
        <div class="container">
            <p style="color: #4B4B4D;font-size: 20px;font-family: Roboto;font-weight: 700;">FAQ </p>
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                <div class="accordion-item" style="border-bottom: none !important;">
                    <h2 class="accordion-header" id="faqAccordion{{ $faq->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne">
                       {{ Transcode::evaluate($faq)['title'] }}
                    </button>
                    </h2>
                    <div id="{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="{{ $faq->id }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {!! Transcode::evaluate($faq)['contant'] !!}
                    </div>
                    </div>
                </div>
            @endforeach
            
                <!--<div class="accordion-item">-->
                <!--    <h2 class="accordion-header" id="headingThree">-->
                <!--    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
                <!--        Accordion Item #3-->
                <!--    </button>-->
                <!--    </h2>-->
                <!--    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">-->
                <!--    <div class="accordion-body">-->
                <!--        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
                <!--            </div>-->
                <!--        </div>-->
                <!--       </div>-->
                <!--    </div>  -->
              </div>
              <svg class="faq-icon" width="141" height="310" viewBox="0 0 141 310" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="155" cy="155" r="155" fill="#F58634"/>
                <circle cx="155" cy="155" r="80" fill="white"/>
            </svg>
            </div>
        </div>
    </div>

<!-- The FAQ Section -->
<!--<div id="faq">-->
<!--    <div class="container">-->
<!--        <div class="accordion" id="faqAccordion">-->
<!--                @foreach($faqs as $faq)-->
<!--                <div class="accordion-item">-->
<!--                    <h2 class="accordion-header" id="{{ $faq->id }}">-->
<!--                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
<!--                       {{ Transcode::evaluate($faq)['title'] }}-->
<!--                    </button>-->
<!--                    </h2>-->
<!--                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="{{ $faq->id }}" data-bs-parent="#faqAccordion">-->
<!--                    <div class="accordion-body">-->
<!--                        {!! Transcode::evaluate($faq)['contant'] !!}-->
<!--                    </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                @endforeach-->
                
              <!--  <div class="accordion-item">-->
              <!--      <h2 class="accordion-header" id="headingThree">-->
              <!--      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
              <!--          Accordion Item #3-->
              <!--      </button>-->
              <!--      </h2>-->
              <!--      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">-->
              <!--      <div class="accordion-body">-->
              <!--          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
              <!--              </div>-->
              <!--          </div>-->
              <!--         </div>-->
              <!--      </div>  -->
              <!--</div>-->
<!--              <svg class="faq-icon" width="141" height="310" viewBox="0 0 141 310" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                <circle cx="155" cy="155" r="155" fill="#F58634"/>-->
<!--                <circle cx="155" cy="155" r="80" fill="white"/>-->
<!--            </svg>        </div>-->
<!--    </div>-->
<!--</div>-->

    @endsection
    @section('js')
    <script>
    // The sticky navigation code
  document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('#navbar-example2 .nav-link');
    const sections = document.querySelectorAll('div[id]');
    const offsetThreshold = 0;

    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 - offsetThreshold &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + offsetThreshold
      );
    }


    function findActiveSectionIndex() {
      for (let i = 0; i < sections.length; i++) {
        if (isElementInViewport(sections[i])) {
          return i;
        }
      }
      return -1;
    }

    function updateActiveNavItem() {
      const activeSectionIndex = findActiveSectionIndex();
      navLinks.forEach((link, index) => {
        if (index === activeSectionIndex) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }

    function scrollToSection(sectionId) {
      const targetSection = document.getElementById(sectionId);
      if (targetSection) {
        const targetOffset = targetSection.offsetTop - offsetThreshold;
        window.scrollTo({ top: targetOffset, behavior: 'smooth' });
      }
    }

    // Add scroll event listener to update active nav item on scroll
    window.addEventListener('scroll', updateActiveNavItem);

    // Add click event listeners to scroll to the corresponding section when a nav-link is clicked
    navLinks.forEach(link => {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const sectionId = link.getAttribute('href').substring(1);
        scrollToSection(sectionId);
      });
    });

    // Update active nav item on page load
    updateActiveNavItem();
  });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <!--<script src="{{ asset('layV3/script/certificateOne.js') }}"></script>-->
        <script src="{{ asset('layV3/script/navbarFixScript.js') }}"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
        
        // video code
            var player = new Vimeo.Player('vimeoPlayer', {
                // id: '524933864',
                id: '{{ $coursdetails->preview_video }}',
            });
            var playerLg = new Vimeo.Player('vimeoPlayerLg', {
                // id: '524933864',
                id: '{{ $coursdetails->preview_video2 }}',
            });
            function playVideo(){
                console.log("wwww");
                player.play();
                let certThumb = document.getElementById("videoThumb");
                certThumb.style.display = "none";
            }
            function playVideoLg(){
                console.log("sssssssssss");
                playerLg.play();
                let certThumbLg = document.getElementById("videoThumbLg");
                certThumbLg.style.display = "none";
            }            function toggleImgeSvg(id) {
                document.getElementById("img-svg-" + id).classList.toggle('active');
            }
            
        function getVideo (video_id){
            console.log("sssssssssss");
                    document.getElementById('videoContainer').innerHTML = '<p class="mx-auto">Loading...</p>';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });

                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('public.package.view.video')}}',
                        data: {
                            video_id,
                        },
                        success: function(res) {
                            if(res)
                                document.getElementById('videoContainer').innerHTML = res['html'];
                        },
                        error: function(err){
                            console.log(err);
                        }
                    });
                }
        // plans code
            let planAContent = document.getElementById("planA");
            let planBContent = document.getElementById("planB");
            let planCContent = document.getElementById("planC");

            let planAToggle = document.getElementById("planAToggle");
            let planBToggle = document.getElementById("planBToggle");
            let planCToggle = document.getElementById("planCToggle");

            function showPlanA() {
                if (planAContent) planAContent.style.display = "block";
                if (planBContent) planBContent.style.display = "none";
                if (planCContent) planCContent.style.display = "none";
                if (planAToggle) planAToggle.style.border ="2px solid orange";
                if (planBToggle) planBToggle.style.border ="2px solid transparent";
                if (planCToggle) planCToggle.classList.remove("active-card");
            }

            function showPlanB() {
                if (planAContent) planAContent.style.display = "none";
                if (planBContent) planBContent.style.display = "block";
                if (planCContent) planCContent.style.display = "none";
                if (planAToggle) planAToggle.style.border ="2px solid transparent";
                if (planBToggle) planBToggle.style.border ="2px solid orange";
                if (planCToggle) planCToggle.style.border ="2px solid transparent";
            }

            function showPlanC() {
                if (planAContent) planAContent.style.display = "none";
                if (planBContent) planBContent.style.display = "none";
                if (planCContent) planCContent.style.display = "block";
                if (planAToggle) planAToggle.style.border ="2px solid transparent";
                if (planBToggle) planBToggle.style.border ="2px solid transparent";
                if (planCToggle) planCToggle.style.border ="2px solid orange";
            }

            var reviewsSwiper = new Swiper(".reviewsSwiper", {
            loop: true,
            slidesPerView: 2,
            // autoplay: {
            //  delay: 2500,
            //  pauseOnMouseEnter:true,
            //  },
            pagination: {
                el: ".swiper-pagination-2",
                clickable: true,
            },
             // Responsive breakpoints
            breakpoints: {
            // when window width is >= 320px
            100: {
            slidesPerView: 1,
            spaceBetween: 20,
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 1,
            spaceBetween: 30,
            },
            // when window width is >= 640px
            720: {
            slidesPerView: 1,
            spaceBetween: 40,
            },
            992: {
            slidesPerView: 2,
            spaceBetween: 40,
            },
            1366: {
            slidesPerView: 2,
            spaceBetween: 40,
            },
        },
            });




        </script>
    @endsection
