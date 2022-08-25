<?php

namespace App\Http\Controllers\Editor;

use App\DivisionChildcity;
use App\DivisionSubcity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionChildcityController extends Controller
{
    public function index() {
        $cities = DivisionChildcity::all();

        return view('backEnd.div_child_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $divisionsubcity = DivisionSubcity::all();

        return view('backEnd.div_child_city.create', compact('divisionsubcity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        DivisionChildcity::create($request->all());

        Toastr::success('Division child city added!!');

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
        $divisionsubcity = DivisionSubcity::all();
        $city = DivisionChildcity::find($id);

        return view('backEnd.div_child_city.edit', compact('divisionsubcity','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = DivisionChildcity::find($id);
        $city->update($request->all());

        Toastr::success('Division child city updated!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = DivisionChildcity::find($id);
        $city->delete();
        Toastr::success('Division child city deleted!!');

        return back();
    }
}
