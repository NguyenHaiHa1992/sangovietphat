<?php
class RecruitmentController extends Controller
{
	public $layout = 'home_layout';
	
	/**
	 * display index page: list news is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		$list_recruitment = array();
		if (!isset(Yii::app()->session['pageSize']))
			Yii::app()->session['pageSize'] = News::PAGE_SIZE;
		
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->addCondition('order_view != 1');
		
		$criteria->order = News::SORT;
		
		$count = Recruitment::model()->count($criteria);
		$pages = new CPagination($count);
		
		$pages->setPageSize(Yii::app()->session['pageSize']);
		$item_count = ceil($count/Yii::app()->session['pageSize']);
		$pages->applyLimit($criteria);
		
		$list_recruitment = Recruitment::model()->findAll($criteria);
		
		// get recruitment intro
		$intro = Recruitment::introRe();
		
		$this->iPhoenixRender('index',array('intro'=>$intro,'list_recruitment'=>$list_recruitment,'item_count'=>$item_count,'pages'=>$pages,'page_size'=>1,'count'=>$count));
	}

	
	/**
	 * display detail a news page
	 */
	public function actionView($id)
	{
		$recruitment = Recruitment::model()->findByPk($id);
		$recruitment->visited();
		
		$list_suggest_recruitment = $recruitment->getList_suggest_recruitment();
		
		// get recruitment intro
		$intro = Recruitment::introRe();
		
		$this->iPhoenixRender('view',array('recruitment'=>$recruitment,'intro'=>$intro,'list_suggest_recruitment'=>$list_suggest_recruitment));
	}

}