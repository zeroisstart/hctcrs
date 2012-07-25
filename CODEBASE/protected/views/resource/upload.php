<?php
$this->breadcrumbs = array (
        'Resource'
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $form =$this -> beginWidget('CActiveForm',array(
            'id'=>'upload',
            'htmlOptions'=>array(
                        'enctype'=>"multipart/form-data")));?>

<div class="row" >
    <?php echo $form->labelEx($model,'Type_ID');?>
    <?php echo $form-> dropDownList($model,'Type_ID',$model->Types);?>
</div>
<div class="row" >
    <?php echo $form->labelEx($model,'Version');?>
    <?php echo $form -> textfield($model,'Version');?>
</div>

<div class="row" >
    <?php echo $form->labelEx($model,'PATH_CG');?>
    <?php echo $form -> fileField($model,'PATH_CG');?>
</div>

<div class="row" >
<?php echo CHtml::submitButton('上传');?>
</div>

<?php $this->endWidget();?>