<?php include("../view_doctor/top.php"); ?>

<div class="col-md-8 col-lg-9 col-xl-10">

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">






					<h3 class="page-title">Bệnh nhân</h3>
					<!-- Page Header -->
					<div class="page">

						<div class="row">

							<div class="col-sm-12">


								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>

									<li class="breadcrumb-item active">Bệnh nhân</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- <div class="row"> -->

					<div class="col-sm-14">
						<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm lịch bác sĩ</a>
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Tên</th>
												<th>Email</th>
												<th>Số điện thoại</th>
												<th>Địa chỉ</th>
												<th>Ngày sinh</th>
												<th>Giới tính</th>
												<th>Sửa</th>
												<th>Xoá</th>
											</tr>
										</thead>
										<?php

										foreach ($benhnhan as $b) :
										?>
											<tbody>
												<tr>
													<td><?php echo $b["Name"]; ?></td>
													<td><?php echo $b["Email"]; ?></td>
													<td><?php echo $b["PhoneNumber"]; ?></td>
													<td><?php echo $b["Address"]; ?></td>
													<td><?php echo $b["DOB"]; ?></td>
													<td><?php echo $b["Gender"]; ?></td>

													<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
													<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
												</tr>



											<?php
										endforeach;
											?>

											</tbody>

									</table>

								</div>

							</div>

						</div>
					</div>
					<!-- </div> -->




				</div>
			</div>
		</div>
	</div>

</div>


<?php include("../view_doctor/bottom.php"); ?>