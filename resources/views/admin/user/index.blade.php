@extends('admin.main.headerfooter')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
@endsection
@section('contain')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Managment</h1>
            <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add
                User</a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success" id="flash-message" role="alert">
                <div class="alert-body">
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="button" onclick="deleteItam({{ $item->id }})"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>

    <!-- End of Main Content -->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });

        function deleteItam(id) {
            if (confirm('Are you sure?')) {
                // console.log(id);
                $.ajax({
                    type: 'delete',
                    url: `users/${id}`,
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        alert(result);
                        location.reload(true);
                    }
                });
            }
        };
    </script>
@endsection
