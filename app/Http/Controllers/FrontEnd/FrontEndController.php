<?php

namespace App\Http\Controllers\FrontEnd;
use App\Advertisment;
use App\Category;
use App\Createpage;
use App\Customer;
use App\District;
use App\DistrictChildcity;
use App\DistrictSubcity;
use App\Division;
use App\DivisionChildcity;
use App\DivisionSubcity;
use App\Http\Controllers\Controller;
use App\Nilam;
use App\OpeningHour;
use App\Package;
use App\Pagecategory;
use App\Review;
use App\Subcategory;
use App\Thana;
use App\ThanaChildcity;
use App\ThanaSubcity;
use App\Union;
use App\Village;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller {
    public function allArea() {
        $data              = [];
        $data['divisions'] = Division::with('divisionsubcity', 'districts')->get();

        return view('frontEnd.layouts.front.all-area', $data);
    }

    public function postreview(Request $request) {
        Review::create($request->all());
        Session::flash('message', 'Your review added successfully wait for confirmation!!');

        return back();
    }

    public function searchcategory(Request $request) {
        $subcategory = DB::table("subcategories")
            ->where("category_id", $request->category_id)
            ->pluck('en_subcategoryName', 'id');

        return response()->json($subcategory);
    }

    public function searchildchcategory(Request $request) {
        $childcategory = DB::table("childcategories")
            ->where("subcategory_id", $request->subcategory_id)
            ->pluck('en_childcategoryName', 'id');

        return response()->json($childcategory);
    }

    public function searchdistrict(Request $request) {
        $districts = DB::table("districts")
            ->where("division_id", $request->division_id)
            ->pluck('en_dist_name', 'id');

        return response()->json($districts);
    }

    public function searchthana(Request $request) {
        $thana = DB::table("thanas")
            ->where("district_id", $request->dist_id)
            ->pluck('en_thana_name', 'id');

        return response()->json($thana);
    }

    public function searchunion(Request $request) {
        $union = DB::table("unions")
            ->where("thana_id", $request->thana_id)
            ->pluck('en_union_name', 'id');

        return response()->json($union);
    }

    public function searchvillage(Request $request) {
        $union = DB::table("villages")
            ->where("union_id", $request->union_id)
            ->pluck('en_village_name', 'id');

        return response()->json($union);
    }

    public function divisionsubcity(Request $request) {
        $division_subcity = DB::table("division_subcities")
            ->where("division_id", $request->division_id)
            ->pluck('en_name', 'id');

        return response()->json($division_subcity);
    }

    public function divisionchildcity(Request $request) {
        $division_childcity = DB::table("division_childcities")
            ->where("division_subcity_id", $request->division_subcity_id)
            ->pluck('en_name', 'id');

        return response()->json($division_childcity);
    }

    public function districtsubcity(Request $request) {
        $district_subcity = DB::table("district_subcities")
            ->where("district_id", $request->district_id)
            ->pluck('en_name', 'id');

        return response()->json($district_subcity);
    }

    public function districtchildcity(Request $request) {
        $district_childcity = DB::table("district_childcities")
            ->where("district_subcity_id", $request->district_subcity_id)
            ->pluck('en_name', 'id');

        return response()->json($district_childcity);
    }

    public function thanasubcity(Request $request) {
        $thana_subcity = DB::table("thana_subcities")
            ->where("thana_id", $request->thana_id)
            ->pluck('en_name', 'id');

        return response()->json($thana_subcity);
    }

    public function thanachildcity(Request $request) {
        $thana_childcity = DB::table("thana_childcities")
            ->where("thana_subcity_id", $request->thana_subcity_id)
            ->pluck('en_name', 'id');

        return response()->json($thana_childcity);
    }

    public function index() {
        $data               = [];
        $data['nilam']      = Nilam::where('adsduration', '>=', today())->whereNotNull('package_id')->with('images')->orderBy('id', 'desc')->limit(12)->get();
        $data['member_ads'] = Advertisment::where('adsduration', '>=', today())->whereNotNull('package_id')->where('status', 1)->where('request', 1)->with('images')->orderBy('id', 'desc')->limit(12)->get();
        $data['categories'] = Category::with(['ads' => function ($query) {
            return $query->where('status', 1)->where('request', 1)->where('adsduration', '>=', today())->limit(12)->get();
        },
        ])->get();
        $data['front_category'] = Category::where('on_front', 1)->with(['ads' => function ($query) {
            return $query->where('status', 1)->where('request', 1)->where('adsduration', '>=', today())->orderBy('id', 'desc')->limit(12)->get();
        },
        ])->get();
        $data['new_ads']   = Advertisment::where('adsduration', '>=', today())->where('status', 1)->where('request', 1)->orderBy('id', 'desc')->limit(12)->get();
        $data['total_ads'] = Advertisment::where('adsduration', '>=', today())->where('status', 1)->where('request', 1)->count();
        $data['customer']  = Customer::count();

        $data['divisions'] = Division::where('status', 1)->get();

        $division         = Division::count();
        $district         = District::count();
        $thana            = Thana::count();
        $union            = Union::count();
        $village          = Village::count();

        $div_sub = DivisionSubcity::count();
        $div_child = DivisionChildcity::count();

        $dist_sub = DistrictSubcity::count();
        $dist_child = DistrictChildcity::count();

        $thana_sub =  ThanaSubcity::count();
        $thana_child = ThanaChildcity::count();

        $data['location'] = $division + $district + $thana + $union + $village+$div_sub+$div_child+$dist_sub+$dist_child+$thana_sub+$thana_child;

        return view('frontEnd.layouts.front.index', $data);
    }

    public function category($slug, Request $request) {
        $breadcrumb    = Category::where('slug', $slug)->first();
        $subcategories = Subcategory::where('category_id', $breadcrumb->id)->with('ads')->get();

        if ($breadcrumb) {
            $currentdata = Carbon::now()->format('Y-m-d');

            if ($request->filter == 1) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('version', 1)
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->filter == 2) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('version', 2)
                    ->where('adsduration', '>=', $currentdata)
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 1) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 2) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'ASC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 3) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'ASC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 4) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 4) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } else {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            }

            $sort   = $request->sort;
            $filter = $request->filter;

            return view('frontEnd.layouts.pages.category', compact('advertisments', 'breadcrumb', 'subcategories', 'sort', 'filter'));
        } else {
            return redirect('404');
        }

    }

    public function homesearch(Request $request) {
        $keyword     = $request->keyword;
        $currentdata = Carbon::now()->format('Y-m-d');

        if ($request->filter == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('version', 1)
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('version', 2)
                ->where('adsduration', '>=', $currentdata)
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 3) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } else {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1])
                ->where('title', 'LIKE', '%' . $keyword . "%")
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        }

        $sort       = $request->sort;
        $filter     = $request->filter;
        $breadcrumb = '';

        return view('frontEnd.layouts.pages.searchads', compact('advertisments', 'sort', 'filter', 'breadcrumb'));
    }

    public function subcategory($catslug, $subslug, Request $request) {
        $categoryname  = Category::where('slug', $catslug)->first();
        $breadcrumb    = Subcategory::where('slug', $subslug)->first();
        $subcategories = Subcategory::where('category_id', $categoryname->id)->get();

        if ($breadcrumb) {
            $currentdata = Carbon::now()->format('Y-m-d');

            if ($request->filter == 1) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('version', 1)
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->filter == 2) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('version', 2)
                    ->where('adsduration', '>=', $currentdata)
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 1) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 2) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'ASC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 3) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'ASC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 4) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } elseif ($request->sort == 4) {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('price', 'DESC')
                    ->with('image')
                    ->paginate(25);
            } else {
                $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'subcategory_id' => $breadcrumb->id])
                    ->where('adsduration', '>=', $currentdata)
                    ->orderBy('id', 'DESC')
                    ->with('image')
                    ->paginate(25);
            }

            $sort   = $request->sort;
            $filter = $request->filter;

            return view('frontEnd.layouts.pages.subcategory', compact('advertisments', 'breadcrumb', 'categoryname', 'subcategories', 'sort', 'filter'));
        } else {
            return redirect('404');
        }

    }

    public function allcategory() {
        $allcategory = Category::where('status', 1)->get();

        return view('frontEnd.layouts.pages.allcategory', compact('allcategory', 'breadcrumb'));
    }

    public function locationads($slug, Request $request) {
        $find_division = Division::where('slug', $slug)->first();
        $currentdata   = Carbon::now()->format('Y-m-d');

        if ($request->filter == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('version', 1)
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('version', 2)
                ->where('adsduration', '>=', $currentdata)
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 3) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } else {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'division_id' => $find_division->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        }

        $filter = $request->filter;
        $sort   = $request->sort;

        return view('frontEnd.layouts.pages.locationads', compact('advertisments', 'find_division', 'filter', 'sort'));
    }

    public function thana_ads($division, $district, $thana, Request $request) {
        $finddivision = Division::where('slug', $division)->first();
        $finddistrict = District::where('slug', $district)->first();
        $findthana    = Thana::where('slug', $thana)->first();
        $currentdata  = Carbon::now()->format('Y-m-d');

        if ($request->filter) {

            if ($request->filter == 1) {
                $advertisments = DB::table('advertisments')
                    ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                    ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                    ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                    ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                    ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                    ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                    ->where('advertisments.status', 1)
                    ->where('advertisments.request', 1)
                    ->where('customers.membership', 1)
                    ->where('advertisments.thana_id', $thana->id)
                    ->where('advertisments.adsduration', '>=', $currentdata)
                    ->orderBy('advertisments.id', 'DESC')
                    ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                    ->with('image')
                    ->paginate(25);
            } else {
                $advertisments = DB::table('advertisments')
                    ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                    ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                    ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                    ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                    ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                    ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                    ->where('advertisments.status', 1)
                    ->where('advertisments.request', 1)
                    ->where('customers.membership', 2)
                    ->where('advertisments.thana_id', $thana->id)
                    ->where('advertisments.adsduration', '>=', $currentdata)
                    ->orderBy('advertisments.id', 'DESC')
                    ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                    ->with('image')
                    ->paginate(25);
            }

        } else {
            $advertisments = DB::table('advertisments')
                ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                ->where('advertisments.status', 1)
                ->where('advertisments.request', 1)
                ->where('advertisments.thana_id', $findthana->id)
                ->where('advertisments.adsduration', '>=', $currentdata)
                ->orderBy('advertisments.id', 'DESC')
                ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                ->with('image')
                ->paginate(25);
            // advertisment
        }

        $filter = $request->filter;

        return view('frontEnd.layouts.pages.thanaads', compact('advertisments', 'findthana', 'filter', 'finddivision', 'finddistrict'));
    }

    public function union_ads($division, $district, $thana, $union, Request $request) {
        $finddivision = Division::where('slug', $division)->first();
        $finddistrict = District::where('slug', $district)->first();
        $findthana    = Thana::where('slug', $thana)->first();
        $findunion    = Union::where('slug', $union)->first();
        $currentdata  = Carbon::now()->format('Y-m-d');

        if ($request->filter) {

            if ($request->filter == 1) {
                $advertisments = DB::table('advertisments')
                    ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                    ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                    ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                    ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                    ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                    ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                    ->where('advertisments.status', 1)
                    ->where('advertisments.request', 1)
                    ->where('customers.membership', 1)
                    ->where('advertisments.thana_id', $findunion->id)
                    ->where('advertisments.adsduration', '>=', $currentdata)
                    ->orderBy('advertisments.id', 'DESC')
                    ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                    ->with('image')
                    ->paginate(25);
            } else {
                $advertisments = DB::table('advertisments')
                    ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                    ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                    ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                    ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                    ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                    ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                    ->where('advertisments.status', 1)
                    ->where('advertisments.request', 1)
                    ->where('customers.membership', 2)
                    ->where('advertisments.thana_id', $findunion->id)
                    ->where('advertisments.adsduration', '>=', $currentdata)
                    ->orderBy('advertisments.id', 'DESC')
                    ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                    ->with('image')
                    ->paginate(25);
            }

        } else {
            $advertisments = DB::table('advertisments')
                ->join('categories', 'advertisments.category_id', '=', 'categories.id')
                ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
                ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
                ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
                ->join('thanas', 'advertisments.thana_id', '=', 'thanas.id')
                ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
                ->where('advertisments.status', 1)
                ->where('advertisments.request', 1)
                ->where('advertisments.thana_id', $findthana->id)
                ->where('advertisments.adsduration', '>=', $currentdata)
                ->orderBy('advertisments.id', 'DESC')
                ->select('advertisments.*', 'categories.name as catname', 'subcategories.subcategoryName', 'divisions.name as divi_name', 'districts.dist_name', 'customers.membership')
                ->with('image')
                ->paginate(25);
            // advertisment
        }

        $filter = $request->filter;

        return view('frontEnd.layouts.pages.unionads', compact('advertisments', 'findthana', 'filter', 'finddivision', 'finddistrict', 'findunion'));
    }

    public function allads(Request $request) {
        $currentdata = Carbon::now()->format('Y-m-d');
        $p_id        = Package::where('type', 4)->pluck('id')->toArray();
        $package_ads = Advertisment::whereIn('package_id', $p_id)->where('adsduration', '>=', today())->where('status', 1)->where('request', 1)->orderBy('id', 'desc')->get();

        if ($request->filter == 1) {
            $advertisments = Advertisment::where('version', 1)
                ->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 2) {
            $advertisments = Advertisment::where('version', 2)
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 3) {
            $advertisments = Advertisment::orderBy('price', 'ASC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 4) {
            $advertisments = Advertisment::orderBy('price', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 5) {
            $advertisments = Advertisment::orderBy('id', 'asc')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 6) {
            $advertisments = Advertisment::whereNotNull('package_id')->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->location) {
            $advertisments = Advertisment::where('division_id', $request->location)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->category) {
            $advertisments = Advertisment::where('category_id', $request->category)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->subcategory) {
            $advertisments = Advertisment::where('subcategory_id', $request->subcategory)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->childcategory) {
            $advertisments = Advertisment::where('childcategory_id', $request->childcategory)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->division) {
            $advertisments = Advertisment::where('division_id', $request->division)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->district) {
            $advertisments = Advertisment::where('dist_id', $request->district)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->thana) {
            $advertisments = Advertisment::where('thana_id', $request->thana)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->union) {
            $advertisments = Advertisment::where('union_id', $request->union)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->village) {
            $advertisments = Advertisment::where('village_id', $request->village)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->division_subcity) {
            $advertisments = Advertisment::where('division_subcity_id', $request->division_subcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->division_childcity) {
            $advertisments = Advertisment::where('division_childcity_id', $request->division_childcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->district_subcity) {
            $advertisments = Advertisment::where('district_subcity_id', $request->district_subcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->district_childcity) {
            $advertisments = Advertisment::where('district_childcity_id', $request->district_childcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->thana_subcity) {
            $advertisments = Advertisment::where('thana_subcity_id', $request->thana_subcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->thana_childcity) {
            $advertisments = Advertisment::where('thana_childcity_id', $request->thana_childcity)->orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } elseif ($request->all_bangladesh) {
            $advertisments = Advertisment::orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        } else {
            $advertisments = Advertisment::orderBy('id', 'DESC')
                ->where('adsduration', '>=', today())
                ->where('status', 1)->where('request', 1)
                ->with('image')
                ->paginate(25);
        }

        $sort   = $request->sort;
        $filter = $request->filter;

        return view('frontEnd.layouts.front.ads', compact('advertisments', 'filter', 'sort', 'package_ads'));
    }

    public function customerPost($locale, $id) {
        $advertisments = Advertisment::where('customer_id', $id)
            ->orderBy('id', 'DESC')
            ->where('adsduration', '>=', today())
            ->with('image')
            ->paginate(25);
        $customer = Customer::find($id);
        $open     = OpeningHour::where('customer_id', $id)->get();

        return view('frontEnd.layouts.front.customer-post', compact('open', 'advertisments', 'customer'));
    }

    public function details($o, $id) {
        $ads = Advertisment::where('id', $id)->where('adsduration', '>=', today())->where('status', 1)->where('request', 1)->with('additionaldetails')->first();

        if (!$ads) {
            return back();
        }

        $customer    = Customer::find($ads->customer_id);
        $reviews     = Review::where('ad_id', $id)->where('status', 1)->get();
        $checkreview = Review::where('customer_id', session('customerId'))->where('ad_id', $id)->first();

        $shareButtons = \Share::page(
            url(app()->getLocale().'/details/'.$ads->id),
            $ads->title,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        return view('frontEnd.layouts.front.ad-details', compact('ads', 'customer', 'reviews', 'checkreview','shareButtons'));

    }

    public function search(Request $request) {
        $search                = $request->input('search');
        $data                  = [];
        $data['advertisments'] = Advertisment::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->where('adsduration', '>=', today())
            ->where('status', 1)
            ->where('request', 1)
            ->paginate(28);

        return view('frontEnd.layouts.front.search', $data);

    }

    public function nilamsearch(Request $request) {
        $search                = $request->input('search');
        $data                  = [];
        $data['advertisments'] = Nilam::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->where('adsduration', '>=', today())
            ->paginate(28);

        return view('frontEnd.layouts.front.nilamsearch', $data);

    }

    public function pricing() {
        $price  = Package::with('packageDetails')->get();
        $wallet = Customer::where('id', session('customerId'))->first()->wallet ?? 0;

        return view('frontEnd.layouts.front.package', compact('price', 'wallet'));
    }

    public function pageDetails($locale, $slug) {
        $page = Pagecategory::where('slug', $slug)->first();

        return view('frontend.layouts.front.page-details', compact('page'));
    }

    public function footerpage($slug) {
        $content = Createpage::where('slug', $slug)->limit(1, 0)->get();

        return view('frontEnd.layouts.pages.footerpage', compact('content'));
    }

    public function contact() {
        return view('frontEnd.layouts.pages.contact');
    }

    public function support() {
        return view('frontEnd.layouts.pages.support');
    }

    // ******************************************************** rest api ********************************************************

    public function api_homesearch(Request $request) {
        $keyword     = $request->keyword;
        $currentdata = Carbon::now()->format('Y-m-d');

        if ($request->filter == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('version', 1)
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->filter == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('version', 2)
                ->where('adsduration', '>=', $currentdata)
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 1) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 2) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 3) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'ASC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } elseif ($request->sort == 4) {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1, 'category_id' => $breadcrumb->id])
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('price', 'DESC')
                ->with('image')
                ->paginate(25);
        } else {
            $advertisments = Advertisment::where(['status' => 1, 'request' => 1])
                ->where('title', 'LIKE', '%' . $keyword . "%")
                ->where('adsduration', '>=', $currentdata)
                ->orderBy('id', 'DESC')
                ->with('image')
                ->paginate(25);
        }

        $sort       = $request->sort;
        $filter     = $request->filter;
        $breadcrumb = '';

        return response()->json(['data' => $advertisments, 'sort' => $sort, 'filter' => $filter, 'breadcrumb' => $breadcrumb, 'status' => 'ok'], 200);

    }

}
