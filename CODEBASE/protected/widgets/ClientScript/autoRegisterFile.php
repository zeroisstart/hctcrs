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
	 * 加载静态文件的base地址
	 *
	 * @var string
	 */
	public $baseUrl = false;
	
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
		
		$ary_pos = array (
				'footer' => CClientScript::POS_END 
		);
		
		foreach ( $ary_pos as $key => $val ) {
			if (isset ( $_js [$key] )) {
				$this->_registerScript ( $this->js [$key], $val );
				unset ( $this->js [$key] );
			}
		}
		$this->_registerCss ( $this->css );
		$this->_registerScript ( $this->js );
	}
	/**
	 * 注册css文件
	 *
	 * @param array $cssFiles        	
	 * @param int $pos        	
	 */
	public function _registerCss(array $cssFiles, $pos = CClientScript::POS_HEAD) {
		$_baseUrl = $this->baseUrl ? $this->baseUrl : Yii::app ()->baseUrl;
		foreach ( $cssFiles as $cssFile ) {
			$this->_cs->registerCssFile ( $_baseUrl . '/' . $cssFile, $pos );
		}
	}
	/**
	 *
	 * @param array $scriptFiles        	
	 * @param int $pos        	
	 */
	function _registerScript(array $scriptFiles, $pos = CClientScript::POS_HEAD) {
		$_baseUrl = $this->baseUrl ? $this->baseUrl : Yii::app ()->baseUrl;
		foreach ( $scriptFiles as $jsFile ) {
			$this->_cs->registerScriptFile ( $_baseUrl . '/' . $jsFile, $pos );
		}
	}
}