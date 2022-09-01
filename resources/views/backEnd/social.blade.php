@extends('backEnd.layouts.master')
@section('title', 'Create Social Link')
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
                        <li class="breadcrumb-item active"><a href="#">Social</a></li>
                        <li class="breadcrumb-item active">Create/Update</li>
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
                            <h5>Create/Update Village</h5>
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
                                        <h3 class="card-title">Create Social Link</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="{{ route('editor.social_links.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook"
                                                    class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->facebook ?? '' }}">

                                                @if ($errors->has('facebook'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('facebook') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter"
                                                    class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->twitter ?? '' }}">

                                                @if ($errors->has('twitter'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('twitter') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram"
                                                    class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->instagram ?? '' }}">

                                                @if ($errors->has('instagram'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('instagram') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" name="linkedin"
                                                    class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->linkedin ?? '' }}">

                                                @if ($errors->has('linkedin'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Pinterest</label>
                                                <input type="text" name="pinterest"
                                                    class="form-control{{ $errors->has('pinterest') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->pinterest ?? '' }}">

                                                @if ($errors->has('pinterest'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pinterest') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" name="youtube"
                                                    class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}"
                                                    value="{{ $social->youtube ?? '' }}">

                                                @if ($errors->has('youtube'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('youtube') }}</strong>
                                                    </span>
                                                @endif
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
