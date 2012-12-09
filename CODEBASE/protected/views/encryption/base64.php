<?php
$this->breadcrumbs=array(
	'Encryption',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p class="p_title"><?php echo $base64?></p>

<?php $this -> renderPartial('views._helper.Form.areaSubmit',array('text'=>$code)) ?>
