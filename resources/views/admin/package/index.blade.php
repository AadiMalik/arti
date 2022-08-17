@extends('layouts.admin')
@section('content')
    @can('package_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.package.create') }}">
                    Add New
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            Packages
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
                                Price
                            </th>
                            <th>
                                Adds
                            </th>
                            <th>
                                Top Limit
                            </th>
                            <th>
                                Days
                            </th>
                            <th>
                                Color
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
                        @foreach ($package as $index=> $item)
                            <tr>
                                <td>
                                    {{ $item->no??'' }}
                                </td>
                                <td>
                                    {{ $item->name??'' }}
                                </td>
                                <td>
                                    {{ $item->price??'' }}
                                </td>
                                <td>
                                    {{ $item->add??'' }}
                                </td>
                                <td>
                                    {{ $item->top??'' }}
                                </td>
                                <td>
                                    {{ $item->days??'' }}
                                </td>
                                <td>
                                    <span class="fa fa-stop" style="font-size: 18px; color:{{$item->color??''}}"></span>
                                </td>
                                <td>
                                    @if($item->status==0)
                                    Active
                                    @else
                                    Block
                                    @endif
                                </td>
                                <td>
                                    @can('package_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.package.edit', $item->id) }}">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('package_delete')
                                        <a class="btn btn-xs btn-danger"
                                            onclick="packageDelete{{ $item->id }}({{ $item->id }})">
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
@foreach ($package as $item)
<script>
    function packageDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete Package?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("admin.deletePackage", ":id") }}';
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
