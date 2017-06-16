<?php
/**
 * 
 * AlbumController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class AlbumController extends Controller
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
				'roles'=>array('album_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('album_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('album_update'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('album_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('album_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('album_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('album_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('album_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('album_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('album_suggestName'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('album_edit'),
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
		$model=new Album();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Album']))
		{
			$model->attributes=$_POST['Album'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/album/update',array('id'=>$model->id)));
		}
		//Group categories that contains album
		$list_category=AlbumCategory::getList_nodes();
		
		//Handler list suggest album
		$this->initCheckbox('checked-suggest-list','SuggestAlbum',$model->list_current_suggest_ids);
		$suggest=new Album('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestAlbum']))
			$suggest->attributes=$_GET['SuggestAlbum'];	

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
		$album=Album::model()->findByPk($id);
		$copy=$album->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/album/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'album_update', array ('album' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Album']))
		{
			$model->attributes=$_POST['Album'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/album/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains album
		$list_category=AlbumCategory::getList_nodes();

		//Handler list suggest album
		$this->initCheckbox('checked-suggest-list','SuggestAlbum',$model->list_current_suggest_ids);
		$suggest=new Album('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestAlbum']))
			$suggest->attributes=$_GET['SuggestAlbum'];	
		
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
	 * Performs the action with multi-selected album from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-album-list','Album');
		$list_checked = Yii::app()->session["checked-album-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'album_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Album::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa album thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-album-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa album';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'album_copy')) {
					foreach ( $list_checked as $id ) {
						$album=Album::model()->findByPk($id);
						$copy=$album->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']='Copy album thành công';
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-album-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']='Bạn không có quyền copy album';
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
		$this->initCheckbox('checked-album-list','Album');
		$model=new Album('search');
		$model->unsetAttributes();  
		if(isset($_GET['Album']))
			$model->attributes=$_GET['Album'];	
		//Group categories that contains album
		$list_category=AlbumCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of album
	 * @param integer $id, the ID of album to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$album=Album::model()->findByPk($id);
		$old_status=$album->status;
		$album->status=!$old_status;
		if($album->save()) 
			echo json_encode(array('success'=>true,'src'=>$album->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of album
	 * @param integer $id, the ID of album to be reversed
	 */
	public function actionReverseHome($id)
	{
		$album=Album::model()->findByPk($id);
		$old_home=$album->home;
		$album->home=!$old_home;
		if($album->save()) 
			echo json_encode(array('success'=>true,'src'=>$album->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of album
	 * @param integer $id, the ID of album to be reversed
	 */
	public function actionReverseNew($id)
	{
		$album=Album::model()->findByPk($id);
		$old_new=$album->new;
		$album->new=!$old_new;
		if($album->save()) 
			echo json_encode(array('success'=>true,'src'=>$album->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of album.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Album::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest album
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestAlbum');
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
		$model = Album::model()->findByPk($id);
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
		$model=Album::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'album-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
