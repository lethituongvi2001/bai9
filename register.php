<?php include("view/top.php"); ?>

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">

				<!-- Register Content -->
				<div class="account-content">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-7 col-lg-6 login-left">
							<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
						</div>
						<div class="col-md-12 col-lg-6 login-right">
							<div class="login-header">
								<h3>Đăng ký người dùng</h3>
							</div>

							<!-- Register Form -->
							<form action="https://dreamguys.co.in/demo/doccure/doctor-dashboard.html">
								<div class="form-group form-focus">
									<input type="text" class="form-control floating">
									<label class="focus-label">Tên đăng nhập</label>
								</div>
								<div class="form-group form-focus">
									<input type="password" class="form-control floating">
									<label class="focus-label">Mật khẩu</label>
								</div>
								<div class="form-group form-focus">
									<input type="password" class="form-control floating">
									<label class="focus-label">Nhập lại mật khẩu</label>
								</div>
								<div class="text-right">
									<a class="forgot-link" href="?action=dangnhap">Bạn đã có tài khoản?</a>
								</div>
								<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Đăng ký</button>
								<div class="login-or">
									<span class="or-line"></span>
								</div>

							</form>
							<!-- /Register Form -->

						</div>
					</div>
				</div>
				<!-- /Register Content -->

			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->


<?php include("view/bottom.php"); ?>