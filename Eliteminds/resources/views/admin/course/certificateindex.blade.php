@extends('layouts.app-1')
@section('pageTitle') All Packages @endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label">Certificates</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @if(count($coursedetails) > 0)
                            @foreach($coursedetails as $coursedetail)
                                <tr>
                                    <td >{{$coursedetail->id}}</td>
                                    <td class="text-center">{{$coursedetail->certificatename}}</td>
                                    <td class="text-center" style="display:flex !important; gap:18px;">
                                        <a href="{{ route('certificate.certificatedelete', $coursedetail->id) }}" data-toggle="modal" data-target="#email{{ $coursedetail->id }}" ><i class="fa fa-trash red"></i></a>
                                    </td>
                                </tr>
                                    <div class="modal fade" id="email{{ $coursedetail->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Warning </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('certificate.certificatedelete', $coursedetail->id) }}" method="post" >
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="id" type="hidden" name="id" class="form-control"value="{{ $coursedetail->id }}">
                                                                <p>Are You Sure Delete ??</p>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                                            <button type="submit" class="btn btn-success">send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    
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
