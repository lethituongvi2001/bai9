<?php
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}

$nguoidung = new NGUOIDUNG();
$tb = "";
switch ($action) {
    case "macdinh":

        include("main.php");
        break;
    case "dangxuat1":

        unset($_SESSION["nguoidung"]);

        $tb = "Cảm ơn!";
        //SignIn.php
        //loginform.php
        include("login.php");
        break;


    case "dangnhap":
        include("login.php");
        break;

    case "xldangnhap":
        $Email = $_POST["your_name"];
        $Password = $_POST["your_pass"];
        if ($nguoidung->kiemtranguoidunghople($Email, $Password, true) == TRUE) {
            $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($Email);
            include("main.php");
        } else {
            $tb = "Đăng nhập không thành công!";
            include("login.php");
        }
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

        $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($Email);
        include("main.php");
        break;

    case "doimatkhau":
        if (isset($_POST["your_name"]) && isset($_POST["txtmatkhaumoi"]))
            $nguoidung->doimatkhau($_POST["your_name"], $_POST["txtmatkhaumoi"]);
        include("main.php");
        break;
    default:
        break;
}
