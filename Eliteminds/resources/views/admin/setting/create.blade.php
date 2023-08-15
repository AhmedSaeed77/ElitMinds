@extends('layouts.app-1')
@section('pageTitle') New Explanation @endsection
@section('subheaderTitle') Edit Settings @endsection
@section('head') <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> 
 <script src="https://cdn.example.com/ckeditor/plugins/example/plugin.js"></script>
 @endsection
 @section('css')
 @font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  src: url('/fonts/roboto/Roboto-Regular.woff2') format('woff2'),
       url('/fonts/roboto/Roboto-Regular.woff') format('woff');
}
 @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="app.store()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('explanation.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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



    <div class="row" id="app-1" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">

            <div class="form-horizontal" style="background: white; padding: 30px 15px;">

                <div class="form-group row">
                    <div class="col-md-6">
                        <label >Experts in Project and Business </lable>
                        <textarea class="form-control"   v-model="experts" name="experts">{!! old('experts') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Most popular certificates </label>
                        <textarea class="form-control"     v-model="certificates" name="certificates">{!! old('experts') !!}</textarea>
                    </div>

                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label >Achieve your goals </lable>
                        <textarea class="form-control"   v-model="achieve" name="achieve">{!! old('achieve') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > E-Books </label>
                        <textarea class="form-control"     v-model="books" name="books">{!! old('books') !!}</textarea>
                    </div>

                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label >Find your path with our Free Assessment </lable>
                        <textarea class="form-control"   v-model="assessment" name="assessment">{!! old('assessment') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Educational tips & tricks </label>
                        <textarea class="form-control"     v-model="educational" name="educational">{!! old('educational') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label >Contact Us</lable>
                        <textarea class="form-control"   v-model="contactus" name="contactus">{!! old('contactus') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > All Certificates </label>
                        <textarea class="form-control"     v-model="allcertificates" name="allcertificates">{!! old('allcertificates') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > All E-Books</lable>
                        <textarea class="form-control"   v-model="allbooks" name="allbooks">{!! old('allbooks') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > We help you grow through knowledge and skills</lable>
                        <textarea class="form-control"   v-model="wehelp" name="wehelp">{!! old('wehelp') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > Vision</lable>
                        <textarea class="form-control"   v-model="vision" name="vision">{!! old('vision') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Mission</lable>
                        <textarea class="form-control"   v-model="mission" name="mission">{!! old('mission') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > Professionalism </lable>
                        <textarea class="form-control"   v-model="title1" name="title1">{!! old('title1') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > People Focused</lable>
                        <textarea class="form-control"   v-model="title2" name="title2">{!! old('title2') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > Optimism</lable>
                        <textarea class="form-control"   v-model="title3" name="title3">{!! old('title3') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Our Story</lable>
                        <textarea class="form-control"   v-model="story" name="story">{!! old('story') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-6">
                        <label > Achieve 1</lable>
                        <input type ="text" class="form-control"   v-model="achievename1" name="achievename1"  style="width: 600px;"/>
                    </div>
                    <div class="col-6">
                        <label > Achieve 2</lable>
                        <input type ="text" class="form-control"   v-model="achievename2" name="achievename2" style="width: 600px;"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > Achieve 1</lable>
                        <textarea class="form-control"   v-model="achievedesc1" name="achievedesc1">{!! old('achievedesc1') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Achieve 2</lable>
                        <textarea class="form-control"   v-model="achievedesc2" name="achievedesc2">{!! old('achievedesc2') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-6">
                        <label > Achieve 3</lable>
                        <input type ="text" class="form-control"   v-model="achievename3" name="achievename3" style="width: 600px;"/>
                    </div>
                    <div class="col-6">
                        <label > Achieve 4</lable>
                        <input type ="text" class="form-control"   v-model="achievename4" name="achievename4" style="width: 600px;"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label > Achieve 3</lable>
                        <textarea class="form-control"   v-model="achievedesc3" name="achievedesc3">{!! old('achievedesc3') !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label > Achieve 4</lable>
                        <textarea class="form-control"   v-model="achievedesc4" name="achievedesc4">{!! old('achievedesc4') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                   
                    <div class="col-6">
                        <label > Home video</lable>
                        <input type ="text" class="form-control"   v-model="videohome" name="videohome" style="width: 600px;"/>
                    </div>
                     <div class="col-md-6">
                        <label > All Blogs</lable>
                        <textarea class="form-control"   v-model="allblog" name="allblog">{!! old('allblog') !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                   
                    <div class="col-6">
                        <label > Certificate Main Image </lable>
                        <input type ="file" class="form-control"     v-on:change="onFileSelected" style="width: 600px;"/>
                    </div>
                     <div class="col-md-6">
                        <label > Blog Main Image</lable>
                        <input type ="file" class="form-control"  v-on:change="onFileSelected1"  style="width: 600px;"/>
                    </div>
                </div>
                
                <div class="form-group row">
                   
                    <div class="col-6">
                        <label > Thumbnail Home Video </lable>
                        <input type ="file" class="form-control"  v-on:change="onFileSelected2" style="width: 600px;"/>
                    </div>
                    
                    <div class="col-6">
                        <label > Enroll Now Free </lable>
                        <input type ="text" class="form-control"   v-model="enrollnowfree" style="width: 600px;"/>
                    </div>
                    
                </div>
                
                <div class="form-group row">
                    <div class="col-6">
                        <label > Link Twiter </lable>
                        <input type ="text" class="form-control"  v-model="twiterlink" style="width: 600px;"/>
                    </div>
                     <div class="col-6">
                        <label > Link Facbook </lable>
                        <input type ="text" class="form-control"  v-model="facebooklink" style="width: 600px;"/>
                    </div>
                    
                    
                </div>
                
                <div class="form-group row">
                    <div class="col-6">
                        <label > Link Youtube </lable>
                        <input type ="text" class="form-control"  v-model="youtubelink" style="width: 600px;"/>
                    </div>
                     <div class="col-6">
                        <label > Link Instegram </lable>
                        <input type ="text" class="form-control"  v-model="instalink" style="width: 600px;"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-6">
                        <label > Link WIFI </lable>
                        <input type ="text" class="form-control"  v-model="wifilink" style="width: 600px;"/>
                    </div>
                     <div class="col-6">
                        <label > Link LinkedIn </lable>
                        <input type ="text" class="form-control"  v-model="linkedinlink" style="width: 600px;"/>
                    </div>
                </div>
                

                <div class="form-group control-label">
                    <div class="col-md-2">
                        <input type="submit" value="Save" @click="store" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>
        const app = new Vue({
            el: '#app-1',
            data: {
                experts : '',
                certificates :'',
                achieve: '',
                books: '',
                assessment :'',
                educational :'',
                contactus:'',
                allcertificates:'',
                allbooks:'',
                wehelp :'',
                vision :'',
                mission:'',
                title1:'',
                title2:'',
                title3:'',
                story:'',
                achievename1 : '',
                achievename2 :'',
                achievename3 :'',
                achievename4 :'',
                achievedesc1 :'',
                achievedesc2:'',
                achievedesc3 : '',
                achievedesc4 :'',
                allblog :'',
                videohome :'',
                certificatemainimage :null,
                blogmainimage:'',
                thumbnail :'',
                twiterlink :'',
                facebooklink :'',
                youtubelink :'',
                instalink :'',
                wifilink :'',
                linkedinlink :'',
                enrollnowfree :'',

            },
            mounted() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                this.experts = this.initEditor('experts', 280);
                this.certificates = this.initEditor('certificates', 280);
                this.achieve = this.initEditor('achieve', 280);
                this.books = this.initEditor('books', 280);
                this.assessment = this.initEditor('assessment', 280);
                this.educational = this.initEditor('educational', 280);
                this.contactus = this.initEditor('contactus', 280);
                this.allcertificates = this.initEditor('allcertificates', 280);
                this.allbooks = this.initEditor('allbooks', 280);
                this.wehelp = this.initEditor('wehelp', 280);
                this.vision = this.initEditor('vision', 280);
                this.mission = this.initEditor('mission', 280);
                this.title1 = this.initEditor('title1', 280);
                this.title2 = this.initEditor('title2', 280);
                this.title3 = this.initEditor('title3', 280);
                this.story = this.initEditor('story', 280);
                
                this.achievedesc1 = this.initEditor('achievedesc1', 280);
                this.achievedesc2 = this.initEditor('achievedesc2', 280);
                this.achievedesc3 = this.initEditor('achievedesc3', 280);
                this.achievedesc4 = this.initEditor('achievedesc4', 280);
                this.allblog = this.initEditor('allblog', 280);
                
                this.getPostData();
            },
            methods: {
                
                    onFileSelected: function(event) {
                    app.certificatemainimage= event.target.files[0];
                    console.log(this.certificatemainimage);
                },
                onFileSelected1: function(event) {
                    app.blogmainimage= event.target.files[0];
                    console.log(this.blogmainimage);
                },
                onFileSelected2: function(event) {
                    app.thumbnail= event.target.files[0];
                    console.log(this.thumbnail);
                },
                validate: function(){
                    let validation = {
                        hasError: true,
                        error: '',
                    };

                    if(this.experts.getData() === ""){
                        validation.error = 'Content of the experts is required.';
                        return validation;
                    }
                    
                    if(this.certificates.getData() === ""){
                        validation.error = 'Content of the certificates is required.';
                        return validation;
                    }
                    
                    if(this.achieve.getData() === ""){
                        validation.error = 'Content of the achieve is required.';
                        return validation;
                    }
                    
                    if(this.books.getData() === ""){
                        validation.error = 'Content of the books is required.';
                        return validation;
                    }
                    
                    if(this.assessment.getData() === ""){
                        validation.error = 'Content of the assessment is required.';
                        return validation;
                    }
                    
                    if(this.educational.getData() === ""){
                        validation.error = 'Content of the educational is required.';
                        return validation;
                    }
                    
                    if(this.contactus.getData() === ""){
                        validation.error = 'Content of the contactus is required.';
                        return validation;
                    }
                    
                    if(this.allcertificates.getData() === ""){
                        validation.error = 'Content of the allcertificates is required.';
                        return validation;
                    }
                    
                    if(this.allbooks.getData() === ""){
                        validation.error = 'Content of the allbooks is required.';
                        return validation;
                    }
                    
                    if(this.wehelp.getData() === ""){
                        validation.error = 'Content of the wehelp is required.';
                        return validation;
                    }
                    
                    if(this.vision.getData() === ""){
                        validation.error = 'Content of the vision is required.';
                        return validation;
                    }
                    
                    if(this.mission.getData() === ""){
                        validation.error = 'Content of the mission is required.';
                        return validation;
                    }
                    
                    if(this.title1.getData() === ""){
                        validation.error = 'Content of the title1 is required.';
                        return validation;
                    }
                    
                    if(this.title2.getData() === ""){
                        validation.error = 'Content of the title2 is required.';
                        return validation;
                    }
                    
                    if(this.title3.getData() === ""){
                        validation.error = 'Content of the title3 is required.';
                        return validation;
                    }
                    
                    if(this.story.getData() === ""){
                        validation.error = 'Content of the story is required.';
                        return validation;
                    }
                    
                    if(this.achievename1 === ""){
                        validation.error = 'Content of the achievename1 is required.';
                        return validation;
                    }
                    
                    if(this.achievename2 === ""){
                        validation.error = 'Content of the achievename2 is required.';
                        return validation;
                    }
                    
                    if(this.achievename3 === ""){
                        validation.error = 'Content of the achievename3 is required.';
                        return validation;
                    }
                    
                    if(this.achievename4 === ""){
                        validation.error = 'Content of the achievename4 is required.';
                        return validation;
                    }
                    
                    if(this.achievedesc1.getData() === ""){
                        validation.error = 'Content of the achievedesc1 is required.';
                        return validation;
                    }
                    
                    if(this.achievedesc2.getData() === ""){
                        validation.error = 'Content of the achievedesc2 is required.';
                        return validation;
                    }
                    
                    if(this.achievedesc3.getData() === ""){
                        validation.error = 'Content of the achievedesc3 is required.';
                        return validation;
                    }
                    
                    if(this.achievedesc4.getData() === ""){
                        validation.error = 'Content of the achievedesc4 is required.';
                        return validation;
                    }
                    
                    if(this.allblog.getData() === ""){
                        validation.error = 'Content of the allblog is required.';
                        return validation;
                    }
                    if(this.videohome === ""){
                        validation.error = 'Content of the videohome is required.';
                        return validation;
                    }
                    
                    

                    validation.hasError = false;
                    return validation;
                },
                getPostData: function(){
                    KTApp.blockPage();
                    url = '{{ route('setting.getData')}}'
                    $.ajax ({
                        type: 'POST',
                        url: url,
                        success: function(res){
                            console.log(res);
                            setTimeout(() => {
                                KTApp.unblockPage();
                                app.experts.setData(res.data.experts);
                                app.certificates.setData(res.data.certificates);
                                app.achieve.setData(res.data.achieve);
                                app.books.setData(res.data.books);
                                app.assessment.setData(res.data.assessment);
                                app.educational.setData(res.data.educational);
                                app.contactus.setData(res.data.contactus);
                                app.allcertificates.setData(res.data.allcertificates);
                                app.allbooks.setData(res.data.allbooks);
                                app.wehelp.setData(res.data.wehelp);
                                app.vision.setData(res.data.vision);
                                app.mission.setData(res.data.mission);
                                app.title1.setData(res.data.title1);
                                app.title2.setData(res.data.title2);
                                app.title3.setData(res.data.title3);
                                app.story.setData(res.data.story);
                                
                                app.achievename1 = res.data.achievename1;
                                app.achievename2 = res.data.achievename2;
                                app.achievename3 = res.data.achievename3;
                                app.achievename4 = res.data.achievename4;
                                app.videohome = res.data.videohome;
                                
                                app.twiterlink = res.data.twiterlink;
                                app.facebooklink = res.data.facebooklink;
                                app.youtubelink = res.data.youtubelink;
                                app.instalink = res.data.instalink;
                                app.wifilink = res.data.wifilink;
                                app.linkedinlink = res.data.linkedinlink;
                                app.enrollnowfree = res.data.enrollnowfree;
                                
                                //app.certificatemainimage = res.data.certificatemainimage;
                                //app.blogmainimage = res.data.blogmainimage;
                                
                                app.achievedesc1.setData(res.data.achievedesc1);
                                app.achievedesc2.setData(res.data.achievedesc2);
                                app.achievedesc3.setData(res.data.achievedesc3);
                                app.achievedesc4.setData(res.data.achievedesc4);
                                app.allblog.setData(res.data.allblog);
                                
                            }, 1500);
                        },
                        error: function(err){
                            KTApp.unblockPage();
                            app.showError('ops, something went wrong.');
                        }
                    });
                },
                store: async function(){
                    const validation = this.validate();
                    if(validation.hasError){
                        this.showError(validation.error);
                        return;
                    }
                    KTApp.blockPage();
                    await app.storeRequest().then(() => {
                        KTApp.unblockPage();
                        swal({
                            text: 'Setting Has been saved.',
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: "btn font-weight-bold btn-light"
                        }).then(function () {
                            window.location.replace('{{route('setting.show')}}');
                        });
                    });
                },
                storeRequest: async function(){
                    
                    
                    var formdata = new FormData();

                        formdata.append('_token', '{{ csrf_token() }}');
                        formdata.append('experts', app.experts.getData());
                        formdata.append('certificates', app.certificates.getData());
                        formdata.append('achieve', app.achieve.getData());
                        formdata.append('books', app.books.getData());
                        formdata.append('assessment', app.assessment.getData());
                        formdata.append('educational', app.educational.getData());
                        
                        formdata.append('contactus', app.contactus.getData());
                        formdata.append('allcertificates', app.allcertificates.getData());
                        formdata.append('allbooks', app.allbooks.getData());
                        formdata.append('wehelp', app.wehelp.getData());
                        formdata.append('vision', app.vision.getData());
                        formdata.append('mission', app.mission.getData());
                        formdata.append('title1', app.title1.getData());
                        formdata.append('title2', app.title2.getData());
                        formdata.append('title3', app.title3.getData() );
                        formdata.append('story', app.story.getData() );
                        formdata.append('achievename1', app.achievename1);
                        formdata.append('achievename2', app.achievename2);
                        formdata.append('achievename3', app.achievename3);
                        formdata.append('achievename4', app.achievename4);
                        formdata.append('achievedesc1', app.achievedesc1.getData());
                        formdata.append('achievedesc2', app.achievedesc2.getData());
                        formdata.append('achievedesc3', app.achievedesc3.getData());
                        formdata.append('achievedesc4', app.achievedesc4.getData());
                        formdata.append('allblog', app.allblog.getData());
                        formdata.append('videohome', app.videohome);
                        formdata.append('certificatemainimage', app.certificatemainimage);
                        formdata.append('blogmainimage', app.blogmainimage);
                        formdata.append('thumbnail', app.thumbnail);
                        
                        formdata.append('twiterlink', app.twiterlink);
                        formdata.append('facebooklink', app.facebooklink);
                        formdata.append('youtubelink', app.youtubelink);
                        formdata.append('instalink', app.instalink);
                        formdata.append('wifilink', app.wifilink);
                        formdata.append('linkedinlink', app.linkedinlink);
                        formdata.append('enrollnowfree', app.enrollnowfree);

                        var ajax = new XMLHttpRequest();

                        ajax.addEventListener('load', this.completeHandler, false); // complete event
                        ajax.addEventListener('error', this.errorHandler, false);


                        ajax.open("POST" ,"{{ route('setting.setting') }}");
                        ajax.send(formdata);
                    
                    
                    // return $.ajax ({
                    //     type: 'POST',
                    //     Content-Type: 'multipart/form-data',
                    //     url: '{{ route('setting.setting')}}',
                        
                    //     data: {
                            
                    //         experts : app.experts.getData(),
                    //         certificates : app.certificates.getData(),
                    //         achieve: app.achieve.getData(),
                    //         books: app.books.getData(),
                    //         assessment : app.assessment.getData(),
                    //         educational : app.educational.getData(),
                    //         contactus: app.contactus.getData(),
                    //         allcertificates: app.allcertificates.getData(),
                    //         allbooks: app.allbooks.getData(),
                    //         wehelp: app.wehelp.getData(),
                    //         vision: app.vision.getData(),
                    //         mission : app.mission.getData(),
                    //         title1 : app.title1.getData(),
                    //         title2: app.title2.getData(),
                    //         title3: app.title3.getData(),
                    //         story: app.story.getData(),
                    //         achievename1 : app.achievename1,
                    //         achievename2: app.achievename2,
                    //         achievename3: app.achievename3,
                    //         achievename4: app.achievename4,
                    //         achievedesc1 : app.achievedesc1.getData(),
                    //         achievedesc2: app.achievedesc2.getData(),
                    //         achievedesc3: app.achievedesc3.getData(),
                    //         achievedesc4: app.achievedesc4.getData(),
                    //         allblog: app.allblog.getData(),
                    //         videohome: app.videohome,
                    //         certificatemainimage : app.certificatemainimage,
                    //         blogmainimage : app.blogmainimage,
                    //     },
                    //     error: function(err){
                    //         KTApp.unblockPage();
                    //         console.log(err);
                    //         app.showError('ops, something went wrong.');
                    //     }
                    // });
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
                
                initEditor: function(element_id, height){

                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                        extraPlugins: 'colorbutton',
                        font: {
                                        options: [
                                                    'Roboto'
                                                ]
                                    },
                    });
                    
                },
                getChapters:async function(){
                    this.chapter_data = await this.fetchLibrary(this.course, 'chapter');
                    $("#exampleSelectd3").removeAttr("disabled");
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
                }

            }
        });
    </script>
@endsection
