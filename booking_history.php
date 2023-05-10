<?php include("view/top.php"); ?>

<!-- Page Content -->
<div class="content">
    <div class="container" style="width: 100%; max-width: calc(100vw);margin: 0 20px;">

        <!-- panel start -->
        <div class="panel panel-primary">
            <!-- panel heading starat -->
            <div class="panel-heading">
                <h3 style="font-weight: 600; font-size: 20px;" class="panel-title">Lịch sử đặt lịch</h3>
            </div>

            <!-- panel heading end -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã cuộc hẹn</th>
                                    <th>Thời gian</th>
                                    <th>Triệu chứng</th>
                                    <th>Dịch vụ</th>
                                    <th>Bác sĩ</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <?php foreach ($bookings as $book) : ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $book["index"]; ?></td>
                                        <td><?php echo $book["Code"]; ?></td>
                                        <td><?php echo date('H:i', strtotime($book["BookingTime"])) . '-' . date('d/m/Y', strtotime($book["BookingDate"])); ?> </td>
                                        <td><?php echo $book["Symptom"]; ?></td>
                                        <td><?php echo $book["ServiceRequirement"]; ?></td>
                                        <td><?php echo $book["DoctorName"]; ?></td>
                                        <td><span class="badge bg-primary-light"><?php echo $book['status']; ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel start -->
    </div>
</div>
<!-- /Page Content -->

<?php include("view/bottom.php"); ?>