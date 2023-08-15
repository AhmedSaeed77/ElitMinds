
@extends('layouts.layoutV3')
@section('css')
<link rel="stylesheet" href="{{asset('layV3/style/styleContact.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/global/plugins.bundle.js"></script>
    
@endsection

@section('content')

<section id="app-1" class="conactUs-wrapper">
  <div class="illustration">
    <img src="{{asset('index-assets/images/contactus/fun-3d-cartoon-illustration-indian-businessman.png')}}" alt="">
  </div>
  <div class="contactUs">
    <h1 class="contactUs-title">Contact us</h1>
    <ul class="contacts">
      <li>
        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15.309 12.5849C15.0458 12.4517 13.7642 11.8263 13.5247 11.737C13.2851 11.6517 13.1112 11.6071 12.9367 11.8702C12.766 12.1268 12.2633 12.7142 12.1098 12.8855C11.9562 13.0568 11.8053 13.0699 11.5461 12.9537C11.2829 12.8205 10.4423 12.5468 9.44409 11.6517C8.66447 10.9581 8.14538 10.1036 7.99116 9.84047C7.83759 9.58059 7.97409 9.43359 8.10403 9.30366C8.22347 9.18422 8.36719 9.00309 8.50041 8.84559C8.62706 8.68809 8.66775 8.58244 8.76028 8.41181C8.84559 8.22741 8.80163 8.08369 8.73666 7.95375C8.67169 7.82381 8.14866 6.53559 7.93012 6.02241C7.72144 5.51316 7.50291 5.57812 7.34212 5.57812C7.19184 5.56434 7.01728 5.56434 6.84338 5.56434C6.66947 5.56434 6.38531 5.62931 6.14578 5.87869C5.90625 6.14184 5.22966 6.77053 5.22966 8.04234C5.22966 9.31744 6.16612 10.5512 6.29606 10.7356C6.42928 10.9062 8.13816 13.5312 10.7599 14.6593C11.3853 14.9225 11.8709 15.08 12.2502 15.2099C12.8756 15.4081 13.4466 15.3805 13.8974 15.3156C14.3962 15.2335 15.4422 14.6829 15.6614 14.068C15.8839 13.4492 15.8839 12.9367 15.8189 12.8205C15.7539 12.7011 15.5833 12.6361 15.3202 12.5199L15.309 12.5849ZM10.5545 19.0312H10.5407C8.98866 19.0312 7.45434 18.6106 6.11428 17.8244L5.79994 17.6367L2.51869 18.4912L3.40069 15.2985L3.18872 14.9704C2.32378 13.5929 1.86244 12.0035 1.86244 10.3701C1.86244 5.60569 5.76253 1.71937 10.561 1.71937C12.8855 1.71937 15.0662 2.625 16.7068 4.26562C18.3474 5.89247 19.2531 8.07319 19.2531 10.3838C19.2465 15.1449 15.3497 19.0312 10.5577 19.0312H10.5545ZM17.9543 3.01809C15.958 1.09003 13.333 0 10.5407 0C4.78144 0 0.091875 4.66922 0.0885938 10.4075C0.0885938 12.2397 0.567 14.0273 1.48312 15.6096L0 21L5.544 19.5543C7.07175 20.3779 8.79112 20.8189 10.5413 20.8222H10.5446C16.3072 20.8222 20.9967 16.1529 21 10.4108C21 7.63219 19.9165 5.01703 17.9412 3.05156L17.9543 3.01809Z" fill="white"/>
          </svg>
          <span>+962 7 9720 5176</span>
      </li>
      <!--<li>-->
      <!--<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">-->
      <!--  <path d="M14.25 8C15.2446 8 16.1984 8.39509 16.9017 9.09835C17.6049 9.80161 18 10.7554 18 11.75C18 12.0815 18.1317 12.3995 18.3661 12.6339C18.6005 12.8683 18.9185 13 19.25 13C19.5815 13 19.8995 12.8683 20.1339 12.6339C20.3683 12.3995 20.5 12.0815 20.5 11.75C20.5 10.0924 19.8415 8.50269 18.6694 7.33058C17.4973 6.15848 15.9076 5.5 14.25 5.5C13.9185 5.5 13.6005 5.6317 13.3661 5.86612C13.1317 6.10054 13 6.41848 13 6.75C13 7.08152 13.1317 7.39946 13.3661 7.63388C13.6005 7.8683 13.9185 8 14.25 8Z" fill="white"/>-->
      <!--  <path d="M14.25 3C16.5706 3 18.7962 3.92187 20.4372 5.56282C22.0781 7.20376 23 9.42936 23 11.75C23 12.0815 23.1317 12.3995 23.3661 12.6339C23.6005 12.8683 23.9185 13 24.25 13C24.5815 13 24.8995 12.8683 25.1339 12.6339C25.3683 12.3995 25.5 12.0815 25.5 11.75C25.5 8.76631 24.3147 5.90483 22.205 3.79505C20.0952 1.68526 17.2337 0.5 14.25 0.5C13.9185 0.5 13.6005 0.631696 13.3661 0.866116C13.1317 1.10054 13 1.41848 13 1.75C13 2.08152 13.1317 2.39946 13.3661 2.63388C13.6005 2.8683 13.9185 3 14.25 3Z" fill="white"/>-->
      <!--  <path d="M25.1875 17.8875C25.1187 17.6868 25.0001 17.507 24.8426 17.3648C24.6852 17.2227 24.4941 17.1229 24.2875 17.075L16.7875 15.3625C16.5839 15.3163 16.372 15.3219 16.1711 15.3787C15.9703 15.4354 15.7868 15.5416 15.6375 15.6875C15.4625 15.85 15.45 15.8625 14.6375 17.4125C11.9415 16.1702 9.78124 14.0011 8.55 11.3C10.1375 10.5 10.15 10.5 10.3125 10.3125C10.4584 10.1632 10.5646 9.97973 10.6213 9.77885C10.6781 9.57798 10.6837 9.36608 10.6375 9.1625L8.925 1.75C8.87706 1.54337 8.77732 1.35234 8.63518 1.19489C8.49304 1.03744 8.31317 0.918753 8.1125 0.85C7.82058 0.745737 7.51914 0.670375 7.2125 0.625C6.89656 0.551744 6.57417 0.509874 6.25 0.5C4.72501 0.5 3.26247 1.1058 2.18414 2.18414C1.1058 3.26247 0.5 4.72501 0.5 6.25C0.506615 11.3534 2.53686 16.2459 6.1455 19.8545C9.75414 23.4631 14.6466 25.4934 19.75 25.5C20.5051 25.5 21.2528 25.3513 21.9504 25.0623C22.6481 24.7733 23.2819 24.3498 23.8159 23.8159C24.3498 23.2819 24.7733 22.6481 25.0623 21.9504C25.3513 21.2528 25.5 20.5051 25.5 19.75C25.5004 19.4318 25.4753 19.1142 25.425 18.8C25.3725 18.4895 25.293 18.1842 25.1875 17.8875ZM19.75 23C15.3086 22.9967 11.0501 21.2309 7.90962 18.0904C4.7691 14.9499 3.00331 10.6914 3 6.25C3.00329 5.38906 3.34676 4.56432 3.95554 3.95554C4.56432 3.34676 5.38906 3.00329 6.25 3H6.6625L8 8.8L7.325 9.15C6.25 9.7125 5.4 10.1625 5.85 11.1375C6.58278 13.212 7.76847 15.0972 9.32092 16.6561C10.8734 18.215 12.7536 19.4086 14.825 20.15C15.875 20.575 16.2875 19.7875 16.85 18.7L17.2125 18.0125L23 19.3375V19.75C22.9967 20.6109 22.6532 21.4357 22.0445 22.0445C21.4357 22.6532 20.6109 22.9967 19.75 23Z" fill="white"/>-->
      <!--  </svg>-->
      <!--    <span>+962 79999999</span>-->
      <!--</li>-->
      <li>
      <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20.6586 0.219838C20.5196 0.104423 20.3507 0.0308908 20.1715 0.00781038C19.9923 -0.0152701 19.8102 0.0130518 19.6465 0.0894754L0 9.31114V11.0955L8.25194 14.3963L13.545 22.5396H15.3298L20.969 1.19219C21.0147 1.01737 21.0098 0.833149 20.9549 0.660999C20.8999 0.488849 20.7972 0.335854 20.6586 0.219838ZM14.2278 20.8377L9.67819 13.838L16.6793 6.16988L15.5716 5.15848L8.51566 12.8863L1.71192 10.1648L19.2175 1.94783L14.2278 20.8377Z" fill="white"/>
        </svg>
        <span>info@eliteminds.co</span>
      </li>
    </ul>

    <div class="form" >
    <!--    @csrf-->
      <h1 class="contactUs-title">Contact Support Team</h1>
      <!--@if (\Session::has('success'))-->
      <!--      <div class="alert alert-success">-->
      <!--          <ul>-->
      <!--              <li>{!! \Session::get('success') !!}</li>-->
      <!--          </ul>-->
      <!--      </div>-->
      <!--  @endif-->
      <input name="name" v-model="name" type="text" placeholder="Full Name" class="form-control" >
      <input name="email" v-model="email" type="email" placeholder="Email"  class="form-control" >
      <input name="phone" v-model="phone" type="text" placeholder="Phone number"  class="form-control" >
      <textarea v-model="msg" name="msg" id="" cols="30" rows="5"  class="form-control" placeholder="Your message" ></textarea>
      
      <button  type="submit" v-on:click="store" class="btn submit-btn">Submit</button>
    </div>
  </div>
  
