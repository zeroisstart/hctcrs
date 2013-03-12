<?php
$this->breadcrumbs = array (
		'Columns' => array (
				'/DB/columns' 
		),
		'View' 
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="content" width="200px;">
	<form method="post">
	
<?php

$ary_connectionString = $connectionString;

$keys = array_keys ( $ary_connectionString );

$ary_opt = array_flip ( $keys );

foreach ( $ary_opt as $k => $value ) {
	$ary_opt [$k] = $k;
}

$this->widget ( 'ext.select2.ESelect2', array (
		'name' => 'connectionString',
		'data' => $ary_opt,
		'events' => array (
				'change' => 'js:function(_ele){console.log(_ele.target.value);$("form").submit()}' 
		) 
) );

if ($dbs) {
	$this->widget ( 'ext.select2.ESelect2', array (
			'name' => 'database',
			'data' => $dbs,
			'value' => $database,
			'events' => array (
					'change' => 'js:function(_ele){
							if($("#table")[0]){
								$("#table").remove();
							}
							$("form").submit()
					}' 
			) 
	) );
}

if ($tbls) {
	$this->widget ( 'ext.select2.ESelect2', array (
			'name' => 'table',
			'data' => $tbls,
			'value' => $table,
			'events' => array (
					'change' => 'js:function(_ele){console.log(_ele.target.value);$("form").submit()}' 
			) 
	) );
}

?>
</form>

<?php if($column):?>
	<div>
		<?php var_dump($column['keys']);?>
	</div>
	<div>
		<?php echo '`'.implode('`,`', $column['keys']).'`';?>
	</div>
	<div>
		<xmp>
<?php
	$column ['keys'] = array_flip ( $column ['keys'] );
	var_export ( $column ['keys'] );
	?>
</xmp>
	</div>
<?php endif;?>

</div>