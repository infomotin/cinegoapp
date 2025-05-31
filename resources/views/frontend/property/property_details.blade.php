        @extends('frontend.frontend_dashboard')
        @section('content')
        @include('frontend.home.banner')

            <!--Page Title-->
            <section class="page-title-two bg-color-1 centred">
                <div class="pattern-layer">
                    <div class="pattern-1"
                        style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
                    <div class="pattern-2"
                        style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
                </div>
                <div class="auto-container">
                    <div class="content-box clearfix">
                        <h1>{{ $property->property_name }}</h1>
                        <ul class="bread-crumb clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li>{{ $property->property_name }}</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!--End Page Title-->


            <!-- property-details -->
            <section class="property-details property-details-one">
                <div class="auto-container">
                    <div class="top-details clearfix">
                        <div class="left-column pull-left clearfix">
                            <h3>{{ $property->property_name }}</h3>
                            <div class="author-info clearfix">
                                <div class="author-box pull-left">
                                    <figure class="author-thumb"><img src="{{ asset($property['agent']['photo']) }}"
                                            alt=""></figure>
                                    <h6>
                                        @if ($property['agent']['name'] == null)
                                            <a href="{{ route('agent.details', $property['agent']['id'])}}">Admin</a>
                                        @else
                                            <a href="{{ route('agent.details', $property['agent']['id'])}}">{{ $property['agent']['name'] }}</a>
                                        @endif
                                    </h6>
                                </div>
                                <ul class="rating clearfix pull-left">
                                    <li><i class="icon-39"></i></li>
                                    <li><i class="icon-39"></i></li>
                                    <li><i class="icon-39"></i></li>
                                    <li><i class="icon-39"></i></li>
                                    <li><i class="icon-40"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="price-inner clearfix">
                                <ul class="category clearfix pull-left">
                                    <li><a href="#">{!! $property['propertyType']['type_name'] !!}</a></li>
                                    <li><a href="#">
                                            @if ($property->property_status == 'rent')
                                                For Rent
                                            @else
                                                For Buy
                                            @endif
                                        </a></li>
                                </ul>
                                <div class="price-box pull-right">
                                    <h3>${{ $property->lowest_price }}</h3>
                                </div>
                            </div>
                            <ul class="other-option pull-right clearfix">
                                <li><a href="#"><i class="icon-37"></i></a></li>
                                <li><a href="#"><i class="icon-38"></i></a></li>
                                <li><a href="#"><i class="icon-12"></i></a></li>
                                <li><a href="#"><i class="icon-13"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                            <div class="property-details-content">
                                <div class="carousel-inner">
                                    <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                        @foreach ($multiImage as $image)
                                            <figure class="image-box"><img src=" {{ asset($image->photo_name) }}"
                                                    alt=""></figure>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="discription-box content-widget">
                                    <div class="title-box">
                                        <h4>Property Description</h4>
                                    </div>
                                    <div class="text">
                                        <p>{!! $property->long_descp !!}</p>

                                    </div>
                                </div>
                                <div class="details-box content-widget">
                                    <div class="title-box">
                                        <h4>Property Details</h4>
                                    </div>
                                    <ul class="list clearfix">
                                        <li>Property ID: <span>{{ $property->property_code }}</span></li>
                                        <li>Rooms: <span>{{ $property->bedrooms }}</span></li>
                                        @if ($property->garage != null)
                                            <li>Garage Size: <span> {{ $property->garage_size }} Sq Ft</span></li>
                                        @else
                                            <li>Garage Size: <span> Null </span></li>
                                        @endif

                                        <li>Property Price: <span>${{ $property->lowest_price }}</span></li>
                                        <li>Bedrooms: <span>{{ $property->bedrooms }}</span></li>
                                        <li>Year Built: <span>01 April, 2019</span></li>
                                        <li>Property Type: <span>{{ $property['propertyType']['type_name'] }}</span></li>
                                        <li>Bathrooms: <span>{{ $property->bathrooms }}</span></li>
                                        <li>Property Status: <span>For @if ($property->property_status == 'rent')
                                                    For Rent
                                                @else
                                                    For Buy
                                                @endif
                                            </span></li>
                                        <li>Property Size: <span>{{ $property->property_size }} Sq Ft</span></li>
                                        <li>Garage: <span>{{ $property->garage }}</span></li>
                                    </ul>
                                </div>
                                <div class="amenities-box content-widget">
                                    <div class="title-box">
                                        <h4>Amenities</h4>
                                    </div>
                                    <ul class="list clearfix">


                                        @foreach ($amenities as $ameni)
                                            {!! in_array($ameni->id, $amenities_id) ? '<li>' . $ameni->amenities_name . '</li>' : '' !!}
                                        @endforeach




                                    </ul>
                                </div>
                                <div class="floorplan-inner content-widget">
                                    <div class="title-box">
                                        <h4>Floor Plan</h4>
                                    </div>
                                    <ul class="accordion-box">
                                        @foreach ($multiImage as $key => $floor)
                                            <li class="accordion block active-block">
                                                <div class="acc-btn active">
                                                    <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                                    <h5>{{ $key }} Floor</h5>
                                                </div>
                                                <div class="acc-content current">
                                                    <div class="content-box">
                                                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui
                                                            officia deserunt mollit anim est laborum. Sed perspiciatis unde
                                                            omnis iste natus error sit voluptatem accusa dolore mque
                                                            laudant.
                                                        </p>
                                                        <figure class="image-box">
                                                            <img src=" {{ asset($image->photo_name) }}" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="location-box content-widget">
                                    <div class="title-box">
                                        <h4>Location</h4>
                                    </div>
                                    <ul class="info clearfix">
                                        <li><span>Address:</span> {{ $property->street_address }}</li>
                                        <li><span>Country:</span> {{ $property->country_name }}</li>
                                        <li><span>State/county:</span> {{ $property->state_name }}</li>
                                        <li><span>Neighborhood:</span> {{ $property->landmark }}</li>
                                        <li><span>Zip/Postal Code:</span> {{ $property->zip_code }}</li>
                                        <li><span>City:</span> {{ $property->city_name }}</li>
                                    </ul>
                                    <div class="google-map-area">
                                        <div class="google-map" id="contact-google-map"
                                            data-map-lat="{{ $property->latitude }}"
                                            data-map-lng="{{ $property->longitude }}"
                                            data-icon-path="{{ asset('frontend/assets/images/icons/map-marker.png') }}"
                                            data-map-title="{{ $property->street_address }},{{ $property->state_name }},{{ $property->city_name }}"
                                            data-map-zoom="12"
                                            data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","{{ asset('frontend/assets/images/icons/map-marker.png') }}"]
                                        }'>

                                        </div>
                                    </div>
                                </div>
                                <div class="nearby-box content-widget">
                                    <div class="title-box">
                                        <h4>What’s Nearby?</h4>
                                    </div>
                                    <div class="inner-box">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                            <div class="inner">
                                                <h5>Place:</h5>
                                                @foreach ($facilities as $key => $facilities)
                                                    <div class="box clearfix">
                                                        <div class="text pull-left">
                                                            <h6>{{ $facilities->facility_name }}
                                                                <span>({{ $facilities->facility_distance }} km)</span>
                                                            </h6>
                                                        </div>
                                                        <ul class="rating pull-right clearfix">
                                                            <li><i class="icon-39"></i></li>
                                                            <li><i class="icon-39"></i></li>
                                                            <li><i class="icon-39"></i></li>
                                                            <li><i class="icon-39"></i></li>
                                                            <li><i class="icon-40"></i></li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="statistics-box content-widget">
                                    <div class="title-box">
                                        <h4>Page Video</h4>
                                    </div>
                                    <figure class="image-box">
                                        {!! $property->property_video !!}
                                    </figure>
                                </div>

                                <div class="schedule-box content-widget">
                                    <div class="title-box">
                                        <h4>Schedule A Tour</h4>
                                    </div>
                                    <div class="form-inner">
                                        <form>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <input type="text" name="date" placeholder="Tour Date"
                                                            id="datepicker">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <i class="far fa-clock"></i>
                                                        <input type="text" name="time" placeholder="Any Time">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Your Name"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="Your Email"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <input type="tel" name="phone" placeholder="Your Phone"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <textarea name="message" placeholder="Your message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group message-btn">
                                                        <button type="submit" class="theme-btn btn-one">Submit
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="property-sidebar default-sidebar">
                                <div class="author-widget sidebar-widget">
                                    <div class="author-box">
                                        <figure class="author-thumb"><img src="{{ asset($property['agent']['photo']) }}"
                                                alt=""></figure>
                                        <div class="inner">
                                            <h4>{{ $property->agent->name }}</h4>
                                            <ul class="info clearfix">
                                                <li><i class="fas fa-map-marker-alt"></i>
                                                    {{ $property->agent->city_name . ', ' . $property->agent->street_name . ', ' . $property->agent->landmark . ', ' . $property->agent->country_name }}
                                                </li>
                                                <li><i class="fas fa-phone"></i><a
                                                        href="tel:03030571965">{{ $property->agent->phone }}</a></li>
                                            </ul>
                                            <div class="btn-box"><a href="{{ route('agent.details', $property->agent->id)}}">View Listing</a></div>
                                        </div>
                                    </div>
                                    <div class="form-inner">
                                        @if (Auth::check())
                                            <form action="{{ route('property.enquiry.store') }}" method="post"
                                                class="default-form">
                                                @csrf
                                                <input type="text" name="property_id" id="property_id"
                                                    value="{{ $property->id }}" hidden>
                                                <input type="text" name="agent_id" id="agent_id"
                                                    value="{{ $property->agent->id }}" hidden>
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Your name"
                                                        required="" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Your Email"
                                                        required="" value="{{ Auth::user()->email }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" id="phone"
                                                        placeholder="Phone" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ route('property.enquiry.store') }}" method="post"
                                                class="default-form">
                                                @csrf
                                                <input type="text" name="property_id" id="property_id"
                                                    value="{{ $property->id }}" hidden>
                                                <input type="text" name="agent_id" id="agent_id"
                                                    value="{{ $property->agent->id }}" hidden>
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name"
                                                        placeholder="Your name" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email"
                                                        placeholder="Your Email" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" id="phone"
                                                        placeholder="Phone" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                                </div>
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="calculator-widget sidebar-widget">
                                    <div class="calculate-inner">
                                        <div class="widget-title">
                                            <h4>Mortgage Calculator</h4>
                                        </div>
                                        <form class="default-form">
                                            @csrf
                                            <div class="form-group">
                                                <i class="fas fa-dollar-sign"></i>
                                                <input type="number" name="total_amount" placeholder="Total Amount">
                                            </div>
                                            <div class="form-group">
                                                <i class="fas fa-dollar-sign"></i>
                                                <input type="number" name="down_payment" placeholder="Down Payment">
                                            </div>
                                            <div class="form-group">
                                                <i class="fas fa-percent"></i>
                                                <input type="number" name="interest_rate" placeholder="Interest Rate">
                                            </div>
                                            <div class="form-group">
                                                <i class="far fa-calendar-alt"></i>
                                                <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                            </div>
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select class="wide">
                                                        <option data-display="Monthly">Monthly</option>
                                                        <option value="1">Yearly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $properties = App\Models\Backend\Property::orderBy('id', 'desc')
                            ->where('featured', 1)
                            ->where('ptype_id', $property->ptype_id)
                            ->where('id', '!=', $property->id)
                            ->limit(3)
                            ->get();
                    @endphp


                    <div class="similar-content">
                        <div class="title">
                            <h4>Similar Properties</h4>
                        </div>
                        <div class="row clearfix">
                            @foreach ($properties as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{ asset($item->property_thambnail) }}"
                                                        alt=""></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                <span class="category">Featured</span>
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img
                                                                src="{{ asset($item['agent']['photo']) }}"
                                                                alt="">
                                                        </figure>
                                                        <h6>
                                                            @if ($item['agent']['name'] == null)
                                                                <a href="#">Admin</a>
                                                            @else
                                                                <a href="#">{{ $item['agent']['name'] }}</a>
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="#">
                                                            @if ($item->property_status == 'rent')
                                                                For Rent
                                                            @else
                                                                For Buy
                                                            @endif
                                                        </a></div>
                                                </div>
                                                <div class="title-text">
                                                    <h4><a href="#">{{ $item->property_name }}</a>
                                                    </h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>${{ $item->lowest_price }}</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        <li><a aria-label="Add To Compare" class="action-btn"
                                                                id="{{ $item->id }}"
                                                                onclick="addToCompare(this.id)"><i
                                                                    class="icon-12"></i></a></li>
                                                        <li><a aria-label="Add To Wishlist" class="action-btn"
                                                                id="{{ $item->id }}"
                                                                onclick="addToWishList(this.id)"><i
                                                                    class="icon-13"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>{{ $item->short_descp }}</p>
                                                <ul class="more-details clearfix">
                                                    <li><i class="icon-14"></i>{{ $item->bedrooms }} Beds</li>
                                                    <li><i class="icon-15"></i>{{ $item->bathrooms }} Baths</li>
                                                    <li><i class="icon-16"></i>{{ $item->property_size }} Sq Ft</li>
                                                </ul>
                                                <div class="btn-box"><a
                                                        href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- property-details end -->










            <!-- download-section -->
            @include('frontend.home.download')
            <!-- download-section end -->
        @endsection
