<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPost;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatePostsController extends Controller
{
    public function getCateList(){
        $cate = CategoryPost::get();
        return view('admin.main.catepost.list',compact('cate'));
    }
    public function postCateList(Request $request){
        if($request->table_records){
            foreach($request->table_records as $item){
                if(Post::where('cate_id',$item)->get()){
                    Post::where('cate_id',$item)->delete();
                    CategoryPost::destroy($item);
                }
                else{
                    CategoryPost::destroy($item);
                }
            }
            return redirect('/admin/catepost/list.html')->with(['flash_message'=>'Xóa chuyên mục thành công','flash_level'=>'success']);
        }
        else{
            return redirect('/admin/catepost/list.html')->with(['flash_message'=>'Chưa chọn chuyên mục để xóa','flash_level'=>'danger']);
        }
    }
    public function getCateAdd(){
        $cate = CategoryPost::get();
        return view('admin.main.catepost.add',compact('cate'));
    }
    public function postCateAdd(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:category_posts',
            'kieutrang' => 'required'
        ],[
            'name.required' => 'Bạn chưa nhập tên chuyên mục',
            'name.unique' => 'Tên chuyên mục đã tồn tại',
            'kieutrang.required' => 'Vui lòng chọn kiểu tin tức',
        ]);
        $cate = new CategoryPost();
        $cate->name =$request->name;
        $cate->slug =str_slug($request->name, '-');
        $cate->icon = $request->icon;
        $cate->sort_order = 0;
        $cate->parent_id =$request->parent_id;
        $cate->keywords =$request->keywords;
        $cate->description =$request->description;
//        $cate->sort_order = $request->orders;
        if($request->is_menu == 'on'){
            $cate->is_menu = 1;
        }else{
            $cate->is_menu = 0;
        }
        if($request->status == 'on'){
            $cate->status = 1;
        }else{
            $cate->status = 0;
        }
        if($request->kieutrang == 1){
            $cate->is_menu = 0;
        }else{
            $cate->is_menu = 1;
        }
        $cate->save();
        return redirect('/admin/catepost/list.html')->with(['flash_message'=>'Thêm danh mục thành công','flash_level'=>'success']);
    }
    public function getView($slug){
        $cate = CategoryPost::where('slug',$slug)->first();
        return view('admin.main.catepost.view',compact('cate'));
    }
    public function getEdit($slug){
        $cate = CategoryPost::where('slug',$slug)->first();
        $parent = CategoryPost::get();
        return view('admin.main.catepost.edit',compact('cate','parent'));
    }
    public function postEdit(Request $request,$slug){
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên danh mục',
        ]);
        $cate = CategoryPost::where('slug',$slug)->first();
        $cate->name =$request->name;
        $cate->slug =str_slug($request->name, '-');
        if($request->icon != ''){
            $cate->icon = $request->icon;
        }
        $cate->sort_order = 0;
        $cate->parent_id =$request->parent_id;
        $cate->keywords =$request->keywords;
        $cate->description =$request->description;
//        $cate->sort_order = $request->orders;
        if($request->is_menu == 'on'){
            $cate->is_menu = 1;
        }else{
            $cate->is_menu = 0;
        }
        if($request->status == 'on'){
            $cate->status = 1;
        }else{
            $cate->status = 0;
        }
        $cate->save();
        return redirect('/admin/catepost/list.html')->with(['flash_message'=>'Sửa danh mục thành công','flash_level'=>'success']);
    }
    public function getDelete($slug){
        $cate = CategoryPost::where('slug',$slug)->first();
        $parent = CategoryPost::where('parent_id',$cate->id)->get();
        if($parent->count()){
            return redirect()->back()->with(['flash_message'=>'Bạn không được phép xóa danh mục cha','flash_level'=>'danger']);
        }
        else{
            $cate->delete();
            return redirect()->back()->with(['flash_message'=>'Xóa danh mục thành công','flash_level'=>'success']);
        }
    }
}
