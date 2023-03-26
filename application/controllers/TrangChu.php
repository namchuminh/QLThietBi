<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->load->view('TrangChu');
	}

}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */