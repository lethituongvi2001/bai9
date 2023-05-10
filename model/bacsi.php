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
            $sql = "SELECT doctors.*, imagerecord.AbsolutePath 
            from doctors
            LEFT JOIN imagerecord ON doctors.Image_Id = imagerecord.id 
            where doctors.Active";
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
    public function thembacsi($Name, $Gender, $DOB, $Email, $PhoneNumber, $Address, $ward_id, $district_id, $province_id, $LicenseNumber, $Image_Id, $id_account)
    {
        $dbcon = DATABASE::connect();
        try {
            //INSERT INTO `doctors`(`ID`, `Name`,`Gender`, `DOB`, `Email`, `Phone Number`, `Specialty`, `License Number`, `Address`, `image`)
            $sql = "INSERT INTO doctors(Name,Gender,DOB,Email,PhoneNumber,Address, ward_id, district_id, province_id ,LicenseNumber,Image_Id, id_account, create_at) 
				VALUES(:Name,:Gender,:DOB,:Email,:PhoneNumber,:Address,:ward_id, :district_id, :province_id ,:LicenseNumber,:Image_Id,:id_account, :create_at)";
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
            $cmd->bindValue(":LicenseNumber", $LicenseNumber);
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
    // update
    public function update_doctor(
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
        $LicenseNumber,
        $Image_Id
    ) {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE doctors 
                SET Name = :Name,
                    Gender = :Gender,
                    DOB = :DOB,
                    Email = :Email,
                    PhoneNumber = :PhoneNumber,
                    Address = :Address,
                    ward_id = :ward_id,
                    district_id = :district_id,
                    province_id = :province_id,
                    LicenseNumber = :LicenseNumber,
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
            $cmd->bindValue(":LicenseNumber", $LicenseNumber);
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

    // Xóa 
    public function delete_doctor($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE doctors set Active = 0 WHERE ID=:ID";
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


    // Lấy bác sĩ theo id
    public function laybacsitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT doctors.*, imagerecord.FileName, imagerecord.AbsolutePath, ward.name as ward_name, district.name as district_name, province.name as province_name
            FROM doctors
            LEFT JOIN imagerecord ON Image_Id = imagerecord.id
            LEFT JOIN ward ON doctors.ward_id = ward.xaid
            LEFT JOIN district ON doctors.district_id = district.maqh
            LEFT JOIN province ON doctors.province_id = province.matp
            WHERE doctors.ID=:ID";

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
