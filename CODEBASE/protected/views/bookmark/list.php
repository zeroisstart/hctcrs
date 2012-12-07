<?php
$this->breadcrumbs = array (
		'Book Mark' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div>
	<?php $this -> renderPartial('_form',array('model'=>$model));?>
</div>





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