<?php
class CUOCHEN
{



    // Lấy danh sách
    public function laycuochen()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM appointments";
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
    // Lấy danh sách mặt hàng thuộc 1 danh mục
    // public function laylichbacsitheobacsi($Doctor_ID)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM doctorschedule WHERE Doctor_ID=:mabs";
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
    public function laycuochentheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM appointments WHERE ID=:ID";
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
    public function themcuochen($DoctorID, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO appointments(DoctorID,scheduleDate,scheduleDay,startTime,endTime,bookAvail) 
				VALUES(:DoctorID,:scheduleDate,:scheduleDay,:startTime,:endTime,:bookAvail)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Doctor ID", $DoctorID);
            $cmd->bindValue(":scheduleDate", $scheduleDate);
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
    public function xoacuochen($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM appointments WHERE ID=:ID";
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
    public function suacuochen($id, $DoctorID, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE appointments SET Doctor ID=:Doctor ID,
										scheduleDate=:scheduleDate,
										scheduleDay=:scheduleDay,
										startTime=:startTime,
										endTime=:endTime,
										bookAvail=:bookAvail
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Doctor ID", $DoctorID);
            $cmd->bindValue(":scheduleDate", $scheduleDate);
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
}
