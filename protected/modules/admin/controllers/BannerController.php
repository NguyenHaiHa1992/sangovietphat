<?php
/**
 * 
 * BannerController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class BannerController extends Controller
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
				'roles'=>array('banner_copy'),
			),
			array('allow', 
				'actions'=>array('write'),
				'roles'=>array('banner_write'),
			),
			array('allow',  
				'actions'=>array('updateForm'),
				'roles'=>array('banner_updateForm'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('banner_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('banner_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('banner_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('banner_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('banner_suggestName'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('banner_edit'),
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
		$banner=Banner::model()->findByPk($id);
		$copy=$banner->copy();
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
		if(isset($_POST['Banner']['id']) && $_POST['Banner']['id'] != ''){
			$model=$this->loadModel($_POST['Banner']['id']);
			if(isset($_POST['Banner']))
			{
				$model->attributes=$_POST['Banner'];
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
			$model=new Banner();
			if(isset($_POST['Banner']))
			{
				$model->attributes=$_POST['Banner'];
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
		$result['cat']=$model->cat;
		$result['name']=$model->name;
		$result['order_view']=$model->order_view;
		$result['slogan']=$model->slogan;
		$result['url']=$model->url;
		$result['description']=$model->description;
		$image=$model->image;
		$result['image']=array(
			'id'=>$image->id,
			'url'=>$image->getAbsoluteThumbUrl(120,60),
			'link_update'=>Yii::app()->createUrl('admin/image/updateInfo',array('id'=>$image->id))
			);
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
			throw new CHttpException(400,iPhoenixLang::admin_t('Invalid request. Please do not repeat this request again','main'));
	}

	/**
	 * Performs the action with multi-selected banner from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-banner-list','Banner');
		$list_checked = Yii::app()->session["checked-banner-list"];
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'banner_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Banner::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-banner-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'banner_copy')) {
					foreach ( $list_checked as $id ) {
						$banner=Banner::model()->findByPk($id);
						$copy=$banner->copy();
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
					Yii::app ()->session ["checked-banner-list"] = array ();
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
		$this->initCheckbox('checked-banner-list','Banner');
		$model=new Banner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];	
		$this->iPhoenixRender('index',array(
			'model'=>$model
		));
	}
	/**
	 * Reverse status of banner
	 * @param integer $id, the ID of banner to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$banner=Banner::model()->findByPk($id);
		$old_status=$banner->status;
		$banner->status=!$old_status;
		if($banner->save()) 
			echo json_encode(array('success'=>true,'src'=>$banner->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Suggests title of banner.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Banner::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Banner::model()->findByPk($id);
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
		$model=Banner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,iPhoenixLang::admin_t('The requested page does not exist','main'));
		return $model;
	}
}