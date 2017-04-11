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
            <a href="/admin/post/add.html" class="btn btn-success">Thêm mới</a>
            <button class="btn btn-success">Xóa mục đã chọn</button>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                    <thead>
                      <tr>
                        <th width="3%"><input type="checkbox" id="check-all" class="flat"></th>
                        <th width="5%">Hình ảnh</th>
                        <th width="12%">Tiêu đề tin</th>
                        <th width="30%">Mô tả ngắn</th>
                        <th width="10%">Kích hoạt</th>
                        <th width="15%" style="text-align: right">Thao tác</th>
                      </tr>
                    </thead>
                    <?php $stt = 1 ?>
                      @foreach($post as $post)
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="flat" name="table_records[]" value="{{ $post->id }}"></td>
                        <td><img src="{{ $post->image ? $post->image : '/images/none.jpg'}}" alt="{{ $post->name }}"  class="img_pro"/></td>
                        <td>{{ $post->name }}</td>
                        <td>{!! $post->intro !!}</td>
                        <td>{!! \App\Helpers\Helpers::check_status_active($post->status) !!}</td>
                        <td  style="text-align:right">
                            {{--<a href="/admin/post/view/{{ $post->slug }}.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Xem</a>--}}
                            <a href="/admin/post/edit/{{ $post->slug }}.html" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Sửa</a>
                            <a href="/admin/post/delete/{{ $post->slug }}.html" class="btn btn-warning btn-xs" onclick="xacnhanxoa('Bạn có muốn xóa không ?')"><i class="fa fa-trash"></i> Xóa</a>
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