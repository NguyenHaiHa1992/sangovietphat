<?php

/**
 * This is the model class for table "{{image}}".
 *
 * The followings are the available columns in table '{{image}}':
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $file_id
 * @property integer $created_by
 * @property integer $created_time
 */
class Image extends CActiveRecord
{
	const ALBUM_NEWS_INTROIMAGE=1;
	const STATUS_DISABLE=0;
	const STATUS_ENABLE=1;
	
	static public $allowedExtensions=array("jpg","jpeg","gif","png","bmp");
	static public $sizeLimit=10485760;//10*1024*1024
		
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Image the static model class
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
		return '{{image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, name, file_id', 'required'),
			array('file_id','validatorFile','allowedExtensions'=>self::$allowedExtensions),
			array('file_id', 'numerical', 'integerOnly'=>true),
			array('status', 'boolean'),
			array('name, intro', 'length', 'max'=>256),
			array('intro','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, name, parent_id', 'safe', 'on'=>'search'),
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
				$size=getimagesize($absolute_path);
				if(empty($size))
					$this->addError('file_id', 'File invalid');
				else{
					$path_parts = pathinfo($absolute_path);
					$extension=$path_parts['extension'];
					if(!in_array(strtolower($extension),$params['allowedExtensions']))
	    				$this->addError('file_id', 'File invalid');
				}
			}		
			else
				$this->addError('file_id', 'File invalid');	
		}
		else
			$this->addError('file_id', 'File invalid');	
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
			'news'=>array(self::BELONGS_TO,'News','parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Status',
			'name' => 'Name',
			'file_id' => 'File',
			'intro'=>'Introduction',
			'parent_id'=>'Parent',
			'created_by' => 'Creator',
			'created_time' => 'Created time',
		);
	}

    
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }
		$criteria=new CDbCriteria;		

		$criteria->compare('status',$this->status);
		$criteria->compare('name',$this->name,true);
		$criteria->addCondition('parent_id <> 0');
		
		$news = News::model()->findByPk($this->parent_id);
		if (isset($news))
		{
			$criteria->addCondition('parent_id ='.$this->parent_id);
		}
		// $criteria->compare('parent_id',$this->parent_id);
		
		$sort = new CSort();
	 	$sort->defaultOrder = 'id DESC';
	  	$sort->attributes = array(
	    	'created_by',
	    	'name',
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
			}
			return true;
		}
	}
	
	protected function afterSave()
	{				
	    parent::afterSave();
	}
	
	/**
	 * Create image
	 */
	 static function create($file_id,$name=null){
	 	$image=new Image;
		$image->file_id=$file_id;
		$image->name=isset($name)?$name:$image->file->filename;
		if($image->save())
			return $image;
		else 
			return null;
	 }
	 
	 /**
	 * Get width of this origin image
	 */
	public function getWidth(){
		if(file_exists($this->file->absolutePath)){
			$size=getimagesize($this->file->absolutePath);
			return $size[0];
		}
	}
	
	/**
	 * Get height of this origin image
	 */
	public function getHeight(){
		if(file_exists($this->file->absolutePath)){
			$size=getimagesize($this->file->absolutePath);
			return $size[1];
		}
	}
	/**
	 * Create thumb
	 */
	 public static function createThumb($original_path,$dirname,$width,$height,$maintain_ratio=true){
	 	$original_absolute_path=Yii::getPathOfAlias('webroot').'/'.$original_path;
		$absolute_dirname=Yii::getPathOfAlias('webroot').'/'.$dirname;
		if(!file_exists($original_absolute_path))
			return null;
		if(!is_dir($absolute_dirname))
			return null;
		$info=pathinfo($original_absolute_path);
		$thumb_path=$absolute_dirname.'/'.$info['basename'];
		$size=getimagesize($original_absolute_path);
		$original_width=$size[0];
		$original_height=$size[1];
		if($maintain_ratio){
			$ratio=max(1,max(($original_height/$height),($original_width/$width)));
			$w=$original_width/$ratio;
			$h=$original_height/$ratio;
		}
		else{
			$w=min($width,$original_width);
			$h=min($height,$original_height);
		}
		
		$thumb=new ResizeImage($original_absolute_path);		
		$thumb->resize_image($w,$h);
		$thumb->save($thumb_path);
		return $dirname.'/'.$info['basename'];
	 }
		
	/**
	 * Get thumb path
	 */
	public function getThumbPath($width,$height,$maintain_ratio=true){
		$original_path=$this->file->path;
		$original_absolute_path=Yii::getPathOfAlias('webroot').'/'.$original_path;
		$info=pathinfo($original_absolute_path);
		if($maintain_ratio)
			$dirname =File::createDir('data/thumb',$this->created_time).'/'.$this->file->id.'x'.$width.'x'.$height.'x1';
		else 
			$dirname =File::createDir('data/thumb',$this->created_time).'/'.$this->file->id.'x'.$width.'x'.$height.'x0';
		$absolute_dirname=Yii::getPathOfAlias('webroot').'/'.$dirname;
		$thumb_path=$dirname.'/'.$info['basename'];
		$absolute_thumb_path=Yii::getPathOfAlias('webroot').'/'.$thumb_path;		

		if(file_exists($absolute_thumb_path))	
			return $thumb_path;
		else{
			if(!is_dir($absolute_dirname))	mkdir($absolute_dirname);		
			return self::createThumb($original_path, $dirname, $width, $height, $maintain_ratio);	
		}
	}
	
	/**
	 * Get absolute thumb path
	 */
	public function getAbsoluteThumbPath($width,$height,$maintain_ratio=true){
		return Yii::getPathOfAlias('webroot').'/'.$this->getThumbPath($width, $height, $maintain_ratio);
	}
	
	/**
	 * Get absolute thumb url
	 */
	public function getThumbUrl($width,$height,$maintain_ratio=true){
		return $this->getThumbPath($width, $height, $maintain_ratio);
	}

	/**
	 * Get absolute thumb url
	 */
	public function getAbsoluteThumbUrl($width,$height,$maintain_ratio=true){
		return Yii::app()->getBaseUrl(true).'/'.$this->getThumbUrl($width, $height, $maintain_ratio);
	}
	/**
	 * Get url
	 */
	public function getUrl(){
		return $this->file->getUrl();
	}
	/**
	 * Get url
	 */
	public function getAbsoluteUrl(){
		return Yii::app()->getBaseUrl(true).'/'.$this->file->getUrl();
	}
	/**
	 * Copy image
	 */
	 public function copy($name=null){
		$name=isset($name)?$name:$this->name.'_copy';
		$dirname=File::createDir('data/upload/image');
		$copy_file=$this->file->copy($dirname);
		if(isset($copy_file))
			return $this->create($copy_file->id, $name);
	 }
	  /**
	 * Get image url which display status of contact
	 * @return string path to enable.png if this status is STATUS_ACTIVE
	 * path to disable.png if status is STATUS_PENDING
	 */
	public function getImageStatus()
	{
		switch ($this->status) {
			case self::STATUS_ENABLE: 
				return Yii::app()->theme->baseUrl.'/admin/images/css/enable.png';
			break;
		case self::STATUS_DISABLE:
			return Yii::app()->theme->baseUrl.'/admin/images/css/disable.png';
				break;
		}	
	}
	/**
	 * Suggests a list of existing names matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
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
		$names=array();
		foreach($list_news as $news)
			$names[]=$news->name;
			return $names;
	}
	/**
	 * Get dowload url
	 */
	public function getDowload_url(){
		return Yii::app()->createUrl("site/download",array('image_id'=>$this->id,'image_alias'=>iPhoenixString::createAlias($this->name)));
	}
	
	/**
	 * get parent news
	 */
	 public function getParentNews()
	 {
	 	$criteria = new CDBCriteria();
		$criteria->compare('image_id',$this->id);
		$new_id = NewsImage::model()->find($criteria);
		$news = News::model()->findByPk($new_id->news_id);
		
		if (isset($news))
			return $news->name;
		else 
			return "No Parent Name";
	}
}