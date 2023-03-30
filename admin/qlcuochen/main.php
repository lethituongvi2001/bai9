<?php include("../view/top.php"); ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<h3 class="page-title">Cuộc hẹn</h3>
		<!-- Page Header -->
		<div>
			<div class="row">
				<div class="col">

					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
						<li class="breadcrumb-item active">Cuộc hẹn</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm cuộc hẹn</a>
				<div class="card">

					<div class="card-body">


						<div class="table-responsive">
							<table class="datatable table table-stripped">
								<thead>
									<tr>
										<th>Bệnh nhân</th>
										<th>Bác sĩ</th>
										<th>Mã lịch hẹn</th>
										<th>Ngày</th>
										<th>Lí do</th>
										<th>Chi phí dự kiến</th>
										<th>Trạng thái</th>
										<th>Sửa</th>
										<th>Xoá</th>
									</tr>
								</thead>
								<?php
								foreach ($cuochen as $c) :
								?>
									<tbody>
										<tr>
											<td><?php echo $c["PatientID"]; ?></td>
											<td><?php echo $c["DoctorID"]; ?></td>
											<td><?php echo $c["ScheduleID"]; ?></td>
											<td><?php echo $c["Date"]; ?></td>
											<td><?php echo $c["Reason"]; ?>/04/25</td>
											<td><?php echo $c["Expected_cost"]; ?></td>
											<td><?php echo $c["Status"]; ?></td>
											<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $c["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
											<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $c["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
										</tr>

									</tbody>
								<?php
								endforeach;
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

</div>
<!-- /Main Wrapper -->

<?php include("../view/bottom.php"); ?>