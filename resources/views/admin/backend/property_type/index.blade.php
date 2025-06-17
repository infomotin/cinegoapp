@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Property Type</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Property Type</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.property_type.create') }}" class="btn btn-primary">Add Property
                                    Type</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Property Type Name</th>
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property_types as $key => $property_type)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $property_type->type_name }}</td>
                                            <td><img src="{{ asset($property_type->icon) }}" alt="icon" width="50">
                                            </td>
                                            <td><span class="badge bg-success">
                                                    @if ($property_type->status == 'active')
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.property_type.edit', $property_type->id) }}" type="button" class="btn btn-primary btn-icon-text">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin.property_type.delete', $property_type->id) }}" type="button" class="btn btn-danger btn-icon-text" id="delete">
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
