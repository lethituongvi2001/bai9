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
    public function themcuochen($PatientID, $DoctorID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO appointments(PatientID,DoctorID,ScheduleID,Date,Reason,Expected_cost,Status) 
				VALUES(:PatientID,:DoctorID,:ScheduleID,:Date,:Reason,:Expected_cost,:Status)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":PatientID", $PatientID);
            $cmd->bindValue(":DoctorID", $DoctorID);
            $cmd->bindValue(":ScheduleID", $ScheduleID);
            $cmd->bindValue(":Date", $Date);
            $cmd->bindValue(":Reason", $Reason);
            $cmd->bindValue(":Expected_cost", $Expected_cost);
            $cmd->bindValue(":Status", $Status);
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
    public function suacuochen($id, $PatientID, $DoctorID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE appointments SET PatientID=:PatientID,
                                        DoctorID=:DoctorID,
										ScheduleID=:ScheduleID,
										Date=:Date,
										Reason=:Reason,
										Expected_cost=:Expected_cost,
										Status=:Status
										WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":PatientID", $PatientID);
            $cmd->bindValue(":DoctorID", $DoctorID);
            $cmd->bindValue(":ScheduleID", $ScheduleID);
            $cmd->bindValue(":Date", $Date);
            $cmd->bindValue(":Reason", $Reason);
            $cmd->bindValue(":Expected_cost", $Expected_cost);
            $cmd->bindValue(":Status", $Status);
            $cmd->bindValue(":ID", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
