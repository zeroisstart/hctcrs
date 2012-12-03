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
		
		$this->render ( 'index', array (
				'params' => $params 
		) );
	}
	public function actionAjaxFunctionArea() {
		$args = Yii::app ()->request->getParam ( 'args' );
		if (empty ( $args )) {
			$args = array (
					'a' 
			);
		} else {
			$args = explode ( '+', $args );
		}
		$param ['args'] = $args;
		
		$this->renderPartial ( 'ajaxFunctionArea', array (
				'param' => $param 
		) );
	}
}