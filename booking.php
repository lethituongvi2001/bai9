<?php include("view/top.php"); ?>

<!-- Page Content -->
<div class="content">
    <div class="container">

        <!-- panel start -->
        <div class="panel panel-primary">
            <!-- panel heading starat -->
            <div class="panel-heading">
                <h3 style="font-weight: 600; font-size: 20px;" class="panel-title">Đặt lịch hẹn</h3>
            </div>
            <!-- panel heading end -->

            <div class="panel-body">
                <!-- panel content start -->
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal" method="post" action="?action=onSubmitBooking">
                                    <input type="hidden" name="submitType" value="add">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 ">
                                            Bác sĩ
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="<?php echo $doctor['Name'] ?>" class="form-control" name="doctor" />
                                            <input type="hidden" value="<?php echo $doctor['ID'] ?>" name="doctor_id" />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 ">
                                            Khách hàng
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="<?php echo $_SESSION['nguoidung']['Name'] ?>" class="form-control" name="customer_id" />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                            Triệu chứng
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="trieu_chung" placeholder="Sốt, ho, đau họng..." />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                            Dịch vụ yêu cầu
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dich_vu" placeholder="Chăm sóc tại nhà, Khám sức khỏe định kỳ..." />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="endtime">
                                            Ngày & giờ khám
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="input-group date" data-date-format="dd/mm/yyyy" data-provide="datepicker">
                                                    <!-- <div class="input-group-addon"> -->
                                                    <!-- <span class="glyphicon glyphicon-th"></span> -->
                                                    <!-- </div> -->
                                                    <input type="date" class="form-control" name="booking_date">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group clockpicker" style="padding-right: 15px;" data-align="top" data-autoclose="true">
                                                    <!-- <div class="input-group-addon">
                                                        <i class="fa fa-clock-o">
                                                        </i>
                                                    </div> -->
                                                    <input class="form-control" id="endtime" name="booking_time" type="time" required value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField">
                                            Người liên hệ
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contactName" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField">
                                            SĐT liên hệ
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contactPhone" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField">
                                            Địa chỉ liên hệ
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contactAddress" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="row" style="padding: 0 15px 0 0 ">
                                            <div class="col-sm-3">
                                                <select class="select form-control" id="select_province" name="select_province" required value=''>
                                                    <option value="" selected disabled>Chọn tỉnh / TP</option>
                                                    <?php foreach ($cities as $c) : ?>
                                                        <option value=<?php echo $c['matp'] ?>>
                                                            <?php echo $c['name'] ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="select form-control" id="select_district" name="select_district" required value=''>
                                                    <option value="" selected disabled>Chọn quận / huyện</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="select form-control" id="select_ward" name="select_ward" required value=''>
                                                    <option value="" selected disabled>Chọn phường / xã</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField">
                                            Khoảng cách
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="distanceDisplay" disabled value="4.5km" />
                                            <input type="hidden" name="distance" value="4.5">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField">
                                            Trạng thái
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="trangthai" disabled value="Đang mở" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button class="btn btn-primary " name="saveBooking" type="submit" style="float: right; margin-left:10px; font-weight: 600; padding: 6px 12px;">
                                                Lưu
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- panel content end -->
                <!-- panel end -->
            </div>
        </div>
        <!-- panel start -->
    </div>
</div>
<!-- /Page Content -->

<?php include("view/bottom.php"); ?>