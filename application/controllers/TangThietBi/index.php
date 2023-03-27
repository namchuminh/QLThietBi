<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');
	}

	public function index()
	{
		$Kho = $this->Model_TangThietBi->Get_Kho();
		$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
		$data = array(
			'Kho' => $Kho,
			'ChungTu' => $ChungTu,
		);
		return $this->load->view('TangThietBi/index', $data);
	}
	public function TimKiem()
	{
		$NgayBatDau = $this->input->post('NgayBatDau');
		$NgayKetThuc = $this->input->post('NgayKetThuc');
		$MaKho = $this->input->post('MaKho');
		$MaChungTuMin =  $this->input->post('MaChungTuMin');
		$MaChungTuMax = $this->input->post('MaChungTuMax');
		$Kho = $this->Model_TangThietBi->Get_Kho();
		//bat loi
		if(empty($NgayBatDau) && !empty($NgayKetThuc)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				'error'=> "Vui lòng nhập ngày bắt đầu",
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}
		if(empty($MaChungTuMin) && !empty($MaChungTuMax)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				'error'=> "Vui lòng nhập số chứng từ nhỏ nhất",
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}
		if($MaKho==0 && empty($MaChungTuMin) && empty($MaChungTuMax)  && empty($NgayBatDau)  && empty($NgayKetThuc)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				'error' => "Vui nhập thông tin",
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}



		// tất cả đầy đủ thông tin
		if($MaKho!=0 && !empty($MaChungTuMin) && !empty($MaChungTuMax)  && !empty($NgayBatDau)  && !empty($NgayKetThuc)){
			if(is_numeric($MaChungTuMin)==1 && is_numeric($MaChungTuMax)==1){
				//kiem tra ma chung tu là số
				$ChungTu = $this->Model_TangThietBi->Get_ChungTu_Full($NgayBatDau, $NgayKetThuc, $MaKho, $MaChungTuMin, $MaChungTuMax);
				$data = array(

					'Kho' => $Kho,
					'ChungTu' => $ChungTu,
				);
				return $this->load->view('TangThietBi/index', $data);
			}else{
				$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
				$data = array(
					'error' => "Mã chứng từ phải là số",
					'Kho' => $Kho,
					'ChungTu' => $ChungTu,
				);
				return $this->load->view('TangThietBi/index', $data);
			}
			
		}
		//tìm kiếm theo ngày bắt đầu ngày kết thúc
		if($MaKho==0 && empty($MaChungTuMin) && empty($MaChungTuMax)  && !empty($NgayBatDau)  && !empty($NgayKetThuc)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu_ByDay($NgayBatDau, $NgayKetThuc);
			$data = array(
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}

		//tìm kiếm theo ngày bắt đầu
		if($MaKho==0 && empty($MaChungTuMin) && empty($MaChungTuMax) && empty($NgayKetThuc) && !empty($NgayBatDau)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu_ByDay2($NgayBatDau);
			$data = array(
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}

		
		//tìm kiếm theo mã kho
		if($MaKho!=0 && empty($MaChungTuMin) && empty($MaChungTuMax)  && empty($NgayBatDau)  && empty($NgayKetThuc)){
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu_ByMaKho($MaKho);
			$data = array(
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}

		//tìm kiếm theo  mã chứng từ bắt đầu và kết thúc
		if($MaKho==0 && !empty($MaChungTuMin) && !empty($MaChungTuMax)  && empty($NgayBatDau)  && empty($NgayKetThuc)){
			if(is_numeric($MaChungTuMin)==1 && is_numeric($MaChungTuMax)==1){
				$ChungTu = $this->Model_TangThietBi->Get_ChungTu_ByMaChungTu($MaChungTuMin, $MaChungTuMax);
				$data = array(
					'Kho' => $Kho,
					'ChungTu' => $ChungTu,
				);
				return $this->load->view('TangThietBi/index', $data);
			}else{
				$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
				$data = array(
					'error' => "Mã chứng từ phải là số",
					'Kho' => $Kho,
					'ChungTu' => $ChungTu,
				);
				return $this->load->view('TangThietBi/index', $data);
			}
			
		}
		//tìm kiếm theo  mã chứng từ bắt đầu
		if(is_numeric($MaChungTuMin)==1){
				$ChungTu = $this->Model_TangThietBi->Get_ChungTu_ByMaChungTu2($MaChungTuMin);
				$data = array(
					'Kho' => $Kho,
					'ChungTu' => $ChungTu,
				);
				return $this->load->view('TangThietBi/index', $data);
		}else{
			$ChungTu = $this->Model_TangThietBi->Get_ChungTu();
			$data = array(
				'error' => "Mã chứng từ phải là số",
				'Kho' => $Kho,
				'ChungTu' => $ChungTu,
			);
			return $this->load->view('TangThietBi/index', $data);
		}



	}
	

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */