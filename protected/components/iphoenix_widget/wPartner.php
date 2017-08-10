<?php
class wPartner extends CWidget
{	
        public $id ='partner';
        public $class = "partner";
        public $title = "Partner";
        public $data;
        public $template = '<a href="{detail_url}" target="_blank" rel="nofollow"><img src="[getIntroimage_thumb(120,90)]" width="120px" height="90px" alt="{title_text}" title="{title_text}" class="img-responsive" style="width:120px;height:90px;"><span class="title">{title_text}</span> </a>';
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
                        'template' => $this->template,
		));
	}
}
?>