<?php
class wListItemHome extends CWidget
{
    public $label;
    public $data;
    public $template = '{label}{feature}{no-feature}';
    public $view = 'wListItemHome';
    public $id = '';
    public $class = '';

    public function init(){
        parent::init();
    }

    public function run(){
        if(!isset($this->data))
            $this->data = IPHOENIX::getItems(10, array('status'=>true));

        $this->render($this->view, array(
            'label'=>$this->label,
            'data'=>$this->data,
            'template'=>$this->template,
            'id'=>$this->id,
            'class'=>$this->class,
        ));
    }
}
?>