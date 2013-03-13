<?php
class CUrlController extends Controller {
	/**
	 *
	 * @var 默认执行的动作
	 */
	public $defaultAction = 'view';
	/**
	 */
	public function actionCookie() {
		
		// $file = tempnam('D:\htdocs\www\hct\CODEBASE\tmp', 'coookie');
		$file = 'D:\htdocs\www\hct\CODEBASE\tmp\cooDE8E.tmp';
		$ch = curl_init ( 'http://www.yiban.cn/ajax/match/l?_p=true&_u=ctop&_s=123456' );
		$ch = curl_init ( 'http://www.yiban.cn/home' );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, "username=noreason&password=123456" );
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, $file );
		curl_setopt ( $ch, CURLOPT_COOKIEJAR, $file );
		$content = curl_exec ( $ch );
		curl_close ( $ch );
//		echo $content;
		$ary = array ();
		$ary ['content'] = $content;
		$this->render ( 'cookie', $ary );
	}
	/**
	 */
	public function actionPost() {
		$this->render ( 'post' );
	}
	/**
	 */
	public function actionView() {
		$this->render ( 'view' );
	}
}