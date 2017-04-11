@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh mục sản phẩm</h2>
            <div class="clearfix"></div>
          </div>
          @include('block.message')
                <form action="" method="post">
                {!! csrf_field() !!}
            <div class="more">
              <a href="/admin/cate/add.html" class="btn btn-success">Thêm mới</a>
                <button class="btn btn-success">Xóa mục đã chọn</button>
            </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable-keytable" class="table table-striped jambo_table table-bordered bulk_action">
                    <thead>
                      <tr>
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th>Tên danh mục</th>
                        <th>Danh mục cha</th>
                        <th style="text-align: right">Thao tác</th>
                      </tr>
                    </thead>
                    <?php $stt = 1 ?>
                      @foreach($cate as $cate)
                    <tbody>
                      <tr>
                        <td>
                          <input type="checkbox" class="flat" name="table_records[]" value="{{ $cate->id }}">
                        <td>{{ $cate->name }}</td>
                        <td>{!! \App\Helpers\Helpers::cate_parent_name($cate->parent_id) !!}</td>
                        <td  style="text-align:right">
                            {{--<a href="/admin/cate/view/{{ $cate->slug }}.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>--}}
                            <a href="/admin/cate/edit/{{ $cate->slug }}.html" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Sửa</a>
                            <a href="/admin/cate/delete/{{ $cate->slug }}.html" class="btn btn-warning btn-xs" onclick="xacnhanxoa('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i> Xóa</a>
                        </td>
                      </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
                  </form>
        </div>
      </div>
</div>
</div>
@endsection