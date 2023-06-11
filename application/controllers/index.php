<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('Model_Login');
	}

	public function index()
	{
		$username = $this->session->userdata("username");
		$result = $this->Model_Login->Login2($username);
		$data = array(
			"username" => $username,
			"userinfo" => $result,
		);
		return $this->load->view('TrangChu', $data);
	}


}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */