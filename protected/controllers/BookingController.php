<?php
class BookingController extends Controller
{
	public $layout = 'main';
	
	/**
	 * Index
	 */
	public function actionIndex()
	{
		$date = date("Ymd");
		$rand = rand(0,9999999999999);
		$height = "60";
		$width  = "200";
		$img    = "$date$rand-$height-$width.jpgx";

		$booking = new Booking();
		$check = false;
		$captcha = false;
		if (isset($_POST['Booking']))
		{
			$booking->attributes = $_POST['Booking'];
			if($booking->save())
				$check = true;
			$captcha = false;
		}

		$this->render('index',array('booking'=>$booking,'check'=>$check,'captcha'=>$captcha,'date'=>$date,'img'=>$img,'height'=>$height,'width'=>$width));
	}

	/**
	 * Send contact
	 */
	public function actionAdd()
	{
		$result = array();
		$contact = new Contact();
		$check = false;
		$captcha = false;
		if (isset($_POST['Contact']))
		{
			$contact->attributes = $_POST['Contact'];

			if($contact->save()){
				$check = true;
				$result['success'] = true;
			}
			else{
				$result['success'] = false;
				$captcha = false;
			}
		}

		echo json_encode($result);
	}

	/**
	 * 
	 */
	 public function actionChangeImage()
	 {
	 	$result = array();
		
		$date = date("Ymd");
		$rand = rand(0,9999999999999);
		$height = "60";
		$width  = "200";
		$img    = "$date$rand-$height-$width.jpgx";
		
		$result['success'] = true;
		$result['img'] = $img;
		
		echo json_encode($result);
	 }

	 /**
	  * 
	  */
	  public function actionCheckCaptcha()
	  {
	  	$result = array();
		if(file_get_contents("http://www.opencaptcha.com/validate.php?ans=".$_POST['code']."&img=".$_POST['img'])=='pass') 
			$result['success'] = true;
		else
			$result['success'] = false;
		echo json_encode($result);
	  }
}