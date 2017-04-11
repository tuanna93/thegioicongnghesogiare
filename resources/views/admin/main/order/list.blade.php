@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách đơn hàng</h2>
            <div class="clearfix"></div>
          </div>
          @include('.........block.message')
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-keytable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="3%">STT</th>
                        <th width="15%">Người đặt hàng</th>
                        <th width="12%">Email</th>
                        <th width="30%">Địa chỉ</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">Ngày</th>
                        <th width="15%" style="text-align: right">Thao tác</th>
                      </tr>
                    </thead>
                    <?php $stt = 1 ?>
                      @foreach($order as $order)
                    <tbody>
                      <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{!! \App\Helpers\Helpers::check_status_cart($order->status) !!}</td>
                        <td>{{ $order->created_at }}</td>
                        <td  style="text-align:right">
                            <a href="/admin/order/view/{{ $order->id }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>
                            <a href="/admin/order/delete/{{ $order->id }}" class="btn btn-warning btn-xs" onclick="xacnhanxoa('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i> Xóa</a>
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
      </div>
</div>
</div>
@endsection