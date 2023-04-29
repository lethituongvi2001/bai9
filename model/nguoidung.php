<?php
$_SESSION['logged_in'] = 0;
class NGUOIDUNG
{
	public function IsLoggedIn()
	{
		return $_SESSION['logged_in'];
	}
	// khai báo các thuộc tính (SV tự viết)

	public function kiemtranguoidunghople($Username, $Password, $admin)
	{
		$db = DATABASE::connect();
		try {
			if ($admin == 1)
				$sql = "SELECT * FROM account WHERE Username=:Username AND Password=:Password AND ActiveStatus=1 and role !=3";
			else
				$sql = "SELECT * FROM account WHERE Username=:Username AND Password=:Password AND ActiveStatus=1 and role =3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":Username", $Username);
			$cmd->bindValue(":Password", md5($Password));
			$cmd->execute();
			$valid = ($cmd->rowCount() == 1);
			if ($valid)
				$_SESSION['logged_in'] = 1;
			$cmd->closeCursor();
			return $valid;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}


	public function kiemtranguoidunghople1($Username, $Password, $doctor)
	{
		$db = DATABASE::connect();
		try {
			if ($doctor == 2)
				$sql = "SELECT * FROM account WHERE Username=:Username AND Password=:Password AND ActiveStatus=1 and role =2";
			else
				$sql = "SELECT * FROM account WHERE Username=:Username AND Password=:Password AND ActiveStatus=1 and role !=2";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":Username", $Username);
			$cmd->bindValue(":Password", md5($Password));
			$cmd->execute();
			$valid = ($cmd->rowCount() == 2);
			if ($valid)
				$_SESSION['logged_in'] = 2;
			$cmd->closeCursor();
			return $valid;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	// lấy thông tin người dùng có $email
	public function kiemtra_role($Username)
	{
		$db = DATABASE::connect();
		try {
			$sql = 'select role from account where Username=:Username';
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":Username", $Username);
			$cmd->execute();
			$ketqua = $cmd->fetch();

			$cmd->closeCursor();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laythongtinnguoidung($Username, $loai_tk)
	{
		$db = DATABASE::connect();
		try {
			$sql = 'select * from account where Username=:Username';
			if ($loai_tk == 2)
				$sql = "select a.role, a.ActiveStatus, d.* from account as a, doctors as d 
				where a.Username=:Username and a.ID = d.id_account";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":Username", $Username);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	function isUsernameExist($Username)
	{
		$db = DATABASE::connect();
		try {
			$sql = 'select count(*) as count from account where Username=:Username';
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":Username", $Username);
			$cmd->execute();
			$result = $cmd->fetch();
			$cmd->closeCursor();
			return $result['count'] > 0;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}



	// lấy tất cả ng dùng
	public function laydanhsachnguoidung()
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM account";
			$cmd = $db->prepare($sql);
			$cmd->execute();
			$ketqua = $cmd->fetchAll();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm khách
	public function themkhachhang($Username, $Password, $name)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO account(Username,Password,Name,role) VALUES(:Username,:Password,:name,3)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':Username', $Username);
			$cmd->bindValue(':Password', md5($Password));
			$cmd->bindValue(':name', $name);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm nd mới, trả về khóa của dòng mới thêm
	public function themnguoidung($Username, $Password, $role)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO account(Username,Password,role) VALUES(:Username,:Password,:role)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':Username', $Username);
			$cmd->bindValue(':Password', md5($Password));
			$cmd->bindValue(':role', $role);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
	public function capnhatnguoidung($id, $Username, $sodt, $name, $hinhanh)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE account set Name=:name, Username=:Username, PhoneNumber=:sodt, image=:hinhanh where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id', $id);
			$cmd->bindValue(':Username', $Username);
			$cmd->bindValue(':sodt', $sodt);
			$cmd->bindValue(':name', $name);
			$cmd->bindValue(':hinhanh', $hinhanh);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi mật khẩu
	public function doimatkhau($Username, $Password)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE account set Password=:Password where Username=:Username";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':Username', $Username);
			$cmd->bindValue(':Password', md5($Password));
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3-khách hàng)
	public function doiloainguoidung($Username, $role)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE account set role=:role where Username=:Username";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':Username', $Username);
			$cmd->bindValue(':role', $role);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi trạng thái (0 khóa, 1 kích hoạt)
	public function doitrangthai($id, $ActiveStatus)
	{
		$db = DATABASE::connect();
		try {
			$sql = "UPDATE account set ActiveStatus=:ActiveStatus where ID=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id', $id);
			$cmd->bindValue(':ActiveStatus', $ActiveStatus);
			$ketqua = $cmd->execute();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
}
