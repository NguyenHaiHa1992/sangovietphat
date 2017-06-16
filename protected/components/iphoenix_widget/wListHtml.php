<?php
class wListHtml extends CWidget
{
	public $data;
	public $view = 'wListHtml';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		
		$this->render($this->view, array(
			'data'=>$this->data,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>