<?php
class ToolMap extends CWidget {
	
	/**
	 * ������Ŀ¼
	 *
	 * @var $_controllerPath
	 */
	protected $_controllerPath = false;
	
	/**
	 * ������action ����
	 *
	 * @var $_controllerRoutes
	 */
	protected $_controllerRoutes = array ();
	public function init() {
		if (empty ( $this->_controllerRoutes )) {
			$_app = Yii::app ();
			// ���ÿ������ڵ�Ŀ¼
			$this->_controllerPath = $_controllerPath = $_app->ControllerPath;
			// �ļ������
			$folder = Yii::app ()->Folder;
			// ������ļ��л�ȡ������Դ
			$ary_folder = $folder->openFolder ( $_controllerPath, FOLDER::FOLDER_ONLY_FILE );
			foreach ( $ary_folder as $_name ) {
				$_controllerRoutes [str_replace ( 'Controller.php', '', $_name )] = $_name;
			}
			$rtn_ary = $this->_GetControllerActions ( $_controllerRoutes );
			$this->_controllerRoutes = $rtn_ary;
		}
	}
	protected function _GetControllerActions(array $_routePath) {
		$rtn_ary = array ();
		foreach ( $_routePath as $_contrllerName => $_fileName ) {
			$_className = str_ireplace ( '.php', '', $_fileName );
			$_classFile = $this->_controllerPath . DIRECTORY_SEPARATOR . $_fileName;
			if (! class_exists ( $_className, false ))
				require ($_classFile);
			$class = new $_className ( $_contrllerName );
			$Relection = new ReflectionClass ( $class );
			foreach ( $Relection->getMethods () as $method ) {
				if (($_action = $this->_isAction ( $method->getName () ))) {
					$rtn_ary [$_contrllerName] [] = $_contrllerName . '/' . $_action;
				}
			}
		}
		return $rtn_ary;
	}
	
	/**
	 * �жϵ�ǰ�����Ƿ�ΪAction
	 *
	 * @param string $actionName        	
	 */
	protected function _isAction($actionName) {
		$actionName = strtolower ( $actionName );
		if (in_array ( $actionName, array (
				'actionview',
				'actionupdate',
				'actiondelete' 
		) )) {
			return false;
		}
		
		return preg_match ( '/^action*/', $actionName ) && $actionName != 'actions' ? substr ( $actionName, 6 ) : false;
	}
	protected function _registerClient() {
		$_css = array ();
		$_js = array (
				'js/tool/toolMap.js' 
		);
		Yii::app ()->clientScript->registerCoreScript ( 'jquery' );
		Yii::app ()->clientScript->_registerCSS ( $_css );
		Yii::app ()->clientScript->_registerJS ( $_js );
	}
	public function run() {
		$this->_registerClient ();
		$this->render ( 'views._widget.System.ToolMap', array (
				'controllerRoutes' => ( array ) $this->_controllerRoutes 
		) );
	}
}