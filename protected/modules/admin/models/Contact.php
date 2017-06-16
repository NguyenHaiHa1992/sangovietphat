<?php

/**
 * This is the model class for table "{{contact}}".
 *
 * The followings are the available columns in table '{{contact}}':
 * @property integer $id
 * @property integer $status
 * @property string $other
 * @property integer $created_time
 */
class Contact extends CActiveRecord
{	
	public $search_end_time;
	public $search_start_time;
	
	private $config_other_attributes=array('reply','content','title');	
	
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
	 * @return Contact the static model class
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
		return '{{contact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email,content,name, tel, title', 'required'),
			array('email','email'),
			array('status', 'boolean'),
			array('reply','required','on'=>'reply'),
			array('created_time', 'numerical', 'integerOnly'=>true),
			array('name,email,tel,address, title', 'length', 'max'=>256),
			array('reply,content', 'length', 'max'=>2048),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, status, created_time, search_start_time, search_end_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title'=>'Title',
			'status' => 'Status',
			'email' => 'Email',
			'tel' => 'Phone',
			'address' => 'Address',
			'name' => 'Full name',
			'content' => 'Content',
			'reply' => 'Reply',
			'created_time' => 'Created time',
			'search_start_time' => 'Search start time',
			'search_end_time' => 'Search end time',

            /*'title'=>iPhoenixLang::admin_t('Title'),
            'status' => iPhoenixLang::admin_t('Status'),
            'email' => 'Email',
            'tel' => iPhoenixLang::admin_t('Phone number'),
            'address' => iPhoenixLang::admin_t('Address'),
            'name' => iPhoenixLang::admin_t('Full name'),
            'content' => iPhoenixLang::admin_t('Content'),
            'reply' => iPhoenixLang::admin_t('Reply'),
            'created_time' => iPhoenixLang::admin_t('Created time'),
            'search_start_time' => iPhoenixLang::admin_t('Search start time'),
            'search_end_time' => iPhoenixLang::admin_t('Search end time'),*/
		);
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
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		
		if($this->search_start_time > 0)
			$criteria->addCondition('created_time >= '.$this->search_start_time);
		
		if($this->search_end_time > 0)
			$criteria->addCondition('created_time <= '.$this->search_end_time);
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'status, id DESC';
		  $sort->attributes = array(
		    'created_time'
		  );
		  $sort->applyOrder($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,                        
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',10)),	
			'sort'=>$sort,			
		));
	}
	
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind(){
		$this->other=json_decode($this->other,true);							
		return parent::afterFind();
	}
	
	/**
	 * This method is invoked before saving a record (after validation, if any).
	 * The default implementation raises the {@link onBeforeSave} event.
	 * You may override this method to do any preparatio work for record saving.
	 * Use {@link isNewRecord} to determine whether the saving is
	 * for inserting or updating record.
	 * Make sure you call the parent implementation so that the event is raised properly.
	 * @return boolean whether the saving should be executed. Defaults to true.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if($this->isNewRecord)
			{
				$this->created_time=time();
				//Send information account			
			}
			$this->other=json_encode($this->other);	
			return true;
		}
	}
	
	protected function afterSave()
	{				
		$this->other=json_decode($this->other,true);	
		if($this->isNewRecord)
		{
			if($this->email != ''){
				$email = new YiiMailMessage ();
				$email->setTo ( $this->email );
				$email->from = array(Yii::app()->params['adminEmail']=>Yii::app()->params['home_name']);
				$email->setSubject ('Notification: Send contact successfully');
                /*$email->setSubject (iPhoenixLang::admin_t('Notification: Send contact successfully'));*/
				$body = 'Hi '.$this->name.'. Your contact has sent successfully at '.date('d/m/Y',$this->created_time).'. It\'s content is '.$this->content.'.';
                /*$body = iPhoenixLang::admin_t('Hi {name}. Your contact has sent successfully at {time}. It\'s content is {content}.',*/
					/*array(
						'{name}'=>$this->name,
						'{time}'=>date('d/m/Y',$this->created_time),
						'{content}'=>$this->content
					)
				);*/
				$email->setBody($body);
				//Yii::app()->mail->send($email);
			}
		}
	    parent::afterSave();
	}
	
	 /**
	 * Get image url which display status of contact
	 * @return string path to enable.png if this status is STATUS_ACTIVE
	 * path to disable.png if status is STATUS_PENDING
	 */
	public function getImageStatus()
	{
		if($this->status) 
			return Yii::app()->theme->baseUrl.'/images/ok.png';
		else
			return Yii::app()->theme->baseUrl.'/images/waiting.png';
	}
}