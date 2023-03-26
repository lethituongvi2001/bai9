<?php include("head1.php"); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-7 col-auto">
                    <h3 class="page-title">Specialities</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Specialities</li>
                    </ul>
                </div>
                <div class="col-sm-5 col">
                    <a href="index.php?action=them" class="btn btn-primary float-right mt-2">Add</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>id</th>
                                        <th>Chuyên môn</th>
                                        <th class="text-right">Hoạt động</th>
                                    </tr>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <?php
                                        foreach ($chuyenmon as $c) :
                                        ?>

                                    <tr>
                                        <td><?php echo $c["ID"]; ?></td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2">
                                                    <!-- <img class="avatar-img" src="assets/img/specialities/specialities-01.png" alt="ảnh"> -->
                                                    <img class="avatar-img" src="../<?php echo $c["image"]; ?>" style="width:100%" alt="ảnh">
                                                </a>
                                                <a><?php echo $c["Speciality"]; ?></a>
                                            </h2>
                                        </td>


                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details" <?php echo $c["ID"]; ?>>
                                                    <i class="fe fe-pencil"></i> Sửa
                                                </a>

                                                <!-- <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $c["ID"]; ?>"><span class="glyphicon glyphicon-trash"></span></a> -->
                                                <a href="index.php?action=xoa&id=<?php echo $c["ID"]; ?>" class="btn btn-sm bg-danger-light">
                                                    <i class="fe fe-trash"></i> Xoá
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                        endforeach;
                                    ?>
                                    </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->


<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm chuyên môn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php">
                    <input type="hidden" name="action" value="xulythem">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input type="text" name="txtSpeciality" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="filehinhanh" class="form-control">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa chuyên môn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="action" value="xulysua">
                    <input type="hidden" name="txtid" value="<?php echo $c["ID"]; ?>">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Chuyên môn</label>
                                <input type="text" class="form-control" name="txtchuyenmon" required value="<?php echo $c["Speciality"]; ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="hidden" name="txthinhcu" value="<?php echo $c["image"]; ?>">
                                <!-- <input type="file" class="form-control" name="filehinhanh"> -->
                                <div id="file" class="form-group">
                                    <input type="file" class="form-control" name="filehinhanh">
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
            <div class="modal-body">
                <div class="form-content p-2">
                    <h4 class="modal-title">Xoá</h4>
                    <p class="mb-4">Are you sure want to delete?</p>
                    <button type="button" class="btn btn-primary">Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->
</div>
<!-- /Main Wrapper -->

<?php include("footer.php"); ?>