<?php

class JsonController extends Controller {
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