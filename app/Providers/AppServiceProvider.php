<?php

namespace App\Providers;
use App\Advertisment;
use App\Category;
use App\Childcategory;
use App\Customer;
use App\District;
use App\Division;
use App\Logo;
use App\Pagecategory;
use App\Socialmedia;
use App\Subcategory;
use App\Thana;
use App\Union;
use App\Village;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $social = Socialmedia::find(1);
        view()->share(['social' => $social]);
        $locale = session('language') ?? app()->getLocale();
        Schema::defaultStringLength(191);
        $categories = Category::where('status', 1)->get();
        view()->share('categories', $categories);
        $subcategories = Subcategory::where('status', 1)->get();
        view()->share('subcategories', $subcategories);
        // childcategories
        $childcategory = Childcategory::where('status', 1)->get();
        view()->share('childcategory', $childcategory);
        $faveicon = Logo::where(['status' => 1, 'type' => 3])->limit(1, 0)->get();
        view()->share('faveicon', $faveicon);
        // wlogo
        $wlogo = Logo::where(['status' => 1, 'type' => 1])->limit(1, 0)->get();
        view()->share('wlogo', $wlogo);
        // wlogo
        $dlogo = Logo::where(['status' => 1, 'type' => 2])->limit(1, 0)->get();
        view()->share('dlogo', $dlogo);
        // dlogo
        $divisions = Division::where('status', 1)->with(['ads' => function ($query) {
            return $query->where('status', 1)->where('request', 1)->where('adsduration', '>=', today())->get();
        }])->get();
        view()->share('divisions', $divisions);
        // Division
        $districts = District::where('status', 1)->get();
        view()->share('districts', $districts);
        // District
        $thanas = Thana::where('status', 1)->get();
        view()->share('thanas', $thanas);
        // area
        $unions = Union::where('status', 1)->get();
        view()->share('unions', $unions);
        $villages = Village::where('status', 1)->get();
        view()->share('villages', $villages);
        // area
        $aboutcompanies = Pagecategory::where(['status' => 1])->get();
        view()->share('aboutcompanies', $aboutcompanies);
        //package name
        $packagesname = DB::table('packages')->get();
        view()->share('packagesname', $packagesname);
        // aboutcompanies
        $adsimage = DB::table('adsimages')
            ->join('advertisments', 'adsimages.ads_id', '=', 'advertisments.id')
            ->select('advertisments.title', 'adsimages.*')
            ->orderBy('adsimages.id', 'DESC')
            ->get();
        view()->share('adsimage', $adsimage);

        $nilamadsimage = DB::table('nilamimages')
            ->join('nilams', 'nilamimages.nilam_id', '=', 'nilams.id')
            ->select('nilams.title', 'nilamimages.*')
            ->orderBy('nilamimages.id', 'DESC')
            ->get();
        view()->share('nilamadsimage', $nilamadsimage);

        $nilamads = DB::table('nilams')->count();
        view()->share('nilamads', $nilamads);

        // adsimage
        $customerslist = Customer::get();
        view()->share('customerslist', $customerslist);
        $newadsrequest = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->where('advertisments.status', 0)
            ->where('advertisments.request', 1)
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as divisionname', 'districts.en_dist_name', 'customers.name as customername', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->get();
        view()->share('newadsrequest', $newadsrequest);
        // request new ads

        $updateadsrequest = DB::table('advertisments')
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->where('advertisments.status', 1)
            ->where('advertisments.request', 0)
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as divisionname', 'districts.en_dist_name', 'customers.name as customername', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->get();
        view()->share('updateadsrequest', $updateadsrequest);
        // request new ads

        $allads = DB::table('advertisments')
            ->where('advertisments.status', 1)
            ->where('advertisments.request', 1)
            ->where('advertisments.adsduration', '>=', today())
            ->join('categories', 'advertisments.category_id', '=', 'categories.id')
            ->join('subcategories', 'advertisments.subcategory_id', '=', 'subcategories.id')
            ->join('divisions', 'advertisments.division_id', '=', 'divisions.id')
            ->join('districts', 'advertisments.dist_id', '=', 'districts.id')
            ->join('customers', 'advertisments.customer_id', '=', 'customers.id')
            ->select('advertisments.*', 'categories.en_name as catname', 'subcategories.en_subcategoryName', 'divisions.en_name as divisionname', 'districts.en_dist_name', 'customers.name as customername', 'customers.email', 'customers.phone', 'customers.image as customerimage', 'customers.id as customerId')
            ->get();
        view()->share('allads', $allads);
        // request new ads

        $membershiprequest = Customer::where('membership', 3)->get();
        view()->share('membershiprequest', $membershiprequest);
        // request membership

        $cancelshiprequest = Customer::where('membership', 2)->get();
        view()->share('cancelshiprequest', $cancelshiprequest);
        // request membership cancel

        $allmembership = Customer::orWhere('membership', 1)->orWhere('membership', 2)->orWhere('membership', 3)->get();
        view()->share('allmembership', $allmembership);
        // request membership cancel

        $premiumadsquantity = Advertisment::where('adsduration', '<', today())->get();
        view()->share('premiumadsquantity', $premiumadsquantity);
        // request membership cancel
    }
}
