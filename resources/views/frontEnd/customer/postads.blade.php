@extends('frontEnd.layouts.master')
@section('title', 'Post New Ads')
@section('content')
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <section class="customer-bg section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 sm-hide">
                    @include('frontEnd.customer.sidebar')
                </div>
                <!-- col end -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="customer-body">
                        <div class="title">
                            <p>Post New Ads</p>
                        </div>
                        <div class="cbmain-content">
                            <form action="{{ url('/customer/0/control-panel/post-new-ads') }}" method="POST" novalidate
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $customerId = Session::get('customerId') }}"
                                    name="customer">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="category">Category <span>*</span></label>
                                            <select name="category" id="category"
                                                class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"
                                                value="{{ old('category') }}" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $c_key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('category') == ++$c_key ? 'selected' : '' }}>
                                                        {{ $value->en_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="subcategory">Subcategory <span>*</span></label>
                                            <select name="subcategory"
                                                class="form-control{{ $errors->has('subcategory') ? ' is-invalid' : '' }}"
                                                id="subcategory" required>
                                                <option value="">Select Subcategory</option>
                                            </select>
                                            @if ($errors->has('subcategory'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('subcategory') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="childcategory">Childcategory </label>
                                            <select name="childcategory"
                                                class="form-control{{ $errors->has('childcategory') ? ' is-invalid' : '' }}"
                                                id="childcategory">
                                            </select>
                                            @if ($errors->has('childcategory'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('childcategory') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="division_id">Divistion/Zila <span>*</span></label>
                                            <select
                                                class="form-control{{ $errors->has('division_id') ? ' is-invalid' : '' }}"
                                                name="division_id" id="division" required="required">
                                                <option value="">Division</option>
                                                @foreach ($divisions as $d_key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('division_id') == ++$d_key ? 'selected' : '' }}>
                                                        {{ $value->en_name }}
                                                    </option>
                                                @endforeach

                                                @if ($errors->has('division_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('division_id') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="dist_id">District <span>*</span></label>
                                            <div class="form-group">
                                                <select class="form-control" name="dist_id" id="district"
                                                    required="required">
                                                    <option value="">District</option>
                                                </select>
                                                @if ($errors->has('dist_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('dist_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="thana_id">Upazila <span>*</span></label>
                                            <div class="form-group">
                                                <select class="form-control" name="thana_id" id="thana"
                                                    required="required">
                                                    <option value="">Thana</option>
                                                </select>
                                                @if ($errors->has('thana_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('thana_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="union_id">Union/City Corporation <span>*</span></label>
                                            <div class="form-group">
                                                <select class="form-control" name="union_id" id="union"
                                                    required="required">
                                                    <option value="">Union</option>
                                                </select>
                                                @if ($errors->has('union_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('union_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="village_id">Village </label>
                                            <div class="form-group">
                                                <select class="form-control" name="village_id" id="village">
                                                </select>
                                                @if ($errors->has('village_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('village_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <hr>

                                    <h5>Division subcity area (optional)</h5>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="division_subcity_id">Divistion Subcity(optional)</label>
                                            <select
                                                class="form-control{{ $errors->has('division_subcity_id') ? ' is-invalid' : '' }}"
                                                name="division_subcity_id" id="division_subcity">
                                                <option value="">Division Subcity</option>

                                                @if ($errors->has('division_subcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('division_subcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="division_childcity_id">Division Childcity(optional)</label>
                                            <div class="form-group">
                                                <select class="form-control" name="division_childcity_id" id="division_childcity">
                                                    <option value="">Division Childcity</option>
                                                </select>
                                                @if ($errors->has('division_childcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('division_childcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>

                                    <hr>


                                    <h5>District subcity area (optional)</h5>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="district_subcity_id">District Subcity(optional)</label>
                                            <select
                                                class="form-control{{ $errors->has('district_subcity_id') ? ' is-invalid' : '' }}"
                                                name="district_subcity_id" id="district_subcity">
                                                <option value="">District Subcity</option>

                                                @if ($errors->has('district_subcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('district_subcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="district_childcity_id">District Childcity(optional)</label>
                                            <div class="form-group">
                                                <select class="form-control" name="district_childcity_id" id="district_childcity">
                                                    <option value="">District Childcity</option>
                                                </select>
                                                @if ($errors->has('district_childcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('district_childcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>

                                    <hr>
                                    <h5>Upazila subcity area (optional)</h5>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="thana_subcity_id">Upazila Subcity(optional)</label>
                                            <select
                                                class="form-control{{ $errors->has('thana_subcity_id') ? ' is-invalid' : '' }}"
                                                name="thana_subcity_id" id="thana_subcity">
                                                <option value="">Upazila Subcity</option>

                                                @if ($errors->has('thana_subcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('thana_subcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="thana_childcity_id">Upazila Childcity(optional)</label>
                                            <div class="form-group">
                                                <select class="form-control" name="thana_childcity_id" id="thana_childcity">
                                                    <option value="">Upazila Childcity</option>
                                                </select>
                                                @if ($errors->has('thana_childcity_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('thana_childcity_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!--form-group end-->
                                        </div>
                                        <!-- form group -->
                                    </div>

                                    <hr>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="version">Condition <span>*</span></label>
                                            <select class="form-control{{ $errors->has('version') ? ' is-invalid' : '' }}"
                                                name="version" value="{{ old('version') }}" id="version"
                                                required="required">
                                                <option value="">Select Condition</option>

                                                <option value="1" {{ old('version') == 1 ? 'selected' : '' }}>Used
                                                <option value="2" {{ old('version') == 2 ? 'selected' : '' }}>New
                                                </option>

                                                @if ($errors->has('version'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('version') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--      <label for="type" >Authenticity <span>(optional)</span></label>-->
                                    <!--      <select class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" id="type">-->
                                    <!--          <option value="">Select Type</option>-->
                                    <!--                <option value="1">Original-->
                                    <!--                <option value="2">Copy-->
                                    <!--                </option>-->
                                    <!--      </select>-->
                                    <!--    </div>-->
                                    <!-- form group -->
                                    <!--</div>-->
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="brand">Brand <span>*</span></label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('brand') ? 'is-invalid' : '' }}"
                                                id="brand" placeholder="Ads brand" name="brand"
                                                value="{{ old('brand') }}" required>

                                            @if ($errors->has('brand'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('brand') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--      <label for="model">Model <span>(optional)</span></label>-->
                                    <!--      <input type="text" class="form-control{{ $errors->has('model') ? 'is-invalid' : '' }}" id="model" placeholder="Ads model" name="model" value="{{ old('model') }}" required>-->

                                    <!--      @if ($errors->has('model'))
    -->
                                    <!--          <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $errors->first('model') }}</strong>-->
                                    <!--          </span>-->
                                    <!--
    @endif-->
                                    <!--    </div>-->
                                    <!-- form group -->
                                    <!--</div>-->
                                    <!-- col end -->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--      <label for="edition">Edition <span>(Optional)</span></label>-->
                                    <!--      <input type="text" class="form-control{{ $errors->has('edition') ? 'is-invalid' : '' }}" id="edition" placeholder="Ads edition" name="edition" value="{{ old('edition') }}" required>-->

                                    <!--      @if ($errors->has('edition'))
    -->
                                    <!--          <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $errors->first('edition') }}</strong>-->
                                    <!--          </span>-->
                                    <!--
    @endif-->
                                    <!--    </div>-->
                                    <!-- form group -->
                                    <!--</div>-->
                                    <!-- col end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Ads Title <span>*</span></label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                id="title" placeholder="Ads Title" name="title"
                                                value="{{ old('title') }}" required>
                                        </div>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->


                                    <!--<div class="col-lg-12 col-md-12 col-sm-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--      <label for="feature">Ads Feature <span>*</span></label>-->
                                    <!--      <textarea id="feature" class="{{ $errors->has('feature') ? 'is-invalid' : '' }} form-control" name="feature"
                                        rows="6">{{ old('feature') }}</textarea>-->
                                    <!--      @if ($errors->has('feature'))
    -->
                                    <!--          <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $errors->first('feature') }}</strong>-->
                                    <!--          </span>-->
                                    <!--
    @endif-->
                                    <!--    </div>-->
                                    <!-- form group -->
                                    <!--</div>-->
                                    <!-- col end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Ads Description <span>*</span></label>
                                            <textarea id="summernote"
                                                class=" form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"name="description" rows="6">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="phone">Phone Numbers <span>*</span></label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                id="phone" placeholder="phone numbers" maxlength="25" name="phone"
                                                value="" required>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->
                                    <!--<div class="col-lg-6 col-md-6 col-sm-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--      <label for="email">Email Address <span>(optional)</span></label>-->
                                    <!--      <input type="text" class="form-control" id="email" placeholder="Email numbers" maxlength="25" name="email" value="">-->
                                    <!--    </div>-->
                                    <!-- form group -->
                                    <!--</div>-->
                                    <!-- col end -->

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="price">Price <span>*</span></label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                id="price" placeholder="25000 Taka" maxlength="25" name="price"
                                                value="{{ old('price') }}" required>
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <!-- col end -->

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <strong>Size: max:6MB, Weight:695, Height:325
                                                ,type:jpg,jpeg,png</strong><br>
                                            <label for="image">Product Picture<span>*</span></label>

                                            <div class="clone hide" style="display: none;">
                                                <div class="control-group input-group{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                    style="margin-top:10px">
                                                    <input type="file" name="image[]" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger" type="button"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="input-group control-group increment{{ $errors->has('image') ? ' is-invalid' : '' }}">
                                                <input type="file" name="image[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <strong>Size: max:10MB, type:mp4, mov, mvk</strong>
                                            <label for="image">Product Video (optional)</label>

                                            <div class="control-group input-group">
                                                <input type="file" name="video" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="package_id">Membership Packages <span>*</span></label>
                                            <select name="package_id" id="package_id"
                                                class="form-control{{ $errors->has('package_id') ? ' is-invalid' : '' }}"
                                                value="{{ old('package_id') }}">
                                                <option value="">Select package</option>
                                                @foreach ($packages->where('type','!=', 2) as $p_key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ old('package_id') == ++$p_key ? 'selected' : '' }}>
                                                        {{ $value->en_name }} - ({{ $value->package_type }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('package_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('package_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!-- form group -->
                                    </div>






                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Additional Details<span class="text-danger">*</span>
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group hdtuto control-group lst increment1">
                                                    <input type="text" name="a_title[]" placeholder="title"
                                                        class="myfrm form-control">
                                                    <input type="text" placeholder="value" name="a_detail[]"
                                                        class="myfrm form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn add" type="button"
                                                            style="background-color: #2ecc71;border-color:#2ecc71;color:white;"><i
                                                                class="far fa-plus-square"></i> Add</button>
                                                    </div>
                                                </div>

                                                <div class="clone1 hide">
                                                    <div class="hdtuto control-group lst input-group"
                                                        style="margin-top:10px">
                                                        <input type="text" placeholder="title" name="a_title[]"
                                                            class="myfrm form-control">
                                                        <input type="text" placeholder="value" name="a_detail[]"
                                                            class="myfrm form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn remove" type="button"
                                                                style="background-color: rgba(201, 48, 44, 0.9);border-color:rgba(201, 48, 44, 0.9);color:white;">
                                                                <i class="far fa-minus-square"></i> Remove </button>

                                                        </div>
                                                    </div>
                                                </div>
                                                @error('images[]')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 pt-2 pb-5">
                                        <!-- form group -->
                                        <div class="form-check">
                                            <input type="checkbox" value="1" name="price_ng" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Price Negotiation</label>
                                        </div>
                                    </div>



                                    <!-- col end -->
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="cbutton">Post Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-3 col-md-3 col-sm-12 lg-hide sm-show">
                    @include('frontEnd.customer.sidebar')
                </div>
                <!-- col end -->
            </div>
        </div>
    </section>
    {{-- for multiple file insertion --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add").click(function() {
                var lsthmtl = $(".clone1").html();
                $(".increment1").after(lsthmtl);
            });
            $("body").on("click", ".remove", function() {
                $(this).parents(".hdtuto").remove();
            });
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
