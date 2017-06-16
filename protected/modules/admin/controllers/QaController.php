<?php
/**
 * 
 * QaController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class QaController extends Controller
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
				'roles'=>array('qa_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('qa_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('qa_update'),
			),
			array('allow', 
				'actions'=>array('updateAll'),
				'roles'=>array('qa_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('qa_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('qa_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('qa_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('qa_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('qa_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('qa_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('qa_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('qa_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('qa_edit'),
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
		$model=new Qa();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Qa']))
		{
			$model->attributes=$_POST['Qa'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/qa/update',array('id'=>$model->id)));
		}

		// List all products
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$list = Product::model()->findAll($criteria);
		$list_product = array(''=>'Không chọn');
		foreach($list as $product){
			$list_product[$product->id] = $product->name; 
		}
		
		//Handler list suggest qa
		$this->initCheckbox('checked-suggest-list','SuggestQa',$model->list_current_suggest_ids);
		$suggest=new Qa('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestQa']))
			$suggest->attributes=$_GET['SuggestQa'];	

		$this->iPhoenixRender('create',array(
			'model'=>$model,
			'list_product'=>$list_product,	
			'suggest' => $suggest	
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$qa=Qa::model()->findByPk($id);
		$copy=$qa->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/qa/update',array('id'=>$copy->id)));
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
		if (Yii::app ()->user->checkAccess ( 'qa_update', array ('qa' => $model ) )) {
			$this->performAjaxValidation($model);	

			if(isset($_POST['Qa']))
			{
				$model->attributes=$_POST['Qa'];
				if($model->save()){				
					$this->redirect(iPhoenixUrl::createUrl('admin/qa/update',array('id'=>$model->id)));
				}
			}
	
			// List all products
			$criteria = new CDbcriteria();
			$criteria->compare('status', true);
			$list = Product::model()->findAll($criteria);
			$list_product = array(''=>'Không chọn');
			foreach($list as $product){
				$list_product[$product->id] = $product->name; 
			}
	
			// List all answers
			$list_qa_answer = new QaAnswer('search');
			$list_qa_answer->qa_id = $id;
	
			//Handler list suggest qa
			$this->initCheckbox('checked-suggest-list','SuggestQa',$model->list_current_suggest_ids);
			$suggest=new Qa('search');
			$suggest->unsetAttributes();  
			if(isset($_GET['SuggestQa']))
				$suggest->attributes=$_GET['SuggestQa'];

			$this->iPhoenixRender('update',array(
				'model'=>$model,
				'list_product'=>$list_product,	
				'suggest' => $suggest,
				'list_qa_answer'=>$list_qa_answer
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
	 * Performs the action with multi-selected qa from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-qa-list','Qa');
		$list_checked = Yii::app()->session["checked-qa-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'qa_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Qa::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-qa-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'qa_copy')) {
					foreach ( $list_checked as $id ) {
						$qa=Qa::model()->findByPk($id);
						$copy=$qa->copy();
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
					Yii::app ()->session ["checked-qa-list"] = array ();
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
		$this->initCheckbox('checked-qa-list','Qa');
		$model=new Qa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Qa']))
			$model->attributes=$_GET['Qa'];	
		//Group categories that contains qa
		//$list_category=QaCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			//'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of qa
	 * @param integer $id, the ID of qa to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$qa=Qa::model()->findByPk($id);
		$old_status=$qa->status;
		$qa->status=!$old_status;
		if($qa->save()) 
			echo json_encode(array('success'=>true,'src'=>$qa->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of qa
	 * @param integer $id, the ID of qa to be reversed
	 */
	public function actionReverseHome($id)
	{
		$qa=Qa::model()->findByPk($id);
		$old_home=$qa->home;
		$qa->home=!$old_home;
		if($qa->save()) 
			echo json_encode(array('success'=>true,'src'=>$qa->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of qa
	 * @param integer $id, the ID of qa to be reversed
	 */
	public function actionReverseNew($id)
	{
		$qa=Qa::model()->findByPk($id);
		$old_new=$qa->new;
		$qa->new=!$old_new;
		if($qa->save()) 
			echo json_encode(array('success'=>true,'src'=>$qa->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of qa.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Qa::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest qa
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestQa');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Qa::model()->findByPk($id);
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
		$model=Qa::model()->findByPk($id);
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
			if( !isset($_GET['ajax'] )  || ($_GET['ajax'] != 'qa-list' && $_GET['ajax'] != 'qa-answer-list')){
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}
	}

	public function _actionUpdateAll(){
		$list = Qa::model()->findAll();
		foreach($list as $news){
			if($news->meta_title == '') $news->meta_title = $news->title;
			if($news->meta_keyword == '') $news->meta_keyword = $news->title;
			if($news->meta_description == '') $news->meta_description = $news->title;
			if($news->name == '') $news->name = 'Không tên';
			if($news->email == '') $news->email = 'Không email';
			$news->created_time = strtotime($news->Date);
			if(!$news->save()) var_dump($news->getErrors());
		}
	}
}