<?php
class wCarouselSlider extends CWidget
{
    public $data;
    public $view = 'wCarouselSlider';
    public $id = '';
    public $class = '';
    public $row = 4; // set number item in one row
    public $template = "";

    public function init(){
        parent::init();
    }

    public function run(){
        if(!isset($this->data))
            $this->data = IPHOENIX::getItems(10, array('status'=>true));

        $this->render($this->view, array(
            'data'=>$this->data,
            'id'=>$this->id,
            'class'=>$this->class,
            'row' => $this->row,
            'template' => $this->template,
        ));
    }
}
?>