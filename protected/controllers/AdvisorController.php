<?php
class AdvisorController extends Controller
{
	public $layout = 'main';

	/**
	 * display index page: list advisor is ordered by order_view and created_time desc
	 */
	public function actionIndex()
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$list_advisor = Advisor::model()->findAll($criteria);

		$this->iPhoenixRender('index',array(
			'list_advisor'=>$list_advisor,
		));
	}

	/**
	 * display index page: list advisor is ordered by order_view and created_time desc
	 */
	public function actionAjaxList($first, $last, $id)
	{
		$range = $last - $first + 1;
		$criteria = new CDbCriteria();
		$criteria -> compare('status',true);
		$criteria->order = "id desc";
		$criteria->limit = $range;
		if($id > 0) $criteria->addCondition('id < '.$id);

		$list_advisor = Advisor::model()->findAll($criteria);

		$result = array();

		$i = 0;
		foreach($list_advisor as $advisor){
			$i++;
			$result[] = $this->renderPartial('_form', array('advisor'=>$advisor, 'i'=>$i, 'range'=>$range),true, false);
		}

		echo json_encode($result);
	}

	/**
	 * display list advisor by category id
	 */
	public function actionListByCategory($cat_alias)
	{
		//Get list advisor category
		$criteria = new CDBCriteria();
		$criteria->compare('alias', $cat_alias);
		$criteria->compare('status',true);
		$category = AdvisorCategory::model()->find($criteria);

		if (!isset(Yii::app()->session['advisorPageSize']))
			Yii::app()->session['advisorPageSize'] = Advisor::PAGE_SIZE;

		$criteria = new CDBCriteria();
		$criteria->compare('cat_id',$category->id);
		$criteria->compare('status',true);
		$criteria->order = "order_view desc, id desc";

		$count = Advisor::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->setPageSize(Yii::app()->session['advisorPageSize']);
		$item_count = ceil($count/Yii::app()->session['advisorPageSize']);
		$pages->applyLimit($criteria);

		$list_advisor = Advisor::model()->findAll($criteria);

		$this->iPhoenixRender('list-category',array(
			'category'=>$category,
			'list_advisor'=>$list_advisor,
			'item_count' => $item_count,
			'pages' => $pages,
			'page_size' => 1,
			'count' => $count
		));
	}
	
	/**
	 * display detail a advisor page
	 */
	public function actionView($advisor_alias)
	{
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('alias', $advisor_alias);
		$advisor = Advisor::model()->find($criteria);
		$advisor->visited();

		$this->iPhoenixRender('view',array(
			'advisor'=>$advisor,
		));
	}
}