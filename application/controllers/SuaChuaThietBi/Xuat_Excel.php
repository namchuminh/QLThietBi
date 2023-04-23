<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xuat_Excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->library("excel");
		$this->load->model('SuaThietBi/Model_SuaThietBi');
	}

	public function index()
	{
		$SuaThietBi = $this->Model_SuaThietBi->Get_SuaThietBi();
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\SuaChuaThietBi\Excel_File\DanhSachSuaChua.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		//var_dump($dates[0]);
		$excel2->getActiveSheet()->setCellValue('E3', 'Ngày: '.date("d/m/Y"));


		if ($SuaThietBi != null) {
			foreach ($SuaThietBi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			foreach ($SuaThietBi as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['NgayGhiNhan'])
			    ->setCellValue('C'.(6+$key), $value['NguoiPhatHien'])
			    ->setCellValue('D'.(6+$key), $value['SoLuongHong'])
			    ->setCellValue('E'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('F'.(6+$key), $value['MaCaBiet'])
			    ->setCellValue('G'.(6+$key), $value['HienTuongHong'])
			    ->setCellValue('H'.(6+$key), $value['NguoiGiaiQuyet'])
			    //
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadSuaThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="SuaThietBi.xls"');
		$objWriter->save('php://output');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */