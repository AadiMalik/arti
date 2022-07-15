@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Category
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.category.update",$category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
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