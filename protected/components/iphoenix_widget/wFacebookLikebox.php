<?php
class wFacebookLikebox extends CWidget
{
	public $data = "https://www.facebook.com/ihb.vietnam";
	public $width = "300";
	public $height = "420";
	public $color = "light";
	public $face = true;
	public $header = true;
	public $stream = false;
	public $border = true;
	public $label = 'Follow Us';
	public $view = 'wFacebookLikebox';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		$this->render($this->view, array(
			'data'=>$this->data,
			'width'=>$this->width,
			'height'=>$this->height,
			'color'=>$this->color,
			'face'=>$this->face,
			'header'=>$this->header,
			'stream'=>$this->stream,
			'border'=>$this->border,
			'label'=>$this->label,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>