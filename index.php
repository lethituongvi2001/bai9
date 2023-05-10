<?php
require("model/database.php");
require("model/chuyenmon.php");
require("model/benhnhan.php");
require("model/cuochen.php");
require("model/bacsi.php");
require("model/lichbacsi.php");
require("model/nguoidung.php");
require("model/tintuc.php");
require("model/common.php");

$ch = new BOOKING();
$bn = new KHACHHANG();
$cm = new CHUYENMON();
$bs = new BACSI();
$lbs = new LICHBACSI();
$nguoidung = new NGUOIDUNG();
$tt = new TINTUC();
$common = new COMMON();

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

if ($isLogin && $_SESSION['nguoidung']['role'] != 3) {
    unset($_SESSION["nguoidung"]);
    $action = 'dangnhap';
}

$search = 0;
$txtSearch = "";
$message = '';
$sitemap = '';
// $mathangnoibat = $mh->laymathangnoibat();

switch ($action) {
    case "macdinh":
        $sitemap = 'index';
        $doctor_onlly = $bs->laybacsi();
        $doctor = array();
        foreach ($doctor_onlly as $item) {
            $speciality = $cm->getSpecialityByDoctor($item['ID']);
            $item['Speciality'] = $speciality;
            array_push($doctor, $item);
        }
        include("main.php");
        break;

    case "tintuc":
        $sitemap = 'tintuc';
        $post_list = $tt->laytintuc(1);
        // print_r($post_list);
        include("tintuc.php");
        break;

    case "post_detail":
        if (isset($_GET["ID"])) {
            $post = $tt->laytintuctheoid($_GET["ID"]);
            if ($post['post_type_id'] == 1)
                $sitemap = 'tintuc';
            else
                $sitemap = 'hoatdong';
            include("tintuc_detail.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;

    case "hoatdong":
        $sitemap = 'hoatdong';
        $post_list = $tt->laytintuc(2);
        include("tintuc.php");
        break;

    case "doctor_detail":
        $sitemap = 'index';
        if (isset($_GET["ID"])) {
            $doctor = $bs->laybacsitheoid($_GET["ID"]);
            $speciality = $cm->getSpecialityByDoctor($doctor['ID']);
            $doctor['fullAddress'] = $doctor["Address"];
            $doctor['fullAddress'] .= $doctor['ward_name'] != '' ? ', ' . $doctor["ward_name"] : '';
            $doctor['fullAddress'] .= $doctor['district_name'] != '' ? ', ' . $doctor["district_name"] : '';
            $doctor['fullAddress'] .= $doctor['province_name'] != '' ? ', ' . $doctor["province_name"] : '';

            $doctor['Speciality'] = $speciality;
            include("doctor_detail.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
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

    case "dangky":
        $message = '';
        include("register.php");
        break;

    case "booking":
        if (!isset($_SESSION['nguoidung'])) {
            header("location: ../bai9/index.php?action=dangnhap");
            exit();
            break;
        }
        $doctor = $bs->laybacsitheoid($_GET['ID']);
        $cities = $common->takeAllProvince();
        include("booking.php");
        break;

    case "booking_history":
        $sitemap = 'booking_history';
        $bookings = $ch->laydscuochentheoidcustomer($_SESSION['nguoidung']['ID']);
        $i = 1;
        foreach ($bookings as &$booking) {
            $booking['index'] = $i;
            $booking['fullAddress'] = $booking["ContactAddress"];
            $booking['fullAddress'] .= $booking['ward_name'] != '' ? ', ' . $booking["ward_name"] : '';
            $booking['fullAddress'] .= $booking['district_name'] != '' ? ', ' . $booking["district_name"] : '';
            $booking['fullAddress'] .= $booking['province_name'] != '' ? ', ' . $booking["province_name"] : '';
            $booking['status'] = 'Đang mở';
            if ($booking['IsDeleted'])
                $booking['status'] = 'Đã hủy';
            else if ($booking['IsClosed'])
                $booking['status'] = 'Đã hoàn thành';
            else if ($booking['IsApproved'])
                $booking['status'] = 'Chờ khám';
            $i++;
        }
        include("booking_history.php");
        break;

    case 'onSubmitBooking':
        $doctor_id = $_POST['doctor_id'];
        $customer_id = $_SESSION['nguoidung']['ID'];
        $trieu_chung = $_POST['trieu_chung'];
        $dich_vu = $_POST['dich_vu'];
        $booking_date = $_POST['booking_date'];
        $booking_time = $_POST['booking_time'];
        $contactName = $_POST['contactName'];
        $contactPhone = $_POST['contactPhone'];
        $contactAddress = $_POST['contactAddress'];
        $select_province = $_POST['select_province'];
        $select_district = $_POST['select_district'];
        $select_ward = $_POST['select_ward'];
        $distance = $_POST['distance'];

        $result = $ch->addBooking($doctor_id, $customer_id, $trieu_chung, $dich_vu, $booking_date, $booking_time, $contactName, $contactPhone, $contactAddress, $select_province, $select_district, $select_ward, $distance);
        if ($result) {
            include('booking_success.php');
            break;
        } else {
            $message = "Thêm thất bại. Vui lòng kiểm tra lại dữ liệu đã nhập!";
            break;
        }
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

    case "xldangky":
        $username = $_POST["username"];
        $password = $_POST["password"];
        $rewritepassword = $_POST["rewritepassword"];
        $checkUser = $nguoidung->checkPhoneNumber($username);
        if ($checkUser == null) {
            if ($password == $rewritepassword) {
                $user_id = $nguoidung->themnguoidung($username, $password, 3);
                $khachhang_id = $bn->themkhachhang(
                    $username,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    $user_id
                );

                $result = 1;
                $message = 'Đăng ký thành công';
            } else {
                $result = 0;
                $message = 'Nhập lại mật khẩu chưa đúng';
            }
        } else {
            $result = 0;
            $message = 'Tên tài khoản đã được sử dụng';
        }
        include('register.php');
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
