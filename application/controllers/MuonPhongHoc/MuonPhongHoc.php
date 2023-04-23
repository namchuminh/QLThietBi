<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MuonPhongHoc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MuonPhongHoc/Model_MuonPhongHoc');
		
	}

	public function index()
	{
		$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
		$data = array(
			"MuonPhongHoc"=>$MuonPhong,
		);
		return $this->load->view('MuonPhongHoc/MuonPhong', $data);
	}
	public function Muon()
	{
		$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
		$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
		$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
		$data = array(
			"PhongHoc"=>$PhongHoc,
			"LopHoc"=>$LopHoc,
			"MonHoc"=>$MonHoc,
		);
		return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
	}
	public function Xoa($MaMuonPhongHoc)
	{
		$result = $this->Model_MuonPhongHoc->Delete($MaMuonPhongHoc);
		if ($result==True) {
			return redirect(base_url("muon-phong-hoc"));
		}else{
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				"error"=>"Xóa thất bại",
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}
	}
	public function LietKe()
	{
		$NgayBatDauMuon = $this->input->post('NgayBatDauMuon');
		$NgayKetThucMuon = $this->input->post('NgayKetThucMuon');
		$BuoiHoc = $this->input->post('BuoiHoc');
		if (empty($NgayBatDauMuon) && empty($NgayKetThucMuon ) && empty($BuoiHoc )) {
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập thông tin",
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(empty($NgayBatDauMuon) && !empty($NgayKetThucMuon ) && empty($BuoiHoc )){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập ngày bắt đầu mượn",
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayBatDauMuon) && empty($NgayKetThucMuon ) && empty($BuoiHoc )){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByDate1($NgayBatDauMuon);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayBatDauMuon) && !empty($NgayKetThucMuon ) && empty($BuoiHoc )){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByDate2($NgayBatDauMuon, $NgayKetThucMuon);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(empty($NgayBatDauMuon) && empty($NgayKetThucMuon ) && !empty($BuoiHoc )){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByBuoiHoc($BuoiHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}else{
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập thông tin",
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}

		
	}
	public function MuonPhongHoc()
	{
		$MaPhongHoc = $this->input->post('MaPhongHoc');
		$BuoiHoc = $this->input->post('BuoiHoc');
		$TietHoc = $this->input->post('TietHoc');
		$MaLop = $this->input->post('MaLop');
		$MaMon = $this->input->post('MaMon');
		$TenBaiHoc = $this->input->post('TenBaiHoc');
		$NgayBatDauMuon = $this->input->post('NgayBatDauMuon');
		$NgayKetThucMuon = $this->input->post('NgayKetThucMuon');
		if(gettype($this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon))=="boolean"){
			$check = $this->Model_MuonPhongHoc->Check_TonTai($TietHoc, $NgayBatDauMuon, $NgayKetThucMuon, $MaPhongHoc, $BuoiHoc);
			if ($check==null) {
				$result = $this->Model_MuonPhongHoc->ADD($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon);
				if ($result==True) {
					return redirect(base_url("muon-phong-hoc"));
				}else{
					$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
					$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
					$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
					$data = array(
						"error"=>"Thêm thất bại",
						"PhongHoc"=>$PhongHoc,
						"LopHoc"=>$LopHoc,
						"MonHoc"=>$MonHoc,
					);
					return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
				}
			}else{
				$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
				$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
				$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
				$data = array(
					"error"=>"Phòng đã được mượn",
					"PhongHoc"=>$PhongHoc,
					"LopHoc"=>$LopHoc,
					"MonHoc"=>$MonHoc,
				);
				return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
			}
		}else{
			$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
			$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
			$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
			$data = array(
				"error"=>$this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon),
				"PhongHoc"=>$PhongHoc,
				"LopHoc"=>$LopHoc,
				"MonHoc"=>$MonHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
		}
		
	}
	public function check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon)
	{
		if ($MaPhongHoc==0 && $BuoiHoc==0  && $TietHoc==0  && $MaLop==0  && $MaMon==0  && empty($TenBaiHoc)  && empty($NgayBatDauMuon) && empty($NgayKetThucMuon)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif($MaPhongHoc==0 ){
			return "Vui lòng chọn phòng học";
		}elseif($BuoiHoc==0 ){
			return "Vui lòng chọn buổi học";
		}elseif($TietHoc==0 ){
			return "Vui lòng chọn tiết học";
		}elseif($MaLop==0 ){
			return "Vui lòng chọn môn học";
		}elseif(empty($TenBaiHoc) ){
			return "Vui lòng nhập tên bài học";
		}elseif(empty($NgayBatDauMuon)){
			return "Vui lòng chọn ngày bắt đầu mượn";
		}elseif(empty($NgayKetThucMuon)){
			return "Vui lòng chọn ngày kết thúc mượn";
		}else{
			return TRUE;
		}
		
	}

}

/* End of file MuonPhongHoc.php */
/* Location: ./application/controllers/MuonPhongHoc.php */