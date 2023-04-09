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
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">


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
                    <img src="../assets/img/logo-small.png" alt="Logo" width="30" height="30">
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

                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Thông báo</span>
                            <a href="javascript:void(0)" class="clear-noti"> Xoá tất cả </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/doctors/doctor-thumb-01.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/patients/patient1.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/patients/patient2.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">Xem tất cả thông báo</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="../assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="../assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php $_SESSION['nguoidung']['Email'] ?></h6>
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
                        <li <?php if ($sitemap == 'cuochen') { ?>class="active" <?php } ?>>
                            <a href="../qlcuochen/index.php"><i class="fe fe-layout"></i> <span>Cuộc hẹn</span></a>
                        </li>
                        <li <?php if ($sitemap == 'chuyenmon') { ?>class="active" <?php } ?>>
                            <a href="../qlchuyenmon/index.php"><i class="fe fe-users"></i> <span>Chuyên môn</span></a>
                        </li>
                        <li <?php if ($sitemap == 'bacsi') { ?>class="active" <?php } ?>>
                            <a href="../qlbacsi/index.php"><i class="fe fe-user-plus"></i> <span>Bác sĩ</span></a>
                        </li>
                        <li <?php if ($sitemap == 'benhnhan') { ?>class="active" <?php } ?>>
                            <a href="../qlbenhnhan/index.php"><i class="fe fe-user"></i> <span>Bệnh nhân</span></a>
                        </li>
                        <li <?php if ($sitemap == 'lichbacsi') { ?>class="active" <?php } ?>>
                            <a href="../qllichbacsi/index.php"><i class="fe fe-star-o"></i> <span>Lịch của bác sĩ</span></a>
                        </li>
                        <li <?php if ($sitemap == 'phanhoi') { ?>class="active" <?php } ?>>
                            <a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Phản hồi</span></a>
                        </li>





                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->