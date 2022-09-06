@extends('frontEnd.layouts.master')
@section('title', 'Chat with Customer')
@section('content')
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
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
                            <p>Chatting with customer {{ $customer->name }}</p>
                        </div>
                        <div class="cbmain-content">
                            <div class="container pb-5" style="height: 45vh;overflow-x:hidden;" id="messageBottom">
                                @foreach ($chat as $item)
                                    @if ($item->sent_by == $customer->id)
                                        <div class="row">
                                            <div class="d-flex justify-content-start text-left">
                                                <div class="col-1 mr-3">
                                                    <img src="{{ asset($customer->image) }}" style="height:30px;width:30px;border-radius:100px;">
                                                </div>
                                                <div class="col-11">
                                                    <p>{{ $item->message }}</p>
                                                    <small style="color: gray;">{{ $item->created_at->diffForHumans() }}</small>
    
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="d-flex justify-content-end">
                                                <div class="col-11 mr-3 text-right">
                                                    <p>{{ $item->message }}</p>
    
                                                    <small style="color: gray;">{{ $item->created_at->diffForHumans() }}</small>
    
                                                </div>
                                                <div class="col-1">
                                                    <img src="{{ asset($seller->image) }}" style="height:30px;width:30px;border-radius:100px;">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <form action="{{ route('storechat') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $customer->id }}" name="customer_id">
                                <input type="hidden" value="{{ $seller->id }}" name="seller_id">
                                <input type="hidden" value="{{ $seller->id }}" name="sent_by">
                                <div class="row">

                                    <div class="d-flex justify-content-start">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <textarea name="message" required class="form-control" rows="2"></textarea>
                                            </div>
                                            <!-- form group -->
                                        </div>
                                        <!-- col end -->

                                        <!-- col end -->
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button class="cbutton">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    <script>
        $(document).ready(function(){
            $('#messageBottom').scrollTop($('#messageBottom')[0].scrollHeight);
        });
    </script>
@endsection
