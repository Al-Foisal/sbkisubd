<?php

namespace App\Http\Controllers\Customer;

use App\Adsimage;
use App\Advertisment;
use App\Category;
use App\Customer;
use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use App\Nilam;
use App\Nilamhistories;
use App\Nilamimages;
use App\Package;
use App\Subcategory;
use App\SubscriptionPackage;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use File;
use Illuminate\Http\Request;
use Image;
use Session;

class NilamController extends Controller {

    public function showNilamAds(Request $request) {

        if ($request->filter == 1) {
            $ads = Nilam::where('version', 1)
                ->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->filter == 2) {
            $ads = Nilam::where('version', 2)
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->filter == 3) {
            $ads = Nilam::orderBy('price', 'ASC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->filter == 4) {
            $ads = Nilam::orderBy('price', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->filter == 5) {
            $ads = Nilam::orderBy('id', 'asc')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->filter == 6) {
            $ads = Nilam::whereNotNull('package_id')->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->location) {
            $ads = Nilam::where('division_id', $request->location)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->category) {
            $ads = Nilam::where('category_id', $request->category)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->subcategory) {
            $ads = Nilam::where('subcategory_id', $request->subcategory)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->childcategory) {
            $ads = Nilam::where('childcategory_id', $request->childcategory)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->division) {
            $ads = Nilam::where('division_id', $request->division)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->district) {
            $ads = Nilam::where('dist_id', $request->district)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->thana) {
            $ads = Nilam::where('thana_id', $request->thana)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->union) {
            $ads = Nilam::where('union_id', $request->union)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } elseif ($request->village) {
            $ads = Nilam::where('village_id', $request->village)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        } else {
            $ads = Nilam::orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->with('image', 'nilamhistory')
                ->paginate(25);
        }

        return view('frontEnd.layouts.front.nilam', compact('ads'));
    }

    public function bid(Request $request) {
        $ads = Nilam::find($request->ads_id);

        $record              = new Nilamhistories();
        $record->nilam_id    = $ads->id;
        $record->customer_id = $request->bidder_id;
        $record->bid_price   = $ads->bid_price + $ads->bid_range;
        $record->save();

        $ads->bidder_id = $record->id;
        $ads->bid_price = $request->custom_bid_price ?? ($ads->bid_price + $ads->bid_range);
        $ads->save();

        Toastr::success('message', 'Your Bidding is successfull!');

        return back();
    }

    public function showNilamAdsDetails($id) {
        $ads = Nilam::where('id', $id)->where('adsduration', '>=', today())->with(['nilamhistory' => function ($query) {
            return $query->orderBy('id', 'DESC')->get();
        },
        ])->first();
        $customer = Customer::find($ads->customer_id);

        return view('frontEnd.layouts.front.nilam-details', compact('ads', 'customer'));

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
            
            return view('frontEnd.customer.nilam.postads', compact('packages'));
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
            'description' => 'required',

        ]);

        if ($request->package_id) {
            $sub     = SubscriptionPackage::where('customer_id', Session::get('customerId'))->where('package_id', $request->package_id)->where('available', '!=', 0)->where('validity', '>=', today())->first();
            $package = Package::find($sub->package_id);

            if ($package->type != 2) {
                Toastr::success('message', 'Invalid Package');

                return back();
            }

            if ($sub) {
                $sub->available = $sub->available - 1;
                $sub->save();
            } else {
                Toastr::success('message', 'Pacakge Need!');

                return back();
            }

        }

        $store_data                   = new Nilam();
        $store_data->title            = $request->title;
        $store_data->slug             = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $store_data->package_id       = $request->package_id;
        $store_data->category_id      = $request->category;
        $store_data->subcategory_id   = $request->subcategory;
        $store_data->childcategory_id = $request->childcategory;
        $store_data->division_id      = $request->division_id;
        $store_data->dist_id          = $request->dist_id;
        $store_data->thana_id         = $request->thana_id;
        $store_data->union_id         = $request->union_id;
        $store_data->village_id       = $request->village_id;
        $store_data->phone            = $request->phone;
        $store_data->version          = $request->version;
        $store_data->brand            = $request->brand;
        $store_data->price            = $request->price;
        $store_data->bid_price        = $request->price;
        $store_data->adsduration      = $request->adsduration ?? $sub->validity;
        $store_data->bid_range        = $request->bid_range;
        $store_data->description      = $request->description;
        $store_data->customer_id      = Session::get('customerId');
        $store_data->save();

        $nilam_id = $store_data->id;
        $images   = $request->file('image');

        foreach ($images as $image) {
            // image01 upload
            $name       = time() . '-' . $image->getClientOriginalName();
            $uploadpath = 'uploads/nilam/';
            $imageUrl   = $uploadpath . $name;
            $img        = Image::make($image->getRealPath());
            $img->orientate();
            $width                                  = 695; // your max width
            $height                                 = 325; // your max height
            $img->height() > $img->width() ? $width = null : $height = null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

            //paste another image

            $watermark = 'uploads/watermark.png';
            $img->insert($watermark, 'bottom-right', 20, 20);
            $img->save($imageUrl);

            $proimage           = new Nilamimages();
            $proimage->nilam_id = $nilam_id;
            $proimage->image    = $imageUrl;
            $proimage->save();
        }

        Toastr::success('message', 'Advertisment upload successfully!');

        return redirect('customer/0/nilam/control-panel/manage-my-ads');
    }

    public function viewnilamdetails($id) {
        $nilam = Nilamhistories::where('nilam_id', $id)->orderBy('id', 'desc')->get();

        return view('frontEnd.customer.nilam.nilamhistories', compact('nilam'));
    }

