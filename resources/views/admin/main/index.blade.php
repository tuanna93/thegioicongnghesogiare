@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 ">
            <div class="count_cate">
                <div class="c_cate">{{ $count_cate }}</div>
                <p>Danh mục sản phẩm</p>
                <a href="/admin/cate/list.html" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 ">
            <div class="count_pro">
                <div class="c_pro">{{ $count_product }}</div>
                <p>Sản phẩm</p>
                <a href="/admin/product/list.html" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 ">
            <div class="count_post">
                <div class="c_post">{{ $count_post }}</div>
                <p>Tin tức</p>
                <a href="/admin/post/list.html" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách đơn hàng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title" style="display: table-cell;">Đơn hàng</th>
                                <th class="column-title" style="display: table-cell;">Người đặt hàng</th>
                                <th class="column-title" style="display: table-cell;">Email</th>
                                <th class="column-title" style="display: table-cell;">Địa chỉ</th>
                                <th class="column-title" style="display: table-cell;">Trạng thái</th>
                                <th class="column-title" style="display: table-cell;">Ngày</th>
                                <th class="column-title" style="display: table-cell;">Hoạt động</th>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($order as $order)
                            <tr class="pointer">
                                <td class="a-center ">{{ $order->id }}</td>
                                <td class=" ">{{ $order->name }}</td>
                                <td class=" ">{{ $order->email }}</td>
                                <td class=" ">{{ $order->address }}</td>
                                <td class=" ">{!! App\Helpers\Helpers::check_status_cart($order->status) !!}</td>
                                <td class=" ">{{ $order->created_at }}</td>
                                <td>
                            <a href="/admin/order/view/{{ $order->id }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>
                            <a href="/admin/order/delete/{{ $order->id }}" class="btn btn-warning btn-xs" onclick="xacnhanxoa('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <br />

</div>
@endsection