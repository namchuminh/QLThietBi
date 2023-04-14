<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GhiNhanThietBiHong extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_DataLoad($MaMonHoc, $MaKho)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.* FROM `chitiethoadon`, chungtu, thietbi WHERE chitiethoadon.MaThietBi = thietbi.MaThietBi AND chungtu.MaChungTu = chitiethoadon.MaChungTu AND chitiethoadon.MaMonHoc = ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaMonHoc, $MaKho));
		return $result->result_array();
		
	}
	public function ThemBaoHong($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan)
	{
		$sql = "INSERT INTO `ghinhanthietbihong`(`MaMonHoc`, `MaKho`, `MaThietBi`, `SoLuongHong`, `NguoiPhatHien`, `NgayPhatHien`, `LyDoHong`, SoBienBan) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaMonHoc, $MaKho, $MaThietBi, $SoLuongHong, $NguoiPhatHien, $NgayPhatHien, $LyDoHong, $SoBienBan));
		return $result;
		
	}
	public function KhoiPhuc($MaGhiNhanHong){
		$sql = "DELETE FROM ghinhanthietbihong WHERE MaGhiNhanHong = ?";
		$result = $this->db->query($sql, array($MaGhiNhanHong));
		return $result;
	}
	public function GetAll_BaoHong()
	{
		$sql = "SELECT ghinhanthietbihong.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbihong`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbihong.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function GetAll_BaoHongByDate1($TuNgay, $ToiNgay)
	{
		$sql = "SELECT ghinhanthietbihong.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbihong`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbihong.MaKho AND ghinhanthietbihong.NgayPhatHien >= ? AND ghinhanthietbihong.NgayPhatHien <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function GetAll_BaoHongByDate2($TuNgay)
	{
		$sql = "SELECT ghinhanthietbihong.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbihong`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbihong.MaKho AND ghinhanthietbihong.NgayPhatHien >= ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function GetAll_BaoHongByName($TenThietBi)
	{
		$sql = "SELECT ghinhanthietbihong.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbihong`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbihong.MaKho AND thietbi.TenThietBi LIKE '%".$TenThietBi."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	// public function GetAll_BaoHongByMaCaBiet($MaCaBiet)
	// {
	// 	$sql = "SELECT ghinhanthietbihong.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbihong`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbihong.MaKho AND thietbi.TenThietBi AND chitiethoadon.MaCaBiet like '%".$MaCaBiet."%'";
	// 	$result = $this->db->query($sql);
	// 	return $result->result_array();
	// }




}

/* End of file Model_GhiNhanThietBiHong.php */
/* Location: ./application/models/Model_GhiNhanThietBiHong.php */