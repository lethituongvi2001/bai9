<?php include("../view/top.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    Thêm lịch bác sĩ
                </h3>

            </div>

        </div>
        <!-- Page Heading end-->

        <!-- panel start -->
        <div class="panel panel-primary">

            <!-- panel heading starat -->
            <div class="panel-heading">
                <h3 class="panel-title">Thêm lịch</h3>
            </div>
            <!-- panel heading end -->

            <div class="panel-body">
                <!-- panel content start -->
                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal" method="post" action="index.php">

                                    <input type="hidden" name="action" value="xulythem">




                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                            Bác sĩ
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="select form-control" id="scheduleday1" name="otpDoctor" required>


                                                <?php
                                                foreach ($bacsi as $b) :
                                                ?>
                                                    <option value="<?php echo $b["ID"]; ?>"><?php echo $b["Name"]; ?></option>
                                                <?php
                                                endforeach;
                                                ?>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                            Thứ
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="select form-control" id="scheduleday" name="otpcheduleDay" required>
                                                <option value="Thứ hai">
                                                    Thứ hai
                                                </option>
                                                <option value="Thứ ba">
                                                    Thứ ba
                                                </option>
                                                <option value="Thứ tư">
                                                    Thứ tư
                                                </option>
                                                <option value="Thứ năm">
                                                    Thứ năm
                                                </option>
                                                <option value="Thứ sáu">
                                                    Thứ sáu
                                                </option>
                                                <option value="Thứ bảy">
                                                    Thứ bảy
                                                </option>
                                                <option value="Chủ nhật">
                                                    Chủ nhật
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="starttime">
                                            Giờ bắt đầu
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                </div>
                                                <input class="form-control" id="starttime" name="txtstartTime" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="endtime">
                                            Giờ kết thúc
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o">
                                                    </i>
                                                </div>
                                                <input class="form-control" id="endtime" name="txtendTime" type="text" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-2 requiredField" for="bookavail">
                                            Trạng thái
                                            <span class="asteriskField">
                                                *
                                            </span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="select form-control" id="bookavail" name="otpbookAvail" required>
                                                <option value="Có sẵn">
                                                    Có sẵn
                                                </option>
                                                <option value="Không có sẵn">
                                                    Không có sẵn
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button class="btn btn-primary " name="submit" type="submit">
                                                Lưu lại
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


<!-- jQuery -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-clockpicker.js"></script>
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