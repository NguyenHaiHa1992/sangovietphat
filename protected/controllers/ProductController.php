<?php
class ProductController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list product is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		if (!isset(Yii::app()->session['productPageSize']))
			Yii::app()->session['productPageSize'] = Product::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = Product::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['productPageSize']);
		$item_count = ceil($count/Yii::app()->session['productPageSize']);
		$pages->applyLimit($criteria);

		$list_product = Product::model()->findAll($criteria);

		$this->iPhoenixRender('index',array(
			'list_product'=>$list_product,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}

	/**
	 * display index page: list product is ordered by order_view and created_time desc
	 */
	public function actionListByCategory($alias)
	{
		if (!isset(Yii::app()->session['productPageSize']))
			Yii::app()->session['productPageSize'] = Product::PAGE_SIZE;

		// Check $alias is category or city
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $alias);
		$category = ProductCategory::model()->find($criteria);

		// If $alias is category
		if(isset($category)){
			$criteria = new CDBCriteria();
			$criteria->compare('status',true);
			$criteria->compare('cat_id',$category->id);
			$criteria->order = "order_view desc, id desc";

			$count = Product::model()->count($criteria);
			$pages = new CPagination($count);
			$pages->setPageSize(Yii::app()->session['productPageSize']);
			$item_count = ceil($count/Yii::app()->session['productPageSize']);
			$pages->applyLimit($criteria);

			$list_product = Product::model()->findAll($criteria);

			$this->iPhoenixRender('list-category',array(
				'list_product'=>$list_product,
				'item_count' => $item_count,
				'pages' => $pages,
				'page_size' => 1,
				'count' => $count,
				'category' => $category
			));
		}
	}

	public function actionListByCity($alias){
		if (!isset(Yii::app()->session['productPageSize']))
			Yii::app()->session['productPageSize'] = Product::PAGE_SIZE;

		// Check $alias is category or city
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $alias);
		$city = ProductCityCategory::model()->find($criteria);

		if(isset($city)){
			$alias = str_replace('-', ' ', $alias);
			$criteria = new CDBCriteria();
			$criteria->compare('status',true);
			$criteria->compare('list_city',$alias, true);
			$criteria->order = "order_view desc, id desc";
	
			$count = Product::model()->count($criteria);
			$pages = new CPagination($count);
			$pages->setPageSize(Yii::app()->session['productPageSize']);
			$item_count = ceil($count/Yii::app()->session['productPageSize']);
			$pages->applyLimit($criteria);
	
			$list_product = Product::model()->findAll($criteria);
	
			$this->iPhoenixRender('list-by-city',array(
				'list_product'=>$list_product,
				'item_count' => $item_count,
				'pages' => $pages,
				'page_size' => 1,
				'count' => $count,
				'city' => $city
			));
		}
	}

	/**
	 * display detail a news page
	 */
	/*public function actionView($product_alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $product_alias);
		$product = Product::model()->find($criteria);
		$product->visited();

		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('product_id', $product->id);
		$list_qa = Qa::model()->findAll($criteria);

		$comment = new Comment();
		$list_comment = $comment->getListByParent($product->id,'Product');

		$list_suggest_product = $product->getList_suggest_product();
		$list_suggest_news = $product->getList_suggest_news();
		$list_video = $product->getList_suggest_video();

		$this->iPhoenixRender('view',array(
			'product'=>$product,
			'list_comment'=>$list_comment,
			'list_suggest_product'=>$list_suggest_product,
			'list_qa'=>$list_qa,
			'list_video'=>$list_video,
			'list_suggest_news'=>$list_suggest_news
		));
	}*/

	/**
	 * display detail a news page
	 */
	public function actionViewCityInfo($alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $alias);
		$city = ProductCityCategory::model()->find($criteria);

		$this->iPhoenixRender('view-city-intro',array(
			'city'=>$city
		));
	}

	/**
	 * display detail a news page
	 */
	public function actionViewCityDev($alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $alias);
		$city = ProductCityCategory::model()->find($criteria);

		$this->iPhoenixRender('view-city-dev',array(
			'city'=>$city
		));
	}

	public function actionAddToCart($id){
		if(!isset(Yii::app()->session['cart'])){
			Yii::app()->session['cart'] = array($id=>1);
		}
		else {
			$cart = Yii::app()->session['cart'];
			if(isset($cart[$id]))
				unset($cart[$id]);
			else
				$cart[$id] = 1;
			Yii::app()->session['cart'] = $cart;
		}
		echo count(Yii::app()->session['cart']);
	}

	public function actionViewCart(){
		$list_product = array();
		if(isset(Yii::app()->session['cart'])){
			$cart = Yii::app()->session['cart'];
			foreach($cart as $id=>$quantity){
				$product = Product::model()->findbyPk($id);
				if(isset($product)){
					$a = array('0'=>$quantity, '1'=>$product);
					$list_product[] = $a;
				} 
			}
		}

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

		$this->iPhoenixRender('cart', array('list_product'=>$list_product, 'list_city'=>$list_city));
	}

	public function actionUpdateCart(){
		if(Yii::app()->request->isAjaxRequest && isset($_POST['cart'])){
			$cart = Yii::app()->session['cart'];
			foreach($_POST['cart'] as $i=>$item){
				$id = $item[0];
				$quantity = $item[1];
				$cart[$id] = $quantity;
			}
			Yii::app()->session['cart'] = $cart;
			echo true;
		}
	}

	public function actionSendCart(){
		if(Yii::app()->request->isAjaxRequest && isset($_POST['cart'])){
			$cart = Yii::app()->session['cart'];
			foreach($_POST['cart'] as $i=>$item){
				$id = $item[0];
				$quantity = $item[1];
				$cart[$id] = $quantity;
			}
			Yii::app()->session['cart'] = $cart;

			if(count($cart) > 0){
				$order = new Order();
				$order->name = $_POST['name'];
				$order->phone = $_POST['phone'];
				$order->email = $_POST['email'];
				$order->tel = $_POST['tel'];
				$order->address = $_POST['address'];
				$order->note = $_POST['note'];
				$order->province_id = $_POST['province_id'];
				$order->district_id = $_POST['district_id'];
				$order->created_by = Yii::app()->user->id;
				if($order->save()){
					$value = 0;
					foreach($cart as $id=>$quantity){
						$product = Product::model()->findbyPk($id);
						if(isset($product)){
							$orderProduct = new OrderProduct();
							$orderProduct->order_id = $order->id;
							$orderProduct->product_id = $id;
							$orderProduct->quantity = $quantity;
							$orderProduct->price = $product->price;
							$orderProduct->name = $product->name;
							$orderProduct->save();
							$value = $value + $quantity * $product->price;
						}
					}
					$order->value = $value;
					if($order->save()){
						echo json_encode(array('success'=>true,'id'=>$order->id));
						Yii::app()->session['cart'] = array();
						Yii::app()->end();
					}
				}
			}
			echo json_encode(array('success'=>false));
			Yii::app()->end();
		}
	}
}