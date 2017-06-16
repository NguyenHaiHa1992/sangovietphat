<?php
 // this file must be stored in:
// protected/components/WebUser.php
 
class iPhoenixCustomer extends CWebUser {
 
  function getEmail(){
    $customer = Customer::model()->findByPk(Yii::app()->user->id);
	if(isset($customer))
    	return $customer->email;
  }
  function getName(){
    $customer = Customer::model()->findByPk(Yii::app()->user->id);
	if(isset($customer))
    	return $customer->fullname;
  }
}
?>