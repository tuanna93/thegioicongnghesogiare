<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function getList(){
        $order = Order::get();
        return view('admin.main.order.list',compact('order'));
    }
    public function getView($id){
        $order = Order::find($id);
        $orderitem = OrderProduct::where('id_order',$order->id)->get();
        return view('admin.main.order.view',compact('order','orderitem'));
    }
    public function accept($id){
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return redirect('/admin/order/list.html')->with(['flash_level'=>'success','flash_message'=>'Duyệt đơn hàng thành công']);
    }
    public function getDelete($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('/admin/order/list.html')->with(['flash_level'=>'success','flash_message'=>'Xóa đơn hàng thành công']);
    }
}
