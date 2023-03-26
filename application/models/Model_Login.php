<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Login($TaiKhoan, $MatKhau)
	{
		$sql = "SELECT * FROM taikhoan WHERE TaiKhoan = ? AND MatKhau = ?";
		$result = $this->db->query($sql,array($TaiKhoan, $MatKhau));
		return $result->num_rows();
	}

}

/* End of file  */
/* Location: ./application/models/ */