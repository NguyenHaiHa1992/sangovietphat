<?php
class iPhoenixTemplate {
	static $default_text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
	static function parseTemplate($model, $template){
		 $result = '';
		 $property = '';
		 $method = '';
		 $check_property = false;
		 $check_method = false;
		 $arr_template = str_split(trim($template));

		 foreach($arr_template as $t){
		 	switch ($t) {
				 case '{':
					 $check_property = true;
					 break;

				 case '}':
					 $check_property = false;
					 $result = $result.iPhoenixTemplate::getProperty($model, $property);
					 $property = '';
					 break;

				 case '[':
					 $check_method = true;
					 break;

				 case ']':
					 $check_method = false;
					 $result = $result.iPhoenixTemplate::getMethod($model, $method);
					 $method = '';
					 break;

				 default:
					if($check_property == true) $property = $property.$t;
					if($check_method == true) $method = $method.$t;
					if($check_property == false && $check_method == false) $result = $result.$t;

					break;
			 }
		 }

		 return $result;
	}
	
	static function createMessage($string, $type){
		if($type == 'success' || $type == 'error' || $type == 'notice')
			return '<div class="flash-'.$type.'">'.$string.'</div>';
	}

	// Get static of $model
	static function getProperty($model, $data, $length = 10){
		if(isset($model) && is_object($model) && class_exists(get_class($model))){
			if(isset($model->$data)) return $model->$data;
			if(isset($model->other)){
				$other = $model->other;
				if(isset($other[$data])){
					return $other[$data];
				}
				else
					return (Yii::app()->params['dev_mode'] == 'html')?iPhoenixString::createIntrotext(self::$default_text, $length):'';
			}
			else return (Yii::app()->params['dev_mode'] == 'html')?iPhoenixString::createIntrotext(self::$default_text, $length):'';
		}
		else return (Yii::app()->params['dev_mode'] == 'html')?iPhoenixString::createIntrotext(self::$default_text, $length):'';
	}

	// Get method of $model
	static function getMethod($model, $method, $length = 10){
		if(isset($model) && is_object($model) && class_exists(get_class($model))){
			preg_match('/([\w\_\d]+)\(([\w\W]*)\)/', $method, $method_parse);

			if(isset($method_parse[1]) && isset($method_parse[2])){
				if($method_parse[2] != '')
					$params = explode(',', $method_parse[2]);
				else
					$params = array();
		
				if($params == false) $params = array();
				$result = call_user_func_array(array($model, $method_parse[1]), $params);
				if($result){
					return $result;
				}
			}
			else return (Yii::app()->params['dev_mode'] == 'html')?iPhoenixString::createIntrotext(self::$default_text, $length):'';
		}
		else return (Yii::app()->params['dev_mode'] == 'html')?iPhoenixString::createIntrotext(self::$default_text, $length):'';
	}

	static function getParams(){
		foreach($_GET as $key => $value){
			
		}
	}
}
?>