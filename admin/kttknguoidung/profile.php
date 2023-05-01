<?php include("../view/top.php"); ?>

<!-- /Main Wrapper -->
<div class="main-wrapper">

	<!-- Header -->
	<div class="header">

		<!-- Logo -->
		<div class="header-left">
			<a href="index.html" class="logo">
				<img src="../assets/img/logo.png" alt="Logo">
			</a>
			<a href="index.html" class="logo logo-small">
				<img src="../assets/img/logo-small.png" alt="Logo" width="30" height="30">
			</a>
		</div>
		<!-- /Logo -->

		<a href="javascript:void(0);" id="toggle_btn">
			<i class="fe fe-text-align-left"></i>
		</a>

		<div class="top-nav-search">
			<form>
				<input type="text" class="form-control" placeholder="Search here">
				<button class="btn" type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>

		<!-- Mobile Menu Toggle -->
		<a class="mobile_btn" id="mobile_btn">
			<i class="fa fa-bars"></i>
		</a>
		<!-- /Mobile Menu Toggle -->

		<!-- Header Right Menu -->
		<ul class="nav user-menu">

			<!-- Notifications -->
			<li class="nav-item dropdown noti-dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
				</a>
				<div class="dropdown-menu notifications">
					<div class="topnav-dropdown-header">
						<span class="notification-title">Thông báo</span>
						<a href="javascript:void(0)" class="clear-noti"> Xoá tất cả </a>
					</div>
					<div class="noti-content">
						<ul class="notification-list">
							<li class="notification-message">
								<a href="#">
									<div class="media">
										<span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/doctors/doctor-thumb-01.jpg">
										</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
											<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="#">
									<div class="media">
										<span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/patients/patient1.jpg">
										</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
											<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="#">
									<div class="media">
										<span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/patients/patient2.jpg">
										</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
											<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>

						</ul>
					</div>
					<div class="topnav-dropdown-footer">
						<a href="#">Xem tất cả thông báo</a>
					</div>
				</div>
			</li>
			<!-- /Notifications -->

			<!-- User Menu -->
			<li class="nav-item dropdown has-arrow">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<span class="user-img"><img class="rounded-circle" src="../assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
				</a>
				<div class="dropdown-menu">
					<div class="user-header">
						<div class="avatar avatar-sm">
							<img src="../assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
						</div>
						<div class="user-text">
							<h6><?php $_SESSION['nguoidung'] ?></h6>
							<p class="text-muted mb-0">Administrator</p>
						</div>
					</div>
					<a class="dropdown-item" href="../kttknguoidung/profile.php">Hồ sơ</a>
					<!-- <a class="dropdown-item" href="settings.html">Cài đặt</a> -->
					<a class="dropdown-item" href="../kttknguoidung/index.php?action=dangxuat">Đăng xuất</a>
				</div>
			</li>
			<!-- /User Menu -->

		</ul>
		<!-- /Header Right Menu -->

	</div>
	<!-- /Header -->

	<!-- Sidebar -->
	<div class="sidebar" id="sidebar">
		<div class="sidebar-inner slimscroll">
			<div id="sidebar-menu" class="sidebar-menu">
				<ul>
					<li class="menu-title">
						<span>Main</span>
					</li>
					<li class="active">
						<a href="index.html"><i class="fe fe-home"></i> <span>Bảng điều khiển</span></a>
					</li>
					<li>
						<a href="../qlcuochen/index.php"><i class="fe fe-layout"></i> <span>Cuộc hẹn</span></a>
					</li>
					<li>
						<a href="../qlchuyenmon/index.php"><i class="fe fe-users"></i> <span>Chuyên môn</span></a>
					</li>
					<li>
						<a href="../qlbacsi/index.php"><i class="fe fe-user-plus"></i> <span>Bác sĩ</span></a>
					</li>
					<li>
						<a href="../qlbenhnhan/index.php"><i class="fe fe-user"></i> <span>Bệnh nhân</span></a>
					</li>
					<li>
						<a href="../qllichbacsi/index.php"><i class="fe fe-star-o"></i> <span>Lịch của bác sĩ</span></a>
					</li>
					<li>
						<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Phản hồi</span></a>
					</li>





				</ul>
			</div>
		</div>
	</div>
	<!-- /Sidebar -->

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Profile</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
							<li class="breadcrumb-item active">Profile</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="profile-header">
						<div class="row align-items-center">
							<div class="col-auto profile-image">
								<a href="#">
									<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.jpg">
								</a>
							</div>
							<div class="col ml-md-n2 profile-user-info">
								<h4 class="user-name mb-0">Ryan Taylor</h4>
								<h6 class="text-muted">ryantaylor@admin.com</h6>
								<div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
								<div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
							</div>
							<div class="col-auto profile-btn">

								<a href="#" class="btn btn-primary">
									Edit
								</a>
							</div>
						</div>
					</div>
					<div class="profile-menu">
						<ul class="nav nav-tabs nav-tabs-solid">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
							</li>
						</ul>
					</div>
					<div class="tab-content profile-tab-cont">

						<!-- Personal Details Tab -->
						<div class="tab-pane fade show active" id="per_details_tab">

							<!-- Personal Details -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title d-flex justify-content-between">
												<span>Personal Details</span>
												<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
											</h5>
											<div class="row">
												<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
												<p class="col-sm-10">John Doe</p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
												<p class="col-sm-10">24 Jul 1983</p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
												<p class="col-sm-10">johndoe@example.com</p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
												<p class="col-sm-10">305-310-5857</p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
												<p class="col-sm-10 mb-0">4663 Agriculture Lane,<br>
													Miami,<br>
													Florida - 33165,<br>
													United States.</p>
											</div>
										</div>
									</div>

									<!-- Edit Details Modal -->
									<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Personal Details</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form>
														<div class="row form-row">
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>First Name</label>
																	<input type="text" class="form-control" value="John">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>Last Name</label>
																	<input type="text" class="form-control" value="Doe">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label>Date of Birth</label>
																	<div class="cal-icon">
																		<input type="text" class="form-control" value="24-07-1983">
																	</div>
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>Email ID</label>
																	<input type="email" class="form-control" value="johndoe@example.com">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>Mobile</label>
																	<input type="text" value="+1 202-555-0125" class="form-control">
																</div>
															</div>
															<div class="col-12">
																<h5 class="form-title"><span>Address</span></h5>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label>Address</label>
																	<input type="text" class="form-control" value="4663 Agriculture Lane">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>City</label>
																	<input type="text" class="form-control" value="Miami">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>State</label>
																	<input type="text" class="form-control" value="Florida">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>Zip Code</label>
																	<input type="text" class="form-control" value="22434">
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label>Country</label>
																	<input type="text" class="form-control" value="United States">
																</div>
															</div>
														</div>
														<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- /Edit Details Modal -->

								</div>


							</div>
							<!-- /Personal Details -->

						</div>
						<!-- /Personal Details Tab -->

						<!-- Change Password Tab -->
						<div id="password_tab" class="tab-pane fade">

							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Change Password</h5>
									<div class="row">
										<div class="col-md-10 col-lg-6">
											<form>
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control">
												</div>
												<button class="btn btn-primary" type="submit">Save Changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Change Password Tab -->

					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Page Wrapper -->
<?php include("../view/bottom.php"); ?>