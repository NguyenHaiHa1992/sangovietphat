<?php
class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		Yii::app()->setComponents(array(
			'user'=>array(
				'class'=>'iPhoenixUser',
				'stateKeyPrefix'=>'admin',
				'allowAutoLogin'=>true,
				'loginUrl'=>Yii::app()->createUrl($this->getId().'/site/login'),
			),
		), false);

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
			'dev.models.AdminMenu',
			'dev.models.AuthItem',
			'dev.models.AuthItemChild',
			'dev.models.AuthAssignment',
		));
		//Configure layout path of module screen
		Yii::app()->theme='admin';
		$this->viewPath = Yii::app ()->theme->basePath.'/views';
		//Disable load jquery.js
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}