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
class Partner extends CActiveRecord
{
	public $search_date;
	public $search_end_time;
	public $search_start_time;
	public $tos;
	public $confirmpword;
	public  $old_pass,$new_pass;
	public $role=array();
	public $old_role=array();
	private $config_other_attributes=array('app_name', 'app_url','firstname','lastname','website','cpi','bank_account','phone','address');	
	
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
		return '{{partner}}';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, app_name, email, firstname, lastname, phone, address', 'required'),
            array('email', 'email', 'message' => 'Email không hợp lệ'),
            array('password', 'compare', 'compareAttribute' => 'confirmpword', 'on' => 'register'),
            array('tos', 'compare', 'compareValue' => 1, 'message' => 'Bạn chưa đồng ý với quy định của Toiapp','on'=>'register'),
            array('email', 'unique'),
            //array('role', 'validatorRole'),
            array('password', 'length', 'min' => 6, 'message' => "Password ít nhất phải có 6 ký tự trở lên"),
            array('phone,introimage_id, file_id', 'numerical', 'integerOnly' => true),
            array('phone', 'length', 'min' => 10, 'max' => 12),
            array('created_time', 'numerical', 'integerOnly'=>true),
            array('status', 'boolean'),
            array('confirmpword,tos,website,cpi,bank_account, app_url','safe'),
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
	
	public function checked(){
		
	}
	/**
	 * 
	 * Function validator role
	 * @param unknown_type $attributes
	 * @param unknown_type $params
	 */
	public function validatorOldPassword($attributes,$params){
		$user=Partner::model()->findByPk(Yii::app()->user->id);
		if(!$user->validatePassword($this->old_pass)){
			$this->addError('old_pass','Password không chính xác');
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
			'introimage'=>array(self::BELONGS_TO,'Image','introimage_id'),
			'file'=>array(self::BELONGS_TO,'File','file_id'),
			'app'=>array(self::BELONGS_TO,'App','partner_id'),
			'appstatistic'=> array(self::BELONGS_TO,'AppStatistics','partner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'password' => 'Password',
			'file_id'=>'Upload file apk',
			'email' => 'Email',
			'status' => 'Trạng thái',
			'fullname'=> 'Họ và tên',
			'firstname'=> 'Tên',
			'lastname' => 'Họ',
			'bank_account' => 'Thông tin tài khoản ngân hàng',
			'introimage_id' => 'Ảnh đại diện',
			'address'=> 'Địa chỉ',
			'phone'=> 'Điện thoại',
			'created_time'=> 'Thời điểm tạo',
			'created_by' => 'Người tạo',
			'old_password'=> 'Password cũ',
			'new_password'=> 'Password mới',
			'confirmpword'=> 'Gõ lại password',
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
				//$this->created_by=Yii::app()->user->id;
				$this->status=false;
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
		return $this->lastname.' '.$this->firstname;
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
	 *  get quantity install by partner
	 */
	 public static function getStatistics($start_time, $end_time){
		$id = Yii::app()->user->id;;
		$sql = "SELECT DISTINCT (app_id), phone_id, count(status) as count, created_time FROM tbl_appstatistics WHERE partner_id=" . $id . " AND status=1 AND created_time >=" . $start_time . " AND created_time <=" .$end_time. " GROUP BY phone_id, app_id ORDER BY created_time ASC";
		$statistics = Yii::app() -> db -> createCommand($sql) -> queryAll();
		return $statistics;
	 }
	 /**
	 *  get quantity install by partner
	 */
	 public static function getStatisticsday($start_time, $end_time){
		$id = Yii::app()->user->id;;
		$sql = "SELECT DISTINCT (app_id),phone_id, count(status) as count, created_time FROM tbl_appstatistics WHERE partner_id=" . $id . " AND status=1 AND created_time >=" . $start_time . " AND created_time <=" .$end_time. " GROUP BY app_id ORDER BY created_time ASC";
		$statistics = Yii::app() -> db -> createCommand($sql) -> queryAll();
		return $statistics;
	 }
	 
	 
	 /**
	 *  get quantity install have CPI
	 */
	 public static function getStatisticsCPI($start_time, $end_time){
		$id = Yii::app()->user->id;;
		$sql = "SELECT DISTINCT (app_id), phone_id, count(status) as count, created_time FROM tbl_appstatistics WHERE partner_id=" . $id . " AND status=1 AND created_time >=" . $start_time . " AND created_time <=" .$end_time. " AND app_id IN (SELECT id FROM tbl_app WHERE status = 1 AND type = 1 AND partner_id =".$id.") GROUP BY phone_id, app_id ORDER BY created_time ASC";
		$statistics = Yii::app() -> db -> createCommand($sql) -> queryAll();
		return $statistics;
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
	    'file_id',
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
	 * Generates active-key
	 * @return string active_key
	 */
	 
	 public function generateActiveKey($length)
	{
		$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$activekey = "";
		while ($i <= $length) {
			$activekey .= $chars{rand(0,strlen($chars)-1)};
			$i++;
		}
		return $activekey;
	}

}