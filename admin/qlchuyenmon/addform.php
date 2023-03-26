<?php include("head1.php"); ?>


<!-- Add Modal -->
<div id="Add_Specialities_details" aria-hidden="true" role="dialog" action="index.php">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm chuyên môn</h5>
                <a href="../qlchuyenmon/index.php">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
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

<?php include("footer.php"); ?>