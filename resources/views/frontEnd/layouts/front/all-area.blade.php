<!doctype html>
<html lang="en">

<head>
    <title>All of Bangladesh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />
    <style>
        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        .dropdown-menu .dropdown-submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover>.dropdown-submenu {
            display: block;
        }
    </style>
</head>

<body>
    <header>
        @php
            $news = DB::table('news')
                ->where('id', 1)
                ->first();
        @endphp
        <div style="background: #fff">
            <marquee style="vertical-align: middle;padding: 7px;color: rgb(0, 0, 0); " behavior="scroll"
                direction="left">
                <span
                    style="vertical-align: middle;padding: 11px;background: #07A4B4;
        color: #fff;">{{ __('Notice') }}:</span>
                {{ $news->text }}
            </marquee>
        </div>



        <nav class="navbar  navbar-light  navbar-expand-md" role="navigation" style="background: #07A4B4">

            <div class="container-fluid">

                <div class="navbar-identity p-sm-0">

                    <style>
                        .logo img {
                            width: 80px;
                            height: 75px;
                        }

                        .main-logo {
                            width: 80px;
                            height: 75px;
                            max-width: 430px !important;
                            max-height: 500px !important;
                        }
                    </style>

                    <a href="{{ url('/') }}" class="navbar-brand logo logo-title">
                        @foreach ($wlogo as $value)
                            <img src="{{ asset($value->image) }}" alt="" class="main-logo"
                                data-bs-placement="bottom" data-bs-toggle="tooltip">
                        @endforeach
                    </a>

                    <button class="navbar-toggler -toggler float-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30"
                            focusable="false">
                            <title>Menu</title>
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10"
                                d="M4 7h22M4 15h22M4 23h22"></path>
                        </svg>
                    </button>


                </div>

                <div class="navbar-collapse collapse" id="navbarsDefault">


                    <ul class="nav navbar-nav me-md-auto navbar-left">

                        <li class="nav-item d-lg-block d-md-none d-sm-block d-block">
                            <a href="{{ url(app()->getLocale() . '/all-ads') }}" class="nav-link">
                                <i style="margin-right:5px" class="fas fa-th-list"></i> {{ __('All Ads') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown lang-menu ">
                            @if (app()->getLocale() == 'bn')
                                <a style="border: 1px solid #3cbcc9;
                            padding: 13px 14px;
                            border-radius: 6px;border: 1px solid #3cbcc9;
                            padding: 8px 29px;
                            border-radius: 6px;
                            margin-left: 2rem;"
                                    href="{{ url()->current() }}?change_language=en" class="nav-link">
                                    <span>English</span>
                                </a>
                            @elseif(app()->getLocale() == 'en')
                                <a style="border: 1px solid #3cbcc9;
                            padding: 13px 14px;
                            border-radius: 6px;border: 1px solid #3cbcc9;
                            padding: 8px 29px;
                            border-radius: 6px;
                            margin-left: 2rem;"
                                    href="{{ url()->current() }}?change_language=bn" class="nav-link">
                                    <span>বাংলা</span>
                                </a>
                            @endif
                        </li>
                    </ul>
                    <style>
                        a.nav-link {
                            color: #fff !important;
                        }
                    </style>
                    <ul class="nav navbar-nav ms-auto navbar-right">
                        <li class="nav-item pricing">
                            <h1 style="color: white">{{ __('Find your location') }}</h1>
                        </li>
                    </ul>
                </div>


            </div>
        </nav>

    </header>
    <div class="container mt-5 pb-5">
        <div class="dropdown">
            <button class="btn btn-primary" type="button"
                style="padding: 5px;border-radius:0;width:20%;letter-spacing:1px;" id="dropdownMenuButton"
                aria-expanded="true">
                {{ __('Division City') }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="" style="display: block;width:20%;border-radius:0;">
                @foreach ($divisions as $division)
                    <li>
                        <a class="dropdown-item" href="#">
                            {{ $division->{app()->getLocale() . '_name'} }} &raquo;
                        </a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li>
                                <a class="dropdown-item bg-primary"
                                    style="font-weight: bold;color:white;border-radius:0;"
                                    href="javascript:;">{{ __('Division Suc-city') }}</a>
                            </li>
                            @foreach ($division->divisionsubcity as $subcity)
                                <li>
                                    <a class="dropdown-item" href="#">
                                        {{ $subcity->{app()->getLocale() . '_name'} }} &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                            <a class="dropdown-item bg-primary"
                                                style="font-weight: bold;color:white;border-radius:0;"
                                                href="javascript:;">{{ __('Division Child-city') }}</a>
                                        </li>
                                        @foreach ($subcity->divisionchildcity as $child)
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    {{ $child->{app()->getLocale() . '_name'} }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li>
                    <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                        href="javascript:;">{{ __('Division') }}</a>
                </li>
                @foreach ($divisions as $division)
                    <li>
                        <a class="dropdown-item"
                            href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}">
                            {{ $division->{app()->getLocale() . '_name'} }} &raquo;
                        </a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li>
                                <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                                    href="javascript:;">{{ __('District City') }}</a>
                            </li>
                            @foreach ($division->districts as $district)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}">
                                        {{ $district->{app()->getLocale() . '_dist_name'} }} &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                            <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                                                href="javascript:;">{{ __('District Sub-city') }}</a>
                                        </li>
                                        @foreach ($district->districtsubcity as $subcity)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url(app()->getLocale() . '/all-ads?districtsubcity=' . $subcity->id) }}">
                                                    {{ $subcity->{app()->getLocale() . '_name'} }} &raquo;
                                                </a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a class="dropdown-item bg-primary"
                                                            style="font-weight: bold;color:white;"
                                                            href="javascript:;">{{ __('District Child-city') }}</a>
                                                    </li>
                                                    @foreach ($subcity->districtchildcity as $child)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url(app()->getLocale() . '/all-ads?districtchildcity=' . $child->id) }}">
                                                                {{ $child->{app()->getLocale() . '_name'} }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li>
                                <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                                    href="javascript:;">{{ __('District') }}</a>
                            </li>
                            @foreach ($division->districts as $district)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}">
                                        {{ $district->{app()->getLocale() . '_dist_name'} }} &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu mb-5">
                                        <li>
                                            <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                                                href="javascript:;">{{ __('Upazila City') }}</a>
                                        </li>
                                        @foreach ($district->thanas as $thana)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}">
                                                    {{ $thana->{app()->getLocale() . '_thana_name'} }} &raquo;
                                                </a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a class="dropdown-item bg-primary"
                                                            style="font-weight: bold;color:white;"
                                                            href="javascript:;">{{ __('Upazila Sub-city') }}</a>
                                                    </li>
                                                    @foreach ($thana->thanasubcity as $subcity)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url(app()->getLocale() . '/all-ads?thana=' . $subcity->id) }}">
                                                                {{ $subcity->{app()->getLocale() . '_name'} }}
                                                                &raquo;
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-submenu">
                                                                <li>
                                                                    <a class="dropdown-item bg-primary"
                                                                        style="font-weight: bold;color:white;"
                                                                        href="javascript:;">{{ __('Upazila Child-city') }}</a>
                                                                </li>
                                                                @foreach ($subcity->thanachildcity as $child)
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ url(app()->getLocale() . '/all-ads?thana=' . $child->id) }}">
                                                                            {{ $child->{app()->getLocale() . '_name'} }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                        <li>
                                            <a class="dropdown-item bg-primary" style="font-weight: bold;color:white;"
                                                href="javascript:;">{{ __('Upazila') }}</a>
                                        </li>
                                        @foreach ($district->thanas as $thana)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}">
                                                    {{ $thana->{app()->getLocale() . '_thana_name'} }} &raquo;
                                                </a>
                                                <ul class="dropdown-menu dropdown-submenu">
                                                    <li>
                                                        <a class="dropdown-item bg-primary"
                                                            style="font-weight: bold;color:white;"
                                                            href="javascript:;">{{ __('Union') }}</a>
                                                    </li>
                                                    @foreach ($thana->unions as $union)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url(app()->getLocale() . '/all-ads?union=' . $union->id) }}">
                                                                {{ $union->{app()->getLocale() . '_union_name'} }}
                                                                &raquo;
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-submenu">
                                                                <li>
                                                                    <a class="dropdown-item bg-primary"
                                                                        style="font-weight: bold;color:white;"
                                                                        href="javascript:;">{{ __('Village') }}</a>
                                                                </li>
                                                                @foreach ($union->villages as $village)
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ url(app()->getLocale() . '/all-ads?village=' . $village->id) }}">
                                                                            {{ $village->{app()->getLocale() . '_village_name'} }}
                                                                        </a>
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
                @endforeach
            </ul>
        </div>

    </div>
    <div style="margin:1000rem;"></div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
