<?php
 // this file must be stored in:
// protected/components/WebUser.php
 
class iPhoenixUser extends CWebUser {
  function getEmail(){
    $user = User::model()->findByPk(Yii::app()->user->id);
	if(isset($user))
    	return $user->email;
  }
  function getFullname(){
    $user = User::model()->findByPk(Yii::app()->user->id);
	if(isset($user))
    	return $user->fullname;
  }
}
?>