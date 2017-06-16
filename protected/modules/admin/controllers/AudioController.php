<?php
/**
 * 
 * AudioController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class AudioController extends Controller
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
				'roles'=>array('audio_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('audio_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('audio_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('audio_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('audio_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('audio_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('audio_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('audio_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('audio_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('audio_suggestName'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('audio_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('audio_edit'),
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
		$model=new Audio();
		// Ajax validate
		$this->performAjaxValidation($model);

		if(isset($_POST['Audio']))
		{
			$model->attributes=$_POST['Audio'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/audio/update',array('id'=>$model->id)));
		}
		//Group categories that contains audio
		$list_category=AudioCategory::getList_nodes();
		
		//Handler list suggest audio
		$this->initCheckbox('checked-suggest-list','SuggestAudio',$model->list_current_suggest_ids);
		$suggest=new Audio('search');
		$suggest->unsetAttributes(); 
		if(isset($_GET['SuggestAudio']))
			$suggest->attributes=$_GET['SuggestAudio'];

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'list_category'=>$list_category,		
			'suggest'=>$suggest,
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$audio=Audio::model()->findByPk($id);
		$copy=$audio->copy();
		if(isset($copy))
		{
			$this->redirect(iPhoenixUrl::createUrl('admin/audio/update',array('id'=>$copy->id)));
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
		if (Yii::app ()->user->checkAccess ( 'audio_update', array ('audio' => $model ) )) {
		$this->performAjaxValidation($model);	

		if(isset($_POST['Audio']))
		{
			$model->attributes=$_POST['Audio'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/audio/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains audio
		$list_category=AudioCategory::getList_nodes();
		
		//Handler list suggest audio
		$this->initCheckbox('checked-suggest-list','SuggestAudio',$model->list_current_suggest_ids);
		$suggest=new Audio('search');
		$suggest->unsetAttributes(); 
		if(isset($_GET['SuggestAudio']))
			$suggest->attributes=$_GET['SuggestAudio'];

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
	 * Performs the action with multi-selected audio from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-audio-list','Audio');
		$list_checked = Yii::app()->session["checked-audio-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'audio_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Audio::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-audio-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'audio_copy')) {
					foreach ( $list_checked as $id ) {
						$audio=Audio::model()->findByPk($id);
						$copy=$audio->copy();
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
					Yii::app ()->session ["checked-audio-list"] = array ();
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
		$this->initCheckbox('checked-audio-list','Audio');
		$model=new Audio('search');
		$model->unsetAttributes();  
		if(isset($_GET['Audio']))
			$model->attributes=$_GET['Audio'];	
		//Group categories that contains audio
		$list_category=AudioCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of audio
	 * @param integer $id, the ID of audio to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$audio=Audio::model()->findByPk($id);
		$old_status=$audio->status;
		$audio->status=!$old_status;
		if($audio->save()) 
			echo json_encode(array('success'=>true,'src'=>$audio->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status home of audio
	 * @param integer $id, the ID of audio to be reversed
	 */
	public function actionReverseHome($id)
	{
		$audio=Audio::model()->findByPk($id);
		$old_home=$audio->home;
		$audio->home=!$old_home;
		if($audio->save()) 
			echo json_encode(array('success'=>true,'src'=>$audio->imageHome));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status new of audio
	 * @param integer $id, the ID of audio to be reversed
	 */
	public function actionReverseNew($id)
	{
		$audio=Audio::model()->findByPk($id);
		$old_new=$audio->new;
		$audio->new=!$old_new;
		if($audio->save()) 
			echo json_encode(array('success'=>true,'src'=>$audio->imageNew));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Suggests title of audio.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Audio::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest audio
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestAudio');
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
		$model = Audio::model()->findByPk($id);
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
		$model=Audio::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'audio-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
