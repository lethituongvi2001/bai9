<?php include("view/top.php"); ?>

<!-- Page Content -->
<div class="content">
    <div class="container">

        <!-- Doctor Widget -->
        <div class="card">
            <div class="card-body">
                <div class="doctor-widget">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="<?php echo $doctor['AbsolutePath']; ?>" width="225" height="150" class="img-fluid" alt="User Image">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name"><?php echo $doctor['Name']; ?></h4>
                            <p class="doc-speciality"><?php foreach ($doctor['Speciality'] as $item) : ?>
                                    - <?php echo $item['speciality_name'] ?>
                                <?php endforeach ?></p>

                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php echo $doctor['fullAddress'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="fas fa-envelope"></i> <?php echo $doctor['Email']; ?></li>
                                <li><i class="fas fa-id-card"></i> <?php echo $doctor['LicenseNumber']; ?></li>
                                <li><i class="fas fa-phone"></i><?php echo $doctor['PhoneNumber']; ?></li>
                            </ul>
                        </div>
                        <div class="clinic-booking">
                            <a class="apt-btn" href="index.php?action=booking&ID=<?php echo $_GET['ID']; ?>">Đặt lịch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Doctor Widget -->


        <!-- Business Hours Widget -->
        <div class="widget business-widget">
            <div class="widget-content">
                <div class="listing-hours">
                    <div class="listing-day current">
                        <div class="day">Sắp tới <span>5 Nov 2019</span></div>
                        <div class="time-items">
                            <span class="open-status"><span class="badge bg-success-light">Lịch trống</span></span>
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 2</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 3</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 4</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 5</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 6</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day">
                        <div class="day">Thứ 7</div>
                        <div class="time-items">
                            <span class="time">07:00 AM - 09:00 PM</span>
                        </div>
                    </div>
                    <div class="listing-day closed">
                        <div class="day">Chủ nhật</div>
                        <div class="time-items">
                            <span class="time"><span class="badge bg-danger-light">Nghỉ</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Business Hours Widget -->


    </div>
</div>
<!-- /Page Content -->

<?php include("view/bottom.php"); ?>