<?php

namespace App\Http\Controllers\Reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Advertisment;
use DB;
class ReportsController extends Controller
{
    public function customerList(){
    	$customers=Customer::get();
    	return view('backEnd.customer.customers',compact('customers'));
    }

    public function allads($slug,$id){
    	$customerInfo=Customer::find($id);
    	$customersads = Advertisment::
        orderBy('advertisments.id','DESC')
        ->where('advertisments.customer_id',$id)
        ->get();
        $adsimage = DB::table('adsimages')
        ->join('advertisments','adsimages.ads_id','=','advertisments.id')
        ->select('advertisments.title','adsimages.*')
        ->orderBy('adsimages.id','DESC')
        ->get();
        // return $customersads;
    	return view('backEnd.customer.allads',compact('customersads','adsimage','customerInfo'));
    }

    public function customerProfile($id){
        $customerInfo=Customer::find($id);
        $customersads = Advertisment::
        orderBy('advertisments.id','DESC')
        ->where('advertisments.customer_id',$id)
        ->get();
        $adsimage = DB::table('adsimages')
        ->join('advertisments','adsimages.ads_id','=','advertisments.id')
        ->select('advertisments.title','adsimages.*')
        ->orderBy('adsimages.id','DESC')
        ->get();
        // return $customersads;
        return view('backEnd.customer.allads',compact('customersads','adsimage','customerInfo'));
    }
}
