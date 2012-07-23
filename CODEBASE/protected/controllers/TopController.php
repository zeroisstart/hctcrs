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

    public function actionRunCode() {
        $string = 'this is test';
        $int = 100;
        $sary = array (
                'a',
                'b',
                'c'
        );
        $saryr = array (
                'c',
                'b',
                'a'
        );
        $iary = array (
                1,
                2,
                3
        );
        $iaryr = array (
                3,
                2,
                1
        );
        $content = isset ( $_POST ['code'] ) ? $_POST ['code'] : '';
        if ($content) {
            $code = $content;
            eval ( $code );
            //highlight_string($int);
        }
        $this->render ( 'runCode', array (
                'code' => $content
        ) );
    }

}