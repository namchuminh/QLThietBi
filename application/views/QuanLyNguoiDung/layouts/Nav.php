<?php $this->load->model('Model_Login');
    $username = $this->session->userdata("username");
    $result = $this->Model_Login->Login2($username);
?>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('index/'); ?>">HỆ THỐNG QUẢN LÝ - THIẾT BỊ</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $result[0]["AnhDaiDien"]; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if (isset($username)) {
                       echo "Xin chào ".$username;
                    }?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url("dang-xuat/"); ?>"><i class="material-icons">input</i>Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU CHỨC NĂNG</li>
                    <li class="active">
                        <a href="<?php echo base_url('index/'); ?>">
                            <i class="material-icons">home</i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">widgets</i>
                            <span>Thiết Bị</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="<?php echo base_url('tang-thiet-bi/'); ?>" class="waves-effect waves-block">
                                    <span>Nhập tăng thiết bị dạy học</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('theo-doi-dieu-chuyen/'); ?>" class="waves-effect waves-block">
                                    <span>Theo dõi, điều chuyển thiết bị</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('ghi-nhan-thiet-bi-hong'); ?>" class="waves-effect waves-block">
                                    <span>Ghi nhận thiết bị hỏng</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('ghi-nhan-thiet-bi-mat'); ?>" class="waves-effect waves-block">
                                    <span>Ghi nhận thiết bị mất</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('sua-chua-thiet-bi'); ?>" class="waves-effect waves-block">
                                    <span>Sửa chữa thiết bị</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('thanh-ly-thiet-bi'); ?>" class="waves-effect waves-block">
                                    <span>Thanh lý thiết bị</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block" style="align-items: center;" >
                            <i class="material-icons">map</i>
                            <span>Mượn Trả</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('muon-tra'); ?>" class="waves-effect waves-block">
                                <span>Giáo viên mượn trả thiết bị dạy học</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('muon-tra/nhat-ky'); ?>" class="waves-effect waves-block">
                                <span>Xem nhật ký mượn trả</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('muon-phong-hoc'); ?>" class="waves-effect waves-block">
                                <span>Mượn phòng học</span>
                            </a>
                        </li>
                    </ul>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                          <i class="material-icons">assessment</i>
                        <span>Hệ Thống</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('quan-ly-nguoi-dung'); ?>" class="waves-effect waves-block">
                                <span>Quản lý người dùng</span>
                            </a>
                        </li>
                    </ul>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                          <i class="material-icons">library_books</i>
                        <span>Báo cáo</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="<?php echo base_url('bao-cao'); ?>" class="waves-effect waves-block">
                                <span>Thống kê và báo cáo</span>
                            </a>
                        </li>
                    </ul>
                </ul>

                
            </div>

            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                
            </div>
            <!-- #Footer -->
        </aside>
        
       
    </section>
