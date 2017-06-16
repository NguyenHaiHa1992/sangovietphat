<?php

/**
 * This is the model class for table "{{store}}".
 *
 * The followings are the available columns in table '{{store}}':
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $city_id
 * @property integer $introimage_id
 * @property string $other
 * @property int order_view
 * @property boolean home
 * @property boolean new
 * @property integer $visits
 * @property integer $created_by
 * @property integer $created_time
 */
class Store extends CActiveRecord
{
	public $tmp_product_ids;
	
	private $config_other_attributes=array('tel','mobile','address','meta_keyword','meta_description','meta_title');	
	
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
	 * @return Store the static model class
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
		return '{{store}}';
	}
	
	/**
	 * Config scope of store
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
			array('name,tel,mobile, city_id, address,meta_keyword,meta_description,meta_title', 'required'),
			array('city_id, introimage_id,tel, mobile, order_view, visits', 'numerical', 'integerOnly'=>true),
			array('status,home,new', 'boolean'),
			array('city_id','validatorCity'),
			array('introimage_id','validatorIntroimage'),
			array('address', 'length', 'max'=>80000),
			array('name,meta_keyword,meta_description,meta_title', 'length', 'max'=>256),
			array('tmp_product_ids,tel,mobile','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, name, city_id, address, new, home', 'safe', 'on'=>'search'),
		);
	}

	/**
	 *
	 * Function validator category
	 */
	public function validatorIntroimage($attributes,$params){
		if($this->introimage_id > 0 && !isset($this->introimage)){
				$this->addError('introimage_id', 'Introimage invalid');
		}		
	}
		
	/**
	 *
	 * Function validator category
	 */
	public function validatorCity($attributes,$params){
		if(!isset($this->city)){
				$this->addError('city_id', 'City invalid');
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
			'introimage'=>array(self::BELONGS_TO,'Image','introimage_id'),
			'city'=>array(self::BELONGS_TO,'City','city_id'),
			'store_product' => array(self::HAS_MANY,'StoreProduct','store_id'),
			'products'=>array(self::MANY_MANY,'Product','tbl_store_product(store_id,product_id)'),
			//'list_suggest_store' => array(self::MANY_MANY, 'Store', 'tbl_suggest_store(store_id, to_store_id)'),
		);
	}
	
	/**
	 * @return get list suggest news rental
	 */
	 public function getList_suggest_store(){
	 	if ($this->id > 0 ){
	 	$criteria=new CDbCriteria();
		$criteria->compare('store_id',$this->id);
		$tmp=SuggestStore::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {
			$news=Store::model()->findByPk($item->to_store_id);
			if(isset($news))
			$result[]=$news;
		}
		}
		else {
			$result = array();
		}
		return $result;
	 }
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Trạng thái',
			'name' => 'Tên nhà thuốc',
			'city_id' => 'Thành Phố',
			'introimage_id' => 'Ảnh giới thiệu',
			'address' => 'Địa chỉ',
			'meta_title' => 'Meta Title',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'created_by' => 'Người đăng',
			'created_time' => 'Thời điểm đăng',
			'tmp_product_ids' => 'Các loại sản phẩm bán',
			'order_view' => 'Mức ưu tiên hiển thị',
			'home' => 'Hiển thị ở trang chủ',
			'new' => 'Hiển thị ở mục Nhà thuốc mới',
			'visits' => 'Lượt xem',
			'tel'=>'Điện thoại bàn',
			'mobile'=>'Điện thoại đi động',
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
		$criteria->compare('new',$this->new);
		$criteria->compare('home',$this->home);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('name',$this->name,true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		//Filter city_id
		// $cat = StoreCategory::model ()->findByPk ( $this->city_id );
		// if ($cat != null) {
			// $child_categories = $cat->child_nodes;
			// $list_child_id = array ();
			// //Set itself
			// $list_child_id [] = $cat->id;
			// if ($child_categories != null)
				// foreach ( $child_categories as $id => $child_cat ) {
					// $list_child_id [] = $id;
				// }
			// $criteria->addInCondition ( 'city_id', $list_child_id );
		// }
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'order_view DESC, id DESC';
		  $sort->attributes = array(
		    'city_id',
		    // 'created_by',
		    'created_time',
		    'name',
		    'status',
		    'order_view',
	   		'visits'
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
		$criteria=new CDbCriteria();
		$criteria->compare('store_id',$this->id);
		$tmp=SuggestStore::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {			
			$result[]=$item->to_store_id;
		}	
		$this->tmp_product_ids=implode(',',$result);		
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
		// $new_list_suggest_ids=explode(',',$this->tmp_product_ids);
		// foreach ($new_list_suggest_ids as $store_id) {
			// if($store_id != $this->id){
				// $criteria=new CDbCriteria();
				// $criteria->compare('store_id',$this->id);
				// $criteria->compare('to_store_id',$store_id);
				// $suggest_store=SuggestStore::model()->find($criteria);
				// if(!isset($suggest_store)){
					// $suggest_store=new SuggestStore();
					// $suggest_store->store_id=$this->id;
					// $suggest_store->to_store_id=$store_id;
					// $suggest_store->save();
				// }
			// }
// 			
		// }		
		// $list_current_suggest_ids=$this->list_current_suggest_ids;
		// foreach ($list_current_suggest_ids as $store_id) {
			// if(!in_array($store_id,$new_list_suggest_ids) || $store_id == $this->id) {
				// $criteria=new CDbCriteria();
				// $criteria->compare('store_id',$this->id);
				// $criteria->compare('to_store_id',$store_id);				
				// SuggestStore::model()->deleteAll($criteria);
			// }
		// }
		$_list = array();
		$list = explode(',',$this->tmp_product_ids);
		
		foreach ($this->store_product as $key) {
			$_list[] = $key->product_id;
		}
		
		$criteria = new CDBCriteria();
		$criteria->compare('store_id',$this->id);
		$criteria->addNotInCondition('product_id',$list);
		StoreProduct::model()->deleteAll($criteria);
			
		foreach ($list as $product_id) {
			if (!in_array($product_id, $_list))
			{
				$dp = new StoreProduct();
				$dp->store_id = $this->id;
				$dp->product_id = $product_id;
				$dp->save();
			}
		}
	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
		
		$criteria=new CDbCriteria();
		$criteria->addCondition('store_id ='.$this->id);
		StoreProduct::model()->deleteAll($criteria);		
		// SuggestStore::model()->deleteAll($criteria);
			
	}
	
	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_store;
		$result=array();				
		foreach ($list as $store) {
			$result[]=$store->id;
		}
		return $result;
	}
	 /**
	 * Copy store
	 */
	 public function copy($city_id=null,$name=null){
	 	$city_id=isset($city_id)?$city_id:$this->city_id;
		$name=isset($name)?$name:$this->name.'_copy';
		
		$copy_store=new Store();
		$copy_store->name=$name;
		$copy_store->city_id=$city_id;
		$copy_store->home=$this->home;
		$copy_store->new=$this->new;
		$copy_store->status=$this->status;
		$copy_store->introimage_id=$this->introimage_id;
		$copy_store->address=$this->address;
		$copy_store->meta_keyword=$this->meta_keyword;
		$copy_store->meta_description=$this->meta_description;
		$copy_store->meta_title=$this->meta_title;
		$copy_store->tmp_product_ids=$this->tmp_product_ids;
		$copy_store->tel=$this->tel;
		$copy_store->mobile=$this->mobile;
		if($copy_store->save())
			return $copy_store;
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
	 * Get image url which display home 
	 * @return string path to home.png if this home is true
	 * path to other.png if home is false
	 */
	public function getImageHome()
	{
		if($this->home) 
			return Yii::app()->theme->baseUrl.'/images/home.png';
		else
			return Yii::app()->theme->baseUrl.'/images/question.png';
	}
	
	 /**
	 * Get image url which new status
	 * @return string path to new.png if this new is true
	 * path to other.png if new is false
	 */
	public function getImageNew()
	{
		if($this->new) 
			return Yii::app()->theme->baseUrl.'/images/new.png';
		else
			return Yii::app()->theme->baseUrl.'/images/question.png';;
	}
	/**
	 * Suggests a list of existing titles matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestName($keyword,$limit=20)
	{
		$list_store=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'title DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_store as $store)
			$names[]=$store->name;
			return $names;
	}
	
	/*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return '';
	 }
	 
	 /*
	  * Visited
	  */
	 public function visited(){
	 	$this->visits=$this->visits+1;
		$this->save();
	}
	
	/**
	 * 
	 */
	 public function check($product_id)
	 {
	 	$check = false;
		$criteria = new CDBCriteria();
		$criteria->compare('store_id',$this->id);
		$criteria->compare('product_id',$product_id);
		$criteria->limit = 1;
		$drug = StoreProduct::model()->find($criteria);
		if (isset($drug))
			$check = true;
		
		return $check;
	 }
	
	/**
	 * 
	 */
	public function getList_product_sell_id()
	{
		$list_ids = array();
		$temp = $this->store_product;
		
		foreach ($temp as $dp) {
			$list_ids[] = $dp->product_id;
		}
		
		return $list_ids;
		
	}
	
	/**
	 * 
	 */
	 static function getListById($id)
	 {
	 	$list_id = array();
		
		$_criteria = new CDBCriteria();
		$_criteria->compare('city_id',$_POST['cid']);
		$_criteria->compare('status',true);
		$temp = Store::model()->findAll($_criteria);
	
		foreach ($temp as $dt) {
			if (in_array($_POST['pid'], $dt->getList_product_sell_id()))
			{
				$list_id[] = $dt->id;
			}
		}
		
		return $list_id;
	 }
}