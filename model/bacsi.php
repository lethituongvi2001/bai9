<?php

class BACSI
{


    private $id;
    private $tenbacsi;

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getTenbacsi()
    {
        return $this->tenbacsi;
    }

    public function setTenbacsi($value)
    {
        $this->tenbacsi = $value;
    }





    // Lấy danh sách
    public function laybacsi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT doctors.*, imagerecord.AbsolutePath from doctors, imagerecord where Image_Id=imagerecord.id and doctors.Active";
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
    public function thembacsi($Name, $Gender, $DOB, $Email, $PhoneNumber, $id_speciality, $LicenseNumber, $Address, $image, $id_account)
    {
        $dbcon = DATABASE::connect();
        try {
            //INSERT INTO `doctors`(`ID`, `Name`,`Gender`, `DOB`, `Email`, `Phone Number`, `Specialty`, `License Number`, `Address`, `image`)
            $sql = "INSERT INTO doctors(Name,Gender,DOB,Email,PhoneNumber,id_speciality,LicenseNumber,Address,image, id_account) 
				VALUES(:Name,:Gender,:DOB,:Email,:PhoneNumber,:id_speciality,:LicenseNumber,:Address,:image,:id_account)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":id_speciality", $id_speciality);
            $cmd->bindValue(":LicenseNumber", $LicenseNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":image", $image);
            $cmd->bindValue(":id_account", $id_account);
            $result = $cmd->execute();
            // return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoabacsi($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM doctors WHERE ID=:ID";
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
    public function suabacsi($id, $Name,  $Gender, $DOB, $Email, $PhoneNumber, $id_speciality, $LicenseNumber, $Address, $image)
    {

        $dbcon = DATABASE::connect();
        // $DOB = date("Y-m-d");
        try {
            $sql = "UPDATE doctors SET Name=:Name,										
                                        Gender=:Gender,
                                        DOB=:DOB,
										Email=:Email,
										PhoneNumber=:PhoneNumber,
										id_speciality=:id_speciality,
										LicenseNumber=:LicenseNumber,
										Address=:Address,
										image=:image										
										WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Name", $Name);
            $cmd->bindValue(":Gender", $Gender);
            $cmd->bindValue(":DOB", $DOB);
            $cmd->bindValue(":Email", $Email);
            $cmd->bindValue(":PhoneNumber", $PhoneNumber);
            $cmd->bindValue(":id_speciality", $id_speciality);
            $cmd->bindValue(":LicenseNumber", $LicenseNumber);
            $cmd->bindValue(":Address", $Address);
            $cmd->bindValue(":image", $image);
            $cmd->bindValue(":ID", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy bác sĩ theo id
    public function laybacsitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM doctors WHERE ID=:ID";
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

    // Lấy bác sĩ theo id
    public function laybacsitheoidbacsi($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM doctors WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ID", $id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laybacsitheochuyenmon()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT bs.* , cm.Speciality FROM `speciality`as cm , doctors as bs WHERE bs.id_speciality= cm.ID";
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

    //dếm số bác sĩ
    public function demtongbacsi()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM doctors";
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
