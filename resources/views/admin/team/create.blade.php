@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Team Member
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="profession">Profession</label>
                <input class="form-control" type="text" name="profession" id="profession" value="{{ old('profession') }}" required>
                {!!$errors->first("profession", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Image</label>
                <input class="form-control" type="file" name="image" id="image" required>
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="bio">Bio</label>
                <textarea id="div_editor1" class="form-control" type="text" name="bio" required>{{ old('bio') }}</textarea>
                {!!$errors->first("bio", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="facebook">Facebook</label>
                <input class="form-control" type="url" name="facebook" id="facebook" value="{{ old('facebook') }}">
            </div>
            <div class="form-group">
                <label class="required" for="twitter">Twitter</label>
                <input class="form-control" type="url" name="twitter" id="twitter" value="{{ old('twitter') }}">
            </div>
            <div class="form-group">
                <label class="required" for="linkedin">linkedin</label>
                <input class="form-control" type="url" name="linkedin" id="linkedin" value="{{ old('linkedin') }}">
            </div>
            <div class="form-group">
                <label class="required" for="google">Google</label>
                <input class="form-control" type="url" name="google" id="google" value="{{ old('google') }}">
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