<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following lines when in production mode
defined ( 'YII_DEBUG' ) or define ( 'YII_DEBUG', true );
// specify how many levels of call stack should be shown in each log message
defined ( 'YII_TRACE_LEVEL' ) or define ( 'YII_TRACE_LEVEL', 3 );
//defined const
include dirname(__FILE__).'/protected/config/const.php';
require_once ($yii);
$app = Yii::createWebApplication ( $config );

//Config language
if(isset($_GET['iphoenix_language'])){
	Yii::app()->theme='front-end-'.$_GET['iphoenix_language'];
	Yii::app()->language = $_GET['iphoenix_language'];
}

$app->run ();
