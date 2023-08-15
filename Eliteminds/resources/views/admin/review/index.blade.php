@extends('layouts.app-1')
@section('pageTitle') All Reviews @endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label">Reviews</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>course</th>
                            <th>Rate</th>
                            <th>Country</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($reviews) > 0)
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->fname}}  {{$review->lname}}</td>
                                    <td>{{$review->comment}} </td>
                                    <td>{{$review->coursee_name}} </td>
                                    <td>{{$review->rates}} </td>
                                    <td>{{$review->Country_name}} </td>
                                    <td><a href="{{ route('review.destroy', $review->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <p>No Content !</p>
                        @endif


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <script src="{{asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')}}"></script>
@endsection
