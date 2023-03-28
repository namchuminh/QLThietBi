<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SuaChungTu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_ChungTu_ByMa($MaChungTu)
	{
		$sql = "SELECT * FROM chungtu WHERE MaChungTu=?";
		$result = $this->db->query($sql,array($MaChungTu));
		return $result->result_array();
		
	}
	public function Sua($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd, $MaChungTu)
	{
		$sql = "UPDATE `chungtu` SET `NgayNhap`=?,`SoPhieu`=?,`LyDoTang`=?,`DienGiai`=?,`MaKho`=?,`MaNhaCungCap`=?,`SohdTaiChinh`=?,`KyHieu`=?,`Ngayhd`=? WHERE MaChungTu = ?";
		$result = $this->db->query($sql,array($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd, $MaChungTu));
		return $result;
		
	}

}

/* End of file Model_SuaChungTu.php */
/* Location: ./application/models/Model_SuaChungTu.php */