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
                        <a class="btn btn-primary waves-effect" href="<?php echo base_url("tang-thiet-bi/") ?>">Quay Lại</a>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <b style="margin-right: 73px;"><i>Ngày nhập:</i></b>
                                <span><?php echo $ChungTu[0]['NgayNhap']; ?></span>
                            </div>
                            <div class="col-sm-4">
                                <b style="margin-right: 40px;"><i>Số phiếu:</i></b>
                                <span><?php echo $ChungTu[0]['SoPhieu']; ?></span>
                            </div>
                            <div class="col-sm-4">
                                <b style="margin-right: 40px;"><i>Lý do tăng:</i></b>
                                <span><?php echo $ChungTu[0]['LyDoTang']; ?></span>
                            </div>
	                  	</div>
                        <br>
	                  	<div class="row clearfix">
	                        <div class="col-sm-12">
                                <b style="margin-right: 85px;"><i>Diễn giải:</i></b>
                                <span><?php echo $ChungTu[0]['DienGiai']; ?></span>
                            </div>
                    	</div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <b style="margin-right: 81px;"><i>Kho nhập:</i></b>
                                <span><?php echo $ChungTu[0]['TenKho']; ?></span>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <b style="margin-right: 89.2px;"><i>Nhập từ:</i></b>
                                <span><?php echo $ChungTu[0]['TenNhaCungCap']; ?></span>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <b style="margin-right: 40.2px;"><i>Số HĐ Tài chính:</i></b>
                                <span><?php echo $ChungTu[0]['SohdTaiChinh']; ?></span>
                            </div>
                            <div class="col-sm-4">
                                <b style="margin-right: 48px;"><i>Ký hiệu:</i></b>
                                <span><?php echo $ChungTu[0]['KyHieu']; ?></span>
                            </div>
                            <div class="col-sm-4">
                                <b style="margin-right: 48px;"><i>Ngày HĐ:</i></b>
                                <span><?php echo $ChungTu[0]['Ngayhd']; ?></span>
                            </div>
                        </div>
                    <div class="row clearfix">
                    	<div class="header">
	                    <h2>
	                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url('tang-thiet-bi/chi-tiet/them/'.$ChungTu[0]['MaChungTu']); ?>">Thêm Mới</a>
	                    </h2>
	                </div>
                    	<div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>TT</th>
                                        <th>Ký hiệu</th>
                                        <th>Thiết bị dạy học</th>
                                        <th>Đơn vị </th>
                                        <th>Số lượng </th>
                                        <th>Thành tiền </th>
                                        <th>Đánh mã cá biệt</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ChiTietHoaDon as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <td><?php echo $value['KyHieu'];?></td>
                                            <td><?php echo $value['TenThietBi'];?></td>
                                            <td><?php echo $value['DonViTinh'];?></td>
                                            <td><?php echo $value['SoLuong'];?></td>
                                            <td><?php echo $value['ThanhTien'];?></td>
                                            <td><?php echo $value['MaCaBiet'];?></td>
                                            <td><a href="<?php echo base_url("tang-thiet-bi/chi-tiet/sua/".$value['MaChungTu'].'/'.$value['MaChiTietHoaDon'])?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td><a onclick="return confirm('Bạn có muốn xóa chi tiết hóa đơn này không');" href="<?php echo base_url("tang-thiet-bi/chi-tiet/xoa-chi-tiet/".$value['MaChungTu'])."/".$value["MaChiTietHoaDon"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>   
                                    <?php  } ?>
                                                          
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