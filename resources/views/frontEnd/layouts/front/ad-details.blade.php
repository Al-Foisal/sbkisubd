@extends('frontEnd.layouts.master1')
@section('body')
    <div class="main-container">


        <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="breadcrumb" role="navigation" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ url(app()->getLocale() . '/all-ads?category=' . $ads->category_id) }}">{{ $ads->categories->{app()->getLocale() . '_name'} }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url(app()->getLocale() . '/all-ads?subcategory=' . $ads->subcategory_id) }}">
                                    {{ $ads->subcategories->{app()->getLocale() . '_subcategoryName'} }}
                                </a>
                            </li>
                            @if (!is_null($ads->childcategory))
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ url(app()->getLocale() . '/all-ads?childcategory=' . $ads->childcategory_id) }}">
                                        {{ $ads->childcategories->{app()->getLocale() . '_childcategoryName'} }}
                                    </a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $ads->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 page-content col-thin-right">
                    <div class="inner inner-box items-details-wrapper pb-0">
                        <h1 class="h4 fw-bold enable-long-words">
                            <strong>
                                {{ $ads->title }}
                            </strong>
                            @if (!is_null($ads->package_id))
                                <small class="label label-default adlistingtype">Member Ads</small>
                            @endif
                        </h1>
                        <span class="info-row">
                            <span class="date">
                                <i class="far fa-clock"></i> {{ $ads->created_at->format('d F, Y H:i:s A') }}
                            </span>&nbsp;
                            <span class="item-location">
                                <i class="fa fa-location-arrow"></i> {{ $ads->division->{app()->getLocale() . '_name'} }}
                            </span>&nbsp;
                        </span>

                        <div class="gallery-container">
                            <div class="p-price-tag">{{ number_format($ads->price, 2) }} ৳</div>
                            @php
                                $img = asset($ads->images->first()->image);
                            @endphp
                            <div
                                class="swiper main-gallery swiper-initialized swiper-horizontal swiper-pointer-events swiper-autoheight">
                                <img src="{{ $img }}" style="width: 100%" class="singleimage">
                            </div>
                            <hr>
                            <div
                                class="swiper thumbs-gallery swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                <div class="swiper-wrapper" id="swiper-wrapper-6100e6fdefb934cbc" aria-live="polite"
                                    style="transform: translate3d(283.667px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($ads->images as $key => $image)
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-@if ($key === 0) 'active' @endif swiper-slide-thumb-@if ($key === 0) 'active' @endif"
                                            style="width: 136.833px; margin-right: 5px;    width: 136.833px;
                                        margin-right: 5px;
                                        display: inline-block;"
                                            role="group" aria-label="1 / 2">
                                            <img src="{{ asset($image->image) }}"
                                                alt="hp-ultra-slim-core-i7-ram-16gb-graphics-8gb-ssd-256gb-small-0"
                                                onclick="colorImage('{{ asset($image->image) }}')"
                                                style="height: 100px;width:100px;">
                                        </div>
                                    @endforeach
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <hr>
                        </div>





                        <div class="items-details">
                            <ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="item-details-tab" data-bs-toggle="tab"
                                        data-bs-target="#item-details" role="tab" aria-controls="item-details"
                                        aria-selected="true">
                                        <h4 style="color: black">Ad Details</h4>
                                    </button>
                                </li>
                            </ul>


                            <div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
                                <div class="tab-pane show active" id="item-details" role="tabpanel"
                                    aria-labelledby="item-details-tab">
                                    <div class="row pb-3">
                                        <div
                                            class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">

                                            <div class="row">

                                                <div class="col-md-6 col-sm-6 col-6 d-flex justify-content-start">
                                                    <h4 class="fw-normal p-0  mr-3" style="color: black">
                                                        <span class="fw-bold"><i class="fa fa-location-arrow"></i> Location:
                                                        </span>
                                                        <span>
                                                            {{ $ads->division->{app()->getLocale() . '_name'} }},
                                                        </span>
                                                    </h4>
                                                    @php
                                                        $total = 0;
                                                        $sum = 0;
                                                        $total = App\Review::where('ad_id', $ads->id)->count();
                                                        $sum = App\Review::where('ad_id', $ads->id)->sum('review');
                                                        if ($sum == 0 || $total == 0) {
                                                            $review = 0;
                                                        } else {
                                                            $review = round($sum / $total);
                                                        }
                                                    @endphp
                                                    <div class="">
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
                                                    </div>
                                                </div>


                                                <div class="col-md-6 col-sm-6 col-6 text-end">
                                                    <h4 class="fw-normal p-0" style="color: black">
                                                        <span class="fw-bold">
                                                            Price:
                                                        </span>
                                                        <span>
                                                            {{ number_format($ads->price, 2) }} ৳
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <hr class="border-0 bg-secondary">




                                            <div class="row">
                                                <div class="col-12 detail-line-content">
                                                    {!! $ads->description !!}
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- @if ($reviews->count() > 0)
                            <hr>
                            Customer Review for <b><i>{{ $ads->title }}</i></b>
                            <hr>
                            @foreach ($reviews as $review)
                                <div class="row mb-5">
                                    <div class="d-flex justify-content-start">
                                        <img src="{{ asset($review->customer->image) }}" style="width:100px;height:75px"
                                            class="mr-2">
                                        <div>
                                            <b>{{ $review->customer->name }}</b>
                                            <p><i class="fa fa-location-arrow"></i> {{ $review->customer->city }}</p>
                                            <p>{{ $review->created_at->format('d F, Y') }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        {{ $review->review }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if (!session('customerId') || $checkreview)
                        @else
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="row">
                                <form action="{{ url('post-review') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{ session('customerId') }}">
                                    <input type="hidden" name="ad_id" value="{{ $ads->id }}">
                                    <input type="hidden" name="status" value="0">
                                    <div class="col-12 detail-line-content pb-2">
                                        <label for="">Share Your Openion:</label>
                                        <textarea name="review" id="" style="width:100%" rows="10"></textarea>
                                        <button type="submit" class="btn btn-success">Submit Your Openion</button>
                                    </div>

                                </form>
                            </div>
                        @endif --}}
                    </div>
                </div>

                <div class="col-lg-3 page-sidebar-right">
                    <aside>
                        <div class="card card-user-info sidebar-card">
                            <div class="block-cell user">
                                <div class="cell-media">
                                    <img src="{{ asset($customer->image) }}" alt="Admin">
                                </div>
                                <div class="cell-content">
                                    <span class="name">

                                        {{ $customer->name }}
                                    </span>
                                    @if ($ads->package_id)
                                        <div class="badge bg-secondary">
                                            <i class="fas fa-star mr-1 text-warning"></i>Member
                                        </div>
                                    @endif
                                    <h5 class="title">
                                        <b style="color: black">
                                            {{ 'Member sience from ' . $customer->created_at->format('F Y') }}
                                        </b>
                                    </h5>

                                    <a href="{{ url(app()->getLocale() . '/customer-post/' . $customer->id) }}">
                                        See member's shop details
                                    </a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body text-start">
                                    <div class="d-flex justify-content-start">
                                        <div class="mr-3">
                                            <i class="fas fa-phone-square-alt"
                                                style="font-size: xx-large;
                                            color: #1e934b;"></i>
                                        </div>
                                        <div>
                                            <h3>Call Seller</h3>
                                            <button class="btn btn-light" style="background-color:#e7edee;">
                                                <b>{{ $customer->phone }}</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="card-content">
                                <div class="card-body text-start">
                                    <div class="d-flex justify-content-start">
                                        <div class="mr-3">
                                            <i class="fas fa-comment-alt"
                                                style="font-size: xx-large;
                                            color: #1e934b;"></i>
                                        </div>
                                        <div id="atr" onclick="atr()">
                                            <h3>Chat with seller</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card sidebar-card">
                            <div class="card-header">Safety Tips for Buyers</div>
                            <div class="card-content">
                                <div class="card-body text-start">
                                    <ul class="list-check">
                                        <li> Meet seller at a public place </li>
                                        <li> Check the item before you buy </li>
                                        <li> Pay only after collecting the item </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

        </div>




    </div>
    <script>
        function colorImage(value) {
            $('.singleimage').attr('src', value);
        }
    </script>
    <script>
        document.getElementById("atr").style.display = "block";
        document.getElementById("valu").style.display = "none";
        $("#atr").click(function() {
            // document.getElementById("atr").style.display = "none";
            document.getElementById("valu").style.display = "block";
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
