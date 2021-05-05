<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>{{__('Đăng kí Website')}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{asset('frontend/css/signout.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>{{__('GIAO DIỆN ĐĂNG KÍ')}}</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="{{URL::to('/sign_up')}}" method="post">
				{{csrf_field()}}
					<input class="text" type="text" name="customer_name" placeholder="Họ và tên" required="">
					<input class="text email" type="email" name="customer_email" placeholder="Email" required="">
					<input style="margin-bottom: 30px;" class="text" type="text" name="customer_phone" placeholder="Số điện thoại" required="">
					<input class="text" type="password" name="" placeholder="Mật khẩu" required="">
					<input class="text w3lpass" type="password" name="customer_password" placeholder="Nhập lại mật khẩu" required="">
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Đăng kí">
				</form>
				<link to="{{URL::to('/login_checkout')}}"></Link>
			</div>
		</div>

	</div>
</body>
</html>