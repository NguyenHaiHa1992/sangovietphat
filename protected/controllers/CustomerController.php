<?php
class CustomerController extends Controller
{
	public $layout = "main";

	/**
	 * Change password
	 */
	public function actionChangePassword()
	{
		$model = Customer::model()->findByPk ( Yii::app()->user->id );
		$result='';
		if(isset($_GET['Customer']))
		{
			$old_password=$_GET['Customer']['old_password'];
			$new_password=$_GET['Customer']['new_password'];
			$confirm_password=$_GET['Customer']['confirm_password'];
			if($new_password == $confirm_password){
				if($model->validatePassword($old_password)){
					$model->salt=$model->generateSalt();
					$model->password=$model->hashPassword($new_password,$model->salt);
					if($model->save()){
						$result=json_encode(array('success'=>true,'message'=>array("Password đã được thay đổi!")));
					}
					else{
						$result=json_encode(array('success'=>false,'message'=>$model->getErrors()));
					}
				}
				else{
					$result=json_encode(array('success'=>false,'message'=>array("Password cũ không chính xác")));
				}
			}
			else{
				$result=json_encode(array('success'=>false,'message'=>array("Password xác nhận không chính xác")));
			}
			echo $result;
		}
		else{
			$this->iPhoenixRender('change-password', array('model'=>$model));
		}
	}

	/**
	 * Displays the login page, redirect to index page if login successfully 
	 */
	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest){ 
			$this->redirect(iPhoenixUrl::createUrl('site/index'));
		}
		if(!isset(Yii::app()->session['customer_login_incorrect'])){
			Yii::app()->session['customer_login_incorrect']=1;
		}
		$model=new LoginFormCustomer;
		if(Yii::app()->session['customer_login_incorrect'] <= Customer::LIMIT_INCORRECT){
			// collect user input data
			if(isset($_POST['LoginFormCustomer']))
			{
				$model->attributes=$_POST['LoginFormCustomer'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login()) {		
					$this->redirect(Yii::app()->createUrl('site/index'));
				}
				else {
					$login_incorrect=Yii::app()->session['customer_login_incorrect'];
					$login_incorrect++;
					Yii::app()->session['customer_login_incorrect']=$login_incorrect;
					Yii::app ()->user->setFlash ( 'error', 'Email/Password không chính xác.' );
				}
			}
		}
		else {
			Yii::app ()->user->setFlash ( 'error', 'Bạn đã đăng nhập sai 5 lần liên tiếp. Vui lòng thử lại sau.' );
		}

		$this->iPhoenixrender('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{	
		Yii::app()->user->logout();
		$this->redirect(array('site/index'));
	}

	/*
	 * Register new user
	 */
	public function actionRegister()
	{
		$model=new Customer('create');

		//Get list city
		$list_city = array();
		$list_city[''] = 'Tất cả';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];	

			$clear_password=Customer::generatePassword(Customer::LENGTH_PASSWORD);
			$model->salt=$model->generateSalt();
			$model->password=$model->hashPassword($clear_password,$model->salt);

			if($model->save()){					
				if($model->email != ''){
					$email = new YiiMailMessage ();
					$email->setTo ( $model->email );
					$email->from = array(Yii::app()->params['adminEmail']=>Yii::app()->params['home_name']);
					$email->setSubject ( 'Thông tin tài khoản tại '.Yii::app()->params['home_url']);
					$email->setBody('Tài khoản đăng nhập của bạn là: Email : '.$model->email.' & Password : '.$clear_password);
					Yii::app()->mail->send($email);		
				}
				Yii::app ()->user->setFlash ( 'success', 'Xin chào '.$model->fullname.'. Bạn đã đăng ký thành công. Thông tin password đã được gửi đến email của bạn. Vui lòng kiểm tra mail để lấy password');
			}	
			else{
				Yii::app ()->user->setFlash ( 'error', 'Có lỗi trong quá trình tạo tài khoản, vui lòng thực hiện lại thao tác.');
				//$result['errors']=$model->getErrors();
			}		
		}

		$this->iPhoenixrender('register', array('list_city'=>$list_city));
	}

	public function actionResetPassword(){
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$criteria = new CDbcriteria();
			$criteria->compare('email', $email);
			$criteria->compare('status', true);
			$model=Customer::model()->find($criteria);
	
			if(isset($model)){
				$clear_password = $model->generatePassword ( Customer::LENGTH_PASSWORD );
				$model->salt = $model->generateSalt ();
				$model->password = $model->hashPassword ( $clear_password, $model->salt );
				if ($model->save ()) {
					$result= json_encode(array('success'=>true));	
					$email = new YiiMailMessage ();
					$email->setTo ( $model->email );
					$email->from = array(Yii::app()->params['adminEmail']=>Yii::app()->params['home_name']);
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
		$this->iPhoenixRender('resetPassword');
	}

	public function actionView()
	{
		$model = Customer::model()->findByPk ( Yii::app()->user->id );
		$result='';

		//Get list city
		$list_city = array();
		$list_city[''] = 'Tất cả';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}

		if(isset($_GET['Customer']))
		{
			$model->attributes = $_GET['Customer'];

			if($model->save()){
				$result=json_encode(array('success'=>true,'message'=>array("Thông tin đã được cập nhật thành công")));
			}
			else{
				$result=json_encode(array('success'=>false,'message'=>array("Có lỗi trong quá trình xử lý. Vui lòng thử lại")));
			}
			echo $result;
		}
		else{
			$this->iPhoenixRender('view', array('model'=>$model,'list_city'=>$list_city));
		}
	}

	public function actionOrder(){
		//Get list product category
		if (!isset(Yii::app()->session['orderPageSize']))
			Yii::app()->session['orderPageSize'] = 10;

		$criteria = new CDbcriteria();
		$criteria->compare('created_by', Yii::app()->user->id);
		$criteria->order = "id desc";

		$count = Order::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['orderPageSize']);
		$item_count = ceil($count/Yii::app()->session['orderPageSize']);
		$pages->applyLimit($criteria);

		$list_order = Order::model()->findAll($criteria);

		$this->iPhoenixRender('order', array(
			'list_order' => $list_order,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}

	public function actionOrderDetail(){
		if(isset($_POST['id'])){
			$order = Order::model()->findbyPk($_POST['id']);
			if(isset($order)){
				if($order->created_by == Yii::app()->user->id){
					echo $this->renderPartial('_order_detail', array(
						'order'=>$order,
						'list_product'=>$order->detail_order
					), true);
				}
			}
		}
	}
}
