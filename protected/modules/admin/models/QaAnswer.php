<?php

/**
 * This is the model class for table "{{album_image}}".
 *
 * The followings are the available columns in table '{{album_image}}':
 * @property integer $id
 * @property integer $album_id
 * @property integer $image_id
 */
class QaAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AlbumImage the static model class
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
		return '{{qa_answer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, qa_id', 'required'),
			array('id, qa_id, created_by, created_time, order_view', 'numerical', 'integerOnly'=>true),
			array('status', 'boolean'),
			array('content', 'length', 'max'=>80000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, qa_id, created_by, created_time, status', 'safe', 'on'=>'search'),
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
			'qa'=>array(self::BELONGS_TO,'Qa','qa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'qa_id' => 'QA',
			'language'=>'Language',
			'order_view'=>'Order view',
			'created_by' => 'Creator',
			'created_time' => 'Created time',
			'status' => 'Status',
			'content' => 'Content',
		);
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
				$this->status = true;
				$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
				$this->language=$language;
			}

			return true;
		}
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('qa_id',$this->qa_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('status',$this->status);

		$sort = new CSort();
		$sort->defaultOrder = 'created_time desc,order_view DESC, id DESC';
		$sort->attributes = array(
		   // 'cat_id',
			'created_by',
			'created_time',
			'status',
			'order_view',
		);
		
		$sort->applyOrder($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,                        
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',15)),	
			'sort'=>$sort,			
		));
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

	public function getQaTitle()
	{
		if(isset($this->qa))
			return '<a target=_blank href="'.$this->qa->detail_url.'">'.$this->qa->title.'</a>';
	}
}