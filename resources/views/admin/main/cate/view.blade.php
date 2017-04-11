@extends('admin.master')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong><i class="fa fa-glass"></i> Detail Category Product</strong> </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="10%">Tên danh mục</td>
                                    <td>{{ $cate->name }}</td>
                                </tr>
                                <tr>
                                    <td>Danh mục cha</td>
                                    <td>{!! \App\Helpers\Helpers::cate_parent_name($cate->parent_id) !!}</td>
                                </tr>
                                <tr>
                                    <td>Icon</td>
                                    <td>
                                        @if($cate->icon)
                                        <img style="max-width:150px" title="{{ $cate->name }}" src="{{ $cate->icon }}">
                                        @else
                                            {!! \App\Helpers\Helpers::check_label_icon($cate->icon) !!}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Từ khóa SEO</td>
                                    <td>{{ $cate->keywords }}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả SEO</td>
                                    <td>{{ $cate->description }}</td>
                                </tr>
                                <tr>
                                    <td>Hiển thị menu trái</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($cate->is_menu) !!}</td>
                                </tr>
                                <tr>
                                    <td>Hiển thị tab trang chủ</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($cate->is_tab) !!}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($cate->status) !!}</td>
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