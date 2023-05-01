<?php include("../view/top.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page" style="height: 50px;">
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

			<!-- panel heading starat -->
			<div class="panel-heading">
				<h3 style="font-weight: 600; font-size: 20px;" class="panel-title">Chi tiết lịch hẹn</h3>
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
											<select class="select form-control" id="select_doctor" name="select_doctor" required value="<?php echo $booking_detail["Doctor_id"]; ?>">
												<option value="" selected disabled>Chọn bác sĩ</option>
												<?php foreach ($doctor_only as $d) : ?>
													<option value=<?php echo $d['ID'] ?>>
														<?php echo $d['Name'] ?>
													</option>
												<?php endforeach ?>
											</select>
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
											<select class="select form-control" id="select_customer" name="select_customer" required>
												<option value="" selected disabled>Chọn khách hàng</option>
												<?php foreach ($customers as $c) : ?>
													<option value=<?php echo $c['ID'] ?>>
														<?php echo $c['Name'] ?>
													</option>
												<?php endforeach ?>
											</select>
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
										<div class="col-sm-5">
											<div class="input-group date" data-date-format="dd/mm/yyyy" data-provide="datepicker">
												<div class="input-group-addon">
													<span class="glyphicon glyphicon-th"></span>
												</div>
												<input type="text" class="form-control" name="booking_date">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="input-group clockpicker" data-align="top" data-autoclose="true">
												<div class="input-group-addon">
													<i class="fa fa-clock-o">
													</i>
												</div>
												<input class="form-control" id="endtime" name="booking_time" type="text" required value="" />
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
										<label class=" col-sm-2 ">
										</label>
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
<!-- /Page Wrapper -->

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