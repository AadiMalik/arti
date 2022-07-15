@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update For Sale Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("client.forsale.update",$product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $product->name??''}}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control" type="number" name="price" id="price" value="{{ $product->price??''}}" required>
                {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ $product->description }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
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