<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}| Login Page</title>
    <link rel="stylesheet" href="{{asset('newfront/style/styleLogIn.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.css" integrity="sha512-Y1c7KsgMNtf7pIhrj/Ul2LhutImFYr+TsCmjB8mGAk+cgG1Vm8U1g7tvfmRr6yD5nds03Qgc6Mcb86MBKu1Llg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.js" integrity="sha512-+z66PuMP/eeemN2MgRhPvI3G15FOBbsp5NcCJBojg6dZBEFL0Zoi0PEGkhjubEcQF7N1EpTX15LZvfuw+Ej95Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  </head>
  <body>
    <section class="container-fluid g-0 m-0">
      <div class="row g-0 m-0 col-12 d-flex">
        <section class="col-md-6 bg-white p-5" style="min-height: 100vh">
          <div class="container col-12">
            <div class="col-12 mb-5">
              <a href="{{route('index')}}"
                ><img src="{{asset('newfront/images/image 13.png')}}" alt="logo" class="mb-5"
              /></a>
            </div>
            <div
              class="mt-5 d-flex flex-column justify-content-start align-items-start col-12"
            >
              <div uk-height-viewport class="uk-flex uk-flex-middle">
    <div uk-height-viewport class="uk-flex uk-flex-middle">
    <div class="uk-width-2-3@m uk-width-1-2@s m-auto rounded">
        <div class="uk-child-width-1-2@m uk-grid-collapse bg-gradient-grey" uk-grid>

            <!-- column one -->
            <div class="uk-margin-auto-vertical uk-text-center uk-animation-scale-up p-3 uk-light">
                <i class="">
                    <img src="{{asset('newfront/images/image 13.png')}}" height="150px" width="150px" alt="">
                </i>
                <h3 class="mb-4"> {{env('APP_NAME')}}</h3>
                <p>The Place You can learn Every Thing. </p>
            </div>

            <!-- column two -->
            <div class="uk-card-default p-5 rounded">
                <div class="mb-4 uk-text-center">
                    <h3 class="mb-0"> Welcome Back</h3>
                    <p class="my-2">Please Enter Your Password.</p>
                </div>
                @if (session('error'))
                    <span class="alert alert-danger" style="display:block">
                        <strong>{{ session('error') }}</strong>
                    </span>
                @endif
                @if (isset($error))
                    <span class="alert alert-danger" style="display:block">
                        <strong>{{ $error }}</strong>
                    </span>
                @endif
                <form action="{{route('socialite.login.account')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value="{{$email}}">
                    <div class="uk-width-1-2@s">
                        <div class="uk-form-group">
                            <label class="uk-form-label"> Password</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                                <input class="uk-input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
                            </div>

                        </div>
                    </div>
                    <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
                        <div class="uk-width-auto@s">
                            <input type="submit" class="btn btn-primary" value="Login"/>
                        </div>
                    </div>


                </form>
            </div><!--  End column two -->

        </div>
    </div>
