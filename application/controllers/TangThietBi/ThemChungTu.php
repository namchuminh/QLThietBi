<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThemChungTu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');

	}

	public function index()
	{
		
		
		$Kho = $this->Model_TangThietBi->Get_Kho();
		$NhaCungCap = $this->Model_TangThietBi->Get_NhaCungCap();
		$data = array(
			'Kho' => $Kho,
			'NhaCungCap' => $NhaCungCap,
		);

		return $this->load->view('TangThietBi/ThemChungTu', $data);
		// var_dump($result);
	}
	public function ThemChungTu()
	{
		$NgayNhap = $this->input->post('NgayNhap');
		$SoPhieu = $this->input->post('SoPhieu');
		$LyDoTang = $this->input->post('LyDoTang'); 
		$DienGiai = $this->input->post('DienGiai'); 
		$MaKho = $this->input->post('TenKho'); 
		$MaNhaCungCap = $this->input->post('TenNhaCungCap'); 
		$SohdTaiChinh = $this->input->post('SohdTaiChinh');
		$KyHieu = $this->input->post('KyHieu'); 
		$Ngayhd = $this->input->post('Ngayhd'); 

		//echo $DienGiai;

		$Kho = $this->Model_TangThietBi->Get_Kho();
		$NhaCungCap = $this->Model_TangThietBi->Get_NhaCungCap();
		

		if(gettype($this->check_null($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd))=="boolean"){
			if(gettype($this->check_number($SoPhieu, $SohdTaiChinh))=="boolean"){
				
				$result=$this->Model_TangThietBi->ThemChungTu($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd);
				if($result==True){
					$data = array(
						'alert'=> "Thêm Thành Công",
						'Kho' => $Kho,
						'NhaCungCap' => $NhaCungCap,
					);
					return $this->load->view('TangThietBi/ThemChungTu', $data);
				}else{
					$data = array(
						'alert'=> "Thêm Thất Bại",
						'Kho' => $Kho,
						'NhaCungCap' => $NhaCungCap,
					);
					return $this->load->view('TangThietBi/ThemChungTu', $data);
				}
			}else{
				$data = array(
					'error'=> $this->check_number($SoPhieu, $SohdTaiChinh),
					'Kho' => $Kho,
					'NhaCungCap' => $NhaCungCap,
				);
			
				return $this->load->view('TangThietBi/ThemChungTu', $data);
			}
			
		}else{
			$data = array(
				'error'=> $this->check_null($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd),
				'Kho' => $Kho,
				'NhaCungCap' => $NhaCungCap,
			);
			
			return $this->load->view('TangThietBi/ThemChungTu', $data);
		}
		
	}

	public function check_number($SoPhieu, $SohdTaiChinh){
		if(is_numeric($SoPhieu)!=1){
			return "Số phiếu chỉ được nhập số";
		}elseif (is_numeric($SohdTaiChinh)!=1) {
			return "Số hợp đồng tài chính chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	public function check_null($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd){
		if(empty($NgayNhap) && empty($SoPhieu) && empty($LyDoTang) && empty($DienGiai) && $MaKho==0 && $MaNhaCungCap==0 && empty($SohdTaiChinh) && empty($KyHieu) && empty($Ngayhd)){
			return "Vui lòng nhập nhập thông tin";
		}else if(empty($NgayNhap))
		{
			return "Vui lòng chọn ngày nhập";
		}
		else if(empty($SoPhieu))
		{
			return "Vui lòng nhập số phiếu";
		}
		else if(empty($LyDoTang))
		{
			return "Vui lòng chọn lý do tăng";
		}
		else if(empty($DienGiai))
		{
			return "Vui lòng nhập diễn giải";
		}
		else if($MaKho==0)
		{
			return "Vui lòng chọn kho";
		}
		else if($MaNhaCungCap==0)
		{
			return "Vui lòng chọn nhà cung cấp";
		}
		else if(empty($SohdTaiChinh))
		{
			return "Vui lòng nhập số hóa đơn tài chính";
		}
		else if(empty($KyHieu))
		{
			return "Vui lòng nhập ký hiệu";
		}
		else if(empty($Ngayhd))
		{
			return "Vui lòng chọn ngày hóa đơn";
		}else{
			return TRUE;
		}
	}

}

/* End of file ThemChungTu.php */
/* Location: ./application/controllers/ThemChungTu.php */