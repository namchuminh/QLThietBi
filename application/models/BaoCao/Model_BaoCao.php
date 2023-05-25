<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_BaoCao extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Get_Kho()
	{
		$sql = "SELECT * FROM kho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_NhapThietBi()
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_NhapThietBi2($TuNgay)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_NhapThietBi3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap<= ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay));
		return $result->result_array();
		
	}
	public function Get_NhapThietBi4($MaKho)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_NhapThietBi5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap<= ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}

	public function Get_SuaThietBi()
	{
		$sql = "SELECT thietbi.*, suathietbi.* FROM thietbi, suathietbi WHERE thietbi.MaThietBi = suathietbi.MaThietBi";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_SuaThietBi2($TuNgay)
	{
		$sql = "SELECT thietbi.*, suathietbi.* FROM thietbi, suathietbi WHERE thietbi.MaThietBi = suathietbi.MaThietBi AND NgayGhiNhan = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_SuaThietBi3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT thietbi.*, suathietbi.* FROM thietbi, suathietbi WHERE thietbi.MaThietBi = suathietbi.MaThietBi AND NgayGhiNhan >= ? AND NgayGhiNhan <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_SuaThietBi4($MaKho)
	{
		$sql = "SELECT thietbi.*, suathietbi.* FROM thietbi, suathietbi WHERE thietbi.MaThietBi = suathietbi.MaThietBi AND suathietbi.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_SuaThietBi5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT thietbi.*, suathietbi.* FROM thietbi, suathietbi WHERE thietbi.MaThietBi = suathietbi.MaThietBi AND NgayGhiNhan >= ? AND NgayGhiNhan <= ? AND suathietbi.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiHong()
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiHong2($TuNgay)
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho AND ghinhanthietbihong.NgayPhatHien = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiHong3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho AND ghinhanthietbihong.NgayPhatHien >= ? AND ghinhanthietbihong.NgayPhatHien <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiHong4($MaKho)
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho AND ghinhanthietbihong.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiHong5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho AND ghinhanthietbihong.NguoiPhatHien >= ? AND ghinhanthietbihong.NguoiPhatHien <= ? AND ghinhanthietbihong.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiHong6($TenGiaoVien)
	{
		$sql = "SELECT ghinhanthietbihong.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbihong, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbihong.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbihong.MaThietBi = thietbi.MaThietBi AND ghinhanthietbihong.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbihong.MaKho = kho.MaKho AND ghinhanthietbihong.NguoiPhatHien like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiMat()
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiMat2($TuNgay)
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho AND ghinhanthietbimat.NgayPhatHien = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiMat3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho AND ghinhanthietbimat.NgayPhatHien >= ? AND ghinhanthietbimat.NgayPhatHien <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiMat4($MaKho)
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho AND ghinhanthietbimat.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiMat5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho AND ghinhanthietbimat.NgayPhatHien >= ? AND ghinhanthietbimat.NgayPhatHien <= ? AND ghinhanthietbimat.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiMat6($TenGiaoVien)
	{
		$sql = "SELECT ghinhanthietbimat.*, chitiethoadon.*, thietbi.*, monhoc.*, kho.* FROM ghinhanthietbimat, chitiethoadon, thietbi, monhoc,kho WHERE ghinhanthietbimat.MaThietBi = chitiethoadon.MaThietBi AND ghinhanthietbimat.MaThietBi = thietbi.MaThietBi AND ghinhanthietbimat.MaMonHoc = monhoc.MaMonHoc AND ghinhanthietbimat.MaKho = kho.MaKho AND ghinhanthietbimat.NguoiPhatHien like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy()
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy2($TuNgay)
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.NgayGhiNhan = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.NgayGhiNhan >= ? AND thanhlythietbi.NgayGhiNhan <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy4($MaKho)
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.NgayGhiNhan >= ? AND thanhlythietbi.NgayGhiNhan <= ? AND thanhlythietbi.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiThanhLy6($TenGiaoVien)
	{
		$sql = "SELECT thanhlythietbi.*, chitiethoadon.*, thietbi.*, kho.* FROM thanhlythietbi, chitiethoadon, thietbi, kho WHERE thanhlythietbi.MaThietBi = chitiethoadon.MaThietBi AND thanhlythietbi.MaThietBi = thietbi.MaThietBi AND  thanhlythietbi.MaKho = kho.MaKho AND thanhlythietbi.NguoiPhatHien like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_BangKeThietBi()
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, monhoc.*, kho.*, thietbi.* FROM chitiethoadon, chungtu, monhoc, kho, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_BangKeThietBi2($TuNgay)
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, monhoc.*, kho.*, thietbi.* FROM chitiethoadon, chungtu, monhoc, kho, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chungtu.NgayNhap = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_BangKeThietBi3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, monhoc.*, kho.*, thietbi.* FROM chitiethoadon, chungtu, monhoc, kho, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_BangKeThietBi4($MaKho)
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, monhoc.*, kho.*, thietbi.* FROM chitiethoadon, chungtu, monhoc, kho, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_BangKeThietBi5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT chitiethoadon.*, chungtu.*, monhoc.*, kho.*, thietbi.* FROM chitiethoadon, chungtu, monhoc, kho, thietbi WHERE chitiethoadon.MaChungTu = chungtu.MaChungTu AND chitiethoadon.MaMonHoc = monhoc.MaMonHoc AND chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap <= ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon()
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon2($TuNgay)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon4($MaKho)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ? AND muonthietbi.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiMuon6($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NguoiMuon like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan()
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra)";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan2($TuNgay)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon = ? AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra)";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ? AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra)";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan4($MaKho)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ? AND muonthietbi.MaKho = ? AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra)";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiQuaHan6($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, chitietphieumuon.*, thietbi.*, lophoc.* , monhoc.* , kho.* FROM muonthietbi, chitietphieumuon, thietbi, lophoc, monhoc, kho WHERE muonthietbi.MaMuonThietBi = chitietphieumuon.MaMuonThietBi AND muonthietbi.MaThietBi = thietbi.MaThietBi AND chitietphieumuon.MaLop = lophoc.MaLop AND chitietphieumuon.MaMonHoc = monhoc.MaMonHoc AND muonthietbi.MaKho = kho.MaKho AND muonthietbi.MaMuonThietBi NOT IN (SELECT chitietphieutra.MaMuonThietBi FROM chitietphieutra) AND muonthietbi.NguoiMuon like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}


	public function Get_GiaoVienMuonNhieuNhat($TenGiaoVien)
	{
		$sql = "SELECT muonthietbi.*, thietbi.* FROM muonthietbi, thietbi WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND muonthietbi.NguoiMuon = ?";
		$result = $this->db->query($sql, array($TenGiaoVien));
		return $result->result_array();
	}
	public function Get_GiaoVienMuonNhieuNhat2($TenGiaoVien, $TuNgay)
	{
		$sql = "SELECT muonthietbi.*, thietbi.* FROM muonthietbi, thietbi WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND muonthietbi.NguoiMuon = ? AND muonthietbi.NgayMuon = ?";
		$result = $this->db->query($sql, array($TenGiaoVien, $TuNgay));
		return $result->result_array();
	}
	public function Get_GiaoVienMuonNhieuNhat3($TenGiaoVien, $TuNzgay, $ToiNgay)
	{
		$sql = "SELECT muonthietbi.*, thietbi.* FROM muonthietbi, thietbi WHERE muonthietbi.MaThietBi = thietbi.MaThietBi AND muonthietbi.NguoiMuon = ? AND muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ?";
		$result = $this->db->query($sql, array($TenGiaoVien, $TuNgay, $ToiNgay));
		return $result->result_array();
	}

	public function Get_SoLanMuon()
	{
		$sql = "SELECT count(muonthietbi.MaMuonThietBi) as 'SoLanMuon', muonthietbi.NguoiMuon from muonthietbi GROUP BY muonthietbi.NguoiMuon";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}

	
	public function Get_SoLanMuon2($TuNgay)
	{
		$sql = "SELECT count(muonthietbi.MaMuonThietBi) as 'SoLanMuon', muonthietbi.NguoiMuon from muonthietbi WHERE muonthietbi.NgayMuon = ? GROUP BY muonthietbi.NguoiMuon";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	
	public function Get_SoLanMuon3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT count(muonthietbi.MaMuonThietBi) as 'SoLanMuon', muonthietbi.NguoiMuon from muonthietbi  WHERE muonthietbi.NgayMuon >= ? AND muonthietbi.NgayMuon <= ? GROUP BY muonthietbi.NguoiMuon";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	
	public function Get_SoLanMuon4($TenGiaoVien)
	{
		$sql = "SELECT count(muonthietbi.MaMuonThietBi) as 'SoLanMuon', muonthietbi.NguoiMuon from muonthietbi WHERE muonthietbi.NguoiMuon like '%".$TenGiaoVien."%'  GROUP BY muonthietbi.NguoiMuon";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}

	public function Get_LichSuDieuChuyen()
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_LichSuDieuChuyen2($TuNgay)
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.NgayBanGiao = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_LichSuDieuChuyen3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.NgayBanGiao >= ? AND dieuchuyen.NgayBanGiao <= ?";
		$result = $this->db->query($sql, array($TuNgay, $ToiNgay));
		return $result->result_array();
		
	}
	public function Get_LichSuDieuChuyen4($MaKho)
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_LichSuDieuChuyen5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.NgayBanGiao >= ? AND dieuchuyen.NgayBanGiao <= ? AND dieuchuyen.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_LichSuDieuChuyen6($TenGiaoVien)
	{
		$sql = "SELECT dieuchuyen.* , thietbi.* , kho.* FROM dieuchuyen, thietbi, kho WHERE dieuchuyen.MaThietBi = thietbi.MaThietBi AND dieuchuyen.MaKho = kho.MaKho AND dieuchuyen.NguoiBanGiao like '%".$TenGiaoVien."%' or dieuchuyen.NguoiTiepNhan like '%".$TenGiaoVien."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	//3
	public function Get_ThietBiTrongKy()
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_ThietBiTrongKy2($TuNgay)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiTrongKy3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap<= ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay));
		return $result->result_array();
		
	}
	public function Get_ThietBiTrongKy4($MaKho)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_ThietBiTrongKy5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.*, kho.* FROM kho, chitiethoadon, thietbi, chungtu, nhacungcap WHERE chitiethoadon.MaKho = kho.MaKho AND chitiethoadon.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND chungtu.NgayNhap >= ? AND chungtu.NgayNhap<= ? AND chitiethoadon.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
	public function Get_PhieuSuDungThietBi()
	{
		$sql = "SELECT suathietbi.* , chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.* FROM suathietbi, chitiethoadon, thietbi, chungtu, nhacungcap WHERE suathietbi.MaThietBi = chitiethoadon.MaThietBi AND suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	public function Get_PhieuSuDungThietBi2($TuNgay)
	{
		$sql = "SELECT suathietbi.* , chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.* FROM suathietbi, chitiethoadon, thietbi, chungtu, nhacungcap WHERE suathietbi.MaThietBi = chitiethoadon.MaThietBi AND suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND suathietbi.NgayGhiNhan = ?";
		$result = $this->db->query($sql, array($TuNgay));
		return $result->result_array();
		
	}
	public function Get_PhieuSuDungThietBi3($TuNgay, $ToiNgay)
	{
		$sql = "SELECT suathietbi.* , chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.* FROM suathietbi, chitiethoadon, thietbi, chungtu, nhacungcap WHERE suathietbi.MaThietBi = chitiethoadon.MaThietBi AND suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND suathietbi.NgayGhiNhan >= ? AND suathietbi.NgayGhiNhan <= ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay));
		return $result->result_array();
		
	}
	public function Get_PhieuSuDungThietBi4($MaKho)
	{
		$sql = "SELECT suathietbi.* , chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.* FROM suathietbi, chitiethoadon, thietbi, chungtu, nhacungcap WHERE suathietbi.MaThietBi = chitiethoadon.MaThietBi AND suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND suathietbi.MaKho = ?";
		$result = $this->db->query($sql, array($MaKho));
		return $result->result_array();
		
	}
	public function Get_PhieuSuDungThietBi5($TuNgay, $ToiNgay, $MaKho)
	{
		$sql = "SELECT suathietbi.* , chitiethoadon.*, thietbi.*, chungtu.*, nhacungcap.* FROM suathietbi, chitiethoadon, thietbi, chungtu, nhacungcap WHERE suathietbi.MaThietBi = chitiethoadon.MaThietBi AND suathietbi.MaThietBi = thietbi.MaThietBi AND chitiethoadon.MaChungTu = chungtu.MaChungTu AND chungtu.MaNhaCungCap = nhacungcap.MaNhaCungCap AND suathietbi.NgayGhiNhan >= ? AND suathietbi.NgayGhiNhan <= ? AND suathietbi.MaKho = ?";
		$result = $this->db->query($sql, array($TuNgay,$ToiNgay, $MaKho));
		return $result->result_array();
		
	}
}

/* End of file Model_BaoCap.php */
/* Location: ./application/models/Model_BaoCap.php */