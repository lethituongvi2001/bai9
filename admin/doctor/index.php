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
    $action = "dashboard";
}

$book = new BOOKING();
$bn = new BENHNHAN();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$common = new COMMON();
$tb = "";
$sitemap = 'dashboard';

switch ($action) {
    case "dashboard":
        $sitemap = 'dashboard';
        include("main.php");
        break;
    case "booking":
        $sitemap = 'booking';
        $bookings = $book->laydscuochentheoiddoctor($_SESSION['nguoidung']['ID']);
        $i = 1;
        foreach ($bookings as &$booking) {
            $booking['index'] = $i;
            $i++;
        }
        include("qlcuochen/main.php");
        break;
    case "editBooking":
        $sitemap = 'booking';
        if (isset($_GET["id"])) {
            $booking_detail = $book->laycuochentheoid($_GET["id"]);
            $doctor_only = $bs->laybacsi();
            $customers = $bn->laybenhnhan();
            $cities = $common->takeAllProvince();
            // print_r($booking_detail);
            include("qlcuochen/updateform.php");
        } else {
            $bookings = $book->laycuochentheoid($_SESSION['nguoidung']['ID']);
            $i = 1;
            foreach ($bookings as &$booking) {
                $booking['index'] = $i;
                $i++;
            }
            include("qlcuochen/main.php");
        }
        break;

    case "xulysua":
        // $sitemap = 'booking';
        // $bookings = $book->laydscuochentheoiddoctor($_SESSION['nguoidung']['ID']);
        // $i = 1;
        // foreach ($bookings as &$booking) {
        //     $booking['index'] = $i;
        //     $i++;
        // }
        if (isset($_POST['deleteBooking'])) {
            print('delete event');
        } elseif (isset($_POST['approveBooking'])) {
            print('approve event');
        } elseif (isset($_POST['openBooking'])) {
            print('open event');
        } else {
            print('save boooking');
        }
        // include("qlcuochen/main.php");
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
