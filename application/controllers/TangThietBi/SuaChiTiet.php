<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuaChiTiet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_SuaChiTiet');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
	}

	public function index($MaChungTu, $MaChiTietHoaDon)
	{
		
		$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
		$ThietBi = $this->Model_ThemChiTiet->Get_ThietBi();
		$QuanLyThietBi = $this->Model_ThemChiTiet->Get_QuanLyThietBi();
		$ChiTietHoaDon = $this->Model_SuaChiTiet->Get_ChiTiet_ById($MaChungTu, $MaChiTietHoaDon);
		$data = array(	
			'ThietBi'=>$ThietBi,
			'QuanLyThietBi'=> $QuanLyThietBi,
			'MonHoc'=>$MonHoc,
			'MaChungTu' => $MaChungTu,
			'ChiTietHoaDon' => $ChiTietHoaDon,
		);
		return $this->load->view('TangThietBi/SuaChiTiet', $data);
	}
	public function Sua($MaChungTu, $MaChiTietHoaDon)
	{
		
		$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
		$ThietBi = $this->Model_ThemChiTiet->Get_ThietBi();
		$QuanLyThietBi = $this->Model_ThemChiTiet->Get_QuanLyThietBi();
		$ChiTietHoaDon = $this->Model_SuaChiTiet->Get_ChiTiet_ById($MaChungTu, $MaChiTietHoaDon);


		$MaMonHoc = $this->input->post('MonHoc');
		$KhoiLop = $this->input->post('KhoiLop');
		$MaThietBi = $this->input->post('MaThietBi');
		$SoLuong = $this->input->post('SoLuong');
		$DonGia = $this->input->post('DonGia');
		$MaQuanLyThietBi = $this->input->post('MaQuanLyThietBi');
		$DonViTinh = $this->input->post('DonViTinh');
		$Vat = $this->input->post('Vat');
		$ThanhTien = $this->input->post('ThanhTien');
		$ThoiGianKhauHao = $this->input->post('ThoiGianKhauHao');

		if(gettype($this->check_null($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao))=="boolean"){
			if (gettype($this->check_number($SoLuong, $DonGia, $Vat, $ThanhTien, $ThoiGianKhauHao))=="boolean") {
				$result = $this->Model_SuaChiTiet->SuaChiTiet($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao, $MaChungTu,$MaChiTietHoaDon);
				if($result==True){
					$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
					$ThietBi = $this->Model_ThemChiTiet->Get_ThietBi();
					$QuanLyThietBi = $this->Model_ThemChiTiet->Get_QuanLyThietBi();
					$ChiTietHoaDon = $this->Model_SuaChiTiet->Get_ChiTiet_ById($MaChungTu, $MaChiTietHoaDon);
					$data = array(
						'ThanhCong'=>"Sửa thành công",
						'ThietBi'=>$ThietBi,
						'QuanLyThietBi'=> $QuanLyThietBi,
						'MonHoc'=>$MonHoc,
						'MaChungTu' => $MaChungTu,
						'ChiTietHoaDon' => $ChiTietHoaDon,					
					);
					return $this->load->view('TangThietBi/SuaChiTiet', $data);
				}else{
					$data = array(	
						'error' => "Sua that bai",
						'ThietBi'=>$ThietBi,
						'QuanLyThietBi'=> $QuanLyThietBi,
						'MonHoc'=>$MonHoc,
						'MaChungTu' => $MaChungTu,
						'ChiTietHoaDon' => $ChiTietHoaDon,
					);
					return $this->load->view('TangThietBi/SuaChiTiet', $data);
				}
			}else{
				$data = array(
					'error' => $this->check_number($SoLuong, $DonGia, $Vat, $ThanhTien, $ThoiGianKhauHao),
					'ThietBi'=>$ThietBi,
					'QuanLyThietBi'=> $QuanLyThietBi,
					'MonHoc'=>$MonHoc,
					'MaChungTu' => $MaChungTu,
					'ChiTietHoaDon' => $ChiTietHoaDon,
				);
				return $this->load->view('TangThietBi/SuaChiTiet', $data);
			}
			
		}else{
			$data = array(
				'error' => $this->check_null($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao),
				'ThietBi'=>$ThietBi,
				'QuanLyThietBi'=> $QuanLyThietBi,
				'MonHoc'=>$MonHoc,
				'MaChungTu' => $MaChungTu,
				'ChiTietHoaDon' => $ChiTietHoaDon,
			);
			return $this->load->view('TangThietBi/SuaChiTiet', $data);
		}
		
	}
	public function check_null($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao){
		if ($MaMonHoc==0) {
			return "Vui lòng chọn môn học";
		}else if($KhoiLop==0){
			return "Vui lòng chọn khối lớp";
		}else if($MaThietBi==0){
			return "Vui lòng chọn thiết bị";
		}else if(empty($SoLuong)){
			return "Vui nhập số lượng";
		}else if(empty($DonGia)){
			return "Vui nhập đơn giá";
		}else if($MaQuanLyThietBi==0){
			return "Vui chọn mã quản lý thiết bị";
		}else if($DonViTinh==0){
			return "Vui chọn đơn vị tính";
		}else if(empty($Vat)){
			return "Vui nhập VAT";
		}else if(empty($ThanhTien)){
			return "Vui nhập thành tiền";
		}else if(empty($ThoiGianKhauHao)){
			return "Vui thời gian khấu hao";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuong, $DonGia, $Vat, $ThanhTien, $ThoiGianKhauHao){
		if(is_numeric($SoLuong)!=1){
			return "Số lượng chỉ được nhập số";
		}elseif (is_numeric($DonGia)!=1) {
			return "Đơn giá chỉ được nhập số";
		}elseif (is_numeric($Vat)!=1) {
			return "Vat chỉ được nhập số";
		}elseif (is_numeric($ThanhTien)!=1) {
			return "Thành tiền chỉ được nhập số";
		}elseif (is_numeric($ThoiGianKhauHao)!=1) {
			return "Thời gian khấu hao chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	
}

/* End of file XoaChungTu.php */
/* Location: ./application/controllers/XoaChungTu.php */