<?php

namespace App\Http\Controllers\Editor;

use App\Division;
use App\DivisionSubcity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisionSubcityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cities = DivisionSubcity::all();

        return view('backEnd.div_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $division = Division::all();

        return view('backEnd.div_city.create', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        DivisionSubcity::create($request->all());

        Toastr::success('Division Subcity added!!');

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
        $division = Division::all();
        $city = DivisionSubcity::find($id);

        return view('backEnd.div_city.edit', compact('division','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = DivisionSubcity::find($id);
        $city->update($request->all());

        Toastr::success('Division Subcity updated!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = DivisionSubcity::find($id);
        $city->delete();
        Toastr::success('Division Subcity deleted!!');

        return back();
    }
}
