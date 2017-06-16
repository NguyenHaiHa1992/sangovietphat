<?php
/**
 * 
 * ImageController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * ImageController includes actions relevant to Image:
 *** upload image
 *** delete image
 *** update image
 *** list image
 *** clear image
 *** reverse model's status
 *** suggest model's title
 *** load model from id  
 */
class ImageController extends Controller
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
				'actions'=>array('upload'),
				'roles'=>array('image_upload'),
			),
			array('allow',  
				'actions'=>array('update'),
				'roles'=>array('image_update'),
			),
			array('allow',  
				'actions'=>array('updateInfo'),
				'roles'=>array('image_updateInfo'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('image_delete'),
			),
			array('allow',  
				'actions'=>array('create'),
				'roles'=>array('image_create'),
			),
			array('allow',  
				'actions'=>array('update'),
				'roles'=>array('image_update'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('image_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('image_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('image_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('image_suggestName'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('image_edit'),
			),
			array('deny', 
				'users'=>array('*'),
			),	
		);
	}

	/**
	 * 
	 * upload image into server
	 */
	public function actionUpload()
	{
	
		Yii::import("ext.EAjaxUpload.qqFileUploader");
		//Create folder year/month/day
		$folder=File::createDir('data/upload/image');
        $allowedExtensions = Image::$allowedExtensions;//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = Image::$sizeLimit;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $tmp = $uploader->handleUpload($folder);
		$w=isset($_GET['w'])?$_GET['w']:'100';
		$h=isset($_GET['h'])?$_GET['h']:'100';
		if(isset($tmp['id'])){
			$file_id=$tmp['id'];
			$image=Image::create($file_id);
			$result=array(
				'success'=>true,
				'id'=>$image->id,
				'url'=>$image->getAbsoluteThumbUrl($w,$h),
				'link_update'=>Yii::app()->createUrl('admin/image/updateInfo',array('id'=>$image->id))
				);
		}
		else{
        	$result=$tmp;// it's array
        }
		echo json_encode($result);
	}
	
	/**
	 * 
	 * delete model
	 * @param integer $id the ID of model to be deleted
	 */
	public function actionDelete($id)
	{
			if($this->loadModel($id)->delete()) 
				echo '{"status":true,"id":'.$id.'}';
			else 
				echo '{"status":false}';
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateInfo($id) {
			$model = $this->loadModel ( $id );	
			if (isset ( $_GET ['Image'] )) {
				$model->attributes = $_GET ['Image'];
				if (!$model->save ())
					var_dump($model->getErrors());
			}		
			$this->renderPartial('_update', array ('model' => $model) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Image();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model		
		));
	}
	/**
	 * Copy a new model
	 * @param integer $id the ID of model to be copied
	 */
	public function actionCopy($id)
	{
		$image=Image::model()->findByPk($id);
		$copy=$image->copy();
		if(isset($copy))
		{
				$this->redirect(array('update','id'=>$copy->id));
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
		//if (Yii::app ()->user->checkAccess ( 'image_update', array ('image' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			if($model->save()){				
				$this->redirect(array('update','id'=>$model->id));
			}
		}
		//Group categories that contains image
		// $criteria=new CDbCriteria();
		// $criteria->order='cat_id';
		// $list_album=Album::model()->findAll($criteria);
		
		// get news 
		$news = News::model()->findByPk($model->parent_id);
		
	
		$this->render('update',array(
			'model'=>$model,
			'news'=>$news,
			// 'list_album'=>$list_album,
		));	
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');	
	}

	/**
	 * Performs the action with multi-selected image from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-image-list');
		$list_checked = Yii::app()->session["checked-image-list"];
		switch ($action) {
			case 'delete' :
				//if (Yii::app ()->user->checkAccess ( 'image_delete')) {
				if (true) {
					foreach ( $list_checked as $id ) {
						$item = Image::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if (! $item->delete ()) {
								echo 'false';
								Yii::app ()->end ();
							}
					}
					Yii::app ()->session ["checked-image-list"] = array ();
				} else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
			case 'copy' :
				//if (Yii::app ()->user->checkAccess ( 'image_copy')) {
				if (true) {
				foreach ( $list_checked as $id ) {
					$image=Image::model()->findByPk($id);
					$copy=$image->copy();
					if(!isset($copy))
					{
						echo 'false';
						Yii::app ()->end ();
					}
				}
				Yii::app ()->session ["checked-image-list"] = array ();
				}
				else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
		}
		echo 'true';
		Yii::app()->end();
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$this->initCheckbox('checked-image-list');
		$model=new Image('search');
		$model->unsetAttributes();  
		if(isset($_GET['Image']))
			$model->attributes=$_GET['Image'];	
		//Group categories that contains image
		// $criteria=new CDbCriteria();
		// $criteria->order='cat_id';
		// $list_album=Album::model()->findAll($criteria);
		
		// get list news
		$list_news = array(); 
		$list_news[''] = 'Tất cả';
		$temp = News::listIntro();
		foreach ($temp as $t) {
			$list_news[$t->id] = $t->name;
		}
		
		$this->render('index',array(
			'model'=>$model,
			'list_news'=>$list_news,
			// 'list_album'=>$list_album,
		));
	}
	/**
	 * Reverse status of image
	 * @param integer $id, the ID of image to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$image=Image::model()->findByPk($id);
		$old_status=$image->status;
		$image->status=!$old_status;
		if($image->save()) 
			echo json_encode(array('success'=>true,'src'=>$image->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of image.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Image::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Image::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
		}
	}
	/**
	 * Init checkbox selection
	 * @param string $name_params, name of section to work	 
	 */
	public function initCheckbox($name_params){
		if (! isset ( Yii::app ()->session [$name_params] ))
			Yii::app ()->session [$name_params] = array ();
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
		{
				Yii::app ()->session [$name_params] = array ();
		}
		else {
			if (isset ( $_POST ['list-checked'] )) {
				$list_new = array_diff ( explode ( ',', $_POST ['list-checked'] ), array ('' ) );
				$list_old = Yii::app ()->session [$name_params];
				$list = $list_old;
				foreach ( $list_new as $id ) {
					if (! in_array ( $id, $list_old ))
						$list [] = $id;
				}
				Yii::app ()->session [$name_params] = $list;
			}
			if (isset ( $_POST ['list-unchecked'] )) {
				$list_unchecked = array_diff ( explode ( ',', $_POST ['list-unchecked'] ), array ('' ) );
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
	 * @return Image $model, the model has ID
	 */
	public function loadModel($id)
	{
		$model=Image::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'image-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}

}
