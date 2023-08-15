@extends('layouts.layoutV3')


@section('seodata')

    @foreach(\App\Course::all() as $courseModel)
    @php
      $coursdetails = DB::table('course_details')->where('course_id',$courseModel->id)->first();
     @endphp
    <meta name="title" content="{{ $coursdetails->meta_title ?? ''  }}">
    <meta name="description" content="{{ $coursdetails->meta_description ?? ''  }}">
    <title>{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}</title>
    <meta property="og:title" content="{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="{{$courseModel->cover ?? ''}}"/>
    
    <meta name="twitter:site" content="{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}" />
    <meta name="twitter:card" content="">
    <meta name="twitter:title" content="{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}">
    <meta name="twitter:description" content="{{ $coursdetails->meta_description ?? ''  }}">
    <meta name="twitter:image" content="{{$courseModel->cover ?? ''}}">
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "article",
      "name": "{{ app()->getLocale() == 'en' ? $courseModel->title: Transcode::evaluate(\App\Course::find($courseModel->id))['title'] }}",
      "description": "{{ $coursdetails->meta_description ?? ''  }}",
      "provider": {
        "@type": "Organization",
        "name": "Eliteminds",
        "sameAs": "https://eliteminds.co"
      }
    }
    </script>
    
   @endforeach
    
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('layV3/style/certifione.css') }}">
    <style>
        .card-text{
         color:  #F2F2F2;
        font-size: 13px;
        font-family: Roboto;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.195px;
        display:flex;
        align-items:center;
        column-gap:10px;
        margin-bottom:0px;
     }
     /*Certification cards*/
     
