<?php

namespace App\Http\Controllers\editor;
use App\Http\Controllers\Controller;
use App\Package;
use App\PackageDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PackageController extends Controller {
    public function create() {
        return view('backEnd.package.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'en_name'   => 'required',
            'bn_name'   => 'required',
            'price'     => 'required',
            'ads'       => 'required',
            'dead_line' => 'required',
            'status'    => 'required',
        ]);

        $store_data            = new Package();
        $store_data->en_name   = $request->en_name;
        $store_data->bn_name   = $request->bn_name;
        $store_data->price     = $request->price;
        $store_data->ads       = $request->ads;
        $store_data->dead_line = $request->dead_line;
        $store_data->type      = $request->type;
        $store_data->status    = $request->status;
        $store_data->save();

        foreach ($request->details as $key => $detail) {
            PackageDetail::create([
                'en_title'   => $detail,
                'bn_title'   => $request->bn_title[$key],
                'package_id' => $store_data->id,
            ]);
        }

        Toastr::success('message', 'Package add successfully!');

        return redirect('editor/package/manage');
    }

    public function manage() {
        $show_data = Package::orderBy('id', 'DESC')->get();

        return view('backEnd.package.manage', compact('show_data'));
    }

    public function edit($id) {
        $edit_data = Package::where('id', $id)->with('packageDetails')->first();

        return view('backEnd.package.edit', compact('edit_data'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'en_name'   => 'required',
            'bn_name'   => 'required',
            'price'     => 'required',
            'ads'       => 'required',
            'dead_line' => 'required',
            'status'    => 'required',
        ]);
        $update_data            = Package::find($request->hidden_id);
        $update_data->en_name   = $request->en_name;
        $update_data->bn_name   = $request->bn_name;
        $update_data->price     = $request->price;
        $update_data->ads       = $request->ads;
        $update_data->dead_line = $request->dead_line;
        $update_data->type      = $request->type;
        $update_data->status    = $request->status;
        $update_data->save();

        foreach ($request->details as $key => $detail) {

            if (is_null($detail)) {
                continue;
            }

            PackageDetail::create([
                'en_title'   => $detail,
                'bn_title'   => $request->bn_title[$key],
                'package_id' => $update_data->id,
            ]);
        }

        Toastr::success('message', 'Package Update successfully!');

        return redirect('editor/package/manage');
    }

    public function inactive(Request $request) {
        $inactive_data         = Package::find($request->hidden_id);
        $inactive_data->status = 0;
        $inactive_data->save();
        Toastr::success('message', 'Package inactive successfully!');

        return redirect('editor/package/manage');
    }

    public function active(Request $request) {
        $active_data         = Package::find($request->hidden_id);
        $active_data->status = 1;
        $active_data->save();
        Toastr::success('message', 'Package active successfully!');

        return redirect('editor/package/manage');
    }

}
