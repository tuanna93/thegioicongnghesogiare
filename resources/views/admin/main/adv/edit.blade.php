@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
    <div class="col-md-12 col-xs-12">
    @include('block.error')
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Thêm quảng cáo</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br>
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên quảng cáo</label>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ..." value="{!! old('name',isset($adv) ? $adv->name : '') !!}">
                        </div>
                          </div>
                          @if($adv->image)
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon current</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <img src="{{ $adv->image }}" alt="{{ $adv->name }}" class="img_edit"/>
                                </div>
                              </div>
                          @endif
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="image" id="ckfinder-input" value="{!! old('image',isset($adv) ? $adv->image : '') !!}">
                              </div>
                              <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Đường link ( URL )</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                 <input type="text" class="form-control" name="slug" value="{!! old('slug',isset($adv) ? $adv->slug : '') !!}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Vị trí</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                 <select class="form-control" name="position">
                                     <option value="0">Vị trí</option>
                                     <option value="1" <?php if($adv->position == 1) echo "selected" ?>>Banner</option>
                                     <option value="2" <?php if($adv->position == 2) echo "selected" ?>>Quảng cáo dưới</option>
                                     <option value="3" <?php if($adv->position == 3) echo "selected" ?>>Đối tác</option>
                                 </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Chiều rộng</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                 <input type="text" class="form-control" name="width" value="{!! old('width',isset($adv) ? $adv->width : '') !!}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Chiều cao</label>
                              <div class="col-md-3 col-sm-9 col-xs-12">
                                 <input type="text" class="form-control" name="height" value="{!! old('height',isset($adv) ? $adv->height : '') !!}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="contents" class="form-control" rows="3" placeholder="Nhập tại đây ...">{!! old('contents',isset($adv) ? $adv->contents : '') !!}</textarea>
                                  </div>
                            </div>
                            {{--<div class="form-group">--}}
                              {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự</label>--}}
                                  {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                    {{--<input type="text" class="form-control" name="orders" value="{!! old('orders',isset($adv) ? $adv->orders : '') !!}">--}}
                                  {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="checkbox" name="status" <?php if($adv->status == 1 ) echo "checked"?>>
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