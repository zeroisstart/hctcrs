<?php

/**
 *
 * 输出<div>text</div>
 * @author user
 *
 */
class ODivText extends CWidget {

    /**
     *
     * @var string 替换的样本
     */
    public $ReplaceKey = '{content}';

    /**
     *
     * @var string 输出模板
     */
    public $template = '<div class="widget_div divText_div"><p class="widget_p divText_p">{content}</p></div>';

    public $content = '';

    /**
     * 初始化数据
     */
    public function init() {

        $register = Yii::app ()->clientScript ( '' );
    }

    /**
     */
    public function run() {
        echo str_replace ( $this -> ReplaceKey,$this -> content $this -> template )

        ;
    }
}