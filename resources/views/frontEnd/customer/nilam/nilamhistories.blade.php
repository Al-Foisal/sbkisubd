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
                            <p>Nilam history</p>
                        </div>
                        <div class="cbmain-content">
                            <div class="ads-table">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl No.</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Bidding Price</th>
                                            <th scope="col">Bidding Time</th>
                                            <th scope="col">Nilam Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilam as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <img src="{{ asset($value->customer->image) }}" style="height:50px;width:70px;">
                                                </td>
                                                <td>{{ $value->customer->name }}</td>
                                                <td>{{ $value->bid_price }} </td>
                                                <td>{{ $value->created_at->format('d F, Y H:i:s A') }}</td>
                                                <td>
                                                    @if($value->nilam->status == 1 && $value->id == $value->nilam->bidder_id)
                                                    <p class="text-success">Nilam Confirmed</p>
                                                    @endif
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
