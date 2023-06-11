<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class XoaChungTu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_XoaChungTu');
	}

	public function index($MaChungTu)
	{
		
		$result = $this->Model_XoaChungTu->Xoa($MaChungTu);
		if ($result==True) {
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return redirect(base_url('tang-thiet-bi'));
		}else{
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				'result'=>'Xóa thất bại!',
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}
	}

}

/* End of file XoaChungTu.php */
/* Location: ./application/controllers/XoaChungTu.php */