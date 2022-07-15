@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Product Images
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('client.Product.Image.Update', $user_product->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <img src="{{ asset($user_product->image1) }}" style="height: 100px; width:100px;" alt="">
                </div>
                <div class="form-group">
                    <label class="required" for="image">Image One (optional)</label>
                    <input class="form-control" type="file" name="image1" id="image1">
                </div>
                <div class="form-group">
                    <img src="{{ asset($user_product->image2) }}" style="height: 100px; width:100px;" alt="">
                </div>
                <div class="form-group">
                    <label class="required" for="image">Image Two (optional)</label>
                    <input class="form-control" type="file" name="image2" id="image2">
                </div>
                <div class="form-group">
                    <label class="required" for="image">Description</label>
                    <textarea id="div_editor1" class="form-control" type="text" name="description" required>{{ $user_product->description ?? '' }}</textarea>
                    {!! $errors->first('description', "<span class='text-danger'>:message</span>") !!}
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
