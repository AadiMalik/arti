@extends('layouts.admin')
@section('content')
@section('style')
    <style>
        .logoimg {
            text-align: center;
        }

        .avatar-wrapper {
            position: relative;
            height: 135px;
            width: 135px;
            margin-top:5px;
            overflow: hidden;
            box-shadow: none;
            transition: all .3s ease;
        }

        .avatar-wrapper:hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .avatar-wrapper:hover .profile-pic1,.profile-pic2,.profile-pic3,.profile-pic4, .profile-pic5, .profile-pic6,.profile-pic7,.profile-pic8,.profile-pic9,.profile-pic10, .profile-pic11, .profile-pic12 {
            opacity: .5;
        }

        .avatar-wrapper .profile-pic1,.profile-pic2,.profile-pic3,.profile-pic4, .profile-pic5, .profile-pic6,.profile-pic7,.profile-pic8,.profile-pic9,.profile-pic10, .profile-pic11, .profile-pic12 {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        }

        .avatar-wrapper .profile-pic1:after,.profile-pic2:after,.profile-pic3:after,.profile-pic4:after,.profile-pic5:after,.profile-pic6:after,.profile-pic7:after,.profile-pic8:after,.profile-pic9:after,.profile-pic10:after,.profile-pic11:after,.profile-pic12:after {
            font-family: FontAwesome;
            content: "\f007";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 190px;
            background: #ecf0f1;
            color: #34495e;
            text-align: center;
        }

        .avatar-wrapper .upload-button1,.upload-button2,.upload-button3,.upload-button4,.upload-button5,.upload-button6, .upload-button7,.upload-button8,.upload-button9,.upload-button10,.upload-button11,.upload-button12 {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .avatar-wrapper.upload-button1,.upload-button2,.upload-button3,.upload-button4,.upload-button5,.upload-button6, .upload-button7,.upload-button8,.upload-button9,.upload-button10,.upload-button11,.upload-button12 .fa-arrow-circle-up {
            position: absolute;
            font-size: 50px;
            top: 40%;
            left: 30%;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #e4eae7;
        }

        .avatar-wrapper .upload-button1:hover,.upload-button2:hover,.upload-button3:hover,.upload-button4:hover,.upload-button5:hover,.upload-button6:hover, .upload-button7:hover,.upload-button8:hover,.upload-button9:hover,.upload-button10:hover,.upload-button11:hover,.upload-button12:hover .fa-arrow-circle-up {
            opacity: .9;
        }
    </style>
@endsection

<div class="card">
    <div class="card-header">
        Create Sell Product
    </div>

    <div class="card-body">

        <strong>{{ ucfirst($category ?? '') }} > <b
                style="font-size: 18px;">{{ ucfirst($sub_category ?? '') }}</b></strong>
        <hr>
        <form method="POST" action="{{ route('forsale.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category" value="{{ $category ?? '' }}">
            <input type="hidden" name="sub_category" value="{{ $sub_category ?? '' }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="name">Product Name *</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                            required>
                        {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
                @if ($category == 'vehicles')
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="company_name">Product Company Name *</label>
                        <input class="form-control" type="text" name="company_name" id="company_name"
                            value="{{ old('company_name') }}" required>
                        {!! $errors->first('company_name', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="quantity">Product Quantity *</label>
                        <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                            required>
                        {!! $errors->first('quantity', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="price">Product Price *</label>
                        <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}"
                            required>
                        {!! $errors->first('price', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="price">Product Images</label>
                <div class="row">
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic1" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button1">
                            </div>
                            <input class="file-upload1" type="file" name="image1" accept="image/*" required/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic2" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button2">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload2" type="file" name="image2" accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic3" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button3">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload3" type="file" name="image3" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic4" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button4">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload4" type="file" name="image4" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic5" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button5">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload5" type="file" name="image5" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic6" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button6">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload6" type="file" name="image6" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic7" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button7">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload7" type="file" name="image7" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic8" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button8">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload8" type="file" name="image8" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic9" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button9">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload9" type="file" name="image9" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic10" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button10">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload10" type="file" name="image10" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic11" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button11">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload11" type="file" name="image11" accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="avatar-wrapper">
                            <img class="profile-pic12" src="{{ asset('Images\demo1.jpg') }}" />
                            <div class="upload-button12">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload12" type="file" name="image12" accept="image/*" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required" for="price">Address *</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                        {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="price">District/City *</label>
                        <select name="district_id" class="form-control select2" id="" required>
                            <option selected disabled>--Select District/City--</option>
                            @foreach ($district as $item)
                            <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('district_id', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="price">Tehsil *</label>
                        <select name="tehsil_id" class="form-control select2" id="" required>
                            <option selected disabled>--Select Tehsil--</option>
                            @foreach ($tehsil as $item)
                            <option value="{{$item->id??''}}">{{$item->name??''}}({{$item->district_name->name??''}})</option>
                            @endforeach
                        </select>
                        {!! $errors->first('tehsil_id', "<span class='text-danger'>:message</span>") !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="description">Description *</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ old('description') }}</textarea>
                {!! $errors->first('description', "<span class='text-danger'>:message</span>") !!}
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    SAVE
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic1').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload1").on('change', function() {
        readURL1(this);
    });
    $(".upload-button1").on('click', function() {
        $(".file-upload1").click();
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic2').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload2").on('change', function() {
        readURL2(this);
    });
    $(".upload-button2").on('click', function() {
        $(".file-upload2").click();
    });

    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic3').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload3").on('change', function() {
        readURL3(this);
    });
    $(".upload-button3").on('click', function() {
        $(".file-upload3").click();
    });
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic4').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload4").on('change', function() {
        readURL4(this);
    });
    $(".upload-button4").on('click', function() {
        $(".file-upload4").click();
    });
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic5').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload5").on('change', function() {
        readURL5(this);
    });
    $(".upload-button5").on('click', function() {
        $(".file-upload5").click();
    });
    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic6').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload6").on('change', function() {
        readURL6(this);
    });
    $(".upload-button6").on('click', function() {
        $(".file-upload6").click();
    });

    function readURL7(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic7').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload7").on('change', function() {
        readURL7(this);
    });
    $(".upload-button7").on('click', function() {
        $(".file-upload7").click();
    });

    function readURL8(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic8').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload8").on('change', function() {
        readURL8(this);
    });
    $(".upload-button8").on('click', function() {
        $(".file-upload8").click();
    });

    function readURL9(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic9').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload9").on('change', function() {
        readURL9(this);
    });
    $(".upload-button9").on('click', function() {
        $(".file-upload9").click();
    });
    function readURL10(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic10').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload10").on('change', function() {
        readURL10(this);
    });
    $(".upload-button10").on('click', function() {
        $(".file-upload10").click();
    });
    function readURL11(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic11').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload11").on('change', function() {
        readURL11(this);
    });
    $(".upload-button11").on('click', function() {
        $(".file-upload11").click();
    });
    function readURL12(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic12').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload12").on('change', function() {
        readURL12(this);
    });
    $(".upload-button12").on('click', function() {
        $(".file-upload12").click();
    });
</script>
@endsection
