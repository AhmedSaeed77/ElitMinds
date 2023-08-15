@php
    $thisUser = Auth::user();
    $userCourses = Cache::remember('userCoursesCached'.$thisUser->id, 300, function()use($thisUser){
        return \Illuminate\Support\Facades\DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->join('courses', 'packages.course_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title'
            )
            ->groupBy('courses.id')
            ->get();
    });
@endphp
<!DOCTYPE html>
<html
        lang="en"
        data-footer="true"
        data-override='{"attributes": {"placement": "vertical","layout": "boxed", "behaviour": "unpinned" }, "storagePrefix": "elearning-portal"}'
        data-color="dark-blue"
        data-radius='rounded'
        {{app()->getLocale() == 'ar'? 'dir=rtl': 'dir=ltr'}}
        lang="{{app()->getLocale()}}"
        data-footer="true"
        data-override='{"attributes": {"placement": "horizontal","layout": "boxed", "behaviour": "unpinned"}, "storagePrefix": "elearning-portal"}'
>
<head>
    <meta charset="UTF-8" />
    <title>{{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="{{env('APP_NAME')}} is E-Learning Web application Built with Love by Mohamed Ahmed At http://misk.com.eg" />
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('index-assets/images/favicon.ico')}}">
    <meta property="og:image" content="{{asset('index-assets/images/favicon.ico')}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('user-assets/font/CS-Interface/style.css')}}" />
    <link rel="stylesheet" href="{{asset('user-assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user-assets/css/vendor/OverlayScrollbars.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user-assets/css/vendor/glide.core.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user-assets/css/styles.css')}}" />

    <style>
        .main-content {
          padding-left: calc(130px + 25px )!important;
          min-height: 100vh;
          transition: all 0.3s ease-in-out;
          background-color:var(--bg-main);
          padding-top: 62px;
          }
        /* Exames nav */
        .exames-nav-border-right {
          border-right: 1px solid #95979834;
          padding-right: 30px;
        }

        /* Main sidenav */
        .main-sidenav {
          height: 100vh;
          background-color: var(--bg-primary);
          backdrop-filter: blur(4px);
          width: var(--main-side-width);
          position: fixed;
          left: 0;
          top: 0;
          transition: all 0.3s ease-in-out;
          padding: 25px;
          z-index:30;
          overflow-y: scroll;
          display:flex;
          flex-direction:column;
          /* border-right:1px solid var(--border-grey); */
          
        }
        .main-sidenav.collapsed:not(.show-mobile){
          background-color:var(--bg-primary);
        }
        .main-sidenav::-webkit-scrollbar {
          width: 0px;
          /* height:0px */
        }
        .main-sidenav.collapsed:hover{
          /* --main-side-width:360px !important; */
        }
        /* Track */
        .main-sidenav::-webkit-scrollbar-track {
          background: #f1f1f1;
        }

        /* Handle */
        .main-sidenav::-webkit-scrollbar-thumb {
          background: #ddd;
        }
        .main-sidenav.show-mobile{
          transform:translateX(0);
          padding: 0px;
          width:100%;
          background:var(--bg-primary);
          overflow:scroll;
        }
        .main-sidenav-toggler {
          position: fixed;
          top: 77px;
          left: calc(var(--main-side-width) - 12px )!important;
          height: 34px;
          z-index: 31;
          width: 34px;
          transform: translateY(-50%);
          display: flex;
          justify-content: center;
          align-items: center;
          box-shadow: 0px 0px 25px rgba(44, 47, 50, 0.1);
          border-radius: 50%;
          cursor: pointer;
          transition: all 0.3s ease-in-out;
          background-color: var(--lock-color);
        }
        .main-sidenav-toggler.opend{
          background-color: var(--bg-accent);
        }
        .main-sidenav-toggler svg.unlocked{
            color:var(--text-accent-reverse)
        }
        .main-sidenav-toggler.opend svg.locked, .main-sidenav-toggler svg.unlocked {
          /* color: var(--text-accent-reverse); */
          display:block;
        }
        .main-sidenav-toggler.opend svg.unlocked, .main-sidenav-toggler svg.locked {
          display:none;
        }

        /* {
          display:block
        }
        {
          display:none
        } */

        .main-sidenav-curve{
          position: fixed;
          top: 0;
          left: calc(var(--main-side-width) - 21px)!important;
          z-index: 28;
          transition: all 0.3s ease-in-out;

        }
        .main-sidenav-curve svg{
          transition: all 0.3s ease-in-out;
          height:100vh;
          color: var(--bg-primary);
        } 
        .main-sidenav-curve.opend svg {
          color: var(--bg-primary);

        }
        .main-sidenav .logo {
          display: flex;
          gap: 4px;
          padding-bottom: 25px;
          border-bottom: 1px solid #95979834;
        }
        .logo  .logo-right {
          color:var(--text-primary);
        }
        .main-sidenav.collapsed .logo {
          justify-content: center;
        }
        .main-sidenav.collapsed .logo .logo-right {
          display: none;
        }
        .main-sidenav-list {
          display: flex;
          flex-direction: column;
          gap: 8px;
          padding-left:0px;
          padding-top: 15px;
        }
        .main-sidenav.show-mobile .main-sidenav-list {
          gap: 1vh;
          padding-top: 5px;
          padding-left:16px;

        }
        .main-sidenav.show-mobile .main-sidenav-list {
        height: auto;
        }
        .main-sidenav-item {
          cursor: pointer;
          padding: 16px;
          font-weight: 600;
          font-size: 16px;
          border-radius: 13px;
          transition: all 0.2s ease-in-out;
          display: flex;
          align-items: center;
          gap: 17px;
          color:var(--text-primary) ; 
        }

        .main-sidenav-item.active,
        .main-sidenav-item:hover {
          background-color: var(--bg-active-accent);
          color:var(--text-primary);
        }
        .main-sidenav.collapsed .main-sidenav-item {
          justify-content: center;
        }

        .main-sidenav.collapsed .main-sidenav-item span {
          display: none;
        }
         .main-sidenav.show-mobile .main-sidenav-item span {
          display: flex;
        }
        .main-sidenav.collapsed .main-sidenav-item {
          justify-content: center;
        }

        .main-sidenav-item.active,
        .main-sidenav-item:hover {
          background-color: var(--bg-active-accent);
        }
        .main-sidenav.show-mobile .main-sidenav-item {
         padding:12px
        }
        .main-sidenav.show-mobile .main-sidenav-list .divider:first-of-type {
          margin:0px;
        }
        .main-sidenav-list .divider:first-of-type {
          /* margin: auto 0px 0px 0px; */
            margin: auto 0px 0px 0px;
        }
        .main-sidenav footer {
          margin-top: auto;
          }
      .main-sidenav .dark-mode {
          display: grid;
          grid-template-columns: 1fr 1fr;
          background: var(--bg-main);
          border-radius: 21px;
          padding: 4px;
          margin: 30px 0px;
        }
        .main-sidenav.show-mobile .dark-mode {
          margin: 10px 0px;
        }
        .main-sidenav .dark-mode > div {
          padding: 5px;
          width: 100%;
          text-align: center;
          cursor: pointer;
          display:flex;
          justify-content:center;
          align-items:center;
          gap:10px;
        }
        .main-sidenav .dark-mode > div.active {
          background: var(--bg-primary);
          border-radius: 21px;
        }
        .main-sidenav.collapsed .dark-mode {
          display:flex;
          justify-content: center;
          align-items:center;
          border-radius: 50%;
          width: 42px;
          height: 42px;
          margin: 30px auto;
          background:var(--bg-primary);
          border:4px solid var(--bg-main)
        }
        .main-sidenav.show-mobile .dark-mode {
          justify-content: start;
          margin: 10px;
        }
        
        .main-sidenav.collapsed .dark-mode > div span {
          display: none;
        }
        .main-sidenav.show-mobile .dark-mode > div span {
          display: block;
        }
        .main-sidenav.show-mobile .dark-mode > div span{
          font-size:16px
        }
        .main-sidenav.collapsed .dark-mode > div {
          display:none;
        }
        .main-sidenav.collapsed .dark-mode > div.active {
          display: block;
        }
        .main-sidenav.collapsed .dark-mode > div.active {
          width: 34px;
          height: 34px;
          border-radius: 50%;
        }
        .user-profile {
          display: flex;
          align-items:center;
          gap: 14px;
          padding: 10px 16px;
          margin-bottom:10px;

        }
        .user-profile img {
          width: 50px;
          height: 50px;
        }
        .user-menu{
          margin-left: auto !important;
        }
        .main-sidenav.collapsed .user-menu{
          margin: 0 10px !important;

        }
        .main-sidenav.collapsed .user-menu a img{
            display:block
        }
        .main-sidenav.collapsed .user-profile img,
        .main-sidenav.collapsed .user-menu a svg,
        .main-sidenav .user-menu a img {
          display:none
        }
        .user-profile .name {
          font-weight: 500;
          font-size: 16px;
        }
        .user-profile .email {
          font-weight: 400;
          font-size: 14px;
          color: var(--text-accent);
        }
        .main-sidenav.collapsed .user-profile {
          justify-content: center;
          flex-direction:column;
          gap: 0;
        }
        .main-sidenav.collapsed .user-profile .name {
          display: none;
        }
        .main-sidenav.collapsed .user-profile .email {
          display: none;
        }
        
        .signout-btn {
          padding:5px 10px;
        }
        .signout-btn a {
          display:flex;
          align-items:center;
          justify-content:flex-start;
          gap:8px;
          font-size:16px; 
          color:var(--text-primary) !important;
        }
        .signout-btn:hover a{
          color:var(--text-accent) !important;
        }
        .signout-btn svg{
          display:block;
          width: 20px;
          height:auto;
        }
        /* Sidenave on mobile screens */
        .main-sidenav-mobile .logo {
          display: flex;
          gap: 4px;
        }
        .main-sidenav-mobile {
          display: none;
          z-index: 11;
          align-items: center;
          justify-content: space-between;
          background: var(--bg-primary);
          padding: 30px 25px;
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 12vh;
         border-bottom: 1px solid #95979834;
        }
        .main-sidenav-mobile-toggler {
          cursor: pointer;
          width:39px;
          height:39px;
          border-radius:50%;
          display:flex;
          align-items:center;
          justify-content:center;
          background-color:var(--bg-primary);
          box-shadow: 0px 0px 25px rgba(44, 47, 50, 0.1);
            } 
        

        /* utiltites */
        .divider {
          height: 1px;
          width: 100%;
          background-color: #95979834;
        }

        @media screen and (max-width: 992px) {
          .main-content {
            padding: 19px !important;
            padding-top: 150px !important;
          }
          .main-sidenav {
            top: calc( 12vh - 2px );
            transform:translateX(-100%);
          }
          .main-sidenav .logo{
            display:none !important;
          }
          .main-sidenav-mobile {
            display: flex;
          }
          .main-sidenav-toggler, .main-sidenav-curve {
            display:none !important;
          }

        }

    </style>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z72PZ12XTL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z72PZ12XTL');
