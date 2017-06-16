<?php
class wListBox extends CWidget
{
	public $label;
	public $data;
	public $template = '{thumb}{title}{datetime}{author}{content}';
	public $view = 'wListBox';
	public $id = '';
	public $class = '';
	public $innerClass = 'inner';

	public function init(){
		parent::init();
	}

	public function run(){
		if(!isset($this->data))
			$this->data = IPHOENIX::getItems(10, array('status'=>true));

		$this->render($this->view, array(
			'label'=>$this->label,
			'data'=>$this->data,
			'template'=>$this->template,
			'id'=>$this->id,
			'class'=>$this->class,
			'innerClass'=>$this->innerClass
		));
	}
}
?>