<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>

    
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>XEM NHẬT KÝ MƯỢN TRẢ THIẾT BỊ</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url('muon-tra/nhat-ky/liet-ke') ?>" method="POST">
                    <div class="header">
                        <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <b>Từ ngày</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="TuNgay" type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <b>Tới ngày</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input name="ToiNgay" type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Giáo Viên</label>
                                        <input type="text" name="TenGiaoVien" class="form-control" placeholder="Nhập Tên Giáo Viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
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
                    </form>
                    
                    </div>
                    <div class="row clearfix">
                    	<div class="header">

	                    <h2>
	                        Danh sách đã trả
	                    </h2>
	                </div>
                    	<div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Mã</th>
                                        <th>Tên giáo viên</th>
                                        <th>Tên Thiết bị dạy học</th>
                                        <th>Mã cá biệt</th>
                                        <th>Ngày mượn</th>
                                        <th>Ngày hẹn trả</th>
                                        <th>Ngày trả</th>
                                        <th>Tình trạng trả</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($NhatKy as $key => $value) { ?> 
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value["NguoiMuon"]; ?></td>
                                            <td><?php echo $value["TenThietBi"]; ?></td>
                                            <td><?php echo $value["MaCaBiet"]; ?></td>
                                            <td><?php echo $value["NgayMuon"]; ?></td>
                                            <td><?php echo $value["NgayTra"]; ?></td>
                                            <td><?php echo $value["NgayTraThietBi"]; ?></td>
                                            <td><?php echo $value["TinhTrangKhiTra"]; ?></td>

                                        </tr>
                                   <?php } ?>
                                    
                                                              
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="row clearfix">
                            <div class="header">

                                <h2>
                                    Danh sách chưa trả
                                </h2>
                            </div>

                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Mã</th>
                                        <th>Tên giáo viên</th>
                                        <th>Tên Thiết bị dạy học</th>
                                        <th>Mã cá biệt</th>
                                        <th>Ngày mượn</th>
                                        <th>Ngày hẹn trả</th>
                                        <th>Ngày trả</th>
                                        <th>Tình trạng</th>
                                        <th>Trả ngay</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($NhatKy2 as $key => $value) { ?> 
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value["NguoiMuon"]; ?></td>
                                            <td><?php echo $value["TenThietBi"]; ?></td>
                                            <td><?php echo $value["MaCaBiet"]; ?></td>
                                            <td><?php echo $value["NgayMuon"]; ?></td>
                                            <td><?php echo $value["NgayTra"];; ?></td>
                                            <td><?php echo "Chưa trả"; ?></td>
                                            <td><?php echo "Chưa trả"; ?></td>
                                            <td><a href="<?php echo base_url('muon-tra/tra/').$value["MaMuonThietBi"]; ?>"><i class="fa-sharp fa-solid fa-backward"></i></a> </td>
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