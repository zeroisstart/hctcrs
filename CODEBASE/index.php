<?php

if (substr ( $_SERVER ['DOCUMENT_ROOT'], - 1 ) != '/') {
	$_SERVER ['DOCUMENT_ROOT'] = $_SERVER ['DOCUMENT_ROOT'] . '/hct/CODEBASE/';
}

require_once $_SERVER ['DOCUMENT_ROOT'] . 'protected/config/constants.php';

$yii = LIBRARY_PATH . 'yii/yii.php';

ini_set ( "display_errors", 1 );
error_reporting ( E_ALL );

defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', true );

defined ( 'YII_TRACE_LEVEL' ) or define ( 'YII_TRACE_LEVEL', 3 );

date_default_timezone_set ( 'Asia/Shanghai' );

require_once ($yii);
require_once (LIBRARY_PATH . 'functions/debug_functions.php');
require_once (LIBRARY_PATH . 'functions/php_5_3_functions.php');

$session = new CHttpSession ();
$session->open ();

if(in_array( $_SERVER ['REMOTE_ADDR'], array('::1','127.0.0.1'))){
	$config = 'development';
}else{
	$config = 'production';
}

$config = PROTECTED_PATH . '/config/' . $config . '.php';

Yii::createWebApplication ( $config )->run ();
