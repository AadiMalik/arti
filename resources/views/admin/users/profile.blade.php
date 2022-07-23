@extends('layouts.admin')
@section('content')
@section('style')
    <style>
        .logoimg {
            text-align: center;
        }

        .avatar-wrapper {
            position: relative;
            height: 200px;
            width: 200px;
            /*margin: 20px auto;*/
            margin: -100px auto 20px auto;
            border-radius: 50%;
            overflow: hidden;
            /*box-shadow: 1px 1px 15px -5px black;*/
            box-shadow: none;
            transition: all .3s ease;
        }

        .avatar-wrapper:hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .avatar-wrapper:hover .profile-pic {
            opacity: .5;
        }

        .avatar-wrapper .profile-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        }

        .avatar-wrapper .profile-pic:after {
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

        .avatar-wrapper .upload-button {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .avatar-wrapper .upload-button .fa-arrow-circle-up {
            position: absolute;
            font-size: 243px;
            top: -16px;
            left: -5px;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #e4eae7;
        }

        .avatar-wrapper .upload-button:hover .fa-arrow-circle-up {
            opacity: .9;
        }
    </style>
@endsection
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">

    <div class="col-xl-4">
        <div class="card">
            <grammarly-extension data-grammarly-shadow-root="true"
                style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT">
            </grammarly-extension>

            <div class="card-header">
                <h4 class="card-title mb-0">My Profile</h4>
                <div class="card-options"><a class="card-options-collapse" href="javascript:;"
                        data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i
                            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;"
                        data-bs-toggle="card-remove" data-bs-original-title="" title=""><i
                            class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
                <div>
                    <div class="profile-title">
                        <div class="media ad-profile2-img">
                            <img alt=""
                                src="{{ asset(Auth()->user()->image ?? 'dash-assets/images/user2.png') }}"
                                style="height: 100px;">
                            {{-- <div class="media-body">
                                    <h5 class="mb-1"></h5>
                                    <p>{{ Auth()->user()->profession }}</p>
                                </div> --}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <b>Name:</b>
                        <p>{{ Auth()->user()->first_name }}
                            {{ Auth()->user()->last_name }}</p>
                    </div>
                    <div class="mb-3">
                        <b>Email-Address</b>
                        <p>{{ Auth()->user()->email }}</p>
                    </div>
                    <div class="mb-3">
                        <b>Address</b>
                        <p>{{ Auth()->user()->address ?? 'No Address' }}</p>
                    </div>
                    {{-- <div class="form-footer">
                            <button class="btn btn-primary squer-btn" data-bs-original-title="" title="">Save</button>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <form class="card" method="POST" action="{{ route('admin.profile.update', Auth()->user()->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Profile</h4>
                <div class="card-options"><a class="card-options-collapse" href="javascript:;"
                        data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i
                            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;"
                        data-bs-toggle="card-remove" data-bs-original-title="" title=""><i
                            class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <input class="form-control" type="text" placeholder="Company" data-bs-original-title=""
                                    title="">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input class="form-control" type="text" placeholder="Username" data-bs-original-title=""
                                    title="">
                            </div>
                        </div> --}}
                    {{-- <div class="col-sm-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input class="form-control" type="email" placeholder="Email" data-bs-original-title=""
                                    title="">
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="{{asset(Auth()->user()->image??'assets\img\user.jpg')}}" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" name="image" accept="image/*" />
                            </div>
                        </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" type="text" name="first_name"
                                value="{{ Auth()->user()->first_name ?? '' }}" placeholder="First Name"
                                data-bs-original-title="" title="">
                            {!! $errors->first('first_name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="last_name"
                                value="{{ Auth()->user()->last_name ?? '' }}" placeholder="Last Name"
                                data-bs-original-title="" title="">
                            {!! $errors->first('last_name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" disabled
                                value="{{ Auth()->user()->email ?? '' }}" placeholder="E-Mail"
                                data-bs-original-title="" title="">

                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Image <small>(optional)</small></label>
                            <input class="form-control" name="image" type="file" data-bs-original-title=""
                                title="">
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" name="address"
                                value="{{ Auth()->user()->address ?? '' }}" placeholder="Home Address"
                                data-bs-original-title="" title="">
                            {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary squer-btn" type="submit" data-bs-original-title=""
                    title="">Update
                    Profile</button>
            </div>
        </form>
    </div>

</div>
@endsection
@section('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var fileurl = e.target.result;
                $('.profile-pic').attr('src', fileurl);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function() {
        readURL(this);
    });
    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
</script>
@endsection
