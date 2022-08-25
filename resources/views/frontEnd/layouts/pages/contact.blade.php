@extends('frontEnd.layouts.master')
@section('title','Contact Us')
@section('content')
<section class="section-padding customer-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="contact-area">
					<div class="row">
						<div class="col-sm-12">
							<div class="contact-us-content">
								<h4>আমাদের সাথে যোগাযোগ করুন</h4>
								<p>আপনি যদি আপনার প্রশ্ন বা সমস্যার উত্তর না পেয়ে থাকেন, তবে অনুগ্রহ করে নিচের ফর্ম ব্যবহার করে আমাদের সাথে যোগাযোগ করুন এবং যত তাড়াতাড়ি সম্ভব আমরা আপনার সাথে যোগাযোগ করবো।</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="contact-form">
								<form action="">
									<div class="form-group">
										<label for="">আপনার নাম </label>
										<input type="text" value="" class="form-control">
									</div>
									<div class="form-group">
										<label for="">আপনার ইমেইল  </label>
										<input type="text" value="" class="form-control">
									</div>
									<div class="form-group">
										<label for="">মেসেজ </label>
										<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
									</div>

									<div class="form-group">
										<button>পাঠিয়ে দিন </button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- category section end -->
@endsection