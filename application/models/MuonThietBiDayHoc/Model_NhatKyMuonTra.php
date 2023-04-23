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
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND chitietphieutra.NgayTraThietBi >= ?";
		$result = $this->db->query($sql, array($NgayTra));
		return $result->result_array();
		
	}
	public function Get_AllByDate2($TuNgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND chitietphieutra.NgayTraThietBi >= ? AND  chitietphieutra.NgayTraThietBi <= ? ";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_AllByName($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND muonthietbi.NguoiMuon LIKE '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_AllByMonHoc($MonHoc)
	{
		$sql = "SELECT muonthietbi.*, thietbi.*, chitietphieumuon.*, chitietphieutra.*, chitiethoadon.* FROM `muonthietbi`, thietbi, chitietphieumuon, chitietphieutra, chitiethoadon WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaMuonThietBi = muonthietbi.MaMuonThietBi AND chitietphieutra.MaMuonThietBi = MuonThietBi.MaMuonThietBi AND chitiethoadon.MaKho = muonthietbi.MaKho AND chitietphieumuon.MaMonHoc = ?";
		$result = $this->db->query($sql, array($MonHoc));
		return $result->result_array();
		
	}




}

/* End of file Model_NhatKyMuonTra.php */
/* Location: ./application/models/Model_NhatKyMuonTra.php */