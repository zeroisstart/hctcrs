<?php
$this->breadcrumbs=array(
	'String',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php echo CHtml::beginForm();?>
	<div class="row">
		<?php echo CHtml::textArea('text',$txt,array('class'=>'tarea_code'))?>
	</div>
	<div class="row">
		<?php echo CHtml::submitButton();?>
	</div>

<?php echo CHtml::endForm();?>

<div>
    <?php if($reponse_data):?>
        <p><?php CVarDumper::dump($reponse_data,10,true)?></p>
    <?php endif;?>
    <?php if($convert_data):?>
        <p><?php CVarDumper::dump($convert_data,10,true)?></p>
    <?php endif;?>
</div>