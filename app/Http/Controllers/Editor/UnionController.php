<?php

namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Thana;
use App\Union;
use DB;
class UnionController extends Controller
{
   public function create(){
    	return view('backEnd.union.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
            'en_union_name'=>'required',
            'bn_union_name'=>'required',
            'thana_id'=>'required',
    		'status'=>'required',
    	]);

    	$store_data                    = new Union();
    	$store_data->en_union_name   = $request->en_union_name;
        $store_data->en_slug              =   preg_replace('/\s+/u', '-', trim($request->en_union_name));
        $store_data->bn_union_name   = $request->bn_union_name;
        $store_data->bn_slug              =   preg_replace('/\s+/u', '-', trim($request->bn_union_name));
    	$store_data->thana_id       = $request->thana_id;
    	$store_data->status            = $request->status;
    	$store_data->save();
    	Toastr::success('message', 'Union add successfully!');
    	return redirect('/editor/union/manage');
    }
    public function manage(){
        $show_data = DB::table('unions')
            ->join('thanas', 'unions.thana_id', '=', 'thanas.id')
            ->select('unions.*', 'thanas.en_thana_name')
            ->orderBy('id','DESC')
            ->get();
    	return view('backEnd.union.manage',compact('show_data'));
    }
     public function edit($id){
        $edit_data = Union::find($id);
        $city = Union::where('thana_city',$edit_data->thana_id)->first();
        return view('backEnd.union.edit', compact('edit_data','city'));
    }
      public function update(Request $request){
        $update_data                 =   Union::find($request->hidden_id);
        $update_data->en_union_name   = $request->en_union_name;
        $update_data->en_slug              =   preg_replace('/\s+/u', '-', trim($request->en_union_name));
        $update_data->bn_union_name   = $request->bn_union_name;
        $update_data->bn_slug              =   preg_replace('/\s+/u', '-', trim($request->bn_union_name));
        $update_data->thana_city = $request->thana_city;
        $update_data->thana_id        =    $request->thana_id;
        $update_data->status         =    $request->status;
        $update_data->save();
        Toastr::success('message', 'Union Update successfully!');
        return redirect('editor/union/manage');
    }

    public function inactive(Request $request){
        $inactive = Union::find($request->hidden_id);
        $inactive->status=0;
        $inactive->save();
        Toastr::success('message', 'Union active successfully!');
        return redirect('/editor/union/manage');
    }

    public function active(Request $request){
        $active = Union::find($request->hidden_id);
        $active->status=1;
        $active->save();
        Toastr::success('message', 'Union active successfully!');
        return redirect('/editor/union/manage');
    }
}
