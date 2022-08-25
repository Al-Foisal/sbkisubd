@extends('frontEnd.layouts.master')
@section('title','Forget Password Reset')
@section('content')
<section class="breadcrumb-area" style="background: url({{asset('public/frontEnd/images/customer-login.jpg')}})">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="breadcrumb-content">
          <h3>Forget Password Reset</h3>
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a class="anchor"><i class="fa fa-angle-right"></i></a></li>
            <li><a class="anchor">Forget Password Reset</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-padding commonpanel">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="commonpanelform">
          <h5 class="title">Forget Password Reset</h5>
				<form action="{{url('customer/forget-password/reset')}}" method="POST">
					@csrf
					  <div class="form-group">
						<label for="verifycode">Verify Code</label>
						<input type="text" name="verifycode" id="verifycode" class="form-control{{$errors->has('verifycode')? 'is-invalid' : ''}}" value="{{ old('verifycode') }}">
						@if ($errors->has('verifycode'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('verifycode') }}</strong>
                            </span>
                        @endif
					</div>

					 <div class="form-group">
						<label for="newpassword">New Password</label>
						<input type="password" name="newpassword" id="newpassword" class="form-control{{$errors->has('newpassword')? 'is-invalid' : ''}}" value="{{ old('newpassword') }}">
						@if ($errors->has('newpassword'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('newpassword') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button>Submit</button>
					</div>
				</form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>
  </div>
</section>
@endsection