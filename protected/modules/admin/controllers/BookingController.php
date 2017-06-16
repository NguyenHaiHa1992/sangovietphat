<?php
/**
 * 
 * BookingController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class BookingController extends Controller
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
				'roles'=>array('booking_create'),
			),
			array('allow',  
				'actions'=>array('copy'),
				'roles'=>array('booking_copy'),
			),
			array('allow', 
				'actions'=>array('update'),
				'roles'=>array('booking_update'),
			),
			array('allow', 
				'actions'=>array('autoSave'),
				'roles'=>array('booking_autoSave'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('booking_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('booking_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('booking_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('booking_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('reverseHome'),
				'roles'=>array('booking_reverseHome'),
			),
			array('allow',  
				'actions'=>array('reverseNew'),
				'roles'=>array('booking_reverseNew'),
			),
			array('allow',  
				'actions'=>array('suggestTitle'),
				'roles'=>array('booking_suggestTitle'),
			),
			array('allow',  
				'actions'=>array('updateSuggest'),
				'roles'=>array('booking_updateSuggest'),
			),
			array('allow',  
				'actions'=>array('edit'),
				'roles'=>array('booking_edit'),
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
		$model=new Booking();
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Booking']))
		{
			$model->attributes=$_POST['Booking'];
			if($model->save())
				$this->redirect(iPhoenixUrl::createUrl('admin/booking/update',array('id'=>$model->id)));
		}
		//Group categories that contains booking
		$list_category=NewsCategory::getList_nodes();
		
		//Handler list suggest booking
		$this->initCheckbox('checked-suggest-list','SuggestBooking',$model->list_current_suggest_ids);
		$suggest=new Booking('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestBooking']))
			$suggest->attributes=$_GET['SuggestBooking'];	

		$this->render('create',array(
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
		$booking=Booking::model()->findByPk($id);
		$copy=$booking->copy();
		if(isset($copy))
		{
				$this->redirect(iPhoenixUrl::createUrl('admin/booking/update',array('id'=>$copy->id)));
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
		//if (Yii::app ()->user->checkAccess ( 'booking_update', array ('booking' => $model ) )) {
		if(true){
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Booking']))
		{
			$model->attributes=$_POST['Booking'];
			if($model->save()){				
				$this->redirect(iPhoenixUrl::createUrl('admin/booking/update',array('id'=>$model->id)));
			}
		}
		//Group categories that contains booking
		$list_category=NewsCategory::getList_nodes();
		
		//Handler list suggest booking
		$this->initCheckbox('checked-suggest-list','SuggestBooking',$model->list_current_suggest_ids);
		$suggest=new Booking('search');
		$suggest->unsetAttributes();  
		if(isset($_GET['SuggestBooking']))
			$suggest->attributes=$_GET['SuggestBooking'];	

		$this->render('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest' => $suggest
		));	
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');	
	}

	/**
	 * Auto save a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAutoSave($id='')
	{
		if($id==''){
			$model=new Booking();
			if(isset($_POST['Booking']))
			{
				$model->attributes=$_POST['Booking'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/booking/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['Booking']))
			{
				$model->attributes=$_POST['Booking'];
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Performs the action with multi-selected booking from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-booking-list','Booking');
		$list_checked = Yii::app()->session["checked-booking-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'booking_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Booking::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-booking-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bài viết';
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'booking_copy')) {
					foreach ( $list_checked as $id ) {
						$booking=Booking::model()->findByPk($id);
						$copy=$booking->copy();
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
					Yii::app ()->session ["checked-booking-list"] = array ();
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
		$this->initCheckbox('checked-booking-list','Booking');
		$model=new Booking('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Booking']))
			$model->attributes=$_GET['Booking'];	
		//Group categories that contains booking
		$list_category=NewsCategory::getList_nodes();
		$this->render('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of booking
	 * @param integer $id, the ID of booking to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$booking=Booking::model()->findByPk($id);
		$old_status=$booking->status;
		$booking->status=!$old_status;
		if($booking->save()) 
			echo json_encode(array('success'=>true,'src'=>$booking->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status home of booking
	 * @param integer $id, the ID of booking to be reversed
	 */
	public function actionReverseHome($id)
	{
		$booking=Booking::model()->findByPk($id);
		$old_home=$booking->home;
		$booking->home=!$old_home;
		if($booking->save()) 
			echo json_encode(array('success'=>true,'src'=>$booking->imageHome));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status new of booking
	 * @param integer $id, the ID of booking to be reversed
	 */
	public function actionReverseNew($id)
	{
		$booking=Booking::model()->findByPk($id);
		$old_new=$booking->new;
		$booking->new=!$old_new;
		if($booking->save()) 
			echo json_encode(array('success'=>true,'src'=>$booking->imageNew));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Suggests title of booking.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Booking::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	
	/*
	 * Update suggest booking
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list','SuggestBooking');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	
	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Booking::model()->findByPk($id);
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
		$model=Booking::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'booking-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}