<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 *
	 * @var string the default layout for the controller view. Defaults to
	 *      '//layouts/column1',
	 *      meaning using a single column layout. See
	 *      'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
	/**
	 *
	 * @var array context menu items. This property will be assigned to {@link
	 *      CMenu::items}.
	 */
	public $menu = array ();
	public $widgetPath = 'application.widgets';
	/**
	 *
	 * @var array the breadcrumbs of the current page. The value of this
	 *      property will
	 *      be assigned to {@link CBreadcrumbs::links}. Please refer to {@link
	 *      CBreadcrumbs::links}
	 *      for more details on how to specify this property.
	 */
	public $breadcrumbs = array ();
	
	/**
	 * 当前action 需要运行的js文件
	 *
	 * @var array
	 */
	public $jsFiles = array (
			'index' => array () 
	);
	/**
	 * 当前action 需要运行的css文件
	 *
	 * @var array
	 */
	public $cssFiles = array (
			'index' => array () 
	);
	
	/**
	 * 运行渲染组件
	 *
	 * @param $helpWidgetName 组件名称        	
	 * @param $args 组件参数        	
	 * @param $captureOutput 是否返回输出内容        	
	 * @return mixed
	 */
	public function helper($helperWidgetName, array $args, $captureOutput = true) {
		$widgetName = '';
		$helperWidgetPath = $this->widgetPath . '.' . $helperWidgetName;
		if (Yii::getPathOfAlias ( $helperWidgetName )) {
			$widgetName = $helperWidgetName;
		} elseif (Yii::app ()->getPathOfAlias ( $helperWidgetPath )) {
			$widgetName = $helperWidgetPath;
		}
		return $widgetName ? $this->widget ( $widgetName, $args, $captureOutput ) : false;
	}
	/**
	 * 获取当前需要执行的js文件
	 *
	 * @param string $actionID
	 *        	当前actionID
	 * @return mixed
	 */
	public function GetJsFiles($actionID) {
		$actionID = strtolower($actionID);
		return isset ( $this->jsFiles [$actionID] ) ? $this->jsFiles [$actionID] : array ();
	}
	
	/**
	 * 获取当前需要运行的css文件
	 *
	 * @param string $actionID
	 *        	当前actionID
	 * @return mixed
	 */
	public function GetCssFile($actionID) {
		$actionID = strtolower($actionID);
		return isset ( $this->cssFiles [$actionID] ) ? $this->cssFiles [$actionID] : array ();
	}
	/**
	 *
	 * @param int $actionID        	
	 * @return multitype:Ambigous <mixed, multitype:>
	 */
	public function GetScriptFiles($actionID) {
		$actionID = strtolower($actionID);
		return array (
				'jsFiles' => $this->GetJsFiles ( $actionID ),
				'cssFiles' => $this->GetCssFile ( $actionID ) 
		);
	}
	
}