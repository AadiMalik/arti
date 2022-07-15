@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create For Sale Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.forsale.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control" type="number" name="price" id="price" value="{{ old('price') }}" required>
                {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image One</label>
                <input class="form-control" type="file" name="image1" id="image1" required>
                {!!$errors->first("image1", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Image Two</label>
                <input class="form-control" type="file" name="image2" id="image2" required>
                {!!$errors->first("image2", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ old('description') }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
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