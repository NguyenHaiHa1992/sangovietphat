<?php
class iPhoenixLang {
	static function admin_t($str,$cat='', $params=array()){
		if($cat == '') $cat = Yii::app()->controller->id;

	    return Yii::t('AdminModule.'.$cat, $str,$params,null, Yii::app()->params['admin_lang']);
	}
}
?>