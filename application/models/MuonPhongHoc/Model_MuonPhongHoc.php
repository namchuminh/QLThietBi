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
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND phonghoc.MaPhongHoc = 1 AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(CURDATE(), 1)";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate1($NgayBatDauMuon, $MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayMuon = ? AND muonphonghoc.MaPhongHoc =? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK( ? , 1)";
		$result = $this->db->query($sql, array($NgayBatDauMuon,  $MaPhongHoc, $NgayBatDauMuon));
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate2($NgayBatDauMuon, $NgayKetThucMuon , $MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayMuon <= ? AND muonphonghoc.NgayMuon >= ? AND muonphonghoc.MaPhongHoc=? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(?, 1)";
		$result = $this->db->query($sql, array($NgayBatDauMuon, $NgayKetThucMuon, $MaPhongHoc, $NgayBatDauMuon));
		return $result->result_array();
		
	}
	public function GetMuonPhongByBuoiHoc($BuoiHoc, $MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.BuoiHoc = ? AND muonphonghoc.MaPhongHoc = ?  AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(CURDATE(), 1)";
		$result = $this->db->query($sql, array($BuoiHoc, $MaPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByMa($MaMuonPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.MaMuonPhongHoc = ? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(CURDATE(), 1)";
		$result = $this->db->query($sql, array($MaMuonPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByPhong($MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(CURDATE(), 1) AND muonphonghoc.MaPhongHoc = ? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(CURDATE(), 1)";
		$result = $this->db->query($sql, array($MaPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByALL($NgayBatDauMuon, $NgayKetThucMuon , $MaPhongHoc, $BuoiHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND  muonphonghoc.NgayMuon >= ? AND  muonphonghoc.NgayMuon <= ? AND  muonphonghoc.MaPhongHoc = ?  AND muonphonghoc.BuoiHoc = ? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(?, 1)";
		$result = $this->db->query($sql, array($NgayBatDauMuon, $NgayKetThucMuon , $MaPhongHoc, $BuoiHoc, $NgayBatDauMuon));
		return $result->result_array();
		
	}
	public function GetMuonPhongByALL2($NgayBatDauMuon, $MaPhongHoc, $BuoiHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND  muonphonghoc.NgayMuon = ? AND muonphonghoc.MaPhongHoc = ?  AND muonphonghoc.BuoiHoc = ? AND YEARWEEK(muonphonghoc.NgayMuon, 1) = YEARWEEK(?, 1)";
		$result = $this->db->query($sql, array($NgayBatDauMuon, $MaPhongHoc, $BuoiHoc, $NgayBatDauMuon));
		return $result->result_array();
		
	}
	public function Check_TonTai($TietHoc, $NgayMuon , $MaPhongHoc, $BuoiHoc){
		$sql ="SELECT * FROM `muonphonghoc` WHERE  TietHoc= ? AND NgayMuon = ?  AND MaPhongHoc = ? AND BuoiHoc = ?";
		$result = $this->db->query($sql, array($TietHoc, $NgayMuon, $MaPhongHoc, $BuoiHoc));
		return $result->result_array();
	}
	public function Check_TonTai2($MaMuonPhongHoc){
		$sql ="SELECT * FROM `traphonghoc` WHERE MaMuonPhongHoc = ?";
		$result = $this->db->query($sql, array($MaMuonPhongHoc));
		return $result->result_array();
	}
	public function ADD($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon){
		$sql ="INSERT INTO `muonphonghoc`(`MaPhongHoc`, `BuoiHoc`, `TietHoc`, `MaLop`, `MaMon`, `TenBaiHoc`, `NgayMuon`, `NguoiMuon`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon));
		return $result;
	}
	public function ADD_Tra($NgayTraPhong, $MaMuonPhongHoc, $TinhTrang){
		$sql ="INSERT INTO `traphonghoc`(`NgayTraPhong`, `MaMuonPhongHoc`, `TinhTrang`) VALUES (?,?,?)";
		$result = $this->db->query($sql, array($NgayTraPhong, $MaMuonPhongHoc, $TinhTrang));
		return $result;
	}
	public function Update($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon, $MaMuonPhongHoc){
		$sql ="UPDATE `muonphonghoc` SET `MaPhongHoc`=?,`BuoiHoc`=?,`TietHoc`=?,`MaLop`=?,`MaMon`=?,`TenBaiHoc`=?,`NgayMuon`=?,`NguoiMuon`=? WHERE MaMuonPhongHoc = ?";
		$result = $this->db->query($sql, array($MaPhongHoc , $BuoiHoc  , $TietHoc  , $MaLop  , $MaMon  , $TenBaiHoc  , $NgayMuon , $NguoiMuon, $MaMuonPhongHoc));
		return $result;
	}

}

/* End of file Model_MuonPhongHoc.php */
/* Location: ./application/models/Model_MuonPhongHoc.php */