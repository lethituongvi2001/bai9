<!DOCTYPE html>
<html lang="en">

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets_doctor/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets_doctor/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets_doctor/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets_doctor/plugins/fontawesome/css/all.min.css">


    <link rel="stylesheet" href="assets_doctor/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->


    <!-- lichbacsi/addform -->
    <!-- Icons font CSS-->
    <link href="assets_doctor/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets_doctor/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Vendor CSS-->
    <link href="assets_doctor/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets_doctor/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets_doctor/css/main.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Thêm lịch bác sĩ-->
    <link href="../assets/css/material.css" rel="stylesheet">
    <link href="../assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-2.html">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Bảng điều khiển</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4 col-lg-3 col-xl-2 theiaStickySidebar">
                        <!-- Profile Sidebar -->
                        <div class="profile-sidebar">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="../../assets/img/doctor/doctor-1.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><?php echo $_SESSION['nguoidung']['Name'] == '' ? $_SESSION['nguoidung']['Email'] : $_SESSION['nguoidung']['Name']   ?></h3>
                                        <div class="patient-details">
                                            <h5 class="mb-0">Một bác sĩ tuyệt vời</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li class="<?php echo $sitemap == 'dashboard' ? 'active' : '' ?>">
                                            <a href="?action=dashboard">
                                                <i class="fas fa-columns"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'booking' ? 'active' : '' ?>">
                                            <a href="?action=booking">
                                                <i class="fas fa-calendar-check"></i>
                                                <span>Các cuộc hẹn</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'schedule' ? 'active' : '' ?>">
                                            <a href="?action=schedule">
                                                <i class="fas fa-hourglass-start"></i>
                                                <span>Lịch của tôi</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'patients' ? 'active' : '' ?>">
                                            <a href="?action=history">
                                                <i class="fas fa-user-injured"></i>
                                                <span>Lịch sử khám</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'account' ? 'active' : '' ?>">
                                            <a href="?action=view-account">
                                                <i class="fas fa-user-cog"></i>
                                                <span>Tài khoản</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'change-password' ? 'active' : '' ?>">
                                            <a href="?action=doimatkhau">
                                                <i class="fas fa-lock"></i>
                                                <span>Đổi mật khẩu</span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $sitemap == 'logout' ? 'active' : '' ?>">
                                            <a href="?action=dangxuat">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span>Đăng xuất</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /Profile Sidebar -->

                    </div>