<?php include("../view/top.php"); ?>

<!-- Page Wrapper -->


<div class="page-wrapper">
	<div class="content container-fluid">
		<h3>Quản lý bác sĩ</h3>
		<br>
		<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm bác sĩ</a>
		<br> <br>
		<table class="table table-hover">
			<tr>
				<th>Họ tên</th>
				<th>Giới tính</th>
				<th>Ngày sinh</th>
				<th>Email</th>
				<th>Số điện thoai</th>
				<th>Chuyên môn</th>
				<th>Số giấy phép</th>
				<th>Địa chỉ</th>
				<th>Hình ảnh</th>
				<th>Sửa</th>
				<th>Xoá</th>
			</tr>

			<?php
			//$FirstName, $LastName, $Gender, $DOB, $Email, $PhoneNumber, $Specialty, $LicenseNumber, $Address, $image
			foreach ($bacsi as $b) :
			?>
				<tr>
					<td><?php echo $b["Name"]; ?></td>
					<td><?php echo $b["Gender"]; ?></td>
					<td><?php echo $b["DOB"]; ?></td>
					<td><?php echo $b["Email"]; ?></td>
					<td><?php echo $b["PhoneNumber"]; ?></td>
					<td><?php echo $b["id_speciality"]; ?></td>
					<td><?php echo $b["LicenseNumber"]; ?></td>
					<td><?php echo $b["Address"]; ?></td>
					<td><img src="../../<?php echo $b["image"]; ?>" width="80" class="img-thumbnail"></td>
					<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
					<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
			<?php
			endforeach;
			?>
		</table>
	</div>
</div>
<?php include("../view/bottom.php"); ?>