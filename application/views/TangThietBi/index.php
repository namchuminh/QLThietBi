<?php require(__DIR__.'/layouts/Header.php'); ?>
<?php require(__DIR__.'/layouts/Nav.php'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>TĂNG THIẾT BỊ</h2>
        </div>
    	<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <button class="btn btn-warning waves-effect" type="submit">Liệt Kê</button>
                        <a class="btn btn-primary waves-effect" type="submit" href="<?php echo base_url('tang-thiet-bi/them/'); ?>">Thêm Mới</a>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <b>Ngày nhập</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <b>Tới ngày</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="date" class="form-control date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Kho nhập</label>
                                <select class="form-control show-tick" tabindex="-98">
                                	<option hidden>Lựa chọn kho</option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
	                  	</div>
	                  	<div class="row clearfix">
	                        <div class="col-sm-4">
	                            <div class="form-group">
	                                <div class="form-line">
	                                	<label>Số chứng từ</label>
	                                    <input type="number" class="form-control" placeholder="Nhập số chứng từ">
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-sm-4">
	                            <div class="form-group">
	                                <div class="form-line">
	                                	<label>Đến số</label>
	                                    <input type="number" class="form-control" placeholder="Nhập số chứng từ">
	                                </div>
	                            </div>
	                        </div>
                    	</div>

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
                                        <th>NgàyLập</th>
                                        <th>Số phiếu</th>
                                        <th>Kho | Phòng chức năng </th>
                                        <th>Nhập từ | Xuất cho </th>
                                        <th>Diễn giải </th>
                                        <th>Nhập chi tiết</th>
                                        <th>Kiết xuất phiếu nhập</th>
                                        <th>Kiết xuất biên bản nhập</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">0000001</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><a href=""><i class="fa-sharp fa-solid fa-gears"></i></a></td>
                                        <td><a href=""><i class="fa-solid fa-file"></i></a></td>
                                        <td><a href=""><i class="fa-solid fa-file"></i></a></td>
                                        <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                    </div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require(__DIR__.'/layouts/Footer.php'); ?>