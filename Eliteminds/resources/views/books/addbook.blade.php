@extends('layouts.app-1')

@section('pageTitle') Add Book @endsection
@section('subheaderTitle') Add Book @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="document.getElementById('packageForm').submit()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Submit</a>
    <!--end::Button-->

    <!--begin::Button-->
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('books.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>
                <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Cancel</a>
    <!--end::Button-->
@endsection
@section('content')
    <div class="card card-custom" id="app1">
        <!--begin::Form-->
        <form method="POST" id="packageForm" action="{{route('books.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group  row mb-0 ">
                    <label class="col-2 col-form-label" for="example-text-input">Book Name</label>
                    <div class="col-5">
                        <input class="form-control" type="text" name="name" placeholder="Book Name" id="example-text-input" value="{{old('name')}}"/>
                    </div>
                   
                </div>
                <div class="form-group  row mb-0 "style="margin-top:10px;">
                    <label class="col-2 col-form-label" for="example-text-input">Book Name [ar]</label>
                    
                    <div class="col-5">
                        <input class="form-control" type="text" name="name_ar" placeholder="Book Name_ar"  value="{{old('name_ar')}}"/>
                    </div>
                </div>
                <div class="form-group  row mb-0">
                   
                    <div class="col-6 form-group mb-0" style="">
                        <strong>
                            <label class=" col-form-label" for="example-text-input6">Extension Price ($)</label>
                            <input class="form-control" type="text" value="0" name="extension_price" placeholder="Extension Price "
                                   id="example-text-input6" value="{{old('extension_price')}}"/>
                        </strong>
                    </div>
                    <div class="col-6 form-group mb-0" style="">
                        <strong>
                            <label class=" col-form-label" for="example-text-input6">Book Link</label>
                            <input class="form-control" type="text"  name="book_link" placeholder="Link "
                                   id="example-text-input6" value="{{old('book_link')}}"/>
                        </strong>
                    </div>
                </div>
                
                <div class="form-group row mb-0"   style="margin-top:30px;">
                    <div class="col-6 form-group mb-0">
                        <strong>
                            <label class=" col-form-label">Book Image (large) : </label>
                            <label class=" col-form-label"> perfect size must be : 300px * 478px  </label>
                        </strong>
                        <div class="custom-file">
                            <!--<input type="file" class="custom-file-input" name="img_large" id="img">-->
                            <input type="file" class="custom-file-input" name="img" id="img_medium">
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                    <!--<div class="col-6 form-group mb-0">-->
                    <!--    <strong>-->
                    <!--        <label class=" col-form-label">Book Image (medium) : </label>-->
                    <!--    </strong>-->
                    <!--    <div class="custom-file">-->
                    <!--        <input type="file" class="custom-file-input" name="img" id="img_medium">-->
                    <!--        <label class="custom-file-label" for="img_medium">Choose file</label>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <!--<div class="form-group row mb-10">-->
                    <!--<div class="col-6 form-group mb-10">-->
                    <!--    <strong>-->
                    <!--        <label class=" col-form-label">Book Image (small): </label>-->
                    <!--    </strong>-->
                    <!--    <div class="custom-file">-->
                    <!--        <input type="file" class="custom-file-input"  name="img_small" id="img_small">-->
                    <!--        <label class="custom-file-label" for="img_small">Choose file</label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-6 form-group mb-10">-->
                    <!--    <strong>-->
                    <!--        <label class=" col-form-label">Package Preview Video (optional): </label>-->
                    <!--    </strong>-->
                    <!--    <div class="custom-file">-->
                    <!--        <input type="file" class="custom-file-input" name="preview_video" id="preview_video">-->
                    <!--        <label class="custom-file-label" for="preview_video">Choose file</label>-->
                    <!--    </div>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pricing
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach(\App\Zone::all() as $zone)
                            <div class="form-group  row mb-0">
                                <div class="col-6 form-group mb-0">
                                    <strong>
                                        <label class=" col-form-label" for="example-text-input1"><b>{{$zone->name}}</b> Price</label>
                                        <input class="form-control" type="text" name="price_zone_{{$zone->id}}" value="{{old('price_zone_'.$zone->id)}}" placeholder="Price before the discount"
                                               id="example-text-input1"/>
                                    </strong>
                                </div>
                                <div class="col-6 form-group mb-0">
                                    <strong>
                                        <label class=" col-form-label" for="example-text-input2"><b>{{$zone->name}}</b> Discount (%) </label>
                                        <input class="form-control" type="text" name="discount_zone_{{$zone->id}}" value="{{old('discount_zone_'.$zone->id)}}" placeholder="discount percentage : "
                                               id="example-text-input2"/>
                                    </strong>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group  row mb-0">
                            <div class="col-6 form-group mb-0">
                                <strong>
                                    <label class=" col-form-label" for="example-text-input1"><b>Default</b> Price</label>
                                    <input class="form-control" type="text" name="price" placeholder="Price before the discount"
                                           id="example-text-input1" value="{{old('price')}}"/>
                                </strong>
                            </div>
                            <div class="col-6 form-group mb-0">
                                <strong>
                                    <label class=" col-form-label" for="example-text-input2"><b>Default</b> Discount (%) </label>
                                    <input class="form-control" type="text" name="discount" placeholder="discount percentage : "
                                           id="example-text-input2" value="{{old('discount')}}"/>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Exams & Questions
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group  row mb-0">
                            <div class="col-6 form-group mb-0">
                                <strong>
                                    <label class=" col-form-label" for="example-text-input1"><b></b> No. Exams</label>
                                    <input class="form-control" type="number" name="num_exams" placeholder="Number of Exams"
                                           id="example-text-input1" value="{{old('num_exams')}}"/>
                                </strong>
                            </div>
                            <div class="col-6 form-group mb-0">
                                <strong>
                                    <label class=" col-form-label" for="example-text-input2"><b></b> No. Questions </label>
                                    <input class="form-control" type="number" name="num_questions" placeholder="Number of questions "
                                           id="example-text-input2" value="{{old('num_questions')}}"/>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Short Description 1:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <textarea name="shortdescription" id="kt-ckeditor-3" placeholder="English">
                                    {!! old('shortdescription') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea name="shortdescription_ar" id="kt-ckeditor-4" placeholder="arabic">
                                    {!! old('shortdescription_ar') !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Short Description 2 :
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <textarea name="shortdescription1" id="kt-ckeditor-11" placeholder="English">
                                    {!! old('shortdescription1') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea name="shortdescription_ar1" id="kt-ckeditor-12" placeholder="arabic">
                                    {!! old('shortdescription_ar1') !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Description:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <textarea name="description" id="kt-ckeditor-1" placeholder="English">
                                    {!! old('description') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea name="description_ar" id="kt-ckeditor-2" placeholder="arabic">
                                    {!! old('description_ar') !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Extra Description :
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <textarea   name="titleEditor" v-model="titleEditor" id="titleEditor" placeholder="English">{!! old('titleEditor') !!}</textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea   name="titleEditorAr" v-model="titleEditorAr" id="titleEditorAr"  placeholder="arabic">{!! old('titleEditorAr') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
               
               
 
                <!--<div class="card card-custom  mb-5 adawe">-->
                <!--    <div class="card-header">-->
                <!--        <h3 class="card-title">-->
                <!--            seo data -->
                <!--        </h3>-->
                <!--    </div>-->
                <!--    <div class="card-body">-->
                <!--        <div class="row">-->
                <!--            <div class="col-6 form-group mb-0">-->
                <!--                <strong>-->
                <!--                    <label class=" col-form-label" for="meta_t"> meta tittle </label>-->
                <!--                    <input class="form-control" type="text"name="meta_tittle" placeholder="meta_tittle" id="meta_t" value="{{old('meta_tittle')}}" />-->
                <!--                </strong>-->
                <!--            </div>-->
                <!--            <div class="col-6 form-group mb-0">-->
                <!--               <strong>-->
                <!--                    <label class=" col-form-label" for="meta_t_ar"> meta tittle ar </label>-->
                <!--                    <input class="form-control" type="text" name="meta_tittle_ar" placeholder="meta_tittle_ar" id="meta_t_ar" value="{{old('meta_tittle_ar')}}" />-->
                <!--                </strong>-->
                <!--            </div>-->
                <!--            <div class="col-6 mb-0">-->
                <!--                <label class="col-form-label" for="meta_d"><b> meta_description  </label>-->
                <!--                <textarea class="form-control" cols="70" id="meta_d" name="meta_description">-->
                <!--                    {!! old('meta_description') !!}-->
                <!--                </textarea>-->
                <!--            </div>-->
                <!--            <div class="col-6 mb-0">-->
                <!--                <label class="col-form-label" for="meta_d_ar"><b> meta_description_ar  </label>-->
                <!--                <textarea class="form-control" cols="70" id="meta_d_ar" name="meta_description_ar">-->
                <!--                    {!! old('meta_description_ar') !!}-->
                <!--                </textarea>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--    </div>-->
                <!--</div>-->
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a onclick="AVUtil().redirectionConfirmation('{{route('books.index')}}')" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('jscode')
<script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/js/pages/widgets.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.6/lib/darkmode-js.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>

    
    <script>
        var app = new Vue({
            el: '#app1',
            data:{
                course_id: '{{old('course_id')}}',
                chapter: false,
                exam: false,
                chapter_data: [],
                filter: '',
                titleEditor: '',
                titleEditorAr: '',
            },
            mounted() {
                
                //this.testmount();
                this.titleEditor = this.initEditor('titleEditor', 280);
                this.titleEditorAr = this.initEditor('titleEditorAr', 280);
                this.testmount();
                if(this.course_id){
                    this.getChapters();
                }
            },
            methods: {
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                        extraPlugins: 'colorbutton',
                    });
                }, testmount: function(){
                    console.log("ddddddddd")
                },
                getChapters:async function(){
                    this.chapter_data = await this.fetchLibrary(this.course_id, 'chapter');
                    $(".chapter").removeAttr('disabled');
                },
                fetchLibrary: function(parent_topic_id, topic_required){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.fetch')}}',
                        data: {
                            parent_topic_id,
                            topic_required,
                        },
                    });
                },
                choose: function(){
                    if(this.chapter == true){
                        if(this.filter == 'chapter'){
                            $('.chapter_view').show();
                            $('.process_view').hide();
                        }else if (this.filter == 'process'){
                            $('.chapter_view').hide();
                            $('.process_view').show();
                        }else{
                            $('.chapter_view').show();
                            $('.process_view').show();
                        }
                    }
                }
            },
            watch: {
                chapter: function(){
                    if(this.chapter == true){
                        if(this.filter == 'chapter'){
                            $('.chapter_view').show();
                            $('.process_view').hide();
                        }else if (this.filter == 'process'){
                            $('.chapter_view').hide();
                            $('.process_view').show();
                        }else{
                            $('.chapter_view').show();
                            $('.process_view').show();
                        }

                    }else{
                        $('.chapter_view').hide();
                        $('.process_view').hide();
                    }
                },
                exam:function(){
                    if(this.exam == true){
                        $(".exam_view").show();
                    }else{
                        $(".exam_view").hide();
                    }
                }
            }
        });

    </script>
@endsection
