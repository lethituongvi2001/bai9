<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/bacsi.php");
require("../../model/chuyenmon.php");
require("../../model/benhnhan.php");
require("../../model/cuochen.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangxuat";
} else {
    $action = "dashboard";
}

$book = new BOOKING();
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$tb = "";
$sitemap = 'dashboard';
$message = '';

switch ($action) {
    case "get-data-chart":
        header('Content-Type: application/json');
        echo json_encode($appointments);
        break;

    case "dashboard":
        switch ($_SESSION["nguoidung"]['role']) {
            case 1: {
                    $mesage = "";
                    include("main.php");
                    break;
                }
            case 2: {
                    include("../doctor/main.php");
                    break;
                }
            default: {
                    unset($_SESSION["nguoidung"]);
                    $mesage = "Cảm ơn!";
                    include("login.php");
                    break;
                }
        }
        $action = '';
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $message = '';
        include("login.php");
        break;


    case "dangnhap":
        $message = '';
        include("login.php");
        break;

    case "xldangnhap":
        $Username = $_POST["username"];
        $Password = $_POST["password"];

        if ($nguoidung->kiemtranguoidunghople($Username, $Password, true) == TRUE) {
            $role = $nguoidung->kiemtra_role($Username);
            $session = $nguoidung->laythongtinnguoidung($Username, $role['role']);
            $_SESSION["nguoidung"] = $session;
            switch ($session['role']) {
                case 1: {
                        $sitemap = 'dashboard';
                        header('Location: http://127.0.0.1/bai9/admin/kttknguoidung/');
                        break;
                    }
                case 2: {
                        header('Location: http://127.0.0.1/bai9/admin/doctor/index.php');
                        exit;
                        break;
                    }
            }
        } else {
            $message = "Tên đăng nhập hoặc mật khẩu không đúng!";
            include("login.php");
        }
        $action = '';
        break;
    case "dangky":
        include("SignUp.php");
        break;

    case "capnhat":
        $mand = $_POST["txtid"];
        $Email = $_POST["your_name"];
        $sodt = $_POST["txtdienthoai"];
        $name = $_POST["txthoten"];
        $hinhanh = basename($_FILES["fhinh"]["name"]);
        $duongdan = "../images/" . $hinhanh;
        move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        $nguoidung->capnhatnguoidung($mand, $Email, $sodt, $name, $hinhanh);
        $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($Email, $loai_tk);
        include("main.php");
        break;

    case "doimatkhau":
        if (isset($_POST["your_name"]) && isset($_POST["txtmatkhaumoi"]))
            $nguoidung->doimatkhau($_POST["your_name"], $_POST["txtmatkhaumoi"]);
        include("main.php");
        break;

        // Booking 
    case "booking":
        // $sitemap = 'booking';
        // $bookings = $book->laydscuochentheoiddoctor(null);
        // $i = 1;
        // foreach ($bookings as &$booking) {
        //     $booking['index'] = $i;
        //     $booking['fullAddress'] = $booking["ContactAddress"];
        //     $booking['fullAddress'] .= $booking['ward_name'] != '' ? ', ' . $booking["ward_name"] : '';
        //     $booking['fullAddress'] .= $booking['district_name'] != '' ? ', ' . $booking["district_name"] : '';
        //     $booking['fullAddress'] .= $booking['province_name'] != '' ? ', ' . $booking["province_name"] : '';
        //     $booking['status'] = 'Đang mở';
        //     if ($booking['IsDeleted'])
        //         $status = 'Đã hủy';
        //     else if ($booking['IsClosed'])
        //         $status = 'Đã hoàn thành';
        //     else if ($booking['IsApproved'])
        //         $status = 'Chờ khám';
        //     $i++;
        // }
        header("location:../qlcuochen");

        exit();
        break;

    default:
        break;
}