.certificates{
     display:grid;
     grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
    justify-content: center;
     margin-top:64px;
    row-gap:48px;
    width:100%;
    
}
.cer-card{
    border-radius: 16px;
    border: 1px solid #F58634;
    background: #FAFAFA;
    max-width: 290px;
    overflow:hidden;
    display:grid;
    grid-template-rows: min-content 1fr;
    transition: all 0.3s ease-in-out;
    height:100%;
    margin: 0 auto;

}
.cer-card:hover{
    box-shadow: 4px 4px 5px #f5863461;

}
* {
font-family: "Roboto" !important;
}
.order{
    display:flex;
    justify-content:center;
}
.cer-header img{
    width:290px;
    height:170px;
}
.cer-logo {
    display:flex;
    justify-content:flex-end;
    align-items:center;
    margin-top: -28px;
    padding:0px 8px;
}
.cer-logo img{
    width:56px;
    height:56px;
    border-radius:50%;
}
.cer-body{
    padding:24px;
    padding-top:0px;
    display:flex;
    flex-direction:column;
    height:100%;
}
.cer-duration {
    display:flex;
    align-items:center;
    gap:8px;
}
.cer-duration span{
    color: #141522;
    font-size: 14px;
    font-weight: 600;
}
.cer-name {
    color: #F58634;
    font-size: 20px;
    font-weight: 700;
}
.cer-rating {
    display:flex;
    align-items:center;
}
.cer-rating span:first-of-type{
    color: #DF5F00;
    font-size: 14px;
    font-weight: 700;
    margin-right:4px;
}
.cer-rating span:last-of-type{
    color: #808080;
    font-size: 10px;
    font-weight: 400;
    margin-left:4px;
}
.cer-features{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap: 6px;
    margin-top:14px;

}
.cer-feature {
    display:flex;
    align-items:center;
    gap:8px;
}
.cer-feature span{
    color: #141522;
    font-size: 14px;
}
.cer-link{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:8px;
    margin-top:auto;
    
}
.cer-link{
    color: #F58634;
    font-size: 14px;
}
.cer-link:hover{
    color: #F58634 !important;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    
   
    
@endsection
@section('content')
    <!-- part 1 -->
        @php
            $setting = \App\AllSetting::where('id',1)->first();
         
        @endphp
        
        
    <div class="col-12 container marginTop">
        
       
        <div class="row col-12 d-flex">
            <div class="col-md-7 col-12">
                <h1 class="Roboto textGrey fw-bold h1">Certificates</h1>
                <p class="Roboto textGrey fw-lighter pe-5 fs-6 mb-5">
                   {!! $setting->allcertificates !!}
                </p>
            </div>
        </div>
    </div>

    <!-- part2 -->
    <div class="col-12 container py-5 flex-column">
        <div class="col-12 d-flex justify-content-center align-items-center flex-column">
            <!-- search -->
            <form class="col-12">
                <div class="mb-3 col-12">
                    <input type="search" class="form-control col-12 py-3" id="search" aria-describedby="search"
                        name="search" placeholder="Search in certificates" />
                </div>
            </form> 
            <!-- card s -->
             <div class="certificates">
                @foreach($courses_details as $coursdetails)
                    @php
                        $coursename = \App\Course::where('id',$coursdetails->course_id)->first();
                        $usercourseId = 0;
                    @endphp
                    
                    @if($coursdetails->slug != null)
                    @php
                    foreach($usercourses as $usercourse)
                        {
                            if($usercourse->course_id == $coursdetails->course_id)
                            {
                                $usercourseId = $usercourse->user_packages;
                            }
                        }
                        
                        $reviewcounter = DB::table('reviews')->where('course_id',$coursdetails->course_id)->count();
                    @endphp
                    
                    <!--new card-->
                          <a class="cer-card" href="{{route('package.by.course' , $coursdetails->slug) }}">
                            <div class="cer-header" >
                                <img src="{{asset('/images/certificate/courseimage/' . $coursdetails->courseimage)}}" alt=""/>
                                <div class="cer-logo">
                                    <img src="{{asset('/images/certificate/logo/' . $coursdetails->certificatelogo)}}" alt=""/>
                                 </div>
                            </div>

                            <div class="cer-body">
                                <div class="cer-duration">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6666 8.61003C14.6666 12.29 11.6799 15.2767 7.99992 15.2767C4.31992 15.2767 1.33325 12.29 1.33325 8.61003C1.33325 4.93003 4.31992 1.94336 7.99992 1.94336C11.6799 1.94336 14.6666 4.93003 14.6666 8.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.4734 10.73L8.40675 9.4967C8.04675 9.28337 7.75342 8.77003 7.75342 8.35003V5.6167" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>
                                        {{$coursdetails->numberhour}} Contact Hours
                                    </span>
                                </div>
                                <h3 class="cer-name">{{ $coursename->title }} </h3>
                                <div class="cer-rating">
                                    <span>{{$coursdetails->courserate}}</span>
                                     @php
                                        $star = ceil($coursdetails->courserate);
                                        $nonstar = 5-ceil($coursdetails->courserate);
                                    @endphp
                                    @for($i=1;$i<=$star;$i++)
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>
                                    </svg>
                                    @endfor
                                    @for($i=1;$i<=$nonstar;$i++)
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#F2F2F2" />
                                        </svg>
                                    @endfor
                                    <!--<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--    <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>-->
                                    <!--</svg>-->
                                    <!--<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--    <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>-->
                                    <!--</svg>-->
                                    <!--<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--    <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>-->
                                    <!--</svg>-->
                                    <!--<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                    <!--    <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>-->
                                    <!--</svg>-->
                                    <span>{{ $coursdetails->coursereviews + $reviewcounter }}</span>
                                </div>
    
                                <div class="cer-features"> 
                                    <div class="cer-feature">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.99992 15.2767H9.99992C13.3333 15.2767 14.6666 13.9434 14.6666 10.61V6.61003C14.6666 3.27669 13.3333 1.94336 9.99992 1.94336H5.99992C2.66659 1.94336 1.33325 3.27669 1.33325 6.61003V10.61C1.33325 13.9434 2.66659 15.2767 5.99992 15.2767Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.5 6.60986H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.5 10.6099H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>{{$coursdetails->numberlecture}}  {{__('messages.Lecture')}}</span>
                                    </div>
        
                                    <div class="cer-feature">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.33325 8.74316H9.99992" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.33325 11.4097H8.25325" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.66659 4.61003H9.33325C10.6666 4.61003 10.6666 3.94336 10.6666 3.27669C10.6666 1.94336 9.99992 1.94336 9.33325 1.94336H6.66659C5.99992 1.94336 5.33325 1.94336 5.33325 3.27669C5.33325 4.61003 5.99992 4.61003 6.66659 4.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.6667 3.29004C12.8867 3.41004 14 4.23004 14 7.27671V11.2767C14 13.9434 13.3333 15.2767 10 15.2767H6C2.66667 15.2767 2 13.9434 2 11.2767V7.27671C2 4.23671 3.11333 3.41004 5.33333 3.29004" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>{{$coursdetails->numberexam}} Exams</span>
                                    </div>
                                    <div class="cer-feature">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.00008 8.61003C9.84103 8.61003 11.3334 7.11764 11.3334 5.27669C11.3334 3.43574 9.84103 1.94336 8.00008 1.94336C6.15913 1.94336 4.66675 3.43574 4.66675 5.27669C4.66675 7.11764 6.15913 8.61003 8.00008 8.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.7268 15.2765C13.7268 12.6965 11.1601 10.6099 8.0001 10.6099C4.8401 10.6099 2.27344 12.6965 2.27344 15.2765" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span> {{$coursdetails->numberstudent + $usercourseId}} Students</span>
                                    </div>
                                </div>
                                <span   class="cer-link" >
                                    More details 
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.61992 13.1566C9.49325 13.1566 9.36658 13.1099 9.26658 13.0099C9.07325 12.8166 9.07325 12.4966 9.26658 12.3033L12.9599 8.60994L9.26658 4.91661C9.07325 4.72327 9.07325 4.40327 9.26658 4.20994C9.45992 4.01661 9.77992 4.01661 9.97325 4.20994L14.0199 8.25661C14.2132 8.44994 14.2132 8.76994 14.0199 8.96327L9.97325 13.0099C9.87325 13.1099 9.74658 13.1566 9.61992 13.1566Z" fill="#F58634"/>
                                        <path d="M13.5533 9.10986H2.33325C2.05992 9.10986 1.83325 8.8832 1.83325 8.60986C1.83325 8.33653 2.05992 8.10986 2.33325 8.10986H13.5533C13.8266 8.10986 14.0533 8.33653 14.0533 8.60986C14.0533 8.8832 13.8266 9.10986 13.5533 9.10986Z" fill="#F58634"/>
                                    </svg>
                                </span>
                            </div>
                        </a>

                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    <script src="{{ asset('layV3/script/certificateOne.js') }}"></script>
    <script src="{{ asset('layV3/script/navbarFixScript.js') }}"></script>
@endsection
