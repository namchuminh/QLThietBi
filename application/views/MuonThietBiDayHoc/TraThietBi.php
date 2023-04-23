<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TRẢ THIẾT BỊ</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("muon-tra/tra-thiet-bi/").$MaMuonThietBi; ?>" method="POST">
                    <div class="body">
                        

                    <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
                    <div class="row clearfix">
                    	
                        <div class="col-sm-3">
                            <b>Ngày trả</b>
                            <!-- <?php var_dump( $Thoigian); ?> -->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">

                                    <input name="NgayTra" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <b>Số lượng trả</b>
                            <div class="input-group">
                               
                                <div class="form-line">
                                    <input name="SoLuongTra" type="text" class="form-control" placeholder="Nhập số lượng trả">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <b>Tình trạng khi trả</b>
                            <div class="input-group">
                               
                                <div class="form-line">
                                    <input name="TinhTrangTra" type="text" class="form-control" placeholder="Nhập tình trạng khi trả">
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Trả thiết bị</button>
	                </div>

                </div>
            </div>
        </div>

    </div>
   
    <!-- <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Thêm chi tiết</h4>
                        </div>
                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Lớp học</label>
                                        <select id="LopHoc" name="LopHoc" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn lớp học</option>
                                            <?php foreach ($LopHoc as $key => $value) { ?>
                                                    <option value="<?php echo $value["MaLop"]; ?>"><?php echo $value["TenLop"]; ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Môn học</label>
                                        <select id="MonHoc" name="MonHoc" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn môn học</option>
                                            <?php foreach ($MonHoc as $key => $value) { ?>
                                                    <option value="<?php echo $value["MaMonHoc"]; ?>"><?php echo $value["TenMonHoc"]; ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên bài học</label>
                                                <textarea name="TenBaiHoc" id="TenBaiHoc" rows="3" class="form-control no-resize" placeholder="Nhập Tên bài học"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Tiết học</label>
                                        <select name="TietHoc" id="TietHoc"  class="form-control show-tick" tabindex="-98">
                                            <option  value="0" hidden>Chọn tiết học</option>
                                            <option value="Tiet1">Tiết 1</option>
                                            <option value="Tiet2">Tiết 2</option>
                                            <option value="Tiet3">Tiết 3</option>
                                            <option value="Tiet4">Tiết 4</option>
                                            <option value="Tiet5">Tiết 5</option>
                                            <option value="Tiet6">Tiết 6</option>
                                            <option value="Tiet7">Tiết 7</option>
                                            <option value="Tiet8">Tiết 8</option>
                                            <option value="Tiet9">Tiết 9</option>
                                            <option value="Tiet10">Tiết 10</option>
                                            
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <br>
                            <div  class="modal-footer">
                                <button type="button" id="themchitiet" class="btn btn-link waves-effect" data-dismiss="modal">Xác Nhận</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div> -->
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
  $("#themchitiet").on('click', function (){
        var MaLop = $("#LopHoc option:selected").val();
        var TenLop = $("#LopHoc option:selected").text();
        var MaMon = $("#MonHoc option:selected").val();
        var TenMon = $("#MonHoc option:selected").text();
        var TienBaiHoc = $("#TenBaiHoc").val();
        var TietHoc = $("#TietHoc option:selected").text();
        if(MaLop==0){
            $("#error").text("Vui lòng chọn lớp");
        }else if(MaMon==0){
            $("#error").text("Vui lòng chọn môn học");
        }else if(TienBaiHoc==""){
            $("#error").text("Vui lòng nhập tên bài học");
        }else if(TietHoc=="Chọn tiết học"){
            $("#error").text("Vui lòng chọn Tiet Hoc");
        }else{
            $("#error").text("");
            $(".table tbody tr").last().after(
                '<tr class="fadetext">'+
                    '<td>'+MaLop+'</td>'+
                    '<td>'+MaMon+'</td>'+
                    '<td>'+TietHoc+'</td>'+
                    '<td>'+TenLop+'</td>'+
                    '<td>'+TienBaiHoc+'</td>'+
                    '<td>'+TenMon+'</td>'+
                    '<td><i id="xoachitiet" style="cursor:pointer;" class="fa-solid fa-trash"></i></td>'+
                '</tr>'

            );
            // $("#LopHoc option:selected").val(0);
            // $("#LopHoc option:selected").text("Chọn lớp học");
            // $("#MonHoc option:selected").val(0);
            // $("#LopHoc option:selected").text("Chọn môn học");
            // $("#TenBaiHoc").val("");
            // $("#TietHoc option:selected").text("Chọn tiết học");
        }
        $("#xoachitiet").click(function(){
            $(this).parent().parent().remove();
        });
  });
  
});
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>