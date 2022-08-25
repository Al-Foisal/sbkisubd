<?php

namespace App\Http\Controllers\Editor;

use App\Category;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller {
    public function create() {
        $category = Category::where('status', 1)->get();

        return view('backEnd.subcategory.create', ['category' => $category]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'en_subcategoryName' => 'required',
            'bn_subcategoryName' => 'required',
            'category_id'        => 'required',
            'status'             => 'required',
        ]);

        $store_data                     = new Subcategory();
        $store_data->en_subcategoryName = $request->en_subcategoryName;
        $store_data->en_slug            = preg_replace('/\s+/u', '-', trim($request->en_subcategoryName));
        $store_data->bn_subcategoryName = $request->bn_subcategoryName;
        $store_data->bn_slug            = preg_replace('/\s+/u', '-', trim($request->bn_subcategoryName));
        $store_data->category_id        = $request->category_id;
        $store_data->status             = $request->status;
        $store_data->save();
        Toastr::success('message', 'SubCategory add successfully!');

        return redirect('/editor/subcategory/manage');
    }

    public function manage() {
        $show_data = DB::table('categories')
            ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
            ->select('subcategories.*', 'categories.en_name')
            ->orderBy('id', 'DESC')
            ->get();

        return view('backEnd.subcategory.manage', compact('show_data'));
    }

    public function edit($id) {
        $category  = Category::where('status', 1)->get();
        $edit_data = Subcategory::find($id);

        return view('backEnd.subcategory.edit', ['edit_data' => $edit_data, 'category' => $category]);
    }

    public function update(Request $request) {
        $update_data                     = Subcategory::find($request->hidden_id);
        $update_data->en_subcategoryName = $request->en_subcategoryName;
        $update_data->en_slug            = preg_replace('/\s+/u', '-', trim($request->en_subcategoryName));
        $update_data->bn_subcategoryName = $request->bn_subcategoryName;
        $update_data->bn_slug            = preg_replace('/\s+/u', '-', trim($request->bn_subcategoryName));
        $update_data->category_id        = $request->category_id;
        $update_data->status             = $request->status;
        $update_data->save();
        Toastr::success('message', 'Subcategory Update successfully!');

        return redirect('editor/subcategory/manage');
    }

    public function inactive(Request $request) {
        $inactive         = Subcategory::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('message', 'Subcategory active successfully!');

        return redirect('/editor/subcategory/manage');
    }

    public function active(Request $request) {
        $active         = Subcategory::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('message', 'Subcategory active successfully!');

        return redirect('/editor/subcategory/manage');
    }
}
