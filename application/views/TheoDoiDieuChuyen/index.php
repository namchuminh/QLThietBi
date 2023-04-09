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
                    <form action="<?php echo base_url("theo-doi-dieu-chuyen/dieu-chuyen"); ?>" method="POST">
                    <div class="header">
                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <label>Môn học</label>
                                <select name="MonHoc" id="MonHoc" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn môn học</option>
                                    <?php foreach ($MonHoc as $key => $value) { ?>
                                        <option value="<?php echo $value['MaMonHoc'] ?>"><?php echo $value['TenMonHoc'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Tên Kho</label>
                                <select id="MaKho" name="MaKhoCu" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn Kho</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Tên thiết bị</label>
                                <select id="MaThietBi" name="MaThietBi" class="form-control show-tick" tabindex="-98">
                                	<option value="0" hidden>Chọn thiết bị</option>
                                </select>
                            </div>

                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng điều chuyển</label>
                                        <input name="SoLuongDieuChuyen" type="text" class="form-control" placeholder="Số lượng cần chuyển">
                                    </div>
                                </div>
                            </div>
	                  	</div>
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#largeModal" id="btn_dieuchuyen" style="margin-top: -20px; float: right;">Điều Chuyển</button>
                    <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
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
                                        <th>Ngày bàn giao</th>
                                        <th>Số biên bản</th>
                                        <th>Tên thiết bị</th>
                                        <th>Mã thiết bị</th>
                                        <th>Người bàn giao </th>
                                        <th>Người tiếp nhận</th>
                                        <th>Nơi tiếp nhận</th>
                                        <th>Nhật ký</th>
                                        <th>Xác nhận</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($DieuChuyen as $key => $value) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $key+1; ?></td>
                                        <td><?php echo $value["NgayBanGiao"]; ?></td>
                                        <td><?php echo $value["SoBienBan"]; ?></td>
                                        <td><?php echo $value["TenThietBi"]; ?></td>
                                        <td><?php echo $value["MaThietBi"]; ?></td>
                                        <td><?php echo $value["NguoiBanGiao"]; ?></td>
                                        <td><?php echo $value["NguoiTiepNhan"]; ?></td>
                                        <td><?php echo $value["TenKho"]; ?></td>
                                        <td><a href="<?php echo base_url("theo-doi-dieu-chuyen/xuat-nhat-ky/").$value["MaDieuChuyen"]; ?>"><i class="fa-solid fa-file"></i></a></td>
                                        <td><a href="<?php echo base_url("theo-doi-dieu-chuyen/xuat-xac-nhan-dieu-chuyen/").$value["MaDieuChuyen"]; ?>"><i class="fa-solid fa-file"></i></a></td>
                                        <td><a href="<?php echo base_url("theo-doi-dieu-chuyen/sua-dieu-chuyen/").$value["MaDieuChuyen"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa điều chuyển này không');" href="<?php echo base_url("theo-doi-dieu-chuyen/xoa-dieu-chuyen/").$value["MaDieuChuyen"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
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
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Điều chuyển thiết bị sang kho khác</h4>
                        </div>
                        <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên thiết bị cần điều chuyển</label>
                                                <input type="text" id="TenThietBi" class="form-control" placeholder="Tên thiết bị" >
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
                                                <input name="NgayBanGiao" type="date" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Số biên bản</label>
                                                <input name="SoBienBan" type="text" class="form-control" placeholder="Số biên bản" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người bàn giao</label>
                                                <input name="NguoiBanGiao" type="text" class="form-control" placeholder="Người bàn giao" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người tiếp nhận</label>
                                                <input name="NguoiTiepNhan" type="text" class="form-control" placeholder="Người tiếp nhận" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Chuyển tới kho</label>
                                        <select name="MaKhoChuyenToi" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn kho</option>
                                            <?php foreach ($Kho as $value) { ?>
                                                <option value="<?php echo $value["MaKho"];?>" ><?php echo $value["TenKho"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tình Trạng Thiết Bị</label>
                                                <textarea name="TinhTrang" rows="3" class="form-control no-resize" placeholder="Nhập tình trạng thiết bị"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Ghi chú</label>
                                                <textarea name="GhiChu" rows="2" class="form-control no-resize" placeholder="Nhập ghi chú"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect">Điều Chuyển</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                            </div>
                            </form>
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
        $.post("http://localhost/QLThietBi/theo-doi-dieu-chuyen/kho/"+MonHoc, function(data){
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
        $.post("http://localhost/QLThietBi/theo-doi-dieu-chuyen/thiet-bi/"+MonHoc+"/"+MaKho, function(data){
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