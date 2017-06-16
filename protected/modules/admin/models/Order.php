<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property integer $id
 * @property integer $status
 * @property string $other
 * @property integer $created_time
 */
class Order extends CActiveRecord
{
	public $search_end_time;
	public $search_start_time;
		
	private $config_other_attributes=array('content','note','value');	
	
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
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email,address, phone, name, province_id, district_id', 'required'),
			array('email','email'),
			array('status', 'boolean'),
			array('created_time,created_by, value, province_id, district_id', 'numerical', 'integerOnly'=>true),
			array('name,email,tel,address', 'length', 'max'=>256),
			array('content, note', 'length', 'max'=>2048),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, status, created_time, search_start_time, search_end_time, created_by', 'safe', 'on'=>'search'),
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
			'customer'=>array(self::BELONGS_TO,'Customer','created_by'),
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
			'id' => 'ID',
			'status' => iPhoenixLang::admin_t('Status'),
			'email' => iPhoenixLang::admin_t('Email'),
			'tel' => iPhoenixLang::admin_t('Telephone'),
			'phone'=>iPhoenixLang::admin_t('Mobile phone'),
			'address' => iPhoenixLang::admin_t('Address'),
			'province_id' => iPhoenixLang::admin_t('Province/City'),
			'district_id' => iPhoenixLang::admin_t('District'),
			'name' => iPhoenixLang::admin_t('Full name'),
			'note' => iPhoenixLang::admin_t('Note'),
			'reply' => iPhoenixLang::admin_t('Reply'),
			'created_by'=> iPhoenixLang::admin_t('Created by'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'search_start_time' => iPhoenixLang::admin_t('Start time'),
			'search_end_time' => iPhoenixLang::admin_t('End time'),
			'detail_order' => iPhoenixLang::admin_t('Order detail'),
			'value'=>iPhoenixLang::admin_t('Order value'),
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
		$criteria->compare('address',$this->address, true);
		$criteria->compare('name',$this->name, true);
		$criteria->compare('email',$this->email, true);
		$criteria->compare('phone',$this->email, true);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('created_by',$this->created_by);
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
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',50)),	
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
				$email->setSubject ( 'Thông báo: Gửi đơn hàng thành công' );
				$email->setBody('Dược Phẩm Á Âu xin chào Quý Khách '.$this->name.',<br />Quý khách nhận được email này vì hệ thống đã ghi nhận đơn hàng của Quý Khách vào thời điểm '.date('d/m/Y',$this->created_time).'.<br />Đơn hàng có ID là <b>'.$this->id.'</b>. Hàng sẽ được chuyển về địa chỉ sau: "'.$this->address.', '.$this->district->name.', '.$this->province->name.'". Với lưu ý là: "'.$this->note.'".<br />Bộ phận bán hàng sẽ liên hệ để xác nhận với Quý Khách trong thời gian ngắn nhất.<br />Xin trân trọng cảm ơn!','text/html');
				Yii::app()->mail->send($email);
			}	
		}
	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
			
		$criteria=new CDbCriteria();
		$criteria->addCondition('order_id ='.$this->id);				
		OrderProduct::model()->deleteAll($criteria);		
	}
	
	
	 /**
	 * Get image url which display status of order
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
	/*
	 * Get detail order
	 */
	 public function getDetail_order(){
	 	$result=array();
	 	$criteria=new CDbCriteria();
		$criteria->compare('order_id',$this->id);
		$list_order_product=OrderProduct::model()->findAll($criteria);
		foreach ($list_order_product as $item) {
			$detail=array();
			$detail['quantity']=$item->quantity;
			$detail['price']=$item->price;
			$detail['name']=$item->name;
			$result[$item->product_id]=$detail;
		}
		return $result;
	 }
	/*
	 * Set detail order
	 */
	 public function setDetail_order($list){
	 	if($this->id > 0){
		 	foreach ($list as $product_id => $detail) {
		 		$criteria=new CDbCriteria();
				$criteria->compare('order_id',$this->id);
				$criteria->compare('product_id',$product_id);
				$order_product=OrderProduct::model()->find($criteria);
				if(!isset($order_product)){
					$order_product=new OrderProduct();
					$order_product->order_id=$this->id;
					$order_product->product_id=$product_id;
				}
				$order_product->quantity=$detail['quantity'];
				$product=Product::model()->findByPk($product_id);
				$order_product->price=$product->price;
				$order_product->save();
			 }
		}
	}

	public function suggestName($keyword,$limit=20)
	{
		$list_news=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_news as $news)
			$titles[]=$news->name;
			return $titles;
	}

	public function suggestEmail($keyword,$limit=20)
	{
		$list_news=$this->findAll(array(
			'condition'=>'email LIKE :keyword',
			'order'=>'email DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_news as $news)
			$titles[]=$news->email;
			return $titles;
	}

	public function suggestPhone($keyword,$limit=20)
	{
		$list_news=$this->findAll(array(
			'condition'=>'phone LIKE :keyword',
			'order'=>'phone DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_news as $news)
			$titles[]=$news->phone;
			return $titles;
	}
}