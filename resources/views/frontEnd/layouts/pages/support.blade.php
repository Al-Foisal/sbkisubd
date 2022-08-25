@extends('frontEnd.layouts.master')
@section('title','Support')
@section('content')
<section class="section-padding customer-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="contact-area">
					<div class="row">
						<div class="col-sm-12">
							<div class="contact-us-content">
								<h4>আপনার সমস্যা আমাদেরকে্ ইমেইল করুন</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="contact-form">
								<form action="{{url('visitor/support')}}" method="POST">
								    @csrf
									<div class="form-group">
										<label for="">নামঃ </label>
										<input type="text" value="" name="visitor_name" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="">মোবাইল নম্বরঃ </label>
										<input type="text" value="" name="visitor_phone" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="">ইমেইলঃ </label>
										<input type="email" value="" name="visitor_email" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="">আপনার সমস্যাঃ </label>
										<textarea name="visitor_message" id="" cols="30" rows="10" class="form-control" required></textarea>
									</div>

									<div class="form-group">
										<button type="submit">পাঠিয়ে দিন </button>
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