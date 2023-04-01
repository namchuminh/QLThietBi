<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_XuatExcel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_ChungTu($MaChungTu){
		$sql ="SELECT chungtu.*, thietbi.*, kho.*, nhacungcap.* FROM chungtu, thietbi, kho, nhacungcap WHERE nhacungcap.MaNhaCungCap=chungtu.MaNhaCungCap AND kho.MaKho = chungtu.MaKho AND chungtu.MaChungTu = ?";
		$result = $this->db->query($sql, array($MaChungTu));
		return $result->result_array();
	}
	public function Get_All($MaChungTu)
	{
		$sql = "SELECT chungtu.*, chitiethoadon.*, thietbi.*, kho.*, nhacungcap.* FROM chungtu, chitiethoadon, thietbi, kho, nhacungcap WHERE chungtu.MaChungTu=chitiethoadon.MaChungTu AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND nhacungcap.MaNhaCungCap=chungtu.MaNhaCungCap AND kho.MaKho = chungtu.MaKho AND chungtu.MaChungTu = ?";
		$result = $this->db->query($sql, array($MaChungTu));
		return $result->result_array();
		
	}

}

/* End of file Model_XuatExcel.php */
/* Location: ./application/models/Model_XuatExcel.php */