<?php
/**
 * 
 * shareController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class ShareController extends Controller
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
				'roles'=>array('share_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('share_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('share_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('share_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('share_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('share_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('share_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('share_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('share_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('share_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('share_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('share_edit'),
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
		$model=new Share();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Share']))
		{
			$model->attributes=$_POST['Share'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/share/update',array('id'=>$model->id)));
		}
		//Group categories that contains share
		//$list_category=ShareCategory::getList_nodes();
		
		//Handler list suggest share
		$this->initCheckbox('checked-suggest-list','SuggestShare',$model->list_current_suggest_ids);
		$suggest=new Share('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestShare']))
			$suggest->attributes=$_GET['SuggestShare'];	

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			//'list_category'=>$list_category,	
			'suggest' => $suggest	
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$share=Share::model()->findByPk($id);
		$copy=$share->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/share/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'share_update', array ('share' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Share']))
		{
			$model->attributes=$_POST['Share'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/share/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains share
		//$list_category=ShareCategory::getList_nodes();
		
		//Handler list suggest share
		$this->initCheckbox('checked-suggest-list','SuggestShare',$model->list_current_suggest_ids);
		$suggest=new Share('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestShare']))
			$suggest->attributes=$_GET['SuggestShare'];	

		$this->iPhoenixRender('update',array(
			'model'=>$model,
			//'list_category'=>$list_category,
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
	 * Performs the action with multi-selected share from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-share-list','share');
		$list_checked = Yii::app()->session["checked-share-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'share_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Share::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-share-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'share_copy')) {
					foreach ( $list_checked as $id ) {
						$share=Share::model()->findByPk($id);
						$copy=$share->copy();
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
					Yii::app ()->session ["checked-share-list"] = array ();
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
		$this->initCheckbox('checked-share-list','share');
		$model=new Share('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Share']))
			$model->attributes=$_GET['Share'];	
		//Group categories that contains share
		//$list_category=ShareCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			//'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of share
	 * @param integer $id, the ID of share to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$share=Share::model()->findByPk($id);
		$old_status=$share->status;
		$share->status=!$old_status;
		if($share->save()) 
			echo json_encode(array('success'=>true,'src'=>$share->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of share
	 * @param integer $id, the ID of share to be reversed
	 */
	public function actionReverseHome($id)
	{
		$share=Share::model()->findByPk($id);
		$old_home=$share->home;
		$share->home=!$old_home;
		if($share->save()) 
			echo json_encode(array('success'=>true,'src'=>$share->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of share
	 * @param integer $id, the ID of share to be reversed
	 */
	public function actionReverseNew($id)
	{
		$share=Share::model()->findByPk($id);
		$old_new=$share->new;
		$share->new=!$old_new;
		if($share->save()) 
			echo json_encode(array('success'=>true,'src'=>$share->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of share.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Share::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest share
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestShare');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Share::model()->findByPk($id);
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
		$model=Share::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'share-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}