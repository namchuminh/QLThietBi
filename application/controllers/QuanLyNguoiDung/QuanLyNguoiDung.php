<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QuanLyNguoiDung extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('QuanLyNguoiDung/Model_QuanLyNguoiDung');
	}

	public function index()
	{
		$TaiKhoan = $this->session->userdata('username');
		$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($TaiKhoan);
		$data = array(
			"NguoiDung"=>$NguoiDung,
		);
		$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
	}
	public function SetUser($TaiKhoan)
	{
		$result = $this->Model_QuanLyNguoiDung->Set_Quyen_User($TaiKhoan);
		if ($result==True) {
			return redirect(base_url("quan-ly-nguoi-dung"));
		}else{
			$data = array(
				'error'=>"set quyền user thất bại",
				"NguoiDung"=>$NguoiDung,
			);
			$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
		}
		
	}
	public function SetAdmin($TaiKhoan)
	{
		$result = $this->Model_QuanLyNguoiDung->Set_Quyen_Admin($TaiKhoan);
		if ($result==True) {
			return redirect(base_url("quan-ly-nguoi-dung"));
		}else{
			$data = array(
				'error'=>"set quyền admin thất bại",
				"NguoiDung"=>$NguoiDung,
			);
			$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
		}
		
	}
	public function KhoaTaiKhoan($TaiKhoan)
	{
		$result = $this->Model_QuanLyNguoiDung->KhoaTaiKhoan($TaiKhoan);
		if ($result==True) {
			return redirect(base_url("quan-ly-nguoi-dung"));
		}else{
			$data = array(
				'error'=>"khóa tài khoản thất bại",
				"NguoiDung"=>$NguoiDung,
			);
			$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
		}
		
	}
	public function MoKhoaTaiKhoan($TaiKhoan)
	{
		$result = $this->Model_QuanLyNguoiDung->MoKhoaTaiKhoan($TaiKhoan);
		if ($result==True) {
			return redirect(base_url("quan-ly-nguoi-dung"));
		}else{
			$data = array(
				'error'=>"Mo khóa tài khoản thất bại",
				"NguoiDung"=>$NguoiDung,
			);
			$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
		}
		
	}
	public function ThemNhanVien()
	{
		$User = $this->session->userdata('username');
		$TaiKhoan = $this->input->post('TaiKhoan');
		$MatKhau = md5($this->input->post('MatKhau'));
		$MatKhau2 = md5($this->input->post('MatKhau2'));
		$HoTen = $this->input->post('HoVaTen');
		$SoDienThoai = $this->input->post('SoDienThoai');
		$NamSinh = $this->input->post('NamSinh');
		$ChucVu = $this->input->post('ChucVu');
		$QueQuan = $this->input->post('QueQuan');
		if (gettype($this->check_null($TaiKhoan, $MatKhau,$MatKhau2, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan))=="boolean") {
			if(gettype($this->check_sdt($SoDienThoai))=="boolean"){
				if($MatKhau2==$MatKhau){
					if (gettype($this->check_lenght($TaiKhoan, $MatKhau))=="boolean") {
						$check = $this->Model_QuanLyNguoiDung->Check_tontai($TaiKhoan);
						if ($check==null) {
							$target_dir = "uploads/";
							if (isset($_FILES["AnhdaiDien"])) {
								$target_file = $target_dir . basename($_FILES["AnhdaiDien"]["name"]);
								$uploadOk = 1;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								if(isset($_POST["submit"])) {
								  $check = getimagesize($_FILES["AnhdaiDien"]["tmp_name"]);
								  if($check !== false) {
								    echo "File is an image - " . $check["mime"] . ".";
								    $uploadOk = 1;
								  } else {
								    echo "File is not an image.";
								    $uploadOk = 0;
								  }
								}
								if ($_FILES["AnhdaiDien"]["size"] > 5000000) {
									$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
									$data = array(
										"error"=> "Kích thước ảnh quá lớn, vui lòng chọn lại",
										"NguoiDung"=>$NguoiDung,
									);
									return $this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
									
									  $uploadOk = 0;
								}

								// Allow certain file formats
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif" ) {
									$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
									$data = array(
										"error"=> "ảnh đại diện chỉ nhận kiểu JPG, JPEG, PNG và GIF.",
										"NguoiDung"=>$NguoiDung,
									);
									return $this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
								 
								  	$uploadOk = 0;
								}

								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
									$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
									$data = array(
										"error"=> "lỗi file ảnh đại diện chưa được upload",
										"NguoiDung"=>$NguoiDung,
									);
									return $this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
								  
								}

								
								$AnhDaiDien = base_url()."uploads/". basename($_FILES["AnhdaiDien"]["name"]);
								$TrangThai = 0;
								$result = $this->Model_QuanLyNguoiDung->Add_NguoiDung($TaiKhoan, $MatKhau, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan, $AnhDaiDien, $TrangThai);
								if($result==True){
									return redirect(base_url("quan-ly-nguoi-dung"));
								}else{
									echo "them that baij";
								}
							}else{
								$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
								$data = array(
									"error"=> "Vui lòng chọn ảnh đại diện",
									"NguoiDung"=>$NguoiDung,
								);
								return $this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
							}
						}else{
							$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
							$data = array(
								"error"=>"Tài khoản đã tồn tại bạn có thể chọn ".$TaiKhoan."123",
								"NguoiDung"=>$NguoiDung,
							);
							$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
						}
					}else{
						$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
						$data = array(
							"error"=>$this->check_lenght($TaiKhoan, $MatKhau),
							"NguoiDung"=>$NguoiDung,
						);
						$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
					}
				}else{
					$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
					$data = array(
						"error"=>"Mật khẩu và mật khẩu xác nhận không khớp nhau",
						"NguoiDung"=>$NguoiDung,
					);
					$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
				}
			}else{
				$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
				$data = array(
					"error"=>$this->check_sdt($SoDienThoai),
					"NguoiDung"=>$NguoiDung,
				);
				$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
			}
			
		}else{
			$NguoiDung = $this->Model_QuanLyNguoiDung->Get_All($User);
			$data = array(
				"error"=>$this->check_null($TaiKhoan, $MatKhau,$MatKhau2, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan),
				"NguoiDung"=>$NguoiDung,
			);
			$this->load->view('QuanLyNguoiDung/QuanLyNguoiDung', $data);
		}
		
		
		
	}
	public function check_sdt($SoDienThoai){
		if(is_numeric($SoDienThoai)!=1){
			return "Số điện thoại chỉ được nhập số";
		}
		if(strlen($SoDienThoai)<10 || strlen($SoDienThoai)>10){
			return "Số điện thoại phải có 10 số";
		}else{
			return TRUE;
		}
	}
	public function check_lenght($TaiKhoan, $MatKhau){
		if(strlen($TaiKhoan)<5){
			return "Tai khoản phải có ít nhất 5 ký tự";
		}
		elseif(strlen($MatKhau)<5){
			return "mật khẩu phải có ít nhất 5 ký tự";
		}
		else{
			return TRUE;
		}
	}

	public function check_null($TaiKhoan, $MatKhau,$MatKhau2, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan){
		if (empty($TaiKhoan) && empty($MatKhau) && empty($MatKhau2) && empty($HoTen) && empty($SoDienThoai) && empty($NamSinh) && $ChucVu==0 && empty($QueQuan)) {
			return "Vui lòng nhập đầy đủ thông tin";
		}elseif(empty($TaiKhoan)){
			return "Vui lòng nhập tài khoản";
		}elseif(empty($MatKhau)){
			return "Vui lòng nhập mật khẩu";
		}elseif(empty($MatKhau2)){
			return "Vui lòng xác nhận lại mật khẩu";
		}elseif(empty($HoTen)){
			return "Vui lòng nhập họ và tên";
		}elseif(empty($SoDienThoai)){
			return "Vui lòng nhập số điện thoại";
		}elseif(empty($NamSinh)){
			return "Vui lòng chọn năm sinh";
		}elseif($ChucVu==0){
			return "Vui lòng chọn chức vụ";
		}elseif(empty($QueQuan)){
			return "Vui lòng nhập quê quán";
		}else{
			return TRUE;
		}
	}

}

/* End of file QuanLyNguoiDung.php */
/* Location: ./application/controllers/QuanLyNguoiDung.php */