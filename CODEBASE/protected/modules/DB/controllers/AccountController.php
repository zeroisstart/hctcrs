<?php
class AccountController extends Controller {

	/**
	 * 默认动作
	 *
	 * @var string
	 */
	public $defaultAction = 'list';
	
	public function actionCreate() {
		$this->render ( 'create' );
	}
	public function actionList() {
		
		$this->render ( 'list' );
		
	}
	public function actionUpdate() {
		$this->render ( 'update' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}