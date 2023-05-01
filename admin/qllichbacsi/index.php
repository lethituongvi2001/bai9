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
    $action = "xem";
}

$book = new BOOKING();
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$common = new COMMON();
$tb = "";
$sitemap = 'bacsi';

switch ($action) {
    case "xem":
        $lichbacsi = $lbs->laylichbacsi();
        for ($i = 0; $i < count($lichbacsi); $i++) {
            $lichbacsi[$i]['STT'] = $i + 1;
        }
        $bacsi = $bs->laybacsi();
        include("main.php");
        break;
    case "them":
        $bacsi = $bs->laybacsi();
        include("addform3.php");
        break;
    case "xulythem":
        //$DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail

        $DoctorID = $_POST["otpDoctor"];
        // $scheduleDate = $_POST["txtscheduleDate"];
        $scheduleDay = $_POST["otpcheduleDay"];
        $startTime = $_POST["txtstartTime"];
        $endTime = $_POST["txtendTime"];
        $bookAvail = $_POST["otpbookAvail"];
        $lbs->themlichbacsi($DoctorID, $scheduleDay, $startTime, $endTime, $bookAvail);
        $lichbacsi = $lbs->laylichbacsi();

        for ($i = 0; $i < count($lichbacsi); $i++) {
            $lichbacsi[$i]['STT'] = $i + 1;
        }
        $bacsi = $bs->laybacsi();
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["ID"]))
            $lbs->xoalichbacsi($_GET["ID"]);
        $lichbacsi = $lbs->laylichbacsi();
        for ($i = 0; $i < count($lichbacsi); $i++) {
            $lichbacsi[$i]['STT'] = $i + 1;
        }
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $l = $lbs->laylichbacsitheoid($_GET["ID"]);
            $bacsi = $bs->laybacsi();
            include("updateform.php");
        } else {
            $lichbacsi = $lbs->laylichbacsi();
            for ($i = 0; $i < count($lichbacsi); $i++) {
                $lichbacsi[$i]['STT'] = $i + 1;
            }
            include("main.php");
        }
        break;
    case "xulysua":
        //$id, $DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail
        $id = $_POST["txtid"];
        $DoctorID = $_POST["otpDoctor"];
        // $scheduleDate = $_POST["txtscheduleDate"];
        $scheduleDay = $_POST["optcheduleDay"];
        $startTime = $_POST["txtstartTime"];
        $endTime = $_POST["txtendTime"];
        $bookAvail = $_POST["otpbookAvail"];
        // sửa lịch bác sĩ
        $lbs->sualichbacsi($id, $DoctorID, $scheduleDay, $startTime, $endTime, $bookAvail);

        // hiển thị ds lịch bác sĩ
        $lichbacsi = $lbs->laylichbacsi();
        for ($i = 0; $i < count($lichbacsi); $i++) {
            $lichbacsi[$i]['STT'] = $i + 1;
        }
        include("main.php");
        break;

    default:
        break;
}
