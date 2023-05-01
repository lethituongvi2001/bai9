<?php
require("../../model/database.php");
require("../../model/chuyenmon.php");
require("../../model/common.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (!$isLogin) {
    header('Location: http://127.0.0.1/bai9/admin/kttknguoidung/index.php');
    exit;
}
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}
$cm = new CHUYENMON();
$common = new COMMON();
$tb = "";
$sitemap = 'chuyenmon';

switch ($action) {
    case "xem":
        $base = $cm->laychuyenmon();
        $chuyenmon = array();
        $i = 1;
        foreach ($base as $c) {
            $c['index'] = $i;
            array_push($chuyenmon, $c);
            $i++;
        }
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["ID"])) {
            $chuyenmon = $cm->laychuyenmontheoid($_GET["ID"]);
            include("addform.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;
    case "them":
        $chuyenmon['id'] = '';
        $chuyenmon['Name'] = '';
        $chuyenmon['FileName'] = 'Chọn ảnh';
        $chuyenmon['AbsolutePath'] = '';
        include("addform.php");
        break;
    case "xulythem":
        $image = "../../assets/img/doctor/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
        $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]));
        $Name = $_POST["name"];
        $cm->themchuyenmon($Name, $imageRecord_id);
        header("Location: /bai9/admin/qlchuyenmon/index.php?action=xem");
        exit();
        include("main.php");
        break;

    case "delete_doctor":
        if (isset($_GET["ID"]))
            $cm->xoachuyenmon($_GET["ID"]);
        header("Location: /bai9/admin/qlchuyenmon/index.php?action=xem");
        exit();
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
        $chuyenmon = $cm->laychuyenmontheoid($_POST["chuyenmon_id"]);
        if (basename($_FILES["filehinhanh"]["name"]) != '') {
            $image = "../../assets/img/doctor/" . basename($_FILES["filehinhanh"]["name"]);
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
            $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]));
        } else {
            $imageRecord_id = $chuyenmon['Image_Id'];
        }

        $Name = $_POST["name"];
        $cm->suachuyenmon($chuyenmon['id'], $Name, $imageRecord_id);
        header("Location: /bai9/admin/qlchuyenmon/index.php?action=xem");
        exit();
        include("main.php");
        break;
    default:
        break;
}