</section>


@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="{{ asset('layV3/script/certificateOne.js') }}"></script>
        <script src="{{ asset('layV3/script/navbarFixScript.js') }}"></script>
<script src="{{asset('layV3/script/navbarFixScript.js')}}"></script
<script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    
     <script>
        const app = new Vue({
            el: '#app-1',
            data: {
                name: '',
                email: '',
                phone:'',
                msg:'',

            },
            methods: {
                validate: function(){
                    let validation = {
                        hasError: true,
                        error: '',
                    };

                    if(this.name === ""){
                        validation.error = 'name is required.';
                        return validation;
                    }
                    
                    if(this.email === ""){
                        validation.error = 'email is required.';
                        return validation;
                    }
                    
                    if(this.phone === ""){
                        validation.error = 'phone is required.';
                        return validation;
                    }
                    
                    if(this.msg === ""){
                        validation.error = 'message is required.';
                        return validation;
                    }

                    validation.hasError = false;
                    return validation;
                },
                showError: function(err){
                    // swal.fire({
                    //     text: err,
                    //     type: "warning",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     confirmButtonClass: "btn font-weight-bold btn-light"
                    // }).then(function () {
                    // });
                    Swal.fire({
                          title: err,
                          text: 'This alert has a custom icon!',
                          icon: 'info', // You can use 'warning', 'error', 'success', or 'question'
                          showCancelButton: true,
                          cancelButtonText: '<i class="fas fa-times"></i> Cancel',
                          confirmButtonText: '<i class="fas fa-check"></i>Confirm',
                        });
                },
                store:  function(){
                    const validation = this.validate();
                    if(validation.hasError){
                        this.showError(validation.error);
                         
                        return;
                    }
                     app.storeRequest().then(() => {
                         Swal.fire({
                                      title: "success",
                                      text: 'We received your message, and we will get back to you soon. Thank you!',
                                      icon: 'info', // You can use 'warning', 'error', 'success', or 'question'
                                      showCancelButton: true,
                                      //cancelButtonText: '<i class="fas fa-times"></i> Cancel',
                                      confirmButtonText: '<i class="fas fa-check"></i>Confirm',
                                    }).then(function () {
                                    window.location.replace('{{route('contact.page')}}');
                        });
                        
                        // swal.fire({
                        //     text: 'We received your message, and we will get back to you soon. Thank you!',
                        //     type: "success",
                        //     buttonsStyling: false,
                        //     confirmButtonText: "Ok, got it!",
                        //     confirmButtonClass: "btn font-weight-bold btn-light"
                        // }).then(function () {
                        //     window.location.replace('{{route('contact.page')}}');
                        // });
                    });
                },
                storeRequest:  function(){
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}',
                            }
                        });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('send.mail.customer')}}',
                        data: {
                            name: app.name,
                            email: app.email,
                            phone:app.phone,
                            msg:app.msg,
                        },
                        error: function(err){
                            //KTApp.unblockPage();
                            console.log(err);
                            app.showError('ops, something went wrong.');
                        }
                    });
                },
            }
        });
    </script>
    

>
@endsection


