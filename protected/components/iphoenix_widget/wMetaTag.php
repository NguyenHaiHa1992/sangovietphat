<?php
class wMetaTag extends CWidget
{
	public $view = 'wMetaTag';
	public $data;
	public $setting = 'DEFAULT';

	public function init(){
		parent::init();

	}
	public function run()
	{
		$this->render($this->view, array(
			'data'=>$this->data,
			'setting'=>$this->setting
		));
	}
}
?>