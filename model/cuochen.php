<?php
class CUOCHEN
{



    // Lấy danh sách
    public function laycuochen()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT a.*, p.Name FROM `appointments` as a, patients as p WHERE a.PatientID = p.ID";
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
    public function themcuochen($PatientID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO appointments(PatientID,ScheduleID,Date,Reason,Expected_cost,Status) 
				VALUES(:PatientID,:ScheduleID,:Date,:Reason,:Expected_cost,:Status)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":PatientID", $PatientID);

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
    public function suacuochen($id, $PatientID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE appointments SET PatientID=:PatientID,
                                       
										ScheduleID=:ScheduleID,
										Date=:Date,
										Reason=:Reason,
										Expected_cost=:Expected_cost,
										Status=:Status
										WHERE ID=:ID";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":PatientID", $PatientID);

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

    public function demtongcuochen()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM appointments";
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
