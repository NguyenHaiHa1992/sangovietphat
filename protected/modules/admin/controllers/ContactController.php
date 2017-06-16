<?php
/**
 * 
 * ContactController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class ContactController extends Controller
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
				'actions'=>array('write'),
				'roles'=>array('contact_write'),
			),
			array('allow',  
				'actions'=>array('updateForm'),
				'roles'=>array('contact_updateForm'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('contact_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('contact_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('contact_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('contact_reverseStatus'),
			),
			array('allow',  
				'actions'=>array('sendMail'),
				'roles'=>array('contact_sendMail'),
			),
			array('deny', 
				'users'=>array('*'),
			),						
		);
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionWrite()
	{
		if(isset($_GET['Contact']['id']) && $_GET['Contact']['id'] != ''){
			$model=$this->loadModel($_GET['Contact']['id']);	
			$model->scenario='reply';
			if(isset($_GET['Contact']))
			{
				$model->attributes=$_GET['Contact'];
				$model->status=true;
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
		$result['email']=$model->email;
		$result['tel']=$model->tel;
		$result['address']=$model->address;
		$result['content']=$model->content;
		$result['reply']=$model->reply;
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
	 * Performs the action with multi-selected contact from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-contact-list','Contact');
		$list_checked = Yii::app()->session["checked-contact-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'contact_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Contact::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa bình luận thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-contact-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa bình luận';
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
	public function actionIndex($filter='')
	{
		$this->initCheckbox('checked-contact-list','Contact');
		$model=new Contact('search');
		$model->unsetAttributes();  // clear any default values
		if($filter == 'status_ok') $model->status = true;
		if($filter == 'status_pending') $model->status = 0;
		if(isset($_GET['Contact'])){ 
			$model->attributes=$_GET['Contact'];
			$model->search_start_time=iPhoenixTime::convertStringDateTime($_GET['Contact']['search_start_time']);
			$model->search_end_time=iPhoenixTime::convertStringDateTime($_GET['Contact']['search_end_time']);
		}	
		$this->iPhoenixRender('index',array(
			'model'=>$model
		));
	}
	/**
	 * Reverse status of contact
	 * @param integer $id, the ID of contact to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$contact=Contact::model()->findByPk($id);
		$old_status=$contact->status;
		$contact->status=!$old_status;
		if($contact->save()) 
			echo json_encode(array('success'=>true,'src'=>$contact->imageStatus));
		else 
			echo json_encode(array('success'=>false));		
	}
	
	/**
	 * Reverse status of contact
	 * @param integer $id, the ID of contact to be reversed
	 */
	public function actionSendMail($id)
	{
		$contact=Contact::model()->findByPk($id);
		if($contact->status && $contact->reply != ''){
			$email = new YiiMailMessage ();
			$email->setTo ( $contact->email );
			$email->from = array(Yii::app()->params['adminEmail']=>'IHB Việt Nam');
			$email->setSubject ( 'Phản hồi liên hệ vào thời điểm '.date('d/m/Y',$contact->created_time));
			$email->setBody('Nội dung liên hệ: "'.$contact->content.'". Nội dung trả lời: "'.$contact->reply.'"');
			if(Yii::app()->mail->send($email)) 
				echo json_encode(array('success'=>true));
			else 
				echo json_encode(array('success'=>false));	
		}	
		else {
			echo json_encode(array('success'=>false));	
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
		$model=Contact::model()->findByPk($id);
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
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'contact-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
