<?php include("../view/top.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<h3 class="page-title">Chuyên môn</h3>
		<!-- Page Header -->
		<div class="page">

			<div class="row">

				<div class="col-sm-12">


					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>

						<li class="breadcrumb-item active">Chuyên môn</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">

			<div class="col-sm-12">
				<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm chuyên môn</a>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>Mã</th>
										<th>Chuyên môn</th>
										<th>Ảnh</th>
										<th>Sửa</th>
										<th>Xoá</th>

									</tr>
								</thead>

								<?php
								foreach ($chuyenmon as $c) :
								?>
									<tbody>
										<tr>

											<td><?php echo $c["ID"]; ?></td>
											<td><?php echo $c["Speciality"]; ?></td>
											<td><img src="../../<?php echo $c["image"]; ?>" width="80" class="img-thumbnail"></td>
											<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $c["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
											<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $c["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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