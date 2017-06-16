<?php
/**
 * 
 * OrderController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class OrderController extends Controller
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
				'roles'=>array('order_write'),
			),
			array('allow',  
				'actions'=>array('updateForm'),
				'roles'=>array('order_updateForm'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('order_delete'),
			),
			array('allow',  
				'actions'=>array('checkbox'),
				'roles'=>array('order_checkbox'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('order_index'),
			),
			array('allow',  
				'actions'=>array('suggestEmail'),
				'roles'=>array('order_index'),
			),
			array('allow',  
				'actions'=>array('suggestName'),
				'roles'=>array('order_index'),
			),
			array('allow',  
				'actions'=>array('suggestPhone'),
				'roles'=>array('order_index'),
			),
			array('allow',  
				'actions'=>array('reverseStatus'),
				'roles'=>array('order_reverseStatus'),
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
		if(isset($_GET['Order']['id']) && $_GET['Order']['id'] != ''){
			$model=$this->loadModel($_GET['Order']['id']);
			$model->scenario='reply';
			if(isset($_GET['Order']))
			{
				$model->attributes=$_GET['Order'];
				$model->status=Order::STATUS_OK;
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
		$result['phone']=$model->phone;
		$result['tel']=$model->tel;
		$result['address']=$model->address;
		$result['content']=$model->detail_order;
		$result['note']=$model->note;
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
			throw new CHttpException(400,iPhoenixLang::admin_t('You do not have authorization to perform this action','main'));
	}

	/**
	 * Performs the action with multi-selected order from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-order-list','Order');
		$list_checked = Yii::app()->session["checked-order-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'order_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Order::model ()->findByPk ( (int)$id );
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
					Yii::app ()->session ["checked-order-list"] = array ();
				} else {
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
	public function actionIndex($customer_id='')
	{
		$this->initCheckbox('checked-order-list','Order');
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if($customer_id != '')
			$model->created_by = $customer_id;

		//Get list city
		$list_city = array();
		$list_city[''] = iPhoenixLang::admin_t('All','main');
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}

		if(isset($_GET['Order'])){ 
			$model->attributes=$_GET['Order'];
			$model->search_start_time=strtotime($_GET['Order']['search_start_time']);
			$model->search_end_time=strtotime($_GET['Order']['search_end_time']);
		}	
		$this->iPhoenixRender('index',array(
			'customer_id'=>$customer_id,
			'model'=>$model,
			'list_city' =>$list_city,			
		));
	}
	/**
	 * Reverse status of order
	 * @param integer $id, the ID of order to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$order=Order::model()->findByPk($id);
		$old_status=$order->status;
		$order->status=!$old_status;
		if($order->save()) 
			echo json_encode(array('success'=>true,'src'=>$order->imageStatus));
		else 
			echo json_encode(array('success'=>false));
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
		$model=Order::model()->findByPk($id);
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
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'order-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
	
	/*
	 * Create order
	 */
	public function actionCreate(){
		$model=new Order();
		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save()){
				$model->detail_order=array(
					'4'=>array(
						'quantity'=>4,
					),
					'5'=>array(
						'quantity'=>5,
					),
					'6'=>array(
						'quantity'=>6,
					),
				);
			}	
			else{
				var_dump($model->getErrors());
			}
		}
		$this->iPhoenixRender('create',array(
			'model'=>$model,	
		));
	}

	/**
	 * Suggests name of order.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Order::model()->suggestName($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}

	/**
	 * Suggests email of order.
	 */
	public function actionSuggestEmail()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Order::model()->suggestEmail($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}

	/**
	 * Suggests phone of order.
	 */
	public function actionSuggestPhone()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=Order::model()->suggestPhone($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
}
