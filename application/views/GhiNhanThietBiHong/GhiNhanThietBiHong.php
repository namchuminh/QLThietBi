<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GHI NHẬN THIẾT BỊ HỎNG</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("ghi-nhan-thiet-bi-hong/them-thiet-bi"); ?>" method="POST">
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
                                <select id="MaKho" name="MaKho" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn Kho</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Tên thiết bị</label>
                                <!-- <select id="MaThietBi" name="MaThietBi" class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn thiết bị</option>
                                </select> -->
                                <input type="text" id="TenThietBi"class="form-control show-tick" tabindex="-98" disabled>
                                <input type="hidden" id="MaThietBi" name="MaThietBi">
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số biên bản</label>
                                        <input name="SoBienBan" type="text" class="form-control" placeholder="Số biên bản">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng hỏng</label>
                                        <input name="SoLuongHong" type="text" class="form-control" placeholder="Số lượng hỏng">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Người phát hiện</label>
                                        <input name="NguoiPhatHien" type="text" class="form-control" placeholder="Người phát hiện">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                            <b>Ngày phát hiện</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="NgayPhatHien" type="date" class="form-control date">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Lý do hỏng</label>
                                        <input name="LyDoHong" type="text" class="form-control" placeholder="Lý do hỏng">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect m-r-20" style="margin-top: -20px; float: right;">Báo hỏng</button>
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
                    </div>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mã Thiết Bị</th>
                            <th>Tên Thiết Bị</th>
                            <th>Ký Hiệu</th>
                            <th>Chọn</th>
                        </tr>
                    </thead>
                    <tfoot id="Data">
                         <!-- <tr>
                            <td>Name</td>
                            <td>Position</td>
                            <td>Office</td>
                            <td><p>a</p></td>
                        </tr>  -->
                    </tfoot>
                </table> 
                    </div>
                    </div>

                </div>

            </form>

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
        $.post("<?php echo base_url("ghi-nhan-thiet-bi-hong/load-data/")?>"+MonHoc+"/"+MaKho, function(data){
            $("#Data").html(data);
            $("#Data").html($("#Data").html());
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
  $("#MaKho").on('change', function (){
        var MonHoc = $('#MonHoc').val();
        var MaKho = $('#MaKho').val();
        $.post("<?php echo base_url("theo-doi-dieu-chuyen/thiet-bi/")?>"+MonHoc+"/"+MaKho, function(data){
            $("#MaThietBi").html(data);
            $("#MaThietBi").html($("#MaThietBi").html());
        });

  });
});
// $(document).ready(function(){
//   $("#MaThietBi").on('change', function (){
//         var ThietBi = $("#MaThietBi option:selected" ).text();
//         $("#TenThietBi").val(ThietBi);
//   });
// });
$(document).ready(function(){
  $('#example tfoot').on('click', 'tr', function(event) {
  var column1Value = $(this).find('td:eq(0)').text();
  var column2Value = $(this).find('td:eq(1)').text();
  var column3Value = $(this).find('td:eq(2)').text();
  $("#TenThietBi").val(column2Value);
  $("#MaThietBi").val(column1Value);
});
});

</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>