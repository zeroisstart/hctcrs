<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<base target="_blank" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<?php 
		$css = array(
				'/css/main.css',
				'/css/form.css',
				'/css/top.css');

		foreach ($css as $cssfile) {
			echo '<link rel="stylesheet" type="text/css" href="'.Yii::app() -> request->baseUrl.$cssfile.'"/>'."\r\n\t";
		}

		$js = array();

		foreach ($js as $jsfile) {
			echo '<link rel="stylesheet" type="text/css" href="'.Yii::app() -> request->baseUrl.$cssfile.'"/>'."\r\n\t";
		}

	?>


    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header" style="display:none;">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php /* $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); */?>
	</div><!-- mainmenu -->
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" style="display:display;">
		Copyright &copy; <?php echo date('Y'); ?> by Top.<br/>
		All Rights Reserved.<br/>
		<?php echo CHtml::link('codebase',$this -> createUrl('/'))  ?>
	</div><!-- footer -->

</div><!-- page -->

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=2"></' + 'script>')</script>
</body>
</html>
