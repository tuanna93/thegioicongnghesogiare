@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> <strong><i class="fa fa-glass"></i> View Product</strong> </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-striped">
                                <tbody>
                                <tr>
                                    <td width="10%">Tên sản phẩm</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nhóm danh mục</td>
                                    <td>{!! \App\Helpers\Helpers::get_cate_product($product->cate_id) !!}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <img style="max-width:150px" title="{{ $product->name }}" src="{{ $product->image }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giá niêm yết</td>
                                    <td>{{ \App\Helpers\Helpers::get_price_product($product->price_old) }} Đ</td>
                                </tr>
                                <tr>
                                    <td>Giá bán</td>
                                    <td>{{ \App\Helpers\Helpers::get_price_product($product->price_new) }} Đ</td>
                                </tr>
                                <tr>
                                    <td>Từ khóa</td>
                                    <td>{{ $product->keywords }}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Trạng thái SALE</td>
                                    <td>{!! \App\Helpers\Helpers::check_label_product($product->status_sale) !!}</td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($product->status) !!}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đăng</td>
                                    <td>{!! \App\Helpers\Helpers::get_time($product->created_at) !!}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả ngắn</td>
                                    <td>{!! $product->intro !!}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả chi tiết <br>( Trang chi tiết )</td>
                                    <td>{!! $product->content !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection