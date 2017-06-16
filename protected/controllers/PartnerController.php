<?php
class PartnerController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list news is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		if (!isset(Yii::app()->session['partnerPageSize']))
			Yii::app()->session['partnerPageSize'] = News::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = Partner::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['partnerPageSize']);
		$item_count = ceil($count/Yii::app()->session['partnerPageSize']);
		$pages->applyLimit($criteria);

		$list_partner = Partner::model()->findAll($criteria);

		$this->iPhoenixRender('index',array(
			'list_partner'=>$list_partner,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}

	/**
	 * display list news by category id
	 */
	public function actionListByCategory($cat_alias)
	{
		//Get list news category
		$criteria = new CDBCriteria();
		$criteria->compare('alias', $cat_alias);
		$criteria->compare('status',true);
		$category = NewsCategory::model()->find($criteria);

		if (!isset(Yii::app()->session['newsPageSize']))
			Yii::app()->session['newsPageSize'] = News::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('cat_id',$category->id);
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = News::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['newsPageSize']);
		$item_count = ceil($count/Yii::app()->session['newsPageSize']);
		$pages->applyLimit($criteria);

		$list_news = News::model()->findAll($criteria);

		$this->iPhoenixRender('list-category',array(
			'category'=>$category,
			'list_news'=>$list_news,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}
	
	/**
	 * display detail a news page
	 */
	public function actionView($partner_alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $partner_alias);
		$partner = Partner::model()->find($criteria);
		$partner->visited();

		$this->iPhoenixRender('view',array(
			'partner'=>$partner,
		));
	}
}