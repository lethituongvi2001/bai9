<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/benhnhan.php");
require("../../model/nguoidung.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$bn = new BENHNHAN();
$nd = new NGUOIDUNG();

switch ($action) {
    case "xem":

        $benhnhan = $bn->laybenhnhan();
        include("main.php");
        break;
    case "them":

        include("addform.php");
        break;
    case "xulythem":
        //$id, $Name, $Email(nguoidung), $PhoneNumber, $Address, $DOB, $Gender
        $Name = $_POST["txtName"];
        $Email = $_POST["txtEmail"];
        $PhoneNumber = $_POST["txtPhoneNumber"];
        $Address = $_POST["txtAddress"];
        $newDate = $_POST["txtDOB"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Gender = $_POST["txtGender"];
        //them tk
        $id_moi_nhat = $tk->themnguoidung($Email, '123', 3);
        $bn->thembenhnhan($Name, $Email, $PhoneNumber, $Address, $DOB, $Gender, $id_moi_nhat);
        $benhnhan = $bn->laybenhnhan();
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["ID"]))
            $bn->xoabenhnhan($_GET["ID"]);
        $benhnhan = $bn->laybenhnhan();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $b = $bn->laybenhnhantheoid($_GET["ID"]);

            include("updateform.php");
        } else {
            $benhnhan = $bn->laybenhnhan();
            include("main.php");
        }
        break;
    case "xulysua":
        //$id, $Name, $Email, $PhoneNumber, $Address, $DOB, $Gender
        $id = $_POST["txtid"];
        $Name = $_POST["txtName"];
        $Email = $_POST["txtEmail"];
        $PhoneNumber = $_POST["txtPhoneNumber"];
        $Address = $_POST["txtAddress"];
        $DOB = $_POST["txtDOB"];
        $Gender = $_POST["txtGender"];
        // sửa lịch bác sĩ
        $bn->suabenhnhan($id, $Name, $Email, $PhoneNumber, $Address, $DOB, $Gender);

        // hiển thị ds lịch bác sĩ
        $benhnhan = $bn->laybenhnhan();
        include("main.php");
        break;

    default:
        break;
}
