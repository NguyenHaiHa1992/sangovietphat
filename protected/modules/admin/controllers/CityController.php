<?php
/**
 * 
 * CityController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * CityController includes actions relevant to City:
 *** create new City
 *** update information of a City
 *** delete City
 *** validate menu
 *** index menu
 *** write 
 *** update list order view
 *** load model Banner from banner's id
 *** perform action to list of selected banner from checkbox  
 */
class CityController extends Controller
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
				'actions'=>array('create'),
				'roles'=>array('city_create'),
			),
			array('allow', 
				'actions'=>array('copy'),
				'roles'=>array('city_copy'),
			),
			array('allow',  
				'actions'=>array('update'),
				'roles'=>array('city_update'),
			),
			array('allow',  
				'actions'=>array('updateAll'),
				'roles'=>array('city_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('city_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('city_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('city_index'),
			),
			array('allow',  
				'actions'=>array('updateListCity'),
				'users'=>array('*'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('city_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('city_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('city_edit'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new City();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['City']))
		{
			$model->attributes=$_POST['City'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/city/update',array('id'=>$model->id)));
		}

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$city=City::model()->findByPk($id);
		$copy=$city->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/city/update',array('id'=>$copy->id)));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);	
		//if (Yii::app ()->user->checkAccess ( 'city_update', array ('city' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['City']))
		{
			$model->attributes=$_POST['City'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/city/update',array('id'=>$model->id)));
			}
		}
		
		$this->iPhoenixRender('update',array(
			'model'=>$model,
			
		));	
		}	
		else
			throw new CHttpException(400,iPhoenixLang::admin_t('You do not have authorization to perform this action','main'));	
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,iPhoenixLang::admin_t('Invalid request. Please do not repeat this request again','main'));
	}

	/**
	 * Performs the action with multi-selected city from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-city-list','City');
		$list_checked = Yii::app()->session["checked-city-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'city_delete')) {
					foreach ( $list_checked as $id ) {
						$item = City::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']=iPhoenixLang::admin_t('Delete successfully','main');
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-city-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'city_copy')) {
					foreach ( $list_checked as $id ) {
						$city=City::model()->findByPk($id);
						$copy=$city->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']=iPhoenixLang::admin_t('Copy successfully','main');
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-city-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
		}
		echo json_encode($result);
		Yii::app()->end();		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-city-list','City');
		$model=new City('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['City']))
			$model->attributes=$_GET['City'];
		
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			
		));
	}
	/**
	 * Reverse status of city
	 * @param integer $id, the ID of city to be reversed
	 */
	public function actionReverseStatus($id)
	{		
		$city=City::model()->findByPk($id);
		
		$old_status=$city->status == 1 ? true : false;
		
		$city->status=!$old_status == true ? 1 : 0;
		
		if($city->save()) 
			echo json_encode(array('success'=>true,'src'=>$city->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	
	
	/**
	 * Suggests title of city.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=City::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = City::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
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
		$model=City::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,iPhoenixLang::admin_t('The requested page does not exist','main'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
			if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'city-list'){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}

   /**
    * 
    */
    public function actionUpdateListCity()
	{
		if($_POST['province_id'] != ""){
			$criteria = new CDbcriteria();
			$criteria->compare('parent_id', $_POST['province_id']);
			$data = City::model()->findAll($criteria);

		    $data=CHtml::listData($data,'id','name');

		    foreach($data as $value=>$name)
		    {
		        echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
		    }
		}
		else{
			echo "<option value=''>Quận/Huyện</option>";
		}
	}

    public function actionUpdateAll()
	{
		$list_city = City::model()->findAll();
		foreach($list_city as $city){
			$city->save();
		}
	}
}