    public function confirmnilamdetails($id) {
        $nilam = Nilam::where('id', $id)->where('customer_id', session('customerId'))->where('status', 0)->first();

        if (!$nilam) {
            return back();
        }

        $nilam->status = 1;
        $nilam->save();

        Toastr::success('message', 'Nilam confirmed successfully!');

        return back();

    }

    public function myads() {

        if ($this->validCustomer()) {
            $manageads = DB::table('nilams')
                ->join('categories', 'nilams.category_id', '=', 'categories.id')
                ->join('subcategories', 'nilams.subcategory_id', '=', 'subcategories.id')
                ->join('divisions', 'nilams.division_id', '=', 'divisions.id')
                ->join('districts', 'nilams.dist_id', '=', 'districts.id')
                ->where('nilams.customer_id', Session::get('customerId'))
                ->orderBy('nilams.id', 'DESC')
                ->select('nilams.*', 'categories.en_name', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name')
                ->get();

            return view('frontEnd.customer.nilam.myads', compact('manageads'));
        } else {
            return redirect('customer/login');
        }

    }

    public function editads($id) {
        $edit_data = DB::table('nilams')
            ->join('categories', 'nilams.category_id', '=', 'categories.id')
            ->join('subcategories', 'nilams.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'nilams.division_id', '=', 'divisions.id')
            ->join('districts', 'nilams.dist_id', '=', 'districts.id')
            ->where('nilams.customer_id', Session::get('customerId'))
            ->select('nilams.*', 'categories.en_name', 'subcategories.en_subcategoryName', 'divisions.en_name as division_name', 'districts.en_dist_name')
            ->where(['nilams.id' => $id])
            ->first();

        $sp       = SubscriptionPackage::where('customer_id', Session::get('customerId'))->where('available', '!=', 0)->where('validity', '>=', today())->pluck('package_id')->toArray();
        $packages = Package::whereIn('id', $sp)->get();

        if ($edit_data != NULL) {
            $category    = Category::where('status', '=', '1')->get();
            $categoryId  = Nilam::find($id)->category_id;
            $subcategory = Subcategory::where('category_id', '=', $categoryId)->get();
            $divisions   = Division::where('status', '=', '1')->get();
            $division_id = Nilam::find($id)->division_id;
            $district    = District::where('division_id', '=', $division_id)->get();

            return view('frontEnd.customer.nilam.editads', compact('edit_data', 'category', 'subcategory', 'divisions', 'district', 'packages'));
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

        ]);

        $update_data = Nilam::where(['id' => $request->hidden_id, 'customer_id' => Session::get('customerId')])->first();

        if ($request->package_id != $update_data->package_id) {
            $sub = SubscriptionPackage::where('package_id', $request->package_id)->where('available', '!=', 0)->where('validity', '>=', today())->first();

            if ($sub) {
                $package = Package::where('id', $request->package_id)->where('type', 2)->first();

                if (!$package) {
                    return back();
                }

            } else {
                return back();
            }

            $sub->available = $sub->available - 1;
            $sub->save();

            if ($request->adsduration >= $sub->validity) {
                $adsduration = $sub->validity;
            } else {
                $adsduration = $request->adsduration;
            }

            $package = $sub->package_id;
        } else {
            $sub = SubscriptionPackage::where('package_id', $request->package_id)->where('available', '!=', 0)->where('validity', '>=', today())->first();

            if ($sub) {
                $package = Package::where('id', $request->package_id)->where('type', 2)->first();

                if (!$package) {
                    return back();
                }

            } else {
                return back();
            }

            if ($request->adsduration >= $sub->validity) {
                $adsduration = $sub->validity;
            } else {
                $adsduration = $request->adsduration;
            }

            $package = $sub->package_id;
        }

        $update_data->title            = $request->title;
        $update_data->slug             = strtolower(preg_replace('/\s+/u', '-', trim($request->title)));
        $update_data->category_id      = $request->category;
        $update_data->subcategory_id   = $request->subcategory;
        $update_data->childcategory_id = $request->childcategory;
        $update_data->division_id      = $request->division_id;
        $update_data->dist_id          = $request->dist_id;
        $update_data->thana_id         = $request->thana_id;
        $update_data->union_id         = $request->union_id;
        $update_data->village_id       = $request->village_id;
        $update_data->phone            = $request->phone;
        $update_data->version          = $request->version;
        $update_data->brand            = $request->brand;
        $update_data->price            = $request->price;
        $update_data->bid_price        = $request->price;
        $update_data->bid_range        = $request->bid_range;
        $update_data->adsduration      = $adsduration;
        $update_data->description      = $request->description;
        $update_data->customer_id      = $request->customer;
        $update_data->package_id       = $package;
        $update_data->save();

        $nilam_id      = $update_data->id;
        $update_images = Nilamimages::where('id', $request->hidden_img)->get();
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

                $newimage           = new Nilamimages();
                $newimage->nilam_id = $nilam_id;
                $newimage->image    = $imageUrl;
                $newimage->save();
            }

        } else {

            foreach ($update_images as $update_image) {
                $update_image->image = $update_image->image;
                $update_image->save();
            }

        }

        Toastr::success('message', 'Advertisment update successfully!');

        return redirect('customer/0/nilam/control-panel/manage-my-ads');
    }

    public function nilamimagedel($id) {
        $delete_img = Nilamimages::find($id);
        $delete_img->delete();
        Toastr::success('message', 'Image  delete successfully!');

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
        $delete_img = Nilam::where(['id' => $id, 'customer_id' => Session::get('customerId')])->first();
        $delete_img->delete();
        $delete_img    = $delete_img->id;
        $delete_images = Nilamimages::where('nilam_id', $delete_img)->get();

        foreach ($delete_images as $delete_image) {
            $delete_id  = $delete_image->id;
            $delete_img = Nilamimages::where('id', $delete_id);
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
