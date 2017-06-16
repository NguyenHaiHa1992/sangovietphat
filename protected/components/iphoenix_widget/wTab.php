<?php
class wTab extends CWidget
{
	public $tab_nav = array('Tab 1', 'Tab 2');
	public $tab_content = array('Đây là nội dung của Tab 1', 'Đây là nội dung của Tab 2');
	public $view = 'wTab';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		$this->render($this->view, array(
			'tab_nav'=>$this->tab_nav,
			'tab_content'=>$this->tab_content,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>