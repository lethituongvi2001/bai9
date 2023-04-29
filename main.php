<?php include("view/top.php"); ?>

<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Tìm bác sĩ, đặt lịch hẹn</h1>
                <p>Khám phá các bác sĩ tốt nhất thành phố gần bạn nhất.</p>
            </div>

            <!-- Search -->
            <div class="search-box">
                <form action="templateshub.net">
                    <div class="form-group search-location">
                        <input type="text" class="form-control" placeholder="Search Location">
                        <span class="form-text">Based on your Location</span>
                    </div>
                    <div class="form-group search-info">
                        <input type="text" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
                        <span class="form-text">Ex : Dental or Sugar Check up etc</span>
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                </form>
            </div>
            <!-- /Search -->

        </div>
    </div>
</section>
<!-- /Home Banner -->

<!-- Clinic and Specialities -->
<section class="section section-specialities">
    <div class="container-fluid">
        <div class="section-header text-center">
            <h2>Dịch vụ</h2>
            <p class="sub-title">Nhanh chóng - Thuận tiện - Đáng tin cậy</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <!-- Slider -->
                <div class="specialities-slider slider">
                    <?php
                    foreach ($chuyenmon as $cm) :
                    ?>
                        <!-- Slider Item -->
                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img class="img-fluid" height="100px" width="100px" src="<?php echo $cm["AbsolutePath"]; ?>" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p><?php echo $cm["Name"]; ?></p>
                        </div>
                        <!-- /Slider Item -->
                    <?php endforeach; ?>
                </div>
                <!-- /Slider -->

            </div>
        </div>
    </div>
</section>
<!-- Clinic and Specialities -->

<!-- Popular Section -->
<section class="section section-doctor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4" style="box-shadow: 2px 2px 13px rgba(0, 0, 0, 0.1);margin-bottom: 0;">
                <div class="section-header ">
                    <h2>Đội ngũ bác sĩ chất lượng</h2>
                    <p>Lương y như từ mẫu</p>
                </div>
                <div class="about-content">
                    <p>Chào mừng đến với trang web đặt lịch online của chúng tôi, nơi bạn có thể tìm thấy đội ngũ bác sĩ chất lượng để chăm sóc sức khỏe của mình. Với hơn mười năm kinh nghiệm trong lĩnh vực y tế, chúng tôi tự hào giới thiệu đội ngũ bác sĩ giàu kinh nghiệm và có trình độ chuyên môn cao.</p>
                    <p>Với mục tiêu mang lại cho bệnh nhân trải nghiệm tuyệt vời và dịch vụ chăm sóc sức khỏe tốt nhất có thể, chúng tôi tự tin rằng đội ngũ bác sĩ của chúng tôi sẽ đáp ứng được tất cả các nhu cầu của bạn. Hãy đặt lịch trực tuyến với chúng tôi ngay hôm nay để có được một cuộc hẹn với đội ngũ bác sĩ chất lượng nhất.</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="doctor-slider slider">
                    <?php
                    foreach ($doctor as $bs) :
                    ?>
                        <!-- Doctor Widget -->
                        <div class="profile-widget">
                            <div class="doc-img">
                                <a href="doctor-profile.html">
                                    <img class="img-fluid" src="<?php echo $bs["AbsolutePath"]; ?>" style="width:100%" alt="<?php echo $bs["Name"]; ?>">

                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <div class="doctor-profile-top">
                                    <h3 class="title">
                                        <a href="doctor-profile.html"><?php echo $bs["Name"]; ?></a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>

                                    <?php foreach ($bs['Speciality'] as $item) : ?>
                                        <p class="speciality"><?php echo $item['speciality_name'] ?></p>
                                    <?php endforeach ?>
                                </div>
                                <div class="doctor-profile-bottom">
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span class="d-inline-block average-rating">(17)</span>
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> <?php echo $bs["Address"]; ?>
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="doctor-profile.html" class="btn view-btn">Chi tiết</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="booking.html" class="btn book-btn">Đặt ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- /Doctor Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Popular Section -->


<?php include("view/bottom.php"); ?>