</script>

    <link rel="stylesheet" href="{{asset('user-assets/css/main.css')}}" />
    <script src="{{asset('user-assets/js/base/loader.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128995532-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128995532-1');
</script>
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
</style>
    @yield('head')
</head>

<body>
      <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://web.whatsapp.com/send?phone=%+962797205176&text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20&type=phone_number&app_absent=0"
       class="adawe"
       target="_blank">
        <i class="fa fa-whatsapp adawe2"></i>
    </a>
<div id="root">
    <div class="main-sidenav collapsed">
        <div class="logo">
          <div class="logo-left">
            <svg
              width="33"
              height="68"
              viewBox="0 0 33 68"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M7.72717 61.1239L32.0628 68V0L7.72717 6.87611V61.1239Z"
                fill="#F58634"
              />
              <path
                d="M29.8664 1.69222V66.1637L29.3931 66.2222L28.1221 66.3713L27.6488 66.4298L26.3777 66.5788L25.9044 66.6374L24.6334 66.7917L24.1654 66.8449V1.14404L24.6334 1.18662L25.9044 1.30903L26.3777 1.35693L27.6488 1.47933H27.6647L28.1221 1.52191L29.3931 1.64432L29.8664 1.69222Z"
                fill="white"
              />
              <path
                d="M24.6334 1.18662V66.7917L24.1654 66.8449V1.14404L24.6334 1.18662Z"
                fill="#F58634"
              />
              <path
                opacity="0.4"
                d="M26.3777 1.35698V66.5789L25.9044 66.6374V1.30908L26.3777 1.35698Z"
                fill="#959798"
              />
              <path
                opacity="0.4"
                d="M28.1221 1.52207V66.3714L27.6488 66.43V1.47949H27.6648L28.1221 1.52207Z"
                fill="#959798"
              />
              <path
                d="M29.8664 1.69243V66.1639L29.3931 66.2225V1.64453L29.8664 1.69243Z"
                fill="#F58634"
              />
              <path d="M0 61.06L24.2452 68V0L0 6.93997V61.06Z" fill="#F58634" />
            </svg>
          </div>
          <div class="logo-right">
            <svg
              width="103"
              height="63"
              viewBox="0 0 103 63"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M6.28954 16.6216H14.3677C15.192 16.6216 15.894 16.3342 16.4684 15.7541C17.0481 15.1794 17.3352 14.4768 17.3352 13.6519V11.752H0.519409V29.1604H21.127V23.8809H6.28954V16.6216Z"
                fill="currentColor"
              />
              <path
                d="M28.9978 1.56555C28.4501 1.04398 27.7906 0.783203 27.0195 0.783203H24.052V29.1604H29.8221V3.50278C29.8221 2.7364 29.5456 2.08711 28.9978 1.56555Z"
                fill="currentColor"
              />
              <path
                d="M37.9428 8.0425C37.3898 7.49433 36.7303 7.21758 35.9592 7.21758H32.9917V29.1604H38.7618V10.0223C38.7618 9.25061 38.4906 8.59067 37.9428 8.0425ZM37.9428 1.60812C37.3898 1.05995 36.7303 0.783203 35.9592 0.783203H32.9917V5.3176H38.7618V3.58793C38.7618 2.81623 38.4906 2.1563 37.9428 1.60812Z"
                fill="currentColor"
              />
              <path
                d="M47.6218 11.257C48.3929 11.257 49.0523 10.9962 49.6001 10.4747C50.1532 9.95312 50.4297 9.27722 50.4297 8.4523V7.29741H47.0474V3.58793C47.0474 2.81623 46.7709 2.1563 46.2231 1.60812C45.6753 1.05995 45.0425 0.783203 44.3245 0.783203H41.3571V25.0358C41.3571 27.5638 42.4153 28.9103 44.532 29.0753C46.6486 29.2403 48.6163 29.2669 50.4297 29.1604V24.8709H48.696C47.5952 24.8709 47.0474 24.4025 47.0474 23.4658V11.257H47.6218Z"
                fill="currentColor"
              />
              <path
                d="M69.6706 9.69237C67.8572 7.71256 65.3045 6.72266 62.0073 6.72266C58.71 6.72266 56.4286 7.73917 54.6683 9.7722C52.9665 11.752 52.1156 14.5035 52.1156 18.0214C52.1156 21.5393 52.9931 24.5409 54.7534 26.5207C56.5083 28.5538 58.9547 29.5703 62.087 29.5703C64.6716 29.5703 66.8148 28.9423 68.5219 27.6756C70.2237 26.4675 71.3777 24.7059 71.9787 22.3961H67.8572C67.1977 22.3961 66.6925 22.5345 66.3362 22.8059C65.9746 23.0827 65.7725 23.3009 65.714 23.4659C65.5491 23.6309 65.4002 23.7852 65.2619 23.9236C65.1237 24.0619 64.9748 24.1577 64.8099 24.211C64.1504 24.5941 63.3527 24.7857 62.4168 24.7857C60.9915 24.7857 59.9172 24.3493 59.2046 23.4659C58.4335 22.6409 58.024 21.3796 57.9655 19.6712H72.2286C72.2818 19.5648 72.3084 19.3732 72.3084 19.0965V18.1864C72.3084 14.5567 71.4309 11.7254 69.6706 9.69237ZM57.9655 15.9618C58.024 14.5301 58.4335 13.4338 59.2046 12.6621C59.9757 11.8904 60.9649 11.5072 62.1721 11.5072C63.491 11.5072 64.5068 11.8904 65.2194 12.6621C65.8842 13.3752 66.2671 14.4769 66.3734 15.9618H57.9655Z"
                fill="currentColor"
              />
              <path
                d="M3.48691 0.783203C2.6626 0.783203 1.96062 1.07059 1.38626 1.64538C0.806589 2.22548 0.519409 2.92799 0.519409 3.75291V5.64757H21.127V0.783203H3.48691Z"
                fill="#F58634"
              />
              <path
                d="M0.519409 62.4605V37.053C0.519409 36.228 0.806589 35.5255 1.38626 34.9507C1.96062 34.3706 2.6626 34.0566 3.48691 34.0034H9.17727L14.7825 55.7015L20.3878 34.0034H29.0457V62.4658H23.6053V39.533L17.8351 62.4658H11.815L5.96514 39.533V62.4658H0.524728L0.519409 62.4605Z"
                fill="currentColor"
              />
              <path
                d="M31.7792 34.0834H34.7467C35.5178 34.0834 36.1772 34.3602 36.725 34.9084C37.2728 35.4565 37.5493 36.1165 37.5493 36.8882V38.6178H31.7792V34.0781V34.0834ZM31.7792 40.5178H34.7467C35.5178 40.5178 36.1772 40.7946 36.725 41.3427C37.2728 41.8909 37.5493 42.5509 37.5493 43.3226V62.4607H31.7792V40.5178Z"
                fill="currentColor"
              />
              <path
                d="M59.4546 62.4607H56.5722C55.7479 62.4607 55.0725 62.1999 54.5513 61.6784C54.0301 61.1568 53.7695 60.4809 53.7695 59.656V48.4371C53.7695 47.1172 53.3707 46.1539 52.5729 45.5472C51.7752 44.9405 50.8818 44.6371 49.8926 44.6371C48.9035 44.6371 48.026 44.9405 47.2549 45.5472C46.4837 46.1539 46.1008 47.1119 46.1008 48.4371V62.4607H40.3307V49.592C40.3307 45.8506 41.3039 43.3492 43.2556 42.0825C45.2074 40.8159 47.3612 40.1293 49.7278 40.0176C52.1475 40.0176 54.3705 40.6509 56.402 41.9122C58.4335 43.1789 59.4546 45.7335 59.4546 49.5866V62.4554V62.4607Z"
                fill="currentColor"
              />
              <path
                d="M76.5576 34.0034H79.3602C80.1314 34.0034 80.7908 34.2908 81.3386 34.8709C81.8863 35.4457 82.1629 36.095 82.1629 36.8081V52.8967C82.1629 56.8031 81.0354 59.4429 78.7806 60.816C76.5257 62.1891 74.0794 62.8809 71.4469 62.8809C70.0163 62.8809 68.6177 62.6468 67.2403 62.1784C65.8682 61.7101 64.7674 60.9543 63.9431 59.9112C62.3476 57.8782 61.5499 55.1001 61.5499 51.5769C61.5499 48.0537 62.3476 45.3341 63.9431 43.2425C65.5917 41.0977 67.7083 40.028 70.2876 40.028C71.6596 40.028 72.8722 40.3047 73.9145 40.8529C75.0153 41.5128 75.8928 42.3644 76.5523 43.4128V34.0087L76.5576 34.0034ZM67.1605 51.3267C67.1605 53.5247 67.5753 55.2065 68.3996 56.3614C69.2239 57.5163 70.4046 58.0911 71.9415 58.0911C73.4784 58.0911 74.5793 57.5163 75.4036 56.3614C76.1747 55.2065 76.5576 53.5301 76.5576 51.3267C76.5576 49.3469 76.1428 47.7769 75.3185 46.6274C74.441 45.5257 73.2551 44.9775 71.7766 44.9775C70.2982 44.9775 69.2186 45.5523 68.3943 46.7072C67.57 47.8088 67.1552 49.3469 67.1552 51.3267H67.1605Z"
                fill="currentColor"
              />
              <path
                d="M83.503 55.201H89.1083C89.1615 56.3027 89.5763 57.1276 90.3474 57.6757C91.1717 58.2239 92.2725 58.5007 93.6446 58.5007C94.6338 58.5007 95.4847 58.3091 96.1973 57.9259C96.8567 57.5427 97.1865 57.0158 97.1865 56.3612C97.1865 55.3713 96.0324 54.6262 93.7244 54.1313C92.7352 53.9663 91.9907 53.8013 91.4961 53.6363C88.5818 52.9231 86.63 52.0663 85.6409 51.0764C84.54 50.0865 83.9923 48.7666 83.9923 47.1168C83.9923 45.0252 84.79 43.2955 86.3854 41.9171C88.034 40.6505 90.1772 40.0225 92.815 40.0225C95.6708 40.0225 97.9523 40.6558 99.6594 41.9171C101.255 43.2902 102.106 45.0784 102.212 47.2818H98.6649C97.6225 47.2818 96.8248 46.8134 96.2718 45.8821C96.0537 45.6638 95.8303 45.4403 95.6123 45.2221C94.9529 44.7272 94.0435 44.477 92.8894 44.477C91.7354 44.477 90.9643 44.642 90.4165 44.972C89.9219 45.3019 89.672 45.7969 89.672 46.4568C89.672 47.335 91.1026 48.0801 93.9584 48.6868C94.2881 48.7985 94.5753 48.8784 94.8252 48.9316C95.0699 48.9848 95.3039 49.0167 95.5272 49.0167C98.3299 49.7299 100.282 50.5548 101.382 51.4915C102.425 52.4814 102.951 53.8013 102.951 55.4511C102.951 57.8727 102.074 59.7407 100.314 61.0606C98.6649 62.2687 96.192 62.8754 92.8948 62.8754C89.5975 62.8754 87.4278 62.2421 85.8908 60.9807C84.2954 59.7141 83.4977 57.8727 83.4977 55.4511V55.201H83.503Z"
                fill="currentColor"
              />
            </svg>
          </div>
        </div>
     
 <ul class="main-sidenav-list">
          <li >
             <a href="{{route('user.dashboard')}}"  title="Dashboard"  class="main-sidenav-item {{ request()->route()->named('user.dashboard') ? 'active' : '' }}" >
            <img src="{{asset('helper/exames/dashboard.png')}}" alt="" /><span> {{__('messages.Dashboard')}} </span>
            </a>
          </li>
          
          <li >
              <a href="{{route('my.package.view')}}" title="My courses" class="main-sidenav-item {{ request()->route()->named('my.package.view') ? 'active' : '' }}" >
            <img src="{{asset('helper/exames/courses.png')}}" alt=""  /><span>{{__('messages.My_courses')}} </span>
             </a>
          </li>
          <li>
            <a href="{{route('user.StudyMetrial')}}" title="Study resources" class="main-sidenav-item {{ request()->route()->named('user.StudyMetrial') ? 'active' : '' }}">
            <img src="{{asset('helper/exames/study-material.png')}}" alt=""   /><span>
             {{__('messages.Study_resources')}}  </span
            >
              </a>
          </li>
          <li>
            <a href="{{route('QuizHistoryShow')}}" title="Analytics"  class="main-sidenav-item {{ request()->route()->named('QuizHistoryShow') ? 'active' : '' }}">
            <img src="{{asset('helper/exames/analyticsl.png')}}" alt="" /><span>{{__('messages.Analytics')}} </span>
             </a>
          </li>
          <li>
              <a href="{{route('user.feedback.index')}}"  title="Feedback" class="main-sidenav-item {{ request()->route()->named('user.feedback.index') ? 'active' : '' }}" >
            <img src="{{asset('helper/exames/feedback.png')}}" alt=""  /><span>{{__('messages.Feedback')}} </span>
              </a>
          </li>
          <li>
            <a href="{{route('faq.index')}}"   title="FAQ" class="main-sidenav-item {{ request()->route()->named('faq.index') ? 'active' : '' }}">
            <img src="{{asset('helper/exames/faq.png')}}" alt=""  /><span>
            {{__('messages.Frequently_asked_questions')}} </span
            >
            </a>
          </li>
          <li  >
              <a href="{{ route('my.invoice.view') }}" title="Invoices" class="main-sidenav-item {{ request()->route()->named('invoices.index') ? 'active' : '' }}" ">
            <img src="{{asset('helper/exames/feedback.png')}}" alt="" /><span> {{__('messages.Invoices')}} </span>
              </a>
          </li>
          <div class="divider"></div>
          <!--   <li class="main-sidenav-item" > -->
          <!-- <a href="#">-->
          <!--   <img src="{{asset('helper/exames/bell.png')}}" alt="" title="Notifications"/><span> Notifications</span>-->
          <!-- </a> -->
          <!--</li> -->
          <li>
          <a href="{{ route('user.editprofile') }}"  title="Settings" class="main-sidenav-item" >
            <img src="{{asset('helper/exames/settings.png')}}" alt="" /><span>{{__('messages.Settings')}}  </span>
          </a>
          </li>
        </ul>

        <footer>
          <div class="divider"></div>
          <div class="dark-mode">
            <div class="light active" onclick="setLightMode()">
              <img src="{{asset('helper/exames/light.png')}}" alt="light mode"  title="Light" />
              <span> Light </span>
            </div>
            <div class="dark dark"  onclick="setDarkMode()">
              <img src="{{asset('helper/exames/dark.png')}}" alt="dark mode"  title="Dark" />
              <span> Dark </span>
            </div>
          </div>
          <div class="divider"></div>
          <div class="user-profile" >
            
            <img src="{{asset('helper/exames/profile-picture.png')}}" alt="profile picture"  />
            <div>
              <p class="name">{{Auth::user()->name}}</p>
              <p class="email">{{Auth::user()->email}}</p>
            </div>
            <div class="dropdown user-menu">
              <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.6428 11.2339C12.2197 10.8789 11.589 10.9341 11.234 11.3572C10.879 11.7803 10.9342 12.411 11.3572 12.766C11.7803 13.121 12.4111 13.0659 12.7661 12.6428C13.1211 12.2197 13.0659 11.5889 12.6428 11.2339Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M5.64282 11.2339C5.21974 10.8789 4.58899 10.9341 4.23399 11.3572C3.87899 11.7803 3.93416 12.411 4.35725 12.766C4.78033 13.121 5.41108 13.0658 5.76608 12.6428C6.12108 12.2197 6.06591 11.5889 5.64282 11.2339Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M19.6428 11.2339C19.2197 10.8789 18.589 10.9341 18.234 11.3572C17.879 11.7803 17.9342 12.411 18.3572 12.766C18.7803 13.121 19.4111 13.0659 19.7661 12.6428C20.1211 12.2197 20.0659 11.5889 19.6428 11.2339Z" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  @if(Auth::user()->image)
                    src="{{asset('helper/exames/.Auth::user()->image')}}" alt="profile picture"  />
                  @else
                    <img src="{{asset('helper/exames/profile-picture.png')}}" alt="profile picture"  />
                  @endif
                
              </a>
              <ul class="dropdown-menu">
                <li class="signout-btn">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg fill="currentColor" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.651 16.989h17.326c0.553 0 1-0.448 1-1s-0.447-1-1-1h-17.264l3.617-3.617c0.391-0.39 0.391-1.024 0-1.414s-1.024-0.39-1.414 0l-5.907 6.062 5.907 6.063c0.196 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293c0.391-0.39 0.391-1.023 0-1.414zM29.989 0h-17c-1.105 0-2 0.895-2 2v9h2.013v-7.78c0-0.668 0.542-1.21 1.21-1.21h14.523c0.669 0 1.21 0.542 1.21 1.21l0.032 25.572c0 0.668-0.541 1.21-1.21 1.21h-14.553c-0.668 0-1.21-0.542-1.21-1.21v-7.824l-2.013 0.003v9.030c0 1.105 0.895 2 2 2h16.999c1.105 0 2.001-0.895 2.001-2v-28c-0-1.105-0.896-2-2-2z"></path>
                    </svg>
                  <span>{{__('messages.sign-out')}} </span>
                </a>
                </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                  </form> 
                </li>
              </ul>
          </div>
          <!-- <ul>
            <li class="main-sidenav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
            <span> {{__('User/layout.sign-out')}} </span>
          </a>
          </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> -->
        </footer>
      </div>

      <div class="main-sidenav-mobile">
        <div class="logo">
        <div class="logo">
          <div class="logo-left">
            <svg width="19" height="39" viewBox="0 0 19 39" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.44922 35.0564L18.4597 39V0L4.44922 3.94365V35.0564Z" fill="#F58634"/>
              <path d="M17.1943 0.970643V37.9469L16.9218 37.9805L16.19 38.066L15.9175 38.0995L15.1858 38.185L14.9133 38.2186L14.1815 38.3071L13.9121 38.3376V0.65625L14.1815 0.680669L14.9133 0.750873L15.1858 0.778344L15.9175 0.848549H15.9267L16.19 0.872967L16.9218 0.943172L17.1943 0.970643Z" fill="white"/>
              <path d="M14.1815 0.680669V38.3071L13.9121 38.3376V0.65625L14.1815 0.680669Z" fill="#F58634"/>
              <path opacity="0.4" d="M15.1866 0.778448V38.1851L14.9141 38.2187V0.750977L15.1866 0.778448Z" fill="#959798"/>
              <path opacity="0.4" d="M16.1905 0.873052V38.0661L15.918 38.0996V0.848633H15.9272L16.1905 0.873052Z" fill="#959798"/>
              <path d="M17.1944 0.970831V37.9471L16.9219 37.9807V0.943359L17.1944 0.970831Z" fill="#F58634"/>
              <path d="M0 35.0197L13.9584 39V0L0 3.98028V35.0197Z" fill="#F58634"/>
            </svg>
          </div>
          <div class="logo-right">
            <svg width="59" height="37" viewBox="0 0 59 37" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.34737 9.68012H7.99814C8.47271 9.68012 8.87686 9.51529 9.20753 9.18258C9.54126 8.85293 9.70659 8.45001 9.70659 7.9769V6.88721H0.0253906V16.8715H11.8896V13.8435H3.34737V9.68012Z" fill="currentColor"/>
              <path d="M16.4216 1.04489C16.1063 0.745757 15.7266 0.596191 15.2827 0.596191H13.5742V16.8714H16.8962V2.15595C16.8962 1.71641 16.737 1.34402 16.4216 1.04489Z" fill="currentColor"/>
              <path d="M21.5712 4.75961C21.2528 4.44522 20.8731 4.28649 20.4292 4.28649H18.7207V16.8714H22.0427V5.89509C22.0427 5.4525 21.8865 5.074 21.5712 4.75961ZM21.5712 1.06931C21.2528 0.754914 20.8731 0.596191 20.4292 0.596191H18.7207V3.1968H22.0427V2.20478C22.0427 1.76219 21.8865 1.3837 21.5712 1.06931Z" fill="currentColor"/>
              <path d="M27.1419 6.60324C27.5858 6.60324 27.9655 6.45367 28.2808 6.15454C28.5993 5.85541 28.7585 5.46776 28.7585 4.99464V4.33228H26.8112V2.20478C26.8112 1.76219 26.652 1.3837 26.3366 1.06931C26.0213 0.754914 25.6569 0.596191 25.2436 0.596191H23.5352V14.5058C23.5352 15.9557 24.1444 16.7279 25.363 16.8225C26.5816 16.9172 27.7144 16.9324 28.7585 16.8714V14.4112H27.7603C27.1266 14.4112 26.8112 14.1426 26.8112 13.6053V6.60324H27.1419Z" fill="currentColor"/>
              <path d="M39.8372 5.70566C38.7932 4.57018 37.3236 4.00244 35.4253 4.00244C33.527 4.00244 32.2135 4.58544 31.2001 5.75144C30.2203 6.88692 29.7305 8.46499 29.7305 10.4826C29.7305 12.5002 30.2357 14.2217 31.2491 15.3572C32.2595 16.5232 33.6679 17.1062 35.4712 17.1062C36.9592 17.1062 38.1931 16.746 39.1759 16.0196C40.1557 15.3267 40.8201 14.3164 41.166 12.9916H38.7932C38.4135 12.9916 38.1227 13.071 37.9175 13.2267C37.7093 13.3854 37.593 13.5105 37.5593 13.6052C37.4644 13.6998 37.3787 13.7883 37.2991 13.8677C37.2195 13.947 37.1337 14.002 37.0388 14.0325C36.6592 14.2523 36.1999 14.3622 35.661 14.3622C34.8405 14.3622 34.222 14.1119 33.8118 13.6052C33.3678 13.1321 33.1321 12.4086 33.0984 11.4288H41.3099C41.3406 11.3678 41.3559 11.2579 41.3559 11.0992V10.5772C41.3559 8.49552 40.8507 6.87166 39.8372 5.70566ZM33.0984 9.30134C33.1321 8.48025 33.3678 7.85147 33.8118 7.40888C34.2557 6.96628 34.8252 6.74651 35.5202 6.74651C36.2795 6.74651 36.8643 6.96628 37.2746 7.40888C37.6573 7.81789 37.8777 8.44973 37.939 9.30134H33.0984Z" fill="currentColor"/>
              <path d="M1.73384 0.596191C1.25927 0.596191 0.855122 0.761019 0.524455 1.09067C0.190726 1.42338 0.0253906 1.82629 0.0253906 2.29941V3.38605H11.8896V0.596191H1.73384Z" fill="#F58634"/>
              <path d="M0.0253906 35.9699V21.3979C0.0253906 20.9248 0.190726 20.5219 0.524454 20.1922C0.855121 19.8595 1.25927 19.6794 1.73384 19.6489H5.00989L8.23696 32.0934L11.464 19.6489H16.4485V35.9729H13.3164V22.8203L9.99439 35.9729H6.52851L3.16061 22.8203V35.9729H0.028453L0.0253906 35.9699Z" fill="currentColor"/>
              <path d="M18.0215 19.6949H19.7299C20.1739 19.6949 20.5535 19.8537 20.8689 20.1681C21.1843 20.4825 21.3435 20.8609 21.3435 21.3035V22.2956H18.0215V19.6919V19.6949ZM18.0215 23.3852H19.7299C20.1739 23.3852 20.5535 23.544 20.8689 23.8584C21.1843 24.1728 21.3435 24.5513 21.3435 24.9938V35.9701H18.0215V23.3852Z" fill="currentColor"/>
              <path d="M33.9553 35.9699H32.2958C31.8213 35.9699 31.4324 35.8204 31.1324 35.5213C30.8323 35.2221 30.6823 34.8345 30.6823 34.3614V27.927C30.6823 27.17 30.4527 26.6175 29.9934 26.2695C29.5342 25.9216 29.0198 25.7476 28.4503 25.7476C27.8808 25.7476 27.3756 25.9216 26.9317 26.2695C26.4877 26.6175 26.2673 27.1669 26.2673 27.927V35.9699H22.9453V28.5893C22.9453 26.4435 23.5056 25.0089 24.6293 24.2825C25.7529 23.556 26.9929 23.1622 28.3554 23.0981C29.7485 23.0981 31.0283 23.4614 32.1979 24.1848C33.3674 24.9112 33.9553 26.3764 33.9553 28.5863V35.9669V35.9699Z" fill="currentColor"/>
              <path d="M43.8023 19.6489H45.4159C45.8598 19.6489 46.2395 19.8138 46.5548 20.1465C46.8702 20.4761 47.0294 20.8485 47.0294 21.2575V30.4848C47.0294 32.7252 46.3803 34.2392 45.0821 35.0267C43.784 35.8142 42.3756 36.211 40.86 36.211C40.0364 36.211 39.2312 36.0767 38.4382 35.8081C37.6482 35.5395 37.0145 35.1061 36.5399 34.5078C35.6214 33.3418 35.1621 31.7485 35.1621 29.7278C35.1621 27.7072 35.6214 26.1474 36.5399 24.9478C37.489 23.7177 38.7076 23.1042 40.1925 23.1042C40.9825 23.1042 41.6805 23.2629 42.2806 23.5773C42.9144 23.9558 43.4196 24.4442 43.7993 25.0455V19.652L43.8023 19.6489ZM38.3922 29.5844C38.3922 30.845 38.6311 31.8095 39.1056 32.4719C39.5802 33.1343 40.2599 33.4639 41.1447 33.4639C42.0296 33.4639 42.6634 33.1343 43.1379 32.4719C43.5819 31.8095 43.8023 30.848 43.8023 29.5844C43.8023 28.4489 43.5635 27.5484 43.0889 26.8891C42.5838 26.2573 41.901 25.9429 41.0498 25.9429C40.1987 25.9429 39.5771 26.2725 39.1026 26.9349C38.628 27.5667 38.3892 28.4489 38.3892 29.5844H38.3922Z" fill="currentColor"/>
              <path d="M47.7999 31.8064H51.027C51.0576 32.4382 51.2964 32.9114 51.7404 33.2258C52.215 33.5401 52.8487 33.6989 53.6387 33.6989C54.2081 33.6989 54.698 33.589 55.1083 33.3692C55.4879 33.1494 55.6778 32.8473 55.6778 32.4718C55.6778 31.9041 55.0134 31.4768 53.6846 31.1929C53.1151 31.0983 52.6865 31.0036 52.4017 30.909C50.7239 30.5 49.6002 30.0086 49.0308 29.4408C48.397 28.8731 48.0816 28.1161 48.0816 27.1699C48.0816 25.9703 48.5409 24.9783 49.4594 24.1877C50.4085 23.4613 51.6424 23.1011 53.161 23.1011C54.8052 23.1011 56.1187 23.4643 57.1015 24.1877C58.02 24.9752 58.5099 26.0008 58.5711 27.2645H56.5289C55.9288 27.2645 55.4696 26.9959 55.1512 26.4617C55.0256 26.3366 54.897 26.2084 54.7715 26.0832C54.3918 25.7994 53.8683 25.6559 53.2039 25.6559C52.5395 25.6559 52.0956 25.7505 51.7802 25.9398C51.4955 26.129 51.3515 26.4129 51.3515 26.7914C51.3515 27.295 52.1752 27.7223 53.8193 28.0703C54.0091 28.1344 54.1745 28.1802 54.3184 28.2107C54.4592 28.2412 54.5939 28.2596 54.7225 28.2596C56.3361 28.6686 57.4597 29.1417 58.0935 29.6789C58.6936 30.2466 58.9967 31.0036 58.9967 31.9499C58.9967 33.3387 58.4915 34.4101 57.4781 35.1671C56.5289 35.8599 55.1052 36.2079 53.207 36.2079C51.3087 36.2079 50.0595 35.8447 49.1747 35.1213C48.2561 34.3948 47.7969 33.3387 47.7969 31.9499V31.8064H47.7999Z" fill="currentColor"/>
            </svg>
          </div>
        </div>
        </div>
       <div class="main-sidenav-mobile-toggler" onclick="toggleMenuNav()">
          <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.5 7.5H19.5M1.5 1.5H19.5M7.5 13.5H19.5" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </div>
    <!-- Content Goes here -->
    <main class="main-content">
     <div class="main-sidenav-toggler" onclick="toggleMainSide(this)">
      <svg   class="locked" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.375 6.15375H13.5V4.5C13.5 3.57174 13.1313 2.6815 12.4749 2.02513C11.8185 1.36875 10.9283 1 10 1C9.07174 1 8.1815 1.36875 7.52513 2.02513C6.86875 2.6815 6.5 3.57174 6.5 4.5V6.15375H5.625C4.92881 6.15375 4.26113 6.43031 3.76884 6.92259C3.27656 7.41488 3 8.08256 3 8.77875V15.7787C3 16.4749 3.27656 17.1426 3.76884 17.6349C4.26113 18.1272 4.92881 18.4037 5.625 18.4037H14.375C15.0712 18.4037 15.7389 18.1272 16.2312 17.6349C16.7234 17.1426 17 16.4749 17 15.7787V8.77875C17 8.08256 16.7234 7.41488 16.2312 6.92259C15.7389 6.43031 15.0712 6.15375 14.375 6.15375ZM8.25 4.5C8.23823 4.02338 8.41577 3.56152 8.74375 3.2155C9.07173 2.86948 9.52344 2.66749 10 2.65375C10.4766 2.66749 10.9283 2.86948 11.2563 3.2155C11.5842 3.56152 11.7618 4.02338 11.75 4.5V6.15375H8.25V4.5ZM15.25 15.7787C15.25 16.0108 15.1578 16.2334 14.9937 16.3975C14.8296 16.5616 14.6071 16.6537 14.375 16.6537H5.625C5.39294 16.6537 5.17038 16.5616 5.00628 16.3975C4.84219 16.2334 4.75 16.0108 4.75 15.7787V8.77875C4.75 8.54669 4.84219 8.32413 5.00628 8.16003C5.17038 7.99594 5.39294 7.90375 5.625 7.90375H14.375C14.6071 7.90375 14.8296 7.99594 14.9937 8.16003C15.1578 8.32413 15.25 8.54669 15.25 8.77875V15.7787Z" fill="white"/>
        <path d="M10 9.65369C9.48083 9.65369 8.97331 9.80764 8.54163 10.0961C8.10995 10.3845 7.7735 10.7945 7.57482 11.2741C7.37614 11.7538 7.32415 12.2816 7.42544 12.7908C7.52673 13.3 7.77673 13.7677 8.14385 14.1348C8.51096 14.502 8.97869 14.752 9.48789 14.8532C9.99709 14.9545 10.5249 14.9026 11.0045 14.7039C11.4842 14.5052 11.8942 14.1687 12.1826 13.7371C12.471 13.3054 12.625 12.7979 12.625 12.2787C12.625 11.5825 12.3484 10.9148 11.8562 10.4225C11.3639 9.93025 10.6962 9.65369 10 9.65369ZM10 13.1537C9.82694 13.1537 9.65777 13.1024 9.51388 13.0062C9.36998 12.9101 9.25783 12.7734 9.19161 12.6135C9.12538 12.4536 9.10805 12.2777 9.14181 12.108C9.17558 11.9382 9.25891 11.7823 9.38128 11.66C9.50365 11.5376 9.65956 11.4543 9.8293 11.4205C9.99903 11.3867 10.175 11.4041 10.3348 11.4703C10.4947 11.5365 10.6314 11.6487 10.7275 11.7926C10.8237 11.9365 10.875 12.1056 10.875 12.2787C10.875 12.5108 10.7828 12.7333 10.6187 12.8974C10.4546 13.0615 10.2321 13.1537 10 13.1537Z" fill="white"/>
        </svg>
        <svg class="unlocked" width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.375 5.4H5.25V3.6C5.25 3.12261 5.43437 2.66477 5.76256 2.32721C6.09075 1.98964 6.53587 1.8 7 1.8C7.46413 1.8 7.90925 1.98964 8.23744 2.32721C8.56563 2.66477 8.75 3.12261 8.75 3.6C8.75 3.83869 8.84219 4.06761 9.00628 4.2364C9.17038 4.40518 9.39294 4.5 9.625 4.5C9.85706 4.5 10.0796 4.40518 10.2437 4.2364C10.4078 4.06761 10.5 3.83869 10.5 3.6C10.5 2.64522 10.1313 1.72955 9.47487 1.05442C8.8185 0.379285 7.92826 0 7 0C6.07174 0 5.1815 0.379285 4.52513 1.05442C3.86875 1.72955 3.5 2.64522 3.5 3.6V5.4H2.625C1.92881 5.4 1.26113 5.68446 0.768845 6.19081C0.276562 6.69716 0 7.38392 0 8.1V15.3C0 16.0161 0.276562 16.7028 0.768845 17.2092C1.26113 17.7155 1.92881 18 2.625 18H11.375C12.0712 18 12.7389 17.7155 13.2312 17.2092C13.7234 16.7028 14 16.0161 14 15.3V8.1C14 7.38392 13.7234 6.69716 13.2312 6.19081C12.7389 5.68446 12.0712 5.4 11.375 5.4ZM12.25 15.3C12.25 15.5387 12.1578 15.7676 11.9937 15.9364C11.8296 16.1052 11.6071 16.2 11.375 16.2H2.625C2.39294 16.2 2.17038 16.1052 2.00628 15.9364C1.84219 15.7676 1.75 15.5387 1.75 15.3V8.1C1.75 7.8613 1.84219 7.63239 2.00628 7.4636C2.17038 7.29482 2.39294 7.2 2.625 7.2H11.375C11.6071 7.2 11.8296 7.29482 11.9937 7.4636C12.1578 7.63239 12.25 7.8613 12.25 8.1V15.3Z" fill="currentColor"/>
          <path d="M7 9C6.48083 9 5.97331 9.15835 5.54163 9.45503C5.10995 9.75171 4.7735 10.1734 4.57482 10.6668C4.37614 11.1601 4.32415 11.703 4.42544 12.2267C4.52673 12.7505 4.77673 13.2316 5.14385 13.6092C5.51096 13.9868 5.97869 14.2439 6.48789 14.3481C6.99709 14.4523 7.52489 14.3988 8.00454 14.1945C8.4842 13.9901 8.89417 13.6441 9.18261 13.2C9.47105 12.756 9.625 12.234 9.625 11.7C9.625 10.9839 9.34844 10.2972 8.85616 9.79081C8.36387 9.28446 7.69619 9 7 9ZM7 12.6C6.82694 12.6 6.65777 12.5472 6.51388 12.4483C6.36998 12.3494 6.25783 12.2089 6.19161 12.0444C6.12538 11.88 6.10805 11.699 6.14181 11.5244C6.17558 11.3498 6.25891 11.1895 6.38128 11.0636C6.50365 10.9377 6.65956 10.852 6.8293 10.8173C6.99903 10.7826 7.17496 10.8004 7.33485 10.8685C7.49474 10.9366 7.63139 11.052 7.72754 11.2C7.82368 11.348 7.875 11.522 7.875 11.7C7.875 11.9387 7.78281 12.1676 7.61872 12.3364C7.45463 12.5052 7.23207 12.6 7 12.6Z" fill="currentColor"/>
          </svg>
    </div>
    <div class="main-sidenav-curve opend" >
      <svg width="53" height="1081" viewBox="0 0 53 1081" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M26.5 26.5C29.3 9.3 44.6667 2.33333 52 1H1V1080C17.5 1080 7.5 1079.5 51 1080C32.2 1075.6 26.8333 1059.5 26.5 1052V26.5Z" fill="currentColor" stroke="currentColor"/>
     </svg>
    </div>
        @include('include.msg')
        @yield('content')
    </main>
    <!-- Content Ends here -->

    <!-- Layout Footer Start -->
    <!-- <footer>
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted text-medium"><p>© {{ date("Y") }} <strong>{{env('APP_NAME')}}</strong>. {{__('User/layout.right-statement')}}</p></p>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
    <!-- Layout Footer End -->
