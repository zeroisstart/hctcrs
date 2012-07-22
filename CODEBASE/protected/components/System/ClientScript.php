<?php
class ClientScript extends CClientScript {
    
    /**
     * 批量注册JS文件
     *
     * @param array $ary_js
     * @param boolean $defaultPreUrl
     */
    public function _registerJS(array $ary_js, $defaultUrl = true) {
        $pre = $defaultUrl ? Yii::app ()->baseUrl : '';
        foreach ( $ary_js as $js ) {
            $this->registerScriptFile ( $pre . '/' . $js );
        }
    }
    /**
     * 批量注册CSS文件
     *
     * @param array $ary_css
     * @param boolean $defaultPreUrl
     */
    public function _registerCSS(array $ary_css, $defaultPreUrl = true) {
        $pre = $defaultPreUrl ? Yii::app ()->baseUrl : '';
        foreach ( $ary_css as $css ) {
            $this->registerScriptFile ( $pre . '/' . $css );
        }
    }
}