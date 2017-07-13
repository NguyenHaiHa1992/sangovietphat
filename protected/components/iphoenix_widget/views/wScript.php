<?php
$baseThemeUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$list_js = explode(',', $js);
$list_css = explode(',', $css);
foreach($list_js as $j){
	$j = str_replace(' ', '', $j);
        if($version){
            $j .= '?v=' .$version;
        }
	$cs->registerScriptFile($baseThemeUrl.'/js/'.$j);
}
foreach($list_css as $c){
	$c = str_replace(' ', '', $c);
        if($version){
            $c .= '?v=' .$version;
        }
	$cs->registerCssFile($baseThemeUrl.'/css/'.$c);
}
;?>