</div>

<!-- Vendor Scripts Start -->
<script src="{{asset('user-assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('user-assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('user-assets/js/vendor/OverlayScrollbars.min.js')}}"></script>
<script src="{{asset('user-assets/js/vendor/autoComplete.min.js')}}"></script>
<script src="{{asset('user-assets/js/vendor/clamp.min.js')}}"></script>

<script src="{{asset('user-assets/js/vendor/glide.min.js')}}"></script>

<script src="{{asset('user-assets/js/vendor/Chart.bundle.min.js')}}"></script>

<script src="{{asset('user-assets/js/vendor/jquery.barrating.min.js')}}"></script>

<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="{{asset('user-assets/font/CS-Line/csicons.min.js')}}"></script>
<script src="{{asset('user-assets/js/base/helpers.js')}}"></script>
<script src="{{asset('user-assets/js/base/globals.js')}}"></script>
<script src="{{asset('user-assets/js/base/nav.js')}}"></script>
<script src="{{asset('user-assets/js/base/search.js')}}"></script>
<!--<script src="{{asset('user-assets/js/base/settings.js')}}"></script> -->

<script src="{{asset('user-assets/js/base/init.js')}}"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->
<script src="{{asset('user-assets/js/cs/glide.custom.js')}}"></script>
<script src="{{asset('user-assets/js/cs/charts.extend.js')}}"></script>
<script src="{{asset('user-assets/js/pages/dashboard.elearning.js')}}"></script>
<script src="{{asset('user-assets/js/common.js')}}"></script>
<script src="{{asset('user-assets/js/scripts.js')}}"></script>

