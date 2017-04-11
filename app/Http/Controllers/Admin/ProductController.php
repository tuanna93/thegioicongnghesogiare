<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getList(){
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.main.product.list',compact('product'));
    }
    public function postList(Request $request){
        print_r($request->table_records);
        if($request->table_records){
            foreach($request->table_records as $item){
                Product::destroy($item);
            }
            return redirect('/admin/product/list.html')->with(['flash_message'=>'Xóa sản phẩm thành công','flash_level'=>'success']);
        }
        else{
            return redirect('/admin/product/list.html')->with(['flash_message'=>'Chưa chọn sản phẩm để xóa','flash_level'=>'danger']);
        }
    }
    public function getAdd(){
        $cate = Category::select('id','name','parent_id')->get();
        return view('admin.main.product.add',compact('cate'));
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:products',
            'parent_id' => 'required',
            'price_new' => 'required|numeric',
            'price_old' => 'numeric',
        ],[
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price_new.required' => 'Giá bán phải nhập',
            'price_new.numeric' => 'Giá bán phải là số học',
            'price_old.numeric' => 'Giá niêm yết phải là số học',
        ]);
        if($request->parent_id != 0){
            $product = new Product();
            $product->name = $request->name;
            $product->slug = str_slug($request->name);
            $product->code = $request->code;
            $product->price_new = $request->price_new;
            if($request->price_old){
                $product->price_old = $request->price_old;
            }
            else{
                $product->price_old  = 0;
            }
            $product->intro = $request->intro;
            $product->content = $request->contents;
            $product->image = $request->image;
            $product->cate_id = $request->parent_id;
            $product->keywords = $request->keywords;
            $product->description = $request->description;
            $product->status_sale = $request->status_sale;
//            $product->orders = $request->orders;
            if($request->status_sale == 4){
                $product->is_selling = 1;
            }
            else{
                $product->is_selling = 0;
            }
            $product->status = isset($request->status) ? 1 :0 ;
            $product->save();
            return redirect('/admin/product/list.html')->with(['flash_message'=>'Thêm sản phẩm thành công','flash_level'=>'success']);
        }else{
            return redirect('/admin/product/add.html')->with(['flash_message'=>'Nhóm sản phẩm không được để trống','flash_level'=>'danger']);
        }
    }
    public function getView($slug){
        $cate = Category::select('id','name','parent_id')->get();
        $product = Product::where('slug',$slug)->first();
        return view('admin.main.product.view',compact('cate','product'));
    }
    public function getEdit($slug){
        $cate = Category::select('id','name','parent_id')->get();
        $product = Product::where('slug',$slug)->first();
        return view('admin.main.product.edit',compact('cate','product'));
    }
    public function postEdit(Request $request,$slug){
        $this->validate($request,[
            'name' => 'required',
            'price_new' => 'required|numeric',
            'price_old' => 'numeric',
        ],[
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price_new.required' => 'Giá bán phải nhập',
            'price_new.numeric' => 'Giá bán phải là số học',
            'price_old.numeric' => 'Giá niêm yết phải là số học',
        ]);
        $product = Product::where('slug',$slug)->first();
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->code = $request->code;
        $product->price_new = $request->price_new;
        if($request->price_old){
            $product->price_old = $request->price_old;
        }
        $product->intro = $request->intro;
        $product->content = $request->contents;
        $product->image = $request->image;
        $product->cate_id = $request->parent_id;
        $product->keywords = $request->keywords;
        $product->description = $request->description;
        $product->status_sale = $request->status_sale;
//        $product->orders = $request->orders;
        if($request->status_sale == 4){
            $product->is_selling = 1;
        }
        else{
            $product->is_selling = 0;
        }
        $product->status = isset($request->status) ? 1 :0 ;
        $product->save();
        return redirect('/admin/product/list.html')->with(['flash_message'=>'Sửa sản phẩm thành công','flash_level'=>'success']);
    }
    public function getDelete($slug){
        $product = Product::where('slug',$slug)->first();
        $product->delete();
        return redirect('/admin/product/list.html')->with(['flash_message'=>'Bạn xóa sản phẩm thành công','flash_level'=>'success']);
    }
}
