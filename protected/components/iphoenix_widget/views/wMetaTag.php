<?php
if(isset($data)){
$this->controller->meta_title = iPhoenixTemplate::getProperty($data, 'meta_title');
$this->controller->meta_keyword = iPhoenixTemplate::getProperty($data, 'meta_keyword');
$this->controller->meta_description = iPhoenixTemplate::getProperty($data, 'meta_description');
$this->controller->canonical = iPhoenixTemplate::getProperty($data, 'detail_url');
}
else{
	if(isset($setting)){
		$this->controller->meta_title = Setting::s('META_TITLE_'.$setting, 'SEO');
		$this->controller->meta_keyword = Setting::s('META_DESCRIPTION_'.$setting, 'SEO');
		$this->controller->meta_description = Setting::s('META_DESCRIPTION_'.$setting, 'SEO');
	}	
}
?>