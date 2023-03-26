<?php include("top.php"); ?>

<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Search Doctor, Make an Appointment</h1>
                <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
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
            <h2>Clinic and Specialities</h2>
            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                <!-- <img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality"> -->
                                <img class="img-fluid" src="<?php echo $cm["image"]; ?>" alt="Speciality">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p><?php echo $cm["Speciality"]; ?></p>
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
            <div class="col-lg-4">
                <div class="section-header ">
                    <h2>Book Our Doctor</h2>
                    <p>Lorem Ipsum is simply dummy text </p>
                </div>
                <div class="about-content">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>
                    <a href="javascript:;">Read More..</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="doctor-slider slider">


                    <?php
                    foreach ($bacsi as $bs) :
                    ?>
                        <?php
                        foreach ($chuyenmon as $cm) :
                        ?>
                            <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="doctor-profile.html">
                                        <img class="img-fluid" src="<?php echo $bs["image"]; ?>" style="width:100%" alt="<?php echo $bs["Name"]; ?>">

                                    </a>
                                    <a href="javascript:void(0)" class="fav-btn">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="doctor-profile.html"><?php echo $bs["Name"]; ?></a>
                                        <i class="fas fa-check-circle verified"></i>
                                    </h3>

                                    <p class="speciality"><?php echo $cm["Speciality"]; ?></p>



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
                                        <li>
                                            <i class="far fa-money-bill-alt"></i> $300 - $1000
                                            <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="booking.html" class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <!-- /Doctor Widget -->





                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Popular Section -->

<!-- Availabe Features -->
<section class="section section-features">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 features-img">
                <img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
            </div>
            <div class="col-md-7">
                <div class="section-header">
                    <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
                <div class="features-slider slider">
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
                        <p>Patient Ward</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
                        <p>Test Room</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
                        <p>ICU</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
                        <p>Laboratory</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
                        <p>Operation</p>
                    </div>
                    <!-- /Slider Item -->

                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
                        <p>Medical</p>
                    </div>
                    <!-- /Slider Item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Availabe Features -->



<?php include("bottom.php"); ?>