<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_XoaChungTu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Xoa($MaChungTu)
	{
		$sql = "DELETE FROM chungtu WHERE MaChungTu=?";
		$result = $this->db->query($sql,array($MaChungTu));
		return $result;
	}


}

/* End of file Model_XoaChungTu.php */
/* Location: ./application/models/Model_XoaChungTu.php */