 <?php
$modules_includes = array ();
$modules_dirs = scandir ( MODULES_PATH );

foreach ( $modules_dirs as $module ) {
	if ($module [0] == ".") {
		continue;
	}
	
	$modules [] = $module;
	
	$modules_includes [] = "application.modules.{$module}.*";
	$modules_includes [] = "application.modules.{$module}.models.*";
	$modules_includes [] = "application.modules.{$module}.portlets.*";
	$modules_includes [] = "application.modules.{$module}.forms.*";
	$modules_includes [] = "application.modules.{$module}.components.*";
	$modules_includes [] = "application.modules.{$module}.components.zii.*";
}

$modules ['gii'] = array (
		'class' => 'system.gii.GiiModule',
		'generatorPaths' => array (
				'ext.dwz.gii', 
		),
		'password' => 'yii',
		'ipFilters' => array (
				'127.0.0.1',
				'::1' 
		) 
);


$components = require 'components.php';

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Top\' CodeBase ',
    'timeZone'=>'Asia/Shanghai', //设置时区为上海
    'language'=>'zh_cn',

    'defaultController'=>'Top',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	    'application.components.Helper.*',
	),
    'aliases'=>array(
      'anne' =>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR,
      'alice' =>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR,
      'components'=>'application.components', // 设置元件目录
      'views'=>'application.views',           // 设置显示目录
      'widgets'=>'application.widgets'),      // 设置小工具目录
	'modules'=>$modules,
	// application components
	'components'=>$components,


	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'phantomjs'=>'D:\htdocs\www\phantomjs-1.8.2-windows\phantomjs.exe D:\htdocs\www\phantomjs-1.8.2-windows\examples\rasterize.js',
		// this is used in contact page
		'adminEmail'=>'shenhongmings@gmail.com',
		
//参数的传递
		'args' => array('a','a+b','a+b+c','a+b+c+d'),
		
		'allowFunction'=>array(
		
			'base64_decode',
			'base64_encode',
			'md5',
			'sha1',
			
//十进制转换			
			'decbin',
			'decoct',
			'dechex',
//二进制转十进制			
			'bindec',
			'bin2hex',
//八进制转十进制			
			'octdec',
//十六进制转十进制
			'hexdec',
//时间
			'date',
			'time',
//正则匹配					
			'preg_match',
			'preg_match_all',
			),
	),
);
