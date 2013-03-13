<?php
class ThunderController extends Controller {
	public $defaultAction = 'view';
	/**
	 */
	public function actionView() {
		$req = Yii::app ()->request;
		
		$url = $req->getParam ( 'url' );
		
		$txt = '';
		if ($url) {
			$txt = 'thunder://' . base64_encode ( 'AA' . $url . 'ZZ' );
		}
		$args = array ();
		$args ['url'] = $url;
		$args ['txt'] = $txt;
		
		$this->render ( 'view', $args );
	}
}