</body>

</html>

{{-- <div class="mobile">
    <!DOCTYPE HTML>
    <html lang="en-US">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Banca - Banking & Business Loan Bootstrap-5 HTML Template</title>
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

        <!-- CSS here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/bootstrap.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/elegant-icons.min.css') }}"
            media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/all.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/animate.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/slick.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/slick-theme.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/nice-select.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/animate.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/jquery.fancybox.min.css') }}"
            media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/nouislider.min.css') }}"
            media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/default.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/style.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('mobile/css/responsive.css') }}" media="all" />
    </head>

    <body data-spy="scroll" data-offset="70">
        <!-- Header -->
        <header class="header" style="background-color: black;">
            <div class="header-menu header-menu-4" id="sticky">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container">
                        <a class="navbar-brand sticky_logo" href="index.html">
                            <img class="main" src="img/logo/Logo.png" srcset="img/logo/Logo@2x.png 2x"
                                alt="logo">
                            <img class="sticky" src="img/logo/Logo-2.png" srcset="img/logo/Logo-2@2x.png 2x"
                                alt="logo">
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_toggle">
                                <span class="hamburger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                <span class="hamburger-cross">
                                    <span></span>
                                    <span></span>
                                </span>
                            </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav menu ms-auto">
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="loan.html" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Loan
                                    </a>
                                    <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                        data-bs-toggle="dropdown"></i>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="loan.html">Get loan</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Loan
                                                Application</a>
                                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                                data-bs-toggle="dropdown"></i>

                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a class="nav-link"
                                                        href="loan-details.html">Step
                                                        01</a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="personal-details.html">Step
                                                        02</a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="document-upload.html">Step
                                                        03</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Header end-->


        <!-- Back to top button -->
        <a id="back-to-top" title="Back to Top"></a>

        <!-- JS here -->
        <script type="text/javascript" src="{{ asset('mobile/js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/preloader.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/jquery.smoothscroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/jquery.nice-select.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/jquery.fancybox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/nouislider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/wNumb.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/parallax.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/jquery.parallax-scroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('mobile/js/custom.js') }}"></script>
    </body>


    </html>
</div> --}}
