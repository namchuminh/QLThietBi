<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SỬA CHỮA THIẾT BỊ DẠY HỌC</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("sua-chua-thiet-bi/sua-chua/").$SuaThietBi[0]["MaSuaThietBi"]; ?>" method="POST">
                    <div class="body">
                    

                    <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
                    <div class="row clearfix">
                    	<div class="col-sm-3">
                            <label>Tên Kho</label>
                            <select id="MaKho" name="MaKho" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden>Chọn Kho</option>
                                <?php foreach ($Kho as $key => $value) { 
                                    if ($value["MaKho"]==$SuaThietBi[0]["MaKho"]) {                                    
                                ?>
                                        <option value="<?php echo $value["MaKho"]; ?>" selected><?php echo $value["TenKho"]; ?></option>
                                <?php }else{ ?>
                                        <option value="<?php echo $value["MaKho"]; ?>"><?php echo $value["TenKho"]; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Tên thiết bị</label>
                            <select id="MaThietBi" name="MaThietBi" class="form-control show-tick" tabindex="-98">

                                <option value="<?php echo $SuaThietBi[0]["MaThietBi"] ?>"><?php echo $SuaThietBi[0]["TenThietBi"] ?></option>
                                
                            </select>
                        </div>
                        <div class="col-sm-3" hidden="">
                            <label>Gia thiết bị</label>
                            <select id="GiaThietBi" name="GiaThietBi" class="form-control show-tick" tabindex="-98">

                                
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <b>Ngày ghi nhận</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="NgayGhiNhan" type="date" class="form-control date" value="<?php echo $SuaThietBi[0]["NgayGhiNhan"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người phát hiện</label>
                                        <input type="text" name="NguoiPhatHien" class="form-control" placeholder="Nhập người phát hiện" value="<?php echo $SuaThietBi[0]["NguoiPhatHien"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người gây sự cố</label>
                                        <input type="text" name="NguoiGaySuCo" class="form-control" placeholder="Nhập người gây sự cố" value="<?php echo $SuaThietBi[0]["NguoiGaySuCo"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Hiện tượng hỏng</label>
                                        <input type="text" name="HienTuongHong" class="form-control" placeholder="Nhập hiện tượng hỏng" value="<?php echo $SuaThietBi[0]["HienTuongHong"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người Giải quyết</label>
                                        <input type="text" name="NguoiGiaiQuyet" class="form-control" placeholder="Nhập tên người giải quyết" value="<?php echo $SuaThietBi[0]["NguoiGiaiQuyet"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng hỏng</label>
                                        <input type="text" name="SoLuongHong" id="SoLuongHong" class="form-control" placeholder="Nhập số lượng hỏng" value="<?php echo $SuaThietBi[0]["SoLuongHong"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Biện pháp</label>
                                        <input type="text" name="BienPhap" class="form-control" placeholder="Nhập biện pháp" value="<?php echo $SuaThietBi[0]["BienPhap"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người thực hiện</label>
                                        <input type="text" name="NguoiThucHien" class="form-control" placeholder="Nhập người thực hiện" value="<?php echo $SuaThietBi[0]["NguoiThucHien"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Bộ phận linh kiện được sửa</label>
                                        <input type="text" name="BoPhanDuocSua" class="form-control" placeholder="Nhập bộ phận được sửa" value="<?php echo $SuaThietBi[0]["BoPhanSuaChua"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nguồn kinh phí</label>
                                        <input type="text" name="NguonKinhPhi" class="form-control" placeholder="Nhập nguồn kinh phí" value="<?php echo $SuaThietBi[0]["NguonKinhPhi"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Kinh phí sửa chữa</label>
                                        <input type="text" id="KhinhPhiSuaChua" name="KinhPhiSuaChua" class="form-control" placeholder="Nhập kinh phí sửa chữa" value="<?php echo $SuaThietBi[0]["KinhPhiSuaChua"]; ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Giá trị sau sửa chữa</label>
                                        <input type="text" id="KinhPhiSauSuaChua" name="KinhPhiSauSuaChua" class="form-control" placeholder="Nhập Giá trị sau sửa chữa" value="<?php echo $SuaThietBi[0]["KinhPhiSauSua"]; ?>">
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Cập nhật</button>
                        <a class="btn btn-primary waves-effect" type="button" href="<?php echo base_url('sua-chua-thiet-bi'); ?>">Quay Lại</a>
	                </div>

                </div>
            </div>
        </div>

    </div>
            </form>
             
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#MaKho").on('change', function (){
        var MonHoc = $('#MonHoc').val();
        var MaKho = $('#MaKho').val();
        $.post("<?php echo base_url("muon-tra/muon-thiet-bi/thiet-bi/")?>"+MaKho, function(data){
            $("#MaThietBi").html(data);
            $("#MaThietBi").html($("#MaThietBi").html());
        });

  });
});
$(document).ready(function(){
      $("#MonHoc").on('change', function (){
            var ThietBi = $("#MaThietBi option:selected" ).text();
            $("#TenThietBi").val(ThietBi); 
      });
        
});
$(document).ready(function(){
  $("#MaThietBi").on('change', function (){
        var ThietBi = $("#MaThietBi option:selected" ).text();
        $("#TenThietBi").val(ThietBi);
        var MaKho = $('#MaKho').val();
        var MaThietBi = $('#MaThietBi').val();
        //alert(MaThietBi);
        $.post("<?php echo base_url("sua-chua-thiet-bi/gia-thiet-bi/")?>"+MaThietBi+"/"+MaKho, function(data){
            $("#GiaThietBi").html(data);
            $("#GiaThietBi").html($("#GiaThietBi").html());
        });
  });
});
$(document).ready(function(){
  $("#KinhPhiSauSuaChua").click(function(){
        var ThietBi = $("#MaThietBi option:selected").text();
        var MaKho = $('#MaKho').val();
        var MaThietBi = $('#MaThietBi').val();
        //alert(MaThietBi);
        $.post("<?php echo base_url("sua-chua-thiet-bi/gia-thiet-bi/")?>"+MaThietBi+"/"+MaKho, function(data){
            $("#GiaThietBi").html(data);
            $("#GiaThietBi").html($("#GiaThietBi").html());
            let DonGia = $('#GiaThietBi').val();
            let ThanhTien = (DonGia)-(DonGia)*10/100;
            $('#KinhPhiSauSuaChua').val(ThanhTien);
        });
        
        
        
  });
});

</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>