<?php

/**
 * This is the model class for table "{{intro}}".
 *
 * The followings are the available columns in table '{{intro}}':
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
class Intro extends CActiveRecord
{
	const PAGE_SIZE = 6;
	const SORT = 'order_view desc, created_time desc';

	public $tmp_suggest_ids;
	public $tmp_suggest_video;

	private $config_other_attributes=array('content','meta_keyword','meta_description','meta_title');	
	
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
	 * @return Intro the static model class
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
		return '{{intro}}';
	}
	
	/**
	 * Config scope of intro
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
			array('title, cat_id, content,meta_keyword,meta_description,meta_title', 'required'),
			array('cat_id, introimage_id, order_view, visits', 'numerical', 'integerOnly'=>true),
			array('status,home,new,footer', 'boolean'),
			array('cat_id','validatorCategory'),
			array('introimage_id','validatorIntroimage'),
			array('content', 'length', 'max'=>80000),
			array('title,meta_keyword,meta_description,meta_title', 'length', 'max'=>256),
			array('tmp_suggest_ids, tmp_suggest_video','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, title, cat_id, content, new, home', 'safe', 'on'=>'search'),
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
	public function validatorCategory($attributes,$params){
		if(!isset($this->category)){
				$this->addError('cat_id', 'Category invalid');
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
			'category'=>array(self::BELONGS_TO,'IntroCategory','cat_id')
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
			'title' => iPhoenixLang::admin_t('Title'),
			'cat_id' => iPhoenixLang::admin_t('Category'),
			'introimage_id' => iPhoenixLang::admin_t('Thumb image'),
			'content' => iPhoenixLang::admin_t('Content'),
			'meta_title' => 'Meta Title',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'tmp_suggest_ids' => iPhoenixLang::admin_t('Related introductions'),
			'tmp_suggest_video' => iPhoenixLang::admin_t('Related videos'),
			'order_view' => iPhoenixLang::admin_t('Order view'),
			'home' => iPhoenixLang::admin_t('Display in headline'),
			'new' => iPhoenixLang::admin_t('Display in left of homepage'),
			'visits' => iPhoenixLang::admin_t('Visits'),
			'footer'=>iPhoenixLang::admin_t('Display in footer')
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
		$criteria->compare('footer',$this->footer);
		$criteria->compare('title',$this->title,true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		//Filter cat_id
		$cat = IntroCategory::model ()->findByPk ( $this->cat_id );
		if ($cat != null) {
			$child_categories = $cat->child_nodes;
			$list_child_id = array ();
			//Set itself
			$list_child_id [] = $cat->id;
			if ($child_categories != null)
				foreach ( $child_categories as $id => $child_cat ) {
					$list_child_id [] = $id;
				}
			$criteria->addInCondition ( 'cat_id', $list_child_id );
		}
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'order_view DESC, id DESC';
		  $sort->attributes = array(
		    'cat_id',
		    'created_by',
		    'created_time',
		    'title',
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
		$list=$this->list_suggest_intro;
		$result=array();
		foreach ($list as $intro) {
			$result[]=$intro->id;
		}
		$this->tmp_suggest_ids=implode(',',$result);

		$list=$this->list_suggest_video;
		$result=array();
		foreach ($list as $video) {
			$result[]=$video->id;
		}
		$this->tmp_suggest_video=implode(',',$result);

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
				$this->status = 1;
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

		$new_list_suggest_ids=explode(',',$this->tmp_suggest_ids);
		foreach ($new_list_suggest_ids as $intro_id) {
			if($intro_id != $this->id){
				$criteria=new CDbCriteria();
				$criteria->compare('intro_id',$this->id);
				$criteria->compare('to_intro_id',$intro_id);
				$suggest_intro=SuggestIntro::model()->find($criteria);
				if(!isset($suggest_intro)){
					$suggest_intro=new SuggestIntro();
					$suggest_intro->intro_id=$this->id;
					$suggest_intro->to_intro_id=$intro_id;
					$suggest_intro->save();
				}
			}
		}

		$list_current_suggest_ids=$this->list_current_suggest_ids;
		foreach ($list_current_suggest_ids as $intro_id) {
			if(!in_array($intro_id,$new_list_suggest_ids)) {
				$criteria=new CDbCriteria();
				$criteria->compare('intro_id',$this->id);
				$criteria->compare('to_intro_id',$intro_id);
				SuggestIntro::model()->deleteAll($criteria);
			}
		}

		$new_list_suggest_video=explode(',',$this->tmp_suggest_video);
		foreach ($new_list_suggest_video as $video_id) {
			$criteria=new CDbCriteria();
			$criteria->compare('intro_id',$this->id);
			$criteria->compare('to_video_id',$video_id);
			$suggest_video=SuggestIntroVideo::model()->find($criteria);
			if(!isset($suggest_video)){
				$suggest_video=new SuggestIntroVideo();
				$suggest_video->intro_id=$this->id;
				$suggest_video->to_video_id=$video_id;
				$suggest_video->save();
			}
		}

		$list_current_suggest_video=$this->list_current_suggest_video;
		foreach ($list_current_suggest_video as $video_id) {
			if(!in_array($video_id,$new_list_suggest_video)) {
				$criteria=new CDbCriteria();
				$criteria->compare('intro_id',$this->id);
				$criteria->compare('to_video_id',$video_id);
				SuggestIntroVideo::model()->deleteAll($criteria);
			}
		}

	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
		
		$criteria=new CDbCriteria();
		$criteria->addCondition('intro_id ='.$this->id.' OR to_intro_id = '.$this->id);
		SuggestIntro::model()->deleteAll($criteria);

		$criteria=new CDbCriteria();
		$criteria->addCondition('intro_id ='.$this->id);
		SuggestIntroVideo::model()->deleteAll($criteria);
	}

	/**
	 * @return get list suggest intro
	 */
	 public function getList_suggest_intro(){
	 	if ($this->id > 0 ){
		 	$criteria=new CDbCriteria();
			$criteria->compare('intro_id',$this->id);
			$tmp=SuggestIntro::model()->findAll($criteria);
			$result=array();
			foreach ($tmp as $item) {
				$intro=Intro::model()->findByPk($item->to_intro_id);
				if(isset($intro))
				$result[]=$intro;
			}
		}
		else {
			$result = array();
		}
		return $result;
	 }

	/**
	 * @return get list suggest news rental
	 */
	 public function getList_suggest_video(){
	 	if ($this->id > 0 ){
		 	$criteria=new CDbCriteria();
			$criteria->compare('intro_id',$this->id);
			$tmp=SuggestIntroVideo::model()->findAll($criteria);
			$result=array();
			foreach ($tmp as $item) {
				$video=Video::model()->findByPk($item->to_video_id);
				if(isset($video))
				$result[]=$video;
			}
		}
		else {
			$result = array();
		}
		return $result;
	 }

	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_intro;
		$result=array();
		foreach ($list as $intro) {
			$result[]=$intro->id;
		}
		return $result;
	}

	public function getList_current_suggest_video(){
		$list=$this->list_suggest_video;
		$result=array();
		foreach ($list as $video) {
			$result[]=$video->id;
		}
		return $result;
	}

	 /**
	 * Copy intro
	 */
	 public function copy($cat_id=null,$title=null){
	 	$cat_id=isset($cat_id)?$cat_id:$this->cat_id;
		$title=isset($title)?$title:$this->title.'_copy';
		$copy_intro=new Intro();
		$copy_intro->title=$title;
		$copy_intro->cat_id=$cat_id;
		$copy_intro->introimage_id=$this->introimage_id;
		$copy_intro->content=$this->content;
		$copy_intro->meta_keyword=$this->meta_keyword;
		$copy_intro->meta_description=$this->meta_description;
		$copy_intro->meta_title=$this->meta_title;
		$copy_intro->tmp_suggest_ids=$this->tmp_suggest_ids;
		if($copy_intro->save())
			return $copy_intro;
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
	public function suggestTitle($keyword,$limit=20)
	{
		$list_intro=$this->findAll(array(
			'condition'=>'title LIKE :keyword',
			'order'=>'title DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_intro as $intro)
			$titles[]=$intro->title;
			return $titles;
	}
	/*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return iPhoenixUrl::createUrl('intro/view',array('id'=>$this->id,'intro_alias'=>iPhoenixString::createAlias($this->title)));
	 }
	  /*
	  * Visited
	  */
	 public function visited(){
	 	$this->visits=$this->visits+1;
		$this->save();
	}
}