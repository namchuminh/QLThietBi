<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChiTiet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');
	}

	public function index($MaChungTu)
	{
		$ChungTu = $this->Model_TangThietBi->Get_ChungTuById($MaChungTu);
		$data = array(
			'ChungTu' => $ChungTu,
		);
		return $this->load->view('TangThietBi/ChiTiet', $data);
	}

	public function Them($MaChungTu){
		$data = array(
			'MaChungTu' => $MaChungTu,
		);
		return $this->load->view('TangThietBi/ThemChiTiet', $data);
	}

}

/* End of file ChiTiet.php */
/* Location: ./application/controllers/ChiTiet.php */