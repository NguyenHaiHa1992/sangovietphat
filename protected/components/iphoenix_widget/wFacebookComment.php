<?php
class wFacebookComment extends CWidget
{
	public $data = "";
	public $width = "300";
	public $limit = "5";
	public $color = "light";
	public $label = 'Bình luận';

	public $id = '';
	public $class = '';
	public $view = 'wFacebookComment';

	public function init(){
		parent::init();

	}
	public function run()
	{
		if($this->data == "") $this->data = Yii::app()->getBaseUrl(true).Yii::app()->request->requestUri;
		$this->render($this->view, array(
			'data'=>$this->data,
			'width'=>$this->width,
			'limit'=>$this->limit,
			'color'=>$this->color,
			'label'=>$this->label,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>