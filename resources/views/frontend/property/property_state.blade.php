        @extends('frontend.frontend_dashboard')
        @section('content')
            <!--Page Title-->
            <section class="page-title-two bg-color-1 centred">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                    <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
                </div>
                <div class="auto-container">
                    <div class="content-box clearfix">
                        <h1>Property List</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('property.index') }}">{{ 'State' }}</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <!--End Page Title-->


            <!-- property-page-section -->
            <section class="property-page-section property-list">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="default-sidebar property-sidebar">
                                <div class="filter-widget sidebar-widget">
                                    <div class="widget-title">
                                        <h5>Property</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Type">All Type</option>
                                                <option value="1">Villa</option>
                                                <option value="2">Commercial</option>
                                                <option value="3">Residential</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Select Location">Select Location</option>
                                                <option value="1">New York</option>
                                                <option value="2">California</option>
                                                <option value="3">London</option>
                                                <option value="4">Maxico</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="This Area Only">This Area Only</option>
                                                <option value="1">New York</option>
                                                <option value="2">California</option>
                                                <option value="3">London</option>
                                                <option value="4">Maxico</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Type">Max Rooms</option>
                                                <option value="1">2+ Rooms</option>
                                                <option value="2">3+ Rooms</option>
                                                <option value="3">4+ Rooms</option>
                                                <option value="4">5+ Rooms</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Most Popular">Most Popular</option>
                                                <option value="1">Villa</option>
                                                <option value="2">Commercial</option>
                                                <option value="3">Residential</option>
                                            </select>
                                        </div>
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="All Type">Select Floor</option>
                                                <option value="1">2x Floor</option>
                                                <option value="2">3x Floor</option>
                                                <option value="3">4x Floor</option>
                                            </select>
                                        </div>
                                        <div class="filter-btn">
                                            <button type="submit" class="theme-btn btn-one"><i
                                                    class="fas fa-filter"></i>&nbsp;Filter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-filter sidebar-widget">
                                    <div class="widget-title">
                                        <h5>Select Price Range</h5>
                                    </div>
                                    <div class="range-slider clearfix">
                                        <div class="clearfix">
                                            <div class="input">
                                                <input type="text" class="property-amount" name="field-name"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <div class="price-range-slider"></div>
                                    </div>
                                </div>
                                <div class="category-widget sidebar-widget">
                                    <div class="widget-title">
                                        <h5>Status Of Property</h5>
                                    </div>
                                    <ul class="category-list clearfix">
                                        <li><a href="property-details.html">For Rent <span>(200)</span></a></li>
                                        <li><a href="property-details.html">For Sale <span>(700)</span></a></li>
                                    </ul>
                                </div>
                                <div class="category-widget sidebar-widget">
                                    <div class="widget-title">
                                        <h5>Amenities</h5>
                                    </div>
                                    <ul class="category-list clearfix">
                                        <li><a href="property-details.html">Air Conditioning <span>(17)</span></a></li>
                                        <li><a href="property-details.html">Central Heating <span>(4)</span></a></li>
                                        <li><a href="property-details.html">Cleaning Service <span>(12)</span></a></li>
                                        <li><a href="property-details.html">Dining Room <span>(8)</span></a></li>
                                        <li><a href="property-details.html">Dishwasher <span>(5)</span></a></li>
                                        <li><a href="property-details.html">Dishwasher <span>(2)</span></a></li>
                                        <li><a href="property-details.html">Family Room <span>(19)</span></a></li>
                                        <li><a href="property-details.html">Onsite Parking <span>(11)</span></a></li>
                                        <li><a href="property-details.html">Fireplace <span>(7)</span></a></li>
                                        <li><a href="property-details.html">Hardwood Flows <span>(9)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                            <div class="property-content-side">
                                <div class="item-shorting clearfix">
                                    <div class="left-column pull-left">
                                        <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>
                                    </div>
                                    <div class="right-column pull-right clearfix">
                                        <div class="short-box clearfix">
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Sort by: Newest">Sort by: Newest</option>
                                                    <option value="1">New Arrival</option>
                                                    <option value="2">Top Rated</option>
                                                    <option value="3">Offer Place</option>
                                                    <option value="4">Most Place</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="short-menu clearfix">
                                            <button class="list-view on"><i class="icon-35"></i></button>
                                            <button class="grid-view"><i class="icon-36"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper list">
                                    <div class="deals-list-content list-item">


                                        @foreach ($properties as $property)
                                            <div class="deals-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img
                                                                src="{{ asset($property->property_thambnail) }}"
                                                                alt=""></figure>
                                                        <div class="batch"><i class="icon-11"></i></div>
                                                        <span class="category">
                                                            {{ $property['propertyType']['type_name'] }}
                                                        </span>
                                                        <div class="buy-btn"><a
                                                                href="{{ url('property/details/' . $property->id . '/' . $property->property_slug) }}">For
                                                                @if ($property->property_status == 'rent')
                                                                    Rent
                                                                @else
                                                                    Buy
                                                                @endif

                                                            </a></div>
                                                    </div>
                                                    <div class="lower-content">
                                                        <div class="title-text">
                                                            <h4><a
                                                                    href="{{ url('property/details/' . $property->id . '/' . $property->property_slug) }}">{{ $property->property_name }}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="price-box clearfix">
                                                            <div class="price-info pull-left">
                                                                <h6>Start From</h6>
                                                                <h4>${{ $property->lowest_price }}</h4>
                                                            </div>
                                                            <div class="author-box pull-right">
                                                                <figure class="author-thumb">
                                                                    <img src="{{ asset($property['agent']['photo']) }}"
                                                                        alt="">
                                                                    <span>
                                                                        @if ($property['agent']['name'] == null)
                                                                            <a
                                                                                href="{{ route('agent.details', $property['agent']['id']) }}">Admin</a>
                                                                        @else
                                                                            <a
                                                                                href="{{ route('agent.details', $property['agent']['id']) }}">{{ $property['agent']['name'] }}</a>
                                                                        @endif
                                                                    </span>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        <p>{!! $property->long_descp !!}</p>
                                                        <ul class="more-details clearfix">
                                                            <li><i class="icon-14"></i>{{ $property->bedrooms }} Beds</li>
                                                            <li><i class="icon-15"></i> {{ $property->bathrooms }} Baths
                                                            </li>
                                                            <li><i class="icon-16"></i> {{ $property->property_size }} Sq
                                                                Ft</li>
                                                        </ul>
                                                        <div class="other-info-box clearfix">
                                                            <div class="btn-box pull-left">
                                                                <div class="btn-box"><a
                                                                        href="{{ url('property/details/' . $property->id . '/' . $property->property_slug) }}"
                                                                        class="theme-btn btn-two">See Details</a></div>
                                                            </div>
                                                            <ul class="other-option pull-right clearfix">
                                                                <li><a aria-label="Add To Compare" class="action-btn"
                                                                        id="{{ $property->id }}"
                                                                        onclick="addToCompare(this.id)"><i
                                                                            class="icon-12"></i></a></li>
                                                                <li><a aria-label="Add To Wishlist" class="action-btn"
                                                                        id="{{ $property->id }}"
                                                                        onclick="addToWishList(this.id)"><i
                                                                            class="icon-13"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="deals-grid-content grid-item">
                                        <div class="row clearfix">
                                             @foreach ($properties as $property)
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"><img
                                                                    src="{{ asset($property->property_image) }}"
                                                                    alt=""></figure>
                                                            <div class="batch"><i class="icon-11"></i></div>
                                                            <span class="category">
                                                                {{ $property['propertyType']['type_name'] }}
                                                            </span>
                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-info clearfix">
                                                                <div class="author pull-left">
                                                                    <figure class="author-thumb"><img
                                                                            src="{{ asset($property['agent']['photo']) }}"
                                                                            alt=""></figure>
                                                                    <h6>{{ $property['agent']['name'] }}</h6>
                                                                </div>
                                                                <div class="buy-btn pull-right"><a
                                                                        href="">For 
                                                                        @if ($property->property_status == 'rent') Rent @else Buy @endif
                                                                    </a></div>
                                                            </div>
                                                            <div class="title-text">
                                                                <h4><a href="{{ url('property/details/' . $property->id . '/' . $property->property_slug) }}">{{ $property->property_title }}</a></h4>
                                                            </div>
                                                            <div class="price-box clearfix">
                                                                <div class="price-info pull-left">
                                                                    <h6>Start From</h6>
                                                                    <h4>${{ $property->lowest_price }}</h4>
                                                                </div>
                                                                <ul class="other-option pull-right clearfix">
                                                                    <li><a aria-label="Add To Compare" class="action-btn"
                                                                        id="{{ $property->id }}"
                                                                        onclick="addToCompare(this.id)"><i
                                                                            class="icon-12"></i></a></li>
                                                                <li><a aria-label="Add To Wishlist" class="action-btn"
                                                                        id="{{ $property->id }}"
                                                                        onclick="addToWishList(this.id)"><i
                                                                            class="icon-13"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                                            <ul class="more-details clearfix">
                                                                <li><i class="icon-14"></i>{{ $property->bedrooms }} Beds</li>
                                                                <li><i class="icon-15"></i>{{ $property->bathrooms }} Baths</li>
                                                                <li><i class="icon-16"></i> {{ $property->property_size }} Sq Ft</li>
                                                            </ul>
                                                            <div class="btn-box"><a href="{{ url('property/details/' . $property->id . '/' . $property->property_slug) }}"
                                                                    class="theme-btn btn-two">See Details</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="pagination-wrapper">
                                {{ $properties->links('vendor.pagination.custom') }}

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- property-page-section end -->


            <!-- subscribe-section -->
            <section class="subscribe-section bg-color-3">
                <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                            <div class="text">
                                <span>Subscribe</span>
                                <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                            <div class="form-inner">
                                <form action="contact.html" method="post" class="subscribe-form">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Enter your email"
                                            required="">
                                        <button type="submit">Subscribe Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- subscribe-section end -->
        @endsection
