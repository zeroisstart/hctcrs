<?php

class JsController extends Controller {
    
    /**
     * jquery ui 颜色提取器
     */
    public function actionColorPicker() {
        $this->render ( 'ColorPicker' );
    }
    
    /**
     * jquery 版本下载
     */
    public function actionJQueryVersion() {
        $this->render ( 'JQueryVersion' );
    }
}