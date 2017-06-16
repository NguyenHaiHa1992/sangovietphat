<?php
class SupporterController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list intro is ordered by order_view and created_time desc
	 */
	public function actionIndex($type="")
	{
		$criteria = new CDbCriteria();
		$criteria->compare('status',true);
		$criteria->order = Supporter::SORT;
		$list_supporter = Supporter::model()->findAll($criteria);

		// List audio
		if (!isset(Yii::app()->session['audioPageSize']))
			Yii::app()->session['audioPageSize'] = Audio::PAGE_SIZE;
	
		$criteria = new CDbCriteria();
		$criteria->compare('status',true);
		if(isset($_GET['keyword_audio']))
			$criteria->compare('name', $_GET['keyword_audio'], true);
		$criteria->order = Audio::SORT;

		$count = Audio::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['audioPageSize']);
		$item_count = ceil($count/Yii::app()->session['audioPageSize']);
		if(isset($_GET['ajax']) && $_GET['ajax'] == true)
			if($_GET['cat'] == 'audio' && isset($_GET['page']))
				$pages->setCurrentPage($_GET['page'] - 1);
		$pages->applyLimit($criteria);

		$list_audio = Audio::model()->findAll($criteria);

		// Video page size
		if (!isset(Yii::app()->session['videoPageSize']))
			Yii::app()->session['videoPageSize'] = Video::PAGE_SIZE;

		$criteria = new CDbCriteria();
		$criteria->compare('status',true);
		$criteria->compare('cat_id', 19);
		if(isset($_GET['keyword_video']))
			$criteria->compare('name', $_GET['keyword_video'], true);
		$criteria->order = Video::SORT;

		$count_video = Video::model()->count($criteria);
		$pages_video = new CPagination($count_video);
		$pages_video->setPageSize(Yii::app()->session['videoPageSize']);
		$item_count_video = ceil($count_video/Yii::app()->session['videoPageSize']);
		if(isset($_GET['ajax']) && $_GET['ajax'] == true)
			if($_GET['cat'] == 'video' && isset($_GET['page']))
				$pages_video->setCurrentPage($_GET['page'] - 1);
		$pages_video->applyLimit($criteria);

		$list_video = Video::model()->findAll($criteria);

		if(isset($_GET['ajax']) && $_GET['ajax'] == true){
			if($_GET['cat'] == 'audio'){
				$view = '_form_audio';
			}
			if($_GET['cat'] == 'video'){
				$view = '_form_video';
			}
			$this->renderPartial($view, array(
				'list_audio'=>$list_audio,
				'item_count' => $item_count,
				'pages' => $pages,
				'page_size' => 1,
				'count' => $count,
				'list_video'=>$list_video,
				'item_count_video' => $item_count_video,
				'pages_video' => $pages_video,
				'page_size_video' => 1,
				'count_video' => $count_video
			));
		}

		else
			$this->iPhoenixRender('index',array(
				'list_supporter'=>$list_supporter,
				'list_audio'=>$list_audio,
				'item_count' => $item_count,
				'pages' => $pages,
				'page_size' => 1,
				'count' => $count,
				'list_video'=>$list_video,
				'item_count_video' => $item_count_video,
				'pages_video' => $pages_video,
				'page_size_video' => 1,
				'count_video' => $count_video,
			));
	}
}