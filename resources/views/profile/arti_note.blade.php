@extends('layouts.admin')

@section('content')

    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ url('update-note') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="form-group col-12 alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="note">Note (<small>display in your profile</small>)</label>
                                    <textarea class="form-control" id="note" name="note">{{ Auth()->user()->note ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="text-center mx-auto">
                                <button class="btn btn-primary px-5 py-3 mt-4">Update   </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script></script>
@endsection
