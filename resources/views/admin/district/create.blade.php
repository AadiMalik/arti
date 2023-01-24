@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create District
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.district.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">District Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="province">Province</label>
                <select name="province" class="form-control" id="">
                    <option disabled selected>--Select Province--</option>
                    @foreach ($province as $item)
                    <option value="{{$item->id}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("province", "<span class='text-danger'>:message</span>")!!}
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