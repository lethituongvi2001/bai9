<?php
class LICHBACSI
{


    // Lấy danh sách
    public function laylichbacsi($DoctorID = null)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT d.Name, ds.* 
            FROM doctor_schedule as ds, doctors as d";
            if ($DoctorID != null)
                $sql = "SELECT d.Name, ds.* 
                FROM doctorschedule as ds, doctors as d 
                where ds.DoctorID = d.ID ";
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
    // public function laylichbacsi1()
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM doctorschedule ";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         rsort($result); // sắp xếp giảm thay cho order by desc
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    // public function laylichbacsitheobacsi($Doctor_ID)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM doctorschedule WHERE DoctorID=:mabs";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":mabs", $Doctor_ID);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // Lấy mặt hàng theo id
    public function laylichbacsitheoidbacsi($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM doctorschedule WHERE DoctorID = :id and bookAvail = 'Có sẵn'";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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


    // Lấy bác sĩ theo id
    public function laylichbacsitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM doctorschedule WHERE ID=:ID";
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

    // Thêm mới
    public function themlichbacsi($DoctorID, $scheduleDay, $startTime, $endTime, $bookAvail)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO doctorschedule(DoctorID,scheduleDay,startTime,endTime,bookAvail) 
				VALUES(:DoctorID,:scheduleDay,:startTime,:endTime,:bookAvail)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":DoctorID", $DoctorID);
            $cmd->bindValue(":scheduleDay", $scheduleDay);
            $cmd->bindValue(":startTime", $startTime);
            $cmd->bindValue(":endTime", $endTime);
            $cmd->bindValue(":bookAvail", $bookAvail);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoalichbacsi($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM doctorschedule WHERE ID=:ID";
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
    public function sualichbacsi($id, $DoctorID,  $scheduleDay, $startTime, $endTime, $bookAvail)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE doctorschedule SET DoctorID=:DoctorID,										
										scheduleDay=:scheduleDay,
										startTime=:startTime,
										endTime=:endTime,
										bookAvail=:bookAvail
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":DoctorID", $DoctorID);
            $cmd->bindValue(":scheduleDay", $scheduleDay);
            $cmd->bindValue(":startTime", $startTime);
            $cmd->bindValue(":endTime", $endTime);
            $cmd->bindValue(":bookAvail", $bookAvail);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //SELECT * FROM `doctorschedule` WHERE `Doctor ID` = 2
    public function laylichtheobacsi($Doctor_ID)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM doctorschedule WHERE DoctorID=:mabs";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":mabs", $Doctor_ID);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
