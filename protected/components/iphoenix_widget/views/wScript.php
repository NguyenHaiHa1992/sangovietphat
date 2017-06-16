<?php
$baseThemeUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$list_js = explode(',', $js);
$list_css = explode(',', $css);
foreach($list_js as $j){
	$j = str_replace(' ', '', $j);
	$cs->registerScriptFile($baseThemeUrl.'/js/'.$j);
}
foreach($list_css as $c){
	$c = str_replace(' ', '', $c);
	$cs->registerCssFile($baseThemeUrl.'/css/'.$c);
}
;?>