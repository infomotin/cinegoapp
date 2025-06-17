@extends('admin.dashboard')
@section('content')
    {{-- add toggle main css cdn  --}}
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">City List </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add City</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All City</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.create') }}" class="btn btn-primary">Add
                                    Country</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.division.division_create') }}" class="btn btn-primary">Add 
                                    City</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.district_index') }}" class="btn btn-primary">Show District</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.zone_index') }}" class="btn btn-primary">Show Zone</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.city_index') }}" class="btn btn-primary">Show City</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.police_index') }}" class="btn btn-primary">Show Police Station</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.landmark_index') }}" class="btn btn-primary">Show Landmark</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.word_index') }}" class="btn btn-primary">Show Word</a>
                            </div>
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.address.road_index') }}" class="btn btn-primary">Show Road</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Country Name</th>
                                        <th>Division Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisions as $key => $value)
                                        <tr>
                                            <td>{{$key +1}}</td>
                                            <td>{{$value['country']['name']}}</td>
                                            <td>{{$value->name}}</td>
                                            <td></td>
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
