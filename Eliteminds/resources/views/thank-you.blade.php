@php

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="robots" content="index, follow" />
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('index-assets/images/favicon.ico')}}">
    <!--<meta property="og:image" content="{{asset('index-assets/images/favicon.ico')}}" />-->
    <!--<meta property="og:image" content="https://a.top4top.io/p_2504u3u5b1.jpg" />-->
    <!-- CSS
	============================================ -->
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/flaticon.css')}}">
{{--    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/font-awesome.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/apexcharts.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/plugins/jqvmap.min.css')}}">
   {{-- <link rel="canonical" href="https://eliteminds.co/"/>--}}
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('index-assets/css/style.css')}}">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z72PZ12XTL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z72PZ12XTL');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128995532-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128995532-1');
</script>
<!-- <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Elite Minds",
  "url": "https://eliteminds.co",
  "logo": "https://eliteminds.co/index-assets/images/logo.png"
}
</script> -->
<style>
       .adawe {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .adawe2 {
        margin-top: 16px;
    }
    .sticky .header-main-wrapper{
        background-color: white !important;
    }
    .swiper-pagination-bullet{
        background-color: #f3be96 !important;
    }
    .swiper-pagination-bullet-active{
        background-color: #f57517 !important;
    }
   @media(max-width:768px){
       .thankCard{
           height:100vh;
       }
   }
    
   
</style>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KM3R3PX');</script>
<!-- End Google Tag Manager -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
<!-- <link rel="stylesheet" href="{{asset('index-assets/css/vendor/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('index-assets/css/style.min.css')}}"> -->
    @yield('head')
    <link rel="stylesheet" href="{{asset('index-assets/css/style2.css')}}">
</head>
<!--https://wa.me/whatsappphonenumber?text=urlencodedtext-->
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KM3R3PX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager(noscript)-->
     <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://wa.me/+962797205176?text=السلام عليكم "
       class="adawe"
       target="_blank">
        <i class="fa fa-whatsapp adawe2"></i>
    </a>

<div class="main-wrapper">

    <!-- Header Section Start -->
    <div class="header-section">

        <!-- Header Top Start -->
        <div class="header-top d-none d-lg-block">
            <div class="container">

                <!-- Header Top Wrapper Start -->
                <div class="header-top-wrapper">

                    <!-- Header Top Left Start -->
                    <div class="header-top-left">
                        <p>We are here to support you</p>
                    </div>
                    <!-- Header Top Left End -->

                    <!-- Header Top Medal Start -->
                    <div class="header-top-medal">
                        <div class="top-info">
                            <p  width="18" height="18"><i class="fa fa-whatsapp fa-brands" style="font-size: 21px;"></i> <a href="tel:+962797205176">+962797205176</a></p>
                            <p  width="18" height="18"><i class="fa fa-envelope"></i> <a href="mailto:Info@eliteminds.co">Info@eliteminds.co</a></p>
                        </div>
                    </div>
                    <!-- Header Top Medal End -->

                    <!-- Header Top Right Start -->
                    <div class="header-top-right">
                        <ul class="social">
                            <li><a href="https://www.facebook.com/EliteMindsCo"><i class="fa fa-facebook fa-brands"></i></a></li>
                            <li><a href="https://twitter.com/EliteMindsCo"><i class="fa fa-twitter fa-brands"></i></a></li>
                            
                            <li><a href="https://www.youtube.com/channel/UCI107tlrGDnMX_Ic9uQ2eEw"><i class="fa fa-youtube fa-brands"></i></a></li>
                            <li><a href="https://www.instagram.com/elitemindsco/"><i class="fa fa-instagram fa-brands"></i></a></li>
                        </ul>
                    </div>
                    <!-- Header Top Right End -->

                </div>
                <!-- Header Top Wrapper End -->

            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Main Start -->
        <div class="header-main">
            <div class="container">
                <div class="header-main">
                <div class="container">

                    <!-- Header Main Start -->
                    <div class="header-main-wrapper" style="{{$routeName == 'aboutUs' || $routeName == 'contact.page'  ? 'background: #fff3ed': ''}}">

                        <!-- Header Logo Start -->
                        <div class="header-logo">
                           <a href="{{route('index')}}"><img src="{{asset('index-assets/images/logo.png')}}" alt="Logo"></a>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Menu Start -->
                        <div class="header-menu d-none d-lg-block head">
                            <ul class="nav-menu">
                                <li><a  href="{{route('index')}}">Home</a></li>
                                <!--<li>-->
                                <!--    <a href="{{route('aboutUs')}}">About Us</a>-->
                                <!--</li>-->
                                <li class="menu-item-has-children head">
                                    <a href="#">Courses</a>
                                    <ul class="sub-menu " style="width: max-content;">
                                        @foreach($courses_array as $course_)
                                        <li class="">
                                            <a href="{{route('package.by.course').'?course='.$course_['slug']}}">{{$course_['course_title']}}</a>
                                        </li>
                                        @endforeach
                                      </ul>
                                </li>
                                    
                                <li class="menu-item-has-children head">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu" style="width: max-content;">
                                        @foreach(\App\Section::all() as $section)
                                            <li class="">
                                                <a href="{{route('public.blog.index').'?section_id='.$section->id}}">{{$section->title}}</a>
                                            </li>
                                        @endforeach
                                        <li class="">
                                            <a href="{{route('public.blog.index')}}">Browse All</a>
                                        </li>
                                    </ul>
                                </li>
                            
                            
                            
                            @if(Auth::guard('admin')->check())         
                            
                            <li>
                              <a class="" href="{{route('admin.dashboard')}}">Dashboard</a> </li> 
                                <li><a class="" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @elseif(Auth::guard('web')->check())
                            <li>
                              <a class="" href="{{route('user.dashboard')}}">Dashboard</a> </li> 
                                <li><a class="" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                            <li><a  class="" href="{{route('login')}}">Sign In</a></li>
                            <li><a class="" href="{{route('register')}}">Sign Up</a></li>
                            @endif
                            <!--<li><a href="{{route('contact.page')}}">Contact Us</a></li>-->
                                
                            </ul>

                        </div>
                        <!-- Header Menu End -->

                        <!-- Header Sing In & Up Start -->
                        
                        <!-- Header Sing In & Up End -->

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle d-lg-none">
                            <a class="menu-toggle" href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <!-- Header Mobile Toggle End -->

                    </div>
                    <!-- Header Main End -->

                </div>
            </div>
                <!-- Header Main End -->
                
            </div>
        </div>
        <!-- Header Main End -->
    </div>
    <!-- Header Section End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu">

        <!-- Menu Close Start -->
        <a class="menu-close" href="javascript:void(0)">
            <i class="icofont-close-line"></i>
        </a>
        <!-- Menu Close End -->

        <!-- Mobile Top Medal Start -->
        <div class="mobile-top">
            <p><i class="fa fa-whatsapp" aria-hidden="true"></i> <a href="tel:9702621413">+962797205176</a></p>
            <p><i class="flaticon-email"></i> <a href="mailto:Info@eliteminds.co">Info@eliteminds.co</a></p>
        </div>
        <!-- Mobile Top Medal End -->

        <!-- Mobile Sing In & Up Start -->
        <div class="mobile-sign-in-up ">
            <ul>
                @if(Auth::guard('admin')->check())
                    <li><a class="sign-up" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a class="sign-up" href="{{route('logout')}}">Sign Out</a></li>
                @elseif(Auth::guard('web')->check())
                    <li><a class="sign-up" href="{{route('user.dashboard')}}">Dashboard</a></li>
                    <li><a class="sign-up" href="{{route('logout')}}">Sign Out</a></li>
                @else
                    <li><a class="sign-in" href="{{route('login')}}">Sign In</a></li>
                    <li><a class="sign-up" href="{{route('register')}}">Sign Up</a></li>
                @endif

            </ul>
        </div>
        <!-- Mobile Sing In & Up End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu-items head" >
            <ul class="mobile-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>
                    <a href="{{route('aboutUs')}}">About US </a>
                </li>
                <li class="menu-item-has-children head">
                    <a href="#">Courses</a>
                    <ul class="sub-menu" >
                        @foreach($courses_array as $course_)
                        <li class="">
                            <!--<a href="{{route('package.by.course').'?course_id='.$course_['course_id']}}">{{$course_['course_title']}}</a>-->
                            <a href="{{route('package.by.course').'?course='.$course_['slug']}}">{{$course_['course_title']}}</a>
                        </li>
                        @endforeach
                     </ul>
                </li>
                <li>
                    <a href="{{route('public.blog.index')}}">Blog</a>
                </li>
                
                 @if(Auth::guard('admin')->check())
                    <li><a class="sign-up" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                @elseif(Auth::guard('web')->check())
                    <li><a class="sign-up" href="{{route('user.dashboard')}}">Dashboard</a></li>
                    <li><a class="sign-up" href="{{route('logout')}}">Sign Out</a></li>
                @else
                    <li><a class="sign-in" href="{{route('login')}}">Sign In</a></li>
                    <li><a class="sign-up" href="{{route('register')}}">Sign Up</a></li>
                @endif
                <li><a href="{{route('contact.page')}}">Contact</a></li>
            </ul>
        </div>
        <!-- Mobile Menu End -->
        <!-- Mobile Menu End -->
        <div class="mobile-social">
            <ul class="social">
                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                <li><a href="#"><i class="flaticon-skype"></i></a></li>
                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
            </ul>
        </div>
        <!-- Mobile Menu End -->
    </div>
    <!-- Mobile Menu End -->

    <!-- Overlay Start -->
    <div class="overlay"></div>
    <!-- Overlay End -->
     <div style=' height:92vh ' class='thankCard d-flex justify-content-center align-items-center '>

<div style='padding:30px ;margin:140px 0 30px 0' class='d-flex justify-content-center align-items-center'>
    <div class="card text-center" style=' max-width:600px'>
  <div class="card-header text-dark fw-bold" style='text-align:center; '>
    Congratulation!
  </div>
  <div class="card-body">
     <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg>
    <h5 class="card-title mt-2">Thank you for joining <span style='color:orange;'>Eliteminds</span>!  </h5>
    <p class="card-text">We are are glad to have you as a part of the Elite Minds community, and we promise you again that this will be an extraordinary experience, please access your course from the dashboard.</p>
    <a href="{{route('user.dashboard')}}" class="btn btn-primary">Go to Dashboard</a>
  </div>
  <div class="text-muted" class="mb-5">
  </div>
</div>
</div>
    </div>

    <!-- Footer Start  -->
    <div  class="section footer-section">

        
        <!-- Footer Widget Section End -->

        <!-- Footer Copyright Start -->
        <div class="footer-copyright">
            <div class="container">

                <!-- Footer Copyright Start -->
                <div class="copyright-wrapper">
                    <div class="copyright-text" style="  column-count:2;column-gap: 100px;">
                        <p style="float: left;">&copy; {{ now()->year }}<span> {{env('APP_NAME')}} </span> Made with <i class="icofont-heart-alt"></i> by <a href="https://meskits.com" target="_blank">MESK-ITS</a></p>
                        <!--<p style="float: left;"> <a href="https://www.youtube.com/channel/UCI107tlrGDnMX_Ic9uQ2eEw"><i class="fa fa-youtube fa-brands"></i></a> </p>-->
                        <p style="float: right;"><i class="fa fa-map-marker" aria-hidden="true"></i> Teebah Complex, Prs. Zeinab St., Amman, Jordan</p>
                    </div>
                </div>
                  <!--<div class="header-top-right">-->
                  <!--      <ul class="social">-->
                  
                            
                  <!--          <li></li>-->
                  <!--          <li><a href="https://www.instagram.com/elitemindsconsulting/"><i class="fa fa-instagram fa-brands"></i></a></li>-->
                  <!--      </ul>-->
                  <!--  </div>-->
                <!-- Footer Copyright End -->

            </div>
        </div>
        <!-- Footer Copyright End -->

    </div>
    <!-- Footer End -->

    <!--Back To Start-->
    <a href="#" class="back-to-top">
        <i class="icofont-simple-up"></i>
    </a>
    <!--Back To End-->


</div>






<!-- JS
============================================ -->

<!-- Modernizer & jQuery JS -->
<script src="{{asset('index-assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
<script src="{{asset('index-assets/js/vendor/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{asset('index-assets/js/plugins/popper.min.js')}}"></script>
<script src="{{asset('index-assets/js/plugins/bootstrap.min.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('index-assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('index-assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('index-assets/js/plugins/video-playlist.js')}}"></script>
<script src="{{asset('index-assets/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('index-assets/js/plugins/ajax-contact.js')}}"></script>

<!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
<!-- <script src="{{asset('index-assets/js/plugins.min.js')}}"></script> -->


<!-- Main JS -->
<script src="{{asset('index-assets/js/main.js')}}"></script>
@yield('jscode')
</body>

</html>
