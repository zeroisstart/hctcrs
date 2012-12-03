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
		
		foreach ( $params ['TypeOfArgs'] as $type ) {
			$params ['argsValue'] [$type] = $request->getParam ( $type );
		}
		
		$funcName = $request->getParam ( 'funcName' );
		if ($funcName) {
		}
		
		$this->render ( 'index', array (
				'params' => $params 
		) );
	}
}