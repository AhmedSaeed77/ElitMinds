@extends('layouts.layoutV3')


@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{asset('layV3/style/styleBooks.css')}}">

<style>
  

* {
font-family: "Roboto" !important;
}

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
.ebookSwiper a img{
    width:100%;
    max-height:250px;
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

/*new design styles*/
.page-img{
    max-width: 210px;
    max-height: 335px;
}
.page-title{
    color: #4B4B4D;
    font-family: Roboto;
    font-size: 32px;
    font-style: normal;
    font-weight: 700;
    letter-spacing: -0.48px;
}
.page-para{
    color:  #4B4B4D;
    text-align: justify;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 300;
    line-height: 17.736px;
    letter-spacing: -0.21px;
}
.page-list{
    
}
.page-list-item{
    display:flex;
    align-items:center;
    gap:14px;
    color: #4B4B4D;
    font-size: 14px;
    margin-bottom:18px;
}
.page-price{
    color:  #4B4B4D;
    font-size: 16px;
    font-weight: 500;
}
.page-button{
    width: 193px;
    height: 45px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius: 77px;
    background: #F58634;
    color: #FFF;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    margin:11px auto 0 auto;
}
.page-button:hover{
    color: #FFF;
}
.page-descrp{
    color:  #4B4B4D;
    text-align: justify;
    font-size: 14px;
    font-weight: 300;
    line-height:17.736px;
    letter-spacing: -0.21px;
    padding-right: 65px;
}

@media screen and (max-width:992px){
   .page-descrp{
        padding: 0px 15px;
        margin-bottom:30px;
    } 
}
</style>
@endsection
 
@section('content')
!-- part 1 -->
      <!--<div class="col-12 container marginTop">-->
      <!--  <div class="row col-12 d-flex">-->
      <!--    <div class="col-md-7 col-12">-->
      <!--      <h1 class="ms-3 Roboto textGrey fw-bold h1">E-Books</h1>-->

      <!--      <p class="Roboto textGrey fw-lighter ms-3 pe-5 fs-6 mb-5">-->
      <!--        Our mission is to deliver affordable and high quality self-paced-->
      <!--        courses in a convenient manner to help professionals achieve their-->
      <!--        learning goals anytime anywhere. Our mission is to deliver-->
      <!--        affordable and high quality self-paced courses in a convenient-->
      <!--        manner to help professionals achieve their learning goals anytime-->
      <!--        anywhere.-->
      <!--      </p>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
        <div class="attention-message" style="margin-top: 56px;">
            <p class="px-3 px-lg-0 mx-auto"><strong>"Attention!</strong>  If you purchase any of our courses, you'll receive the corresponding exams simulator as part of your course  package. There's no need to buy the books separately, as they are already included to enhance your learning experience."</p>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 d-flex justify-content-center">
                    <img class="page-img" src="{{url('storage/book/imgs/'.basename($book->img))}}" alt="">
                </div>
                <div class="col-12 col-lg-9 row gy-4 gy-lg-0">
                    <h1 class="col-12 page-title" >{{ $book->name }}</h1>
                    <div class="col-12 col-lg-6 page-para">
                        {!!  $book->shortdescription  !!}
                        <br>
                        {!! $book->shortdescription1 !!}
                    </div>
                    <div class="col-0 col-lg-1"></div>
                    <div class="col-12 col-lg-5">
                        <div class="page-list">
                            
                            {!! $book->titleEditor !!}
                            
                            <!--<div class="page-list-item">-->
                            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">-->
                            <!--      <path d="M10.9529 21C16.4546 21 20.9058 16.5179 20.9058 11C20.9058 5.48211 16.4546 1 10.9529 1C5.45111 1 1 5.48211 1 11C1 16.5179 5.45111 21 10.9529 21Z" stroke="#F2F2F2" stroke-width="2"/>-->
                            <!--      <path d="M6.06934 13.0452L7.38066 14.4123C8.16496 15.2299 9.47117 15.2334 10.2598 14.42L16 8.5" stroke="#F58634" stroke-width="2" stroke-linecap="round"/>-->
                            <!--    </svg>-->
                            <!--    <span>{{ $book->num_questions }} Questions</span>-->
                            <!--</div>-->
                            <!--<div class="page-list-item">-->
                            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">-->
                            <!--      <path d="M10.9529 21C16.4546 21 20.9058 16.5179 20.9058 11C20.9058 5.48211 16.4546 1 10.9529 1C5.45111 1 1 5.48211 1 11C1 16.5179 5.45111 21 10.9529 21Z" stroke="#F2F2F2" stroke-width="2"/>-->
                            <!--      <path d="M6.06934 13.0452L7.38066 14.4123C8.16496 15.2299 9.47117 15.2334 10.2598 14.42L16 8.5" stroke="#F58634" stroke-width="2" stroke-linecap="round"/>-->
                            <!--    </svg>-->
                            <!--    <span>{{ $book->num_exams }} Exams</span>-->
                            <!--</div>-->
                            <!-- <div class="page-list-item">-->
                            <!--    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">-->
                            <!--      <path d="M10.9529 21C16.4546 21 20.9058 16.5179 20.9058 11C20.9058 5.48211 16.4546 1 10.9529 1C5.45111 1 1 5.48211 1 11C1 16.5179 5.45111 21 10.9529 21Z" stroke="#F2F2F2" stroke-width="2"/>-->
                            <!--      <path d="M6.06934 13.0452L7.38066 14.4123C8.16496 15.2299 9.47117 15.2334 10.2598 14.42L16 8.5" stroke="#F58634" stroke-width="2" stroke-linecap="round"/>-->
                            <!--    </svg>-->
                            <!--    <span>1,000+ realistic and challenging questions. </span>-->
                            <!--</div>-->
                        </div>
                            <div class="text-center mt-5">
                                <strong class="page-price">Price: {{ $book->price }} $</strong>
                                <a href="{{  $book->book_link  }}" class="page-button">Buy Now </a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-lg-8 page-descrp" >{!!  $book->description  !!}</div>
                <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                    <img src="{{asset('layV3/images/image 44.png')}}" alt="">
                </div>
            </div>
        </div>
            











      <!-- part2 -->
      <!--<div class="col-12 container flex-column" style="margin-bottom:63px">-->
      <!--  <div-->
      <!--    class="col-12 d-flex justify-content-center align-items-center flex-column"-->
      <!--  >-->
          <!-- search -->
          <!-- <form class="col-12">
      <!--      <div class="mb-3 col-12">-->
      <!--        <input-->
      <!--          type="search"-->
      <!--          class="form-control col-12 py-3"-->
      <!--          id="search"-->
      <!--          aria-describedby="search"-->
      <!--          name="search"-->
      <!--          placeholder="Search in E-Books"-->
      <!--        />-->
      <!--      </div>-->
      <!--    </form> -->
          <!-- information s -->
      <!--    <div class="row col-12 g-4 my-3" style="border: 2px solid #ADADAD; border-radius:18px; padding-top:58px; padding-bottom:70px">-->
      <!--      <div class="col-md-5 col-12 text-center">-->
      <!--        <img-->
      <!--          src="{{url('storage/book/imgs/'.basename($book->img))}}"-->
      <!--          alt=""-->
      <!--          class="w-75"-->
      <!--        />-->
      <!--      </div>-->
      <!--      <div-->
      <!--        class="col-md-6 col-12 d-flex flex-column justify-content-between"-->
      <!--      >-->
      <!--      <div>-->
      <!--        <h1 class="Roboto textGrey fw-bold h1"> {{ $book->name }}</h1>-->
              
      <!--        <p class="Roboto textGrey fw-lighter pe-5 fs-6 mb-5">-->
      <!--              {!!  $book->description  !!}-->
      <!--        </p>-->
      <!--      </div>-->

      <!--        <div-->
      <!--          class="d-flex flex-column justify-content-center align-items-center"-->
      <!--        >-->
      <!--          <p class="Roboto textGrey fw-bold fs-6  me-4">-->
      <!--            Price: {{ $book->pricing['localized_price']}} {{ $book->pricing['currency_code'] }}-->
                  <!-- {{ $book->pricing['localized_price']}} {{ $book->pricing['currency_code'] }} -->
      <!--          </p>-->
      <!--          <div>-->
      <!--            <a-->
      <!--              href="{{  $book->book_link  }}"-->
      <!--              class="btn bgorange btnorange text-white Roboto"-->
      <!--              >Buy Now</a-->
      <!--            >-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->

   <!-- Swiper -->
   <!--<div class="swiper ebookSwiper">-->
   <!--     <div class="swiper-wrapper ">-->
   <!--         @foreach($books as $bookd)-->
   <!--         <div class="swiper-slide">-->
   <!--           <a href="{{route('singleBook.index', $bookd->slug)}}">-->
   <!--             <img src="{{url('storage/book/imgs/'.basename($bookd->img))}}" alt=".0.">-->
   <!--               <div class="book-label">-->
   <!--                 <p > {{ $bookd->name }}  </p>-->
   <!--                 <p> {{ $bookd->price }} </p>-->
   <!--               </div>-->
   <!--           </a>-->
   <!--         </div>-->
   <!--          @endforeach-->
   <!--     </div>-->
   <!--     <div class="swiper-button-next"><img src="{{asset('layV3/images/rightArrow.png')}}" alt=".0."></div>-->
   <!--     <div class="swiper-button-prev"><img src="{{asset('layV3/images/leftArrow.png')}}" alt=".0."></div>-->
   <!-- </div>-->
<!--<div class= mb-5">-->
<!--  <div class="books-table-wrapper">-->
<!--    <div class="books-table" >-->
<!--      <table>-->
<!--        <thead>-->
<!--          <tr>-->
<!--            <th style="width:10%;">Cover</th>-->
<!--            <th style="width:20%; min-width:250px;">Description</th>-->
<!--            <th style="width:10%">Details</th>-->
<!--            <th style="width:10%">Price</th>-->
<!--            <th style="width:10%"></th>-->
<!--          </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--            @foreach($books as $book)-->
<!--                <tr>-->
<!--                    <td><img src="{{ url('storage/book/imgs/'.basename($book->img_large))}}" alt=".0."></td>-->
<!--                    <td class="description">{!! $book->shortdescription !!}</td>-->
<!--                    <td class="details"><p>{{ $book->num_questions }} Questions</p><p>-->
<!--                      {{ $book->num_exams }} Exams</p></td>-->
<!--                    <td class="price">{{ $book->price }}$</td>-->
<!--                    <td class="action">-->
                        <!--<button class="btn primary d-block"><a href="">Buy now</a></button>-->
<!--                        <a class="link-btn" href="{{ route('singleBook.index',$book->slug) }}">more details</a>-->
<!--                    </td>-->
<!--                </tr>-->
<!--            @endforeach-->
<!--        </tbody>-->
<!--      </table>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

  <!--</div>-->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var ebookSwiper = new Swiper('.ebookSwiper', {
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