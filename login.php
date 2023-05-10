<?php include("view/top.php"); ?>

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-8 offset-md-2">

				<!-- Login Tab Content -->
				<div class="account-content">
					<div class="row align-items-center justify-content-center">
						<div class="col-md-7 col-lg-6 login-left">
							<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
						</div>
						<div class="col-md-12 col-lg-6 login-right">
							<div class="login-header">
								<h3>Đăng nhập</h3>
							</div>
							<form method="post" class="register-form" id="login-form">
								<div class="form-group form-focus">
									<input name="username" type="text" class="form-control floating">
									<label class="focus-label">Email</label>
								</div>
								<div class="form-group form-focus">
									<input name="password" type="password" class="form-control floating">
									<label class="focus-label">Mật khẩu</label>
								</div>
								<?php if ($message && $message != '') { ?>
									<div class="text-center text-danger">
										<?php echo $message; ?>
									</div>
								<?php } ?>

								<div class="text-center dont-have">Bạn chưa có tài khoản? <a href="?action=dangky">Đăng ký ngay</a></div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Login Tab Content -->

			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->


<?php include("view/bottom.php"); ?>