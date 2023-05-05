<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SỬA MƯỢN PHÒNG CHỨC NĂNG</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("muon-phong-hoc/sua-thong-tin/").$MuonPhongHoc[0]["MaMuonPhongHoc"]; ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header" style="padding: 0; padding-bottom: 20px; padding-left: 15px;">
                            <a class="btn btn-primary waves-effect" type="button" href="<?php echo base_url('muon-phong-hoc'); ?>">Quay Lại</a>
                        <?php if(isset($error)){ ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                        <?php } ?>
                        <?php if(isset($alert)){ ?>
                            <p style="color: green;"><?php echo $alert; ?></p>
                        <?php } ?>
                    </div>
                        
                    </div>
                        <p style="color: red;" id="error"></p>
                        <!-- <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#largeModal" id="btn_dieuchuyen" style="margin-top: -20px; float: right;">Thêm chi tiết</button> -->
                        <br>

                    
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <b>Chọn ngày mượn</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input value="<?php echo $MuonPhongHoc[0]["NgayMuon"] ?>" name="NgayMuon" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <label>Phòng học</label>
                            <select id="PhongHoc" name="MaPhongHoc" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden>Chọn phòng học</option>
                                <?php foreach ($PhongHoc as $key => $value) {   
                                    if ($MuonPhongHoc[0]["MaPhongHoc"]==$value["MaPhongHoc"]) {?>
                                        <option value="<?php echo $value["MaPhongHoc"]; ?>" selected><?php echo $value["TenPhongHoc"]; ?></option>
                                    <?php   }else{
                                    ?>
                                        <option value="<?php echo $value["MaPhongHoc"]; ?>"><?php echo $value["TenPhongHoc"]; ?></option>
                                <?php  } } ?>
                            </select>
                        </div>
                    
                        
                                    <div class="col-sm-6">
                                        <label>Buổi học</label>
                                        <select name="BuoiHoc" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn buổi học</option>
                                            
                                            <?php if ($MuonPhongHoc[0]["BuoiHoc"]=="BuoiSang") { ?>
                                                     <option value="BuoiSang" selected>Buổi Sáng</option>
                                                     <option value="BuoiChieu" >Buổi Chiều</option>
                                           <?php }else{ ?>
                                           
                                            <option value="BuoiChieu" selected>Buổi Chiều</option>
                                            <option value="BuoiSang">Buổi Sáng</option>

                                        <?php } ?>
                                            
                                       
                                           
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Tiết học</label>
                                        <select name="TietHoc" class="form-control show-tick" tabindex="-98">
                                            <option  value="0" hidden>Chọn tiết học</option>
                                            <?php for ($i=0; $i <5 ; $i++) { 
                                                if ($MuonPhongHoc[0]["TietHoc"]==($i+1)){?>
                                                    <option value="<?php echo $i+1; ?>" selected>Tiết <?php echo $i+1; ?></option>
                                                
                                            <?php    }else{
                                            ?>

                                                <option value="<?php echo $i+1; ?>" selected>Tiết <?php echo $i+1; ?></option>
                                            <?php }}  ?>
                                           
                                                                                       
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Lớp học</label>
                                        <select id="LopHoc" name="MaLop" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn lớp học</option>
                                            <?php foreach ($LopHoc as $key => $value) { 

                                                if ($MuonPhongHoc[0]["MaLop"]==$value["MaLop"]) {?>
                                                    <option value="<?php echo $value["MaLop"]; ?>" selected><?php echo $value["TenLop"]; ?></option>
                                            <?php   }else{
                                            ?>
                                                    <option value="<?php echo $value["MaLop"]; ?>"><?php echo $value["TenLop"]; ?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Môn học</label>
                                        <select id="MonHoc" name="MaMon" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn môn học</option>
                                            <?php foreach ($MonHoc as $key => $value) { 
                                              if ($MuonPhongHoc[0]["MaMon"]==$value["MaMonHoc"]) {?>
                                                <option value="<?php echo $value["MaMonHoc"]; ?>" selected><?php echo $value["TenMonHoc"]; ?></option>
                                            <?php   }else{
                                            ?>

                                                    <option value="<?php echo $value["MaMonHoc"]; ?>"><?php echo $value["TenMonHoc"]; ?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên giáo viên</label>
                                                <input value="<?php echo $MuonPhongHoc[0]["NguoiMuon"] ?>" type="text" name="NguoiMuon" rows="3" class="form-control no-resize" placeholder="Nhập Tên Giáo viên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên bài học</label>
                                                <textarea name="TenBaiHoc" id="TenBaiHoc" rows="3" class="form-control no-resize" placeholder="Nhập Tên bài học"><?php echo $MuonPhongHoc[0]["TenBaiHoc"] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                     </div>
                                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Cập nhật thông tin</button>
                                    </div>
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
  });
});
$(document).ready(function(){
  $(".btn_clik").on('click', function (){
        var currentRow=$(this).closest("tr"); 
       
        var col1=currentRow.find(".Tiet").val(); // get current row 1st table cell TD value
        
        
  });
  

});
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>