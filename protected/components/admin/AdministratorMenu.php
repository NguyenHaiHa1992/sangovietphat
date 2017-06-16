<?php 
class AdministratorMenu extends CWidget
{
	public function init(){
		parent::init();
		
	}
	public function run()
	{ 
		$model=new AdminMenu();
		$list_nodes=$model->list_active_nodes;
		foreach ($list_nodes as $id=>$level) {
			$menu=AdminMenu::model()->findByPk($id);
			$config=$model->getConfig_url();

			if(isset($config[$menu->key_url]) && !Yii::app ()->user->checkAccess ($menu->key_url))
				unset($list_nodes[$id]);
		}

		$list=array();
		$list_active_menu_id=$model->findActiveMenu();		
		$previous_id=0;
		$finish=0;
		$last = 0;
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
		$this->render('adminMenu',array(
			'list'=>$list,
		));
	}
	}
?>