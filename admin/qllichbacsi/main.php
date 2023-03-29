<?php include("../view/top.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<h3 class="page-title">Lịch bác sĩ</h3>
		<!-- Page Header -->
		<div class="page-header">

			<div class="row">

				<div class="col-sm-12">


					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>

						<li class="breadcrumb-item active">Lịch bác sĩ</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">

			<div class="col-sm-12">
				<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm lịch bác sĩ</a>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Bác sĩ</th>
										<th>Ngày hẹn</th>
										<th>Giờ bắt đầu</th>
										<th>Giờ kết thúc</th>
										<th>Trạng thái</th>
										<th>Sửa</th>
										<th>Xoá</th>

									</tr>
								</thead>
								<?php
								foreach ($lichbacsi as $l) :
								?>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">

													<a href="profile.html"><?php echo $l["DoctorID"]; ?></a>
												</h2>
											</td>
											<td><?php echo $l["scheduleDay"]; ?></td>

											<td><?php echo $l["startTime"]; ?> </td>

											<td><?php echo $l["endTime"]; ?></td>
											<td><?php echo $l["bookAvail"]; ?></td>

											<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $l["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
											<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $l["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
		</div>


	</div>
</div>
<!-- /Page Wrapper -->
<?php include("../view/bottom.php"); ?>