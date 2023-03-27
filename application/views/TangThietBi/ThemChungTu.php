<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<?php
    if(isset($alert)){
        echo "<script type='text/javascript'>alert('$alert');</script>"; 
    }
?>
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
                        <form action="<?php echo base_url("tang-thiet-bi/them-chung-tu") ?>" method="POST">
                            <div class="row clearfix">
                            <div class="col-sm-4">
                                <b>Ngày nhập</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="date" name="NgayNhap" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số phiếu</label>
                                        <input type="text" name="SoPhieu" class="form-control" placeholder="Nhập số phiếu">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Lý do tăng</label>
                                <select name="LyDoTang" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn lý do</option>
                                    <option value="Được Cấp">Được Cấp</option>
                                    <option value="Mua sắm theo kế hoạch">Mua sắm theo kế hoạch</option>
                                    <option value="Được viện trợ, cho tặng">Được viện trợ, cho tặng</option>
                                    <option value="Được mượn sử dụng">Được mượn sử dụng</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Diễn Giải</label>
                                        <input type="text" name="DienGiai" class="form-control" placeholder="Nhập diễn giải">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label>Kho nhập</label>
                                <select name="TenKho" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn kho</option>
                                    <?php foreach ($Kho as $key => $value) { ?>
                                       <option value="<?php echo $value['MaKho'] ?>"><?php echo $value['TenKho'] ?></option>
                                    <?php } ?>
                                    
                                    
                                </select>

                            </div>
                            <div class="col-sm-6">
                                <label>Nhà cung cấp</label>
                                <select name="TenNhaCungCap" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn nhà cung cấp</option>
                                    <?php foreach ($NhaCungCap as $key => $value) { ?>
                                       <option value="<?php echo $value['MaNhaCungCap'] ?>"><?php echo $value['TenNhaCungCap'] ?></option>
                                    <?php } ?>                                
                               </select>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số hóa đơn tài chính</label>
                                        <input type="text" name="SohdTaiChinh" class="form-control" placeholder="Nhập số hóa đơn tài chính">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Ký hiệu</label>
                                        <input type="text" name="KyHieu" class="form-control" placeholder="Nhập ký hiệu">
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
                                        <input type="date" name="Ngayhd" class="form-control date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($error)){ ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                        <?php } ?>
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