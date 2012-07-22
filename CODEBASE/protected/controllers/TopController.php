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

}