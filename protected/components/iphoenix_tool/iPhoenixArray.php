<?php
class iPhoenixArray {
	public static function array_diff_multidimensional($array1, $array2) {
		$result = array();
		foreach($array1 as $key => $val) {
		    if(isset($array2[$key])){
		       if(is_array($val)  && is_array($array2[$key])){
		            $result[$key] = self::array_diff_multidimensional($val, $array2[$key]);
		        }
			   else{
			   		if($array1[$key] != $array2[$key])
			   			$result[$key]=$array1[$key];
			   	}
		    } else {
		        $result[$key] = $val;
		    }
		}

    	return $result;
    }
	
	public static function check_array_diff_multidimensional($array1, $array2) {
		$result = false;
		foreach($array1 as $key => $val) {
		    if(isset($array2[$key])){
		       if(is_array($val)  && is_array($array2[$key])){
		            if(self::check_array_diff_multidimensional($val, $array2[$key]))
				   		return true;
		        }
			   else{
			   		if($array1[$key] != $array2[$key])
			   			return true;
			   	}
		    } else {
		        return true;
		    }
		}
		
		foreach($array2 as $key => $val) {
		    if(isset($array1[$key])){
		       if(is_array($val)  && is_array($array1[$key])){
		            if(self::check_array_diff_multidimensional($val, $array1[$key]))
				   		return true;
		        }
			   else{
			   		if($array2[$key] != $array1[$key])
			   			return true;
			   	}
		    } else {
		        return true;
		    }
		}

    	return $result;
    }

}
?>