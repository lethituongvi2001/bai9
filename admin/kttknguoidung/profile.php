<?php include("../view/top.php"); ?>


<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Change Password Tab -->
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Đổi mật khẩu</h5>
				<div class="row">
					<div class="col-md-10 col-lg-6">
						<form method="post" action="index.php">
							<?php if ($message != null) { ?>
								<label style="color: red;"><?php echo $message ?></label>
							<?php } ?>
							<div class="form-group">

								<label>Mật khẩu cũ</label>
								<input type="password" class="form-control" name="oldpass" required>
							</div>
							<div class="form-group">
								<label>Mật khẩu mới</label>
								<input type="password" class="form-control" name="newpass" required>
							</div>
							<div class="form-group">
								<label>Xác nhận mật khẩu</label>
								<input type="password" class="form-control" name="confirmpass" required>
							</div>
							<input type="hidden" name="action" value="xldoimatkhau">
							<button class="btn btn-primary" type="submit">Lưu</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Change Password Tab -->


	</div>
</div>
<!-- /Page Wrapper -->

<!-- /Page Wrapper -->
<?php include("../view/bottom.php"); ?>