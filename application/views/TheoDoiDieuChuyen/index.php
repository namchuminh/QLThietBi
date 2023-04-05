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
                    <form action="" method="POST">
                    <div class="header">
                        
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <label>Môn học</label>
                                <select class="form-control show-tick" tabindex="-98">
                                    <option value="0" hidden>Chọn môn học</option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Tên thiết bị - số lượng</label>
                                <select class="form-control show-tick" tabindex="-98">
                                	<option value="0" hidden>Chọn thiết bị</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Số lượng điều chuyển</label>
                                        <input type="text" class="form-control" placeholder="Số lượng cần chuyển" required>
                                    </div>
                                </div>
                            </div>
	                  	</div>
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#largeModal" style="margin-top: -20px; float: right;">Điều Chuyển</button>
                    </form>
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
                                    <tr>
                                        <th scope="row"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Điều chuyển thiết bị sang kho khác</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tên thiết bị cần điều chuyển</label>
                                                <input type="text" class="form-control" placeholder="Tên thiết bị" required>
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
                                                <input type="date" class="form-control date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Số biên bản</label>
                                                <input type="text" class="form-control" placeholder="Số biên bản" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người bàn giao</label>
                                                <input type="text" class="form-control" placeholder="Người bàn giao" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người tiếp nhận</label>
                                                <input type="text" class="form-control" placeholder="Người tiếp nhận" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Chuyển tới kho</label>
                                        <select class="form-control show-tick" tabindex="-98">
                                            <option value="0" hidden>Chọn kho</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Người tiếp nhận</label>
                                                <textarea rows="3" class="form-control no-resize" placeholder="Nhập tình trạng thiết bị"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Ghi chú</label>
                                                <textarea rows="2" class="form-control no-resize" placeholder="Nhập ghi chú"></textarea>
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
<?php require(__DIR__.'/layouts/Footer.php'); ?>