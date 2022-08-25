<?php

namespace App\Http\Controllers\Admin;

use App\Advertisment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class AdsmanageController extends Controller {
    public function requestnewads() {
        $newadsrequest = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->where('advertisments.status', 0)
            ->where('advertisments.request', 1)
            ->where('advertisments.adsduration', '>=', today())
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name', 'customers.name as customername', 'customers.email as customeremail', 'customers.phone as customerphone', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->orderBy('id','desc')
            ->get();

        return view('backEnd.adsmanage.requestads', compact('newadsrequest'));
    }

    public function allads() {
        $show_datas = DB::table('advertisments')
            ->where('advertisments.status', 1)
            ->where('advertisments.request', 1)
            ->where('advertisments.adsduration', '>=', today())
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name', 'customers.name as customername', 'customers.email as customeremail', 'customers.phone as customerphone', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->orderBy('id','desc')
            ->get();

        return view('backEnd.adsmanage.allads', compact('show_datas'));
    }

    public function activation($id) {
        $activationAds         = Advertisment::find($id);
        $activationAds->status = 1;
        $activationAds->save();
        Toastr::success('message', 'Advertisment activated successfully!');

        return redirect()->back();
    }

    public function inactive($id) {
        $inactivationAds         = Advertisment::find($id);
        $inactivationAds->status = 0;
        $inactivationAds->save();
        Toastr::success('message', 'Advertisment inactivated successfully!');

        return redirect()->back();
    }

    public function requestupdateads() {
        $requestupdateads = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->where('advertisments.status', 1)
            ->where('advertisments.request', 0)
            ->where('advertisments.adsduration', '>=', today())
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name', 'customers.name as customername', 'customers.email as customeremail', 'customers.phone as customerphone', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->orderBy('updated_at','desc')
            ->get();

        return view('backEnd.adsmanage.requestupdateads', compact('requestupdateads'));
    }

    public function activationsave(Request $request) {
        $save_data              = Advertisment::find($request->hidden_id);
        $save_data->status      = 1;
        $save_data->request     = 1;
        $save_data->adsduration = $request->adsduration;
        $save_data->save();
        Toastr::success('message', 'Advertisment published successfully!');

        return redirect('/admin/show/ads-new/request');
    }

    public function published(Request $request) {
        $published_data         = Advertisment::find($request->hidden_id);
        $published_data->status = 1;
        $published_data->save();
        Toastr::success('message', 'Advertisment published successfully!');

        return redirect()->back();
    }

    public function acceptrequest(Request $request) {
        $published_data          = Advertisment::find($request->hidden_id);
        $published_data->request = 1;
        $published_data->save();
        Toastr::success('message', 'Advertisment update accept successfully!');

        return redirect()->back();
    }

    public function unpublished(Request $request) {
        $published_data         = Advertisment::find($request->hidden_id);
        $published_data->status = 0;
        $published_data->save();
        Toastr::success('message', 'Advertisment unpublished successfully!');

        return redirect()->back();
    }

    public function requestexpiredads() {
        $show_datas = DB::table('advertisments')
            ->where('advertisments.adsduration', '<', today())
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as divisionname', 'districts.en_dist_name', 'customers.name as customername', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')

            ->get();

        return view('backEnd.adsmanage.requestpremiumads', compact('show_datas'));
    }

    public function requestacceptpremiumads(Request $request) {
        $accept_data          = Advertisment::find($request->hidden_id);
        $accept_data->premium = 1;
        $accept_data->save();
        Toastr::success('message', 'Advertisment premium successfully!');

        return redirect()->back();
    }

    public function destroy(Request $request) {
        $deleteId = Advertisment::find($request->hidden_id);
        $deleteId->delete();
        Toastr::success('message', 'Advertisment  delete successfully!');

        return redirect()->back();
    }
}
