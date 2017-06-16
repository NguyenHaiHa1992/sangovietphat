<?php
class wBanner extends CWidget
{
	public $view = 'wBanner';
	public $data;
	public $sample;
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		$this->render($this->view, array(
			'data'=>$this->data,
			'sample'=>$this->sample,
			'view'=>$this->view,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>