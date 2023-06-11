<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_NhatKyMuonTra extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_All()
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	
	public function Get_AllByDate1($NgayTra)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NgayMuon = ?";
		$result = $this->db->query($sql, array($NgayTra));
		return $result->result_array();
		
	}
	public function Get_AllByDate2($TuNgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ? ";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_AllByName($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_AllByName2($TuNgay, $ToiNgay, $TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ?  AND  muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_AllByName3($TuNgay, $TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NgayMuon = ?  AND  muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_AllByMonHoc($MonHoc)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($MonHoc));
		return $result->result_array();
		
	}
	public function Get_AllByMonHoc2($TuNgay, $ToiNgay, $MonHoc)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ?  AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay, $MonHoc));
		return $result->result_array();
		
	}


	public function Get_All2()
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra)";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}

	public function Get_All2ByDate1($NgayTra)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NgayMuon = ?";
		$result = $this->db->query($sql, array($NgayTra));
		return $result->result_array();
		
	}
	public function Get_All2ByDate2($TuNgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ? ";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_All2ByName($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_All2ByName2($TuNgay, $ToiNgay, $TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ?  AND  muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_All2ByName3($TuNgay, $TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NgayMuon = ?  AND  muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_All2ByMonHoc($MonHoc)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($MonHoc));
		return $result->result_array();
		
	}
	public function Get_All2ByMonHoc2($TuNgay, $ToiNgay, $MonHoc)
	{
		$sql = "SELECT muonthietbi.* , thietbi.*, chitiethoadon.*, chitietphieumuon.* FROM `muonthietbi`, thietbi, chitiethoadon, chitietphieumuon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NgayMuon >= ? AND  muonthietbi.NgayMuon <= ?  AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay, $MonHoc));
		return $result->result_array();
		
	}




}

/* End of file Model_NhatKyMuonTra.php */
/* Location: ./application/models/Model_NhatKyMuonTra.php */