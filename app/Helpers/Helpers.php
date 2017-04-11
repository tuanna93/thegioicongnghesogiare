<?php namespace App\Helpers;
use App\Category;
use App\ImageAdv;
use App\Menu;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class Helpers{

    public static function get_cate_sub($id){
        return Category::where('status',1)->where('parent_id',$id)->get();
    }
    public static function get_product_cate($id){
        return Product::where('status',1)->where('cate_id',$id)->get();
    }
    public static function get_adv_doitac(){
        return ImageAdv::where('status',1)->where('position',3)->get();
    }
    public static function get_menu($parent_id){
        return Menu::where('status',1)->where('parent_id',$parent_id)->get();
    }
    public static function page_get_option($option){
        $data = \App\Option::where('name',$option)->first();
        return  $data->value;
    }
    public static function get_cart_row($row){
        if(Cart::count())
            foreach(Cart::content() as $cart){
                if($cart->rowId == $row){
                    return $cart;
                    break;
                }
            }
    }
    public static function get_type_catepost($menu){
        if($menu==1){
            return "<span class=\"label label-danger\">Nhóm menu dưới</span>";
        }
        else{
            return "<span class=\"label label-success\">Nhóm tin tức</span>";
        }
    }
    public static function check_menu($id,$class=''){
        $sub_menu = \App\Menu::where('parent_id',$id)->get();
        if(count($sub_menu) ){
            return $class;
        }
        else{
            return '';
        }
    }

    public static function check_categories($id,$class=''){
        $sub_category = \App\Category::where('parent_id',$id)->get();
        if(count($sub_category) >0 ){
            return $class;
        }
        else{
            return '';
        }
    }

    public static function check_type_menu($slug){
        if($slug == 'san-pham') {
            return '/loai-san-pham';
        }
        elseif ($slug == 'tin-tuc'){
            return '/tin-tuc';
        }
        else{
            return '';
        }
    }

    public static function check_image_sale($status_sale){
        if($status_sale == 1 ){
            return '<img src="/images/label/best.png" alt="BEST">';
        }
        elseif($status_sale == 2 ){
            return '<img src="/images/label/post.png" alt="NEW">';
        }
        elseif($status_sale == 3 ){
            return '<img src="/images/label/hot.png" alt="HOT">';
        }
        elseif($status_sale == 1 ){
            return '<img src="/images/label/sale.png" alt="SALE">';
        }
        else{
            return '';
        }
    }

    public static function check_key_sale($status_sale){
        if($status_sale == 1 ){
            return 'BEST';
        }
        elseif($status_sale == 2 ){
            return 'NEW';
        }
        elseif($status_sale == 3 ){
            return 'HOT';
        }
        elseif($status_sale == 1 ){
            return 'SALE';
        }
        else{
            return '';
        }
    }

    public static function check_label_product($status_sale){
        if($status_sale == 1){
            return "<span class=\"label label-primary\">BEST</span>";
        }
        elseif($status_sale == 2){
            return "<span class=\"label label-success\">NEW</span>";
        }
        elseif($status_sale == 3){
            return "<span class=\"label label-danger\">HOT</span>";
        }
        elseif($status_sale == 4){
            return "<span class=\"label label-warning\">SALE</span>";
        }
        else{
            return "<span class=\"label label-info\">NONE</span>";
        }
    }

    public static function check_status_active($status){
        if($status == 1){
            return "<span class=\"label label-success\">Đã kích hoạt</span>";
        }
        else{
            return "<span class=\"label label-danger\">Chưa kích hoạt</span>";
        }
    }

    public static function check_status_cart($status){
        if($status == 1){
            return "<span class=\"label label-success\">Đã duyệt</span>";
        }
        else{
            return "<span class=\"label label-danger\">Chưa duyệt</span>";
        }
    }

    public static function check_label_icon($icon){
        if($icon){
            return "<img style='max-width:150px' title='{{ $icon->name }}' src='{{ $icon->icon }}'>";
        }
        else{
            return "<img style='max-width:100px' title='No Image' src='/images/none.jpg'>";
        }
    }

    public static function get_product_involve($cate){
        $product = \App\Product::where('cate_id',$cate)->get();
        return $product;
    }

    public static function get_product_name($id)
    {
        $product=\App\Product::find($id);
        return $product->name;
    }

    public static function get_cart_total(){
        $total_price = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,",",".");
        return $total_price;
    }

    public static function get_cart_count(){
        $count = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
        return $count;
    }

    public static function get_cart(){
        echo '<ol id="top-cart-sidebar" class="cart-products-list">';
        foreach (\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
        {
            echo '<li class="item even">
            <a href="/chi-tiet-san-pham/'.$cart->options->slug.'.html" title="'.$cart->name.'" class="product-image">
                <img src="/images/images_pro/'.$cart->options->img.'" width="50" height="50" alt="'.$cart->name.'">
            </a>
            <div class="product-details">
                <a id="delete_cart" idsp = "'.$cart->rowId.'" href="#" title="Remove This Item" class="btn-remove">Remove This Item</a>
                <p class="product-name name"><a href="/chi-tiet-san-pham/'.$cart->options->slug.'.html">'.$cart->name.'</a></p>
                <strong class="qtty">'.$cart->qty.'</strong> x <span class="price summ">'.number_format($cart->price,0,",",".").' Đ</span>
            </div>
        </li>';
        }
        echo '</ol>
        <div id="jshop_quantity_products" class="top-subtotal">
				<strong>Tổng giá tiền:</strong>
				<span id="jshop_summ_product" class="price">
					'.\Gloudemans\Shoppingcart\Facades\Cart::subtotal(0,".",",").' Đ				</span>
        </div>
        <div class="actions goto_cart">
				<a href="/gio-hang.html">Xem giỏ hàng</a>
        </div>';
    }

    public static function get_qty_cart($id){
        $qty = 0;
        if(\Gloudemans\Shoppingcart\Facades\Cart::count())
            foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart){
                if($cart->options->id == $id){
                    $qty = $cart->qty;
                }
            }
        return $qty;
    }
    public static function get_cart_rowid($id){
        if(\Gloudemans\Shoppingcart\Facades\Cart::count())
            foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart){
                if($cart->options->id == $id){
                    return $cart->rowId;
                    break;
                }
            }
    }

    public static function check_error_first($errors){
        if($errors){
            echo '<div class="alert alert-danger" style="display:inline">';
            echo $errors;
            echo '</div>';
        }
    }

    public static function cate_parent($data,$parent=0,$str='--',$select=0){
        foreach($data as $cate){
            $id = $cate->id;
            $name = $cate->name;
            if($cate->parent_id == $parent){
                if($select != 0 && $id == $select){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                Helpers::cate_parent($data,$id,$str."--",$select);
            }

        }
    }

    public static function cate_parent_name($parent){
        if($parent==0){
            return "<span class=\"label label-danger\">Không có danh mục cha</span>";
        }
        else{
            return \App\Category::where('id',$parent)->get()->first()->name;
        }
    }

    public static function get_cate_product($id)
    {
        $cate = \App\Category::where('id',$id)->first();
        if($cate){
            return $cate->name;
        }else{
            return "Danh mục không tồn tại";
        }
    }

    public static function get_price_product($price)
    {
        if($price){
            return number_format($price,0,',','.');
        }else{
            return 0;
        }
    }
    public static function get_time($timestamps){
        return Carbon::parse($timestamps)->format('H:i:s d/m/Y');
    }

    public static function get_menu_admin($data,$parent=0,$str=""){
        $stt = 0;
        foreach($data as $menu){
            if($menu->parent_id == $parent){
                echo "<tr>";
                echo "<td>".$str.Helpers::check_parent_sub($parent)." ".$menu->name."</td>";
                echo Helpers::check_icon_menu($menu);
                echo "<td>".Helpers::get_parent_menu($menu->parent_id)."</td>";
                echo "<td>".Helpers::get_position_menu($menu->position)."</td>";
//                echo "<td>".$menu->sort_order."</td>";
                echo "<td>".Helpers::check_status_active($menu->status)."</td>";
                echo "<td>";
                echo "<a href='/admin/menu/edit/".$menu->id."' class='btn btn-primary btn-xs'><i class='fa fa-folder'></i> Sửa</a>";
                echo "<a href='/admin/menu/delete/".$menu->id."' class='btn btn-warning btn-xs'><i class='fa fa-trash'></i> Xóa</a>";
                echo "</td>";
                echo "</tr>";
                Helpers::get_menu_admin($data,$menu->id,'--'.$str);

            }
        }
    }

    public static function get_parent_menu($parent){
        $parent_name = \App\Menu::where('id',$parent)->first();
        if($parent_name){
            return $parent_name->name;
        }
        else{
            return "<span class=\"label label-danger\">Không có menu cha</span>";
        }
    }

    public static function get_position_menu($position){
        if($position == 1){
            return "Menu trên";
        }
        if($position == 2){
            return "Menu dưới";
        }
    }

    public static function check_parent_sub($parent){
        if($parent == 0){
            return "<img src='/images/images_icon/Speerio_folderopen_edit.gif'>";
        }
        else{
            return "<img src='/images/images_icon/sub.gif'>";
        }
    }

    public static function check_icon_menu($menu){
        if($menu->icon){
            return "<td><img src='".$menu->icon."' alt='".$menu->name."' class='img_pro' style='background:#ccc'/></td>";
        }else{
            return "<td><span class=\"label label-danger\">Không có icon</span></td>";
        }
    }

    public static function menu_parent($data,$parent=0,$str='--',$select=0){
        foreach($data as $menu){
            $id = $menu->id;
            $name = $menu->name;
            if($menu->parent_id == $parent){
                if($select != 0 && $id == $select){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                Helpers::menu_parent($data,$id,$str."--");
            }

        }
    }

    public static function get_menu_bottom(){
        $menu_bottom = \App\Menu::where('position',2)->where('parent_id',0)->where('status',1)->orderBy('id','ASC')->get();
        return $menu_bottom;
    }

    public static function get_menu_bottom_cate($parent=0){
        $menu_bottom = \App\CategoryPost::where('is_menu',1)->where('parent_id',$parent)->where('status',1)->orderBy('id','ASC')->get();
        return $menu_bottom;
    }
    public static function get_menu_bottom_cate_post($parent){
        $menu_bottom = \App\Post::where('post_id',$parent)->where('status',1)->orderBy('id','ASC')->get();
        return $menu_bottom;
    }
    public static function get_menu_bottom_sub($parent_id){
        $menu_bottom_sub = \App\Menu::where('parent_id',$parent_id)->get();
        return $menu_bottom_sub;
    }

    public static function check_position_adv($position){
        if($position == 1){
            return "<span class=\"label label-info\">Banner</span>";
        }
        elseif($position == 2){
            return "<span class=\"label label-info\">Quảng cáo dưới</span>";
        }
        elseif($position == 3){
            return "<span class=\"label label-info\">Đối tác</span>";
        }
    }

}