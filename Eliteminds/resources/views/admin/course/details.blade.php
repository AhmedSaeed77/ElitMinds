@extends('layouts.app-1')
@section('pageTitle') Update seo Course @endsection
@section('subheaderTitle') Update seo Course @endsection
@section('subheaderNav')
   
@endsection
@section('content')
    <div class="row" id="app-1" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">
            <div class="form-horizontal" style="background: white; padding: 30px 15px;">
                
                <div class="form-group row">
                        <label class="col-3 col-form-label"  for="lang"> Course </label>
                        <select class="form-control" v-model.number="post_id" @change="getPostData">
                            <option value="" > select One </option>
                            @foreach(\App\Course::all() as $c)
                                <option value="{{ $c->id }}" > {{ $c->title }} </option>
                            @endforeach
                        </select>
                </div>
                <form id="seodata">
                        <div class="form-group row">
                            <div class="col-6">
                                <label class="col-form-label" for="title" > meta_title En :</label>
                                <input type="text" class="form-control input-sm" name='meta_title' v-model="meta_title"/>
                            </div>
                            <div class="col-6">
                                 <label class=" col-form-label" for="title" > meta_title ar </label>
                                <input type="text" class="form-control input-sm" v-model="meta_title_ar" name="meta_title_ar"/>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-6">
                                {{-- <label class="-form-label" for="meta_d"><b> Meta keywords En </label> --}}
                                    <textarea class="form-control" cols="30" placeholder="Meta keywords En" v-model="keywords" name="keywords"> </textarea>
                            </div>
                             <div class="col-6">
                                {{-- <label class="-form-label" for="keywords_ar"><b> Meta Keywords Ar </label> --}}
                                    <textarea class="form-control" cols="30" placeholder="Meta Keywords Ar "  v-model="keywords_ar" name="keywords_ar">  </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                {{-- <label class="col-form-label" for="meta_d"><b> meta_description En </label> --}}
                                    <textarea class="form-control" cols="40" placeholder="meta_description "  v-model="meta_description" name="meta_description">
                                    </textarea>
                            </div>
                            <div class="col-6">
                                {{-- <label class="col-form-label" for="meta_d"><b> meta_description Ar    </label> --}}
                                    <textarea class="form-control" cols="40" placeholder="meta_description_ar "   v-model="meta_description_ar" name="meta_description_ar">
                                    </textarea>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <label class="col-3 col-form-label"  for="lang"> Plan A </label>
                                <input type="text" class="form-control input-sm" v-model="nameplan_a" name="nameplan_a" /><br>
                                <select v-model.number="plan_a" name="plan_a" class="form-control" >
                                    <option value="" > select One </option>
                                    <option v-for="a in packages" :value="a.id" > @{{ a.name }} </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="col-3 col-form-label"  for="lang"> Plan B </label>
                                <input type="text" class="form-control input-sm" v-model="nameplan_b" name="nameplan_b" /><br>
                                <select  v-model.number="plan_b" name="plan_b" class="form-control" >
                                    <option value="" > select One </option>
                                    <option v-for="b in packages" :value="b.id" > @{{ b.name }} </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="col-3 col-form-label"  for="lang"> Plan C </label>
                                <input type="text" class="form-control input-sm" v-model="nameplan_c" name="nameplan_c" /><br>
                                <select v-model.number="plan_c" name="plan_c" class="form-control" >
                                    <option value="" > select One </option>
                                    <option v-for="c in packages" :value="c.id" > @{{ c.name }} </option>
                                </select>
                            </div>
                        
                        </div>
                
                     <div class="form-group row">
                            <div class="col-6">
                                <label class="col-form-label" for="preview_video" > preview_video En :</label>
                                <input type="text" class="form-control input-sm" name='preview_video' v-model="preview_video"/>
                            </div>
                            <div class="col-6">
                                 <label class=" col-form-label" for="preview_video_ar" > preview_video ar </label>
                                <input type="text" class="form-control input-sm" v-model="preview_video_ar" name="preview_video_ar"/>
                            </div>
                    </div>
                     <div class="form-group row">
                            <div class="col-6">
                                <label class="col-form-label" for="preview_video2" > video  En :</label>
                                <input type="text" class="form-control input-sm" name='preview_video2' v-model="preview_video2"/>
                            </div>
                            <div class="col-6">
                                 <label class=" col-form-label" for="preview_video2_ar" > video ar </label>
                                <input type="text" class="form-control input-sm" v-model="preview_video2_ar" name="preview_video2_ar"/>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <div class="col-6">
                                <label class="col-form-label" for="thumnile1" > video  thumnile En :</label>
                                <input type="file" class="form-control input-sm" name='thumnile1'/>
                            </div>
                            <div class="col-6">
                                 <label class=" col-form-label" for="thumnilear" > video thumnile Ar :</label>
                                <input type="file" class="form-control input-sm"  name="thumnilear"/>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <div class="col-6">
                                 <label class=" col-form-label" for="thumniledown" > video thumnile Down :</label>
                                <input type="file" class="form-control input-sm"  name="thumnile2"/>
                            </div>
                    </div>
                    
                    <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                           short Description:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <textarea name="description" id="short_description" placeholder="English">
                                    {!! old('short_description') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea name="description_ar" id="short_description_ar" placeholder="arabic">
                                    {!! old('short_description_ar') !!}
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
                                <textarea name="description" id="description" placeholder="English">
                                    {!! old('description') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <textarea name="description_ar" id="description_ar" placeholder="arabic">
                                    {!! old('description_ar') !!}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Certificate:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label" for="certificateimage" > Certificate Image :</label>
                                <input type="file" class="form-control input-sm"  name="certificateimage"/>
                                <label class="col-form-label" for="preview_video" > <b>perfect size must be : 425px * 594px</label>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label" for="descEn" > Certificate Description En :</label>
                                <textarea name="certificatedesc_en" id="certificatedesc_en" placeholder="english"> {!! old('certificatedesc_en') !!}</textarea>
                            </div><br><br>
                            <div class="col">
                                <label class="col-form-label" for="descAr" > Certificate Description Ar :</label>
                                <textarea name="certificatedesc_ar" id="certificatedesc_ar" placeholder="arabic"> {!! old('certificatedesc_ar') !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Certificate:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="name" > Certificate Name :</label>
                                <input type="text" class="form-control input-sm" v-model="certificatename" name="certificatename"/>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="logo" > Certificate logo :</label>
                                <input type="file" class="form-control input-sm"  name="certificatelogo"/>
                                <label class="col-form-label" for="preview_video" > <b>perfect size must be : 56px * 56px</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label" for="student" > Number of Students :</label>
                                <input type="number" class="form-control input-sm" v-model="numberstudent" name="numberstudent"/>
                            </div><br><br>
                            <div class="col">
                                <label class="col-form-label" for="hours" > Number of Hours : </label>
                                <input type="number" class="form-control input-sm" v-model="numberhour" name="numberhour"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label" for="exam" > Number of Exams :</label>
                                <input type="number" class="form-control input-sm" v-model="numberexam" name="numberexam"/>
                            </div><br>
                            <div class="col">
                                <label class="col-form-label" for="lecture" > Number of Lectures : </label>
                                <input type="number" class="form-control input-sm" v-model="numberlecture" name="numberlecture" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <label class="col-form-label" for="image" > Course Image :</label>
                                <input type="file" class="form-control input-sm" name="courseimage"/>
                                <label class="col-form-label" for="preview_video" > <b>perfect size must be : 290px * 170px </label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label" for="rate" > Course Rating :</label>
                                <input type="number" step="0.01" min="0.00" max="9999.99" class="form-control input-sm" v-model="courserate" name="courserate"/>
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="review" > Course Reviews Count :</label>
                                <input type="number" class="form-control input-sm" v-model="coursereviews" name="coursereviews"/>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card card-custom mb-5">
                    <div class="card-header">
                        <h3 class="card-title">
                            Cards:
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="card1" > Card 1 :</label>
                                <input type="text" class="form-control input-sm" v-model="caredname1" name="caredname1"/><br>
                                <textarea name="careddesc1" id="careddesc1" placeholder="English">
                                    {!! old('careddesc1') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="card2" > Card 2 :</label>
                                <input type="text" class="form-control input-sm" v-model="caredname2" name="caredname2"/><br>
                                <textarea name="careddesc2" id="careddesc2" placeholder="arabic">
                                    {!! old('careddesc2') !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="card3" > Card 3 :</label>
                                <input type="text" class="form-control input-sm" v-model="caredname3" name="caredname3"/><br>
                                <textarea name="careddesc3" id="careddesc3" placeholder="English">
                                    {!! old('careddesc3') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="card4" > Card 4 :</label>
                                <input type="text" class="form-control input-sm" v-model="caredname4" name="caredname4"/><br>
                                <textarea name="careddesc4" id="careddesc4" placeholder="arabic">
                                    {!! old('careddesc4') !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label" for="card5" > Card 5 :</label>
                                <input type="text" class="form-control input-sm" v-model="caredname5" name="caredname5"/><br>
                                <textarea name="careddesc5" id="careddesc5" placeholder="English">
                                    {!! old('careddesc5') !!}
                                </textarea>
                            </div>
                            
                        </div>
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


    <!--<script src="{{asset('assets/js/pages/widgets.js?v=7.0.4')}}"></script>-->
    <!--<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>-->

    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.6/lib/darkmode-js.min.js"></script>
    <!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>-->
        
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
                packages:[],
                plan_a : '',
                plan_b : '',
                plan_c : '',
                nameplan_a : '',
                nameplan_b : '',
                nameplan_c : '',
                meta_title : '',
                meta_title_ar:'',
                preview_video : '',
                preview_video_ar:'',
                preview_video2 : '',
                preview_video2_ar:'',
                data_id:'',
                keywords:'',
                keywords_ar:'',
                description : '',
                description_ar : '',
                short_description : '',
                short_description_ar : '',
                meta_description:'',
                meta_description_ar:'',
                certificateimage : '',
                certificatedesc_en : '',
                certificatedesc_ar : '',
                certificatename : '',
                certificatelogo : '',
                numberstudent :'',
                numberhour :'',
                numberexam : '',
                numberlecture : '',
                thumnile1 : '',
                thumnile2 :'',
                caredname1 :'',
                caredname2 :'',
                caredname3 :'',
                caredname4 :'',
                caredname5 :'',
                careddesc1 :'',
                careddesc2 :'',
                careddesc3 :'',
                careddesc4 :'',
                careddesc5 :'',
                courseimage :'',
                courserate:'',
                coursereviews:'',
                thumnilear : '',
            },
            mounted() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                this.description = this.initEditor('description', 280);
                this.description_ar = this.initEditor('description_ar', 280);
                this.short_description = this.initEditor('short_description', 280);
                this.short_description_ar = this.initEditor('short_description_ar', 280);
                this.certificatedesc_en = this.initEditor('certificatedesc_en', 280);
                this.certificatedesc_ar = this.initEditor('certificatedesc_ar', 280);
                
                this.careddesc1 = this.initEditor('careddesc1', 280);
                this.careddesc2 = this.initEditor('careddesc2', 280);
                this.careddesc3 = this.initEditor('careddesc3', 280);
                this.careddesc4 = this.initEditor('careddesc4', 280);
                this.careddesc5 = this.initEditor('careddesc5', 280);
                
                this.description.on( 'paste', function( e ) { e.removeListener(); console.log(e); });
            },
            methods: {
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        //filebrowserUploadMethod: 'form',
                        height,
                        //extraPlugins: 'colorbutton',
                        
                    });
                },
                getPostData: function(){
                    KTApp.blockPage();
                    url = '{{ route('cource.details', ':id')}}'
                    url = url.replace(':id', app.post_id)
                    $.ajax ({
                        type: 'POST',
                        url: url,
                        success: function(res){
                            console.log(res);
                            setTimeout(() => {
                                KTApp.unblockPage();
                                app.packages = res.packages;

                                // app.meta_title = res['meta_title'];
                                app.data_id = res.details.id;
                                app.plan_a = res.details.plan_a;
                                app.plan_b = res.details.plan_b;
                                app.plan_c = res.details.plan_c;
                                
                                app.nameplan_a = res.details.nameplan_a;
                                app.nameplan_b = res.details.nameplan_b;
                                app.nameplan_c = res.details.nameplan_c;
                                app.courserate = res.details.courserate;
                                app.coursereviews = res.details.coursereviews;
                                
                                app.certificatedesc_en.setData(res.details.certificatedesc_en);
                                app.certificatedesc_ar.setData(res.details.certificatedesc_ar);
                                
                                app.description.setData(res.details.description);
                                app.description_ar.setData(res.details.description_ar);
                                 app.short_description.setData(res.details.short_description);
                                app.short_description_ar.setData(res.details.short_description_ar);
                                app.preview_video =  res.details.preview_video;
                                app.preview_video_ar =  res.details.preview_video_ar;
                                 app.preview_video2 =  res.details.preview_video2;
                                app.preview_video2_ar =  res.details.preview_video2_ar;
                                app.meta_title =  res.details.meta_title;
                                app.meta_title_ar =  res.details.meta_title_ar;
                                app.meta_description =  res.details.meta_description;
                                app.meta_description_ar =  res.details.meta_description_ar;
                                app.keywords =  res.details.keywords;
                                app.keywords_ar =  res.details.keywords_ar;
                                
                                app.certificatename =  res.details.certificatename;
                                app.numberstudent =  res.details.numberstudent;
                                app.numberhour =  res.details.numberhour;
                                app.numberexam =  res.details.numberexam;
                                app.numberlecture =  res.details.numberlecture;
                                
                                app.caredname1 =  res.details.caredname1;
                                app.caredname2 =  res.details.caredname2;
                                app.caredname3 =  res.details.caredname3;
                                app.caredname4 =  res.details.caredname4;
                                app.caredname5 =  res.details.caredname5;
                                
                                app.careddesc1.setData(res.details.careddesc1);
                                app.careddesc2.setData(res.details.careddesc2);
                                app.careddesc3.setData(res.details.careddesc3);
                                app.careddesc4.setData(res.details.careddesc4);
                                app.careddesc5.setData(res.details.careddesc5);
                                
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
                    formData.append('course_id', app.post_id)
                    formData.append('id', app.data_id)
                    formData.append('description', app.description.getData())
                    formData.append('description_ar', app.description_ar.getData())
                    formData.append('short_description', app.short_description.getData())
                    formData.append('short_description_ar', app.short_description_ar.getData())
                    formData.append('certificatedesc_en', app.certificatedesc_en.getData())
                    formData.append('certificatedesc_ar', app.certificatedesc_ar.getData())
                    
                    formData.append('careddesc1', app.careddesc1.getData())
                    formData.append('careddesc2', app.careddesc2.getData())
                    formData.append('careddesc3', app.careddesc3.getData())
                    formData.append('careddesc4', app.careddesc4.getData())
                    formData.append('careddesc5', app.careddesc5.getData())
                    
                    axios.post('{{ route('cource.updatedetails') }}', formData).then(response => {
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
