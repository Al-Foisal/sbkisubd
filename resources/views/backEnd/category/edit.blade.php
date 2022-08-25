@extends('backEnd.layouts.master')
@section('title','Update category')
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
            <li class="breadcrumb-item active"><a href="#">Category</a></li>
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
                <h5>Update Category</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/category/manage')}}" class="btn btn-primary btn-actions btn-create">
                Manage Category
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
                      <h3 class="card-title">Update Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('editor/category/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="en_name">Name in English</label>
                           <input type="text" class="form-control{{ $errors->has('en_name') ? ' is-invalid' : '' }}" value="{{ $edit_data->en_name}}" name="en_name" id="en_name" placeholder="Ex. Mobile, Electronic">
                           @if ($errors->has('en_name'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('en_name') }}</strong>
                              </span>
                            @endif
                        </div>

                        <div class="form-group">
                          <label for="bn_name">Name</label>
                           <input type="text" class="form-control{{ $errors->has('bn_name') ? ' is-invalid' : '' }}" value="{{ $edit_data->bn_name}}" name="bn_name" id="bn_name" placeholder="Ex. Mobile, Electronic">
                           @if ($errors->has('bn_name'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('bn_name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->
                        <div class="form-group">
                        <label for="image">Image</label>
                            <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/png*" name="image" id="image">
                          <img src="{{asset($edit_data->image)}}" class="backend_image" alt="">
                             @if ($errors->has('image'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('image') }}</strong>
                              </span>
                              @endif
                      </div>
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
      document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
@endsection
