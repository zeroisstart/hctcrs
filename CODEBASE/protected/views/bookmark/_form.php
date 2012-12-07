<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bookmark-_form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Cate'); ?>
		<?php echo $form->textField($model,'Cate'); ?>
		<?php echo $form->error($model,'Cate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title'); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Time'); ?>
		<?php echo $form->textField($model,'Time'); ?>
		<?php echo $form->error($model,'Time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Url'); ?>
		<?php echo $form->textField($model,'Url'); ?>
		<?php echo $form->error($model,'Url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Read'); ?>
		<?php echo $form->textField($model,'Read'); ?>
		<?php echo $form->error($model,'Read'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->