<?php $this -> renderPartial('_header');?>

<p class="p_link">
	<a href="<?php echo $this -> createUrl('bookmark/add');?>" target="_blank">add</a>
</p>


<?php $this -> renderPartial('_form',array('model'=>$model,'method'=>'GET'));?>

<div class="grid_form">
<?php

$this->widget ( 'components.widgets.GridView', array (
		'dataProvider' => $data,
		'columns' => array (
				'ID',
				'Cate',
				'Title' => array (
						'name' => 'Title',
						'type' => 'html',
						'value' => 'CHtml::link($data->Title,$data->Url);' 
				),
				'Time' => array (
						'name' => 'Time',
						'value' => 'date("Y-m-d h:i:s",$data->Time)' 
				),
				'Read',
				array (
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) )?>

</div>