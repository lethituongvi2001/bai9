<?php
require("model/database.php");
require("model/chuyenmon.php");
require("model/bacsi.php");
require("model/benhnhan.php");
require("model/lichbacsi.php");
require("model/nguoidung.php");

$cm = new CHUYENMON();
$bs = new BACSI();
$bn = new BENHNHAN();
$lbs = new LICHBACSI();
$nd = new NGUOIDUNG();

$chuyenmon = $cm->laychuyenmon();

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "macdinh";
}

$search = 0;
$txtSearch = "";

// $mathangnoibat = $mh->laymathangnoibat();

switch ($action) {
    case "macdinh":
        // $tongmh = $mh->demtongsomathang();
        // $soluong = 8;
        // $tongsotrang = ceil($tongmh / $soluong);
        // if (!isset($_REQUEST["trang"]))
        //     $tranghh = 1;
        // else
        //     $tranghh = $_REQUEST["trang"];
        // if ($tranghh > $tongsotrang)
        //     $tranghh = $tongsotrang;
        // else if ($tranghh < 1)
        //     $tranghh = 1;
        // $batdau = ($tranghh - 1) * $soluong;
        // $mathang = $mh->laymathangphantrang($batdau, $soluong);



        // $bsct = $ct->laybacsitheoid($id);

        // $macm = $bsct["id_speciality"];
        // $chuyenmon = $bs->laybacsitheochuyenmon($id_speciality);

        $bacsi = $bs->laybacsi();
        include("main.php");
        break;

    case "timkiem":
        if (isset($_POST["txttukhoa"]))
            $search = $_POST["txttukhoa"];


        $tongmh = $mh->demtongsomathangtimkiem($search);
        $soluong = 8;
        $tongsotrang = ceil($tongmh / $soluong);
        if (!isset($_REQUEST["trang"]))
            $tranghh = 1;
        else
            $tranghh = $_REQUEST["trang"];
        if ($tranghh > $tongsotrang)
            $tranghh = $tongsotrang;
        else if ($tranghh < 1)
            $tranghh = 1;
        $batdau = ($tranghh - 1) * $soluong;


        $mathang = $mh->laymathangphantrangtimkiem($batdau, $soluong, $search);
        include("main.php");
        break;


    case "xemnhom":
        if (isset($_REQUEST["madm"])) {
            $madm = $_REQUEST["madm"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
    case "xemchitiet":
        if (isset($_GET["mahang"])) {
            $mahang = $_GET["mahang"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;

    case "dangnhap":
        include("SignIn1.php");
        break;

    case "xldangnhap":
        $email = $_POST["your_name"];
        $matkhau = $_POST["your_pass"];
        if ($nd->kiemtranguoidunghople($email, $matkhau, 0) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);

            $tongmh = $mh->demtongsomathang();
            $soluong = 8;
            $tongsotrang = ceil($tongmh / $soluong);
            if (!isset($_REQUEST["trang"]))
                $tranghh = 1;
            else
                $tranghh = $_REQUEST["trang"];
            if ($tranghh > $tongsotrang)
                $tranghh = $tongsotrang;
            else if ($tranghh < 1)
                $tranghh = 1;
            $batdau = ($tranghh - 1) * $soluong;
            $mathang = $mh->laymathangphantrang($batdau, $soluong);

            include("main.php");
        } else {
            $tb = "Đăng nhập không thành công!";
            include("SignIn1.php");
        }
        break;

    case "dangxuat2":

        unset($_SESSION["nguoidung"]);

        $tb = "Cảm ơn chị iu!";

        include("SignIn1.php");
        break;

    case "themkhachhang":
        $hoten = $_POST["txthoten"];
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $nlmatkhau = $_POST["txtnlmatkhau"];
        if ($nd->laythongtinnguoidung($email)) {   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
            include("SignUp.php");
            break;
        } else {
            if (!$nd->themkhachhang($email, $matkhau, $hoten)) {
                $tb = "Không thêm được!";
                include("SignUp.php");
                break;
            }

            include("SignIn1.php");
            break;
        }

        break;
    default:
        break;
}
?>
<!--hjd-->