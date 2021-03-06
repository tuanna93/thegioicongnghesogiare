
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hệ thống quản trị</title>

    <!-- Bootstrap -->
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/css/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/css/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
    <link href="/css/admin/custom.css" rel="stylesheet">
    <link href="/css/admin/jquery.dataTables.min.css" rel="stylesheet">
    <script src="/js/admin/ckeditor/ckeditor.js"></script>
    <script src="/js/admin/func_ckfinder.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admin.left_col')

        <!-- top navigation -->
        @include('admin.top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="http://congnghesohungvuong.com" target="_blank">Thiết bế bởi CNS Hùng Vương</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/js/admin/jquery_2.4.js"></script>
    <!-- Bootstrap -->
    <script src="/js/admin/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/js/nprogress.js"></script>
    <!-- gauge.js -->
    <script src="/js/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/js/bootstrap-progressbar.min.js"></script>
    {{--<script src="/js/admin/jquery.dataTables.min.js"></script>--}}
    <!-- iCheck -->
    <script src="/js/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/js/skycons.js"></script>
    <!-- DateJS -->
    <script src="/js/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/js/moment.min.js"></script>
    <script src="/js/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>
    <script src="/js/admin/custom.js"></script>

  </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       