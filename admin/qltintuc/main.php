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
						<li class="breadcrumb-item active">Tin tức</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm bác sĩ</a>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="datatable table table-hover table-center mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Loại bài viết</th>
										<th style="max-width: 220px;">Tên bài viết</th>
										<th style="max-width: 230px;">Nội dung</th>
										<th>Hình ảnh</th>
										<th>Chi tiết</th>
										<th>Xoá</th>
									</tr>
								</thead>
								<?php foreach ($tintuc as $b) : ?>
									<tbody>
										<tr>
											<td><?php echo $b["index"]; ?></td>
											<td><?php echo $b["post_type_name"]; ?></td>
											<td style="max-width: 220px;"><?php echo $b["title"]; ?></td>
											<td style="max-width: 230px; text-overflow: ellipsis; overflow: hidden;"><?php echo $b["content"]; ?></td>
											<td><img src="<?php echo $b["AbsolutePath"]; ?>" width="80" class="img-thumbnail"></td>
											<td><a class="btn btn-warning" href="index.php?action=chitiet&ID=<?php echo $b["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
											<td><a class="btn btn-danger" onclick="return confirm('Xác nhận xóa bài viết ?')" href="index.php?action=delete_post&ID=<?php echo $b["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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