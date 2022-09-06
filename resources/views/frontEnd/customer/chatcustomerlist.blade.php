@extends('frontEnd.layouts.master')
@section('title', 'Chat with customer')
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
                            <p>Chat with customer</p>
                        </div>
                        <div class="cbmain-content">
                            <div class="ads-table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customerchatlist as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                @php
                                                    $customer = App\Customer::find($value->customer_id);
                                                    $unread = App\Chat::where([
                                                        'seller_id'=>Session::get('customerId'),
                                                        'customer_id'=>$value->customer_id,
                                                        'sent_by'=>$value->customer_id,
                                                        'status'=>0
                                                    ])->count();
                                                @endphp
                                                <td>{{ $customer->name }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('chatwithcustomer', $value->customer_id) }}">Chat({{ $unread }})</a>
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
