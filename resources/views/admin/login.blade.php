
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập quản trị </title>

    <!-- Bootstrap -->
    <link href="/css/admin/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom_login.css" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
            {!! csrf_field() !!}
              <h1>Quản trị website</h1>
              <div>
                <input name="name" type="text" class="form-control" placeholder="Tài khoản" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required="" />
              </div>
              <div class="form-group">
                  <div class="col-md-6">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                          </label>
                      </div>
                  </div>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Đăng nhập</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
