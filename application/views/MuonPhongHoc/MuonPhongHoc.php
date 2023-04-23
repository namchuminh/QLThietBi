<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Mượn phòng chức năng</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("muon-phong-hoc/muon-phong"); ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header">
                        <h2>
                            
                        </h2>
                    </div>
                        <!-- <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mã lớp</th>
                                        <th>Mã môn</th>
                                        <th>Tiết</th>
                                        <th>Lớp</th>
                                        <th>Tên bài học</th>
                                        <th>Môn</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Chitiet as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['MaLop']; ?></td>
                                            <td><?php echo $value['MaMonHoc']; ?></td>
                                            <td><?php echo $value['SoTiet']; ?></td>
                                            <td><?php echo $value['TenLop']; ?></td>
                                            <td><?php echo $value['TenBaiHoc']; ?></td>
                                            <td><?php echo $value['TenMonHoc']; ?></td>
                                            <td><a href="<?php echo base_url("muon-tra/them-chi-tiet/xoa/").$value["MaMuonThietBi"]."/".$value["MaChiTietPhieuMuon"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                        
                                                 
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                        <p style="color: red;" id="error"></p>
                        <!-- <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#largeModal" id="btn_dieuchuyen" style="margin-top: -20px; float: right;">Thêm chi tiết</button> -->
                        <br>

                    <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
                    <div class="row clearfix">
                        <div class="col-sm-6">
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
                        <div class="col-sm-6">
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
                        <div class="col-sm-12">
                            <label>Phòng học</label>
                            <select id="PhongHoc" name="MaPhongHoc" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden>Chọn phòng học</option>
                                <?php foreach ($PhongHoc as $key => $value) { ?>
                                        <option value="<?php echo $value["MaPhongHoc"]; ?>"><?php echo $value["TenPhongHoc"]; ?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    <!-- <div class="body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Tiết</th>
                                <th>Thứ 2<input type="text" value="2" class="Thu" ></th>
                                <th>Thứ 3<input type="text" value="3" class="Thu" ></th>
                                <th>Thứ 4<input type="text" value="4" class="Thu" ></th>
                                <th>Thứ 5<input type="text" value="5" class="Thu" ></th>
                                <th>Thứ 6<input type="text" value="6" class="Thu" ></th>
                                <th>Thứ 7<input type="text" value="7" class="Thu" ></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php for ($i=0; $i < 10; $i++) { ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <?php for ($j=0; $j < 6; $j++) { ?>
                                        <td data-toggle="modal" data-target="#largeModal" data-dismiss="modal" class="btn_clik"><input type="text" value="<?php echo $i+1;?>" class="Tiet" hidden></td>
                                    <?php } ?>

                                    
                              </tr>
                            <?php } ?>
                              
                            </tbody>
                          </table>
                    </div>    --> 
                        
                                    <div class="col-sm-6">
                                        <label>Buổi học</label>
                                        <select name="BuoiHoc" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn buổi học</option>
                                            <option value="BuoiSang">Buổi Sáng</option>
                                            <option value="BuoiChieu">Buổi Chiều</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Tiết học</label>
                                        <select name="TietHoc" class="form-control show-tick" tabindex="-98">
                                            <option  value="0" hidden>Chọn tiết học</option>
                                            <option value="1">Tiết 1</option>
                                            <option value="2">Tiết 2</option>
                                            <option value="3">Tiết 3</option>
                                            <option value="4">Tiết 4</option>
                                            <option value="5">Tiết 5</option>
                                            <!-- <option value="6">Tiết 6</option>
                                            <option value="7">Tiết 7</option>
                                            <option value="8">Tiết 8</option>
                                            <option value="9">Tiết 9</option>
                                            <option value="10">Tiết 10</option> -->
                                            
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Lớp học</label>
                                        <select id="LopHoc" name="MaLop" class="form-control show-tick" tabindex="-98">
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
                                        <select id="MonHoc" name="MaMon" class="form-control show-tick" tabindex="-98">
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
                                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Mượn phòng học</button>
                                    </div>
                                </div>
                                <!-- <div class="row">
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

                                </div> -->

                  


                </div>
            </div>
        </div>

    </div>
    </form>
   <!--  <div class="modal fade" id="largeModal" role="dialog" >
             <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="width: 200px;">
                        <div class="modal-body" style="text-align:center">
                            
                            <p data-toggle="modal" data-target="#largeModal2" data-dismiss="modal" style="cursor: pointer;">Đăng ký sử dụng</p>
                 
                            <p style="cursor: pointer;">Hủy ký sử dụng</p>
                            
                        </div>
                        
                           <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                        
                        
                        
                    </div>
                </div>
    </div>
    <div class="modal fade" id="largeModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Đăng ký mượn phòng chức năng</h4>
                        </div>
                        <div class="modal-body" >

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Buổi học</label>
                                        <select name="BuoiHoc" class="BuoiHoc" class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn buổi học</option>
                                            <option value="BuoiSang">Buổi Sáng</option>
                                            <option value="BuoiChieu">Buổi Chiều</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Tiết học</label>
                                        <select name="TietHoc" class="TietHoc"  class="form-control show-tick" tabindex="-98">
                                            <option  value="0" hidden>Chọn tiết học</option>
                                            <option value="1">Tiết 1</option>
                                            <option value="2">Tiết 2</option>
                                            <option value="3">Tiết 3</option>
                                            <option value="4">Tiết 4</option>
                                            <option value="5">Tiết 5</option>
                                            <option value="6">Tiết 6</option>
                                            <option value="7">Tiết 7</option>
                                            <option value="8">Tiết 8</option>
                                            <option value="9">Tiết 9</option>
                                            <option value="10">Tiết 10</option>
                                            
                                        </select>
                                    </div>
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
                                <button type="submit" id="themchitiet" class="btn btn-link waves-effect">Xác Nhận</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            </form> -->
             
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