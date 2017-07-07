<?php
class wFooter extends CWidget
{	
	public function init(){
		parent::init();
	}

	public function run(){
		// $footer = News::model()->findByPk(Setting::s('FOOTER_ID', 'INFORMATION'));
		$criteria  = new CDbCriteria;
		$criteria->select = 'id, name';
		$criteria->condition = 'status = 1';
		$criteria->order = 'order_view , id';
		$listMenu = SystemStore::model()->findAll($criteria);
		
		$menus = array();
		$childs = array();

		foreach($listMenu as $menu){
			$hashtag  = iPhoenixString::getHashtashFromname($menu->name);
			$m = array(
				'id' => $menu->id,
				'name' => $menu->name,
				'hashtag' => $hashtag,
			);
			array_push($menus, $m);
			$criteria  = new CDbCriteria;
			$criteria->select = 'id , name , parent_id , content, mobile, address';
			$criteria->condition ='status = 1 AND parent_id =:parent_id';
			$criteria->order = 'order_view , id';
			$criteria->params =array(':parent_id' => $menu->id);
			$listChild = SystemAddress::model()->findAll($criteria);
			$childs[$hashtag ] = $listChild;
		}


		$this->render('wFooter', array(
			// 'footer'	=>	$footer,
			'menus' 	=> 	$menus, // array
			'childs' 	=> 	$childs, // array object (parent => (childs))
                        'isMobile'      =>      $this->isMobile(),
		));
	}
        
        public function isMobile() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }
}
?>