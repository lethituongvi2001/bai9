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
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$common = new COMMON();
$tb = "";
$sitemap = 'bacsi';

switch ($action) {
    case "xem":
        $doctors = $bs->laybacsi();
        $chuyenmon = $cm->laychuyenmon();
        $bacsi = array();
        $i = 1;
        foreach ($doctors as $bs) {
            $bs['index'] = $i;
            $speciality = $cm->getSpecialityByDoctor($bs['ID']);
            $specialityNames = implode(', ', array_map(function ($s) {
                return $s['speciality_name'];
            }, $speciality));
            ($speciality);
            $bs['specialities'] = $specialityNames;
            array_push($bacsi, $bs);
            $i++;
        }
        // print_r($bacsi);
        include("main.php");
        break;
    case "them":
        $doctor['ID'] = '';
        $doctor['Name'] = '';
        $doctor['Gender'] = '';
        $doctor['DOB'] = '';
        $doctor['Email'] = '';
        $doctor['PhoneNumber'] = '';
        $doctor['speciality_0'] = '';
        $doctor['speciality_1'] = '';
        $doctor['speciality_2'] = '';
        $doctor['LicenseNumber'] = '';
        $doctor['Address'] = '';
        $doctor['province_id'] = '';
        $doctor['district_id'] = '';
        $doctor['ward_id'] = '';
        $doctor['FileName'] = 'Chọn ảnh';
        $doctor['AbsolutePath'] = '';

        $chuyenmon = $cm->laychuyenmon();
        $cities = $common->takeAllProvince();
        include("addform.php");
        break;
    case "doctor_detail":
        if (isset($_GET["ID"])) {
            $doctor = $bs->laybacsitheoid($_GET["ID"]);
            $doctor_specialities = $cm->getSpecialityByDoctor(($doctor['ID']));
            for ($i = 0; $i  < 3; $i++) {
                $doctor['speciality_' . $i] = count($doctor_specialities) - 1 >= $i ? $doctor_specialities[$i]['speciality_id'] : '';
            }
            $chuyenmon = $cm->laychuyenmon();
            $cities = $common->takeAllProvince();
            $districts = $common->getDistrictByCity($doctor['province_id']);
            $wards = $common->getWardByDistrict($doctor['district_id']);
            include("addform.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;
    case "xulythem":
        $image = "../../assets/img/doctor/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
        $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]));

        $Name = $_POST["name"];
        $Gender = $_POST["gender"];
        $newDate = $_POST["dob"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Email = $_POST["email"];
        $PhoneNumber = $_POST["phone_number"];
        $id_speciality_1 = $_POST["select_cm1"];
        $id_speciality_2 = $_POST["select_cm2"];
        $id_speciality_3 = $_POST["select_cm3"];
        $LicenseNumber = $_POST["licenseNumber"];
        $Address = $_POST["address"];
        $ward_id = $_POST["select_ward"];
        $district_id = $_POST["select_district"];
        $province_id = $_POST["select_province"];

        //them tk
        $user_id = $nguoidung->themnguoidung($PhoneNumber, '123', 2);

        //them bs
        $doctor_id = $bs->thembacsi(
            $Name,
            $Gender,
            $DOB,
            $Email,
            $PhoneNumber,
            $Address,
            $ward_id,
            $district_id,
            $province_id,
            $LicenseNumber,
            $imageRecord_id,
            $user_id
        );

        //add chuyen mon
        $id_specialities = array($id_speciality_1, $id_speciality_2, $id_speciality_3);
        $id_specialities = array_unique($id_specialities);
        foreach ($id_specialities as $item) {
            $cm->insert_has_speciality_doctor($doctor_id, $item);
        }

        header("Location: /bai9/admin/qlbacsi/index.php?action=xem");
        exit();
        include("main.php");
        break;

    case "delete_doctor":
        if (isset($_GET["ID"]))
            $bs->delete_doctor($_GET["ID"]);
        header("Location: /bai9/admin/qlbacsi/index.php?action=xem");
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
        $b = $bs->laybacsitheoid($_POST["doctor_id"]);
        if (basename($_FILES["filehinhanh"]["name"]) != '') {
            $image = "../../assets/img/doctor/" . basename($_FILES["filehinhanh"]["name"]);
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
            $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]));
        } else {
            $imageRecord_id = $b['Image_Id'];
        }

        $Name = $_POST["name"];
        $Gender = $_POST["gender"];
        $newDate = $_POST["dob"];
        $DOB = date("Y-m-d", strtotime($newDate));
        $Email = $_POST["email"];
        $PhoneNumber = $_POST["phone_number"];
        $id_speciality_1 = $_POST["select_cm1"];
        $id_speciality_2 = $_POST["select_cm2"];
        $id_speciality_3 = $_POST["select_cm3"];
        $LicenseNumber = $_POST["licenseNumber"];
        $Address = $_POST["address"];
        $ward_id = $_POST["select_ward"];
        $district_id = $_POST["select_district"];
        $province_id = $_POST["select_province"];

        //update doctor info
        $bs->update_doctor(
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
            $LicenseNumber,
            $imageRecord_id
        );

        //remove and add chuyen mon
        $cm->delete_has_speciality_doctor($b['ID']);
        $id_specialities = array($id_speciality_1, $id_speciality_2, $id_speciality_3);
        $id_specialities = array_unique($id_specialities);
        foreach ($id_specialities as $item) {
            $cm->insert_has_speciality_doctor($b['ID'], $item);
        }

        header("Location: /bai9/admin/qlbacsi/index.php?action=xem");
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
