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
                                    <td width="10%">Tên trang</td>
                                    <td>{{ $onepage->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nội dung</td>
                                    <td>{!! $onepage->content !!}</td>
                                </tr>
                                <tr>
                                    <td>Từ khóa</td>
                                    <td>{{ $onepage->keywords }}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả ( SEO )</td>
                                    <td>{{ $onepage->description }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đăng</td>
                                    <td>{{ $onepage->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Kích hoạt</td>
                                    <td>{!! \App\Helpers\Helpers::check_status_active($onepage->status) !!}</td>
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