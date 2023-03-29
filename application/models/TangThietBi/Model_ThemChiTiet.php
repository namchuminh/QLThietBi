<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ThemChiTiet extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_ChiTiet($MaChungTu)
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, thietbi.* FROM `chitiethoadon`, chungtu, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND thietbi.MaThietBi = chitiethoadon.MaThietBi AND chungtu.MaChungTu =?";
		$result = $this->db->query($sql,array($MaChungTu));
		return $result->result_array();
		
	}

	public function Get_MonHoc()
	{
		$sql = "SELECT * FROM monhoc";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBi()
	{
		$sql = "SELECT * FROM thietbi";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_QuanLyThietBi()
	{
		$sql = "SELECT * FROM quanlythietbi";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function ThemChiTiet($MaChungTu, $MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao){
		$sql = "INSERT INTO `chitiethoadon`(`MaChungTu`, `MaMonHoc`, `KhoiLop`, `MaThietBi`, `SoLuong`, `DonGia`, `MaCaBiet`, `DonViTinh`, `Vat`, `ThanhTien`, `ThoiGianKhauHao`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaChungTu, $MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaQuanLyThietBi, $DonViTinh, $Vat, $ThanhTien, $ThoiGianKhauHao));
		return $result;
	}

}

/* End of file Model_ThemChiTiet.php */
/* Location: ./application/models/Model_ThemChiTiet.php */