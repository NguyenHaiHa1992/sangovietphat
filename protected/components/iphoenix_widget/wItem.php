<?php
class wItem extends CWidget
{
    public $data;
    public $view = 'wItem';
    public $template = '';

    public function init(){
        parent::init();
    }

    public function run(){
        if(!isset($this->data))
            $this->data = Product::getItem(array('status'=>true));

        $this->render($this->view, array(
            'data'=>$this->data,
            'template'=>$this->template,
        ));
    }
}
?>