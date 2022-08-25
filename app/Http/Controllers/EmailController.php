<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Post;
use App\Adreport;
use Mail;
use Session;
class EmailController extends Controller
{
    
     public function publisherEmail(Request $request){
      $this->validate($request, [
         'cname'=>'required',
         'cemail'=>'required',
         'cphone'=>'required',
         'ctext'=>'required',
        ]);
      $data = array(
         'cname' => $request->cname,
         'cemail' => $request->cemail,
         'cphone' => $request->cphone,
         'ctext' => $request->ctext,
         'hiddenEmail' => $request->hiddenEmail,
        );

        $send = Mail::send('frontEnd.emails.publisher', $data, function($textmsg) use ($data){
         $textmsg->from($data['cemail']);
         $textmsg->to($data['hiddenEmail']);
         $textmsg->subject($data['ctext']);
        });

        Toastr::success('message', 'Thanks! your message send successfully!');
        return redirect()->back();
        }
        
        
    public function visitorsupport(Request $request){
      $this->validate($request, [
         'visitor_name'=>'required',
         'visitor_phone'=>'required',
         'visitor_email'=>'required',
         'visitor_message'=>'required',
        ]);
      $data = array(
         'visitor_name' => $request->visitor_name,
         'visitor_phone' => $request->visitor_phone,
         'visitor_email' => $request->visitor_email,
         'visitor_message' => $request->visitor_message,
        );
        // return $data;
        $send = Mail::send('frontEnd.emails.support', $data, function($textmsg) use ($data){
         $textmsg->from($data['visitor_email']);
         $textmsg->to('info@hatbodol.com');
         $textmsg->subject($data['visitor_message']);
        });
        
        Toastr::success('message', 'Thanks! your message send successfully!');
        return redirect()->back();
        }
        
       public function reportad(Request $request){
    	$store_data = new Adreport();
        $store_data->reporter_id = Session::get('customerId');
    	$store_data->ad_id       = $request->ad_id;
    	$store_data->adreport    = $request->adreport;
    	$store_data->status      = 0;
    	$store_data->save();
    	
        Toastr::success('message', 'Thanks! your message send successfully!');
        return redirect()->back();
    }
        
}
