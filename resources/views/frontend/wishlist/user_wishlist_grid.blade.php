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
                    <div class="property-content-side">

                        <div class="wrapper list">
                            <div class="deals-list-content list-item">
                                @foreach ($wishlists as $key => $wishlist)
                                <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="{{ asset($wishlist->property->property_thambnail) }}"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="property-details.html">For Buy</a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="property-details.html">{{$wishlist->property->property_name}}</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>${{$wishlist->property->lowest_price}}</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="{{ asset($wishlist->user->photo) }}" alt="">
                                                        <span>{{$wishlist->user->name}}</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p>{{$wishlist->property->short_descp}}</p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>{{$wishlist->property->bedrooms}} Beds</li>
                                                <li><i class="icon-15"></i>{{$wishlist->property->bathrooms}} Baths</li>
                                                <li><i class="icon-16"></i>{{$wishlist->property->property_size}} Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="{{url('property/details/'.$wishlist->property->id.'/'.$wishlist->property->property_slug)}}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                                    <li><a aria-label="Add To Wishlist" class="action-btn" id="{{$wishlist->property->id}}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
@endsection
