<?php
/**
* 
*/
class wFooterLink extends CWidget
{
	public $class;
	public $view ='wFooterLink';
	public $id;
	public $data;
	
	public function init(){
		parent::init();
	}

	public function run(){
		$this->render($this->view, array(
			'id' => $this->id,
			'class' => $this->class,
			'data' => $this->data,
		));
	}
}
?>