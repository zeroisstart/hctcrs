<?php
class ZController extends Controller {
	/**
	 *
	 * @var string
	 */
	public $defaultAction = 'list';
	
	/**
	 */
	public function actionList() {
		$this->render ( 'list' );
	}
}