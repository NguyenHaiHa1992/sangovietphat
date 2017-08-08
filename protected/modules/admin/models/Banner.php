<?php

/**
 * This is the model class for table "{{banner}}".
 *
 * The followings are the available columns in table '{{banner}}':
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $cat
 * @property integer $image_id
 * @property string $other
 * @property integer $clicks
 * @property integer $order_view
 * @property integer $created_by
 * @property integer $created_time
 */
class Banner extends CActiveRecord
{
	const CAT_BANNER_HEADLINE=0;
	const CAT_BANNER_CENTER=1;
	const CAT_BANNER_RIGHT=2;
	const CAT_BANNER_LEFT=3;
	const CAT_BANNER_PARTNER=4;
	const CAT_BANNER_SUPPORT=5;
	const CAT_BANNER_LEFT_PANEL=6;
    const CAT_BANNER_LOGO=7;
    const CAT_BANNER_FAVICON=8;
    const CAT_BANNER_SLIDER=9;
    const CAT_BANNER_BACKGROUND_HEADER=10;
    const CAT_BANNER_BACKGROUND_HEADER_MOBILE = 11;
	
	static $list_cat=array(
		self::CAT_BANNER_HEADLINE,
		self::CAT_BANNER_CENTER,
		self::CAT_BANNER_RIGHT,
		self::CAT_BANNER_LEFT,
		self::CAT_BANNER_PARTNER,
		self::CAT_BANNER_SUPPORT,
		self::CAT_BANNER_LEFT_PANEL,
                self::CAT_BANNER_LOGO,
                self::CAT_BANNER_FAVICON,
                self::CAT_BANNER_SLIDER,
                self::CAT_BANNER_BACKGROUND_HEADER,
                self::CAT_BANNER_BACKGROUND_HEADER_MOBILE,
           
	);
	
	static $view_list_cat=array(
		self::CAT_BANNER_HEADLINE=>'Banner headline',
		self::CAT_BANNER_CENTER=>'Banner giữa',
		self::CAT_BANNER_RIGHT=>'Banner phải',
		self::CAT_BANNER_LEFT=>'Banner trái',
		self::CAT_BANNER_PARTNER=>'Banner đối tác',
		self::CAT_BANNER_SUPPORT=>'Banner trang tư vấn',
		self::CAT_BANNER_LEFT_PANEL=>'Banner cột trái',
                self::CAT_BANNER_LOGO=>'Logo',
                self::CAT_BANNER_FAVICON=>'Favicon',
                self::CAT_BANNER_SLIDER=>'Ảnh slide trang chủ',
                self::CAT_BANNER_BACKGROUND_HEADER=>'Hình nền header',
                self::CAT_BANNER_BACKGROUND_HEADER_MOBILE=>'Hình nền header Mobile',
	);
	
	private $config_other_attributes=array('url','slogan','description');	
	
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
	 * @return Banner the static model class
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
		return '{{banner}}';
	}
	
	/**
	 * Config scope of banner
	 */
	public function defaultScope(){
		$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
		return array(
			'condition'=>'language = "'.$language.'"',
		);	
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cat, url', 'required'),
			array('image_id, order_view, clicks', 'numerical', 'integerOnly'=>true),
			array('status', 'boolean'),
			array('name,slogan, description', 'length', 'max'=>256),
			array('cat','in','range'=>self::$list_cat),
			array('image_id','validatorImage'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, name, cat, content', 'safe', 'on'=>'search'),
		);
	}

	/**
	 *
	 * Function validator category
	 */
	public function validatorImage($attributes,$params){
		if(!isset($this->image)){
				$this->addError('image_id', 'Image invalid');
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
			'author'=>array(self::BELONGS_TO,'User','created_by'),
			'image'=>array(self::BELONGS_TO,'Image','image_id'),
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
			'name' => iPhoenixLang::admin_t('Name'),
			'cat' => iPhoenixLang::admin_t('Category'),
			'image_id' => iPhoenixLang::admin_t('Thumb image'),
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'order_view' => iPhoenixLang::admin_t('Order view'),
			'clicks' => iPhoenixLang::admin_t('Clicks'),
			'slogan'=>iPhoenixLang::admin_t('Slogan'),
			'description'=>iPhoenixLang::admin_t('Description')
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cat',$this->cat);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'cat DESC, order_view DESC, id DESC';
		  $sort->attributes = array(
		    'created_by',
		    'cat',
		    'name',
		    'created_time',
		    'order_view',
		    'clicks'
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
				$this->created_by=Yii::app()->user->id;
				$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
				$this->language=$language;
				if(!is_array($this->other))
					$this->other=array();
			}
			$this->other=json_encode($this->other);	
			return true;
		}
	}
	
	protected function afterSave()
	{				
		$this->other=json_decode($this->other,true);	
	    parent::afterSave();
	}
	
	 /**
	 * Copy banner
	 */
	 public function copy($cat=null,$name=null){
	 	$cat=isset($cat)?$cat:$this->cat;
		$name=isset($name)?$name:$this->name.'_copy';
		$copy_banner=new Banner();
		$copy_banner->name=$name;
		$copy_banner->cat=$cat;
		$copy_banner->slogan=$this->slogan;
		$copy_banner->image_id=$this->image_id;
		$copy_banner->url=$this->url;
		if($copy_banner->save())
			return $copy_banner;
		else 
			return null;
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
	 * Suggests a list of existing names matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestName($keyword,$limit=20)
	{
		$list_banner=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_banner as $banner)
			$names[]=$banner->name;
			return $names;
	}
	 
	 /*
	  * Visited
	  */
	 public function clicked(){
	 	$this->clicks=$this->clicks+1;
		$this->save();
	}
	 
	 /**
	  * 
	  */
	 static function getBannerPosition($position,$limit)
	 {
	 	$list = array();
		
		$criteria = new CDbCriteria();
		$criteria->compare('cat',$position);
		$criteria->compare('status',true);
		$criteria->order = 'order_view desc, created_time desc';
		
		if ($limit != 0)
			$criteria->limit = $limit;

		$list = Banner::model()->findAll($criteria);
		
		return $list;
	}

	 static function getItem($type = null)
	 {
	 	$list = array();
		
		$criteria = new CDbCriteria();
		if(isset($type)) $criteria->compare('cat',$type);
		$criteria->compare('status',true);

		$item = Banner::model()->find($criteria);
		
		return $item;
	}

	 static function getItems($type = null,$limit = 1)
	 {
	 	$list = array();
		
		$criteria = new CDbCriteria();
		if(isset($type)) $criteria->compare('cat',$type);
		$criteria->compare('status',true);
		$criteria->order = 'order_view desc, created_time desc';
		
		if ($limit != 0)
			$criteria->limit = $limit;

		$list = Banner::model()->findAll($criteria);
		
		return $list;
	}

	public function getThumbSrc($width = 100, $height = 100, $scale = false){
		if(isset($this->image))
			return $this->image->getAbsoluteThumbUrl($width, $height, $scale);
	}
        
        public function getIntroimage_thumb($width,$height,$ratio = true){
            if(isset($this->image))
                return $this->image->getAbsoluteThumbUrl($width,$height,$ratio);
            return Yii::app()->theme->baseUrl.'/images/data/no_image.jpg';
        }
        
        /*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return $this->url;
	 }
}