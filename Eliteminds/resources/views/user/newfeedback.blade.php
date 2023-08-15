@extends('layouts.layoutV2')

@section('head')
<link rel="stylesheet" href="{{ asset('helper/css/feedback.css') }}">
<link rel="stylesheet" href="{{ asset('helper/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{ asset('helper/css/select2-bootstrap4.min.css')}}" />
<style>
    .fancy-checkbox{
        font-size: 10px;
        cursor: pointer;
        
    }

    .fancy-checkbox input[type="checkbox"],
    .fancy-checkbox .checked {
        display: none;
    }
    
    .fancy-checkbox input[type="checkbox"]:checked ~ .checked
    {
        display: inline-block;
        
    }
    
    .fancy-checkbox input[type="checkbox"]:checked ~ .unchecked
    {
        display: none;
    }
    .video-title{
        padding-left: 15px;
    }
    .video-title{
        color: #333;

    }
    .video-title:hover, .video-title:active{
        color: #333 !important;
        text-decoration: none !important;
    }
    .rate {
    display: flex;
    justify-content: center;
    flex-direction: row-reverse;
    
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:40px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
    
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


/* New styles */
.feedback-form input[type="radio"] {
  display: none;
}
.rating-cards{
  display:flex;
  justify-content: space-between;
  row-gap:24px;
}
.rating-card {
  display: flex;
  justify-content: center;
  align-items: center;
  row-gap:10px;
  height: 130px ;
  width: 115px ;
  cursor: pointer;
  background:var(--bg-primary) ;
  transition:all 0.3s ease-in-out;
}
.input-label{
  font-weight: 600;
  font-size: 16px;
  color:var(--text-primary)
}
.rating-card svg{
  transition:all 0.3s ease-in-out;
  color:var(--text-accent)
}
.rating-card:hover svg{
transform: translateY(-10px)
}
.card-feeling{
  color:var(--text-primary);
  font-weight: 500; 
  font-size: 16px; 
  text-transform: capitalize;
}

.main-text, input,input::placeholder, select, textarea{
  color:var(--text-primary) !important;
}
input, textarea{
 background: var(--bg-input) !important;
}
input, select{
  height:56px !important;
  background: #EAEBEB;
  box-shadow: 0px 1px 0px rgba(44, 47, 50, 0.06);
  border-radius: 14px;
}
.form-control:focus{
  border-color: var(--text-accent);
}
.feedback-form {
  width: 100%;
  max-width:700px;
}
@media screen and (min-width:992px) and (max-width:1100px){
  .feedback-form {
  width: 75%;
} 
@media screen and (min-width:1101px){
  .feedback-form {
  width: 65%;
} 
}
}
.feedback-form input[type="radio"]:checked+label.rating-card {
  background-color: var(--text-accent);
  color:#fff;
}
.feedback-form input[type="radio"]:checked+label.rating-card .card-feeling {
  color:#fff;
}
.feedback-form input[type="radio"]:checked+label.rating-card svg {
  color:#fff;
}
.sendfeedback {
  display: block;
  margin-left: auto;
}
.feedback-input input{
    background-color: #eaebeb; 
    border:none; 
    padding:15px;
}

@media screen and (max-width:768px){
  .card-feeling{
    display:none;
    }
  .rating-card {
    width:63px;
    height:63px;
  }
  .rating-card:hover svg{
  transform: translateY(0px)
  }
  .feedback-form {
      width: 100%;
  }
}
</style>


@endsection


@section('contents')
    <div class="container" style="min-height: 80vh;">
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="card light bordered">
                    <div class="card-header">
                        <div class="row">
                            <!-- Title Start -->
                            <div class="col-12 col-md-7">
                                <h1 class="mb-0 pb-0 display-4" id="title">{{__('User/feedback.feedback')}}</h1>
                            </div>
                            <!-- Title End -->
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{route('user.feedback.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{__('User/feedback.rating')}} :
                                    </div>
                                    <div class="col-md-9 rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="{{__('User/feedback.5stars')}}" >5 stars</label>


                                        <input type="radio" id="star4"  name="rate" value="4" />
                                        <label for="star4" title="{{__('User/feedback.4stars')}}" >4 stars</label>


                                        <input type="radio" id="star3"   name="rate" value="3" />
                                        <label for="star3" title="{{__('User/feedback.3stars')}}">3 stars</label>


                                        <input type="radio" id="star2"  name="rate" value="2" />
                                        <label for="star2" title="{{__('User/feedback.2stars')}}" >2 stars</label>


                                        <input type="radio" id="star1"  name="rate" value="1" />
                                        <label for="star1" title="{{__('User/feedback.1stars')}}">1 stars</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{__('User/feedback.title')}} :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{__('User/feedback.feedback')}} :
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="feedback" id="feedback" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-row-reverse">
                                    <input type="submit" value="{{__('User/feedback.send')}}" class="btn btn-outline-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                @foreach(\App\Feedback::where('user_id', Auth::user()->id)->where('disable', 0)->orderBy('created_at', 'desc')->get() as $feed)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
                                <div style="width: 100%;">
                                    <div class="uk-card uk-card-primary uk-card-body">
                                        <span class="uk-card-title">{{$feed->created_at->diffForHumans()}}</span>
                                        <a href="{{route('user.feedback.delete', $feed->id)}}" style="float: {{app()->getLocale() == 'ar'? 'left': 'right'}}; margin: 0 5px 0 0;">{{__('User/feedback.delete')}}</a>
                                        <h5 class="my-3">{{$feed->feedback}}</h5>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
      <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-">
          <h1
            class="main-text"
            id="title"
            style="font-size: 2rem; font-weight: 700;"
          >
            Feel free to drop us your feedback
          </h1>
          <p style="font-size: 16px;" class="my-3 main-text">
            Thank you for taking the time to provide feedback! <br />
            We appreciate hearing from you and will review your comments
            carefully 😍
          </p>
        </div>
        <!-- Title End -->
      </div>
    </div>
    <!-- form  -->
    <form class="feedback-form" action="{{ route('user.feedback.store') }}" method="post">
        @csrf
      <div class="container">
        <div class="row">
          <h1 class="mb-3 pb-0 input-label" >
            Rating
          </h1>
          <div class="rating-cards">
            <div>
              <input type="radio" name="rate" id="rate-1" value="1">
              <label
                class="card rating-card"
                for="rate-1"
              >
                <div
                  class=" d-flex flex-column"
                >
                  <div class="d-flex flex-column align-items-center gap-2">
                    <!-- <img
                      style="width: 2rem"
                      src="{{ asset('images/feedback-images/5.jpg') }}"
                      class="card-img scale"
                      alt="card image"
                    /> -->
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23.4 23.4C23.4 23.4 21 20.2 17 20.2C13 20.2 10.6 23.4 10.6 23.4M25 12.584C24.368 13.36 23.504 13.8 22.6 13.8C21.696 13.8 20.856 13.36 20.2 12.584M13.8 12.584C13.168 13.36 12.304 13.8 11.4 13.8C10.496 13.8 9.656 13.36 9 12.584M33 17C33 25.8368 25.8365 33 17 33C8.16344 33 1 25.8368 1 17C1 8.1632 8.16344 1 17 1C25.8365 1 33 8.1632 33 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>

                    <div>
                      <p class="card-feeling">terrible</p>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            <div>
            <input type="radio" name="rate" id="rate-2" value="2">
              <label
                class="card  rating-card"
                for="rate-2"
              >
                <div
                  class=" d-flex flex-column"
                >
                  <div class="d-flex flex-column align-items-center gap-2">
                    <!-- <img
                      style="width: 2rem"
                      src="{{ asset('images/feedback-images/4.jpg') }}"
                      class="card-img scale"
                      alt="card image"
                    /> -->
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23.4 23.4C23.4 23.4 21 20.2 17 20.2C13 20.2 10.6 23.4 10.6 23.4M21.8 12.2H21.816M12.2 12.2H12.216M33 17C33 25.8365 25.8365 33 17 33C8.16344 33 1 25.8365 1 17C1 8.16352 8.16344 1 17 1C25.8365 1 33 8.16352 33 17ZM22.6 12.2C22.6 12.6418 22.2418 13 21.8 13C21.3582 13 21 12.6418 21 12.2C21 11.7582 21.3582 11.4 21.8 11.4C22.2418 11.4 22.6 11.7582 22.6 12.2ZM13 12.2C13 12.6418 12.6418 13 12.2 13C11.7582 13 11.4 12.6418 11.4 12.2C11.4 11.7582 11.7582 11.4 12.2 11.4C12.6418 11.4 13 11.7582 13 12.2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    <div>
                      <p class="card-feeling">bad</p>
                    </div>
                  </div>
                </div>
              </label>
            </div>

            <div>
            <input type="radio" name="rate" id="rate-3" value="3">
              <label
                class="card  rating-card"
                for="rate-3"
              >
                <div
                  class=" d-flex flex-column"
                >
                  <div class="d-flex flex-column align-items-center gap-2">
                  <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6 21.8H23.4M21.8 12.2H21.816M12.2 12.2H12.216M33 17C33 25.8368 25.8365 33 17 33C8.16344 33 1 25.8368 1 17C1 8.1632 8.16344 1 17 1C25.8365 1 33 8.1632 33 17ZM22.6 12.2C22.6 12.6416 22.2418 13 21.8 13C21.3582 13 21 12.6416 21 12.2C21 11.7584 21.3582 11.4 21.8 11.4C22.2418 11.4 22.6 11.7584 22.6 12.2ZM13 12.2C13 12.6416 12.6418 13 12.2 13C11.7582 13 11.4 12.6416 11.4 12.2C11.4 11.7584 11.7582 11.4 12.2 11.4C12.6418 11.4 13 11.7584 13 12.2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <div>
                      <p class="card-feeling">Okay</p>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            <div>
            <input type="radio" name="rate" id="rate-4" value="4">

              <label
                class="card  rating-card"
                for="rate-4"
              >
                <div
                  class=" d-flex flex-column"
                >
                  <div class="d-flex flex-column align-items-center gap-2">
                  <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.6 20.2C10.6 20.2 13 23.4 17 23.4C21 23.4 23.4 20.2 23.4 20.2M21.8 12.2H21.816M12.2 12.2H12.216M33 17C33 25.8368 25.8365 33 17 33C8.16344 33 1 25.8368 1 17C1 8.1632 8.16344 1 17 1C25.8365 1 33 8.1632 33 17ZM22.6 12.2C22.6 12.6416 22.2418 13 21.8 13C21.3582 13 21 12.6416 21 12.2C21 11.7584 21.3582 11.4 21.8 11.4C22.2418 11.4 22.6 11.7584 22.6 12.2ZM13 12.2C13 12.6416 12.6418 13 12.2 13C11.7582 13 11.4 12.6416 11.4 12.2C11.4 11.7584 11.7582 11.4 12.2 11.4C12.6418 11.4 13 11.7584 13 12.2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

                    <div>
                      <p class="card-feeling">Good</p>
                    </div>
                  </div>
                </div>
              </label>
            </div>
            <div>
            <input type="radio" name="rate" id="rate-5" value="5">

              <label
                class="card  rating-card"
                for="rate-5"
              >
                <div
                  class=" d-flex flex-column"
                >
                  <div class="d-flex flex-column align-items-center gap-2">
                  <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.8 12.2H21.816M12.2 12.2H12.216M33 17C33 25.8365 25.8365 33 17 33C8.16344 33 1 25.8365 1 17C1 8.16352 8.16344 1 17 1C25.8365 1 33 8.16352 33 17ZM22.6 12.2C22.6 12.6418 22.2418 13 21.8 13C21.3582 13 21 12.6418 21 12.2C21 11.7582 21.3582 11.4 21.8 11.4C22.2418 11.4 22.6 11.7582 22.6 12.2ZM13 12.2C13 12.6418 12.6418 13 12.2 13C11.7582 13 11.4 12.6418 11.4 12.2C11.4 11.7582 11.7582 11.4 12.2 11.4C12.6418 11.4 13 11.7582 13 12.2ZM17 25.8C21.0008 25.8 24.2 22.8672 24.2 20.2H9.8C9.8 22.8672 12.9992 25.8 17 25.8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

                    <div>
                      <p class="card-feeling">Amazing</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div
            class="card mb-5 bg-transparent"
            style="box-shadow: none !important"
          >
            <div class="card-body p-0">
              <div class="d-flex flex-column gap-4 mb-4">
                <div class="d-flex flex-column  gap-2 feedback-input">
                  <label style="font-size:16px; font-weight:600; margin-top:30px" class="input-label">Title</label>
                  <input
                    class="form-control"
                    placeholder="Feedback about"
                    style="background-color: #eaebeb; border:none"
                    name="title"
                  />
                </div>
                <div class="d-flex flex-column gap-2 feedback-input">
                  <label class="input-label">Course</label>
                  <select
                    class="form-select"
                    style="background-color: #eaebeb; border:none; padding:15px"
                    data-placeholder="course"
                    name="course_id"
                  >
                    <option  selected value=""  class="main-text">Select course</option>
                    @foreach($packages as $p)
                    <option value=""> {{ $p->name }} </option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="d-flex flex-column  gap-2 feedback-input">
                  <label  class="input-label">Feedback</label>
                  <textarea
                    rows="11"
                    class="form-control"
                    placeholder="Type something here...."
                    style="background-color: #eaebeb; padding:16px"
                    name="feedback"
                  ></textarea>
                </div>
              </div>
              <button
                class="btn sendfeedback" type="submit"
                style="background-color: #f58634; padding:13px 30px;font-weight: 500;font-size: 16px;"
              >
                Send Feedback
              </button>
            </div>
          </div>
      </div>
    </form>

  </div>
@endsection
@section('jscode')
    <script src="{{ asset('helper/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('helper/js/account.settings.js') }}"></script>
@endsection