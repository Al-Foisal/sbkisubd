@extends('frontEnd.layouts.master') @section('title','Details') @section('content')
<section class="commondesign">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="advertisment-details">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="advertisment-left">
                                <div class="advertisment-details-header">
                                    <div class="adsdetails-head-flex">
                                        <div>
                                            <h5>{{$adsdetails->title}}</h5>
                                            <p>
                                                For sale by <a href="#">{{$adsdetails->customerName}}</a> {{$adsdetails->division->name}} <i class="fa fa-angle-right"></i> {{$adsdetails->district->dist_name}} @if($adsdetails->thana)
                                                <i class="fa fa-angle-right"></i> {{$adsdetails->thana->thana_name}} @endif @if($adsdetails->union) <i class="fa fa-angle-right"></i> {{$adsdetails->union->union_name}} @endif
                                            </p>
                                        </div>
                                        <div class="adsdetails-price-right">
                                            <h1>Tk {{$adsdetails->price}}</h1>
                                            <p>Fixed</p>
                                        </div>
                                    </div>
                                    <div class="share-btn desktop">
                                        <p><i class="fa fa-share-alt"></i> শেয়ার করুন</p>
                                        <div class="addthis_inline_share_toolbox_wrjo"></div>
                                    </div>
                                </div>
                                <!-- details head end-->
                                <div class="advertisment-details-body">
                                    <div class="dslider owl-carousel">
                                        @foreach($adsdetails->images as $image)
                                        <div class="dslider-item">
                                            <img src="{{asset($image->image)}}" alt="" />
                                        </div>
                                        <!-- dslider end -->
                                        @endforeach
                                    </div>
                                </div>
                                <div class="report-btn">
                                    <button data-toggle="modal" data-target="#exampleModal">Report this ad</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="advertisment-right">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- user avatar -->
                                        <div class="user-avatar">
                                            <div class="avatar-pic-container">
                                                <img src="{{asset('public/frontEnd/images/customer.png')}}" class="avatar-pic" alt="" />
                                            </div>
                                            <p class="avatar-for-sale">For sale by</p>
                                            <h3 class="avatar-name">{{$adsdetails->customer->name}}</h3>
                                            <div class="avatar-contact">
                                                <div class="avatar-contact-phone">
                                                    <div class="avatar-contact-left">
                                                        <div class="avatar-contact-icon"><i class="fa fa-phone"></i></div>
                                                    </div>
                                                    <div class="avatar-contact-right">
                                                        <div class="avatar-contact-text">
                                                            <p class="text-center">Click to show</p>
                                                            <h4 class="pl-3 text-center">{{$adsdetails->phone}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="avatar-contact-ads">
                                                    <a href="{{url('profile/'.$adsdetails->customer->id)}}" class="avatar-contact-btn">View all ads</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="customer-phone-details">
                                            <li class="fmobile-hide">
                                                <i class="fa fa-phone"></i><a href="tel:{{$adsdetails->phone}}">{{$adsdetails->phone}} <span>বিজ্ঞাপন দাতার ফোন নাম্বার </span></a>
                                            </li>
                                            <!--<li class="fmobile-hide"><i class="fa fa-comments"></i> <a href="">চ্যাট করুন </a>-->
                                            <!--</li>-->
                                            <li>
                                                <i class="fa fa-clock-o"></i> <a href="">বিজ্ঞাপনের তারিখ <span>{{$adsdetails->created_at}}</span></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-user"></i>
                                                <a href="{{url('profile/'.$adsdetails->customer->id)}}">
                                                    @if($adsdetails->membership==1) <i class="fa fa-circle text-success"></i> @endif {{$adsdetails->customer->name}} @if($adsdetails->membership==1)
                                                    <img src="{{asset('public/frontEnd')}}/images/shield.png" alt="" width="20" />@endif <span>এই মেম্বারের পেইজ ভিজিট করুন</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="main-content">
                                <div class="dprice">
                                    <h5>Description :</h5>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="product-basic">
                                                <ul>
                                                    <li>Condition :</li>
                                                    <li>{{$adsdetails->version==1?"New":"Used"}}</li>
                                                </ul>
                                                <ul>
                                                    <li>Brand :</li>
                                                    <li>{{$adsdetails->brand}}</li>
                                                </ul>
                                                <ul>
                                                    <li>Model :</li>
                                                    <li>{{$adsdetails->model}}</li>
                                                </ul>
                                                <ul>
                                                    <li>Edition :</li>
                                                    <li>{{$adsdetails->edition}}</li>
                                                </ul>
                                                <ul>
                                                    <li>Authencity :</li>
                                                    <li>{{$adsdetails->type==1?"Copy":"Original"}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ads-feature">
                                        <h5>Featured</h5>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p>{{$adsdetails->feature}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ads-description">
                                        <h5>Description</h5>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p>{!!$adsdetails->description!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="share-btn mobile">
                                    <p><i class="fa fa-share-alt"></i> শেয়ার করুন</p>
                                    <div class="addthis_inline_share_toolbox_wrjo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <!-- <div class="col-lg-4 col-md-12 col-sm-12">
				<div class="csidebar">
					<div class="mads">
						<a href="">
							<img src="{{asset('public/frontEnd/')}}/images/google.dad1.png" alt="">
						</a>
					</div>
					<div class="contact-topublisher">
						<h5>Contact Publisher</h5>
						<strong>Name: {{$adsdetails->customerName}}</strong>
						<strong>Phone: {{$adsdetails->customerPhone}}</strong>

						<form action="{{url('message/visitor/to/publisher')}}" method="POST">
							@csrf
							@if($adsdetails->customerEmail)
							<input type="hidden" value="{{$adsdetails->customerEmail}}" name="hiddenEmail">
							@else
							<input type="hidden" value="addressnotfound@kbazar.com.bd" name="hiddenEmail">
							@endif
							<div class="form-group">
								<input type="hidden" name="cname" value="zadu" class="form-control" class="cname" placeholder="Your Name">
							</div>
							<div class="form-group">
								<input type="cemail" class="form-control" name="cemail" placeholder="Your Email">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="cphone" placeholder="Your Phone">
							</div>
							<textarea name="ctext" id=""  rows="5" style="width:100%" placeholder="Your Message"></textarea>
							<div class="form-group">
								<button>submit</button>
							</div>
						</form>
					</div>
				</div>
			</div> -->
            <!-- col end -->
        </div>
    </div>
</section>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">এই বিজ্ঞাপনটিতে রিপোর্ট করুন</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php $customerId=Session::get('customerId'); $customerInfo=App\Customer::where(['id'=>$customerId])->first(); @endphp @if($customerId !==NULL)
            <form action="{{url('report/ad')}}" method="POST">
                @csrf
                <input name="ad_id" type="hidden" value="{{$adsdetails->id}}" />

                <div class="modal-body report-area">
                    <div class="form-group">
                        <textarea type="text" name="adreport" class="form-control" required style="border: 1px solid #ddd;" value="রিপোর্ট লিখুন"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary reportsubbtn">রিপোর্ট করুন</button>
                </div>
            </form>
            @endif @if($customerId == NULL )
            <div class="log-btn">
                <a href="{{url('customer/login')}}" class="btn btn-primary reportsubbtn"> Please Login </a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
