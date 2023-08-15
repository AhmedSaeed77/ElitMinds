@extends('layouts.layoutV2')

@section('head')
    <link rel="stylesheet" href="{{ asset('helper/css/mypackage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.css" integrity="sha512-Y1c7KsgMNtf7pIhrj/Ul2LhutImFYr+TsCmjB8mGAk+cgG1Vm8U1g7tvfmRr6yD5nds03Qgc6Mcb86MBKu1Llg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      .swiper {
        width: 100%;
        height: auto;
      }
      .swiper-slide{
        height: auto;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows:repeat(4, min-content);
        justify-content: start;
        justify-items: start;
      }
        @media screen and (max-width:480px){
      .swiper-slide{
        height:300px;
      }
      }
      .swiper-button-next,
      .swiper-button-prev {
        border-radius: 50%;
        width: 46px;
        height: 46px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--bg-primary);
        color: var(--text-accent);
      }
      .swiper-button-next:after,
      .swiper-button-prev:after {
        font-size: 16px !important;
      }
      .swiper-container{
        position: relative;
        padding: 0 22px;
    }
          .swiper-container .swiper-button-prev{
        left: -0px;
        top:55px;
        }
    .swiper-container .swiper-button-next{
        right:0px;
        top:55px;
    }
    /*@media screen and (min-width:1375px) {*/
    /*  .swiper-container .swiper-button-next{*/
    /*    right:22px;*/
    /*    top:55px;*/
    /*}*/
    /*}*/
    .swiper-container .swiper-pagination{
        bottom: -30px!important;
    }
    .more-details{
      font-weight: 700;
      font-size: 18px;
      color:var(--text-accent) !important;
      margin-top: 50px;
    }
    .more-details:hover{
     color:var(--text-accent) !important;
    }
    .course-title{
      color:var(--text-primary);
      font-weight: 700;
      font-size: 18px;
    }
    .course-title:hover{
        color:var(--text-accent)
    }
        .course-item:not(:last-of-type){
      border-bottom: 1px solid #9597986b;
    }
      @media screen  and (max-width:992px){
        .more-details{
            display:none !important;
        }
      }
    </style>
@endsection


@section('content')
    <div class="container packages-page">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-5 mb-5 heading" id="title"> {{__('messages.My_Packages')}}</h1>

                </div>
                <!-- Title End -->
            </div>
        </div>

 <!-- Swiper -->
 <div class="swiper-container">
     <div class="swiper mySwiper" >
         <div class="swiper-wrapper">
         @foreach ($exam_package_list_by_course as $course_id => $package_arr)
            @foreach ($package_arr as $i)
             <div class="swiper-slide package-item" >
                <a href="{{route('package.details', $i->package->package_id)}}">
                    <img src="{{ url('storage/package/imgs/' . basename($i->package->img)) }}" class="card-img-top sh-22" alt="card image" />
                </a>
                <a href="{{route('package.details', $i->package->package_id)}}" class="package-item-title">{{ Transcode::evaluate(\App\Packages::find($i->package->package_id))['name'] }}</a>
                <ul class="package-item-features">
                    <li>  {{__('User/myPackages.expire-at')}} {{$i->meta_data['expire_date']}}</li>
                    <!--<li>･ 800 questions</li>-->
                    <!--<li>･ English</li>-->
                </ul>
                <div class="d-flex align-items-start gap-2  ">
                  <span class="course-title">{{floor($i->package->rating)}}</span>  
                    <div class="br-wrapper br-theme-cs-icon d-inline-block">
                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="{{floor($i->package->rating ? $i->package->rating: -1)}}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
              </div>
        </div>
            @endforeach
        @endforeach
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
        

        <!-- Paths Start -->
        <div style="margin-top:70px">
            <h1 class="mb-5 heading"> {{__('messages.All_courses')}}  </h1>
            <div class="row  row-cols-1 row-cols-xl-1 row-cols-xxl-1 mb-5" >
                @php
                    $icons = ['user-assets/img/illustration/icon-accounts.png', 'user-assets/img/illustration/icon-storage.png', 'user-assets/img/illustration/icon-experiment.png', 'user-assets/img/illustration/icon-performance.png'];
                    $newicons = ['indexassets/img/course/asd1.jpg', 'indexassets/img/course/asd2.jpeg', 'indexassets/img/course/asd3.jpeg', 'indexassets/img/course/asd4.jpg', 'indexassets/img/course/asd5.jpg', 'indexassets/img/course/asd6.jpeg'];
                @endphp
                @foreach ($courses as $course)
                    <div class="col py-4 course-item" >
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-3 col-lg-2 text-center">
                                        <img src="{{ asset(array_random($newicons)) }}" class="theme-filter" 
                                            alt="performance" style="width:100%"/>
                                    </div>
                                    <div class="col-10 col-md-9 col-lg-4 ">
                                        <div class="d-flex flex-column">
                                            <a href="{{route('package.by.course' ,  $course->slug) }}" class="course-title stretched-link">{{ $course->title }}</a>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                                deserunt mollit anim id est laborum.</p>
                                        </div>
                                        <div class="card-footer border-0 pt-0">
                                            <div class="card-text mb-0">
                                                {{ __('User/myPackages.expire-at') }}
                                                {{-- {{ $i->meta_data['expire_date'] }} --}}
                                            </div>
                                            <div class="mb-2">
                                               <span class="course-title">4.6</span> 
                                                <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                                    <select class="rating " name="rating" autocomplete="off"
                                                        data-readonly="true" {{-- data-initial-rating="{{ floor($i->package->rating ? $i->package->rating : -1) }}" --}}>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="price">$100.00</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-end ">
                                       <a href="#" class="more-details">More details</a>  
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--<a type="button" class="card-btn btn load-more"> {{__('messages.Load_More')}} </a>-->
    </div>
@endsection
@section('jscode')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.js" integrity="sha512-+z66PuMP/eeemN2MgRhPvI3G15FOBbsp5NcCJBojg6dZBEFL0Zoi0PEGkhjubEcQF7N1EpTX15LZvfuw+Ej95Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

     <!-- Initialize Swiper -->
     <script>
      var swiper = new Swiper('.mySwiper', {
        slidesPerView: 5,
        spaceBetween: 17,
        autoplay: {
        delay: 2500,
        disableOnInteraction: true,
        pauseOnMouseEnter:true,
        reverseDirection: false
        },
        slidesPerGroupSkip: 1,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        // Responsive breakpoints
        breakpoints: {
          // when window width is >= 320px
            100: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          // when window width is >= 480px
          572: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          // when window width is >= 640px
          768: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1200: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1500: {
            slidesPerView: 5,
            spaceBetween: 40,
          },
        },
      });
    </script>
@endsection
