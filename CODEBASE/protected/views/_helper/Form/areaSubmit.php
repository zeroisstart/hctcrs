<?php echo CHtml::beginForm();?>

    <div>
        <?php echo CHtml::textarea('text',$text,array('class'=>'tarea_code'))?>
    </div>
    <div>
        <?php echo CHtml::submitButton();?>
    </div>

<?php echo CHtml::endForm();?>