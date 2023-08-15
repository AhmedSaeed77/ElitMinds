@extends('layouts.layoutV3')




<!--@section('meta')-->
<!--  <meta name="title" content="{{ $post->meta_title ?? ''  }}">-->
<!--  <meta name="description" content="{{ $post->meta_description ?? ''  }}">-->
<!--@endsection-->

@section('seodata')

    <title>{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}</title>
    <meta name="title" content="{{ $post->meta_title ?? ''  }}">
    <meta name="description" content="{{ $post->meta_description ?? ''  }}">
    
    <meta property="og:site_name" content="Eliteminds">
    <meta property="og:url" content="{{Request::url() }}">
     <meta property="og:description" content="{{ $post->meta_description ?? ''  }}">
    <meta property="og:title" content="{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="{{$post->cover ?? ''}}"/>
    
    


    <meta name="twitter:site" content="{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}" />
    <meta name="twitter:card" content="">
    <meta name="twitter:title" content="{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}">
    
    <meta name="twitter:description" content="{{ $post->meta_description ?? ''  }}">
    <meta name="twitter:image" content="{{$post->cover ?? ''}}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <meta name="keywords" content="{{ $post->keywords ?? ''  }}">
    <meta name="author" content="Eliteminds">
    
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "article",
      "url":"{{Request::url() }}",
      "name": "{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}",
      "description": "{{ $post->meta_description ?? ''  }}",
      "provider": {
        "@type": "Organization",
        "name": "Eliteminds",
        "sameAs": "https://eliteminds.co"
      }
    }
    {
      "@context": "https://schema.org",
      "@type": "article",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "item": {
            "@type": "Course",
            "url":"{{Request::url() }}",
            "name": "{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}",
            "description": "{{ $post->meta_description ?? ''  }}",
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
    
    <!--<script type="application/ld+json">-->
    <!--{-->
    <!--  "@context": "https://schema.org",-->
    <!--  "@type": "article",-->
    <!--  "name": "{{ app()->getLocale() == 'en' ? $post->title: Transcode::evaluate(\App\Post::find($post->id))['title'] }}",-->
    <!--  "description": "{{ $post->meta_description ?? ''  }}",-->
    <!--  "provider": {-->
    <!--    "@type": "Organization",-->
    <!--    "name": "Eliteminds",-->
    <!--    "sameAs": "https://eliteminds.co"-->
    <!--  }-->
    <!--}-->
    <!--</script>-->
    
   
    
@endsection

@section('css')
 <link rel="stylesheet" href="{{asset('layV3/style/blogItem.css')}}">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

 <style>
 
  .blogItemFix img{
    width: 100% !important;
    height: auto !important;
    border-radius: 28px;
  }
  * {
font-family: "Roboto" !important;
}
  </style>
   <style>
        .blog-details-description > ol,.blog-details-description > ul {
            list-style: auto !important;
            margin: 10px 0 10px 25px;
        }
        .swiper.blogsSwiper {
          width: 100%;
          height: auto;
          padding: 50px 55px;
        }
        .blogsSwiper .swiper-slide {
          display:flex;
          justify-content:center;
          align-items: center;
        }

        .blogsSwiper .swiper-button-next:after,
        .blogsSwiper .swiper-button-prev:after {
          font-size: 0px !important;
        }
        .blogsSwiper .swiper-container{
        position: relative;
        padding: 0 70px;
        }
        .blogsSwiper .swiper-container .swiper-button-prev{
          left: -0px;
          }
          .blogsSwiper .swiper-container .swiper-button-next{
          right:0px;
        }

    </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    
@endsection
 
@section('content')
  <!-- part 1 -->
    <div class="col-12 container marginTop mb-5">
        <div class="row col-12 d-flex align-items-start">
            <a href="./blogs.html" class="Roboto textOrang fw-semibold fs-6 mb-5 "> Back to Blogs</a>
            <!-- part1-a -->
            <div class="col-md-8 col-12 py-4 pe-0 pe-lg-4 blogItemFix">
                <h2 class="Roboto textGrey fw-bold col-11 ">  {{$post->title}} </h2>
                <p class="col-11">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="19" cy="19" r="18" stroke="#F2F2F2" stroke-width="2"/>
                    <path d="M11 11V27C11 28.1046 11.8954 29 13 29H24C25.1046 29 26 28.1046 26 27V11C26 9.89543 25.1046 9 24 9H13C11.8954 9 11 9.89543 11 11Z" stroke="#D8D8D8" stroke-width="2" stroke-linecap="round"/>
                    <path d="M11 16.5H16M26 16.5H21M11 20.5H26M11 24.5H26M16 16.5V29M16 16.5H21M21 16.5V29M16 10.5V6.5M21.5 10.5V6.5" stroke="#D8D8D8" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                <small class="Roboto  fw-semibold DarkGrayText">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small>
                </p>  
                <div class="col-11">
                    <img src="./images/blogitem.png" alt="" class="w-100">
                </div>
                <p class="col-12 text-break Roboto textGrey fw-normal  ">
                    {!! $post->content !!} 
                </p>
                

            </div>
            <!-- end part 1-a -->
            <!-- start part 1-b -->
            <div class="col-md-4 col-12 p-4 bgGray rounded-4 mt-4 ">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <a href="" target="_blank"><svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_382_1716)">
                        <path d="M55.4502 28.2246C55.4502 43.2603 43.2613 55.4492 28.2256 55.4492C13.1898 55.4492 1.00098 43.2603 1.00098 28.2246C1.00098 13.1889 13.1898 1 28.2256 1C43.2613 1 55.4502 13.1889 55.4502 28.2246Z" fill="white" stroke="#D8D8D8" stroke-width="2"/>
                        <path d="M42.0002 22.4637C41.0491 22.8854 40.0261 23.1707 38.9532 23.2981C40.0486 22.6417 40.8893 21.6032 41.2861 20.3638C40.2611 20.9718 39.1253 21.413 37.9174 21.6507C36.9498 20.6201 35.5711 19.9761 34.0444 19.9761C31.1152 19.9761 28.7396 22.3517 28.7396 25.2809C28.7396 25.6967 28.7866 26.1014 28.8776 26.4899C24.4689 26.2687 20.5598 24.1569 17.9432 20.9465C17.4867 21.7298 17.2248 22.6417 17.2248 23.6138C17.2248 25.4538 18.162 27.0782 19.5846 28.0292C18.7155 28.0019 17.8969 27.7634 17.182 27.365C17.1817 27.3875 17.1816 27.4101 17.1816 27.4322C17.1816 30.0026 19.011 32.1464 21.4373 32.6334C20.9926 32.7553 20.523 32.8197 20.04 32.8197C19.6974 32.8197 19.3654 32.7869 19.0418 32.7252C19.7168 34.8322 21.6754 36.366 23.9973 36.4092C22.1814 37.8322 19.8944 38.68 17.4083 38.68C16.9811 38.68 16.5578 38.6551 16.1436 38.6056C18.49 40.1113 21.279 40.9892 24.2746 40.9892C34.0321 40.9892 39.3682 32.906 39.3682 25.8953C39.3682 25.6654 39.363 25.4364 39.3527 25.2093C40.39 24.4616 41.2893 23.5275 42.0002 22.4637Z" fill="#4B4B4D"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_382_1716">
                        <rect width="56.4497" height="56.4497" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        </a>
                        <a href="" target="_blank">
                            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_382_1706)">
                                <path d="M47.537 9.3136C57.9624 19.739 57.9624 36.6419 47.537 47.0673C37.1116 57.4927 20.2087 57.4927 9.78325 47.0673C-0.642151 36.6419 -0.642158 19.739 9.78324 9.31358C20.2086 -1.11182 37.1115 -1.11181 47.537 9.3136Z" fill="white" stroke="#D8D8D8" stroke-width="2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.8644 28.6142V42.6348C24.8644 42.8365 25.0221 43 25.2168 43H30.2408C30.4354 43 30.5932 42.8365 30.5932 42.6348V28.3858H34.2355C34.4186 28.3858 34.5711 28.2405 34.5866 28.0514L34.9369 23.7582C34.9543 23.5451 34.7921 23.3622 34.5857 23.3622H30.5932V20.3162C30.5932 19.6023 31.1516 19.0236 31.8405 19.0236H34.6476C34.8422 19.0236 35 18.8601 35 18.6584V14.3652C35 14.1635 34.8422 14 34.6476 14H29.9043C27.1209 14 24.8644 16.3384 24.8644 19.2231V23.3622H22.3524C22.1577 23.3622 22 23.5257 22 23.7274V28.0206C22 28.2223 22.1577 28.3858 22.3524 28.3858H24.8644V28.6142H24.8644Z" fill="#4B4B4D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_382_1706">
                                <rect width="56.4497" height="56.4497" fill="white" transform="translate(0.4375)"/>
                                </clipPath>
                                </defs>
                                </svg>
                                
                        </a>
                        <a href="" target="_blank">
                            <svg width="58" height="57" viewBox="0 0 58 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_382_1712)">
                                <path d="M48.0936 9.31355C58.519 19.739 58.519 36.6419 48.0936 47.0673C37.6682 57.4927 20.7653 57.4927 10.3399 47.0673C-0.0855116 36.6419 -0.0855089 19.739 10.3399 9.31356C20.7653 -1.11185 37.6682 -1.11185 48.0936 9.31355Z" fill="white" stroke="#D8D8D8" stroke-width="2"/>
                                <path d="M42.9999 24.7409C42.9999 21.4891 40.3638 18.853 37.112 18.853H21.841C18.5892 18.853 15.9531 21.4891 15.9531 24.7409V31.8979C15.9531 35.1497 18.5892 37.7858 21.841 37.7858H37.112C40.3638 37.7858 42.9999 35.1497 42.9999 31.8979V24.7409ZM33.365 28.68L27.2747 32.0203C27.0099 32.1636 26.7718 31.9718 26.7718 31.6708V24.8144C26.7718 24.5095 27.0174 24.3183 27.2823 24.4691L33.4144 27.9852C33.6853 28.1395 33.6392 28.5316 33.365 28.68Z" fill="#4B4B4D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_382_1712">
                                <rect width="56.4497" height="56.4497" fill="white" transform="translate(0.994141)"/>
                                </clipPath>
                                </defs>
                                </svg>
                                
                        </a>
                        <a href="" target="_blank">
                            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_382_1699)">
                                <path d="M55.6014 28.1908C55.6014 43.0081 43.5897 55.0199 28.7724 55.0199C13.9551 55.0199 1.94336 43.0081 1.94336 28.1908C1.94336 13.3736 13.9551 1.36182 28.7724 1.36182C43.5897 1.36182 55.6014 13.3736 55.6014 28.1908Z" fill="white" stroke="#D8D8D8" stroke-width="2"/>
                                <path d="M36.8765 22.0083C37.8567 22.0083 38.6514 21.2137 38.6514 20.2334C38.6514 19.2532 37.8567 18.4585 36.8765 18.4585C35.8962 18.4585 35.1016 19.2532 35.1016 20.2334C35.1016 21.2137 35.8962 22.0083 36.8765 22.0083Z" fill="#4B4B4D"/>
                                <path d="M28.9873 20.7344C24.8761 20.7344 21.5312 24.0791 21.5312 28.1903C21.5312 32.3014 24.8761 35.6462 28.9873 35.6462C33.0984 35.6462 36.443 32.3014 36.443 28.1903C36.443 24.0791 33.0984 20.7344 28.9873 20.7344ZM28.9873 32.9663C26.3537 32.9663 24.2111 30.8239 24.2111 28.1903C24.2111 25.5567 26.3537 23.4143 28.9873 23.4143C31.6208 23.4143 33.7631 25.5567 33.7631 28.1903C33.7631 30.8239 31.6208 32.9663 28.9873 32.9663Z" fill="#4B4B4D"/>
                                <path d="M34.9057 43.3281H22.8184C17.804 43.3281 13.7246 39.2487 13.7246 34.2343V22.1465C13.7246 17.132 17.804 13.0527 22.8184 13.0527H34.9057C39.9201 13.0527 44 17.132 44 22.1465V34.2343C44 39.2487 39.9201 43.3281 34.9057 43.3281ZM22.8184 15.901C19.3744 15.901 16.5729 18.7025 16.5729 22.1465V34.2343C16.5729 37.6783 19.3744 40.4799 22.8184 40.4799H34.9057C38.3497 40.4799 41.1517 37.6783 41.1517 34.2343V22.1465C41.1517 18.7025 38.3497 15.901 34.9057 15.901H22.8184Z" fill="#4B4B4D"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_382_1699">
                                <rect width="56.4497" height="56.4497" fill="white" transform="translate(0.550781)"/>
                                </clipPath>
                                </defs>
                                </svg>
                                
                        </a>
                </div>
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center flex-column mb-4">
                    <div class="col-12 mb-4">
                        <img src="./images/Maskblogitem2.png" alt="" class="w-100">
                    </div>
                    <div class="col-12">
                        <p class="Roboto fw-normal list-title">Categories</p>
                        <ul>
                            @foreach(\App\Section::all() as $section)
                                <li>
                                    <a href="{{route('public.blog.index').'?section_id='.$section->id}}" class="list-link active" >{{$section->title}}</a>
                                  </li>
                            @endforeach
                          </ul>
                    </div>
                    <div class="col-12">
                        <p class="Roboto fw-normal list-title">Most Popular Blogs</p>
                        <ul>
                          @foreach(\App\Post::inRandomOrder()->select('title', 'slug' ,'id')->limit(5)->get(); as $poppost)
                            <li class="col-12">
                               <a href="#" class="list-link active">
                              {{ $poppost->title }}
                              </a>
                            </li>
                          @endforeach
                          </ul>
                    </div>

                    <div class="col-12">
                        <p class="Roboto fw-normal list-title">Contact Us</p>
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="col-12 d-flex justify-content-start align-items-center flex-column">
                            <form class="w-100 col-12 px-3" action="{{ route('review.storemesasage') }}" method="POST">
                                 @csrf
                              <div class="mb-3 col-12">
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                              </div>
                              <div class="mb-3 col-12">
                                  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Email" required>
                                </div>
                                <div class="mb-3 col-12">
                                  <textarea class="form-control rounded-4" id="exampleFormControlTextarea1" rows="4" name="Message" placeholder="Message" required></textarea>
                                </div>
                                <div class="mt-3 col-12">
                                  <button type="submit" class="btn bgorange text-white col-12 text-center Roboto">Submit</button>
                                
                                
                              </div>
                          </form>
                        </div>
                    </div>

                </div>
            
            </div>
          <!-- end part 1-b -->
        </div>
    </div>


  <div class="col-12 py-5 flex-column">
    <div class=" col-12 d-flex justify-content-center align-items-center flex-column">
      <div class=" col-12 d-flex justify-content-center align-items-center flex-column">
        <h2 class="Roboto textGrey fw-bold h1 text-center ">Explore more Blogs
        </h2>
      </div>
      <div class="container">

 
      <div class="swiper blogsSwiper">
         <div class="swiper-wrapper ">
             
        @foreach(\App\Post::inRandomOrder()->limit(5)->get(); as $poppost)
        <div class="swiper-slide">
            
            <div class="card borderwarning  rounded-4" style="width:100%">
                 @php
                $urls = [];
                preg_match('~<img.*?src=["\']+(.*?)["\']+~', $poppost->content, $urls);
                $cover = '';
                if(count($urls) >= 2) 
                {
                    $cover = $urls[1];
                }
               
            @endphp
              <img src="{{$cover ? $cover: 'https://via.placeholder.com/300'}}" class="card-img-top imageCardBlog" alt="..." />
              <div class="card-body ">
                <p class="Roboto textGrey fw-normal"> {{ $poppost->title }}  </p>
                <div class="col-12 d-flex align-items-center justify-content-between flex-md-row flex-column ">
                  <p class="col-md-6 col-12 d-flex justify-content-start align-items-center gap-2">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <circle cx="19" cy="19" r="18" stroke="#F2F2F2" stroke-width="2" />
                      <path
                        d="M11 11V27C11 28.1046 11.8954 29 13 29H24C25.1046 29 26 28.1046 26 27V11C26 9.89543 25.1046 9 24 9H13C11.8954 9 11 9.89543 11 11Z"
                        stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                      <path
                        d="M11 16.5H16M26 16.5H21M11 20.5H26M11 24.5H26M16 16.5V29M16 16.5H21M21 16.5V29M16 10.5V6.5M21.5 10.5V6.5"
                        stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                    </svg>
                  <span>  {{\Carbon\Carbon::parse($poppost->created_at)->diffForHumans()}} </span> 
                  </p>
                </div>
                <div>
                  <hr class="opacity-75 hr" />
                  <a href="{{route('public.post.view', $poppost->slug )}}"
                    class="d-flex justify-content-center align-items-center textOrang  text-decoration-none">
                    Read Articale
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                      class="ms-2">
                      <path d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1" stroke="#F58634" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
             </div>
            </div>
          @endforeach
        </div>
        <div class="swiper-button-next">
           <img src="{{asset('layV3/images/rightArrow.png')}}" alt=".0.">
         </div>
         <div class="swiper-button-prev">
           <img src="{{asset('layV3/images/leftArrow.png')}}" alt=".0.">
         </div>
      </div>
    </div>
    <div class="text-center">
      <a class="btn bgorangeInline Roboto  px-5 pt-2 mb-5  "> Explore All blogs</a>
    </div>

  </div>
  </div>
      <!-- card s -->
      <!-- <div class="d-flex col-12 mt-5 d-flex justify-content-center align-items-center flex-column  "
        id="featureContainer">
        <div class="d-flex justify-content-center align-items-center" style="width:1300px">
          <div class=" col-1 navs  d-md-block d-none">
            <img src="{{asset('layV3/images/leftArrow.png')}}" alt=".0." class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="prev" >
          </div>
  
          <div  class="col-md-10 col-12 d-flex justify-content-center align-items-center  row mx-auto my-auto justify-content-center">
            <div id="featureCarousel" class="carousel slide col-12 d-flex justify-content-center" data-bs-ride="carousel">
              <div class="col-12 row d-flex justify-content-start align-items-start carousel-container carousel-inner"
                role="listbox">
              @foreach(\App\Post::inRandomOrder()->limit(5)->get(); as $poppost)

                  <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}} ">
              
                  <div class="  col-md-4 col-12 ">
                    <div class="card borderwarning  rounded-4">
                      <img src="{{$poppost->cover ? $poppost->cover: 'https://via.placeholder.com/300'}}" class="card-img-top imageCardBlog" alt="...">
                      <div class="card-body ">
                        <p class="Roboto textGrey fw-normal"> {{ $poppost->title }}  </p>
                        <div class="col-12 d-flex align-items-center justify-content-between flex-md-row flex-column ">
                          <p class="col-md-6 col-12 d-flex justify-content-start align-items-center gap-2">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <circle cx="19" cy="19" r="18" stroke="#F2F2F2" stroke-width="2" />
                              <path
                                d="M11 11V27C11 28.1046 11.8954 29 13 29H24C25.1046 29 26 28.1046 26 27V11C26 9.89543 25.1046 9 24 9H13C11.8954 9 11 9.89543 11 11Z"
                                stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                              <path
                                d="M11 16.5H16M26 16.5H21M11 20.5H26M11 24.5H26M16 16.5V29M16 16.5H21M21 16.5V29M16 10.5V6.5M21.5 10.5V6.5"
                                stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" />
                            </svg>
                           <span>  {{\Carbon\Carbon::parse($poppost->created_at)->diffForHumans()}} </span> 
                          </p>
                        </div>
                        <div>
                          <hr class="opacity-75 hr" />
                          <a href="{{route('public.post.view', $poppost->slug )}}"
                            class="d-flex justify-content-center align-items-center textOrang  text-decoration-none">
                            Read Articale
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                              class="ms-2">
                              <path d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1" stroke="#F58634" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                @endforeach
                </div>
            </div>
          </div>
  
          <div class=" col-1 navs text-end d-md-block d-none">
            <img src="{{asset('layV3/images/rightArrow.png')}}" alt=".0."  class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
          </div>
  
        </div>
        <a href="{{ url('/blogs') }}" class="btn bgorangeInline  text-center Roboto  px-5 pt-2 my-5 ">Explore all blogs</a>
  
      </div>
   -->
    </div>
  </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
 <!--<script src="{{asset('layV3/slider/script.js')}}"></script>-->
  <script src="{{asset('layV3/script/navbarFixScript.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script>
    var blogsSwiper = new Swiper('.blogsSwiper', {
        slidesPerView: 3,
        // slidesPerGroup: 1,
        spaceBetween: 30,
      centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
            disableOnInteraction:true
          },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      
      // Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        100: {
          slidesPerView: 1,
          spaceBetween: 56,
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 1,
          spaceBetween: 56,
        },
        // when window width is >= 640px
        720: {
          slidesPerView: 1,
          spaceBetween: 56,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 56,
        },
        1366: {
          slidesPerView: 3,
          spaceBetween: 56,
        },
      },
    });

</script>
@endsection
