<?php
class wBreadcrumb extends CWidget
{
	public $data;
	public $sample;
	public $view = 'wBreadcrumb';
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
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>