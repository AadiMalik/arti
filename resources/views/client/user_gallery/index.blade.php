@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Create Gallery Images
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route("client.user-gallery.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="heading">Image</label>
                        <input class="form-control" type="file" name="image[]" id="image" multiple>
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
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Gallery Images
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
                                    Image
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_gallery as $index=> $item)
                                <tr>
                                    <td>
                                        {{ $index+1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->image??'') }}" style="height: 100px;" alt="">
                                    </td>
                                    <td>
    
                                        @can('user_gallery_delete')
                                            <a class="btn btn-xs btn-danger"
                                                onclick="user_galleryDelete{{ $item->id }}({{ $item->id }})">
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
@foreach ($user_gallery as $item)
<script>
    function user_galleryDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete Gallery Image?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("client.deleteUserGallery", ":id") }}';
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
