<?php
$this->breadcrumbs=array(
	'Encryption',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p class="p_title"><?php echo $content;?></p>

<?php 
$cs = Yii::app() -> clientScript;

$cs -> registerCoreScript('jquery');

$cs -> registerScriptFile(Yii::app() -> baseUrl.'/js/tool/option.widget.js');

?>

<?php echo CHtml::beginForm();?>

    <div>
        <?php echo CHtml::textarea('code',$text,array('class'=>'tarea_code'))?>
    </div>
    
    <div>
    	<span class="submit_btn">
    		<?php foreach ($functions as $func) {
    			echo CHtml::htmlButton($func,array('class'=>'clkPostCmd','name'=>$func));
    		}?>
    	</span>
    </div>

<?php echo CHtml::endForm();?>