@extends('admin.master')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-xs-12">
        @include('block.error')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Cấu hình </h2>
                        <div class="clearfix"></div>
                    </div>
                    @include('block.message')
                    <div class="panel-body">
                        <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Thông tin trang web</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                              </ul>
                                              <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="dashboard-widget-content">
                                                <div class="form-group">
                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề trang</label>
                                                     <div class="col-md-3 col-sm-9 col-xs-12">
                                                         <input type="text" class="form-control" name="title" placeholder="Thế giới di động " value="{!! old('title',\App\Helpers\Helpers::page_get_option('title')) !!}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại</label>
                                                     <div class="col-md-3 col-sm-9 col-xs-12">
                                                         <input type="text" class="form-control" name="phone" placeholder="0123456789" value="{!! old('title',\App\Helpers\Helpers::page_get_option('phone')) !!}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Hot Line</label>
                                                     <div class="col-md-3 col-sm-9 col-xs-12">
                                                         <input type="text" class="form-control" name="hotline" placeholder="0123456789" value="{!! old('hotline',\App\Helpers\Helpers::page_get_option('hotline')) !!}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ</label>
                                                     <div class="col-md-6 col-sm-9 col-xs-12">
                                                         <textarea name="address" class="form-control" rows="3" placeholder="Từ Liêm- Hà Nội">{!! old('address',\App\Helpers\Helpers::page_get_option('address')) !!}</textarea>
                                                     </div>
                                                 </div>
                                                <div class="form-group">
                                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                                                     <div class="col-md-3 col-sm-9 col-xs-12">
                                                         <input type="text" class="form-control" name="logo" id="ckfinder-input" value="{!! old('logo',\App\Helpers\Helpers::page_get_option('logo')) !!}">
                                                     </div>
                                                     <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input')">Browse</a>
                                                 </div>
                                                 <div class="form-group">
                                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Favicon</label>
                                                      <div class="col-md-3 col-sm-9 col-xs-12">
                                                          <input type="text" class="form-control" name="favicon" id="ckfinder-input-2" value="{!! old('favicon',\App\Helpers\Helpers::page_get_option('favicon')) !!}">
                                                      </div>
                                                      <a id="ckfinder-popup" class="btn btn-primary col-md-1" onclick="openKCFinder('ckfinder-input-2')">Browse</a>
                                                  </div>
                                                  <div class="form-group">
                                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới thiệu ( Trang liên hệ )</label>
                                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                                           <textarea name="contact" class="form-control">{!! old('contact',\App\Helpers\Helpers::page_get_option('contact')) !!}</textarea>
                                                           <script type="text/javascript">CKEDITOR.replace('contact')</script>
                                                       </div>
                                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Cấu hình SEO</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                              </ul>
                                              <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="dashboard-widget-content">
                                            <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa ( SEO )</label>
                                                  <div class="col-md-6 col-sm-9 col-xs-12">
                                                      <textarea name="keywords" class="form-control" rows="3" placeholder="Keywords">{!! old('keywords',\App\Helpers\Helpers::page_get_option('keywords')) !!}</textarea>
                                                  </div>
                                              </div>
                                             <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả  ( SEO )</label>
                                                  <div class="col-md-6 col-sm-9 col-xs-12">
                                                      <textarea name="description" class="form-control" rows="3" placeholder="Nhập dưới 170 ký tự">{!! old('description',\App\Helpers\Helpers::page_get_option('description')) !!}</textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Thẻ H1 ( SEO )</label>
                                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                                        <textarea name="h1" class="form-control" rows="3" placeholder="">{!! old('h1',\App\Helpers\Helpers::page_get_option('h1')) !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Mạng xã hội</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                              </ul>
                                              <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="dashboard-widget-content">
                                                <div class="form-group">
                                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook</label>
                                                 <div class="col-md-3 col-sm-9 col-xs-12">
                                                     <input type="text" class="form-control" name="faceboook" placeholder="https://www.facebook.com/2456423135" value="{!! old('faceboook',\App\Helpers\Helpers::page_get_option('link_facebook')) !!}">
                                                 </div>
                                             </div>
                                             {{--<div class="form-group">--}}
                                                  {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Youtube</label>--}}
                                                  {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                                      {{--<input type="text" class="form-control" name="youtube" placeholder="https://www.youtube.com/watch?v=FN7ALfpGxiI" value="{!! old('youtube',\App\Helpers\Helpers::page_get_option('link_youtube')) !!}">--}}
                                                  {{--</div>--}}
                                              {{--</div>--}}
                                              {{--<div class="form-group">--}}
                                                   {{--<label class="control-label col-md-3 col-sm-3 col-xs-12"> Google +</label>--}}
                                                   {{--<div class="col-md-3 col-sm-9 col-xs-12">--}}
                                                       {{--<input type="text" class="form-control" name="google" placeholder="https://www.google.com" value="{!! old('google',\App\Helpers\Helpers::page_get_option('link_google')) !!}">--}}
                                                   {{--</div>--}}
                                               {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Cấu hình chân trang</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                              </ul>
                                              <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="dashboard-widget-content">
                                        <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Chân trang ( Trái )</label>
                                             <div class="col-md-9 col-sm-9 col-xs-12">
                                                 <textarea name="footer1" class="form-control">{!! old('footer1',\App\Helpers\Helpers::page_get_option('footer_left')) !!}</textarea>
                                                 <script type="text/javascript">CKEDITOR.replace('footer1')</script>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Chân trang trang ( Phải )</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <textarea name="footer2" class="form-control">{!! old('footer2',\App\Helpers\Helpers::page_get_option('footer_right')) !!}</textarea>
                                                  <script type="text/javascript">CKEDITOR.replace('footer2')</script>
                                              </div>
                                          </div>
                                            </div>
                                        </div>
                                    </div>
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