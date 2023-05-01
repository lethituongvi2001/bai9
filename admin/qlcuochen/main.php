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
						<li class="breadcrumb-item active">Cuộc hẹn</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<a href="index.php?action=addBooking" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm cuộc hẹn</a>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="datatable table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Mã cuộc hẹn</th>
								<th>Thời gian</th>
								<th>Triệu chứng</th>
								<th>Dịch vụ</th>
								<th>Bác sĩ</th>
								<th>Khách hàng</th>
								<th>Điện thoại</th>
								<th>Địa chỉ</th>
								<th>Trạng thái</th>
								<th>Chi tiết</th>
							</tr>
						</thead>
						<?php foreach ($bookings as $book) : ?>
							<tbody>
								<tr>
									<td><?php echo $book["index"]; ?></td>
									<td><?php echo $book["Code"]; ?></td>
									<td><?php echo $book["BookingDate"]; ?> </td>
									<td><?php echo $book["Symptom"]; ?></td>
									<td><?php echo $book["ServiceRequirement"]; ?></td>
									<td><?php echo $book["DoctorName"]; ?></td>
									<td><?php echo $book["ContactName"]; ?></td>
									<td><?php echo $book["ContactPhone"]; ?> </td>
									<td><?php echo $book['fullAddress']; ?></td>
									<td><?php echo $book['status']; ?></td>
									<td><a class="btn btn-warning" href="?action=editBooking&id=<?php echo $book["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Wrapper -->
<?php include("../view/bottom.php"); ?>