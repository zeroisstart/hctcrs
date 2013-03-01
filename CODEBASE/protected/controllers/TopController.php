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
	
	public function actionCatchShareUrl(){
		//100000
		/*$i = 1185833;
		
		set_time_limit(0);
		
		for($i;$i<=1200000;$i++){
			$url = 'http://www.ctdisk.com/u/'.$i.'/';
			if(! ($i % 5 )){
				sleep(1);
			}
			$content = file_get_contents($url);
			preg_match_all('/(\<a\shref\=\"\/u\/\d+\/\d+\"\>.*?\<\/a\>)/iU',$content,$all);
			
			if(isset($all[1])){
				foreach($all[1] as $val){
					$CtdiskShareUrl = new CtdiskShareUrl();
					$CtdiskShareUrl -> ShareUrl = $val;
					$CtdiskShareUrl -> save();
				}
			}
		}*/
		
	}
	
	public function actionExploits(){
		
		$this -> render('exploits');
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