@extends('frontEnd.layouts.master')
@section('title','How to quick sell')
@section('content')
<section class="section-padding customer-bg">
	<div class="container">
		<div class="row">
			@forelse($content as $key=>$value)
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h3>{{$value->title}}</h3>
				<div class="ccontent">
					{!! $value->text !!}
				</div>
			</div>
			<!-- col end -->
			@empty
			<strong>No Content Found</strong>
			@endforelse
		</div>
	</div>
</section>
<!-- category section end -->
@endsection