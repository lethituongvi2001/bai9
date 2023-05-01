<?php
class KHACHHANG
{
    private $id;
    private $tenkhachhang;

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getTenkhachhang()
    {
        return $this->tenkhachhang;
    }

    public function setTenkhachhang($value)
    {
        $this->tenkhachhang = $value;
    }


    // Lấy danh sách
    public function laykhachhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT customers.*, imagerecord.AbsolutePath 
            from customers 
            LEFT JOIN imagerecord ON customers.Image_Id = imagerecord.id
            where customers.active";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laykhachhangtheobacsi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT d.Name, dc.* FROM doctorschedule as dc, doctors as d where dc.DoctorID = d.ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themkhachhang(
        $Name,
        $Gender,
        $DOB,
        $Email,
        $PhoneNumber,
        $Address,
        $ward_id,
        $district_id,
        $province_id,
        $Image_Id,
        $id_account
    ) {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO customers(Name,Gender,DOB,Email,PhoneNumber,Address, ward_id, district_id, province_id ,Image_Id, id_account, create_at) 
				VALUES(:Name,:Gender,:DOB,:Email,:PhoneNumber,:Address,:ward_id, :district_id, :province_id ,:Image_Id,:id_account, :create_at)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":ward_id", $ward_id);
            $cmd->bindValue(":district_id", $district_id);
            $cmd->bindValue(":province_id", $province_id);
            $cmd->bindValue(":Image_Id", $Image_Id);
            $cmd->bindValue(":id_account", $id_account);
            $cmd->bindValue(":create_at", date('Y-m-d'));
            $cmd->execute();
            $id = $dbcon->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoakhachhang($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE customers set active = 0 WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ID", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Cập nhật 
    // update
    public function update_khachhang(
        $id,
        $Name,
        $Gender,
        $DOB,
        $Email,
        $PhoneNumber,
        $Address,
        $ward_id,
        $district_id,
        $province_id,
        $Image_Id
    ) {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE customers 
                SET Name = :Name,
                    Gender = :Gender,
                    DOB = :DOB,
                    Email = :Email,
                    PhoneNumber = :PhoneNumber,
                    Address = :Address,
                    ward_id = :ward_id,
                    district_id = :district_id,
                    province_id = :province_id,
                    Image_Id = :Image_Id,
                    update_at = :update_at
                WHERE ID = :id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":ward_id", $ward_id);
            $cmd->bindValue(":district_id", $district_id);
            $cmd->bindValue(":province_id", $province_id);
            $cmd->bindValue(":Image_Id", $Image_Id);
            $cmd->bindValue(":update_at", date('Y-m-d'));
            $cmd->execute();
            return true;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    // Lấy bệnh nhơn theo id
    public function laykhachhangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT customers.*, imagerecord.FileName , imagerecord.AbsolutePath 
            from customers 
            LEFT JOIN imagerecord ON customers.Image_Id = imagerecord.id
            where customers.ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ID", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    public function laylichbacsitheoidbacsi($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT p.*, dc.DoctorID FROM `doctorschedule` as dc, customers as p, appointments as a WHERE p.ID = a.PatientID and dc.DoctorID = :DoctorID group by dc.DoctorID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":DoctorID", $id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            rsort($result);
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function demtongkhachhang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM customers";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            //rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
