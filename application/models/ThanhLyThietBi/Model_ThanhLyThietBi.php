<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ThanhLyThietBi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function ThemMoi($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy)
	{
		$sql = "INSERT INTO `thanhlythietbi`(`MaThietBi`, `MaKho`, `SoLuongThanhLy`, `NgayGhiNhan`, `NguoiPhatHien`, `SoBienBan`, `DonGiaThanhLy`, `LyDoThanhLy`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaThietBi, $MaKho, $SoLuong, $NgayGhiNhan, $NguoiPhatHien, $SoBienBan, $DonGiaThanhLy, $LyDoThanhLy));
		return $result;
	}
	public function Get_ALL()
	{
		$sql = "SELECT thanhlythietbi.*, kho.*, thietbi.*, chitiethoadon.* FROM `thanhlythietbi`,kho, thietbi, chitiethoadon WHERE thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = thanhlythietbi.MaKho AND thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_AllByName($TenThietBi)
	{
		$sql = "SELECT thanhlythietbi.*, kho.*, thietbi.*, chitiethoadon.* FROM `thanhlythietbi`,kho, thietbi, chitiethoadon WHERE thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = thanhlythietbi.MaKho AND thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thietbi.TenThietBi LIKE '%".$TenThietBi."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_AllByMaCaBiet($MaCaBiet)
	{
		$sql = "SELECT thanhlythietbi.*, kho.*, thietbi.*, chitiethoadon.* FROM `thanhlythietbi`,kho, thietbi, chitiethoadon WHERE thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = thanhlythietbi.MaKho AND thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND chitiethoadon.MaCaBiet = '".$MaCaBiet."'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_AllByDate1($TuNgay)
	{
		$sql = "SELECT thanhlythietbi.*, kho.*, thietbi.*, chitiethoadon.* FROM `thanhlythietbi`,kho, thietbi, chitiethoadon WHERE thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = thanhlythietbi.MaKho AND thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.NgayGhiNhan = '".$TuNgay."'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_AllByDate2($TuNgay, $ToiNgay)
	{
		$sql = "SELECT thanhlythietbi.*, kho.*, thietbi.*, chitiethoadon.* FROM `thanhlythietbi`,kho, thietbi, chitiethoadon WHERE thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = thanhlythietbi.MaKho AND thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.NgayGhiNhan >= ? AND thanhlythietbi.NgayGhiNhan <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
	}
	public function KhoiPhuc($MaThanhLyThietBi)
	{
		$sql = "DELETE FROM `thanhlythietbi` WHERE MaThanhLyThietBi = ?";
		$result = $this->db->query($sql, array($MaThanhLyThietBi));
		return $result;
	}

}

/* End of file Model_ThanhLyThietBi.php */
/* Location: ./application/models/Model_ThanhLyThietBi.php */