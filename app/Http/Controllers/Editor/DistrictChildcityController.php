<?php

namespace App\Http\Controllers\Editor;

use App\DistrictChildcity;
use App\DistrictSubcity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictChildcityController extends Controller
{
    public function index() {
        $cities = DistrictChildcity::all();

        return view('backEnd.dist_child_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $districtsubcity = DistrictSubcity::all();

        return view('backEnd.dist_child_city.create', compact('districtsubcity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        DistrictChildcity::create($request->all());

        Toastr::success('District child city added!!');

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
        $districtsubcity = DistrictSubcity::all();
        $city = DistrictChildcity::find($id);

        return view('backEnd.dist_child_city.edit', compact('districtsubcity','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = DistrictChildcity::find($id);
        $city->update($request->all());

        Toastr::success('District child city updated!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = DistrictChildcity::find($id);
        $city->delete();
        Toastr::success('District child city deleted!!');

        return back();
    }
}
