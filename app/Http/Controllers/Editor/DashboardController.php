<?php

namespace App\Http\Controllers\editor;

use App\Adreport;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Nilam;
use App\Review;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        return view('backEnd.superadmin.dashboard');
    }

    public function nilamads()
    {
        $show_datas = Nilam::with('nilamhistory','customer','bidder','image')->orderBy('id','desc')->get();
        return view('backEnd.adsmanage.nilam',compact('show_datas'));
    }

    public function allads($slug, $id) {
        $customerInfo = Customer::find($id);
        $customersads = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->where('advertisments.customer_id', $id)
            ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as division_name', 'districts.dist_name', 'customers.name as customername', 'customers.email as customeremail', 'customers.phone as customerphone', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->get();
        // return $customersads;

        return view('backEnd.customer.customerads', compact('customersads', 'customerInfo'));
    }

    public function allreview() {
        $show_datas = Review::where('status', 0)->paginate(50);

        return view('backEnd.customer.review', compact('show_datas'));
    }

    public function confirmreview(Request $request)
    {
        $review = Review::find($request->hidden_id);
        $review->status = 1;
        $review->save();
        Toastr::success('message','Review confirmed successfully!!');
        return back();
    }

    public function deletereview(Request $request)
    {
        $review = Review::find($request->hidden_id);
        $review->delete();
        Toastr::success('message','Review deleted successfully!!');
        return back();
    }

    public function allreports() {
        $show_datas = DB::table('adreports')
            ->join('customers', 'adreports.reporter_id', '=', 'customers.id')
            ->join('advertisments', 'adreports.ad_id', '=', 'advertisments.id')
            ->select('adreports.*', 'customers.name', 'customers.name as reportername', 'customers.email as reporteremail', 'customers.phone as reporterphone', 'advertisments.title')
            ->get();

        return view('backEnd.customer.allreports', compact('show_datas'));
    }

    public function unpublished(Request $request) {
        $unpublished_data         = Adreport::find($request->hidden_id);
        $unpublished_data->status = 2;
        $unpublished_data->save();
        Toastr::success('message', 'Report Canceled successfully!');

        return redirect()->back();
    }

    public function published(Request $request) {
        $published_data         = Adreport::find($request->hidden_id);
        $published_data->status = 1;
        $published_data->save();
        Toastr::success('message', 'Adreport Accept successfully!');

        return redirect()->back();
    }

    public function destroy(Request $request) {
        $deleteId = Adreport::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'Adreport  delete successfully!');

        return redirect()->back();
    }

}
