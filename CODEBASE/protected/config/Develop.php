<?php

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
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),	'Z'=>array('class'=>'application.modules.Z.ZModule')
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'Folder'=>array(
                'class'=>'components.System.Folder'

		),
		'clientScript'=>array(
		        'class'=>'components.System.ClientScript'

		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=CodeBase',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
            'errorAction'=>'Top/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),


	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
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