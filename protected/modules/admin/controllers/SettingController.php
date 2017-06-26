<?php
/**
 * 
 * SettingController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * SettingController includes actions relevant to system setting
 *** create
 *** update
 *** delete
 *** index
 *** suggest name
 *** load model
 *** perform action to list of selected models from checkbox   
 */
class SettingController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		array('allow',  
				'actions'=>array('write'),
				'roles'=>array('setting_write'),
			),
			array('allow',  
				'actions'=>array('updateForm'),
				'roles'=>array('setting_updateForm'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('setting_index'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('setting_suggestName'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('setting_edit'),
			),
			array('allow',  
				'actions'=>array('updateAll'),
				'users'=>array('@'),
			),
			array('deny', 
				'users'=>array('*'),
			),			
		);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionWrite()
	{
		if(isset($_GET['Setting']['id']) && $_GET['Setting']['id'] != ''){
			$model=$this->loadModel($_GET['Setting']['id']);	
			if (Yii::app ()->user->checkAccess ( 'setting_update', array ('setting' => $model ) )) {
			if(isset($_GET['Setting']))
			{
				$model->attributes=$_GET['Setting'];
				if($model->save()){
					$result['success']=true;
				}
				else{
					$result['success']=false;
					$result['errors']=$model->getErrors();
				}
			}
			}	
			else{
				$result['sucess']=false;
			}
		}
		else{
			$model=new Setting();
			if(isset($_GET['Setting']))
			{
				$model->attributes=$_GET['Setting'];
				if($model->save()){
					$result['success']=true;
				}
				else{
					$result['success']=false;
					$result['errors']=$model->getErrors();
				}
			}	
		}
		echo json_encode($result);
		Yii::app()->end();
	}
	
	/**
	 * Get update form
	 */
	public function actionUpdateForm($id)
	{
		$model=$this->loadModel($id);	
		//if (Yii::app ()->user->checkAccess ( 'setting_update', array ('setting' => $model ) )) {
		if(true){
			$result['id']=$model->id;
			$result['category']=$model->category;
			$result['name']=$model->name;
			$result['value']=$model->value;
			$result['description']=$model->description;
			echo json_encode($result);
			Yii::app()->end();
		}	
		else
			throw new CHttpException(400,iPhoenixLang::admin_t('You do not have authorization to perform this action','main'));	
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex($category)
	{
                $this->initCheckbox('checked-setting-list','Setting');
		$model=new Setting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Setting']))
			$model->attributes=$_GET['Setting'];
		$model->category=$category;
		$this->iPhoenixRender('index',array(
			'model'=>$model
		));
	}
	/**
	 * Suggests name of setting.
	 */
	public function actionSuggestName($category)
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$names=Setting::model()->suggestName($keyword,$category);
			if($names!==array())
				echo implode("\n",$names);
		}
	}	

	/**
	 * Init checkbox selection
	 * @param string $name_params, name of section to work	 
	 */
	public function initCheckbox($name_params,$class,$default=array()){
		if (! isset ( Yii::app ()->session [$name_params] ))
			Yii::app ()->session [$name_params] = $default;
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
		{
				Yii::app ()->session [$name_params] = $default;
		}
		else {
			if (isset ( $_POST [$class] ['list-checked'] )) {
				$list_new = array_diff ( explode ( ',', $_POST [$class] ['list-checked'] ), array ('') );
				$list_old = Yii::app ()->session [$name_params];
				$list = $list_old;
				foreach ( $list_new as $id ) {
					if (! in_array ( $id, $list_old ))
						$list [] = $id;
				}
				Yii::app ()->session [$name_params] = $list;
			}
			if (isset ( $_POST [$class] ['list-unchecked'] )) {
				$list_unchecked = array_diff ( explode ( ',', $_POST [$class] ['list-unchecked'] ), array ('') );
				$list_old = Yii::app ()->session [$name_params];
				$list = array ();
				foreach ( $list_old as $id ) {
					if (! in_array ( $id, $list_unchecked )) {
						$list [] = $id;
					}
				}
				Yii::app ()->session [$name_params] = $list;
			}
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,iPhoenixLang::admin_t('The requested page does not exist','main'));
		return $model;
	}

	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Setting::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
		}
	}
	
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
			if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'setting-list'){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}
}
