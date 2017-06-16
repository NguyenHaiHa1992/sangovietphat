<?php
/**
 * 
 * DocumentController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class DocumentController extends Controller
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
				'roles'=>array('document_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('document_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('document_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('document_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('document_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('document_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('document_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('document_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('document_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('document_suggestName'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('document_edit'),
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
		$model=new Document();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/document/update',array('id'=>$model->id)));
		}
		//Group categories that contains document
		$list_category=DocumentCategory::getList_nodes();
		
		//Handler list suggest document
		$this->initCheckbox('checked-suggest-list','SuggestDocument',$model->list_current_suggest_ids);
		$suggest=new Document('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestDocument']))
			$suggest->attributes=$_GET['SuggestDocument'];	

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest		
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$document=Document::model()->findByPk($id);
		$copy=$document->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/document/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'document_update', array ('document' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/document/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains document
		$list_category=DocumentCategory::getList_nodes();

		//Handler list suggest document
		$this->initCheckbox('checked-suggest-list','SuggestDocument',$model->list_current_suggest_ids);
		$suggest=new Document('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestDocument']))
			$suggest->attributes=$_GET['SuggestDocument'];	
		
		$this->iPhoenixRender('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest
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
	 * Performs the action with multi-selected document from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-document-list','Document');
		$list_checked = Yii::app()->session["checked-document-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'document_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Document::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa document thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-document-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa document';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'document_copy')) {
					foreach ( $list_checked as $id ) {
						$document=Document::model()->findByPk($id);
						$copy=$document->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']='Copy document thành công';
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-document-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']='Bạn không có quyền copy document';
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
		$this->initCheckbox('checked-document-list','Document');
		$model=new Document('search');
		$model->unsetAttributes();  
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];	
		//Group categories that contains document
		$list_category=DocumentCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of document
	 * @param integer $id, the ID of document to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$document=Document::model()->findByPk($id);
		$old_status=$document->status;
		$document->status=!$old_status;
		if($document->save()) 
			echo json_encode(array('success'=>true,'src'=>$document->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of document
	 * @param integer $id, the ID of document to be reversed
	 */
	public function actionReverseHome($id)
	{
		$document=Document::model()->findByPk($id);
		$old_home=$document->home;
		$document->home=!$old_home;
		if($document->save()) 
			echo json_encode(array('success'=>true,'src'=>$document->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of document
	 * @param integer $id, the ID of document to be reversed
	 */
	public function actionReverseNew($id)
	{
		$document=Document::model()->findByPk($id);
		$old_new=$document->new;
		$document->new=!$old_new;
		if($document->save()) 
			echo json_encode(array('success'=>true,'src'=>$document->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of document.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Document::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest document
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestDocument');
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
				$list_new = array_diff ( explode ( ',', $_POST [$class] ['list-checked'] ), array ('' ) );
				$list_old = Yii::app ()->session [$name_params];
				$list = $list_old;
				foreach ( $list_new as $id ) {
					if (! in_array ( $id, $list_old ))
						$list [] = $id;
				}
				Yii::app ()->session [$name_params] = $list;
			}
			if (isset ( $_POST [$class] ['list-unchecked'] )) {
				$list_unchecked = array_diff ( explode ( ',', $_POST [$class] ['list-unchecked'] ), array ('' ) );
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
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Document::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'document-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
