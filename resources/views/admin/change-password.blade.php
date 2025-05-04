@extends('admin.dashboard')
@section('content')

    <div class="page-content">

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="position-relative">
                        <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                            <img src="https://placehold.co/1560x370.png"class="rounded-top" alt="profile cover">
                        </figure>
                        <div
                            class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                            <div>
                                <img style="width: 70px; height: 70px"
                                    src="{{ !$user->photo ? asset('upload/no_image.jpg') : asset( $user->photo) }}"
                                    alt="" class="img-fluid align-items-center rounded-circle mb-2" alt="">
                                <span class="h4 ms-3 text-dark">{{ $user->name }}</span>
                            </div>
                            <div class="d-none d-md-block">
                                <button class="btn btn-primary btn-icon-text">
                                    <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center p-3 rounded-bottom">
                        <ul class="d-flex align-items-center m-0 p-0">
                            <li class="d-flex align-items-center active">
                                <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                                <a class="pt-1px d-none d-md-block text-primary" href="{{ route('admin.change.password') }}">Change Password</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <row>
                                <img style="width: 100px; height: 100px"
                                    src="{{ !$user->photo ? asset('upload/no_image.jpg') : asset( $user->photo) }}"
                                    alt="" class="img-fluid align-items-center rounded-circle mb-2" alt="">
                            </row>
                            <row>
                                <span class="d-flex align-items-center h4  text-white fw-bold ">{{ $user->name }}</span>
                                <p class=" d-flex align-items-center text-muted mb-0 fw-bold">Senior UI Designer</p>
                            </row>
                        </div>


                        <div class="border border-color-1 rounded p-2 mb-3">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">About</h6>
                            </div>
                            <p{{ $user->bio }}< /p>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                                    <p class="text-muted">November 15, 2015</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                                    <p class="text-muted">New York, USA</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                                    <p class="text-muted">www.nobleui.com</p>
                                </div>
                                <div class="mt-3 d-flex social-links">
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="github"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="instagram"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Change Password</h6>

                            <form class="forms-sample" action="{{ route('admin.change.password.submit') }}" method="POST" >
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" readonly
                                        aria-describedby="usernameHelp" value="{{ $user->username }}" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" autocomplete="off" readonly
                                        aria-describedby="emailHelp" value="{{ $user->email }}"  name="email"
                                        placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" autocomplete="off" readonly
                                        aria-describedby="nameHelp" value="{{ $user->name }}" name="name"
                                        placeholder="Name">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Current Password</label>
                                    <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                        aria-describedby="nameHelp" id="old_password" name="old_password" placeholder="Current Password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">New Password</label>
                                    <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                        aria-describedby="nameHelp" id="new_password" name="new_password" placeholder="New Password">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputName1" class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                        aria-describedby="nameHelp" name="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <h6 class="card-title">latest photos</h6>
                                <div class="row ms-0 me-0">
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-2">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-0">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-0">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                    <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                                        <figure class="mb-0">
                                            <img class="img-fluid rounded" src="https://placehold.co/96x96.png"
                                                alt="">
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- right wrapper end -->
        </div>

    </div>
    


@endsection
