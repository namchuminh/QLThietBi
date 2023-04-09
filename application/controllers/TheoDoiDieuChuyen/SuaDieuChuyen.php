<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuaDieuChuyen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TheoDoiDieuChuyen/Model_TheoDoiDieuChuyen');
	}

	public function index($MaDieuChuyen)
	{

		$Kho = $this->Model_TangThietBi->Get_Kho();
		$result = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyenByMa2($MaDieuChuyen);
		$MaChiTietHoaDonCu = $result[0]["MaChiTietHoaDonCu"];
		$MaChiTietHoaDonMoi = $result[0]["MaChiTietHoaDonMoi"];
		$KhoCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonCu);
		$KhoMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonMoi);
		$MaThietBi = $result[0]["MaThietBi"];
		$SoLuongDieuChuyenCu = $result[0]["SoLuongDieuChuyen"];
		$data = array(
			"DieuChuyen"=>$result,
			"Kho"=>$Kho,
			"KhoCu"=>$KhoCu,
			"KhoMoi"=>$KhoMoi,
		);
		return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
	}
	public function SuaDieuChuyen($MaDieuChuyen){
		$Kho = $this->Model_TangThietBi->Get_Kho();
		$result = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyenByMa2($MaDieuChuyen);
		$MaChiTietHoaDonCu = $result[0]["MaChiTietHoaDonCu"];
		$MaChiTietHoaDonMoi = $result[0]["MaChiTietHoaDonMoi"];
		$KhoCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonCu);
		$KhoMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonMoi);
		$MaThietBi = $result[0]["MaThietBi"];
		$SoLuongDieuChuyenCu = $result[0]["SoLuongDieuChuyen"];

		$KhoChuyenToi = $this->input->post('MaKhoChuyenToi');
		$SoLuongDieuChuyen = $this->input->post('SoLuongDieuChuyen');
		$NgayBanGiao = $this->input->post('NgayBanGiao');
		$NguoiBanGiao = $this->input->post('NguoiBanGiao');
		$NguoiTiepNhan = $this->input->post('NguoiTiepNhan');
		$TinhTrang = $this->input->post('TinhTrang');
		$SoBienBan = $this->input->post('SoBienBan');
		$GhiChu = $this->input->post('GhiChu');

		if(gettype($this->check_null($KhoChuyenToi, $SoLuongDieuChuyen, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan))=="boolean"){
			if (gettype($this->check_number($SoLuongDieuChuyen, $SoBienBan))=="boolean"){
				if (gettype($this->check_text($NguoiTiepNhan, $NguoiBanGiao))=="boolean"){
					$GetChiTietMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoChuyenToi);
						$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoCu[0]["MaKho"]);
						if ($GetChiTietCu[0]["SoLuong"] < $SoLuongDieuChuyen) {
									$data = array(
									"DieuChuyen"=>$result,
									"Kho"=>$Kho,
									"KhoCu"=>$KhoCu,
									"KhoMoi"=>$KhoMoi,
									"alert" => "Số lương điều chuyển lớn hơn số lượng đang có trong kho",
								);
							return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
						}
					$Check = $this->Model_TheoDoiDieuChuyen->Check_TonTai($MaThietBi, $KhoChuyenToi);
					//check thiet bi da ton tai trong kho hay chua
					if($Check!=null){//ton tai trong kho
						
						$Sua = $this->Model_TheoDoiDieuChuyen->SuaDieuChuyen($NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $KhoChuyenToi, $TinhTrang, $GhiChu,$SoLuongDieuChuyen, $GetChiTietMoi[0]["MaChiTietHoaDon"] ,$MaDieuChuyen);
						if($Sua==True){
							//# lay lại so luong da chuyen
							//tang lai so da chuyen đi
							$this->Model_TheoDoiDieuChuyen->Update_SoLuong($SoLuongDieuChuyenCu, $MaThietBi, $KhoCu[0]["MaKho"]);
							//Giam so da chuyen đi
							$this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyenCu, $MaThietBi, $KhoMoi[0]["MaKho"]);
							$Kho = $this->Model_TangThietBi->Get_Kho();
							$result = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyenByMa2($MaDieuChuyen);
							$MaChiTietHoaDonCu = $result[0]["MaChiTietHoaDonCu"];
							$MaChiTietHoaDonMoi = $result[0]["MaChiTietHoaDonMoi"];
							$KhoCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonCu);
							$KhoMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonMoi);
							$MaThietBi = $result[0]["MaThietBi"];
							$SoLuongDieuChuyenMoi = $result[0]["SoLuongDieuChuyen"];
							//tang so chuyen den kho moi
							$this->Model_TheoDoiDieuChuyen->Update_SoLuong($SoLuongDieuChuyenMoi, $MaThietBi, $KhoMoi[0]["MaKho"]);
							//Giam so chuyen đi kho cu
							$this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyenMoi, $MaThietBi, $KhoCu[0]["MaKho"]);
							//xoa nhung chi tiet co so long bang 0
							$this->Model_TheoDoiDieuChuyen->Xoa_ChiTiet2();
							$data = array(
								"DieuChuyen"=>$result,
								"Kho"=>$Kho,
								"KhoCu"=>$KhoCu,
								"KhoMoi"=>$KhoMoi,
								"alert" => "Sua Thanh Cong",
							);
							return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
						}
					}else{//neu thiet bị khong ton tai trong kho
						
						
						$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoCu[0]["MaKho"]);
						if($GetChiTietCu!=null){
							
							$MaChungTu = $GetChiTietCu[0]['MaChungTu'];
							$MaMonHoc = $GetChiTietCu[0]['MaMonHoc'];
							$KhoiLop = $GetChiTietCu[0]['KhoiLop'];
							$DonGia = $GetChiTietCu[0]['DonGia'];
							$MaQuanLyThietBi = $GetChiTietCu[0]['MaCaBiet'];
							$DonViTinh = $GetChiTietCu[0]['DonViTinh'];
							$Vat = $GetChiTietCu[0]['Vat'];
							$ThanhTien = (($DonGia*$SoLuongDieuChuyen) - ($DonGia*$SoLuongDieuChuyen*$Vat)/100);
							$ThoiGianKhauHao = $GetChiTietCu[0]['ThoiGianKhauHao'];


							$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoCu[0]["MaKho"]);
							$GetChiTietMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoChuyenToi);
							if ($GetChiTietCu[0]["SoLuong"] < $SoLuongDieuChuyen) {
									$data = array(
									"DieuChuyen"=>$result,
									"Kho"=>$Kho,
									"KhoCu"=>$KhoCu,
									"KhoMoi"=>$KhoMoi,
									"alert" => "Số lương  điều chuyển lớn hơn số lượng đang có trong kho",
								);
								return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
							}
							$ThemChiTiet = $this->Model_ThemChiTiet->ThemChiTiet($MaChungTu, $MaMonHoc, $KhoiLop, $MaThietBi, $SoLuongDieuChuyen, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao,$KhoChuyenToi);

							if ($ThemChiTiet==True) {
								$GetChiTietMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoChuyenToi);
								$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoCu[0]["MaKho"]);
								$MaChiTietHoaDonMoi = $GetChiTietMoi[0]["MaChiTietHoaDon"];
								$Sua = $this->Model_TheoDoiDieuChuyen->SuaDieuChuyen($NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $KhoChuyenToi, $TinhTrang, $GhiChu,$SoLuongDieuChuyen, $MaChiTietHoaDonMoi ,$MaDieuChuyen);
								
								if ($Sua==True) {
									//lay lại so luong da chuyen
									$this->Model_TheoDoiDieuChuyen->Update_SoLuong($SoLuongDieuChuyenCu, $MaThietBi, $KhoCu[0]["MaKho"]);
									//Giam so da chuyen đi
									$this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyenCu, $MaThietBi, $KhoMoi[0]["MaKho"]);
									$Kho = $this->Model_TangThietBi->Get_Kho();
									$result = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyenByMa2($MaDieuChuyen);
									$MaChiTietHoaDonCu = $result[0]["MaChiTietHoaDonCu"];
									$MaChiTietHoaDonMoi = $result[0]["MaChiTietHoaDonMoi"];
									$KhoCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonCu);
									$KhoMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTietByMa($MaChiTietHoaDonMoi);
									$MaThietBi = $result[0]["MaThietBi"];
									$SoLuongDieuChuyenMoi = $result[0]["SoLuongDieuChuyen"];
									//Giam so chuyen đi kho cu
									$this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyenMoi, $MaThietBi, $KhoCu[0]["MaKho"]);
									//xoa nhung chi tiet co so luong bang 0
									$this->Model_TheoDoiDieuChuyen->Xoa_ChiTiet2();
									$data = array(
										"DieuChuyen"=>$result,
										"Kho"=>$Kho,
										"KhoCu"=>$KhoCu,
										"KhoMoi"=>$KhoMoi,
										"alert" => "Sua Thanh Cong",
									);
									return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
								}else{
									$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
									$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
									$Kho = $this->Model_TangThietBi->Get_Kho();
									$data = array(
										'DieuChuyen' =>$DieuChuyen,
										'Kho'=>$Kho,
										'MonHoc'=>$MonHoc,
										'error' => 'SuaThatBai',
									);
									return $this->load->view('TheoDoiDieuChuyen/index',$data);
								}
							}else{
								$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
								$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
								$Kho = $this->Model_TangThietBi->Get_Kho();
								$data = array(
									'DieuChuyen' =>$DieuChuyen,
									'Kho'=>$Kho,
									'MonHoc'=>$MonHoc,
									'error' => 'Vui Lòng Nhập đầy đủ thông tin',
								);
								return $this->load->view('TheoDoiDieuChuyen/index',$data);
							}
						}else{
							$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
							$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
							$Kho = $this->Model_TangThietBi->Get_Kho();
							$data = array(
								'DieuChuyen' =>$DieuChuyen,
								'Kho'=>$Kho,
								'MonHoc'=>$MonHoc,
								'error' => 'Vui Lòng Nhập đầy đủ thông tin',
							);
							return $this->load->view('TheoDoiDieuChuyen/index',$data);
						}
						
					}

					
					


					
				}else{
					$data = array(
						"DieuChuyen"=>$result,
						"Kho"=>$Kho,
						"KhoCu"=>$KhoCu,
						"KhoMoi"=>$KhoMoi,
						"error" => $this->check_text($NguoiTiepNhan, $NguoiBanGiao),
					);
					return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
				}
			}else{
				$data = array(
					"DieuChuyen"=>$result,
					"Kho"=>$Kho,
					"KhoCu"=>$KhoCu,
					"KhoMoi"=>$KhoMoi,
					"error" => $this->check_number($SoLuongDieuChuyen, $SoBienBan),
				);
				return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
			}
		}else{
			$data = array(
				"DieuChuyen"=>$result,
				"Kho"=>$Kho,
				"KhoCu"=>$KhoCu,
				"KhoMoi"=>$KhoMoi,
				"error" => $this->check_null($KhoChuyenToi, $SoLuongDieuChuyen, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan),
			);
			return $this->load->view('TheoDoiDieuChuyen/SuaDieuChuyen', $data);
		}
	}
	public function check_null($KhoChuyenToi, $SoLuongDieuChuyen, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan)
	{
		if($KhoChuyenToi==0 && empty($SoLuongDieuChuyen) && empty($NguoiBanGiao) && empty($NgayBanGiao) && empty($NguoiTiepNhan) && empty($SoBienBan) && empty($TinhTrang)){
			return "Vui lòng nhập đầy đủ thông tin";
		}elseif($KhoChuyenToi==0){
			return "Vui lòng chọn kho chuyển tới";
		}elseif(empty($SoLuongDieuChuyen)){
			return "Vui lòng nhập số lượng muốn điều chuyển";
		}elseif(empty($NguoiTiepNhan)){
			return "Vui lòng nhập người tiếp nhận";
		}elseif(empty($NgayBanGiao)){
			return "Vui lòng chọn ngày bàn giao";
		}elseif(empty($NguoiBanGiao)){
			return "Vui lòng nhập người bàn giao";
		}elseif(empty($NguoiTiepNhan)){
			return "Vui lòng nhập người tiếp nhận";
		}elseif(empty($TinhTrang)){
			return "Vui lòng nhập tình trạng thiết bị";
		}elseif(empty($SoBienBan)){
			return "Vui lòng nhập số biên bản";
		}else{
			return TRUE;
		}
	}
	public function check_number($SoLuongDieuChuyen, $SoBienBan){
		if(is_numeric($SoLuongDieuChuyen)!=1){
			return "Số lượng cần chuyển chỉ được nhập số";
		}if(is_numeric($SoBienBan)!=1){
			return "Số biên bản chỉ được nhập số";
		}else{
			return TRUE;
		}
	}
	public function check_text($NguoiTiepNhan, $NguoiBanGiao){
		if(is_string($NguoiTiepNhan)!=1){
			return "Người tiếp nhận chỉ được nhập chữ cái";
		}if(is_string($NguoiBanGiao)!=1){
			return "Người bàn giao chỉ được nhập chữ cái";
		}else{
			return TRUE;
		}
	}
}

/* End of file SuaDieuChuyen.php */
/* Location: ./application/controllers/SuaDieuChuyen.php */