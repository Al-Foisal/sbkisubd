<!doctype html>
<html lang="zxx" class="theme-light">
    
<!-- Mirrored from templates.envytheme.com/raque/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2022 10:43:09 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/viewer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

        <title>{{ __('Find your location') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}') }}">
        <style>
            .navbar-style-two .raque-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu {
                left: 250px;
            }
            .navbar-style-two .raque-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu {
                left: 250px;
            }
            .navbar-style-two .raque-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu {
                left: 250px;
            }
            .mean-container .mean-nav ul li li li li li ul li a {
                width: 50%;
                padding: 1em 30% 13px;
            }
            .buy-now-btn{
                display: none;
            }
            @media only screen and (max-width: 991px){
                .navbar-area.navbar-style-two .raque-responsive-nav .raque-responsive-menu.mean-container .navbar-nav {
                    height: 100vh;
                }
            }
                
        </style>
    </head>

    <body>

        <!-- Start Header Area -->
        <header class="header-area">

            <div class="top-header-style-two" style="background-color: #07a4b4;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="top-header-logo">
                                <a href="{{ url('/') }}" class="d-inline-block">
                                    @foreach($wlogo as $value)
                                    <img src="{{ asset($value->image) }}" style="height: 70px;width:70px;" class="black-logo" alt="logo">
                                    <img src="{{ asset($value->image) }}" style="height: 70px;width:70px;" class="white-logo" alt="logo">
                                    @endforeach
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <ul class="d-flex justify-content-end" style="list-style-type: none">
                                <li style="padding: 10px;">
                                <a href="{{ url(app()->getLocale() . '/all-ads') }}" class="cart-wrapper-btn d-inline-block">
                                    <i style="margin-right:5px" class="fas fa-th-list"></i> {{ __('All Ads') }}
                                </a>
                                </li>
                                <li>
                                @if (app()->getLocale() == 'bn')
                                    <a style="
                                border-radius: 6px;border: 1px solid #3cbcc9;
                                padding: 8px 29px;
                                border-radius: 6px;
                                margin-left: 2rem;"
                                        href="{{ url()->current() }}?change_language=en" class="cart-wrapper-btn d-inline-block">
                                        English
                                    </a>
                                @elseif(app()->getLocale() == 'en')
                                    <a  style="
                                border-radius: 6px;border: 1px solid #3cbcc9;
                                padding: 8px 29px;
                                border-radius: 6px;
                                margin-left: 2rem;"
                                        href="{{ url()->current() }}?change_language=bn" class="cart-wrapper-btn d-inline-block">
                                        বাংলা
                                    </a>
                                @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Navbar Area -->
            <div class="navbar-area navbar-style-two" style="background-color: #07a4b4">
                <div class="raque-responsive-nav">
                    <div class="container">
                        <div class="raque-responsive-menu">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    @foreach($wlogo as $value)
                                    <img src="{{ asset($value->image) }}" style="height: 50px;width:50px;" class="black-logo" alt="logo">
                                    <img src="{{ asset($value->image) }}" style="height: 50px;width:50px;" class="white-logo" alt="logo">
                                    @endforeach
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="raque-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light" style="margin-bottom: 1000rem;">
                            <div class="collapse navbar-collapse mean-menu">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">{{ __('All of Bangladesh') }} <i class='bx bx-chevron-down'></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item bg-info"><a href="javascript:;" class="nav-link tive">{{ __('Division City') }}</a></li>

                                            
@foreach ($divisions as $division)
<li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}" class="nav-link">{{ $division->{app()->getLocale() . '_name'} }} <i class='bx bx-chevron-right'></i></a>
    <ul class="dropdown-menu">
        <li class="nav-item bg-info">
            <a href="javascript:;" class="nav-link">{{ __('Division Sub-city') }}</a>
        </li>
        <li class="nav-item">
            <a href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}" class="nav-link">{{ __('All of ') }}{{ $division->{app()->getLocale() . '_name'} }}</a>
        </li>
        @foreach ($division->divisionsubcity as $subcity)
        <li class="nav-item">
            <a href="{{ url(app()->getLocale() . '/all-ads?division_subcity=' . $subcity->id) }}" class="nav-link">{{ $subcity->{app()->getLocale() . '_name'} }} <i class='bx bx-chevron-right'></i>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Division Child-city') }}</a></li>

                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?division_subcity=' . $subcity->id) }}" class="nav-link">{{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}</a></li>
                @foreach ($subcity->divisionchildcity as $child)
                <li class="nav-item">
                    <a href="{{ url(app()->getLocale() . '/all-ads?division_childcity=' . $child->id) }}" class="nav-link">{{ $child->{app()->getLocale() . '_name'} }}</a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</li>
@endforeach

<li class="nav-item bg-info">
    <a href="javascript:;" class="nav-link">{{ __('Division') }}</a>
