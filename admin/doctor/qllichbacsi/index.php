<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../../model/database.php");
require("../../../model/bacsi.php");
require("../../../model/lichbacsi.php");


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
        include("main1.php");
        break;
    case "them":
        $bacsi = $bs->laybacsi();
        include("addform.php");
        break;
    case "xulythem":
        //$DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail
        $DoctorID = $_POST["txtDoctorID"];
        $scheduleDate = $_POST["txtscheduleDate"];
        $scheduleDay = $_POST["txtscheduleDay"];
        $startTime = $_POST["txtstartTime"];
        $endTime = $_POST["txtendTime"];
        $bookAvail = $_POST["txtbookAvail"];
        $lbs->themlichbacsi($DoctorID, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail);
        $lichbacsi = $lbs->laylichbacsi();
        include("main1.php");
        break;
    case "xoa":
        if (isset($_GET["ID"]))
            $lbs->xoalichbacsi($_GET["ID"]);
        $lichbacsi = $lbs->laylichbacsi();
        include("main1.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $b = $lbs->laylichbacsitheobacsi($_GET["ID"]);
            // $bacsi = $bs->laybacsi();
            include("updateform.php");
        } else {
            $lichbacsi = $lbs->laylichbacsi();
            include("main.php");
        }
        break;
    case "xulysua":
        //$id, $DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail
        $id = $_POST["txtid"];
        $DoctorID = $_POST["txtDoctorID"];
        $scheduleDate = $_POST["txtscheduleDate"];
        $scheduleDay = $_POST["txtscheduleDay"];
        $startTime = $_POST["txtstartTime"];
        $endTime = $_POST["txtendTime"];
        $bookAvail = $_POST["txtbookAvail"];
        // sửa lịch bác sĩ
        $lbs->sualichbacsi($id, $DoctorID, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail);

        // hiển thị ds lịch bác sĩ
        $lichbacsi = $lbs->laylichbacsi();
        include("main1.php");
        break;

    case "xemnhom":
        if (isset($_REQUEST["mabs"]))
            $mabs = $_REQUEST["mabs"];


        $lichbacsi = $lbs->laylichtheobacsi($mabs);
        include("main1.php");

        break;
    default:
        break;
}
