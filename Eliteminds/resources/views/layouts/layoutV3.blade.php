<!DOCTYPE html>
<html 
{{app()->getLocale() == 'ar'? 'dir=rtl': 'dir=ltr'}}
        lang="{{app()->getLocale()}}"
        data-footer="true"
        data-override='{"attributes": {"placement": "horizontal","layout": "boxed", "behaviour": "unpinned"}, "storagePrefix": "elearning-portal"}'
>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('layV3/style/home.css')}}">
 
  <link rel="stylesheet" href="{{asset('layV3/slider/style.css')}}">
  @yield('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

   @yield('seodata')
   <style>

.lang-button{
    border: 2px solid #ADADAD;
    border-radius: 40px;
    padding:5px 12px;
}
.lang-button > a{
    text-transform: upperCase;

* {
    font-family:"Roboto" !important;
}
}
a{
    color: #000;
    text-decoration:none;
}
a:hover{
    color:#000;
}
.lang-body{
    width:86px;
    border: 2px solid #ADADAD;
    border-radius: 22px;
    min-width:86px;
    padding:10px;
    left:-10px !important;
    top: calc(100% + 7px) !important;
}
.lang-body li a{
    color: #4B4B4D;
    font-size: 16px !important;
}

ul.feature-blogs{
  padding-left: 0 !important;
}
ul.feature-blogs li {
  list-style: none;
}
ul.feature-blogs li:before {
  content: "·";
  font-size: 30px;
  vertical-align: middle;
  color: #D8D8D8;
}
ul li > a {
    font-size:16px ;
}
ul.feature-blogs li.active a {
  color: #f58634 !important;
  font-size:16px !important;
}

.footer-item h6{
    color:  #F2F5F6;
    text-align: center;
    font-size: 20px;
    font-family: Roboto;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: -0.3px;
    margin-bottom:13px;
}
.footer-item a{
    color: #F2F5F6;
    text-align: center;
    font-size: 16px;
    font-family: Roboto;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    letter-spacing: -0.24px;
    margin-bottom:7px;
}
.main-footer{
    background: #F58634;
    padding: 16px 0px;
}
.other-links{
    color:  #F2F5F6;
    text-align: center;
    font-size: 14px;
    display:flex;
    align-items: center;
    column-gap:13px;
}
.payments{
    display:grid;
    grid-template-columns: repeat(auto-fill, minmax(75px,1fr));
    gap:10px;
}
.payments .payment{
    border-radius: 10px;
    border: 0.7px solid #ADADAD;
    background: #FEFEFE;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    width: 75px;
    height: 44px;
    display:flex;
    align-items:center;
    justify-content:center;
    }
   </style>
   @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('layV3/style/stylear.css')}}">
    @endif
    <!--<link rel="stylesheet" href="{{asset('layV3/style/adawe.css')}}">-->
</head>

