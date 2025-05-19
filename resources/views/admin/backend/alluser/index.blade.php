@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">All User </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Agent</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Agent</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.user.create') }}" class="btn btn-primary">Add
                                    Agent</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $amenitie)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ !$amenitie->photo ? asset('upload/no_image.jpg') : asset( $amenitie->photo) }}" alt="icon" width="50">
                                            <td>{{ $amenitie->name }}</td>
                                            <td>{{ $amenitie->email }}</td>
                                            <td>{{ $amenitie->role }}</td>
                                            <td>{{ $amenitie->phone }}</td>
                                            <td>
                                                @if ($amenitie->status == 'active')
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">InActive</span>
                                                @endif
                                            </td>

                                            

                                            <td>
                                                <a href="{{ route('admin.backend.amenities.edit', $amenitie->id) }}"
                                                    type="button" class="btn btn-primary btn-icon-text">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.backend.amenities.delete', $amenitie->id) }}"
                                                    type="button" class="btn btn-danger btn-icon-text" id="delete">
                                                    Delete
                                                </a>
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

    </div>

    <script>
        $(document).ready(function() {
            $('#dataTableExample').DataTable();
        });
    </script>
@endsection
