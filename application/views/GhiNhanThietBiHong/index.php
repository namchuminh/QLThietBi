<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>

    
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GHI NHẬN THIẾT BỊ HỎNG</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("ghi-nhan-thiet-bi-hong/liet-ke") ?>" method="POST">
                    <div class="header">
                        <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url("ghi-nhan-thiet-bi-hong/them"); ?>">Báo Hỏng</a>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url("ghi-nhan-thiet-bi-hong/xuat-excel"); ?>">Kiết xuất excel</a>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
                                <label>Tên Thiết Bị</label>
                                <input type="text" name="TenThietBi" class="form-control" placeholder="Nhập tên thiết bị">
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Mã Cá Biệt</label>
                                        <input type="text" name="MaCaBiet" class="form-control" placeholder="Nhập Mã Cá Biệt">
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                                        <th>Ngày phát hiện</th>
                                        <th>Số biên bản</th>
                                        <th>Tên thiết bị</th>
                                        <th>Ký hiệu</th>
                                        <th>Mã cá biệt</th>
                                        <th>Số lượng hỏng</th>
                                        <th>Người phát hiện</th>
                                        <th>Nguyên nhân hỏng</th>
                                        <th>Khôi phục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($BaoHong as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value["NgayPhatHien"]; ?></td>
                                        <td><?php echo $value["SoBienBan"]; ?></td>
                                        <td><?php echo $value["TenThietBi"]; ?></td>
                                        <td><?php echo $value["KyHieu"]; ?></td>
                                        <td><?php echo $value["MaCaBiet"]; ?></td>
                                        <td><?php echo $value["SoLuongHong"]; ?></td>
                                        <td><?php echo $value["NguoiPhatHien"]; ?></td>
                                        <td><?php echo $value["LyDoHong"]; ?></td>
                                        <td><a onclick="return confirm('Bạn có muốn khôi phục thiết bị này');" href="<?php echo base_url("ghi-nhan-thiet-bi-hong/khoi-phuc/".$value["MaGhiNhanHong"]); ?>"><i class="fa-solid fa-rotate-right"></i></a></td>
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