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
			<?php #<?php echo $this -> createUrl('function/index',array('args'=>$arg));?>
			<li class="args_btn"><a href="javascript:void(0);"><?php echo $arg ?></a></li>
		<?php endforeach;?>
	</ul>
</div>
<hr style="margin:5 0 0;"></hr>

<div class="clear_both"></div>
<!-- 输出的内容 -->
<div class="responseText">
	<p style="font-size:18px;color:#1BE0BF;"><?php echo $params['content'];?></p>
</div>

<?php echo CHtml::form('','post');?>

<?php echo CHtml::hiddenField('args',implode('+',$params['TypeOfArgs']));?>

<?php foreach ($params['TypeOfArgs'] as $types ):?>
<div class="function_arg_area">
	<div>
		<textarea rows=10 cols=15 name="<?php echo $types?>"><?php echo $params['argsValue'][$types]?></textarea>
	</div>
</div>
<?php endforeach;?>

<div class="functions_names">
	<ul>
		<?php foreach($params['func'] as $func):?>
			<li><a href="javascript:void(0);"><?php echo $func ?></a></li>
		<?php endforeach;?>
	</ul>
</div>
<?php echo CHtml::endForm();?>