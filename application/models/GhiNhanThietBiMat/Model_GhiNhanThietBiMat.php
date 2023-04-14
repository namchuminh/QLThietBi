<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GhiNhanThietBiMat extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function ThemBaoMat($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan)
	{
		$sql = "INSERT INTO `ghinhanthietbimat`(`MaMonHoc`, `MaKho`, `MaThietBi`, `SoLuongMat`, `NguoiPhatHien`, `NgayPhatHien`, `LyDoMat`, SoBienBan) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaMonHoc, $MaKho, $MaThietBi, $SoLuongMat, $NguoiPhatHien, $NgayPhatHien, $LyDoMat, $SoBienBan));
		return $result;
	}
	public function GetAll_BaoMat(){
		$sql = "SELECT ghinhanthietbimat.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbimat`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbimat.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function KhoiPhuc($MaGhiNhanMat){
		$sql = "DELETE FROM ghinhanthietbimat WHERE MaGhiNhanMat = ?";
		$result = $this->db->query($sql, array($MaGhiNhanMat));
		return $result;
	}


	public function GetAll_BaoMatByDate1($TuNgay, $ToiNgay)
	{
		$sql = "SELECT ghinhanthietbimat.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbimat`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbimat.MaKho AND ghinhanthietbimat.NgayPhatHien >= ? AND ghinhanthietbimat.NgayPhatHien <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function GetAll_BaoMatByDate2($TuNgay)
	{
		$sql = "SELECT ghinhanthietbimat.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbimat`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbimat.MaKho AND ghinhanthietbimat.NgayPhatHien >= ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function GetAll_BaoMatByName($TenThietBi)
	{
		$sql = "SELECT ghinhanthietbimat.*, thietbi.*, chungtu.*, chitiethoadon.*  FROM `ghinhanthietbimat`, thietbi, chungtu, chitiethoadon WHERE ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaKho = chungtu.MaKho AND chitiethoadon.MaKho = ghinhanthietbimat.MaKho AND thietbi.TenThietBi LIKE '%".$TenThietBi."%'";
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

/* End of file Model_GhiNhanThietBiMat.php */
/* Location: ./application/models/Model_GhiNhanThietBiMat.php */