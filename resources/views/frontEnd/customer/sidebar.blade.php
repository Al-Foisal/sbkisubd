<div class="customer-sidebar">
    <div class="customer-info">
        <div class="title">
            <p>Customer Panel</p>
        </div>
        @php
             $customerId = Session::get('customerId');
             $customerInfo=App\Customer::where(['id'=>$customerId])->first();
         @endphp
        <div class="image">
           <img src="{{asset($customerInfo->image)}}" alt="">
        </div>
        <div class="name">
            <p>@if($customerInfo->membership==1) <i class="fa fa-circle text-success"></i> @endif {{$customerInfo->name}} @if($customerInfo->membership==1)<img src="{{asset('public/frontEnd')}}/images/shield.png" alt="" width="20"/>@endif</p>
        </div>
    </div>
    <!-- customer info end -->
    <div class="customer-menu">
        <ul>
            <li class="{{{ Request::is('customer/0/control-panel/dashboard') ? 'active':'' }}}"><a href="{{url('customer/0/control-panel/dashboard')}}"><i class="fe fe-home"></i>My Dashboard</a></li>

            <li class="{{{ Request::is('customer/0/control-panel/edit') ? 'active':'' }}}"><a href="{{url('customer/0/control-panel/edit')}}"><i class="fe fe-user"></i> Edit Profile</a></li>

            <li class="{{{ Request::is('customer/0/control-panel/manage-my-ads') ? 'active':'' }}}"><a href="{{url('customer/0/control-panel/manage-my-ads')}}"><i class="fe fe-target"></i> Manage Ads </a></li>

            <li class="{{{ Request::is('customer/'.$customerInfo->slug.'/0/control-panel/'.$customerInfo->id.'/post-new-ads') ? 'active':'' }}}"><a href="{{url('customer/0/control-panel/post-new-ads')}}"><i class="fe fe-rocket"></i> New Ads </a></li>

            <li class="{{{ Request::is('customer/0/nilam/control-panel/manage-my-ads') ? 'active':'' }}}"><a href="{{url('customer/0/nilam/control-panel/manage-my-ads')}}"><i class="fe fe-target"></i> Manage Bidding Ads </a></li>
            
            <li><a href="{{url('customer/shop/open-list')}}"><i class="fe fe-clock"></i>Shop Open Schedule</a></li>
            <li><a href="{{url('customer/logout')}}"><i class="fe fe-logout"></i>Logout</a></li>
        </ul>
    </div>
</div>