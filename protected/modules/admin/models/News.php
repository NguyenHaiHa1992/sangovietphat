<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
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
class News extends CActiveRecord
{
	const PAGE_SIZE = 6;
	const SORT = 'order_view desc, created_time desc';
	
	public $tmp_suggest_ids;
	// public $tmp_image_ids;
	
	private $config_other_attributes=array('tmp_image_ids', 'meta_title', 'meta_keyword', 'meta_description', 'introtext', 'content');	
	
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
	 * @return News the static model class
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
		return '{{news}}';
	}
	
	/**
	 * Config scope of news
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
			array('name, alias, cat_id, content,meta_keyword,meta_description,meta_title', 'required'),
			array('alias', 'unique'),
			array('cat_id, introimage_id, order_view, visits, created_time, created_by', 'numerical', 'integerOnly'=>true),
			array('status,home,new', 'boolean'),
			array('cat_id','validatorCategory'),
			array('introimage_id','validatorIntroimage'),
			array('content,introtext', 'length', 'max'=>80000),
			array('name,news_image,meta_keyword,meta_description,meta_title, alias', 'length', 'max'=>256),
			array('tmp_suggest_ids,tmp_image_ids','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, name, cat_id, content, new, home, alias', 'safe', 'on'=>'search'),
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
			'category'=>array(self::BELONGS_TO,'NewsCategory','cat_id'),
			'images' => array(self::MANY_MANY, 'Image', 'tbl_news_image(news_id, image_id)'),
			//'list_suggest_news' => array(self::MANY_MANY, 'News', 'tbl_suggest_news(news_id, to_news_id)'),
		);
	}

	/**
	 * @return get list suggest news rental
	 */
	 public function getList_suggest_news(){
	 	if ($this->id > 0 ){
	 	$criteria=new CDbCriteria();
		$criteria->compare('news_id',$this->id);
		$tmp=SuggestNews::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {
			$news=News::model()->findByPk($item->to_news_id);
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
			'status' => iPhoenixLang::admin_t('Status'),
			'name' => iPhoenixLang::admin_t('Title'),
			'cat_id' => iPhoenixLang::admin_t('Category'),
			'introimage_id' => iPhoenixLang::admin_t('Thumb image'),
			'content' => iPhoenixLang::admin_t('Content'),
			'meta_title' => 'Meta Title',
			'introtext'=>iPhoenixLang::admin_t('Introduction'),
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'tmp_suggest_ids' => iPhoenixLang::admin_t('Related news'),
			'order_view' => iPhoenixLang::admin_t('Order view'),
			'home' => iPhoenixLang::admin_t('Display in home page'),
			'new' => iPhoenixLang::admin_t('Display in new news'),
			'visits' => iPhoenixLang::admin_t('Visits'),
			'images'=>iPhoenixLang::admin_t('Other images'),
			'alias'=>iPhoenixLang::admin_t('Alias')
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
		$criteria->compare('name',$this->name, true);
		$criteria->compare('alias',$this->alias, true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		//Filter cat_id
		$cat = NewsCategory::model ()->findByPk ( $this->cat_id );
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
		  $sort->defaultOrder = 'order_view DESC, created_time DESC';
		  $sort->attributes = array(
		    'cat_id',
		    'created_by',
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
		$criteria->compare('news_id',$this->id);
		$tmp=SuggestNews::model()->findAll($criteria);
		$result=array();
		foreach ($tmp as $item) {			
			$result[]=$item->to_news_id;
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
				$this->status = true;
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
		foreach ($new_list_suggest_ids as $news_id) {
			if($news_id != $this->id){
				$criteria=new CDbCriteria();
				$criteria->compare('news_id',$this->id);
				$criteria->compare('to_news_id',$news_id);
				$suggest_news=SuggestNews::model()->find($criteria);
				if(!isset($suggest_news)){
					$suggest_news=new SuggestNews();
					$suggest_news->news_id=$this->id;
					$suggest_news->to_news_id=$news_id;
					$suggest_news->save();
				}
			}
			
		}		
		$list_current_suggest_ids=$this->list_current_suggest_ids;
		foreach ($list_current_suggest_ids as $news_id) {
			if(!in_array($news_id,$new_list_suggest_ids) || $news_id == $this->id) {
				$criteria=new CDbCriteria();
				$criteria->compare('news_id',$this->id);
				$criteria->compare('to_news_id',$news_id);				
				SuggestNews::model()->deleteAll($criteria);
			}
		}
		
		$new_list_image_ids=explode(',',$this->tmp_image_ids);
		foreach ($new_list_image_ids as $image_id) {
			$criteria=new CDbCriteria();
			$criteria->compare('news_id',$this->id);
			$criteria->compare('image_id',$image_id);
			$product_image=NewsImage::model()->find($criteria);
			if(!isset($product_image)){
				$product_image=new NewsImage();
				$product_image->news_id=$this->id;
				$product_image->image_id=$image_id;
				$product_image->save();
			}
		}		
		
		$list_current_image_ids=$this->list_current_image_ids;
		foreach ($list_current_image_ids as $image_id) {
			if(!in_array($image_id,$new_list_image_ids)){
				$criteria=new CDbCriteria();
				$criteria->compare('news_id',$this->id);
				$criteria->compare('image_id',$image_id);
				NewsImage::model()->deleteAll($criteria);
			}
		}
	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
		
		$criteria=new CDbCriteria();
		$criteria->addCondition('news_id ='.$this->id.' OR to_news_id = '.$this->id);
		SuggestNews::model()->deleteAll($criteria);

		
		$criteria=new CDbCriteria();
		$criteria->addCondition('to_news_id ='.$this->id);
		SuggestProductNews::model()->deleteAll($criteria);

		$criteria=new CDbCriteria();
		$criteria->addCondition('parent_id ='.$this->id);
		$criteria->compare('parent_class','News',true);
		Comment::model()->deleteAll($criteria);

		$criteria = new CDBCriteria();
		$criteria->compare('parent_id',$this->id);
		Image::model()->deleteAll($criteria);
	}
	
	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_news;
		$result=array();
		foreach ($list as $news) {
			$result[]=$news->id;
		}
		return $result;
	}
	public function getList_current_image_ids(){
		$list=$this->images;
		$result=array();
		foreach ($list as $image) {
			$result[]=$image->id;
		}
		return $result;
	}
	 /**
	 * Copy news
	 */
	 public function copy($cat_id=null,$title=null){
	 	$cat_id=isset($cat_id)?$cat_id:$this->cat_id;
		$title=isset($title)?$title:$this->name.'_copy';
		$copy_news=new News();
		$copy_news->name=$title;
		$copy_news->alias=$this->alias.'_copy';
		$copy_news->cat_id=$cat_id;
		$copy_news->home=$this->home;
		$copy_news->new=$this->new;
		$copy_news->status=$this->status;
		$copy_news->introimage_id=$this->introimage_id;
		$copy_news->content=$this->content;
		$copy_news->meta_keyword=$this->meta_keyword;
		$copy_news->meta_description=$this->meta_description;
		$copy_news->meta_title=$this->meta_title;
		$copy_news->introtext=$this->introtext;
		$copy_news->tmp_image_ids=$this->tmp_image_ids;
		$copy_news->tmp_suggest_ids=$this->tmp_suggest_ids;
		if($copy_news->save())
			return $copy_news;
		else{
			var_dump($copy_news->getErrors());
			return null;
		}
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

	/*
	 * Get detail url
	 */
	public function getDetail_url(){
		return iPhoenixUrl::createUrl('news/view',array('id'=>$this->id,'news_alias'=>$this->alias));
	}

    public function getFormat_time(){
        return date('H:i d-m-Y',$this->created_time);
    }

    public function getAuthor_name(){
        if(isset($this->author->fullname))
            return $this->author->fullname;
        return 'Admin';
    }


    public function getTitle_text($lenght = 5){
        return iPhoenixString::createIntrotext($this->name,$lenght);
    }

    public function getIntro_text($lenght = 20){
        return iPhoenixString::createIntrotext($this->introtext,$lenght);
    }

    public function getIntroimage_src(){
        if(isset($this->introimage))
            return $this->introimage->getAbsoluteThumbUrl(100,100,false);
        return Yii::app()->theme->baseUrl.'/images/data/no_image.jpg';
    }

    public function getIntroimage_thumb($width,$height,$ratio = true){
        if(isset($this->introimage))
            return $this->introimage->getAbsoluteThumbUrl($width,$height,$ratio);
        return Yii::app()->theme->baseUrl.'/images/data/no_image.jpg';
    }

	/*
	 * Get detail url
	 */
	public function getList_similar_news($limit = ""){
		$criteria = new CDbcriteria();
		$criteria->compare('status', true);
		$criteria->compare('cat_id', $this->cat_id);
		$criteria->addCondition('id <>'.$this->id);
		$criteria->order = "order_view desc, id desc";
		if($limit == "") $criteria->limit = 10;
		else $criteria->limit = $limit;
		$list_similar_news = News::model()->findAll($criteria);
		return $list_similar_news;
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
	public function getDayOfWeek($day)
	{
		$name = '';
		switch ($day) {
			case 1:
				$name = 'Thứ Hai';
				break;
			case 2:
				$name = 'Thứ Ba';
				break;
			case 3:
				$name = 'Thứ Tư';
				break;
			case 4:
				$name = 'Thứ Năm';
				break;
			case 5:
				$name = 'Thứ Sáu';
				break;
			case 6:
				$name = 'Thứ Bảy';
				break;
			case 7:
				$name = 'Chủ nhật';
				break;	
			default:
				$name = '';
				break;
		}
		return $name;
	}

	/**
	 * get list news by category: intro at menu left
	 */
	static function listIntro()
	{
		$list_intro = array();
		
		$criteria = new CDBCriteria();
		$criteria -> compare('status',true);
		$criteria -> compare('home',true);
		$criteria -> compare('cat_id',28);
		$criteria->order = 'order_view desc , created_time desc';
		$list_intro = News::model()->findAll($criteria);
		
		return $list_intro;
	}


    static function getItemById($id){
        $model = new News();

        $item = $model::model()->findByPk($id);

        if(!isset($item)){
            throw new CHttpException(404,'The specified post cannot be found.');
        }

        return $item;
    }



    static function getItems($limit = 5,$condition = array('status'=>true)){
        $model = new News();
        $criteria = new CDbcriteria();
        if(!isset($limit)) $limit = 10;
        if($limit != 0) $criteria->limit = $limit;

        if(!isset($condition['status'])) $condition['status'] = true;

        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes)  && $value !=null)
                $criteria->compare($key, $value);
        }
        $criteria->order = "order_view desc, id desc";
        $list_item = $model::model()->findAll($criteria);

        if(!isset($list_item)){
            throw new CHttpException(404,'The specified post cannot be found.');
        }

        return $list_item;
    }


    static function getItemsWithPager($pageSize = 5, $pageVar = 'page', $condition = array('status'=>true)){
        $model = new News();
        $criteria = new CDbcriteria();

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes) && $value !=null)
                $criteria->compare($key, $value);
        }
        //ignore some new
        $notIds = array(Setting::s('FOOTER_ID', 'INFORMATION'));
        $notIdsString = implode(',', $notIds);
        $criteria->addCondition('id NOT IN('.$notIdsString.')');
        
        $criteria->order = "order_view desc, id desc";
        
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

    static function getPager($pageSize = 5,$pageVar = 'page', $condition = array('status'=>true)){
        $model = new News();
        $criteria = new CDbcriteria();

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes)  && $value !=null)
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


    public function getRelatedNews($limit = 6){
        if ($this->id > 0 ){
            $criteria=new CDbCriteria();
            $criteria->compare('news_id',$this->id);
            $criteria->limit = $limit;
            $tmp=SuggestNews::model()->findAll($criteria);
            $result=array();
            foreach ($tmp as $item) {
                $news=News::model()->findByPk($item->to_news_id);
                if(isset($news))
                    $result[]=$news;
            }
        }
        else {
            $result = array();
        }
        return $result;
    }


    static function getSearchItemsWithPager($pageSize = 5, $pageVar = 'page', $keyword, $condition = array('status'=>true)){
        $model = new News();
        $criteria = new CDbcriteria();

        $criteria->addCondition("name like '%".$keyword."%'");

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes) && $value != null)
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

        $list_item = $model::model()->findAll($criteria);

        if(!isset($list_item)){
            throw new CHttpException(404,'The specified post cannot be found.');
        }

        return $list_item;
    }


    static function getSearchPager($pageSize = 5, $pageVar = 'page',$keyword, $condition = array('status'=>true)){
        $model = new News();
        $criteria = new CDbcriteria();

        $criteria->addCondition("name like '%".$keyword."%'");

        if(!isset($condition['status'])) $condition['status'] = true;
        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes) && $value != null)
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