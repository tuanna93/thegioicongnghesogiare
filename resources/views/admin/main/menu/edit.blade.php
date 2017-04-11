@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                @include('block.error')
                @include('block.message')
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sửa menu <small>{{ $menu->name }}</small></h2>
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
                                        {!! \App\Helpers\Helpers::menu_parent($parent,0,"--",$menu->parent_id) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên menu</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ..." value="{!! old('name',isset($menu) ? $menu->name : '') !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kiểu trang</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="kieutrang" id="kieutrang">
                                        <option value="0" <?php if($menu->type_page == 0) echo "selected" ?>>Chọn kiểu trang</option>
                                        <option value="1" <?php if($menu->type_page == 1) echo "selected" ?>>Trang chủ</option>
                                        <option value="2" <?php if($menu->type_page == 2) echo "selected" ?>>Nhóm sản phẩm</option>
                                        <option value="3" <?php if($menu->type_page == 3) echo "selected" ?>>Sản phẩm</option>
                                        <option value="8" <?php if($menu->type_page == 8) echo "selected" ?>>Nhóm tin tức</option>
                                        <option value="4" <?php if($menu->type_page == 4) echo "selected" ?>>Tin tức</option>
                                        <option value="5" <?php if($menu->type_page == 5) echo "selected" ?>>Onepage</option>
                                        <option value="6" <?php if($menu->type_page == 6) echo "selected" ?>>Đơn hàng</option>
                                        <option value="7" <?php if($menu->type_page == 7) echo "selected" ?>>URL</option>
                                        <option value="9" <?php if($menu->type_page == 9) echo "selected" ?>>Liên hệ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="loadkieutrang">
                            @if($menu->type_page == 2)
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhóm sản phẩm</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <select class="form-control" name="loadkieutrang" id="loadkieutrang">
                                        {!! \App\Helpers\Helpers::cate_parent($cate,0,"--",$menu->cate_id) !!}
                                    </select>
                                </div>
                            @elseif($menu->type_page == 5)
                            @endif
                            </div>
                            @if($menu->icon)
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon hiện tại</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="{{ $menu->icon }}" alt="{{ $menu->name }}" class="img_edit" style="background: #ccc"/>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="icon" id="ckfinder-input" value="{!! old('icon',isset($menu) ? $menu->icon : '') !!}">
                                </div>
                                <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                              {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự </label>--}}
                                    {{--<div class="col-md-1 col-sm-1 col-xs-1">--}}
                                        {{--<input type="text" class="form-control" name="sort_order"  value="{!! old('name',isset($menu) ? $menu->sort_order : '') !!}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vị trí </label>
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <select class="form-control" name="position">
                                        <option value="1" <?php if($menu->position == 1) echo "selected='selected'" ?>>Menu trên</option>
                                        <option value="2" <?php if($menu->position == 2) echo "selected='selected'" ?>>Danh dưới</option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung menu dưới( nếu có )</label>--}}
                                {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                                    {{--<textarea name="contents" class="form-control" rows="3">{!! old('icon',isset($menu) ? $menu->content : '') !!}</textarea>--}}
                                    {{--<script type="text/javascript">CKEDITOR.replace('contents')</script>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="checkbox" name="status" <?php if($menu->status == 1 ) echo "checked" ?>>
                                </div>
                            </div>
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