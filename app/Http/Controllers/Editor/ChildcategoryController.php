<?php

namespace App\Http\Controllers\Editor;

use App\Childcategory;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class ChildcategoryController extends Controller {
    public function create() {
        $subcategory = Subcategory::where('status', 1)->get();

        return view('backEnd.childcategory.create', ['subcategory' => $subcategory]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'en_childcategoryName' => 'required',
            'bn_childcategoryName' => 'required',
            'subcategory_id'       => 'required',
            'status'               => 'required',
        ]);

        $store_data                       = new Childcategory();
        $store_data->en_childcategoryName = $request->en_childcategoryName;
        $store_data->en_slug              = preg_replace('/\s+/u', '-', trim($request->en_childcategoryName));
        $store_data->bn_childcategoryName = $request->bn_childcategoryName;
        $store_data->bn_slug              = preg_replace('/\s+/u', '-', trim($request->bn_childcategoryName));
        $store_data->subcategory_id       = $request->subcategory_id;
        $store_data->status               = $request->status;
        $store_data->save();
        Toastr::success('message', 'Childcategory add successfully!');

        return redirect('/editor/childcategory/manage');
    }

    public function manage() {
        $show_data = DB::table('childcategories')
            ->join('subcategories', 'subcategories.id', '=', 'childcategories.subcategory_id')
            ->select('childcategories.*', 'subcategories.en_subcategoryName')
            ->orderBy('id', 'DESC')
            ->get();

        return view('backEnd.childcategory.manage', compact('show_data'));
    }

    public function edit($id) {
        $subcategory = Subcategory::where('status', 1)->get();
        $edit_data   = Childcategory::find($id);

        return view('backEnd.childcategory.edit', ['edit_data' => $edit_data, 'subcategory' => $subcategory]);
    }

    public function update(Request $request) {
        $update_data                       = Childcategory::find($request->hidden_id);
        $update_data->en_childcategoryName = $request->en_childcategoryName;
        $update_data->en_slug              = preg_replace('/\s+/u', '-', trim($request->en_childcategoryName));
        $update_data->bn_childcategoryName = $request->bn_childcategoryName;
        $update_data->bn_slug              = preg_replace('/\s+/u', '-', trim($request->bn_childcategoryName));
        $update_data->subcategory_id       = $request->subcategory_id;
        $update_data->status               = $request->status;
        $update_data->save();
        Toastr::success('message', 'Childcategory Update successfully!');

        return redirect('editor/childcategory/manage');
    }

    public function inactive(Request $request) {
        $inactive         = Childcategory::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('message', 'Childcategory inactive successfully!');

        return redirect('/editor/childcategory/manage');
    }

    public function active(Request $request) {
        $active         = Childcategory::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('message', 'Childcategory active successfully!');

        return redirect('/editor/childcategory/manage');
    }
}
