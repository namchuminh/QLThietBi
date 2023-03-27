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
                        <h2><a href="<?php echo base_url("tang-thiet-bi/") ?>">Danh sách »</a> Thêm chứng từ</h2>
                    </div>
                    <div class="body">
                        <form action="" method="POST">
                            <div class="row clearfix">
                            <div class="col-sm-4">
                                <b>Ngày nhập</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số phiếu</label>
                                        <input type="number" class="form-control" placeholder="Nhập số phiếu">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Lý do tăng</label>
                                <select class="form-control show-tick" tabindex="-98">
                                    <option hidden>Chọn lý do</option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Lý do tăng</label>
                                        <input type="text" class="form-control" placeholder="Nhập số phiếu">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label>Kho nhập</label>
                                <select class="form-control show-tick" tabindex="-98">
                                    <option hidden>Chọn kho</option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Nhà cung cấp</label>
                                <select class="form-control show-tick" tabindex="-98">
                                    <option hidden>Chọn nhà cung cấp</option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số hóa đơn tài chính</label>
                                        <input type="text" class="form-control" placeholder="Nhập số hóa đơn tài chính">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Ký hiệu</label>
                                        <input type="text" class="form-control" placeholder="Nhập ký hiệu">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <b>Ngày HĐ</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary waves-effect" type="submit">Thêm Chứng Từ</button>
                        <button class="btn btn-success waves-effect" type="reset">Làm Mới</button>
                        </form>
                        
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require(__DIR__.'/layouts/Footer.php'); ?>