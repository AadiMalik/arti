@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Team Member
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team.update",$team->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $team->name }}">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="profession">Profession</label>
                <input class="form-control" type="text" name="profession" id="profession" value="{{ $team->profession }}">
                {!!$errors->first("profession", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Old Image</label>
                <img src="{{asset($team->image)}}" style="width: 200px; height:200px;" alt="">
            </div>
            <div class="form-group">
                <label class="required" for="icon">New Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label class="required" for="bio">Bio</label>
                <textarea id="div_editor1" class="form-control" type="text" name="bio" >{{ $team->bio }}</textarea>
                {!!$errors->first("bio", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="facebook">Facebook</label>
                <input class="form-control" type="url" name="facebook" id="facebook" value="{{ $team->facebook }}">
            </div>
            <div class="form-group">
                <label class="required" for="twitter">Twitter</label>
                <input class="form-control" type="url" name="twitter" id="twitter" value="{{ $team->twitter }}">
            </div>
            <div class="form-group">
                <label class="required" for="linkedin">Linkedin</label>
                <input class="form-control" type="url" name="linkedin" id="linkedin" value="{{ $team->linkedin }}">
            </div>
            <div class="form-group">
                <label class="required" for="google">Google</label>
                <input class="form-control" type="url" name="google" id="google" value="{{ $team->google }}">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection