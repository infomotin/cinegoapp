<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>CineGoApp</title>
    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <!-- preloader -->
        {{-- @include('frontend.home.preload') --}}
        <!-- preloader end -->
        <!-- switcher menu -->
        <!-- end switcher menu -->
        <!-- main header -->
        @include('frontend.home.header')
        <!-- main-header end -->
        <!-- Mobile Menu  -->
        @include('frontend.home.mobile-menu')
        <!-- End Mobile Menu -->
        @yield('content')
        <!-- main-footer -->
        @include('frontend.home.footer')
        <!-- main-footer end -->
        <!--Scroll to top-->
    </div>
    <!-- jequery plugins -->
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>
    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-helper.js') }}"></script>
    <!-- main-js -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- sweet alert cdn link --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script type="text/javascript">
        function addToWishList(property_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/add-to-wishlist/" + property_id,
                success: function(data) {
                    console.log(data)
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message  

                }
            });
        }
    </script>

    <script type="text/javascript">
        function addToCompare(property_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/add-to-compare/" + property_id,
                success: function(data) {
                    console.log(data)
                    // Start Message 

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        function Wishlist() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/get-wishlist-properties/",
                success: function(response) {
                    console.log(response);
                    $('#wishListQty').text(response.wishListQty);
                    var html = '';
                    $.each(response.wishlists, function(key, value) {
                        html += `
                        
                            <div class="deals-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="/${value.property.property_thambnail}"
                                                    alt=""></figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">Featured</span>
                                            <div class="buy-btn"><a href="#">For"${value.property.property_status}" </a></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="title-text">
                                                <h4><a href="#">"${value.property.property_name}"</a></h4>
                                            </div>
                                            <div class="price-box clearfix">
                                                <div class="price-info pull-left">
                                                    <h6>Start From</h6>
                                                    <h4>"${value.property.lowest_price}"</h4>
                                                </div>
                                                <div class="author-box pull-right">
                                                    <figure class="author-thumb">
                                                        <img src="/assets/${value.user.photo}" alt="">
                                                        <span>${ value.user.name }</span>
                                                    </figure>
                                                </div>
                                            </div>
                                            <p> ${value.property.long_descp } </p>
                                            <ul class="more-details clearfix">
                                                <li><i class="icon-14"></i>${value.property.bedrooms} Beds</li>
                                                <li><i class="icon-15"></i>${value.property.bathrooms} Baths</li>
                                                <li><i class="icon-16"></i>${value.property.property_size} Sq Ft</li>
                                            </ul>
                                            <div class="other-info-box clearfix">
                                                <div class="btn-box pull-left"><a href="/property/details/${value.property.id}/${value.property.property_slug}"
                                                        class="theme-btn btn-two">See Details</a></div>
                                                <ul class="other-option pull-right clearfix">
                                                    <li><a href="#"><i class="icon-12"></i></a></li>
                                                    <li>
                                                        <a aria-label="Add To Wishlist" class="action-btn" id="${value.property.id}" onclick="addToWishList('${value.property.id}')">
                                                                <i class="icon-13"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                        `
                    });
                    $('#wishList').html(html);

                }
            });
        }
        Wishlist()
    </script>
    <script type="text/javascript">
        function Compare() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/get-compare-properties/",
                success: function(response) {
                    console.log(response);
                    $('#comparesQty').text(response.comparesQty);
                    var html = '';
                    $.each(response.compares, function(key, value) {
                        html += `
                        <tbody>
                            <tr>
                            <th>Property Info</th>
                            <th>
                                <figure class="image-box"><img src="/${value.property.property_thambnail}" alt="">
                                </figure>
                                <div class="title">${value.property.property_name}</div>
                                <div class="price">${value.property.lowest_price}</div>
                            </th>

                        </tr>
                        <tr>
                            <td>
                                <p>City</p>
                            </td>
                            <td>
                                <p>${value.property.city_name}</p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>Area</p>
                            </td>
                            <td>
                                <p>${value.property.property_size} Sq Ft</p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>Rooms</p>
                            </td>
                            <td>
                                <p>${value.property.bedrooms}</p>
                            </td>
                            <td>

                        </tr>
                        <tr>
                            <td>
                                <p>Bathrooms</p>
                            </td>
                            <td>
                                <p>${value.property.bathrooms}</p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>Garage</p>
                            </td>
                            <td>
                                <p>${value.property.garage}</p>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>See Details</p>
                            </td>
                            <td>
                                <div class="btn-box pull-left"><a href="/property/details/${value.property.id}/${value.property.property_slug}"
                                                        class="theme-btn btn-two">See Details</a></div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>Remove</p>
                            </td>
                            <td>
                                <li>
                                                        <a aria-label="Remove From Compare" class="btn btn-danger action-btn" id="${value.property.id}" onclick="addToCompare('${value.property.id}')">
                                                                Remove
                                                        </a>
                                                    </li>
                            </td>

                        </tr>
                        </tbody>
                        `;
                    });
                    $('#compares').html(html);

                }
            });
        }
        Compare()
    </script>
    {{-- <script type="text/javascript">
        function sendMessage() {
            var property_id = $('#property_id').val();
            var agent_id = $('#agent_id').val();
            var message = $('#message').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/send-message/" + property_id + "/" + agent_id + "/" + message + "/" + name + "/" + email + "/" + phone,
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script> --}}

</body><!-- End of .page_wrapper -->

</html>
