@extends('frontEnd.layouts.master1')
@section('title', 'All nilam ads')
@section('body')
    <style>
        a.nav-link {
            color: #080808 !important;
        }

        .skin a:not(.btn),
        .skin .nav-link,
        .skin .link-color {
            color: #000000 !important;
        }
    </style>
    <div class="main-container">


        <div class="container">
            <nav aria-label="breadcrumb" role="navigation" class="search-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/customer/1/nilam') }}">
                            {{ __('All Ads') }}
                        </a>
                    </li>
                    @if (request()->location)
                        @php
                            $l = App\Division::find(request()->location);
                        @endphp
                        <li class="breadcrumb-item active">
                            {{ $l->{app()->getLocale() . '_name'} }}
                        </li>
                    @elseif (request()->category)
                        @php
                            $l = App\Category::find(request()->category);
                        @endphp
                        <li class="breadcrumb-item active">
                            {{ $l->{app()->getLocale() . '_name'} }}
                        </li>
                    @elseif (request()->subcategory)
                        @php
                            $l = App\Subcategory::find(request()->subcategory);
                        @endphp
                        <li class="breadcrumb-item">
                            <a href="{{ url('/customer/1/nilam?category=' . $l->category->id) }}">
                                {{ $l->category->{app()->getLocale() . '_name'} }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $l->{app()->getLocale() . '_subcategoryName'} }}
                        </li>
                    @elseif (request()->childcategory)
                        @php
                            $l = App\Childcategory::find(request()->childcategory);
                        @endphp
                        <li class="breadcrumb-item">
                            <a href="{{ url('/customer/1/nilam?category=' . $l->subcategory->category->id) }}">
                                {{ $l->subcategory->category->{app()->getLocale() . '_name'} }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/customer/1/nilam?subcategory=' . $l->subcategory->id) }}">
                                {{ $l->{app()->getLocale() . '_childcategoryName'} }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $l->{app()->getLocale() . '_childcategoryName'} }}
                        </li>
                    @endif
                </ol>
                <div class="row" style="padding: 0 35px;border-bottom:1px solid #00000012;">
                    <div class="col-md-4">
                        <div class="d-flex justify-content-start">
                            <i class="fas fa-map-marker-alt"
                                style="font-size: 20px;margin:15px 10px 0 0;color:#068436;"></i>
                            <span style="font-size: 20px;font-weight: bold;margin: 10px 0 0 0;">
                                @if (request()->category)
                                    @php
                                        $l = App\Category::find(request()->category);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_name'} }}
                                @elseif (request()->subcategory)
                                    @php
                                        $l = App\Subcategory::find(request()->subcategory);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_subcategoryName'} }}
                                @elseif (request()->childcategory)
                                    @php
                                        $l = App\Childcategory::find(request()->childcategory);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_childcategoryName'} }}
                                @else
                                    {{ __('All Ads') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-start">
                            <i class="far fa-folder" style="font-size: 20px;margin:15px 10px 0 0;color:#068436;"></i>
                            <span style="font-size: 20px;font-weight: bold;margin: 10px 0 0 0;">
                                @if (request()->category)
                                    @php
                                        $l = App\Category::find(request()->category);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_name'} }}
                                @elseif (request()->subcategory)
                                    @php
                                        $l = App\Subcategory::find(request()->subcategory);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_subcategoryName'} }}
                                @elseif (request()->childcategory)
                                    @php
                                        $l = App\Childcategory::find(request()->childcategory);
                                    @endphp
                                    {{ $l->{app()->getLocale() . '_childcategoryName'} }}
                                @else
                                    {{ __('All Ads') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form id="search" name="search" action="{{ url('/nilamsearch') }}"
                            method="GET">
                            <div class="row search-row animated fadeInUp mb-3" style="max-width: 100%;">

                                <div
                                    class="col-md-10 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                                    <div class="search-col-inner" style="border-width: 2px;">
                                        <div class="search-col-input" style="margin-left:10px;">
                                            <input class="form-control"
                                                id="locSearch" name="search" placeholder="What are you looking for?"
                                                type="text" value="" style="border-radius:0px">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-12 search-col">
                                    <div class="search-btn-border bg-primary" style="border-width: 2px;">
                                        <button class="btn btn-primary btn-search btn-block btn-gradient">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-3 page-sidebar mobile-filter-sidebar pb-4">
                    <aside>
                        <div class="sidebar-modern-inner enable-long-words">

                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="fw-bold">
                                        {{ __('Product condition') }}
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter locations-list">
                                <ul class="browse-list list-unstyled long-list">
                                    <li>
                                        <a href="{{ url('/customer/1/nilam?filter=1') }}">{{ __('Used') }}</span></a>
                                        <a href="{{ url('/customer/1/nilam?filter=2') }}">{{ __('New') }}</span></a>
                                        <a
                                            href="{{ url('/customer/1/nilam?filter=3') }}">{{ __('Price Low to High') }}</span></a>
                                        <a
                                            href="{{ url('/customer/1/nilam?filter=4') }}">{{ __('Price High to Low') }}</span></a>
                                        <a
                                            href="{{ url('/customer/1/nilam?filter=5') }}">{{ __('Older Advertisement') }}</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div style="clear:both"></div>
                            <div class="block-title has-arrow sidebar-header">
                                <h5>
                                    <span class="fw-bold">
                                        {{ __('Locations') }}
                                    </span>
                                </h5>
                            </div>
                            <div class="block-content list-filter locations-list">
                                <ul class="browse-list list-unstyled long-list">
                                    @foreach ($divisions as $value)
                                        <li>
                                            <a href="{{ url('/customer/1/nilam?location=' . $value->id) }}"
                                                title="{{ $value->{app()->getLocale() . '_name'} }}">
                                                {{ $value->{app()->getLocale() . '_name'} }}
                                                <span class="count">&nbsp;- {{ $value->nilam->count() }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div style="clear:both"></div>
                            <div id="subCatsList">

                                <div class="block-title has-arrow sidebar-header">
                                    <h5>
                                        <span class="fw-bold">
                                            <a href="">
                                                <i class="fas fa-reply"></i> {{ __('All') }}
                                            </a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="block-content list-filter categories-list">
                                    <ul class="list-unstyled">
                                        @if (request()->category)
                                            @foreach ($categories->where('id', request()->category) as $cat)
                                                <li>
                                                    <a href="{{ url('/customer/1/nilam?category=' . $cat->id) }}"
                                                        title="{{ $cat->{app()->getLocale() . '_name'} }}">
                                                        <span class="title fw-bold">
                                                            <i class="fas fa-laptop"></i>
                                                            {{ $cat->{app()->getLocale() . '_name'} }}
                                                        </span>
                                                        <span class="count">&nbsp;({{ $cat->nilamcount->count() }})</span>
                                                    </a>
                                                    @if ($cat->subcategories->count() > 0)
                                                        <ul class="list-unstyled long-list">
                                                            @foreach ($cat->subcategories as $sub)
                                                                <li>
                                                                    <a href="{{ url('/customer/1/nilam?subcategory=' . $sub->id) }}"
                                                                        title="{{ $sub->{app()->getLocale() . '_subcategoryName'} }}">
                                                                        <i class="fas fa-laptop-code"></i>
                                                                        {{ $sub->{app()->getLocale() . '_subcategoryName'} }}
                                                                        <span
                                                                            class="count">&nbsp;({{ $sub->nilamcount->count() }})</span>
                                                                    </a>
                                                                    @if ($sub->childcategories->count() > 0)
                                                                        <ul class="list-unstyled long-list">
                                                                            @foreach ($sub->childcategories as $child)
                                                                                <li>
                                                                                    <a href="{{ url('/customer/1/nilam?childcategory=' . $child->id) }}"
                                                                                        title="{{ $child->{app()->getLocale() . '_childcategoryName'} }}">
                                                                                        <i class="fas fa-laptop-code"></i>
                                                                                        {{ $child->{app()->getLocale() . '_childcategoryName'} }}
                                                                                        <span
                                                                                            class="count">&nbsp;({{ $child->nilamcount->count() }})</span>
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @elseif(!request()->category &&
                                            !request()->subcategory &&
                                            !request()->childcategory &&
                                            !request()->filter &&
                                            !request()->division)
                                            @foreach ($categories as $cat)
                                                <li>
                                                    <a href="{{ url('/customer/1/nilam?category=' . $cat->id) }}"
                                                        title="{{ $cat->{app()->getLocale() . '_name'} }}">
                                                        <span class="title fw-bold">
                                                            <i class="fas fa-laptop"></i>
                                                            {{ $cat->{app()->getLocale() . '_name'} }}
                                                        </span>
                                                        <span class="count">&nbsp;({{ $cat->nilamcount->count() }})</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            @foreach ($categories as $cat)
                                                <li>
                                                    <a href="{{ url('/customer/1/nilam?category=' . $cat->id) }}"
                                                        title="{{ $cat->{app()->getLocale() . '_name'} }}">
                                                        <span class="title fw-bold">
                                                            <i class="fas fa-laptop"></i>
                                                            {{ $cat->{app()->getLocale() . '_name'} }}
                                                        </span>
                                                        <span class="count">&nbsp;({{ $cat->nilamcount->count() }})</span>
                                                    </a>
                                                    @if ($cat->subcategories->count() > 0)
                                                        <ul class="list-unstyled long-list">
                                                            @foreach ($cat->subcategories as $sub)
                                                                <li>
                                                                    <a href="{{ url('/customer/1/nilam?subcategory=' . $sub->id) }}"
                                                                        title="{{ $sub->{app()->getLocale() . '_subcategoryName'} }}">
                                                                        <i class="fas fa-laptop-code"></i>
                                                                        {{ $sub->{app()->getLocale() . '_subcategoryName'} }}
                                                                        <span
                                                                            class="count">&nbsp;({{ $sub->nilamcount->count() }})</span>
                                                                    </a>
                                                                    @if ($sub->childcategories->count() > 0)
                                                                        <ul class="list-unstyled long-list">
                                                                            @foreach ($sub->childcategories as $child)
                                                                                <li>
                                                                                    <a href="{{ url('/customer/1/nilam?childcategory=' . $child->id) }}"
                                                                                        title="{{ $child->{app()->getLocale() . '_childcategoryName'} }}">
                                                                                        <i class="fas fa-laptop-code"></i>
                                                                                        {{ $child->{app()->getLocale() . '_childcategoryName'} }}
                                                                                        <span
                                                                                            class="count">&nbsp;({{ $child->nilamcount->count() }})</span>
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </aside>
                </div>
                <div class="col-md-9 page-content col-thin-left mb-4">
                    <div class="category-list make-grid">


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contentAll" role="tabpanel" aria-labelledby="tabAll">
                                <div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">

                                    <div class="row">
                                        @foreach ($ads as $value)
                                            <div class="col-md-3 mb-5 vv">
                                                <div class="item">
                                                    <a href="{{ url('/customer/1/nilam-details/' . $value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
                                                            </span>
                                                            <img src="{{ asset($value->images->first()->image) }}"
                                                                style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:200px;width:100%"
                                                                alt="{{ $value->title }}">
                                                        </span>
                                                        <br>
                                                        <span
                                                            class="item-name"style="color: #000;font-weight:bold">{{ $value->title }}</span>
                                                        <br>
                                                        {{-- <a
                                                            href="{{ url(app()->getLocale() . '/customer-post/' . $value->customer->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2"><i
                                                                    class="far fa-clock"></i>

                                                                {{ $value->customer->name }}
                                                            </span>
                                                        </a>

                                                        <a
                                                            href="{{ url('/customer/1/nilam?category=' . $value->categories->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2"><i
                                                                    class="far fa-folder"></i>
                                                                {{ $value->categories->{app()->getLocale() . '_name'} }}
                                                            </span>
                                                        </a>>
                                                        <a
                                                            href="{{ url('/customer/1/nilam?subcategory=' . $value->subcategories->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2">
                                                                {{ $value->subcategories->{app()->getLocale() . '_subcategoryName'} }}
                                                            </span>
                                                        </a>
                                                        @if (!is_null($value->childcategory_id))
                                                            >
                                                            <a
                                                                href="{{ url('/customer/1/nilam?childcategory=' . $value->childcategories->id) }}">
                                                                <span style="color: #07a4b4" class="mr-2">
                                                                    {{ $value->childcategories->{app()->getLocale() . '_childcategoryName'} ?? '' }}
                                                                </span>
                                                            </a>
                                                        @endif
                                                        <a
                                                            href="{{ url('/customer/1/nilam?location=' . $value->district->id) }}">
                                                            <span style="color: #07a4b4"><i
                                                                    class="fa fa-location-arrow"></i>
                                                                {{ $value->district->{app()->getLocale() . '_dist_name'} }}</span>
                                                        </a> --}}

                                                        {{-- <style>
                                                            .checked {
                                                              color: orange;
                                                              display: inline !important;	
                                                            
                                                                                                            }
                                                            </style>
                                                           <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="checked text-dark"> 0 review</span> --}}

                                                        <div
                                                            style="float: left;
                                                        margin-top: 21px;
                                                        font-size: 16px;
                                                        color: #000">
                                                            Bid: {{ $value->nilamhistory->count() }}

                                                        </div>
                                                        <div
                                                            style="float: right;
                                                        margin-top: 21px;
                                                        font-size: 16px;
                                                        color: #000">
                                                            {{ number_format($value->bid_price, 2) }} ৳

                                                        </div>
                                                        <br>

                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{ $ads->links() }}

                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="mt-3 mb-0 pagination-sm" aria-label="">
                    </nav>

                </div>
            </div>
        </div>
    @endsection
