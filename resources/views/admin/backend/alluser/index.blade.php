@extends('admin.dashboard')
@section('content')
    {{-- add toggle main css cdn  --}}
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    
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
                                        <th>change</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $amenitie)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ !$amenitie->photo ? asset('upload/no_image.jpg') : asset($amenitie->photo) }}"
                                                    alt="icon" width="50">
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
                                                <input type="checkbox" class="toggle-class" data-id="{{ $amenitie->id }}" 
                                                data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" 
                                                {{ $amenitie->status == 'active' ? 'checked' : '' }}>
                                            </td>


                                            <td>
                                                <a href="{{ route('admin.backend.user.edit', $amenitie->id) }}"
                                                    type="button" class="btn btn-primary btn-icon-text">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.backend.users.delete', $amenitie->id) }}"
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/update-user-status',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>

    
@endsection
