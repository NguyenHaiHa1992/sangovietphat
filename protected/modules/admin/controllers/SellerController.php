<?php
/**
 * 
 * SellerController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class SellerController extends Controller
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
				'roles'=>array('seller_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('seller_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('seller_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('seller_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('seller_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('seller_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('seller_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('seller_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('seller_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('seller_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('seller_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('seller_edit'),
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
		$model=new Seller();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Seller']))
		{
			$model->attributes=$_POST['Seller'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/seller/update',array('id'=>$model->id)));
		}
		//Group categories that contains seller
		$list_category=SellerCategory::getList_nodes();
		
		//Handler list suggest seller
		$this->initCheckbox('checked-suggest-list','SuggestSeller',$model->list_current_suggest_ids);
		$suggest=new Seller('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestSeller']))
			$suggest->attributes=$_GET['SuggestSeller'];	

		$this->render('create',array(
			'model'=>$model,
			'list_category'=>$list_category,	
			'suggest' => $suggest	
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$seller=Seller::model()->findByPk($id);
		$copy=$seller->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/seller/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'seller_update', array ('seller' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Seller']))
		{
			$model->attributes=$_POST['Seller'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/seller/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains seller
		$list_category=SellerCategory::getList_nodes();
		
		//Handler list suggest seller
		$this->initCheckbox('checked-suggest-list','SuggestSeller',$model->list_current_suggest_ids);
		$suggest=new Seller('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestSeller']))
			$suggest->attributes=$_GET['SuggestSeller'];	

		$this->render('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest' => $suggest
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
	 * Performs the action with multi-selected seller from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-seller-list','Seller');
		$list_checked = Yii::app()->session["checked-seller-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'seller_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Seller::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-seller-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'seller_copy')) {
					foreach ( $list_checked as $id ) {
						$seller=Seller::model()->findByPk($id);
						$copy=$seller->copy();
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
					Yii::app ()->session ["checked-seller-list"] = array ();
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
		$this->initCheckbox('checked-seller-list','Seller');
		$model=new Seller('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Seller']))
			$model->attributes=$_GET['Seller'];	
		//Group categories that contains seller
		$list_category=SellerCategory::getList_nodes();
		$this->render('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of seller
	 * @param integer $id, the ID of seller to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$seller=Seller::model()->findByPk($id);
		$old_status=$seller->status;
		$seller->status=!$old_status;
		if($seller->save()) 
			echo json_encode(array('success'=>true,'src'=>$seller->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of seller
	 * @param integer $id, the ID of seller to be reversed
	 */
	public function actionReverseHome($id)
	{
		$seller=Seller::model()->findByPk($id);
		$old_home=$seller->home;
		$seller->home=!$old_home;
		if($seller->save()) 
			echo json_encode(array('success'=>true,'src'=>$seller->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of seller
	 * @param integer $id, the ID of seller to be reversed
	 */
	public function actionReverseNew($id)
	{
		$seller=Seller::model()->findByPk($id);
		$old_new=$seller->new;
		$seller->new=!$old_new;
		if($seller->save()) 
			echo json_encode(array('success'=>true,'src'=>$seller->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of seller.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Seller::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest seller
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestSeller');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Seller::model()->findByPk($id);
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
		$model=Seller::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'seller-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}