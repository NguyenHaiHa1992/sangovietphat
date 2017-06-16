<?php
class wPopup extends CWidget
{
	public $data = "";
	public $width = "600";
	public $height = "400";
	public $label = 'Popup';
	public $view = 'wPopup';
	public $id = 'ModalSample';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		
		$this->render($this->view, array(
			'data'=>$this->data,
			'label'=>$this->label,
			'width'=>$this->width,
			'height'=>$this->height,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>