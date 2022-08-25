@extends('frontEnd.layouts.master')
@section('title','Forget Password')
@section('content')
<section class="section-padding commonpanel">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="commonpanelform">
          <h5 class="title">Forget Password</h5>
            <form action="{{url('/customer/forget-password')}}" method="POST">
              @csrf
                <div class="form-group">
                  <input type="email" class="form-control {{$errors->has('email')? 'is-invalid' : ''}}" placeholder="Email" name="email" value="{{old('email')}}">
                  @if($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('email')}}</strong>
                    </span>
                  @endif
                 </div>
                <!-- form group -->
                <div class="form-group">
                  <button>Submit</button>
                </div>
                <!-- form group -->
            </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>
  </div>
</section>
@endsection