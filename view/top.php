<!DOCTYPE html>
<html lang="en">

<!-- doccure/  30 Nov 2019 04:11:34 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="index.php" class="navbar-brand logo">
                        <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.php" class="menu-logo">
                            <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li <?php if ($sitemap == 'index') { ?>class="active" <?php } ?>>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <?php if ($isLogin) { ?>
                            <li <?php if ($sitemap == 'booking') { ?>class="active" <?php } ?>>
                                <a href="index.php">Đặt lịch hẹn</a>
                            </li>
                        <?php } ?>
                        <li <?php if ($sitemap == 'tintuc') { ?>class="active" <?php } ?>>
                            <a href="?action=tintuc">Tin tức</a>
                        </li>
                        <li <?php if ($sitemap == 'hoatdong') { ?>class="active" <?php } ?>>
                            <a href="?action=hoatdong">Hoạt động</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item contact-item">
                        <div class="header-contact-img">
                            <i class="far fa-hospital"></i>
                        </div>
                        <div class="header-contact-detail">
                            <p class="contact-header">Liên hệ </p>
                            <p class="contact-info-header"> 0364528586</p>
                        </div>
                    </li>
                    <?php if (!isset($_SESSION['nguoidung'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="?action=dangnhap">
                                Đăng nhập </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="?action=dangxuat">
                                <?php echo $_SESSION['nguoidung']['Username'] ?> / Đăng xuất </a>
                        </li>
                    <?php } ?>

                </ul>
            </nav>
        </header>
        <!-- /Header -->