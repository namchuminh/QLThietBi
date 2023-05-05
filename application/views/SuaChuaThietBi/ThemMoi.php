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
                    <form action="<?php echo base_url("sua-chua-thiet-bi/them-sua"); ?>" method="POST">
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
                                <?php foreach ($Kho as $key => $value) { ?>
                                        <option value="<?php echo $value["MaKho"]; ?>"><?php echo $value["TenKho"]; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Tên thiết bị</label>
                            <select id="MaThietBi" name="MaThietBi" class="form-control show-tick" tabindex="-98">

                                <option value="0" hidden>Chọn thiết bị</option>
                                
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
                                    <input name="NgayGhiNhan" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người phát hiện</label>
                                        <input type="text" name="NguoiPhatHien" class="form-control" placeholder="Nhập người phát hiện">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người gây sự cố</label>
                                        <input type="text" name="NguoiGaySuCo" class="form-control" placeholder="Nhập người gây sự cố">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Hiện tượng hỏng</label>
                                        <input type="text" name="HienTuongHong" class="form-control" placeholder="Nhập hiện tượng hỏng">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người Giải quyết</label>
                                        <input type="text" name="NguoiGiaiQuyet" class="form-control" placeholder="Nhập tên người giải quyết">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng hỏng</label>
                                        <input type="text" name="SoLuongHong" id="SoLuongHong" class="form-control" placeholder="Nhập số lượng hỏng">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Biện pháp</label>
                                        <input type="text" name="BienPhap" class="form-control" placeholder="Nhập biện pháp">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người thực hiện</label>
                                        <input type="text" name="NguoiThucHien" class="form-control" placeholder="Nhập người thực hiện">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Bộ phận linh kiện được sửa</label>
                                        <input type="text" name="BoPhanDuocSua" class="form-control" placeholder="Nhập bộ phận được sửa">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nguồn kinh phí</label>
                                        <input type="text" name="NguonKinhPhi" class="form-control" placeholder="Nhập nguồn kinh phí">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Kinh phí sửa chữa</label>
                                        <input type="text" id="KhinhPhiSuaChua" name="KinhPhiSuaChua" class="form-control" placeholder="Nhập kinh phí sửa chữa">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Kinh phí sau sửa chữa</label>
                                        <input type="text" id="KinhPhiSauSuaChua" name="KinhPhiSauSuaChua" class="form-control" placeholder="Nhập kinh phí sau sửa chữa">
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Xác Nhận</button>
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
        let SoLuong = $('#SoLuongHong').val();
        let KinhPhiSuaChua = $('#KhinhPhiSuaChua').val();
        let DonGia = $('#GiaThietBi').val();
        let ThanhTien = (SoLuong*DonGia)+parseInt(KinhPhiSuaChua);
        $('#KinhPhiSauSuaChua').val(ThanhTien);
  });
});
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>