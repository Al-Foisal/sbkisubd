@extends('backEnd.layouts.master')
@section('title','Update Upazila')
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
            <li class="breadcrumb-item active"><a href="#">Upazila</a></li>
            <li class="breadcrumb-item active">Update</li>
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
                <h5>Update Upazila</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/thana/manage')}}" class="btn btn-primary btn-actions btn-create">
                Manage
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
                      <h3 class="card-title">Update Upazila</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('editor/thana/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="card-body">
                        <div class="form-group">
                            <label>Upazila Name in English</label>
                            <input type="text" name="en_thana_name" class="form-control{{ $errors->has('en_thana_name') ? ' is-invalid' : '' }}" value="{{$edit_data->en_thana_name}}">
                            @if ($errors->has('en_thana_name'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('en_thana_name') }}</strong>
                            </span>
                            @endif
                         </div>

                         <div class="form-group">
                          <label>Upazila Name in Bangla</label>
                          <input type="text" name="bn_thana_name" class="form-control{{ $errors->has('bn_thana_name') ? ' is-invalid' : '' }}" value="{{$edit_data->bn_thana_name}}">
                          @if ($errors->has('bn_thana_name'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bn_thana_name') }}</strong>
                          </span>
                          @endif
                       </div>
                       @if(is_null($city))
                          <div class="form-check">
                            <div class="custom-label">
                              <label>Make as Proper City</label>
                            </div>
                            <div class="box-body pub-stat display-inline">
                                <input class="form-check-input{{ $errors->has('district_city') ? ' is-invalid' : '' }}" type="checkbox" id="active" name="district_city" value="{{ $edit_data->district_id }}">
                                <label for="active" class="form-check-label">Make city</label>
                                @if ($errors->has('district_city'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('district_city') }}</strong>
                                </span>
                                @endif
                            </div>
                          </div>
                          @elseif($edit_data->district_city == $edit_data->district_id)
                          <div class="form-check">
                            <div class="custom-label">
                              <label>Make as Proper City</label>
                            </div>
                            <div class="box-body pub-stat display-inline">
                                <input class="form-check-input{{ $errors->has('district_city') ? ' is-invalid' : '' }}" type="checkbox" id="active" name="district_city" value="{{ $edit_data->district_id }}" checked >
                                <label for="active" class="form-check-label">Make city</label>
                                @if ($errors->has('district_city'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('district_city') }}</strong>
                                </span>
                                @endif
                            </div>
                          </div>
                          @endif
                        <!-- form group -->
                        <div class="form-group">
                              <label>District</label>
                              <select name="dist_id" class="form-control{{ $errors->has('dist_id') ? ' is-invalid' : '' }}" value="{{ old('dist_id') }}">
                                <option value="">Select</option>
                                @foreach($districts as $value)
                                <option value="{{$value->id}}">{{$value->en_dist_name}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('dist_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dist_id') }}</strong>
                              </span>
                              @endif
                          </div>
                        <!-- form group -->
                        <div class="form-group">
                          <div class="custom-label">
                            <label>Publication Status</label>
                          </div>
                          <div class="box-body pub-stat display-inline">
                              <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" id="active" name="status" value="1">
                              <label for="active">Active</label>
                              @if ($errors->has('status'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="box-body pub-stat display-inline">
                              <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" type="radio" name="status" value="0" id="inactive">
                              <label for="inactive">Inactive</label>
                              @if ($errors->has('status'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('status') }}</strong>
                              </span>
                              @endif
                          </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-size">Update</button>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
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
    <script type="text/javascript">
      document.forms['editForm'].elements['dist_id'].value="{{$edit_data->district_id}}"
      document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
@endsection
