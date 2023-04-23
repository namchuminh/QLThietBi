<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GhiNhanThietBiMat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TheoDoiDieuChuyen/Model_TheoDoiDieuChuyen');
		$this->load->model('GhiNhanThietBiMat/Model_GhiNhanThietBiMat');
	}

	public function index()
	{
		$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMat();
		$data = array(
			'BaoMat'=>$BaoMat,
		);
		return $this->load->view('GhiNhanThietBiMat/index', $data);
	}
	public function LietKe()
	{
		$TuNgay = $this->input->post('TuNgay');
		$ToiNgay = $this->input->post('ToiNgay');
		$TenThietBi = $this->input->post('TenThietBi');
		$MaCaBiet = $this->input->post('MaCaBiet');

		if (empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet)) {
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMat();
			$data = array(
				'error'=>"vui lòng nhập thông tin",
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}elseif(empty($TuNgay) && !empty($ToiNgay)){
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMat();
			$data = array(
				'error'=>"Vui lòng nhập ngày bắt đầu",
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMatByDate1($TuNgay, $ToiNgay);
			$data = array(
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}elseif(!empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMatByDate2($TuNgay);
			$data = array(
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMatByName($TenThietBi);
			$data = array(
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && !empty($MaCaBiet) ){
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMatByMaCaBiet($MaCaBiet);
			$data = array(
				'BaoMat'=>$BaoMat,
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}
		
	}
	public function KhoiPhuc($MaGhiNhanMat)
	{
		$KhoiPhuc = $this->Model_GhiNhanThietBiMat->KhoiPhuc($MaGhiNhanMat);
		if ($KhoiPhuc == true) {
			return redirect(base_url("ghi-nhan-thiet-bi-mat"));
		}else{
			$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMat();
			$data = array(
				'BaoMat'=>$BaoMat,
				"error"=>"Xoa that bai",
			);
			$this->load->view('GhiNhanThietBiMat/index', $data);
		}
	}
	public function BaoMat()
	{
		$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
		$Kho = $this->Model_TangThietBi->Get_Kho();
		//$BaoMat = $this->Model_GhiNhanThietBiMat->GetAll_BaoMat();
		$data = array(
			'Kho'=>$Kho,
			'MonHoc'=>$MonHoc,
			//'BaoMat'=>$BaoMat,
		);
		return $this->load->view('GhiNhanThietBiMat/GhiNhanThietBiMat',$data);
	}
	public function ThemBaoMat()
	{
		$MaMonHoc = $this->input->post('MonHoc');
		$MaKho = $this->input->post('MaKho');
		$MaThietBi = $this->input->post('MaThietBi');
		$SoLuongMat = $this->input->post('SoLuongMat');
		$NguoiPhatHien = $this->input->post('NguoiPhatHien');
		$NgayPhatHien = $this->input->post('NgayPhatHien');
		$LyDoMat = $this->input->post('LyDoMat');
		$SoBienBan = $this->input->post('SoBienBan');
		if (gettype($this->check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan))=="boolean") {
			if (gettype($this->check_number($SoLuongMat, $SoBienBan))=="boolean") {
				if (gettype($this->check_text($NguoiPhatHien))=="boolean") {
					$result = $this->Model_GhiNhanThietBiMat->ThemBaoMat($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan);
					if ($result==True) {
						return redirect(base_url("ghi-nhan-thiet-bi-mat"));
					}else{
						$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
						$Kho = $this->Model_TangThietBi->Get_Kho();
						$data = array(
							'error'=>"Thêm thất bại",
							'Kho'=>$Kho,
							'MonHoc'=>$MonHoc
						);
						return $this->load->view('GhiNhanThietBiMat/GhiNhanThietBiMat',$data);
					}
				}else{
					$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
					$Kho = $this->Model_TangThietBi->Get_Kho();
					$data = array(
						'error'=>$this->check_text($NguoiPhatHien),
						'Kho'=>$Kho,
						'MonHoc'=>$MonHoc
					);
					return $this->load->view('GhiNhanThietBiMat/GhiNhanThietBiMat',$data);
				}
			}else{
				$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
				$Kho = $this->Model_TangThietBi->Get_Kho();
				$data = array(
					'error'=>$this->check_number($SoLuongMat, $SoBienBan),
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc
				);
				return $this->load->view('GhiNhanThietBiMat/GhiNhanThietBiMat',$data);
			}
		}else{
			$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$data = array(
				'error'=>$this->check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan),
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc
			);
			return $this->load->view('GhiNhanThietBiMat/GhiNhanThietBiMat',$data);
		}
		
	}
	public function check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan)
	{
		if($MaMonHoc ==0 && $MaKho==0 && $MaThietBi==0 && empty($SoLuongMat)&& empty($NguoiPhatHien) && empty($NgayPhatHien) && empty($LyDoMat) && empty($SoBienBan)){
			return "Vui lòng nhập đầy đủ thông tin";
		}elseif($MaMonHoc ==0){
			return "Vui lòng chọn môn học";
		}elseif($MaKho==0){
			return "Vui lòng chọn kho";
		}elseif($MaThietBi==0){
			return "Vui lòng chọn thiết bị";
		}elseif(empty($SoLuongMat)){
			return "Vui lòng nhập số lượng mất";
		}elseif(empty($NguoiPhatHien)){
			return "Vui lòng nhập người phát hiện";
		}elseif(empty($NgayPhatHien)){
			return "Vui lòng chọn ngày phát hiện";
		}elseif(empty($LyDoMat)){
			return "Vui lòng nhập lý do mất";
		}elseif(empty($SoBienBan)){
			return "Vui lòng nhập số biên bản";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuongMat, $SoBienBan){
		if(is_numeric($SoLuongMat)!=1){
			return "Số lượng mất chỉ được nhập số";
		}if(is_numeric($SoBienBan)!=1){
			return "Số biên bản chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	public function check_text($NguoiPhatHien){
		if(is_string($NguoiPhatHien)!=1){
			return "Người phát hiện chỉ được nhập chữ cái";
		}else{
			return TRUE;
		}
	}
}

/* End of file GhiNhanThietBi.php */
/* Location: ./application/controllers/GhiNhanThietBi.php */