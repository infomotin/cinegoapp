@php
    $states = [
        'Alabama',
        'Alaska',
        'Arizona',
        'Arkansas',
        'California',
        'Colorado',
        'Connecticut',
        'Delaware',
        'District of Columbia',
        'Florida',
        'Georgia',
        'Hawaii',
        'Idaho',
        'Illinois',
        'Indiana',
        'Iowa',
        'Kansas',
        'Kentucky',
        'Louisiana',
        'Maine',
        'Maryland',
        'Massachusetts',
        'Michigan',
        'Minnesota',
        'Mississippi',
        'Missouri',
        'Montana',
        'Nebraska',
        'Nevada',
        'New Hampshire',
        'New Jersey',
        'New Mexico',
        'New York',
        'North Carolina',
        'North Dakota',
        'Ohio',
        'Oklahoma',
        'Oregon',
        'Pennsylvania',
        'Rhode Island',
        'South Carolina',
        'South Dakota',
        'Tennessee',
        'Texas',
        'Utah',
        'Vermont',
        'Virginia',
        'Washington',
        'West Virginia',
        'Wisconsin',
        'Wyoming',
    ];
    $skip_sates_0 = array_slice($states, 0, 5);
    // dd($skip_sates_0[array_rand($skip_sates_0)]);
    $porperties = App\Models\Backend\Property::where('street_name',$skip_sates_0[array_rand($skip_sates_0)])->get();
    // dd($porperties);


@endphp

<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Top Places</h5>
            <h2>Most Popular Places</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="sortable-masonry">
            <div class="items-container row clearfix">

                <div
                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ asset('frontend/assets/images/resource/place-1.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="{{route('state.details',$skip_sates_0[array_rand($skip_sates_0)])}}">{{ $skip_sates_0[array_rand($skip_sates_0)] }}</a></h4>
                                <p>{{ count($porperties)}} Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ asset('frontend/assets/images/resource/place-2.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="{{route('state.details',$skip_sates_0[array_rand($skip_sates_0)])}}">{{ $skip_sates_0[array_rand($skip_sates_0)] }}</a></h4>
                                <p>{{ count($porperties)}} Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ asset('frontend/assets/images/resource/place-3.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="{{route('state.details',$skip_sates_0[array_rand($skip_sates_0)])}}">{{ $skip_sates_0[array_rand($skip_sates_0)] }}</a></h4>
                                <p>{{ count($porperties)}} Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ asset('frontend/assets/images/resource/place-4.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="{{route('state.details',$skip_sates_0[array_rand($skip_sates_0)])}}">{{ $skip_sates_0[array_rand($skip_sates_0)] }}</a></h4>
                                <p>{{ count($porperties)}} Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
