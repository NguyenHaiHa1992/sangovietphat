<?php

/**
 * 
 * User class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
/**
 * This is the model class for table "tbl_user".
 */
class User extends CActiveRecord
{
	/**
	 * config times typing password
	 */
	const LIMIT_INCORRECT=5;
	const LENGTH_PASSWORD=10;
	
	public  $old_password,$new_password,$confirm_password;
	public $role=array();
	public $old_role=array();
	
	private $config_other_attributes=array('firstname','lastname','phone','address');	
	
	/**
	 * PHP setter magic method for other attributes
	 * @param $name the attribute name
	 * @param $value the attribute value
	 * set value into particular attribute
	 */
	public function __set($name,$value)
	{
		if(in_array($name,$this->config_other_attributes)){
			$other=$this->other;
			$other[$name]=$value;
			$this->other=$other;
		}
		else 
			parent::__set($name,$value);
	}
	
	/**
	 * PHP getter magic method for other attributes
	 * @param $name the attribute name
	 * @return value of {$name} attribute
	 */
	public function __get($name)
	{
		if(in_array($name,$this->config_other_attributes))
			if(isset($this->other[$name])) 
				return $this->other[$name];
			else 
		 		return null;
		else
			return parent::__get($name);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email','required'),
			array('email', 'unique'),
			array('status', 'boolean'),			
			array('role', 'validatorRole'),
			array('email','email'),
			array('created_time', 'numerical', 'integerOnly'=>true),
			array('firstname,lastname,phone,address', 'length', 'max'=>256),
			array('email', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 * 
	 * Function validator role
	 * @param unknown_type $attributes
	 * @param unknown_type $params
	 */
	public function validatorRole($attributes,$params){
		foreach ($this->role as $role) {
			if(!in_array($role, array_keys(AuthItem::getList_all_roles()))){
				$this->addError('role', 'Không tồn tại quyền này');
			}
		}
	}
	/**
	 * 
	 * Function validator role
	 * @param unknown_type $attributes
	 * @param unknown_type $params
	 */
	public function validatorOldPassword($attributes,$params){
		$user=User::model()->findByPk(Yii::app()->user->id);
		if(!$user->validatePassword($this->old_password)){
			$this->addError('old_password','Password không chính xác');
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'password' => iPhoenixLang::admin_t('Password'),
			'email' => iPhoenixLang::admin_t('Email'),
			'role' => iPhoenixLang::admin_t('Role'),
			'status' => iPhoenixLang::admin_t('Status'),
			'lastname'=> iPhoenixLang::admin_t('Last name'),
			'firstname'=> iPhoenixLang::admin_t('First name'),
			'fullname'=> iPhoenixLang::admin_t('Fullname'),
			'address'=> iPhoenixLang::admin_t('Address'),
			'phone'=> iPhoenixLang::admin_t('Phone'),
			'created_time'=> iPhoenixLang::admin_t('Created time'),
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'last_visit_date'=> iPhoenixLang::admin_t('Latest visit time'),
			'old_password'=> iPhoenixLang::admin_t('Old password'),
			'new_password'=> iPhoenixLang::admin_t('New password'),
			'confirm_password'=> iPhoenixLang::admin_t('Confirm password')
		);
	}
	
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind()
	{
		$this->other=json_decode($this->other,true);		
		//Set role of user
		$list_roles=Yii::app()->authManager->getRoles($this->id);
		foreach ($list_roles as $name=>$role){
			$this->role[]=$name;
		}
		//Set old_role 
		$this->old_role=$this->role;
		return parent::afterFind();
	}
	
	/**
	 * This method is invoked before saving a record (after validation, if any).
	 * The default implementation raises the {@link onBeforeSave} event.
	 * You may override this method to do any preparation work for record saving.
	 * Use {@link isNewRecord} to determine whether the saving is
	 * for inserting or updating record.
	 * Make sure you call the parent implementation so that the event is raised properly.
	 * @return boolean whether the saving should be executed. Defaults to true.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->created_time=time();
				$this->created_by=Yii::app()->user->id;
				$this->status=true;
			}	
			$this->other=json_encode($this->other);	
			return true;
		}
		else
			return false;
	}
	/**
	 * This method is invoked after saving a record successfully.
	 * The default implementation raises the {@link onAfterSave} event.
	 * You may override this method to do postprocessing after record saving.
	 * Make sure you call the parent implementation so that the event is raised properly.
	 */
	protected function afterSave()
	{
		$this->other=json_decode($this->other,true);	
		$this->addRoles(array_values(array_diff($this->role,$this->old_role)));
		$this->removeRoles(array_values(array_diff($this->old_role,$this->role)));
		parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();

		$criteria=new CDbCriteria();
		$criteria->addCondition('userid ='.$this->id);				
		AuthAssignment::model()->deleteAll($criteria);		
	}

	 /**
	 * Get image url which display status of contact
	 * @return string path to enable.png if this status is STATUS_ACTIVE
	 * path to disable.png if status is STATUS_PENDING
	 */
	public function getImageStatus()
	{
		if($this->status) 
			return Yii::app()->theme->baseUrl.'/images/enable.png';
		else
			return Yii::app()->theme->baseUrl.'/images/disable.png';
	}
		
	
	/*
	 * Get full name of user
	 */
	public function getFullname(){
		return $this->firstname.' '.$this->lastname;
	}	
	
	
	//Handler add and romove roles
	public function addRoles($list)
	{
		foreach ($list as $role){
			Yii::app()->authManager->assign($role,$this->id);
		}
	}
	public function removeRoles($list)
	{
		foreach ($list as $role){
			Yii::app()->authManager->revoke($role,$this->id);
		}
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($condition_search=null)
	{
		if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('status',$this->status);
		$criteria->compare('email',$this->email,true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		
	  $sort = new CSort();
	  $sort->defaultOrder = 'id DESC';
	  $sort->attributes = array(
	    'created_by',
	    'created_time',
	    'status',
	    'email',
	  );
	  $sort->applyOrder($criteria);
	  
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
    		'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',10)),	
			'sort'=>$sort,	
		));
	}
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	public function generateSalt()
	{
		return uniqid('',true);
	}
	/**
	 * Suggests a list of existing email matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching email 
	 */
	public function suggestEmail($keyword,$limit=20)
	{
		$users=$this->findAll(array(
			'condition'=>'email LIKE :keyword',
			'order'=>'email DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($users as $user)
			$names[]=$user->email;
			return $names;
	}
	/**
	 * Generates password.
	 * @return string password
	 */
	public function generatePassword($length)
	{
		$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$password = "";
		while ($i <= $length) {
			$password .= $chars{rand(0,strlen($chars)-1)};
			$i++;
		}
		return $password;
	}
}