@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách trang nội dung</h2>
            <div class="clearfix"></div>
          </div>
          @include('block.message')
         <form action="" method="post">
         {!! csrf_field() !!}
         <div class="more">
           <a href="/admin/onepage/add.html" class="btn btn-success">Thêm mới</a>
             <button class="btn btn-success">Xóa mục đã chọn</button>
         </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action ">
                    <thead>
                      <tr>
                        <th width=""><input type="checkbox" id="check-all" class="flat"></th>
                        <th>Tên trang</th>
                        <th>Kích hoạt</th>
                        <th>Ngày đăng</th>
                        <th style="text-align: right">Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($onepage as $page)
                      <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="{{ $page->id }}"></td>
                        <td>{{ $page->name }}</td>
                        <td>{!! \App\Helpers\Helpers::check_status_active($page->status) !!}</td>
                        <td>{{ \App\Helpers\Helpers::get_time($page->created_at) }}</td>
                        <td  style="text-align:right">
                            {{--<a href="/admin/onepage/view/{{ $page->slug }}.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>--}}
                            <a href="/admin/onepage/edit/{{ $page->slug }}.html" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Sửa</a>
                            <a href="/admin/onepage/delete/{{ $page->slug }}.html" class="btn btn-warning btn-xs" onclick="xacnhanxoa('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i> Xóa</a>
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