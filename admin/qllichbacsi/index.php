<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/bacsi.php");
require("../../model/lichbacsi.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$bs = new BACSI();
$lbs = new LICHBACSI();


switch ($action) {
    case "xem":
        $lichbacsi = $lbs->laylichbacsi();
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
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["ID"]))
            $lbs->xoalichbacsi($_GET["ID"]);
        $lichbacsi = $lbs->laylichbacsi();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $l = $lbs->laylichbacsitheoid($_GET["ID"]);
            $bacsi = $bs->laybacsi();
            include("updateform.php");
        } else {
            $lichbacsi = $lbs->laylichbacsi();
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
        include("main.php");
        break;

    default:
        break;
}
