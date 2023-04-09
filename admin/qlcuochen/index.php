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
$sitemap = 'cuochen';

$cuochen = $ch->laycuochen();
function getDateOfCurrentWeek($day)
{
    $weekStart = strtotime('this week');
    $dayStart = strtotime($day, $weekStart);
    return date('d/m/Y', $dayStart);
}
function convertDateToEng($ngay)
{
    $result = '';
    switch ($ngay) {
        case "Thứ hai":
            $result = 'Monday';
            break;
        case "Thứ ba":
            $result = 'Tuesday';
            break;
        case "Thứ tư":
            $result = 'Wednesday';
            break;
        case "Thứ năm":
            $result = 'Thursday';
            break;
        case "Thứ sáu":
            $result = 'Friday';
            break;
        case "Thứ bảy":
            $result = 'Saturday';
            break;
        case "Chủ nhật":
            $result = 'Sunday';
            break;
    }
    return $result;
}

function getSundayOfWeek($date)
{
    $sunday = strtotime('last Sunday', strtotime($date));
    return date('d-m-Y', $sunday);
}

switch ($action) {
    case "get-cuoc-hen-by-doctor":
        $selectedDoctorID = $_POST['selectedValue'];
        $cuochen = $lbs->laylichbacsitheoidbacsi($selectedDoctorID);
        $appointments = array();
        foreach ($cuochen as $appointment) {
            $currentday = getDateOfCurrentWeek(convertDateToEng($appointment["scheduleDay"]));
            // $sunday = getSundayOfWeek($currentday);
            // if (strtotime($currentday) <= strtotime('today') || strtotime($currentday) > strtotime($sunday)) {
            //     continue;
            // }
            $appointments[] = array(
                "value" => $appointment["ID"],
                "label" => $appointment["scheduleDay"] . " - " . $currentday
                    . " - " . $appointment["startTime"] . " - " . $appointment["endTime"],
            );
        }

        header('Content-Type: application/json');
        echo json_encode($appointments);
        break;
    case "xem":
        $cuochen = $ch->laycuochen();
        include("main.php");
        break;
    case "them":
        $benhnhan = $bn->laybenhnhan();
        $bacsi = $bs->laybacsi();
        // $lichbacsi = $lbs->laylichbacsi($_SESSION['nguoidung']['ID']);
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
