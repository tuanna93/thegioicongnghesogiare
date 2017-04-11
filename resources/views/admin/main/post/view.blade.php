@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> <strong><i class="fa fa-glass"></i> View Product</strong> </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-striped">
                                <tbody>
                                <tr>
                                    <td width="10%">Tên sản phẩm</td>
                                    <td>{{ $post->name }}</td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><img src="{{ $post->image }}" alt="{{ $post->name }}" style="max-width:150px"/></td>
                                </tr>
                                <tr>
                                    <td>Từ khóa SEO</td>
                                    <td>{{ $post->keywords }}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả SEO</td>
                                    <td>{{ $post->description }}</td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($post->status) !!}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đăng</td>
                                    <td>{!! \App\Helpers\Helpers::get_time($post->created_at) !!}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả ngắn</td>
                                    <td>{!! $post->intro !!}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả chi tiết <br>( Trang chi tiết )</td>
                                    <td>{!! $post->content !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection