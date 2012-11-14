<?php
class EncryptionController extends Controller {
	public function actionmd5() {
		$content = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
		
		$md5 = md5 ( trim ( $content ) );
		
		$this->render ( 'md5', array (
				'code' => $content,
				'md5' => $md5 
		) );
	}
	
	/**
	 * 
	 */
	
	public function actionEnbase64() {
		$content = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
		
		$base64 = base64_encode ( trim ( $content ) );
		
		$this->render ( 'base64', array (
				'code' => $content,
				'base64' => $base64 
		) );
	}
	
	/**
	 * 
	 */
	public function actionDebase64() {
		$content = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
		
		$base64 = base64_decode ( trim ( $content ) );
		
		$this->render ( 'base64', array (
				'code' => $content,
				'base64' => $base64
		) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this
	 * controller, e.g.: return array( 'inlineFilterName', array(
	 * 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); }
	 * public function actions() { // return external action classes, e.g.:
	 * return array( 'action1'=>'path.to.ActionClass', 'action2'=>array(
	 * 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue',
	 * ), ); }
	 */
}