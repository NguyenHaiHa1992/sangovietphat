<?php
class IntroController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list intro is ordered by order_view and created_time desc
	 */
	/*public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = Intro::SORT;
		$intro = Intro::model()->find($criteria);

		$list_video = $intro->list_suggest_video;

		$this->iPhoenixRender('index',array('intro'=>$intro,'list_video'=>$list_video));
	}*/

	/**
	 * display index page: list intro is ordered by order_view and created_time desc
	 */
	/*public function actionAjaxList($first, $last, $id)
	{
		$range = $last - $first + 1;
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = "id desc";
		$criteria->limit = $range;
		if($id > 0) $criteria->addCondition('id < '.$id);

		$list_intro = Intro::model()->findAll($criteria);

		$result = array();

		$i = 0;
		foreach($list_intro as $intro){
			$i++;
			$result[] = $this->renderPartial('_form', array('intro'=>$intro, 'i'=>$i, 'range'=>$range),true, false);
		}

		echo json_encode($result);
	}*/

	/**
	 * display list intro by category id
	 */
	/*public function actionListByCategory($cat_id)
	{
		// use session to check for active  menu intro-index and suc - khoe
		if (!isset(Yii::app()->session['check_menu_active']))
			Yii::app()->session['check_menu_active'] = false;
		
		$cat = IntroCategory::model()->findByPk($cat_id);
		
		$list_intro = array();
		if (!isset(Yii::app()->session['pageSize']))
			Yii::app()->session['pageSize'] = Intro::PAGE_SIZE;
		
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria -> compare('home',true);
		
		$criteria->order = Intro::SORT;
		$criteria->compare('cat_id',$cat_id);
		
		$count = Intro::model()->count($criteria);
		
		$pages = new CPagination($count);
		
		$pages->setPageSize(Yii::app()->session['pageSize']);
		$item_count = ceil($count/Yii::app()->session['pageSize']);
		$pages->applyLimit($criteria);
		
		$list_intro = Intro::model()->findAll($criteria);
		
		$this->iPhoenixRender('list_by_category',array('list_intro'=>$list_intro,'cat'=>$cat,'item_count'=>$item_count,'pages'=>$pages,'page_size'=>1,'count'=>$count));
	}*/
	
	/**
	 * display detail a intro page
	 */
	/*public function actionView($id)
	{
		$intro = Intro::model()->findByPk($id);
		$intro->visited();

		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = Intro::SORT;
		$criteria->limit = 20;

		$list_intro = Intro::model()->findAll($criteria);

		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = Clip::SORT;
		$criteria->limit = 4;

		$list_clip = Clip::model()->findAll($criteria);

		$c = new Comment();
		$list_comments = $c->getListByParent($id,'Intro');

		$this->iPhoenixRender('view',array('intro'=>$intro,'list_comments'=>$list_comments,'list_clip'=>$list_clip,'list_intro'=>$list_intro));
	}*/
	
	/**
	 * 
	 */
	/*public function actionIntro($id)
	{
		$intro = Intro::model()->findByPk($id);
		$intro->visited();
		
		// get list intro at column left
		$list_intro = Intro::listIntro();
		
		$this->iPhoenixRender('intro',array('intro'=>$intro,'list_intro'=>$list_intro));
	}*/

	/**
	 * This is the action to preview intro before saving it.
	 */
	/*public function actionPreview()
	{
		$intro = new Intro();
		if(isset($_POST['Intro']))
		{
			$intro->attributes = $_POST['Intro'];
			$content = $this->render( 'preview',array('intro'=>$intro),true);
			echo json_encode(array('success'=>true,'content'=> $content));
		}	
	}*/

	/**
	 * 
	 */
	/*public function actionSearchShop()
	{
		// get list products which is infused dropdownlist
		$list_products = Product::listProducts();
		
		//Get list city
		$list_city = array();
		$list_city[''] = 'TỈNH THÀNH';
		$temp = City::getList_active_nodes();
		foreach ($temp as $key => $value) {
			if ($value == 1)
			{
				$city = City::model()->findByPk($key);
				$list_city[$city->id] = $city->name;
			}
		}
		
		if (Yii::app()->request->isPostRequest)
		{
			$list_store = array();
			if (!isset(Yii::app()->session['pageSize']))
			Yii::app()->session['pageSize'] = Intro::PAGE_SIZE;
		
			$criteria = new CDbCriteria();
			$criteria -> compare('status',true);
			
			$criteria->order = Intro::SORT;
			
			// get list id of store which has product_id in array of list product sell
			$list_id = Store::getListById($_POST['cid']);
			
			$criteria->addInCondition('id',$list_id);

			$count = Store::model()->count($criteria);
			$pages = new CPagination($count);
			
			$pages->setPageSize(Yii::app()->session['pageSize']);
			$item_count = ceil($count/Yii::app()->session['pageSize']);
			$pages->applyLimit($criteria);
			
			$list_store = Store::model()->findAll($criteria);
		
			$this->renderPartial('_result_search_shop',array('list_store'=>$list_store,'item_count'=>$item_count,'pages'=>$pages,'page_size'=>1,'count'=>$count));
			Yii::app()->end();
		}
		
		$this->render('search_shop',array('list_products'=>$list_products,'list_city'=>$list_city));
	}*/
	
   /**
    * 
    */
    /*public function actionUpdateListCity()
	{
	
		$data=City::model()->findAll('parent_id=:parent_id', 
          array(':parent_id'=>(int) $_POST['location_id']));
	
	    $data=CHtml::listData($data,'id','name');
		
	    foreach($data as $value=>$name)
	    {
	        echo CHtml::tag('option',
	                  array('value'=>$value),CHtml::encode($name),true);
	    }
	}*/
}