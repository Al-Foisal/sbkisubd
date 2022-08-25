@extends('backEnd.layouts.master')
@section('title','Update Create Page')
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
            <li class="breadcrumb-item active"><a href="#">Update</a></li>
            <li class="breadcrumb-item active">Create Page</li>
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
                <h5>Update Create Page </h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/createpage/manage')}}" class="btn btn-primary btn-actions btn-create">
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
                      <h3 class="card-title">Update Create Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{url('editor/createpage/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
                      @csrf
                      <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                      <div class="card-body">
                         <div class="form-group">
                              <label>Page Category</label>
                              <select name="page_id" class="form-control select2 {{ $errors->has('page_id') ? ' is-invalid' : '' }}" value="{{ old('page_id') }}">
                                <option value="">===Select Page Category===</option>
                                @foreach($pagecategory as $key=>$value)
                                <option value="{{$value->id}}">{{$value->pagename}}</option>
                               @endforeach
                              </select>
                              @if ($errors->has('page_id'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('page_id') }}</strong>
                              </span>
                              @endif
                         </div>
                        <!-- form group -->
                         <div class="form-group">
                              <label>Page Title</label>
                              <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$edit_data->title}}" placeholder="Ex. how to quick sell, about ect.">

                              @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                              </span>
                              @endif
                          </div>
                        <!-- form group --> 

                         <div class="form-group">
                              <label>Content</label>
                              <textarea type="text" name="text" class="summernote {{ $errors->has('text') ? ' is-invalid' : '' }}" >{{$edit_data->text}}</textarea>

                              @if ($errors->has('text'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('text') }}</strong>
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
      document.forms['editForm'].elements['page_id'].value="{{$edit_data->page_id}}"
      document.forms['editForm'].elements['status'].value="{{$edit_data->status}}"
    </script>
@endsection
