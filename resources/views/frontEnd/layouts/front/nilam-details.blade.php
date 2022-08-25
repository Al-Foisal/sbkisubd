@extends('frontEnd.layouts.master1')
@section('body')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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
                                                onclick="colorImage('{{ asset($image->image) }}')" style="height: 100px;width:100px">
                                        </div>
                                    @endforeach
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                        <hr>

                        <div class="items-details bg-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 p-3">
                                        <h3 style="color: #828282;">Condition: <b
                                                style="color: black;">{{ $ads->version == 1 ? 'Used' : 'New' }}</b></h3>
                                        <h3 style="color: #828282;">Brand: <b style="color: black;">{{ $ads->brand }}</b>
                                        </h3>
                                        <h3 style="color: #828282;">Current Bid: <span
                                                class="text-warning">৳{{ number_format($ads->bid_price, 2) }}</span></h3>

                                        <h3 style="color: #828282;">Total Bidded: <span
                                                class="text-warning">{{ $ads->nilamhistory->count() }}</span></h3>
                                        <p class="btn btn-link" data-toggle="modal" data-target="#exampleModal">View nilam
                                            details</p>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bidding List</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Customer Image</th>
                                                                    <th scope="col">Customer Name</th>
                                                                    <th scope="col">Bidded Price</th>
                                                                    <th scope="col">Bidded_at</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($ads->nilamhistory as $key => $h)
                                                                    <tr>
                                                                        <th scope="row">{{ ++$key }}</th>
                                                                        <td>
                                                                            <img src="{{ asset($h->customer->image) }}" style="height:30px;width:30px;border-radius:100px;">
                                                                        </td>
                                                                        <td>{{ $h->customer->name }}</td>
                                                                        <td>৳{{ number_format($h->bid_price, 2) }}</td>
                                                                        <td>{{ $h->created_at->format('d F, Y H:i') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('customerId'))
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ url('/customer/1/nilam-details/bid') }}"
                                                        class="form-inline" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ads_id" value="{{ $ads->id }}">
                                                        <input type="hidden" name="bidder_id"
                                                            value="{{ session('customerId') }}">
                                                        <button type="submit" class="btn btn-success btn-block"><b>Make
                                                                Your Bit for
                                                                ৳{{ number_format($ads->bid_price + $ads->bid_range, 2) }}</b></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{ url('/customer/1/nilam-details/bid') }}"
                                                        class="form-inline" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ads_id"
                                                            value="{{ $ads->id }}">
                                                        <input type="hidden" name="bidder_id"
                                                            value="{{ session('customerId') }}">
                                                        <div class="d-flex justify-content-start">
                                                            <div class="form-group mr-2">
                                                                <input type="number"
                                                                min="{{ $ads->bid_price + $ads->bid_range }}"
                                                                name="custom_bid_price" class="form-control">
                                                            </div>
                                                            <button type="submit" class="btn btn-success btn-block"><b>Bid
                                                                    Now</b></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ url('customer/login') }}" class="btn btn-primary btn-block">
                                                Login to Bid
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="items-details">
                            <ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="item-details-tab" data-bs-toggle="tab"
                                        data-bs-target="#item-details" role="tab" aria-controls="item-details"
                                        aria-selected="true">
                                        <h4 style="color: black">Listing Details</h4>
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

                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <h4 class="fw-normal p-0" style="color: black">
                                                        <span class="fw-bold"><i class="fa fa-location-arrow"></i>
                                                            Location:
                                                        </span>
                                                        <span style="color: black">
                                                            {{ $ads->division->{app()->getLocale() . '_name'} }}
                                                        </span>
                                                    </h4>
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
@endsection
