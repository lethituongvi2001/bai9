<?php
class TINTUC
{
    private $id;
    private $tentintuc;

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getTentintuc()
    {
        return $this->tentintuc;
    }

    public function setTentintuc($value)
    {
        $this->tentintuc = $value;
    }

    // Lấy danh sách loại bài viết
    public function take_all_post_type()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * from post_type";
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
    // Lấy danh sách
    public function laytintuc($type = null)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT post.*, post_type.name as post_type_name, imagerecord.AbsolutePath  FROM post
            LEFT JOIN imagerecord on post.image_id = imagerecord.id
            INNER JOIN post_type on post.post_type_id = post_type.id
            WHERE post.active";
            if ($type != null) {
                $sql .= ' and post.post_type_id = :id';
                $cmd = $dbcon->prepare($sql);
                $cmd->bindValue(":id", $type);
            } else {
                $cmd = $dbcon->prepare($sql);
            }
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
    public function themtintuc($title, $content, $post_type_id, $image)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO `post`(`title`, `content`, `post_type_id`, `image_id`, `create_at`, `created_by`) 
            VALUES  (:title, :content, :post_type_id, :image, :create_at, :created_by)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":title", $title);
            $cmd->bindValue(":content", $content);
            $cmd->bindValue(":post_type_id", $post_type_id);
            $cmd->bindValue(":image", $image);
            $cmd->bindValue(":create_at", date('Y-m-d'));
            $cmd->bindValue(":created_by", $_SESSION['nguoidung']['Username']);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoatintuc($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE post set active = 0 WHERE id=:id";
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
    public function suatintuc($id, $title, $content, $post_type, $image)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE post 
            SET title=:title, 
                content=:content,
                post_type_id = :post_type,
                image_id=:image ,
                update_at=:update_at,
                updated_by=:updated_by
                WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":title", $title);
            $cmd->bindValue(":content", $content);
            $cmd->bindValue(":post_type", $post_type);
            $cmd->bindValue(":image", $image);
            $cmd->bindValue(":update_at", date('Y-m-d'));
            $cmd->bindValue(":updated_by", $_SESSION['nguoidung']['Username']);
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
    public function laytintuctheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT post.*, post_type.name as post_type_name, imagerecord.AbsolutePath, imagerecord.FileName  FROM post
            LEFT JOIN imagerecord on post.image_id = imagerecord.id
            INNER JOIN post_type on post.post_type_id = post_type.id
            WHERE post.active
            and post.id=:id";
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

    public function demtongtintuc()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT COUNT(*) FROM post";
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

    // Lấy chuyen mon by id
    public function getSpecialityByDoctor($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT h.id, h.doctor_id, h.post_id as post_id, doctors.Name as 'doctor_name', post.Name as 'post_name' 
            from has_post_doctor as h, doctors, post where doctor_id=doctors.ID and post_id=post.ID and doctor_id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
    public function insert_has_post_doctor($doctor_id, $post_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO has_post_doctor(doctor_id, post_id) 
             VALUES (:doctor_id,:post_id)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":doctor_id", $doctor_id);
            $cmd->bindValue(":post_id", $post_id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // remove all chuyen mon by doctor
    public function delete_has_post_doctor($doctor_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM `has_post_doctor` WHERE doctor_id = :doctor_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":doctor_id", $doctor_id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
