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


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
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
                        <a class="dropdown-item" href="profile.php">Hồ sơ</a>
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
                        <li class="active">
                            <a href="index.html"><i class="fe fe-home"></i> <span>Bảng điều khiển</span></a>
                        </li>
                        <li>
                            <a href="../qlcuochen/index.php"><i class="fe fe-layout"></i> <span>Cuộc hẹn</span></a>
                        </li>
                        <li>
                            <a href="../qlchuyenmon/index.php"><i class="fe fe-users"></i> <span>Chuyên môn</span></a>
                        </li>
                        <li>
                            <a href="../qlbacsi/index.php"><i class="fe fe-user-plus"></i> <span>Bác sĩ</span></a>
                        </li>
                        <li>
                            <a href="../qlbenhnhan/index.php"><i class="fe fe-user"></i> <span>Bệnh nhân</span></a>
                        </li>
                        <li>
                            <a href="../qllichbacsi/index.php"><i class="fe fe-star-o"></i> <span>Lịch của bác sĩ</span></a>
                        </li>
                        <li>
                            <a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Phản hồi</span></a>
                        </li>





                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->







        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="card card-4" style="background:#E6E6FA">
                    <div class="card-body">
                        <h2 class="title">Thêm tài khoản bác sĩ</h2>

                        <form method="post" enctype="multipart/form-data" action="index.php">
                            <input type="hidden" name="action" value="xulythem">
                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="input-group">
                                        <label class="label">Họ Tên :</label>
                                        <input class="input--style-4" type="text" name="txtName">
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Mật khẩu :</label>
                                        <input class="input--style-4" type="password" name="txtPassword">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label">Giới tính : </label>

                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Nam
                                            <input type="radio" checked="checked" name="txtGender" value="Nam">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Nữ
                                            <input type="radio" name="txtGender" value="Nữ">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="label">Ngày sinh : </label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="birthday" name="txtDOB">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>




                                </div>

                            </div>





                            <div class="row row-space">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Email :</label>
                                        <input class="input--style-4" type="email" name="txtEmail">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Số điện thoại :</label>
                                        <input class="input--style-4" type="text" name="txtPhoneNumber">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Chuyên môn :</label>
                                        <select class="form-control" name="optSpeciality">
                                            <?php
                                            foreach ($chuyenmon as $c) :
                                            ?>
                                                <option value="<?php echo $c["ID"]; ?>"><?php echo $c["Speciality"]; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Số giấy phép :</label>
                                        <input class="input--style-4" type="text" name="txtLicenseNumber">
                                    </div>
                                </div>
                            </div>

                            <div class="row row-space">
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Địa chỉ :</label>
                                        <input class="input--style-4" type="text" name="txtAddress">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <label class="label">Thêm ảnh :</label>
                                        <input type="file" name="filehinhanh">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-3">
                                    <div class="input-group">
                                        <!-- <input type="hidden" name="action" value="them"> -->
                                        <input type="submit" value="Lưu" class="btn btn-success">

                                        <!-- <input class="btn btn-primary" type="submit" value="Thêm"> -->

                                    </div>
                                </div>
                                <div class="col-3">
                                    <input type="reset" value="Hủy" class="btn btn-warning">
                                    <!-- <input class="btn btn-warning" type="reset" value="Hủy"> -->

                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>







        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2023</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/plugins/morris/morris.min.js"></script>
    <script src="../assets/js/chart.morris.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/script.js"></script>


    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->

</html>