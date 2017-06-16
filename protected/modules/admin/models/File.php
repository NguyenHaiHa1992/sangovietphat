<?php

/**
 * This is the model class for table "{{file}}".
 *
 * The followings are the available columns in table '{{file}}':
 * @property integer $id
 * @property string $filename
 * @property string $extension
 * @property string $dirname
 * @property integer $created_by
 * @property integer $created_time
 * @property string $history
 */
class File extends CActiveRecord
{
	private $_oldAttributes;	
	static public $allowedExtensions=array("doc","docx","mp4","wmv","dat","avi","flv","jpg","jpeg","gif","png","bmp","rar","pdf","mp3","wav","wma");
	static public $sizeLimit=104857600;//10*1024*1024
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return File the static model class
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
		return '{{file}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename, extension, dirname', 'required'),
			array('extension','validatorExtension'),
			array('filename, dirname', 'length', 'max'=>256),
			array('extension', 'length','max'=>32),
		);
	}
	
	/**
	 *
	 * Function validator file
	 */
	public function validatorExtension($attributes,$params){
		if(!in_array(strtolower($this->extension), self::$allowedExtensions))
			$this->addError('extension', 'File invalid');	
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'filename' => 'Basename',
			'extension' => 'Extension',
			'dirname' => 'Dirname',
			'created_by' => 'Creator',
			'created_time' => 'Created Time',
			'history' => 'History',
		);
	}
	

    public function getOldAttributes()
    {
        return $this->_oldAttributes;
    }
	
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind(){		
		
		if(isset($this->history))
			$this->history=json_decode($this->history,true);
		
		$this->_oldAttributes = $this->attributes;
	
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
		if(parent::beforeSave()){
			if($this->isNewRecord)
			{
				$this->created_time=time();
				$this->created_by=Yii::app()->user->id;
				$history=array();
			}
			else {
				$history=$this->history;
				$old_data=array_diff($this->_oldAttributes,$this->attributes);
				if(sizeof($old_data) > 0){
					$new_data=array_diff($this->attributes,$this->_oldAttributes);
					$history[]=array('user_id'=>Yii::app()->user->id,'time'=>time(),'old_data'=>$old_data, 'new_data'=>$new_data);	
				}		
			}
			$this->history = json_encode ( $history );
			return true;
		}
	}
	
	protected function afterSave()
	{
		if(isset($this->history))
			$this->history=json_decode($this->history,true);
				
		$this->_oldAttributes = $this->attributes;
		
	    parent::afterSave();
	}
	
	/** Returns absolute path of the file
	 * @return string absolute path.
	 */
	 public function getAbsoluteDirname(){
	 	return Yii::getPathOfAlias('webroot').'/'.$this->dirname;
	 }
	
	/** Returns relative path of the file
	 * @return string relative path.
	 */
	 public function getPath(){
	 	return $this->dirname.'/'.$this->filename.'.'.$this->extension;
	 }
	 
	 /** Returns absolute path of the file
	 * @return string absolute path.
	 */
	 public function getAbsolutePath(){
	 	return $this->getAbsoluteDirname().'/'.$this->filename.'.'.$this->extension;
	 }
	 
	 /** Returns relative url of the file
	 * @return string relative url
	 */
	 public function getUrl(){
	 	return $this->dirname.'/'.$this->filename.'.'.$this->extension;
	 }
	 
	 /** Returns absolute  url of the file
	 * @return string absolute url
	 */
	 public function getAbsoluteUrl(){
	 	return Yii::app()->getBaseUrl(true).'/'.$this->dirname.'/'.$this->filename.'.'.$this->extension;
	 }
	 
	 /** Returns fullname of the file
	 * @return fullname
	 */
	 public function getFullname(){
	 	return $this->filename.'.'.$this->extension;
	 }
	 
	 /**
	 * Copy file
	 * @return File file
	 */
	  public static function create($original_absolute_path, $dirname, $filename, $extension=null){
	  	if(file_exists($original_absolute_path)){	  		
			$absolute_dirname=Yii::getPathOfAlias('webroot').'/'.$dirname;
			if(!is_dir($absolute_dirname))
				return null;
			$path_parts = pathinfo($original_absolute_path);	
			if(!isset($extension)){
				if(isset($path_parts['extension']))
					$extension=$path_parts['extension'];
				else
					return null;
			}	
			$absolute_path=$absolute_dirname.'/'.$filename.'.'.$extension;
			$index=0;
			while(file_exists($absolute_path)){
				$index++;
				$filename .= '_'.$index;
				$absolute_path=$absolute_dirname.'/'.$filename.'.'.$extension;
			}
			if(copy($original_absolute_path,$absolute_path)){
				$file=new File();
				$file->dirname=$dirname;
				$file->extension=$extension;
				$file->filename=$filename;
				if($file->save())
					return $file;
				else
					return null;
			}
			else
				return null;
	  	}
		else 
			return null;		
	  }
	 
	/**
	 * Copy file
	 * @return File file
	 */
	  public function copy($new_dirname=null,$new_filename=null){
	  	$original_absolute_path=$this->getAbsolutePath();	
		if(!isset($new_dirname))
			$new_dirname=$this->dirname;
		if(!isset($new_filename))
			$new_filename=$this->filename.'_copy';
		$copy_file=File::create($original_absolute_path, $new_dirname, $new_filename);
		return $copy_file;
	  }
	  
	 /**
	 * Rename file
	 * @return boolean success or fail 
	 */
	  public function rename($new_filename){
	  	if($this->filename == $new_filename)
			return true;		
	  	
		$new_file=$this->getAbsoluteDirname().'/'.$new_filename.'.'.$this->extension;
		if(file_exists($new_file))
			return false;
		
		$old_file=$this->getAbsolutePath();
		if(copy($old_file,$new_file)){
			$this->filename=$new_filename;
			if($this->save()){
				unlink($old_file);
				return true;
			}
			else{
				unlink($new_file);
				return false;
			}				
		}
		else
			return false;
	}
	  
	 /**
	 * Move file to a new directory
	 * @return boolean success or fail 
	 */
	  public function move($new_dirname){
	  	if($this->dirname == $new_dirname)
			return true;		
	  	
		if(!is_dir(Yii::getPathOfAlias('webroot').'/'.$new_dirname))
			return false;
		
		$filename=$this->filename;
		$new_file=Yii::getPathOfAlias('webroot').'/'.$new_dirname.'/'.$filename.'.'.$this->extension;
		
		while(file_exists($new_file)){
			$filename .= '_copy';
			$new_file=Yii::getPathOfAlias('webroot').'/'.$new_dirname.'/'.$filename.'.'.$this->extension;
		}
		
		$old_file=$this->getAbsolutePath();
		if(copy($old_file,$new_file)){
			$this->filename=$filename;
			$this->dirname=$new_dirname;
			if($this->save()){
				unlink($old_file);
				return true;
			}
			else{
				unlink($new_file);
				return false;
			}				
		}
		else
			return false;
		}
	  /**
	   * Create directory
	   */
	static function createDir($dirname,$time=null){
		$dir=$dirname;
		if($time == null) $time=time();
		$dir .= '/'.date('Y',$time);
		if(!file_exists(Yii::getPathOfAlias('webroot').'/'.$dir)){
			mkdir(Yii::getPathOfAlias('webroot').'/'.$dir);
		}
		$dir .= '/'.date('m',$time);
		if(!file_exists(Yii::getPathOfAlias('webroot').'/'.$dir)){
			mkdir(Yii::getPathOfAlias('webroot').'/'.$dir);
		}
		$dir .= '/'.date( 'd', $time );
		if (! file_exists ( Yii::getPathOfAlias ( 'webroot' ) . '/' . $dir )) {
			mkdir ( Yii::getPathOfAlias ( 'webroot' ) . '/' . $dir );
		}
		return $dir;
	}
}