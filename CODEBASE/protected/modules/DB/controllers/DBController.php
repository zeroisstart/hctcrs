<?php
class DBController extends Controller {
	public $defaultAction = 'list';
	public function actionList() {
		$this->render ( 'list' );
	}
}