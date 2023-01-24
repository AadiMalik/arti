@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Province
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.province.update",$province->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">Province Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $province->name }}" required>
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