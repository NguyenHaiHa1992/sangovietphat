<?php
class wPartner extends CWidget
{	
        public $id ='partner';
        public $class = "partner";
        public $title = "Partner";
        public $data;
	public function init(){
		parent::init();
	}

	public function run(){
		$partners = Banner::getBannerPosition(Banner::CAT_BANNER_PARTNER, 0);
		$this->render('wPartner', array(
			'data' 	=> $partners, // array
                        'id' => $this->id,
                        'class' => $this->class,
                        'title' => $this->title,
		));
	}
}
?>