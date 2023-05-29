<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MuonPhongHoc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('MuonPhongHoc/Model_MuonPhongHoc');
		
	}

	public function index()
	{
		$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
		$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();

		$data = array(
			"PhongHoc"=>$PhongHoc,
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
	public function SuaMuon($MaMuonPhongHoc)
	{
		$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
		$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
		$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
		$MuonPhongHoc = $this->Model_MuonPhongHoc->GetMuonPhongByMa($MaMuonPhongHoc);
		$data = array(
			"MuonPhongHoc"=>$MuonPhongHoc,
			"PhongHoc"=>$PhongHoc,
			"LopHoc"=>$LopHoc,
			"MonHoc"=>$MonHoc,
		);
		return $this->load->view('MuonPhongHoc/SuaMuonPhongHoc', $data);
	}
	public function Tra($MaMuonPhongHoc)
	{	
		$check=$this->Model_MuonPhongHoc->Check_TonTai2($MaMuonPhongHoc);
		if ($check!=null) {
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();

			$data = array(
				'alert'=>"phòng học đã được trả",
				"PhongHoc"=>$PhongHoc,
				"MuonPhongHoc"=>$MuonPhong,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}else{
			$data = array(
				"MaMuonPhongHoc"=>$MaMuonPhongHoc,
			);
			return $this->load->view('MuonPhongHoc/TraPhongHoc', $data);
		}
		
	}
	public function TraPhongHoc($MaMuonPhongHoc)
	{
		$NgayTraPhong = $this->input->post('NgayTraPhong');
		$TinhTrang = $this->input->post('TinhTrang');
		
		
			if (gettype($this->check_null2($TinhTrang, $NgayTraPhong))=="boolean") {
			$TraPhong = $this->Model_MuonPhongHoc->ADD_Tra($NgayTraPhong, $MaMuonPhongHoc, $TinhTrang);
			if ($TraPhong==True) {
				return redirect(base_url("muon-phong-hoc"));
			}else{
				$data = array(
					"error"=>"Trả thất bại",
					"MaMuonPhongHoc"=>$MaMuonPhongHoc,
				);
				return $this->load->view('MuonPhongHoc/TraPhongHoc', $data);
			}
			}else{
				$data = array(
					"error"=>$this->check_null2($TinhTrang, $NgayTraPhong),
					"MaMuonPhongHoc"=>$MaMuonPhongHoc,
				);
				return $this->load->view('MuonPhongHoc/TraPhongHoc', $data);
			}
		

		
		
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
		$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
		$NgayMuon = $this->input->post('NgayBatDauMuon');
		$NgayKetThucMuon = $this->input->post('NgayKetThucMuon');
		$BuoiHoc = $this->input->post('BuoiHoc');
		$MaPhongHoc = $this->input->post('PhongHoc');
		if (empty($NgayMuon) && empty($NgayKetThucMuon ) && empty($BuoiHoc) && $MaPhongHoc==0) {
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập thông tin",
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif($PhongHoc==0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng chọn phòng",
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(empty($NgayMuon) && !empty($NgayKetThucMuon ) && empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập ngày bắt đầu mượn",
				"MuonPhongHoc"=>$MuonPhong,
				
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayMuon) && empty($NgayKetThucMuon ) && empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByDate1($NgayMuon, $MaPhongHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayMuon) && !empty($NgayKetThucMuon ) && empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByDate2($NgayMuon, $NgayKetThucMuon , $MaPhongHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(empty($NgayMuon) && empty($NgayKetThucMuon ) && !empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByBuoiHoc($BuoiHoc, $MaPhongHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(empty($NgayMuon) && empty($NgayKetThucMuon ) && empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByPhong($MaPhongHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayMuon) && !empty($NgayKetThucMuon ) && !empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByALL($NgayMuon, $NgayKetThucMuon , $MaPhongHoc, $BuoiHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}elseif(!empty($NgayMuon) && empty($NgayKetThucMuon ) && !empty($BuoiHoc ) && $MaPhongHoc!=0){
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhongByALL2($NgayMuon, $MaPhongHoc, $BuoiHoc);
			$data = array(
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhong', $data);
		}else{
			$MuonPhong = $this->Model_MuonPhongHoc->GetMuonPhong();
			$data = array(
				'error'=>"vui lòng nhập thông tin 2",
				"MuonPhongHoc"=>$MuonPhong,
				"PhongHoc"=>$PhongHoc,
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
		$NgayMuon = $this->input->post('NgayMuon');
		$NguoiMuon = $this->input->post('NguoiMuon');
		if(gettype($this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon))=="boolean"){
			$check = $this->Model_MuonPhongHoc->Check_TonTai($TietHoc, $NgayMuon, $MaPhongHoc, $BuoiHoc);
			if ($check==null) {
				$result = $this->Model_MuonPhongHoc->ADD($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon);
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
					"error"=>"Phòng đã được mượn tiết ".$TietHoc." bởi giáo viên: ".$check[0]["NguoiMuon"],
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
				"error"=>$this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon),
				"PhongHoc"=>$PhongHoc,
				"LopHoc"=>$LopHoc,
				"MonHoc"=>$MonHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
		}
		
	}
	public function SuaMuonPhongHoc($MaMuonPhongHoc)
	{
		$MaPhongHoc = $this->input->post('MaPhongHoc');
		$BuoiHoc = $this->input->post('BuoiHoc');
		$TietHoc = $this->input->post('TietHoc');
		$MaLop = $this->input->post('MaLop');
		$MaMon = $this->input->post('MaMon');
		$TenBaiHoc = $this->input->post('TenBaiHoc');
		$NgayMuon = $this->input->post('NgayMuon');
		$NguoiMuon = $this->input->post('NguoiMuon');
		if(gettype($this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon))=="boolean"){
			$check = $this->Model_MuonPhongHoc->Check_TonTai($TietHoc, $NgayMuon, $MaPhongHoc, $BuoiHoc);
			if ($check==null) {
				$result = $this->Model_MuonPhongHoc->Update($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon, $MaMuonPhongHoc);
				if ($result==True) {
					return redirect(base_url("muon-phong-hoc"));
				}else{
					$PhongHoc = $this->Model_MuonPhongHoc->GetPhongHoc();
					$LopHoc = $this->Model_MuonPhongHoc->GetLopHoc();
					$MonHoc = $this->Model_MuonPhongHoc->GetMonHoc();
					$data = array(
						"error"=>"Sua thất bại",
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
					"error"=>"Phòng đã được mượn tiết ".$TietHoc." bởi giáo viên: ".$check[0]["NguoiMuon"],
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
				"error"=>$this->check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon),
				"PhongHoc"=>$PhongHoc,
				"LopHoc"=>$LopHoc,
				"MonHoc"=>$MonHoc,
			);
			return $this->load->view('MuonPhongHoc/MuonPhongHoc', $data);
		}
		
	}
	public function check_null($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon)
	{
		if ($MaPhongHoc==0 && $TietHoc==0  && $MaLop==0  && $MaMon==0  && empty($TenBaiHoc)  && empty($NgayMuon) && empty($NguoiMuon)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif($MaPhongHoc==0 ){
			return "Vui lòng chọn phòng học";
		}elseif($TietHoc==0 ){
			return "Vui lòng chọn tiết học";
		}elseif($MaLop==0 ){
			return "Vui lòng chọn môn học";
		}elseif(empty($TenBaiHoc) ){
			return "Vui lòng nhập tên bài học";
		}elseif(empty($NgayMuon)){
			return "Vui lòng chọn ngày mượn";
		}elseif(empty($NguoiMuon)){
			return "Vui lòng nhập tên người mượn";
		}else{
			return TRUE;
		}
		
	}
	public function check_null2($TinhTrang, $NgayTraPhong)
	{
		if (empty($TinhTrang) && empty($NgayTraPhong)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif(empty($NgayTraPhong)){
			return "Vui lòng chọn ngày trả phòng";
		}elseif(empty($TinhTrang)){
			return "Vui lòng nhập tình trạng trả";
		}else{
			return TRUE;
		}
		
	}

}

/* End of file MuonPhongHoc.php */
/* Location: ./application/controllers/MuonPhongHoc.php */