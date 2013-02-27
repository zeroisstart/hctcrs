

<?php
/* var_dump($activeData);
die;
$data = $activeData -> data; */

$data = $activeData -> getData();

foreach($data as $model){
	echo $model -> ShareUrl ."\t";
}

/*
$this->widget ( 'components.widgets.GridView', array (
		'dataProvider' => $activeData,
		'columns' => array (
				'ID',
				'ShareUrl',
				array (
						'class' => 'components.widgets.ButtonColumn'
				)
		)
) ) 
*/
?>