<?php

/**
 * This is the model class for table "{{video}}".
 *
 * The followings are the available columns in table '{{video}}':
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $file_id
 * @property integer $cat_id
 * @property integer $created_by
 * @property integer $created_time
 * @property string $other
 * @property integer order_view
 * @property integer visits
 * @property boolean home
 * @property boolean new
 */
class Video extends CActiveRecord
{
	const PAGE_SIZE = 6;
	const SORT = 'order_view desc, created_time desc';

	static public $allowedExtensions=array('mp4','avi','dat','flv','wmv');
	static public $sizeLimit=200485760;//10*1024*1024
	
	public $tmp_suggest_ids;
	
	private $config_other_attributes=array('meta_keyword','meta_description','meta_title');
	
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
	 * @return Video the static model class
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
		return '{{video}}';
	}
	
	/**
	 * Config scope of video
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
			array('name, file_id, cat_id,meta_keyword,meta_description,meta_title', 'required'),
			array('file_id','validatorFile','allowedExtensions'=>self::$allowedExtensions),
			array('cat_id','validatorCategory'),
			array('introimage_id','validatorIntroimage'),
			array('file_id, cat_id, order_view, visits, introimage_id', 'numerical', 'integerOnly'=>true),
			array('status,home,new', 'boolean'),
			array('name', 'length', 'max'=>256),
			array('meta_keyword,meta_description,meta_title', 'length', 'max'=>256),
			array('tmp_suggest_ids','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, name, file_id, cat_id, new, home, order_view', 'safe', 'on'=>'search'),
		);
	}
	
	/**
	 *
	 * Function validator file
	 */
	public function validatorFile($attributes,$params){
		if(isset($this->file)){
		$absolute_path=$this->file->absolutePath;
		if(file_exists($absolute_path)){
			$path_parts = pathinfo($absolute_path);
			$extension=$path_parts['extension'];
			if(!in_array(strtolower($extension),$params['allowedExtensions']))
    			$this->addError('file_id', 'File invalid');
		}	
		else 
			$this->addError('file_id', 'File invalid');		
		}
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
			'file'=>array(self::BELONGS_TO,'File','file_id'),
			'category'=>array(self::BELONGS_TO,'VideoCategory','cat_id'),
			'introimage'=>array(self::BELONGS_TO,'Image','introimage_id'),
			'list_suggest_video' => array(self::MANY_MANY, 'Video', 'tbl_suggest_video(video_id, to_video_id)'),
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
			'file_id' => iPhoenixLang::admin_t('File'),
			'cat_id' => iPhoenixLang::admin_t('Category'),
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'tmp_suggest_ids' => iPhoenixLang::admin_t('Related video'),
			'order_view' => iPhoenixLang::admin_t('Order view'),
			'home' => iPhoenixLang::admin_t('Display on home page'),
			'new' => iPhoenixLang::admin_t('Display in new box'),
			'introimage_id'=>iPhoenixLang::admin_t('Thumb image'),
			'visits'=>iPhoenixLang::admin_t('Visits'),
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
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		$criteria->compare('status',$this->status);
		$criteria->compare('new',$this->new);
		$criteria->compare('home',$this->home);
		$criteria->compare('name',$this->name,true);
		//Filter cat_id
		$cat = VideoCategory::model ()->findByPk ( $this->cat_id );
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
		    'created_by',
		    'cat_id',
		    'name',
		    'created_time',
		    'order_view',
		    'visits'
		  );
	  $sort->applyOrder($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',10)),	
			'sort'=>$sort
		));
	}
	

	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind(){
		$this->other=json_decode($this->other,true);			
		$list=$this->list_suggest_video;
		$result=array();
		foreach ($list as $video) {
			$result[]=$video->id;
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
		foreach ($new_list_suggest_ids as $video_id) {
			if($video_id != $this->id){
				$criteria=new CDbCriteria();
				$criteria->compare('video_id',$this->id);
				$criteria->compare('to_video_id',$video_id);
				$suggest_video=SuggestVideo::model()->find($criteria);
				if(!isset($suggest_video)){
					$suggest_video=new SuggestVideo();
					$suggest_video->video_id=$this->id;
					$suggest_video->to_video_id=$video_id;
					$suggest_video->save();
				}
			}
			
		}		
		$list_current_suggest_ids=$this->list_current_suggest_ids;
		foreach ($list_current_suggest_ids as $video_id) {
			if(!in_array($video_id,$new_list_suggest_ids) || $video_id == $this->id) {
				$criteria=new CDbCriteria();
				$criteria->compare('video_id',$this->id);
				$criteria->compare('to_video_id',$video_id);				
				SuggestVideo::model()->deleteAll($criteria);
			}
		}
	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
		
		$criteria=new CDbCriteria();
		$criteria->addCondition('video_id ='.$this->id.' OR to_video_id = '.$this->id);				
		SuggestVideo::model()->deleteAll($criteria);

		$criteria=new CDbCriteria();
		$criteria->addCondition('video_id ='.$this->id);
		SuggestIntroVideo::model()->deleteAll($criteria);

		$criteria=new CDbCriteria();
		$criteria->addCondition('video_id ='.$this->id);
		SuggestProductVideo::model()->deleteAll($criteria);
	}
	
	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_video;
		$result=array();
		foreach ($list as $video) {
			$result[]=$video->id;
		}
		return $result;
	}
	 
	 /**
	 * Copy video
	 */
	 public function copy($cat_id=null,$name=null){	
		$cat_id=isset($cat_id)?$cat_id:$this->cat_id;
		$name=isset($name)?$name:$this->name.'_copy';
		$copy_video=new Video();
		$copy_video->name=$name;
		$copy_video->cat_id=$cat_id;
		$copy_video->file_id=$this->file_id;	
		$copy_video->meta_keyword=$this->meta_keyword;
		$copy_video->meta_description=$this->meta_description;
		$copy_video->meta_title=$this->meta_title;			
		$copy_video->tmp_suggest_ids=$this->tmp_suggest_ids;
		if($copy_video->save()){
			return $copy_video;
		}
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
	 * Suggests a list of existing names matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestName($keyword,$limit=20)
	{
		$list_video=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_video as $video)
			$names[]=$video->name;
			return $names;
	}
	/**
	 * Convert file .mp4
	 */
	 public function getVideoMp4(){
	 	$file=$this->file;
	 	$aboslute_path=$file->getAbsolutePath();
		if($file->extension != 'mp4'){
			$convert_path=$file->dirname.'/'.$file->filename.'_convert.mp4';
			$convert_absolute_path=$file->getAbsoluteDirname().'/'.$file->filename.'_convert.mp4';
			if(!file_exists($convert_path)){
			switch (strtolower($file->extension)) {
				case 'flv':
					exec('ffmpeg -i '.$aboslute_path.' -vcodec copy -acodec copy '.$convert_absolute_path);
					break;
				
				default:
					exec('ffmpeg -i '.$aboslute_path.' '.$convert_absolute_path);
					break;
			}				
			}			
			return $convert_path;
		}
		else{
			return $file->path;
		}
	 }
	 /*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return 'http://ihbvietnam.com/';
	 }
	  /*
	  * Visited
	  */
	 public function visited(){
	 	$this->visits=$this->visits+1;
		$this->save();
	}
}
