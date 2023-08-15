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
                            <li><a href="https://www.instagram.com/eliteminds.learning/"><i class="fa fa-instagram fa-brands"></i></a></li>
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
                               <li>
                                   <a href="{{route('aboutUs')}}">About Us</a>
                               </li>
                                <li class="menu-item-has-children head">
                                    <a href="#">Courses</a>
                                    <ul class="sub-menu " style="width: max-content;">
                                        @foreach($courses_array as $course_)
                                        <li class="">
                                            <a href="{{route('package.by.course' ,  $course_['slug']) }}">{{$course_['course_title']}}</a>
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
                            <li><a href="{{route('contact.page')}}">Contact Us</a></li>
                                
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
                          
                            <a href="{{route('package.by.course' ,  $course_['slug']) }}">{{$course_['course_title']}}</a>
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
    @yield('content')

    <!-- Footer Start  -->
    <div class="section footer-section">

        <!-- Footer Widget Section Start -->
        <div class="footer-widget-section">

            <!--<img class="shape-1 animation-down" src="{{asset('index-assets/images/shape/shape-21.png')}}" alt="Shape">-->

            <div class="container">
                <div class="  order-lg-1">
                    <div class="row">
                    <div class=" ">
                        <a href="#"><img src="{{asset('index-assets/images/logo.png')}}" alt="Logo"></a>
                    </div>

                </div>

                </div>
                <div class="">
                   
                    <div class="p-6">

                        <!-- Footer Widget Link Start -->
                        <div class="footer-widget-link row">

                            <!-- Footer Widget Start -->
                            <div class=" col-md-5 my-2" >
                                <h4 class="footer-widget-title">Courses</h4>

                                <ul class="widget-link " style="display: block;
                                text-overflow: ellipsis;
                              
                                word-wrap: break-word;
                                overflow: hidden;">
                                    @foreach($courses_array as $course_)
                                    <li class="menu-item-has-children">
                                        <a href="{{route('package.by.course' ,  $course_['slug']) }}">{{$course_['course_title']}}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>

                            </div>
                            <!-- Footer Widget End -->

                            <!-- Footer Widget Start -->
                            <div class=" col-md-2 my-2">
                                <h4 class="footer-widget-title">Legal</h4>

                                <ul class="widget-link">
                                    <li><a href="{{route('terms.show.public')}}">Terms of Service</a></li>
                                    <li><a href="{{route('policy.show.public')}}">Privacy Policy </a></li>
                                    <li><a href="{{route('Refund.show.polices')}}">Refund polices</a></li>
                                   
                                </ul>

                            </div>
                            <!-- Footer Widget End -->
                            <div class=" col-md-3 my-2">
                                <h4 class="footer-widget-title">Company</h4>

                                <ul class="widget-link">
                                    <li><a href="{{route('contact.page')}}">Become our instructor</a></li>
                                    <li><a href="{{route('public.blog.index')}}">Blog</a></li>
                                    <li><a href="{{route('aboutUs')}}">About Us</a></li>
                                  
                                </ul>

                            </div>
                            <div class="col-md-2 my-2">
                                <h4 class="footer-widget-title">Support</h4>
                                <ul class="widget-link">       
                                    <li><a href="{{route('contact.page')}}">Contact Us</a></li>
                                    <li><a href="{{route('public.faq')}}">FAQs</a></li>
                                </ul>

                            </div>

                        </div>
                        <!-- Footer Widget Link End -->
                    </div>
                </div>
            </div>

            <img class="shape-2 animation-left" src="{{asset('index-assets/images/shape/shape-22.png')}}" alt="Shape">

        </div>
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
