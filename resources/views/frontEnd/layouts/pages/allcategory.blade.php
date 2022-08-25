@extends('frontEnd.layouts.master')
@section('title','All Category')
@section('content')
<section>
	<div class="custom-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="custom-bread-inner">
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="custom-bread-left">
									<h5>all category</h5>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="custom-bread-right">
									<ul>
										<li><a href="{{url('/')}}">Home</a> <span>/</span></li>
										<li><a class="anchor">all category </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- row end -->
		</div>
	</div>
</section>
<!-- breadcrumb end -->
<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="category-inner">
					<div class="row">
						@foreach($categories as $category)
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="single-category">
								<ul>
									<li><i class="icon {{$category->icon}}"></i></li>
									<li><a href="{{url('category/'.$category->slug.'/'.$category->id)}}">{{$category->name}} @php
			                          $totalAdvertisment=App\Advertisment::where(['category_id'=>$category->id,'status'=>1])->get();
			                        @endphp ({{$totalAdvertisment->count()}})</a></li>
									<li class="plus"><a data-toggle="modal" data-target="#categorym{{$category->id}}"><i class="fe fe-plus"></i></a></li>
								</ul>
								<!-- Trigger the modal with a button -->
								<!-- Modal -->
								<div id="categorym{{$category->id}}" class="categorym modal fade" role="dialog">
								  <div class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">

								        <h5 class="modal-title"><a href="{{url('category/'.$category->slug.'/'.$category->id)}}">{{$category->name}}</a></h5>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>
								      <div class="modal-body">
								        <ul>
								        	 @foreach($category->subcategories as $subcategory)
								        	<li><a href="{{url('ads/'.$category->slug.'/'.$subcategory->id)}}">{{$subcategory->subcategoryName}}</a></li>
								        	@endforeach
								        </ul>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      </div>
								    </div>

								  </div>
								</div>
							</div>
						</div>
						<!-- single category end -->
						@endforeach
					</div>
				</div>
			</div>
			<!-- col end -->
			<div class="col-lg-3">
				<div class="catad">
					<a href="">
						<img src="{{asset('public/frontEnd/')}}/images/catad.jpg" alt="">
					</a>
				</div>
				<div class="catad">
					<a href="">
						<img src="{{asset('public/frontEnd/')}}/images/hproad1.jpg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- category section end -->
@endsection