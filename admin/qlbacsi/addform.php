<?php include("../view/top.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Cuộc hẹn</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- panel start -->
        <div class="panel panel-primary">
            <div class="panel-body">
                <!-- panel content start -->
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal" method="post" action="index.php" enctype="multipart/form-data">
                                    <input type="hidden" name="doctor_id" value="<?php echo $doctor['ID']; ?>">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="name">
                                            Họ Tên
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group" data-align="top" data-autoclose="true">
                                                <input value="<?php echo $doctor['Name']; ?>" class="form-control" name="name" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="gender">
                                            Giới tính
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="select form-control" name="gender" required>
                                                <?php
                                                if ($doctor['Gender'] == "Nam") { ?>
                                                    <option value="Nam" selected>Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                <?php } else { ?>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ" selected>Nữ</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="date">
                                            Ngày sinh
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group ">
                                                <input value="<?php echo $doctor['DOB']; ?>" class="form-control" name="dob" type="date" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="name">
                                            Email
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group" data-align="top" data-autoclose="true">
                                                <input value="<?php echo $doctor['Email']; ?>" class="form-control" name="email" type="email" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="name">
                                            Số điện thoại
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group" data-align="top" data-autoclose="true">
                                                <input value="<?php echo $doctor['PhoneNumber']; ?>" class="form-control" name="phone_number" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                            Chuyên môn
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-3">
                                            <select class="select form-control cm-select" id="select_cm1" name="select_cm1" required value=''>
                                                <option value="" selected disabled>Chuyên môn 1</option>
                                                <?php foreach ($chuyenmon as $c) : ?>
                                                    <option value=<?php echo $c['id'] ?> <?php echo ($doctor['speciality_0'] == $c['id']) ? 'selected' : ''; ?>>
                                                        <?php echo $c['Name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="select form-control cm-select" id="select_cm2" name="select_cm2" required value=''>
                                                <option value="" selected disabled>Chuyên môn 2</option>
                                                <?php foreach ($chuyenmon as $c) : ?>
                                                    <option value=<?php echo $c['id'] ?> <?php echo ($doctor['speciality_1'] == $c['id']) ? 'selected' : ''; ?>>
                                                        <?php echo $c['Name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="select form-control cm-select" id="select_cm3" name="select_cm3" required value=''>
                                                <option value="" selected disabled>Chuyên môn 3</option>
                                                <?php foreach ($chuyenmon as $c) : ?>
                                                    <option value=<?php echo $c['id'] ?> <?php echo ($doctor['speciality_2'] == $c['id']) ? 'selected' : ''; ?>>
                                                        <?php echo $c['Name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="name">
                                            Số giấy phép
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="input-group" data-align="top" data-autoclose="true">
                                                <input value="<?php echo $doctor['LicenseNumber']; ?>" class="form-control" name="licenseNumber" type="text" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="name">
                                            Địa chỉ
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="input-group" data-align="top" data-autoclose="true">
                                                <input value="<?php echo $doctor['Address']; ?>" class="form-control" name="address" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class=" col-sm-2 ">
                                        </label>
                                        <div class="col-sm-3">
                                            <select class="select form-control" id="select_province" name="select_province">
                                                <option value="" disabled selected>Chọn tỉnh / TP</option>
                                                <?php foreach ($cities as $c) : ?>
                                                    <option value="<?php echo $c['matp'] ?>" <?php echo ($doctor['province_id'] == $c['matp']) ? 'selected' : ''; ?>>
                                                        <?php echo $c['name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="select form-control" id="select_district" name="select_district">
                                                <option value="" disabled>Chọn quận / huyện</option>
                                                <?php foreach ($districts as $d) : ?>
                                                    <option value="<?php echo $d['maqh'] ?>" <?php echo ($doctor['district_id'] == $d['maqh']) ? 'selected' : ''; ?>>
                                                        <?php echo $d['name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="select form-control" id="select_ward" name="select_ward">
                                                <option value="" disabled>Chọn phường / xã</option>
                                                <?php foreach ($wards as $w) : ?>
                                                    <option value="<?php echo $w['xaid'] ?>" <?php echo ($doctor['ward_id'] == $w['xaid']) ? 'selected' : ''; ?>>
                                                        <?php echo $w['name'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="image">
                                            Ảnh
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="custom-file" style="height: 46px;">
                                                <input value="<?php echo $doctor['FileName'] ?>" name="filehinhanh" onchange="updateLabel()" type="file" class="custom-file-input" id="inputFile" aria-describedby="inputFileAddon">
                                                <label class="custom-file-label" id="inputFileLabel" for="inputFile"><?php echo $doctor['FileName'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2"></label>
                                        <div class="input-group-append col-sm-6">
                                            <span class="input-group-text" id="inputFileAddon">
                                                <img id="previewImg" src="<?php echo $doctor['AbsolutePath'] ?>" alt="Ảnh" height="75px" width="130px">
                                            </span>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php if ($action == 'them') : ?>
                                                <input type="hidden" name="action" value="xulythem">
                                                <button class="btn btn-primary" type="submit" style="float: right; margin-left:10px; font-weight: 600; padding: 6px 12px; margin-top:50px">Lưu thêm</button>
                                            <?php endif ?>
                                            <?php if ($action == 'doctor_detail') : ?>
                                                <input type="hidden" name="action" value="xulysua">
                                                <button class="btn btn-primary" type="submit" style="float: right; margin-left:10px; font-weight: 600; padding: 6px 12px; margin-top:50px">Lưu lại</button>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <script>
                                        function updateLabel() {
                                            var input = document.getElementById("inputFile");
                                            var label = document.getElementById("inputFileLabel");
                                            if (input.files.length > 0) {
                                                label.textContent = input.files[0].name;
                                            } else {
                                                label.textContent = "Chọn ảnh";
                                            }
                                        }
                                        $(document).ready(function() {
                                            // Preview selected image
                                            $("#inputFile").change(function() {
                                                if (this.files && this.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#previewImg').attr('src', e.target.result);
                                                    }
                                                    reader.readAsDataURL(this.files[0]);
                                                }
                                            });
                                        });
                                    </script>

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


<!-- jQuery -->
<script src="../assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-clockpicker.js"></script>
<!-- Latest compiled and minified JavaScript -->
<!-- script for jquery datatable start-->
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<script>
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>
<script type="text/javascript">
    $(function() {
        $(".delete").click(function() {
            var element = $(this);
            var id = element.attr("id");
            var info = 'id=' + id;
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    type: "POST",
                    url: "deleteschedule.php",
                    data: info,
                    success: function() {}
                });
                $(this).parent().parent().fadeOut(300, function() {
                    $(this).remove();
                });
            }
            return false;
        });
    });
</script>
<script type="text/javascript">
    /*
        Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
        */
    $(document).ready(function() {
        $('.filterable .btn-filter').click(function() {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function() {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
</script>

<?php include("../view/bottom.php"); ?>