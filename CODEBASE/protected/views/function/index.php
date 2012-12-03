<?php
$this->breadcrumbs = array (
		'Function' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php $this -> widget('widgets.System.ScriptFactory',$this -> GetScriptFiles($this->action->id))?>

<div class="functions_args">
	<ul>
		<?php foreach($params['args'] as $arg):?>
			<li class="args_btn"><a href="javascript:void();"><?php echo $arg ?></a></li>
		<?php endforeach;?>
	</ul>
</div>
<hr style="margin:5 0 0;"></hr>

<div class="clear_both"></div>

<div class="function_arg_area">
	<div>
		<textarea rows=10 cols=15>
					
		</textarea>
	</div>
</div>


<div class="functions_names">
	<ul>
		<?php foreach($params['func'] as $func):?>
			<li><a href="javascript:void();"><?php echo $func ?></a></li>
		<?php endforeach;?>
	</ul>
</div>