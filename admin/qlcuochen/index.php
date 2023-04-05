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

$cuochen = $ch->laycuochen();
switch ($action) {
    case "xem":
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
    case "them":
        $benhnhan = $bn->laybenhnhan();

        $lichbacsi = $lbs->laylichbacsi();
        $cuochen = $ch->laycuochen();
        include("addform.php");
        break;
    case "xulythem":
        //$PatientID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status
        $PatientID = $_POST["txtPatientID"];
        $ScheduleID = $_POST["txtScheduleID"];
        $newDate = $_POST["txtDate"];
        $Date = date("Y-m-d H:i:s", strtotime($newDate));
        $Reason = $_POST["txtReason"];
        $Expected_cost = $_POST["txtExpected_cost"];
        $Status = $_POST["txtStatus"];
        $ch->themcuochen($PatientID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status);
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["ID"]))
            $ch->xoacuochen($_GET["ID"]);
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $c = $ch->laycuochentheoid($_GET["ID"]);
            $benhnhan = $bn->laybenhnhan();
            $lichbacsi = $lbs->laylichbacsi();

            include("updateform.php");
        } else {
            $cuochen = $ch->laycuochen();
            include("main.php");
        }
        break;
    case "xulysua":
        //$id, $DoctorID,$scheduleDate,$scheduleDay,$startTime,$endTime,$bookAvail
        $id = $_POST["txtid"];
        $PatientID = $_POST["txtPatientID"];
        $ScheduleID = $_POST["txtScheduleID"];
        $newDate = $_POST["txtDate"];
        $Date = date("Y-m-d H:i:s", strtotime($newDate));
        $Reason = $_POST["txtReason"];
        $Expected_cost = $_POST["txtExpected_cost"];
        $Status = $_POST["txtStatus"];
        $ch->suacuochen($id, $PatientID, $ScheduleID, $Date, $Reason, $Expected_cost, $Status);

        // sửa lịch bác sĩ


        // hiển thị ds lịch bác sĩ
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;

    default:
        break;
}
