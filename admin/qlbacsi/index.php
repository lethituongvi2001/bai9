<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/bacsi.php");
require("../../model/chuyenmon.php");
require("../../model/nguoidung.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$bs = new BACSI();
$cm = new CHUYENMON();
$tk = new NGUOIDUNG();
switch ($action) {

    case "xem":
        $bacsi = $bs->laybacsi();
        include("main.php");
        break;
    case "them":
        $chuyenmon = $cm->laychuyenmon();
        include("addform3.php");
        break;
    case "xulythem":

        // xử lý file upload 
        $image = "assets/img/doctors/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $image; // nơi lưu file upload
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm	$FirstName, $LastName, $Gender, $DOB, $Email, $PhoneNumber, $Specialty, $LicenseNumber, $Address, $image
        $Name = $_POST["txtName"];
        $Gender = $_POST["txtGender"];
        $newDate = $_POST["txtDOB"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Email = $_POST["txtEmail"];
        $PhoneNumber = $_POST["txtPhoneNumber"];
        $id_speciality = $_POST["optSpeciality"];

        $LicenseNumber = $_POST["txtLicenseNumber"];
        $Address = $_POST["txtAddress"];
        //them tk
        $id_moi_nhat = $tk->themnguoidung($Email, '123', 2);
        //them bs
        $bs->thembacsi($Name, $Gender, $DOB, $Email, $PhoneNumber, $id_speciality, $LicenseNumber, $Address, $image, $id_moi_nhat);
        $bacsi = $bs->laybacsi();

        include("main.php");
        break;

    case "xoa":
        if (isset($_GET["ID"]))
            $bs->xoabacsi($_GET["ID"]);
        $bacsi = $bs->laybacsi();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $b = $bs->laybacsitheoid($_GET["ID"]);
            $chuyenmon = $cm->laychuyenmon();
            include("updateform.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;
    case "xulysua":
        $id = $_POST["txtid"];
        $Name = $_POST["txtName"];
        $Gender = $_POST["txtGender"];
        $DOB = $_POST["txtDOB"];
        $Email = $_POST["txtEmail"];
        $PhoneNumber = $_POST["txtPhoneNumber"];
        $id_speciality = $_POST["txtSpeciality"];
        $LicenseNumber = $_POST["txtLicenseNumber"];
        $Address = $_POST["txtAddress"];
        $image = $_POST["txthinhcu"];

        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $image = "assets/img/doctors/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $duongdan = "../../" . $image; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }

        // sửa mặt hàng
        $bs->suabacsi($id, $Name, $Gender, $DOB, $Email, $PhoneNumber, $id_speciality, $LicenseNumber, $Address, $image);

        // hiển thị ds mặt hàng
        $bacsi = $bs->laybacsi();

        include("main.php");
        break;

    default:
        break;
}
