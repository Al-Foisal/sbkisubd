@extends('frontEnd.layouts.master')
@section('title','Profile Edit')
@section('content')
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
                        <p>Edit Profile</p>
                    </div>
                    <div class="cbmain-content">
                        <form action="{{url('customer/0/control-panel/profile/update')}}" method="POST"  enctype="multipart/form-data" name="editForm">
                        	@csrf
                            <div class="row">
                            	 <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">Name <span>*</span></label>
                                      <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" placeholder="name" name="name" value="{{$edit_data->name}}" required>
                                      
                                      @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{$errors->first('name')}}</strong>
                                        </span>
                                      @endif
                                    <!-- form group -->
                               		 </div>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">Phone <span>*</span></label>
                                      <input type="text" class="form-control {{$errors->has('phone')? 'is-invalid' : ''}}" placeholder="phone" name="phone"  value="{{$edit_data->phone}}" required>
                                      @if($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{$errors->first('phone')}}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">Email <span>*</span></label>
                                      <input type="email" class="form-control {{$errors->has('email')? 'is-invalid' : ''}}" placeholder="email" id="email" name="email"  value="{{$edit_data->email}}" required>
 
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{$errors->first('email')}}</strong>
                                        </span>
                                       @endif
                                    </div>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                	<div class="form-group">
                                		<label for="division">Division</label>
	                                     <select class="form-control{{ $errors->has('division') ? ' is-invalid' : '' }}" name="division" id="division">
		                                      <option value="">Division</option>
		                                       @foreach($divisions as $key=>$value)
			                                      	<option value="{{$value->id}}">{{$value->en_name}}
			                                      	</option>
			                                    @endforeach

		                                       @if ($errors->has('division'))
			                                    <span class="invalid-feedback" role="alert">
			                                      <strong>{{ $errors->first('division') }}</strong>
			                                    </span>
			                                    @endif
		                              </select>
	                         		 </div>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="divistion" >District<span>*</span></label>
                                      <select class="form-control" name="subarea" id="subarea">
                                      	<option value="">District</option>
                                      	@foreach($districts as $key=>$value)
		                                      	<option value="{{$value->id}}">{{$value->en_dist_name}}
		                                      	</option>
		                                 @endforeach
                                 	  </select>
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="postal">Postal Code</label>
                                      <input type="text" class="form-control" placeholder="Post Postal" name="postal"  value="{{$edit_data->postal}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="address">Full Address</label>
                                      <textarea type="text" class="form-control" placeholder="Full Address" name="address" rows="4">{{$edit_data->address}}</textarea>
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="facebook">Facebook Link</label>
                                      <input type="url" class="form-control" placeholder="Facebook" name="facebook"  value="{{$edit_data->facebook}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="linkedin">Linkedin Link</label>
                                      <input type="url" class="form-control" placeholder="Linkedin" name="linkedin"  value="{{$edit_data->linkedin}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="youtube">Youtube Link</label>
                                      <input type="url" class="form-control" placeholder="Youtube" name="youtube"  value="{{$edit_data->youtube}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="website">Website Link</label>
                                      <input type="url" class="form-control " placeholder="Website link" name="website"  value="{{$edit_data->website}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="twitter">Twitter Link</label>
                                      <input type="url" class="form-control" placeholder="Twitter" name="twitter"  value="{{$edit_data->twitter}}">
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="image" class="imagelabel">Profile Picture <span>*</span></label>
                                      <input type="file" class="custom-file-input form-control" id="customFile" placeholder="twitter" name="image"  value="">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                      <img src="{{asset($edit_data->image)}}" class="smallImage" alt="">
                                    </div>
                                    <!-- form group -->
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <div class="form-group">
                                    <label for="image" class="imagelabel">Profile Cober Photo <span>*</span></label>
                                    <input type="file" class="custom-file-input form-control" id="customFile" placeholder="twitter" name="banner"  value="">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <img src="{{asset($edit_data->banner)}}" class="smallImage" alt="">
                                  </div>
                                  <!-- form group -->
                              </div>
                                <!-- col end -->

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="about">About Yourself</label>
                                      <textarea type="text" class="form-control" placeholder="About Yourself" name="about" rows="4">{{$edit_data->about}}</textarea>
                                    </div>
                                    <!-- form group -->
                                </div>
                                <!-- col end -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <button class="cbutton">update</button>
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
<script type="text/javascript">
   document.forms['editForm'].elements['division'].value="{{$edit_data->state}}",
   document.forms['editForm'].elements['subarea'].value="{{$edit_data->city}}",
 </script>
@endsection