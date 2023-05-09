<?php include("view/top.php"); ?>

<section class="section section-doctor">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Doctor Widget -->
                <div class="doctor-widget">
                    <div class="doc-img">
                        <img class="img-fluid" src="<?php echo $doctor['AbsolutePath']; ?>" alt="<?php echo $doctor['Name']; ?>">
                    </div>
                    <div class="pro-content">
                        <div class="doctor-profile-top" style="display: flex;">
                            <h1 style="width: 220px;" class="title"><?php echo $doctor['Name']; ?></h1>
                            <i class="fas fa-check-circle verified" style="font-size: 24px; color: green;"></i>
                        </div>
                        <div class="doctor-profile-bottom">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-widget">
                                        <h4><i class="far fa-user"></i> Thông tin cá nhân</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <span><i class="far fa-id-card"></i> Giới tính:</span> <?php echo $doctor['Gender']; ?>
                                            </li>
                                            <li>
                                                <span><i class="far fa-calendar"></i> Ngày sinh:</span> <?php echo $doctor['DOB']; ?>
                                            </li>
                                            <li>
                                                <span><i class="fas fa-mobile"></i> Điện thoại:</span> <?php echo $doctor['PhoneNumber']; ?>
                                            </li>
                                            <li>
                                                <span><i class="far fa-envelope"></i> Email:</span> <?php echo $doctor['Email']; ?>
                                            </li>
                                            <li>
                                                <span><i class="fas fa-map-marker-alt"></i> Địa chỉ:</span> <?php echo $doctor['Address']; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-widget">
                                        <h4><i class="far fa-address-card"></i> Thông tin bác sĩ</h4>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <span><i class="far fa-id-badge"></i> Số bằng:</span> <?php echo $doctor['LicenseNumber']; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor['Address']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Widget -->
            </div>
        </div>
    </div>
</section>

<?php include("view/bottom.php"); ?>