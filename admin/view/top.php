<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="../assets/css/feathericon.min.css">

    <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">


    <!-- addform3 thêm lịch bác sĩ -->
    <link href="../assets/css/material.css" rel="stylesheet">
    <link href="../assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="../assets/img/logo.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="../../assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="user-text">
                                <h6><?php $_SESSION['nguoidung']['Username'] ?></h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="../kttknguoidung/profile.php">Hồ sơ</a>
                        <!-- <a class="dropdown-item" href="settings.html">Cài đặt</a> -->
                        <a class="dropdown-item" href="../kttknguoidung/index.php?action=dangxuat1">Đăng xuất</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li <?php if ($sitemap == 'dashboard') { ?>class="active" <?php } ?>>
                            <a href="../kttknguoidung/index.php"><i class="fe fe-home"></i> <span>Bảng điều khiển</span></a>
                        </li>
                        <li <?php if ($sitemap == 'booking') { ?>class="active" <?php } ?>>
                            <a href="../qlcuochen/index.php"><i class="fe fe-layout"></i> <span>Cuộc hẹn</span></a>
                        </li>
                        <li <?php if ($sitemap == 'chuyenmon') { ?>class="active" <?php } ?>>
                            <a href="../qlchuyenmon/index.php"><i class="fe fe-tiled"></i> <span>Chuyên môn</span></a>
                        </li>
                        <li <?php if ($sitemap == 'bacsi') { ?>class="active" <?php } ?>>
                            <a href="../qlbacsi/index.php"><i class="fe fe-plus"></i> <span>Bác sĩ</span></a>
                        </li>
                        <li <?php if ($sitemap == 'khachhang') { ?>class="active" <?php } ?>>
                            <a href="../qlkhachhang/index.php"><i class="fe fe-user"></i> <span>Khách hàng</span></a>
                        </li>
                        <li <?php if ($sitemap == 'lichbacsi') { ?>class="active" <?php } ?>>
                            <a href="../qllichbacsi/index.php"><i class="fe fe-calendar"></i> <span>Lịch của bác sĩ</span></a>
                        </li>
                        <li <?php if ($sitemap == 'tintuc') { ?>class="active" <?php } ?>>
                            <a href="../qltintuc/index.php"><i class="fe fe-document"></i> <span>Tin tức / Hoạt động</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->