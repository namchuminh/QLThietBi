<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Lịch mượn phòng chức năng</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("muon-phong-hoc/liet-ke"); ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header">
                            <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                            <a class="btn btn-primary waves-effect" type="button" href="<?php echo base_url('muon-phong-hoc/muon'); ?>">Mượn Phòng Học</a>
                        </div>
                        
                        <div class="col-sm-4">
                            <b>Từ Ngày</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="NgayBatDauMuon" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <b>Tới Ngày </b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="NgayKetThucMuon" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Buổi học</label>
                            <select name="BuoiHoc" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden>Chọn buổi học</option>
                                <option value="BuoiSang">Buổi Sáng</option>
                                <option value="BuoiChieu">Buổi Chiều</option>
                               
                            </select>
                        </div>
                        </div>
                        <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>

                        
                    </div>
                    
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Phòng mượn</th>
                                        <th>Buổi học</th>
                                        <th>Tiết học</th>
                                        <th>Lớp học</th>
                                        <th>Môn học</th>
                                        <th>Tên bài học</th>
                                        <th>Ngày bắt đầu mượn</th>
                                        <th>Ngày bắt kết thúc mượn</th>
                                        <th>Hủy mượn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($MuonPhongHoc as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['TenPhongHoc']; ?></td>
                                            <td><?php echo $value['BuoiHoc']; ?></td>
                                            <td><?php echo $value['TietHoc']; ?></td>
                                            <td><?php echo $value['TenLop']; ?></td>
                                            <td><?php echo $value['TenMonHoc']; ?></td>
                                            <td><?php echo $value['TenBaiHoc']; ?></td>
                                            <td><?php echo $value['NgayBatDauMuon']; ?></td>
                                            
                                            <td><?php echo $value["NgayKetThucMuon"]; ?></td>
                                            <td><a href="<?php echo base_url('muon-phong-hoc/xoa/').$value["MaMuonPhongHoc"]; ?>"><i class="fa-solid fa-trash"></i></a> </td>
                                            
                                        </tr>
                                    <?php } ?>
                                        
                                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <p style="color: red;" id="error"></p>
                        
                        <br>

                    
                    

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