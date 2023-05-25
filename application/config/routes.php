<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'index';
$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;


$route['dang-nhap'] = 'DangNhap';
$route['xu-ly-dang-nhap'] = 'DangNhap/Login';
$route['dang-xuat'] = 'DangXuat';


//Tang thiet bi
$route['tang-thiet-bi'] = 'TangThietBi/index';
$route['tang-thiet-bi/them'] = 'TangThietBi/ThemChungTu';

$route['tang-thiet-bi/them-chung-tu'] = 'TangThietBi/ThemChungTu/ThemChungTu';

$route['tang-thiet-bi/liet-ke'] = "TangThietBi/index/TimKiem";
$route['tang-thiet-bi/xoa/(:any)'] = "TangThietBi/XoaChungTu/index/$1";
$route['tang-thiet-bi/sua/(:any)'] = "TangThietBi/SuaChungTu/index/$1";
$route['tang-thiet-bi/sua-chung-tu/(:any)'] = "TangThietBi/SuaChungTu/Sua/$1";
$route['tang-thiet-bi/chi-tiet/(:any)'] = "TangThietBi/ChiTiet/index/$1";


$route['tang-thiet-bi/chi-tiet/them/(:any)'] = "TangThietBi/ChiTiet/Them/$1";
$route['tang-thiet-bi/chi-tiet/them-chi-tiet/(:any)'] = "TangThietBi/ChiTiet/ThemChiTiet/$1";
$route['tang-thiet-bi/chi-tiet/xoa-chi-tiet/(:any)/(:any)']  = "TangThietBi/XoaChiTiet/index/$1/$2";
$route['tang-thiet-bi/chi-tiet/sua/(:any)/(:any)']  = "TangThietBi/SuaChiTiet/index/$1/$2";

$route['tang-thiet-bi/chi-tiet/sua-chi-tiet/(:any)/(:any)']  = "TangThietBi/SuaChiTiet/Sua/$1/$2";


$route['tang-thiet-bi/xuat-phieu-nhap/(:any)'] = "TangThietBi/Excel_export/index/$1";
$route['tang-thiet-bi/xuat-phieu-kiem-nhap/(:any)'] = "TangThietBi/Excel_export/KiemNhap/$1";

//Dieu chuyen
$route['theo-doi-dieu-chuyen'] = "TheoDoiDieuChuyen/index";
$route['theo-doi-dieu-chuyen/dieu-chuyen'] = "TheoDoiDieuChuyen/index/ThemDieuChuyen";
$route['theo-doi-dieu-chuyen/xoa-dieu-chuyen/(:any)'] = "TheoDoiDieuChuyen/XoaDieuChuyen/index/$1";
$route['theo-doi-dieu-chuyen/sua-dieu-chuyen/(:any)'] = "TheoDoiDieuChuyen/SuaDieuChuyen/index/$1";
$route['theo-doi-dieu-chuyen/sua-dieu-chuyen/sua/(:any)'] = "TheoDoiDieuChuyen/SuaDieuChuyen/SuaDieuChuyen/$1";
$route['theo-doi-dieu-chuyen/kho/(:any)'] = "TheoDoiDieuChuyen/index/Kho/$1";
$route['theo-doi-dieu-chuyen/thiet-bi/(:any)/(:any)'] = "TheoDoiDieuChuyen/index/thietbi/$1/$2";

$route['theo-doi-dieu-chuyen/xuat-nhat-ky/(:any)'] = "TheoDoiDieuChuyen/Excel_Export_DieuChuyen/index/$1";
$route['theo-doi-dieu-chuyen/xuat-xac-nhan-dieu-chuyen/(:any)'] = "TheoDoiDieuChuyen/Excel_Export_DieuChuyen/XacNhanDieuChuyen/$1";


