<?php
class ContactController extends Controller
{
	public $layout = 'main';
	
	/**
	 * Index
	 */
	/*public function actionIndex()
	{
		$date = date("Ymd");
		$rand = rand(0,9999999999999);
		$height = "60";
		$width  = "200";
		$img    = "$date$rand-$height-$width.jpgx";

		$contact = new Contact();
		$check = false;
		$captcha = false;
		if (isset($_POST['Contact']))
		{
			$contact->attributes = $_POST['Contact'];
			if($contact->save())
				$check = true;
			$captcha = false;
		}

		$this->render('index',array('contact'=>$contact,'check'=>$check,'captcha'=>$captcha,'date'=>$date,'img'=>$img,'height'=>$height,'width'=>$width));
	}*/


    public function actionAjaxContact(){
        if(isset(Yii::app()->request->isAjaxRequest)){
            $result = array();
            $contact = new Contact();
            if(isset($_POST['fullname'])){
                $contact->name = $_POST['fullname'];
            }
            if(isset($_POST['email'])){
                $contact->email = $_POST['email'];
            }
            if(isset($_POST['phone'])){
                $contact->tel = $_POST['phone'];
            }
            if(isset($_POST['title'])){
                $contact->title = $_POST['title'];
            }
            if(isset($_POST['content'])){
                $contact->content = $_POST['content'];
            }
            if(isset($_POST['address'])){
                $contact->address = $_POST['address'];
            }

            if($contact->save()){
                $result['success'] = true;
            }
            else{
                $result['success'] = false;
                $error = $contact->getErrors();
                $result['message'] = $error;
            }

            echo json_encode($result);
            Yii::app()->end();
        }
    }

	/**
	 * Send contact
	 */
	/*public function actionAdd()
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
	}*/

	/**
	 * 
	 */
	 /*public function actionChangeImage()
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
	 }*/

	 /**
	  * 
	  */
	  /*public function actionCheckCaptcha()
	  {
	  	$result = array();
		if(file_get_contents("http://www.opencaptcha.com/validate.php?ans=".$_POST['code']."&img=".$_POST['img'])=='pass') 
			$result['success'] = true;
		else
			$result['success'] = false;
		echo json_encode($result);
	  }*/
}