@extends('backEnd.layouts.master')
@section('title','Update page')
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
            <li class="breadcrumb-item active"><a href="#">page</a></li>
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
                <h5>Update page</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/pagecategory/manage')}}" class="btn btn-primary btn-actions btn-create">
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
                      <h3 class="card-title">Update page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('editor/pagecategory/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="card-body">
                        @foreach(config('app.languages') as $locale=>$locale_name)
                        <div class="form-group">
                            <label>Page Name in {{ $locale_name }}</label>
                            <input type="text" name="{{ $locale }}_pagename" class="form-control{{ $errors->has($locale.'pagename') ? ' is-invalid' : '' }}" value="{{$edit_data->{$locale.'_pagename'} }}">
                            @if ($errors->has($locale.'_pagename'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first($locale.'_pagename') }}</strong>
                            </span>
                            @endif
                         </div>
                        <!-- form group -->
                        <div class="form-group">
                              <label>Page Details in {{ $locale_name }}</label>
                              <textarea name="{{ $locale }}_text" class="summernote" cols="30" rows="10">{!! $edit_data->{$locale.'_text'} !!}</textarea>
                         </div>
                         @endforeach
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
