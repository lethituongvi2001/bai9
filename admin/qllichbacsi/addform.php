<?php include("../view/top.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <h3>Thêm lịch bác sĩ </h3>
        <br>
        <form method="post" enctype="multipart/form-data" action="index.php">
            <input type="hidden" name="action" value="xulythem">
            <div class="form-group">
                <label>Bác sĩ</label>
                <select class="form-control" name="otpDoctor">
                    <?php
                    foreach ($bacsi as $b) :
                    ?>
                        <option value="<?php echo $b["ID"]; ?>"><?php echo $b["Name"]; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Ngày hẹn</label>
                <select class="form-control" name="otpcheduleDay">
                    <option>Thứ hai</option>
                    <option>Thứ ba </option>
                    <option>Thứ tư </option>
                    <option>Thứ năm </option>
                    <option>Thứ sáu </option>
                    <option>Thứ bảy </option>
                    <option>Chủ nhật </option>
                </select>

            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Giờ bắt đầu</label>
                    <select class="form-control">
                        <option>6:00:00 am</option>
                        <option>6:30:00 am</option>
                        <option>7:00:00 am</option>
                        <option>7:30:00 am</option>
                        <option>8:00:00 am</option>
                        <option>8:30:00 am</option>
                        <option>9:00:00 am</option>
                        <option>9:30:00 am</option>
                        <option>10:00:00 am</option>
                        <option>10:30:00 am</option>
                    </select>

                    <label>Giờ kết thúc</label>
                    <select class="form-control">
                        <option>6:00:00 am</option>
                        <option>6:30:00 am</option>
                        <option>7:00:00 am</option>
                        <option>7:30:00 am</option>
                        <option>8:00:00 am</option>
                        <option>8:30:00 am</option>
                        <option>9:00:00 am</option>
                        <option>9:30:00 am</option>
                        <option>10:00:00 am</option>
                        <option>10:30:00 am</option>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-6">

                <div class="form-group">
                    <label>Giờ bắt đầu</label>
                    <input class="form-control" type="number" name="txtgiaban" value="0">
                </div>
                <div class="form-group">
                    <label>Giờ kết thúc</label>
                    <input class="form-control" type="number" name="txtsoluong" value="0">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <textarea class="form-control" name="txtmota"></textarea>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input class="form-control" type="file" name="filehinhanh">
                </div>
                <div class="form-group">
                    <input type="submit" value="Lưu" class="btn btn-success">
                    <input type="reset" value="Hủy" class="btn btn-warning">
                </div>
        </form>
    </div>
</div>




<!-- Add Time Slot Modal 
<div class="modal fade custom-modal" id="add_time_slot">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Time Slots</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="hours-info">

                        <div class="row form-row hours-cont">
                            <div class="col-6">

                                <label class="label">Ngày hẹn: </label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="birthday" name="txtDOB">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>

                            </div>

                            <div class="col-12 col-md-10">

                                <div class="row form-row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <select class="form-control">
                                                <option>-</option>
                                                <option>12.00 am</option>
                                                <option>12.30 am</option>
                                                <option>1.00 am</option>
                                                <option>1.30 am</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <select class="form-control">
                                                <option>-</option>
                                                <option>12.00 am</option>
                                                <option>12.30 am</option>
                                                <option>1.00 am</option>
                                                <option>1.30 am</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="select form-control">

                                <option selected="selected">Có sẵn</option>
                                <option>Không có sẵn</option>

                            </select>
                        </div>
                    </div>


                    <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->
<!-- /Add Time Slot Modal -->
<?php include("../view/bottom.php"); ?>