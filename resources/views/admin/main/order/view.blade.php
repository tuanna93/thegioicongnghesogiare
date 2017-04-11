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
                                    <td width="10%">Người đặt hàng</td>
                                    <td>{{ $order->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng</td>
                                    <td>
                                        <table @if($orderitem->count() > 10) id="datatable-keytable" @endif class="table table-striped table-bordered">
                                        <thead>
                                              <tr>
                                                <th >Tên sản phẩm</th>
                                                <th >Số lượng</th>
                                                <th >Giá</th>
                                                <th>Thành tiền</th>
                                              </tr>
                                        </thead>

                                       <tbody>
                                            <?php $tong = 0 ?>
                                            @foreach($orderitem as $order_item)
                                             <tr>
                                               <td>{{ \App\Helpers\Helpers::get_product_name($order_item->id_product) }}</td>
                                               <td>{{ $order_item->qty }}</td>
                                               <td>{{ $order_item->price }}</td>
                                               <td>{{ number_format($order_item->qty*$order_item->price,0,',','.') }} Đ<?php $tong += $order_item->price*$order_item->qty ?>
                                               </td>
                                              </tr>
                                              @endforeach
                                        <p>Tổng : {{ number_format($tong,0,",",".") }} Đ </p>
                                      </tbody>
                                        </table>
                                    </td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<td>Thành phố</td>--}}
                                    {{--<td>{{ $order->city }}</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Nội dung</td>--}}
                                    {{--<td>{{ $order->comment }}</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td>Điện thoại</td>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày mua</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="/admin/order/accept/{{ $order->id }}" class="btn btn-success">Duyệt đơn hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection