<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>Discover St, New York, NY 10012, USA</li>
                    <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+251-235-3256</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{ route('index') }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ route('index') }}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ route('index') }}"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="{{ route('index') }}"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="{{ route('index') }}"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
                @auth
                    <div class="sign-box">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Dashboard</a>
                        <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>logout</a>
                    </div>
                @else
                    <div class="sign-box">
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                @endauth





            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('index') }}"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current dropdown"><a href="{{ route('index') }}"><span>Home</span></a>
                                    <ul>
                                        <li><a href="{{ route('index') }}">Main Home</a></li>
                                        <li><a href="{{ route('index') }}">RTL Home</a></li>
                                        <li class="dropdown"><a href="{{ route('index') }}">Header Style</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('index') }}"><span>Listing</span></a>
                                    <ul>
                                        <li><a href="{{ route('index') }}">Agents List</a></li>
                                        <li><a href="{{ route('index') }}">Agents Grid</a></li>
                                        <li><a href="{{ route('index') }}">Agent Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('index') }}"><span>Property</span></a>
                                    <ul>
                                        <li><a href="{{ route('property.index') }}">Property List</a></li>
                                        <li><a href="{{ route('index') }}">Property Grid</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('index') }}"><span>Pages</span></a>
                                    <div class="megamenu">
                                        <div class="row clearfix">
                                            <div class="col-xl-4 column">
                                                <ul>
                                                    <li>
                                                        <h4>Pages</h4>
                                                    </li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">Our Services</a></li>
                                                    <li><a href="faq.html">Faq's Page</a></li>
                                                    <li><a href="pricing.html">Pricing Table</a></li>
                                                    <li><a href="compare-roperties.html">Compare Properties</a>
                                                    </li>
                                                    <li><a href="categories.html">Categories Page</a></li>
                                                    <li><a href="career.html">Career Opportunity</a></li>
                                                    <li><a href="testimonials.html">Testimonials</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-4 column">
                                                <ul>
                                                    <li>
                                                        <h4>Pages</h4>
                                                    </li>
                                                    <li><a href="{{ route('index') }}">Our Gallery</a></li>

                                                </ul>
                                            </div>
                                            <div class="col-xl-4 column">
                                                <ul>
                                                    <li>
                                                        <h4>Pages</h4>
                                                    </li>
                                                    <li><a href="{{ route('index') }}">Blog 01</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown"><a href="{{ route('index') }}"><span>Agency</span></a>
                                    <ul>
                                        <li><a href="{{ route('index') }}">Agency List</a></li>
                                        <li><a href="{{ route('index') }}">Agency Grid</a></li>
                                        <li><a href="{{ route('index') }}">Agency Details</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('index') }}"><span>Blog</span></a>
                                    <ul>
                                        <li><a href="{{ route('index') }}">Blog 01</a></li>
                                        <li><a href="{{ route('index') }}">Blog 02</a></li>
                                        <li><a href="{{ route('index') }}">Blog 03</a></li>
                                        <li><a href="{{ route('index') }}">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('index') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ route('index') }}" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('index') }}"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ route('index') }}" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
