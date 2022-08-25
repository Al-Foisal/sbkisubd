@extends('frontEnd.layouts.master')
@section('title',$findunion->name)
@section('content')
<style>
	.display-block {
	    display: block !important;
	}
</style>
<section class="ads-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="banner-top-ad">
					<img src="{{asset('public/frontEnd/')}}/images/category-ads.gif" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="advertisment">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
			 	<div class="filter-and-search">
					<div class="row">
						<div class="col-sm-6 col-6">
							<div class="location-filter">
							<button href="#" type="button" data-toggle="modal" data-target="#exampleModalLong">
							 <img src="{{asset('public/frontEnd/')}}/images/LOCATION.png" alt="" class="location-icon"> @if($findunion !=NULL) {{$finddivision->name}} <i class="fa fa-angle-right"></i>  {{$finddistrict->dist_name}} <i class="fa fa-angle-right"></i> {{$findthana->thana_name}} <i class="fa fa-angle-right"></i> {{$findunion->union_name}} @else অবস্থান নির্বাচন করুন @endif
							</button>
							</div>
							<!-- Modal -->
							<div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog modal-lg location-modal" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	   <div class="row">
									      	   	<div class="col-sm-6">
									      	   		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									      		 @foreach($divisions as $key=>$division)
												  <a class="nav-link" id="v-pills-home-tab{{$division->id}}" data-toggle="pill" href="#v-pills-home{{$division->id}}" role="tab" aria-controls="v-pills-home{{$division->id}}" aria-selected="true">
												  	<span>{{$division->name}}</span> <i class="fa fa-angle-right"></i>
												  </a>
												  @endforeach
												</div>
									      	   	</div>
									      	   	<div class="col-sm-6">
									      	   		<div class="tab-content" id="v-pills-tabContent">
											 @foreach($divisions as $key=>$division)
											  <div class="tab-pane fade " id="v-pills-home{{$division->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab{{$division->id}}">
											  	<p><strong>{{$division->name}} -এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</strong></p>
											  	<a href="" class="all-area">{{$division->name}}-এর সবগুলো</a>
											  	<ul class="modal-second-menu">
											  		@foreach($division->districts as $key=>$district)
											  		<li>
													  <a data-toggle="collapse" href="#modal-collapse{{$district->id}}" role="button" aria-expanded="false" aria-controls="modal-collapse">
													    {{$district->dist_name}} <i class="fa fa-angle-down"></i>
													  </a>
													  <div class="collapse-area">
														<div class="collapse " id="modal-collapse{{$district->id}}">
															<div class="tree-menu demo custom-tree" id="tree-menu">
														  <ul>
														  	@foreach($district->thanas as $thana)
														  	<li><a href="{{url('location/'.$division->slug.'/'.$district->slug.'/'.$thana->slug)}}">{{$thana->thana_name}}</a>
											  				<ul>
											  					@foreach($thana->unions as $union)
												  				<li><a href="{{url('location/'.$division->slug.'/'.$district->slug.'/'.$thana->slug.'/'.$union->slug)}}">{{$union->union_name }}</a></li>
												  				@endforeach
											  				</ul>
														  	</li>
														  	@endforeach
														  </ul>
														  </div>
														</div>
													  </div>
													</li>
											  		@endforeach
											  	</ul>
											  </div>
											  @endforeach
											</div>
									      	   	</div>
								      	   </div>
								      </div>
								    </div>
								  </div>
							</div>
						</div>
						<div class="col-sm-6 col-6">
							<div class="location-filter">
							<button type="button" data-toggle="modal" data-target="#exampleModalLong2">
							<img src="{{asset('public/frontEnd/')}}/images/price-tag.png" alt="" class="price-tag"> শ্রেণী নির্বাচন
							</button>
							</div>
							<!-- Modal -->
							<div class="modal" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog modal-lg location-modal" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	   <div class="row">
									      	   	<div class="col-sm-6">
									      	   		<div class="nav flex-column nav-pills category-mmenu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									      		 @foreach($categories as $key=>$category)
												  <a class="nav-link" id="v-pills-category-tab{{$category->id}}" data-toggle="pill" href="#v-pills-category{{$category->id}}" role="tab" aria-controls="v-pills-category{{$category->id}}" aria-selected="true">
												  	<span>{{$category->name}}</span> <i class="fa fa-angle-right"></i>
												  </a>
												  @endforeach
												</div>
									      	   	</div>
									      	   	<div class="col-sm-6">
									      	   		<div class="tab-content" id="v-pills-tabContent">
											 @foreach($categories as $key=>$category)
											  <div class="tab-pane fade " id="v-pills-category{{$category->id}}" role="tabpanel" aria-labelledby="v-pills-category-tab{{$category->id}}">
											  	<p><strong>{{$category->name}} -এর উপ-শ্রেণী নির্বাচন করুন</strong></p>
											  	<a href="{{url('category/'.$category->slug)}}" class="all-area">{{$category->name}}-এর সবগুলো</a>
											  	<ul class="modal-second-menu">
											  		@foreach($category->subcategories as $key=>$subcategory)
											  		<li>
													  <a href="{{url('category/'.$category->slug.'/'.$subcategory->slug)}}">
													    {{$subcategory->subcategoryName}} <i class="fa fa-angle-down"></i>
													  </a>
													</li>
											  		@endforeach
											  	</ul>
											  </div>
											  @endforeach
											</div>
									      	   	</div>
								      	   </div>
								      </div>
								    </div>
								  </div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="sidebar">
					<div class="ads-type">
						<p>সদস্যের ধরণ</p>
						<form action="">
							<div class="form-control">
								 <input type="radio" name="filter" value="1"  onchange="this.form.submit()" id="urgent" @if($filter==1)checked=""@endif>
								 <label for="urgent">নন মেম্বারশিপ</label> 
							</div>
							<div class="form-control">
								<input type="radio" id="dorstep" name="filter" value="2"  onchange="this.form.submit()" @if($filter==2)checked=""@endif>
								<label for="dorstep">মেম্বারশিপ</label> 
							</div>
						</form>
					</div>
					<div class="subcategory">
						<div class=" title ">
							<p>সকল শ্রেণী</p>
						</div>
				         <ul>
				            @foreach($categories as $key=>$value)
				             @php 
				            	$totalcat = App\Advertisment::where(['category_id'=>$value->id,'status'=>1])->get(); 
				            @endphp 
				        	<li><a href="{{url('category/'.$value->slug)}}">{{$value->name}} ({{$totalcat->count()}})</a></li>
				        	@endforeach
				   		 </ul>
					</div>
					  <div class="locationad-inner">
					  	<div class=" title ">
							<p>অবস্থান</p>
						</div>
						<div id="location-ads" class="location-ads ">
							<ul>
							@foreach($divisions as $division)
							<li><a href="{{url('/location/'.$division->slug)}}">{{$division->name}} <span> @php $totaldiviads = App\Advertisment::where('division_id',$division->id)->get(); @endphp ({{$totaldiviads->count()}})</span></a></li>
							@endforeach
						</ul>
							
					    </div>
					</div>
				</div>

			</div>
			<!-- first col-3 -->
			<div class="col-lg-7 col-md-7 col-sm-12">
				<div class="ad-inner">
					<div class="ad-filter">
						<div class="row">
							<div class="col-lg-12 col-sm-6 col-sm-12">
								<div class="ads-breadcrumb">
								  <ul>
									<li><a href="{{url('/')}}">হোমপেজ</a></li>
									<li><a class="anchor"><i class="fa fa-angle-right"></i></a></li>
									<li><a class="anchor">@if($findunion !=NULL) {{$finddivision->name}} <i class="fa fa-angle-right"></i>  {{$finddistrict->dist_name}} <i class="fa fa-angle-right"></i> {{$findthana->thana_name}}<i class="fa fa-angle-right"></i> {{$findunion->union_name}} @else অবস্থান নির্বাচন করুন @endif </a></li>
								</ul>
								<p>@if($findunion !=NULL) {{$finddivision->name}} <i class="fa fa-angle-right"></i>  {{$finddistrict->dist_name}} <i class="fa fa-angle-right"></i> {{$findthana->thana_name}}<i class="fa fa-angle-right"></i> {{$findunion->union_name}} @else অবস্থান নির্বাচন করুন @endif  এর জন্য  {{$advertisments->count()}} টি  বিজ্ঞাপন খুঁজে পাওয়া গেছে </p>
								</div>
							</div>
							<!-- col end -->
						</div>
					</div>
				  	<div class="list-product-area">
				  		<div class="row">
				  			<div class="col-sm-12">
				  				@foreach($advertisments as $key=>$value)
				  				<div class="list-product @if($key==0) big-ads @endif">
					  				<a href="">
					  					<div class="row">
									  		<div class="col-lg-4 col-md-4 col-sm-4 col-4">
									  			<div class="list-ad-image">
									  				<a href="{{url('details/'.$value->id.'/'.$value->slug)}}">
									  					@foreach($adsimage as $image)
							                             @if($value->id==$image->ads_id)
							                             <img src="{{asset($image->image)}}" alt="">
							                              @break
							                              @endif
							                         	 @endforeach
									  				</a>
									  			</div>
									  		</div>
									  		<div class="col-lg-8 col-md-8 col-sm-8 col-8">
									  			<div class="list-ad-info">
									  				<h5><a href="{{url('details/'.$value->id.'/'.$value->slug)}}">{{substr($value->title,0,50)}}</a></h5>
									  				@php
									  					$thana = App\Thana::find($value->thana_id);
									  					$union = App\Union::find($value->union_id);
									  				@endphp
									  				<p>{{$value->divi_name}} <i class="fa fa-angle-right"></i> {{$value->dist_name}} @if($thana !=NULL) <i class="fa fa-angle-right"></i> {{$thana->thana_name}} 
									  				@endif
									  				@if($union !=NULL) <i class="fa fa-angle-right"></i> {{$union->union_name}} 
									  				@endif</p>
									  				<p>@if($value->membership==2)
									  					<img src="{{asset('public/frontEnd/images/shield.png')}}" alt="" class="membertag">
									  				 @endif{{$value->catname}}</p>
									  				<strong>{{$value->price}}</strong>
									  			</div>
									  		</div>
									  	</div>
					  				</a>
				  				</div>
						  		<!-- list product end -->
						  	@endforeach
				  		</div>
				  	</div>
				  	</div>
				</div>
				<div class="cpaginate">
					{{$advertisments->links()}}
				</div>
			</div>
			<!-- first col-6 end -->
			<div class="col-sm-2">
				<div class="mads">
					<a href="">
						<img src="{{asset('public/frontEnd/')}}/images/hproad1.jpg" alt="">
					</a>
				</div>
				<!-- mads end -->
			</div>
		</div>
		<!-- row end -->
	</div>
</section>
<script>
    $(document).ready(function() {
      $('select').niceSelect();
    });
</script>
@endsection