//ghi nhan hong
$route['ghi-nhan-thiet-bi-hong'] = "GhiNhanThietBiHong/GhiNhanThietBiHong";
$route['ghi-nhan-thiet-bi-hong/load-data/(:any)/(:any)'] = "GhiNhanThietBiHong/GhiNhanThietBiHong/Load_Data/$1/$2";
$route['ghi-nhan-thiet-bi-hong/them'] = "GhiNhanThietBiHong/GhiNhanThietBiHong/BaoHong";
$route['ghi-nhan-thiet-bi-hong/them-thiet-bi'] = "GhiNhanThietBiHong/GhiNhanThietBiHong/ThemBaoHong";
$route['ghi-nhan-thiet-bi-hong/liet-ke'] = "GhiNhanThietBiHong/GhiNhanThietBiHong/LietKe";
$route['ghi-nhan-thiet-bi-hong/khoi-phuc/(:any)'] = "GhiNhanThietBiHong/GhiNhanThietBiHong/KhoiPhuc/$1";
$route['ghi-nhan-thiet-bi-hong/xuat-excel'] = "GhiNhanThietBiHong/Xuat_Excel";

//ghi nhan mat

$route['ghi-nhan-thiet-bi-mat'] = "GhiNhanThietBiMat/GhiNhanThietBiMat";
$route['ghi-nhan-thiet-bi-mat/khoi-phuc/(:any)'] = "GhiNhanThietBiMat/GhiNhanThietBiMat/KhoiPhuc/$1";
$route['ghi-nhan-thiet-bi-mat/them'] = "GhiNhanThietBiMat/GhiNhanThietBiMat/BaoMat";
$route['ghi-nhan-thiet-bi-mat/them-bao-mat'] = "GhiNhanThietBiMat/GhiNhanThietBiMat/ThemBaoMat";
$route['ghi-nhan-thiet-bi-mat/liet-ke'] = "GhiNhanThietBiMat/GhiNhanThietBiMat/LietKe";
$route['ghi-nhan-thiet-bi-mat/xuat-excel'] = "GhiNhanThietBiMat/Xuat_Excel";



