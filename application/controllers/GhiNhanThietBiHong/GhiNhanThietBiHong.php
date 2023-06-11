<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GhiNhanThietBiHong extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TheoDoiDieuChuyen/Model_TheoDoiDieuChuyen');
		$this->load->model('GhiNhanThietBiHong/Model_GhiNhanThietBiHong');
	}

	public function index()
	{
		$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
		$data = array(
			'BaoHong'=>$BaoHong,
		);
		//var_dump($BaoHong);
		return $this->load->view('GhiNhanThietBiHong/index', $data);
	}
	public function Load_Data($MaMonHoc, $MaKho)
	{
		$result = $this->Model_GhiNhanThietBiHong->Get_DataLoad($MaMonHoc, $MaKho);
		foreach ($result as $key => $value) {
			echo "<tr>";
			echo "<td>".$value['MaThietBi']."</td>";
            echo "<td>".$value['TenThietBi']."</td>";
            echo "<td>".$value['KyHieu']."</td>";
            echo '<td style="cursor:pointer" id="btn">'.'<i class="fa-solid fa-check"></i>'."</td>";
			echo "</tr>";
		}
	}
	public function LietKe()
	{
		$TuNgay = $this->input->post('TuNgay');
		$ToiNgay = $this->input->post('ToiNgay');
		$TenThietBi = $this->input->post('TenThietBi');
		$MaCaBiet = $this->input->post('MaCaBiet');

		if (empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet)) {
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
			$data = array(
				'error'=>"vui lòng nhập thông tin",
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}elseif(empty($TuNgay) && !empty($ToiNgay)){
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
			$data = array(
				'error'=>"Vui lòng nhập ngày bắt đầu",
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHongByDate1($TuNgay, $ToiNgay);
			$data = array(
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}elseif(!empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHongByDate2($TuNgay);
			$data = array(
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenThietBi) && empty($MaCaBiet) ){
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHongByName($TenThietBi);
			$data = array(
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && !empty($MaCaBiet) ){
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHongByMaCaBiet($MaCaBiet);
			$data = array(
				'BaoHong'=>$BaoHong,
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}
		
	}
	public function KhoiPhuc($MaGhiNhanHong)
	{
		$KhoiPhuc = $this->Model_GhiNhanThietBiHong->KhoiPhuc($MaGhiNhanHong);
		if ($KhoiPhuc == true) {
			return redirect(base_url("ghi-nhan-thiet-bi-hong"));
		}else{
			$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
			$data = array(
				'BaoHong'=>$BaoHong,
				"error"=>"Xoa that bai",
			);
			$this->load->view('GhiNhanThietBiHong/index', $data);
		}
	}
	public function BaoHong()
	{
		$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
		$Kho = $this->Model_TangThietBi->Get_Kho();
		$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
		$data = array(
			'Kho'=>$Kho,
			'MonHoc'=>$MonHoc,
			'BaoHong'=>$BaoHong,
		);
		return $this->load->view('GhiNhanThietBiHong/GhiNhanThietBiHong',$data);
	}
	public function ThemBaoHong()
	{
		$MaMonHoc = $this->input->post('MonHoc');
		$MaKho = $this->input->post('MaKho');
		$MaThietBi = $this->input->post('MaThietBi');
		$SoLuongHong = $this->input->post('SoLuongHong');
		$NguoiPhatHien = $this->input->post('NguoiPhatHien');
		$NgayPhatHien = $this->input->post('NgayPhatHien');
		$LyDoHong = $this->input->post('LyDoHong');
		$SoBienBan = $this->input->post('SoBienBan');
		if (gettype($this->check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan))=="boolean") {
			if (gettype($this->check_number($SoLuongHong, $SoBienBan))=="boolean") {
				if (gettype($this->check_text($NguoiPhatHien))=="boolean") {
					$result = $this->Model_GhiNhanThietBiHong->ThemBaoHong($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan);
					if ($result==True) {
						return redirect(base_url("ghi-nhan-thiet-bi-hong"));
					}else{
						$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
						$Kho = $this->Model_TangThietBi->Get_Kho();
						$data = array(
							'error'=>"Thêm thất bại",
							'Kho'=>$Kho,
							'MonHoc'=>$MonHoc
						);
						return $this->load->view('GhiNhanThietBiHong/GhiNhanThietBiHong',$data);
					}
				}else{
					$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
					$Kho = $this->Model_TangThietBi->Get_Kho();
					$data = array(
						'error'=>$this->check_text($NguoiPhatHien),
						'Kho'=>$Kho,
						'MonHoc'=>$MonHoc
					);
					return $this->load->view('GhiNhanThietBiHong/GhiNhanThietBiHong',$data);
				}
			}else{
				$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
				$Kho = $this->Model_TangThietBi->Get_Kho();
				$data = array(
					'error'=>$this->check_number($SoLuongHong, $SoBienBan),
					'Kho'=>$Kho,
					'MonHoc'=>$MonHoc
				);
				return $this->load->view('GhiNhanThietBiHong/GhiNhanThietBiHong',$data);
			}
		}else{
			$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
			$Kho = $this->Model_TangThietBi->Get_Kho();
			$data = array(
				'error'=>$this->check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan),
				'Kho'=>$Kho,
				'MonHoc'=>$MonHoc
			);
			return $this->load->view('GhiNhanThietBiHong/GhiNhanThietBiHong',$data);
		}
		
	}
	public function check_null($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan)
	{
		if($MaMonHoc ==0 && $MaKho==0 && $MaThietBi==0 && empty($SoLuongHong)&& empty($NguoiPhatHien) && empty($NgayPhatHien) && empty($LyDoHong) && empty($SoBienBan)){
			return "Vui lòng nhập đầy đủ thông tin";
		}elseif($MaMonHoc ==0){
			return "Vui lòng chọn môn học";
		}elseif($MaKho==0){
			return "Vui lòng chọn kho";
		}elseif($MaThietBi==0){
			return "Vui lòng chọn thiết bị";
		}elseif(empty($SoLuongHong)){
			return "Vui lòng nhập số lượng hỏng";
		}elseif(empty($NguoiPhatHien)){
			return "Vui lòng nhập người phát hiện";
		}elseif(empty($NgayPhatHien)){
			return "Vui lòng chọn ngày phát hiện";
		}elseif(empty($LyDoHong)){
			return "Vui lòng nhập lý do hỏng";
		}elseif(empty($SoBienBan)){
			return "Vui lòng nhập số biên bản";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuongHong, $SoBienBan){
		if(is_numeric($SoLuongHong)!=1){
			return "Số lượng hỏng chỉ được nhập số";
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