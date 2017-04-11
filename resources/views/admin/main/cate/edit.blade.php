@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Sửa danh mục <small>{{ $cate->name }}</small></h2>
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
                                  {!! \App\Helpers\Helpers::cate_parent($parent,0,"--",$cate->parent_id) !!}
                                </select>
                              </div>
                            </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên danh mục</label>
                            <div class="col-md-3 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ..." value="{!! old('name',isset($cate) ? $cate->name : '') !!}">
                            </div>
                          </div>
                          @if($cate->icon)
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon current</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <img src="{{ $cate->icon }}" alt="{{ $cate->name }}" class="img_edit"/>
                              </div>
                            </div>
                            @endif
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="icon" id="ckfinder-input" value="{!! old('icon',isset($cate) ? $cate->icon : '') !!}">
                              </div>
                              <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa SEO</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="keywords" class="form-control" rows="3" placeholder="Nhập tại đây ..." >{!! old('keywords',isset($cate) ? $cate->keywords : '') !!}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả SEO</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" class="form-control" rows="3" placeholder="Nhập tại đây ...">{!! old('description',isset($cate) ? $cate->description : '') !!}</textarea>
                                  </div>
                                </div>
                                {{--<div class="form-group">--}}
                                  {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự</label>--}}
                                      {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                        {{--<input type="text" class="form-control" name="orders" value="{!! old('orders',isset($cate) ? $cate->orders : '') !!}">--}}
                                      {{--</div>--}}
                                {{--</div>--}}
                           <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển thị menu trái</label>
                                    <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="is_menu" <?php if($cate->is_menu == 1 ) echo "checked"?>>
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển thị tab trang chủ</label>--}}
                                    {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                    {{--<input type="checkbox" name="is_tab" <?php if($cate->is_tab == 1 ) echo "checked"?>>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                    <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="status" <?php if($cate->status == 1 ) echo "checked"?>>
                                    </div>
                                    </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="reset" class="btn btn-primary">Nhập lại</button>
                              <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
    </div>
</div>
@endsection