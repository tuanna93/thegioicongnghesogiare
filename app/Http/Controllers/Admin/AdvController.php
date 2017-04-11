<?php

namespace App\Http\Controllers\Admin;

use App\ImageAdv;
use Dompdf\FrameDecorator\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvController extends Controller
{
    public function getList(){
        $adv = ImageAdv::get();
        return view('admin.main.adv.list',compact('adv'));
    }
    public function postList(Request $request){
        if($request->table_records){
            foreach($request->table_records as $item){
                ImageAdv::destroy($item);
            }
            return redirect('/admin/adv/list.html')->with(['flash_message'=>'Xóa quảng cáo thành công','flash_level'=>'success']);
        }
        else{
            return redirect('/admin/adv/list.html')->with(['flash_message'=>'Chưa chọn quảng cáo  để xóa','flash_level'=>'danger']);
        }
    }
    public function getAdd(){
        return view('admin.main.adv.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
        ],[
           'name.required' => 'Vui lòng nhập tên quảng cáo',
           'image.required' => 'Vui lòng chọn ảnh quảng',
        ]);
        if($request->position == 0){
            return redirect()->back()->with(['flash_message'=>'Bạn chưa chọn vị trí ảnh','flash_level'=>'danger']);
        }
        $adv = new ImageAdv();
        $adv->name = $request->name;
        $adv->image = $request->image;
        $adv->slug =$request->slug;
        $adv->position = $request->position;
        $adv->content = $request->contents;
        $adv->width = $request->width;
        $adv->height = $request->height;
//        $adv->orders = $request->orders;
        if($adv->status == 'on'){
            $adv->status = 1;
        }
        $adv->save();
        return redirect('/admin/adv/list.html')->with(['flash_message'=>'Thêm quảng cáo thành công','flash_level'=>'success']);
    }
    public function getEdit($id){
        $adv = ImageAdv::find($id);
        return view('admin.main.adv.edit',compact('adv'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên quảng cáo',
            'image.required' => 'Vui lòng chọn ảnh quảng',
        ]);
        if($request->position == 0){
            return redirect()->back()->with(['flash_message'=>'Bạn chưa chọn vị trí ảnh','flash_level'=>'danger']);
        }
        $adv = ImageAdv::find($id);
        $adv->name = $request->name;
        $adv->image = $request->image;
        $adv->slug =$request->slug;
        $adv->position = $request->position;
        $adv->content = $request->contents;
        $adv->width = $request->width;
        $adv->height = $request->height;
//        $adv->orders = $request->orders;
        if($adv->status == 'on'){
            $adv->status = 1;
        }
        $adv->save();
        return redirect('/admin/adv/list.html')->with(['flash_message'=>'Sửa quảng cáo thành công','flash_level'=>'success']);
    }
    public function getDelete($id){
        $adv = ImageAdv::find($id);
        $adv->delete();
        return redirect('/admin/adv/list.html')->with(['flash_level'=>'success','flash_message'=>'Xóa quảng cáo thành công']);
    }
}
