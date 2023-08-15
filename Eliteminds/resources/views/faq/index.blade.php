@extends('layouts.layoutV2')
@section('head')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="{{ asset('helper/css/faq.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        .main-text{
            color:var(--text-primary);
        }
        .accent-text{
            color:var(--text-accent)
        }
        .accordion-toggle.collapsed svg{
            transform: rotate(0deg);
        }
        .accordion-toggle svg{
            transform: rotate(45deg);
            transition:all 0.3s ease-in-out;
        }
        .page-title-container h1{
            font-size:2rem;
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    <div class="container ps-4">
        <!-- Title Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 ">
                    <h1 class="main-text" id="title">Frequently asked questions</h1>
                    <p  class="my-4 main-text" style="font-weight: 400;font-size: 16px;max-width:614px">Have a different question and can't find the answer you're looking for? Reach out to our
                    support team by <a href="mailto:elitminds.com" style="color: #F58634;"> sending us an email</a> and we'll get back to you as soon as we can.</p>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Title End -->

        <div class="row">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-12 col-xxl-12 mb-5">
                <div id="accordionCards">
                    <div class="mb-n2">
                        @foreach (\App\FAQ::orderBy('created_at', 'desc')->get() as $q)
                            @php
                                $faq = Transcode::evaluate($q);
                            @endphp
                            <div class="row card d-flex py-3">
                                <div class="d-flex collapsed accordion-toggle" role="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOneCards-{{ $q->id }}" aria-expanded="false"
                                    aria-controls="collapseOneCards-{{ $q->id }}">
                                    <div class="card-body">
                                        <!-- <span class="addQuestion">+</span> -->
                                        <div class="btn btn-link list-item-heading p-0 faq-title"> 
                                            <button type="button"
                                                class="card-btn btn" data-toggle="collapse" data-target="#collapseOne">
                                                <b class="header-title float-left">
                                                </b>
                                                <!-- <i class="fas fa-plus d-inline-block"></i> -->
                                                <div class="d-flex align-items-center me-3">
                                                    <svg class="plus"  width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 1V15M1 8H15" stroke="#F58634" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>


                                            </button>
                                            <span class="main-text"  style="font-weight: 600;font-size: 18px; font-family: 'Roboto'; margin-left:15px max-width:200px">
                                            {{ $faq['title'] }}
                                            </span>
                                            </div>
                                    </div>
                                </div>
                                <div id="collapseOneCards-{{ $q->id }}" class="collapse"
                                    data-bs-parent="#accordionCards" style="">
                                    <div class="card-body accordion-content pt-0 row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 faq-content" >
                                            <div class="main-text">
                                                {!! $faq['contant'] !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- Left Side End -->

        </div>
    </div>
@endsection
