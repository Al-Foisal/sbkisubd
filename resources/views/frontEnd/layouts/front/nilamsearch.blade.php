@extends('frontEnd.layouts.master1')
@section('title', request()->search)
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
                        {{ request()->search }}
                    </li>
                </ol>
            </nav>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content col-thin-left mb-4">
                    <div class="category-list make-grid">

                        {{-- <div class="mobile-filter-bar col-xl-12">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class=""><i class="fas fa-bars"></i> ফিল্টার</a>
                                </li>
                                <li>

                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown">ক্রমানুসার</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="http://www.kroyandbikroy.com/category/laptop-computer?display=grid&amp;orderBy=distance"
                                                    rel="nofollow">ক্রমানুসার</a></li>
                                            <li><a href="http://www.kroyandbikroy.com/category/laptop-computer?display=grid&amp;orderBy=priceAsc"
                                                    rel="nofollow">মূল্য: নিম্ন থেকে উচ্চ</a></li>
                                            <li><a href="http://www.kroyandbikroy.com/category/laptop-computer?display=grid&amp;orderBy=priceDesc"
                                                    rel="nofollow">মূল্য: উচ্চ থেকে নিম্ন</a></li>
                                            <li><a href="http://www.kroyandbikroy.com/category/laptop-computer?display=grid&amp;orderBy=date"
                                                    rel="nofollow">তারিখ</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div> --}}


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contentAll" role="tabpanel" aria-labelledby="tabAll">
                                <div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">

                                    <div class="row">
                                        @foreach ($advertisments as $value)
                                            <div class="col-md-3 mb-5">
                                                <div class="item">
                                                    <a href="{{ url('/customer/1/nilam-details/'.$value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
                                                            </span>
                                                            <img src="{{ asset($value->images->first()->image) }}"
                                                                style="border: 1px solid rgb(231, 231, 231); margin-top: 2px; opacity: 1;height:200px;width:100%"
                                                                alt="{{ $value->title }}">
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <span
                                                            class="item-name"style="color: #000;font-weight:bold">{{ $value->title }}</span>
                                                        <br>
                                                        <br>
                                                        <span style="color: #07a4b4" class="mr-2"><i
                                                                class="far fa-clock"></i>
                                                            {{ $value->customer->name }}</span>
                                                        <span style="color: #07a4b4" class="mr-2"><i
                                                                class="far fa-folder"></i>{{ $value->categories->{app()->getLocale() . '_name'} . ' > ' . $value->subcategories->{app()->getLocale() . '_subcategoryName'} }}
                                                            @if (!is_null($value->childcategory_id))
                                                                >
                                                                {{ $value->childcategories->{app()->getLocale() . '_childcategoryName'} ?? '' }}
                                                            @endif
                                                        </span>
                                                        <span style="color: #07a4b4"><i class="fa fa-location-arrow"></i>
                                                            {{ $value->district->{app()->getLocale() . '_dist_name'} }}</span>

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
                                                                @if($review == 0)
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
                                                        <br>

                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{ $advertisments->links() }}

                                </div>
                            </div>
                        </div>

                        <div class="tab-box save-search-bar text-center">
                            <a href="#"> &nbsp; </a>
                        </div>
                    </div>

                    <nav class="mt-3 mb-0 pagination-sm" aria-label="">
                    </nav>

                </div>
            </div>
        </div>
    @endsection
