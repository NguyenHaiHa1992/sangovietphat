<?php
class ShareController extends Controller
{
	public $layout = 'home_layout';
	
	/**
	 * display index page: list share is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		$list_shares = array();
		if (!isset(Yii::app()->session['pageSize']))
			Yii::app()->session['pageSize'] = News::PAGE_SIZE;

		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria -> order = 'order_view desc, created_time desc';
		
		$criteria->order = News::SORT;
		
		$count = Share::model()->count($criteria);
		$pages = new CPagination($count);
		
		$pages->setPageSize(Yii::app()->session['pageSize']);
		$item_count = ceil($count/Yii::app()->session['pageSize']);
		$pages->applyLimit($criteria);
		
		$list_share = Share::model()->findAll($criteria);
		
		$this->iPhoenixRender('index',array('list_share'=>$list_share,'item_count'=>$item_count,'pages'=>$pages,'page_size'=>1,'count'=>$count));
	}
	
	/**
	 * 
	 */
	public function actionView($id)
	{
		$share = Share::model()->findByPk($id);
		$share->visited();

		$c = new Comment();
		$list_comments = $c->getListByParent($id,'Share');

		$list_suggest_share = $share->getList_suggest_share();
		
		$this->iPhoenixRender('view',array('share'=>$share,'list_suggest_share'=>$list_suggest_share,'list_comments'=>$list_comments));
	}
}