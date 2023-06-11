<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xuat_Excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->library("excel");
		$this->load->model('GhiNhanThietBiHong/Model_GhiNhanThietBiHong');
	}

	public function index()
	{
		$BaoHong = $this->Model_GhiNhanThietBiHong->GetAll_BaoHong();
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\GhiNhanThietBiMat\Excel_File\BaoMat.xls"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		//var_dump($dates[0]);
		$excel2->getActiveSheet()->setCellValue('F3', 'Ngày: '.date("d/m/Y"));


		if ($BaoHong != null) {
			foreach ($BaoHong as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($BaoHong as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key), ($key+1))
			    ->setCellValue('B'.(7+$key), $value['NgayPhatHien'])
			    ->setCellValue('C'.(7+$key), $value['SoBienBan'])
			    ->setCellValue('D'.(7+$key), $value['TenThietBi'])
			    ->setCellValue('E'.(7+$key), $value['KyHieu'])
			    ->setCellValue('F'.(7+$key), $value['MaCaBiet'])
			    ->setCellValue('G'.(7+$key), $value['SoLuongHong'])
			    ->setCellValue('H'.(7+$key), $value['NguoiPhatHien'])
			    ->setCellValue('I'.(7+$key), $value['LyDoHong'])
			    //
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadBaoHong.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BaoHong.xls"');
		$objWriter->save('php://output');
	}

}

/* End of file Xuat_Excel.php */
/* Location: ./application/controllers/Xuat_Excel.php */