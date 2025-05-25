@extends('admin.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                                    <th>User Name </th>
                                    <th>Package Name </th>
                                    <th>Invoice No </th>
                                    <th>Credits </th>
                                    <th>Price </th>
                                    <th>package is offer </th>
                                    <th>promo_code </th>
                                    <th>Date </th>
                                    <th>Status </th>
                                    <td>Action</td>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package_plans as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item['userName']['photo']) }}"
                                                style="width:60px; height:40px;">
                                        </td>
                                        <td>{{ $item['userName']['name'] }}</td>
                                        <td>{{ $item->package_name }}</td>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->package_price }}</td>
                                        <td>{{ $item->package_duration }}</td>

                                        <td>
                                            @if ($item->package_is_offer != null)
                                                {{ $item->package_is_offer }}
                                            @else
                                                No offer
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->promo_code != null)
                                                {{ $item->promo_code }}
                                            @else
                                                No Pro Code
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('l d M Y') }}</td>
                                        <td>
                                            @if ($item->package_status == 1)
                                                <span class="badge rounded-pill bg-success">Active</span>
                                            @else
                                                <span class="badge rounded-pill bg-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.backend.package.invoice', $item->invoice) }}" class="btn btn-primary"><i class="fa download">download </i></a>
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
@endsection
