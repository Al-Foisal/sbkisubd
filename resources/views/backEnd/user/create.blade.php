@extends('backEnd.layouts.master')
@section('title','Create User')
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
            <li class="breadcrumb-item active"><a href="#">User</a></li>
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
                <h5>Create User</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('superadmin/user/manage')}}" class="btn btn-primary btn-actions btn-create">
                <i class="fas fa-eye"></i> Manage 
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
                      <h3 class="card-title">Create User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('superadmin/user/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Name</label>
                           <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" id="name" placeholder="Ex. Md. Zadu Mia">
                           @if ($errors->has('name'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->
                        <div class="form-group">
                          <label for="username">User Name</label>
                           <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('username') }}" name="username" id="username" placeholder="Ex. Rasel001,Imran002">
                           @if ($errors->has('username'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->
                        <div class="form-group">
                          <label for="email">Email</label>
                           <input type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" id="email" placeholder="Ex. your@gmail.com" required="required">
                           @if ($errors->has('email'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->
                        <div class="form-group">
                          <label for="phone">Phone</label>
                           <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Ex. your@gmail.com" required="required">
                           @if ($errors->has('phone'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->
                        <div class="form-group">
                          <label for="designation">Designation</label>
                           <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('designation') }}" name="designation" id="designation" placeholder="Ex. Sr.Developer" required="required">
                           @if ($errors->has('designation'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('designation') }}</strong>
                              </span>
                            @endif
                        </div>
                        <!-- form group -->

                        <div class="form-group">
                              <label>Role</label>
                              <select name="role_id" class="form-control select2 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" value="{{ old('role_id') }}">
                                <option value="">===select role===</option>
                                @foreach($roles as $key=>$value)
                                <option value="{{$value->id}}">{{$value->user_role}}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('role_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role_id') }}</strong>
                              </span>
                              @endif
                         </div>
                        <!-- form group -->
                        <div class="form-group">
                          <label for="image">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*" name="image" id="image">
                               @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                          </div>
                        </div>
                        <!-- form-group end -->
                        <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">

                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                          </div>
                          <!-- form-group end -->
                          <div class="form-group">
                              <label for="password">Confirm Password</label>
                              <input type="password" class="form-control" name="confirm_password">
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
                          <button type="submit" class="btn btn-primary btn-size">Save</button>
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
@endsection