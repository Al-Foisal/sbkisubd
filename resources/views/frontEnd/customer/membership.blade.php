@extends('frontEnd.layouts.master')
@section('title','Request For Membership')
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
                        <p>Request For Membership</p>
                    </div>
                    <div class="cbmain-content">
                      @php
                       $customerId=Session::get('customerId');
                        $customerInfo=App\Customer::where(['id'=>$customerId])->first();
                       @endphp
                       @if($customerInfo->membership == 0)
                        <form action="{{url('/customer/0/control-panel/membership-request')}}" method="POST" novalidate enctype="multipart/form-data" name="editForm">
                        	@csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <div class="nomembership text-left">
                                    <p> আপনার কি কোন দোকান বা প্রতিষ্ঠান আছে আপনি কি হাতবদল ডট কমে আনলিমিটেড বিজ্ঞাপন পোস্ট করে আপনার পণ্য বিক্রি করতে চান তবে আপনার জন্য রয়েছে আমাদের মেম্বারশিপ সেবা। <p>
                                      <p>উল্লেখ্য যে আমাদের সম্মানিত মেম্বারশিপ হোল্ডারদের বিজ্ঞাপন পোস্ট করার সাথে সাথে অটোমেটিক পোস্ট হয়ে যায় তবে মেম্বারশিপ না থাকলে 30 মিনিট সময় লেগে থাকে  আপ্রুব হতে।</p>
                                  </div>
                                </div>
                                <!-- col end -->
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group">
                                    <label for="shopname">Shop Name</label>
                                    <input type="text" class="form-control  {{$errors->has('shopname')? 'is-invalid' : ''}}"  name="shopname"   value="{{old('shopname')}}" >
                                    @if($errors->has('shopname'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('shopname')}}</strong>
                                      </span>
                                    @endif
                                   </div>
                                  </div>
                                  <!-- form group end -->
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group">
                                    <label for="shopholdername">Shop Holder Name</label>
                                    <input type="text" class="form-control  {{$errors->has('shopholdername')? 'is-invalid' : ''}}" placeholder="Your Phone" name="shopholdername">
                                    @if($errors->has('shopholdername'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('shopholdername')}}</strong>
                                      </span>
                                    @endif
                                  </div>
                                  </div>
                                  <!-- form group end -->
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group">
                                    <label for="shopholderphone">Shop Holder Phone</label>
                                    <input type="text" class="form-control  {{$errors->has('shopholderphone')? 'is-invalid' : ''}}" placeholder="Your Phone" name="shopholderphone">
                                    @if($errors->has('shopholderphone'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('shopholderphone')}}</strong>
                                      </span>
                                    @endif
                                   </div>
                                  </div>
                                  <!-- form group end -->
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                   <div class="form-group">
                                    <label for="shopaddress">Shop Address</label>
                                    <input type="text" class="form-control  {{$errors->has('shopaddress')? 'is-invalid' : ''}}"  name="shopaddress"   value="{{old('shopaddress')}}" >
                                    @if($errors->has('shopaddress'))
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('shopaddress')}}</strong>
                                      </span>
                                    @endif
                                  </div>
                                  </div>
                                  <!-- form group end -->
                                  <div class="form-group">
                                    <button class="btn btn-primary btn-md">Request Membership</button>
                                  </div>
                                </div>
                            </div>
                        </form>
                        @elseif($customerInfo->membership == 3)
                        <div class="alert alert-info alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>আপনার মেম্বারশিপ বাতিল অনুরোধটি  প্রক্রিয়াধীন আছে।  অনুগ্রহপর্বক অ্যাডমিন এপ্রোভালের জন্য অপেক্ষা করুন </strong>
                        </div>
                        @elseif($customerInfo->membership == 1)
                        <div class="cbmain-content">
                        <form action="{{url('/customer/0/control-panel/membership-cancel')}}" method="POST" novalidate enctype="multipart/form-data" name="editForm">
                              @csrf
                              <input type="hidden" value="{{$customerId = Session::get('customerId')}}" name="customer">
                                  
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div class="nomembership text-left">
                                        <p>অভিনন্দন ({{$customerInfo->name}})
আপনি আমাদের মেম্বারশিপ দের তালিকা তে তালিকাভুক্ত হয়েছেন 
আনলিমিটেড বিজ্ঞাপন পোস্ট করে বেচাকেনা করুন  হাতবদল ডট কম এর মাধ্যমে। </p>
                                        <p>আপনার মেম্বারশিপ বাতিল করতে এখানে ক্লিক করুন।</p>

                                      </div>
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                          <button class="btn btn-primary btn-md">Cancel Membership</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                        @elseif($customerInfo->membership == 2)
                         <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>আপনার মেম্বারশিপ বাতিল অনুরোধটি  প্রক্রিয়াধীন আছে।  অনুগ্রহপর্বক অ্যাডমিন এপ্রোভালের জন্য অপেক্ষা করুন </strong>
                        </div>
                        @endif
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

@endsection