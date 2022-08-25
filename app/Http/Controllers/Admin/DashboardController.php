<?php

namespace App\Http\Controllers\admin;

use App\Advertisment;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
    
    	$alluser = User::count();
    	$newads  = Advertisment::where(['request'=>0, 'status'=>0])->count();
    	$updateads  = Advertisment::where(['request'=>0, 'status'=>1])->count();
    	$premiumads  = Advertisment::where('premium',2)->count();
    	$adsall  = Advertisment::where(['request'=>1, 'status'=>1])->count();
    	$membeReqeuest  = Customer::where('membership',3)->count();
    	$totalMember  = Customer::orWhere('membership',1)->orWhere('membership',2)->orWhere('membership',3)->count();
    	$cancelMember  = Customer::where('membership',2)->count();
    	$todayAds  = Advertisment::whereDate('created_at',Carbon::today())->count();
    	$totalcustomer  = Customer::count();

    	return view('backEnd.superadmin.dashboard',compact('alluser','newads','updateads','premiumads','adsall','membeReqeuest','totalMember','cancelMember','todayAds','totalcustomer'));
    }
}
