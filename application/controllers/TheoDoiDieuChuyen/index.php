<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->model('Model_Login');
		$this->load->model('TangThietBi/Model_TangThietBi');
		$this->load->model('TangThietBi/Model_ThemChiTiet');
		$this->load->model('TheoDoiDieuChuyen/Model_TheoDoiDieuChuyen');
	}

	public function index()
	{
		$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
		$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
		$Kho = $this->Model_TangThietBi->Get_Kho();
		$data = array(
			'DieuChuyen' =>$DieuChuyen,
			'Kho'=>$Kho,
			'MonHoc'=>$MonHoc
		);
		return $this->load->view('TheoDoiDieuChuyen/index',$data);
	}
	public function ThemDieuChuyen(){

		$KhoChuyenToi = $this->input->post('MaKhoChuyenToi');
		$MaThietBi = $this->input->post('MaThietBi');
		$SoLuongDieuChuyen = $this->input->post('SoLuongDieuChuyen');
		$MaKhoCu = $this->input->post('MaKhoCu');
		$NgayBanGiao = $this->input->post('NgayBanGiao');
		$NguoiBanGiao = $this->input->post('NguoiBanGiao');
		$NguoiTiepNhan = $this->input->post('NguoiTiepNhan');
		$TinhTrang = $this->input->post('TinhTrang');
		$GhiChu = $this->input->post('GhiChu');
		$SoBienBan = $this->input->post('SoBienBan');
		if (gettype($this->check_null($KhoChuyenToi, $MaThietBi, $SoLuongDieuChuyen, $MaKhoCu, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan))=="boolean") {
			if (gettype($this->check_number($SoLuongDieuChuyen, $SoBienBan))=="boolean"){
				if (gettype($this->check_text($NguoiTiepNhan, $NguoiBanGiao))=="boolean"){
					$Check = $this->Model_TheoDoiDieuChuyen->Check_TonTai($MaThietBi, $KhoChuyenToi);
		//check thiet bi da ton tai trong kho hay chua
					if($Check!=null){//ton tai trong kho
						$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $MaKhoCu);
						$GetChiTietMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoChuyenToi);
						if ($GetChiTietCu[0]["SoLuong"]< $SoLuongDieuChuyen) {
							$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
							$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
							$Kho = $this->Model_TangThietBi->Get_Kho();
							$data = array(
								'DieuChuyen'=>$DieuChuyen,
								'Kho'=>$Kho,
								'MonHoc'=>$MonHoc,
								'error' => 'Số lượng điều chuyển lớn hơn số lượng trong kho đang có',
							);
							return $this->load->view('TheoDoiDieuChuyen/index',$data);
						}

						if($GetChiTietCu!=null && $GetChiTietMoi!=null){
							$MaChiTietHoaDonMoi = $GetChiTietMoi[0]['MaChiTietHoaDon'];
							$MaChiTietHoaDonCu = $GetChiTietCu[0]['MaChiTietHoaDon'];
							$result =  $this->Model_TheoDoiDieuChuyen->Add_DieuChuyen($MaThietBi, $NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $KhoChuyenToi, $TinhTrang, $GhiChu, $SoLuongDieuChuyen, $MaChiTietHoaDonMoi,$MaChiTietHoaDonCu);
							if ($result==True) {
								$update2 = $this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyen,$MaThietBi, $MaKhoCu);
								$update = $this->Model_TheoDoiDieuChuyen->Update_SoLuong($SoLuongDieuChuyen,$MaThietBi, $KhoChuyenToi);
								$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $MaKhoCu);
								if ($GetChiTietCu[0]["SoLuong"] == 0) {
									$this->Model_TheoDoiDieuChuyen->Xoa_ChiTiet($GetChiTietCu[0]["MaChiTietHoaDon"]);
								}
								return redirect(base_url("theo-doi-dieu-chuyen/"));
							}else{
								$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
								$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
								$Kho = $this->Model_TangThietBi->Get_Kho();
								$data = array(
									'DieuChuyen'=>$DieuChuyen,
									'Kho'=>$Kho,
									'MonHoc'=>$MonHoc,
									'error' => 'ThemThatBai',
								);
								return $this->load->view('TheoDoiDieuChuyen/index',$data);
							}
							
						}else{
							$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
							$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
							$Kho = $this->Model_TangThietBi->Get_Kho();
							$data = array(
								'DieuChuyen'=>$DieuChuyen,
								'Kho'=>$Kho,
								'MonHoc'=>$MonHoc,
								'error' => 'ThemThatBai',
							);
							return $this->load->view('TheoDoiDieuChuyen/index',$data);
						}
						

					}else{//neu thiet bị khong ton tai trong kho
						
						
						$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $MaKhoCu);
						if($GetChiTietCu!=null){
							
							$MaChungTu = $GetChiTietCu[0]['MaChungTu'];
							$MaMonHoc = $GetChiTietCu[0]['MaMonHoc'];
							$KhoiLop = $GetChiTietCu[0]['KhoiLop'];
							$DonGia = $GetChiTietCu[0]['DonGia'];
							$MaQuanLyThietBi = $GetChiTietCu[0]['MaCaBiet'];
							$DonViTinh = $GetChiTietCu[0]['DonViTinh'];
							$Vat = $GetChiTietCu[0]['Vat'];
							$ThanhTien = ($DonGia*$SoLuongDieuChuyen) -  ($DonGia*$SoLuongDieuChuyen*$Vat)/100;
							$ThoiGianKhauHao = $GetChiTietCu[0]['ThoiGianKhauHao'];
							$ThemChiTiet = $this->Model_ThemChiTiet->ThemChiTiet($MaChungTu, $MaMonHoc, $KhoiLop, $MaThietBi, $SoLuongDieuChuyen, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao,$KhoChuyenToi);
							if ($ThemChiTiet==True) {
								$GetChiTietMoi = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $KhoChuyenToi);
								$GetChiTietCu = $this->Model_TheoDoiDieuChuyen->Get_ChiTiet($MaThietBi, $MaKhoCu);
								$MaChiTietHoaDonMoi = $GetChiTietMoi[0]["MaChiTietHoaDon"];
								$MaChiTietHoaDonCu = $GetChiTietCu[0]['MaChiTietHoaDon'];
								$result =  $this->Model_TheoDoiDieuChuyen->Add_DieuChuyen($MaThietBi, $NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $KhoChuyenToi, $TinhTrang, $GhiChu, $SoLuongDieuChuyen, $MaChiTietHoaDonMoi,$MaChiTietHoaDonCu);
								if ($result==True) {
									$update2 = $this->Model_TheoDoiDieuChuyen->Update_SoLuong2($SoLuongDieuChuyen,$MaThietBi, $MaKhoCu);
									return redirect(base_url("theo-doi-dieu-chuyen/"));
								}else{
									$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
									$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
									$Kho = $this->Model_TangThietBi->Get_Kho();
									$data = array(
										'DieuChuyen' =>$DieuChuyen,
										'Kho'=>$Kho,
										'MonHoc'=>$MonHoc,
										'error' => 'ThemThatBai',
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
					$DieuChuyen = $this->Model_TheoDoiDieuChuyen->Get_DieuChuyen();
					$MonHoc = $this->Model_ThemChiTiet->Get_MonHoc();
					$Kho = $this->Model_TangThietBi->Get_Kho();
					$data = array(
						'DieuChuyen' =>$DieuChuyen,
						'Kho'=>$Kho,
						'MonHoc'=>$MonHoc,
						'error' => $this->check_text($NguoiTiepNhan, $NguoiBanGiao),
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
					'error' => $this->check_number($SoLuongDieuChuyen, $SoBienBan),
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
				'error' => $this->check_null($KhoChuyenToi, $MaThietBi, $SoLuongDieuChuyen, $MaKhoCu, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan),
			);
			return $this->load->view('TheoDoiDieuChuyen/index',$data);
		}



		
	}
	public function check_null($KhoChuyenToi, $MaThietBi, $SoLuongDieuChuyen, $MaKhoCu, $NgayBanGiao, $NguoiBanGiao, $NguoiTiepNhan, $TinhTrang, $SoBienBan)
	{
		if($KhoChuyenToi==0 && $MaKhoCu==0 && empty($MaThietBi) && empty($SoLuongDieuChuyen) && empty($NguoiBanGiao) && empty($NgayBanGiao) && empty($NguoiTiepNhan) && empty($SoBienBan) && empty($TinhTrang)){
			return "Vui lòng nhập đầy đủ thông tin";
		}elseif($KhoChuyenToi==0){
			return "Vui lòng chọn kho chuyển tới";
		}elseif(empty($MaThietBi)){
			return "Vui lòng chọn Thiết bị muốn chuyển";
		}elseif(empty($SoLuongDieuChuyen)){
			return "Vui lòng nhập số lượng muốn điều chuyển";
		}elseif(empty($NguoiTiepNhan)){
			return "Vui lòng nhập người tiếp nhận";
		}elseif($MaKhoCu==0){
			return "Vui lòng chọn kho";
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
	public function Kho($MaMonHoc)
	{
		echo '<option value="0" hidden>Chọn Kho</option>';
		$Kho = $this->Model_TheoDoiDieuChuyen->Get_KhoByMaMonHoc($MaMonHoc);
		if ($Kho==null) {
			echo '<option value="0">Chưa Có Kho Nào</option>';
		}

		foreach ($Kho as $key => $value) {
			echo '<option id="MaKho" value="'.$value["MaKho"].'">'.$value["TenKho"].'</option>';
		}	
	}
	public function ThietBi($MaMonHoc, $MaKho)
	{
		echo '<option value="0" hidden>Chọn thiết bị</option>';
		$ThietBi = $this->Model_TheoDoiDieuChuyen->Get_ThietBi($MaMonHoc, $MaKho);
		if ($ThietBi==null) {
			echo '<option value="0">Chưa có thiết bị nào</option>';
		}

		foreach ($ThietBi as $key => $value) {
			echo '<option id="MaThietBi" value="'.$value["MaThietBi"].'">'.$value["TenThietBi"].'</option>';
		}
	}

}


/* End of file index.php */
/* Location: ./application/controllers/index.php */