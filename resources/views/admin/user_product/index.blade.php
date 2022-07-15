@extends('layouts.admin')
@section('content')
    @can('admin_user_product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.user-product.create') }}">
                    Add New
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
           Arti Products
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
                                Product Name
                            </th>
                            <th>
                                Price High
                            </th>
                            <th>
                                Price Low
                            </th>
                            <th>
                                User
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_product as $index=> $item)
                            <tr>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->product_name->name??'' }}
                                </td>
                                <td>
                                    {{ $item->price_high??'' }}
                                </td>
                                <td>
                                    {{ $item->price_low??'' }}
                                </td>
                                <td>
                                    {{ $item->user_name->name??'' }}
                                </td>
                                <td>
                                    @if($item->status==0)
                                    Active
                                    @else
                                    Block
                                    @endif
                                </td>
                                <td>
                                    @can('admin_user_product_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.user-product.edit', $item->id) }}">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('admin_user_product_delete')
                                        <a class="btn btn-xs btn-danger"
                                            onclick="userproductDelete{{ $item->id }}({{ $item->id }})">
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
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
@foreach ($user_product as $item)
<script>
    function userproductDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete User Product?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("admin.deleteUserProduct", ":id") }}';
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

