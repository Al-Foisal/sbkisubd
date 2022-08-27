@extends('backEnd.layouts.master')
@section('title', 'Update Division Subcity')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Welcome !! {{ auth::user()->name }}</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">Division Subcity</a></li>
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
                            <h5>Update Division Subcity</h5>
                        </div>
                        <div class="quick-button">
                            <a href="{{ route('editor.divisionsubcity.index') }}"
                                class="btn btn-primary btn-actions btn-create">
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
                                        <h3 class="card-title">Update Division Subcity</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="{{ route('editor.divisionsubcity.update',$city->id) }}" method="POST"
                                        enctype="multipart/form-data" name="editForm">
                                        @csrf
                                      @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Subcity Name in English</label>
                                                <input type="text" name="en_name"
                                                    class="form-control{{ $errors->has('en_name') ? ' is-invalid' : '' }}"
                                                    value="{{ $city->en_name }}">
                                                @if ($errors->has('en_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('en_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Subcity Name in Bangla</label>
                                                <input type="text" name="bn_name"
                                                    class="form-control select2 {{ $errors->has('bn_name') ? ' is-invalid' : '' }}"
                                                    value="{{ $city->bn_name }}">
                                                @if ($errors->has('bn_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('bn_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!-- form group -->
                                            <div class="form-group">
                                                <label>Division City</label>
                                                <select name="division_id"
                                                    class="form-control{{ $errors->has('division_id') ? ' is-invalid' : '' }}"
                                                    value="{{ old('division_id') }}">
                                                    <option value="">Select</option>
                                                    @foreach ($division as $value)
                                                        <option value="{{ $value->id }}">{{ $value->en_name }}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('division_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('division_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

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
        document.forms['editForm'].elements['division_id'].value = "{{ $city->division_id }}"
        document.forms['editForm'].elements['status'].value = "{{ $city->status }}"
    </script>
@endsection
