<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>LỊCH MƯỢN PHÒNG CHỨC NĂNG</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("muon-phong-hoc/liet-ke"); ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header" style="padding: 0; padding-left: 15px; padding-bottom: 20px; margin-bottom: 15px;">
                            <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                            <a class="btn btn-primary waves-effect" type="button" href="<?php echo base_url('muon-phong-hoc/muon'); ?>">Mượn Phòng Học</a>
                        </div>
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
                        <div class="col-sm-6">
                            <label>Buổi học</label>
                            <select name="BuoiHoc" class="form-control show-tick" tabindex="-98">
                                <option value="0" hidden="">chọn buổi học</option>
                                <option value="BuoiSang">Buổi Sáng</option>
                                <option value="BuoiChieu">Buổi Chiều</option>
                               
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Tên Phòng</label>
                            <select name="PhongHoc" class="form-control show-tick" tabindex="-98">
                                <?php foreach ($PhongHoc as $key => $value) { ?>

                                        <option value="<?php echo $value["MaPhongHoc"]; ?>"><?php echo $value["TenPhongHoc"]; ?></option>
                                <?php   } ?>
                               
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
                    
                        
                        <div class="table table-striped table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Tiết</th>
                                        <th>Thứ 2</th>
                                        <th>Thứ 3</th>
                                        <th>Thứ 4</th>
                                        <th>Thứ 5</th>
                                        <th>Thứ 6</th>
                                        <th>Thứ 7</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                         <?php for ($i=0; $i < 5; $i++) { $dem=0;?>
                                                <tr class="BuoiSang">
                                                    <td style="width: 5%; text-align: center;"><?php echo $i+1; ?></td>

                                                    <?php for ($j=0; $j < 6; $j++){ ?>
                                                        <?php foreach ($MuonPhongHoc as $key => $value){
                                                            
                                                        $ddate = $value["NgayMuon"];
                                                        $duedt = explode("-", $ddate);
                                                        $date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
                                                        $week  = date('w', $date);
                                        
                                                            if ($value["BuoiHoc"]=="BuoiSang" && $value["TietHoc"]==($i+1) && $week==($j+1)) {
                                                            $dem++;                                                           
                                                        ?>
                                                            <td class="damuon" data-value="<?php echo $value["MaMuonPhongHoc"]; ?>" data-toggle="modal" data-target="#myModal"><?php echo $value["NguoiMuon"]."- Bài Dạy: ".$value["TenBaiHoc"];; ?></td>
                                                        <?php } } $dem++; if ($dem>6) {
                                                            break;
                                                        } ?>
                                                            <td></td>
                                                        <?php } ?>
                                                        
                                                </tr>
                                            <?php } ?>
                                            <tr style="width: 5%; text-align: center;">
                                                <td style="border: none;"><b>Lịch buổi chiều</b></td>
                                            </tr>
                                           <?php for ($i=0; $i < 5; $i++) { $dem=0;?>
                                                <tr class="BuoiSang">
                                                    <td style="width: 5%; text-align: center;"><?php echo $i+1; ?></td>

                                                    <?php for ($j=0; $j < 6; $j++){ ?>
                                                        <?php foreach ($MuonPhongHoc as $key => $value){
                                                            
                                                        $ddate = $value["NgayMuon"];
                                                        $duedt = explode("-", $ddate);
                                                        $date  = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
                                                        $week  = date('w', $date);
                                        
                                                            if ($value["BuoiHoc"]=="BuoiChieu" && $value["TietHoc"]==($i+1) && $week==($j+1)) {
                                                            $dem++;                                                           
                                                        ?>
                                                            <td class="damuon" data-value="<?php echo $value["MaMuonPhongHoc"]; ?>" data-toggle="modal" data-target="#myModal"><?php echo $value["NguoiMuon"]."- Bài Dạy: ".$value["TenBaiHoc"]; ?></td>
                                                        <?php } } $dem++; if ($dem>6) {
                                                            break;
                                                        } ?>
                                                            <td></td>
                                                        <?php } ?>
                                                        
                                                </tr>
                                            <?php } ?> 

                                </tbody>
                            </table>
                        </div>
                    </div>
                        <p style="color: red;" id="error"></p>
                        
                        <br>

                    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Chức năng</h4>
                        </div>
                        <div class="modal-body" style="text-align:center; display: flex; justify-content: space-between;">
                            <a class="link_xoa" href="<?php echo base_url("muon-phong-hoc/xoa/")?>"><i class="fa-solid fa-trash"></i> Hủy đăng ký mượn phòng</p></a><p>
                            <a class="link_tra" href="<?php echo base_url("muon-phong-hoc/tra/")?>"><i class="fa-solid fa-backward"></i> Trả Phòng</p></a><p>
                            <a class="link_sua" href="<?php echo base_url("muon-phong-hoc/sua/")?>"><i class="fa-regular fa-gear"></i> Sửa thông tin</p></a><p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_close">Đóng</button>
                        </div>
                      </div>
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
    $(document).ready(function(){
        var value = "";

        $(".damuon").on('click', function (){
            $('.link_xoa').attr('href', "<?php echo base_url("muon-phong-hoc/xoa/")?>");
            $('.link_tra').attr('href', "<?php echo base_url("muon-phong-hoc/tra/")?>");
            $('.link_sua').attr('href',  "<?php echo base_url("muon-phong-hoc/sua/")?>");
            value = $(this).data('value');
            if(value != ""){
                var url = $('.link_xoa').attr('href')+value;
                $('.link_xoa').attr('href', url);

                var url = $('.link_tra').attr('href')+value;
                $('.link_tra').attr('href', url);

                var url = $('.link_sua').attr('href')+value;
                $('.link_sua').attr('href', url);

            }
            
      });
    });
    
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>