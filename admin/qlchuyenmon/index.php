<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");
require("../../model/database.php");
require("../../model/chuyenmon.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$cm = new CHUYENMON();
$idsua = 0;

switch ($action) {
    case "xem":
        $chuyenmon = $cm->laychuyenmon();
        include("main3.php");
        break;

    case "them":

        include("addform.php");
        break;
    case "xulythem":
        // xử lý file upload
        $image = "assets/img/specialities/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../" . $image; // nơi lưu file upload
        // print($duongdan);
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        // xử lý thêm		
        $Speciality = $_POST["txtSpeciality"];
        $cm->themchuyenmon($Speciality, $image);
        $chuyenmon = $cm->laychuyenmon();
        include("main3.php");
        break;
    case "xoa":
        $cm->xoachuyenmon($_GET["id"]);
        $chuyenmon = $cm->laychuyenmon();
        include("main3.php");
        break;
    case "xulysua":
        $ID = $_POST["txtid"];
        $Speciality = $_POST["txtchuyenmon"];
        $image = $_POST["txthinhcu"];

        // upload file mới (nếu có) assets/img/specialities/specialities-05.png
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $image = "assets/img/specialities/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $duongdan = "../" . $image; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }

        // sửa mặt hàng
        $cm->suachuyenmon($ID, $Speciality, $image);

        // hiển thị ds mặt hàng
        $chuyenmon = $cm->laychuyenmon();
        include("main3.php");
        break;
        // case "sua":
        //     $idsua = $_GET["id"];
        //     $chuyenmon = $cm->laychuyenmon();
        //     include("main.php");
        //     break;
        // case "capnhat":
        //     $cm->suachuyenmon($ID,$Speciality, $image);
        //     $chuyenmon = $cm->laychuyenmon();
        //     include("main.php");
        //     break;
    default:
        break;
}
