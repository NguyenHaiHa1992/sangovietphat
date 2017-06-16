<?php
class wFacebookLibrary extends CWidget
{
	public $view = 'wFacebookLibrary';
	public function init(){
		parent::init();

	}
	public function run()
	{
		
		$this->render($this->view);
	}
}
?>