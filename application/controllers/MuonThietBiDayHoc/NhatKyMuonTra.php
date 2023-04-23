<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhatKyMuonTra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
		$this->load->model('MuonThietBiDayHoc/Model_NhatKyMuonTra');
	}

	public function index()
	{

		$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		$NhatKy = $this->Model_NhatKyMuonTra->Get_All();
		$data = array(
			'MonHoc'=>$MonHoc,
			"NhatKy"=>$NhatKy,
			
		);
		return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);

	}
	public function LietKe()
	{
		
		$TuNgay = $this->input->post('TuNgay');
		$ToiNgay = $this->input->post('ToiNgay');
		$TenGiaoVien = $this->input->post('TenGiaoVien');
		$MaMonHoc = $this->input->post('MonHoc');
		if (empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc==0) {
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_All();
			$data = array(
				"error"=>"Vui lòng nhập thông tin",
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByDate1($TuNgay);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByDate2($TuNgay, $ToiNgay);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName($TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName($TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc!=0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByMonHoc($MaMonHoc);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}else{
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_All();
			$data = array(
				"error"=>"Vui lòng nhập thông tin",
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}

		

	}

}

/* End of file NhatKyMuonTra.php */
/* Location: ./application/controllers/NhatKyMuonTra.php */