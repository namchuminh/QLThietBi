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
                    <form action="<?php echo base_url("muon-phong-hoc/tra-phong/").$MaMuonPhongHoc; ?>" method="POST">
                    <div class="body">
                        <div class="row clearfix">
                        <div class="header">
                        <?php if(isset($error)){ ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if(isset($alert)){ ?>
                        <p style="color: green;"><?php echo $alert; ?></p>
                    <?php } ?>
                    </div>
                        
                    </div>
                        <p style="color: red;" id="error"></p>
                        
                        <br>

                    
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <b>Chọn ngày trả phòng</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="NgayTraPhong" type="date" class="form-control date">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                        
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tình trạng phòng học</label>
                                                <input type="text" name="TinhTrang" rows="3" class="form-control no-resize" placeholder="Nhập tình trạng phong">
                                            </div>
                                        </div>
                                    </div>
                                    

                                     </div>
                                        <button type="submit"  class="btn btn-primary waves-effect m-r-20" class="btn btn-link waves-effect">Trả phòng học</button>
                                    </div>
                                </div>
                                

                  


                </div>
            </div>
        </div>

    </div>
    </form>
 
             
</section>

<?php require(__DIR__.'/layouts/Footer.php'); ?>