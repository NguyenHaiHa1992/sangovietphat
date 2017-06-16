<?php
/**
 * 
 * CustomerController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * CustomerController includes actions relevant to Customer
 *** view
 *** create
 *** update
 *** delete
 *** index
 *** reverse status
 *** reset password
 *** load model
 *** suggest name
 *** suggest email
 *** perform action to list of selected models from checkbox   
 */
class CustomerController extends Controller
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
				'actions'=>array('updateForm'),
				'roles'=>array('customer_updateForm'),
			),
			array('allow',  
				'actions'=>array('write'),
				'roles'=>array('customer_write'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('customer_delete'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('customer_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('customer_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('suggestEmail'),
				'roles'=>array('customer_suggestEmail'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('customer_checkbox'),
			),
			array('allow',  
				'actions'=>array('resetPassword'),
				'roles'=>array('customer_resetPassword'),
			),
			array('deny', 
				'users'=>array('*'),
			),		
		);
	}
	
	/**
	 * Get update form
	 */
	public function actionUpdateForm($id)
	{
		$model=Customer::model()->findByPk($id);	

		if(Yii::app ()->user->checkAccess ( 'customer_updateForm', array ('banner' => $model ))){
			$result['id']=$model->id;
			$result['email']=$model->email;
			$result['fullname']=$model->fullname;
			$result['phone']=$model->phone;
			$result['address']=$model->address;
			echo json_encode($result);
			Yii::app()->end();
		}	
		else
			throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');	
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionWrite()
	{
		$result=array();
		if(isset($_GET['Customer']['id']) && $_GET['Customer']['id'] != ''){
			$model=$this->loadModel($_GET['Customer']['id']);
			$model->scenario = 'update';
			$model->attributes=$_GET['Customer'];	

			if($model->save()){
				$result['success']=true;
			}
			else{
				$result['success']=false;
				$result['errors']=$model->getErrors();
			}		
		}
		else{
			$model=new Customer('create');			
			if(isset($_GET['Customer']))
			{
				$model->attributes=$_GET['Customer'];	

				$clear_password=Customer::generatePassword(Customer::LENGTH_PASSWORD);
				$model->salt=$model->generateSalt();
				$model->password=$model->hashPassword($clear_password,$model->salt);
							
				if($model->save()){					
					if($model->email != ''){
						$email = new YiiMailMessage ();
						$email->setTo ( $model->email );
						$email->from = array(Yii::app()->params['adminEmail']=>'IHB Việt Nam');
						$email->setSubject ( 'Thông tin tài khoản' );
						$email->setBody('Tài khoản đăng nhập của bạn là: Email : '.$model->email.' & Password : '.$clear_password);
						Yii::app()->mail->send($email);		
					}						
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-customer-list','Customer');
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];
		$this->iPhoenixRender('index',array(
			'model'=>$model,
		));
	}
	/**
	 * Reverse status of customer
	 * @param integer $id the ID of model to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$news=Customer::model()->findByPk($id);
		$old_status=$news->status;
		$news->status=!$old_status;
		if($news->save()) 
			echo json_encode(array('success'=>true,'src'=>$news->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
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
		if(Yii::app()->getRequest()->getIsAjaxRequest())
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Suggests email on the current customer input.
	 * This is called via AJAX when the customer is entering the email input.
	 */
	public function actionSuggestEmail()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$emails=Customer::model()->suggestEmail($keyword);
			if($emails!==array())
				echo implode("\n",$emails);
		}
	}
	
	/**
	 * Performs the action with multi-selected customers from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-customer-list','Customer');
		$list_checked = Yii::app()->session["checked-customer-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'customer_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Customer::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa customer thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-customer-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa customer';
					break;
				}
				break;
		}
		echo json_encode($result);
		Yii::app()->end();
		
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
	 * Reset SystemCustomer password
	 * @param integer $id the ID of systemCustomer to reset password
	 */
	public function actionResetPassword($id)
	{
		$model=Customer::model()->findByPk($id);
		if(isset($model)){
			$clear_password = $model->generatePassword ( Customer::LENGTH_PASSWORD );
			$model->salt = $model->generateSalt ();
			$model->password = $model->hashPassword ( $clear_password, $model->salt );
			if ($model->save ()) {
				$result= json_encode(array('success'=>true));	
				$email = new YiiMailMessage ();
				$email->setTo ( $model->email );
				$email->from = array(Yii::app()->params['adminEmail']=>'iS Iphoenix');
				$email->setSubject ( 'Thông tin tài khoản' );
				$email->setBody('Chào '.$model->fullname.', bạn vừa được reset password. Tài khoản đăng nhập '.Yii::app()->params['home_url'].' của bạn là: Email : '.$model->email.' & Password : '.$clear_password);
				Yii::app()->mail->send($email);
				
			}
		}
		else{
			$result=json_encode(array('success'=>false));
		}
		echo $result;
		Yii::app()->end();
	}
}