</div>
</div>
              
            </div>
          </div>
        </section>
        <section class="col-md-6 d-none d-md-flex bgorange1 p-5">
          <div
            class="container d-flex justify-content-center align-items-top my-5"
          >
            <!--  -->
            <div
              class="bgCenter col-10 d-flex justify-content-center align-items-center flex-column p-5 position-relative"
            >
              <div class="bgHlftcircle translate-middle">
                <svg
                  width="135"
                  height="135"
                  viewBox="0 0 135 135"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="67.5" cy="67.5" r="67.5" fill="#4B4B4D" />
                  <circle cx="67.5" cy="67.5" r="36.5" fill="#F58634" />
                </svg>
              </div>
              <div
                class="d-flex justify-content-center align-items-center flex-column"
              >
                <svg
                  width="165"
                  height="145"
                  viewBox="0 0 165 145"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M150.433 0.685059H14.5649C6.53348 0.685059 0 7.21828 0 15.2499V109.419C0 117.451 6.53348 123.984 14.5649 123.984H61.2632C62.6884 123.984 63.8413 122.831 63.8413 121.406C63.8413 119.981 62.6884 118.828 61.2632 118.828H14.5649C9.37613 118.828 5.15625 114.608 5.15625 109.419V15.2499C5.15625 10.0609 9.37613 5.84131 14.5649 5.84131H150.433C155.622 5.84131 159.844 10.0609 159.844 15.2499V109.419C159.844 114.608 155.622 118.828 150.433 118.828C149.008 118.828 147.854 119.981 147.854 121.406C147.854 122.831 149.008 123.984 150.433 123.984C158.464 123.984 165 117.451 165 109.419V15.2499C165 7.21828 158.464 0.685059 150.433 0.685059Z"
                    fill="white"
                  />
                  <path
                    d="M56.7188 72.8726H25.7812C24.3563 72.8726 23.2031 74.0255 23.2031 75.4507C23.2031 76.8756 24.3563 78.0288 25.7812 78.0288H56.7188C58.1439 78.0288 59.2969 76.8756 59.2969 75.4507C59.2969 74.0255 58.1439 72.8726 56.7188 72.8726Z"
                    fill="white"
                  />
                  <path
                    d="M56.7188 89.7588H25.7812C24.3563 89.7588 23.2031 90.9117 23.2031 92.3369C23.2031 93.7618 24.3563 94.915 25.7812 94.915H56.7188C58.1439 94.915 59.2969 93.7618 59.2969 92.3369C59.2969 90.9117 58.1439 89.7588 56.7188 89.7588Z"
                    fill="white"
                  />
                  <path
                    d="M133.385 98.2836C133.338 98.1212 133.234 97.9977 133.16 97.8528C138.512 91.913 141.797 84.075 141.797 75.4507C141.797 56.9405 126.792 41.9351 108.281 41.9351C89.7713 41.9351 74.7659 56.9405 74.7659 75.4507C74.7659 83.9801 77.9787 91.7411 83.226 97.6571C83.1718 97.7744 83.0862 97.8688 83.0491 97.9966L72.2029 135.183C71.9183 136.16 72.2331 137.21 73.006 137.869C73.779 138.529 74.8667 138.668 75.7832 138.234L87.1682 132.826L94.3209 143.199C94.8069 143.904 95.6048 144.315 96.4433 144.315C96.5894 144.315 96.7354 144.302 96.8815 144.277C97.8733 144.106 98.6741 143.376 98.9335 142.404L107.897 108.947C108.027 108.948 108.152 108.966 108.281 108.966C108.343 108.966 108.402 108.957 108.463 108.957L117.428 142.404C117.688 143.373 118.486 144.103 119.475 144.277C119.624 144.302 119.772 144.315 119.918 144.315C120.754 144.315 121.547 143.909 122.036 143.209L129.211 132.887L140.584 138.239C141.498 138.668 142.583 138.524 143.358 137.864C144.129 137.205 144.441 136.157 144.156 135.183L133.385 98.2836ZM108.281 47.0913C123.919 47.0913 136.641 59.8131 136.641 75.4507C136.641 91.088 123.919 103.81 108.281 103.81C92.6441 103.81 79.9221 91.088 79.9221 75.4507C79.9221 59.8131 92.6441 47.0913 108.281 47.0913ZM95.3986 135.679L90.1668 128.093C89.4491 127.053 88.087 126.681 86.939 127.227L78.7614 131.112L87.3654 101.614C91.717 105.098 96.956 107.497 102.689 108.463L95.3986 135.679ZM129.435 127.293C128.295 126.764 126.938 127.121 126.22 128.153L120.971 135.707L113.677 108.493C119.412 107.562 124.656 105.195 129.024 101.744L137.603 131.137L129.435 127.293Z"
                    fill="white"
                  />
                  <path
                    d="M59.2969 29.0444C59.2969 26.1966 56.9884 23.8882 54.1406 23.8882H28.3594C25.5118 23.8882 23.2031 26.1966 23.2031 29.0444V54.8257C23.2031 57.6732 25.5118 59.9819 28.3594 59.9819H54.1406C56.9884 59.9819 59.2969 57.6732 59.2969 54.8257V29.0444ZM54.1406 54.8257H28.3594V29.0444H54.1406V54.8257Z"
                    fill="white"
                  />
                  <path
                    d="M108.281 90.9194C116.825 90.9194 123.75 83.9938 123.75 75.4507C123.75 66.9073 116.825 59.9819 108.281 59.9819C99.7381 59.9819 92.8125 66.9073 92.8125 75.4507C92.8125 83.9938 99.7381 90.9194 108.281 90.9194ZM108.281 65.1382C113.968 65.1382 118.594 69.7641 118.594 75.4507C118.594 81.137 113.968 85.7632 108.281 85.7632C102.595 85.7632 97.9688 81.137 97.9688 75.4507C97.9688 69.7641 102.595 65.1382 108.281 65.1382Z"
                    fill="white"
                  />
                </svg>
                <p class="text-center text-white">
                  Wide range of certificates library
                </p>
              </div>
              <div class="bgCircle translate-middle">
                <svg
                  width="140"
                  height="146"
                  viewBox="0 0 140 146"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M116.997 116.997C88.256 148.505 41.6874 154.057 6.73825 132.301C-0.763527 127.631 -1.18589 117.369 4.76921 110.84C15.3977 99.1883 32.8924 80.009 52.6734 58.3233C72.4543 36.6375 89.9489 17.4582 100.577 5.80624C106.533 -0.722291 116.79 -1.24251 122.128 5.79955C146.997 38.607 145.737 85.4884 116.997 116.997Z"
                    fill="#4B4B4D"
                  />
                  <path
                    d="M99.6969 101.217C85.0032 117.325 64.8152 124.201 48.7425 120.143C40.1748 117.979 39.5772 107.424 45.5323 100.896C51.8653 93.9529 60.4801 84.5086 69.9719 74.1028C79.4637 63.6969 88.0785 54.2526 94.4115 47.3098C100.367 40.7813 110.932 40.4087 113.872 48.7419C119.386 64.375 114.391 85.1082 99.6969 101.217Z"
                    fill="#F58634"
                  />
                </svg>
              </div>
            </div>
          </div>
          <!--     <svg width="135" height="135" viewBox="0 0 135 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="67.5" cy="67.5" r="67.5" fill="#4B4B4D"/>
                        <circle cx="67.5" cy="67.5" r="36.5" fill="#F58634"/>
                        </svg>
                         -->
        </section>
      </div>
    </section>
    <script>
    function showpasss() {
  var x = document.getElementById("showpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  </body>
</html>
