<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TheoDoiDieuChuyen extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_ChiTiet($MaThietBi, $MaKho)
	{
		$sql = "SELECT chitiethoadon.* FROM `chitiethoadon` WHERE MaThietBi = ? AND MaKho=?;";
		$result = $this->db->query($sql, array($MaThietBi, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ChiTietByMa($MaChiTietHoaDon)
	{
		$sql = "SELECT chitiethoadon.*, kho.* FROM `chitiethoadon`, kho WHERE chitiethoadon.MaKho = kho.MaKho AND MaChiTietHoaDon=?;";
		$result = $this->db->query($sql, array($MaChiTietHoaDon));
		return $result->result_array();
		
	}
	public function Get_KhoByMaMonHoc($MaMonHoc)
	{
		$sql = "SELECT chitiethoadon.*, kho.* FROM `chitiethoadon`, kho, monhoc WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaMonHoc = ?;";
		$result = $this->db->query($sql, array($MaMonHoc));
		return $result->result_array();
		
	}
	public function Get_ThietBi($MaMonHoc, $MaKho)
	{
		$sql = "SELECT thietbi.* FROM `chitiethoadon`, kho, monhoc, thietbi WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND thietbi.MaThietBi = chitiethoadon.MaThietBi AND chitiethoadon.MaMonHoc = ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaMonHoc, $MaKho));
		return $result->result_array();
		
	}
	public function Check_TonTai($MaThietBi, $MaKho)
	{
		$sql = "SELECT thietbi.* FROM `chitiethoadon`, kho, monhoc, thietbi WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND thietbi.MaThietBi = chitiethoadon.MaThietBi AND chitiethoadon.MaThietBi = ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaThietBi, $MaKho));
		return $result->result_array();
		
	}
	public function Update_SoLuong($SoLuongDieuChuyen, $MaThietBi, $MaKho)
	{
		$sql = "UPDATE `chitiethoadon` SET `SoLuong`= (SoLuong + ?), ThanhTien = SoLuong*DonGia + (SoLuong*DonGia*Vat)/100  WHERE MaThietBi = ? AND MaKho = ?";
		$result = $this->db->query($sql, array($SoLuongDieuChuyen, $MaThietBi, $MaKho));
		return $result;
	}
	public function Update_SoLuong2($SoLuongDieuChuyen, $MaThietBi, $MaKhoCu)
	{
		$sql = "UPDATE `chitiethoadon` SET `SoLuong`= (SoLuong - ?), ThanhTien = SoLuong *DonGia + (SoLuong*DonGia*Vat)/100  WHERE MaThietBi = ? AND MaKho = ?";
		$result = $this->db->query($sql, array($SoLuongDieuChuyen, $MaThietBi, $MaKhoCu));
		return $result;
	}

	public function Get_SoLuongThietBi($MaMonHoc, $MaThietBi)
	{
		$sql = "SELECT chitiethoadon.*, monhoc.*, thietbi.* FROM `chitiethoadon`,monhoc, thietbi WHERE chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaMonHoc=? AND chitiethoadon.MaThietBi = ?;
";
		$result = $this->db->query($sql, array($MaMonHoc, $MaThietBi));
		return $result->result_array();
		
	}
	public function Add_DieuChuyen($MaThietBi, $NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $MaKho, $TinhTrang, $GhiChu, $SoLuongDieuChuyen, $MaChiTietHoaDonMoi, $MaChiTietHoaDonCu)
	{
		$sql = "INSERT INTO `dieuchuyen`(`MaThietBi`, `NgayBanGiao`, `SoBienBan`, `NguoiBanGiao`, `NguoiTiepNhan`, `MaKho`, `TinhTrang`, `GhiChu`, SoLuongDieuChuyen, MaChiTietHoaDonMoi, MaChiTietHoaDonCu) VALUES (?,?,?,?,?,?,?,?,?, ?,?)";
		$result = $this->db->query($sql, array($MaThietBi, $NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $MaKho, $TinhTrang, $GhiChu, $SoLuongDieuChuyen, $MaChiTietHoaDonMoi, $MaChiTietHoaDonCu));
		return $result;
		
	}
	
	public function Xoa_ChiTiet($MaChiTietHoaDon)
	{
		$sql = "DELETE FROM `chitiethoadon` WHERE MaChiTietHoaDon = ?";
		$result = $this->db->query($sql, array($MaChiTietHoaDon));
		return $result;
	}
	public function Get_DieuChuyen()
	{
		$sql = "SELECT dieuchuyen.*, thietbi.*, kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_DieuByMa($MaDieuChuyen)
	{
		$sql = "SELECT * FROM dieuchuyen WHERE MaDieuChuyen = ?";
		$result = $this->db->query($sql, array($MaDieuChuyen));
		return $result->result_array();
	}
	public function Get_DieuChuyenByMa2($MaDieuChuyen)
	{
		$sql = "SELECT dieuchuyen.*, kho.*, thietbi.* FROM dieuchuyen, kho, thietbi WHERE dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.MaThietBi = thietbi.MaThietBi AND MaDieuChuyen = ?";
		$result = $this->db->query($sql, array($MaDieuChuyen));
		return $result->result_array();
	}

	public function Xoa_DieuChuyen($MaDieuChuyen)
	{
		$sql = "DELETE FROM dieuchuyen WHERE MaDieuChuyen = ?";
		$result = $this->db->query($sql, array($MaDieuChuyen));
		return $result;
	}
	public function Update_ChiTiet($SoLuong, $MaChiTietHoaDon)
	{
		$sql = "UPDATE chitiethoadon set SoLuong = SoLuong + ?, ThanhTien = ((SoLuong*DonGia) + (SoLuong*DonGia*Vat)/100) WHERE MaChiTietHoaDon = ?";
		$result = $this->db->query($sql, array($SoLuong, $MaChiTietHoaDon));
		return $result;
	}
	public function SuaDieuChuyen($NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $MaKho, $TinhTrang, $GhiChu,$SoLuongDieuChuyen,$ChiTietHoaDonMoi ,$MaDieuChuyen)
	{
		$sql = "UPDATE `dieuchuyen` SET `NgayBanGiao`= ?,`SoBienBan`=?,`NguoiBanGiao`=?,`NguoiTiepNhan`=?,`MaKho`=?,`TinhTrang`=?,`GhiChu`=?,`SoLuongDieuChuyen`=?,`MaChiTietHoaDonMoi`=? WHERE MaDieuChuyen = ?";
		$result = $this->db->query($sql, array($NgayBanGiao, $SoBienBan, $NguoiBanGiao, $NguoiTiepNhan, $MaKho, $TinhTrang, $GhiChu,$SoLuongDieuChuyen,$ChiTietHoaDonMoi ,$MaDieuChuyen));
		return $result;
	}
	public function Xoa_ChiTiet2()
	{
		$sql = "DELETE FROM chitiethoadon WHERE SoLuong = 0";
		$result = $this->db->query($sql);
		return $result;
	}
}

/* End of file Model_TheoDoiDieuChuyen.php */
/* Location: ./application/models/Model_TheoDoiDieuChuyen.php */