<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>THANH LÝ THIẾT BỊ DẠY HỌC</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("thanh-ly-thiet-bi/them-thanh-ly"); ?>" method="POST">
                    <div class="body">
                    

                    <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
                    <div class="col-sm-3" hidden="">
                            <label>Gia thiết bị</label>
                            <select id="GiaThietBi" class="form-control show-tick" tabindex="-98">

                                
                            </select>
                        </div>
                    <div class="row clearfix">
                    	<div class="col-sm-6">
                            <label>Tên Kho</label>
                            <select id="MaKho" name="MaKho" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden>Chọn Kho</option>
                                <?php foreach ($Kho as $key => $value) { ?>
                                        <option value="<?php echo $value["MaKho"]; ?>"><?php echo $value["TenKho"]; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Tên thiết bị</label>
                            <select id="MaThietBi" name="MaThietBi" class="form-control show-tick" tabindex="-98">

                                <option value="0" hidden>Chọn thiết bị</option>
                                
                            </select>
                        </div>
                        
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người phát hiện</label>
                                        <input type="text" name="NguoiPhatHien" class="form-control" placeholder="Nhập người phát hiện">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số biên bản</label>
                                        <input type="text" name="SoBienBan" class="form-control" placeholder="Nhập số biên bản">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng</label>
                                        <input id="SoLuong" type="text" name="SoLuong" class="form-control" placeholder="Nhập số lượng thanh lý">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Đơn giá</label>
                                        <input id="DonGia" type="text" name="DonGia" class="form-control" placeholder="Nhập đơn giá">
                                    </div>
                                </div>
                            </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Lý do thanh lý</label>
                                         <textarea  name="LyDoThanhLy" rows="3" class="form-control no-resize" placeholder="Nhập Lý do thanh lý"></textarea>
                                    </div>
                                </div>
                            </div>
                        
                        
                    </div>
                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Xác Nhận</button>
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
  $("#DonGia").click(function(){
        let SoLuong = $('#SoLuong').val();
        let DonGia = $('#GiaThietBi').val();
        let ThanhTien = (SoLuong*DonGia);
        $('#DonGia').val(ThanhTien);
  });
});


</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>