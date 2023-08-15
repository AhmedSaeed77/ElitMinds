@extends('layouts.app-1')
@section('pageTitle') All Books @endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label">Books</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>Book</th>
                            <th>Price</th>
                            <th>Original price</th>
                            <th>Discount</th>
                            <th>Extension Price</th>
                            <th>Number of Exams</th>
                            <th>Number of Questions</th>
                            <th>Edit</th>
                            <!--<th>Action</th>-->
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($books) > 0)
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->price}} $</td>
                                    <td>{{$book->original_price}} $</td>
                                    <td>{{$book->discount}} %</td>
                                    <td>{{$book->extension_price }} $</td>
                                    <td>{{$book->num_exams }} </td>
                                    <td>{{$book->num_questions }} </td>
                                    <td><a href="{{ route('books.edit', $book->id) }}">Edit</a></td>
                                    
                                   
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
