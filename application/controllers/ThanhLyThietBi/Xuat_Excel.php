<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xuat_Excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->library("excel");
		$this->load->model('ThanhLyThietBi/Model_ThanhLyThietBi');
	}

	public function index()
	{
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\ThanhLyThietBi\Excel_File\ThanhLy.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		//var_dump($dates[0]);
		$excel2->getActiveSheet()->setCellValue('E3', 'Ngày: '.date("d/m/Y"));
		$ThanhLyThietBi = $this->Model_ThanhLyThietBi->Get_All();

		if ($ThanhLyThietBi != null) {
			foreach ($ThanhLyThietBi as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(6,1);
			}
			$sum = 0;
			foreach ($ThanhLyThietBi as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(6+$key), ($key+1))
			    ->setCellValue('B'.(6+$key), $value['SoBienBan'])
			    ->setCellValue('C'.(6+$key), $value['NgayGhiNhan'])
			    ->setCellValue('D'.(6+$key), $value['TenThietBi'])
			    ->setCellValue('E'.(6+$key), $value['MaCaBiet'])
			    ->setCellValue('F'.(6+$key), $value['SoLuongThanhLy'])
			    ->setCellValue('G'.(6+$key), $value['DonGiaThanhLy'])
			    ->setCellValue('H'.(6+$key), $value['NguoiPhatHien'])
			    ->setCellValue('I'.(6+$key), $value['LyDoThanhLy']);
			    $sum += $value['DonGiaThanhLy'];
			    $excel2->getActiveSheet()->setCellValue('G'.(6+$key+1),$sum);
			    //
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadDanhSachThanhLy.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="DanhSachThanhLy.xls"');
		$objWriter->save('php://output');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */