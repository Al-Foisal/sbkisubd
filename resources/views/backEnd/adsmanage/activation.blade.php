@extends('backEnd.layouts.master')
@section('title','Request Ads Activition')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark">Welcome !! {{auth::user()->name}}</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Active Request Ads</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
            <div class="manage-button">
              <div class="body-title">
                <h5>Active Request Ads</h5>
              </div>
              <div class="quick-button">
                <a href="#" class="btn btn-primary btn-actions btn-create">
               All Ads
                </a>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="box-content">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Ads Request Manage</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                       <form action="{{url('admin/customer/ads/activation/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <input type="hidden" value="{{$activationAds->id}}" name="hidden_id">
                        <div class="form-group">
                          <label>Client Request</label>
                          <input type="input" class="form-control" value="{{date('F d, Y', strtotime($activationAds->created_at))}}" disabled="disabled">
                        </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Ads Duration</label>
                        <input type="date" id="flatpicker" name="adsduration" class="form-control{{ $errors->has('adsduration') ? ' is-invalid' : '' }}" value="{{ old('adsduration') }}" placeholder="insert your duration date">

                        @if ($errors->has('adsduration'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('adsduration') }}</strong>
                        </span>
                        @endif
                      </div>
                      <!-- /.form-group -->
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-size">Active</button>
                        </div>
                        <!--form-group end-->
                        </form>
                      </div>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection