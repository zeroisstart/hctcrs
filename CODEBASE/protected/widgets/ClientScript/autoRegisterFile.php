<?php

/**
 * 自动注册js,css 文件
 * @author Top
 *
 */
class autoRegisterFile extends CWidget {
	/**
	 * css样式文件
	 *
	 * @var array
	 */
	public $css = array ();
	/**
	 * js脚本文件
	 *
	 * @var array
	 */
	public $js = array ();
	
	/**
	 * 是否自动加载jquery
	 *
	 * @var boolean
	 */
	public $jquery = false;
	
	/**
	 * Yii::app() -> clientScript
	 * 
	 * @var object
	 */
	private $_cs;
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		$this->_cs = Yii::app ()->clientScript;
		if ($this->jquery)
			$this->_cs->registerCoreScript ( 'jquery' );
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		$cs = $this->_cs;
		foreach ( $this->css as $cssFile ) {
			$cs->registerCssFile ( Yii::app ()->baseUrl . DIRECTORY_SEPARATOR . $cssFile );
		}
		foreach ( $this->js as $jsFile ) {
			$cs->registerScriptFile ( Yii::app ()->baseUrl . DIRECTORY_SEPARATOR . $jsFile );
		}
	}
}