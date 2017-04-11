@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                @include('block.error')
                @include('block.message')
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm menu</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Menu cha</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Danh mục cha</option>
                                        {!! \App\Helpers\Helpers::menu_parent($parent,0,"--",0) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên menu</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kiểu trang</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="kieutrang" id="kieutrang">
                                        <option value="0">Chọn kiểu trang</option>
                                        <option value="1">Trang chủ</option>
                                        <option value="2">Nhóm sản phẩm</option>
                                        <option value="3">Sản phẩm</option>
                                        <option value="8">Nhóm tin tức</option>
                                        <option value="4">Tin tức</option>
                                        <option value="5">Onepage</option>
                                        <option value="6">Đơn hàng</option>
                                        <option value="7">URL</option>
                                        <option value="9">Liên hệ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="loadkieutrang">

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="icon" id="ckfinder-input">
                                </div>
                                <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                              {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự </label>--}}
                                    {{--<div class="col-md-1 col-sm-1 col-xs-1">--}}
                                        {{--<input type="text" class="form-control" name="sort_order" value="0">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vị trí </label>
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <select class="form-control" name="position">
                                        <option value="1">Menu trên</option>
                                        <option value="2">Danh dưới</option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung menu dưới( nếu có )</label>--}}
                                {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                                    {{--<textarea name="contents" class="form-control" rows="3"></textarea>--}}
                                    {{--<script type="text/javascript">CKEDITOR.replace('contents')</script>--}}
                                {{--</div>--}}
                            {{--</div>--}}
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