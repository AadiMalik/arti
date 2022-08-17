@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Package
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.package.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Package Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="price">Package Price</label>
                <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}" required>
                {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="days">Package Days</label>
                <input class="form-control" type="number" name="days" id="days" value="{{ old('days') }}" required>
                {!!$errors->first("days", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="add">Adds Limit</label>
                <input class="form-control" type="number" name="add" id="add" value="{{ old('add') }}" required>
                {!!$errors->first("add", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="add"> Top Days Limit</label>
                <input class="form-control" type="number" name="top" id="top" value="{{ old('top') }}" required>
                {!!$errors->first("top", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="color">Package Color</label>
                <input class="form-control" type="color" name="color" id="color" value="{{ old('color') }}" required>
                {!!$errors->first("color", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="no">Display No</label>
                <input class="form-control" type="number" name="no" id="no" value="{{ old('no') }}" required>
                {!!$errors->first("no", "<span class='text-danger'>:message</span>")!!}
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