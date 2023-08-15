@extends('layouts.layoutV3')

@section('css')
 <link rel="stylesheet" href="{{asset('layV3/style/home.css')}}">
 <link rel="stylesheet" href="{{asset('layV3/style/homeSCrole.css')}}">
 <link rel="stylesheet" href="{{asset('layV3/style/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
 <style>
.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active2, .dot:hover {
    /* background-color: var(--orang); */
    border: 2px solid var(--orang);
}
  iframe{
      width:100%;
      height:35vh;
      border: 4px solid var(--orang) !important;
      border-radius:30px;
      padding:10px;
  }

@media only screen and (max-width: 700px) {
     .large-container{
         width:100%!important;
         overflow-x :hidden !important;
     }
  .card-text-star{
         position:relative;
         top:-3em !important;
     }
     
     .card{
         padding:0;
        margin-right:5px!important;
     }
     .para{
         text-align:left;
         font-weight:300;
     }
     .card-carousel-item {
 width:310px;height:350px; padding:0;    margin-right: 20px!important;
    margin-left: 20px;
}
}
@media only screen and (min-width: 700px) {
    .title-in-small-screen{
    display:none;
}
.para{
         text-align:center;
     }
.card-carousel-item {
    position:relative; right:50px; width:300px;height:350px; padding:0;margin-left:70px
}
}


/* Ebooks section */
.swiper.ebookSwiper {
  width: 100%;
  height: auto;
  padding:150px 0px;
}
.ebookSwiper .swiper-slide {
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items: center;
}
.ebookSwiper .swiper-slide-active img{
  transform: scale(1.4) !important;
  margin-bottom: 67px;
}
.ebookSwiper .swiper-slide a {
  text-decoration:none;
  color: #000;
}
.ebookSwiper .swiper-slide a:hover {
  color: #000;
}
.ebookSwiper .swiper-slide .book-label{
  display:none !important;
  
}
.ebookSwiper .swiper-slide.swiper-slide-active .book-label{
  display:block !important;

}
.ebookSwiper .swiper-slide .book-label p{
  text-align:center;
  font-weight: 700;
} 
.ebookSwiper .swiper-slide .book-label p:first-of-type{
  font-size: 20px;
} 
.ebookSwiper .swiper-slide .book-label p:last-of-type{
  font-size: 16px;
} 

.ebookSwiper .swiper-button-next:after,
.ebookSwiper .swiper-button-prev:after {
  font-size: 0px !important;
}
.ebookSwiper .swiper-container{
position: relative;
padding: 0 22px;
}
.ebookSwiper .swiper-container .swiper-button-prev{
  left: -0px;
  }
  .ebookSwiper .swiper-container .swiper-button-next{
  right:0px;
}

/* Reviews section */

.reviews{
  background: #FFFFFF;
  border: 2px solid #F2F2F2;
  border-radius: 18px;
  padding:28px;
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
  border: 1px solid #D8D8D8;

}
.swiper-pagination-bullet-active{
  border: 2px solid #F58634;
}
.swiper-pagination-2{
  bottom: 30px;
}

 </style>

@endsection
@section('content')

    <!-- part 1 -->
    <div class="large-container">
      <div class="col-12 container mb-5 pb-3 marginTop">
        <div class="row col-12 d-flex mb-4">
          <div class="col-md-6 col-12">
            <h1 class="Roboto textGrey fw-bold h1">
              Experts in Project<br/> and Business
            </h1>

            <div class="trans">
              <h1 class="Roboto text-white fw-bold ms-3" style="font-size: 330%;">Management</h1>
            </div>
            <p class="Roboto textGrey fw-lighter textGrey ms-3 pe-5 fs-8 mb-3">
              Our mission is to deliver affordable and high quality self-<br/>paced
              courses in a convenient manner to help<br/> professionals achieve their
              learning goals anytime<br/> anywhere.
            </p>
            <div class="btns d-flex flex-nowrap col-12 mb-md-0 mb-3">
              <a
                type="button"
                class="btn btn-link btn-lg col-5"
                href="{{route('register')}}"
                >Join Today
              </a>
              <div
                class="btnline col-3 d-flex justify-content-center align-items-center"
              >
                <img
                  src="{{asset('layV3/images/Polygon.png')}}"
                  alt="xx "
                  class="ms-5 text-end"
                />
              </div>
            </div>
          </div>

          <!-- <div class="col-md-6 col-12 borderwarning2 rounded-5 d-flex justify-content-center align-items-center"> -->
            <!-- <img src="./images/Mask group.png" alt="" class="col-12 bg-light rounded-5 "> -->
            <!--<video-->
            <!--  class="w-100 rounded-5"-->
            <!--  poster="{{asset('layV3/images/Mask group.png')}}"-->
            <!--  controls-->
            <!--<source src="{{asset('layV3/images/movie.mp4')}}" type="video/mp4" />-->
              
            <!--</video>-->
             <!-- {!! $vhtml!!} -->
          <!-- </div> -->
          <div class="col-12 col-md-6  d-flex align-items-center" >
            {!! $vhtml!!}
          </div>
        </div>
      </div>
      
     
       
       <!-- part2 -->
      <div class="col-12 container mb-5 pb-3 flex-column">
        <div
          class="col-12 d-flex justify-content-center align-items-center flex-column"
        >
          <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="Roboto textGrey fw-bold h1 text-center">
              Most popular <span class="textOrang"><br class="title-in-small-screen"/>certificates</span>
              <p
                class="mx-3 px-5 mt-4"
                style="font-family: 'Roboto';
                       font-style: normal;
                       font-weight: 300;
                       font-size: 20px;
                       line-height: 124.69%;
                       text-align: center;
                       letter-spacing: -0.015em;
                       color: #4B4B4D;"
              >
                
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has<br/> been the industry's standard dummy
                text ever since the 1500s
              </p>
            </h1>
          </div>
          <!-- card s -->
         
          <div style="width:1205px;height:360px;min-height:360px;max-height:360px"
  class="d-flex col-12 mt-5 d-flex justify-content-center align-items-center flex-column"
  id="featureContainer2"
