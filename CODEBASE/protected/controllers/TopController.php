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
     * 执行传递的PHP代码
     */
    public function actionRunCode() {

        /*         $code = '<?php/*
         * $code = '<?php '; $code .= $string; $code .= $int; $code .= $sary;
         * $code .= $saryr; $code .= $iary; $code .= $iaryr;
         * highlight_string($code);
         */

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