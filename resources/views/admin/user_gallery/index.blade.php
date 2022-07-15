@extends('layouts.admin')
@section('content')
<div class="row">
    
    <div class="col-md-12">
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
                                    User Name
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
                                        {{$item->user_name->first_name??''}} {{$item->user_name->last_name??''}}
                                    </td>
                                    <td>
    
                                        @can('admin_user_gallery_delete')
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
                var url = '{{ route("admin.deleteUserGallery", ":id") }}';
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
