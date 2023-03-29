<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class XoaChiTiet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TangThietBi/Model_XoaChiTiet');
	}

	public function index($MaChungTu, $MaChiTietHoaDon)
	{
		
		$result = $this->Model_XoaChiTiet->XoaChiTiet($MaChungTu, $MaChiTietHoaDon);
		if ($result==True) {
			$ChungTu = $this->Model_TangThietBi->Get_ChungTuById($MaChungTu);
			$ChiTietHoaDon = $this->Model_ThemChiTiet->Get_ChiTiet($MaChungTu);
			$data = array(
				'ChiTietHoaDon'=>$ChiTietHoaDon,
				'ChungTu' => $ChungTu,
			);
			return redirect(base_url('tang-thiet-bi/chi-tiet/'.$MaChungTu),$data);
		}else{
			$ChungTu = $this->Model_TangThietBi->Get_ChungTuById($MaChungTu);
			$ChiTietHoaDon = $this->Model_ThemChiTiet->Get_ChiTiet($MaChungTu);
			$data = array(
				'alert'=> 'Xóa thất bại',
				'ChiTietHoaDon'=>$ChiTietHoaDon,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/ChiTiet', $data);
		}
	}

}

/* End of file XoaChungTu.php */
/* Location: ./application/controllers/XoaChungTu.php */