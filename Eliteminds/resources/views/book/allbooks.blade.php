
@extends('layouts.layoutV3')
@section('css')
<link rel="stylesheet" href="{{asset('layV3/style/styleBooks.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  
@endsection

@section('css')

<style>
* {
font-family: "Roboto" !important;
}

</style>


@endsection

@section('content')

<div class="attention-message">
    <p class="px-3 px-lg-0 mx-auto"><strong>"Attention!</strong>  If you purchase any of our courses, you'll receive the corresponding exams simulator as part of your course  package. There's no need to buy the books separately, as they are already included to enhance your learning experience."</p>
</div>
        @php
            $setting = \App\AllSetting::where('id',1)->first();
        @endphp
        
<div class="col-12 container">
        <div class="row col-12 d-flex">
          <div class="col-12">
            <h1 class="Roboto" style="font-style: normal;font-weight: 700;font-size: 36px;">E-Books</h1>
              <p class="Roboto textGrey mb-5" style="font-weight: 300;font-size: 16px;">
                {!! $setting->allbooks !!} 
            </p>
            <p class="Roboto textGrey " style="font-weight: 300;font-size: 16px;">
            
            </p>
          </div>
        </div>
      <!--new figma design-->
     
      <div class="row gy-4 mt-5">
        @foreach($books as $book)
            <div class="col-12 col-lg-6">
              <div class="book-card">
                  <img class="book-img"  src="{{url('storage/book/imgs/'.basename($book->img))}}" alt="">
                  <div class="d-flex flex-column">
                    <h3 class="book-title">{{ $book->name }}</h3>
                    <p class="book-para">{!!  $book->shortdescription  !!}</p>
                    <div class="book-detail-item">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99967 14.6668H9.99967C13.333 14.6668 14.6663 13.3335 14.6663 10.0002V6.00016C14.6663 2.66683 13.333 1.3335 9.99967 1.3335H5.99967C2.66634 1.3335 1.33301 2.66683 1.33301 6.00016V10.0002C1.33301 13.3335 2.66634 14.6668 5.99967 14.6668Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 6H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 10H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>{{ $book->num_questions }} Questions</p>
                    </div>
                    <div class="book-detail-item">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.33301 8.1333H9.99967" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.33301 10.7998H8.25301" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66634 4.00016H9.33301C10.6663 4.00016 10.6663 3.3335 10.6663 2.66683C10.6663 1.3335 9.99967 1.3335 9.33301 1.3335H6.66634C5.99967 1.3335 5.33301 1.3335 5.33301 2.66683C5.33301 4.00016 5.99967 4.00016 6.66634 4.00016Z" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.6667 2.68018C12.8867 2.80018 14 3.62018 14 6.66684V10.6668C14 13.3335 13.3333 14.6668 10 14.6668H6C2.66667 14.6668 2 13.3335 2 10.6668V6.66684C2 3.62684 3.11333 2.80018 5.33333 2.68018" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>{{ $book->num_exams }} Exams</p>
                    </div> 
                    <a href="{{ route('singleBook.index',$book->slug) }}" class="more-button"> More details
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.61992 13.1566C9.49325 13.1566 9.36658 13.1099 9.26658 13.0099C9.07325 12.8166 9.07325 12.4966 9.26658 12.3033L12.9599 8.60994L9.26658 4.91661C9.07325 4.72327 9.07325 4.40327 9.26658 4.20994C9.45992 4.01661 9.77992 4.01661 9.97325 4.20994L14.0199 8.25661C14.2132 8.44994 14.2132 8.76994 14.0199 8.96327L9.97325 13.0099C9.87325 13.1099 9.74658 13.1566 9.61992 13.1566Z" fill="#F58634"/>
                            <path d="M13.5533 9.10986H2.33325C2.05992 9.10986 1.83325 8.8832 1.83325 8.60986C1.83325 8.33653 2.05992 8.10986 2.33325 8.10986H13.5533C13.8266 8.10986 14.0533 8.33653 14.0533 8.60986C14.0533 8.8832 13.8266 9.10986 13.5533 9.10986Z" fill="#F58634"/>
                        </svg>
                    </a>
                  </div>
              </div>
          </div>
        @endforeach
        <!--<div class="col-12 col-lg-6">-->
        <!--      <div class="book-card">-->
        <!--          <img class="book-img" src="https://demo.eliteminds.co/storage/book/imgs/Buo15RlDoZeT3UqjGkYg44iqVKPlrCEAaVOd588t.png" alt="">-->
        <!--          <div>-->
        <!--            <h3 class="book-title">PMP® Exam Questions Bank for Project Management Professionals</h3>-->
        <!--            <p class="book-para">Our mission is to deliver affordable and high quality self-paced courses in a convenient manner to help professionals achieve their learning goals anytime anywhere. </p>-->
        <!--            <div class="book-detail-item">-->
        <!--                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M5.99967 14.6668H9.99967C13.333 14.6668 14.6663 13.3335 14.6663 10.0002V6.00016C14.6663 2.66683 13.333 1.3335 9.99967 1.3335H5.99967C2.66634 1.3335 1.33301 2.66683 1.33301 6.00016V10.0002C1.33301 13.3335 2.66634 14.6668 5.99967 14.6668Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.5 6H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.5 10H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                </svg>-->
        <!--                <p>120 Questions</p>-->
        <!--            </div>-->
        <!--            <div class="book-detail-item">-->
        <!--                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M5.33301 8.1333H9.99967" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M5.33301 10.7998H8.25301" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M6.66634 4.00016H9.33301C10.6663 4.00016 10.6663 3.3335 10.6663 2.66683C10.6663 1.3335 9.99967 1.3335 9.33301 1.3335H6.66634C5.99967 1.3335 5.33301 1.3335 5.33301 2.66683C5.33301 4.00016 5.99967 4.00016 6.66634 4.00016Z" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.6667 2.68018C12.8867 2.80018 14 3.62018 14 6.66684V10.6668C14 13.3335 13.3333 14.6668 10 14.6668H6C2.66667 14.6668 2 13.3335 2 10.6668V6.66684C2 3.62684 3.11333 2.80018 5.33333 2.68018" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                </svg>-->
        <!--                <p>6 Exams</p>-->
        <!--            </div> -->
        <!--            <a  href="#" class="more-button"> More details-->
        <!--                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M9.61992 13.1566C9.49325 13.1566 9.36658 13.1099 9.26658 13.0099C9.07325 12.8166 9.07325 12.4966 9.26658 12.3033L12.9599 8.60994L9.26658 4.91661C9.07325 4.72327 9.07325 4.40327 9.26658 4.20994C9.45992 4.01661 9.77992 4.01661 9.97325 4.20994L14.0199 8.25661C14.2132 8.44994 14.2132 8.76994 14.0199 8.96327L9.97325 13.0099C9.87325 13.1099 9.74658 13.1566 9.61992 13.1566Z" fill="#F58634"/>-->
        <!--                    <path d="M13.5533 9.10986H2.33325C2.05992 9.10986 1.83325 8.8832 1.83325 8.60986C1.83325 8.33653 2.05992 8.10986 2.33325 8.10986H13.5533C13.8266 8.10986 14.0533 8.33653 14.0533 8.60986C14.0533 8.8832 13.8266 9.10986 13.5533 9.10986Z" fill="#F58634"/>-->
        <!--                </svg>-->
        <!--            </a>-->
        <!--          </div>-->
        <!--      </div>-->
        <!--  </div>-->
        <!--<div class="col-12 col-lg-6">-->
        <!--      <div class="book-card">-->
        <!--          <img class="book-img"  src="https://demo.eliteminds.co/storage/book/imgs/Buo15RlDoZeT3UqjGkYg44iqVKPlrCEAaVOd588t.png" alt="">-->
        <!--          <div>-->
        <!--            <h3 class="book-title">PMP® Exam Questions Bank for Project Management Professionals</h3>-->
        <!--            <p class="book-para">Our mission is to deliver affordable and high quality self-paced courses in a convenient manner to help professionals achieve their learning goals anytime anywhere. </p>-->
        <!--            <div class="book-detail-item">-->
        <!--                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M5.99967 14.6668H9.99967C13.333 14.6668 14.6663 13.3335 14.6663 10.0002V6.00016C14.6663 2.66683 13.333 1.3335 9.99967 1.3335H5.99967C2.66634 1.3335 1.33301 2.66683 1.33301 6.00016V10.0002C1.33301 13.3335 2.66634 14.6668 5.99967 14.6668Z" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.5 6H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.5 10H5.5" stroke="#9C9CA4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                </svg>-->
        <!--                <p>120 Questions</p>-->
        <!--            </div>-->
        <!--            <div class="book-detail-item">-->
        <!--                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M5.33301 8.1333H9.99967" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M5.33301 10.7998H8.25301" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M6.66634 4.00016H9.33301C10.6663 4.00016 10.6663 3.3335 10.6663 2.66683C10.6663 1.3335 9.99967 1.3335 9.33301 1.3335H6.66634C5.99967 1.3335 5.33301 1.3335 5.33301 2.66683C5.33301 4.00016 5.99967 4.00016 6.66634 4.00016Z" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                    <path d="M10.6667 2.68018C12.8867 2.80018 14 3.62018 14 6.66684V10.6668C14 13.3335 13.3333 14.6668 10 14.6668H6C2.66667 14.6668 2 13.3335 2 10.6668V6.66684C2 3.62684 3.11333 2.80018 5.33333 2.68018" stroke="#9C9CA4" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>-->
        <!--                </svg>-->
        <!--                <p>6 Exams</p>-->
        <!--            </div> -->
        <!--            <a  href="#" class="more-button"> More details-->
        <!--                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--                    <path d="M9.61992 13.1566C9.49325 13.1566 9.36658 13.1099 9.26658 13.0099C9.07325 12.8166 9.07325 12.4966 9.26658 12.3033L12.9599 8.60994L9.26658 4.91661C9.07325 4.72327 9.07325 4.40327 9.26658 4.20994C9.45992 4.01661 9.77992 4.01661 9.97325 4.20994L14.0199 8.25661C14.2132 8.44994 14.2132 8.76994 14.0199 8.96327L9.97325 13.0099C9.87325 13.1099 9.74658 13.1566 9.61992 13.1566Z" fill="#F58634"/>-->
        <!--                    <path d="M13.5533 9.10986H2.33325C2.05992 9.10986 1.83325 8.8832 1.83325 8.60986C1.83325 8.33653 2.05992 8.10986 2.33325 8.10986H13.5533C13.8266 8.10986 14.0533 8.33653 14.0533 8.60986C14.0533 8.8832 13.8266 9.10986 13.5533 9.10986Z" fill="#F58634"/>-->
        <!--                </svg>-->
        <!--            </a>-->
        <!--          </div>-->
        <!--      </div>-->
        <!--  </div>-->
      </div>
  </div>
      <!-- old figma design -->
