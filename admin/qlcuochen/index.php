<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../model/database.php");

require("../../model/lichbacsi.php");
require("../../model/benhnhan.php");
require("../../model/bacsi.php");
require("../../model/cuochen.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$lbs = new LICHBACSI();
$bn = new BENHNHAN();
$bs = new BACSI();
$ch = new CUOCHEN();


switch ($action) {
    case "xem":
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
    case "them":
        $benhnhan = $bn->laybenhnhan();
        $bacsi = $bs->laybacsi();
        $lichbacsi = $lbs->laylichbacsi();
        include("addform.php");
        break;
    case "xulythem":
        //$PatientID, $DoctorID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status
        $PatientID = $_POST["txtPatientID"];
        $DoctorID = $_POST["txtDoctorID"];
        $ScheduleID = $_POST["txtScheduleID"];
        $newDate = $_POST["txtDate"];
        $Date = date("Y-m-d", strtotime($newDate));
        $Reason = $_POST["txtReason"];
        $Expected_cost = $_POST["txtExpected_cost"];
        $Status = $_POST["txtStatus"];
        $lbs->themlichbacsi($PatientID, $DoctorID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status);
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
        // case "xoa":
        //     if (isset($_GET["ID"]))
        //         $lbs->xoalichbacsi($_GET["ID"]);
        //     $lichbacsi = $lbs->laylichbacsi();
        //     include("main.php");
        //     break;
        // case "sua":
        //     if (isset($_GET["id"])) {
        //         $b = $lbs->laylichbacsitheobacsi($_GET["ID"]);
        //         // $bacsi = $bs->laybacsi();
        //         include("updateform.php");
        //     } else {
        //         $lichbacsi = $lbs->laylichbacsi();
        //         include("main.php");
        //     }
        //     break;
        // case "xulysua":
        //     //$id, $DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail
        //     $id = $_POST["txtid"];
        //     $DoctorID = $_POST["txtDoctorID"];
        //     $scheduleDate = $_POST["txtscheduleDate"];
        //     $scheduleDay = $_POST["txtscheduleDay"];
        //     $startTime = $_POST["txtstartTime"];
        //     $endTime = $_POST["txtendTime"];
        //     $bookAvail = $_POST["txtbookAvail"];
        //     // sửa lịch bác sĩ
        //     $lbs->sualichbacsi($id, $DoctorID, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail);

        //     // hiển thị ds lịch bác sĩ
        //     $lichbacsi = $lbs->laylichbacsi();
        //     include("main1.php");
        //     break;

    default:
        break;
}
