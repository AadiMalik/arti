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
            margin: -60px auto 20px auto;
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

    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ url('update-profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="form-group col-12 alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="{{asset($user->image??'assets\img\user.jpg')}}" />
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" name="image" accept="image/*" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input disabled class="form-control" id="username" name="username"
                                        value="{{ $user->username ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input class="form-control" id="name" name="first_name"
                                        value="{{ $user->first_name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input class="form-control" id="name" name="last_name"
                                        value="{{ $user->last_name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" disabled id="email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Phone 1</label>
                                    <input class="form-control" type="number" id="phone1" name="phone1"
                                        value="{{ $user->phone1 ?? '' }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Phone 2</label>
                                    <input class="form-control" type="number" id="phone2" name="phone2"
                                        value="{{ $user->phone2 ?? '' }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Phone 3</label>
                                    <input class="form-control" type="number" id="phone3" name="phone3"
                                        value="{{ $user->phone3 ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Land Line No</label>
                                    <input class="form-control" type="number" id="tel" name="tel"
                                        value="{{ $user->tel ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input class="form-control" id="address" name="address"
                                        value="{{ $user->address ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Tehsil</label>
                                    <input class="form-control" id="teh" name="teh"
                                        value="{{ $user->teh ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">District/City</label>
                                    <input class="form-control" id="city" name="city"
                                        value="{{ $user->city ?? '' }}">
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <img src="{{ auth()->user()->image ?? asset('dash-assets/images/profile-avatar.png') }}"
                                    width="100" height="100">
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div> --}}
                            <div class="col-12">
                              <div class="form-group">
                                  <label for="bio">About</label>
                                  <textarea class="form-control" id="bio" name="bio">{{ $user->bio ?? '' }}</textarea>
                              </div>
                          </div>

                            <div class="text-center mx-auto">
                                <button class="btn btn-primary px-5 py-3 mt-4">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
