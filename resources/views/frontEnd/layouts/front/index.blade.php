@extends('frontEnd.layouts.master1')
@section('body')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    <!-- this is style.css link-->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> --}}
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="style1.css">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 80vh">
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-light sh_nav">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul>
                                <li class="">
                                    <a href="{{ url(app()->getLocale() . '/all-ads') }}">
                                        <span>{{ __('All of Bangladesh') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </a>
                                    <ul
                                        style="display: block;
                                    /* position: absolute; */
                                    left: 14px;
                                    top: calc(100% + 30px);
                                    margin: 0;
                                    padding: 10px 0;
                                    z-index: 99;
                                    opacity: 1;
                                    visibility: visible;
                                    background: #fff;
                                    box-shadow: 0px 0px 30px rgb(127 137 161 / 25%);
                                    transition: 0.8s;
                                    border-radius: 6px;
                                    border-top: 2px solid #f77426;">
                                        <li class="dropdown bg-success">{{ __('Division City') }}</li>
                                        @foreach ($divisions as $division_city)
                                            @if ($division_city->city)
                                                <li><a
                                                        href="{{ url(app()->getLocale() . '/all-ads?district=' . $division_city->city->id) }}">{{ $division_city->city->{app()->getLocale() . '_dist_name'} }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li class="bg-success">{{ __('Division') }}</li>
                                        @foreach ($divisions as $division)
                                            <li class="dropdown" style="padding-right:15px;">
                                                <a
                                                    href="{{ url(app()->getLocale() . '/all-ads?division=' . $division->id) }}">
                                                    <span>{{ $division->{app()->getLocale() . '_name'} }}</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </a>
                                                <ul style="top: 0">
                                                    <li class="bg-success">{{ __('District City') }}</li>
                                                    @foreach ($division->districts as $district_city)
                                                        @if ($district_city->city)
                                                            <li><a
                                                                    href="{{ url(app()->getLocale() . '/all-ads?thana=' . $district_city->city->id) }}">{{ $district_city->city->{app()->getLocale() . '_thana_name'} ?? '' }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    <li class="bg-success">{{ __('District') }}</li>
                                                    @foreach ($division->districts as $district)
                                                        <li class="dropdown">
                                                            <a
                                                                href="{{ url(app()->getLocale() . '/all-ads?district=' . $division->id) }}">
                                                                <span>{{ $district->{app()->getLocale() . '_dist_name'} }}</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                                </svg>
                                                            </a>
                                                            <ul>
                                                                @php
                                                                    $thanas = App\Thana::where('district_id', $district->id)
                                                                        ->where('status', 1)
                                                                        ->with('city')
                                                                        ->get();
                                                                @endphp
                                                                <li class="bg-success">{{ __('Upazila City') }}</li>
                                                                @foreach ($thanas as $thana_city)
                                                                    @if ($thana_city->city)
                                                                        <li><a
                                                                                href="{{ url(app()->getLocale() . '/all-ads?union=' . $thana_city->city->id) }}">{{ $thana_city->city->{app()->getLocale() . '_union_name'} ?? '' }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                                <li class="bg-success">{{ __('Upazila') }}</li>
                                                                @foreach ($thanas as $thana)
                                                                    <li class="dropdown">
                                                                        <a
                                                                            href="{{ url(app()->getLocale() . '/all-ads?thana=' . $thana->id) }}">
                                                                            <span>{{ $thana->{app()->getLocale() . '_thana_name'} }}</span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor"
                                                                                class="bi bi-chevron-down"
                                                                                viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                                            </svg>
                                                                        </a>
                                                                        <ul>
                                                                            @php
                                                                                $union = App\Union::where('thana_id', $thana->id)
                                                                                    ->where('status', 1)
                                                                                    ->get();
                                                                            @endphp
                                                                            <li class="bg-success">{{ __('Union') }}</li>
                                                                            @foreach ($union as $value)
                                                                                <li class="dropdown">
                                                                                    <a
                                                                                        href="{{ url(app()->getLocale() . '/all-ads?union=' . $value->id) }}">
                                                                                        <span>{{ $value->{app()->getLocale() . '_union_name'} }}</span>
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            width="16" height="16"
                                                                                            fill="currentColor"
                                                                                            class="bi bi-chevron-down"
                                                                                            viewBox="0 0 16 16">
                                                                                            <path fill-rule="evenodd"
                                                                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                                                                        </svg>
                                                                                    </a>
                                                                                    <ul>
                                                                                        @php
                                                                                            $villages = App\Village::where('union_id', $value->id)
                                                                                                ->where('status', 1)
                                                                                                ->get();
                                                                                        @endphp
                                                                                        <li class="bg-success">
                                                                                            {{ __('Village') }}</li>
                                                                                        @foreach ($villages as $village)
                                                                                            <li><a
                                                                                                    href="{{ url(app()->getLocale() . '/all-ads?village=' . $village->id) }}">{{ $village->{app()->getLocale() . '_village_name'} }}</a>
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
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- second navbar-->
    @php
    use App\Adsimage;
    @endphp

    <div class="main-container" id="homepage">


        <div class="intro">
            <div class="container text-center">



                <h3 style="border: none"><button type="button" data-toggle="modal" data-target="#exampleModal"
                        style="background: #34A853;
						color: #fff;
						border: none;
						padding: 15px 50px;
						border-radius: 5px;
					">{{ __('All of Bangladesh') }}</button>
                </h3>

                <style>
                    .btnn {
                        padding: 5px 9px;
                        font-size: 16px;
                        border: none;
                        outline: none;
                    }

                    .ddropdown {
                        position: absolute;
                        display: inline-block;
                    }

                    .ddropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f1f1f1;
                        min-width: 160px;
                        z-index: 1;
                    }

                    .ddropdown-content a {
                        color: black;
                        padding: 12px 16px;
                        text-decoration: none;
                        display: block;
                    }

                    .ddropdown-content a:hover {
                        background-color: #ddd
                    }

                    .ddropdown:hover .ddropdown-content {
                        display: block;
                    }

                    .btnn:hover,
                    .ddropdown:hover .btnn {
                        background-color: #0b7dda;
                    }
                </style>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Search By Location</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">

                                <h5>Select Division or City</h5>
                                <ul class="list-group" style="display: table">
                                    <li class="list-group-item active">Select Cities</li>
                                    @foreach ($divisions as $division)
                                        <li class="list-group-item">
                                            {{ $division->city->{app()->getLocale() . '_dist_name'} }}</li>
                                    @endforeach
                                </ul>
                                <h5>Select Division</h5>
                                @foreach ($divisions as $division)
                                    <button class="btnn">{{ $division->{app()->getLocale() . '_name'} }}</button>
                                    <div class="ddropdown">
                                        <button class="btnn" style="border-left:1px solid #0d8bf2">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="ddropdown-content">
                                            {{-- <a href="#">{{ $district->{app()->getLocale() . '_dist_name'} }}</a> --}}
                                            <ul class="list-group" style="display: table">
                                                <li class="list-group-item active">Select Cities</li>
                                                @foreach ($division->districts as $district)
                                                    <li class="list-group-item">
                                                        {{ $district->city }}</li>
                                                @endforeach
                                            </ul>
                                            <button
                                                class="btnn">{{ $district->{app()->getLocale() . '_dist_name'} }}</button>
                                            <div class="ddropdown">
                                                <button class="btnn" style="border-left:1px solid #0d8bf2">
                                                    <i class="fa fa-caret-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <form id="search" name="search" action="{{ url(app()->getLocale() . '/search') }}" method="GET">
                    <div class="row search-row animated fadeInUp">

                        <div
                            class="col-md-10 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                            <div class="search-col-inner">
                                <i class="fas fa-map-marker-alt icon-append"></i>
                                <div class="search-col-input">
                                    <input class="form-control locinput input-rel searchtag-input has-icon" id="locSearch"
                                        name="search" placeholder="What are you looking for?" type="text"
                                        value="" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-12 search-col">
                            <div class="search-btn-border bg-primary">
                                <button class="btn btn-primary btn-search btn-block btn-gradient">
                                    <i class="fas fa-search"></i> <strong>{{ __('Search') }} </strong>
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="container my-3">
            <div class="col-xl-12 content-box layout-section">
                <div class="row row-featured row-featured-category">
                    <div class="col-xl-12 box-title">
                        <div class="inner">
                            <h2>
                                <span class="title-3">{{ __('Nilam') }} <span
                                        style="font-weight: bold;">{{ __('Ad') }}</span></span>
                                <a href="{{ url('/customer/1/nilam') }}" class="sell-your-item">
                                    {{ __('View more') }} <i class="fas fa-bars"></i>
                                </a>
                            </h2>
                        </div>
                    </div>

                    <div style="clear: both"></div>

                    <div class="relative content featured-list-row clearfix">

                        <div class="large-12 columns">
                            <div class="no-margin featured-list-slider _mOx17M owl-carousel owl-theme owl-loaded owl-drag">




                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 868px;">
                                        @foreach ($nilam as $value)
                                            <div class="owl-item" style="width: auto;">
                                                <div class="item">
                                                    <a href="{{ url('/customer/1/nilam-details/' . $value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
                                                            </span>
                                                            <div class="call-media">
                                                                @php
                                                                    $img = App\Nilamimages::where('nilam_id', $value->id)->first();
                                                                @endphp
                                                                @if (!empty($img->image))
                                                                    <img src="{{ asset($img->image) }}"
                                                                        style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:180px;width:200px"
                                                                        alt="{{ $value->title }}">
                                                                @endif
                                                            </div>
                                                        </span>
                                                        <span class="item-name">{{ $value->title }}</span>
                                                        {{-- <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span> --}}

                                                        <span class="price">
                                                            {{ number_format($value->price, 2) }} ৳
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev">prev</button><button type="button" role="presentation"
                                        class="owl-next">next</button></div>
                                <div class="owl-dots disabled"><button role="button"
                                        class="owl-dot active"><span></span></button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="col-xl-12 content-box layout-section">
                <div class="row row-featured row-featured-category">
                    <div class="col-xl-12 box-title">
                        <div class="inner">
                            <h2>
                                <span class="title-3">{{ __('Member') }} <span
                                        style="font-weight: bold;">{{ __('Ad') }}</span></span>
                                <a href="{{ url(app()->getLocale() . '/all-ads?filter=6') }}" class="sell-your-item">
                                    {{ __('View more') }} <i class="fas fa-bars"></i>
                                </a>
                            </h2>
                        </div>
                    </div>

                    <div style="clear: both"></div>

                    <div class="relative content featured-list-row clearfix">

                        <div class="large-12 columns">
                            <div class="no-margin featured-list-slider _mOx17M owl-carousel owl-theme owl-loaded owl-drag">




                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 868px;">
                                        @foreach ($member_ads as $value)
                                            <div class="owl-item" style="width: auto;">
                                                <div class="item">
                                                    <a href="{{ url(app()->getLocale() . '/details/' . $value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
                                                            </span>
                                                            <div class="call-media">
                                                                @php
                                                                    $img = Adsimage::where('ads_id', $value->id)->first();
                                                                @endphp
                                                                @if (!empty($img->image))
                                                                    <img src="{{ asset($img->image) }}"
                                                                        style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:180px;width:200px"
                                                                        alt="{{ $value->title }}">
                                                                @endif
                                                            </div>
                                                        </span>
                                                        <span class="item-name">{{ $value->title }} -
                                                            {{ $value->id }}</span>
                                                        @php
                                                            $total = 0;
                                                            $sum = 0;
                                                            $total = App\Review::where('ad_id', $value->id)->count();
                                                            $sum = App\Review::where('ad_id', $value->id)->sum('review');
                                                            if ($sum == 0 || $total == 0) {
                                                                $review = 0;
                                                            } else {
                                                                $review = round($sum / $total);
                                                            }
                                                        @endphp
                                                        <div class="d-flex justify-content-between pl-2 pr-2">
                                                            <div class="d-flex justify-content-start">
                                                                @if ($review == 0)
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                @elseif($review == 1)
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                @elseif($review == 2)
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                @elseif($review == 3)
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                @elseif($review == 4)
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star" style="color: #fff;"></span>
                                                                @elseif($review == 5)
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                @endif

                                                            </div>

                                                            <div>
                                                                <span class="price">
                                                                    {{ number_format($value->price, 2) }}
                                                                    ৳{{ $review }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev">prev</button><button type="button" role="presentation"
                                        class="owl-next">next</button></div>
                                <div class="owl-dots disabled"><button role="button"
                                        class="owl-dot active"><span></span></button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section style="background: #fff">
            <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
            <div class="container">
                <div class="col-xl-12 content-box layout-section">
                    <div class="row row-featured row-featured-category">
                        <div class="col-xl-12 box-title no-border">
                            <div class="inner">
                                <h2>
                                    <span class="title-3">{{ __('Browse by') }} <span
                                            style="font-weight: bold;">{{ __('Category') }}</span>
                                </h2>
                            </div>
                        </div>

                        @foreach ($categories as $value)
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6 f-category">
                                <a href="{{ url(app()->getLocale() . '/all-ads?category=' . $value->id) }}">
                                    <img src="{{ asset($value->image) }}" alt="">
                                    <h6>
                                        {{ $value->{app()->getLocale() . '_name'} }}
                                        &nbsp;({{ $value->ads->count() }})
                                    </h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- <div class="container my-3">
                <div class="col-xl-12 content-box layout-section">
                    <div class="row row-featured row-featured-category">
                        <div class="col-xl-12 box-title">
                            <div class="inner">
                                <h2>
                                    <span class="title-3">Top <span style="font-weight: bold;">Ads</span></span>
                                    <a href="{{ url('/search') }}" class="sell-your-item">
                                        View more <i class="fas fa-bars"></i>
                                    </a>
                                </h2>
                            </div>
                        </div>

                        <div style="clear: both"></div>

                        <div class="relative content featured-list-row clearfix">

                            <div class="large-12 columns">
                                <div
                                    class="no-margin featured-list-slider _mOx17M owl-carousel owl-theme owl-loaded owl-drag">




                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 868px;">
                                            @foreach ($member_ads as $value)
                                                <div class="owl-item" style="width: auto;">
                                                    <div class="item">
                                                        <a href="{{ url(app()->getLocale().'/details/'.$value->id) }}">
                                                            <span class="item-carousel-thumb">
                                                                <span class="photo-count">
                                                                    <i class="fa fa-camera"></i>
                                                                    {{ $value->images->count() }}
                                                                </span>
                                                                <img src="{{ asset($value->images->first()->image) }}"
                                                                    style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;"
                                                                    alt="{{ $value->title }}">
                                                            </span>
                                                            <span class="item-name">{{ $value->title }}</span>
                                                            

                                                            <span class="price">
                                                                {{ number_format($value->price, 2) }} ৳
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev">prev</button><button type="button" role="presentation"
                                            class="owl-next">next</button></div>
                                    <div class="owl-dots disabled"><button role="button"
                                            class="owl-dot active"><span></span></button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
            @foreach ($front_category as $fc)
                @if ($fc->ads->count() > 0)
                    <div class="container my-3">
                        <div class="col-xl-12 content-box layout-section">
                            <div class="row row-featured row-featured-category">
                                <div class="col-xl-12 box-title">
                                    <div class="inner">
                                        <h2>
                                            <span class="title-3">{{ __('All') }} <span
                                                    style="font-weight: bold;">{{ $fc->en_name }}</span></span>
                                            <a href="{{ url(app()->getLocale() . '/all-ads?category=' . $fc->id) }}"
                                                class="sell-your-item">
                                                {{ __('View more') }}<i class="fas fa-bars"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>

                                <div style="clear: both"></div>

                                <div class="relative content featured-list-row clearfix">

                                    <div class="large-12 columns">
                                        <div
                                            class="no-margin featured-list-slider _mOx17M owl-carousel owl-theme owl-loaded owl-drag">




                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 868px;">
                                                    @foreach ($fc->ads as $value)
                                                        <div class="owl-item" style="width: auto;">
                                                            <div class="item">
                                                                <a
                                                                    href="{{ url(app()->getLocale() . '/details/' . $value->id) }}">
                                                                    <span class="item-carousel-thumb">
                                                                        <span class="photo-count">
                                                                            <i class="fa fa-camera"></i>
                                                                            {{ $value->images->count() }}
                                                                        </span>
                                                                        @php
                                                                            $img = Adsimage::where('ads_id', $value->id)->first();
                                                                        @endphp
                                                                        @if (!empty($img->image))
                                                                            <img src="{{ asset($img->image) }}"
                                                                                style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:180px;width:200px"
                                                                                alt="{{ $value->title }}">
                                                                        @endif
                                                                    </span>
                                                                    <span class="item-name">{{ $value->title }}</span>
                                                                    {{-- <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span> --}}

                                                                    <span class="price">
                                                                        {{ number_format($value->price, 2) }} ৳
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                                    class="owl-prev">prev</button><button type="button"
                                                    role="presentation" class="owl-next">next</button></div>
                                            <div class="owl-dots disabled"><button role="button"
                                                    class="owl-dot active"><span></span></button></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="container my-3">
                <div class="col-xl-12 content-box layout-section">
                    <div class="row row-featured row-featured-category">
                        <div class="col-xl-12 box-title">
                            <div class="inner">
                                <h2>
                                    <span class="title-3">{{ __('New') }} <span
                                            style="font-weight: bold;">{{ __('Ads') }}</span></span>
                                    <a href="{{ url(app()->getLocale() . '/all-ads?filter=new') }}"
                                        class="sell-your-item">
                                        {{ __('View more') }} <i class="fas fa-bars"></i>
                                    </a>
                                </h2>
                            </div>
                        </div>

                        <div style="clear: both"></div>

                        <div class="relative content featured-list-row clearfix">

                            <div class="large-12 columns">
                                <div
                                    class="no-margin featured-list-slider _mOx17M owl-carousel owl-theme owl-loaded owl-drag">




                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 868px;">
                                            @foreach ($new_ads as $value)
                                                <div class="owl-item" style="width: auto;">
                                                    <div class="item">
                                                        <a
                                                            href="{{ url(app()->getLocale() . '/details/' . $value->id) }}">
                                                            <span class="item-carousel-thumb">
                                                                <span class="photo-count">
                                                                    <i class="fa fa-camera"></i>
                                                                    {{ $value->images->count() }}
                                                                </span>
                                                                @php
                                                                    $img = Adsimage::where('ads_id', $value->id)->first();
                                                                @endphp
                                                                @if (!empty($img->image))
                                                                    <img src="{{ asset($img->image) }}"
                                                                        style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:180px;width:200px"
                                                                        alt="{{ $value->title }}">
                                                                @endif
                                                            </span>
                                                            <span class="item-name">{{ $value->title }}</span>
                                                            @php
                                                                $total = 0;
                                                                $sum = 0;
                                                                $total = App\Review::where('ad_id', $value->id)->count();
                                                                $sum = App\Review::where('ad_id', $value->id)->sum('review');
                                                                if ($sum == 0 || $total == 0) {
                                                                    $review = 0;
                                                                } else {
                                                                    $review = round($sum / $total);
                                                                }
                                                            @endphp
                                                            <div class="d-flex justify-content-between pl-2 pr-2">
                                                                <div class="d-flex justify-content-start">
                                                                    @if ($review == 0)
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                    @elseif($review == 1)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                    @elseif($review == 2)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                    @elseif($review == 3)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                    @elseif($review == 4)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"
                                                                            style="color: #fff;"></span>
                                                                    @elseif($review == 5)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                    @endif

                                                                </div>

                                                                <div>
                                                                    <span class="price">
                                                                        {{ number_format($value->price, 2) }}
                                                                        ৳{{ $review }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev">prev</button><button type="button" role="presentation"
                                            class="owl-next">next</button></div>
                                    <div class="owl-dots disabled"><button role="button"
                                            class="owl-dot active"><span></span></button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
    <div class="container">
        <div class="page-info page-info-lite rounded">
            <div class="text-center section-promo">
                <div class="row">

                    <div class="col-sm-4 col-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5>
                                        <span class="counter animated fadeInDownBig">{{ $total_ads }}</span>
                                    </h5>
                                    <div class="iconbox-wrap-text animated fadeIn">{{ __('Classified ads') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5>
                                        <span class="counter animated fadeInDownBig">{{ $customer }}</span>
                                    </h5>
                                    <div class="iconbox-wrap-text animated fadeIn">{{ __('Trusted Sellers') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="far fa-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5>
                                        <span class="counter animated fadeInDownBig">{{ $location }}</span>
                                    </h5>
                                    <div class="iconbox-wrap-text animated fadeIn">{{ __('Locations') }}</div>
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



    <div class="modal fade" id="quickLogin" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header px-3">
                    <h4 class="modal-title"><i class="fas fa-sign-in-alt"></i> Log In </h4>

                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <form role="form" method="POST" action="http://kroyandbikroy.com/login">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">

                                <input type="hidden" name="_token" value="WhEyytVMUcy6pD7biPTZLmepECEHGcVD5swYFeXi">
                                <input type="hidden" name="language_code" value="en">


                                <div class="row mb-3 d-flex justify-content-center gx-2 gy-1">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-fb">
                                            <a href="http://kroyandbikroy.com/auth/facebook" title="Login with Facebook">
                                                <i class="fab fa-facebook"></i> Login with <strong>Facebook</strong>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 btn btn-ggl">
                                            <a href="http://kroyandbikroy.com/auth/google" title="Login with Google">
                                                <i class="fab fa-google"></i> Login with <strong>Google</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center loginOr my-4">
                                    <div class="col-xl-12">
                                        <hr class="hrOr">
                                        <span class="spanOr rounded">or</span>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <label for="login" class="control-label">Login (Email or Phone)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input id="mLogin" name="login" type="text" placeholder="Email or Phone"
                                            class="form-control" value="">
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="input-group show-pwd-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input id="mPassword" name="password" type="password" class="form-control"
                                            placeholder="Password" autocomplete="off">
                                        <span class="icon-append show-pwd">
                                            <button type="button" class="eyeOfPwd">
                                                <i class="far fa-eye-slash"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="checkbox form-check-label float-start mt-2"
                                        style="font-weight: normal;">
                                        <input type="checkbox" value="1" name="remember_me" id="rememberMe2"
                                            class=""> Keep me logged in
                                    </label>
                                    <p class="float-end mt-2">
                                        <a href="http://kroyandbikroy.com/password/reset">
                                            Lost your password?
                                        </a> / <a href="http://kroyandbikroy.com/register">
                                            Register
                                        </a>
                                    </p>
                                    <div style=" clear:both"></div>
                                </div>


                                <input type="hidden" name="quickLoginForm" value="1">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-end">Log In</button>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade modalHasList" id="selectCountry" tabindex="-1" aria-labelledby="selectCountryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header px-3">
                    <h4 class="modal-title uppercase fw-bold" id="selectCountryLabel">
                        <i class="far fa-map"></i> Select a Country
                    </h4>

                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2">

                        <div class="col mb-1 cat-list">
                            <img src="{{ asset('/') }}index-style/blank.gif" class="flag flag-bd"
                                style="margin-bottom: 4px; margin-right: 5px;">
                            <a href="/locale/bn?country=BD" onclick="showarea()">
                                Bangladesh
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header px-3">
                    <h4 class="modal-title" id="errorModalTitle">
                        Title
                    </h4>

                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div id="errorModalBody" class="col-12">
                            Content...
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        function showarea() {
            $(".sh_nav").show()
        }
    </script>
@endsection
