<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TĂNG THIẾT BỊ</h2>
        </div>

    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><a href="<?php echo base_url("tang-thiet-bi/") ?>">Danh sách »</a> <a href="<?php echo base_url('tang-thiet-bi/chi-tiet/'.$MaChungTu); ?>">Chi tiết hóa đơn »</a> Thêm chi tiết</h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="row clearfix">
	                            <div class="col-sm-4">
	                                <label>Môn học</label>
	                                <select class="form-control show-tick" tabindex="-98">
	                                    <option value="0" hidden>Chọn môn</option>
	                                    <option value="">Môn học 1</option>
	                                 	<option value="">Môn học 2</option>
	                                </select>
	                            </div>
	                            <div class="col-sm-4">
	                                <label>Khối lớp</label>
	                                <select class="form-control show-tick" tabindex="-98">
	                                    <option value="0" hidden>Chọn lớp</option>
	                                    <option value="">Lớp 6</option>
	                                 	<option value="">Lớp 7</option>
	                                 	<option value="">Lớp 8</option>
	                                 	<option value="">Lớp 9</option>
	                                 	<option value="">Lớp 10</option>
	                                 	<option value="">Lớp 11</option>
	                                 	<option value="">Lớp 12</option>
	                                </select>
	                            </div>
	                            <div class="col-sm-4">
	                                <label>Thiết bị</label>
	                                <select class="form-control show-tick" tabindex="-98">
	                                    <option value="0" hidden>Chọn thiết bị</option>
	                                    <option value="">Thiết bị 1</option>
	                                </select>
	                            </div>
	                    	</div>
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <label>Số lượng</label>
	                                        <input type="text" class="form-control" placeholder="Nhập số lượng">
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <label>Đơn giá</label>
	                                        <input type="text" name="DienGiai" class="form-control" placeholder="Nhập đơn giá">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <label>Quản lý thiết bị</label>
	                                <select class="form-control show-tick" tabindex="-98">
	                                    <option value="0" hidden>Chọn quản lý thiết bị</option>
	                                    <option value="">Môn học 1</option>
	                                 	<option value="">Môn học 2</option>
	                                </select>
	                            </div>
	                            <div class="col-sm-6">
	                                <label>Đơn vị tính</label>
	                                <select class="form-control show-tick" tabindex="-98">
	                                    <option value="0" hidden>Chọn đơn vị tính</option>
	                                    <option value="">Lớp 6</option>
	                                </select>
	                            </div>
		                    </div>
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <label>VAT(%)</label>
	                                        <input type="text" class="form-control" placeholder="Nhập VAT(%)">
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <label>Thành tiền</label>
	                                        <input type="text" name="DienGiai" class="form-control" placeholder="Nhập thành tiền">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row clearfix">
	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <label>Thời gian khấu hao cho thiết bị (nếu có), đơn vị tính là Tháng</label>
	                                        <input type="text" class="form-control" placeholder="Nhập thời gian khấu hao">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        	<br>
	                        <button class="btn btn-primary waves-effect" type="submit">Thêm Thiết Bị</button>
	                        <button class="btn btn-success waves-effect" type="reset">Làm Mới</button>
	                   	</form>
                       
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require(__DIR__.'/layouts/Footer.php'); ?>