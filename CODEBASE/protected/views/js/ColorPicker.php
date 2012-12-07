<?php
$this->breadcrumbs = array (
		'Js' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="txt_center">
<?php
$this->widget ( 'application.extensions.colorpicker.EColorPicker', array (
		'name' => 'cp',
		'mode' => 'flat',
		'fade' => false,
		'slide' => false,
		'curtain' => true 
) );
?>
</div>