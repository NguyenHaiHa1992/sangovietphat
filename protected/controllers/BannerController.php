<?php
class BannerController extends Controller
{
	public $layout = 'home_layout';
	
	/**
	 *
	 */
	public function actionClick()
	{
		$result = array();
		
		$banner = Banner::model()->findByPk($_POST['id']);
		$banner->clicked();
		
		$result['success'] = true;
	
		echo json_encode($result);
	}
}