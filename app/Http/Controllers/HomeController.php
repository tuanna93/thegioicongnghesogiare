<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Helpers\Helpers;
use App\ImageAdv;
use App\OnePage;
use App\Order;
use App\OrderProduct;
use App\Post;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $cate = Category::where('parent_id',0)->where('status',1)->where('is_menu',1)->get();
        $product = Product::where('status',0)->get();
        $slide = ImageAdv::where('position',1)->where('status',1)->get();
        $slide_bottom = ImageAdv::where('position',2)->where('status',1)->get();
        $title  = 'Trang chủ - '.Helpers::page_get_option('title');
        $keywords  = Helpers::page_get_option('keywords');
        $description  = Helpers::page_get_option('description');
        return view('pages.home',compact('cate','product','slide','slide_bottom','keywords','title','description'));
    }
    public function register(){

    }
    public function search(Request $request){
        $c =Category::where('id',$request->id)->first();
        if($c){
            $cate = $c->name;
            $product = Product::where('cate_id',$request->id)->where('status',1)->paginate(30);
            return view('pages.search',compact('cate','product'));
        }else{
            return redirect('/404.html');
        }
    }
    public function news(){
        $title  = "Tin tức - ".Helpers::page_get_option('title');
        $keywords  = Helpers::page_get_option('keywords');
        $description  = Helpers::page_get_option('description');
        $news = Post::where('status',1)->limit(2)->get();
        $news_all = Post::where('status',1)->get();
        return view('pages.post.new',compact('news','news_all','title','keywords','description'));
    }
    public function getContact(){
        return view('pages.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'txthoten' => 'required',
            'txtemail' => 'required|email',
            'txtdienthoai' => 'required|numeric|min:10',
            'txtnoidung' => 'required'
        ],[
            'txthoten.required' => 'Họ tên chưa nhập',
            'txtemail.required' => 'Email chưa nhập',
            'txtdienthoai.required' => 'Điện thoại chưa nhập',
            'txtdienthoai.numeric' => 'Điện thoại chưa đúng định dạng',
            'txtdienthoai.min' => 'Điện thoại chưa đúng định dạng',
            'txtnoidung.required' => 'Nội dung chưa nhập',
        ]);
        $contact = new Contact();
        $contact->name = $request->txthoten;
        $contact->email = $request->txtemail;
        $contact->phone = $request->txtdienthoai;
        $contact->content = $request->txtnoidung;
        $contact->save();
        return redirect('/')->with(['flash_message'=>'Bạn gửi liên hệ thành công','flash_level'=>'success']);
    }
    public function error_404(){
        $title  = "Không tìm thấy trang - ".Helpers::page_get_option('title');
        $keywords  = Helpers::page_get_option('keywords');
        $description  = Helpers::page_get_option('description');
        return view('pages.404',compact('title','keywords','description'));
    }
    public function detailpost($slug){
        $detail = Post::where('slug',$slug)->first();
        if($detail){
            $title  = $detail->name." - ".Helpers::page_get_option('title');
            $keywords  = isset($detail->keywords) ? $detail->keywords : Helpers::page_get_option('keywords');
            $description  = isset($detail->description) ? $detail->description : Helpers::page_get_option('description');
            $news = Post::where('status',1)->limit(6)->get();
            return view('pages.post.detail',compact('detail','news','title','keywords','description'));
        }
        else{
            return redirect('/404.html');
        }
    }
    public function cate($slug){
        $cate = Category::where('slug',$slug)->first();
        if($cate){
            $title  = $cate->name." - ".Helpers::page_get_option('title');
            $keywords  = isset($cate->keywords) ? $cate->keywords : Helpers::page_get_option('keywords');
            $description  = isset($cate->description) ? $cate->description : Helpers::page_get_option('description');
            $product = Product::where('cate_id',$cate->id)->paginate(30);
            return view('pages.product.cate',compact('cate','product','title','keywords','description'));
        }
        else{
            return redirect('/404.html');
        }
    }
    public function detail($slug){
        $detail = Product::where('slug',$slug)->first();
        if($detail){
            $product = Product::where('cate_id',$detail->id)->where('status',1)->get();
            $title  = $detail->name." - ".Helpers::page_get_option('title');
            $keywords  = isset($detail->keywords) ? $detail->keywords : Helpers::page_get_option('keywords');
            $description  = isset($detail->description) ? $detail->description : Helpers::page_get_option('description');
            return view('pages.product.detail',compact('detail','product','title','keywords','description'));
        }
        else{
            return redirect('/404.html');
        }
    }
    public function getcart($id=0){
        if($id){
            $pro = Product::where('id',$id)->first();
            if($pro){
                Cart::add(['id' => $id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price_new, 'options' => ['image' => $pro->image,'slug' => $pro->slug]]);
            }
        }
        $title  = 'Giỏ hàng - '.Helpers::page_get_option('title');
        $keywords  = Helpers::page_get_option('keywords');
        $description  = Helpers::page_get_option('description');
        $total = Cart::subtotal(0,',','.');
        $cart = Cart::content();
        return view('pages.cart',compact('cart','total','title','keywords','description'));
    }
    public function postcart(){
        return redirect('/dat-mua.html');
    }
    public function updatecart($row,$qty){
        $cart = Helpers::get_cart_row($row);
        if($cart){
            Cart::update($row, $qty);
            $cart_tong = number_format($qty*$cart->price,0,',','.');
            $count = Cart::content()->count();
            $total = Cart::subtotal(0,',','.');
            return [$cart_tong,$total,$count];
        }
    }
    public function deletecart($row){
        $cart = Helpers::get_cart_row($row);
        if($cart){
            Cart::remove($row);
            return redirect('/dat-mua.html')->with(['flash_message'=>'Xóa sản phẩm trong thành công','flash_level'=>'success']);
        }
    }
    public function payment(){
        $cart = Cart::content();
        $total = Cart::subtotal(0,',','.');
        $title  = 'Thanh toán - '.Helpers::page_get_option('title');
        $keywords  = Helpers::page_get_option('keywords');
        $description  = Helpers::page_get_option('description');
        if($cart->count()){
            return view('pages.payment',compact('cart','total','title','keywords','description'));
        }else{
            return redirect('/dat-mua.html')->with(['flash_message'=>'Bạn chưa có sản phẩm trong giỏ hàng','flash_level'=>'danger']);
        }
    }
    public function postpayment(Request $request){
        $this->validate($request,[
            'txthoten' => 'required',
            'txtemail' => 'required|email',
            'txtdienthoai' => 'required|numeric|min:10',
            'txtdiachi' => 'required'
        ],[
            'txthoten.required' => 'Họ tên chưa nhập',
            'txtemail.required' => 'Email chưa nhập',
            'txtdienthoai.required' => 'Điện thoại chưa nhập',
            'txtdienthoai.numeric' => 'Điện thoại chưa đúng định dạng',
            'txtdienthoai.min' => 'Điện thoại chưa đúng định dạng',
            'txtdiachi.required' => 'Địa chỉ chưa nhập',
        ]);
        $cart = Cart::content();
        if($cart->count()){
            $order = new Order();
            $order->name = $request->txthoten;
            $order->email = $request->txtemail;
            $order->phone = $request->txtdienthoai;
            $order->address  = $request->txtdiachi;
            $order->save();
            foreach($cart as $c){
                $o_pro = new OrderProduct();
                $o_pro->id_order = $order->id;
                $o_pro->qty = $c->qty;
                $o_pro->price = $c->price;
                $o_pro->id_product = $c->id;
                $o_pro->save();
            }
            Cart::destroy();
            return redirect('/')->with(['flash_message'=>'Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất . ','flash_level'=>'success']);
        }else{
            return redirect('/dat-mua.html')->with(['flash_message'=>'Bạn chưa có sản phẩm trong giỏ hàng','flash_level'=>'danger']);
        }
    }
    public function product(){
        $title  = "Sản phẩm - ".Helpers::page_get_option('title');
        $keywords  =  Helpers::page_get_option('keywords');
        $description  =  Helpers::page_get_option('description');
        $product = Product::where('status',1)->paginate(30);
        return view('pages.product.product',compact('product','title','keywords','description'));
    }
    public function onepage($slug){
        $onepage = OnePage::where('slug',$slug)->first();
        if($onepage){
            $title  = $onepage->name." - ".Helpers::page_get_option('title');
            $keywords  = isset($onepage->keywords) ? $onepage->keywords : Helpers::page_get_option('keywords');
            $description  = isset($onepage->description) ? $onepage->description : Helpers::page_get_option('description');
            return view('pages.onepage',compact('title','keywords','description','onepage'));
        }else{
            return redirect('/404.html');
        }
    }
}
