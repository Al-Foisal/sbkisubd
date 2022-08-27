<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\ThanaChildcity;
use App\ThanaSubcity;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ThanaChildcityController extends Controller {
    public function index() {
        $cities = ThanaChildcity::all();

        return view('backEnd.thana_child_city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $thanasubcity = ThanaSubcity::all();

        return view('backEnd.thana_child_city.create', compact('thanasubcity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        ThanaChildcity::create($request->all());

        Toastr::success('Thana child city added!!');

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
        $thanasubcity = ThanaSubcity::all();
        $city         = ThanaChildcity::find($id);

        return view('backEnd.thana_child_city.edit', compact('thanasubcity', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $city = ThanaChildcity::find($id);
        $city->update($request->all());

        Toastr::success('Thana child city updated!!');

        return redirect()->route('editor.thanachildcity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $city = ThanaChildcity::find($id);
        $city->delete();
        Toastr::success('Thana child city deleted!!');

        return redirect()->route('editor.thanachildcity.index');
    }
}
