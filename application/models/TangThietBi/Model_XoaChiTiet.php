<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_XoaChiTiet extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function XoaChiTiet($MaChungTu, $MaChiTietHoaDon)
	{
		$sql = "DELETE FROM chitiethoadon WHERE MaChungTu=? AND MaChiTietHoaDon=?";
		$result = $this->db->query($sql,array($MaChungTu, $MaChiTietHoaDon));
		return $result;
	}


}
