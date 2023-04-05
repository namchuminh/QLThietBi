<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
	}

	public function index()
	{
		return $this->load->view('TheoDoiDieuChuyen/index');
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */