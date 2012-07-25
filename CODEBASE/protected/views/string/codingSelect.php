<?php
$this->breadcrumbs=array(
	'String',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php echo CHtml::beginForm();?>
	<div class="row">
		<?php echo CHtml::textArea('text',$coding,array('class'=>'tarea_code'))?>
	</div>
	<div class="row">
		<?php echo CHtml::submitButton();?>
	</div>
	
<?php echo CHtml::endForm();?>