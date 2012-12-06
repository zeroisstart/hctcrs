<?php
$this->breadcrumbs = array (
		'Resource' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'soft--type-_from-form',
		'enableAjaxValidation' => false 
) );
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type'); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->

<?php
$this->widget ( 'zii.widgets.grid.CGridView', array (
		'id' => 'sms-grid',
		'dataProvider' => $model->search (),
		'columns' => array (
				'ID',
				'Type',
				array ( // display a column with "view", "update" and "delete"
						'class' => 'CButtonColumn' 
				) 
		) 
)
);
?>
