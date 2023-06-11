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
		$this->load->model('MuonThietBiDayHoc/Model_MuonThietBi');
	}

	public function index($MaMuonThietBi)
	{
		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
		$excel2 = $excel2->load("C:\\xampp\htdocs\QLThietBi\application\controllers\MuonThietBiDayHoc\Excel_File\MauPhieuMuon.xls"); // Empty Sheet
		$excel2->setActiveSheetIndex(0);
		//var_dump($dates[0]);
		$excel2->getActiveSheet()->setCellValue('A6', 'Ngày: '.date("d/m/Y"));
		$Muon = $this->Model_MuonThietBi->Get_MuonThietBiByMa($MaMuonThietBi);
		$excel2->getActiveSheet()->setCellValue('B7', 'Ngày mượn: '.$Muon[0]["NgayMuon"])
		->setCellValue('B8', 'Số phiếu: '.$Muon[0]["SoPhieu"])
		->setCellValue('B9', 'Giáo viên: '.$Muon[0]["NguoiMuon"])
		;
		$MuonChiTiet = $this->Model_MuonThietBi->Get_MuonThietBiByMa2($MaMuonThietBi);
		if ($MuonChiTiet != null) {
			foreach ($MuonChiTiet as $value) {
			    $excel2->getActiveSheet()->insertNewRowBefore(12,1);
			}
			foreach ($MuonChiTiet as $key => $value){
			    $excel2->getActiveSheet()
			    ->setCellValue('A'.(12+$key), ($key+1))
			    ->setCellValue('B'.(12+$key), $value['TenThietBi'])
			    ->setCellValue('C'.(12+$key), $value['SoLuong'])
			    ->setCellValue('D'.(12+$key), $value['NgayMuon'])
			    ->setCellValue('E'.(12+$key), $value['NgayTra'])
			    
			    
			    //
			    ;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
		$objWriter->save('DowloadPhieuMuon.xlsx');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="PhieuMuon.xls"');
		$objWriter->save('php://output');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */