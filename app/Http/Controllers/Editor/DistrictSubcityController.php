<?php

namespace App\Http\Controllers\Editor;

use App\District;
use App\DistrictSubcity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictSubcityController extends Controller
{
    public function index() {
        $cities = DistrictSubcity::all();

        return view('backEnd.dist_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $district = District::all();

        return view('backEnd.dist_city.create', compact('district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        DistrictSubcity::create($request->all());

        Toastr::success('district Subcity added!!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $district = District::all();
        $city = DistrictSubcity::find($id);

        return view('backEnd.dist_city.edit', compact('district','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = DistrictSubcity::find($id);
        $city->update($request->all());

        Toastr::success('district Subcity updated!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = DistrictSubcity::find($id);
        $city->delete();
        Toastr::success('district Subcity deleted!!');

        return back();
    }
}
