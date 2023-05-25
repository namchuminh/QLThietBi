<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>BÁO CÁO THỐNG KÊ<NG></NG></h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("bao-cao/xuat-excel"); ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header" style="padding: 0; padding-left: 15px; padding-bottom: 20px; margin-bottom: 15px;">
                            <button class="btn btn-primary waves-effect" type="submit">Xuất Excel</button>
                            <?php if(isset($error)){ ?>
                                <p style="color: red;"><?php echo $error; ?></p>
                            <?php } ?>
                            <?php if(isset($alert)){ ?>
                                <p style="color: green;"><?php echo $alert; ?></p>
                            <?php } ?>
                        </div>

                        
                        <div class="container" >
                          <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-5 ">
                                <div href="javascript:void(0);"class="menu-toggle waves-effect waves-block">
                                    
                                    <span style=" display: flex;align-items: center; font-size: 24px; background-color: #D8D8D8; padding: 10px; border-radius: 10px; margin-bottom: 5px"><i style="margin-right: 5px" class="fa-solid fa-book"></i>     Sổ sách</span> 
                                </div>
                                <ul class="ml-menu" style="display: none;">
                                   
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="2" value="theodoinhapthietbi">
                                      <label class="form-check-label" for="2">
                                            Sổ theo dõi nhập thiết bị
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="3" value="theodoisuathietbi">
                                      <label class="form-check-label" for="3">
                                            Sổ theo dõi sửa thiết bị
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="4" value="theodoithietbihong">
                                      <label class="form-check-label" for="4">
                                            Sổ theo dõi thiết bị hư hỏng
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="5" value="theodoithietbimat">
                                      <label class="form-check-label" for="5">
                                            Sổ theo dõi thiết bị báo mất
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="6" value="theodoithietbithanhly">
                                      <label class="form-check-label" for="6">
                                            Sổ theo dõi thanh lý thiết bị
                                      </label>
                                    </div>
                                    
                                </ul>

                                <div href="javascript:void(0);"class="menu-toggle waves-effect waves-block">
                                    
                                    <span style=" display: flex;align-items: center; font-size: 24px; background-color: #D8D8D8; padding: 10px; border-radius: 10px; margin-right: 5px; margin-bottom: 5px"><i style="margin-right: 5px" class="fa-solid fa-list"></i>Thống kê</span> 
                                </div>
                                <ul class="ml-menu" style="display: none;">
                                    <label style="margin-left: -20px">
                                         Mẫu chi tiết
                                    </label>
                                   <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="8" value="bangkethietbi">
                                      <label class="form-check-label" for="8">
                                            Bảng kê thiết bị - Mẫu 2A
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="9"
                                      value="bangkethietbimuon">
                                      <label class="form-check-label" for="9">
                                            Bảng kê thiết bị đang mượn - Mẫu 2B
                                      </label>
                                    </div>
                                   
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="12" value="bangkethietbiquahan">
                                      <label class="form-check-label" for="12">
                                            Bảng kê thiết bị mượn quá hạn chưa trả - Mẫu 2E
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="13" value="theodoinhapthietbi2">
                                      <label class="form-check-label" for="13">
                                            Bảng kê chi tiết nhập thiết bị- Mẫu 2G
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="14" value="bangkethietbitheomon">
                                      <label class="form-check-label" for="14">
                                            Bảng kê thiết bị theo môn học - Mẫu 2H
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="15" value="bangkethietbihonghoacmat">
                                      <label class="form-check-label" for="15">
                                            Bảng kê thiết bị hỏng hoặc mất - Mẫu 2F
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="16" value="bangkethietbithanhly">
                                      <label class="form-check-label" for="16">
                                            Bảng kê thiết bị thanh lý - Mẫu 2M
                                      </label>
                                    </div>
                                    <label style="margin-left: -20px">
                                         Mẫu tổng hợp
                                    </label>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="17" value="thongkegiaovienmuonnhieunhat">
                                      <label class="form-check-label" for="17">
                                            Thống kê giáo viên mượn nhiều nhất - Mẫu 3A
                                      </label>
                                    </div>
                                    
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="19" value="tonghopnhapthietbi">
                                      <label class="form-check-label" for="19">
                                            Tổng hợp nhập thiết bị - Mẫu 3C
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="20" value="tonghopthietbihonghoacmat">
                                      <label class="form-check-label" for="20">
                                            Tổng hợp thiết bị mất hoặc hỏng - Mẫu 3D
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="21" value="tonghopthietbithanhly">
                                      <label class="form-check-label" for="21">
                                            Tổng hợp thiết bị đã thanh lý - Mẫu 3E
                                      </label>
                                    </div>
                                    <!-- <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="22">
                                      <label class="form-check-label" for="22">
                                            Thống kê mã cá biệt thiết bị theo kho
                                      </label>
                                    </div> -->
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="23"  value="tonghopdieuchuyenthietbi">
                                      <label class="form-check-label" for="23">
                                            Thống kê lịch sử điều chuyển thiết bị
                                      </label>
                                    </div>
                                </ul>
                                <div href="javascript:void(0);"class="menu-toggle waves-effect waves-block">
                                    
                                    <span style=" display: flex;align-items: center; font-size: 24px; background-color: #D8D8D8; padding: 10px; border-radius: 10px; margin-right: 5px"><i style="margin-right: 5px" class="fa-solid fa-table"></i>Báo cáo thiết bị</span> 
                                </div>
                                <ul class="ml-menu" style="display: none;">
                                  
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach" id="31" value="bangchitietthietbitrongky">
                                      <label class="form-check-label" for="31">
                                            Bảng in chi tiết thiết bị hiện có trong kỳ - Mẫu B08-TB
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="30" value="phieubaosudungthietbi">
                                      <label class="form-check-label" for=30>
                                            Phiếu báo sử dụng thiết bị - Mẫu B07-TB
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="SoSach"id="32" value="bangchitietthietbikhauhaotrongky">
                                      <label class="form-check-label" for="32">
                                            Tổng hợp báo cáo khấu hao thiết bị trong kỳ - Mẫu B09-TB
                                      </label>
                                    </div>
                                    
                                </ul>
                            </div>
                            <div class="col-sm-6" >
                              <div class="row">
                                <div class="col-10 col-sm-10">
                                   <div style="background-color: #BBD6B8; padding: 10px; border-radius: 10px; color: white; font-weight: bold; " >Chọn khoảng thời gian lập báo cáo</div>
                                   <br>
                                   <div class="col-sm-5">
                                        <b>Từ ngày</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input name="TuNgay" type="date" id="date1" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <b>Tới ngày</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input name="ToiNgay" id="date2" type="date" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 col-sm-10">
                                   <div style="background-color: #BBD6B8; padding: 10px; border-radius: 10px; color: white; font-weight: bold;" >Các diều kiện lập báo cáo</div>
                                   <br>

                                   <div class="col-sm-5">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="cb1" value="theokho" id="flexCheck">
                                          <label class="form-check-label" for="flexCheck">
                                            Chỉ chọn kho
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        
                                        <select name="MaKho" id="MaKho" class="form-control show-tick" tabindex="-98" disabled>
                                            <option value="0" hidden>Chọn Kho</option>
                                            <?php foreach ($Kho as $key => $value) { ?>
                                                    <option value="<?php echo $value["MaKho"]; ?>"><?php echo $value["TenKho"]; ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="cb2" value="theoten" id="flexCheck1">
                                          <label class="form-check-label" for="flexCheck1">
                                            Chọn theo tên giáo viên
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        
                                        <input type="text" id="TenGiaoVien" name="TenGiaoVien" placeholder="Nhập tên giáo viên" class="form-control show-tick" tabindex="-98" disabled>
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
    </form>
 
             
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $('#flexCheck').change(function() {
    if ($(this).is(':checked')) {
      $('#flexCheck1').prop('checked', false);
      $('#MaKho').prop('disabled', false);
      $('#TenGiaoVien').val(null);
      $('#date1').val(null);
      $('#date2').val(null);
    } else {
      $('#MaKho').val('0');
      $('#MaKho').prop('disabled', true);
    }
  });
  $('#flexCheck1').change(function() {
    if ($(this).is(':checked')) {
      $('#flexCheck').prop('checked', false);
      $('#TenGiaoVien').prop('disabled', false);
      $('#MaKho').val('0');
      $('#date1').val(null);
      $('#date2').val(null);
    } else {
      $('#TenGiaoVien').prop('disabled', true);
      $('#TenGiaoVien').val(null);
    }
  });

});

</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>