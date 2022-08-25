<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thana;
use App\ThanaSubcity;

class ThanaSubcityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cities = ThanaSubcity::all();

        return view('backEnd.thana_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $thana = Thana::all();

        return view('backEnd.thana_city.create', compact('thana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        ThanaSubcity::create($request->all());

        Toastr::success('Thana subcity added!!');

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
        $thana = Thana::all();
        $city = ThanaSubcity::find($id);

        return view('backEnd.thana_city.edit', compact('thana','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = ThanaSubcity::find($id);
        $city->update($request->all());

        Toastr::success('Thana subcity updated!!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = ThanaSubcity::find($id);
        $city->delete();
        Toastr::success('Thana subcity deleted!!');

        return back();
    }
}
