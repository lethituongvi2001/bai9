<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/bacsi.php");
require("../../model/chuyenmon.php");
require("../../model/benhnhan.php");
require("../../model/cuochen.php");
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
$book = new BOOKING();
$kh = new KHACHHANG();
$cm = new CHUYENMON();
$nguoidung = new NGUOIDUNG();
$common = new COMMON();
$tb = "";
$sitemap = 'khachhang';

switch ($action) {
    case "xem":
        $base = $kh->laykhachhang();
        $khachhangs = array();
        $i = 1;
        foreach ($base as $kh) {
            $kh['index'] = $i;
            array_push($khachhangs, $kh);
            $i++;
        }
        include("main.php");
        break;
    case "them":
        $khachhang['ID'] = '';
        $khachhang['Name'] = '';
        $khachhang['Gender'] = '';
        $khachhang['DOB'] = '';
        $khachhang['Email'] = '';
        $khachhang['PhoneNumber'] = '';
        $khachhang['Address'] = '';
        $khachhang['province_id'] = '';
        $khachhang['district_id'] = '';
        $khachhang['ward_id'] = '';
        $khachhang['FileName'] = 'Chọn ảnh';
        $khachhang['AbsolutePath'] = '';

        $chuyenmon = $cm->laychuyenmon();
        $cities = $common->takeAllProvince();
        include("addform.php");
        break;
    case "detail":
        if (isset($_GET["ID"])) {
            $khachhang = $kh->laykhachhangtheoid($_GET["ID"]);
            $cities = $common->takeAllProvince();
            $districts = $common->getDistrictByCity($khachhang['province_id']);
            $wards = $common->getWardByDistrict($khachhang['district_id']);
            include("addform.php");
        } else {
            $khachhangs = $kh->laykhachhang();
            include("main.php");
        }
        break;
    case "xulythem":
        $image = "../../assets/img/customer/" . basename($_FILES["filehinhanh"]["name"]);
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
        $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]), true);

        $Name = $_POST["name"];
        $Gender = $_POST["gender"];
        $newDate = $_POST["dob"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Email = $_POST["email"];
        $PhoneNumber = $_POST["phone_number"];
        $Address = $_POST["address"];
        $ward_id = $_POST["select_ward"];
        $district_id = $_POST["select_district"];
        $province_id = $_POST["select_province"];

        //them tk
        $user_id = $nguoidung->themnguoidung($PhoneNumber, '123', 2);

        //them bs
        $khachhang_id = $kh->themkhachhang(
            $Name,
            $Gender,
            $DOB,
            $Email,
            $PhoneNumber,
            $Address,
            $ward_id,
            $district_id,
            $province_id,
            $imageRecord_id,
            $user_id
        );
        header("Location: /bai9/admin/qlkhachhang/index.php?action=xem");
        exit();
        include("main.php");
        break;

    case "delete":
        if (isset($_GET["ID"]))
            $kh->xoakhachhang($_GET["ID"]);
        header("Location: /bai9/admin/qlkhachhang/index.php?action=xem");
        exit();
        break;

    case "xulysua":
        $b = $kh->laykhachhangtheoid($_POST["khachhang_id"]);
        if (basename($_FILES["filehinhanh"]["name"]) != '') {
            $image = "../../assets/img/customer/" . basename($_FILES["filehinhanh"]["name"]);
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
            $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]), true);
        } else {
            $imageRecord_id = $b['Image_Id'];
        }

        $Name = $_POST["name"];
        $Gender = $_POST["gender"];
        $newDate = $_POST["dob"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Email = $_POST["email"];
        $PhoneNumber = $_POST["phone_number"];
        $Address = $_POST["address"];
        $ward_id = $_POST["select_ward"];
        $district_id = $_POST["select_district"];
        $province_id = $_POST["select_province"];

        //update khachhang info
        $kh->update_khachhang(
            $b['ID'],
            $Name,
            $Gender,
            $DOB,
            $Email,
            $PhoneNumber,
            $Address,
            $ward_id,
            $district_id,
            $province_id,
            $imageRecord_id
        );

        header("Location: /bai9/admin/qlkhachhang/index.php?action=xem");
        exit();
        include("main.php");
        break;

    case 'get-district-by-city':
        $cityId = $_POST['province_id'];
        $districts = $common->getDistrictByCity($cityId);
        header('Content-Type: application/json');
        echo json_encode($districts);
        break;

    case 'get-ward-by-district':
        $districtId = $_POST['district_id'];
        $wards = $common->getWardByDistrict($districtId);
        header('Content-Type: application/json');
        echo json_encode($wards);
        break;
    default:
        break;
}
