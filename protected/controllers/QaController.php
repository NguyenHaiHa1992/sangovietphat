<?php
class QaController extends Controller
{
	public $layout = 'main';
	
	/**
	 * display index page: list qa is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		$list_qas = array();
		if (!isset(Yii::app()->session['pageSize']))
			Yii::app()->session['pageSize'] = Qa::PAGE_SIZE;
		
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria -> order = 'order_view desc, created_time desc';
		
		$criteria->order = News::SORT;
		
		$count = Qa::model()->count($criteria);
		$pages = new CPagination($count);
		
		$pages->setPageSize(Yii::app()->session['pageSize']);
		$item_count = ceil($count/Yii::app()->session['pageSize']);
		$pages->applyLimit($criteria);
		
		$list_qa = Qa::model()->findAll($criteria);
		
		$this->iPhoenixRender('index',array('list_qa'=>$list_qa,'item_count'=>$item_count,'pages'=>$pages,'page_size'=>1,'count'=>$count));
	}
	
	/**
	 * 
	 */
	public function actionView($qa_alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $qa_alias);
		$qa = Qa::model()->find($criteria);

		$qa->visited();

		$c = new Comment();
		$list_comment = $c->getListByParent($qa->id,'Qa');

		$list_suggest_qa = $qa->getList_suggest_qa();
		
		$this->iPhoenixRender('view',array('qa'=>$qa,'list_suggest_qa'=>$list_suggest_qa,'list_comment'=>$list_comment));
	}

	/**
	 * Create new QA
	 */
	public function actionCreate()
	{
		if(isset($_POST['Qa']))
		{
		 	$qa = new Qa();
			$qa->name = $_POST['Qa']['name'];
			$qa->email = $_POST['Qa']['email'];
			$qa->question = $_POST['Qa']['question'];
			$qa->title = $_POST['Qa']['title'];
			$qa->meta_title = $_POST['Qa']['title'];
			$qa->meta_keyword = $_POST['Qa']['title'];
			$qa->meta_description = $_POST['Qa']['title'];

			if ($qa->save())
				Yii::app()->user->setFlash('success', "Câu hỏi của Quý khách đã được gửi thành công, chúng tôi sẽ trả lời trong thời gian sớm nhất. Xin cảm ơn!");
			else
			{
				Yii::app()->user->setFlash('error', "Có lỗi xảy ra, Quý khách vui lòng điền đầy đủ thông tin, xin cảm ơn!");
			}
		}
		$this->iPhoenixRender('create');
	}

	/**
	 * Send QA through Ajax
	 */
	public function actionAdd()
	{
		$result = array();
		if(file_get_contents("http://www.opencaptcha.com/validate.php?ans=".$_POST['code']."&img=".$_POST['img'])=='pass') 
		{
			$result['captcha'] = true;
			$result['success'] = true;
		 	$qa = new Qa();
			$qa->name = $_POST['name'];
			$qa->email = $_POST['email'];
			$qa->question = $_POST['question'];
			$qa->title = $_POST['title'];
			$qa->meta_title = $_POST['title'];
			$qa->meta_keyword = $_POST['title'];
			$qa->meta_description = $_POST['title'];

			if ($qa->save())
				$result['success'] = true;
			else
				{
					var_dump($qa->getErrors());
					$result['success'] = false;
					exit;
				}
			
		} 
		else 
		{
			$result['captcha'] = false;
		  	$result['success'] = false;
		}

		echo json_encode($result);
	}
	
	/**
	 * 
	 */
	 public function actionChangeImage()
	 {
	 	$result = array();
		
		$date = date("Ymd");
		$rand = rand(0,9999999999999);
		$height = "50";
		$width  = "200";
		$img    = "$date$rand-$height-$width.jpgx";
		
		$result['success'] = true;
		$result['img'] = $img;
		
		echo json_encode($result);
	 }
}