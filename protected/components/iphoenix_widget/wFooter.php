<?php
class wFooter extends CWidget
{	
	public function init(){
		parent::init();
	}

	public function run(){
		$footer = News::model()->findByPk(Setting::s('FOOTER_ID', 'INFORMATION'));
		$this->render('wFooter', array(
			'footer'=>$footer,
		));
	}
}
?>