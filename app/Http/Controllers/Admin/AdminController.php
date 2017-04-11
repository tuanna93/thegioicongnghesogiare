<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\OnePage;
use App\Option;
use App\Order;
use App\Post;
use App\Product;
use FontLib\Table\Type\loca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function admin(){
        return redirect('/admin/dashboard.html');
    }
    public function dashboard(){
        $count_cate = Category::get()->count();
        $count_product = Product::get()->count();
        $count_post = Post::get()->count();
        $order = Order::where('status',0)->paginate(10);
        return view('admin.main.index',compact('count_cate','count_product','count_post','order'));
    }
    public function getList(){
        $onepage = OnePage::get();
        return view('admin.main.onepage.list',compact('onepage'));
    }
    public function postList(Request $request){
        print_r($request->table_records);
        if($request->table_records){
            foreach($request->table_records as $item){
                OnePage::destroy($item);
            }
            return redirect('/admin/onepage/list.html')->with(['flash_message'=>'Xóa trang nội dung thành công','flash_level'=>'success']);
        }
        else{
            return redirect('/admin/onepage/list.html')->with(['flash_message'=>'Chưa chọn trang nội dung để xóa','flash_level'=>'danger']);
        }
    }
    public function getView($slug){
        $onepage = OnePage::where('slug',$slug)->first();
        return view('admin.main.onepage.view',compact('onepage'));
    }
    public function getAdd(){
        return view('admin.main.onepage.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
           'name' => 'required|unique:one_pages',
        ],[
            'name.required' => 'Tên trang bắt buộc phải nhập',
            'name.unique' => 'Tên trang đã tồn tại'
        ]);
        $onepage = new OnePage();
        $onepage->name = $request->name;
        $onepage->slug = str_slug($request->name);
        $onepage->content = $request->contents;
        $onepage->keywords = $request->keywords;
        $onepage->description = $request->description;
        if($request->status == 'on'){
            $onepage->status = 1;
        }else{
            $onepage->status = 0;
        }
        $onepage->save();
        return redirect('/admin/onepage/list.html')->with(['flash_message'=>'Thêm trang thành công','flash_level'=>'success']);
    }
    public function getEdit($slug){
        $onepage = OnePage::where('slug',$slug)->first();
        return view('admin.main.onepage.edit',compact('onepage'));
    }
    public function postEdit($slug,Request $request){
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'Tên trang bắt buộc phải nhập',
        ]);
        $onepage = OnePage::where('slug',$slug)->first();
        $onepage->name = $request->name;
        $onepage->slug = str_slug($request->name);
        $onepage->content = $request->contents;
        $onepage->keywords = $request->keywords;
        $onepage->description = $request->description;
        if($request->status == 'on'){
            $onepage->status = 1;
        }else{
            $onepage->status = 0;
        }
        $onepage->save();
        return redirect('/admin/onepage/list.html')->with(['flash_message'=>'Sửa trang thành công','flash_level'=>'success']);
    }
    public function getDelete($slug){
        $onepage = OnePage::where('slug',$slug)->first();
        $onepage->delete();
        return redirect('/admin/onepage/list.html')->with(['flash_message'=>'Bạn xóa trang thành công','flash_level'=>'success']);
    }
    public function getOption(){
        return view('admin.main.option');
    }
    public function postOption(Request $request){
        $multi_option = Option::get();
        $title = $request->title;
        $phone = $request->phone;
        $hotline = $request->hotline;
        $address = $request->address;
        $logo = $request->logo;
        $favicon = $request->favicon;
        $keywords = $request->keywords;
        $description = $request->description;
        $h1 = $request->h1;
        $faceboook = $request->faceboook;
        $youtube = $request->youtube;
        $google = $request->google;
        $footer1 = $request->footer1;
        $footer2 = $request->footer2;
        $contact = $request->contact;
        $data = [
            'title'=> $title,
            'phone' => $phone,
            'hotline' => $hotline,
            'address' => $address,
            'logo' => $logo,
            'favicon' => $favicon,
            'keywords' => $keywords,
            'h1' => $h1,
            'description' => $description,
            'link_facebook' => $faceboook,
            'link_youtube' => $youtube,
            'link_google' => $google,
            'footer_left' => $footer1,
            'footer_right' => $footer2,
            'contact' => $contact
        ];
        foreach($multi_option as $option){
            foreach($data as $key => $val){
                if($option->name == $key){
                    $option->update(['value'=>$val]);
                }
            }
        }
        return redirect('/admin/options.html')->with(['flash_message'=>'Cập nhật cấu hình thành công','flash_level'=>'success']);
    }

}
