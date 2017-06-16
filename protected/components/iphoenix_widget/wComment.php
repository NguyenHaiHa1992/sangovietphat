<?php 
class wComment extends CWidget
{
	public $data;
	public $class = '';
	public $id = '';
	public $view = 'wComment';
	public $label = 'Bình luận';

	public function init(){
		parent::init();
	}

	public function run()
	{
		if(!isset($this->data))
			$this->data = IPHOENIX::getItem(array('status'=>true));

		$this->render($this->view, array(
			'data'=>$this->data,
			'label'=>$this->label,
			'class'=>$this->class,
			'id'=>$this->id,
		));
	}
}
?>