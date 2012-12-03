<?php
class StringController extends Controller {
	public function actionCodingSelect() {
		$txt = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
		$convert_data = $char_code = '';
		if ($txt) {
			$encode = mb_detect_encoding ( $txt, array (
					'ASCII',
					'GB2312',
					'GBK',
					'UTF-8' 
			) );
			$convert_data = mb_convert_encoding ( $txt, $encode, 'utf-8' );
			$char_code = $encode;
		}
		$this->render ( 'codingSelect', array (
				'txt' => $txt,
				'convert_data' => $convert_data,
				'reponse_data' => $char_code 
		) );
	}
	/**
	 * 解析json 字符串
	 */
	public function actionJson_decode() {
		$json_decodeStirng = NULL;
		if (isset ( $_REQUEST ['json_code'] )) {
			$json_decodeStirng = str_replace ( '\n', '', $_REQUEST ['json_code'] );
		}
		$this->render ( 'json_code', array (
				'json_codeString' => $json_decodeStirng,
				'reponse_data' => CJSON::decode ( $json_decodeStirng ) 
		) );
	}
	/**
	 * 生成json 字符串
	 */
	public function actionJson_encode() {
		$json_encodeStirng = NULL;
		if (isset ( $_REQUEST ['json_code'] )) {
			$json_encodeStirng = str_replace ( '\n', '', $_REQUEST ['json_code'] );
		}
		$this->render ( 'json_code', array (
				'json_codeString' => $json_encodeStirng,
				'reponse_data' => CJSON::encode ( $json_encodeStirng ) 
		) );
	}
}