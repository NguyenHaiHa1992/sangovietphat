<?php 
class wAnalytics extends CWidget
{
	public function init(){
		parent::init();
		
	}
	public function run()
	{ 
		$this->render('analytics_script',array(
		));
	}
}
?>