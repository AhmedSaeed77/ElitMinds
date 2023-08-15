@extends('layouts.app-1')
@section('pageTitle') Update lang @endsection
@section('subheaderTitle') Update lang @endsection
@section('subheaderNav')
   
@endsection
@section('content')
  <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <form  id="addkey">
                           
                            @csrf
                            <input type="text" name="key" value="">
                            <button  type="submit" class="btn btn-success mr-2">Submit</button>
                        </form>
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label"> lang </h3>
                         
                    </div>
                </div>
                <div class="card-body">
                   <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                      <th class="wd-15p border-bottom-0"> id</th>
                                            <th class="wd-15p border-bottom-0"> المفتاح </th>
                                            <th class="wd-15p border-bottom-0"> الترجمة </th>
                                            <th class="wd-15p border-bottom-0">  تعديل </th>
                        </tr>
                        </thead>

                        <tbody>

                          @foreach($lang_data as $count=>$language)
                                    <tr id="lang-{{$language['key']}}">
                                        <td>{{$count+1}}</td>
                                        <td>
                                            <input type="text" name="key[]" value="{{$language['key']}}" hidden>
                                            <label>{{$language['key']}}</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="value[]"
                                                   id="value-{{$count+1}}"
                                                   value="{{$language['value']}}">
                                        </td>
                                        <td style="width: 100px">
                                            <button type="button"
                                                    onclick="update_lang('{{$language['key']}}',$('#value-{{$count+1}}').val())"
                                                    class="btn btn-primary"> update
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


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
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endif
     <script>
         
            function update_lang(key, value) {

            data =  {
                    key: key,
                    value: value
                },
                // $('#loading').show();
            axios.post("{{route('translate_submit',[$lang])}}", data).then(response => {
                   $('#loading').hide();
                            swal({
                                title: 'تم الحفظ بنجاح',
                                type: 'success',
                                confirmButtonText: 'موافق',
                            });
                    }).catch(response => {
                        swal({
                            title: response.response.message,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                    });
            };
            document.getElementById("addkey").addEventListener("submit", function(event){
             event.preventDefault();
              let formData = new FormData(document.getElementById('addkey'));

                axios.post("{{route('translate_add')}}", formData).then(response => {
                $('#loading').hide();
                            swal({
                                title: 'تم الحفظ بنجاح',
                                type: 'success',
                                confirmButtonText: 'موافق',
                            });
                    }).catch(response => {
                        swal({
                            title: response.response.message,
                            type: 'warning',
                            confirmButtonText: 'موافق',
                        });
                    });
            });
            


</script>



@endsection
