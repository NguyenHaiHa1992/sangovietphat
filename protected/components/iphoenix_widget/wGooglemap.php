<?php

class wGooglemap extends CWidget{
    public $view = 'wGooglemap';
    public $toadoX;
    public $toadoY;
    public $address;
    public $id = 'map';
    public $zoom = 6;
    
    public function init() {
        if(!$this->toadoX){
            $this->toadoX = Setting::s('GOOGLE_MAP_X', 'INFORMATION');
        }
        if(!$this->toadoY){
            $this->toadoY = Setting::s('GOOGLE_MAP_Y', 'INFORMATION');
        }
        if(!$this->address){
            $this->address = Setting::s('GOOGLE_MAP_ADDRESS', 'INFORMATION');
        }
        parent::init();
    }
    
    public function run() {
        $this->render($this->view,array(
            'toadoX'    => $this->toadoX,
            'toadoY'    => $this->toadoY,
            'address'   => $this->address,
            'id'        => $this->id,
            'zoom'      => $this->zoom,
        ));
    }
}
?>
