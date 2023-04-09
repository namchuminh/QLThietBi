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

