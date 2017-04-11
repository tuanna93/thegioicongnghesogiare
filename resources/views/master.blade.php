<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="vi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<link rel="shortcut icon" href="/upload/images/logo/favicon.png">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/locsanpham.css">
<link rel="stylesheet" href="/css/menudanhmuc.css">
<link rel="stylesheet" href="/css/jquery.bxslider.css">
<link rel="stylesheet" href="/css/owl.carousel.min.css">
<link rel="stylesheet" href="/css/slick.css">
<link rel="stylesheet" href="/css/slick-theme.css">

<script async src="/js/fbevents.js"></script>
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery.lazyload.js"></script>
<script src="/js/slick.js"></script>
<script>
	$(document).ready(function(){
		$("img.lazy").lazyload({

		});
	});
</script>

<script src="/js/jquery.bxslider.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/content.js"></script>
</head>

<body cz-shortcut-listen="true">

@include('widgets.header')

@include('widgets.navbar')

@yield('content')

@include('widgets.footer')

<a href="#" rel="nofollow" class="scroll-top totop off"></a>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>