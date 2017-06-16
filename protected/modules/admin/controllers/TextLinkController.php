<?php
/**
 * 
 * TextLinkController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class TextLinkController extends Controller
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
				'roles'=>array('textlink_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('textlink_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('textlink_update'),
			),
			array('allow', 
				'actions'=>array('autoSave'),
				'roles'=>array('textlink_autoSave'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('textlink_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('textlink_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('textlink_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('textlink_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('textlink_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('textlink_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('textlink_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('textlink_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('textlink_edit'),
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
		$model=new TextLink();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TextLink']))
		{
			$model->attributes=$_POST['TextLink'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/textlink/update',array('id'=>$model->id)));
		}
		//Group categories that contains textlink
		$list_category=TextLinkCategory::getList_nodes();
		
		//Handler list suggest textlink
		$this->initCheckbox('checked-suggest-list','SuggestTextLink',$model->list_current_suggest_ids);
		$suggest=new TextLink('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestTextLink']))
			$suggest->attributes=$_GET['SuggestTextLink'];	

		$this->iPhoenixRender('create',array(
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
		$textlink=TextLink::model()->findByPk($id);
		$copy=$textlink->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/textlink/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'textlink_update', array ('textlink' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['TextLink']))
		{
			$model->attributes=$_POST['TextLink'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/textlink/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains textlink
		$list_category=TextLinkCategory::getList_nodes();
		
		//Handler list suggest textlink
		$this->initCheckbox('checked-suggest-list','SuggestTextLink',$model->list_current_suggest_ids);
		$suggest=new TextLink('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestTextLink']))
			$suggest->attributes=$_GET['SuggestTextLink'];	

		$this->iPhoenixRender('update',array(
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
			$model=new TextLink();
			if(isset($_POST['TextLink']))
			{
				$model->attributes=$_POST['TextLink'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/textlink/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['TextLink']))
			{
				$model->attributes=$_POST['TextLink'];
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
	 * Performs the action with multi-selected textlink from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-textlink-list','TextLink');
		$list_checked = Yii::app()->session["checked-textlink-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'textlink_delete')) {
					foreach ( $list_checked as $id ) {
						$item = TextLink::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-textlink-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'textlink_copy')) {
					foreach ( $list_checked as $id ) {
						$textlink=TextLink::model()->findByPk($id);
						$copy=$textlink->copy();
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
					Yii::app ()->session ["checked-textlink-list"] = array ();
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
		$this->initCheckbox('checked-textlink-list','TextLink');
		$model=new TextLink('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TextLink']))
			$model->attributes=$_GET['TextLink'];	
		//Group categories that contains textlink
		$list_category=TextLinkCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of textlink
	 * @param integer $id, the ID of textlink to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$textlink=TextLink::model()->findByPk($id);
		$old_status=$textlink->status;
		$textlink->status=!$old_status;
		if($textlink->save()) 
			echo json_encode(array('success'=>true,'src'=>$textlink->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of textlink
	 * @param integer $id, the ID of textlink to be reversed
	 */
	public function actionReverseHome($id)
	{
		$textlink=TextLink::model()->findByPk($id);
		$old_home=$textlink->home;
		$textlink->home=!$old_home;
		if($textlink->save()) 
			echo json_encode(array('success'=>true,'src'=>$textlink->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of textlink
	 * @param integer $id, the ID of textlink to be reversed
	 */
	public function actionReverseNew($id)
	{
		$textlink=TextLink::model()->findByPk($id);
		$old_new=$textlink->new;
		$textlink->new=!$old_new;
		if($textlink->save()) 
			echo json_encode(array('success'=>true,'src'=>$textlink->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of textlink.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=TextLink::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest textlink
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestTextLink');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = TextLink::model()->findByPk($id);
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
		$model=TextLink::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'textlink-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}