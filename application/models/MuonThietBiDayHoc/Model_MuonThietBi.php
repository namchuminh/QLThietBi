<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_MuonThietBi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_MuonThietBi()
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_MuonThietBiByMa2($MaMuonThietBi)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = ?";
		$result = $this->db->query($sql,array($MaMuonThietBi));
		return $result->result_array();
		
	}
	public function Get_Kho()
	{
		$sql = "SELECT * FROM kho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_MonHoc()
	{
		$sql = "SELECT * FROM monhoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_LopHoc()
	{
		$sql = "SELECT * FROM lophoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBi($MaThietBi)
	{
		$sql = "SELECT thietbi.* FROM kho, thietbi, chitiethoadon WHERE kho.MaKho = chitiethoadon.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND kho.MaKho = ?";
		$result = $this->db->query($sql, array($MaThietBi));
		return $result->result_array();
		
	}
	public function ThemMuonThietBi($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu)
	{
		$sql = "INSERT INTO `muonthietbi`(`NgayMuon`, `NgayTra`, `SoPhieu`, `MaThietBi`, `SoLuongMuon`, `NguoiMuon`, `MaKho`, `GhiChu`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($NgayMuon,$NgayTra,$SoPhieu ,$MaThietBi,$SoLuongMuon,$NguoiMuon,$MaKho,$GhiChu));
		return $result;
		
	}
	public function ThemChiTiet($MaMuonThietBi, $MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc)
	{
		$sql = "INSERT INTO `chitietphieumuon`(`MaMuonThietBi`, `MaLop`, `MaMonHoc`, `SoTiet`, `TenBaiHoc`) VALUES (?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaMuonThietBi, $MaLop, $MaMonHoc, $SoTiet, $TenBaiHoc));
		return $result;
		
	}
	public function Get_ChiTiet($MaMuonThietBi)
	{
		$sql = "SELECT lophoc.*, monhoc.*, chitietphieumuon.* FROM `chitietphieumuon`, lophoc, monhoc WHERE chitietphieumuon.MaLop = lophoc.MaLop AND monhoc.MaMonHoc = chitietphieumuon.MaMonHoc AND chitietphieumuon.MaMuonThietBi = ?";
		$result = $this->db->query($sql, array($MaMuonThietBi));
		return $result->result_array();
		
	}
	public function Xoa_ChiTiet($MaChiTietPhieuMuon)
	{
		$sql = "DELETE FROM `chitietphieumuon` WHERE MaChiTietPhieuMuon = ?";
		$result = $this->db->query($sql, array($MaChiTietPhieuMuon));
		return $result;
		
	}
	public function Xoa_PhieuMuon($MaMuonThietBi)
	{
		$sql = "DELETE FROM muonthietbi WHERE MaMuonThietBi = ?";
		$result = $this->db->query($sql, array($MaMuonThietBi));
		return $result;
		
	}
	public function Get_MuonThietBiByMa($MaMuonThietBi)
	{
		$sql = "SELECT * FROM `muonthietbi` WHERE MaMuonThietBi = ?";
		$result = $this->db->query($sql, array($MaMuonThietBi));
		return $result->result_array();
		
	}
	public function GiaHanMuon($NgayTra, $MaMuonThietBi)
	{
		$sql = "UPDATE muonthietbi set NgayTra = ? Where  MaMuonThietBi =?";
		$result = $this->db->query($sql, array($NgayTra, $MaMuonThietBi));
		return $result;
		
	}
	public function Get_MuonThietBiByDate($NgayLamViec)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND NgayMuon >= ? <= NgayTra";
		$result = $this->db->query($sql, array($NgayLamViec));
		return $result->result_array();
		
	}
	public function Get_MuonThietBiByName($NguoiMuon)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND NguoiMuon LIKE '%".$NguoiMuon."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_MuonThietBiByMaMon($MaMon)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.* , chitiethoadon.* FROM `muonthietbi`, chitietphieumuon, thietbi, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($MaMon));
		return $result->result_array();
	}
	public function TraThietBi($MaMuonThietBi, $NgayTra, $SoLuongTra, $TinhTrang){
		$sql = "INSERT INTO `chitietphieutra`(`MaMuonThietBi`, `NgayTraThietBi`, `SoLuongTra`, `TinhTrangKhiTra`) VALUES (?,?,?,?)";
		$result = $this->db->query($sql, array($MaMuonThietBi, $NgayTra, $SoLuongTra, $TinhTrang));
		return $result;
	}
	public function GetTraThietBi($MaMuonThietBi){
		$sql = "SELECT * FROM chitietphieutra WHERE MaMuonThietBi = ?";
		$result = $this->db->query($sql, array($MaMuonThietBi));
		return $result->result_array();
	}


}

/* End of file Model_MuonThietBi.php */
/* Location: ./application/models/Model_MuonThietBi.php */