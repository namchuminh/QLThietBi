<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhatKyMuonTra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
		$this->load->model('MuonThietBiDayHoc/Model_NhatKyMuonTra');
	}

	public function index()
	{

		$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
		$NhatKy = $this->Model_NhatKyMuonTra->Get_All();
		$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2();
		$data = array(
			'MonHoc'=>$MonHoc,
			"NhatKy"=>$NhatKy,
			"NhatKy2"=>$NhatKy2,
			
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
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2();
			$data = array(
				"error"=>"Vui lòng nhập thông tin",
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByDate1($TuNgay);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByDate1($TuNgay);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByDate2($TuNgay, $ToiNgay);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByDate2($TuNgay, $ToiNgay);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName($TenGiaoVien);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByName($TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName($TenGiaoVien);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByName($TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName2($TuNgay, $ToiNgay, $TenGiaoVien);
			
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByName2($TuNgay, $ToiNgay, $TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien) && $MaMonHoc==0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByName3($TuNgay, $TenGiaoVien);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByName3($TuNgay, $TenGiaoVien);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc!=0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByMonHoc($MaMonHoc);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByMonHoc($MaMonHoc);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}elseif(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaMonHoc!=0){
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_AllByMonHoc2($TuNgay, $ToiNgay, $MonHoc);
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2ByMonHoc2($TuNgay, $ToiNgay, $MonHoc);
			$data = array(
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}else{
			$MonHoc = $this->Model_MuonThietBi->Get_MonHoc();
			$NhatKy = $this->Model_NhatKyMuonTra->Get_All();
			$NhatKy2 = $this->Model_NhatKyMuonTra->Get_All2();
			$data = array(
				"error"=>"Vui lòng nhập thông tin",
				'MonHoc'=>$MonHoc,
				"NhatKy"=>$NhatKy,
				"NhatKy2"=>$NhatKy2,
				
			);
			return $this->load->view('MuonThietBiDayHoc/NhatKyMuonTra', $data);
		}

		

	}

}

/* End of file NhatKyMuonTra.php */
/* Location: ./application/controllers/NhatKyMuonTra.php */