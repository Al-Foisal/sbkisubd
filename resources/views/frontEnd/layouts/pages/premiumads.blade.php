@extends('frontEnd.layouts.master')
@section('title','Premium Ads')
@section('content')
<section class="advertisment">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-7 col-sm-12">
				<div class="ad-inner">
					<div class="row">
						@foreach($premiumads as $key=>$value)
						<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="single-ads">
									<div class="ads-image">
										<a href="{{url('details/'.$value->id)}}">
											 @foreach($adsimage as $image)
					                             @if($value->id==$image->ads_id)
					                             <img src="{{asset($image->image)}}" alt="">
					                              @break
					                              @endif
					                          @endforeach
										</a>
									</div>
									<div class="ads-content">
										<ul class="catandloc">
											<li class="cat"><a href=""><i class="fa fa-circle-o"></i>{{$value->catname}}</a></li>
											<li class="loc"><a href=""><i class="fa fa-map-marker"></i>{{$value->subareaName}}</a></li>
										</ul>
										<div class="title">
											<a href="{{url('details/'.$value->id)}}">{{substr($value->title,0,30)}}..</a>
										</div>
										<ul class="price-wishlist">
											<li class="price">{{$value->price}}</li>
											@if($value->membership)
											<li class="wishlist"><a href="wishlist">Premium</a></li>
											@endif
										</ul>
									</div>
								</div>
							</div>
							<!-- single ads end -->
						@endforeach
					</div>
				</div>
			</div>
			<!-- first col-9 end -->
			<div class="col-lg-3 col-md-5 col-sm-12">
				<div class="mads">
					<a href="">
						<img src="{{asset('public/frontEnd/')}}/images/hproad1.jpg" alt="">
					</a>
				</div>
				<!-- mads end -->
				<div class="locationad-inner">
					<div id="location-ads" class="location-ads ">
						<ul>
							@foreach($subareas as $key=>$value)
							<li><a href="{{url('/location/'.$value->slug.'/'.$value->id)}}">{{$value->subareaName}} <span> @php $totalsubarea = App\Advertisment::where('subarea_id',$value->id)->get(); @endphp ({{$totalsubarea->count()}})</span></a></li>
							@endforeach
						</ul>
						
				    </div>
					<!-- <button type="button" id="addDiv" class="addDiv"><i class="fa fa-plus"></i> Show All</button>
					<button type="button" id="removeDiv" class="removeDiv"><i class="fa fa-minus"></i> Less</button> -->
				</div>
			</div>
			<!-- first col-3 -->
		</div>
		<!-- row end -->
	</div>
</section>
<!-- advertisment end -->
@endsection