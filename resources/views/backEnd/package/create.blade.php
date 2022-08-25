@extends('backEnd.layouts.master')
@section('title', 'Create Package')
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
                        <li class="breadcrumb-item active"><a href="#">Package</a></li>
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
                            <h5>Create Package</h5>
                        </div>
                        <div class="quick-button">
                            <a href="{{ url('editor/package/manage') }}" class="btn btn-primary btn-actions btn-create">
                                Manage Package
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
                                        <h3 class="card-title">Create Package</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="{{ url('editor/package/store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @foreach (config('app.languages') as $locale => $locale_name)
                                                <div class="form-group">
                                                    <label for="{{ $locale }}_name">Name in
                                                        {{ $locale_name }}</label>
                                                    <input type="text"
                                                        class="form-control{{ $errors->has($locale . '_name') ? ' is-invalid' : '' }}"
                                                        value="{{ old($locale . '_name') }}" name="{{ $locale }}_name"
                                                        id="{{ $locale }}_name"
                                                        placeholder="Name in {{ $locale_name }}">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <!-- form group -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="price">Package price</label>
                                                        <input type="text"
                                                            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                            value="{{ old('price') }}" name="price" id="price"
                                                            placeholder="Package price">
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="ads">Package ads</label>
                                                        <input type="text"
                                                            class="form-control{{ $errors->has('ads') ? ' is-invalid' : '' }}"
                                                            value="{{ old('ads') }}" name="ads" id="ads"
                                                            placeholder="Package ads">
                                                        @if ($errors->has('ads'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('ads') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dead_line">Package dead line</label>
                                                        <input type="number"
                                                            class="form-control{{ $errors->has('dead_line') ? ' is-invalid' : '' }}"
                                                            value="{{ old('dead_line') }}" name="dead_line" id="dead_line"
                                                            placeholder="Package dead line">
                                                        @if ($errors->has('dead_line'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('dead_line') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Package Type</label>
                                                        <select name="type"
                                                            class="form-control select2 {{ $errors->has('type') ? ' is-invalid' : '' }}"
                                                            value="{{ old('type') }}">
                                                            <option value="">Select</option>
                                                            <option value="1">Premium</option>
                                                            <option value="2">Bidding</option>
                                                            <option value="3">Free</option>
                                                            <option value="4">Featured Ad</option>
                                                        </select>

                                                        @if ($errors->has('type'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('type') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Package details<span class="text-danger">*</span>
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="input-group hdtuto control-group lst increment">
                                                            <input type="text" name="details[]"
                                                                class="myfrm form-control" placeholder="Title in english"
                                                                required>
                                                            <input type="text" name="bn_title[]"
                                                                class="myfrm form-control" placeholder="Title in bangla"
                                                                required>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="button"><i
                                                                        class="far fa-plus-square"></i> Add</button>
                                                            </div>
                                                        </div>

                                                        <div class="clone hide">
                                                            <div class="hdtuto control-group lst input-group"
                                                                style="margin-top:10px">
                                                                <input type="text" name="details[]"
                                                                    class="myfrm form-control"
                                                                    placeholder="Title in english" required>
                                                                <input type="text" name="bn_title[]"
                                                                    class="myfrm form-control"
                                                                    placeholder="Title in bangla" required>
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-danger" type="button"> <i
                                                                            class="far fa-minus-square"></i> Remove
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- form group -->
                                            <div class="form-group">
                                                <div class="custom-label">
                                                    <label>Publication Status</label>
                                                </div>
                                                <div class="box-body pub-stat display-inline">
                                                    <input
                                                        class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                                        type="radio" id="active" name="status" value="1">
                                                    <label for="active">Active</label>
                                                    @if ($errors->has('status'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="box-body pub-stat display-inline">
                                                    <input
                                                        class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                                        type="radio" name="status" value="0" id="inactive">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- for multiple file insertion --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
@endsection
