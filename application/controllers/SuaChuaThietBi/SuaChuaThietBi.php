<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuaChuaThietBi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
		$this->load->model('SuaThietBi/Model_SuaThietBi');
	}

	public function index()
	{
		$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi();
		$data = array(
			"SuaThietBi"=>$SuaThietBi,
		);
		return $this->load->view('SuaChuaThietBi/index', $data);
	}
	public function LietKe()
	{
		$NgayGhiNhan= $this->input->post('NgayGhiNhan');
		$NgayKetThuc= $this->input->post('NgayKetThuc');
		if (empty($NgayGhiNhan)) {
			$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi();
			$data = array(
				'error'=>"vui lòng chọn ngày bắt đầu",
				"SuaThietBi"=>$SuaThietBi,
			);
			return $this->load->view('SuaChuaThietBi/index', $data);
		}elseif(!empty($NgayGhiNhan) && empty($NgayKetThuc)){
			$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBiByDate1($NgayGhiNhan);
			$data = array(
				"SuaThietBi"=>$SuaThietBi,
			);
			return $this->load->view('SuaChuaThietBi/index', $data);
		}elseif(!empty($NgayGhiNhan) && !empty($NgayKetThuc)){
			$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBiByDate2($NgayGhiNhan, $NgayKetThuc);
			$data = array(
				"SuaThietBi"=>$SuaThietBi,
			);
			return $this->load->view('SuaChuaThietBi/index', $data);
		}
	}
	public function Them()
	{
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		// $MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		// $LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
		$data = array(
			'Kho'=>$Kho,
			// 'MonHoc'=>$MonHoc,
			// 'LopHoc'=>$LopHoc,
		);
		$this->load->view('SuaChuaThietBi/ThemMoi',$data);
	}
	public function ThemSua()
	{
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		$data = array(
			'Kho'=>$Kho,
		);
		$this->load->view('SuaChuaThietBi/ThemMoi',$data);
	}
	public function XoaSua($MaSuaThietBi)
	{
		$result = $this->Model_SuaThietBi->Xoa_SuaThietBi($MaSuaThietBi);
		if ($result==True) {
			return redirect(base_url("sua-chua-thiet-bi"));
		}else{
			$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi();
			$data = array(
				"error"=>"Xóa thất bại",
				"SuaThietBi"=>$SuaThietBi,
			);
			return $this->load->view('SuaChuaThietBi/index', $data);
		}
	}
	public function Sua($MaSuaThietBi){
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi2($MaSuaThietBi);
		$data = array(
			'Kho'=>$Kho,
			"SuaThietBi"=>$SuaThietBi,
		);
		return $this->load->view('SuaChuaThietBi/Sua',$data);
	}
	public function SuaSuaChua($MaSuaThietBi)
	{

		$MaKho = $this->input->post('MaKho');
		$MaThietBi = $this->input->post('MaThietBi');
		$NgayGhiNhan = $this->input->post('NgayGhiNhan');
		$NguoiPhatHien = $this->input->post('NguoiPhatHien');
		$NguoiGaySuCo = $this->input->post('NguoiGaySuCo');
		$HienTuongHong = $this->input->post('HienTuongHong');
		$NguoiGiaiQuyet = $this->input->post('NguoiGiaiQuyet');
		$BienPhap = $this->input->post('BienPhap');
		$NguoiThucHien = $this->input->post('NguoiThucHien');
		$BoPhanSuaChua = $this->input->post('BoPhanDuocSua');
		$NguonKinhPhi = $this->input->post('NguonKinhPhi');
		$KinhPhiSuaChua = $this->input->post('KinhPhiSuaChua');
		$SoLuongHong = $this->input->post('SoLuongHong');
		$KinhPhiSauSua = $this->input->post('KinhPhiSauSuaChua');
		if (gettype($this->check_null($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua))=="boolean") {
			if (gettype($this->check_number($SoLuongHong, $KinhPhiSuaChua, $KinhPhiSauSua))=="boolean") {
				if (gettype($this->check_text($NguoiPhatHien, $NguoiGaySuCo, $NguoiGiaiQuyet, $NguoiThucHien))=="boolean") {
					$result = $this->Model_SuaThietBi->Sua_SuaThietBi($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua,$MaSuaThietBi);
					if ($result==True) {
						return redirect(base_url("sua-chua-thiet-bi"));
						
					}else{
						$Kho = $this->Model_MuonThietBi->Get_Kho();
						$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi2($MaSuaThietBi);
						$data = array(
							"error"=>"Sửa thất bại",
							'Kho'=>$Kho,
							"SuaThietBi"=>$SuaThietBi,
						);
						return $this->load->view('SuaChuaThietBi/Sua',$data);
					}
				}else{
					$Kho = $this->Model_MuonThietBi->Get_Kho();
					$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi2($MaSuaThietBi);
					$data = array(
						"error"=>$this->check_text($NguoiPhatHien, $NguoiGaySuCo, $NguoiGiaiQuyet, $NguoiThucHien),
						'Kho'=>$Kho,
						"SuaThietBi"=>$SuaThietBi,
					);
					return $this->load->view('SuaChuaThietBi/Sua',$data);
				}
			}else{
				$Kho = $this->Model_MuonThietBi->Get_Kho();
				$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi2($MaSuaThietBi);
				$data = array(
					"error"=>$this->check_number($SoLuongHong, $KinhPhiSuaChua, $KinhPhiSauSua),
					'Kho'=>$Kho,
					"SuaThietBi"=>$SuaThietBi,
				);
				return $this->load->view('SuaChuaThietBi/Sua',$data);
				
			}
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi2($MaSuaThietBi);
			$data = array(
				"error"=> $this->check_null($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua),
				'Kho'=>$Kho,
				"SuaThietBi"=>$SuaThietBi,
			);
			return $this->load->view('SuaChuaThietBi/Sua',$data);
			
		}
	}
	public function ThemSuaChiTiet()
	{
		$MaKho = $this->input->post('MaKho');
		$MaThietBi = $this->input->post('MaThietBi');
		$NgayGhiNhan = $this->input->post('NgayGhiNhan');
		$NguoiPhatHien = $this->input->post('NguoiPhatHien');
		$NguoiGaySuCo = $this->input->post('NguoiGaySuCo');
		$HienTuongHong = $this->input->post('HienTuongHong');
		$NguoiGiaiQuyet = $this->input->post('NguoiGiaiQuyet');
		$BienPhap = $this->input->post('BienPhap');
		$NguoiThucHien = $this->input->post('NguoiThucHien');
		$BoPhanSuaChua = $this->input->post('BoPhanDuocSua');
		$NguonKinhPhi = $this->input->post('NguonKinhPhi');
		$KinhPhiSuaChua = $this->input->post('KinhPhiSuaChua');
		$SoLuongHong = $this->input->post('SoLuongHong');
		$KinhPhiSauSua = $this->input->post('KinhPhiSauSuaChua');
		if (gettype($this->check_null($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua))=="boolean") {
			if (gettype($this->check_number($SoLuongHong, $KinhPhiSuaChua, $KinhPhiSauSua))=="boolean") {
				if (gettype($this->check_text($NguoiPhatHien, $NguoiGaySuCo, $NguoiGiaiQuyet, $NguoiThucHien))=="boolean") {
					$result = $this->Model_SuaThietBi->ThemSua($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua);
					if ($result==True) {
						return redirect(base_url("sua-chua-thiet-bi"));
						
					}else{
						$Kho = $this->Model_MuonThietBi->Get_Kho();
						$data = array(
							"error"=>"Thêm thất bại",
							'Kho'=>$Kho,
						);
						$this->load->view('SuaChuaThietBi/ThemMoi',$data);
					}
				}else{
					$Kho = $this->Model_MuonThietBi->Get_Kho();
					$data = array(
						"error"=>$this->check_text($NguoiPhatHien, $NguoiGaySuCo, $NguoiGiaiQuyet, $NguoiThucHien),
						'Kho'=>$Kho,
					);
					$this->load->view('SuaChuaThietBi/ThemMoi',$data);
				}
			}else{
				$Kho = $this->Model_MuonThietBi->Get_Kho();
				$data = array(
					"error"=>$this->check_number($SoLuongHong, $KinhPhiSuaChua, $KinhPhiSauSua),
					'Kho'=>$Kho,
				);
				$this->load->view('SuaChuaThietBi/ThemMoi',$data);
			}
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$data = array(
				"error"=> $this->check_null($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua),
				'Kho'=>$Kho,
			);
			$this->load->view('SuaChuaThietBi/ThemMoi',$data);
		}
		
	}
	public function check_null($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua){
		if ($MaKho==0 && $MaThietBi==0 && empty($NgayGhiNhan) && empty($NguoiPhatHien) && empty($NguoiGaySuCo) && empty($HienTuongHong) && empty($NguoiGiaiQuyet) && empty($BienPhap) && empty($NguoiThucHien) && empty($BoPhanSuaChua) && empty($NguonKinhPhi) && empty($KinhPhiSuaChua) && empty($SoLuongHong) && empty($KinhPhiSauSua)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif($MaKho==0){
			return "Vui lòng chọn kho";
		}elseif($MaThietBi==0){
			return "Vui lòng chọn thiết bị";
		}elseif(empty($NgayGhiNhan)){
			return "Vui lòng chọn ngày ghi nhận";
		}elseif(empty($NguoiPhatHien)){
			return "Vui lòng nhập người phát hiện";
		}elseif(empty($NguoiGaySuCo)){
			return "Vui lòng nhập người gây sự cố";
		}elseif(empty($HienTuongHong)){
			return "Vui lòng nhập hiện tượng hỏng";
		}elseif(empty($NguoiGiaiQuyet)){
			return "Vui lòng nhập người giải quyết";
		}elseif(empty($BienPhap)){
			return "Vui lòng nhập biện pháp";
		}elseif(empty($NguoiThucHien)){
			return "Vui lòng nhập Người thực hiện";
		}elseif(empty($BoPhanSuaChua)){
			return "Vui lòng nhập bộ phận sửa chữa";
		}elseif(empty($NguonKinhPhi)){
			return "Vui lòng nhập nguồn kinh phí";
		}elseif(empty($KinhPhiSuaChua)){
			return "Vui lòng nhập kinh phí sửa chữa";
		}elseif(empty($SoLuongHong)){
			return "Vui lòng nhập số lượng hỏng";
		}elseif(empty($KinhPhiSauSua)){
			return "Vui lòng nhập kinh phí sau sửa";
		}else{
			return TRUE;
		}

	}
	public function check_text($NguoiPhatHien, $NguoiGaySuCo, $NguoiGiaiQuyet, $NguoiThucHien){
		if(is_string($NguoiPhatHien)!=1){
			return "Tên người phat hiện chỉ được nhập chữ cái";
		}elseif(is_string($NguoiGaySuCo)!=1){
			return "Tên người gây sự cố chỉ được nhập chữ cái";
		}elseif(is_string($NguoiGiaiQuyet)!=1){
			return "Tên người giải quyết chỉ được nhập chữ cái";
		}elseif(is_string($NguoiThucHien)!=1){
			return "Tên người thực hiện chỉ được nhập chữ cái";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuongHong, $KinhPhiSuaChua, $KinhPhiSauSua){
		if(is_numeric($SoLuongHong)!=1){
			return "Số lượng hỏng chỉ được nhập số";
		}if(is_numeric($KinhPhiSuaChua)!=1){
			return "Kinh phí sửa chữa chỉ được nhập số";
		}if(is_numeric($KinhPhiSauSua)!=1){
			return "Kinh phí sau sửa chữa chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	public function GiaThietBi($MaThietBi, $MaKho){
		$ChiTiet = $this->Model_SuaThietBi->GetGia($MaThietBi, $MaKho);

		//echo '<option id="GiaThietBi" value="'.$ChiTiet[0]["DonGia"].'">'$ChiTiet[0]["DonGia"].'</option>' ;
		foreach ($ChiTiet as $key => $value) {
			echo '<option id="GiaThietBi" value="'.$value["DonGia"].'">'.$value["DonGia"].'</option>';
		}
	}

}

/* End of file SuaChuaThietBi.php */
/* Location: ./application/controllers/SuaChuaThietBi.php */