<!--      <div class="col-12 container py-5 flex-column">-->
<!--        <div-->
<!--          class="col-12 d-flex justify-content-center align-items-center flex-column"-->
<!--        >-->
          <!-- search -->
<!--          @if (\Session::has('error'))-->
<!--                            <div class="alert alert-danger mb-3 col-12">-->
<!--                                <ul>-->
<!--                                    <li>{!! \Session::get('error') !!}</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        @endif-->
                        
<!--          <form class="col-12" action="{{ route('searchBook') }}" method="post">-->
<!--          {{ csrf_field() }}-->
<!--            <div class="mb-3 col-12">-->
<!--              <input-->
<!--                type="search"-->
<!--                class="form-control col-12 py-3"-->
<!--                id="search"-->
<!--                aria-describedby="search"-->
<!--                name="search"-->
<!--                placeholder="Search in E-Books"-->
<!--              />-->
<!--            </div>-->
<!--          </form>-->
          <!-- information s -->
          <!-- @foreach($books as $book)
<!--          <div class="row col-12 g-4 my-3">-->
<!--            <div class="col-md-5 col-12 text-center">-->
<!--              <img-->
<!--                src="{{url('storage/book/imgs/'.basename($book->img))}}"-->
<!--                alt=""-->
<!--                class="w-75"-->
<!--              />-->
<!--            </div>-->
<!--            <div-->
<!--              class="col-md-6 col-12 d-flex flex-column justify-content-between"-->
<!--            >-->
<!--            <div>-->
<!--              <h1 class="Roboto textGrey fw-bold h1"> {{ $book->name }}</h1>-->
              
<!--              <p class="Roboto textGrey fw-lighter pe-5 fs-6 mb-5">-->
<!--                    {!!  $book->description  !!}-->
<!--              </p>-->
<!--            </div>-->

<!--              <div-->
<!--                class="d-flex flex-column justify-content-end align-items-end"-->
<!--              >-->
<!--                <p class="Roboto textGrey fw-bold fs-6  me-4">-->
<!--                  Price: {{ $book->price }} $-->
<!--                </p>-->
<!--                <div>-->
<!--                  <a-->
<!--                    href="{{  $book->book_link  }}"-->
<!--                    class="btn bgorange btnorange text-white Roboto"-->
<!--                    >Buy On Amazon</a-->
<!--                  >-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          @endforeach -->-->

<!--<div class="container mb-5">-->
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


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<script src="{{asset('layV3/script/navbarFixScript.js')}}"></script>
@endsection


