@extends('layouts.admin')
@section('content')
    
    <div class="card">
        <div class="card-header">
            Contact Mail
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                    <thead>
                        <tr>    
                            <th>
                                Sr.
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $index=> $item)
                            <tr @if($item->seen=='0') style="background:#FAEBD7;" @endif>
                                <td>
                                    {{ $index+1 }}
                                </td>
                                <td>
                                    {{ $item->subject??'' }}
                                </td>
                                <td>
                                    {{ $item->name??'' }}
                                </td>
                                <td>
                                    {{ $item->email??'' }}
                                </td>
                                <td>
                                    {{ $item->phone??'' }}
                                </td>
                                <td>
                                    {{ $item->message??'' }}
                                </td>
                                <td>
                                    @can('contact_reply')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.contact.edit', $item->id) }}">
                                            Reply
                                        </a>
                                    @endcan

                                    @can('contact_delete')
                                        <a class="btn btn-xs btn-danger"
                                            onclick="contactDelete{{ $item->id }}({{ $item->id }})">
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
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
@foreach ($contact as $item)
<script>
    function contactDelete{{$item->id}}(id){
        swal({
            title: "Are You Sure Want To Delete Contact Mail?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ route("admin.deleteContact", ":id") }}';
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
