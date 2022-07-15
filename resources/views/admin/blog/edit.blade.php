@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Blog
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog.update",$blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $blog->name??''}}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Old Image</label>
                <img src="{{asset($blog->image)}}" style="width: 200px; height:200px;" alt="">
            </div>
            <div class="form-group">
                <label class="required" for="icon">New Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="summernote form-control" type="text" name="description" required>{{ $blog->description }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                        <option value="0" @if($blog->status==0) selected @endif>Active</option>
                        <option value="1" @if($blog->status==1) selected @endif>Block</option>
                </select>
                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="tags">Tags</label>
                <input class="form-control inputtags" type="text" name="tags" value="{{ $blog->tags }}">
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