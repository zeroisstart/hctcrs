<?php
class phantom extends CWidget {
	public $url = false;
	public $phantom = false;
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		if (! $this->url) {
			throw new Exception ( 'url must be required' );
		}
		$param = Yii::app ()->getParams ();
		$this->phantom = $param->phantomjs;
		// var_dump(Yii::app() -> getParams('phantomjs'));
		// $this -> phantom = Yii::app()
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		var_dump($this -> url);
		$img = 'img/'.md5($this->url.time()).'.jpg';
		$args = '"'.$this->url . '" ' . $img;
		$this->ex ( $this->phantom . ' ' . $args );
	}
	/**
	 *
	 * @param string $in        	
	 * @return string
	 */
	public function ex($in) {
		echo $in;
		die;
		$out = '';
		if (function_exists ( 'exec' )) {
			exec ( $in, $out );
			$out = join ( "\n", $out );
		} elseif (function_exists ( 'passthru' )) {
			ob_start ();
			passthru ( $in );
			$out = ob_get_clean ();
		} elseif (function_exists ( 'system' )) {
			ob_start ();
			system ( $in );
			$out = ob_get_clean ();
		} elseif (function_exists ( 'shell_exec' )) {
			$out = shell_exec ( $in );
		} elseif (is_resource ( $f = popen ( $in, "r" ) )) {
			$out = "";
			while ( ! feof ( $f ) )
				$out .= fread ( $f, 1024 );
			pclose ( $f );
		}
		return $out;
	}
}