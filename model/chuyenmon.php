<?php
class CHUYENMON
{
    private $id;
    private $tenchuyenmon;

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getTenchuyenmon()
    {
        return $this->tenchuyenmon;
    }

    public function setTenchuyenmon($value)
    {
        $this->tenchuyenmon = $value;
    }

    // Lấy danh sách
    public function laychuyenmon()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM speciality";
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
    public function themchuyenmon($Speciality, $image)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO speciality(Speciality,image) VALUES(:Speciality,:image)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Speciality", $Speciality);
            $cmd->bindValue(":image", $image);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoachuyenmon($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM speciality WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Cập nhật 
    public function suachuyenmon($id, $Speciality, $image)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE speciality SET Speciality=:Speciality, image=:image	 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Speciality", $Speciality);
            $cmd->bindValue(":image", $image);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh mục theo id
    public function laychuyenmontheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM speciality WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
