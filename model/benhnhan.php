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
            $sql = "SELECT * FROM patients";
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

    // Thêm mới
    public function thembenhnhan($Name, $Email, $PhoneNumber, $Address, $DOB, $Gender)
    {
        $dbcon = DATABASE::connect();
        try {
            //INSERT INTO `doctors`(`ID`, `Name`, `Last Name`, `Gender`, `DOB`, `Email`, `Phone Number`, `Specialty`, `License Number`, `Address`, `image`)
            $sql = "INSERT INTO patients(Name,Email,PhoneNumber,Address,DOB,Gender) 
				VALUES(:Name,:Email,:PhoneNumber,:Address,:DOB,:Gender)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Gender", $Gender);
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
            $sql = "DELETE FROM patients WHERE ID=:ID";
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
            $sql = "UPDATE patients SET Name=:Name,
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
            $sql = "SELECT * FROM patients WHERE ID=:ID";
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
}
