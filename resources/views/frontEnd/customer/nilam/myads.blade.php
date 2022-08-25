@extends('frontEnd.layouts.master')
@section('title', 'Manage My Ads')
@section('content')
    <section class="customer-bg section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 sm-hide">
                    @include('frontEnd.customer.sidebar')
                </div>
                <!-- col end -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="customer-body">
                        <div class="title">
                            <p>My Advertisment</p>
                        </div>
                        <div class="cbmain-content">
                            <div class="ads-table">
                                <div class="ads-new">
                                    <a href="{{ url('customer/0/nilam/control-panel/post-new-ads') }}">New Bidding Ads</a>
                                </div>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl No.</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Divistion</th>
                                            <th scope="col">Zila</th>
                                            <th scope="col">Package Name</th>
                                            <th scope="col">Base Price</th>
                                            <th scope="col">Current Bid</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($manageads as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->en_name }} <i class="fa fa-long-arrow-right"></i>
                                                    {{ $value->en_subcategoryName }}</td>
                                                <td>{{ $value->division_name }}</td>
                                                <td>{{ $value->en_dist_name }}</td>
                                                <td>
                                                    @foreach ($packagesname as $key => $pp)
                                                        @if ($value->package_id == $pp->id)
                                                            {{ $pp->en_name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $value->price }}</td>
                                                <td>{{ $value->bid_price }}</td>
                                                <td>
                                                    <ul class="action_btn">
                                                        <li class="delete-btn"><a
                                                                href="{{ url('customer/0/nilam/control-panel/' . $value->id . '/post-view-ads') }}"><i
                                                                    class="fa fa-eye"></i> Nilam Details</a></li>
                                                        <li class="edit-btn"><a
                                                                href="{{ url('customer/0/nilam/control-panel/' . $value->id . '/post-edit-ads') }}"><i
                                                                    class="fa fa-edit"></i> Edit</a></li>
                                                        <li class="delete-btn"><a
                                                                href="{{ url('customer/' . $value->slug . '/0/nilam/control-panel/' . $value->id . '/post-delete-ads') }}"
                                                                onclick="confirm('Are you sure delete?')"><i
                                                                    class="fa fa-trash"></i> Delete</a>
                                                        @if($value->status == 0)
                                                        <li class="edit-btn"><a
                                                                href="{{ url('customer/0/nilam/control-panel/' . $value->id . '/post-confirm-ads') }}"><i
                                                                    class="fa fa-check"></i> Confirm Nilam</a></li>
                                                        </li>
                                                        @endif

                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- item end -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-3 col-md-3 col-sm-12 lg-hide sm-show">
                    @include('frontEnd.customer.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
