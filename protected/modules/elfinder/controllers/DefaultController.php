<?php

class DefaultController extends Controller
{
    public function actionConnector()
	{
        $this->layout=false;
        
        Yii::import('elfinder.vendors.*');
        require_once('elFinder.class.php');
		
        //Create folder year/month/day
		$path=File::createDir('data/upload/editor');
        $opts=array(
            'root'=>Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.$path,
            'URL'=>Yii::app()->request->getBaseUrl(true).'/'.$path.'/',
            'rootAlias'=>'Home',
        	'uploadAllow' => array('image/*','video/*','audio/*'),
        	'uploadDeny'  => array('text', 'application'),
        	'uploadOrder' => 'deny,allow',
        	'archivers' => array(
		 		'create' => array(
		 			'application/x-gzip' => array(
		 				'cmd' => 'tar',
		 				'argc' => '-czf',
		 				'ext'  => 'tar.gz'
		 				)
		 			),
		 		'extract' => array(
		 			'application/x-gzip' => array(
		 				'cmd'  => 'tar',
		 				'argc' => '-xzf',
		 				'ext'  => 'tar.gz'
		 				),
		 			'application/x-bzip2' => array(
		 				'cmd'  => 'tar',
		 				'argc' => '-xjf',
		 				'ext'  => 'tar.bz'
		 				)
		 			)
		 		)
        	);
        $fm=new elFinder($opts);
        $fm->run();
	}
}