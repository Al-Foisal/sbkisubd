@extends('frontEnd.layouts.master1')
@section('title', 'সবকিছু হাতের মুঠোয়')
@section('body')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    <!-- this is style.css link-->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> --}}
    {{-- <link rel="stylesheet" href="responsive.css"> --}}
    {{-- <link rel="stylesheet" href="style1.css"> --}}
    <style>
        .vv:hover{
            background: #140d0421;
            border-radius: 5px;
        }
        @media (max-width:767px) {
            .navbar-brand.logo.logo-title {
                padding-top: 20px
            }
        }
        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: box-shadow .15s ease-in-out;
            margin-left: 170px;
            margin-top: 40px;
        }
    </style>
    <!-- second navbar-->
    @php
    use App\Adsimage;
    @endphp

    <div class="main-container" id="homepage">


        <div class="intro">
            <div class="container text-center">



                <h3 style="border: none">
                    
                    <a href="{{ url(app()->getLocale().'/all-area') }}" type="button"
                        style="background: #0000002b;
						color: #fff;
						border: none;
						padding: 5px 10px;
						border-radius: 100px;
                        font-size:15px;
					"><i class="fas fa-map-marker-alt"></i> {{ __('All of Bangladesh') }}</a>
                </h3>
                <form id="search" name="search" action="{{ url(app()->getLocale() . '/search') }}" method="GET">
                    <div class="row search-row animated fadeInUp">

                        <div
                            class="col-md-10 col-sm-12 search-col relative">
                            <div class="search-col-inner">
                                
                                <div class="">
                                    <input class="form-control " id="locSearch"
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

                                                        <div class="d-flex justify-content-between">
                                                            <span>
                                                                Bid: {{ $value->nilamhistory->count() }}
                                                            </span>
                                                            <span>
                                                                {{ number_format($value->bid_price, 2) }} ৳
                                                            </span>
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
                                                            {{-- <div class="d-flex justify-content-start">
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

                                                            </div> --}}
                                                            <span class="price">
                                                                {{ $value->created_at->diffForHumans() }}
                                                             </span>

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
                                                                    <div class="d-flex justify-content-between pl-2 pr-2">
                                                                        {{-- <div class="d-flex justify-content-start">
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
            
                                                                        </div> --}}
                                                                        <span class="price">
                                                                            {{ $value->created_at->diffForHumans() }}
                                                                         </span>
            
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
                                                                {{-- <div class="d-flex justify-content-start">
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
    
                                                                </div> --}}
                                                                <span class="price">
                                                                    {{ $value->created_at->diffForHumans() }}
                                                                 </span>
    
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
