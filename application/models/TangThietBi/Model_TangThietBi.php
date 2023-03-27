<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TangThietBi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_Kho()
	{
		$sql = "SELECT * FROM `kho`";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	
	public function Get_NhaCungCap()
	{
		$sql = "SELECT * FROM `nhacungcap`";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ChungTu(){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_ChungTu_Full($NgayBatDau, $NgayKetThuc, $MaKho, $MaChungTuMin, $MaChungTuMax){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap <= ? AND chungtu.MaKho = ? AND chungtu.MaChungTu >= ? AND chungtu.MaChungTu <= ?";
		$result = $this->db->query($sql, array($NgayBatDau, $NgayKetThuc, $MaKho, $MaChungTuMin, $MaChungTuMax));
		return $result->result_array();
	}
	
	public function Get_ChungTu_ByDay($NgayBatDau, $NgayKetThuc){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap <= ?";

		$result = $this->db->query($sql, array($NgayBatDau, $NgayKetThuc));
		return $result->result_array();
	}
	public function Get_ChungTu_ByDay2($NgayBatDau){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap = ? ";
		$result = $this->db->query($sql, array($NgayBatDau));
		return $result->result_array();
	}
	public function Get_ChungTu_ByMaKho($MaKho){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.MaKho = ? ";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
	}
	public function Get_ChungTu_ByMaChungTu($MaChungTuMin, $MaChungTuMax){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.MaChungTu >= ? AND chungtu.MaChungTu <= ?";
		$result = $this->db->query($sql, array($MaChungTuMin, $MaChungTuMax));
		return $result->result_array();
	}
	public function Get_ChungTu_ByMaChungTu2($MaChungTuMin){
		$sql = "SELECT chungtu.*, kho.TenKho, nhacungcap.TenNhaCungCap FROM `chungtu`, kho, nhacungcap WHERE chungtu.MaKho = kho.MaKho AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.MaChungTu = ?";
		$result = $this->db->query($sql, array($MaChungTuMin));
		return $result->result_array();
	}

	public function ThemChungTu($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd)
	{
		$sql = "INSERT INTO `chungtu`(`NgayNhap`, `SoPhieu`, `LyDoTang`, `DienGiai`, `MaKho`, `MaNhaCungCap`, `SohdTaiChinh`, `KyHieu`, `Ngayhd`) VALUES (?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql,array($NgayNhap, $SoPhieu, $LyDoTang, $DienGiai, $MaKho, $MaNhaCungCap, $SohdTaiChinh, $KyHieu, $Ngayhd));
		return $result;
	}

}

/* End of file  */
/* Location: ./application/models/ */