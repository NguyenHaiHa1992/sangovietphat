<?php
class wContentBox extends CWidget
{
	public $img_width = 200;
	public $img_height = 120;
	public $template = '{thumb}{title}{content}{others}';
	public $data;
	public $view = 'wContentBox';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();
	}

	public function run(){
		if(!isset($this->data))
			$this->data = IPHOENIX::getItem(array('status'=>true));

		$this->render($this->view, array(
			'model'=>$this->data,
			'template'=>$this->template,
			'img_width'=>$this->img_width,
			'img_height'=>$this->img_height,
			'id' => $this->id,
			'class' => $this->class,
		));
	}
}
?>