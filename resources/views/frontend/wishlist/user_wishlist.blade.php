@extends('frontend.frontend_dashboard')
@section('content')
    <!--Page Title-->
    <section class="page-title centred"
        style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>User Profile </h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>User Profile </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    @php
        $id = Auth::user()->id;
        $user = App\Models\User::find($id);
    @endphp

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        @include('frontend.dashboard.user_title')
                        @include('frontend.dashboard.dashboard_sidebar')
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="inner-box">
                            
                            <div class="blog-details">
                                <div class="news-block-one">
                                    <div class="inner-box">
                                        <div class="lower-content">
                                            <h3>My Wishlist</h3>
                                            <hr>
                                            {{-- table start --}}
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">SL</th>
                                                            <th scope="col">Property Title</th>
                                                            <th scope="col">Location</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Agent Name</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($wishlists as $key => $wishlist)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>
                                                                    <a
                                                                        href="{{url('property/details/'.$wishlist->property->id.'/'.$wishlist->property->property_slug)}}">{{ $wishlist->property->property_name }}
                                                                    </a>
                                                                </td>
                                                                <td>{{ $wishlist->property->street_address }}</td>
                                                                <td>{{ $wishlist->property->max_price }}</td>
                                                                <td>{{ $wishlist->user->name }}</td>
                                                                <td>
                                                                    <a href="{{ route('user.wishlist.delete', $wishlist->id) }}"
                                                                        class="btn btn-danger" id="delete">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- table end --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
@endsection
