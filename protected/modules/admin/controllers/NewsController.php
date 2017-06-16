<?php
/**
 * 
 * NewsController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class NewsController extends Controller
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
				'roles'=>array('news_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('news_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('news_update'),
			),
			array('allow', 
				'actions'=>array('autoSave'),
				'roles'=>array('news_autoSave'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('news_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('news_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('news_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('news_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('news_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('news_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('news_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('news_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('news_edit'),
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
		$model=new News();
		// Ajax validate
		$this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/news/update',array('id'=>$model->id)));
		}
		//Group categories that contains news
		$list_category=NewsCategory::getList_nodes();
		
		//Handler list suggest news
		$this->initCheckbox('checked-suggest-list','SuggestNews',$model->list_current_suggest_ids);
		$suggest=new News('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestNews']))
			$suggest->attributes=$_GET['SuggestNews'];	

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
		$news=News::model()->findByPk($id);
		$copy=$news->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/news/update',array('id'=>$copy->id)));
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
		if (Yii::app ()->user->checkAccess ( 'news_update', array ('news' => $model ) )) {
			$this->performAjaxValidation($model);
			if(isset($_POST['News']))
			{
				$model->attributes=$_POST['News'];
				if($model->save()){				
					$this->redirect(iPhoenixUrl::createUrl('admin/news/update',array('id'=>$model->id)));
				}
			}
			//Group categories that contains news
			$list_category=NewsCategory::getList_nodes();
			
			//Handler list suggest news
			$this->initCheckbox('checked-suggest-list','SuggestNews',$model->list_current_suggest_ids);
			$suggest=new News('search');
			$suggest->unsetAttributes();  
			if(isset($_GET['SuggestNews']))
				$suggest->attributes=$_GET['SuggestNews'];
	
			$this->iPhoenixRender('update',array(
				'model'=>$model,
				'list_category'=>$list_category,
				'suggest' => $suggest
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
			$model=new News();
			if(isset($_POST['News']))
			{
				$model->attributes=$_POST['News'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/news/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['News']))
			{
				$model->attributes=$_POST['News'];
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
	 * Performs the action with multi-selected news from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-news-list','News');
		$list_checked = Yii::app()->session["checked-news-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'news_delete')) {
					foreach ( $list_checked as $id ) {
						$item = News::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-news-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'news_copy')) {
					foreach ( $list_checked as $id ) {
						$news=News::model()->findByPk($id);
						$copy=$news->copy();
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
					Yii::app ()->session ["checked-news-list"] = array ();
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
		$this->initCheckbox('checked-news-list','News');
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];	
		//Group categories that contains news
		$list_category=NewsCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of news
	 * @param integer $id, the ID of news to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$news=News::model()->findByPk($id);
		$old_status=$news->status;
		$news->status=!$old_status;
		if($news->save()) 
			echo json_encode(array('success'=>true,'src'=>$news->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status home of news
	 * @param integer $id, the ID of news to be reversed
	 */
	public function actionReverseHome($id)
	{
		$news=News::model()->findByPk($id);
		$old_home=$news->home;
		$news->home=!$old_home;
		if($news->save()) 
			echo json_encode(array('success'=>true,'src'=>$news->imageHome));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status new of news
	 * @param integer $id, the ID of news to be reversed
	 */
	public function actionReverseNew($id)
	{
		$news=News::model()->findByPk($id);
		$old_new=$news->new;
		$news->new=!$old_new;
		if($news->save()) 
			echo json_encode(array('success'=>true,'src'=>$news->imageNew));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Suggests title of news.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=News::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest news
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestNews');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = News::model()->findByPk($id);
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
		$model=News::model()->findByPk($id);
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
		if(Yii::app()->getRequest()->getIsAjaxRequest() && !isset($_SERVER['HTTP_X_PJAX']))
		{
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'news-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}