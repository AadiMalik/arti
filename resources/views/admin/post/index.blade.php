@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Arti Posts
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
                                Weight
                            </th>
                            <th>
                                Arti Name
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $index => $item)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                @php
                                    $product = json_encode($item->name);
                                    $price_high = json_encode($item->price_high);
                                    $price_low = json_encode($item->price_low);
                                    $weight = json_encode($item->weight);
                                @endphp
                                <td>
                                    {{json_decode($product)}}
                                </td>
                                <td>
                                    {{json_decode($price_high)}}
                                </td>
                                <td>
                                    {{json_decode($price_low)}}
                                </td>
                                <td>
                                    {{json_decode($weight)}}
                                </td>
                                <td>
                                    {{ $item->arti_name->first_name ?? '' }} {{ $item->arti_name->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('arti_post_delete')
                                        <a class="btn btn-xs btn-danger"
                                            onclick="artipostDelete{{ $item->id }}({{ $item->id }})">
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
    @foreach ($post as $item)
        <script>
            function artipostDelete{{ $item->id }}(id) {
                swal({
                    title: "Are You Sure Want To Delete Arti Post?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('admin.deleteProductPost', ':id') }}';
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
