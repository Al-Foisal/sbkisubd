<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\News;
class NewsController extends Controller
{
    public function create(){
        $news = News::find(1);
    	return view('backEnd.news.create',compact('news'));
    }
    public function store(Request $request){
    	$this->validate($request,[
            'text'=>'required',
    	]);

    	News::UpdateOrCreate(
            ['id'=>1],
            [
                'text'=>$request->text
            ]
        );
    	Toastr::success('message', 'News saved successfully!');
    	return back();
    }
    public function manage(){
    	$show_data = News::all();
    	return view('backEnd.news.manage',['show_data'=>$show_data]);
    }
    public function edit($id){
        $edit_data =   News::find($id);
        return view('backEnd.news.edit',[
            'edit_data'=>$edit_data
        ]);
    }

    public function update(Request $request){
        $update_data           =   News::find($request->hidden_id);
        $update_data->title     =    $request->title;
        $update_data->text     =    $request->text;
        $update_data->status   =    $request->status;
        $update_data->save();
        Toastr::success('message', 'News Update successfully!');
        return redirect('admin/news/manage');
    }
    public function inactive(Request $request){
        $Unpublished_data           =   News::find($request->hidden_id);
        $Unpublished_data->status   =   0;
        $Unpublished_data->save();
        Toastr::success('message', 'News inactive successfully!');
        return redirect('admin/news/manage');   
    }
    public function active(Request $request){
        $published_data         =   News::find($request->hidden_id);
        $published_data->status =   1;
        $published_data->save();
        Toastr::success('message', 'News active successfully!');
        return redirect('admin/news/manage');   
    }
     public function destroy(Request $request){
        $destroy_id = News::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('message', 'News  delete successfully!');
        return redirect('admin/news/manage');         
    }
}
