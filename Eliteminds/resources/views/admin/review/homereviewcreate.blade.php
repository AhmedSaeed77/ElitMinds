@extends('layouts.app-1')
@section('pageTitle') New Review @endsection
@section('subheaderTitle') New Review @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <!--<a href="#" onclick="document.getElementById('newCouponForm').submit()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">-->
    <!--<span class="svg-icon svg-icon-success svg-icon-lg">-->
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
    <!--    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
    <!--        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
    <!--            <rect x="0" y="0" width="24" height="24"/>-->
    <!--            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>-->
    <!--            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>-->
    <!--        </g>-->
    <!--    </svg>-->
        <!--end::Svg Icon-->
    <!--</span>Submit</a>-->
    <!--end::Button-->

    <!--begin::Button-->
    <!--<a href="#" onclick="AVUtil().redirectionConfirmation('{{route('coupon.show')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">-->
    <!--<span class="svg-icon svg-icon-success svg-icon-lg">-->
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
    <!--    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
    <!--        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
    <!--            <rect x="0" y="0" width="24" height="24"/>-->
    <!--            <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>-->
    <!--            <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>-->
    <!--        </g>-->
    <!--    </svg>-->
        <!--end::Svg Icon-->
    <!--</span>Cancel</a>-->
    <!--end::Button-->
@endsection
@section('content')



    <div class="row" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">

            <form action="{{ route('review.homestore') }}"  method="POST" class="form-horizontal" style="background: white; padding: 30px 15px;" enctype="multipart/form-data">
                @csrf

                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1" >First Name:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" step="0.01" name="fname" required>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1" >Last Name:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" step="0.01" name="lname" required>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1" >Comment :</label>
                    <div class="col-md-8">
                        <!--<input type="text" class="form-control input-sm" name="coupon_code" >-->
                        <textarea  rows="10" class="form-control" placeholder="Comment" name="description" required></textarea>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="form_control_1" >Rate :</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control input-sm" name="rate" required>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label"  >Image :</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control input-sm" min="1" step="1" name="image">
                        <label class="col-md control-label"  ><b>perfect size must be : 175px * 175px</label>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                
                <!--<div class="form-group form-md-line-input">-->
                <!--    <label class="col-md-2 control-label" for="package_id">Course:</label>-->
                <!--    <div class="col-md-8">-->
                <!--        <select name="course_id" id="package_id" class="form-control" required>-->
                <!--            <option value="" disabled selected></option>-->
                <!--            @foreach(\App\Course::all() as $course)-->
                <!--                <option value="{{$course->id}}">{{$course->title}}</option>-->
                <!--            @endforeach-->
                <!--        </select>-->
                <!--        <div class="form-control-focus"> </div>-->
                <!--    </div>-->
                <!--</div>-->
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-2 control-label" for="country_id">Country:</label>
                    <div class="col-md-8">
                        <select name="country_id" id="country_id" class="form-control" required>
                            <option value="" disabled selected></option>
                            @foreach(\App\NewCountry::all() as $country)
                                <option value="{{$country->id}}">{{$country->countryname}}</option>
                            @endforeach
                        </select>
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                
                <!--<div class="form-group form-md-line-input">-->
                <!--    <label class="col-md-2 control-label"  >Image Country :</label>-->
                <!--    <div class="col-md-8">-->
                <!--        <input type="file" class="form-control input-sm" min="1" step="1" name="imagecountry">-->
                <!--        <label class="col-md control-label"  ><b>perfect size must be : 175px * 175px</label>-->
                <!--        <div class="form-control-focus"> </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group control-label">
                    <div class="col-md-2">
                        <input type="submit" value="save" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
