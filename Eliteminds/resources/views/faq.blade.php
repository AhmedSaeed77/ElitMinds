@extends('layouts.layoutV2')
@section('head')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="{{ asset('helper/css/faq.css') }}">
@endsection
@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Frequently asked questions</h1>

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
                            <div class="row card d-flex">
                                <div class="d-flex collapsed" role="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOneCards-{{ $q->id }}" aria-expanded="false"
                                    aria-controls="collapseOneCards-{{ $q->id }}">
                                    <div class="card-body">
                                        <!-- <span class="addQuestion">+</span> -->
                                        <div class="btn btn-link list-item-heading p-0 faq-title"> <button type="button"
                                                class="card-btn btn" data-toggle="collapse" data-target="#collapseOne">

                                                <b class="header-title float-left">
                                                </b>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="fas fa-plus"></i>
                                            </button>{{ $faq['title'] }}</div>
                                    </div>
                                </div>
                                <div id="collapseOneCards-{{ $q->id }}" class="collapse"
                                    data-bs-parent="#accordionCards" style="">
                                    <div class="card-body accordion-content pt-0 row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 faq-content">
                                            <p class="m-0">
                                                {!! $faq['contant'] !!}
                                            </p>
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

@section('jscode')
    <script>
        $('.card-btn').click(function() {
            $(this).find('i').toggleClass('fas fa-plus fas fa-minus')
        });
    </script>
@endsection
