<?php 
class wMenu extends CWidget
{
	public $responsive = true;
	public $data;
	public $view = 'wMenu';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();
	}
	public function run()
	{
		$this->render($this->view, array(
			'responsive' => $this->responsive,
			'data' => $this->data,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}