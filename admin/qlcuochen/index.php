<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/bacsi.php");
require("../../model/chuyenmon.php");
require("../../model/benhnhan.php");
require("../../model/cuochen.php");
require("../../model/common.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (!$isLogin) {
    header('Location: http://127.0.0.1/bai9/admin/kttknguoidung/index.php');
    exit;
}

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "booking";
}

$book = new BOOKING();
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$common = new COMMON();
$tb = "";
$sitemap = 'booking';

switch ($action) {
    case "booking":
        $bookings = $book->laydscuochentheoiddoctor(null);
        $i = 1;
        foreach ($bookings as &$booking) {
            $booking['index'] = $i;
            $booking['fullAddress'] = $booking["ContactAddress"];
            $booking['fullAddress'] .= $booking['ward_name'] != '' ? ', ' . $booking["ward_name"] : '';
            $booking['fullAddress'] .= $booking['district_name'] != '' ? ', ' . $booking["district_name"] : '';
            $booking['fullAddress'] .= $booking['province_name'] != '' ? ', ' . $booking["province_name"] : '';
            $booking['status'] = 'Đang mở';
            if ($booking['IsDeleted'])
                $booking['status'] = 'Đã hủy';
            else if ($booking['IsClosed'])
                $booking['status'] = 'Đã hoàn thành';
            else if ($booking['IsApproved'])
                $booking['status'] = 'Chờ khám';
            $i++;
        }
        include("main.php");
        break;
    case "editBooking":
        if (isset($_GET["id"])) {
            $booking_detail = $book->laycuochentheoid($_GET["id"]);
            $doctor_only = $bs->laybacsi();
            $customers = $bn->laykhachhang();
            $cities = $common->takeAllProvince();
            $districts = $common->getDistrictByCity($booking_detail['Province_id']);
            $wards = $common->getWardByDistrict($booking_detail['District_id']);
            // print_r($booking_detail);
            $status = 'Đang mở'; //Đã hoàn thành - Đã hủy - Đang mở - Chờ khám
            if ($booking_detail['IsDeleted'])
                $status = 'Đã hủy';
            else if ($booking_detail['IsClosed'])
                $status = 'Đã hoàn thành';
            else if ($booking_detail['IsApproved'])
                $status = 'Chờ khám';
            // print_r($booking_detail);
            include("updateform.php");
        } else {
            $bookings = $book->laycuochentheoid($_SESSION['nguoidung']['ID']);
            $i = 1;
            foreach ($bookings as &$booking) {
                $booking['index'] = $i;
                $i++;
            }
            include("main.php");
        }
        break;

    case "onSubmitBooking":
        $bookings = $book->laydscuochentheoiddoctor($_SESSION['nguoidung']['ID']);
        $i = 1;
        foreach ($bookings as &$booking) {
            $booking['index'] = $i;
            $i++;
        }
        $booking_id = $_POST['booking_id'];
        if (isset($_POST['deleteBooking'])) {
            $result = $book->changeStatusBooking($booking_id, 3);
            header("Location: /bai9/admin/qlcuochen/index.php?action=booking");
            exit();
            break;
        } elseif (isset($_POST['approveBooking'])) {
            $result = $book->changeStatusBooking($booking_id, 1);
            header("Location: /bai9/admin/qlcuochen/index.php?action=booking");
            exit();
            break;
        } elseif (isset($_POST['openBooking'])) {
            $result = $book->changeStatusBooking($booking_id, 0);
            header("Location: /bai9/admin/qlcuochen/index.php?action=editBooking&id=" . $booking_id);
            exit();
            break;
        } elseif (isset($_POST['closeBooking'])) {
            $result = $book->changeStatusBooking($booking_id, 2);
            header("Location:  /bai9/admin/qlcuochen/index.php?action=booking");
            exit();
            break;
        } else {
            $doctor_id = $_POST['select_doctor'];
            $customer_id = $_POST['select_customer'];
            $trieu_chung = $_POST['trieu_chung'];
            $dich_vu = $_POST['dich_vu'];
            $booking_date = $_POST['booking_date'];
            $booking_time = $_POST['booking_time'];
            $contactName = $_POST['contactName'];
            $contactPhone = $_POST['contactPhone'];
            $contactAddress = $_POST['contactAddress'];
            $select_province = $_POST['select_province'];
            $select_district = $_POST['select_district'];
            $select_ward = $_POST['select_ward'];
            $distance = $_POST['distance'];
            if ($_POST['submitType'] == 'add') {
                $result = $book->addBooking($doctor_id, $customer_id, $trieu_chung, $dich_vu, $booking_date, $booking_time, $contactName, $contactPhone, $contactAddress, $select_province, $select_district, $select_ward, $distance);
                if ($result) {
                    header("Location:  /bai9/admin/qlcuochen/index.php?action=booking");
                    exit();
                    break;
                } else {
                    $message = "Thêm thất bại. Vui lòng kiểm tra lại dữ liệu đã nhập!";
                    break;
                }
            } else {
                $result = $book->updateBooking(
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
                );
                if ($result) {
                    header("Location: /bai9/admin/qlcuochen/index.php?action=booking");
                    exit();
                    break;
                } else {
                    $message = "Sửa thất bại. Vui lòng kiểm tra lại dữ liệu đã nhập!";
                    break;
                }
            }
        }
        // include("qlcuochen/main.php");
        break;


    case "addBooking":
        $booking_detail['Doctor_id'] = $_SESSION['nguoidung']['ID'];
        $doctor_only = $bs->laybacsi();
        $customers = $bn->laykhachhang();
        $cities = $common->takeAllProvince();
        // print_r($booking_detail);
        include("addform.php");
        break;

    case 'get-district-by-city':
        $cityId = $_POST['province_id'];
        $districts = $common->getDistrictByCity($cityId);
        header('Content-Type: application/json');
        echo json_encode($districts);
        break;

    case 'get-ward-by-district':
        $districtId = $_POST['district_id'];
        $wards = $common->getWardByDistrict($districtId);
        header('Content-Type: application/json');
        echo json_encode($wards);
        break;
    default:
        break;
}
