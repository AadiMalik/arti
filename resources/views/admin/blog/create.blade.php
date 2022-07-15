@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Blog
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image" required>
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="" class="summernote form-control" type="text" name="description" required>{{ old('description') }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="tags">Tags</label>
                <input type="text" class="form-control inputtags" name="tags">
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
@endsection