<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')){
			return redirect(base_url("TrangChu/"));
		}
		$this->load->model('Model_Login');

	}

	public function index()
	{
		return $this->load->view('DangNhap');
	}
	public function Login()
	{
		
		$TaiKhoan = $this->input->post('username');

		$MatKhau = $this->input->post('password');
		if(gettype($this->check_null($TaiKhoan,$MatKhau))=="boolean"){
			if(gettype($this->check_number($TaiKhoan,$MatKhau))=="boolean"){

				$result = $this->Model_Login->Login($TaiKhoan, md5($MatKhau));
				if($result > 0){
					$newdata = array(
				        'username'  => $TaiKhoan,
				        'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
					redirect(base_url("TrangChu/"));
				}else{
					$data = array(
						"error" => "Sai tài khoản hoặc mật khẩu",
					);
					return $this->load->view('DangNhap', $data);
				}
				
			}else{
				$data = array(
					"error" => $this->check_number($TaiKhoan, $MatKhau)
				);
				return $this->load->view('DangNhap', $data);
			}
			
		}else{
			$data = array(
				"error" => $this->check_null($TaiKhoan, $MatKhau)
			);
			return $this->load->view('DangNhap', $data);
		}
		
	}
	
		
	public function check_number($TaiKhoan, $MatKhau){
		if(strlen($TaiKhoan) < 5 || strlen($TaiKhoan) >24)
		{
			return "Tài khoản từ 5 đến 24 ký tự";
		}else if(strlen($MatKhau) <5 || strlen($MatKhau)>24)
		{
			return "Mật khẩu từ 5 đến 24 ký tự";
		}else
		{
			return TRUE;
		}
	}
	public function check_null($TaiKhoan, $MatKhau){
		if(empty($TaiKhoan) && empty($MatKhau))
		{
			return "Không được bỏ trống tài khoản mật khẩu";
		}else if(empty($TaiKhoan))
		{
			return "Không được bỏ trống tài khoản";
		}else if(empty($MatKhau))
		{
			return "Không được bỏ trống mật khẩu";
		}else
		{
			return TRUE;
		}
	}
}

/* End of file dangnhap.php */
/* Location: ./application/controllers/dangnhap.php */