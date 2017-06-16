<?php
class iPhoenixTime {
	static function date($time){
		switch (date('D',$time)) {
			case 'Sun':
				$date='Chủ nhật';
				break;			
			case 'Mon':
				$date='Thứ 2';
				break;		
			case 'Mon':
				$date='Thứ 2';
				break;			
			case 'Tue':
				$date='Thứ 3';
				break;			
			case 'Wed':
				$date='Thứ 4';
				break;			
			case 'Thu':
				$date='Thứ 5';
				break;			
			case 'Fri':
				$date='Thứ 6';
				break;			
			case 'Sat':
				$date='Thứ 7';
				break;			
		}
		
		return $date.', '.date('d/m/Y',$time);
	}
	static function convertStringDateTime($string){
		if($string != ''){
			$tmp=explode(' ',$string);
			$tmp_date=explode('/',$tmp[0]);
			$day=$tmp_date[0];
			$month=$tmp_date[1];
			$year=$tmp_date[2];
			$tmp_time=explode(':',$tmp[1]);
			$hour=$tmp_time[0];
			$minute=$tmp_time[1];
			return mktime($hour,$minute,0,$month,$day,$year);	
		}
		else{
			return 0;
		}
	}
	
	static function convertStringTime($string){
		if($string != ''){
			$tmp_time=explode(':',$string);
			$hour=$tmp_time[0];
			$minute=$tmp_time[1];
			return mktime($hour,$minute,0,0,0,0);		
		}
		else{
			return 0;
		}
	}
}
?>