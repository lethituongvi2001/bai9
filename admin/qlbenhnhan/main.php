<?php include("../view/top.php"); ?>

<h3>Quản lý bệnh nhân</h3>
<br>
<a href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm bệnh nhân</a>
<br> <br>
<table class="table table-hover">
	<tr>
		<th>Họ tên</th>
		<th>Email</th>
		<th>Số điện thoai</th>
		<th>Địa chỉ</th>
		<th>Ngày sinh</th>
		<th>Sửa</th>
		<th>Xoá</th>
	</tr>

	<?php
	//$id, $Name, $Email, $PhoneNumber, $Address, $DOB, $Gender, $Password
	foreach ($benhnhan as $b) :
	?>

		<?php

		foreach ($nguoidung as $nd) :
		?>
			<tr>
				<td><?php echo $b["Name"]; ?></td>
				<td><?php echo $nd["Email"]; ?></td>
				<td><?php echo $b["PhoneNumber"]; ?></td>
				<td><?php echo $b["Address"]; ?></td>
				<td><?php echo $b["DOB"]; ?></td>
				<td><?php echo $b["Gender"]; ?></td>
				<td><a class="btn btn-warning" href="index.php?action=sua&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
				<td><a class="btn btn-danger" href="index.php?action=xoa&ID=<?php echo $b["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
			</tr>
		<?php
		endforeach;
		?>
	<?php
	endforeach;
	?>
</table>

<?php include("../view/bottom.php"); ?>