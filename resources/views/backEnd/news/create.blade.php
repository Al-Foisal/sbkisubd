@extends('backEnd.layouts.master')
@section('title','Create News')
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
            <li class="breadcrumb-item active"><a href="#">Create</a></li>
            <li class="breadcrumb-item active">News</li>
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
                <h5>Create/Update News</h5>
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
                      <h3 class="card-title">Create/Update News</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('admin/news/store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">


                         <div class="form-group">
                              <label>Text</label>
                              <br>
                              <textarea type="text" name="text" class=" {{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="Ex. how to quick sell, about ect." rows="10" style="width:100%">{{ $news->text }}</textarea>

                              @if ($errors->has('text'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('text') }}</strong>
                              </span>
                              @endif
                          </div>
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