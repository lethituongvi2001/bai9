<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../../model/database.php");
require("../../../model/bacsi.php");
require("../../../model/chuyenmon.php");
require("../../../model/nguoidung.php");


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
        $chuyenmon = $cm->laychuyenmon();
        $bacsi = $bs->laybacsi();
        include("updateform.php");
        break;


    case "sua":
        $bacsi = $bs->laybacsi();
        if (isset($_GET["ID"]))
            $b = $bs->laybacsitheoid($_GET["ID"]);
        $chuyenmon = $cm->laychuyenmon();
        include("updateform.php");

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
            $duongdan = "../" . $image; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }

        // sửa mặt hàng
        $bs->suabacsi($id, $Name, $Gender, $DOB, $Email, $PhoneNumber, $id_speciality, $LicenseNumber, $Address, $image);

        // hiển thị ds mặt hàng
        $bacsi = $bs->laybacsi();

        include("updateform.php");
        break;

    default:
        break;
}
