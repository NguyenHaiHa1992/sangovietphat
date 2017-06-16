<?php 
class wFeed extends CWidget
{
	public function init(){
		parent::init();
		
	}
	public function run()
	{
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', false );
		$list_contact = Contact::model()->findAll($criteria);

		$criteria = new CDbCriteria ();
		$criteria->compare ( 'status', false );
		$list_comment = Comment::model()->findAll($criteria);

		$this->render('feed',array(
			'list_contact'=>$list_contact,
			'list_comment'=>$list_comment,
		));
	}
}
?>