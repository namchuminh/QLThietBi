<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class XoaDieuChuyen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TheoDoiDieuChuyen/Model_TheoDoiDieuChuyen');
	}

	public function index($MaDieuChuyen)
	{
		$result = $this->Model_TheoDoiDieuChuyen->Xoa_DieuChuyen($MaDieuChuyen);
		if ($result==True) {
			$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
			$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$result2 = $this->Model_TheoDoiDieuChuyen->Get_DieuByMa($MaDieuChuyen);
			$MaChiTietHoaDoncu = $result2[0]["MaChiTietHoaDonCu"];
			$SoLuong = $result2[0]["SoLuongDieuChuyen"];
			$kq = $this->Model_TheoDoiDieuChuyen->Update_ChiTiet($SoLuong, $MaChiTietHoaDon);
			if ($kq==True) {
				$data = array(
					'alert'=>"Xóa Thành Công",
					'DieuChuyen' =>$DieuChuyen,
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc
				);
				//return redirect(base_url("theo-doi-dieu-chuyen/"));
			}else{
				$data = array(
					'error'=>"Xóa That Bai",
					'DieuChuyen' =>$DieuChuyen,
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc
				);
				return $this->load->view('TheoDoiDieuChuyen/index',$data);
			}
			
		}else{
			$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
			$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$data = array(
				'error'=>"Xóa thất bại",
				'DieuChuyen' =>$DieuChuyen,
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc
			);
			return $this->load->view('TheoDoiDieuChuyen/index',$data);
		}
		
	}

}

/* End of file Xoa_DieuChuyen.php */
/* Location: ./application/controllers/Xoa_DieuChuyen.php */