<!-- Page Specific Scripts End -->

<script>
      let showExamesSide = false;
      let showMainSide = false;
      let showMenuSide = true;
      let isLocked = false;
      let html = document.querySelector('html');
      let mainsidenav = document.querySelector('.main-sidenav');
      let darkButton = document.querySelector('.dark-mode .dark');
      let lightButton = document.querySelector('.dark-mode .light');
      let toggleButton = document.querySelector(".main-sidenav-toggler");
      let sideCurve = document.querySelector(".main-sidenav-curve");
      let r = document.querySelector(':root');

      mainsidenav.addEventListener("mouseenter", ()=>{
        if(!isLocked && !mainsidenav.classList.contains("show-mobile") ){
          let rs = getComputedStyle(r);
          r.style.setProperty('--main-side-width', "360px");
          mainsidenav.classList.remove('collapsed');
        }

      })
      mainsidenav.addEventListener("mouseleave", ()=>{
        if(!isLocked && !mainsidenav.classList.contains("show-mobile") ) {
          let rs = getComputedStyle(r);
          r.style.setProperty('--main-side-width', "110px");
          mainsidenav.classList.add('collapsed');

        }

      })
      function toggleExamesSide() {
        if (showExamesSide) {
          document.documentElement.style.setProperty(
            '--exames-side-width',
            '0px'
          );
        } else {
          document.documentElement.style.setProperty(
            '--exames-side-width',
            '440px'
          );
        }
        showExamesSide = !showExamesSide;
      }
      function toggleMainSide(e) {
        toggleButton.classList.toggle("opend");
        sideCurve.classList.toggle("opend");
        isLocked = !isLocked
        if (isLocked) {
          // document.documentElement.style.setProperty(
          //   '--main-side-width',
          //   '110px'
          // );
          mainsidenav.classList.add('collapsed');
        } else {
          // document.documentElement.style.setProperty(
          //   '--main-side-width',
          //   '360px'
          // );
          // mainsidenav.classList.remove('collapsed');
        }
        // showMainSide = !showMainSide;
      }
      function toggleMenuNav() {
        mainsidenav.classList.remove('collapsed');

        if (showMenuSide) {
          mainsidenav.classList.add('show-mobile');
        } else {
          mainsidenav.classList.remove('show-mobile');
        }
        showMenuSide = !showMenuSide;
      }
      window.onload = function() {
        let darkMode = localStorage.getItem("darkMode");
        if (darkMode === "on") {
          setDarkMode();
        } else {
          setLightMode();
        }
      };
      function setDarkMode(){
        html.setAttribute("data-color", "dark-blue");
        darkButton.classList.add("active");
        lightButton.classList.remove("active");
        localStorage.setItem("darkMode", "on");
      }
      function setLightMode(){
        html.setAttribute("data-color", "light-blue");
        darkButton.classList.remove("active");
        lightButton.classList.add("active");
        localStorage.setItem("darkMode", "off");
      }
    </script>

@yield('jscode')


</body>
</html>
