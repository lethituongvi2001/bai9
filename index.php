<?php
require("model/database.php");
require("model/chuyenmon.php");
require("model/benhnhan.php");
require("model/cuochen.php");
require("model/bacsi.php");
require("model/lichbacsi.php");
require("model/nguoidung.php");

$ch = new BOOKING();
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$lbs = new LICHBACSI();
$nguoidung = new NGUOIDUNG();

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
$message = '';
// $mathangnoibat = $mh->laymathangnoibat();

switch ($action) {
    case "macdinh":
        $doctor_onlly = $bs->laybacsi();
        $doctor = array();
        foreach ($doctor_onlly as $item) {
            $speciality = $cm->getSpecialityByDoctor($item['ID']);
            $item['Speciality'] = $speciality;
            array_push($doctor, $item);
        }
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
        $message = '';
        include("login.php");
        break;


    case "xldangnhap":
        $Username = $_POST["username"];
        $Password = $_POST["password"];

        if ($nguoidung->kiemtranguoidunghople($Username, $Password, false) == TRUE) {
            $role = $nguoidung->kiemtra_role($Username);
            $session = $nguoidung->laythongtinnguoidung($Username, $role['role']);
            $_SESSION["nguoidung"] = $session;
            // print_r($session);
            $isLogin = true;
            $doctor_onlly = $bs->laybacsi();
            $doctor = array();
            foreach ($doctor_onlly as $item) {
                $speciality = $cm->getSpecialityByDoctor($item['ID']);
                $item['Speciality'] = $speciality;
                array_push($doctor, $item);
            }
            $sitemap = 'mainPage';
            include("main.php");
            break;
        } else {
            $message = 'Sai tên đăng nhập hoặc mật khẩu!';
            $isLogin = false;
            include("login.php");
        }
        $action = '';
        break;

    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $doctor_onlly = $bs->laybacsi();
        $doctor = array();
        foreach ($doctor_onlly as $item) {
            $speciality = $cm->getSpecialityByDoctor($item['ID']);
            $item['Speciality'] = $speciality;
            array_push($doctor, $item);
        }
        $isLogin = false;
        include("main.php");
        break;


    case "themkhachhang":
        $hoten = $_POST["txthoten"];
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $nlmatkhau = $_POST["txtnlmatkhau"];
        if ($nd->laythongtinnguoidung($email, $loai_tk)) {   // có thể kiểm tra thêm số đt không trùng
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
        //validate
        if ($nguoidung->isEmailExist(($Email))) {
            $message = 'Tên đăng nhập đã tồn tại. Vui lòng sử dụng tên khác!';
            include('login.php');
            break;
        }
        break;
}
?>
<!--hjd-->