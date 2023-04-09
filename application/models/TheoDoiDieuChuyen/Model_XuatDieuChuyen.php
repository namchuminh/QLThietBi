<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_XuatDieuChuyen extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_DieuChuyen($MaDieuChuyen)
	{
		$sql = "SELECT dieuchuyen.*, kho.*, thietbi.* FROM dieuchuyen, kho, thietbi WHERE dieuchuyen.MaKho= kho.MaKho AND dieuchuyen.MaThietBi = thietbi.MaThietBi AND MaDieuChuyen=?";
		$result = $this->db->query($sql, array($MaDieuChuyen));
		return $result->result_array();
		
	}

}

/* End of file Model_XuatDieuChuyen.php */
/* Location: ./application/models/Model_XuatDieuChuyen.php */