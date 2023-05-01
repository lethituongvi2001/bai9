<?php include("../view/top.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page">
			<div class="row">
				<div class="col-sm-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
						<li class="breadcrumb-item active">Bác sĩ</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm khách hàng</a>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Họ tên</th>
										<th>Giới tính</th>
										<th>Ngày sinh</th>
										<th>Email</th>
										<th>Số điện thoai</th>
										<th>Địa chỉ</th>
										<th>Hình ảnh</th>
										<th>Chi tiết</th>
										<th>Xoá</th>
									</tr>
								</thead>
								<?php foreach ($khachhangs as $b) : ?>
									<tbody>
										<tr>
											<td><?php echo $b["index"]; ?></td>
											<td><?php echo $b["Name"]; ?></td>
											<td><?php echo $b["Gender"]; ?></td>
											<td><?php echo $b["DOB"]; ?></td>
											<td><?php echo $b["Email"]; ?></td>
											<td><?php echo $b["PhoneNumber"]; ?></td>
											<td><?php echo $b["Address"]; ?></td>
											<td><img src="<?php echo $b["AbsolutePath"]; ?>" width="80" class="img-thumbnail"></td>
											<td><a class="btn btn-warning" href="index.php?action=detail&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
											<td><a class="btn btn-danger" onclick="return confirm('Xác nhận xóa khách hàng ?')" href="index.php?action=delete&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
										</tr>
									<?php endforeach; ?>
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