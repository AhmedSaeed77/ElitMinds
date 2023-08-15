@extends('layouts.app-1')

@section('css') 

<style>
    .red:hover{
        color:red !important;
    }
    .green:hover{
        color:#1BC5BD !important;
    }
</style>
@endsection

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
                        <h3 class="card-label">Messages</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <!--<th>Message</th>-->
                            <th style="width:10%">Action</th>
                        </tr>
                        </thead>
                        
                        <tbody>

                        @if(count($messages) > 0)
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->fullname}}</td>
                                    <td>{{$message->email}} </td>
                                    <!--<td>{{$message->message}} </td>-->
                                    <td style="display:flex !important; gap:18px;">
                                        <a href="{{ route('message.deletemesasage', $message->id) }}"><i class="fa fa-trash red"></i></a>
                                        <a href="" data-toggle="modal" data-target="#view{{ $message->id }}" ><i class="fa fa-eye green"></i></a>
                                        <a href="{{ route('message.sendreply', $message->id) }}" data-toggle="modal" data-target="#email{{ $message->id }}"  ><i class="fa fa-reply green"></i></a>
                                    </td>
                                </tr>
                        
                                <div class="modal fade" id="view{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">content of message </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">{{ $message->message }}</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="email{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">content of message </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('message.sendreply', $message->id) }}" method="post" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"value="{{ $message->id }}">
                                                        <label for="Name" class="mr-sm-2">Reply:</label>
                                                        <textarea  class="form-control"  name="reply"  /></textarea>
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
