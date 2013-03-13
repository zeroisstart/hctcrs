<?php
class PhantomjsController extends Controller {
	public $defaultAction = 'view';
	public function actionCreate() {
		$this->render ( 'create' );
	}
	public function actionList() {
		$this->render ( 'list' );
	}
	public function actionUpdate() {
		$this->render ( 'update' );
	}
	/**
	 * 抓取网站地址
	 */
	public function actionView() {
		$req = Yii::app ()->request;
		$url = $req->getParam ( 'url' );
		if ($url) {
			
			if (strpos ( 'http', $url )) {
				$url = 'http://' . $url;
			}
			$this->widget ( 'widgets.System.phantom', array (
					'url' => $url 
			) );
		}
		$this->render ( 'view' );
	}
}