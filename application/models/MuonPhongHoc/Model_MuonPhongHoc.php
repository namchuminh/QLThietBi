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
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND phonghoc.MaPhongHoc = 1 AND muonphonghoc.NgayMuon >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) AND muonphonghoc.NgayMuon  < DATE_ADD(CURDATE(), INTERVAL 1 DAY);";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate1($NgayBatDauMuon, $MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayMuon = ? AND muonphonghoc.MaPhongHoc=?";
		$result = $this->db->query($sql, array($NgayBatDauMuon,  $MaPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByDate2($NgayBatDauMuon, $NgayKetThucMuon , $MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayMuon <= ? AND muonphonghoc.NgayMuon >= ? AND muonphonghoc.MaPhongHoc=?";
		$result = $this->db->query($sql, array($NgayBatDauMuon, $NgayKetThucMuon, $MaPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByBuoiHoc($BuoiHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.BuoiHoc = ?";
		$result = $this->db->query($sql, array($BuoiHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByMa($MaMuonPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.MaMuonPhongHoc = ?";
		$result = $this->db->query($sql, array($MaMuonPhongHoc));
		return $result->result_array();
		
	}
	public function GetMuonPhongByPhong($MaPhongHoc)
	{
		$sql = "SELECT muonphonghoc.*, phonghoc.*, lophoc.*, monhoc.* FROM muonphonghoc, phonghoc, lophoc, monhoc WHERE muonphonghoc.MaPhongHoc = phonghoc.MaPhongHoc AND muonphonghoc.MaLop = lophoc.MaLop AND muonphonghoc.MaMon = monhoc.MaMonHoc AND muonphonghoc.NgayMuon >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) AND muonphonghoc.NgayMuon  < DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND muonphonghoc.MaPhongHoc = ?";
		$result = $this->db->query($sql, array($MaPhongHoc));
		return $result->result_array();
		
	}
	public function Check_TonTai($TietHoc, $NgayMuon , $MaPhongHoc, $BuoiHoc){
		$sql ="SELECT * FROM `muonphonghoc` WHERE  TietHoc= ? AND NgayMuon = ?  AND MaPhongHoc = ? AND BuoiHoc = ?";
		$result = $this->db->query($sql, array($TietHoc, $NgayMuon, $MaPhongHoc, $BuoiHoc));
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