</li>
@foreach ($divisions as $division)
<li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}" class="nav-link">{{ $division->{app()->getLocale() . '_name'} }} <i class='bx bx-chevron-right'></i></a>
    <ul class="dropdown-menu">
        <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('District City') }}</a></li>
        @foreach ($division->districts as $district)
        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}" class="nav-link">{{ $district->{app()->getLocale() . '_dist_name'} }} <i class='bx bx-chevron-right'></i></a>
            <ul class="dropdown-menu">
                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('District Sub-city') }}</a></li>

                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}" class="nav-link">{{ __('All of ') }}{{ $district->{app()->getLocale() . '_dist_name'} }}</a></li>

                @foreach ($district->districtsubcity as $subcity)
                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district_subcity=' . $subcity->id) }}" class="nav-link">{{ $subcity->{app()->getLocale() . '_name'} }} <i class='bx bx-chevron-right'></i></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('District Child-city') }}</a></li>

                        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district_subcity=' . $subcity->id) }}" class="nav-link">{{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}</a></li>

                        @foreach ($subcity->districtchildcity as $child)
                        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district_childcity=' . $child->id) }}" class="nav-link">{{ $child->{app()->getLocale() . '_name'} }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach

        <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('District') }}</a></li>
        @foreach ($division->districts as $district)
        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}" class="nav-link">{{ $district->{app()->getLocale() . '_dist_name'} }} <i class='bx bx-chevron-right'></i></a>
            <ul class="dropdown-menu">
                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Upazila City') }}</a></li>

                @foreach ($district->thanas as $thana)
                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}" class="nav-link">{{ $thana->{app()->getLocale() . '_thana_name'} }} <i class='bx bx-chevron-right'></i></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Upazila Sub-city') }}</a></li>

                        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}" class="nav-link">{{ __('All of ') }}{{ $thana->{app()->getLocale() . '_thana_name'} }}</a></li>

                        @foreach ($thana->thanasubcity as $subcity)
                        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana_subcity=' . $subcity->id) }}" class="nav-link">{{ $subcity->{app()->getLocale() . '_name'} }} <i class='bx bx-chevron-right'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Upazila Child-city') }}</a></li>

                                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana_subcity=' . $subcity->id) }}" class="nav-link">{{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}</a></li>

                                @foreach ($subcity->thanachildcity as $child)
                                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana_childcity=' . $child->id) }}" class="nav-link">{{ $child->{app()->getLocale() . '_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach

                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Upazila') }}</a></li>
                @foreach ($district->thanas as $thana)
                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}" class="nav-link">{{ $thana->{app()->getLocale() . '_thana_name'} }} <i class='bx bx-chevron-right'></i></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Union') }}</a></li>

                        @foreach ($thana->unions as $union)
                        <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?union=' . $union->id) }}" class="nav-link">{{ $union->{app()->getLocale() . '_union_name'} }} <i class='bx bx-chevron-right'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item bg-info"><a href="javascript:;" class="nav-link">{{ __('Village') }}</a></li>
                                <li class="nav-item"><a href="javascript:;" class="nav-link">{{ __('Village qww') }}</a></li>

                                @foreach ($union->villages as $village)
                                <li class="nav-item"><a href="{{ url(app()->getLocale() . '/all-ads?village=' . $village->id) }}" class="nav-link">{{ $village->{app()->getLocale() . '_village_name'} }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</li>
@endforeach

                                        </ul>
                                    </li>
                                </ul>

                                <div class="others-option">

                                    
                                        {{-- <a href="{{ url(app()->getLocale() . '/all-ads') }}" class="cart-wrapper-btn d-inline-block">
                                            <i style="margin-right:5px" class="fas fa-th-list"></i> {{ __('All Ads') }}
                                        </a>
                                        @if (app()->getLocale() == 'bn')
                                            <a style="border: 1px solid #3cbcc9;
                                        padding: 13px 14px;
                                        border-radius: 6px;border: 1px solid #3cbcc9;
                                        padding: 8px 29px;
                                        border-radius: 6px;
                                        margin-left: 2rem;"
                                                href="{{ url()->current() }}?change_language=en" class="cart-wrapper-btn d-inline-block">
                                                English
                                            </a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a  style="border: 1px solid #3cbcc9;
                                        padding: 13px 14px;
                                        border-radius: 6px;border: 1px solid #3cbcc9;
                                        padding: 8px 29px;
                                        border-radius: 6px;
                                        margin-left: 2rem;"
                                                href="{{ url()->current() }}?change_language=bn" class="cart-wrapper-btn d-inline-block">
                                                বাংলা
                                            </a>
                                        @endif --}}

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Navbar Area -->
            
        </header>
        <!-- End Header Area -->

        <!-- Links of JS files -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
        <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
        <script src="{{ asset('assets/js/particles.min.js') }}"></script>
        <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/viewer.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
        <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>