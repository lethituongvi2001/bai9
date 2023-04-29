<?php
class COMMON
{
    public function takeAllProvince()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM `province` WHERE 1";
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

    public function getDistrictByCity($matp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM `district` WHERE matp=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $matp);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function getWardByDistrict($maqh)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM `ward` WHERE maqh = :id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $maqh);
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
