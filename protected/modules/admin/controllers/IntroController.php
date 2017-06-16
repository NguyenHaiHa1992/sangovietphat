<?php
/**
 * 
 * IntroController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class IntroController extends Controller
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
				'roles'=>array('intro_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('intro_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('intro_update'),
			),
			array('allow', 
				'actions'=>array('autoSave'),
				'roles'=>array('intro_autoSave'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('intro_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('intro_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('intro_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('intro_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('intro_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('intro_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('intro_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('intro_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('updateSuggestVideo'),
				'roles'=>array('intro_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('intro_edit'),
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
		$model=new Intro();
		// Ajax validate
		$this->performAjaxValidation($model);

		if(isset($_POST['Intro']))
		{
			$model->attributes=$_POST['Intro'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/intro/update',array('id'=>$model->id)));
		}
		//Group categories that contains intro
		$list_category=IntroCategory::getList_nodes();
		
		//Handler list suggest intro
		$this->initCheckbox('checked-suggest-list','SuggestIntro',$model->list_current_suggest_ids);
		$suggest=new Intro('search');
		$suggest->unsetAttributes();
		if(isset($_GET['SuggestIntro']))
			$suggest->attributes=$_GET['SuggestIntro'];	

		//Group categories that contains product
		$list_category_video=VideoCategory::getList_nodes();
		//Handler list suggest product
		$this->initCheckbox('checked-video-list','SuggestVideo',$model->list_current_suggest_video);
		$video=new Video('search');
		$video->unsetAttributes();  
		if(isset($_GET['SuggestVideo']))
			$video->attributes=$_GET['SuggestVideo'];

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest' => $suggest,
			'list_category_video'=>$list_category_video,
			'video'=>$video
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$intro=Intro::model()->findByPk($id);
		$copy=$intro->copy();
		if(isset($copy))
		{
			$this->redirect(iPhoenixUrl::createUrl('admin/intro/update',array('id'=>$copy->id)));
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
		if (Yii::app ()->user->checkAccess ( 'intro_update', array ('intro' => $model ) )) {
			$this->performAjaxValidation($model);
	
			if(isset($_POST['Intro']))
			{
				$model->attributes=$_POST['Intro'];

				if($model->save()){
					$this->redirect(iPhoenixUrl::createUrl('admin/intro/update',array('id'=>$model->id)));
				}
			}
			//Group categories that contains intro
			$list_category=IntroCategory::getList_nodes();
			
			//Handler list suggest intro
			$this->initCheckbox('checked-suggest-list','SuggestIntro',$model->list_current_suggest_ids);
			$suggest=new Intro('search');
			$suggest->unsetAttributes();  
			if(isset($_GET['SuggestIntro']))
				$suggest->attributes=$_GET['SuggestIntro'];	
	
			//Group categories that contains product
			$list_category_video=VideoCategory::getList_nodes();
			//Handler list suggest product
			$this->initCheckbox('checked-video-list','SuggestVideo',$model->list_current_suggest_video);
			$video=new Video('search');
			$video->unsetAttributes();  
			if(isset($_GET['SuggestVideo']))
				$video->attributes=$_GET['SuggestVideo'];
	
			$this->iPhoenixRender('update',array(
				'model'=>$model,
				'list_category'=>$list_category,
				'suggest' => $suggest,
				'list_category_video'=>$list_category_video,
				'video'=>$video
			));
		}	
		else
			throw new CHttpException(400,iPhoenixLang::admin_t('You do not have authorization to perform this action','main'));	
	}

	/**
	 * Auto save a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAutoSave($id='')
	{
		if($id==''){
			$model=new Intro();
			if(isset($_POST['Intro']))
			{
				$model->attributes=$_POST['Intro'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/intro/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['Intro']))
			{
				$model->attributes=$_POST['Intro'];
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
			throw new CHttpException(400,iPhoenixLang::admin_t('Invalid request. Please do not repeat this request again','main'));
	}

	/**
	 * Performs the action with multi-selected intro from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-intro-list','Intro');
		$list_checked = Yii::app()->session["checked-intro-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'intro_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Intro::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-intro-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'intro_copy')) {
					foreach ( $list_checked as $id ) {
						$intro=Intro::model()->findByPk($id);
						$copy=$intro->copy();
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
					Yii::app ()->session ["checked-intro-list"] = array ();
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
		$this->initCheckbox('checked-intro-list','Intro');
		$model=new Intro('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Intro']))
			$model->attributes=$_GET['Intro'];	
		//Group categories that contains intro
		$list_category=IntroCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of intro
	 * @param integer $id, the ID of intro to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$intro=Intro::model()->findByPk($id);
		$old_status=$intro->status;
		$intro->status=!$old_status;
		if($intro->save()) 
			echo json_encode(array('success'=>true,'src'=>$intro->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status home of intro
	 * @param integer $id, the ID of intro to be reversed
	 */
	public function actionReverseHome($id)
	{
		$intro=Intro::model()->findByPk($id);
		$old_home=$intro->home;
		$intro->home=!$old_home;
		if($intro->save()) 
			echo json_encode(array('success'=>true,'src'=>$intro->imageHome));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status new of intro
	 * @param integer $id, the ID of intro to be reversed
	 */
	public function actionReverseNew($id)
	{
		$intro=Intro::model()->findByPk($id);
		$old_new=$intro->new;
		$intro->new=!$old_new;
		if($intro->save()) 
			echo json_encode(array('success'=>true,'src'=>$intro->imageNew));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Suggests title of intro.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Intro::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest intro
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestIntro');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}

	/*
	 * Update suggest intro
	 */
	public function actionUpdateSuggestVideo()
	{
		$this->initCheckbox('checked-video-list','SuggestVideo');
		$list_checked = Yii::app()->session["checked-video-list"];
		echo implode(',',$list_checked);
	}

	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Intro::model()->findByPk($id);
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
		$model=Intro::model()->findByPk($id);
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
			if( !isset($_GET['ajax'] )  || ($_GET['ajax'] != 'intro-list' && $_GET['ajax'] != 'video-list')){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}
}