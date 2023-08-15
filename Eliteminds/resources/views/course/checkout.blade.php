@extends('layouts.layoutV3')
@section('css')
<style>
.cer-card{
    border-radius: 16px;
    border: 1px solid #F58634;
    background: #FAFAFA;
    max-width: 290px;
    overflow:hidden;
    margin-top:64px;
    display:grid;
    grid-template-rows: min-content 1fr;
    transition: all 0.3s ease-in-out;
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
@endsection

@php
    $quizzes = 0;
    $exams_number = 0;
@endphp
@if (
    !(Auth::check() &&
        \App\UserPackages::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $i->package->id)->get()->first() &&
        !\App\PaymentApprove::where('user_id', '=', Auth::user()->id)->where('package_id', '=', $i->package->id)->get()->first()
    ))
    @php
        $show_enroll = 1;
        $lastPayment = session('lastPayment', null);
        if ($lastPayment) {
            if ($lastPayment->addMinutes(15)->lte(\Carbon\Carbon::now())) {
                $show_enroll = 1;
            } else {
                $show_enroll = 0;
            }
        }
    @endphp
@else
    @php
        $show_enroll = 0;
    @endphp
@endif
@section('css')
    <link rel="stylesheet" href="{{ asset('layV3/style/checkout.css') }}">
    <style>
        .blogItemFix img {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- part 1 -->
    <section id="app-1">
        <div class="col-12 container marginTop">
            <div class="row col-12 d-flex">
                <h1 class="Roboto textGrey fw-bold h1">Checkout</h1>
            </div>
        </div>
        @php
       
        $coursename = \App\Course::where('id',$i->package->course_id)->first();
         $usercourseId = 0;
           $coursdetails = DB::table('course_details')->where('course_id',$coursename->id)->first();
           foreach($usercourses as $usercourse)
            {
                if($usercourse->course_id == $coursdetails->course_id)
                {
                    $usercourseId = $usercourse->user_packages;
                }
            }
            
            $reviewcounter = DB::table('reviews')->where('course_id',$i->package->course_id)->count();
            
        @endphp
        <!-- part 2 -->
        <div class="col-12 container my-5">
            <div class="row">
                <div class="col-md-7 col-12 ps-5">
                    <!-- <p class="Roboto textGrey fw-normal fs-5">Payment address</p>
                <form action="col-md-2 col-6 ">
                  <select
                    class="form-select w-25 textPlacholder py-2 rounded-3"
                    aria-label="Default select example"
                  >
                    <option selected>Jordan</option>
                    <option value="1">Jordan</option>
                    <option value="2">Jordan</option>
                    <option value="3">Jordan</option>
                  </select>
                  <small class="Roboto fw-lighter textPlacholder"
                    >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </small>
                </form> -->
                    <p class="Roboto textGrey fw-normal fs-5">Payment method</p>

                    <div class="form-check lightBg py-3 rounded-4 mb-2">
                        {{-- <input class="ms-1" v-model="method" type="radio" name="flexRadioDefault" id="Credit"
                            value="cread" /> --}}
                        <label class="form-check-label" for="Credit">
                            <svg width="34" height="24" viewBox="0 0 34 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M34 3.64787C34 2.13265 32.7804 0.913086 31.2652 0.913086H2.73478C1.21957 0.913086 0 2.13265 0 3.64787V20.3892C0 21.8674 1.21957 23.087 2.73478 23.087H31.3022C32.8174 23.087 34.037 21.8674 34.037 20.3522V3.64787H34ZM31.0435 3.86961V6.45656H2.95652V3.86961H31.0435ZM2.95652 20.1305V10.8913H31.0435V20.1305H2.95652ZM28.2717 15.3261C28.2717 16.1392 27.6065 16.8044 26.7935 16.8044H19.7717C18.9587 16.8044 18.2935 16.1392 18.2935 15.3261C18.2935 14.5131 18.9587 13.8479 19.7717 13.8479H26.7935C27.6065 13.8479 28.2717 14.5131 28.2717 15.3261Z"
                                    fill="#4B4B4D" />
                            </svg>
                            Credit/Debut Card
                        </label>
                    </div>
                    <div class="form-check lightBg py-3 rounded-4 mt-2">
                        {{-- <input v-model="method" class="ms-1" type="radio" name="flexRadioDefault" id="PayPal"
                            value="paypal" /> --}}
                        <label class="form-check-label" for="PayPal">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.4102 22.6588L10.3965 22.7463C10.3508 23.007 10.2146 23.2433 10.0117 23.4135C9.80888 23.5836 9.55247 23.6767 9.28772 23.6763H6.12522C5.9631 23.6763 5.80292 23.641 5.65584 23.5728C5.50875 23.5047 5.37831 23.4052 5.27359 23.2815C5.16887 23.1577 5.0924 23.0126 5.0495 22.8563C5.00661 22.6999 4.99832 22.5361 5.02522 22.3762L8.21272 3.43125C8.25621 3.17096 8.39062 2.93452 8.59203 2.76401C8.79345 2.59349 9.04882 2.49994 9.31272 2.5H17.9627C18.6426 2.49984 19.3158 2.6336 19.944 2.89366C20.5721 3.15372 21.1429 3.53497 21.6237 4.01565C22.1045 4.49632 22.4859 5.067 22.7461 5.6951C23.0063 6.32319 23.1402 6.99639 23.1402 7.67625C23.1402 8.0175 23.119 8.35125 23.0777 8.68125C23.6692 9.10063 24.1515 9.65568 24.4843 10.2999C24.8171 10.9441 24.9905 11.6587 24.9902 12.3837C24.9902 14.2803 24.237 16.0992 22.8962 17.4404C21.5554 18.7817 19.7367 19.5356 17.8402 19.5362H17.1115C16.2952 19.5362 15.5977 20.1263 15.4615 20.9325L15.069 23.27L15.4615 20.9325C15.5271 20.5423 15.7288 20.1879 16.0309 19.9323C16.3329 19.6767 16.7158 19.5364 17.1115 19.5362H17.839C19.7359 19.5362 21.5552 18.7827 22.8966 17.4413C24.2379 16.1 24.9915 14.2807 24.9915 12.3837C24.9918 11.6587 24.8183 10.9441 24.4855 10.2999C24.1528 9.65568 23.6705 9.10063 23.079 8.68125C22.8339 10.6535 21.8766 12.4682 20.3872 13.7841C18.8978 15.0999 16.9789 15.8262 14.9915 15.8263H12.5752C12.3127 15.8266 12.0573 15.9122 11.8476 16.0702C11.638 16.2283 11.4853 16.4502 11.4127 16.7025L9.96897 25.28C9.86897 25.88 10.3302 26.425 10.9377 26.425H13.7052C13.9374 26.425 14.1621 26.3428 14.3394 26.1929C14.5167 26.043 14.6353 25.8352 14.674 25.6063L15.0677 23.2687L14.674 25.6063C14.6353 25.8352 14.5167 26.043 14.3394 26.1929C14.1621 26.3428 13.9374 26.425 13.7052 26.425H10.939C10.7962 26.4254 10.655 26.3945 10.5254 26.3344C10.3959 26.2744 10.281 26.1867 10.189 26.0775C10.0964 25.9686 10.0289 25.8408 9.99111 25.703C9.95331 25.5652 9.94618 25.4208 9.97022 25.28L10.4102 22.6588Z"
                                    fill="#4B4B4D" />
                                <path
                                    d="M24.3123 9.99365C24.7685 10.7024 25.0348 11.5462 25.0348 12.4524C25.0348 13.3917 24.8498 14.3218 24.4903 15.1895C24.1309 16.0573 23.604 16.8458 22.9399 17.51C22.2757 18.1742 21.4872 18.701 20.6194 19.0605C19.7516 19.4199 18.8216 19.6049 17.8823 19.6049H17.156C16.3385 19.6049 15.641 20.1949 15.506 21.0012L14.7185 25.6749C14.6799 25.9036 14.5615 26.1113 14.3845 26.2611C14.2074 26.411 13.983 26.4934 13.751 26.4937H11.216L12.6535 17.9524C12.801 17.4399 13.2723 17.0774 13.816 17.0774H16.231C18.2079 17.0774 20.1173 16.3589 21.6038 15.0557C23.0903 13.7525 24.0524 11.9535 24.311 9.99365H24.3123ZM11.216 26.4937H10.9823C10.8395 26.4936 10.6985 26.4625 10.569 26.4024C10.4395 26.3423 10.3246 26.2547 10.2324 26.1458C10.1402 26.0368 10.0729 25.909 10.0351 25.7713C9.99727 25.6337 9.98992 25.4894 10.0135 25.3487L10.0848 24.9262H10.5285C10.7929 24.9263 11.0489 24.8333 11.2514 24.6635C11.454 24.4936 11.5902 24.2577 11.636 23.9974L11.651 23.9099L11.216 26.4937Z"
                                    fill="#4B4B4D" />
                            </svg>
                            PayPal
                        </label>


                    
                       

                    </div>

                    <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <!-- Close -->
                                    <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close" style="line-height: unset;">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                    <!-- Heading -->
                                    <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
                                        Payment
                                    </h2>

                                    <!-- Text -->
                                    <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
                                        Choose Payment Method
                                    </p>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                                <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png">
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                                <img src="{{asset('img/visa-master.jpg')}}" width="100px">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="alert alert-danger" v-if="error != ''">@{{ error }}</p>
                                            <p v-if="error == ''">
                                            <p v-if="discount > 0">
                                                Coupon Code: @{{coupon}}
                                                <b v-if="discount > 0" style="color:green;">Valid</b>
                                                <b v-if="discount <= 0" style="color:green;">Expired</b><br>
                                            </p>

                                            Price: @{{price}} $<br>
                                            <p v-if="discount > 0">
                                                Discount: @{{discount}} $<br>
                                                <b style="text-decoration: underline; color: green;">{{__('Public/package.new-price')}}: @{{newPrice}} $</b>
                                            </p>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                            <p v-if="auth == 0" style="color:red;">Please Login so you can pay with credit card ! </p>

                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <p class="alert alert-danger" v-if="error != ''">@{{ error }}</p>

                                            <p v-if="discount > 0">
                                                Coupon Code: @{{coupon}}
                                                <b v-if="discount > 0" style="color:green;">Valid</b>
                                                <b v-if="discount <= 0" style="color:green;">Expired</b><br>
                                            </p>

                                            Price: @{{price}} $<br>
                                            <p v-if="discount > 0">
                                                Discount: @{{discount}} $<br>
                                                <b style="text-decoration: underline; color: green;">New Price: @{{newPrice}} $</b>
                                            </p>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button @click="paytabs_charge" class="btn btn-primary">Pay Now</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="Roboto textGrey fw-normal fs-5 mt-5">Order details</p>

                    <!--<div class="col-sm-6 col-12">-->
                    <!--    <div class="card borderwarning bgorange rounded-4">-->
                    <!--        <div class="card-body">-->
                    <!--            <p class="Roboto textGrey fw-bold">-->
                    <!--                {{ Transcode::evaluate($i->package)['name'] }}-->
                    <!--            </p>-->
                    <!--            {{-- <small class="Roboto text-white fw-bold">(PMI PBA)</small> --}}-->
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
                    <!--                    {{$total_videos_num}} Lecture-->
                    <!--                </p>-->
                    <!--                <div class="row justify-content-between col-12">-->
                    <!--                    <p class="card-text col-md-6 fs-6 fw-lighter">-->
                    <!--                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"-->
                    <!--                            xmlns="http://www.w3.org/2000/svg">-->
                    <!--                            <circle cx="14.5" cy="14.5" r="13.5" stroke="#F58634"-->
                    <!--                                stroke-width="2" />-->
                    <!--                            <path d="M14.5 6.41162V15.9704H23.3235" stroke="#F58634"-->
                    <!--                                stroke-width="3" />-->
                    <!--                            <circle cx="14.5001" cy="15.9705" r="2.20588" fill="#F58634" />-->
                    <!--                        </svg>-->
                    <!--                        {{$package_total_video_time[0]}} Hour-->
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
                    <!--            {{-- <a href="" class="d-flex justify-content-center align-items-center aMore">-->
                    <!--                More Details-->
                    <!--                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"-->
                    <!--                    xmlns="http://www.w3.org/2000/svg" class="ms-2">-->
                    <!--                    <path d="M1 8H15.5M15.5 8L8.5 15M15.5 8L8.5 1" stroke="#F2F2F2" stroke-width="2"-->
                    <!--                        stroke-linecap="round" stroke-linejoin="round" />-->
                    <!--                </svg>-->
                    <!--            </a> --}}-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    <div class="row w-100" style="margin-bottom: 70px;">
                    
                    <!--new card-->
                      <div class="col-12 ">
                          <a class="cer-card" >
                            <div class="cer-header" >
                                <img src="{{asset('/images/certificate/courseimage/'. $coursdetails->courseimage)}}" alt=""/>
                                <div class="cer-logo">
                                    <img src="{{asset('/images/certificate/logo/'. $coursdetails->certificatelogo)}}" alt=""/>
                                 </div>
                            </div>

                            <div class="cer-body">
                                <div class="cer-duration">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6666 8.61003C14.6666 12.29 11.6799 15.2767 7.99992 15.2767C4.31992 15.2767 1.33325 12.29 1.33325 8.61003C1.33325 4.93003 4.31992 1.94336 7.99992 1.94336C11.6799 1.94336 14.6666 4.93003 14.6666 8.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.4734 10.73L8.40675 9.4967C8.04675 9.28337 7.75342 8.77003 7.75342 8.35003V5.6167" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>
                                        {{ $coursdetails->numberhour }} Contact Hours
                                    </span>
                                </div>
                                <h3 class="cer-name">{{ $coursename->title }} </h3>
                                <div class="cer-rating">
                                    <span>{{ $coursdetails->courserate }}</span>
                                     @php
                                        $star = ceil($coursdetails->courserate);
                                        $nonstar = 5-ceil($coursdetails->courserate);
                                    @endphp
                                    @for($ix=1;$ix<=$star;$ix++)
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 2.60986L9.62229 6.37698L13.7063 6.75576L10.6249 9.46275L11.5267 13.464L8 11.3699L4.47329 13.464L5.37508 9.46275L2.29366 6.75576L6.37771 6.37698L8 2.60986Z" fill="#FFBB54"/>
                                    </svg>
                                    @endfor
                                    @for($ix=1;$ix<=$nonstar;$ix++)
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
                                        <span>{{ $coursdetails->numberlecture }}  {{__('messages.Lecture')}}</span>
                                    </div>
        
                                    <div class="cer-feature">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.33325 8.74316H9.99992" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.33325 11.4097H8.25325" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.66659 4.61003H9.33325C10.6666 4.61003 10.6666 3.94336 10.6666 3.27669C10.6666 1.94336 9.99992 1.94336 9.33325 1.94336H6.66659C5.99992 1.94336 5.33325 1.94336 5.33325 3.27669C5.33325 4.61003 5.99992 4.61003 6.66659 4.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.6667 3.29004C12.8867 3.41004 14 4.23004 14 7.27671V11.2767C14 13.9434 13.3333 15.2767 10 15.2767H6C2.66667 15.2767 2 13.9434 2 11.2767V7.27671C2 4.23671 3.11333 3.41004 5.33333 3.29004" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>{{ $coursdetails->numberexam }} Exams</span>
                                    </div>
                                    <div class="cer-feature">
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.00008 8.61003C9.84103 8.61003 11.3334 7.11764 11.3334 5.27669C11.3334 3.43574 9.84103 1.94336 8.00008 1.94336C6.15913 1.94336 4.66675 3.43574 4.66675 5.27669C4.66675 7.11764 6.15913 8.61003 8.00008 8.61003Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.7268 15.2765C13.7268 12.6965 11.1601 10.6099 8.0001 10.6099C4.8401 10.6099 2.27344 12.6965 2.27344 15.2765" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span> {{ $coursdetails->numberstudent + $usercourseId }} Students</span>
                                    </div>
                                </div>
                                
                            </div>
                        </a>
                    </div>
                

            </div>
                    
                </div>
                <div class="col-md-5 col-12 px-5 mt-5 mt-md-0">
                    <div class="LightBlueBg col-12 rounded-3 p-3">
                        <p class="Roboto textGrey fw-normal fs-5">Summary</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="Roboto textPlacholder fw-normal fs-6">
                                Original Price
                            </p>
                            <p class="Roboto textGrey fw-normal fs-6">{{$pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}</p>
                        </div>
                        <hr style="border-bottom: 1px solid #d8d8d8" />
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="Roboto textPlacholder fw-normal fs-6">Total</p>
                             @if($pricing['localized_coupon_discount']>0)
                                    <p class="Roboto textGrey fw-normal fs-6">{{ $pricing['localized_original_price'] }} {{$pricing['currency_code']}}</p>
                            @else
                              <p class="Roboto textGrey fw-normal fs-6">{{$pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}</p>
                                {{-- <small style="text-decoration: line-through;">{{ $pricing['localized_original_price'] }} {{$pricing['currency_code']}}</small> --}}
                                @endif
                            
                        </div>
                        {{-- <div class="d-flex justify-content-center align-items-center flex-column mb-5">
                            <p v-if="auth == 0" style="color:red;">Please Login to Complete Checkout ! </p>
                            <button v-if=" method == 'paypal'"
                                class="btn bgorange btnorange text-white text-center Roboto fs-6 mb-2">
                                Complete Checkout
                            </button>
                            <button v-if="method == 'cread'" @click="paytabs_charge"
                                class="btn bgorange btnorange text-white text-center Roboto fs-6 mb-2">
                                Complete Checkout
                            </button>
                        </div> --}}
                            @if($show_enroll)
                            <form action="{{route('paytabs.charge')}}" method="GET">
                                <div class="form-group my-2">
                                    <label for="coupon_">Coupon: </label>
                                    <input type="text" id="coupon_" v-model="coupon" name="coupon" class="form-control py-2 px-1">
                                    <input type="hidden" name="item_id" value="{{$i->package->id}}">
                                    <input type="hidden" name="item_type" value="package">
                                </div>
                                <div class="info-btn" style="text-align: center">
                                     {{-- <button v-on:click="regenerate_price" 
                                >
                                Complete Checkout
                            </button> --}}
                                    <a href="javascript:;"  v-on:click="regenerate_price"  data-bs-toggle="modal" data-bs-target="#paymentModel" class="btn bgorange btnorange text-white text-center Roboto fs-6 mb-2">Enroll Now</a>
                                </div>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- part3 -->
    </section>
@endsection



@section('js')
    <script src="{{ asset('layV3/script/navbarFixScript.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>-->
    <script src="https://www.paypal.com/sdk/js?client-id={{ \App\PaypalConfig::all()->first()->client_id }}"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        @if (session('success'))
            swal({
                title: '{{ session('success') }}',
                type: 'success',
                //   confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ok',
            });
        @endif


        function pauseVid(vid) {
            var iframe = document.getElementById(vid);
            var player = new Vimeo.Player(iframe);
            player.pause();

        }

        function runVideo(run_vid) {
            // pauseVid(stop_vid);


            if (run_vid) {
                var iframe = document.getElementById(run_vid);
                var player = new Vimeo.Player(iframe);
                player.play();
            }

        }

        var app = new Vue({

            el: '#app-1',
            data: {
                method: '',
                paypalmeth: false,
                error: '',
                publicKey: '{{ config('tap.TAPpublicKey') }}',
                package_id: {{ $i->package->id }},
                paymentMethod: 'null',
                coupon: '{{ Illuminate\Support\Facades\Input::get('coupon') }}',
                price: 0,
                discount: 0,
                newPrice: 0,
                visa_generated: 0,
                auth: @if (Auth::check())
                    1
                @else
                    0
                @endif

            },
            methods: {
                getVideo: function(video_id) {
                    document.getElementById('videoContainer').innerHTML = '<p class="mx-auto">Loading...</p>';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('public.package.view.video') }}',
                        data: {
                            video_id,
                        },
                        success: function(res) {
                            if (res)
                                document.getElementById('videoContainer').innerHTML = res['html'];
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                },
                tapTokenHandler: function(token, coupon, package_id) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('form-container');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'tapToken');
                    hiddenInput.setAttribute('value', token);
                    form.appendChild(hiddenInput);

                    var coupon_ = document.createElement('input');
                    coupon_.setAttribute('type', 'hidden');
                    coupon_.setAttribute('name', 'coupon');
                    coupon_.setAttribute('value', coupon);
                    form.appendChild(coupon_);

                    var pacakge_id_ = document.createElement('input');
                    pacakge_id_.setAttribute('type', 'hidden');
                    pacakge_id_.setAttribute('name', 'item_id');
                    pacakge_id_.setAttribute('value', package_id);
                    form.appendChild(pacakge_id_);

                    var item_type = document.createElement('input');
                    item_type.setAttribute('type', 'hidden');
                    item_type.setAttribute('name', 'item_type');
                    item_type.setAttribute('value', 'package');
                    form.appendChild(item_type);
                    // Submit the form
                    form.submit();
                },
                showReplyForm: function(form_id) {
                    $('#' + form_id).toggle();
                },
                payModel: function(package_id) {
                    this.package_id = package_id;
                },
                regenerate_price: function() {


                    if (!this.auth) {
                        window.location.replace('{{ route('login') }}');
                    }

                    Data = {
                        package_id: app.package_id,
                        coupon_code: app.coupon,
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('price.details') }}',
                        data: Data,
                        success: function(res) {
                       

                            if (res.error == '') {

                                app.price = Number(res.price);
                                app.discount = Number(res.discount);

                                if (app.price > app.discount) {
                                    app.newPrice = app.price - app.discount;
                                } else {

                                    app.newPrice = 0;
                                }


                                if (app.newPrice > 0 && app.visa_generated == 0 && app.auth == 1) {
                                    /** setup paypal **/
                                    paypal.Buttons({
                                        createOrder: function(data, actions) {
                                            // Set up the transaction

                                            return actions.order.create({
                                                application_context: {
                                                    locale: 'en-US',
                                                },

                                                purchase_units: [{
                                                    amount: {
                                                        currency_code: 'USD',
                                                        value: app
                                                            .newPrice
                                                    }
                                                }],
                                            });
                                        },
                                        onApprove: function(data, actions) {

                                            console.log(data);
                                            return actions.order.capture().then(
                                                function(details) {


                                                    Data = {
                                                        orderID: data.orderID,
                                                        payer_id: details.payer
                                                            .payer_id,
                                                        paypalEmail: details
                                                            .payer
                                                            .email_address,
                                                        countryCode: details
                                                            .payer.address
                                                            .country_code,
                                                        totalPaid: details
                                                            .purchase_units[0]
                                                            .amount.value,
                                                        paymentID: details
                                                            .purchase_units[0]
                                                            .payments.captures[
                                                                0].id,
                                                        package_id: app
                                                            .package_id,
                                                        coupon: app.coupon

                                                    };


                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        }
                                                    });

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '{{ route('confirmPaymentMethod2') }}',
                                                        data: Data,
                                                        success: function(
                                                            res) {
                                                            if (res ==
                                                                0) {
                                                                swal({
                                                                        title: 'Payment Complete Successfully !',
                                                                        type: 'success',
                                                                        //   confirmButtonColor: '#DD6B55',
                                                                        confirmButtonText: 'Ok',
                                                                    })
                                                                    .then(
                                                                        function() {
                                                                            window
                                                                                .location =
                                                                                '{{ route('my.package.view') }}';
                                                                        }
                                                                        );
                                                            } else {
                                                                swal({
                                                                        title: res,
                                                                        type: 'success',
                                                                        //   confirmButtonColor: '#DD6B55',
                                                                        confirmButtonText: 'Ok',
                                                                    })
                                                                    .then(
                                                                        function() {
                                                                            window
                                                                                .location =
                                                                                '{{ route('my.package.view') }}';
                                                                        }
                                                                        );
                                                            }


                                                        },
                                                        error: function(
                                                        res) {
                                                            console.log(
                                                                'Error:',
                                                                res);
                                                        }
                                                    });


                                                });
                                        }
                                    }).render('#paypal-button-container');
                                    app.visa_generated = 1;
                                }


                                if (app.newPrice <= 0) {
                                    $("#paypal-button-container").hide();
                                } else {
                                    $("#paypal-button-container").show();
                                }
                            }
                            app.error = res.error;

                        },
                        error: function(res) {
                            console.log('Error:', res);
                        }
                    });



                },
                redirect_pay: function() {
                    Data = {
                        package_id: app.package_id,
                        coupon_code: app.coupon,
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('generate.payment.link') }}',
                        data: Data,
                        success: function(res) {
                            window.location.href = res;

                        },
                        error: function(res) {
                            console.log('Error:', res);
                        }
                    });



                },
                selectPaymentMethod: function() {
                    if (this.paymentMethod == 'paypal') {
                        $("#paypal_form").show();
                        $("#check_form").hide();
                    } else {
                        $("#paypal_form").hide();
                        $("#check_form").show();
                    }
                },
                paytabs_charge: function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('paytabs.charge') }}',
                        data: {
                            item_id: app.package_id,
                            item_type: 'package',
                            coupon_code: app.coupon,
                        },
                        success: function(res) {
                      
                            if (res.error == '') {
                                window.location.replace(res.url);
                                
                            } else {
                                // console.log(res);
                                swal({
                                    title: res.error,
                                    type: 'error',
                                    //   confirmButtonColor: '#DD6B55',
                                    confirmButtonText: 'Ok',
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
            }
        });
    </script>
@endsection
