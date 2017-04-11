@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
        @include('block.error')
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm sản phẩm</h2>
                        <div class="clearfix"></div>
                    </div>
                    @include('block.message')
                    <div class="x_content">
                        <br>
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhóm sản phẩm</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Danh mục cha</option>
                                        {!! \App\Helpers\Helpers::cate_parent($cate,0,'--',old('parent_id')) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ..." value="{!! old('name') !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã sản phẩm</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="code" placeholder="MA03" value="{!! old('code') !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả ngắn</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="intro" class="form-control" rows="3">{!! old('intro') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('intro')</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả sản phẩm ( Trang chi tiết)</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="contents" class="form-control">{!! old('contents') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('contents')</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá niêm yết</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="price_old" value="{!! old('price_old') !!}"> ( VNĐ )
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá bán</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" name="price_new" value="{!! old('price_new') !!}"> ( VNĐ )
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="image" id="ckfinder-input" value="{!! old('image') !!}">
                                </div>
                                <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="keywords" class="form-control" rows="3" placeholder="Từ khóa ...">{!! old('keywords') !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" class="form-control" rows="3" placeholder="Mổ tả giới hạn nhỏ hơn 180 ký tự ...">{!! old('description') !!}</textarea>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                              {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự</label>--}}
                                  {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                    {{--<input type="text" class="form-control" name="orders" value="0">--}}
                                  {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái SALE</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="status_sale">
                                        <option value="0">Trạng thái</option>
                                        <option value="1">BEST</option>
                                        <option value="2">NEW</option>
                                        <option value="3">HOT</option>
                                        <option value="4">SALE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="checkbox" name="status" checked>
                                </div>
                            </div>
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