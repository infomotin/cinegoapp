@extends('agent.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Message</li>
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
                                <a href="{{ route('agent.property.create') }}" class="btn btn-primary">Add Property
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Image </th>
                                        <th>Sender Name </th>
                                        <th>Sender Email </th>
                                        <th>Sender Phone </th>
                                        <th>Proparty City </th>
                                        <th>Message </th>
                                        <th>Status </th>
                                        <th>Action </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($item['property']['property_thambnail']) }}"
                                                        style="width:70px; height:40px;"> </td>
                                                <td>{{ $item['user']['name'] }}</td>
                                                <td>{{ $item['user']['email'] }}</td>
                                                <td>{{ $item->phone_number }}</td>
                                                <td>{{ $item['property']['city_name'] }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>
                                                    @if ($item['property']['property_status'] == 1)
                                                        <span class="badge rounded-pill bg-success">Active</span>
                                                    @else
                                                        <span class="badge rounded-pill bg-danger">InActive</span>
                                                    @endif
                                                </td>

                                                <td>

                                                    <a href="#" class="btn btn-inverse-info" title="Details"> <i
                                                            data-feather="eye"></i>
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
@endsection
