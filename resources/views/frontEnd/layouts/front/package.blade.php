@extends('frontEnd.layouts.master1')
@section('body')
    <style>
        .skin .bg-primary {
            background-color: #07a4b4 !important;
        }

        .skin .btn-primary {
            color: #FFFFFF;
            background-color: #07a4b4;
            border-color: #07a4b4 !important;
        }

        .skin .btn-outline-primary {
            color: #07a4b4;
            background-color: #FFFFFF;
            border-color: #07a4b4;
        }

        .skin .border-color-primary {
            border-color: #07a4b4 !important;
        }
    </style>
    <div class="main-container inner-page">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ session::get('message') }}
            </div>
        @endif
        <div class="container" id="pricing">

            <h1 class="text-center title-1 mt-3" style="text-transform: none;">
                <strong>{{ __('Packages') }}</strong>
            </h1>
            <hr class="center-block small mt-0">
            <p class="text-center">
                {{ __('The premium package help sellers to promote their products or services by giving more visibility to their listings to attract more buyers and sell faster.') }}
            </p>

            <div class="row mt-5 mb-md-5 justify-content-center">
                @foreach ($price as $value)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow border-color-primary">
                            <div class="card-header text-center bg-primary border-color-primary text-white">
                                <h4 class="my-0 fw-normal pb-0 h4">{{ $value->{app()->getLocale() . '_name'} }}</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">
                                    <span class="fw-bold">
                                        {{ $value->price }}
                                        ৳
                                    </span>
                                    <small class="text-muted">/ {{ __('listing') }}</small>
                                </h1>
                                <ul class="list list-border text-center mt-3 mb-4">
                                    @foreach ($value->packageDetails as $detail)
                                        <li>{{ $detail->{app()->getLocale() . '_title'} }}</li>
                                    @endforeach
                                </ul>
                                @if (session('customerId'))
                                    <form action="{{ url('/customer/buy-from-wallet') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="customer_id" value="{{ session('customerId') }}">
                                        <input type="hidden" name="package_id" value="{{ $value->id }}">
                                        <button type="submit"
                                            class="btn btn-lg btn-block btn-primary">{{ __('Buy From Wallet') }} -
                                            ({{ $wallet }})</button>
                                    </form>
                                @else
                                    <a href="{{ url('/customer/login') }}"
                                        class="btn btn-lg btn-block btn-primary">{{ __('Login to Buy') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
