<?php
/**
 * 
 * IssueController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * IssueController get content by WS:
 *** create new Ticket
 *** update information of a Ticket
 *** delete Ticket
 *** index Ticket
 *** perform action to list of selected banner from checkbox  
 */
 ini_set ( 'soap.wsdl_cache_enable' , 0 );
class IssueController extends Controller
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
				'roles'=>array('issue_create'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('issue_index'),
			),
			array('allow',  
				'actions'=>array('update'),
				'roles'=>array('issue_update'),
			),
			array('allow',  
				'actions'=>array('view'),
				'roles'=>array('issue_view'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('issue_delete'),
			),
			array('allow',  
				'actions'=>array('removeFile'),
				'roles'=>array('issue_removeFile'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}
	/*!ACCESSRULES*/
	
	/**
	 * This is the action list ticket
	 */
	public function actionIndex(){
		$model = new issueForm();
		$project_id = Yii::app()->params['project_id'];
		$customer_id = Yii::app()->params['customer_id'];
		$secret_key = Yii::app()->params['secret_key'];
		$client=new SoapClient(Yii::app()->params['wsTicket']);
		if(isset($_GET['page'])){
				$page = $_GET['page']-1;
		}else
			$page = 0;
		Yii::app()->user->setState("wsCurrentPage",$page);
		if (isset($_GET['pageSize'])) {
           	Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            //unset($_GET['pageSize']);
       	} 
		$limit = Yii::app()->user->getState('pageSize',10);
		$offset = $page*$limit;
		if(isset($_GET['issueForm'])){
			$model->attributes = $_GET['issueForm'];
			Yii::app()->user->setState('status',$model->status);
		}
		$status = Yii::app()->user->getState('status',0);
		$listTask = $client->getListTickets($status, $project_id, $customer_id,$offset,$limit,$secret_key);
		$count  = $client->countTickets($status, $project_id, $customer_id, $secret_key);

		if(!isset(Yii::app()->session["checked-issue-list"])){
			Yii::app()->session["checked-issue-list"] = array();
		}
		$dataProvider = new CArrayDataProvider($listTask, array(
			'sort'=>array(
		        'attributes'=>array(
		             'id','name', 'created_time','status','description'
		        ),
		    ),
		    'pagination'=>array(
		        'pageSize'=>$limit,
		        'currentPage'=>0,
		    ),
		    'totalItemCount' => $count,
		));
		$this->render('index',array('dataProvider'=>$dataProvider,'model'=>$model));
	}
	
	/**
	 * This is the action view detail ticket
	 */
	 public function actionView(){
	 	$model = new CommentIssueForm();
	 	$task_id = $_GET['task_id'];
		$secret_key = Yii::app()->params['secret_key'];
		$client=new SoapClient(Yii::app()->params['wsTicket']);
		$result = $client->detailTicket($task_id,$secret_key);
		if(isset($_POST['CommentIssueForm'])){
			$model->attributes = $_POST['CommentIssueForm'];
			$customer_id = Yii::app()->params['customer_id'];
			$client=new SoapClient(Yii::app()->params['wsTicket']);
			$response = $client->commentTicket($task_id,$customer_id,$model->content,$secret_key);
			if($response){
				$this->redirect(Yii::app()->createUrl('admin/issue/view',array('task_id'=>$task_id)));
			}
		}else
			$this->render('view',array('model'=>$model,'result'=>$result));
	 }
	 
	/**
	 * This is the action update ticket
	 */
	public function actionUpdate(){
		$file_links = array();
		$secret_key = Yii::app()->params['secret_key'];
		if(isset($_GET['task_id'])){
			$task_id = $_GET['task_id'];
			$client=new SoapClient(Yii::app()->params['wsTicket']);
			$result = $client->detailTicket($task_id,$secret_key);
			$arr_id = array();
			$arr_file = array();
			foreach($result->file_links as $link){
				$name = strstr(substr(strrchr($link,"/"),1),".",true);
				$file = File::model()->findByAttributes(array('filename'=>$name));
				if(isset($file)){
					$arr_id[] = $file->id;
					$arr_file[] = $file->getAbsoluteUrl();
				}
			}
			if(!isset(Yii::app()->session['id'])){
				Yii::app()->session['id'] = $arr_id;
			}
			$model = new issueForm();
			$model->name = $result->name;
			$model->description = $result->description;
		}
		if(isset($_POST['issueForm'])){
			$model->attributes = $_POST['issueForm'];
			$tmp_file_id = explode(",", $model->file_id);
			$old_file_id = Yii::app()->session['id'];
			if(isset(Yii::app()->session['del_id']) && !empty(Yii::app()->session['del_id'])){
				$del_id = Yii::app()->session['del_id'];
				$new_file_id = array_diff($old_file_id, $del_id);
				if(!empty($tmp_file_id)){
					$new_file_id = array_merge($new_file_id,$tmp_file_id);
				}
				foreach($new_file_id as $id){
					$file=File::model()->findByPk($id);
					if(isset($file))
						$file_links[] = $file->getAbsoluteUrl();	
				}
				foreach($del_id as $id){
					File::model()->deleteByPk($id);
				}	
			}else{
				if(!empty($tmp_file_id)){
					if(!empty($old_file_id)){
						$new_file_id = array_merge($old_file_id,$tmp_file_id);
						foreach($new_file_id as $id){
							$file=File::model()->findByPk($id);
							if(isset($file))
								$file_links[] = $file->getAbsoluteUrl();	
						}
					}else{
						$new_file_id = $tmp_file_id;
						foreach($new_file_id as $id){
							$file=File::model()->findByPk($id);
							if(isset($file))
								$file_links[] = $file->getAbsoluteUrl();	
						}
					}
				}else{
					if(!empty($old_file_id)){
						$new_file_id = $old_file_id;
						foreach($new_file_id as $id){
							$file=File::model()->findByPk($id);
							if(isset($file))
								$file_links[] = $file->getAbsoluteUrl();	
						}
					}else{
						$file_links[] = array();
					}
				}
				
			}
			$client=new SoapClient(Yii::app()->params['wsTicket']);
			$response = $client->updateTicket($task_id, $model->name, $model->description, $file_links, $secret_key);
			if($response){
				unset(Yii::app()->session['id']);
				unset(Yii::app()->session['del_id']);				
				$this->redirect(array('issue/index'));
			}
		}else
			$this->render('update',array('model'=>$model,'result'=>$arr_file));
	}
	
	/**
	 * This is the action create ticket
	 */
	public function actionCreate(){
		$file_links = array();
		$model = new issueForm('create');
		$this->performAjaxValidation($model);
		$project_id = Yii::app()->params['project_id'];
		$customer_id = Yii::app()->params['customer_id'];
		$secret_key = Yii::app()->params['secret_key'];
		if(isset($_POST['issueForm'])){
			$model->attributes = $_POST['issueForm'];
			$tmp_file = explode(",", $model->file_id);
			foreach($tmp_file as $id){
				$file=File::model()->findByPk($id);
				$file_links[] = $file->getAbsoluteUrl();	
			}
			$client = new SoapClient(Yii::app()->params['wsTicket']);
			$result = $client->createTicket($project_id, $customer_id,$model->name,strip_tags($model->description),$file_links,$secret_key);
			if($result){
				$this->redirect(array('issue/index'));
			}
		}else{
			$this->render('create', array('model'=>$model));
		}
	}
	
	/**
	 * Performs the action with multi-selected issue from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-issue-list','issueForm');
		$list_checked = Yii::app()->session["checked-issue-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'issue_delete')) {
					foreach ( $list_checked as $id ) {
						$item = News::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']='Xóa Ticket thành công';
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-issue-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']='Bạn không có quyền xóa Ticket';
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
	 * This is the action delete Ticket
	 */
	 public function actionDelete(){
	 	$secret_key = Yii::app()->params['secret_key'];
		$task_id = $_GET['task_id'];
		$client = new SoapClient(Yii::app()->params['wsTicket']);
		$client->deleteTicket($task_id,$secret_key);
	 }
	 
	 /**
	  * This is the action remove file requirements
	  */
	  public function actionRemoveFile(){
	  	$response = array();
		$tmp_arr = array();
		
		$fileName = $_GET['fileName'];
		$tmp_file = File::model()->findByAttributes(array('filename'=>$fileName));
		if(isset($tmp_file)){
			$tmp_arr[] = $tmp_file->id;
			if(!isset(Yii::app()->session['del_id']))
				Yii::app()->session['del_id'] = $tmp_arr;
			else{
				$del_id = Yii::app()->session['del_id'];
				$del_id = array_merge($del_id,$tmp_arr);
				Yii::app()->session['del_id'] = $del_id;
			}
			$response['result'] = TRUE;
			
		}
		echo json_encode($response);
		
	  }
	  
	  
	 /**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() && !isset($_SERVER['HTTP_X_PJAX']))
		{
		if( !isset($_GET['ajax'] )  || $_GET['ajax'] != 'issue-list'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}

}