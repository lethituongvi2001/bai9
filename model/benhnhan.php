<?php
class BENHNHAN
{
    private $id;
    private $tenbenhnhan;

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getTenbenhnhan()
    {
        return $this->tenbenhnhan;
    }

    public function setTenbenhnhan($value)
    {
        $this->tenbenhnhan = $value;
    }


    // Lấy danh sách
    public function laybenhnhan()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM customers where active";
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

    public function laybenhnhantheobacsi()
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
    public function thembenhnhan($Name, $Email, $PhoneNumber, $Address, $DOB, $Gender, $id_account)
    {
        $dbcon = DATABASE::connect();
        try {
            //INSERT INTO `doctors`(`ID`, `Name`, `Last Name`, `Gender`, `DOB`, `Email`, `Phone Number`, `Specialty`, `License Number`, `Address`, `image`)
            $sql = "INSERT INTO customers(Name,Email,PhoneNumber,Address,DOB,Gender,id_account) 
				VALUES(:Name,:Email,:PhoneNumber,:Address,:DOB,:Gender,:id_account)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":id_account", $id_account);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoabenhnhan($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM customers WHERE ID=:ID";
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
    public function suabenhnhan($id, $Name, $Email, $PhoneNumber, $Address, $DOB, $Gender)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE customers SET Name=:Name,
                                        Email=:Email,
										PhoneNumber=:PhoneNumber,
                                        Address=:Address,
                                        DOB=:DOB,
                                        Gender=:Gender																											
										WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":ID", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    // Lấy bệnh nhơn theo id
    public function laybenhnhantheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM customers WHERE ID=:ID";
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

    public function demtongbenhnhan()
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
