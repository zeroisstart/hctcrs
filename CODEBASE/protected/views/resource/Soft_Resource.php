<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'soft--resource-Soft_Resource-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name'); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Size'); ?>
		<?php echo $form->textField($model,'Size'); ?>
		<?php echo $form->error($model,'Size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Version'); ?>
		<?php echo $form->textField($model,'Version'); ?>
		<?php echo $form->error($model,'Version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type_ID'); ?>
		<?php echo $form->textField($model,'Type_ID'); ?>
		<?php echo $form->error($model,'Type_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dateline'); ?>
		<?php echo $form->textField($model,'Dateline'); ?>
		<?php echo $form->error($model,'Dateline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PATH_CG'); ?>
		<?php echo $form->textField($model,'PATH_CG'); ?>
		<?php echo $form->error($model,'PATH_CG'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->