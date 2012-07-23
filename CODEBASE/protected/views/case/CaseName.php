<?php
$this->breadcrumbs=array(
	'E Nv',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this -> renderPartial('CaseName_Form',array('model'=>$model)); ?>