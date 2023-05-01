<?php include("view_doctor/top.php"); ?>
<div class="col-md-8 col-lg-9 col-xl-10">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<h3 class="page-title">Cuộc hẹn</h3>
				</div>
				<div class="col-sm-14">
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
		</div>
	</div>
</div>
</div>
<?php include("view_doctor/bottom.php"); ?>