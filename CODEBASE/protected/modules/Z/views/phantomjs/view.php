<?php
$this->breadcrumbs = array (
		'Phantomjs' => array (
				'/Z/phantomjs' 
		),
		'View' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$css = array (
		'/css/wh.css' 
);
$this->widget ( 'widgets.clientScript.autoRegisterFile', array (
		'css' => $css 
) );
?>


<div class="form">
	<form method="post">
		<input type="text" name="url" class="form_input w_500 h_30" /> 
		<input type="submit" class="blue_Btn" />
	</form>
</div>