<body>
  <a style="  position:fixed;bottom:40px;right:40px;z-index:999;" target="_blank" href="https://wa.me/+962797205176">
      <!--<img src="{{asset('index-assets/images/whatsapp.png')}}" alt="whatsapp" >-->
      <img style="width:64px; height:64px;" src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="whatsapp" >
      
  </a>
  <section class="container-fluid gx-0 gy-5 m-0 ">
    <!-- navbar -->
    <header class="row g-0  col-12 d-flex  position-fixed top-0 ">
      <nav class="navbar navbar-expand-lg bg-white border-bottom" style="height:80px">
        <div class="container-lg bg-white px-3 px-lg-0">
          <a class="navbar-brand col-1" href="{{ url('/') }}"><img style="width:119px" src="{{asset('index-assets/images/logo.png')}}" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation" onclick="toggleNavBar()">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse py-1" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-start align-items-lg-center mx-auto mb-2 mb-lg-0 navrespo px-2  px-lg-0">
                <li class="nav-item me-1">
                <a class="nav-link text-lg-center {{ Request::path() == '/' ? 'active' : '' }}"  href="{{ url('/') }}"> {{__('messages.Home')}}  </a>
              </li>
                {{-- <li class="nav-item me-1">
                <a class="nav-link text-lg-center" href="./eBook.html">E-books</a>
              </li>  --}}
              <li class="nav-item me-1">
                <a class="nav-link text-lg-center {{ Request::path() == 'certificates' ? 'active' : '' }} " aria-current="page"  href="{{ route('public.certificates') }}"> {{__('messages.Certifactes')}} </a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link text-lg-center {{ Request::path() == 'blogs' ? 'active' : '' }} " href="{{ url('/blogs') }}"> {{__('messages.Blogs')}}</a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link text-lg-center {{ Request::path() == 'books' ? 'active' : '' }}" href="{{ route('allBooks.index') }}"> {{__('messages.E-Books')}}</a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link text-lg-center {{ Request::path() == 'about-us' ? 'active' : '' }}" href="{{ route('aboutUs') }}">{{__('messages.About_Us')}}  </a>
              </li>
              <li class="nav-item me-1">
                <a class="nav-link text-lg-center " href="{{ route('contact.page') }}"> {{__('messages.Contact_Us')}}</a>
              </li>
              
              
              
              <!-- <li class="nav-item me-3 d-flex align-items-center">-->
              <!--  <select name="langSelect" id="langSelect" style="border:2px solid #ADADAD;border-radius:77px;width:42px;color:#4B4B4D;">-->
              <!--    <option value="en" style="color:#4B4B4D;">-->
              <!--       <a href="{{route('set.localization', 'en')}}">-->
              <!--       English</a></option>-->
                     
              <!--      <option value="ar" style="color:#4B4B4D;">-->
              <!--       <a href="{{route('set.localization', 'ar')}}">       العربية </a> -->
              <!--        </option>-->
              <!--  </select> -->
                
              <!--</li> -->
              
            <!--  <div id="dd" class="wrapper-dropdown-3" tabindex="1">-->
            <!--	<span> </span><i class="fa fa-chevron-down" style="color:#ADADAD" aria-hidden="true"></i>-->
            <!--	<ul class="dropdown">-->
            <!--		<li>-->
            <!--		    <a href="{{route('set.localization', 'en')}}" onclick="window.location.replace('route('set.localization', 'en')')"><i class="icon-envelope icon-large"></i>English</a>-->
            <!--		    </li>-->
            <!--		<li>-->
            <!--		    <a href="{{route('set.localization', 'ar')}}"><i class="icon-truck icon-large"></i>Arabic</a>-->
            <!--		    </li>-->
            <!--	</ul>-->
            <!--</div>-->
            
            <div class="dropdown lang-button">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                       {{app()->getLocale() }}
                      </a>
                      <ul class="dropdown-menu lang-body" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a href="{{route('set.localization', 'ar')}}"><i class="icon-truck icon-large"></i>Arabic</a>
                        </li>
                        <li>
                            <a href="{{route('set.localization', 'en')}}"><i class="icon-truck icon-large"></i>English</a>
                        </li>
                      </ul>
                    </div>
                        
                          
            </ul>
                        @if(Auth::guard('admin')->check())         
                              <a href="{{route('admin.dashboard')}}" class="btn bgorangeInline  text-center Roboto mx-2  ">{{__('messages.Dashboard')}} </a>
                              <a href="{{route('logout')}}" class="btn bgorange  btnorange text-white  text-center Roboto " onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @elseif(Auth::guard('web')->check())
                              <a href="{{route('user.dashboard')}}" class="btn bgorangeInline  text-center Roboto mx-2  ">Dashboard</a>
                              <a href="{{route('logout')}}" class="btn bgorangeInline  text-center Roboto " onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else

                            <a href="{{route('login')}}" class="btn btnorange  text-center Roboto " style="color:orange"> {{__('messages.Sign_In')}} </a>
                              <a href="{{route('register')}}" class="btn bgorange  btnorange text-white  text-center Roboto ">{{__('messages.Sign_Up')}}</a>
                            @endif
          
           

          </div>
        </div>
      </nav>

    </header>



