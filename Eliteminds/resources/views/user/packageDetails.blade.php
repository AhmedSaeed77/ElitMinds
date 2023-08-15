@extends('layouts.layoutV2')
@section('head')
<link rel="stylesheet" href="{{asset('helper/css/packageDetails.css')}}">

<style>
        @media print { body { display:none } }
        body, html{
            /* Prevent selection */
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media only screen and (max-width: 770px) {
            .go-when-less-770 { display: none !important;}
            .remove-position-when-less-770 { position: relative !important;}
        }
        .style-ma-1 {
            min-height: 300px; background-color: white; min-width: 1024px; margin: 20px auto 0 auto; padding-top:30px;
        }
        .style-ma-2 {
            width: 1024px    ; margin:auto;
        }
        .style-ma-3 {
            padding: 20px;
        }
        .dont-hover {color: white !important; }
        .dont-hover:hover {
            color: white !important;
            text-decoration: none;
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
            font-size:100px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            font-family: "Font Awesome 5 Duotone";
            content: '★';
        }
        .rate > input:checked ~ label {
            color: gold;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: gold;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: gold;
        }

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
@endsection
@section('content')

<!-- new design -->
    <div class="container-fluid package-details">
        <div class="row">
            <div class="col-12 col-lg-7" style="padding-right:30px">            
            @if($userPackage->preview_video_url !== null && $userPackage->preview_video_url !== '')
            <iframe width="100%" height="400" src="{{url('storage/package/preview/'.basename($userPackage->preview_video_url) )}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
            encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
            @if($userPackage->preview_video_url == null && $userPackage->preview_video_url == '')
                <img width="100%" src="{{ url('storage/package/imgs/'.basename($userPackage->img))}}" alt="Courses Details" style="fit:contain">
            @endif



            </div>
            <div class="col-12 col-lg-5">
                <h1 class="package-details-heading">{{$userPackage->name}}</h1>
                <p class="package-details-para">The PMI RMP certification is one of PMI's fastest growing certifications and will demonstrate your competence in all aspects of risk management, from risk strategic planning through analysis and risk monitoring.</p>

                <div class="package-details-rating ">
                    <span>
                    4.6 
                    </span>
                    <div class="br-wrapper br-theme-cs-icon d-inline-block">
                        <div class="br-wrapper">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="4" style="display: none;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                         </div>
                     </div>
                 </div>

                <p class="package-details-overview">3 total hours ･ 120 lectures ･ {{$userPackage->lang}}</p>
                <hr>
                <div class="row">
                    <!-- -----------------Reset course---------------------- -->

                    <!-- <div class="col-12 col-lg-6 package-details-nextup">
                        <h4>Congratulation</h4>
                        <p>You successfully completed course 👍</p>
                    </div> -->
                    
                    <!-- --------------------------------------- -->

                    <div class="col-12 col-lg-6 package-details-nextup">
                        <h4>Next up</h4>
                        <p>2.2 Relationship of project, program...</p>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center package-details-progress gap-2 mt-4 mt-lg-0"> <a href="javascript:;" class="d-flex align-items-center">
                            <div class="progress-circle" data-value='{{$percentage}}'>
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

                        <!-- ---------------Go to course----------------- -->
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
                                <p style="font-weight:bold;"><span>10 </span> completed out of <span>20</span> </p>
                                <p style="margin:10px 0px">Complete <span>85</span>% to get a certificate</p>
                                <button class="package-details-reset-button">Reset course
                                </button> 
                            </div>
                        </div>
                        <!-- -------------------------------- -->
                        
                        <!-- --------------Reset course------------------- -->
                     @if($percentage == 100 && $userPackage->certification == 1)
                         <div class="dropdown" >
                            <a
                            class="dropdown-toggle mb-1"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >
                            Get certificate
                            </a>
                            <div class="dropdown-menu progress-menu" aria-labelledby="dropdownMenuLink" style="width:300px">
                            <p style="font-weight:bold; margin-bottom:20px;"><span>20 </span> of <span>20</span> Completed </p>
                            <button data-bs-toggle="modal" data-bs-target="#certificationModal"  class="package-details-button">Get certificate
                            </button> 
                            <button data-bs-toggle="modal" data-bs-target="#certificationModal"  class="package-details-reset-button mt-3">Reset Course
                            </button> 
                            </div>
                        </div>
                        <!-- <a href="{{route('restVideosProgress', $userPackage->package_id)}}" class="btn btn-primary btn-icon btn-icon-start w-100 w-sm-auto mx-1" >-->
                        <!--    <span>Get Certification</span>-->
                        <!--</a>-->
                        
                          <div class="modal" tabindex="-1" id="certificationModal">
                            <div class="modal-dialog modal-l">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{__('User/video.course-certification')}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if(!$userPackage->certification_id)
                                            <p>{{__('User/video.get-certificate-1')}}<br>{{__('User/video.get-certificate-2')}}</p>
                                        @endif
                                        <form action="{{route('generate.certification')}}" method="POST" id="certificationForm">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$userPackage->package_id}}">
                                            <input type="hidden" name="product_type" value="package">
                                            <div class="row">
                                                @if(!$userPackage->certification_id)
                                                    <div class="col-md-3">
                                                        {{__('User/video.full-name')}}:
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="name" value="0">
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="document.getElementById('certificationForm').submit()" class="btn btn-primary">{{__('User/video.get-certificate')}}</button>
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endif
                        <!-- --------------------------------- -->

                    </div>
                </div>
                <hr>
                <a href="{{route('attach.package', $package_id)}}" type="button" class="package-details-button" >Go to course</a>
                <!------------ Reset ------------->
                <!-- <a href="{{route('attach.package', $package_id)}}" type="button" class="package-details-button" >Reset</a> -->

            </div>
        </div>
    </div>
