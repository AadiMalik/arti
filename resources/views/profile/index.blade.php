@extends('layouts.admin')

@section('content')

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
                            <div class="col-12">
                                <img src="{{ auth()->user()->image ?? asset('dash-assets/images/profile-avatar.png') }}"
                                    width="100" height="100">
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
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
