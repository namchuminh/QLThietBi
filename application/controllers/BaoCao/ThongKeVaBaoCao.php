<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThongKeVaBaoCao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->library("excel");
		$this->load->model('BaoCao/Model_BaoCao');
	}

	public function index()
	{
		$Kho = $this->Model_BaoCao->Get_Kho();
		$data = array(
			'Kho'=>$Kho,
		);
		return $this->load->view('BaoCao/BaoCao', $data);
	}
	public function Xuat_Excel()
	{
		$Sosach = $this->input->post('SoSach');
		$TuNgay = $this->input->post('TuNgay');
		$ToiNgay = $this->input->post('ToiNgay');
		$MaKho = $this->input->post('MaKho');
		$TenGiaoVien = $this->input->post('TenGiaoVien');
		$check1 = $this->input->post('cb1');
		$check2 = $this->input->post('cb2');
		
		if ($Sosach == "theodoinhapthietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->NhapThietBi($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->NhapThietBi($TuNgay, $ToiNgay, $MaKho);
			}
		}else if ($Sosach == "theodoisuathietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->SuaThietBi($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->SuaThietBi($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "theodoithietbihong") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiHuHong($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiHuHong($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiHuHong($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}
		else if ($Sosach == "theodoithietbimat") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}else if ($Sosach == "theodoithietbithanhly") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiThanhLy($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiThanhLy($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiThanhLy($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}else if ($Sosach == "bangkethietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->BangKeThietBi($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->BangKeThietBi($TuNgay, $ToiNgay, $MaKho);
			}
		}
		else if ($Sosach == "bangkethietbimuon") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiMuon($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiMuon($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiMuon($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}
		else if ($Sosach == "bangkethietbiquahan") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiQuaHan($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiQuaHan($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiQuaHan($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}	
		else if ($Sosach == "theodoinhapthietbi2") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if(empty($TuNgay) && empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu và kết thúc",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->NhapThietBi2($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->NhapThietBi2($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->NhapThietBi2($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "bangkethietbitheomon") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->BangKeThietBiTheoMon($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->BangKeThietBiTheoMon($TuNgay, $ToiNgay, $MaKho);
			}
		}
		else if ($Sosach == "bangkethietbihonghoacmat") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiHongHoacMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiHongHoacMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiHongHoacMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}
		else if ($Sosach == "bangkethietbithanhly") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiThanhLy2($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->ThietBiThanhLy2($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->ThietBiThanhLy2($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}
		else if ($Sosach == "thongkegiaovienmuonnhieunhat") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->GiaoVienMuonNhieuNhat($TuNgay, $ToiNgay, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->GiaoVienMuonNhieuNhat($TuNgay, $ToiNgay, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->GiaoVienMuonNhieuNhat($TuNgay, $ToiNgay, $TenGiaoVien);
			}
				
		}
		else if ($Sosach == "tonghopnhapthietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->NhapThietBi3($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->NhapThietBi3($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "tonghopthietbihonghoacmat") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiHongHoacMat2($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->ThietBiHongHoacMat2($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "tonghopthietbithanhly") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiThanhLy3($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->ThietBiThanhLy3($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "tonghopdieuchuyenthietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->DieuChuyenThietBi($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}elseif(!empty($check2)) {
				if (!empty($TenGiaoVien)) {
					$this->DieuChuyenThietBi($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"Vui lòng nhập tên giáo viên",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}
			}else{
				$this->DieuChuyenThietBi($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien);
			}
				
		}
		//3
		else if ($Sosach == "tonghopnhapthietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->NhapThietBi3($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->NhapThietBi3($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "phieubaosudungthietbi") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->PhieuSuDungThietBi($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->PhieuSuDungThietBi($TuNgay, $ToiNgay, $MaKho);
			}
				
		}
		else if ($Sosach == "bangchitietthietbikhauhaotrongky") {
			if(empty($TuNgay) && !empty($ToiNgay)){
				$Kho = $this->Model_BaoCao->Get_Kho();
				$data = array(
					'Kho'=>$Kho,
					'error'=>"vui lòng chọn ngày bắt đầu",
				);
				return $this->load->view('BaoCao/BaoCao', $data);
			}
			if (!empty($check1)) {
				if ($MaKho!=0) {
					$this->ThietBiKhauHaoTrongKy($TuNgay, $ToiNgay, $MaKho);
				}else{
					$Kho = $this->Model_BaoCao->Get_Kho();
					$data = array(
						'Kho'=>$Kho,
						'error'=>"vui lòng chọn kho",
					);
					return $this->load->view('BaoCao/BaoCao', $data);
				}

			}else{
				$this->ThietBiKhauHaoTrongKy($TuNgay, $ToiNgay, $MaKho);
			}
				
		}else if ($Sosach == 0) {
			
			$Kho = $this->Model_BaoCao->Get_Kho();
			$data = array(
				'Kho'=>$Kho,
				'error'=>"vui lòng chọn mẫu thống kê",
			);
			return $this->load->view('BaoCao/BaoCao', $data);
		}
		
	}
	public function NhapThietBi($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay)){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TheoDoiNhapThietBi.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		$tong=0;
		$tong1=0;
		$tong2=0;
		$tong3=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayNhap'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $date)
			    ->setCellValue('C'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(7+$key), $value['MaThietBi'])
			    ->setCellValue('E'.(7+$key), $value['TenNhaCungCap'])
			    ->setCellValue('F'.(7+$key), $value['DonGia'])
			    ->setCellValue('G'.(7+$key), $value['SoLuong'])
			   	->setCellValue('H'.(7+$key), 0)
			   	->setCellValue('I'.(7+$key), 0)
			   	->setCellValue('J'.(7+$key), 0);
			    $tong += $value['SoLuong'];
			    if ($value['LyDoTang']=="Được Cấp") {
			    	$excel2->getActiveSheet()
			    	->setCellValue('H'.(7+$key), $value['SoLuong']);
			    	$tong1 += $value['SoLuong'];
			    }elseif($value['LyDoTang']=="Mua sắm theo kế hoạch"){
			    	$excel2->getActiveSheet()
			    	->setCellValue('I'.(7+$key), $value['SoLuong']);
			    	$tong2 += $value['SoLuong'];

			    }else{
			    	$excel2->getActiveSheet()
			    	->setCellValue('J'.(7+$key), $value['SoLuong']);
			    	$tong3 += $value['SoLuong'];
			    }
			    $excel2->getActiveSheet()
			    ->setCellValue('G'.(8+$key), $tong)
			   	->setCellValue('H'.(8+$key), $tong1)
			   	->setCellValue('I'.(8+$key), $tong2)
			   	->setCellValue('J'.(8+$key), $tong3)
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoNhapThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoNhapThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function SuaThietBi($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_SuaThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_SuaThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_SuaThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_SuaThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		// else if(!empty($TuNgay) && !empty($ToiNgay) && !empty($TenGiaoVien)){
		// 	$TheoDoi = $this->Model_BaoCao->Get_SuaThietBi6($TuNgay, $ToiNgay, $TenGiaoVien);
		// }
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TheoDoiSuaThietBi.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayGhiNhan'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $date)
			    ->setCellValue('C'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(7+$key), $value['SoLuongHong'])
			    ->setCellValue('E'.(7+$key), $value['NguoiPhatHien'])
			    ->setCellValue('F'.(7+$key), $value['HienTuongHong'])
			    ->setCellValue('G'.(7+$key), $value['NguoiGiaiQuyet']);
			    
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoSuaThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoSuaThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiHuHong($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiHong6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TheoDoiTBHuHong.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		$tong=0;
		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong = $value['SoLuongHong'] * $value['DonGia'];
				$tong2 += $tong;
				$NgayNhap = $value['NgayPhatHien'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $date)
			    ->setCellValue('C'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(7+$key), $value['SoLuongHong'])
			    ->setCellValue('E'.(7+$key), $value['TenKho'])
			    ->setCellValue('F'.(7+$key), $value['TenMonHoc'])
			    ->setCellValue('G'.(7+$key), $value['NguoiPhatHien'])
			   	->setCellValue('H'.(7+$key), $tong)
			   	->setCellValue('H'.(8+$key), $tong2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiHuHong.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiBiHuHong.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMat6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TheoDoiTBMat.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		$tong=0;
		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong = $value['SoLuongMat'] * $value['DonGia'];
				$tong2 += $tong;
				$NgayNhap = $value['NgayPhatHien'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $date)
			    ->setCellValue('C'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(7+$key), $value['SoLuongMat'])
			    ->setCellValue('E'.(7+$key), $value['TenKho'])
			    ->setCellValue('F'.(7+$key), $value['TenMonHoc'])
			    ->setCellValue('G'.(7+$key), $value['NguoiPhatHien'])
			   	->setCellValue('H'.(7+$key), $tong)
			   	->setCellValue('H'.(8+$key), $tong2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiMat.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiMat.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiThanhLy($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TheoDoiTBThanhly.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong2 += $value['DonGiaThanhLy'];
				$NgayNhap = $value['NgayGhiNhan'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $date)
			    ->setCellValue('C'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(7+$key), $value['SoLuongThanhLy'])
			    ->setCellValue('E'.(7+$key), $value['TenKho'])
			    ->setCellValue('F'.(7+$key), $value['LyDoThanhLy'])
			    ->setCellValue('G'.(7+$key), $value['NguoiPhatHien'])
			   	->setCellValue('H'.(7+$key), $value['DonGiaThanhLy'])
			   	->setCellValue('H'.(8+$key), $tong2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiThanhLy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiThanhLy.xls"');
		$objWriter->save('php://output');
	}
	public function BangKeThietBi($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTB.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('D3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('D3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('D3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong2 += $value['SoLuong'];
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['MaThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), $value['TenMonHoc'])
			    ->setCellValue('F'.(6+$key), $value['KhoiLop'])
			    ->setCellValue('G'.(6+$key), $value['SoLuong'])
			    ->setCellValue('H'.(6+$key), $value['DonViTinh'])
			   	->setCellValue('G'.(7+$key), $tong2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoBangKeThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoBangKeThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiMuon($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiMuon6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTBDangMuon.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('E3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('E3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('E3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayMuon = $value['NgayMuon'];
				$date = date("d/m/Y", strtotime($NgayMuon));
				$NgayTra = $value['NgayTra'];
				$date2 = date("d/m/Y", strtotime($NgayTra));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['MaMuonThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['SoLuongMuon'])
			    ->setCellValue('E'.(6+$key), $value['TenMonHoc'])
			    ->setCellValue('F'.(6+$key), $value['TenLop'])
			    ->setCellValue('G'.(6+$key), $value['NguoiMuon'])
			   	->setCellValue('H'.(6+$key), $date)
			   	->setCellValue('I'.(6+$key), $date2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiMuon.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiMuon.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiQuaHan($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiQuaHan6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTBMuonQuaHan.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('E3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('E3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('E3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayMuon = $value['NgayMuon'];
				$date = date("d/m/Y", strtotime($NgayMuon));
				$NgayTra = $value['NgayTra'];
				$date2 = date("d/m/Y", strtotime($NgayTra));
				$datea = new DateTime($NgayTra);
				$dateb = new DateTime(date("Y/m/d"));
				$interval = $dateb->diff($datea);

				
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['MaMuonThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), $value['TenMonHoc'])
			    ->setCellValue('F'.(6+$key), $value['TenLop'])
			    ->setCellValue('G'.(6+$key), $value['NguoiMuon'])
			   	->setCellValue('H'.(6+$key), $date)
			   	->setCellValue('I'.(6+$key), $date2)
			   	->setCellValue('J'.(6+$key), $interval->format('%a'))
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiQuaHanMuon.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiQuaHanMuon.xls"');
		$objWriter->save('php://output');
	}
	public function NhapThietBi2($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay)){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeChiTietNhapTB.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('D3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('D3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('D3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		$tong=0;
		
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong+=$value['SoLuong'];
				$NgayNhap = $value['NgayNhap'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenKho'] )
			    ->setCellValue('D'.(6+$key), $date)
			    ->setCellValue('E'.(6+$key), $value['TenNhaCungCap'])
			    ->setCellValue('F'.(6+$key), $value['SoLuong'])
			    ->setCellValue('G'.(6+$key), $value['DonGia'])
			   	->setCellValue('F'.(7+$key), $tong)
			   	
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoChiTietNhapThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoChiTietNhapThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function BangKeThietBiTheoMon($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_BangKeThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTBTheoMonHoc.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('D3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('D3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('D3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong2 += $value['SoLuong'];
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['MaThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), $value['TenMonHoc'])
			    ->setCellValue('F'.(6+$key), $value['KhoiLop'])
			    ->setCellValue('G'.(6+$key), $value['SoLuong'])
			    ->setCellValue('H'.(6+$key), $value['DonViTinh'])
			   	->setCellValue('G'.(7+$key), $tong2)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoBangKeThietBiTheoMon.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoBangKeThietBiTheoMon.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiHongHoacMat($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat();
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)  && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat2($TuNgay);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat3($TuNgay, $ToiNgay);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat4($MaKho);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat5($TuNgay, $ToiNgay, $MaKho);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat6($TenGiaoVien);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTBHongHoacMat.xlsx"); // Empty Sheet
		$row = 0;
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('C3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('C3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('C3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}

		if ($TheoDoi1 != null) {
			
			foreach ($TheoDoi1 as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi1 as $key => $value){
				$row++;
				$NgayNhap = $value['NgayPhatHien'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenKho'])
			    ->setCellValue('D'.(6+$key), $value['TenMonHoc'])
			    ->setCellValue('E'.(6+$key), $value['NguoiPhatHien'])
			    ->setCellValue('F'.(6+$key), $value['SoLuongMat'])
			    ->setCellValue('G'.(6+$key), $value['SoLuongMat']*$value['DonGia'])
			    ->setCellValue('H'.(6+$key), $date)
			    ->setCellValue('I'.(6+$key), "Mất")
			   	;
			}
		}
		if ($TheoDoi2 != null) {
			
			foreach ($TheoDoi2 as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6+$row,1);
			}
			foreach ($TheoDoi2 as $key => $value){
				$NgayNhap = $value['NgayPhatHien'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$row+$key), ($row+1+$key))
			    ->setCellValue('B'.(6+$row+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$row+$key), $value['TenKho'])
			    ->setCellValue('D'.(6+$row+$key), $value['TenMonHoc'])
			    ->setCellValue('E'.(6+$row+$key), $value['NguoiPhatHien'])
			    ->setCellValue('F'.(6+$row+$key), $value['SoLuongHong'])
			    ->setCellValue('G'.(6+$row+$key), $value['SoLuongHong']*$value['DonGia'])
			    ->setCellValue('H'.(6+$row+$key), $date)
			    ->setCellValue('I'.(6+$row+$key), "Hỏng")
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiHongHoacMat.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiHongHoacMat.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiThanhLy2($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangKeTBDaThanhLy.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('D3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('D3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('D3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayGhiNhan'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $date)
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['SoLuongThanhLy'])
			    ->setCellValue('E'.(6+$key), $value['TenKho'])
			    ->setCellValue('F'.(6+$key), $value['LyDoThanhLy'])
			    ->setCellValue('G'.(6+$key), $value['NguoiPhatHien'])
			   	->setCellValue('H'.(6+$key), $value['DonGiaThanhLy'])
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiThanhLy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiThanhLy.xls"');
		$objWriter->save('php://output');
	}
	public function GiaoVienMuonNhieuNhat($TuNgay, $ToiNgay, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)){
			
			$SoLanMuon = $this->Model_BaoCao->Get_SoLanMuon();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)){
			$SoLanMuon = $this->Model_BaoCao->Get_SoLanMuon2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien)){
			
			$SoLanMuon = $this->Model_BaoCao->Get_SoLanMuon3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && !empty($TenGiaoVien)){
			$SoLanMuon = $this->Model_BaoCao->Get_SoLanMuon4($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\ThongKeGVMuonNhieuNhat.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('A5', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('A5', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('A5', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		
		if ($SoLanMuon != null) {
			
			foreach ($SoLanMuon as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(8,1);
			}
			foreach ($SoLanMuon as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(8+$key), ($key+1))
			    ->setCellValue('B'.(8+$key), $value['NguoiMuon'])
			    ->setCellValue('E'.(8+$key), $value['SoLanMuon'])
			   	;
			   	if(empty($TuNgay) && empty($ToiNgay)){
					$TheoDoi = $this->Model_BaoCao->Get_GiaoVienMuonNhieuNhat($value["NguoiMuon"]);
				}
				if(!empty($TuNgay) && empty($ToiNgay)){
					$TheoDoi = $this->Model_BaoCao->Get_GiaoVienMuonNhieuNhat2($value["NguoiMuon"], $TuNgay);
				}
				if(!empty($TuNgay) && !empty($ToiNgay)){
					$TheoDoi = $this->Model_BaoCao->Get_GiaoVienMuonNhieuNhat3($value["NguoiMuon"], $TuNgay,$ToiNgay);
				}
			   	
			   	if ($TheoDoi!=null) {
			   		foreach ($TheoDoi as $key2 => $value2){
			   			
			   			$Value1 = $excel2->getActiveSheet()->getCell('C'.(8+$key))->getValue();
			   			$Value2 = $excel2->getActiveSheet()->getCell('D'.(8+$key))->getValue();

			   			
				   		$excel2->getActiveSheet()
					    ->setCellValue('C'.(8+$key), "-".$value2['TenThietBi']."\n".$Value1)
					    ->setCellValue('D'.(8+$key), "-".$value2['SoLuongMuon']."\n".$Value2)
					    ;
					    
			   		}
			   		$Value1 = $excel2->getActiveSheet()->getCell('C'.(8+$key))->getValue();
			   		
			   		$excel2->getActiveSheet()->getRowDimension((8+$key))->setRowHeight(strlen((string)$Value1));
			   		
			   	}
			   	
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoGiaoVienMuonNhieu.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoGiaoVienMuonNhieu.xls"');
		$objWriter->save('php://output');
	}
	public function NhapThietBi3($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay)){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_NhapThietBi5($TuNgay, $ToiNgay, $MaKho);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\Copy of TongHopNhapTB_Mau.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('D3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('D3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('D3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		$tong=0;
		$tong1=0;
		$tong2=0;
		$tong3=0;
		$tong4=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayNhap'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(7+$key), $value['MaThietBi'])
			    ->setCellValue('D'.(7+$key), $value['TenKho'])
			    ->setCellValue('E'.(7+$key), $value['TenNhaCungCap'])
			   	->setCellValue('F'.(7+$key), 0)
			   	->setCellValue('G'.(7+$key), 0)
			   	->setCellValue('H'.(7+$key), 0)
				->setCellValue('I'.(7+$key), 0)
				->setCellValue('J'.(7+$key), 0);
			   
			    if ($value['LyDoTang']=="Được Cấp") {
			    	$excel2->getActiveSheet()
			    	->setCellValue('F'.(7+$key), $value['SoLuong']);
			    	$tong1 += $value['SoLuong'];
			    }elseif($value['LyDoTang']=="Mua sắm theo kế hoạch"){
			    	$excel2->getActiveSheet()
			    	->setCellValue('G'.(7+$key), $value['SoLuong']);
			    	$tong2 += $value['SoLuong'];

			    }elseif($value['LyDoTang']=="Được viện trợ, cho tặng"){
			    	$excel2->getActiveSheet()
			    	->setCellValue('H'.(7+$key), $value['SoLuong']);
			    	$tong3 += $value['SoLuong'];

			    }else{
			    	$excel2->getActiveSheet()
			    	->setCellValue('I'.(7+$key), $value['SoLuong']);
			    	$tong4 += $value['SoLuong'];
			    }
			    $tong += $value['SoLuong'];
			    $excel2->getActiveSheet()
			    ->setCellValue('F'.(8+$key), $tong1)
			   	->setCellValue('G'.(8+$key), $tong2)
			   	->setCellValue('H'.(8+$key), $tong3)
			   	->setCellValue('I'.(8+$key), $tong4)
			   	->setCellValue('J'.(8+$key), $tong)
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoNhapThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoNhapThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiHongHoacMat2($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat();
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat2($TuNgay);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat3($TuNgay, $ToiNgay);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat4($MaKho);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi1 = $this->Model_BaoCao->Get_ThietBiMat5($TuNgay, $ToiNgay, $MaKho);
			$TheoDoi2 = $this->Model_BaoCao->Get_ThietBiHong5($TuNgay, $ToiNgay, $MaKho);
		}
		
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TongHopTBMatHoacHong_Mau3D.xlsx"); // Empty Sheet
		$tong=0;
		$row = 0;
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('C3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('C3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('C3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}

		if ($TheoDoi1 != null) {
			
			foreach ($TheoDoi1 as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi1 as $key => $value){
				$row++;
				$tong += $value['SoLuongMat'];
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$key), $value['MaThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), "Mất")
			    ->setCellValue('F'.(6+$key), $value['SoLuongMat'])
			    ->setCellValue('F'.(7+$key), $tong)
			   	;
			}
		}
		if ($TheoDoi2 != null) {
			
			foreach ($TheoDoi2 as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6+$row,1);
			}
			foreach ($TheoDoi2 as $key => $value){
				$tong += $value['SoLuongHong'];
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$row+$key), ($row+1+$key))
			    ->setCellValue('B'.(6+$row+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$row+$key), $value['MaThietBi'])
			    ->setCellValue('D'.(6+$row+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$row+$key), "Hỏng")
			    ->setCellValue('F'.(6+$row+$key), $value['SoLuongHong'])
			    ->setCellValue('F'.(7+$row+$key), $tong)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiHongHoacMat.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiHongHoacMat.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiThanhLy3($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy5($TuNgay, $ToiNgay, $MaKho);
		}
		// else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
		// 	$TheoDoi = $this->Model_BaoCao->Get_ThietBiThanhLy6($TenGiaoVien);
		// }
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TongHopTBDaThanhLy_Mau3E.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('C3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('C3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('C3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		$tong=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				
			    $tong += $value['SoLuongThanhLy'];
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(6+$key), $value['MaThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), $value['LyDoThanhLy'])
			    ->setCellValue('F'.(6+$key), $value['SoLuongThanhLy'])
			    ->setCellValue('F'.(7+$key), $tong)
			   	;
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiThanhLy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiThanhLy.xls"');
		$objWriter->save('php://output');
	}
	public function DieuChuyenThietBi($TuNgay, $ToiNgay, $MaKho, $TenGiaoVien){
		if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen();
		}else if(!empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien)  && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && empty($TenGiaoVien) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen5($TuNgay, $ToiNgay, $MaKho);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0 && !empty($TenGiaoVien)){
			$TheoDoi = $this->Model_BaoCao->Get_LichSuDieuChuyen6($TenGiaoVien);
		}
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\LichSuDieuChuyenTB.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		if(empty($TuNgay) && empty($ToiNgay)){
			$excel2->getActiveSheet()->setCellValue('E3', 'Tính tới ngày: '.date("d/m/Y"));
		}
		if(!empty($TuNgay) && empty($ToiNgay)){
			$date = date("d/m/Y", strtotime($TuNgay));
			$excel2->getActiveSheet()->setCellValue('E3', 'Tại ngày: '.$date);
		}
		if(!empty($TuNgay) && !empty($ToiNgay)){
			$date1 = date("d/m/Y", strtotime($TuNgay));
			$date2 = date("d/m/Y", strtotime($ToiNgay));
			$excel2->getActiveSheet()->setCellValue('E3', "Từ ngày ".$date1." đến ngày  ".$date2);
		}
		
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayBanGiao'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['MaThietBi'])
			    ->setCellValue('C'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(6+$key), $value['TenKho'])
			    ->setCellValue('E'.(6+$key), $value['TinhTrang'])
			    ->setCellValue('F'.(6+$key), $value['NguoiBanGiao'])
			    ->setCellValue('G'.(6+$key), $value['NguoiTiepNhan'])
			   	->setCellValue('H'.(6+$key), $date)
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoLichSuDieuChuyen.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoLichSuDieuChuyen.xls"');
		$objWriter->save('php://output');
	}
	//3
	public function ThietBiTrongKy($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy5($TuNgay, $ToiNgay, $MaKho);
		}

		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\BangInChiTietTBHienCoTrongKy.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(10,1);
			}
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayNhap'];
				$date = date("Y", strtotime($NgayNhap));
				$Year = date("Y");
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(10+$key), ($key+1))
			    ->setCellValue('B'.(10+$key), $value['MaThietBi'])
			    ->setCellValue('C'.(10+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(10+$key), $date)
			    ->setCellValue('J'.(10+$key), $Year-$date)
			    
			    ->setCellValue('K'.(10+$key), $value['LyDoTang'])
			    
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiTrongKy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiTrongKy.xls"');
		$objWriter->save('php://output');
	}
	public function PhieuSuDungThietBi($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_PhieuSuDungThietBi();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_PhieuSuDungThietBi2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_PhieuSuDungThietBi3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_PhieuSuDungThietBi4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_PhieuSuDungThietBi5($TuNgay, $ToiNgay, $MaKho);
		}

		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\PhieuBaoSuDungTB.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		$row=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1+$row);
			    $row+=10;
			}
			$row=0;
			foreach ($TheoDoi as $key => $value){
				$NgayNhap = $value['NgayGhiNhan'];
				$date = date("d/m/Y", strtotime($NgayNhap));
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key+$row-1), "Số thứ tự: ".($key+1))
			    ->setCellValue('A'.(7+$key+$row), "Tên thiết bị: ".$value['TenThietBi'])
			    ->setCellValue('A'.(7+$key+$row+1), "Số lượng: ".$value['SoLuong'])
			    ->setCellValue('A'.(7+$key+$row+2), "Nhãn hiệu: ".$value['KyHieu'])
			    ->setCellValue('A'.(7+$key+$row+3), "Loại: ")
			    ->setCellValue('A'.(7+$key+$row+4), "Nhà cung cấp: ".$value['TenNhaCungCap'])
			    ->setCellValue('A'.(7+$key+$row+5), "Đặc điểm kỹ thuật: ")
			    ->setCellValue('A'.(7+$key+$row+6), "Nguồn gốc thiết bị: ".$value['TenNhaCungCap'])
			    ->setCellValue('A'.(7+$key+$row+7), "Tình trạng ban đầu: (mới hoặc cũ):")



			    ->setCellValue('F'.(7+$key+$row), "1. Ngày giờ hiện tượng:  ".$date)
			    ->setCellValue('F'.(7+$key+$row+1), "2. Người phát hiện: ".$value['NguoiPhatHien'])
			    ->setCellValue('F'.(7+$key+$row+2), "3. Người gây sự cố:".$value['NguoiGaySuCo'])
			    ->setCellValue('F'.(7+$key+$row+3), "4. Người giải quyết: ".$value['NguoiGiaiQuyet'])
			    ->setCellValue('F'.(7+$key+$row+4), "5. Biện pháp giải quyết: ".$value['BienPhap'])
			    ->setCellValue('F'.(7+$key+$row+5), "6. Sửa chữa linh kiện, bộ phận: ".$value['BoPhanSuaChua'])
			    ->setCellValue('F'.(7+$key+$row+6), "7. Người thực hiện: ".$value['NguoiThucHien'])
			    ->setCellValue('F'.(7+$key+$row+7), "8. Kinh phí: ".$value['KinhPhiSuaChua'])
			    ->setCellValue('F'.(7+$key+$row+8), "9. Nguồn kinh phí: ".$value['NguonKinhPhi'])
			    ->setCellValue('F'.(7+$key+$row+9), "10. Giá trị thiết bị sau khi sửa: ".$value['KinhPhiSauSua'])
			   	;
			   	$row+=10;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoSuDungThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoSuDungThietBi.xls"');
		$objWriter->save('php://output');
	}
	public function ThietBiKhauHaoTrongKy($TuNgay, $ToiNgay, $MaKho){
		if(empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy();
		}else if(!empty($TuNgay) && empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy2($TuNgay);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho==0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy3($TuNgay, $ToiNgay);
		}else if(empty($TuNgay) && empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy4($MaKho);
		}else if(!empty($TuNgay) && !empty($ToiNgay) && $MaKho!=0){
			$TheoDoi = $this->Model_BaoCao->Get_ThietBiTrongKy5($TuNgay, $ToiNgay, $MaKho);
		}

		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\BaoCao\Exel_file\TongHopBCKhauHaoTBTrongKy.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		$tong1=0;
		$tong2=0;
		if ($TheoDoi != null) {
			
			foreach ($TheoDoi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(9,1);
			}
			foreach ($TheoDoi as $key => $value){
				$tong1 += $value['SoLuong'];
				$tong2 += ($value['DonGia']*$value['SoLuong']);

			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(9+$key), ($key+1))
			    ->setCellValue('B'.(9+$key), $value['MaThietBi'])
			    ->setCellValue('C'.(9+$key), $value['TenThietBi'])
			    ->setCellValue('D'.(9+$key), $value['SoLuong'])
			    ->setCellValue('E'.(9+$key), $value['DonGia'])
			    ->setCellValue('F'.(9+$key), $value['DonGia']*$value['SoLuong'])
			    ->setCellValue('D'.(10+$key), $tong1)
			    ->setCellValue('F'.(10+$key), $tong2)
			    
			    
			   	;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoCaoThietBiKhauHaoTrongKy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoCaoThietBiKhauHaoTrongKy.xls"');
		$objWriter->save('php://output');
	}
}

/* End of file ThongKeVaBaoCao.php */
/* Location: ./application/controllers/ThongKeVaBaoCao.php */