<!-- Tabs -->
<div class="container">
    <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" id="lineTitleTabsContainer" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-1" role="tab" aria-selected="true">What you will learn</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-2" role="tab" aria-selected="false">Course description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3" role="tab" aria-selected="false">Course prerequisites </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4" role="tab" aria-selected="false">Course material</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-5" role="tab" aria-selected="false">Reviews</a>
                </li>
    </ul>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tab-1" role="tabpanel">
                <!-- <p>Earn the 30 contact hours certificate to qualify for the PMI RMP exam </p>
                <p>Anticipate the general types of questions that appear on the real PMI RMP test and learn how to answer them through our PMI RMP mock tests.</p>
                <p>Measure your ability to successfully complete the exam through sample questions in each RMP exam domain.</p>
                <p>Identify the critical principles, activities, tasks, techniques, and terms described in the PMI RMP exam content outline.</p> -->
                <p class="m-0">{!!  $userPackage->what_you_learn !!} </p>
            </div>
            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                {!!  $userPackage->description !!}
            </div>
            <div class="tab-pane fade" id="tab-3" role="tabpanel">
            <p class="m-0">{!!  $userPackage->requirement !!} </p>
            </div>
            <div class="tab-pane fade" id="tab-4" role="tabpanel">
            <p class="m-0">{!!  $userPackage->who_course_for !!} </p>
            </div>
            <!-- adawe 2 -->
            <div class="tab-pane fade" id="tab-5" role="tabpanel">
                <!-- Total Rating Start -->
                <!-- <div class="row mb-5">
                    <div class="col-12 col-sm-auto mb-3 mb-sm-0">
                        <div class="w-100 sw-sm-19 sw-md-23 border border-separator-light sh-16 rounded-md d-flex flex-column align-items-center justify-content-center">
                            <div class="cta-1 text-alternate mb-2">{{floor($rating->avg_rate)}}</div>
                            <div>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{floor($rating->avg_rate)}}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <span class="text-muted">({{$rating->ratings_number}})</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->five_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100 )}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="me-3 text-muted text-small">%{{round($rating->five_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->four_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="me-3 text-muted text-small">%{{round($rating->four_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number)* 100)}}</span>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="4">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->three_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="me-3 text-muted text-small">%{{round($rating->three_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="3">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="%{{round($rating->two_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="me-3 text-muted text-small">%{{round($rating->two_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="2">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="progress mb-1">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="%{{round($rating->one_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="me-3 text-muted text-small">%{{round($rating->one_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Total Rating End -->
                <!-- Comments Start -->
                @foreach($rating_reviews as $review)
                    @php
                        $profile_pic =asset('user-assets/img/profile/profile-11.jpg');
                        if($review->profile_pic){
                            $profile_pic =url('storage/profile_picture/'.basename($review->profile_pic));
                        }

                    @endphp
                        <div class="row g-0 w-100 review">
                            <div class="col-auto">
                                <div class="sw-5 review-pic">
                                    <img src="{{$profile_pic}}" class="img-fluid rounded-xl" alt="thumb" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="review-name">{{$review->name}}sss</div>
                                <div class="br-wrapper br-theme-cs-icon d-flex align-items-center gap-2" >
                                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{$review->rate}}">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <span class="review-date">{{$review->created_at}}</span>
                                </div>
                                <div class="review-text lh-1-25">{{$review->review}}</div>
                                <div class="review-question">Was this review helpful?</div>
                                <div class="review-actions">
                                    <button class="btn btn-white">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.83366 18.3332V9.1665M1.66699 10.8332V16.6665C1.66699 17.587 2.41318 18.3332 3.33366 18.3332H14.5222C15.7561 18.3332 16.8055 17.4329 16.9931 16.2133L17.8906 10.38C18.1235 8.86558 16.9518 7.49984 15.4196 7.49984H12.5003C12.0401 7.49984 11.667 7.12674 11.667 6.6665V3.72137C11.667 2.5865 10.747 1.6665 9.61213 1.6665C9.34144 1.6665 9.09614 1.82592 8.98621 2.07327L6.05361 8.67162C5.91986 8.97256 5.62142 9.1665 5.2921 9.1665H3.33366C2.41318 9.1665 1.66699 9.9127 1.66699 10.8332Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-white">
                                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.1666 1.6665V10.8332M17.3333 8.1665V4.33317C17.3333 3.39975 17.3333 2.93304 17.1516 2.57652C16.9918 2.26291 16.7368 2.00795 16.4232 1.84816C16.0667 1.6665 15.6 1.6665 14.6666 1.6665H5.76489C4.54699 1.6665 3.93804 1.6665 3.4462 1.88936C3.01271 2.08579 2.6443 2.40185 2.38425 2.80044C2.08919 3.25266 1.9966 3.85454 1.8114 5.05827L1.3755 7.8916C1.13125 9.47925 1.00912 10.2731 1.24472 10.8908C1.4515 11.4329 1.84042 11.8863 2.34482 12.1731C2.91949 12.4998 3.72266 12.4998 5.329 12.4998H5.99988C6.4666 12.4998 6.69995 12.4998 6.8782 12.5907C7.03501 12.6706 7.1625 12.798 7.24239 12.9548C7.33325 13.1331 7.33325 13.3664 7.33325 13.8332V16.2783C7.33325 17.4132 8.25317 18.3332 9.38809 18.3332C9.65875 18.3332 9.90409 18.1738 10.014 17.9264L12.8147 11.625C12.942 11.3383 13.0057 11.1951 13.1063 11.09C13.1953 10.9971 13.3047 10.9261 13.4257 10.8825C13.5626 10.8332 13.7194 10.8332 14.033 10.8332H14.6666C15.6 10.8332 16.0667 10.8332 16.4232 10.6515C16.7368 10.4918 16.9918 10.2368 17.1516 9.92317C17.3333 9.56667 17.3333 9.09992 17.3333 8.1665Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <a class="review-report">Report</a>
                                </div>
                                <div class="review-reply">
                                    <div class="row g-0 w-100">
                                        <div class="col-auto">
                                            <div class="sw-5 me-3">
                                                <img src="{{$profile_pic}}" class="img-fluid rounded-xl" alt="thumb" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="review-name">{{$review->name}}</div>
                                            <div class="br-wrapper br-theme-cs-icon d-flex align-items-center gap-2 mb-2">
                                                <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{$review->rate}}">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <span class="review-date">{{$review->created_at}}</span>
                                            </div>
                                            <div class="review-text lh-1-25">{{$review->review}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- Comments End -->
            </div>
        </div>
    </div>
    </div>


            <!-- <br><br><br><br><br><br><br><br><br><br> <h1>Old design </h1> -->
<!-- old design -->
    <!-- <div class="container" id="app-1">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{$userPackage->name}}</h1>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                        <ul class="breadcrumb pt-0">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('my.package.view')}}">My Packages</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end" style="flex-wrap: wrap;gap: 10px;">
                    <a href="{{route('restVideosProgress', $userPackage->package_id)}}" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-sm-auto mx-1">
                        <span>Reset Progress</span>
                    </a>
                    <a href="{{route('completeVideosProgress', $userPackage->package_id)}}" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-sm-auto mx-1">
                        <span>Select All</span>
                    </a>

                    <a href="javascript:;" class="btn w-100 w-sm-auto">
                        <div class="progress-circle" data-value='{{$percentage}}'>
                                <span class="progress-left">
                                    <span class="progress-bar border-primary"></span>
                                </span>

                            <span class="progress-right">
                                    <span class="progress-bar border-primary"></span>
                                </span>

                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center" style="margin-top:3px;">
                                <div class="h2 font-weight-bold" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
                                        <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    @if($percentage == 100 && $userPackage->certification == 1)
                        <a href="{{route('restVideosProgress', $userPackage->package_id)}}" class="btn btn-primary btn-icon btn-icon-start w-100 w-sm-auto mx-1" data-bs-toggle="modal" data-bs-target="#certificationModal">
                            <span>Get Certification</span>
                        </a>
                        <div class="modal" tabindex="-1" id="certificationModal">
                            <div class="modal-dialog modal-l">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{__('User/video.course-certification')}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if(!$userPackage->certification_id)
                                            <p>{{__('User/video.get-certificate-1')}}<br>{{__('User/video.get-certificate-2')}}</p>
                                        @endif
                                        <form action="{{route('generate.certification')}}" method="POST" id="certificationForm">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$userPackage->package_id}}">
                                            <input type="hidden" name="product_type" value="package">
                                            <div class="row">
                                                @if(!$userPackage->certification_id)
                                                    <div class="col-md-3">
                                                        {{__('User/video.full-name')}}:
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="name" value="0">
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="document.getElementById('certificationForm').submit()" class="btn btn-primary">{{__('User/video.get-certificate')}}</button>
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <a href="{{route('attach.package', $package_id)}}" class="btn btn-primary btn-icon btn-icon-start w-100 w-sm-auto">
                        <i data-cs-icon="chevron-right"></i>
                        <span>Start Now</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-xxl-8 mb-5">
                <h2 class="small-title">Preview</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <h6 class="small-title mt-2"> {{__('Public/package.description')}} </h6>
                        <p class="m-0">{!!  $userPackage->description !!} </p>

                        <h6 class="small-title mt-2"> What will you learn? </h6>
                        <p class="m-0">{!!  $userPackage->what_you_learn !!} </p>

                        <h6 class="small-title mt-2"> Course prerequisites </h6>
                        <p class="m-0">{!!  $userPackage->requirement !!} </p>

                        <h6 class="small-title mt-2"> Who this course is for? </h6>
                        <p class="m-0">{!!  $userPackage->who_course_for !!} </p>

                    </div>
                </div>
                

                <div class="page-title-container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h2 class="small-title">Reviews</h2>
                        </div>

                        <div class="col-12 col-sm-6 d-flex align-items-start justify-content-end">
                            <a href="{{route('restVideosProgress', $userPackage->package_id)}}" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-sm-auto mx-1" data-bs-toggle="modal" data-bs-target="#ratingForm">
                                <span>
                                    @if(!$userPackage->userRatePackage)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                        {{__('User/video.leave-rating')}}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                        {{__('User/video.update-rating')}}
                                    @endif
                                </span>
                            </a>
                            <div class="modal" tabindex="-1" id="ratingForm">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h2 class="uk-modal-title">{{__('User/video.rating-question')}}</h2>
                                            <p>
                                                <center>
                                            <p style="color:#333; font-size: 20px; font-weight: 10; min-height: 30px;">
                                                @{{rate_sentance}}
                                            </p>

                                            <div class="row rate" style=" min-height: 50px; margin: 0px 0 15px 0;">

                                                <input type="radio"  id="star5" v-model="rate_value" v-on:change="rate"  name="rate" value="5" />
                                                <label for="star5" title="text" @mouseover="rate_state('{{__('User/video.rate-statement-5')}}')"></label>


                                                <input type="radio"  id="star4" v-model="rate_value" v-on:change="rate"  name="rate" value="4" />
                                                <label for="star4" title="text" @mouseover="rate_state('{{__('User/video.rate-statement-4')}}')"></label>


                                                <input type="radio" id="star3"  v-model="rate_value" v-on:change="rate"  name="rate" value="3" />
                                                <label for="star3" title="text" @mouseover="rate_state('{{__('User/video.rate-statement-3')}}')"></label>


                                                <input type="radio"  id="star2" v-model="rate_value" v-on:change="rate"  name="rate" value="2" />
                                                <label for="star2" title="text" @mouseover="rate_state('{{__('User/video.rate-statement-2')}}')"></label>


                                                <input type="radio" id="star1" v-model="rate_value" v-on:change="rate"  name="rate" value="1" />
                                                <label for="star1" title="text" @mouseover="rate_state('{{__('User/video.rate-statement-1')}}')"></label>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12" id="rateTextBox" @if(!$userPackage->userRatePackage) style="display:none;" @endif >
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
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-12 col-sm-auto mb-3 mb-sm-0">
                                <div
                                        class="w-100 sw-sm-19 sw-md-23 border border-separator-light sh-16 rounded-md d-flex flex-column align-items-center justify-content-center"
                                >
                                    <div class="cta-1 text-alternate mb-2">{{floor($rating->avg_rate)}}</div>
                                    <div>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{floor($rating->avg_rate)}}">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <span class="text-muted">({{$rating->ratings_number}})</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->five_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100 )}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="me-3 text-muted text-small">%{{round($rating->five_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->four_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="me-3 text-muted text-small">%{{round($rating->four_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number)* 100)}}</span>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="4">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{round($rating->three_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="me-3 text-muted text-small">%{{round($rating->three_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="3">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="%{{round($rating->two_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="me-3 text-muted text-small">%{{round($rating->two_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="2">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="progress mb-1">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="%{{round($rating->one_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="me-3 text-muted text-small">%{{round($rating->one_stars / ($rating->ratings_number == 0 ? 1: $rating->ratings_number) * 100)}}</span>
                                        <div class="br-wrapper br-theme-cs-icon d-inline-block mb-2">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="1">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

            <div class="col-12 col-xxl-4 mb-n5">
                <h2 class="small-title">At a Glance</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        @if($userPackage->total_time)
                        <div class="row g-0 align-items-center mb-3">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                    <i data-cs-icon="clock" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Duration</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">{{$userPackage->total_time}} Hours</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($packageVideos->groupBy('chapter_id')) > 0)
                        <div class="row g-0 align-items-center mb-3">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                    <i data-cs-icon="presentation" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Content</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">{{count($packageVideos->groupBy('chapter_id'))}} Chapters</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row g-0 align-items-center mb-3">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                    <i data-cs-icon="calendar" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Release</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">{{$userPackage->updated_at}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 align-items-center mb-3">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                    <i data-cs-icon="star" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Rating</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">{{floor($rating->avg_rate)}} ({{$rating->ratings_number}})</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($userPackage->certification)
                        <div class="row g-0 align-items-center mb-3">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                                    <i data-cs-icon="graduation" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Certification</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">Yes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row g-0 align-items-center mb-0">
                            <div class="col-auto">
                                <div class="sw-3 sh-4 d-flex justify-content-center align-items-center text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                        <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                                        <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="sh-4 d-flex align-items-center lh-1-25">Language</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="sh-4 d-flex align-items-center text-alternate">{{$userPackage->lang}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection

@section('jscode')
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
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

    <script>
        var app = new Vue({
            el: '#app-1',
            data: {
                package_id: '{{$userPackage->package_id}}',
                rate_value: 0,
                rate_sentance: '',
                user_review: '',
            },
            methods: {
                goto: function(url){
                    window.location.replace(url);
                },
                _: function (ele) {
                    return document.getElementById(ele);
                },
                ShowRate: function () {
                    $('#myModalRating').show();
                },
                HideRate: function () {
                    $('#myModalRating').hide();
                },
                post_review: function () {
                    Data = {
                        user_review: this.user_review,
                        package_id: this.package_id
                    };


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('user.review')}}',
                        data: Data,
                        success: function (res) {
                        },
                        error: function (res) {
                            console.log('Error:', res);
                        }


                    });

                },
                rate_state: function (r_s) {
                    this.rate_sentance = r_s;
                },
                rate: function () {

                    Data = {
                        rate: this.rate_value,
                        package_id: this.package_id
                    };


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('user.rate')}}',
                        data: Data,
                        success: function (res) {
                            $("#rateTextBox").slideDown();
                        },
                        error: function (res) {
                            console.log('Error:', res);
                        }


                    });


                },
                ShowReplyForm: function (comment_id) {
                    if (this._('reply-form-' + comment_id).innerHTML == '') {
                        this._('reply-form-' + comment_id).innerHTML = '<div class="row"><div class="col-md-10 col-md-offset-2"><form action="{{route("comment.reply")}}" method="post">@csrf<input type="hidden" name="reply_to_id" value="' + comment_id + '"><div class="form-group col-md-8" style="padding-left: 0 !important;"><textarea rows="1" name="contant" required placeholder="Write comment here ..." class="form-control c-square"></textarea></div><div class="form-group col-md-4"><div class="row"><button type="submit" class="btn blue uppercase btn-md col-md-6 sbold">Reply</button></div></div></form></div></div>';
                    } else {
                        this._('reply-form-' + comment_id).innerHTML = '';
                    }
                },
                removeReplyForm: function (comment_id) {
                    this._('reply-form-' + comment_id).innerHTML = '';
                    alert('ok');
                },

            }
        });
    </script>
@endsection
