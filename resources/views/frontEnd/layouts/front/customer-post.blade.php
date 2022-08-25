@extends('frontEnd.layouts.master1')
@section('body')
    @php
    use App\Adsimage;
    @endphp
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
                        {{ $customer->name }}
                    </li>
                </ol>
            </nav>
        </div>
        <style>
            .hero-image {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('ll');
                height: 50%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
            }

            .hero-text {
                text-align: center;
                position: absolute;
                top: 50%;
                left: 10%;
                transform: translate(-50%, -50%);
                color: white;
            }
        </style>
        <div class="hero-image mb-5">
            <img src="{{ asset($customer->banner) }}" alt="">
            <div class="hero-text">
                <img src="{{ asset($customer->image) }}" style="height:100px;width:100px">
            </div>
        </div>


        <div class="container">
            <div class="row">
                @php
                    $package = DB::table('subscription_packages')
                        ->where('customer_id', $customer->id)
                        ->where('validity', '>=', today())
                        ->first();
                @endphp
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar pb-4">
                    <aside>
                        <div class="card card-user-info sidebar-card">
                            <div class="block-cell user">
                                <div class="cell-content">
                                    <span class="name">

                                        {{ $customer->name }}
                                    </span>
                                    @if ($package)
                                        <div class="badge bg-secondary">
                                            <i class="fas fa-star mr-1 text-warning"></i>Member
                                        </div>
                                    @endif
                                    <h5 class="title">
                                        <b style="color: black">
                                            {{ 'Member sience from ' . $customer->created_at->format('F Y') }}
                                        </b>
                                    </h5>

                                    @if ($customer->website)
                                        <a href="{{ $customer->website }}">
                                            <p
                                                style="color: #57a4bb;
                                            text-decoration: underline;">
                                                {{ $customer->website }}</p>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body text-start">
                                    <div class="d-flex justify-content-start">
                                        <div data-toggle="modal" data-target="#exampleModal">
                                            @php
                                                foreach ($open as $key => $item) {
                                                    if ($item->day_name == date('l')) {
                                                        echo '<p>Shop is open from ' . $item->open . ' to ' . $item->close . '</p><br>Click to show all.';
                                                    }
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Shop open and closing time
                                                </h5>
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
                                                          <th scope="col">Day</th>
                                                          <th scope="col">Opening</th>
                                                          <th scope="col">Closing</th>
                                                        </tr>
                                                      </thead>
                                                    <tbody>
                                                        @foreach ($open as $key => $it)
                                                            <tr>
                                                                <th scope="row">{{ ++$key }}</th>
                                                                <td>{{ $it->day_name }}</td>
                                                                @if(!is_null($it->open) && !is_null($it->close))
                                                                <td>{{ $it->open }}</td>
                                                                <td>{{ $it->close }}</td>
                                                                @else
                                                                <td></td>
                                                                <td><h5 class="text-danger">Close</h5></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

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
                                            <i class="fas fa-envelope"
                                                style="font-size: xx-large;
                                            color: #1e934b;"></i>
                                        </div>
                                        <div>
                                            <a href="mailto:{{ $customer->email }}">
                                                <h3>Send Email</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="card-content">
                                <div class="card-body text-start">
                                    <div class="d-flex justify-content-start">
                                        <div class="mr-3">
                                            <i class="fas fa-location-arrow"
                                                style="font-size: xx-large;
                                            color: #1e934b;"></i>
                                        </div>
                                        <div>
                                            <small>{{ $customer->address }}</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="card-content">
                                <div class="card-body text-start">
                                    <div>
                                        <h5>About Shop</h5>
                                        <small>{{ $customer->about }}</small>
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



                <div class="col-md-9 page-content col-thin-left mb-4">
                    <div class="category-list make-grid">


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contentAll" role="tabpanel" aria-labelledby="tabAll">
                                <div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">

                                    <div class="row">
                                        @foreach ($advertisments as $value)
                                            <div class="col-md-3 mb-5">
                                                <div class="item">
                                                    <a href="{{ url(app()->getLocale() . '/details/' . $value->id) }}">
                                                        <span class="item-carousel-thumb">
                                                            <span class="photo-count">
                                                                <i class="fa fa-camera"></i> {{ $value->images->count() }}
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
