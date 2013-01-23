<?php
class PHPExeclController extends Controller {
	
	/**
	 * PHPExcel 文件的读取
	 */
	public function actionReader() {
		$this->render ( 'reader' );
	}
	/**
	 * PHPExecl 文件的操作
	 */
	public function actionWriter() {
		
		/**
		 * Error reporting
		 */
		error_reporting ( E_ALL );
		
		/**
		 * Include path *
		 */
		$path = Yii::getPathOfAlias ( 'system.vendors.PHPExcel' );
		
		ini_set ( 'include_path', ini_get ( 'include_path' ) . ';' . $path );
		
		Yii::import ( 'system.vendors.PHPExcel.PHPExcel' );
		//
		// );
		
		/**
		 * PHPExcel_Writer_Excel2007
		 */
		// nclude 'PHPExcel/Writer/Excel2007.php';
		
		// Create new PHPExcel object
		echo date ( 'H:i:s' ) . " Create new PHPExcel object\n";
		$objPHPExcel = new PHPExcel ();
		
		// Set properties
		echo date ( 'H:i:s' ) . " Set properties\n";
		$objPHPExcel->getProperties ()->setCreator ( "Maarten Balliauw" );
		$objPHPExcel->getProperties ()->setLastModifiedBy ( "Maarten Balliauw" );
		$objPHPExcel->getProperties ()->setTitle ( "Office 2007 XLSX Test Document" );
		$objPHPExcel->getProperties ()->setSubject ( "Office 2007 XLSX Test Document" );
		$objPHPExcel->getProperties ()->setDescription ( "Test document for Office 2007 XLSX, generated using PHP classes." );
		
		// Add some data
		echo date ( 'H:i:s' ) . " Add some data\n";
		$objPHPExcel->setActiveSheetIndex ( 0 );
		$objPHPExcel->getActiveSheet ()->SetCellValue ( 'A1', 'Hello' );
		$objPHPExcel->getActiveSheet ()->SetCellValue ( 'B2', 'world!' );
		$objPHPExcel->getActiveSheet ()->SetCellValue ( 'C1', 'Hello' );
		$objPHPExcel->getActiveSheet ()->SetCellValue ( 'D2', 'world!' );
		
		// Rename sheet
		echo date ( 'H:i:s' ) . " Rename sheet\n";
		$objPHPExcel->getActiveSheet ()->setTitle ( 'Simple' );
		
		// Save Excel 2007 file
		echo date ( 'H:i:s' ) . " Write to Excel2007 format\n";
		$objWriter = new PHPExcel_Writer_Excel2007 ( $objPHPExcel );
		$objWriter->save ( str_replace ( '.php', '.xlsx', __FILE__ ) );
		
		// Echo done
		echo date ( 'H:i:s' ) . " Done writing file.\r\n";
		
		$this->render ( 'writer' );
	}
}