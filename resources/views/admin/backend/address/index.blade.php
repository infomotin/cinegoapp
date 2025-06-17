@extends('admin.dashboard')
@section('content')
    {{-- add toggle main css cdn  --}}
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Country List </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Country</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Country</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.create') }}" class="btn btn-primary">Add
                                    Country</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.division_index') }}" class="btn btn-primary">Show
                                    division</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Country Name</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $key => $country)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($country->flag) }}" alt="icon" width="50"></td>
                                            <td>{{ $country->name }}</td>
                                            
                                            <td>
                                                <a href="#"
                                                    type="button" class="btn btn-primary btn-icon-text">
                                                    Edit
                                                </a>
                                                <a href="#"
                                                    type="button" class="btn btn-danger btn-icon-text" id="delete">
                                                    Delete
                                                </a>
                                            </td>
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
