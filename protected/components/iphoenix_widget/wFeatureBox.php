<?php
class wListBox extends CWidget
{
	public $label;
	public $data;
	public $feature = 0;
	public $template = '{label}{feature}{no-feature}';
	public $template_feature = '';
	public $template_nofeature = '{thumb}{title}{datetime}{author}{content}';
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
			'feature'=>$this->feature,
			'template'=>$this->template,
			'template_feature'=>$this->template_feature,
			'template_nofeature'=>$this->template_nofeature,
			'id'=>$this->id,
			'class'=>$this->class,
			'innerClass'=>$this->innerClass
		));
	}
}
?>