<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Membership;
class MembershipController extends Controller
{
    
    public function create(){
    	return view('backEnd.membership.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'name'=>'required',
            'quantity'=>'required',
    		'status'=>'required',
    	]);

    	$store_data           	  = 	new Membership();
        $store_data->name         =     $request->name;
    	$store_data->slug      	  = 	preg_replace('/\s+/u', '-', trim($request->name));
    	$store_data->quantity  	  = 	$request->quantity;
    	$store_data->status  	  = 	$request->status;
    	$store_data->save();
    	Toastr::success('message', 'Ads limit add successfully!');
    	return redirect()->back();
    }
    public function manage(){
    	$show_data = Membership::orderBy('id','DESC')->get();
    	return view('backEnd.membership.manage',compact('show_data'));
    }
    public function edit($id){
        $edit_data =   Membership::find($id);
        return view('backEnd.membership.edit',compact('edit_data'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
        ]);

    	$update_data = Membership::find($request->hidden_id);
		$update_data->name     		 = 	$request->name;
        $update_data->slug           =  preg_replace('/\s+/u', '-', trim($request->name));
    	$update_data->quantity  	  	 = 	$request->quantity;
    	$update_data->status  	  	 = 	$request->status;
    	$update_data->save();
        Toastr::success('message', 'Ads limit Update successfully!');
        return redirect()->back();
    }
    public function inactive(Request $request){
        $inactive_data           =   Membership::find($request->hidden_id);
        $inactive_data->status   =   0;
        $inactive_data->save();
        Toastr::success('message', 'Ads limit inactive successfully!');
        return redirect()->back();   
    }
    public function active(Request $request){
        $active_data         =   Membership::find($request->hidden_id);
        $active_data->status =   1;
        $active_data->save();
        Toastr::success('message', 'Ads limit active successfully!');
        return redirect()->back();   
    }
}
