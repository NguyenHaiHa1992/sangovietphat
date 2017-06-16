<?php
/**
 * 
 * StoreController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class StoreController extends Controller
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
	/*ACCESSRULES*/
	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('create'),
				'roles'=>array('store_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('store_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('store_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('store_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('store_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('store_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('store_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('store_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('store_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('store_suggestName'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('store_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('updateListCity'),
				'roles'=>array('store_updateListCity'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('store_edit'),
			),
			array('allow',  
				'actions'=>array('updateSellProduct'),
				'roles'=>array('store_updateSellProduct'),
			),
			array('deny', 
				'users'=>array('*'),
			),			
		);
	}
	/*!ACCESSRULES*/

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Store();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Store']))
		{
			$model->attributes=$_POST['Store'];
			if($model->save()){
				$this->redirect(iPhoenixUrl::createUrl('admin/store/update',array('id'=>$model->id)));
			}
				
		}
		//Get list city
		$list_city = array();
		$list_city['-1'] = 'Tất cả';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}
		//Group categories that contains product
		$list_category=ProductCategory::getList_nodes();
		
		//Handler list suggest store
		$this->initCheckbox('checked-suggest-list','SuggestStore',$model->list_current_suggest_ids);
		$suggest=new Product('search');
		$suggest->unsetAttributes();
		
		if(isset($_GET['SuggestProduct']))
			$suggest->attributes=$_GET['SuggestProduct'];
				

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'list_city'=>$list_city,
			'suggest' => $suggest,
			'list_category'=>$list_category,	
		));
	}

	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$store=Store::model()->findByPk($id);
		
		$copy=$store->copy();
		
		if(isset($copy))
		{
			$this->redirect(iPhoenixUrl::createUrl('admin/store/update',array('id'=>$copy->id)));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$list = array();
		if (isset(Yii::app()->session["checked-suggest-list"]))
			unset(Yii::app()->session["checked-suggest-list"]);
		else 
			Yii::app()->session["checked-suggest-list"] = array();
		
		$model=$this->loadModel($id);
		foreach ($model->products as $k) {
			$list[] = $k->id ;
		}
		
		Yii::app()->session["checked-suggest-list"] = $list;
		$model->tmp_product_ids = implode(',', $list);
		// var_dump($model->tmp_product_ids);
		
		//if (Yii::app ()->user->checkAccess ( 'store_update', array ('store' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Store']))
		{
			$model->attributes=$_POST['Store'];
			
			if($model->save()){
				Yii::app()->session['checked-suggest-list'] = explode(',', $model->tmp_product_ids);
				$this->redirect(iPhoenixUrl::createUrl('admin/store/update',array('id'=>$model->id)));
			} else {
				var_dump($model->getErrors());
				exit;
			}
		}
		//Get list city
		$list_city = array();
		$list_city['-1'] = 'Tất cả';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}
		
		//Group categories that contains product
		$list_category=ProductCategory::getList_nodes();
		
		//Handler list suggest store
		//$this->initCheckbox('checked-suggest-list','SuggestStore',$model->list_current_suggest_ids);
		$suggest=new Product('search');
		$suggest->unsetAttributes();
		
		if(isset($_GET['SuggestProduct']))
			$suggest->attributes=$_GET['SuggestProduct'];
			
		$this->iPhoenixRender('update',array(
			'model'=>$model,
			'suggest' => $suggest,
			'list_city'=>$list_city,
			'list_category'=>$list_category,
		));	
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');	
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Performs the action with multi-selected store from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-store-list','Store');
		$list_checked = Yii::app()->session["checked-store-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'store_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Store::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa bài viết thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-store-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'store_copy')) {
					foreach ( $list_checked as $id ) {
						$store=Store::model()->findByPk($id);
						$copy=$store->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']='Copy bài viết thành công';
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-store-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']='Bạn không có quyền copy bài viết';
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
		$this->initCheckbox('checked-store-list','Store');
		$model=new Store('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Store']))
			$model->attributes=$_GET['Store'];	
		//Get list city
		$list_city = array();
		$list_city['-1'] = 'Tất cả';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}
		
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_city'=>$list_city,
	
		));
	}
	/**
	 * Reverse status of store
	 * @param integer $id, the ID of store to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$store=Store::model()->findByPk($id);
		$old_status=$store->status;
		$store->status=!$old_status;
		if($store->save()) 
			echo json_encode(array('success'=>true,'src'=>$store->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of store
	 * @param integer $id, the ID of store to be reversed
	 */
	public function actionReverseHome($id)
	{
		$store=Store::model()->findByPk($id);
		$old_home=$store->home;
		$store->home=!$old_home;
		if($store->save()) 
			echo json_encode(array('success'=>true,'src'=>$store->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of store
	 * @param integer $id, the ID of store to be reversed
	 */
	public function actionReverseNew($id)
	{
		$store=Store::model()->findByPk($id);
		$old_new=$store->new;
		$store->new=!$old_new;
		if($store->save()) 
			echo json_encode(array('success'=>true,'src'=>$store->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of store.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Store::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest store
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestStore');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/**
    * 
    */
    public function actionUpdateListCity()
	{
	
		$data=City::model()->findAll('parent_id=:parent_id', 
          array(':parent_id'=>(int) $_POST['location_id']));
	
	    $data=CHtml::listData($data,'id','name');
		
	    foreach($data as $value=>$name)
	    {
	        echo CHtml::tag('option',
	                  array('value'=>$value),CHtml::encode($name),true);
	    }
	}
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Store::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
		}
	}
	/*
	 * Edit attribute
	 */
	public function actionUpdateSellProduct()
	{
		$this->initCheckbox('checked-suggest-list','SuggestStore');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);	
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
		$model=Store::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'store-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}