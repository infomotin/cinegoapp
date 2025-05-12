@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Amenities Edit </a></li>
                <li class="breadcrumb-item active" aria-current="page">Amenities Edit </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">All Amenities </h6>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.backend.amenities.index') }}" class="btn btn-primary">Amenities
                                    </a>
                            </div>
                        </div>
                        <form class="forms-sample" method="POST"
                            action="{{ route('admin.backend.amenities.update', $amenities->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $amenities->id }}">
                            <div class="form-group me-2 mb-3">
                                <label for="exampleInputName1">Amenities </label>
                                <input type="text" class="form-control @error('amenities_name') is-invalid @enderror"
                                    id="amenities_name" name="amenities_name" value="{{ $amenities->amenities_name }}"
                                    placeholder="Amenities Type">
                                @error('amenities_name')
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
