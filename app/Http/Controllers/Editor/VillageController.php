<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use App\Village;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class VillageController extends Controller {
    public function create() {
        return view('backEnd.village.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'en_village_name' => 'required',
            'bn_village_name' => 'required',
            'union_id'     => 'required',
            'status'       => 'required',
        ]);

        $store_data               = new Village();
        $store_data->en_village_name = $request->en_village_name;
        $store_data->en_slug         = preg_replace('/\s+/u', '-', trim($request->en_village_name));
        $store_data->bn_village_name = $request->bn_village_name;
        $store_data->bn_slug         = preg_replace('/\s+/u', '-', trim($request->bn_village_name));
        $store_data->union_id     = $request->union_id;
        $store_data->status       = $request->status;
        $store_data->save();
        Toastr::success('message', 'Village add successfully!');

        return redirect('/editor/village/manage');
    }

    public function manage() {
        $show_data = DB::table('villages')
            ->join('unions', 'villages.union_id', '=', 'unions.id')
            ->select('villages.*', 'unions.en_union_name')
            ->orderBy('id', 'DESC')
            ->get();

        return view('backEnd.village.manage', compact('show_data'));
    }

    public function edit($id) {
        $edit_data = Village::find($id);

        return view('backEnd.village.edit', compact('edit_data'));
    }

    public function update(Request $request) {
        $update_data             = Village::find($request->hidden_id);
        $update_data->en_village_name = $request->en_village_name;
        $update_data->en_slug         = preg_replace('/\s+/u', '-', trim($request->en_village_name));
        $update_data->bn_village_name = $request->bn_village_name;
        $update_data->bn_slug         = preg_replace('/\s+/u', '-', trim($request->bn_village_name));
        $update_data->union_id   = $request->union_id;
        $update_data->status     = $request->status;
        $update_data->save();
        Toastr::success('message', 'Village Update successfully!');

        return redirect('editor/village/manage');
    }

    public function inactive(Request $request) {
        $inactive         = Village::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('message', 'Village active successfully!');

        return redirect('/editor/village/manage');
    }

    public function active(Request $request) {
        $active         = Village::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('message', 'Village active successfully!');

        return redirect('/editor/village/manage');
    }
}
