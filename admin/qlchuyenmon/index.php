<?php
if (!isset($_SESSION["nguoidung"])) {
    header("location:../index.php");
}
require("../../model/database.php");

require("../../model/chuyenmon.php");
require("../../model/nguoidung.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}
$sitemap = 'chuyenmon';


$cm = new CHUYENMON();
$tk = new NGUOIDUNG();
switch ($action) {

    case "xem":
        $chuyenmon = $cm->laychuyenmon();
        include("main.php");
        break;
    case "them":

        include("addform3.php");
        break;
    case "xulythem":

        // xử lý file upload 
        $image = "assets/img/specialities/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../" . $image; // nơi lưu file upload
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm	$FirstName, $LastName, $Gender, $DOB, $Email, $PhoneNumber, $Specialty, $LicenseNumber, $Address, $image
        $Speciality = $_POST["txtSpeciality"];

        $cm->themchuyenmon($Speciality, $image);
        $chuyenmon = $cm->laychuyenmon();
        include("main.php");
        break;

    case "xoa":
        if (isset($_GET["ID"]))
            $cm->xoachuyenmon($_GET["ID"]);
        $chuyenmon = $cm->laychuyenmon();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $c = $cm->laychuyenmontheoid($_GET["ID"]);

            include("updateform.php");
        } else {
            $chuyenmon = $cm->laychuyenmon();
            include("main.php");
        }
        break;
    case "xulysua":
        $id = $_POST["txtid"];
        $Speciality = $_POST["txtSpeciality"];


        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $image = "assets/img/specialities/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $duongdan = "../../" . $image; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }

        // sửa mặt hàng
        $cm->suachuyenmon($id, $Speciality, $image);

        // hiển thị ds mặt hàng
        $chuyenmon = $cm->laychuyenmon();

        include("main.php");
        break;

    default:
        break;
}
