@extends('admin.dashboard')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Country</a></li>
                <li class="breadcrumb-item active" aria-current="page">Country Add </li>
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
                                <a href="{{ route('admin.backend.address.index') }}" class="btn btn-primary">Users</a>
                            </div>
                        </div>
                        <form class="forms-sample" method="POST" action="{{ route('admin.backend.address.store') }}"
                            id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group me-2 mb-3">
                                <label for="exampleInputName1">Country Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Country Name">
                            </div>
                            
                            <div class="form-group me-2 mb-3">
                                <label for="photo" class="form-label">flaug Image</label>
                                    <input type="file" class="form-control" id="flaug" name="flaug" accept="image/*">
                                    <img id="showImage" class="mt-2" src="{{ asset('upload/no_image.jpg') }}" alt="User Image" style="width: 100px; height: 100px;">

                            </div>

                            <button type="submit" class="btn btn-primary me-2">Register Country</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },



                },
                messages: {
                    name: {
                        required: 'Please Enter Company  Name',
                    },
                    username: {
                        required: 'Please Enter User Name',
                    },
                    phone: {
                        required: 'Please Enter Phone',
                    },
                    email: {
                        required: 'Please EnterEmail',
                    },




                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#photo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
