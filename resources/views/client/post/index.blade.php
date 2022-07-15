@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Your Posts
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
                                    $product = json_decode($item->name, true);
                                    $price_high = json_decode($item->price_high, true);
                                    $price_low = json_decode($item->price_low, true);
                                    $weight = json_decode($item->weight, true);
                                @endphp
                                <td>
                                    @foreach ($product as $item1)
                                        {{ $item1 }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($price_high as $item1)
                                        {{ $item1 }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($price_low as $item1)
                                        {{ $item1 }},
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($weight as $item1)
                                    {{$item1}},
                                @endforeach
                                </td>
                                <td>
                                    {{ $item->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('user_product_post_delete')
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
                    title: "Are You Sure Want To Delete Post?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route('client.deleteProductPost', ':id') }}';
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
