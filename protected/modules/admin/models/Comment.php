<?php
/**
 * 
 * Comment class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * Comment includes attributes and methods of Comment class  
 */
class Comment extends CActiveRecord
{
	public $search_end_time;
	public $search_start_time;
	
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
	 * @return Comment the static model class
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
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, content, parent_id, parent_class', 'required'),
			array('status', 'boolean'),
			array('email','email'),
			array('created_time, vote', 'numerical', 'integerOnly'=>true),
			array('parent_class, phone','length','max'=>64),
			array('name,email,title', 'length', 'max'=>256),
			array('reply,content, reply', 'length', 'max'=>2048),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, status,parent_class, created_time, search_start_time, search_end_time, vote, comment_parent', 'safe', 'on'=>'search'),
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
			'product'=>array(self::BELONGS_TO,'Product','parent_id'),
			'news'=>array(self::BELONGS_TO,'News','parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			/*'id' => 'ID',
			'status' => iPhoenixLang::admin_t('Status'),
			'email' => 'Email',
			'title' => iPhoenixLang::admin_t('Title'),
			'name'=> iPhoenixLang::admin_t('Full name'),
			'content' => iPhoenixLang::admin_t('Content'),
			'parent_class' => iPhoenixLang::admin_t('Parent class'),
			'parent_id' => iPhoenixLang::admin_t('Parent id'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'search_start_time' => iPhoenixLang::admin_t('Search start time'),
			'search_end_time' => iPhoenixLang::admin_t('Search end time'),
			'vote'=>iPhoenixLang::admin_t('Vote'),*/
            'id' => 'ID',
            'status' => 'Id',
            'email' => 'Email',
            'title' => 'Tiêu đề',
            'name'=> 'Tên',
            'content' => 'Nội dung',
            'parent_class' => 'Parent class',
            'parent_id' => 'Parent id',
            'created_time' => 'Created time',
            'search_start_time' => 'Search start time',
            'search_end_time' => 'Search end time',
            'vote'=>'Vote',
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
		$criteria->compare('parent_class',$this->parent_class);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		
		if($this->search_start_time > 0)
			$criteria->addCondition('created_time >= '.$this->search_start_time);
		
		if($this->search_end_time > 0)
			$criteria->addCondition('created_time <= '.$this->search_end_time);
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'id DESC';
		  $sort->attributes = array(
		    'created_time',
		    'parent_class'
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
                $this->status = true;
				//Send information account			
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
	 * Get image url which display status of comment
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
	 * Get list categories
	 * @return array $list, list categories
	 */
	public function getList_parent_classes(){
		$dbCommand = Yii::app()->db->createCommand("
   			SELECT parent_class FROM `".$this->tableName()."` GROUP BY `parent_class`
		");
		$data = $dbCommand->queryAll();
		$list=array();	 
		foreach ($data as $item){
			$list[$item['parent_class']]=$item['parent_class'];			
		}
        return $list;
    }
	/**
	 * Get parent of image
	 * @return link update of parent
	 */
	public function getParent_url() {
		$parent=$this->parent;
		if($parent != null)
			return $parent->detail_url;
		else 
			return null;
 	}
	/**
	 * Get parent of image
	 * @return link update of parent
	 */
 	public function getParent()
 	{
 			if ($this->parent_id > 0) {
 				$class=$this->parent_class;
				$object=new $class;
 				$parent = $object->findByPk($this->parent_id);
 				if(isset($parent))
					return $parent;
				else
					return null;
 			}
			else {
				return null;
			}
 	}

	/**
	 * Get list active comment by parent_id and parent_class 
	 */
	public function getListByParent($id,$class)
	{
		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->compare('parent_id',$id);
		$criteria->compare('parent_class',$class, true);
		$criteria->order = 'created_time desc';
		
		$list = Comment::model()->findAll($criteria);
		
		if (isset($list))
			return $list;
		else
			return null;
	}


    public function getFormat_time(){
        return date('H:i d-m-Y',$this->created_time);
    }


    static function getCommentsWithPager($id,$class,$pageSize = 5, $pageVar = 'page', $condition = array('status'=>true)){
        $model = new Comment();
        $criteria = new CDbcriteria();
        $criteria->compare('parent_id',$id);
        $criteria->compare('parent_class',$class);

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes))
                $criteria->compare($key, $value);
        }
        $criteria->order = "id desc";

        //Apply pager
        $count = $model::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->setPageSize($pageSize);
        $pages->pageVar = $pageVar;

        $item_count = ceil($count/$pageSize);
        $pages->applyLimit($criteria);

        $list_item = $model::model()->findAll($criteria);

        if(!isset($list_item)){
            throw new CHttpException(404,'The specified post cannot be found.');
        }

        return $list_item;
    }

    static function getCommentsPager($id,$class,$pageSize = 5, $pageVar = 'page', $condition = array('status'=>true)){
        $model = new Comment();
        $criteria = new CDbcriteria();
        $criteria->compare('parent_id',$id);
        $criteria->compare('parent_class',$class);

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes))
                $criteria->compare($key, $value);
        }
        $criteria->order = "order_view desc, id desc";

        //Apply pager
        $count = $model::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->setPageSize($pageSize);
        $pages->pageVar = $pageVar;

        $item_count = ceil($count/$pageSize);

        $pages->applyLimit($criteria);

        return $pages;
    }
}
