@extends('frontEnd.layouts.master1')

@section('title','Sign In')
@section('body')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<section class="section-padding commonpanel  mt-5 mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        @if(Session::has('message'))
          <div class="alert alert-danger">
            {{ session('message') }}
          </div>
        @endif
        <div class="commonpanelform">
          <h5 class="title"> {{__('Log In')}}</h5>
            <form action="{{url('/customer/login')}}" method="POST">
              @csrf
                <div class="form-group">
                  <input type="text" class="form-control {{$errors->has('phoneOremail')? 'is-invalid' : ''}}" placeholder="Email" name="phoneOremail" value="{{old('phoneOremail')}}">
                  @if($errors->has('phoneOremail'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('phoneOremail')}}</strong>
                    </span>
                  @endif
                 </div>
                <!-- form group -->
                <div class="form-group">
                  <div class="d-flex justify-content-start">
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Your Password" name="password"  value="{{old('password')}}" id="password">
                  <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -30px;
                  cursor: pointer;
                  bottom: -36px;
                  margin-bottom: 2px;
                  padding: 0.5rem 0.75rem;"></i>
                  </div>
                  {{-- <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> --}}
                   @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <!-- form group -->
                <div class="form-group">
                  <div class="stayandforgate d-flex justify-content-between">
                     <div class="ls-checkbox auth">
                      {{-- <label class="cat-chechbox">
                        <input type="checkbox" value="1">
                        <span class="checkmark">{{__('remember me')}}</span>
                      </label> --}}
                     </div>
                     <div class="forgatepassowre">
                        <a href="{{url('customer/forget/password')}}">{{__('forgate passowrd')}}</a>
                     </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block bg-success">{{__('Login')}}</button>
                </div>
                <!-- form group -->
                <div class="form-group newaccount">
                    <p>{{__('If you don’t have account?')}}<a href="{{url('customer/register')}}"> {{__('Create An Account')}}</a></p>
                </div>
            </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>
  </div>
</section>
<script>
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function () {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      
      // toggle the icon
      this.classList.toggle("bi-eye");
  });

  // prevent form submit
  const form = document.querySelector("form");
  form.addEventListener('submit', function (e) {
      e.preventDefault();
  });
</script>
@endsection