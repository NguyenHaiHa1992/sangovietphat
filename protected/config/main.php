<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language'=> 'vi',
	'name'=>'.:: iPHOENIX CMS ::.',
	// preloading 'log' component
	'preload'=>array('log'),
	'theme'=>'front-end-vi',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.modules.admin.models.*',
		'application.components.*',
		'application.components.admin.*',
		'application.components.identity.*',
		'application.components.iphoenix_tool.*',
		'application.components.iphoenix_widget.*',
		'application.extensions.yii-mail.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin123',
			//// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('118.70.185.68','::1'),
		),
		'dev'=>array(
			'password'=>'admin123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('118.70.185.68','::1'),
		),
		'admin'=>array(
			 'defaultController' => 'site/home',	
		),
		'elfinder'
	),
		
	'defaultController'=>'site/index',

	// application components
	'components'=>array(
		'user'=>array(
		 	'class' => 'iPhoenixCustomer',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('admin/site/login'),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		*/
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=demoihb_nigaoe',
			'emulatePrepare' => true,
			'username' => 'demoihb_nigaoe',
			'password' => 'nigaoe123',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),*/
		'db'=>require(dirname(__FILE__).'/db.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				''=>array('site/index'),

				'nhom-tin/<cat_id>/<cat_alias>'=>array('news/list'),
				'tin-tuc'=>array('news/list'),
				'tin-tuc/<news_alias>/<id>'=>array('news/view'),

				'nhom-san-pham/<alias>/<cat_id>'=>array('product/list'),
				'san-pham'=>array('product/list'),
				'san-pham/<product_alias>/<id>'=>array('product/view'),

				'gui-lien-he'=>array('contact/add'),
				'lien-he'=>array('contact/index'),

				'search'=>'site/search',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',				
			),
		),

		'authManager'=>array(
			'class' => 'CDbAuthManager',
			'connectionID' => 'db',
			'assignmentTable'=>'authassignment',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
//                                array(
//                                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                                    'ipFilters'=>array('127.0.0.1','192.168.1.215'),
//                                ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'mail'=>array(

			'class'=>'application.extensions.yii-mail.YiiMail',

			'transportType'=>'smtp',

			'transportOptions'=>array(
					'host'=>'mail.ihbvietnam.com',
					'username'=>'support@ihbvietnam.com',
					'password'=>'ihbvietnam@2013',
					'port'=>'25',
			),

			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),

        // UserCounter
        'counter' => array(
            'class' => 'application.extensions.UserCounter',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);