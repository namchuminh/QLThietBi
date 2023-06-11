<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>

    
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GIÁO VIÊN MƯỢN THIẾT BỊ</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url('muon-tra/liet-ke') ?>" method="POST">
                    <div class="header">
                        <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url('muon-tra/muon-thiet-bi'); ?>">Mượn Thiết Bị</a>
                    </div>
                    <div class="body">
                        <div class="row clearfix" >
                            <div class="col-sm-4">
                                <b>Ngày làm việc</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="NgayLamViec" type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Giáo Viên</label>
                                        <input type="text" name="TenGiaoVien" class="form-control" placeholder="Nhập Tên Giáo Viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Môn học</label>
                                <select name="MonHoc" class="form-control show-tick">
                                    <option value="0" hidden>Chọn môn học</option>
                                    <?php foreach ($MonHoc as $key => $value) { ?>
                                        <option value="<?php echo $value["MaMonHoc"] ?>"><?php echo $value["TenMonHoc"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
	                  	</div>
	                  	
                        <?php if(isset($error)){ ?>
                            <p style="color: red;"><?php echo $error ?></p>
                        <?php } ?>
                        <?php if(isset($alert)){ ?>
                            <p style="color: green;"><?php echo $alert ?></p>
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
                                        <th>Ngày mượn</th>
                                        <th>Số phiếu</th>
                                        <th>Thiết bị dạy học</th>
                                        <th>Ký hiệu cá biệt</th>
                                        <th>Ngày hẹn trả</th>
                                        <th>Số lượng</th>
                                        <th>Thêm chi tiết</th>
                                        <th>Kiết xuất phiếu mượn</th>
                                        <th>Hủy mượn</th>
                                        <th>Gia hạn mượn</th>
                                        <th>Trả</th>
                                        <th>Báo mất</th>
                                        <th>Báo hỏng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($MuonThietBi as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value["NgayMuon"]; ?></td>
                                            <td><?php echo $value["SoPhieu"]; ?></td>
                                            <td><?php echo $value["TenThietBi"]; ?></td>
                                            <td><?php echo $value["MaCaBiet"]; ?></td>
                                            
                                            <td><?php echo $value["NgayTra"]; ?></td>
                                            <td><?php echo $value["SoLuongMuon"]; ?></td>
                                            <td><a href="<?php echo base_url('muon-tra/them-chi-tiet/').$value["MaMuonThietBi"]; ?>"><i class="fa-solid fa-pen"></i></a></td>
                                            <td><a href="<?php echo base_url('muon-tra/xuat-excel/').$value["MaMuonThietBi"]; ?>"> <i class="fa-solid fa-floppy-disk"></i></a></td>
                                            <td><a href="<?php echo base_url('muon-tra/muon-thiet-bi/xoa/').$value["MaMuonThietBi"]; ?>"><i class="fa-solid fa-trash"></i></a> </td>
                                            <td><a href="<?php echo base_url('muon-tra/muon-thiet-bi/sua/').$value["MaMuonThietBi"]; ?>"><i class="fa-solid fa-bars"></i></a> </td>
                                            <td><a href="<?php echo base_url('muon-tra/tra/').$value["MaMuonThietBi"]; ?>"><i class="fa-sharp fa-solid fa-backward"></i></a> </td>
                                            <td><a href="<?php echo base_url('ghi-nhan-thiet-bi-mat'); ?>"><i class="fa-sharp fa-solid fa-notdef"></i></a> </td>
                                            <td><a href="<?php echo base_url('ghi-nhan-thiet-bi-hong'); ?>"><i class="fa-solid fa-wrench"></i></a> </td>
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