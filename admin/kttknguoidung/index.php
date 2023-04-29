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
    $action = "dangxuat1";
} else {
    $action = "macdinh";
}

$ch = new BOOKING();
$bn = new BENHNHAN();
$cm = new CHUYENMON();
$bs = new BACSI();
$nguoidung = new NGUOIDUNG();
$tb = "";
$sitemap = 'dashboard';

switch ($action) {
    case "get-data-chart":

        header('Content-Type: application/json');
        echo json_encode($appointments);
        break;

    case "macdinh":
        // $tongbs = $bs->demtongbacsi();
        switch ($_SESSION["nguoidung"]['role']) {
            case 1: {
                    include("main.php");
                    break;
                }
            case 2: {
                    include("../doctor/main.php");
                    break;
                }
            default: {
                    unset($_SESSION["nguoidung"]);
                    $tb = "Cảm ơn!";
                    include("login.php");
                    break;
                }
        }
        $action = '';
        break;
    case "dangxuat1":
        unset($_SESSION["nguoidung"]);
        $message = '';
        //SignIn.php
        //loginform.php
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
            // print_r($session);
            switch ($session['role']) {
                case 1: {
                        $sitemap = 'dashboard';
                        include("main.php");
                        break;
                    }
                case 2: {
                        header('Location: http://127.0.0.1/bai9/admin/doctor/index.php');
                        exit;
                        // include("../doctor/main.php");
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

    case "capnhaths":
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


        // bac si
        // case "macdinh":

        //     include("main.php");
        //     break;
        // case "dangxuat1":

        //     unset($_SESSION["nguoidung"]);

        //     $tb = "Cảm ơn!";
        //     //SignIn.php
        //     //loginform.php
        //     include("login1.php");
        //     break;


        // case "dangnhap":
        //     include("login1.php");
        //     break;

        // case "xldangnhap":
        //     $Email = $_POST["your_name"];
        //     $Password = $_POST["your_pass"];
        //     if ($nguoidung->kiemtranguoidunghople($Email, $Password, true) == TRUE) {
        //         $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($Email);
        //         include("main.php");
        //     } else {
        //         $tb = "Đăng nhập không thành công!";
        //         include("login1.php");
        //     }
        //     break;
        // case "dangky":
        //     include("SignUp.php");
        //     break;

        // case "capnhaths":
        //     $mand = $_POST["txtid"];
        //     $Email = $_POST["your_name"];

        //     $sodt = $_POST["txtdienthoai"];
        //     $name = $_POST["txthoten"];
        //     $hinhanh = basename($_FILES["fhinh"]["name"]);
        //     $duongdan = "../images/" . $hinhanh;
        //     move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);

        //     $nguoidung->capnhatnguoidung($mand, $Email, $sodt, $name, $hinhanh);

        //     $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($Email);
        //     include("main.php");
        //     break;

        // case "doimatkhau":
        //     if (isset($_POST["your_name"]) && isset($_POST["txtmatkhaumoi"]))
        //         $nguoidung->doimatkhau($_POST["your_name"], $_POST["txtmatkhaumoi"]);
        //     include("main.php");
        //     break;
        //end bac si
    default:
        break;
}
