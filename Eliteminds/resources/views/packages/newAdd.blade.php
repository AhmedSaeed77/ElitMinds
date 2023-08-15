@extends('layouts.app-1')
@section('pageTitle') Add Question @endsection

@section('subheaderTitle') Add Question @endsection
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
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('packages.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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

    <div class="card card-custom">
        <!--begin::Form-->
        <div id="packageAddForm" class="vueform">
            <div class="form-group  row mb-0 ">
                <label class="col-2 col-form-label" for="example-text-input">Package Name</label>
                <div class="col-5">
                    <input class="form-control" type="text" name="name" v-model="name" placeholder="Package Name" id="example-text-input" value="{{old('name')}}"/>
                </div>
                <div class="col-5">
                    <input class="form-control" type="text" name="name_ar" v-model="name_ar" placeholder="Package Name_ar"  value="{{old('name_ar')}}"/>
                </div>
            </div>
            <div class="form-group  row mb-0">
                <div class="col-3 form-group mb-0">
                    <strong>
                        <label class=" col-form-label" for="example-text-input3">Expire in (days)</label>
                        <input class="form-control" type="number" name="expire" v-model="expire" min="1" step="1" placeholder="Expire in days"
                               id="example-text-input3" value="{{old('expire')}}"/>
                    </strong>
                </div>
                <div class="col-3 form-group mb-0" style="">
                    <strong>
                        <label class=" col-form-label" for="example-text-input4">Extend for (days)</label>
                        <input class="form-control" type="number" name="extension_in_days" v-model="extension_in_days" value="0" placeholder="Extend for (days) "
                               id="example-text-input4" value="{{old('extension_in_days')}}"/>
                    </strong>
                </div>
                <div class="col-3 form-group mb-0" style="">
                    <strong>
                        <label class=" col-form-label" for="example-text-input5">Max Extension (days) </label>
                        <input class="form-control" type="text" value="0" name="max_extension" v-model="max_extension" placeholder="Max Extension (days) "
                               id="example-text-input5" value="{{old('max_extension')}}"/>
                    </strong>
                </div>
                <div class="col-3 form-group mb-0" style="">
                    <strong>
                        <label class=" col-form-label" for="example-text-input6">Extension Price ($)</label>
                        <input class="form-control" type="text" value="0" name="extension_price" v-model="extension_price" placeholder="Extension Price "
                               id="example-text-input6" value="{{old('extension_price')}}"/>
                    </strong>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-6 form-group mb-0">
                    <label class="col-md-3 col-form-label" for="contant_type">Content Type</label>
                    <select class="form-control" name="contant_type" id="contant_type" v-model="contant_type">
                        <option value=""  {{old('contant_type') == '' ? 'selected': ''}}>Choose</option>
                        <option value="question" {{old('contant_type') == 'question' ? 'selected': ''}}>Questions</option>
                        <option value="video" {{old('contant_type') == 'video' ? 'selected': ''}}>Videos</option>
                        <option value="combined" {{old('contant_type') == 'combined' ? 'selected': ''}}>Both</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-6 form-group mb-0">
                    <label class="col-md-3 col-form-label" for="course_id" v-model="course_id">Course </label>
                    <select class="form-control" name="course_id" id="course_id" v-model="course_id" v-on:change="getChapters">
                        <option value="" {{old('course_id') == '' ? 'selected': ''}}>Choose</option>
                        @foreach(\App\Course::all() as $c)
                            <option value="{{$c->id}}" {{old('course_id') == $c->id ? 'selected': ''}}>{{$c->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 form-group mb-0">
                    <label class="col-3 col-form-label" for="lang">Course Language</label>
                    <select class="form-control" name="lang" id="lang" v-model="lang">
                        <option value="" {{old('lang') == '' ? 'selected': ''}}>Choose one</option>
                        <option value="English" {{old('lang') == 'English' ? 'selected': ''}}>English</option>
                        <option value="Arabic" {{old('lang') == 'Arabic' ? 'selected': ''}}>Arabic</option>
                        <option value="Arabic & English" {{old('lang') == 'Arabic & English' ? 'selected': ''}}>Arabic & English</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-5 form-group mb-0">
                    <label class="col-md-3 col-form-label" for="certification">Certification </label>
                    <select class="form-control" name="certification" id="certification" v-model="certification">
                        <option value="1" {{old('certification') == '1' ? 'selected': ''}}>True</option>
                        <option value="0" {{old('certification') == '0' ? 'selected': ''}}>False</option>
                    </select>
                </div>
                <div class="col-4 form-group mb-0">
                    <strong>
                        <label class=" col-form-label" for="certification_title">Certification Title (optional) </label>
                        <input class="form-control" type="text" placeholder="Certification Title " v-model="certification_title"
                               name="certification_title" id="certification_title" value="{{old('certification_title')}}"/>
                    </strong>
                </div>
                <div class="col-3 form-group mb-0">
                    <strong>
                        <label class=" col-form-label" for="course_hours">Course Hours</label>
                        <input class="form-control" type="text" placeholder="Certification Title " v-model="course_hours"
                               name="course_hours" id="course_hours"  value="{{old('course_hours')}}"/>
                    </strong>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-6 form-group mb-0">
                    <strong>
                        <label class=" col-form-label" for="telegram">telegram </label>
                        <input class="form-control" type="text" placeholder="telegram "  v-model="telegram" name="telegram" id="telegram" value="{{old('telegram')}}"/>
                    </strong>
                </div>
                <div class="col-6 form-group mb-0">
                    <strong>
                        <label class=" col-form-label" for="whatsapp">whatsapp</label>
                        <input class="form-control" type="text" placeholder="whatsapp" v-model="whatsapp"
                               name="whatsapp" id="whatsapp"  value="{{old('whatsapp')}}"/>
                    </strong>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-6 form-group mb-0">
                    <strong>
                        <label class=" col-form-label">Package Image (large) : </label>
                    </strong>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img_large" v-model="img_large" id="img">
                        <label class="custom-file-label" for="img">Choose file</label>
                    </div>
                </div>
                <div class="col-6 form-group mb-0">
                    <strong>
                        <label class=" col-form-label">Package Image (medium) : </label>
                    </strong>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="img" id="img_medium" v-model="img">
                        <label class="custom-file-label" for="img_medium">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-10">
                <div class="col-6 form-group mb-10">
                    <strong>
                        <label class=" col-form-label">Package Image (small): </label>
                    </strong>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="img_small" id="img_small" v-model="img_small">
                        <label class="custom-file-label" for="img_small">Choose file</label>
                    </div>
                </div>
                <div class="col-6 form-group mb-10">
                    <strong>
                        <label class=" col-form-label">Package Preview Video (optional): </label>
                    </strong>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_video" id="preview_video" v-model="preview_video">
                        <label class="custom-file-label" for="preview_video">Choose file</label>
                    </div>
                </div>
            </div>
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
                                    <input class="form-control" type="text" name="price_zone_{{$zone->id}}" value="{{old('price_zone_'.$zone->id)}}" v-model="price_zone_{{$zone->id}}" placeholder="Price before the discount"
                                           id="example-text-input1"/>
                                </strong>
                            </div>
                            <div class="col-6 form-group mb-0">
                                <strong>
                                    <label class=" col-form-label" for="example-text-input2"><b>{{$zone->name}}</b> Discount (%) </label>
                                    <input class="form-control" type="text" name="discount_zone_{{$zone->id}}" value="{{old('discount_zone_'.$zone->id)}}" v-model="discount_zone_{{$zone->id}}" placeholder="discount percentage : "
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
                                v-model="price" id="example-text-input1" value="{{old('price')}}"/>
                            </strong>
                        </div>
                        <div class="col-6 form-group mb-0">
                            <strong>
                                <label class=" col-form-label" for="example-text-input2"><b>Default</b> Discount (%) </label>
                                <input class="form-control" type="text" name="discount" placeholder="discount percentage : "
                                v-model="discount" id="example-text-input2" value="{{old('discount')}}"/>
                            </strong>
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
                            <textarea name="description"  v-model="description" placeholder="English">
                                {!! old('description') !!}
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <textarea name="description_ar" v-model="description_ar" placeholder="arabic">
                                {!! old('description_ar') !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom  mb-5">
                <div class="card-header">
                    <h3 class="card-title">
                        What you'll learn:
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <textarea name="what_you_learn" v-model="what_you_learn"  placeholder="English">
                                {!! old('what_you_learn') !!}
                            </textarea>
                        </div>
                          <div class="col-md-6">
                            <textarea name="what_you_learn_ar" v-model="what_you_learn_ar">
                                {!! old('what_you_learn_ar') !!}
                            </textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card card-custom  mb-5">
                <div class="card-header">
                    <h3 class="card-title">
                        Requirement :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <textarea name="requirement" v-model="requirement"  placeholder="English">
                                {!! old('requirement') !!}
                            </textarea>
                        </div>
                           <div class="col-md-6">
                            <textarea name="requirement_ar" v-model="requirement_ar" >
                                {!! old('requirement_ar') !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom  mb-5">
                <div class="card-header">
                    <h3 class="card-title">
                        Who this course is for :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <textarea name="who_course_for" v-model="who_course_for"  placeholder="English">
                                {!! old('who_course_for') !!}
                            </textarea>
                        </div>
                          <div class="col-md-6">
                            <textarea name="who_course_for_ar" v-model="who_course_for_ar">
                                {!! old('who_course_for_ar') !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom  mb-5">
                <div class="card-header">
                    <h3 class="card-title">
                        Enroll Confirmation Email :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <textarea name="enroll_msg" v-model="enroll_msg"  placeholder="English">
                                {!! old('enroll_msg') !!}
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <textarea name="enroll_msg_ar" v-model="enroll_msg_ar">
                                {!! old('enroll_msg_ar') !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-custom  mb-5">
                <div class="card-header">
                    <h3 class="card-title">
                        The Package includes :
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Exams</label>
                        <div class="col-3">
                        <span class="switch">
                            <label>
                                <input type="checkbox" id="exam" name="exam" v-model="exam"/>
                                <span></span>
                            </label>
                        </span>
                        </div>
                        <label class="col-3 col-form-label">Chapters</label>
                        <div class="col-3">
                            <span class="switch">
                                <label>
                                    <input type="checkbox" v-model='chapter' id="chapter" name="chapter"/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group exam_view col-lg-4" style="display:none;" >
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Exams</label>
                                <div class=" col-10">
                                    <select class="form-control select2" id="kt_select2_3" v-model='exams[]' name="exams[]" multiple="multiple" style="width: 100%;">
                                        <optgroup>
                                            @foreach(\App\Exam::all() as $exam)
                                                <option value="{{$exam->id}}">{{$exam->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group chapter_view" style="display:none;">
                            <strong>{{Form::label('chapter','Chapters :')}}</strong>
                            <ul class="list-group">
                                <li class="list-group-item" v-for="i in chapter_data">
                                    <input type="checkbox" :name="'c'+i.id" :id="'c'+i.id" :value="i.name">
                                    <label :for="'c'+i.id">@{{ i.name }}</label>
                                </li>
                            </ul>

                        </div>
                    </div>
                    
         

                </div>
            </div>
            <div class="card card-custom  mb-5 adawe">
                <div class="card-header">
                    <h3 class="card-title">
                        seo data 
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 form-group mb-0">
                            <strong>
                                <label class=" col-form-label" for="meta_t"> meta tittle </label>
                                <input class="form-control" type="text"name="meta_tittle" placeholder="meta_tittle" id="meta_t" v-model="meta_tittle" value="{{old('meta_tittle')}}" />
                            </strong>
                        </div>
                        <div class="col-6 form-group mb-0">
                           <strong>
                                <label class=" col-form-label" for="meta_t_ar"> meta tittle ar </label>
                                <input class="form-control" type="text" name="meta_tittle_ar" placeholder="meta_tittle_ar" v-model="meta_tittle_ar" id="meta_t_ar" value="{{old('meta_tittle_ar')}}" />
                            </strong>
                        </div>
                        <div class="col-6 mb-0">
                            <label class="col-form-label" for="meta_d"><b> meta_description  </label>
                            <textarea class="form-control" cols="70" id="meta_d" v-model="meta_description" name="meta_description">
                                {!! old('meta_description') !!}
                            </textarea>
                        </div>
                        <div class="col-6 mb-0">
                            <label class="col-form-label" for="meta_d_ar"><b> meta_description_ar  </label>
                            <textarea class="form-control" cols="70" id="meta_d_ar" v-model="meta_description_ar" name="meta_description_ar">
                                {!! old('meta_description_ar') !!}
                            </textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <a onclick="AVUtil().redirectionConfirmation('{{route('packages.index')}}')" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/widgets.js?v=7.0.4')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.6/lib/darkmode-js.min.js"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->
    <script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>

        var app = new Vue({
            el: '.vueform',
            data:{
                name_ar:'',
                name:'',
                meta_description_ar:'',
                meta_description: '',
                meta_tittle_ar: '',
                meta_tittle: '',
                exams: [],
                chapter: '',
                exam: '',
                enroll_msg_ar: '',
                enroll_msg: '',
                who_course_for_ar: '',
                who_course_for: '',
                requirement_ar: '',
                requirement: '',
                what_you_learn_ar: '',
                what_you_learn: '',
                description: '',
                description_ar: '',
                price: '',
                discount: '',
                preview_video: '',
                img_small: '',
                img_large: '',
                img: '',
                whatsapp:'',
                telegram:'',
                course_hours: '',
                certification_title: '',
                certification: '',
                lang: '',
                course_id: '',
                contant_type: '',
                extension_price: '',
                max_extension: '',
                extension_in_days:'',
                expire:'',
                course_id: '{{old('course_id')}}',
                chapter: false,
                exam: false,
                chapter_data: [],
                filter: ''
            },
            mounted(){
                if(this.course_id){
                    this.getChapters();
                }
                this.meta_description_ar = this.initEditor('meta_description_ar', 280);
                this.meta_description = this.initEditor('meta_description', 280);
                this.enroll_msg_ar = this.initEditor('enroll_msg_ar', 280);
                this.enroll_msg = this.initEditor('enroll_msg', 280);
                this.who_course_for_ar = this.initEditor('who_course_for_ar', 280);
                this.who_course_for = this.initEditor('who_course_for', 280);
                this.requirement_ar = this.initEditor('requirement_ar', 280);
                this.requirement = this.initEditor('requirement', 280);
                this.what_you_learn_ar = this.initEditor('what_you_learn_ar', 280);
                this.what_you_learn = this.initEditor('what_you_learn', 280);
                this.description_ar = this.initEditor('description_ar', 280);
                this.description = this.initEditor('description', 280);
                this.what_you_learn_ar = this.initEditor('what_you_learn_ar', 280);
                this.what_you_learn = this.initEditor('what_you_learn', 280);
                this.description = this.initEditor('description', 280);
                this.description = this.initEditor('description', 280);
            },
           
            methods:{
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                        extraPlugins: 'colorbutton',
                    });
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

                store:async function(){
                    validation = this.validate();
                    if(validation.hasError){
                        this.showError(validation.error);
                        return;
                    }
                    KTApp.blockPage();
                    await this.storeRequest().then((res) => {
                        KTApp.unblockPage();
                        if(res.error != ''){
                            app.showError(res.error);
                            console.log(res);
                            return;
                        }
                        swal({
                            text: 'Question Added.',
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: "btn font-weight-bold btn-light"
                        }).then(function () {
                            window.location.reload();
                        });
                    });
                },
                storeRequest: function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('packages.store')}}',
                        data: {
                            question_title: app.titleEditor.getData(),
                            question_title_ar: app.titleEditorAr,

                            question_type_id: app.question_type_id,
                            correct_answers_required: app.correct_answers_required,

                            answers: app.answers_arr,
                            drags: app.drags_arr,
                            dragsCenter: app.dragsCenter_arr,

                            course_id: app.course,
                            chapter_id: app.chapter,
                            process_group: app.process_group,
                            exam_num :app.exam_num,

                            demo: app.demo,

                            feedback: app.feedbackEditor.getData(),
                            feedback_ar: app.feedbackEditorAr,

                            images: KTDropzoneDemo.uploadedDocumentArray,
                        },
                        error: function(err){
                            KTApp.unblockPage()
                            console.log(err);
                            app.showError(err);
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
            }
        });
    </script>
@endsection
