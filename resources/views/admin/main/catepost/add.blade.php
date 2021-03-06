@extends('admin.master')
    @section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-xs-12">
    @include('block.error')
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Thêm danh mục</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br>
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục cha</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                <select class="form-control" name="parent_id">
                                  <option value="0">Danh mục cha</option>
                                  {!! \App\Helpers\Helpers::cate_parent($cate) !!}
                                </select>
                              </div>
                            </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên danh mục</label>
                            <div class="col-md-3 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ...">
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="icon" id="ckfinder-input">
                              </div>
                              <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa SEO</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="keywords" class="form-control" rows="3" placeholder="Nhập tại đây ..."></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả SEO</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" class="form-control" rows="3" placeholder="Nhập tại đây ..."></textarea>
                                  </div>
                            </div>
                            {{--<div class="form-group">--}}
                              {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự</label>--}}
                                  {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                    {{--<input type="text" class="form-control" name="orders" value="0">--}}
                                  {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kiểu dữ liệu</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="kieutrang" id="kieutrang">
                                        <option value="">Kiểu tin tức</option>
                                        <option value="1">Nhóm tin tức</option>
                                        <option value="2">Nhóm tin tức menu dưới</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="checkbox" name="status" checked>
                                </div>
                            </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="reset" class="btn btn-primary">Nhập lại</button>
                              <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
    </div>
</div>
@endsection