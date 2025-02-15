<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Pagecategory;
class PagecategoryController extends Controller
{
    public function create(){
    	return view('backEnd.pagecategory.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'en_pagename'=>'required',
            'bn_pagename'=>'required',
            'en_text'=>'required',
            'bn_text'=>'required',
    	]);

    	$store_data                    = new Pagecategory();
    	$store_data->en_pagename          = $request->en_pagename;
    	$store_data->bn_pagename          = $request->bn_pagename;
        $store_data->slug              = strtolower(preg_replace('/\s+/u', '-', trim($request->en_pagename)));
    	$store_data->en_text           = $request->en_text;
    	$store_data->bn_text           = $request->bn_text;
    	$store_data->save();
    	Toastr::success('message', 'Page add successfully!');
    	return redirect('/editor/pagecategory/manage');
    }
    public function manage(){
    	$show_data=Pagecategory::get();
    	return view('backEnd.pagecategory.manage',compact('show_data'));
    }
     public function edit($id){
        $edit_data = Pagecategory::find($id);
        return view('backEnd.pagecategory.edit', compact('edit_data'));
    }
      public function update(Request $request){
        $update_data                     =    Pagecategory::find($request->hidden_id);
        $update_data->en_pagename          = $request->en_pagename;
    	$update_data->bn_pagename          = $request->bn_pagename;
        $update_data->slug              = strtolower(preg_replace('/\s+/u', '-', trim($request->en_pagename)));
    	$update_data->en_text           = $request->en_text;
    	$update_data->bn_text           = $request->bn_text;
        $update_data->save();
        Toastr::success('message', 'Pagecategory Update successfully!');
        return redirect('editor/pagecategory/manage');
    }

    public function inactive(Request $request){
        $inactive = Pagecategory::find($request->hidden_id);
        $inactive->status=0;
        $inactive->save();
        Toastr::success('message', 'Pagecategory active successfully!');
        return redirect('/editor/pagecategory/manage');
    }

    public function active(Request $request){
        $active = Pagecategory::find($request->hidden_id);
        $active->status=1;
        $active->save();
        Toastr::success('message', 'Pagecategory active successfully!');
        return redirect('/editor/pagecategory/manage');
    }
}
