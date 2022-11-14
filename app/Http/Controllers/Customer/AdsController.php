<?php

namespace App\Http\Controllers\Customer;

use App\AdditionalDetail;
use App\Adsimage;
use App\Advertisment;
use App\Category;
use App\Chat;
use App\Customer;
use App\District;
use App\DistrictChildcity;
use App\DistrictSubcity;
use App\Division;
use App\DivisionChildcity;
use App\DivisionSubcity;
use App\Http\Controllers\Controller;
use App\Package;
use App\Subcategory;
use App\SubscriptionPackage;
use App\ThanaChildcity;
use App\ThanaSubcity;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Session;

class AdsController extends Controller {

    public function chatwithsellerlist() {
        $sellerchatlist = DB::table('chats')
            ->where('customer_id', Session::get('customerId'))
            ->selectRaw('count(id) as n,seller_id')
            ->groupBy('seller_id')
            ->get();

        return view('frontEnd.customer.chatlist', compact('sellerchatlist'));
    }

    public function chatwithseller($id) {

        if ($this->validCustomer()) {

            if ($id == Session::get('customerId')) {
                return back();
            } else {
                $data             = [];
                $data['seller']   = Customer::find($id);
                $data['customer'] = Customer::find(Session::get('customerId'));
                $data['chat']     = Chat::where('customer_id', Session::get('customerId'))->where('seller_id', $id)->get();
                $ct               = Chat::where('customer_id', Session::get('customerId'))->where('seller_id', $id)->where('sent_by', $id)->where('status', 0)->get();

                foreach ($ct as $item) {
                    $chatread = Chat::find($item->id);
                    $chatread->update(['status' => 1]);
                }

                return view('frontEnd.customer.chat', $data);
            }

        } else {
            Toastr::success('message', 'Login first!');

            return redirect('customer/login');
        }

    }

    public function chatwithcustomerlist() {
        $customerchatlist = DB::table('chats')
            ->where('seller_id', Session::get('customerId'))
            ->selectRaw('count(id) as n,customer_id')
            ->groupBy('customer_id')
            ->get();

        return view('frontEnd.customer.chatcustomerlist', compact('customerchatlist'));
    }

    public function chatwithcustomer($id) {

        if ($this->validCustomer()) {

            if ($id == Session::get('customerId')) {
                return back();
            } else {
                $data             = [];
                $data['seller']   = Customer::find(Session::get('customerId'));
                $data['customer'] = Customer::find($id);
                $data['chat']     = Chat::where('customer_id', $id)->where('seller_id', Session::get('customerId'))->get();
                $ct               = Chat::where('customer_id', $id)->where('seller_id', Session::get('customerId'))->where('sent_by', $id)->where('status', 0)->get();

                foreach ($ct as $item) {
                    $chatread = Chat::find($item->id);
                    $chatread->update(['status' => 1]);
                }

                return view('frontEnd.customer.chatcustomer', $data);
            }

        } else {
            Toastr::success('message', 'Login first!');

            return redirect('customer/login');
        }

    }

    public function chatstore(Request $request) {
        Chat::create([
            'message'     => $request->message,
            'customer_id' => $request->customer_id,
            'seller_id'   => $request->seller_id,
            'sent_by'     => $request->sent_by,
        ]);

        return back();
    }

    public function buyFromWallet(Request $request) {
        $customer = Customer::find($request->customer_id);
        $package  = Package::find($request->package_id);

        if ($customer->wallet < $package->price) {
            Toastr::success('message', 'Insufficient wallet!');

            return back();
        }

        $customer->wallet = $customer->wallet - $package->price;
        $customer->save();

        $sub = SubscriptionPackage::where([
            'customer_id' => $customer->id,
            'package_id'  => $package->id,
        ])->first();

        if ($sub) {
            $sub->available = $package->ads;
            $sub->buy_times = ++$sub->buy_times;
            $sub->validity  = date("Y-m-d", strtotime('+ ' . $package->dead_line . ' days'));
            $sub->save();
        } else {
            $sub              = new SubscriptionPackage();
            $sub->customer_id = $customer->id;
            $sub->package_id  = $package->id;
            $sub->available   = $package->ads;
            $sub->validity    = date("Y-m-d", strtotime('+ ' . $package->dead_line . ' days'));
            $sub->buy_times   = 1;
            $sub->save();
        }

        Session::flash('message', 'Your subscription successful!!');

        return back();
    }

