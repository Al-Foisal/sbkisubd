<!doctype html>
<html lang="en">

<head>
    <title>All of Bangladesh - {{ config('app.name') }}</title>
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
                <li>
                    <a class="dropdown-item" href="{{ url(app()->getLocale() . '/all-ads?all_bangladesh=' . true) }}">
                        {{ __('All of Bangladesh') }}
                    </a>
                </li>
                @foreach ($divisions as $division)
                    <li>
                        <a class="dropdown-item"
                            href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}">
                            {{ $division->{app()->getLocale() . '_name'} }} &raquo;
                        </a>
                        <ul class="dropdown-menu dropdown-submenu">
                            <li>
                                <a class="dropdown-item bg-primary"
                                    style="font-weight: bold;color:white;border-radius:0;"
                                    href="javascript:;">{{ __('Division Sub-city') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}">
                                    {{ __('All of ') }}{{ $division->{app()->getLocale() . '_name'} }}
                                </a>
                            </li>
                            @foreach ($division->divisionsubcity as $subcity)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url(app()->getLocale() . '/all-ads?division_subcity=' . $subcity->id) }}">
                                        {{ $subcity->{app()->getLocale() . '_name'} }} &raquo;
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu">
                                        <li>
                                            <a class="dropdown-item bg-primary"
                                                style="font-weight: bold;color:white;border-radius:0;"
                                                href="javascript:;">{{ __('Division Child-city') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url(app()->getLocale() . '/all-ads?division_subcity=' . $subcity->id) }}">
                                                {{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}
                                            </a>
                                        </li>
                                        @foreach ($subcity->divisionchildcity as $child)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url(app()->getLocale() . '/all-ads?division_childcity=' . $child->id) }}">
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
                        <li>
                            <a class="dropdown-item"
                                href="{{ url(app()->getLocale() . '/all-ads?district=' . $district->id) }}">
                                {{ __('All of ') }}{{ $district->{app()->getLocale() . '_dist_name'} }}
                            </a>
                        </li>
                        @foreach ($district->districtsubcity as $subcity)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ url(app()->getLocale() . '/all-ads?district_subcity=' . $subcity->id) }}">
                                    {{ $subcity->{app()->getLocale() . '_name'} }} &raquo;
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li>
                                        <a class="dropdown-item bg-primary"
                                            style="font-weight: bold;color:white;"
                                            href="javascript:;">{{ __('District Child-city') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url(app()->getLocale() . '/all-ads?district_subcity=' . $subcity->id) }}">
                                            {{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}
                                        </a>
                                    </li>
                                    @foreach ($subcity->districtchildcity as $child)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url(app()->getLocale() . '/all-ads?district_childcity=' . $child->id) }}">
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
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}">
                                            {{ __('All of ') }}{{ $thana->{app()->getLocale() . '_thana_name'} }}
                                        </a>
                                    </li>
                                    @foreach ($thana->thanasubcity as $subcity)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ url(app()->getLocale() . '/all-ads?thana_subcity=' . $subcity->id) }}">
                                                {{ $subcity->{app()->getLocale() . '_name'} }}
                                                &raquo;
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                    <a class="dropdown-item bg-primary"
                                                        style="font-weight: bold;color:white;"
                                                        href="javascript:;">{{ __('Upazila Child-city') }}</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url(app()->getLocale() . '/all-ads?thana_subcity=' . $subcity->id) }}">
                                                        {{ __('All of ') }}{{ $subcity->{app()->getLocale() . '_name'} }}
                                                    </a>
                                                </li>
                                                @foreach ($subcity->thanachildcity as $child)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ url(app()->getLocale() . '/all-ads?thana_childcity=' . $child->id) }}">
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

    <!-- End Header Area -->
    <div style="margin:1000rem;"></div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
</body>

</html>


