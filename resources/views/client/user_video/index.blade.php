@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Create Video
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route("client.user-video.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="heading">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                        {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                    </div>
                    <div class="form-group">
                        <label class="required" for="heading">Link</label>
                        <input class="form-control" type="text" name="link" id="link" value="{{old('link')}}">
                        {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            SAVE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Videos
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>    
                                <th>
                                    Sr.
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Link
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_video as $index=> $item)
                                <tr>
                                    <td>
                                        {{ $index+1 }}
                                    </td>
                                    <td>
                                        {{$item->name??''}}
                                    </td>
                                    <td>
                                        {{$item->link??''}}
                                    </td>
                                    <td>
    
                                        @can('user_video_delete')
                                            <a class="btn btn-xs btn-danger"
                                                onclick="user_videoDelete{{ $item->id }}({{ $item->id }})">
                                                Delete
                                            </a>
                                        @endcan
    
                                    </td>
    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
@foreach ($user_video as $item)
<script>
    function user_videoDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete Video?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("client.deleteUserVideo", ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: url,
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        //var data = JSON.parse(response);
                        iziToast.success({
                            message: data.message,
                            position: 'topRight'
                        });
                        //Reload page
                        window.location.reload();

                    }
                });
            }
        });

    }
</script>
@endforeach
@endsection
