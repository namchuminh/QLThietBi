<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>THEO DÕI, ĐIỂU CHUYỂN THIẾT BỊ</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("theo-doi-dieu-chuyen/sua-dieu-chuyen/sua/".$DieuChuyen[0]["MaDieuChuyen"]); ?>" method="POST">
                    <div class="header">
                        <h4 class="modal-title" id="largeModalLabel">Chỉnh sửa điều chuyển</h4>
                    </div>
                    <div class="body">
                        <div  >           
                
                <div >
                    <div >
                        
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên thiết bị cần điều chuyển</label>
                                                <input readonly type="text" id="TenThietBi" value="<?php echo $DieuChuyen[0]["TenThietBi"];?>" class="form-control" placeholder="Tên thiết bị" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Số lượng cần điều chuyển</label>
                                                <input type="text" name="SoLuongDieuChuyen" class="form-control" value="<?php echo $DieuChuyen[0]["SoLuongDieuChuyen"];?>" placeholder="Số lượng chuyển" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                                <div class="row">
                                    <div class="col-sm-6">
                                        <b>Ngày bàn giao</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input value="<?php  
                                                    $date=substr($DieuChuyen[0]["NgayBanGiao"], 0, 10);
                                                    echo $date;
                                                ?>"  
                                                name="NgayBanGiao" type="date" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Số biên bản</label>
                                                <input value="<?php echo $DieuChuyen[0]["SoBienBan"];?>" name="SoBienBan" type="text" class="form-control" placeholder="Số biên bản" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người bàn giao</label>
                                                <input value="<?php echo $DieuChuyen[0]["NguoiBanGiao"];?>" name="NguoiBanGiao" type="text" class="form-control" placeholder="Người bàn giao" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người tiếp nhận</label>
                                                <input value="<?php echo $DieuChuyen[0]["NguoiTiepNhan"];?>" name="NguoiTiepNhan" type="text" class="form-control" placeholder="Người tiếp nhận" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Từ kho</label>
                                        <select name="MaKhoChuyenToi" disabled class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn kho</option>
                                            <?php foreach ($Kho as $value) { 

                                                if($KhoCu[0]["MaKho"] == $value["MaKho"]){?>
                                                    <option value="<?php echo $value["MaKho"];?>" selected><?php echo $value["TenKho"] ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $value["MaKho"];?>"><?php echo $value["TenKho"] ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Chuyển tới kho</label>
                                        <select name="MaKhoChuyenToi" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn kho</option>
                                            <?php foreach ($Kho as $value) { 

                                                if($DieuChuyen[0]["MaKho"] == $value["MaKho"]){?>
                                                    <option value="<?php echo $value["MaKho"];?>" selected><?php echo $value["TenKho"] ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $value["MaKho"];?>"><?php echo $value["TenKho"] ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tình Trạng Thiết Bị</label>
                                                <textarea   name="TinhTrang" rows="3" class="form-control no-resize" placeholder="Nhập tình trạng thiết bị"><?php echo $DieuChuyen[0]["TinhTrang"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Ghi chú</label>
                                                <textarea name="GhiChu" rows="2" class="form-control no-resize" placeholder="Nhập ghi chú"><?php echo $DieuChuyen[0]["GhiChu"]; ?></textarea>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <div>
                                            <?php if(isset($error)){ ?>
                                                <p style="color: red;"><?php echo $error; ?></p>
                                            <?php } ?>
                                            <?php if(isset($alert)){ ?>
                                                <p style="color: green;"><?php echo $alert; ?></p>
                                            <?php } ?>
                                            </div>
                                                <button type="submit" class="btn btn-primary waves-effect m-r-20">Chỉnh sửa</button>
                                                <!-- <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button> -->
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
                    
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#MonHoc").on('change', function (){
        var MonHoc = $('#MonHoc').val();
        var op = '<option value="0">Chọn thiết bị</option>';
        $.post("<?php echo base_url("/theo-doi-dieu-chuyen/kho/")?>"+MonHoc, function(data){
            $("#MaKho").html(data);
            $("#MaKho").html($("#MaKho").html());
            $("#MaThietBi").html(op);
        });

  });

});
$(document).ready(function(){
  $("#MaKho").on('change', function (){
        var MonHoc = $('#MonHoc').val();
        var MaKho = $('#MaKho').val();
        $.post("<?php echo base_url("theo-doi-dieu-chuyen/thiet-bi/")?>"+MonHoc+"/"+MaKho, function(data){
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
  });
});
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>