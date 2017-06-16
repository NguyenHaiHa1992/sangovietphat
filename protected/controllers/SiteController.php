<?php
/**
 * 
 * SiteController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class SiteController extends Controller
{
	public $layout = 'main';

	/**
	 *  Action for color page
	 */
	public function actionSitemap()
	{
		$model=new UserMenu();
		$list_nodes=$model->list_active_nodes;
		foreach ($list_nodes as $id=>$level) {
			$menu=UserMenu::model()->findByPk($id);
		}
		$list=array();
		$list_active_menu_id=$model->findActiveMenu();
		$previous_id=0;
		$finish=0;
		if(sizeof($list_nodes)>0){
			$first=true;
			foreach ($list_nodes as $id=>$level) {
				$list[$id]['level']=$level;
				if($first==true) {
					$list[$id]['first']=true;
					$first=false;
				}
				if($level==1)$last=$id;
				if($previous_id>0 && $list[$previous_id]['level']<$level){
					$list[$previous_id]['havechild']=true;		
					$list[$id]['first-item']=true;
				}
				if($previous_id>0 && $list[$previous_id]['level']>$level){
					$list[$id]['last-item']=true;		
					$list[$previous_id]['level_close']=$list[$previous_id]['level']-$level;			
				}
				if(in_array($id,$list_active_menu_id)){
					$list[$id]['active'] =true;
				}
				$previous_id=$id;
			}
			$list[$previous_id]['last-item']=true;
			$list[$last]['last']=true;
			$list[$previous_id]['level_close']=$list[$previous_id]['level']-1;
		}
	
		$this->iPhoenixrender('sitemap',array('list'=>$list));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render( 'error', $error );
		}
	}
}
?>
