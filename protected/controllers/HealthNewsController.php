<?php
class HealthNewsController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list healthNews is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		//Get list healthNews category
		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->order = "order_view asc";
		$list_category = HealthNewsCategory::model()->findAll($criteria);

		if (!isset(Yii::app()->session['healthNewsPageSize']))
			Yii::app()->session['healthNewsPageSize'] = HealthNews::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = HealthNews::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['healthNewsPageSize']);
		$item_count = ceil($count/Yii::app()->session['healthNewsPageSize']);
		$pages->applyLimit($criteria);

		$list_healthNews = HealthNews::model()->findAll($criteria);

		$this->iPhoenixRender('index',array(
			'list_category'=>$list_category,
			'list_healthNews'=>$list_healthNews,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}

	/**
	 * display index page: list healthNews is ordered by order_view and created_time desc
	 */
	public function actionAjaxList($first, $last, $id)
	{
		$range = $last - $first + 1;
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = "id desc";
		$criteria->limit = $range;
		if($id > 0) $criteria->addCondition('id < '.$id);

		$list_healthNews = HealthNews::model()->findAll($criteria);

		$result = array();

		$i = 0;
		foreach($list_healthNews as $healthNews){
			$i++;
			$result[] = $this->renderPartial('_form', array('healthNews'=>$healthNews, 'i'=>$i, 'range'=>$range),true, false);
		}

		echo json_encode($result);
	}

	/**
	 * display list healthNews by category id
	 */
	public function actionListByCategory($cat_alias)
	{
		//Get list healthNews category
		$criteria = new CDBCriteria();
		$criteria->compare('alias', $cat_alias);
		$criteria->compare('status',true);
		$category = HealthNewsCategory::model()->find($criteria);

		if (!isset(Yii::app()->session['healthNewsPageSize']))
			Yii::app()->session['healthNewsPageSize'] = HealthNews::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('cat_id',$category->id);
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = HealthNews::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['healthNewsPageSize']);
		$item_count = ceil($count/Yii::app()->session['healthNewsPageSize']);
		$pages->applyLimit($criteria);

		$list_healthNews = HealthNews::model()->findAll($criteria);

		$this->iPhoenixRender('list-category',array(
			'category'=>$category,
			'list_healthNews'=>$list_healthNews,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}
	
	/**
	 * display detail a healthNews page
	 */
	public function actionView($cat_alias, $healthNews_alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $healthNews_alias);
		$healthNews = HealthNews::model()->find($criteria);
		$healthNews->visited();

		$comment = new Comment();
		$list_comment = $comment->getListByParent($healthNews->id,'HealthNews');

		$list_suggest_healthNews = $healthNews->getList_suggest_healthNews();;

		$this->iPhoenixRender('view',array(
			'healthNews'=>$healthNews,
			'list_comment'=>$list_comment,
			'list_suggest_healthNews'=>$list_suggest_healthNews,
		));
	}
}