<?php
class FunctionController extends Controller {
	
	/**
	 *
	 * @var unknown_type
	 */
	public $jsFiles = array (
			'index' => array (
					'jquery',
					'js/tool/runPhpFunction.js' 
			) 
	);
	/**
	 *
	 * @var unknown_type
	 */
	public $cssFiles = array (
			'index' => array () 
	);
	/**
	 */
	public function actionIndex() {
		$params = array ();
		$params ['func'] = Yii::app ()->params->allowFunction;
		$params ['args'] = Yii::app ()->params->args;
		
		$request = Yii::app ()->request;
		
		$typeOfArgs = $request->getParam ( 'args' );
		
		if (! $typeOfArgs) {
			$typeOfArgs = reset ( $params ['args'] );
		}
		
		if (strpos ( $typeOfArgs, '+' )) {
			$typeOfArgs = explode ( '+', $typeOfArgs );
		} elseif (strpos ( $typeOfArgs, ' ' )) {
			$typeOfArgs = explode ( ' ', $typeOfArgs );
		}
		
		$params ['TypeOfArgs'] = ( array ) $typeOfArgs;
		// ar_dump($params);
		// ie;
		
		foreach ( $params ['TypeOfArgs'] as $type ) {
			$params ['argsValue'] [$type] = $request->getParam ( $type );
		}
		
		$params ['content'] = false;
		
		$funcName = $request->getParam ( 'funcName' );
		
// 		var_dump($funcName);
// 		die;
		
		// $func = $request->getParam ( 'func' );
		
		if ($funcName) {
			switch (count ( $params ['argsValue'] )) {
				case 1 :
					$a = $params ['argsValue'] ['a'];
// 					$evl_cde = 'return ' . $funcName . '("' . $a . '");';
// 					$params ['content'] = eval ( $evl_cde );
					$params ['content'] = call_user_func_array($funcName, array($a));
					break;
				case 2 :
				case 3 :
				case 4 :
					
					if(count($params['argsValue']) <2){
						$this -> actionLoseParams();
					}

					$params ['content'] = call_user_func_array($funcName, $params ['argsValue']);
// 					$pam = implode ( '","', $params ['argsValue'] );
// 					$params ['content'] = eval ( 'return
// 				  ' . $funcName . "('" . $pam . "');" );
					break;
				
				default :
					$params ['content'] = eval ( $func );
					break;
			}
		}
		
		$this->render ( 'index', array (
				'params' => $params 
		) );
	}
	public function actionLoseParams(){
		die('lose some params pls check it now!');
	}
	
	
	public function actionWso() {
		$this->redirect ( Yii::app ()->baseurl . '/wso.php' );
		// this->renderPartial ( 'wso' );
	}
}