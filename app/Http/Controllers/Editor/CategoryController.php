<?php

namespace App\Http\Controllers\editor;
use App\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function create() {
        return view('backEnd.category.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'en_name' => 'required',
            'bn_name' => 'required',
            'image'   => 'required',
            'status'  => 'required',
        ]);
        // image upload
        $file       = $request->file('image');
        $name       = time() . '-' . $file->getClientOriginalName();
        $uploadPath = 'uploads/category/';
        $file->move($uploadPath, $name);
        $fileUrl = $uploadPath . $name;

        $store_data          = new Category();
        $store_data->en_name = $request->en_name;
        $store_data->en_slug = preg_replace('/\s+/u', '-', trim($request->en_name));
        $store_data->bn_name = $request->bn_name;
        $store_data->bn_slug = preg_replace('/\s+/u', '-', trim($request->bn_name));
        $store_data->text    = $request->text;
        $store_data->image   = $fileUrl;
        $store_data->status  = $request->status;
        $store_data->save();
        Toastr::success('message', 'Category add successfully!');

        return redirect('editor/category/manage');
    }

    public function manage() {
        $show_data = Category::orderBy('id', 'DESC')->get();

        return view('backEnd.category.manage', compact('show_data'));
    }

    public function edit($id) {
        $edit_data = Category::find($id);

        return view('backEnd.category.edit', compact('edit_data'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'en_name' => 'required',
            'bn_name' => 'required',
            'status' => 'required',
        ]);
        $update_data = Category::find($request->hidden_id);

        $update_image = $request->file('image');

        if ($update_image) {
            $file       = $request->file('image');
            $name       = time() . '-' . $file->getClientOriginalName();
            $uploadPath = 'uploads/category/';

            $file->move($uploadPath, $name);
            $fileUrl = $uploadPath . $name;
        } else {
            $fileUrl = $update_data->image;
        }

        $update_data->en_name = $request->en_name;
        $update_data->en_slug = preg_replace('/\s+/u', '-', trim($request->en_name));
        $update_data->bn_name = $request->bn_name;
        $update_data->bn_slug = preg_replace('/\s+/u', '-', trim($request->bn_name));
        $update_data->image   = $fileUrl;
        $update_data->status  = $request->status;
        $update_data->save();
        Toastr::success('message', 'Category Update successfully!');

        return redirect('editor/category/manage');
    }

    public function inactive(Request $request) {
        $inactive_data         = Category::find($request->hidden_id);
        $inactive_data->status = 0;
        $inactive_data->save();
        Toastr::success('message', 'Category inactive successfully!');

        return redirect('editor/category/manage');
    }

    public function active(Request $request) {
        $active_data         = Category::find($request->hidden_id);
        $active_data->status = 1;
        $active_data->save();
        Toastr::success('message', 'Category active successfully!');

        return redirect('editor/category/manage');
    }

    public function removeFront(Request $request) {
        $remove_front_data           = Category::find($request->hidden_id);
        $remove_front_data->on_front = 0;
        $remove_front_data->save();
        Toastr::success('message', 'Category remove from front successfully!');

        return redirect('editor/category/manage');
    }

    public function addFront(Request $request) {
        $add_front_data           = Category::find($request->hidden_id);
        $add_front_data->on_front = 1;
        $add_front_data->save();
        Toastr::success('message', 'Category add front successfully!');

        return redirect('editor/category/manage');
    }

}
