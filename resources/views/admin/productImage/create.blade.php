@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Product Image
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-image.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="product">Product</label>
                <select class="form-control" name="product" id="product" required>
                    @foreach ($product as $item)
                        <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("product", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image" required>
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
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