@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách menu</h2>
            <div class="clearfix"></div>
          </div>
          @include('block.message')
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Tên menu</th>
                        <th>Icon menu</th>
                        <th>Menu cha</th>
                        <th>Vị trí</th>
                        {{--<th>Thứ tự</th>--}}
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {!! \App\Helpers\Helpers::get_menu_admin($menu) !!}
                      {!! $menu->links('block.pagination') !!}
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