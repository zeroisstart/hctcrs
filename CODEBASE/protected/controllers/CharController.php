<?php
/**
 * 
 * @author Top
 *
 */
class CharController extends Controller {
	
	/**
	 */
	public function actionInteger() {
		// start
		$req = Yii::app ()->request;
		$limit = $req->getParam ( 'limit' );
		$limit = $limit ?  : 0;
		
		$String = $this->Integer2Char ( $limit );
		
		$this->render ( 'integer2string', array (
				'String' => $String 
		) );
	}
	
	/**
	 *
	 * @param int $num        	
	 * @return string
	 */
	private function Integer2Char($num) {
		$ASCII_A = 65;
		$prefix = floor ( $num / 26 );
		if ($prefix) {
			$prefix = chr ( $ASCII_A + $prefix - 1 );
		}
		$prefix = $prefix ?  : '';
		return $prefix . chr ( $ASCII_A + ($num % 26) );
	}
}