<?php

class StringController extends Controller {
    public function actionCodingSelect() {
        var_dump($this);
        die;
        $coding = isset ( $_POST ['text'] ) ? $_POST ['text'] : '';
        if ($coding) {
            $encode = mb_detect_encoding ( $coding, array (
                    'ASCII',
                    'GB2312',
                    'GBK',
                    'UTF-8'
            ) );
            var_dump($encode);
            $test = '中文';
        }
        $this->render ( 'codingSelect', array (
                'coding' => $coding
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