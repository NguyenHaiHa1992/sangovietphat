<?php 
class wScript extends CWidget
{
	public $js,$css;
	public $view = 'wScript';
        public $version ='';

	public function init(){
		parent::init();
	}
	public function run()
	{
		$this->render($this->view, array(
			'js'=>$this->js,
			'css'=>$this->css,
                        'version' => $this->version,
		));
	}
}