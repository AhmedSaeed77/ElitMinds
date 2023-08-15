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

.rating-card {
  display: flex;
  justify-content: center;
  align-items: center;
  row-gap:10px;
  height: 130px !important;
  width: 115px !important;
}
.card-img-overlay{
  cursor: pointer;
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
                                        {{__('messages.rating')}} :
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
                                        {{__('messages.title')}} :
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{__('messages.feedback')}} :
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="feedback" id="feedback" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-row-reverse">
                                    <input type="submit" value="{{__('messages.send')}}" class="btn btn-outline-primary">
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
            class="mb-0 pb-0 display-4"
            id="title"
            style="font-size: 2rem; font-weight: 700"
          >
            Feel free to drop us your feedback
          </h1>
          <p style="font-size: 1rem; font-weight: 400" class="my-3">
            Thank you for taking the time to provide feedback! <br />
            We appreciate hearing from you and will review your comments
            carefully 😍
          </p>
        </div>
        <!-- Title End -->
      </div>
    </div>
    <div class="row">
      <h1 class="mb-3 pb-0" style="font-size: 1rem; font-weight: 700">
         {{__('messages.rating')}} :
      </h1>
      <div class="col-4 col-md-2 mb-5">
        <div
          class="card hover-img-scale-up rating-card"
        >
          <div
            class="card-img-overlay d-flex flex-column"
            style="background-color: #ffffff"
          >
            <div class="d-flex flex-column align-items-center gap-2">
              <img
                style="width: 2rem"
                src="{{ asset('images/feedback-images/5.jpg') }}"
                class="card-img scale"
                alt="card image"
              />
              <div>
                <p style="color: #2c2f32 font-weight: 500; font-size: 16px; text-transfor:capitalize;">terrible</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 col-md-2 mb-5">
        <div
          class="card hover-img-scale-up rating-card"
        >
          <div
            class="card-img-overlay d-flex flex-column"
            style="background-color: #ffffff"
          >
            <div class="d-flex flex-column align-items-center gap-2">
              <img
                style="width: 2rem"
                src="{{ asset('images/feedback-images/4.jpg') }}"
                class="card-img scale"
                alt="card image"
              />
              <div>
                <p style="color: #2c2f32 font-weight: 500; font-size: 16px; text-transfor:capitalize;">bad</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 col-md-2 mb-5">
        <div
          class="card hover-img-scale-up rating-card"
        >
          <div
            class="card-img-overlay d-flex flex-column"
            style="background-color: #ffffff"
          >
            <div class="d-flex flex-column align-items-center gap-2">
              <img
                style="width: 2rem"
                src="{{ asset('images/feedback-images/3.jpg') }}"
                class="card-img scale"
                alt="card image"
              />
              <div>
                <p style="color: #2c2f32 font-weight: 500; font-size: 16px; text-transfor:capitalize;">Okay</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 mb-5">
        <div
          class="card hover-img-scale-up rating-card"
        >
          <div
            class="card-img-overlay d-flex flex-column"
            style="background-color: #ffffff"
          >
            <div class="d-flex flex-column align-items-center gap-2">
              <img
                style="width: 2rem"
                
                src="{{ asset('images/feedback-images/4.jpg') }}"
                class="card-img scale"
                alt="card image"
              />
              <div>
                <p style="color: #2c2f32 font-weight: 500; font-size: 16px; text-transfor:capitalize;">Good</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-2 mb-5">
        <div
          class="card hover-img-scale-up rating-card"
        >
          <div
            class="card-img-overlay d-flex flex-column"
            style="background-color: #ffffff"
          >
            <div class="d-flex flex-column align-items-center gap-2">
              <img
                style="width: 2rem"
                src="{{ asset('images/feedback-images/1.jpg') }}"
                class="card-img scale"
                alt="card image"
              />
              <div>
                <p style="color: #2c2f32 font-weight: 500; font-size: 16px; text-transfor:capitalize;">Amazing</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div
        class="card mb-5 bg-transparent"
        style="box-shadow: none !important"
      >
        <div class="card-body p-0">
          <form class="d-flex flex-column gap-4 mb-4" action="{{ route('user.feedback.store') }}" method="post">
              @csrf
            <div class="d-flex flex-column  gap-2 feedback-input">
              <label style="font-size:16px; font-weight:600;">   {{__('messages.title')}} :</label>
              <input
                class="form-control"
                placeholder="FeebBack About!"
                style="background-color: #eaebeb" name="title"
              />
            </div>
            <div class="d-flex flex-column gap-2 feedback-input">
              <label style="font-size:16px; font-weight:600;">Course</label>
              <select
                class="select-single-no-search-filled form-control"
                style="background-color: #eaebeb"
                data-placeholder="course" name="course_id"
              >
                <option  selected>{{__('messages.select_course')}} : </option>
                @foreach($packages as $p)
                <option value="2"> {{ $p->name }} </option>
                @endforeach
                
              </select>
            </div>
            <div class="d-flex flex-column  gap-2 feedback-input">
              <label style="font-size:16px; font-weight:600;">{{__('messages.feedback')}} :</label>
              <textarea
                rows="6"
                class="form-control"
                placeholder="Type something here...."
                style="background-color: #eaebeb" name="feedback"
              ></textarea>
            </div>
            <button type="submit"
            class="btn sendfeedback"
            style="background-color: #f58634; padding:13px 30px;font-weight: 500;font-size: 16px;"
          >
         {{__('messages.Send_Feedback')}}     
          </button> 
          
          </form>
          
        </div>
      </div>
      <!-- Public Info End -->
    </div>
    <!-- Content End -->
  </div>
@endsection
@section('jscode')
    <script src="{{ asset('helper/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('helper/js/account.settings.js') }}"></script>
@endsection