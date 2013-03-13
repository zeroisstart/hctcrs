<?php
class MainController extends Controller {
	/**
	 * 默认执行的动作
	 * @var string  
	 */
	public $defaultAction = 'list';
	 
	public function actionList() {
		$this->render ( 'list' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}