<?php
/**
 * 
 * EmbeddedVideoController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class EmbeddedVideoController extends Controller
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
				'roles'=>array('embeddedVideo_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('embeddedVideo_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('embeddedVideo_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('embeddedVideo_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('embeddedVideo_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('embeddedVideo_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('embeddedVideo_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('embeddedVideo_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('embeddedVideo_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('embeddedVideo_suggestName'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('embeddedVideo_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('embeddedVideo_edit'),
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
		$model=new EmbeddedVideo();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmbeddedVideo']))
		{
			$model->attributes=$_POST['EmbeddedVideo'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/embeddedVideo/update',array('id'=>$model->id)));
		}
		//Group categories that contains embeddedVideo
		$list_category=EmbeddedVideoCategory::getList_nodes();
		
		//Handler list suggest embeddedVideo
		$this->initCheckbox('checked-suggest-list','SuggestEmbeddedVideo',$model->list_current_suggest_ids);
		$suggest=new EmbeddedVideo('search');
		$suggest->unsetAttributes(); 
		if(isset($_GET['SuggestEmbeddedVideo']))
			$suggest->attributes=$_GET['SuggestEmbeddedVideo'];	

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
		$embeddedVideo=EmbeddedVideo::model()->findByPk($id);
		$copy=$embeddedVideo->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/embeddedVideo/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'embeddedVideo_update', array ('embeddedVideo' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['EmbeddedVideo']))
		{
			$model->attributes=$_POST['EmbeddedVideo'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/embeddedVideo/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains embeddedVideo
		$list_category=EmbeddedVideoCategory::getList_nodes();
		
		//Handler list suggest embeddedVideo
		$this->initCheckbox('checked-suggest-list','SuggestEmbeddedVideo',$model->list_current_suggest_ids);
		$suggest=new EmbeddedVideo('search');
		$suggest->unsetAttributes(); 
		if(isset($_GET['SuggestEmbeddedVideo']))
			$suggest->attributes=$_GET['SuggestEmbeddedVideo'];	

		$this->iPhoenixRender('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest
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
	 * Performs the action with multi-selected embeddedVideo from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-embeddedVideo-list','EmbeddedVideo');
		$list_checked = Yii::app()->session["checked-embeddedVideo-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'embeddedVideo_delete')) {
					foreach ( $list_checked as $id ) {
						$item = EmbeddedVideo::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-embeddedVideo-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'embeddedVideo_copy')) {
					foreach ( $list_checked as $id ) {
						$embeddedVideo=EmbeddedVideo::model()->findByPk($id);
						$copy=$embeddedVideo->copy();
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
					Yii::app ()->session ["checked-embeddedVideo-list"] = array ();
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
		$this->initCheckbox('checked-embeddedVideo-list','EmbeddedVideo');
		$model=new EmbeddedVideo('search');
		$model->unsetAttributes();  
		if(isset($_GET['EmbeddedVideo']))
			$model->attributes=$_GET['EmbeddedVideo'];	
		//Group categories that contains embeddedVideo
		$list_category=EmbeddedVideoCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of embeddedVideo
	 * @param integer $id, the ID of embeddedVideo to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$embeddedVideo=EmbeddedVideo::model()->findByPk($id);
		$old_status=$embeddedVideo->status;
		$embeddedVideo->status=!$old_status;
		if($embeddedVideo->save()) 
			echo json_encode(array('success'=>true,'src'=>$embeddedVideo->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of embeddedVideo
	 * @param integer $id, the ID of embeddedVideo to be reversed
	 */
	public function actionReverseHome($id)
	{
		$embeddedVideo=EmbeddedVideo::model()->findByPk($id);
		$old_home=$embeddedVideo->home;
		$embeddedVideo->home=!$old_home;
		if($embeddedVideo->save()) 
			echo json_encode(array('success'=>true,'src'=>$embeddedVideo->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of embeddedVideo
	 * @param integer $id, the ID of embeddedVideo to be reversed
	 */
	public function actionReverseNew($id)
	{
		$embeddedVideo=EmbeddedVideo::model()->findByPk($id);
		$old_new=$embeddedVideo->new;
		$embeddedVideo->new=!$old_new;
		if($embeddedVideo->save()) 
			echo json_encode(array('success'=>true,'src'=>$embeddedVideo->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of embeddedVideo.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=EmbeddedVideo::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest embeddedVideo
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestEmbeddedVideo');
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
		$model = EmbeddedVideo::model()->findByPk($id);
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
		$model=EmbeddedVideo::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'embeddedVideo-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}