>
  <div class="d-flex justify-content-center align-items-center">
    <div class="col-1 navs d-md-block d-none">
      <img
        src="{{asset('layV3/images/leftArrow.png')}}"
        alt=".0."
        class="w-aut indicator"
        href="#featureCarousel2"
        role="button"
        data-bs-slide="prev"
      />
    </div>

    <div
      class="col-md-10 col-12 d-flex justify-content-center align-items-center row mx-auto my-auto justify-content-center"
    >
      <div
        id="featureCarousel2"
        class="carousel slide col-12 d-flex"
        data-bs-ride="carousel"
      >
        <div
          class="col-12 row d-flex justify-content-start align-items-start carousel-container carousel-inner"
          role="listbox"
        >
          @foreach($courses as $course)
          <div class="carousel-item  {{  $loop->index == 0 ? 'active' : ''}}" style=" transition: transform .1s ease-in-out;" >
              <!--"transition: transform .1s ease-in-out;" -->
            <div class="col-md-4 col-sm-6 col-12"  >
              <div
                class="card borderwarning bgorange rounded-4 card-carousel-item"
                style="width:285px;margin-right:40px"
              >
                <div class="card-body">
                  <p class="Roboto textGrey fw-bold">{{ $course->title }} </p>
                  <small class="Roboto text-white fw-bold">(PMI PBA)</small>
                  <div
                    class="col-12 d-flex justify-content-end align-items-end"
                  >
                    <img style="position:relative;left:10px"
                      src="{{asset('layV3/images/logos.png')}}"
                      alt=""
                      class="imagesLogo"
                    />
                  </div>
                </div>
                   @php
                      $rand = rand(3,5);

                    @endphp
                <div
                  class="card-body bggray roundedbottom text-white Roboto"
                >
                  <small class="col-12 fw-lighter" style="font-size:14px">
                     {{$course->houres}} Contact Hrs</small
                  >
                  <div
                    class="row justify-content-between flex-column col-12 mt-3"
                  >
                    <p class="card-text col-12 fs-6 fw-lighter">
                      <svg
                        width="29"
                        height="29"
                        viewBox="0 0 29 29"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <circle
                          cx="14.5"
                          cy="14.5"
                          r="13.5"
                          stroke="#F58634"
                          stroke-width="2"
                        />
                        <path
                          d="M14.5 6.41162V15.9704H23.3235"
                          stroke="#F58634"
                          stroke-width="3"
                        />
                        <circle
                          cx="14.5001"
                          cy="15.9705"
                          r="2.20588"
                          fill="#F58634"
                        />
                      </svg>
                     {{ $course->lessons_number}} Lecture
                    </p>
                    <div class="row justify-content-between col-12">
                      <p class="card-text col-md-6 fw-lighter"style="font-size:0.9rem">
                        <svg
                          width="29"
                          height="29"
                          viewBox="0 0 29 29"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <circle
                            cx="14.5"
                            cy="14.5"
                            r="13.5"
                            stroke="#F58634"
                            stroke-width="2"
                          />
                          <path
                            d="M14.5 6.41162V15.9704H23.3235"
                            stroke="#F58634"
                            stroke-width="3"
                          />
                          <circle
                            cx="14.5001"
                            cy="15.9705"
                            r="2.20588"
                            fill="#F58634"
                          />
                        </svg>
                          {{$course->houres}} Hour
                      </p>

                      <p class="card-text col-md-6 fs-6 fw-lighter text-end card-text-star">
                        <svg
                          width="29"
                          height="29"
                          viewBox="0 0 29 29"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <circle
                            cx="14.5"
                            cy="14.5"
                            r="13.5"
                            stroke="#F58634"
                            stroke-width="2"
                          />
                          <path
                            d="M15.451 9.77936L14.4999 6.85231L13.5488 9.77936L12.7829 12.1368H10.3041H7.22638L9.71628 13.9459L11.7217 15.4028L10.9557 17.7603L10.0046 20.6874L12.4945 18.8784L14.4999 17.4214L16.5053 18.8784L18.9952 20.6874L18.0441 17.7603L17.2781 15.4028L19.2835 13.9459L21.7734 12.1368H18.6957H16.2169L15.451 9.77936Z"
                            fill="#F58634"
                            stroke="#F58634"
                            stroke-width="2"
                          />
                        </svg>
                      {{$rand}}
                      </p>
                    </div>
                  </div>
  <div  class="card-footer footer bg-transparent border-0"   style="height:40px;position:relative;top:-25px">
                  <hr class="opacity-75" />
                  <a
                    href="{{route('package.by.course' ,  $course->slug) }}"
                    class="d-flex justify-content-center align-items-center aMore"
                  >
                    More Details
                    <svg
                      width="17"
                      height="16"
                      viewBox="0 0 17 16"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      class="ms-2"
                    >
                      <path
                        d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1"
                        stroke="#F2F2F2"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </a>
                  </div>
                </div>
              </div>
            </div>
            
                    <!--                <div class="col-md-4 col-sm-6 col-12">-->
                    <!--    <div class="card borderwarning bgorange rounded-4">-->
                    <!--        <div class="card-body">-->
                    <!--            <p class="Roboto textGrey fw-bold">-->
                    <!--               (PMP) Exam Simulators-->
                    <!--            </p>-->
                    <!--            <small class="Roboto text-white fw-bold">(PMI PBA)</small>-->
                    <!--            <div class="col-12 d-flex justify-content-end align-items-end">-->
                    <!--                <img src="./images/logos.png" alt="" class="imagesLogo" />-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="card-body bggray roundedbottom text-white Roboto col-12">-->
                    <!--            <small class="col-12 fs-6 fw-lighter">-->
                    <!--                35 Contact Hours for PMI</small>-->
                    <!--            <div class="row justify-content-between flex-column col-12 mt-3">-->
                    <!--                <p class="card-text col-12 fs-6 fw-lighter">-->
                    <!--                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none"-->
                    <!--                        xmlns="http://www.w3.org/2000/svg">-->
                    <!--                        <circle cx="14.5" cy="14.5" r="13.5" stroke="#F58634"-->
                    <!--                            stroke-width="2" />-->
                    <!--                        <path d="M14.5 6.41162V15.9704H23.3235" stroke="#F58634" stroke-width="3" />-->
                    <!--                        <circle cx="14.5001" cy="15.9705" r="2.20588" fill="#F58634" />-->
                    <!--                    </svg>-->
                    <!--                    15 Lecture-->
                    <!--                </p>-->
                    <!--                <div class="row justify-content-between col-12">-->
                    <!--                    <p class="card-text col-md-6 fs-6 fw-lighter">-->
                    <!--                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"-->
                    <!--                            xmlns="http://www.w3.org/2000/svg">-->
                    <!--                            <circle cx="14.5" cy="14.5" r="13.5" stroke="#F58634"-->
                    <!--                                stroke-width="2" />-->
                    <!--                            <path d="M14.5 6.41162V15.9704H23.3235" stroke="#F58634" stroke-width="3" />-->
                    <!--                            <circle cx="14.5001" cy="15.9705" r="2.20588" fill="#F58634" />-->
                    <!--                        </svg>-->
                    <!--                        15 Hour-->
                    <!--                    </p>-->

                    <!--                    <p class="card-text col-md-6 fs-6 fw-lighter text-end">-->
                    <!--                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"-->
                    <!--                            xmlns="http://www.w3.org/2000/svg">-->
                    <!--                            <circle cx="14.5" cy="14.5" r="13.5" stroke="#F58634"-->
                    <!--                                stroke-width="2" />-->
                    <!--                            <path-->
                    <!--                                d="M15.451 9.77936L14.4999 6.85231L13.5488 9.77936L12.7829 12.1368H10.3041H7.22638L9.71628 13.9459L11.7217 15.4028L10.9557 17.7603L10.0046 20.6874L12.4945 18.8784L14.4999 17.4214L16.5053 18.8784L18.9952 20.6874L18.0441 17.7603L17.2781 15.4028L19.2835 13.9459L21.7734 12.1368H18.6957H16.2169L15.451 9.77936Z"-->
                    <!--                                fill="#F58634" stroke="#F58634" stroke-width="2" />-->
                    <!--                        </svg>-->
                    <!--                        4.5-->
                    <!--                    </p>-->
                    <!--                </div>-->
                    <!--            </div>-->

                    <!--            <hr class="opacity-75" />-->
                    <!--            <a href="https://demo.eliteminds.co/course/pmp-exam-simulators"-->
                    <!--                class="d-flex justify-content-center align-items-center aMore">-->
                    <!--                More Details-->
                    <!--                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"-->
                    <!--                    xmlns="http://www.w3.org/2000/svg" class="ms-2">-->
                    <!--                    <path d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1" stroke="#F2F2F2" stroke-width="2"-->
                    <!--                        stroke-linecap="round" stroke-linejoin="round" />-->
                    <!--                </svg>-->
                    <!--            </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
            
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-1 navs text-end d-md-block d-none">
      <img
        src="{{asset('layV3/images/rightArrow.png')}}"
        alt=".0."
        class="w-aut indicator"
        href="#featureCarousel2"
        role="button"
        data-bs-slide="next"
      />
    </div>
  </div>
  <a
    href="{{ route('public.certificates') }}"
    class="btn bgorangeInline text-center Roboto px-5 pt-2 my-5"
    >Explore all certificates</a
  >
