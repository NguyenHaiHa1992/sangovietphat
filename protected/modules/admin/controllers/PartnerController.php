<?php
/**
 * 
 * PartnerController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class PartnerController extends Controller
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
				'roles'=>array('partner_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('partner_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('partner_update'),
			),
			array('allow', 
				'actions'=>array('autoSave'),
				'roles'=>array('partner_autoSave'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('partner_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('partner_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('partner_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('partner_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('partner_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('partner_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('partner_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('partner_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('partner_edit'),
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
		$model=new Partner();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Partner']))
		{
			$model->attributes=$_POST['Partner'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/partner/update',array('id'=>$model->id)));
		}
		//Group categories that contains partner
		$list_category=PartnerCategory::getList_nodes();
		
		//Handler list suggest partner
		$this->initCheckbox('checked-suggest-list','SuggestPartner',$model->list_current_suggest_ids);
		$suggest=new Partner('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestPartner']))
			$suggest->attributes=$_GET['SuggestPartner'];	

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
		$partner=Partner::model()->findByPk($id);
		$copy=$partner->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/partner/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'partner_update', array ('partner' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Partner']))
		{
			$model->attributes=$_POST['Partner'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/partner/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains partner
		$list_category=PartnerCategory::getList_nodes();
		
		//Handler list suggest partner
		$this->initCheckbox('checked-suggest-list','SuggestPartner',$model->list_current_suggest_ids);
		$suggest=new Partner('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestPartner']))
			$suggest->attributes=$_GET['SuggestPartner'];	

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
	 * Auto save a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAutoSave($id='')
	{
		if($id==''){
			$model=new Partner();
			if(isset($_POST['Partner']))
			{
				$model->attributes=$_POST['Partner'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/partner/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['Partner']))
			{
				$model->attributes=$_POST['Partner'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success'));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
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
	 * Performs the action with multi-selected partner from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-partner-list','Partner');
		$list_checked = Yii::app()->session["checked-partner-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'partner_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Partner::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-partner-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'partner_copy')) {
					foreach ( $list_checked as $id ) {
						$partner=Partner::model()->findByPk($id);
						$copy=$partner->copy();
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
					Yii::app ()->session ["checked-partner-list"] = array ();
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
		$this->initCheckbox('checked-partner-list','Partner');
		$model=new Partner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Partner']))
			$model->attributes=$_GET['Partner'];	
		//Group categories that contains partner
		$list_category=PartnerCategory::getList_nodes();
		$this->render('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of partner
	 * @param integer $id, the ID of partner to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$partner=Partner::model()->findByPk($id);
		$old_status=$partner->status;
		$partner->status=!$old_status;
		if($partner->save()) 
			echo json_encode(array('success'=>true,'src'=>$partner->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of partner
	 * @param integer $id, the ID of partner to be reversed
	 */
	public function actionReverseHome($id)
	{
		$partner=Partner::model()->findByPk($id);
		$old_home=$partner->home;
		$partner->home=!$old_home;
		if($partner->save()) 
			echo json_encode(array('success'=>true,'src'=>$partner->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of partner
	 * @param integer $id, the ID of partner to be reversed
	 */
	public function actionReverseNew($id)
	{
		$partner=Partner::model()->findByPk($id);
		$old_new=$partner->new;
		$partner->new=!$old_new;
		if($partner->save()) 
			echo json_encode(array('success'=>true,'src'=>$partner->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of partner.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Partner::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest partner
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestPartner');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Partner::model()->findByPk($id);
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
		$model=Partner::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'partner-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}