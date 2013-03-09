<?php

if (substr($_SERVER['DOCUMENT_ROOT'], -1) != '/')
{
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'].'/codebase/';
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/protected/config/constants.php';

$yii = LIBRARY_PATH . 'yii/yii.php';

ini_set("display_errors", 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Shanghai');

require_once($yii);
require_once(LIBRARY_PATH.'functions/debug_functions.php');
require_once(LIBRARY_PATH.'functions/php_5_3_functions.php');

$session = new CHttpSession;
$session->open();

$config = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? 'development' : 'production';
$config = PROTECTED_PATH . '/config/' . $config . '.php';

Yii::createWebApplication($config)->run();
/*
// change the following paths if necessary
$yii = dirname ( __FILE__ ) . '/../framework/yii.php';
// $config = dirname ( __FILE__ ) . '/protected/config/main.php';

require dirname ( __FILE__ ) . '/protected/config/Config.php';

putenv ( "AppStrategy=develop" );
$config = new Config ();

$config = $config->GetConfigs ();

// remove the following lines when in production mode
defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', true );
// specify how many levels of call stack should be shown in each log message
defined ( 'YII_TRACE_LEVEL' ) or define ( 'YII_TRACE_LEVEL', 3 );

require_once ($yii);
Yii::createWebApplication ( $config->getConfigs () )->run ();

*/
