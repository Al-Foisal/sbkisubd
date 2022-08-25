@extends('frontEnd.layouts.master1')
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
                    <li class="breadcrumb-item active">
                        All Ads
                    </li>
                </ol>
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
                                                        <span class="count">&nbsp;({{ $cat->ads->count() }})</span>
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
                                                                            class="count">&nbsp;({{ $sub->ads->count() }})</span>
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
                                                                                            class="count">&nbsp;({{ $child->ads->count() }})</span>
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
                                        @else
                                            @foreach ($categories as $cat)
                                                <li>
                                                    <a href="{{ url('/customer/1/nilam?category=' . $cat->id) }}"
                                                        title="{{ $cat->{app()->getLocale() . '_name'} }}">
                                                        <span class="title fw-bold">
                                                            <i class="fas fa-laptop"></i>
                                                            {{ $cat->{app()->getLocale() . '_name'} }}
                                                        </span>
                                                        <span class="count">&nbsp;({{ $cat->ads->count() }})</span>
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
                                                                            class="count">&nbsp;({{ $sub->ads->count() }})</span>
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
                                                                                            class="count">&nbsp;({{ $child->ads->count() }})</span>
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
                                            <div class="col-md-3 mb-5">
                                                <div class="item">
                                                    <a href="{{ url('/customer/1/nilam-details/' . $value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
                                                            </span>
                                                            <img src="{{ asset($value->images->first()->image) }}"
                                                                style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:180px;width:200px"
                                                                alt="{{ $value->title }}">
                                                        </span>
                                                        <span
                                                            class="item-name"style="color: #000;font-weight:bold">{{ $value->title }}</span>
                                                        <br>
                                                        <br>
                                                        <a
                                                            href="{{ url(app()->getLocale() . '/customer-post/' . $value->customer->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2"><i
                                                                    class="far fa-clock"></i>

                                                                {{ $value->customer->name }}
                                                            </span>
                                                        </a>

                                                        <a
                                                            href="{{ url(app()->getLocale() . '/all-ads?category=' . $value->categories->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2"><i
                                                                    class="far fa-folder"></i>
                                                                {{ $value->categories->{app()->getLocale() . '_name'} }}
                                                            </span>
                                                        </a>>
                                                        <a
                                                            href="{{ url(app()->getLocale() . '/all-ads?subcategory=' . $value->subcategories->id) }}">
                                                            <span style="color: #07a4b4" class="mr-2">
                                                                {{ $value->subcategories->{app()->getLocale() . '_subcategoryName'} }}
                                                            </span>
                                                        </a>
                                                        @if (!is_null($value->childcategory_id))
                                                            >
                                                            <a
                                                                href="{{ url(app()->getLocale() . '/all-ads?childcategory=' . $value->childcategories->id) }}">
                                                                <span style="color: #07a4b4" class="mr-2">
                                                                    {{ $value->childcategories->{app()->getLocale() . '_childcategoryName'} ?? '' }}
                                                                </span>
                                                            </a>
                                                        @endif
                                                        <a
                                                            href="{{ url(app()->getLocale() . '/all-ads?location=' . $value->district->id) }}">
                                                            <span style="color: #07a4b4"><i
                                                                    class="fa fa-location-arrow"></i>
                                                                {{ $value->district->{app()->getLocale() . '_dist_name'} }}</span>
                                                        </a>

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
                                                            {{ number_format($value->price, 2) }} ৳

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
