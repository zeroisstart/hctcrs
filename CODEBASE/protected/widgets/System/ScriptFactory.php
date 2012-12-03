<?php
class ScriptFactory extends CWidget {
	
	/**
	 *
	 * @var unknown_type
	 */
	public $jsFiles = array ();
	
	/**
	 *
	 * @var unknown_type
	 */
	public $cssFiles = array ();
	
	/**
	 *
	 * @var unknown_type
	 */
	public $baseUrl;
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		if (! $this->baseUrl)
			$this->baseUrl = Yii::app ()->baseUrl . '/';
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		$cs = Yii::app ()->clientScript;
		
		$stuff = '';
		foreach ( $this->cssFiles as $css ) {
			$cs->registerCssFile ( $this->baseUrl . $css );
		}
		foreach ( $this->jsFiles as $js ) {
			if (strtolower ( $js ) == 'jquery') {
				$cs->registerCoreScript ( 'jquery' );
			} else
				$cs->registerScriptFile ( $this->baseUrl . $js );
		}
	}
}