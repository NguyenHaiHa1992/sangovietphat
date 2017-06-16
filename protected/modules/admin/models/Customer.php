<?php

/**
 * 
 * Customer class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
/**
 * This is the model class for table "tbl_customer".
 */
class Customer extends CActiveRecord
{
	/**
	 * config times typing password
	 */
	const LIMIT_INCORRECT=5;
	const LENGTH_PASSWORD=10;

	public $old_password,$new_password,$confirm_password;

	private $config_other_attributes=array();	
	
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
		return '{{customer}}';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive customer inputs.
		return array(
			array('email, fullname, address, phone','required'),
			array('email', 'unique'),
			array('status', 'boolean'),
			array('email','email'),
			array('created_time, province_id, district_id', 'numerical', 'integerOnly'=>true),
			array('fullname,tel,phone,address', 'length', 'max'=>256),
			array('email, province_id, district_id, created_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * 
	 * Function validator role
	 * @param unknown_type $attributes
	 * @param unknown_type $params
	 */
	public function validatorOldPassword($attributes,$params){
		$customer=Customer::model()->findByPk(Yii::app()->user->id);
		if(!$customer->validatePassword($this->old_password)){
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
		return array(
			'district'=>array(self::BELONGS_TO,'City','district_id'),
			'province'=>array(self::BELONGS_TO,'City','province_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'password' => 'Password',
			'email' => 'Email',
			'status' => 'Status',
			'fullname'=> 'Full name',
			'province_id'=>'Province/city',
			'district_id'=>'District',
			'address'=> 'Address',
			'phone'=> 'Mobile phone',
			'tel'=>'Telephone',
			'created_time'=> 'Created time',
			'created_by' => 'Creator',
			'last_visit_date'=> 'Last login time',
			'old_password'=> 'Old password',
			'new_password'=> 'New password',
			'confirm_password'=> 'Confirm password',
		);
	}
	
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind()
	{
		$this->other=json_decode($this->other,true);		

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
				if(!Yii::app()->user->isGuest)
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
		parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();

		$criteria=new CDbCriteria();
		$criteria->addCondition('customerid ='.$this->id);				
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
		$criteria->compare('created_by',$this->created_by);
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
		$customers=$this->findAll(array(
			'condition'=>'email LIKE :keyword',
			'order'=>'email DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($customers as $customer)
			$names[]=$customer->email;
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