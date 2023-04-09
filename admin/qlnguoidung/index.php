<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}
$sitemap = 'dashboard';

$nguoidung = new NGUOIDUNG();
//INSERT INTO `admin_users`(`ID`,$Name, $Password, $Gender, $Email, $PhoneNumber, $ActiveStatus)
switch ($action) {
    case "macdinh":
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    case "khoa":
        $mand = $_GET["mand"];
        $ActiveStatus = $_GET["ActiveStatus"];
        if (!$nguoidung->doitrangthai($mand, $ActiveStatus)) {
            $tb = "Đã đổi trạng thái!";
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    case "them":
        $Email = $_POST["txtemail"];
        $Password = $_POST["txtpassword"];
        $sodt = $_POST["txtdienthoai"];
        $name = $_POST["txthoten"];
        $rolend = $_POST["optloaind"];
        if ($nguoidung->laythongtinnguoidung($Email, $loai_tk)) {   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
        } else {
            if (!$nguoidung->themnguoidung($Email, $Password, $sodt, $name, $relond)) {
                $tb = "Không thêm được!";
            }
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;


    default:
        break;
}
