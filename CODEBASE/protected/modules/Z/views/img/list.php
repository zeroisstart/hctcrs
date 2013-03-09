<?php
$this->breadcrumbs = array (
		'Img' => array (
				'/Z/img' 
		),
		'List' 
);
?>




<div class="grid_form">
<?php

$this->widget ( 'components.widgets.GridView', array (
		'dataProvider' => $dataProvider,
		'columns' => array (
				array (
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) )?>

</div>