<?php include("../view/top.php"); ?>


<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-7 col-auto">
					<h3 class="page-title">Chuyên môn</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Chuyên môn</li>
					</ul>
				</div>
				<div class="col-sm-5 col">
					<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table method="post" class="datatable table table-hover table-center mb-0">

								<tr>
									<th>id</th>
									<th>Chuyên môn</th>
									<th class="text-right">Hoạt động</th>
								</tr>



								<?php
								foreach ($chuyenmon as $c) :
								?>

									<tr>
										<td><?php echo $c["ID"]; ?></td>

										<td>
											<h2 class="table-avatar">
												<a href="profile.html" class="avatar avatar-sm mr-2">
													<!-- <img class="avatar-img" src="assets/img/specialities/specialities-01.png" alt="ảnh"> -->
													<img class="avatar-img" src="../<?php echo $c["image"]; ?>" style="width:100%" alt="ảnh">
												</a>
												<a><?php echo $c["Speciality"]; ?></a>
											</h2>
										</td>

										<td class="text-right">
											<div class="actions">
												<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit">
													<i class="fe fe-pencil"></i> Sửa
												</a>
												<a data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
													<i class="fe fe-trash"></i> Xoá
												</a>
											</div>
										</td>
									</tr>

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

<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Thêm chuyên môn</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>chuyên môn</label>
								<!-- <input type="text" name="txtten" class="form-control"> -->
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>ảnh</label>
								<input type="file" class="form-control">
							</div>
						</div>

					</div>
					<input type="hidden" name="action" value="them">
					<button type="submit" class="btn btn-primary btn-block">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sửa chuyên môn</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Chuyên môn</label>
								<input type="text" name="txtten" class="form-control" value="txtten">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Ảnh</label>
								<input type="file" class="form-control">
							</div>
						</div>

					</div>
					<input type="hidden" name="action" value="sua">
					<button type="submit" class="btn btn-primary btn-block">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">xoá</h4>
					<p class="mb-4">Are you sure want to delete?</p>
					<button type="button" class="btn btn-primary" href="index.php?action=xoa&id=<?php echo $c["id"]; ?>">Save </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Modal -->
</div>
<!-- /Main Wrapper -->











<!-- jQuery -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Datatables JS -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>

<!-- Custom JS -->
<script src="../assets/js/script.js"></script>






</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->

</html>