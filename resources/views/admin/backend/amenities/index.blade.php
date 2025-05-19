@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Amenities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Amenities</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Amenities</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.amenities.create') }}" class="btn btn-primary">Add
                                    Amenities</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Amenities Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amenities as $key => $amenitie)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $amenitie->amenities_name }}</td>

                                           

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
