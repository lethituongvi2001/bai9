<?php
class COMMON
{
    public function takeAllProvince()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM `province` WHERE 1 order by name";
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
            $sql = "SELECT * FROM `district` WHERE matp=:id order by name";
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
            $sql = "SELECT * FROM `ward` WHERE maqh = :id order by name";
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

    // Thêm image record
    public function insertImageRecord($image, $is_customer = null, $isPost = null)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO imagerecord(FileName, AbsolutePath) 
            VALUES (:image, :absolutePath)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":image", $image);
            if ($is_customer != null) {
                $cmd->bindValue(":absolutePath", 'http://127.0.0.1/bai9/assets/img/customer/' . $image);
            } else if ($isPost != null) {
                $cmd->bindValue(":absolutePath", 'http://127.0.0.1/bai9/assets/img/post/' . $image);
            } else {
                $cmd->bindValue(":absolutePath", 'http://127.0.0.1/bai9/assets/img/doctor/' . $image);
            }
            $cmd->execute();
            $id = $dbcon->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
