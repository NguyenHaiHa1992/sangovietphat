<?php

/**
 * This is the model class for table "{{qa}}".
 *
 * The followings are the available columns in table '{{qa}}':
 * @property integer $id
 * @property integer $status
 * @property string $title
 * @property integer $cat_id
 * @property integer $introimage_id
 * @property string $other
 * @property int order_view
 * @property boolean home
 * @property boolean new
 * @property integer $visits
 * @property integer $created_by
 * @property integer $created_time
 */
class Qa extends CActiveRecord
{
	public $tmp_suggest_ids;
	const PAGE_SIZE = 15;

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
	 * @return Qa the static model class
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
		return '{{qa}}';
	}
	
	/**
	 * Config scope of qa
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
			array('name, email, title,question,meta_keyword,meta_description,meta_title', 'required'),
			array('order_view, visits', 'numerical', 'integerOnly'=>true),
			array('status, home', 'boolean'),
// 			array('cat_id','validatorCategory'),
// 			array('introimage_id','validatorIntroimage'),
			array('content', 'length', 'max'=>80000),
			array('question', 'length', 'max'=>80000),
			array('name,email,title,meta_keyword,meta_description,meta_title, alias, phone, address, email, Date', 'length', 'max'=>256),
			array('tmp_suggest_ids, product_id','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, home, name, email, title, content, question', 'safe', 'on'=>'search'),
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
			'author'=>array(self::BELONGS_TO,'User','created_by'),
			'product'=>array(self::BELONGS_TO,'Product','product_id'),
			//'introimage'=>array(self::BELONGS_TO,'Image','introimage_id'),
			//'category'=>array(self::BELONGS_TO,'QaCategory','cat_id'),
			//'list_suggest_qa' => array(self::MANY_MANY, 'Qa', 'tbl_suggest_qa(qa_id, to_qa_id)'),
		);
	}
	/**
	 * @return get list suggest news
	 */
	 public function getList_suggest_qa(){
	 	if ($this->id > 0 ){
	 	$criteria=new CDbCriteria();
		$criteria->compare('qa_id',$this->id);
		$tmp=SuggestQa::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {
			$qa=Qa::model()->findByPk($item->to_qa_id);
			if(isset($qa))
			$result[]=$qa;
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
			'status' => 'Status',
			'home' => 'Display in homepage',
			'title' => 'Title',
			'name'=>'Name',
			'email'=>'Email',
			//'cat_id' => 'Danh mục',
			//'introimage_id' => 'Ảnh giới thiệu',
			'question'=>'Question',
			'content' => 'Answer',
			'meta_title' => 'Meta Title',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'created_by' => 'Creator',
			'created_time' => 'Created time',
			'tmp_suggest_ids' => 'Related QAs',
			'order_view' => 'Order view',
			//'home' => 'Hiển thị ở trang chủ',
			//'new' => 'Hiển thị ở mục Hỏi đáp mới',
			'visits' => 'Visits',
			'product_id'=>'Related product',
			'alias'=>'Alias'
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
		$criteria->compare('home',$this->home);
		$criteria->compare('product_id',$this->product_id);
// 		$criteria->compare('new',$this->new);
// 		$criteria->compare('home',$this->home);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		//Filter cat_id
// 		$cat = QaCategory::model ()->findByPk ( $this->cat_id );
// 		if ($cat != null) {
// 			$child_categories = $cat->child_nodes;
// 			$list_child_id = array ();
// 			//Set itself
// 			$list_child_id [] = $cat->id;
// 			if ($child_categories != null)
// 				foreach ( $child_categories as $id => $child_cat ) {
// 					$list_child_id [] = $id;
// 				}
// 			$criteria->addInCondition ( 'cat_id', $list_child_id );
// 		}
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'created_time desc,order_view DESC, id DESC';
		  $sort->attributes = array(
		   // 'cat_id',
		    'created_by',
		    'created_time',
		    'title',
		    'name',
		    'status',
		    'order_view',
	   		'visits'
		  );
		  $sort->applyOrder($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,                        
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',15)),	
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
		$criteria->compare('qa_id',$this->id);
		$tmp=SuggestQa::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {			
			$result[]=$item->to_qa_id;
		}	
		$this->tmp_suggest_ids=implode(',',$result);					
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
				$this->order_view = 1000;
				$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
				$this->language=$language;
				if(!is_array($this->other))
					$this->other=array();
			}
			$this->alias = iPhoenixString::createAlias($this->title);
			$this->other=json_encode($this->other);	
			return true;
		}
	}
	
	protected function afterSave()
	{				
		$this->other=json_decode($this->other,true);	
		$new_list_suggest_ids=explode(',',$this->tmp_suggest_ids);
		foreach ($new_list_suggest_ids as $qa_id) {
			if($qa_id != $this->id){
				$criteria=new CDbCriteria();
				$criteria->compare('qa_id',$this->id);
				$criteria->compare('to_qa_id',$qa_id);
				$suggest_qa=SuggestQa::model()->find($criteria);
				if(!isset($suggest_qa)){
					$suggest_qa=new SuggestQa();
					$suggest_qa->qa_id=$this->id;
					$suggest_qa->to_qa_id=$qa_id;
					$suggest_qa->save();
				}
			}
			
		}		
		$list_current_suggest_ids=$this->list_current_suggest_ids;
		foreach ($list_current_suggest_ids as $qa_id) {
			if(!in_array($qa_id,$new_list_suggest_ids) || $qa_id == $this->id) {
				$criteria=new CDbCriteria();
				$criteria->compare('qa_id',$this->id);
				$criteria->compare('to_qa_id',$qa_id);
				SuggestQa::model()->deleteAll($criteria);
			}
		}
	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
		
		$criteria=new CDbCriteria();
		$criteria->addCondition('qa_id ='.$this->id.' OR to_qa_id = '.$this->id);				
		SuggestQa::model()->deleteAll($criteria);
			
	}
	
	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_qa;
		$result=array();
		foreach ($list as $qa) {
			$result[]=$qa->id;
		}
		return $result;
	}
	 /**
	 * Copy qa
	 */
	 public function copy($cat_id=null,$title=null){
	 	$cat_id=isset($cat_id)?$cat_id:$this->cat_id;
		$title=isset($title)?$title:$this->title.'_copy';
		$copy_qa=new Qa();
		$copy_qa->title=$title;
		//$copy_qa->cat_id=$cat_id;
		//$copy_qa->introimage_id=$this->introimage_id;
		$copy_qa->question=$this->question;
		$copy_qa->content=$this->content;
		$copy_qa->status=$this->status;
		$copy_qa->meta_keyword=$this->meta_keyword;
		$copy_qa->meta_description=$this->meta_description;
		$copy_qa->meta_title=$this->meta_title;
		$copy_qa->name=$this->name;
		$copy_qa->email=$this->email;
		$copy_qa->tmp_suggest_ids=$this->tmp_suggest_ids;
		if($copy_qa->save())
			return $copy_qa;
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
// 	public function getImageNew()
// 	{
// 		if($this->new) 
// 			return Yii::app()->theme->baseUrl.'/images/new.png';
// 		else
// 			return Yii::app()->theme->baseUrl.'/images/question.png';;
// 	}
	/**
	 * Suggests a list of existing titles matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestTitle($keyword,$limit=20)
	{
		$list_qa=$this->findAll(array(
			'condition'=>'title LIKE :keyword',
			'order'=>'title DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_qa as $qa)
			$titles[]=$qa->title;
			return $titles;
	}

	/*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return Yii::app()->createUrl('qa/view',array('qa_alias'=>$this->alias));
	 }

	  /*
	  * Get List answer
	  */
	 public function getListAnswer(){
		$criteria=new CDbCriteria();
		$criteria->compare('qa_id',$this->id);
		$criteria->compare('status',true);
		$list_answer = QaAnswer::model()->findAll($criteria);
		return $list_answer;
	}

	  /*
	  * Visited
	  */
	 public function visited(){
	 	$this->visits=$this->visits+1;
		$this->save();
	}
}