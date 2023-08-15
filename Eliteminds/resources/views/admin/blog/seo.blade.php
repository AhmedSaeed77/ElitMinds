@extends('layouts.app-1')
@section('pageTitle') Update seo Post @endsection
@section('subheaderTitle') Update seo Post @endsection
@section('subheaderNav')
   
@endsection
@section('content')
    <div class="row" id="app-1" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">
            <div class="form-horizontal" style="background: white; padding: 30px 15px;">
                
                <div class="form-group row">
                        <label class="col-3 col-form-label" for="lang"> post </label>
                        <select class="form-control" v-model.number="post_id" @change="getPostData">
                            <option value="" > select One </option>
                            @foreach(\App\Post::get(); as $poppost)
                                <option value="{{ $poppost->id }}" > {{ $poppost->title }} </option>
                            @endforeach
                        </select>
                </div>
                <form id="seodata">
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="title" > meta_title En :</label>
                            <div class="col-7">
                                <input type="text" class="form-control input-sm" name='meta_title' v-model="meta_title"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="title" > meta_title ar </label>
                            <div class="col-7">
                                <input type="text" class="form-control input-sm" v-model="meta_title_ar" name="meta_title_ar"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label" for="meta_d"><b> Meta keywords En </label>
                                    <textarea class="form-control" cols="40"  v-model="keywords" name="keywords">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label" for="meta_d"><b> Meta Keywords Ar </label>
                                    <textarea class="form-control" cols="40"  v-model="keywords_ar" name="keywords_ar">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label" for="meta_d"><b> meta_description En </label>
                                    <textarea class="form-control" cols="40"  v-model="meta_description" name="meta_description">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label" for="meta_d"><b> meta_description Ar    </label>
                                    <textarea class="form-control" cols="40"  v-model="meta_description_ar" name="meta_description_ar">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group control-label">
                            <div class="col-md-2">
                                <input type="button" @click="saveupdate" value="Save"  class="btn btn-success">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endif
    <script>
        const app = new Vue({
            el: '#app-1',
            data: {
                post_id:'',
                meta_title : '',
                meta_title_ar:'',
                data_id:'',
                keywords:'',
                keywords_ar:'',
                meta_description:'',
                meta_description_ar:''
            },
            mounted() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
            },
            methods: {
                getPostData: function(){
                    KTApp.blockPage();
                    url = '{{ route('blog.gatData', ':id')}}'
                    url = url.replace(':id', app.post_id)
                    $.ajax ({
                        type: 'POST',
                        url: url,
                        success: function(res){
                            setTimeout(() => {
                                KTApp.unblockPage();
                                app.meta_title = res['meta_title'];
                                app.data_id = res['id'];
                                app.meta_title_ar = res['meta_title_ar'];
                                app.meta_description = res['meta_description'];
                                app.meta_description_ar = res['meta_description_ar'];
                                app.keywords = res['keywords'];
                                app.keywords_ar = res['keywords_ar'];
                            }, 1500);
                        },
                        error: function(err){
                            KTApp.unblockPage();
                            app.showError('ops, something went wrong.');
                        }
                    });
                },
                showError: function(err){
                    swal({
                        text: err,
                        type: "warning",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        confirmButtonClass: "btn font-weight-bold btn-light"
                    }).then(function () {
                        KTUtil.scrollTop();
                    });
                },
                saveupdate:function(){
                    let formData = new FormData(document.getElementById('seodata'));
                    formData.append('id', app.data_id)
                    axios.post('{{ route('blog.updateSeoData') }}', formData).then(response => {
                                swal({
                                    title: 'success',
                                    type: 'success',
                                    confirmButtonText: 'موافق',
                                });
                        
                    }).catch(response => {
                        KTApp.unblockPage();
                        app.showError('ops, something went wrong.');
                    })
                }
            }
        });
    </script>
@endsection