@yield('content')
<footer  class="position-relative mt-5 pb-4 main-footer">
        <!--<svg class="left-curve" width="887" height="298" viewBox="0 0 887 298" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--    <ellipse cx="427.5" cy="155" rx="459.5" ry="143" fill="#F2F5F6"/>-->
        <!--    <rect x="-32" width="874" height="84" fill="white"/>-->
        <!--    </svg>-->
    <div class="container">
        <div class="row">    
          <div class="col-md-9 col-12 row">
            <div class="col-md-3 col-12 mt-5">
                <img src="{{asset('layV3/images/newlogodesign.png')}}" alt="">
            </div>
            <div class="col-md-8 col-12 row" style="margin-top:10px"> 
                <div class="col-md-4 col-12 d-flex flex-column justify-content-start align-items-start footer-item ">
                    <h6>Quick links</h6>
                     <a href="{{ url('/') }}" >Home</a>
                     <a href="{{ route('public.certificates') }}" >Certifactes</a>
                     <a  href="{{ route('aboutUs') }}" >About</a>
                     <a href="{{ url('/blogs') }}">Blogs</a>
                     <a href="{{ route('allBooks.index') }}" >E-Books</a>
                     <a  href="{{ route('contact.page') }}" >Contact us</a>
                </div>
                <div class="col-md-4 col-12 d-flex flex-column justify-content-space-between align-items-start  footer-item ">
                    <h6 >Certifactes</h6>
                    @php
                        $coursdetails = DB::table('course_details')->latest()->limit(6)->get();
                    @endphp
                
                    @foreach($coursdetails as $coursdetail)
                        @if($coursdetail->slug != null)
                        <a href="{{route('package.by.course' , $coursdetail->slug) }}" >{{ $coursdetail->certificatename }}</a>
                        @endif
                    @endforeach
                </div>
                
                @php
                    $setting = DB::table('all_settings')->first();
                @endphp
                    
                <div class="col-md-4 col-12 d-flex flex-column justify-content-start align-items-start footer-item">
                  <h6 >Follow us</h6>
                  <!--<a href="#" >Email:Info@eliteminds.co</a>-->
                  <!--<a href="#" >Location: Teebah Complex, Prs. Zeinab St., Amman, Jordan</a>-->
                  <!--<a href="#" >Phone:+962797205176</a>-->
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <a href="{{ $setting->twiterlink }}" target="_blank"> <img src="{{asset('layV3/images/twitter.svg')}}" alt=""> </a>
                    <a href="{{ $setting->facebooklink }}" target="_blank"> <img src="{{asset('layV3/images/facebook.svg')}}" alt=""> </a>
                  </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <a href="{{ $setting->youtubelink }}" target="_blank"> <img src="{{asset('layV3/images/youtube.svg')}}" alt=""> </a>
                    <a href="{{ $setting->instalink }}" target="_blank"> <img src="{{asset('layV3/images/instagram.svg')}}" alt=""> </a>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <a href="{{ $setting->wifilink }}" target="_blank"><img src="{{asset('layV3/images/wifi.svg')}}" alt=""> </a>    
                    <a href="{{ $setting->linkedinlink }}" target="_blank"><img src="{{asset('layV3/images/linkedin.svg')}}" alt=""> </a>
                  </div>
                  
                </div>
          </div>
            <div class="col-12 d-flex justify-content-center gap-3 ">
              <a href=#"" class="other-links">Terms of use</a>
              <a href="#"  class="other-links">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                    <circle cx="5" cy="5" r="4.5" fill="#ADADAD" stroke="#D8D8D8"/>
                </svg> Privecy Policy
                </a>
                <a href="#"  class="other-links"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                  <circle cx="5" cy="5" r="4.5" fill="#ADADAD" stroke="#D8D8D8"/>
                </svg> Refund Policy
                </a>
          </div>
          </div>
          <div class="col-md-3 col-12 d-flex flex-column">
              <div class="footer-item">
                    <h6 class="text-start ">We accept</h6>
                    <div class="payments">
                        <!--Visa-->
                        <div class="payment">
                            <img src="{{asset('layV3/images/Visa.svg')}}" alt="visa"> 
                        </div>
                         <div class="payment">
                        <!--Master card-->
                            <img src="{{asset('layV3/images/MasterCard.svg')}}" alt="">                            
                        </div>
                         <div class="payment">
                         <!--Paypal-->
                            <img src="{{asset('layV3/images/PayPal.svg')}}" alt="">                           
                        </div>
                         <div class="payment">
                             <!--Pay-->
                            <img src="{{asset('layV3/images/Apple Pay.svg')}}" alt="">
                        </div>
                         <div class="payment">
                            <!--American Express-->
                            <img src="{{asset('layV3/images/AmericanExpress.svg')}}" alt="">
                        </div>
                        <!--Secure-->
                        <img src="{{asset('layV3/images/secure.png')}}" alt="">
                    </div>
                </div>
                <p class="Roboto text-center" style="color:#F2F5F6; margin-top:auto;
                font-size: 14px;font-family: Roboto;font-style: normal;font-weight: 400;line-height: normal;letter-spacing: -0.21px;">Copyright  @2023 Elite Minds All Rights Reserved</p>
          </div>
          </div>
        </div>
    </div>

</footer>

</section>
<script src="{{asset('layV3/slider/script.js')}}"></script>

  <script>
    const navbarBody = document.getElementById("navbarSupportedContent");

function toggleNavBar(){
  // navbarBody.classList.toggle("showFix");
  if(navbarBody.classList.contains("showFix")){
    setTimeout(()=>{
      navbarBody.classList.remove("showFix");
      navbarBody.classList.remove("show");
    },400)
  }else{
    navbarBody.classList.add("showFix");
    navbarBody.classList.add("show");
  }
}


  </script>
  @yield('js')
  
<!--  <script>-->
<!--function DropDown(el) {-->
<!--    this.dd = el;-->
<!--    this.placeholder = this.dd.children('span');-->
<!--    this.opts = this.dd.find('ul.dropdown > li');-->
<!--    this.val = '';-->
<!--    this.index = -1;-->
<!--    this.initEvents();-->
<!--}-->
<!--DropDown.prototype = {-->
<!--    initEvents : function() {-->
<!--        var obj = this;-->

<!--        obj.dd.on('click', function(event){-->
<!--            console.log('event', event);-->
<!--            $(this).toggleClass('active');-->
<!--            return false;-->
<!--        });-->

<!--        obj.opts.on('click',function(){-->
<!--            var opt = $(this);-->
<!--            obj.val = opt.text().slice(0, 2);-->
<!--            obj.index = opt.index();-->
<!--            obj.placeholder.text(obj.val);-->
<!--        });-->
<!--    },-->
<!--    getValue : function() {-->
<!--        return this.val;-->
<!--    },-->
<!--    getIndex : function() {-->
<!--        return this.index;-->
<!--    }-->
<!--}-->

<!--$(function() {-->

<!--	var dd = new DropDown( $('#dd') );-->

<!--	$(document).click(function() {-->

<!--		$('.wrapper-dropdown-3').removeClass('active');-->
<!--	});-->

<!--});-->


<!--</script>-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>



