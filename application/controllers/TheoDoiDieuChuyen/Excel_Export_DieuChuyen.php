<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_Export_DieuChuyen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("dang-nhap/"));
		}
		$this->load->library("excel");
		$this->load->model('TheoDoiDieuChuyen/Model_XuatDieuChuyen');
	}

	public function index($MaDieuChuyen)
	{
		$DieuChuyen = $this->Model_XuatDieuChuyen->Get_DieuChuyen($MaDieuChuyen);
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\TheoDoiDieuChuyen\Excel_File\DieuChuyenThietBi.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		
		$excel2->getActiveSheet()->setCellValue('F3', 'Ngày: '.date("d/m/Y"))
		->setCellValue('F4', 'Lọc theo mã: '.$MaDieuChuyen);
		
		if ($DieuChuyen != null) {
			foreach ($DieuChuyen as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(7,1);
			}
			foreach ($DieuChuyen as $key => $value){
				$date= substr($value['NgayBanGiao'], 0, 10);
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(7+$key),($key+1))
			    ->setCellValue('B'.(7+$key), $value['SoBienBan'])
				->setCellValue('C'.(7+$key), $date)
				->setCellValue('D'.(7+$key), $value['MaThietBi'])
				->setCellValue('E'.(7+$key), $value['TenThietBi'])
				->setCellValue('F'.(7+$key), $value['NguoiBanGiao'])
				->setCellValue('G'.(7+$key), $value['NguoiTiepNhan'])
				->setCellValue('H'.(7+$key), "*".$value['TenKho'])
				->setCellValue('I'.(7+$key), $value['GhiChu']);
			}
			$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
			$objWriter->save('DowloadDieuChuyenThietBi.xlsx');

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="DieuChuyenThietBi.xls"');
			$objWriter->save('php://output');
		}
		
	}
	public function XacNhanDieuChuyen($MaDieuChuyen){

		$DieuChuyen = $this->Model_XuatDieuChuyen->Get_DieuChuyen($MaDieuChuyen);
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\TheoDoiDieuChuyen\Excel_File\A.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		$date= substr($DieuChuyen[0]['NgayBanGiao'], 0, 10);
		$excel2->getActiveSheet()->setCellValue('A5', 'Ngày: '.date("d/m/Y"))
		->setCellValue('B7', $DieuChuyen[0]["SoBienBan"])
		->setCellValue('B8', $DieuChuyen[0]["TenThietBi"])
		->setCellValue('B9', $DieuChuyen[0]["MaThietBi"])
		->setCellValue('B10', $DieuChuyen[0]["NguoiBanGiao"])
		->setCellValue('B11', $DieuChuyen[0]["NguoiTiepNhan"])
		->setCellValue('B12', $date)
		->setCellValue('B13', $DieuChuyen[0]["TinhTrang"])
		->setCellValue('B14', $DieuChuyen[0]["TenKho"])
		;
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadDieuChuyenThietBi.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="XacNhanDieuChuyenThietBi.xls"');
		$objWriter->save('php://output');
		
	}

}

/* End of file Excel_Export.php */
/* Location: ./application/controllers/Excel_Export.php */