<?php include("view_doctor/top.php"); ?>
<div class="col-md-8 col-lg-9 col-xl-10">
    <div class="row">
        <div class="col-md-12">
            <div class="card dash-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar1">
                                    <div class="circle-graph1" data-percent="75">
                                        <img src="assets_doctor/img/icon-01.png" class="img-fluid" alt="patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Tổng số bệnh nhân</h6>
                                    <h3>1500</h3>
                                    <p class="text-muted">Cho đến hôm nay</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="65">
                                        <img src="assets_doctor/img/icon-02.png" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Bệnh nhân hôm nay</h6>
                                    <h3>160</h3>
                                    <p class="text-muted">04/04/2023</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="circle-bar circle-bar3">
                                    <div class="circle-graph3" data-percent="50">
                                        <img src="assets_doctor/img/icon-03.png" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Cuộc hẹn</h6>
                                    <h3>85</h3>
                                    <p class="text-muted">04/04/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Cuộc hẹn với bệnh nhân</h4>
            <div class="appointment-tab">

                <!-- Appointment Tab -->
                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                    <li class="nav-item">
                        <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Sắp tới</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#today-appointments" data-toggle="tab">Hôm nay</a>
                    </li>
                </ul>
                <!-- /Appointment Tab -->

                <div class="tab-content">

                    <!-- Upcoming Appointment Tab -->
                    <div class="tab-pane show active" id="upcoming-appointments">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Bệnh nhân</th>
                                                <th>Ngày</th>
                                                <th>Mã lịch hẹn</th>
                                                <th>Lí do</th>
                                                <th class="text-center">Giá dự kiến</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets_doctor/img/patients/patient.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Châu Ngô <span>#10</span></a>
                                                    </h2>
                                                </td>
                                                <td>31/03/2023 <span class="d-block text-info">10:00:00</span></td>
                                                <td>13</td>
                                                <td>Bệnh nhân mới</td>
                                                <td class="text-center">150000</td>
                                                <td class="text-right">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="far fa-eye"></i> View
                                                        </a>

                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="fas fa-check"></i> Accept
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="fas fa-times"></i> Cancel
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Today Appointment Tab -->

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Wrapper -->
<?php include("view_doctor/bottom.php"); ?>