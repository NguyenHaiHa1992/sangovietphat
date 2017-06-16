<?php
/**
 * 
 * SupporterController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class SupporterController extends Controller
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
				'actions'=>array('copy'),
				'roles'=>array('supporter_copy'),
			),
			array('allow',  
				'actions'=>array('write'),
				'roles'=>array('supporter_write'),
			),
			array('allow',  
				'actions'=>array('updateForm'),
				'roles'=>array('supporter_updateForm'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('supporter_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('supporter_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('supporter_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('supporter_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('supporter_edit'),
			),
			array('deny', 
				'users'=>array('*'),
			),				
		);
	}
	
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$supporter=Supporter::model()->findByPk($id);
		$copy=$supporter->copy();
		if(isset($copy))
			$result['success']=true;
		else 
			$result['success']=false;
		echo json_encode($result);
		Yii::app()->end();
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionWrite()
	{
		if(isset($_GET['Supporter']['id']) && $_GET['Supporter']['id'] != ''){
			$model=$this->loadModel($_GET['Supporter']['id']);	
			if(isset($_GET['Supporter']))
			{
				$model->attributes=$_GET['Supporter'];
				if($model->save()){
					$result['success']=true;				
				}
				else{
					$result['success']=false;
					$result['errors']=$model->getErrors();
				}
			}
		}
		else{
			$model=new Supporter();
			if(isset($_GET['Supporter']))
			{
				$model->attributes=$_GET['Supporter'];
				if($model->save()){
					$result['success']=true;
				}
				else{
					$result['success']=false;
					$result['errors']=$model->getErrors();
				}
			}	
		}
		echo json_encode($result);
		Yii::app()->end();
	}
	
	/**
	 * Get update form
	 */
	public function actionUpdateForm($id)
	{
		$model=$this->loadModel($id);	
		$result['id']=$model->id;
		$result['name']=$model->name;
		$result['order_view']=$model->order_view;
		$result['skype']=$model->skype;
		$result['yahoo']=$model->yahoo;
		$result['title']=$model->title;
		$result['email']=$model->email;
		echo json_encode($result);
		Yii::app()->end();
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
	 * Performs the action with multi-selected supporter from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
			$this->initCheckbox('checked-supporter-list','Supporter');
		$list_checked = Yii::app()->session["checked-supporter-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'supporter_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Supporter::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa tư vấn viên thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-supporter-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa tư vấn viên';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'supporter_copy')) {
					foreach ( $list_checked as $id ) {
						$supporter=Supporter::model()->findByPk($id);
						$copy=$supporter->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']='Copy tư vấn viên thành công';
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-supporter-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']='Bạn không có quyền copy tư vấn viên';
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
		$this->initCheckbox('checked-supporter-list','Supporter');
		$model=new Supporter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supporter']))
			$model->attributes=$_GET['Supporter'];	
		$this->iPhoenixRender('index',array(
			'model'=>$model
		));
	}
	/**
	 * Reverse status of supporter
	 * @param integer $id, the ID of supporter to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$supporter=Supporter::model()->findByPk($id);
		$old_status=$supporter->status;
		$supporter->status=!$old_status;
		if($supporter->save()) 
			echo json_encode(array('success'=>true,'src'=>$supporter->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of supporter.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Supporter::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Supporter::model()->findByPk($id);
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
		$model=Supporter::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'supporter-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