</div>

          
          
        </div>
      </div>
        <div class="col-12 bgorange mb-5 py-5 flex-column">
        <div class="col-12 container">
          <div class="row">
            <div class="col-md-6 col-12">
              <h2 class="Roboto light fw-bold pb-4">Why Elite Minds?</h2>
              <p class="Roboto light fw-normal pb-4">
                Elite Minds is an education platform that was established in
                2017 based on the concept of providing ambitious project
                management practitioners with online self-paced, high-quality,
                and cost-effective exam preparation materials to study wherever
                they are.
                <br /><br />

                We will not sell you an online course and leave you walk the
                exam preparation journey alone; we will be accessible through
                WhatsApp 24/7 to answer your questions on spot! We will provide
                you with all required references and books you need, in addition
                to high-quality mock exams that will help you ace the real exam
                from your first trial.
                <br /><br />

                Our promise to all Elite Minds students, that we will be with
                you in your exam preparation journey, since the moment you take
                the decision to enroll in our course, until the moment you send
                us a message that you passed your exam!
              </p>
            </div>
            <div
              class="col-md-6 col-12 d-flex justify-content-end align-items-end flex-column"
            >
              <div
                class="card col-md-7 col-12 bgGray bgGrayimage bourder-0 mb-3"
              >
                <div class="card-body">
                  <h1
                    class="card-title Roboto fw-bold d-flex justify-content-start align-items-end"
                  >
                    <svg
                      width="110"
                      height="55"
                      viewBox="0 0 110 55"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M55 30.9375C62.4708 30.9375 69.0708 32.725 74.4333 35.0625C79.3833 37.2625 82.5 42.2125 82.5 47.575V55H27.5V47.6208C27.5 42.2125 30.6167 37.2625 35.5667 35.1083C40.9292 32.725 47.5292 30.9375 55 30.9375ZM18.3333 32.0833C23.375 32.0833 27.5 27.9583 27.5 22.9167C27.5 17.875 23.375 13.75 18.3333 13.75C13.2917 13.75 9.16667 17.875 9.16667 22.9167C9.16667 27.9583 13.2917 32.0833 18.3333 32.0833ZM23.5125 37.125C21.8167 36.85 20.1208 36.6667 18.3333 36.6667C13.7958 36.6667 9.4875 37.6292 5.59167 39.325C2.2 40.7917 0 44.0917 0 47.8042V55H20.625V47.6208C20.625 43.8167 21.6792 40.2417 23.5125 37.125ZM91.6667 32.0833C96.7083 32.0833 100.833 27.9583 100.833 22.9167C100.833 17.875 96.7083 13.75 91.6667 13.75C86.625 13.75 82.5 17.875 82.5 22.9167C82.5 27.9583 86.625 32.0833 91.6667 32.0833ZM110 47.8042C110 44.0917 107.8 40.7917 104.408 39.325C100.512 37.6292 96.2042 36.6667 91.6667 36.6667C89.8792 36.6667 88.1833 36.85 86.4875 37.125C88.3208 40.2417 89.375 43.8167 89.375 47.6208V55H110V47.8042ZM55 0C62.6083 0 68.75 6.14167 68.75 13.75C68.75 21.3583 62.6083 27.5 55 27.5C47.3917 27.5 41.25 21.3583 41.25 13.75C41.25 6.14167 47.3917 0 55 0Z"
                        fill="#4B4B4D"
                      />
                      </svg>
                      <span class="textOrang">1,200,000</span>
                  </h1>
                  <p class="card-text">
                    There are more than 1,200,00 PMP certification holders
                    worldwide. They’ve earned universally recognized knowledge.
                  </p>
                </div>
              </div>
              <div class="card col-md-7 col-12 bgGray bourder-0">
                <div class="card-body">
                  <h1
                    class="card-title Roboto fw-bold d-flex justify-content-start align-items-end textGrey"
                  >
                    <svg
                      width="52"
                      height="101"
                      viewBox="0 0 52 101"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect
                        x="14"
                        y="26"
                        width="23"
                        height="75"
                        rx="2"
                        fill="#4B4B4D"
                      />
                      <path
                        d="M24.3494 1.41217C25.1437 0.251415 26.8563 0.251416 27.6506 1.41217L51.5714 36.3706C52.4797 37.6979 51.5292 39.5 49.9209 39.5H2.07912C0.470765 39.5 -0.479712 37.6979 0.428554 36.3706L24.3494 1.41217Z"
                        fill="#4B4B4D"
                      />
                    </svg>

                    <span class="textOrang">16% </span>Higher
                  </h1>
                  <p class="card-text">
                    The median salary for PMP holders globally is 16% higher
                    (and 32% higher in the USA) than those without
                    certification, according to Earning Power: Project
                    Management Salary Survey - Twelfth Edition.<br />
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-5 py-5 d-flex justify-content-center align-items-center flex-column">
        <h2 class="Roboto textGrey fw-bold pb-2 fs-1">Achieve your goals</h2>
        <p class="Roboto textGrey fw-lighter w-50 para">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s
        </p>
        <div class="d-flex container mt-3">
          <div class="row d-flex">
            <div
              class="col-lg-3 col-md-6 col-12 d-flex flex-column text-md-start text-center"
            >
              <div
                class="col-12 pt-3 ps-md-0 text-center text-md-start text-center"
              >
                <svg
                  width="202"
                  height="252"
                  viewBox="0 0 202 252"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M74.3691 0.448242H76.3691V-1.55176H74.3691V0.448242ZM74.3691 170V172H76.3691V170H74.3691ZM40.9004 170H38.9004V172H40.9004V170ZM40.9004 39.0303H42.9004V36.2958L40.2944 37.1243L40.9004 39.0303ZM0.691406 51.8135H-1.30859V54.548L1.29736 53.7195L0.691406 51.8135ZM0.691406 25.4336L0.0197239 23.5498L-1.30859 24.0234V25.4336H0.691406ZM70.7666 0.448242V-1.55176H70.4207L70.0949 -1.4356L70.7666 0.448242ZM72.3691 0.448242V170H76.3691V0.448242H72.3691ZM74.3691 168H40.9004V172H74.3691V168ZM42.9004 170V39.0303H38.9004V170H42.9004ZM40.2944 37.1243L0.085453 49.9075L1.29736 53.7195L41.5063 40.9363L40.2944 37.1243ZM2.69141 51.8135V25.4336H-1.30859V51.8135H2.69141ZM1.36309 27.3174L71.4383 2.33208L70.0949 -1.4356L0.0197239 23.5498L1.36309 27.3174ZM70.7666 2.44824H74.3691V-1.55176H70.7666V2.44824Z"
                    fill="#D8D8D8"
                  />
                  <circle
                    cx="109.5"
                    cy="159.5"
                    r="91.5"
                    fill="#F2F5F7"
                    stroke="#D8D8D8"
                    stroke-width="2"
                  />
                  <g clip-path="url(#clip0_7_2)">
                    <path
                      d="M147.547 160.501C147.54 169.319 144.475 177.862 138.875 184.674C133.274 191.485 125.485 196.144 116.834 197.856C108.184 199.567 99.2072 198.226 91.4349 194.06C83.6625 189.894 77.5754 183.162 74.2111 175.01C70.8467 166.859 70.4133 157.793 72.9848 149.358C75.5563 140.923 80.9735 133.641 88.313 128.752C95.6525 123.864 104.46 121.672 113.235 122.551C122.009 123.43 130.206 127.323 136.431 133.569L147.547 160.501ZM147.547 160.501C147.547 160.501 147.547 160.502 147.547 160.502L146.549 160.5L147.547 160.501ZM76.6229 127.623L76.6241 127.622C80.9352 123.296 86.0591 119.866 91.701 117.528C97.3429 115.191 103.391 113.991 109.498 114L109.5 113L109.5 114C120.262 113.997 130.693 117.726 139.014 124.551C147.335 131.377 153.031 140.876 155.133 151.431C157.235 161.986 155.612 172.944 150.54 182.436C145.468 191.928 137.262 199.368 127.32 203.488C117.377 207.608 106.314 208.152 96.0146 205.029C85.7155 201.906 76.8181 195.308 70.8385 186.36C64.8588 177.412 62.167 166.667 63.2218 155.957C64.2766 145.246 69.0126 135.233 76.6229 127.623ZM116.711 162.047L116.712 162.044C116.788 161.76 116.846 161.473 116.886 161.182L120.712 159.007L123.693 184.453L102.898 169.143L107.035 166.788C107.331 166.912 107.636 167.017 107.947 167.101L107.947 167.101L107.955 167.103C109.786 167.584 111.733 167.323 113.373 166.376C115.013 165.429 116.212 163.873 116.711 162.047ZM102.907 158.35L102.906 158.355C102.751 158.933 102.67 159.527 102.665 160.123L98.8065 162.317L95.8387 136.873L116.609 152.185L113.407 154.021C112.863 153.708 112.282 153.464 111.675 153.297L111.675 153.297L111.663 153.294C109.832 152.813 107.885 153.074 106.245 154.021C104.605 154.968 103.406 156.524 102.907 158.35Z"
                      stroke="#F58634"
                      stroke-width="2"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_7_2">
                      <rect
                        width="95"
                        height="95"
                        fill="white"
                        transform="translate(62 113)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <div
                class="col-12 mt-3 text-md-start text-center d-flex flex-column"
              >
                <h5 class="Roboto fw-bold textGrey">
                  Discover our certificates
                </h5>
                <p class="Roboto">
                  Decide the certification that most suit your career and
                  experience (Check our blog for more details about project
                  management certifications).
                </p>
                <a
                  href="./blogs.html"
                  class="col-12 text-center Roboto textOrang"
                  >Explore Blogs</a
                >
              </div>
            </div>
            <div
              class="col-lg-3 col-md-6 col-12 d-flex flex-column text-md-start text-center"
            >
              <div class="col-12 pt-3">
                <svg
                  width="225"
                  height="254"
                  viewBox="0 0 225 254"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M119.535 145.853H121.535V143.853H119.535V145.853ZM119.535 172V174H121.535V172H119.535ZM3.78906 172H1.78906V174H3.78906V172ZM3.78906 149.688L2.32647 148.323L1.78906 148.9V149.688H3.78906ZM58.5244 91.001L59.987 92.3651L59.9996 92.3516L60.0119 92.3379L58.5244 91.001ZM71.54 74.8477L73.1913 75.976L73.1957 75.9697L73.1999 75.9633L71.54 74.8477ZM78.3965 62.1807L76.5318 61.4576L76.5277 61.468L76.5238 61.4784L78.3965 62.1807ZM78.0479 38.2412L76.2297 39.0745L76.2331 39.0818L76.2365 39.0891L78.0479 38.2412ZM70.4941 29.6416L69.4414 31.3421L69.4503 31.3476L69.4593 31.3531L70.4941 29.6416ZM45.1602 30.3389L44.0508 28.6748L44.0426 28.6802L44.0346 28.6857L45.1602 30.3389ZM36.793 40.6816L34.9614 39.8783L34.9554 39.8919L34.9497 39.9055L36.793 40.6816ZM34.0039 55.6729V57.6729H36.0039V55.6729H34.0039ZM0.418945 55.6729H-1.58105V57.6729H0.418945V55.6729ZM7.62402 28.0146L9.35854 29.0104L9.36247 29.0035L7.62402 28.0146ZM27.9609 7.91016L28.9466 9.65046L28.9582 9.6438L27.9609 7.91016ZM89.0879 6.16699L88.228 7.97271L88.2383 7.97762L88.2487 7.98241L89.0879 6.16699ZM107.682 22.6689L105.952 23.6732L105.958 23.6842L105.965 23.6952L107.682 22.6689ZM111.4 64.6211L113.295 65.2619L113.298 65.2535L111.4 64.6211ZM103.73 80.4258L102.04 79.3569L102.036 79.3635L103.73 80.4258ZM76.4209 112.849L74.9971 111.444L74.9614 111.48L74.9275 111.518L76.4209 112.849ZM47.0195 145.853L45.5262 144.522L42.5593 147.853H47.0195V145.853ZM117.535 145.853V172H121.535V145.853H117.535ZM119.535 170H3.78906V174H119.535V170ZM5.78906 172V149.688H1.78906V172H5.78906ZM5.25165 151.052L59.987 92.3651L57.0618 89.6369L2.32647 148.323L5.25165 151.052ZM60.0119 92.3379C65.5474 86.1787 69.948 80.7224 73.1913 75.976L69.8887 73.7193C66.7793 78.2698 62.5027 83.5824 57.0369 89.6641L60.0119 92.3379ZM73.1999 75.9633C76.4291 71.159 78.8021 66.795 80.2691 62.8829L76.5238 61.4784C75.2018 65.0038 73.0038 69.0845 69.8801 73.732L73.1999 75.9633ZM80.2612 62.9037C81.8056 58.9207 82.6045 55.0722 82.6045 51.373H78.6045C78.6045 54.4916 77.9313 57.8482 76.5318 61.4576L80.2612 62.9037ZM82.6045 51.373C82.6045 46.0438 81.7169 41.3619 79.8592 37.3933L76.2365 39.0891C77.7877 42.4031 78.6045 46.4758 78.6045 51.373H82.6045ZM79.866 37.4079C78.0034 33.3441 75.2216 30.1629 71.529 27.9301L69.4593 31.3531C72.4295 33.149 74.6834 35.7008 76.2297 39.0745L79.866 37.4079ZM71.5469 27.9411C67.9052 25.6867 63.4893 24.6201 58.4082 24.6201V28.6201C62.9339 28.6201 66.5753 29.5679 69.4414 31.3421L71.5469 27.9411ZM58.4082 24.6201C52.9586 24.6201 48.1436 25.9462 44.0508 28.6748L46.2696 32.003C49.6142 29.7732 53.6312 28.6201 58.4082 28.6201V24.6201ZM44.0346 28.6857C40.0537 31.396 37.0343 35.1521 34.9614 39.8783L38.6245 41.485C40.4253 37.3792 42.984 34.24 46.2857 31.9921L44.0346 28.6857ZM34.9497 39.9055C32.9713 44.6042 32.0039 49.8714 32.0039 55.6729H36.0039C36.0039 50.318 36.8959 45.5911 38.6362 41.4578L34.9497 39.9055ZM34.0039 53.6729H0.418945V57.6729H34.0039V53.6729ZM2.41895 55.6729C2.41895 45.9347 4.73689 37.061 9.35853 29.0104L5.88952 27.0189C0.904387 35.7027 -1.58105 45.2678 -1.58105 55.6729H2.41895ZM9.36247 29.0035C13.9808 20.8842 20.4945 14.4375 28.9466 9.65042L26.9753 6.16989C17.9183 11.2995 10.874 18.2558 5.88558 27.0258L9.36247 29.0035ZM28.9582 9.6438C37.3566 4.81287 47.3806 2.35645 59.1055 2.35645V-1.64355C46.8134 -1.64355 36.0744 0.935833 26.9637 6.17651L28.9582 9.6438ZM59.1055 2.35645C70.7514 2.35645 80.4327 4.26064 88.228 7.97271L89.9478 4.36127C81.4736 0.325954 71.1666 -1.64355 59.1055 -1.64355V2.35645ZM88.2487 7.98241C96.1215 11.6217 101.993 16.8544 105.952 23.6732L109.411 21.6647C105.003 14.0734 98.4787 8.3047 89.9271 4.35157L88.2487 7.98241ZM105.965 23.6952C110.007 30.4572 112.073 38.6095 112.073 48.2354H116.073C116.073 38.0279 113.878 29.1359 109.398 21.6427L105.965 23.6952ZM112.073 48.2354C112.073 53.5963 111.218 58.8448 109.503 63.9886L113.298 65.2535C115.147 59.706 116.073 54.0307 116.073 48.2354H112.073ZM109.506 63.9803C107.78 69.0814 105.297 74.2069 102.04 79.3569L105.421 81.4947C108.827 76.1083 111.457 70.6972 113.295 65.2619L109.506 63.9803ZM102.036 79.3635C98.8449 84.4539 94.9583 89.639 90.3677 94.9181L93.3862 97.5428C98.0925 92.1305 102.108 86.7792 105.425 81.4881L102.036 79.3635ZM90.3677 94.9181C85.7502 100.228 80.6272 105.737 74.9971 111.444L77.8447 114.253C83.5258 108.494 88.7068 102.924 93.3862 97.5428L90.3677 94.9181ZM74.9275 111.518L45.5262 144.522L48.5129 147.183L77.9143 114.179L74.9275 111.518ZM47.0195 147.853H119.535V143.853H47.0195V147.853Z"
                    fill="#D8D8D8"
                  />
                  <circle
                    cx="132.5"
                    cy="161.5"
                    r="91.5"
                    fill="#F2F5F7"
                    stroke="#D8D8D8"
                    stroke-width="2"
                  />
                  <path
                    d="M102 146.5V124C102 120.134 105.134 117 109 117H157C160.866 117 164 120.134 164 124V200C164 203.866 160.866 207 157 207H109C105.134 207 102 203.866 102 200V154.5"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <line
                    x1="113"
                    y1="164"
                    x2="154"
                    y2="164"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <line
                    x1="113"
                    y1="174"
                    x2="154"
                    y2="174"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <line
                    x1="113"
                    y1="184"
                    x2="154"
                    y2="184"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <line
                    x1="121"
                    y1="194"
                    x2="147"
                    y2="194"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <circle
                    cx="133"
                    cy="141"
                    r="14"
                    stroke="#F58634"
                    stroke-width="2"
                  />
                  <circle
                    cx="133"
                    cy="139"
                    r="6"
                    stroke="#F58634"
                    stroke-width="2"
                  />
                  <path
                    d="M124.413 152C126.429 148.342 129.526 146 133 146C136.474 146 139.571 148.342 141.587 152"
                    stroke="#F58634"
                    stroke-width="2"
                  />
                </svg>
              </div>
              <div class="col-12 mt-3">
                <h5 class="Roboto fw-bold textGrey">
                  Sign up for the certificate
                </h5>
                <p class="Roboto">
                  Enroll in an exam preparation course to get ready for the exam
                  and obtain the contact hours certification and fill in your
                  exam application through PMI website and schedule your exam.
                </p>
              </div>
            </div>
            <div
              class="col-lg-3 col-md-6 col-12 d-flex flex-column text-md-start text-center"
            >
              <div class="col-12 pt-3">
                <svg
                  width="214"
                  height="254"
                  viewBox="0 0 214 254"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M39.0713 72.8721V70.8721H37.0713V72.8721H39.0713ZM71.1455 69.9668L72.0694 71.7406L72.0838 71.7331L72.0981 71.7254L71.1455 69.9668ZM79.3965 61.5996L77.6153 60.6901L77.6114 60.6976L77.6076 60.7052L79.3965 61.5996ZM79.6289 37.4277L77.8239 38.2892L77.8358 38.3141L77.8484 38.3387L79.6289 37.4277ZM72.0752 29.5254L71.0872 31.2643L71.1023 31.2729L71.1175 31.2812L72.0752 29.5254ZM36.2822 46.6084V48.6084H38.2822V46.6084H36.2822ZM2.69727 46.6084H0.697266V48.6084H2.69727V46.6084ZM10.1348 22.3203L8.51965 21.1407L8.51531 21.1467L8.51101 21.1527L10.1348 22.3203ZM88.3447 5.93457L87.5509 7.77028L87.5579 7.77331L87.5649 7.77628L88.3447 5.93457ZM108.449 22.0879L110.108 20.9702L108.449 22.0879ZM111.936 64.1562L113.724 65.0507L113.73 65.0396L111.936 64.1562ZM101.244 77.6367L102.552 79.1498L102.554 79.1481L101.244 77.6367ZM84.5098 87.166L85.1754 89.052L85.1852 89.0485L85.195 89.045L84.5098 87.166ZM39.0713 90.6523H37.0713V92.6523H39.0713V90.6523ZM39.0713 98.3223H37.0713V100.322H39.0713V98.3223ZM39.0713 81.0068V79.0068H37.0713V81.0068H39.0713ZM104.149 93.209L102.867 94.7434L102.874 94.7496L102.882 94.7558L104.149 93.209ZM114.841 107.038L113.016 107.858L113.021 107.868L114.841 107.038ZM113.911 145.736L115.705 146.622L115.709 146.613L113.911 145.736ZM101.128 161.309L99.9031 159.727L99.8923 159.736L101.128 161.309ZM82.0693 171.07L82.6403 172.987L82.6496 172.984L82.6589 172.981L82.0693 171.07ZM37.2119 171.419L36.6452 173.337L36.6581 173.341L36.6711 173.344L37.2119 171.419ZM18.6182 162.471L17.4364 164.084L17.4492 164.094L17.4621 164.103L18.6182 162.471ZM5.37012 147.363L3.60418 148.302L3.6113 148.316L3.61863 148.329L5.37012 147.363ZM0.489258 125.632V123.632H-1.51074V125.632H0.489258ZM34.0742 125.632H36.0742V123.632H34.0742V125.632ZM46.2764 145.271L45.3674 147.053L45.3747 147.057L45.3819 147.06L46.2764 145.271ZM72.8887 145.271L73.7976 147.053L73.8045 147.049L73.8114 147.046L72.8887 145.271ZM81.7207 136.904L79.9865 135.908L79.9796 135.92L81.7207 136.904ZM81.4883 109.362L79.7671 110.381L79.7718 110.389L79.7765 110.397L81.4883 109.362ZM39.0713 74.8721H56.9678V70.8721H39.0713V74.8721ZM56.9678 74.8721C62.9102 74.8721 67.9801 73.8705 72.0694 71.7406L70.2216 68.193C66.8734 69.9368 62.4915 70.8721 56.9678 70.8721V74.8721ZM72.0981 71.7254C76.1542 69.5283 79.2084 66.448 81.1853 62.494L77.6076 60.7052C76.0208 63.8788 73.5743 66.3766 70.1929 68.2082L72.0981 71.7254ZM81.1777 62.5092C83.204 58.5409 84.1855 53.9971 84.1855 48.9326H80.1855C80.1855 53.4749 79.3077 57.3757 77.6153 60.6901L81.1777 62.5092ZM84.1855 48.9326C84.1855 44.3279 83.2795 40.172 81.4094 36.5168L77.8484 38.3387C79.3872 41.3463 80.1855 44.8602 80.1855 48.9326H84.1855ZM81.4339 36.5663C79.6203 32.7664 76.8002 29.8245 73.0329 27.7696L71.1175 31.2812C74.1679 32.9451 76.3836 35.2714 77.8239 38.2892L81.4339 36.5663ZM73.0632 27.7865C69.2711 25.6318 64.6043 24.6201 59.1758 24.6201V28.6201C64.1287 28.6201 68.0616 29.5452 71.0872 31.2643L73.0632 27.7865ZM59.1758 24.6201C54.7975 24.6201 50.7101 25.4894 46.9413 27.2482L48.6329 30.8729C51.8368 29.3778 55.3419 28.6201 59.1758 28.6201V24.6201ZM46.9413 27.2482C43.1625 29.0116 40.095 31.5139 37.7896 34.7586L41.0503 37.0754C42.9284 34.4321 45.4391 32.3634 48.6329 30.8729L46.9413 27.2482ZM37.7896 34.7586C35.4207 38.0925 34.2822 42.0776 34.2822 46.6084H38.2822C38.2822 42.772 39.2355 39.6295 41.0503 37.0754L37.7896 34.7586ZM36.2822 44.6084H2.69727V48.6084H36.2822V44.6084ZM4.69727 46.6084C4.69727 37.6888 7.06811 30.0106 11.7585 23.488L8.51101 21.1527C3.28476 28.4204 0.697266 36.9342 0.697266 46.6084H4.69727ZM11.7499 23.4999C16.5666 16.9047 23.0272 11.729 31.1894 7.98486L29.5216 4.34912C20.7944 8.35243 13.7745 13.9456 8.51965 21.1407L11.7499 23.4999ZM31.1894 7.98486C39.349 4.2419 48.3579 2.35645 58.2461 2.35645V-1.64355C47.8361 -1.64355 38.2513 0.344688 29.5216 4.34912L31.1894 7.98486ZM58.2461 2.35645C69.4987 2.35645 79.2513 4.18129 87.5509 7.77028L89.1385 4.09886C80.2389 0.250355 69.9257 -1.64355 58.2461 -1.64355V2.35645ZM87.5649 7.77628C95.8398 11.2801 102.223 16.4272 106.791 23.2056L110.108 20.9702C105.069 13.4934 98.0488 7.87161 89.1245 4.09286L87.5649 7.77628ZM106.791 23.2056C111.326 29.9349 113.654 38.355 113.654 48.584H117.654C117.654 37.7401 115.18 28.4961 110.108 20.9702L106.791 23.2056ZM113.654 48.584C113.654 53.608 112.492 58.4978 110.141 63.2729L113.73 65.0396C116.337 59.7431 117.654 54.2514 117.654 48.584H113.654ZM110.147 63.2618C107.797 67.9605 104.406 72.25 99.9343 76.1253L102.554 79.1481C107.379 74.9662 111.115 70.2686 113.724 65.0507L110.147 63.2618ZM99.9362 76.1236C95.5758 79.8929 90.2177 82.9554 83.8245 85.2871L85.195 89.045C91.9724 86.5732 97.7706 83.2829 102.552 79.1498L99.9362 76.1236ZM83.8441 85.28C77.5066 87.5168 70.338 88.6523 62.3135 88.6523V92.6523C70.7135 92.6523 78.3424 91.4636 85.1754 89.052L83.8441 85.28ZM62.3135 88.6523H39.0713V92.6523H62.3135V88.6523ZM41.0713 90.6523V72.8721H37.0713V90.6523H41.0713ZM41.0713 98.3223V81.0068H37.0713V98.3223H41.0713ZM39.0713 83.0068H62.3135V79.0068H39.0713V83.0068ZM62.3135 83.0068C71.3875 83.0068 79.2826 84.0369 86.0269 86.0602L87.1763 82.2289C79.9752 80.0686 71.6783 79.0068 62.3135 79.0068V83.0068ZM86.0269 86.0602C92.7865 88.0881 98.3827 90.9945 102.867 94.7434L105.432 91.6746C100.464 87.5211 94.3619 84.3846 87.1763 82.2289L86.0269 86.0602ZM102.882 94.7558C107.379 98.442 110.747 102.806 113.016 107.858L116.665 106.218C114.131 100.578 110.372 95.7234 105.417 91.6622L102.882 94.7558ZM113.021 107.868C115.291 112.848 116.443 118.41 116.443 124.586H120.443C120.443 117.901 119.194 111.765 116.661 106.208L113.021 107.868ZM116.443 124.586C116.443 132.229 114.984 138.972 112.113 144.86L115.709 146.613C118.882 140.105 120.443 132.748 120.443 124.586H116.443ZM112.118 144.851C109.233 150.694 105.169 155.648 99.9031 159.727L102.353 162.89C108.088 158.447 112.546 153.02 115.705 146.622L112.118 144.851ZM99.8923 159.736C94.6811 163.83 88.5526 166.977 81.4797 169.159L82.6589 172.981C90.1512 170.67 96.7284 167.309 102.364 162.881L99.8923 159.736ZM81.4984 169.154C74.4237 171.261 66.6774 172.324 58.2461 172.324V176.324C67.014 176.324 75.1499 175.218 82.6403 172.987L81.4984 169.154ZM58.2461 172.324C51.3022 172.324 44.4728 171.381 37.7528 169.493L36.6711 173.344C43.7414 175.33 50.9347 176.324 58.2461 176.324V172.324ZM37.7786 169.501C31.1632 167.546 25.1658 164.658 19.7742 160.839L17.4621 164.103C23.2268 168.186 29.6252 171.263 36.6452 173.337L37.7786 169.501ZM19.7999 160.857C14.537 157.003 10.3142 152.189 7.1216 146.398L3.61863 148.329C7.08877 154.624 11.6981 159.882 17.4364 164.084L19.7999 160.857ZM7.13606 146.424C4.0646 140.647 2.48926 133.739 2.48926 125.632H-1.51074C-1.51074 134.259 0.167826 141.839 3.60418 148.302L7.13606 146.424ZM0.489258 127.632H34.0742V123.632H0.489258V127.632ZM32.0742 125.632C32.0742 130.321 33.2522 134.573 35.6408 138.327L39.0154 136.179C37.0656 133.115 36.0742 129.619 36.0742 125.632H32.0742ZM35.6408 138.327C38.0124 142.053 41.2714 144.963 45.3674 147.053L47.1853 143.49C43.6889 141.706 40.9824 139.27 39.0154 136.179L35.6408 138.327ZM45.3819 147.06C49.558 149.148 54.1682 150.177 59.1758 150.177V146.177C54.7315 146.177 50.7421 145.268 47.1708 143.483L45.3819 147.06ZM59.1758 150.177C64.7589 150.177 69.6574 149.165 73.7976 147.053L71.9797 143.49C68.5275 145.251 64.284 146.177 59.1758 146.177V150.177ZM73.8114 147.046C78.0047 144.865 81.2441 141.812 83.4618 137.888L79.9796 135.92C78.1687 139.124 75.5201 141.649 71.966 143.497L73.8114 147.046ZM83.4549 137.901C85.7446 133.915 86.8584 129.339 86.8584 124.237H82.8584C82.8584 128.742 81.8804 132.611 79.9865 135.908L83.4549 137.901ZM86.8584 124.237C86.8584 117.822 85.6993 112.465 83.2001 108.328L79.7765 110.397C81.7708 113.698 82.8584 118.257 82.8584 124.237H86.8584ZM83.2094 108.344C80.7386 104.169 77.1891 101.098 72.6265 99.1551L71.0591 102.835C74.8636 104.456 77.7445 106.963 79.7671 110.381L83.2094 108.344ZM72.6265 99.1551C68.1396 97.244 62.9024 96.3223 56.9678 96.3223V100.322C62.4992 100.322 67.1788 101.182 71.0591 102.835L72.6265 99.1551ZM56.9678 96.3223H39.0713V100.322H56.9678V96.3223Z"
                    fill="#D8D8D8"
                  />
                  <circle
                    cx="121.5"
                    cy="161.5"
                    r="91.5"
                    fill="#F2F5F7"
                    stroke="#D8D8D8"
                    stroke-width="2"
                  />
                  <path
                    d="M95.4559 175.505C89.4558 180.005 88.4451 192.974 99.173 194.762C100.067 200.126 109.901 202.808 115.265 199.232C117.947 201.02 125.099 201.02 128.675 199.232C132.251 201.914 140.297 199.232 142.979 194.762C146.555 194.762 154.6 191.186 151.918 182.246C149.237 173.306 139.403 174.2 137.615 182.246M110.795 174.2C110.795 183.14 95.5972 185.822 95.5972 174.2C95.5972 167.942 100.961 166.154 102.749 166.154C102.749 163.472 111.495 151.932 121.956 162.505"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M128.45 175.175C128.988 175.299 129.525 174.964 129.649 174.426C129.773 173.887 129.438 173.35 128.899 173.226L128.45 175.175ZM123.311 160.791L124.143 161.345L124.143 161.345L123.311 160.791ZM139.403 166.155L138.454 166.471C138.602 166.914 139.037 167.196 139.502 167.15L139.403 166.155ZM128.899 173.226C127.202 172.835 124.892 171.434 123.585 169.337C122.943 168.307 122.553 167.127 122.575 165.82C122.596 164.515 123.03 163.015 124.143 161.345L122.479 160.236C121.187 162.174 120.604 164.042 120.575 165.787C120.546 167.531 121.072 169.085 121.888 170.395C123.496 172.976 126.273 174.673 128.45 175.175L128.899 173.226ZM124.143 161.345C125.608 159.148 128.428 158.478 131.396 159.399C134.344 160.314 137.22 162.769 138.454 166.471L140.351 165.839C138.904 161.495 135.521 158.585 131.988 157.489C128.474 156.398 124.59 157.069 122.479 160.236L124.143 161.345ZM139.502 167.15C140.779 167.022 142.669 167.336 144.142 168.663C145.579 169.958 146.793 172.374 146.452 176.806L148.446 176.959C148.82 172.093 147.501 168.997 145.481 167.177C143.497 165.391 141.006 164.989 139.303 165.16L139.502 167.15Z"
                    fill="#F58634"
                  />
                  <path
                    d="M85 138V163M96 138V163"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <path
                    d="M114 138V151M125 138V151"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <path
                    d="M145 138V163M156 138V163"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                  <path
                    d="M85.25 138H80L90.5 120L101 138H95.8"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M114.25 138H109L119.5 120L130 138H124.8"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M145.25 138H140L150.5 120L161 138H155.8"
                    stroke="#F58634"
                    stroke-width="2"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <div class="col-12 mt-3">
                <h5 class="Roboto fw-bold textGrey">
                  Acquire your certificate
                </h5>
                <p class="Roboto">
                  Practice high quality mock exams to get prepared for the real
                  exam environment.
                </p>
              </div>
            </div>
            <div
              class="col-lg-3 col-md-6 col-12 d-flex flex-column text-md-start text-center"
            >
              <div class="col-12 pt-3">
                <svg
                  width="215"
                  height="252"
                  viewBox="0 0 215 252"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M124.324 106.781H126.324V104.781H124.324V106.781ZM124.324 133.045V135.045H126.324V133.045H124.324ZM2.41895 133.045L0.425315 133.204L0.572556 135.045H2.41895V133.045ZM0.791992 112.708L-0.899945 111.642L-1.25469 112.204L-1.20164 112.867L0.791992 112.708ZM71.332 0.796875V-1.20312H70.2285L69.6401 -0.269588L71.332 0.796875ZM97.9443 0.796875L99.6611 1.82282L101.469 -1.20312H97.9443V0.796875ZM69.124 49.0244L70.8332 50.063L70.8371 50.0567L70.8408 50.0504L69.124 49.0244ZM34.0283 106.781L32.3191 105.743L30.4727 108.781H34.0283V106.781ZM105.149 0.796875H107.149V-1.20312H105.149V0.796875ZM105.149 170V172H107.149V170H105.149ZM71.6807 170H69.6807V172H71.6807V170ZM71.6807 0.796875V-1.20312H69.6807V0.796875H71.6807ZM122.324 106.781V133.045H126.324V106.781H122.324ZM124.324 131.045H2.41895V135.045H124.324V131.045ZM4.41258 132.885L2.78562 112.549L-1.20164 112.867L0.425315 133.204L4.41258 132.885ZM2.48393 113.774L73.024 1.86334L69.6401 -0.269588L-0.899945 111.642L2.48393 113.774ZM71.332 2.79688H97.9443V-1.20312H71.332V2.79688ZM96.2275 -0.229073L67.4072 47.9985L70.8408 50.0504L99.6611 1.82282L96.2275 -0.229073ZM67.4148 47.9858L32.3191 105.743L35.7375 107.82L70.8332 50.063L67.4148 47.9858ZM34.0283 108.781H124.324V104.781H34.0283V108.781ZM103.149 0.796875V170H107.149V0.796875H103.149ZM105.149 168H71.6807V172H105.149V168ZM73.6807 170V0.796875H69.6807V170H73.6807ZM71.6807 2.79688H105.149V-1.20312H71.6807V2.79688Z"
                    fill="#D8D8D8"
                  />
                  <circle
                    cx="122.5"
                    cy="159.5"
                    r="91.5"
                    fill="#F2F5F7"
                    stroke="#D8D8D8"
                    stroke-width="2"
                  />
                  <g clip-path="url(#clip0_7_2)">
                    <mask id="path-3-inside-1_7_2" fill="white">
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M155.39 198.477L146.511 196.887L142.102 204.751C138.907 208.702 136.881 202.208 135.985 199.945L127.418 183.824C129.391 183.143 131.773 181.168 134.247 178.958C139.127 179.056 143.673 178.201 147.019 173.963L156.885 192.944L157.742 194.761C158.41 197.13 158.061 198.696 155.465 198.477H155.39ZM89.6106 198.477L98.4894 196.887L102.936 204.751C106.131 208.702 108.157 202.208 109.053 199.945L117.583 183.824C115.61 183.143 113.227 181.168 110.753 178.958C105.873 179.056 101.328 178.201 97.981 173.963L88.1156 192.944L87.296 194.738C86.6207 197.107 86.9773 198.673 89.6106 198.454V198.477ZM140.501 119.054C141.065 119.269 141.581 119.593 142.018 120.008L146.359 124.004C146.796 124.413 147.156 124.898 147.421 125.434C147.687 125.986 147.832 126.587 147.846 127.198C147.866 127.809 147.766 128.419 147.55 128.992C147.336 129.562 147 130.079 146.564 130.505L145.987 131.133C146.939 132.811 147.702 134.587 148.264 136.431H148.681C149.294 136.403 149.906 136.501 150.48 136.719C151.045 136.935 151.561 137.262 151.997 137.68C152.439 138.086 152.793 138.578 153.037 139.126C153.287 139.671 153.428 140.26 153.454 140.859L153.675 146.815C153.708 147.411 153.62 148.008 153.417 148.57C153.213 149.132 152.898 149.647 152.491 150.085C152.077 150.535 151.576 150.898 151.018 151.152C150.46 151.396 149.86 151.53 149.25 151.545H148.385C147.862 153.383 147.142 155.159 146.238 156.843L146.549 157.116L146.632 157.199C147.064 157.616 147.407 158.115 147.641 158.667C147.886 159.213 148.02 159.802 148.036 160.4C148.059 160.992 147.969 161.583 147.771 162.141C147.567 162.697 147.26 163.211 146.867 163.655L146.814 163.708L142.777 168.029C142.373 168.484 141.883 168.854 141.335 169.119C140.772 169.383 140.159 169.528 139.537 169.543C138.916 169.56 138.299 169.459 137.715 169.248C137.144 169.032 136.627 168.697 136.198 168.264L135.568 167.643C133.911 168.567 132.157 169.308 130.339 169.853V170.285C130.373 170.894 130.272 171.504 130.043 172.071C129.835 172.637 129.509 173.153 129.087 173.584C128.682 174.027 128.188 174.381 127.638 174.621C127.094 174.873 126.506 175.016 125.907 175.045L119.935 175.257C119.327 175.297 118.716 175.212 118.142 175.008C117.568 174.803 117.042 174.484 116.596 174.069C116.146 173.654 115.783 173.155 115.526 172.6C115.266 172.046 115.115 171.448 115.078 170.837V169.967C113.235 169.447 111.454 168.729 109.766 167.825L109.478 168.135L109.402 168.218C108.986 168.652 108.485 168.994 107.93 169.225C106.829 169.704 105.587 169.75 104.454 169.354C103.898 169.147 103.384 168.842 102.936 168.453L102.883 168.4L98.5349 164.321C98.0973 163.906 97.7375 163.416 97.4725 162.875C97.2134 162.322 97.0689 161.722 97.0475 161.112C97.0365 160.503 97.1368 159.898 97.3435 159.326C97.5753 158.764 97.9098 158.251 98.33 157.812L98.9447 157.153C98.0229 155.496 97.2801 153.745 96.7288 151.931H96.3039C95.6924 151.965 95.0809 151.865 94.5129 151.636C93.9469 151.425 93.4304 151.101 92.9952 150.683C92.5551 150.275 92.2015 149.783 91.9555 149.237C91.7103 148.69 91.5687 148.102 91.5381 147.504L91.3181 141.547C91.2851 140.943 91.3648 140.337 91.5533 139.761C91.7752 139.202 92.0994 138.689 92.5095 138.248C92.9232 137.791 93.4235 137.42 93.9817 137.158C94.5411 136.917 95.141 136.784 95.7499 136.764H96.615C97.1414 134.927 97.864 133.15 98.7702 131.466L98.4894 131.164C98.0306 130.757 97.6656 130.256 97.4194 129.695C97.1575 129.143 97.0128 128.543 96.9944 127.932C96.9664 127.323 97.0673 126.714 97.2904 126.146C97.5066 125.584 97.8315 125.069 98.2466 124.632L102.253 120.28C102.662 119.831 103.151 119.462 103.695 119.191C104.25 118.932 104.852 118.79 105.463 118.774C106.073 118.754 106.68 118.849 107.254 119.054C107.826 119.268 108.344 119.604 108.772 120.038L109.448 120.659C111.102 119.74 112.849 118.999 114.661 118.449V117.995C114.63 117.385 114.731 116.776 114.957 116.209C115.172 115.646 115.497 115.131 115.913 114.695C116.316 114.249 116.806 113.89 117.355 113.643C117.899 113.393 118.487 113.249 119.085 113.219L125.05 113C125.661 112.977 126.27 113.066 126.848 113.265C127.418 113.472 127.936 113.8 128.366 114.226C128.842 114.628 129.227 115.126 129.497 115.686C129.738 116.244 129.872 116.843 129.891 117.45V118.313C131.734 118.836 133.515 119.554 135.204 120.454L135.469 120.174C135.877 119.719 136.38 119.358 136.941 119.115C137.495 118.852 138.097 118.708 138.71 118.691C139.32 118.664 139.929 118.762 140.501 118.979V119.054ZM115.708 139.489L120.026 143.546L128.692 134.721C129.55 133.85 130.089 133.162 131.144 134.244L134.581 137.748C135.712 138.861 135.651 139.512 134.581 140.548L121.976 152.892C119.7 155.087 120.125 155.224 117.856 152.976L109.918 145.105C109.815 145.004 109.734 144.882 109.683 144.748C109.631 144.613 109.609 144.469 109.618 144.325C109.628 144.181 109.668 144.041 109.737 143.915C109.806 143.788 109.901 143.677 110.017 143.591L114.001 139.474C114.608 138.853 115.086 138.891 115.708 139.474V139.489ZM118.668 125.109C122.44 124.353 126.352 124.729 129.91 126.19C133.468 127.651 136.512 130.131 138.657 133.317C140.801 136.503 141.951 140.251 141.96 144.089C141.969 147.926 140.837 151.68 138.707 154.876C136.577 158.071 133.545 160.566 129.994 162.043C126.443 163.52 122.532 163.915 118.757 163.176C114.981 162.437 111.51 160.599 108.781 157.893C106.053 155.186 104.191 151.735 103.43 147.973C102.925 145.474 102.919 142.9 103.411 140.399C103.904 137.897 104.886 135.517 106.301 133.394C107.716 131.27 109.536 129.446 111.658 128.025C113.78 126.603 116.162 125.612 118.668 125.109Z"
                      />
                    </mask>
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M155.39 198.477L146.511 196.887L142.102 204.751C138.907 208.702 136.881 202.208 135.985 199.945L127.418 183.824C129.391 183.143 131.773 181.168 134.247 178.958C139.127 179.056 143.673 178.201 147.019 173.963L156.885 192.944L157.742 194.761C158.41 197.13 158.061 198.696 155.465 198.477H155.39ZM89.6106 198.477L98.4894 196.887L102.936 204.751C106.131 208.702 108.157 202.208 109.053 199.945L117.583 183.824C115.61 183.143 113.227 181.168 110.753 178.958C105.873 179.056 101.328 178.201 97.981 173.963L88.1156 192.944L87.296 194.738C86.6207 197.107 86.9773 198.673 89.6106 198.454V198.477ZM140.501 119.054C141.065 119.269 141.581 119.593 142.018 120.008L146.359 124.004C146.796 124.413 147.156 124.898 147.421 125.434C147.687 125.986 147.832 126.587 147.846 127.198C147.866 127.809 147.766 128.419 147.55 128.992C147.336 129.562 147 130.079 146.564 130.505L145.987 131.133C146.939 132.811 147.702 134.587 148.264 136.431H148.681C149.294 136.403 149.906 136.501 150.48 136.719C151.045 136.935 151.561 137.262 151.997 137.68C152.439 138.086 152.793 138.578 153.037 139.126C153.287 139.671 153.428 140.26 153.454 140.859L153.675 146.815C153.708 147.411 153.62 148.008 153.417 148.57C153.213 149.132 152.898 149.647 152.491 150.085C152.077 150.535 151.576 150.898 151.018 151.152C150.46 151.396 149.86 151.53 149.25 151.545H148.385C147.862 153.383 147.142 155.159 146.238 156.843L146.549 157.116L146.632 157.199C147.064 157.616 147.407 158.115 147.641 158.667C147.886 159.213 148.02 159.802 148.036 160.4C148.059 160.992 147.969 161.583 147.771 162.141C147.567 162.697 147.26 163.211 146.867 163.655L146.814 163.708L142.777 168.029C142.373 168.484 141.883 168.854 141.335 169.119C140.772 169.383 140.159 169.528 139.537 169.543C138.916 169.56 138.299 169.459 137.715 169.248C137.144 169.032 136.627 168.697 136.198 168.264L135.568 167.643C133.911 168.567 132.157 169.308 130.339 169.853V170.285C130.373 170.894 130.272 171.504 130.043 172.071C129.835 172.637 129.509 173.153 129.087 173.584C128.682 174.027 128.188 174.381 127.638 174.621C127.094 174.873 126.506 175.016 125.907 175.045L119.935 175.257C119.327 175.297 118.716 175.212 118.142 175.008C117.568 174.803 117.042 174.484 116.596 174.069C116.146 173.654 115.783 173.155 115.526 172.6C115.266 172.046 115.115 171.448 115.078 170.837V169.967C113.235 169.447 111.454 168.729 109.766 167.825L109.478 168.135L109.402 168.218C108.986 168.652 108.485 168.994 107.93 169.225C106.829 169.704 105.587 169.75 104.454 169.354C103.898 169.147 103.384 168.842 102.936 168.453L102.883 168.4L98.5349 164.321C98.0973 163.906 97.7375 163.416 97.4725 162.875C97.2134 162.322 97.0689 161.722 97.0475 161.112C97.0365 160.503 97.1368 159.898 97.3435 159.326C97.5753 158.764 97.9098 158.251 98.33 157.812L98.9447 157.153C98.0229 155.496 97.2801 153.745 96.7288 151.931H96.3039C95.6924 151.965 95.0809 151.865 94.5129 151.636C93.9469 151.425 93.4304 151.101 92.9952 150.683C92.5551 150.275 92.2015 149.783 91.9555 149.237C91.7103 148.69 91.5687 148.102 91.5381 147.504L91.3181 141.547C91.2851 140.943 91.3648 140.337 91.5533 139.761C91.7752 139.202 92.0994 138.689 92.5095 138.248C92.9232 137.791 93.4235 137.42 93.9817 137.158C94.5411 136.917 95.141 136.784 95.7499 136.764H96.615C97.1414 134.927 97.864 133.15 98.7702 131.466L98.4894 131.164C98.0306 130.757 97.6656 130.256 97.4194 129.695C97.1575 129.143 97.0128 128.543 96.9944 127.932C96.9664 127.323 97.0673 126.714 97.2904 126.146C97.5066 125.584 97.8315 125.069 98.2466 124.632L102.253 120.28C102.662 119.831 103.151 119.462 103.695 119.191C104.25 118.932 104.852 118.79 105.463 118.774C106.073 118.754 106.68 118.849 107.254 119.054C107.826 119.268 108.344 119.604 108.772 120.038L109.448 120.659C111.102 119.74 112.849 118.999 114.661 118.449V117.995C114.63 117.385 114.731 116.776 114.957 116.209C115.172 115.646 115.497 115.131 115.913 114.695C116.316 114.249 116.806 113.89 117.355 113.643C117.899 113.393 118.487 113.249 119.085 113.219L125.05 113C125.661 112.977 126.27 113.066 126.848 113.265C127.418 113.472 127.936 113.8 128.366 114.226C128.842 114.628 129.227 115.126 129.497 115.686C129.738 116.244 129.872 116.843 129.891 117.45V118.313C131.734 118.836 133.515 119.554 135.204 120.454L135.469 120.174C135.877 119.719 136.38 119.358 136.941 119.115C137.495 118.852 138.097 118.708 138.71 118.691C139.32 118.664 139.929 118.762 140.501 118.979V119.054ZM115.708 139.489L120.026 143.546L128.692 134.721C129.55 133.85 130.089 133.162 131.144 134.244L134.581 137.748C135.712 138.861 135.651 139.512 134.581 140.548L121.976 152.892C119.7 155.087 120.125 155.224 117.856 152.976L109.918 145.105C109.815 145.004 109.734 144.882 109.683 144.748C109.631 144.613 109.609 144.469 109.618 144.325C109.628 144.181 109.668 144.041 109.737 143.915C109.806 143.788 109.901 143.677 110.017 143.591L114.001 139.474C114.608 138.853 115.086 138.891 115.708 139.474V139.489ZM118.668 125.109C122.44 124.353 126.352 124.729 129.91 126.19C133.468 127.651 136.512 130.131 138.657 133.317C140.801 136.503 141.951 140.251 141.96 144.089C141.969 147.926 140.837 151.68 138.707 154.876C136.577 158.071 133.545 160.566 129.994 162.043C126.443 163.52 122.532 163.915 118.757 163.176C114.981 162.437 111.51 160.599 108.781 157.893C106.053 155.186 104.191 151.735 103.43 147.973C102.925 145.474 102.919 142.9 103.411 140.399C103.904 137.897 104.886 135.517 106.301 133.394C107.716 131.27 109.536 129.446 111.658 128.025C113.78 126.603 116.162 125.612 118.668 125.109Z"
                      stroke="#F58634"
                      stroke-width="4"
                      mask="url(#path-3-inside-1_7_2)"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_7_2">
                      <rect
                        width="71"
                        height="93"
                        fill="white"
                        transform="translate(87 113)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <div class="col-12 mt-3">
                <h5 class="Roboto fw-bold textGrey">
                  Acquire your certificate
                </h5>
                <p class="Roboto">
                  Pass the exam and maintain your certification by obtaining
                  required PDUs
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--part-5-->
  <div class="col-12  mb-5 py-5 d-flex justify-content-center align-items-center flex-column LightBlueBg">
    <div class="container">
      <h2 class=" Roboto textGrey fw-bold pb-2 text-center">E-Books</h2>
      <p class=" Roboto textGrey fw-lighter  w-75 mx-auto text-center" style="font-weight: 300;font-size: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
    <!-- Swiper -->
      <div class="swiper ebookSwiper">
        <div class="swiper-wrapper ">
          @foreach($books as $book)
            <div class="swiper-slide">
              <a href="{{route('singleBook.index', $book->slug)}}">
                <img src="{{url('storage/book/imgs/'.basename($book->img_large))}}" alt=".0.">
                  <div class="book-label">
                    <p >   {{ $book->name }}   </p>
                    <p>{{ $book->pricing['localized_price']}} {{ $book->pricing['currency_code'] }} </p>
                  </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="swiper-button-next"><img src="layV3/images/rightArrow.png" alt=".0."></div>
        <div class="swiper-button-prev"><img src="layV3/images/leftArrow.png" alt=".0."></div>
      </div>
  </div>
    <a class="btn bgorangeInline  text-center Roboto  px-5 pt-2  " href="{{ route('books.indexbook') }}"> Explore All E-Books</a>
