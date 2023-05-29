<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThanhLyThietBi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
		$this->load->model('ThanhLyThietBi/Model_ThanhLyThietBi');
	}

	public function index()
	{
		$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();
		$data= array(
			"ThanhLyThietBi"=>$ThanhLyThietBi,
		);
		return $this->load->view('ThanhLyThietBi/index', $data);
	}
	public function KhoiPhuc($MaThanhLyThietBi)
	{
		$KhoiPhuc = $this->Model_ThanhLyThietBi->KhoiPhuc($MaThanhLyThietBi);
		if ($KhoiPhuc == true) {
			return redirect(base_url("thanh-ly-thiet-bi"));
		}else{
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();
			$data= array(
				'error'=>"xóa thât bại",
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}
		
	}
	public function LietKe()
	{
		$TuNgay = $this->input->post('TuNgay');
		$ToiNgay = $this->input->post('ToiNgay');
		$TenThietBi = $this->input->post('TenThietBi');
		$MaCaBiet = $this->input->post('MaCaBiet');
		if (empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();
			$data= array(
				"error"=>"vui lòng nhập thông tin",
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}elseif (empty($TuNgay) && !empty($ToiNgay)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();
			$data= array(
				"error"=>"vui lòng nhập ngày bắt đầu",
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}elseif (empty($TuNgay) && empty($ToiNgay) && !empty($TenThietBi) && empty($MaCaBiet)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_AllByName($TenThietBi);
			$data= array(
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}elseif (empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && !empty($MaCaBiet)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_AllByMaCaBiet($MaCaBiet);
			$data= array(
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}elseif (!empty($TuNgay) && empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_AllByDate1($TuNgay);
			$data= array(
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}elseif (!empty($TuNgay) && !empty($ToiNgay) && empty($TenThietBi) && empty($MaCaBiet)) {
			$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_AllByDate2($TuNgay, $ToiNgay);
			$data= array(
				"ThanhLyThietBi"=>$ThanhLyThietBi,
			);
			return $this->load->view('ThanhLyThietBi/index', $data);
		}
		$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();
		$data= array(
			"ThanhLyThietBi"=>$ThanhLyThietBi,
		);
		return $this->load->view('ThanhLyThietBi/index', $data);
	}
	public function ThanhLy()
	{	
		$Kho = $this->Model_MuonThietBi->Get_Kho();
		$data = array(
			"Kho"=>$Kho,
		);
		$this->load->view('ThanhLyThietBi/ThanhLyThietBi',$data);
	}

	public function ThemThanhLy()
	{	
		$MaThietBi =$this->input->post('MaThietBi');
		$MaKho =$this->input->post('MaKho');
		$SoLuong =$this->input->post('SoLuong');
		$NgayGhiNhan =$this->input->post('NgayGhiNhan');
		$NguoiPhatHien =$this->input->post('NguoiPhatHien');
		$SoBienBan =$this->input->post('SoBienBan');
		$DonGiaThanhLy =$this->input->post('DonGia');
		$LyDoThanhLy =$this->input->post('LyDoThanhLy');
	 	if (gettype($this->check_null($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy))=="boolean") {
			if (gettype($this->check_number($SoLuong, $SoBienBan, $DonGiaThanhLy))=="boolean") {
				if (gettype($this->check_text($NguoiPhatHien))=="boolean") {
					
					$result = $this->Model_ThanhLyThietBi->ThemMoi($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy);
					if ($result==True) {
						return redirect(base_url("thanh-ly-thiet-bi"));
					}else{
						$Kho = $this->Model_MuonThietBi->Get_Kho();
						$data = array(
							"Kho"=>$Kho,
							"error"=>"them that bai",
						);
						$this->load->view('ThanhLyThietBi/ThanhLyThietBi',$data);
					}
				}else{
					$Kho = $this->Model_MuonThietBi->Get_Kho();
					$data = array(
						"Kho"=>$Kho,
						"error"=>$this->$this->heck_text($NguoiPhatHien),
					);
					$this->load->view('ThanhLyThietBi/ThanhLyThietBi',$data);
				}
			}else{
				$Kho = $this->Model_MuonThietBi->Get_Kho();
				$data = array(
					"Kho"=>$Kho,
					"error"=>$this->check_number($SoLuong, $SoBienBan, $DonGiaThanhLy),
				);
				$this->load->view('ThanhLyThietBi/ThanhLyThietBi',$data);
			}
		}else{
			$Kho = $this->Model_MuonThietBi->Get_Kho();
			$data = array(
				"Kho"=>$Kho,
				"error"=>$this->check_null($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy),
			);
			$this->load->view('ThanhLyThietBi/ThanhLyThietBi',$data);
		}
		
	}

	public function check_null($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy){
		if ($MaThietBi==0 && $MaKho==0 && empty($SoLuong) && empty($NgayGhiNhan) && empty($NguoiPhatHien) && empty($SoBienBan) && empty($SoLuongThanhLy) && empty($DonGiaThanhLy) && empty($LyDoThanhLy)) {
			return "Vui lòng nhập đủ thông tin";
		}elseif($MaKho==0){
			return "Vui lòng chọn kho";
		}elseif($MaThietBi==0 ){
			return "Vui lòng chọn thiết bị";
		}elseif(empty($SoLuong)){
			return "Vui lòng nhập số lượng";
		}elseif(empty($NgayGhiNhan)){
			return "Vui lòng chọn ngày ghi nhận";
		}elseif(empty($NguoiPhatHien)){
			return "Vui lòng nhập tên người phát hiện";
		}elseif(empty($SoBienBan)){
			return "Vui lòng nhập số biên bản";
		}elseif(empty($DonGiaThanhLy)){
			return "Vui lòng nhập đơn giá";
		}elseif(empty($LyDoThanhLy)){
			return "Vui lòng nhập lý do thanh lý";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuong, $SoBienBan, $DonGiaThanhLy){
		if(is_numeric($SoLuong)!=1){
			return "Số lượng thanh lý chỉ được nhập số";
		}if(is_numeric($SoBienBan)!=1){
			return "Số biên bản chỉ được nhập số";
		}if(is_numeric($DonGiaThanhLy)!=1){
			return "Don Gia chỉ được nhập số";
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

/* End of file ThanhLyThietBi.php */
/* Location: ./application/controllers/ThanhLyThietBi.php */