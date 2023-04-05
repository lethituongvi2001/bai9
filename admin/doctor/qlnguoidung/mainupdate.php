<?php include("../view_doctor/top.php"); ?>

<div class="col-md-7 col-lg-8 col-xl-9">

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">



					<h4 class="card-title">Thông tin cơ bản</h4>
					<div class="row form-row">

						<div class="col-md-12">
							<div class="form-group">
								<div class="change-avatar">
									<div class="profile-img">
										<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
									</div>
									<div class="upload-img">
										<div class="change-photo-btn">
											<span><i class="fa fa-upload"></i> đổi ảnh</span>
											<input type="file" class="upload">
										</div>
										<small class="form-text text-muted">Cho phép JPG, GIF hoặc PNG. Kích thước tối đa 2MB</small>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input type="email" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Username <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Họ tên <span class="text-danger">*</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Số điện thoại</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Giới tính</label>
								<select class="form-control select">

									<option>Nam</option>
									<option>Nữ</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-0">
								<label>Ngày sinh</label>
								<input type="date" class="form-control">
							</div>
						</div>
					</div>







				</div>
			</div>
		</div>
	</div>

</div>


<?php include("../view_doctor/bottom.php"); ?>