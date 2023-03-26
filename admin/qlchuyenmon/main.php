<?php include("../view/top.php"); ?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<h3>Quản lý chuyên môn</h3>
		<br>
		<table class="table table-hover">
			<tr>
				<th>Tên danh mục</th>
				<th>Hình ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
			<?php
			foreach ($chuyenmon as $c) :
				if ($c["ID"] == $idsua) {
			?>
					<form method="post">
						<input type="hidden" name="txtid" value="<?php echo $c["ID"]; ?>">
						<input type="hidden" name="action" value="capnhat">
						<tr>
							<td><input type="text" class="form-control" name="txtten" value="<?php echo $c["Speciality"]; ?>"></td>
							<td><input type="text" class="form-control" value="<?php echo $c["image"]; ?>"></td>
							<td><input type="submit" class="btn btn-warning" value="Sửa"></td>
							<td><a href="index.php?action=xoa&id=<?php echo $c["ID"]; ?>">Xóa</a></td>
						</tr>
					</form>
				<?php
				} else {
				?>
					<tr>
						<td><?php echo $c["Speciality"]; ?></td>
						<td><a href="index.php?action=sua&id=<?php echo $c["ID"]; ?>">Sửa</a></td>
						<td><a href="index.php?action=xoa&id=<?php echo $c["ID"]; ?>">Xóa</a></td>
					</tr>
			<?php
				}
			endforeach;
			?>
		</table>
		<div id="buttonthem">
			<a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm danh mục</a>
		</div>
		<br>
		<div id="formthem">
			<form class="form-inline" method="post">
				<input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục">
				<input class="form-control" type="file" name="filehinhanh">
				<input type="hidden" name="action" value="them">
				<input type="submit" class="btn btn-warning" value="Thêm">
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#formthem").hide();
		$("#buttonthem").click(function() {
			$("#formthem").toggle(1000);
		});
	});
</script>

<?php include("../view/bottom.php"); ?>