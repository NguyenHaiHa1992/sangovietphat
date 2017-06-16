<?php
class wSlider extends CWidget
{
	public $data;
	public $label;
	public $template = '{label}{feature}{no-feature}';
	public $view = 'wSlider';
	public $id = '';
	public $class = '';
	public $limit = 10;

	public function init(){
		parent::init();

	}
	public function run()
	{
		if(!isset($this->data))
			$this->data = IPHOENIX::getItems(10, array('status'=>true));
		$this->render($this->view, array(
			'data'=>$this->data,
			'id'=>$this->id,
			'class'=>$this->class,
			'limit'=>$this->limit,
			'template'=>$this->template,
			'label'=>$this->label
		));
	}
}
?>