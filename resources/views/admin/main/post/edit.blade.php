@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                @include('block.error')
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sửa tin tức <small>{{ $post->name }}</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề tin</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tại đây ..." value="{!! old('name',isset($post) ? $post->name : '') !!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả ngắn</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="intro" class="form-control" rows="3">{!! old('name',isset($post) ? $post->intro : '') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('intro')</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả chi tiết</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="contents" class="form-control">{!! old('name',isset($post) ? $post->content : '') !!}</textarea>
                                    <script type="text/javascript">CKEDITOR.replace('contents')</script>
                                </div>
                            </div>
                            @if($post->image)
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh hiện tại</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="{{ $post->image }}" alt="{{ $post->name }}" class="img_edit"/>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="image" id="ckfinder-input" value="{!! old('name',isset($post) ? $post->image : '') !!}">
                                </div>
                                <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa SEO</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="keywords" class="form-control" rows="3" placeholder="Từ khóa ...">{!! old('name',isset($post) ? $post->keywords : '') !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả SEO</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" class="form-control" rows="3" placeholder="Mổ tả giới hạn nhỏ hơn 180 ký tự ...">{!! old('name',isset($post) ? $post->description : '') !!}</textarea>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                              {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Thứ tự</label>--}}
                                  {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                    {{--<input type="text" class="form-control" name="orders" value="{!! old('orders',isset($post) ? $post->orders : '') !!}">--}}
                                  {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích hoạt</label>
                                <div class="col-md-3 col-sm-9 col-xs-12">
                                <input type="checkbox" name="status" <?php if($post->status == 1 ) echo "checked" ?>>
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