@extends('frontEnd.layouts.master')
@section('title', 'All Ad Report')
@section('content')
    <section class="customer-bg section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 sm-hide">
                    @include('frontEnd.customer.sidebar');
                </div>
                <!-- col end -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="customer-body">
                        <div class="title">
                            <p>My Dashboard</p>
                        </div>
                        @php
                            $customerId = Session::get('customerId');
                            $ifverified = App\Customer::where(['id' => $customerId])
                                ->first();
                            $userActiveAds = App\Advertisment::where('customer_id', Session::get('customerId'))
                                ->where('status', 1)
                                ->count();
                            $userInactiveAds = App\Advertisment::where('customer_id', Session::get('customerId'))
                                ->where('status', 0)
                                ->count();
                        @endphp
                        @if ($ifverified)
                            @if ($ifverified->verify != 1)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <form action="{{ url('customer/auth/0/control-panel/account-verify') }}" method="POST"
                                        novalidate enctype="multipart/form-data" name="editForm"> <strong>Hello!
                                            {{ $ifverified->fullName }}</strong> your account still not verified you can
                                        verify it with your email verify now.
                                        @csrf <button class="ifverifybutton">vefiry</button>
                                    </form>
                                </div>
                            @endif
                        @endif
                        <div class="ads-count">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{ url('customer/0/control-panel/manage-my-ads') }}">
                                        <div class="box-inner box-bg-1">
                                            <i class="fa fa-diamond"></i>
                                            <p>Total Ads</p>
                                            <p>({{ $userActiveAds + $userInactiveAds }})</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('customer/0/control-panel/manage-my-ads') }}">
                                        <div class="box-inner box-bg-2">
                                            <i class="fa fa-smile-o"></i>
                                            <p>Active Ads</p>
                                            <p>({{ $userActiveAds }})</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ url('customer/0/control-panel/manage-my-ads') }}">
                                        <div class="box-inner box-bg-3">
                                            <i class="fa fa-frown-o"></i>
                                            <p>Inactive Ads</p>
                                            <p>({{ $userInactiveAds }})</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Wallet</th>
                                    <th scope="col">Validity</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Wallet Balance</td>
                                    <td>Life Time</td>
                                    <td>{{ number_format($ifverified->wallet, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Package Name</th>
                                    <th scope="col">Validity</th>
                                    <th scope="col">Remain Ads</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($sub)
                                    @foreach ($sub as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $value->package->en_name }} <br>
                                                {{ $value->package->bn_name }}
                                            </td>
                                            <td>{{ $value->validity }}</td>
                                            <td>{{ $value->available }}</td>
                                        </tr>
                                        <!-- item end -->
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-3 col-md-3 col-sm-12 lg-hide sm-show">
                    @include('frontEnd.customer.sidebar')
                </div>
                <!-- col end -->
            </div>
        </div>
    </section>
@endsection
