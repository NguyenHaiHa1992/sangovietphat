<?php
class wContact extends CWidget
{
	public $label;
	public $template = '{info}{form}';
	public $template_info = '{name}{email}{phone}{fax}';
	public $template_form = '{name}{phone}{content}';
	public $view = 'wContact';
	public $id = '';
	public $class = '';

	public function init(){
		parent::init();

	}
	public function run()
	{
		
		$this->render($this->view, array(
			'label'=>$this->label,
			'template'=>$this->template,
			'template_info'=>$this->template_info,
			'template_form'=>$this->template_form,
			'id'=>$this->id,
			'class'=>$this->class,
		));
	}
}
?>