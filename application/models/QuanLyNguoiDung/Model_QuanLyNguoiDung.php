<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_QuanLyNguoiDung extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Add_NguoiDung($TaiKhoan, $MatKhau, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan, $AnhDaiDien, $TrangThai)
	{
		$sql = "INSERT INTO `taikhoan`(`TaiKhoan`, `MatKhau`, `HoTen`, `SoDienThoai`, `NamSinh`, `ChucVu`, `QueQuan`, `AnhDaiDien`, `TrangThai`) VALUES (?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($TaiKhoan, $MatKhau, $HoTen, $SoDienThoai, $NamSinh, $ChucVu, $QueQuan, $AnhDaiDien, $TrangThai));
		return $result;
	}
	public function Get_All($TaiKhoan)
	{
		$sql = "SELECT * FROM `taikhoan` WHERE TaiKhoan != ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result->result_array();
	}
	public function Check_tontai($TaiKhoan)
	{
		$sql = "SELECT * FROM `taikhoan` WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result->result_array();
	}
	public function KhoaTaiKhoan($TaiKhoan)
	{
		$sql = "UPDATE `taikhoan` SET TrangThai = 1 WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result;
	}
	public function MoKhoaTaiKhoan($TaiKhoan)
	{
		$sql = "UPDATE `taikhoan` SET TrangThai = 0 WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result;
	}
	public function Set_Quyen_User($TaiKhoan)
	{
		$sql = "UPDATE `taikhoan` SET ChucVu = 'user' WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result;
	}
	public function Set_Quyen_Admin($TaiKhoan)
	{
		$sql = "UPDATE `taikhoan` SET ChucVu = 'admin' WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($TaiKhoan));
		return $result;
	}

}

/* End of file Model_QuanLyNguoiDung.php */
/* Location: ./application/models/Model_QuanLyNguoiDung.php */