@extends('frontEnd.layouts.master')
@section('title','Account Verification')
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
                        <p>Account Verification</p>
                    </div>
                    <div class="cbmain-content">
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p>অনুগ্রহপূর্বক আপনার মেইলটি চেক করুন যদি ইনবক্সে খুঁজে না পান তবে স্প্যাম ফোল্ডারে চেক করুন আশা করি পেয়ে যাবেন।  সেখান থেকে কোডটি এখানে ইনপুট করুন ।</p>
                          </div>
                        <form action="{{url('customer/auth/customer/email/verification/check')}}" method="POST" novalidate enctype="multipart/form-data" name="editForm">
                        	@csrf
                            <div class="row" style="margin-top:15px;">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="token">Verify Token <span>*</span></label>
                                      <input type="text" class="form-control{{$errors->has('token')? 'is-invalid' : ''}}" id="token" name="token"  required>

                                      @if ($errors->has('token'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('token') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <button class="btn btn-success">Verify Now</button>
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
@endsection