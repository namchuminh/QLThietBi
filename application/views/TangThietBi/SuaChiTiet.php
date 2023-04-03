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
                        <h2><a href="<?php echo base_url("tang-thiet-bi/") ?>">Danh sách »</a> <a href="<?php echo base_url('tang-thiet-bi/chi-tiet/'.$MaChungTu); ?>">Chi tiết hóa đơn »</a> Sửa chi tiết</h2>
                    </div>
                    <div class="body">
                        <form action="<?php echo base_url("tang-thiet-bi/chi-tiet/sua-chi-tiet/".$MaChungTu."/".$ChiTietHoaDon[0]["MaChiTietHoaDon"]); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <label>Môn học</label>
                                    <select name="MonHoc" class="form-control show-tick" tabindex="-98">
                                        <option value="0" hidden>Chọn môn</option>
                                        <?php foreach ($MonHoc as $key => $value){ 
                                            if ($ChiTietHoaDon[0]['MaMonHoc'] == $value['MaMonHoc']) { ?>
                                               <option value="<?php echo $value['MaMonHoc']; ?>" selected><?php echo $value['TenMonHoc'];?></option>
                                            <?php } else {?>

                                            <option value="<?php echo $value['MaMonHoc']; ?>"><?php echo $value['TenMonHoc']; ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Khối lớp</label>
                                    <select name="KhoiLop" class="form-control show-tick" tabindex="-98">
                                        <?php 
                                            $array = array('Lớp 6','Lớp 7', 'Lớp 8', 'Lớp 9', 'Lớp 10', 'Lớp 11', 'Lớp 12');
                                            foreach ($array as $value) {
                                                if ($value==$ChiTietHoaDon[0]['KhoiLop']) { ?>
                                                    <option value="<?php echo $value; ?>" selected>
                                                        <?php echo $value; ?></option>
                                                <?php }else{ ?>
                                                        
                                                    <option value="<?php echo $value; ?>">
                                                        <?php echo $value; ?></option>
                                        <?php }} ?>
                                            
                                        
                                        
                                        
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Thiết bị</label>
                                    <select name="MaThietBi" class="form-control show-tick" tabindex="-98">
                                        <option  value="0" hidden>Chọn thiết bị</option>
                                        <?php foreach ($ThietBi as $key => $value){ 
                                            if ($value['MaThietBi']==$ChiTietHoaDon[0]['MaThietBi']) {?>
                                                <option value="<?php echo $value['MaThietBi']; ?>" selected><?php echo $value['TenThietBi']; ?></option>
                                          <?php  }else {?>
                                                <option value="<?php echo $value['MaThietBi']; ?>"><?php echo $value['TenThietBi']; ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Số lượng</label>
                                            <input name="SoLuong" id="SoLuong"  value="<?php echo $ChiTietHoaDon[0]['SoLuong']; ?>" type="text" class="form-control" placeholder="Nhập số lượng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Đơn giá</label>
                                            <input type="text" value="<?php echo $ChiTietHoaDon[0]['DonGia']; ?>" name="DonGia" id="DonGia" class="form-control" placeholder="Nhập đơn giá">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <label>Quản lý thiết bị</label>
                                    <select name="MaQuanLyThietBi" class="form-control show-tick" tabindex="-98">
                                        <option  value="0" hidden>Chọn quản lý thiết bị</option>
                                        <?php foreach ($QuanLyThietBi as $key => $value){ 
                                            if ($value["MaCaBiet"]==$ChiTietHoaDon[0]["MaCaBiet"]) { ?>
                                                <option value="<?php echo $value['MaCaBiet']; ?>" selected><?php echo $value['TenQuanLyThietBi']; ?></option>
                                          <?php  } else{ ?>
                                            <option value="<?php echo $value['MaCaBiet']; ?>"><?php echo $value['TenQuanLyThietBi']; ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Đơn vị tính</label>
                                    <select name="DonViTinh" class="form-control show-tick" tabindex="-98">
                                        <option value="0" hidden>Chọn đơn vị tính</option>
                                        <?php 
                                            $dvt = array('Tờ', 'Hộp', 'Cái','Bộ', 'Chiếc', 'Chai', 'Ống', 'mg', 'Kg', 'Lít', 'gram', 'ml', 'Tạ', 'yến'); 
                                            foreach ($dvt as $value) { 
                                                if ($value==$ChiTietHoaDon[0]["DonViTinh"]) { ?>
                                                    <option value="<?php echo $value ?>" selected><?php echo $value ?></option>
                                                <?php } else { ?>
                                               
                                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                        <?php }} ?>

                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>VAT(%)</label>
                                            <input name="Vat" value="<?php echo $ChiTietHoaDon[0]["Vat"]; ?> " id="Vat" type="text" class="form-control" placeholder="Nhập VAT(%)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Thành tiền</label>
                                            <input type="text" id="ThanhTien" name="ThanhTien" value="<?php echo $ChiTietHoaDon[0]["ThanhTien"]; ?>" class="form-control" placeholder="Nhập thành tiền">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Thời gian khấu hao cho thiết bị (nếu có), đơn vị tính là Tháng</label>
                                            <input name="ThoiGianKhauHao" value="<?php echo $ChiTietHoaDon[0]["ThoiGianKhauHao"]; ?>" type="text" class="form-control" placeholder="Nhập thời gian khấu hao">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php if(isset($error)){ ?>
                                <p style="color: red;"><?php echo $error; ?></p>
                            <?php } ?>
                            <?php if(isset($ThanhCong)){ ?>
                                <p style="color: green;"><?php echo $ThanhCong; ?></p>
                            <?php } ?>
                            <button class="btn btn-primary waves-effect" type="submit">Sửa Chi Tiết</button>
                            <button class="btn btn-success waves-effect" type="reset">Làm Mới</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    if(isset($alert)){
        echo "<script type='text/javascript'>alert('$alert');</script>"; 
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#ThanhTien").click(function(){
        var SoLuong = $('#SoLuong').val();
        var DonGia = $('#DonGia').val();
        var Vat = $('#Vat').val();
        var ThanhTien = (SoLuong*DonGia)-(SoLuong*DonGia*Vat)/100;
        $('#ThanhTien').val(ThanhTien);
  });
});
</script>

<?php require(__DIR__.'/layouts/Footer.php'); ?>