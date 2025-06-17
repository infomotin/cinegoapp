@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Propertye</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Property</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Property</h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('backend.property.create') }}" class="btn btn-primary">Add Property
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Image </th>
                                        <th>Name </th>
                                        <th>P Type </th>
                                        <th>Status Type </th>
                                        <th>City </th>
                                        <th>Code </th>
                                        <th>Status </th>
                                        <th>Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($item->property_thambnail) }}"
                                                        style="width:70px; height:40px;"> </td>
                                                <td>{{ $item->property_name }}</td>
                                                <td>{{ $item['propertyType']['type_name'] }}</td>
                                                <td>{{ $item->property_status }}</td>
                                                <td>{{ $item->city_name }}</td>
                                                <td>{{ $item->property_code }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge rounded-pill bg-success">Active</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger">InActive</span>
                                                    @endif

                                                </td>

                                                <td>

                                                    <a href="{{ route('agent.property.edit', $item->id) }}" class="btn btn-inverse-info" title="Details"> <i
                                                            data-feather="eye"></i>
                                                    </a>

                                                    <a href="{{ route('backend.property.edit', $item->id) }}" class="btn btn-inverse-warning" title="Edit"> <i
                                                            data-feather="edit"></i> </a>

                                                    <a href="#" class="btn btn-inverse-danger" id="delete"
                                                        title="Delete"> <i data-feather="trash-2"></i> </a>
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
@endsection
