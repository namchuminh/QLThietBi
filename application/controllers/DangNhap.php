<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->load->view('DangNhap');
	}

}

/* End of file dangnhap.php */
/* Location: ./application/controllers/dangnhap.php */