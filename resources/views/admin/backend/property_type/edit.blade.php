@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Edit </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Property Edit </li>
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
                                <a href="{{ route('admin.backend.property_type.index') }}" class="btn btn-primary">Property
                                    Type</a>
                            </div>
                        </div>
                        <form class="forms-sample" method="POST" action="{{ route('admin.property_type.update',$property_type->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $property_type->id }}">
                            <div class="form-group me-2 mb-3">
                                <label for="exampleInputName1">Property Type</label>
                                <input type="text" class="form-control @error('type_name') is-invalid @enderror" id="type_name" name="type_name" value="{{ $property_type->type_name }}"
                                    placeholder="Property Type" >
                                @error('type_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group me-2 mb-3">
                                <label for="exampleInputName1">Icon</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"
                                    placeholder="Property Type"  value="{{ $property_type->icon }}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
