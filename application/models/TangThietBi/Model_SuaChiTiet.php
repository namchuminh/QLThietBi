<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SuaChiTiet extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_ChiTiet_ById($MaChungTu, $MaChiTietHoaDon)
	{
		$sql = "SELECT * FROM `chitiethoadon` WHERE MaChungTu = ? and MaChiTietHoaDon=?";
		$result = $this->db->query($sql, array($MaChungTu, $MaChiTietHoaDon));
		return $result->result_array();
		
	}
	public function SuaChiTiet($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaCaBiet, $DonViTinh, $Vat, $ThanhTien,$ThoiGianKhauHao, $MaChungTu, $MaChiTietHoaDon){
		$sql = "UPDATE `chitiethoadon` SET `MaMonHoc`=?,`KhoiLop`=?,`MaThietBi`=?,`SoLuong`=?,`DonGia`=?,`MaCaBiet`=?,`DonViTinh`=?,`Vat`=?,`ThanhTien`=?,`ThoiGianKhauHao`=? WHERE MaChungTu= ? AND MaChiTietHoaDon =?";
		$result = $this->db->query($sql, array($MaMonHoc, $KhoiLop, $MaThietBi, $SoLuong, $DonGia, $MaCaBiet, $DonViTinh, $Vat, $ThanhTien,$ThoiGianKhauHao, $MaChungTu, $MaChiTietHoaDon));
		return $result;
	}

}

/* End of file Model_SuaChiTiet.php */
/* Location: ./application/models/Model_SuaChiTiet.php */