    public function validCustomer() {
        $customerCheck = Session::get('customerId');
        $customerInfo  = Customer::find($customerCheck);

        return $customerInfo;
    }

    public function postads() {

        if ($this->validCustomer()) {
            $sp       = SubscriptionPackage::where('customer_id', Session::get('customerId'))->where('available', '!=', 0)->where('validity', '>=', today())->pluck('package_id')->toArray();
            $packages = Package::whereIn('id', $sp)->get();

            return view('frontEnd.customer.postads', compact('packages'));
        } else {
            Toastr::success('message', 'Login first!');

            return redirect('customer/login');
        }

    }

    public function adspublished(Request $request) {
        // return $request->all();
        $this->validate($request, [
            'title'       => 'required',
            'category'    => 'required',
            'subcategory' => 'required',
            'division_id' => 'required',
            'dist_id'     => 'required',
            'thana_id'    => 'required',
            'union_id'    => 'required',
            'brand'       => 'required',
            'phone'       => 'required',
            'version'     => 'required',
            'price'       => 'required',
            'image'       => 'required|max:7168',
            'video'       => 'nullable|max:10,240|mimes:mp4,mvk,mov',
            'description' => 'required',

        ]);

        if ($request->package_id) {
            $sub = SubscriptionPackage::where('customer_id', Session::get('customerId'))->where('available', '!=', 0)->where('validity', '>=', today())->first();

            if ($sub) {
                $sub->available = $sub->available - 1;
                $sub->save();
            } else {
                Toastr::success('message', 'Pacakge Need!');

                return back();
            }

        }

        if ($request->hasFile('video')) {

            $image_file = $request->file('video');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'uploads/advertisment/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $store_data                        = new Advertisment();
        $store_data->title                 = $request->title;
        $store_data->slug                  = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $store_data->package_id            = $request->package_id;
        $store_data->category_id           = $request->category;
        $store_data->subcategory_id        = $request->subcategory;
        $store_data->childcategory_id      = $request->childcategory;
        $store_data->division_id           = $request->division_id;
        $store_data->dist_id               = $request->dist_id;
        $store_data->thana_id              = $request->thana_id;
        $store_data->union_id              = $request->union_id;
        $store_data->price_ng              = $request->price_ng;
        $store_data->village_id            = $request->village_id;
        $store_data->division_subcity_id   = $request->division_subcity_id;
        $store_data->division_childcity_id = $request->division_childcity_id;
        $store_data->district_subcity_id   = $request->district_subcity_id;
        $store_data->district_childcity_id = $request->district_childcity_id;
        $store_data->thana_subcity_id      = $request->thana_subcity_id;
        $store_data->thana_childcity_id    = $request->thana_childcity_id;
        $store_data->phone                 = $request->phone;
        $store_data->email                 = $request->email;
        $store_data->version               = $request->version;
        $store_data->brand                 = $request->brand;
        $store_data->price                 = $request->price;
        $store_data->full_address          = $request->full_address;
        $store_data->adsduration           = $sub->validity ?? today();
        $store_data->status                = 0;
        $store_data->request               = 1;
        $store_data->description           = $request->description;
        $store_data->video                 = $final_name1 ?? null;
        $store_data->customer_id           = Session::get('customerId');
        $store_data->save();

        $ads_id = $store_data->id;
        $images = $request->file('image');

        foreach ($request->a_title as $key => $value) {

            if ($value == null || $request->a_detail[$key] == null) {
                continue;
            }

            AdditionalDetail::create([
                'advertisment_id' => $store_data->id,
                'title'           => $value,
                'detail'          => $request->a_detail[$key],
            ]);
        }

        foreach ($images as $image) {
            // image01 upload
            $name       = time() . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/advertisment/';
            $imageUrl   = $uploadpath . $name;
            $img        = Image::make($image->getRealPath());
            $img->orientate();
            $width                                  = 695; // your max width
            $height                                 = 325; // your max height
            $img->height() > $img->width() ? $width = null : $height = null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

// paste another image

            $watermark = 'uploads/watermark.png';
            $img->insert($watermark, 'bottom-right', 20, 20);
            $img->save($imageUrl);

            $proimage         = new Adsimage();
            $proimage->ads_id = $ads_id;
            $proimage->image  = $imageUrl;
            $proimage->save();
        }

        Toastr::success('message', 'Advertisment upload successfully!');

        return redirect('customer/0/control-panel/manage-my-ads');
    }

    public function myads() {

        if ($this->validCustomer()) {
            $manageads = DB::table('advertisments')
                ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                ->where('advertisments.customer_id', Session::get('customerId'))
                ->orderBy('advertisments.id', 'DESC')
                ->select('advertisments.*', 'categories.en_name', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name')
                ->orderBy('id', 'desc')
                ->get();

            return view('frontEnd.customer.myads', compact('manageads'));
        } else {
            return redirect('customer/login');
        }

    }

    public function editads($id) {
        $edit_data = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->where('advertisments.customer_id', Session::get('customerId'))
            ->select('advertisments.*', 'categories.en_name', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name')
            ->where(['advertisments.id' => $id])
            ->first();

        $sp       = SubscriptionPackage::where('customer_id', Session::get('customerId'))->where('available', '!=', 0)->where('validity', '>=', today())->pluck('package_id')->toArray();
        $packages = Package::whereIn('id', $sp)->get();

        if ($edit_data != NULL) {
            $category    = Category::where('status', '=', '1')->get();
            $categoryId  = Advertisment::find($id)->category_id;
            $subcategory = Subcategory::where('category_id', '=', $categoryId)->get();
            $divisions   = Division::where('status', '=', '1')->get();
            $division_id = Advertisment::find($id)->division_id;
            $district    = District::where('division_id', '=', $division_id)->get();
            $additional  = AdditionalDetail::where('advertisment_id', $id)->get();

            $city = Advertisment::where('id', $id)->first();

            $div_subcity   = DivisionSubcity::where('division_id', $city->division_id)->get();
            $dist_subcity  = DistrictSubcity::where('district_id', $city->dist_id)->get();
            $thana_subcity = ThanaSubcity::where('thana_id', $city->thana_id)->get();

            $div_childcity   = DivisionChildcity::where('division_subcity_id', $city->division_subcity_id)->get();
            $dist_childcity  = DistrictChildcity::where('district_subcity_id', $city->district_subcity_id)->get();
            $thana_childcity = ThanaChildcity::where('thana_subcity_id', $city->thana_subcity_id)->get();

            return view('frontEnd.customer.editads', compact('edit_data', 'category', 'subcategory', 'divisions', 'district', 'packages', 'additional', 'div_subcity', 'dist_subcity', 'thana_subcity', 'div_childcity', 'dist_childcity', 'thana_childcity'));
        } else {
            return redirect()->back();
        }

    }

    public function adsupdate(Request $request) {
        $this->validate($request, [
            'title'       => 'required',
            'category'    => 'required',
            'phone'       => 'required',
            'version'     => 'required',
            'price'       => 'required',
            'description' => 'required',

            'video'       => 'nullable|mimes:mp4,mvk,mov',
        ]);

        $update_data = Advertisment::where(['id' => $request->hidden_id, 'customer_id' => Session::get('customerId')])->first();

        if ($request->package_id != $update_data->package_id) {
            $sub            = SubscriptionPackage::where('package_id', $request->package_id)->first();
            $sub->available = $sub->available - 1;
            $sub->save();

            $update_data->adsduration = $sub->validity;
        }

        if ($request->hasFile('video')) {

            $image_file = $request->file('video');

            if ($image_file) {

                $image_path = public_path($update_data->video);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'uploads/advertisment/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $update_data->video = $final_name1;
                $update_data->save();

            }

        }

        $update_data->title                 = $request->title;
        $update_data->slug                  = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $update_data->category_id           = $request->category;
        $update_data->subcategory_id        = $request->subcategory;
        $update_data->childcategory_id      = $request->childcategory;
        $update_data->division_id           = $request->division_id;
        $update_data->dist_id               = $request->dist_id;
        $update_data->thana_id              = $request->thana_id;
        $update_data->union_id              = $request->union_id;
        $update_data->price_ng              = $request->price_ng;
        $update_data->village_id            = $request->village_id;
        $update_data->division_subcity_id   = $request->division_subcity_id;
        $update_data->division_childcity_id = $request->division_childcity_id;
        $update_data->district_subcity_id   = $request->district_subcity_id;
        $update_data->district_childcity_id = $request->district_childcity_id;
        $update_data->thana_subcity_id      = $request->thana_subcity_id;
        $update_data->thana_childcity_id    = $request->thana_childcity_id;
        $update_data->phone                 = $request->phone;
        $update_data->email                 = $request->email;
        $update_data->version               = $request->version;
        $update_data->brand                 = $request->brand;
        $update_data->price                 = $request->price;
        $update_data->full_address          = $request->full_address;
        $update_data->status                = 1;
        $update_data->request               = 0;
        $update_data->description           = $request->description;
        $update_data->customer_id           = $request->customer;
        $update_data->package_id            = $request->package_id;
        $update_data->save();

        $additional = AdditionalDetail::where('advertisment_id', $update_data->id)->get();

        foreach ($additional as $a) {
            $a->delete();
        }

        foreach ($request->a_title as $key => $value) {

            if ($value == null || $request->a_detail[$key] == null) {
                continue;
            }

            AdditionalDetail::create([
                'advertisment_id' => $update_data->id,
                'title'           => $value,
                'detail'          => $request->a_detail[$key],
            ]);
        }

        $ads_id        = $update_data->id;
        $update_images = Adsimage::where('id', $request->hidden_img)->get();
        $images        = $request->file('image');

        if ($images) {

            foreach ($images as $image) {

                $name       = time() . '-' . $image->getClientOriginalName();
                $uploadpath = 'uploads/advertisment/';
                $imageUrl   = $uploadpath . $name;
                $img        = Image::make($image->getRealPath());
                $img->orientate();
                $width                                  = 695; // your max width
                $height                                 = 325; // your max height
                $img->height() > $img->width() ? $width = null : $height = null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

// paste another image

                $watermark = 'uploads/watermark.png';
                $img->insert($watermark, 'bottom-right', 20, 20);
                $img->save($imageUrl);

                $newimage         = new Adsimage();
                $newimage->ads_id = $ads_id;
                $newimage->image  = $imageUrl;
                $newimage->save();
            }

        } else {

            foreach ($update_images as $update_image) {
                $update_image->image = $update_image->image;
                $update_image->save();
            }

        }

        Toastr::success('message', 'Advertisment update successfully!');

        return redirect('customer/0/control-panel/manage-my-ads');
    }

    public function adsimagedel($id) {
        $delete_img = Adsimage::find($id);
        $delete_img->delete();
        Toastr::success('message', 'advertisments image  delete successfully!');

        return redirect()->back();
    }

    public function adsPremium(Request $request) {
        $find_ads          = Advertisment::where(['id' => $request->hidden_id, 'customer_id' => Session::get('customerId')])->first();
        $find_ads->premium = 2;
        $find_ads->save();
        Toastr::success('message', 'advertisments image  delete successfully!');

        return redirect()->back();
    }

    public function deleteads($slug, $id) {
        $delete_img = Advertisment::where(['id' => $id, 'customer_id' => Session::get('customerId')])->first();
        $delete_img->delete();
        $delete_img    = $delete_img->id;
        $delete_images = Adsimage::where('ads_id', $delete_img)->get();

        foreach ($delete_images as $delete_image) {
            $delete_id  = $delete_image->id;
            $delete_img = Adsimage::where('id', $delete_id);
            $delete_img->delete();
        }

        Toastr::success('message', 'advertisments  delete successfully!');

        return redirect()->back();
    }

    // ********************************************************** rest api function *************************************************************

    public function api_adspublished(Request $request) {
        // return $request->all();

        $request_id = Advertisment::orderBy('id', 'DESC')->first();

        if ($request_id != NULL) {
            $base1  = 1;
            $base   = $request_id->id;
            $ads_id = $base1 + $base;
        } else {
            $base1  = 1;
            $base   = 0;
            $ads_id = $base1 + $base;
        }

        $membership = Customer::where('membership', '1')->where('id', $request->id)->get();

        if ($membership == NULL) {
            $adrequest = 0;
            $status    = 0;
            $duration  = NULL;
        } else {
            $adrequest = 1;
            $status    = 1;
            $duration  = date('Y-m-d', strtotime('1 month'));
        }

        $store_data                 = new Advertisment();
        $store_data->title          = $request->title;
        $store_data->slug           = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $store_data->category_id    = $request->category;
        $store_data->subcategory_id = $request->subcategory;
        $store_data->division_id    = $request->division_id;
        $store_data->dist_id        = $request->dist_id;
        $store_data->thana_id       = $request->thana_id;
        $store_data->union_id       = $request->union_id;
        $store_data->phone          = $request->phone;
        $store_data->email          = $request->email;
        $store_data->phone          = $request->phone;
        $store_data->version        = $request->version;
        $store_data->type           = $request->type;
        $store_data->brand          = $request->brand;
        $store_data->model          = $request->model;
        $store_data->edition        = $request->edition;
        $store_data->feature        = $request->feature;
        $store_data->price          = $request->price;
        $store_data->full_address   = $request->full_address;
        $store_data->adsduration    = $duration;
        $store_data->request        = $adrequest;
        $store_data->status         = $status;
        $store_data->ads_id         = $ads_id;
        $store_data->description    = $request->description;
        $store_data->customer_id    = $request->id;

        $store_data->save();

        $ads_id = $store_data->id;
        $images = $request->file('image');

        foreach ($images as $image) {
            // image01 upload
            $name       = time() . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/advertisment/';
            $imageUrl   = $uploadpath . $name;
            $img        = Image::make($image->getRealPath());
            $img->orientate();
            $width                                  = 695; // your max width
            $height                                 = 325; // your max height
            $img->height() > $img->width() ? $width = null : $height = null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

// paste another image

// $watermark = 'frontEnd/images/watermark.png';
            // $img->insert($watermark,'bottom-right', 20, 20);
            $img->save($imageUrl);

            $proimage         = new Adsimage();
            $proimage->ads_id = $ads_id;
            $proimage->image  = $imageUrl;
            $proimage->save();
        }

        return response()->json(['message' => 'Advertisment upload successfully!', 'status' => 'ok'], 200);
    }

    public function all_customer_ads($id) {

        if ($id) {
            $manageads = DB::table('advertisments')
                ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                ->where('advertisments.customer_id', $id)
                ->orderBy('advertisments.id', 'DESC')
                ->select('advertisments.*', 'categories.name', 'subcategories.subcategoryName', 'divisions.name as division_name', 'districts.dist_name')
                ->get();

            return response()->json(['data' => $manageads, 'status' => 'ok'], 200);
        } else {
            return response()->json(['message' => 'please login first!', 'status' => 'fales'], 403);
        }

    }

    public function ads_edit($id) {
        $edit_data = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')

            ->select('advertisments.*', 'categories.name', 'subcategories.subcategoryName', 'divisions.name as division_name', 'districts.dist_name')
            ->where(['advertisments.id' => $id])
            ->first();

        if ($edit_data != NULL) {
            $category    = Category::where('status', '=', '1')->get();
            $categoryId  = Advertisment::find($id)->category_id;
            $subcategory = Subcategory::where('category_id', '=', $categoryId)->get();
            $divisions   = Division::where('status', '=', '1')->get();
            $division_id = Advertisment::find($id)->division_id;
            $district    = District::where('division_id', '=', $division_id)->get();

            return response()->json(['divisions' => $divisions, 'edit_data' => $edit_data, 'category' => $category, 'subcategory' => $subcategory, 'district' => $district, 'status' => 'ok'], 200);

        } else {
            return response()->json(['message' => 'please login first!', 'status' => 'fales'], 403);
        }

    }

    public function api_adsupdate(Request $request) {

        $request_id = Advertisment::orderBy('id', 'DESC')->first();

        if ($request_id != NULL) {
            $base1  = 1;
            $base   = $request_id->id;
            $ads_id = $base1 + $base;
        } else {
            $base1  = 1;
            $base   = 0;
            $ads_id = $base1 + $base;
        }

        $update_data                 = Advertisment::where('id', $request->ads_id)->first();
        $update_data->title          = $request->title;
        $update_data->slug           = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $update_data->category_id    = $request->category_id;
        $update_data->subcategory_id = $request->subcategory_id;
        $update_data->division_id    = $request->division_id;
        $update_data->dist_id        = $request->dist_id;
        $update_data->thana_id       = $request->thana_id;
        $update_data->union_id       = $request->union_id;
        $update_data->phone          = $request->phone;
        $update_data->email          = $request->email;
        $update_data->phone          = $request->phone;
        $update_data->version        = $request->version;
        $update_data->brand          = $request->brand;
        $update_data->model          = $request->model;
        $update_data->edition        = $request->edition;
        $update_data->feature        = $request->feature;
        $update_data->type           = $request->type;
        $update_data->price          = $request->price;
        $update_data->full_address   = $request->full_address;
        $update_data->request        = 0;
        $update_data->ads_id         = $request->ads_id;
        $update_data->description    = $request->description;
        $update_data->customer_id    = $update_data->customer_id;

        $update_data->save();

        $ads_id        = $update_data->id;
        $update_images = Adsimage::where('id', $request->ads_id)->get();
        $images        = $request->file('image');

        if ($images) {

            foreach ($images as $image) {

                $name       = time() . '-' . $image->getClientOriginalName();
                $uploadpath = 'uploads/advertisment/';
                $imageUrl   = $uploadpath . $name;
                $img        = Image::make($image->getRealPath());
                $img->orientate();
                $width                                  = 695; // your max width
                $height                                 = 325; // your max height
                $img->height() > $img->width() ? $width = null : $height = null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

// paste another image

// $watermark = 'frontEnd/images/watermark.png';
                // $img->insert($watermark,'bottom-right', 20, 20);
                $img->save($imageUrl);

                $newimage         = new Adsimage();
                $newimage->ads_id = $ads_id;
                $newimage->image  = $imageUrl;
                $newimage->save();
            }

        } else {

            foreach ($update_images as $update_image) {
                $update_image->image = $update_image->image;
                $update_image->save();
            }

        }

        return response()->json(['data' => 'Advertisment update successfully!', 'status' => 'ok'], 200);

    }

    public function ads_delete($id) {
        $delete_img = Advertisment::where('id', $id)->first();
        $delete_img->delete();

        $delete_images = Adsimage::where('ads_id', $id)->get();

        foreach ($delete_images as $delete_image) {
            $delete_id  = $delete_image->id;
            $delete_img = Adsimage::where('id', $delete_id);
            $delete_img->delete();
        }

        return response()->json(['message' => 'advertisments  delete successfully!', 'status' => 'ok'], 200);
    }

}
