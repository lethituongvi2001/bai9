<?php
require("../../model/database.php");
require("../../model/tintuc.php");
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
$tt = new TINTUC();
$common = new COMMON();
$tb = "";
$sitemap = 'tintuc';

switch ($action) {
    case "xem":
        $base = $tt->laytintuc();
        $tintuc = array();
        $i = 1;
        foreach ($base as $c) {
            $c['index'] = $i;
            array_push($tintuc, $c);
            $i++;
        }
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["ID"])) {
            $tintuc = $tt->laytintuctheoid($_GET["ID"]);
            $post_type = $tt->take_all_post_type();
            include("addform.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;
    case "them":
        $tintuc['id'] = '';
        $tintuc['title'] = '';
        $tintuc['content'] = '';
        $tintuc['FileName'] = 'Chọn ảnh';
        $tintuc['AbsolutePath'] = '';
        $tintuc['post_type'] = '';
        $tintuc['post_type_id'] = '';
        $post_type = $tt->take_all_post_type();
        include("addform.php");
        break;
    case "xulythem":
        $image = "../../assets/img/post/" . basename($_FILES["filehinhanh"]["name"]);
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
        $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]), null, 1);
        $title = $_POST["title"];
        $content = $_POST["content"];
        $post_type = $_POST["post_type"];
        $tt->themtintuc($title, $content, $post_type, $imageRecord_id);

        header("Location: /bai9/admin/qltintuc/index.php?action=xem");
        exit();
        include("main.php");
        break;

    case "delete_post":
        if (isset($_GET["ID"]))
            $tt->xoatintuc($_GET["ID"]);
        header("Location: /bai9/admin/qltintuc/index.php?action=xem");
        exit();
        break;
    case "sua":
        if (isset($_GET["ID"])) {
            $b = $bs->laybacsitheoid($_GET["ID"]);
            $tintuc = $tt->laytintuc();
            include("updateform.php");
        } else {
            $bacsi = $bs->laybacsi();
            include("main.php");
        }
        break;
    case "xulysua":
        $tintuc = $tt->laytintuctheoid($_POST["tintuc_id"]);
        if (basename($_FILES["filehinhanh"]["name"]) != '') {
            $image = "../../assets/img/post/" . basename($_FILES["filehinhanh"]["name"]);
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $image);
            $imageRecord_id = $common->insertImageRecord(basename($_FILES["filehinhanh"]["name"]), null, 1);
        } else {
            $imageRecord_id = $tintuc['Image_Id'];
        }

        $title = $_POST["title"];
        $content = $_POST["content"];
        $post_type = $_POST["post_type"];

        $tt->suatintuc($tintuc['id'], $title, $content, $post_type, $imageRecord_id);
        header("Location: /bai9/admin/qltintuc/index.php?action=xem");
        exit();
        include("main.php");
        break;

    default:
        break;
}
