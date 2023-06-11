<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Excel_export extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			return redirect(base_url("index/"));
		}
		$this->load->model('Model_Login');
		$this->load->library("excel");
		$this->load->model('TangThietBi/Model_XuatExcel');

	}
	public function index($MaChungTu)
	{
		$ChungTu = $this->Model_XuatExcel->Get_ChungTu($MaChungTu);
		
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\TangThietBi\Excel_File\MauPhieuNhap.xlsx"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		$date= substr($ChungTu[0]['NgayNhap'], 0, 10);
		$dates = explode("-",$date);
		//var_dump($dates[0]);
		$excel2->getActiveSheet()->setCellValue('A6', 'Ngày: '.date("d/m/Y"))
		->setCellValue('F4', $ChungTu[0]['SoPhieu'])
		->setCellValue('B7', "Nhập tại kho: ".$ChungTu[0]['TenKho'])
		->setCellValue('B8', "Theo hóa đơn số: ".$ChungTu[0]['SohdTaiChinh'])
		->setCellValue('B9', "Của: ".$ChungTu[0]['TenNhaCungCap'])
		->setCellValue('B10', "Diễn Giải: ".$ChungTu[0]['DienGiai'])
		->setCellValue('D8', $dates[2]."/".$dates[1]."/".$dates[0])
		;
		
		$result = $this->Model_XuatExcel->Get_All($MaChungTu);
		if ($result != null) {
			foreach ($result as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(13,1);
			}
			
			$sum = 0;

			foreach ($result as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(13+$key), ($key+1))
			    ->setCellValue('B'.(13+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(13+$key), $value['SoLuong'])
			    ->setCellValue('D'.(13+$key), $value['DonViTinh'])
			    ->setCellValue('E'.(13+$key), $value['DonGia'])
			    ->setCellValue('F'.(13+$key), $value['ThanhTien'])
			    //
			    ;
			    $sum += $value['ThanhTien'];
			    $excel2->getActiveSheet()->setCellValue('F'.(13+$key+1), $sum);
			}
		}
		
		
		
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadMauPhieuNhap.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="MauPhieuNhap.xls"');
		$objWriter->save('php://output');
	}
	public function KiemNhap($MaChungTu){
		$ChungTu = $this->Model_XuatExcel->Get_ChungTu($MaChungTu);
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\TangThietBi\Excel_File\MauBienBanKiemNhap.xlsx");
		$excel2->setActiveSheetIndex(0);
		$date= substr($ChungTu[0]['NgayNhap'], 0, 10);
		$dates = explode("-",$date);
		$excel2->getActiveSheet()->setCellValue('A6', 'Ngày: '.date("d/m/Y"))
		->setCellValue('F4', $ChungTu[0]['MaChungTu'])
		->setCellValue('B14', "Nhập tại kho: ".$ChungTu[0]['TenKho'])
		->setCellValue('B15', "Theo hóa đơn số: ".$ChungTu[0]['SohdTaiChinh'])
		->setCellValue('C15', "Ngày: ".$dates[2]."/".$dates[1]."/".$dates[0])
		->setCellValue('B16', "Của: ".$ChungTu[0]['TenNhaCungCap'])
		->setCellValue('B17', "Diễn Giải: ".$ChungTu[0]['DienGiai']);


		$result = $this->Model_XuatExcel->Get_All($MaChungTu);

		if ($result != null){
			foreach ($result as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(20,1);
			}
			
			$sum = 0;
			foreach ($result as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(20+$key), ($key+1))
			    ->setCellValue('B'.(20+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(20+$key), $value['SoLuong'])
			    ->setCellValue('D'.(20+$key), $value['DonViTinh'])
			    ->setCellValue('E'.(20+$key), $value['DonGia'])
			    ->setCellValue('F'.(20+$key), $value['ThanhTien'])
			    //
			    ;
			    $sum += $value['ThanhTien'];
			    $excel2->getActiveSheet()->setCellValue('F'.(20+$key+1), $sum);
			}
		}
		
		
		
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadMauPhieuNhap.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="BienBanNhap.xls"');
		$objWriter->save('php://output');
	}
}