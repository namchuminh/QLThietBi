<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>QUẢN LÝ NGƯỜI DÙNG</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="<?php echo base_url("quan-ly-nguoi-dung/them-nhan-vien"); ?>" enctype="multipart/form-data" method="POST">
                    <div class="header">
                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#modalContactForm"style="margin-left: 20px;">Thêm tài khoản</button>
                        </div>
                        <br>
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
                                        <th>Mã người dùng</th>
                                        <th>Hình ảnh</th>
                                        <th>Họ và tên</th>
                                        <th>Tài khoản</th>
                                        <th>Loại người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Cấp quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach ($NguoiDung as $key => $value) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $key+1; ?></td>
                                        <td><img style="width: 100px; height: 100px" src="<?php echo $value["AnhDaiDien"]; ?>"></td>
                                        <td><?php echo $value["HoTen"]; ?></td>
                                        <td><?php echo $value["TaiKhoan"]; ?></td>
                                        <td><?php echo $value["ChucVu"]; ?></td>
                                        <td><?php echo $value["SoDienThoai"]; ?></td>
                                        <td><?php
                                            if ($value["TrangThai"]==0) {
                                                echo "Hoạt động";
                                            }else{
                                                echo "Đã khóa";
                                            }
                                            

                                        ?></td>
                                        <td>
                                            <?php if ($value["ChucVu"]=="admin") {?>
                                                <a onclick="return confirm('Bạn có muốn thay đổi quyển tài khoản này không ?');" href="<?php echo base_url("quan-ly-nguoi-dung/set-quyen-user/").$value["TaiKhoan"];  ?>"><button type="button" class="btn btn-warning">Thay đổi thành User</button></a>
                                            <?php }else{ ?>
                                               <a onclick="return confirm('Bạn có muốn thay đổi quyển tài khoản này không ?');" href="<?php echo base_url("quan-ly-nguoi-dung/set-quyen-admin/").$value["TaiKhoan"];  ?>"><button type="button" class="btn btn-info">Thay đổi thành Admin</button></a> 

                                            <?php } ?>
                                            <br>
                                            <br>

                                            <?php if ($value["TrangThai"]==0) {?>
                                                <a onclick="return confirm('Bạn có muốn khóa tài khoản này không ?');" href="<?php echo base_url("quan-ly-nguoi-dung/khoa-tai-khoan/").$value["TaiKhoan"];  ?>"><button type="button" class="btn btn-danger">Khóa tài khoản</button></a>
                                            <?php }else{ ?>
                                               <a onclick="return confirm('Bạn có muốn mở khóa tài khoản này không ?');" href="<?php echo base_url("quan-ly-nguoi-dung/mo-khoa-tai-khoan/").$value["TaiKhoan"];  ?>"><button type="button" class="btn btn-success">Mở khóa tài khoản</button></a> 

                                            <?php } ?>
                                                

                                            
                                            
                                            
                                            
                                        </td>
                                        
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
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Thêm tài khoản</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form34">Họ và tên</label>
          <input type="text"  class="form-control validate" name="HoVaTen" placeholder="Nhập họ và tên">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form29">Tài khoản</label>
          <input type="text"  class="form-control validate" name="TaiKhoan" placeholder="Nhập Tên tài khoản">
          
        </div>

        <div class="md-form mb-5">
          <i class="fa-solid fa-lock"></i>
          <label data-error="wrong" data-success="right" for="form32">Mật khẩu</label>
          <input type="password"  class="form-control validate" name="MatKhau" placeholder="Nhập mật khẩu">
          
        </div>
        <div class="md-form mb-5">
          <i class="fa-solid fa-lock"></i>
          <label data-error="wrong" data-success="right" for="form32">Xác Nhận Lại Mật khẩu</label>
          <input type="password"  class="form-control validate" name="MatKhau2" placeholder="Nhập lại mật khẩu">
          
        </div>
        <div class="md-form mb-5">
          <i class="fa-solid fa-phone"></i>
          <label data-error="wrong" data-success="right" for="form32">Số điện thoại</label>
          <input type="text"  class="form-control validate" name="SoDienThoai" placeholder="Nhập Số điện thoại">
        </div>
        <div class="md-form mb-5">
          <i class="fa-solid fa-house"></i>
          <label data-error="wrong" data-success="right" for="form32">Quê quán</label>
          <input type="text"  class="form-control validate" name="QueQuan" placeholder="Nhập quê quán">
        </div>
        <div class="md-form mb-5">
          <i class="fa-solid fa-user"></i>
          <label data-error="wrong" data-success="right" for="form32">Chức vụ</label>
          <select class="form-control show-tick" name="ChucVu" tabindex="-98">
            <option value="0" hidden>Chọn chức vụ</option>
            <option value="user">Người dùng</option>
            <option value="admin">Admin</option>
            
        </select>
          
        </div>
        <div class="md-form mb-5">
            <b>Năm sinh</b>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                </span>
                <div class="form-line">
                    <input name="NamSinh" type="date" class="form-control date">
                </div>
            </div>
        </div>
       <div class="md-form mb-5">
          <i class="fa-solid fa-image"></i>
          <label data-error="wrong" data-success="right" for="form32">Chọn ảnh đại diện</label>
          <input type="file" id="ChonAnh" class="form-control validate" name="AnhdaiDien" placeholder="chọn ảnh đại diện">
          <img id="Anh" src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg" style="width: 100px;, height: 100px;">
        </div>
        

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-unique"> Đăng ký <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
</div>
</form>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#ChonAnh').change(function(){
        $('#Anh').attr('src', URL.createObjectURL($(this)[0].files[0]));
      });
    });
</script>
<?php require(__DIR__.'/layouts/Footer.php'); ?>