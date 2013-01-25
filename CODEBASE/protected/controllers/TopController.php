<?php
class TopController extends Controller {
	
	/**
	 * 显示代码导航
	 */
	public function actionIndex() {
		$search = '';
		$keys = array (
				'k',
				'keyword' 
		);
		foreach ( $keys as $key ) {
			if (isset ( $_REQUEST [$key] ))
				$search = $_REQUEST [$key];
		}
		if ($search) {
		}
		$this->render ( 'index' );
	}
	
	/**
	 */
	public function actionQRGenerate() {
		$this->render ( 'QRGenerate', array () );
	}
	
	/**
	 * 执行传递的PHP代码
	 */
	public function actionRunCode() {
		$content = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
		/*
		 * if ($content) { $code = $content; eval ( $code ); //
		 * highlight_string($int); }
		 */
		$this->render ( 'runCode', array (
				'code' => $content 
		) );
	}
}