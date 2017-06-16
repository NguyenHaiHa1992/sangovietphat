<?php
/**
 * 
 * issueForm class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class issueForm extends CFormModel
{
	/**
	 * @var string $task_id
	 */
	public $id;
	/**
	  * @var boolean $status
	  */
	 public $status;
	/**
	 * @var string $name
	 */	
	public $name;
	/**
	 * @var string $description
	 */	
	public $description;
	/**
	 * @var array $comment
	 */	
	public $comment;
	/**
	 * @var string $created_time
	 */	
	public $created_time;
	
	public $file_id;
	
	public $list = array('0'=>'All','1'=>'Waiting','2'=>'Doing','3'=>'Done','4'=>'Finish');
	/**
	 * Declares the validation rules.
	 * The rules state that email and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('name, description','required','on'=>'create'),
			array('name,file_id, description','safe'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'content'=>'Bình luận',
			'name'=>'Tên Ticket',
			'file_id'=>'File đính kèm',
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'file' => array(self::MANY_MANY, 'issueForm', 'tbl_plan_image(plan_id, image_id)'),
		);
	}
}