$route['muon-tra'] = "MuonThietBiDayHoc/MuonThietBiDayHoc";
$route['muon-tra/muon-thiet-bi'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/MuonThietBi";
$route['muon-tra/muon-thiet-bi/them'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/ThemMuonThietBi";
$route['muon-tra/muon-thiet-bi/xoa/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/XoaMuonThietBi/$1";
$route['muon-tra/muon-thiet-bi/sua/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/SuaMuonThietBi/$1";
$route['muon-tra/gia-han/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/GiaHanMuonThietBi/$1";
$route['muon-tra/gia-han/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/GiaHanMuonThietBi/$1";
$route['muon-tra/liet-ke'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/LietKe";
$route['muon-tra/them-chi-tiet/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/ThemChiTiet/$1";
$route['muon-tra/them-chi-tiet/them/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/ThemChiTietThem/$1";
$route['muon-tra/them-chi-tiet/xoa/(:any)/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/XoaChiTiet/$1/$2";
$route['muon-tra/xuat-excel/(:any)'] = "MuonThietBiDayHoc/Xuat_Excel/index/$1";
$route['muon-tra/muon-thiet-bi/thiet-bi/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/ThietBi/$1";
$route['muon-tra/tra/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/TraThietBi/$1";
$route['muon-tra/tra-thiet-bi/(:any)'] = "MuonThietBiDayHoc/MuonThietBiDayHoc/Tra/$1";



$route['muon-tra/nhat-ky'] = "MuonThietBiDayHoc/NhatKyMuonTra";
$route['muon-tra/nhat-ky/liet-ke'] = "MuonThietBiDayHoc/NhatKyMuonTra/LietKe";


$route['muon-phong-hoc'] = "MuonPhongHoc/MuonPhongHoc";
$route['muon-phong-hoc/muon'] = "MuonPhongHoc/MuonPhongHoc/Muon";
$route['muon-phong-hoc/muon-phong'] = "MuonPhongHoc/MuonPhongHoc/MuonPhongHoc";
$route['muon-phong-hoc/xoa/(:any)'] = "MuonPhongHoc/MuonPhongHoc/Xoa/$1";
$route['muon-phong-hoc/tra/(:any)'] = "MuonPhongHoc/MuonPhongHoc/Tra/$1";
$route['muon-phong-hoc/tra-phong/(:any)'] = "MuonPhongHoc/MuonPhongHoc/TraPhongHoc/$1";
$route['muon-phong-hoc/liet-ke'] = "MuonPhongHoc/MuonPhongHoc/LietKe";
$route['muon-phong-hoc/sua/(:any)'] = "MuonPhongHoc/MuonPhongHoc/SuaMuon/$1";
$route['muon-phong-hoc/sua-thong-tin/(:any)'] = "MuonPhongHoc/MuonPhongHoc/SuaMuonPhongHoc/$1";



// $route['muon-phong-hoc/xuat-theo-tuan'] = "MuonPhongHoc/Xuat_Excel/XuatTheoTuan";

//thanh ly thiet bi
$route['thanh-ly-thiet-bi'] = "ThanhLyThietBi/ThanhLyThietBi";
$route['thanh-ly-thiet-bi/them'] = "ThanhLyThietBi/ThanhLyThietBi/ThanhLy";
$route['thanh-ly-thiet-bi/them-thanh-ly'] = "ThanhLyThietBi/ThanhLyThietBi/ThemThanhLy";
$route['thanh-ly-thiet-bi/liet-ke'] = "ThanhLyThietBi/ThanhLyThietBi/LietKe";
$route['thanh-ly-thiet-bi/khoi-phuc/(:any)'] = "ThanhLyThietBi/ThanhLyThietBi/KhoiPhuc/$1";
$route['thanh-ly-thiet-bi/xuat-excel'] = "ThanhLyThietBi/Xuat_Excel/index";






$route['sua-chua-thiet-bi'] = "SuaChuaThietBi/SuaChuaThietBi";
$route['sua-chua-thiet-bi/them'] = "SuaChuaThietBi/SuaChuaThietBi/ThemSua";
$route['sua-chua-thiet-bi/gia-thiet-bi/(:any)/(:any)'] = "SuaChuaThietBi/SuaChuaThietBi/GiaThietBi/$1/$2";
$route['sua-chua-thiet-bi/xoa-sua/(:any)'] = "SuaChuaThietBi/SuaChuaThietBi/XoaSua/$1";
$route['sua-chua-thiet-bi/sua/(:any)'] = "SuaChuaThietBi/SuaChuaThietBi/Sua/$1";
$route['sua-chua-thiet-bi/sua-chua/(:any)'] = "SuaChuaThietBi/SuaChuaThietBi/SuaSuaChua/$1";
$route['sua-chua-thiet-bi/liet-ke'] = "SuaChuaThietBi/SuaChuaThietBi/LietKe";
$route['sua-chua-thiet-bi/xuat-excel'] = "SuaChuaThietBi/Xuat_Excel";

$route['sua-chua-thiet-bi/them-sua'] = "SuaChuaThietBi/SuaChuaThietBi/ThemSuaChiTiet";




$route['quan-ly-nguoi-dung'] = "QuanLyNguoiDung/QuanLyNguoiDung";
$route['quan-ly-nguoi-dung/them-nhan-vien'] = "QuanLyNguoiDung/QuanLyNguoiDung/ThemNhanVien";
$route['quan-ly-nguoi-dung/khoa-tai-khoan/(:any)'] = "QuanLyNguoiDung/QuanLyNguoiDung/KhoaTaiKhoan/$1";
$route['quan-ly-nguoi-dung/mo-khoa-tai-khoan/(:any)'] = "QuanLyNguoiDung/QuanLyNguoiDung/MoKhoaTaiKhoan/$1";
$route['quan-ly-nguoi-dung/set-quyen-user/(:any)'] = "QuanLyNguoiDung/QuanLyNguoiDung/SetUser/$1";
$route['quan-ly-nguoi-dung/set-quyen-admin/(:any)'] = "QuanLyNguoiDung/QuanLyNguoiDung/SetAdmin/$1";



$route['bao-cao'] = "BaoCao/ThongKeVaBaoCao";
$route['bao-cao/xuat-excel'] = "BaoCao/ThongKeVaBaoCao/Xuat_Excel";