</div>
      
      <!--part-6-->
         <div class="container  py-5 d-flex justify-content-start align-items-center  " >
  <div class="row d-flex col-12 flex-md-row flex-column">
    <div class="col-md-6 col-12 pe-5">
      <svg class="col-12" width="488" height="281" viewBox="0 0 488 281" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="488" height="281" rx="11" fill="#F58634"/>
        <rect x="27.0793" y="40" width="348.825" height="87.2064" rx="11" fill="white"/>
        <circle cx="76" cy="83.6028" r="17.6429" fill="#F58634" stroke="#F58634" stroke-width="3"/>
        <circle cx="75.9999" cy="83.6037" r="8.57143" fill="#F2F2F2" stroke="#F58634" stroke-width="2"/>
        <rect x="111.095" y="87.8574" width="211.635" height="7.44444" rx="3.72222" fill="#D8D8D8"/>
        <rect x="111.095" y="71.9043" width="230.778" height="7.44444" rx="3.72222" fill="#D8D8D8"/>
        <rect x="111.095" y="153.794" width="348.825" height="87.2064" rx="11" fill="white"/>
        <circle cx="160.016" cy="197.397" r="17.6429" fill="#F58634" stroke="#F58634" stroke-width="3"/>
        <circle cx="160.016" cy="197.398" r="8.57143" fill="#F2F2F2" stroke="#F58634" stroke-width="2"/>
        <rect x="195.111" y="201.651" width="211.635" height="7.44444" rx="3.72222" fill="#D8D8D8"/>
        <rect x="195.111" y="185.698" width="230.778" height="7.44444" rx="3.72222" fill="#D8D8D8"/>
      </svg>
    </div>
    <div class="col-md-6 col-12 ps-5">
      <h1 class=" Roboto textGrey fw-bold h1">Find your path with our <br/><span class=" Roboto textOrang fw-bold h1">Free Assessment</span>                
      </h1>
      <p class="Roboto textGrey fw-lighter  pe-5 fs-6 mb-5 ">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
      </p>
      <a href="https://demo.eliteminds.co/register" class="btn bgorangeInline  text-center Roboto  px-5 pt-2  ">Enroll Now for FREE</a>

    </div>
  </div>
      </div>
      
      
        <!-- part7 -->
      <div class="col-12 container py-5 flex-column" style="position:relative;top:50px">
        <div
          class="col-12 d-flex justify-content-center align-items-center flex-column"
        >
          <div style="padding:0;margin:0"
            class="col-12 d-flex justify-content-center align-items-center flex-column"
          >
            <h1 class="Roboto textGrey fw-bold h1 text-center">
              <span>Educational <br class="title-in-small-screen"/>tips & tricks</span>
            </h1>
            <p
              class="Roboto textGrey fw-lighter mx-3 px-5 pt-3 pb-5 fs-5 para"
            >
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500
            </p>
          </div>
          <!-- card s -->
          <div
            class="d-flex col-12 mt-5 d-flex justify-content-center align-items-center flex-column"
            id="featureContainer"
          >
            <div class="d-flex justify-content-center align-items-center">
              <div class="col-1 navs d-md-block d-none">
                <img
                  src="{{asset('layV3/images/leftArrow.png')}}"
                  alt=".0."
                  class="w-aut indicator"
                  href="#featureCarousel"
                  role="button"
                  data-bs-slide="prev"
                />
              </div>

              <div
                class="col-md-10 col-12 d-flex justify-content-center align-items-center row mx-auto my-auto justify-content-center"
              >
                <div
                  id="featureCarousel"
                  class="carousel slide col-12 d-flex"
                  data-bs-ride="carousel"
                  style="width:1205px"
                >
                  <div
                    class="col-12 row d-flex justify-content-start align-items-start carousel-container carousel-inner"
                    role="listbox"
                  >
                    @foreach($posts as $post)
                    <div class="carousel-item  {{  $loop->index == 0 ? 'active' : ''}}" style=" transition: transform .1s ease-in-out;">
                      <div class="col-md-4 col-12">
                        <div class="card borderwarning rounded-4"  style="height:400px;width:285px;margin-right:40px">
                          <img style="height:200px;max-height:200px;min-height:200px"
                            src="{{$post->cover ? $post->cover: 'https://via.placeholder.com/300'}}"
                            class="card-img-top imageCardBlog"
                            alt="..."
                          />
                          <div class="card-body" style="height:120px"  >
                            <p class="Roboto textGrey fw-normal" style="font-size:14px">
                               {{$post->title}}
                            </p>
                            <div 
                              class="col-12 d-flex align-items-center justify-content-between flex-md-row flex-column"
                            >
                              <p
                                class="col-md-12 col-12 d-flex justify-content-start align-items-center"
                              >
                                <svg
                                  width="38"
                                  height="38"
                                  viewBox="0 0 38 38"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <circle
                                    cx="19"
                                    cy="19"
                                    r="18"
                                    stroke="#F2F2F2"
                                    stroke-width="2"
                                  />
                                  <path
                                    d="M11 11V27C11 28.1046 11.8954 29 13 29H24C25.1046 29 26 28.1046 26 27V11C26 9.89543 25.1046 9 24 9H13C11.8954 9 11 9.89543 11 11Z"
                                    stroke="#D8D8D8"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                  />
                                  <path
                                    d="M11 16.5H16M26 16.5H21M11 20.5H26M11 24.5H26M16 16.5V29M16 16.5H21M21 16.5V29M16 10.5V6.5M21.5 10.5V6.5"
                                    stroke="#D8D8D8"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                  />
                                </svg>

                               {{\Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                              </p>

                             
                            </div>
                           
                          </div>
                           <div  class="card-footer bg-transparent border-0"  style="height:80px">
                              <hr class="opacity-75 hr" />
                              <a
                                href="{{route('public.post.view', $post->slug)}}"
                                class="d-flex justify-content-center align-items-center textOrang text-decoration-none"
                              >
                                Read Articale
                                <svg
                                  width="17"
                                  height="16"
                                  viewBox="0 0 17 16"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                  class="ms-2"
                                >
                                  <path
                                    d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1"
                                    stroke="#F58634"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  />
                                </svg>
                              </a>
                            </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                   
                  </div>
                </div>
              </div>

              <div class="col-1 navs text-end d-md-block d-none">
                <img
                  src="{{asset('layV3/images/rightArrow.png')}}"
                  alt=".0."
                  class="w-aut indicator"
                  href="#featureCarousel"
                  role="button"
                  data-bs-slide="next"
                />
              </div>
            </div>
            <a
              href="{{route('public.blog.indexelement')}}"
              class="btn bgorangeInline text-center Roboto px-5 pt-2 my-5"
              >Explore all blogs</a
            >
          </div>
        </div>
      </div>

      <!-- part8 -->
      <div
        class="col-12  py-5  d-flex justify-content-start align-items-center flex-column LightBlueBg"
     
        
      >
        <div class="col-12 row gx-0">
          <div class="col-md-6 col-12">
            <h2 class="Roboto fw-bold pb-2 bgorange roundedend pt-2 pe-3">
              Contact Us
            </h2>
            <p
              class="d-md-block d-none Roboto textGrey fw-lighter text-start"
              style="padding-left: 152px"
            >
                Lorem Ipsum is simply dummy text of the printing and <br/>
              typesetting
              industry. Lorem Ipsum has been the industry's <br/>standard dummy text
              ever since the 1500s
            
            </p>
            <p
              class="d-block d-md-none Roboto textGrey fw-lighter text-start ps-3"
              style="font-size:20px;color: #4B4B4D;"

            >
                Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s
            </p>
          </div>
          <div
            class="col-md-6 col-12 d-flex justify-content-start align-items-center flex-column"
          >
            <form class="w-md-75 w-100 col-12 px-3 form" action="{{ route('review.storemesasage') }}" method="POST">
                 @csrf
              <div class="mb-3 col-12">
                <input
                  type="text"
                  class="form-control"
                  id="fullName"
                  name="fullName"
                  placeholder="Full Name" required
                />
              </div>
              <div class="mb-3 col-12">
                <input
                  type="email"
                  class="form-control"
                  id="exampleFormControlInput1"
                  name="email"
                  placeholder="Email" required
                />
              </div>
              <div class="mb-3 col-12">
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="5"
                  name="Message"
                  placeholder="Message" required
                ></textarea>
              </div>
              <div class="mt-3 col-12">
                <button type="submit" class="btn bgorange text-white col-12 text-center Roboto">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
  <div class="container mt-5">
    <div class="text-center">
      <h2 style="font-weight: 700;font-size: 40px; margin: 30px 0px">What they saying</h2>
    </div>
    <div class="reviews">
      <div class="swiper reviewsSwiper">
        <div class="swiper-wrapper ">
          @foreach(DB::table('reviews')->get() as $review )
            <div class="swiper-slide px-5">
              <div class="row w-100">
                <div class="reviews-img col-12 col-md-4">
                  <img src="{{ asset('images/review/'.$review->image) }}" alt=""/>
                    <svg class="img-mask" width="176" height="228" viewBox="0 0 176 228" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="87.8927" cy="87.8927" r="87.8927" fill="#F58634"/>
                        <rect x="43.0244" y="12.624" width="9.83415" height="186.849" rx="4.91707" fill="#F58634"/>
                        <rect x="61.4634" y="40.8975" width="13.522" height="186.849" rx="6.76098" fill="#F58634"/>
                      </svg>
                 </div>
                 <div class="reviews-content col-12 col-md-8">
                  <img src="{{asset('layV3/images/leftQuotes.png')}}" alt="" class="left-quote"/>
                  <img src="{{asset('layV3/images/rightQuotes.png')}}" alt="" class="right-quote"/>
                  <div class=" d-flex justify-content-between align-items-center">
                    <p class="Roboto fw-semibold"> {{ $review->name }}</p>
                    <p>
                      <svg
                        width="88"
                        height="16"
                        viewBox="0 0 88 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M80.4755 3.84549L80 2.38197L79.5245 3.84549L78.5142 6.95492H75.2447H73.7059L74.9508 7.85942L77.5959 9.78115L76.5855 12.8906L76.11 14.3541L77.355 13.4496L80 11.5279L82.645 13.4496L83.89 14.3541L83.4145 12.8906L82.4041 9.78115L85.0492 7.85942L86.2941 6.95492H84.7553H81.4858L80.4755 3.84549Z"
                          fill="#F2F2F2"
                          stroke="#D8D8D8"
                        />
                        <path
                          d="M62.4755 3.84549L62 2.38197L61.5245 3.84549L60.5142 6.95492H57.2447H55.7059L56.9508 7.85942L59.5959 9.78115L58.5855 12.8906L58.11 14.3541L59.355 13.4496L62 11.5279L64.645 13.4496L65.89 14.3541L65.4145 12.8906L64.4041 9.78115L67.0492 7.85942L68.2941 6.95492H66.7553H63.4858L62.4755 3.84549Z"
                          fill="#F2F2F2"
                          stroke="#D8D8D8"
                        />
                        <path
                          d="M44.4755 3.84549L44 2.38197L43.5245 3.84549L42.5142 6.95492H39.2447H37.7059L38.9508 7.85942L41.5959 9.78115L40.5855 12.8906L40.11 14.3541L41.355 13.4496L44 11.5279L46.645 13.4496L47.89 14.3541L47.4145 12.8906L46.4041 9.78115L49.0492 7.85942L50.2941 6.95492H48.7553H45.4858L44.4755 3.84549Z"
                          fill="#F58634"
                          stroke="#F58634"
                        />
                        <path
                          d="M26.4755 3.84549L26 2.38197L25.5245 3.84549L24.5142 6.95492H21.2447H19.7059L20.9508 7.85942L23.5959 9.78115L22.5855 12.8906L22.11 14.3541L23.355 13.4496L26 11.5279L28.645 13.4496L29.89 14.3541L29.4145 12.8906L28.4041 9.78115L31.0492 7.85942L32.2941 6.95492H30.7553H27.4858L26.4755 3.84549Z"
                          fill="#F58634"
                          stroke="#F58634"
                        />
                        <path
                          d="M8.47553 3.84549L8 2.38197L7.52447 3.84549L6.51416 6.95492H3.24472H1.70588L2.95082 7.85942L5.59586 9.78115L4.58555 12.8906L4.11002 14.3541L5.35497 13.4496L8 11.5279L10.645 13.4496L11.89 14.3541L11.4145 12.8906L10.4041 9.78115L13.0492 7.85942L14.2941 6.95492H12.7553H9.48584L8.47553 3.84549Z"
                          fill="#F58634"
                          stroke="#F58634"
                        />
                      </svg>
                    </p>
                  </div>
                  <p>{{ $review->comment }}</p>
                 </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination-2"></div>
    </div>
  </div>
</div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


  <script src="{{asset('layV3/script/home.js')}}"></script>
  <script src="{{asset('layV3/script/navbarFixScript.js')}}"></script>
  <!-- Initialize Swiper -->
<script>
 var ebookSwiper = new Swiper('.ebookSwiper', {
   loop: true,
   slidesPerView: 5,
   spaceBetween: 30,
   autoplay: {
   delay: 2500,
   disableOnInteraction: false,
   pauseOnMouseEnter:true,
   reverseDirection: false
   },
   slidesPerGroupSkip: 1,
   centeredSlides: true,
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },

   paginationClickable: true,
   slidesPerView: 'auto',
   spaceBetween : 5,
   autoHeight: true,
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
       slidesPerView: 3,
       spaceBetween: 40,
     },
     1366: {
       slidesPerView: 3,
       spaceBetween: 40,
     },
   },
 });

 var reviewsSwiper = new Swiper(".reviewsSwiper", {
  loop: true,
  // autoplay: {
  //  delay: 2500,
  //  pauseOnMouseEnter:true,
  //  },
  pagination: {
    el: ".swiper-pagination-2",
    clickable: true,
  },
});
</script>
@endsection


