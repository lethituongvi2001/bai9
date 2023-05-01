<?php
class BOOKING
{
    // Lấy danh sách
    public function laycuochentheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT b.*, c.Name as customer_name, ward.name as ward_name, district.name as district_name, province.name as province_name
            FROM booking as b
            INNER JOIN customers as c ON b.Customer_id = c.ID
            LEFT JOIN ward ON b.Ward_id = ward.xaid
            LEFT JOIN district ON b.District_id = district.maqh
            LEFT JOIN province ON b.Province_id = province.matp
            WHERE b.id = :id
            ";
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


    // Lấy mặt hàng theo id
    public function laydscuochentheoiddoctor($id = null)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT b.*, d.Name as DoctorName, c.Name as customer_name, ward.name as ward_name, district.name as district_name, province.name as province_name
            FROM booking as b
            INNER JOIN customers as c ON b.Customer_id = c.ID
            INNER JOIN doctors as d ON b.Doctor_id = d.ID
            LEFT JOIN ward ON b.Ward_id = ward.xaid
            LEFT JOIN district ON b.District_id = district.maqh
            LEFT JOIN province ON b.Province_id = province.matp";
            if ($id != null) {
                $sql .= " where Doctor_id =:id";
                $cmd = $dbcon->prepare($sql);
                $cmd->bindValue(":id", $id);
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
    function generateCode()
    {
        $date = date('ymd'); // Get the current date in yymmdd format
        $dbcon = DATABASE::connect();
        $sql = "SELECT COUNT(*) as count FROM booking WHERE CreatedDate = CURDATE()"; // Get the number of bookings on the current date
        $stmt = $dbcon->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'] + 1; // Increment the count by 1
        $code = "B-$date-" . str_pad($count, 3, "0", STR_PAD_LEFT); // Format the code with leading zeros
        return $code;
    }
    public function countBooking()
    {
        $dbcon = DATABASE::connect();
        $sql = "SELECT COUNT(*) as count FROM booking WHERE CreatedDate = CURDATE()"; // Get the number of bookings on the current date
        $stmt = $dbcon->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
    // Thêm mới
    public function addBooking(
        $doctor_id = null,
        $customer_id,
        $trieu_chung,
        $dich_vu,
        $booking_date,
        $booking_time,
        $contactName,
        $contactPhone,
        $contactAddress,
        $select_province,
        $select_district,
        $select_ward,
        $distance
    ) {
        $dbcon = DATABASE::connect();
        try {
            $Code = $this->generateCode();

            $sql = "INSERT INTO `booking` (`Customer_id`, `Code`, `Doctor_id`, `Symptom`, `ServiceRequirement`, `BookingDate`, `BookingTime`, `ContactAddress`, `ContactPhone`, `ContactName`, `Ward_id`, `District_id`, `Province_id`, `Lat`, `Lng`, `Distance`, `CreatedDate`)
            VALUES (:Customer_id, :Code, :Doctor_id, :Symptom, :ServiceRequirement, :BookingDate, :BookingTime, :ContactAddress, :ContactPhone, :ContactName, :Ward_id, :District_id, :Province_id, :Lat, :Lng, :Distance, :CreatedDate)
            ";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Customer_id", $customer_id);
            $cmd->bindValue(":Code", $Code);
            if ($doctor_id != null) {
                $cmd->bindValue(":Doctor_id", $doctor_id);
            } else {
                $cmd->bindValue(":Doctor_id", $_SESSION['nguoidung']['ID']);
            }
            $cmd->bindValue(":Symptom", $trieu_chung);
            $cmd->bindValue(":ServiceRequirement", $dich_vu);
            $cmd->bindValue(":BookingDate", date('Y-m-d', strtotime($booking_date)));
            $cmd->bindValue(":BookingTime", $booking_time);
            $cmd->bindValue(":ContactAddress", $contactAddress);
            $cmd->bindValue(":ContactPhone", $contactPhone);
            $cmd->bindValue(":ContactName", $contactName);
            $cmd->bindValue(":Ward_id", $select_ward);
            $cmd->bindValue(":District_id", $select_district);
            $cmd->bindValue(":Province_id", $select_province);
            $cmd->bindValue(":Lat", null);
            $cmd->bindValue(":Lng", null);
            $cmd->bindValue(":Distance", $distance);
            $cmd->bindValue(":CreatedDate", date('Y-m-d'));
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Update
    public function updateBooking(
        $customer_id,
        $trieu_chung,
        $dich_vu,
        $booking_date,
        $booking_time,
        $contactName,
        $contactPhone,
        $contactAddress,
        $select_province,
        $select_district,
        $select_ward,
        $distance,
        $booking_id
    ) {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE `booking`
                    SET `Customer_id` = :Customer_id,
                        `Symptom` = :Symptom,
                        `ServiceRequirement` = :ServiceRequirement,
                        `BookingDate` = :BookingDate,
                        `BookingTime` = :BookingTime,
                        `ContactAddress` = :ContactAddress,
                        `ContactPhone` = :ContactPhone,
                        `ContactName` = :ContactName,
                        `Ward_id` = :Ward_id,
                        `District_id` = :District_id,
                        `Province_id` = :Province_id,
                        `Lat` = :Lat,
                        `Lng` = :Lng,
                        `Distance` = :Distance,
                        `UpdatedDate` = :UpdatedDate
                    WHERE id = :booking_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":Customer_id", $customer_id);
            $cmd->bindValue(":Symptom", $trieu_chung);
            $cmd->bindValue(":ServiceRequirement", $dich_vu);
            $cmd->bindValue(":BookingDate", date('Y-m-d', strtotime($booking_date)));
            $cmd->bindValue(":BookingTime", $booking_time);
            $cmd->bindValue(":ContactAddress", $contactAddress);
            $cmd->bindValue(":ContactPhone", $contactPhone);
            $cmd->bindValue(":ContactName", $contactName);
            $cmd->bindValue(":Ward_id", $select_ward);
            $cmd->bindValue(":District_id", $select_district);
            $cmd->bindValue(":Province_id", $select_province);
            $cmd->bindValue(":Lat", null);
            $cmd->bindValue(":Lng", null);
            $cmd->bindValue(":Distance", $distance);
            $cmd->bindValue(":UpdatedDate", date('Y-m-d'));
            $cmd->bindValue(":booking_id", $booking_id);
            // print_r($cmd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // approvve
    public function changeStatusBooking($booking_id, $event) //1: approve, 2: close, 3: delete, 4: open
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE `booking`
            SET `IsApproved` = 0
            WHERE id = :booking_id";
            switch ($event) {
                case 1:
                    $sql = "UPDATE `booking`
                    SET `IsApproved` = 1
                    WHERE id = :booking_id";
                    break;
                case 2:
                    $sql = "UPDATE `booking`
                    SET `IsClosed` = 1
                    WHERE id = :booking_id";
                    break;
                case 3:
                    $sql = "UPDATE `booking`
                    SET `IsDeleted` = 1
                    WHERE id = :booking_id";
                    break;
                default:
                    break;
            }
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":booking_id", $booking_id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
