<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<?php if (isset($result)){
    echo "<script type='text/javascript'>alert('$result');</script>";
} ?>
    
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SỬA THIẾT BỊ</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url('sua-chua-thiet-bi/liet-ke') ?>" method="POST">
                    <div class="header">
                        <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url('sua-chua-thiet-bi/them'); ?>">Thêm Mới</a>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url('sua-chua-thiet-bi/xuat-excel'); ?>">Xuất Excel</a>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <b>Ngày ghi nhận từ</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="NgayGhiNhan" type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <b>Tới ngày</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="NgayKetThuc" type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            
	                  	</div>
                        <?php if(isset($error)){ ?>
                            <p style="color: red;"><?php echo $error ?></p>
                        <?php } ?>
                    </form>
                    <div class="row clearfix">
                    	<div class="header">

	                    <h2>
	                        Danh sách
	                    </h2>
	                </div>
                    	<div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Ngày ghi nhận</th>
                                        <th>Người phát hiện</th>
                                        <th>Số lượng hỏng</th>
                                        <th>Tên thiết bị</th>
                                        <th>Mã cá biệt</th>
                                        <th>Hiện tượng bị hỏng hóc</th>
                                        <th>Người sử lý</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($SuaThietBi as $key => $value) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $key+1;  ?></th>
                                            <td><?php echo $value["NgayGhiNhan"];  ?></td>
                                            <td><?php echo $value["NguoiPhatHien"]; ?></td>
                                            <td><?php echo $value["SoLuongHong"]; ?></td>
                                            <td><?php echo $value["TenThietBi"]; ?></td>
                                            <td><?php echo $value["MaCaBiet"];  ?></td>
                                            <td><?php echo $value["HienTuongHong"];  ?></td>
                                            <td><?php echo $value["NguoiGiaiQuyet"];  ?></td>
                                            <td><a href="<?php echo base_url("sua-chua-thiet-bi/sua/").$value["MaSuaThietBi"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td><a href="<?php echo base_url("sua-chua-thiet-bi/xoa-sua/").$value["MaSuaThietBi"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                    
                                                                
                                </tbody>
                            </table>
                        </div>
                    </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require(__DIR__.'/layouts/Footer.php'); ?>