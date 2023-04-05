<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Đăng nhập</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img class="img-fluid" src="../assets/img/logo-white.png" alt="Logo">
					</div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Truy cập vào bảng điều khiển của chúng tôi</p>

							<!-- Form -->
							<form method="post">
								<div class="form-group">
									<input class="form-control" name="your_name" type="text" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="form-control" name="your_pass" type="password" placeholder="Password">
								</div>
								<div class="form-group">
									<input type="hidden" name="action" value="xldangnhap">
									<input class="btn btn-primary btn-user btn-block" name="signin" id="signin" type="submit" value="Đăng nhập">
									<!-- <button class="btn btn-primary btn-block" name="signin" type="submit">Login</button> -->
								</div>
							</form>
							<!-- /Form -->

							<div class="text-center forgotpass"><a href="forgot-password.html">Quên mật khẩu?</a></div>
							<div class="login-or">
								<span class="or-line"></span>
								<span class="span-or">or</span>
							</div>

							<!-- Social Login -->
							<!-- <div class="social-login">
								<span>Login with</span>
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
							</div> -->
							<!-- /Social Login -->

							<div class="text-center dont-have">Bạn chưa có tài khoản? <a href="register.html">Đăng ký</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="../assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->

</html>