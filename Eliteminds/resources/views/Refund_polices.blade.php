@extends('layouts.public')


@section('content')

<div class="section page-banner">

    <img class="shape-1 animation-round" src="{{asset('index-assets/images/shape/shape-8.png')}}" alt="Shape">

    <img class="shape-2" src="{{asset('index-assets/images/shape/shape-23.png')}}" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Refund polices</li>
            </ul>
            <h2 class="title"><span>polices</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

    <!-- Shape Icon Box Start -->
    <div class="shape-icon-box">

        <img class="icon-shape-1 animation-left" src="{{asset('index-assets/images/shape/shape-5.png')}}" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-badge"></i>
            </div>
        </div>

        <img class="icon-shape-2" src="{{asset('index-assets/images/shape/shape-6.png')}}" alt="Shape">

    </div>
    <!-- Shape Icon Box End -->

    <img class="shape-3" src="{{asset('index-assets/images/shape/shape-24.png')}}" alt="Shape">

    <img class="shape-author" src="{{asset('index-assets/images/author/author-11.jpg')}}" alt="Shape">

</div>

<div class="section section-padding">
    <div class="container">

        <!-- Contact Wrapper Start -->
        <div class="contact-wrapper">
            {!! \App\PaypalConfig::all()->first()->Refund_polices !!}
        </div>
        <!-- Contact Wrapper End -->

    </div>
</div>
    
@endsection