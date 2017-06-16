<?php
/**
 * 
 * SiteController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class SiteController extends Controller
{
	public $layout='main';
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
				'actions'=>array('error'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('home'),
				'users'=>array('@'),
			),	
			array('allow',
				'actions'=>array('changePassword'),
				'users'=>array('@'),
			),	
			array('deny', 
				'users'=>array('*'),
			),
		);
	}
	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render( 'error', $error );
		}
	}
	
	/**
	 * Displays the login page, redirect to index page if login successfully 
	 */
	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest){ 
			$this->redirect(Yii::app()->createUrl('admin/site/home'));
		}
		if(!isset(Yii::app()->session['login_incorrect'])){
			Yii::app()->session['login_incorrect']=1;
		}
		$model=new LoginForm;
		if(Yii::app()->session['login_incorrect'] <= User::LIMIT_INCORRECT){
			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid

				if($model->validate() && $model->login()) {
					$this->redirect(Yii::app()->createUrl('admin/site/home'));
				}
				else {
					$login_incorrect=Yii::app()->session['login_incorrect'];
					$login_incorrect++;
					Yii::app()->session['login_incorrect']=$login_incorrect;
					Yii::app ()->user->setFlash ( 'error', iPhoenixLang::admin_t('Invalid Username/Password','main'));
				}
			}
		}
		else {
			Yii::app ()->user->setFlash ( 'error', iPhoenixLang::admin_t('You have tried to login using wrong password for 5 times. Please try again in few hours','main'));
		}
		$this->layout='board';
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{	
		$user=User::model()->findByPk(Yii::app()->user->id);
		if(isset($user))
		{
			$user->last_visit_date=time();
			$user->save();
		}
		
		Yii::app()->user->logout();

		$this->redirect(array('site/login'));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionHome()
	{
		$news = array();
		$product = array();
		$comment = array();

		$criteria = new CDbCriteria ();
		$news['total'] = News::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', true );
		$news['active'] = News::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$product['total'] = Product::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', true );
		$product['active'] = Product::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$criteria->limit = 5;
		$criteria->order = "id desc";
		$list_order = Order::model()->findAll($criteria);

		$criteria = new CDbCriteria ();
		$comment['total'] = Comment::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', true );
		$criteria->order = "id desc";
		$comment['active'] = Comment::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$newsCategory['total'] = NewsCategory::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$productCategory['total'] = ProductCategory::model()->count($criteria);

		$criteria = new CDbCriteria ();
		$criteria->limit = 5;
		$criteria->order = "id desc";
		$criteria->compare ( 'status', false );
		$list_comment = Comment::model()->findAll($criteria);

		$criteria = new CDbCriteria ();
		$criteria->limit = 5;
		$criteria->order = "id desc";
		$criteria->compare ( 'status', false );
		$list_contact = Contact::model()->findAll($criteria);

		$this->iPhoenixRender('home',array(
				'news'=>$news,
				'product'=>$product,
				'comment'=>$comment,
				'newsCategory'=>$newsCategory,
				'productCategory'=>$productCategory,
				'list_comment'=>$list_comment,
				'list_contact'=>$list_contact,
				'list_order'=>$list_order,
		));
	}

	/**
	 * Change password
	 */
	public function actionChangePassword()
	{
		$model = User::model()->findByPk ( Yii::app()->user->id );
		$result='';
		if(isset($_GET['User']))
		{
			$old_password=$_GET['User']['old_password'];
			$new_password=$_GET['User']['new_password'];
			$confirm_password=$_GET['User']['confirm_password'];
			if($new_password == $confirm_password){
				if($model->validatePassword($old_password)){
					$model->salt=$model->generateSalt();
					$model->password=$model->hashPassword($new_password,$model->salt);
					if($model->save()){
						$result=json_encode(array('success'=>true,'message'=>array(iPhoenixLang::admin_t('Password changes successfully','main'))));
					}
					else{
						$result=json_encode(array('success'=>false,'message'=>$model->getErrors()));
					}
				}
				else{
					$result=json_encode(array('success'=>false,'message'=>array(iPhoenixLang::admin_t('Old password is not correct','main'))));
				}
			}
			else{
				$result=json_encode(array('success'=>false,'message'=>array(iPhoenixLang::admin_t('Password confirm is not correct','main'))));
			}
		}
		echo $result;
	}
}
?>
