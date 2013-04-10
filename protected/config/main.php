<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SvbShop',

	// preloading 'log' component
	'preload'=>array('log'),
	'language'=>'ru',

    //модуль по умолчанию
    'defaultController'=>'main/default/index',



	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',

		'application.modules.user.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',

        'application.modules.admin.components.*',
        'application.modules.admin.models.*',

        'application.modules.main.components.*',
        'application.modules.main.models.*',


        'ext.shoppingCart.*',

//        'ext.filter.ESetReturnUrlFilter',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		
		'user' => array(
			// названия таблиц взяты по умолчанию, их можно изменить
			'tableUsers' => 'tbl_users',
			'tableProfiles' => 'tbl_profiles',
			'tableProfileFields' => 'tbl_profiles_fields',
		),
        'admin',
        'main',
	),

	// application components
	'components'=>array(
        'request'=>array(
            'class'=>'HttpRequest',
            'noCsrfValidationRoutes'=>array(
                '^services/wsdl.*$'
            ),
            'enableCsrfValidation'=>false,
            'enableCookieValidation'=>true,
        ),

		'user'=>array(
			// enable cookie-based authentication
			'class'=>'WebUser',
            'loginUrl' => array('/user/login'),
			'allowAutoLogin'=>true,
		),

		'authManager'=>array(
			//'class'=>'RDbAuthManager',
			//'defaultRoles' => array('Guest') // дефолтная роль
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=magazin',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '313379',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',

            'enableProfiling'=>true,
            'enableParamLogging'=>true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CProfileLogRoute',
			//		'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

        'shoppingCart'=> array(
            'class'=>'ext.shoppingCart.EShoppingCart',
        ),




	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@mgz.ru',
	),
);