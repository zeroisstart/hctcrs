<?php
class UploadController extends Controller {
	/**
	 *
	 * @var string
	 */
	public $defaultAction = 'view';
	
	/**
	 */
	public function actionView() {
		$this->render ( 'view' );
	}
	
	
}