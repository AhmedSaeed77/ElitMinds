@extends('layouts.layoutV3')


@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<style>
  
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

</style>
@endsection
 
@section('content')
!-- part 1 -->
      <div class="col-12 container marginTop">
        <div class="row col-12 d-flex">
          <div class="col-md-7 col-12">
            <h1 class="ms-3 Roboto textGrey fw-bold h1">E-Books</h1>

            <p class="Roboto textGrey fw-lighter ms-3 pe-5 fs-6 mb-5">
              Our mission is to deliver affordable and high quality self-paced
              courses in a convenient manner to help professionals achieve their
              learning goals anytime anywhere. Our mission is to deliver
              affordable and high quality self-paced courses in a convenient
              manner to help professionals achieve their learning goals anytime
              anywhere.
            </p>
          </div>
        </div>
      </div>

      <!-- part2 -->
      <div class="col-12 container py-5 flex-column">
        <div
          class="col-12 d-flex justify-content-center align-items-center flex-column"
        >
          <!-- search -->
          <form class="col-12">
            <div class="mb-3 col-12">
              <input
                type="search"
                class="form-control col-12 py-3"
                id="search"
                aria-describedby="search"
                name="search"
                placeholder="Search in E-Books"
              />
            </div>
          </form>
          <!-- information s -->
          <div class="row col-12 g-4 my-3">
            <div class="col-md-6 col-12">
              <img
                src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                alt=""
                class="w-100"
              />
            </div>
            <div
              class="col-md-6 col-12 d-flex flex-column justify-content-between"
            >
            <div>
              <h1 class="Roboto textGrey fw-bold h1"> {{ $book->name }}</h1>
              
              <p class="Roboto textGrey fw-lighter pe-5 fs-6 mb-5">
                    {{  $book->description  }}
              </p>
            </div>

              <div
                class="d-flex flex-column justify-content-end align-items-end"
              >
                <p class="Roboto textGrey fw-bold fs-6  me-4">
                  Price: {{ $book->pricing['localized_price']}} {{ $book->pricing['currency_code'] }}
                </p>
                <div>
                  <a
                    href="{{  $book->book_link  }}"
                    class="btn bgorange btnorange text-white Roboto"
                    >Buy On Amazon</a
                  >
                </div>
              </div>
            </div>
          </div>
          <!-- slider books -->
          <!-- <div
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
                >
                  <div
                    class="col-12 row d-flex justify-content-start align-items-start carousel-container carousel-inner"
                    role="listbox"
                  >
                    <div class="carousel-item active">
                      <div class="col-md-3 col-12">
                        <div class=" ">
                          <div class="  ">
                            <img
                              src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                              class="card-img-top"
                              alt=".0."
                            />
                            <div class="card-body text-center mt-3">
                              <p class="Roboto textGrey fw-bold">
                               
                              </p>
                              <p class="Roboto textGrey fw-lighter">29.99$</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="col-md-3 col-12">
                        <img
                          src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                          class="card-img-top"
                          alt=".0."
                        />
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="col-md-3 col-12">
                        <img
                          src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                          class="card-img-top"
                          alt=".0."
                        />
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="col-md-3 col-12">
                        <img
                          src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                          class="card-img-top"
                          alt=".0."
                        />
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="col-md-3 col-12">
                        <img
                          src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                          class="card-img-top"
                          alt=".0."
                        />
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="col-md-3 col-12">
                        <img
                          src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png"
                          class="card-img-top"
                          alt=".0."
                        />
                      </div>
                    </div>
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
              href="./blogs.html"
              class="btn bgorangeInline text-center Roboto px-5 pt-2 my-5"
              >Explore all E-Books</a
            >
          </div>
        </div>
      </div> -->

      
   <!-- Swiper -->
   <div class="swiper ebookSwiper">
        <div class="swiper-wrapper ">
            <div class="swiper-slide">
              <a href="#">
                <img src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png" alt=".0.">
                  <div class="book-label">
                    <p >book name 1 </p>
                    <p>60$</p>
                  </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="#">
                <img src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png" alt=".0.">
                  <div class="book-label">
                    <p >book name 2 </p>
                    <p>60$</p>
                  </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="#">
                <img src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png" alt=".0.">
                  <div class="book-label">
                    <p >book name 3 </p>
                    <p>60$</p>
                  </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="#">
                <img src="https://demo.eliteminds.co/storage/book/imgs/Hkjmsf8LCL1XosYyxIPPIvcCxG58nIB6lXG8LXi0.png" alt=".0.">
                  <div class="book-label">
                    <p >book name 4 </p>
                    <p>60$</p>
                  </div>
              </a>
            </div>

        </div>
        <div class="swiper-button-next"><img src="layV3/images/rightArrow.png" alt=".0."></div>
        <div class="swiper-button-prev"><img src="layV3/images/leftArrow.png" alt=".0."></div>
      </div>
  </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var ebookSwiper = new Swiper('.ebookSwiper', {
 loop: true,
 slidesPerView: 3,
 spaceBetween: 30,
 navigation: {
   nextEl: '.swiper-button-next',
   prevEl: '.swiper-button-prev',
 },
 autoplay: {
  delay: 2500,
  disableOnInteraction: false,
  pauseOnMouseEnter:true,
  reverseDirection: false
 },
 slidesPerGroupSkip: 1,
 centeredSlides: true,
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

</script>
@endsection