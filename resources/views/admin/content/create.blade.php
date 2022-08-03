@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Content
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="page">Page</label>
                <input class="form-control" type="text" name="page" id="page" value="{{ old('page') }}">
            </div>
            <div class="form-group">
                <label class="required" for="heading">Heading</label>
                <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
            </div>
            <div class="form-group">
                <label class="required" for="key">Key</label>
                <input class="form-control" type="text" name="key" id="key" value="{{ old('key')}}" required>
                {!!$errors->first("key", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="" class="summernote form-control" type="text" name="description">{{ old('description') }}</textarea>
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