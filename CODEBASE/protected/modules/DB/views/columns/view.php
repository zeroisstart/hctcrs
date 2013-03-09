<?php
$this->breadcrumbs=array(
	'Columns'=>array('/DB/columns'),
	'View',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>



<form method="post">
	<textarea class="txt_form" name="connectionString"></textarea>
	<input type="submit" />
</form>