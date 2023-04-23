<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MuonThietBiDayHoc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
	}

	public function index()
	{
		$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBi();
		//$PhieuTra = $this->Model_MuonThietBi->GetTraThietBi();
		//var_dump($PhieuTra);
		$data = array(
			'MonHoc'=>$MonHoc,
			'MuonThietBi'=>$MuonThietBi,
			//"PhieuTra"=>$PhieuTra,
			
		);
		return $this->load->view('MuonThietBiDayHoc/index', $data);
	}
	public function LietKe(){
		$NgayLamViec = $this->input->post('NgayLamViec');
		$TenGiaoVien = $this->input->post('TenGiaoVien');
		$MonHoc = $this->input->post('MonHoc');
		if (empty($NgayLamViec) && empty($TenGiaoVien) && $MonHoc==0) {
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBi();
			$data = array(
				'error'=>"Vui lòng nhập thông tin",
				'MonHoc'=>$MonHoc,
				'MuonThietBi'=>$MuonThietBi,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/index', $data);
		}elseif(!empty($NgayLamViec) && empty($TenGiaoVien) && $MonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBiByDate($NgayLamViec);
			$data = array(
				'MonHoc'=>$MonHoc,
				'MuonThietBi'=>$MuonThietBi,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/index', $data);
		}elseif(empty($NgayLamViec) && !empty($TenGiaoVien) && $MonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBiByName($TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				'MuonThietBi'=>$MuonThietBi,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/index', $data);
		}elseif(empty($NgayLamViec) && empty($TenGiaoVien) && $MonHoc!=0){
			
			$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBiByMaMon($MonHoc);
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$data = array(
				'MonHoc'=>$MonHoc,
				'MuonThietBi'=>$MuonThietBi,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/index', $data);
		}
	}
	public function MuonThietBi(){
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
		$data = array(
			'Kho'=>$Kho,
			'MonHoc'=>$MonHoc,
			'LopHoc'=>$LopHoc,
		);
		//var_dump($Kho);
		return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
	}
	public function TraThietBi($MaMuonThietBi){
		$PhieuTra = $this->Model_MuonThietBi->GetTraThietBi($MaMuonThietBi);
		if($PhieuTra!=null){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$MuonThietBi = $this->Model_MuonThietBi->Get_MuonThietBi();
			//$PhieuTra = $this->Model_MuonThietBi->GetTraThietBi();
			//var_dump($PhieuTra);
			$data = array(
				'alert'=>"Thiết bị đã được trả",
				'MonHoc'=>$MonHoc,
				'MuonThietBi'=>$MuonThietBi,
				//"PhieuTra"=>$PhieuTra,
				
			);
			return $this->load->view('MuonThietBiDayHoc/index', $data);
		}else{
			$data = array(
				"MaMuonThietBi"=>$MaMuonThietBi,

			);
			return $this->load->view('MuonThietBiDayHoc/TraThietBi', $data);
		}
		
	}
	public function Tra($MaMuonThietBi){
		$NgayTra = $this->input->post('NgayTra');
		$SoLuongTra = $this->input->post('SoLuongTra');
		$TinhTrang = $this->input->post('TinhTrangTra');

		if (gettype($this->check_null3($NgayTra, $SoLuongTra, $TinhTrang))=="boolean") {
			if (gettype($this->check_number3($SoLuongTra))) {
				$result = $this->Model_MuonThietBi->TraThietBi($MaMuonThietBi, $NgayTra, $SoLuongTra, $TinhTrang);
				if ($result==True) {
					return redirect(base_url("muon-tra"));
				}else{
					$data = array(
						'error'=>"Thêm thât bại",
						"MaMuonThietBi"=>$MaMuonThietBi,

					);
					return $this->load->view('MuonThietBiDayHoc/TraThietBi', $data);
				}
			}else{
				$data = array(
					'error'=>$this->check_number3($SoLuongTra),
					"MaMuonThietBi"=>$MaMuonThietBi,

				);
				return $this->load->view('MuonThietBiDayHoc/TraThietBi', $data);
			}
		}else{
			$data = array(
				'error'=>$this->check_null3($NgayTra, $SoLuongTra, $TinhTrang),
				"MaMuonThietBi"=>$MaMuonThietBi,

			);
			return $this->load->view('MuonThietBiDayHoc/TraThietBi', $data);
		}

	}
	public function SuaMuonThietBi($MaMuonThietBi){
		$result = $this->Model_MuonThietBi->Get_MuonThietBiByMa($MaMuonThietBi);
		$data = array(
			"MaMuonThietBi"=>$MaMuonThietBi,
			'Thoigian'=>$result,
		);
		return $this->load->view('MuonThietBiDayHoc/GiaHanMuon',$data);
		
	}
	public function GiaHanMuonThietBi($MaMuonThietBi){
		$NgayTra = $this->input->post('NgayHenTra');
		$result = $this->Model_MuonThietBi->GiaHanMuon($NgayTra, $MaMuonThietBi);
		if ($result==True) {
			return redirect(base_url("muon-tra"));
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
			$data = array(
				"error"=>"Sua that bai",
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc,
				'LopHoc'=>$LopHoc,
			);
			return $this->load->view('MuonThietBiDayHoc/GiaHanMuon',$data);
		}
		
		
	}
	public function XoaMuonThietBi($MaMuonThietBi){
		$result = $this->Model_MuonThietBi->Xoa_PhieuMuon($MaMuonThietBi);
		if ($result==True) {
			return redirect(base_url("muon-tra"));
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
			$data = array(
				'error'=>"xoa that bai",
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc,
				'LopHoc'=>$LopHoc,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
		}
		
	}
	public function ThemChiTiet($MaMuonThietBi){
		$Chitiet = $this->Model_MuonThietBi->Get_ChiTiet($MaMuonThietBi);
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
		$data = array(
			'Chitiet'=>$Chitiet,
			'Kho'=>$Kho,
			'MonHoc'=>$MonHoc,
			'LopHoc'=>$LopHoc,
			'MaMuonThietBi'=>$MaMuonThietBi,
		);
		//var_dump($data);
		return $this->load->view('MuonThietBiDayHoc/ThemChiTiet',$data);
	}
	public function XoaChiTiet($MaMuonThietBi, $MaChiTietPhieuMuon){
		$result = $this->Model_MuonThietBi->Xoa_ChiTiet($MaChiTietPhieuMuon);
		if ($result==True) {
			return redirect(base_url("muon-tra/them-chi-tiet/").$MaMuonThietBi);
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
			$data = array(
				'error'=>"xoa that bai",
				'Chitiet'=>$Chitiet,
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc,
				'LopHoc'=>$LopHoc,
				'MaMuonThietBi'=>$MaMuonThietBi,
			);
			return $this->load->view('MuonThietBiDayHoc/ThemChiTiet',$data);
		}
		//return $this->load->view('MuonThietBiDayHoc/ThemChiTiet',$data);
	}
	public function ThemChiTietThem($MaMuonThietBi){
		$Chitiet = $this->Model_MuonThietBi->Get_ChiTiet($MaMuonThietBi);
		$MaLop = $this->input->post('LopHoc');
		$MaMonHoc = $this->input->post('MonHoc');
		$SoTiet = $this->input->post('TietHoc');
		$TenBaiHoc = $this->input->post('TenBaiHoc');
		if (gettype($this->check_null2($MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc))=="boolean") {
			$result = $this->Model_MuonThietBi->ThemChiTiet($MaMuonThietBi, $MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc);
			if ($result==True) {
				return redirect(base_url("muon-tra/them-chi-tiet/").$MaMuonThietBi);
			}else{
				$Kho = $this->Model_MuonThietBi->Get_Kho();
				$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
				$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
				$data = array(
					'Chitiet'=>$Chitiet,
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc,
					'LopHoc'=>$LopHoc,
					'MaMuonThietBi'=>$MaMuonThietBi,
				);
				return $this->load->view('MuonThietBiDayHoc/ThemChiTiet',$data);
			}
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
			$data = array(
				"error"=>$this->check_null2($MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc),
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc,
				'LopHoc'=>$LopHoc,
				'MaMuonThietBi'=>$MaMuonThietBi,
			);
			return $this->load->view('MuonThietBiDayHoc/ThemChiTiet',$data);
		}

		
	}
	public function ThemMuonThietBi(){

		$NgayMuon = $this->input->post('NgayMuon');
		$NgayTra = $this->input->post('NgayHenTra'); 
		$SoPhieu = $this->input->post('SoPhieu');
		$MaThietBi = $this->input->post('MaThietBi'); 
		$SoLuongMuon = $this->input->post('SoLuongMuon');
		$NguoiMuon = $this->input->post('NguoiMuon');
		$GhiChu = $this->input->post('GhiChu');
		$MaKho = $this->input->post('MaKho');
		if (gettype($this->check_null($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu))=="boolean") {
			if (gettype($this->check_number($SoPhieu, $SoLuongMuon))=="boolean") {
				if (gettype($this->check_text($NguoiMuon))=="boolean") {
					
					$result = $this->Model_MuonThietBi->ThemMuonThietBi($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu);
					if ($result==True) {
						return redirect(base_url("muon-tra"));
					}else{
						$Kho = $this->Model_MuonThietBi->Get_Kho();
						$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
						$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
						$data = array(
							'error'=>"Them that bai",
							'Kho'=>$Kho,
							'MonHoc'=>$MonHoc,
							'LopHoc'=>$LopHoc,
						);
						//var_dump($Kho);
						return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
					}
				}else{
					$Kho = $this->Model_MuonThietBi->Get_Kho();
					$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
					$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
					$data = array(
						'error'=>$this->check_text($NguoiMuon),
						'Kho'=>$Kho,
						'MonHoc'=>$MonHoc,
						'LopHoc'=>$LopHoc,
					);
					//var_dump($Kho);
					return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
				}
			}else{
				$Kho = $this->Model_MuonThietBi->Get_Kho();
				$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
				$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
				$data = array(
					'error'=>$this->check_number($SoPhieu, $SoLuongMuon),
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc,
					'LopHoc'=>$LopHoc,
				);
				//var_dump($Kho);
				return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
			}
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$LopHoc = $this->Model_MuonThietBi->Get_LopHoc();
			$data = array(
				'error'=>$this->check_null($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu),
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc,
				'LopHoc'=>$LopHoc,
			);
			//var_dump($Kho);
			return $this->load->view('MuonThietBiDayHoc/MuonThietBi', $data);
		}
	}
	public function ThietBi($MaKho)
	{
		echo '<option value="0" hidden>Chọn thiết bị</option>';
		$ThietBi = $this->Model_MuonThietBi->Get_ThietBi($MaKho);
		if ($ThietBi==null) {
			echo '<option value="0">Chưa có thiết bị nào</option>';
		}

		foreach ($ThietBi as $key => $value) {
			echo '<option id="MaThietBi" value="'.$value["MaThietBi"].'">'.$value["TenThietBi"].'</option>';
		}
	}
	public function check_null($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu){
		if (empty($NgayMuon) && empty($NgayTra) && empty($SoPhieu)  && $MaThietBi==0 && empty($SoLuongMuon) && empty($NguoiMuon) && $MaKho==0 && empty($GhiChu)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif(empty($NgayMuon)){
			return "Vui lòng nhập ngày mượn";
		}elseif(empty($NgayTra)){
			return "Vui lòng nhập ngày trả";
		}elseif(empty($SoPhieu)){
			return "Vui lòng nhập số phiếu";
		}elseif($MaThietBi==0){
			return "Vui lòng nhập mã thiết bị";
		}elseif(empty($SoLuongMuon)){
			return "Vui lòng nhập số lượng mượn";
		}elseif(empty($NguoiMuon)){
			return "Vui lòng nhập người mượn";
		}elseif($MaKho==0){
			return "Vui lòng nhập mã kho";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoPhieu, $SoLuongMuon){
		if(is_numeric($SoPhieu)!=1){
			return "Số lượng phiếu chỉ được nhập số";
		}if(is_numeric($SoLuongMuon)!=1){
			return "Số lượng mượn chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	public function check_text($NguoiMuon){
		if(is_string($NguoiMuon)!=1){
			return "Người mượn chỉ được nhập chữ cái";
		}else{
			return TRUE;
		}
	}
	public function check_null2($MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc){
		if ($MaLop==0 && $MaMonHoc==0 && $SoTiet==0 && empty($TenBaiHoc)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif($MaLop==0){
			return "Vui lòng chọn lớp";
		}elseif($MaMonHoc==0){
			return "Vui lòng chọn môn học";
		}elseif($SoTiet==0){
			return "Vui lòng chọn tiết học";
		}elseif(empty($TenBaiHoc)){
			return "Vui lòng nhập tên bài học";
		}else{
			return TRUE;
		}
	}
	public function check_null3($NgayTra, $SoLuongTra, $TinhTrang){
		if (empty($NgayTra) && empty($SoLuongTra) && empty($TinhTrang)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif(empty($NgayTra)){
			return "Vui lòng chọn ngày trả";
		}elseif(empty($SoLuongTra)){
			return "Vui lòng nhập số lượng trả";
		}elseif(empty($TinhTrang)){
			return "Vui lòng nhập tình trạng trả";
		}else{
			return TRUE;
		}
	}
	public function check_number3($SoLuongTra){
		if(is_numeric($SoLuongTra)!=1){
			return "Số lượng trả chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
}

/* End of file MuonThietBiDayHoc.php */
/* Location: ./application/controllers/MuonThietBiDayHoc.php */