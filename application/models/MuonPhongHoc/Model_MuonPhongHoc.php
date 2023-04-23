<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_MuonPhongHoc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function GetPhongHoc()
	{
		$sql = "SELECT * FROM phonghoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetLopHoc()
	{
		$sql = "SELECT * FROM lophoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetMonHoc()
	{
		$sql = "SELECT * FROM monhoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Delete($MaMuonPhongHoc)
	{
		$sql = "DELETE FROM `muonphonghoc` WHERE MaMuonPhongHoc = ?";
		$result = $this->db->query($sql, array($MaMuonPhongHoc));
		return $result;
		
	}
	public function GetMuonPhong()
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate1($NgayBatDauMuon)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayBatDauMuon = ?";
		$result = $this->db->query($sql, array($NgayBatDauMuon));
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate2($NgayBatDauMuon, $NgayKetThucMuon)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayBatDauMuon <= ? AND muonphonghoc.NgayKetThucMuon >= ?";
		$result = $this->db->query($sql, array($NgayBatDauMuon, $NgayKetThucMuon));
		return $result->result_array();
		
	}
	public function GetMuonPhongByBuoiHoc($BuoiHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.BuoiHoc = ?";
		$result = $this->db->query($sql, array($BuoiHoc));
		return $result->result_array();
		
	}
	public function Check_TonTai($TietHoc, $NgayBatDauMuon, $NgayKetThucMuon , $MaPhongHoc, $BuoiHoc){
		$sql ="SELECT * FROM `muonphonghoc` WHERE  TietHoc= ? AND NgayBatDauMuon <= ? AND NgayKetThucMuon >= ? AND MaPhongHoc = ? AND BuoiHoc = ?";
		$result = $this->db->query($sql, array($TietHoc, $NgayBatDauMuon, $NgayKetThucMuon, $MaPhongHoc, $BuoiHoc));
		return $result->result_array();
	}
	public function ADD($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon){
		$sql ="INSERT INTO `muonphonghoc`(`MaPhongHoc`, `BuoiHoc`, `TietHoc`, `MaLop`, `MaMon`, `TenBaiHoc`, `NgayBatDauMuon`, `NgayKetThucMuon`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayBatDauMuon , $NgayKetThucMuon));
		return $result;
	}

}

/* End of file Model_MuonPhongHoc.php */
/* Location: ./application/models/Model_MuonPhongHoc.php */