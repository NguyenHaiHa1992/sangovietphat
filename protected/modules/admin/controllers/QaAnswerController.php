<?php
/**
 * 
 * QaAnswerController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class QaAnswerController extends Controller
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
				'roles'=>array('qaAnswer_create'),
			),
			array('allow',  
				'actions'=>array('addAnswer'),
				'roles'=>array('qaAnswer_create'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('qaAnswer_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('qaAnswer_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('qaAnswer_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('qaAnswer_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('qaAnswer_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('qaAnswer_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('qaAnswer_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('qaAnswer_edit'),
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
		$model=new QaAnswer();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QaAnswer']))
		{
			$model->attributes=$_POST['QaAnswer'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/qaAnswer/update',array('id'=>$model->id)));
		}
		
		//Handler list suggest qaAnswer
		$this->initCheckbox('checked-suggest-list','SuggestQaAnswer',$model->list_current_suggest_ids);
		$suggest=new QaAnswer('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestQaAnswer']))
			$suggest->attributes=$_GET['SuggestQaAnswer'];	

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'suggest' => $suggest	
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$qaAnswer=QaAnswer::model()->findByPk($id);
		$copy=$qaAnswer->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/qaAnswer/update',array('id'=>$copy->id)));
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
		if (Yii::app ()->user->checkAccess ( 'qaAnswer_update', array ('qaAnswer' => $model ) )) {
			$this->performAjaxValidation($model);	
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
			if(isset($_POST['QaAnswer']))
			{
				$model->attributes=$_POST['QaAnswer'];
				if($model->save()){				
					$this->redirect(iPhoenixUrl::createUrl('admin/qaAnswer/update',array('id'=>$model->id)));
				}
			}

			$this->iPhoenixRender('update',array(
				'model'=>$model
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
	 * Performs the action with multi-selected qaAnswer from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-qaAnswer-list','QaAnswer');
		$list_checked = Yii::app()->session["checked-qaAnswer-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'qaAnswer_delete')) {
					foreach ( $list_checked as $id ) {
						$item = QaAnswer::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-qaAnswer-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'qaAnswer_copy')) {
					foreach ( $list_checked as $id ) {
						$qaAnswer=QaAnswer::model()->findByPk($id);
						$copy=$qaAnswer->copy();
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
					Yii::app ()->session ["checked-qaAnswer-list"] = array ();
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
		$this->initCheckbox('checked-qaAnswer-list','QaAnswer');
		$model=new QaAnswer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QaAnswer']))
			$model->attributes=$_GET['QaAnswer'];	
		//Group categories that contains qaAnswer
		//$list_category=QaAnswerCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			//'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of qaAnswer
	 * @param integer $id, the ID of qaAnswer to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$qaAnswer=QaAnswer::model()->findByPk($id);
		$old_status=$qaAnswer->status;
		$qaAnswer->status=!$old_status;
		if($qaAnswer->save()) 
			echo json_encode(array('success'=>true,'src'=>$qaAnswer->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of qaAnswer
	 * @param integer $id, the ID of qaAnswer to be reversed
	 */
	public function actionReverseHome($id)
	{
		$qaAnswer=QaAnswer::model()->findByPk($id);
		$old_home=$qaAnswer->home;
		$qaAnswer->home=!$old_home;
		if($qaAnswer->save()) 
			echo json_encode(array('success'=>true,'src'=>$qaAnswer->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of qaAnswer
	 * @param integer $id, the ID of qaAnswer to be reversed
	 */
	public function actionReverseNew($id)
	{
		$qaAnswer=QaAnswer::model()->findByPk($id);
		$old_new=$qaAnswer->new;
		$qaAnswer->new=!$old_new;
		if($qaAnswer->save()) 
			echo json_encode(array('success'=>true,'src'=>$qaAnswer->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of qaAnswer.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=QaAnswer::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest qaAnswer
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestQaAnswer');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = QaAnswer::model()->findByPk($id);
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
		$model=QaAnswer::model()->findByPk($id);
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
			if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'qaAnswer-list'){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}

	public function actionAddAnswer(){
		$answer = new QaAnswer();
		$answer->qa_id = $_POST['qa_id'];
		$answer->content = $_POST['content'];
		if($answer->save())
			echo true;
		else var_dump($answer->getErrors());
	}
}