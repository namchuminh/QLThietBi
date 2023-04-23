<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SuaThietBi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function ThemSua($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua)
	{
		$sql = "INSERT INTO `suathietbi`(`MaKho`, `MaThietBi`, `NgayGhiNhan`, `NguoiPhatHien`, `NguoiGaySuCo`, `HienTuongHong`, `NguoiGiaiQuyet`, `BienPhap`, `NguoiThucHien`, `BoPhanSuaChua`, `NguonKinhPhi`, `KinhPhiSuaChua`, `SoLuongHong`, `KinhPhiSauSua`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua));
		return $result;
	}

	public function GetGia($MaThietBi, $MaKho){
		$sql = "SELECT chitiethoadon.* FROM chitiethoadon WHERE MaThietBi = ? AND MaKho=?";
		$result = $this->db->query($sql, array($MaThietBi, $MaKho));
		return $result->result_array();
	}
	public function Get_SuaThietBi2($MaSuaThietBi){
		$sql = "SELECT suathietbi.*, thietbi.* FROM `suathietbi`, thietbi WHERE suathietbi.MaThietBi = thietbi.MaThietBi AND MaSuaThietBi=?";
		$result = $this->db->query($sql, array($MaSuaThietBi));
		return $result->result_array();
	}
	public function Get_SuaThietBi(){
		$sql = "SELECT suathietbi.*, thietbi.*, chitiethoadon.* FROM `suathietbi`, thietbi, chitiethoadon WHERE suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = suathietbi.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function Get_SuaThietBiByDate1($NgayGhiNhan){
		$sql = "SELECT suathietbi.*, thietbi.*, chitiethoadon.* FROM `suathietbi`, thietbi, chitiethoadon WHERE suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = suathietbi.MaKho AND NgayGhiNhan >= ?";
		$result = $this->db->query($sql, array($NgayGhiNhan));
		return $result->result_array();
	}
	public function Get_SuaThietBiByDate2($NgayGhiNhan, $NgayKetThuc){
		$sql = "SELECT suathietbi.*, thietbi.*, chitiethoadon.* FROM `suathietbi`, thietbi, chitiethoadon WHERE suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = suathietbi.MaKho AND NgayGhiNhan >= ? AND NgayGhiNhan <= ?";
		$result = $this->db->query($sql, array($NgayGhiNhan, $NgayKetThuc));
		return $result->result_array();
	}
	public function Xoa_SuaThietBi($MaSuaThietBi){
		$sql = "DELETE FROM suathietbi WHERE MaSuaThietBi = ?";
		$result = $this->db->query($sql, array($MaSuaThietBi));
		return $result;
	}
	public function Sua_SuaThietBi($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua,$MaSuaThietBi){
		$sql = "UPDATE `suathietbi` SET `MaKho`= ?,`MaThietBi`= ?,`NgayGhiNhan`= ?,`NguoiPhatHien`= ?,`NguoiGaySuCo`= ?,`HienTuongHong`= ?,`NguoiGiaiQuyet`= ?,`BienPhap`= ?,`NguoiThucHien`= ?,`BoPhanSuaChua`= ?,`NguonKinhPhi`= ?,`KinhPhiSuaChua`= ?,`SoLuongHong`= ?,`KinhPhiSauSua`= ?  WHERE MaSuaThietBi = ?";
		$result = $this->db->query($sql, array($MaKho, $MaThietBi, $NgayGhiNhan, $NguoiPhatHien, $NguoiGaySuCo, $HienTuongHong, $NguoiGiaiQuyet, $BienPhap, $NguoiThucHien, $BoPhanSuaChua, $NguonKinhPhi, $KinhPhiSuaChua, $SoLuongHong, $KinhPhiSauSua,$MaSuaThietBi));
		return $result;
	}

}

/* End of file Model_SuaThietBi.php */
/* Location: ./application/models/Model_SuaThietBi.php */