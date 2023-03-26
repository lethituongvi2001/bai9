<?php include("../view/top.php"); ?>

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
                    <div class="col-6">
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

                            </div>
                        </div>

                    </div>
                    <div class="row row-space">
                        <div class="col-4">

                            <label class="label">Ngày sinh : </label>
                            <div class="input-group-icon">
                                <input class="input--style-4 js-datepicker" type="birthday" name="txtDOB">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
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
<?php include("../view/bottom.php"); ?>