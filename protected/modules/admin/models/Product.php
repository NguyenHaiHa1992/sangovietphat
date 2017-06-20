<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property integer $cat_id
 * @property integer $status_warehouse
 * @property integer $home
 * @property integer $new
 * @property integer $sale
 * @property integer $price
 * @property integer $order_view
 * @property integer $visits
 * @property string $other
 * @property integer $created_by
 * @property integer $created_time
 * @property integer $best_sell
 */
class Product extends CActiveRecord
{

    const PAGE_SIZE = 9;

    public $tmp_suggest_ids;
    public $tmp_news_ids;
    public $tmp_suggest_video;

	private $config_other_attributes=array('thickness','detailimage_id','width','height','model','warranty','description','introduction', 'meta_keyword','meta_description','meta_title','old_price','tmp_image_ids');
	
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
	 * @return Product the static model class
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
		return '{{product}}';
	}
	/**
	 * Config scope of product
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
			array('name, cat_id, introimage_id, detailimage_id, model,meta_keyword,meta_description,meta_title', 'required'),
			array('cat_id, introimage_id,detailimage_id, order_view, visits', 'numerical', 'integerOnly'=>true),
			array('status,home,new', 'boolean'),
			array('cat_id','validatorCategory'),
			array('introimage_id','validatorIntroimage'),
            array('detailimage_id','validatorDetailimage'),
            array('price, old_price', 'length', 'max'=>32),
			array('description, introduction', 'length', 'max'=>80000),
			array('name, alias, meta_keyword, meta_description, meta_title,model,warranty,thickness,width,height', 'length', 'max'=>256),
			array('tmp_suggest_ids, tmp_news_ids ,tmp_image_ids, tmp_suggest_video','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, list_city, name, cat_id, home, new, best_sell', 'safe', 'on'=>'search'),
		);
	}

	/**
	 *
	 * Function validator category
	 */
	public function validatorIntroimage($attributes,$params){
		if(!isset($this->introimage)){
				$this->addError('introimage_id', 'Introimage invalid');
		}		
	}



    public function validatorDetailimage($attributes,$params){
        if(!isset($this->introimage)){
            $this->addError('detailimage_id', 'Detailimage invalid');
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
            'detailimage'=>array(self::BELONGS_TO,'Image','detailimage_id'),
			'category'=>array(self::BELONGS_TO,'ProductCategory','cat_id'),
            'images' => array(self::MANY_MANY, 'Image', 'tbl_product_image(product_id, image_id)'),
		);
	}

    public function getList_suggest_product(){
        if ($this->id > 0 ){
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $tmp=SuggestProduct::model()->findAll($criteria);
            $result=array();
            foreach ($tmp as $item) {
                $product=Product::model()->findByPk($item->to_product_id);
                if(isset($product))
                    $result[]=$product;
            }
        }
        else {
            $result = array();
        }
        return $result;
    }


    public function getList_suggest_news(){
        if ($this->id > 0 ){
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $tmp=SuggestProductNews::model()->findAll($criteria);
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
     * @return get list suggest news rental
     */
    public function getList_suggest_video(){
        if ($this->id > 0 ){
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $tmp=SuggestProductVideo::model()->findAll($criteria);
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


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => iPhoenixLang::admin_t('Status'),
			'name' => iPhoenixLang::admin_t('Name'),
			'cat_id' => iPhoenixLang::admin_t('Category'),
			'introimage_id' => iPhoenixLang::admin_t('Thumb image'),
			'introduction'=>iPhoenixLang::admin_t('Introduction'),
			'description' => iPhoenixLang::admin_t('Description'),
			'meta_title' => 'Meta Title',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'created_by' => iPhoenixLang::admin_t('Creator'),
			'created_time' => iPhoenixLang::admin_t('Created time'),
			'tmp_suggest_ids' => iPhoenixLang::admin_t('Related products'),
			'tmp_news_ids'=>iPhoenixLang::admin_t('Related news'),
			'tmp_suggest_video' => iPhoenixLang::admin_t('Related videos'),
			'order_view' => iPhoenixLang::admin_t('Order view'),
			'home' => iPhoenixLang::admin_t('Display in homepage'),
			'new' => iPhoenixLang::admin_t('Display in new product'),
			'price' => iPhoenixLang::admin_t('Price'),
			'old_price' => iPhoenixLang::admin_t('Old price'),
			'images' => iPhoenixLang::admin_t('Other images'),
			'alias'=>iPhoenixLang::admin_t('Alias'),
			'extra'=>iPhoenixLang::admin_t('Extra'),
			'list_city'=>iPhoenixLang::admin_t('Province/City'),
			'visits'=>iPhoenixLang::admin_t('Visits'),
            'thickness' => 'Độ dày',
            'width' => 'Chiều rộng',
            'height' => 'Chiều dài',
            'warranty' => 'Bảo hành',
            'model' => 'Model',
            'detailimage_id' => 'Ảnh chi tiết',
            'best_sell'  => 'Bán chạy'
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
		$criteria->compare('name',$this->name,true);
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		//Filter cat_id
		$cat = ProductCategory::model ()->findByPk ( $this->cat_id );
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
            'status',
            'new',
            'home',
            /*'visits'*/
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
        $criteria->compare('product_id',$this->id);
        $tmp=SuggestProduct::model()->findAll($criteria);
        $result=array();
        foreach ($tmp as $item) {
            $result[]=$item->to_product_id;
        }
        $this->tmp_suggest_ids=implode(',',$result);

        $criteria=new CDbCriteria();
        $criteria->compare('product_id',$this->id);
        $tmp=SuggestProductNews::model()->findAll($criteria);
        $result=array();
        foreach ($tmp as $item) {
            $result[]=$item->to_news_id;
        }
        $this->tmp_news_ids=implode(',',$result);

        /*$list=$this->list_suggest_video;
        $result=array();
        foreach ($list as $video) {
            $result[]=$video->id;
        }
        $this->tmp_suggest_video=implode(',',$result);*/

		return parent::afterFind();
	}
	
	/**
	 * This method is invoked before saving a record (after validation, if any).
	 * The default implementation raises the {@link onBeforeSave} event.
	 * You may override this method manualto do any preparatio work for record saving.
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
        foreach ($new_list_suggest_ids as $product_id) {
            if($product_id != $this->id){
                $criteria=new CDbCriteria();
                $criteria->compare('product_id',$this->id);
                $criteria->compare('to_product_id',$product_id);
                $suggest_product=SuggestProduct::model()->find($criteria);
                if(!isset($suggest_product)){
                    $suggest_product=new SuggestProduct();
                    $suggest_product->product_id=$this->id;
                    $suggest_product->to_product_id=$product_id;
                    $suggest_product->save();
                }
            }
        }
        $list_current_suggest_ids=$this->list_current_suggest_ids;
        foreach ($list_current_suggest_ids as $product_id) {
            if(!in_array($product_id,$new_list_suggest_ids) || $product_id == $this->id) {
                $criteria=new CDbCriteria();
                $criteria->compare('product_id',$this->id);
                $criteria->compare('to_product_id',$product_id);
                SuggestProduct::model()->deleteAll($criteria);
            }
        }

        $new_list_news_ids=explode(',',$this->tmp_news_ids);
        foreach ($new_list_news_ids as $news_id) {
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $criteria->compare('to_news_id',$news_id);
            $suggest_news=SuggestProductNews::model()->find($criteria);
            if(!isset($suggest_news)){
                $suggest_news=new SuggestProductNews();
                $suggest_news->product_id=$this->id;
                $suggest_news->to_news_id=$news_id;
                $suggest_news->save();
            }
        }
        $list_current_suggest_news=$this->list_current_suggest_news;
        foreach ($list_current_suggest_news as $news_id) {
            if(!in_array($news_id, $new_list_news_ids)) {
                $criteria=new CDbCriteria();
                $criteria->compare('product_id',$this->id);
                $criteria->compare('to_news_id',$product_id);
                SuggestProductNews::model()->deleteAll($criteria);
            }
        }

        $new_list_image_ids=explode(',',$this->tmp_image_ids);
        foreach ($new_list_image_ids as $image_id) {
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $criteria->compare('image_id',$image_id);
            $product_image=ProductImage::model()->find($criteria);
            if(!isset($product_image)){
                $product_image=new ProductImage();
                $product_image->product_id=$this->id;
                $product_image->image_id=$image_id;
                $product_image->save();
            }
        }
        $list_current_image_ids=$this->list_current_image_ids;
        foreach ($list_current_image_ids as $image_id) {
            if(!in_array($image_id,$new_list_image_ids)){
                $criteria=new CDbCriteria();
                $criteria->compare('product_id',$this->id);
                $criteria->compare('image_id',$image_id);
                ProductImage::model()->deleteAll($criteria);
            }
        }

        /*$new_list_suggest_video=explode(',',$this->tmp_suggest_video);
        foreach ($new_list_suggest_video as $video_id) {
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $criteria->compare('to_video_id',$video_id);
            $suggest_video=SuggestProductVideo::model()->find($criteria);
            if(!isset($suggest_video)){
                $suggest_video=new SuggestProductVideo();
                $suggest_video->product_id=$this->id;
                $suggest_video->to_video_id=$video_id;
                $suggest_video->save();
            }
        }

        $list_current_suggest_video=$this->list_current_suggest_video;
        foreach ($list_current_suggest_video as $video_id) {
            if(!in_array($video_id,$new_list_suggest_video)) {
                $criteria=new CDbCriteria();
                $criteria->compare('product_id',$this->id);
                $criteria->compare('to_video_id',$video_id);
                SuggestProductVideo::model()->deleteAll($criteria);
            }
        }*/

	    parent::afterSave();
	}


    protected function afterDelete()
    {
        parent::afterDelete();

        $criteria=new CDbCriteria();
        $criteria->addCondition('product_id ='.$this->id.' OR to_product_id = '.$this->id);
        SuggestProduct::model()->deleteAll($criteria);

        $criteria=new CDbCriteria();
        $criteria->addCondition('product_id ='.$this->id);
        SuggestProductNews::model()->deleteAll($criteria);

        $criteria=new CDbCriteria();
        $criteria->addCondition('product_id ='.$this->id);
        ProductImage::model()->deleteAll($criteria);

        $criteria=new CDbCriteria();
        $criteria->addCondition('product_id ='.$this->id);
        OrderProduct::model()->deleteAll($criteria);

        $criteria=new CDbCriteria();
        $criteria->addCondition('parent_id ='.$this->id);
        $criteria->compare('parent_class','Product',true);
        Comment::model()->deleteAll($criteria);

        $criteria=new CDbCriteria();
        $criteria->addCondition('product_id ='.$this->id);
        SuggestProductVideo::model()->deleteAll($criteria);
    }

    public function getList_current_suggest_ids(){
        $list=$this->list_suggest_product;
        $result=array();
        foreach ($list as $product) {
            $result[]=$product->id;
        }
        return $result;
    }

    public function getList_current_suggest_news(){
        $list=$this->list_suggest_news;
        $result=array();
        foreach ($list as $news) {
            $result[]=$news->id;
        }
        return $result;
    }

    public function getList_current_news_ids(){
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

    /*public function getList_current_suggest_video(){
        $list=$this->list_suggest_video;
        $result=array();
        foreach ($list as $video) {
            $result[]=$video->id;
        }
        return $result;
    }*/


	 /**
	 * Copy product
	 */
	 public function copy($cat_id=null,$name=null){
         $cat_id=isset($cat_id)?$cat_id:$this->cat_id;
         $name=isset($name)?$name:$this->name.'_copy';
         $copy_product=new Product();
         $copy_product->name=$name;
		 $copy_product->alias=$this->alias;
		 $copy_product->cat_id=$cat_id;
		 $copy_product->introimage_id=$this->introimage_id;
         $copy_product->detailimage_id=$this->detailimage_id;
		 $copy_product->description=$this->description;
		 $copy_product->introduction=$this->introduction;
		 $copy_product->home=$this->home;
		 $copy_product->new=$this->new;
		 $copy_product->status=$this->status;
         $copy_product->model=$this->model;
		 $copy_product->thickness=$this->thickness;
		 $copy_product->price=$this->price;
         $copy_product->old_price=$this->old_price;
		 $copy_product->width=$this->width;
		 $copy_product->height=$this->height;
         $copy_product->tmp_image_ids=$this->tmp_image_ids;
         $copy_product->meta_keyword=$this->meta_keyword;
         $copy_product->meta_description=$this->meta_description;
         $copy_product->meta_title=$this->meta_title;
         $copy_product->tmp_suggest_ids=$this->tmp_suggest_ids;
		 $copy_product->warranty=$this->warranty;
		 if($copy_product->save())
			 return $copy_product;
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
			return Yii::app()->theme->baseUrl.'/images/question.png';;
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
		$list_product=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_product as $product)
			$names[]=$product->name;
			return $names;
	}
	/*
	 * Get detail url
	 */
	 public function getDetail_url(){
	 	return iPhoenixUrl::createUrl('product/view',array('id'=>$this->id,'product_alias'=>$this->alias));
	 }
	 
	 /*
	 * Get category url
	 */
	 public function getCategory_url(){
	 	return $this->category->detail_url;
	 }

    public function getTitle_text($lenght = 3){
        return iPhoenixString::createIntrotext($this->name,$lenght);
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
	  * Visited
	  */
	 public function visited(){
	 	$this->visits=$this->visits+1;
		$this->save();
	}
	
	/**
	 * get list products
	 */
	 static function listProducts()
	 {
	 	$list_products = array();
		
		$criteria = new CDBCriteria();
		$criteria->compare('status',true);
		$criteria->order = 'order_view asc, created_time desc';
		$temp = Product::model()->findAll($criteria);
			
		foreach ($temp as $p) 
			$list_products[$p->id] = $p->name;
		
		return $list_products;
	 }

	public function getUrl(){
		return iPhoenixUrl::createUrl('product/view',array('id'=>$this->id,'product_alias'=>$this->alias));
	}

	public function getTitleH1($length = 30, $class = "title"){
		return '<h1 class="'.$class.'">'.$this->title.'</h1>';
	}

	public function getTitleUrl($length = 30, $class = "title"){
		return '<a class="'.$class.'" title="'.$this->title.'" href="'.$this->url.'">'.iPhoenixString::createIntrotext($this->title, $length).'</a>';
	}

	public function getIntrotext($length = 100, $class = "content"){
		return '<div class="'.$class.'">'.iPhoenixString::createIntrotext($this->description, $length).'</div>';
	}

	public function getCreatedTime($format = 'd/m/Y'){
		return '<span class="created_time">'.date($format, $this->created_time).'</span>';
	}

	public function getThumb($width = 100, $height = 100, $scale = false){
		if(isset($this->introimage))
			return '<img class="thumb" alt="" src="'.$this->introimage->getAbsoluteThumbUrl($width, $height, $scale).'"/>';
	}

	public function getThumbSrc($width = 100, $height = 100, $scale = false){
		if(isset($this->introimage))
			return $this->introimage->getAbsoluteThumbUrl($width, $height, $scale);
	}

	public function getReadmore($label = "Readmore", $class="readmore", $target = ''){
		return '<a class="readmore" title="'.$this->title.'" href="'.$this->url.'" target="'.$target.'">'.$label.'</a>';
	}

	static function getItem($condition = array('status'=>true)){
		$model = new Product();
		$criteria = new CDbcriteria();

		if(!isset($condition['status'])) $condition['status'] = true;

		foreach($condition as $key=>$value){
			if(array_key_exists($key,$model->attributes))
				$criteria->compare($key, $value);
		}

		$item = $model::model()->find($criteria);

		if(!isset($item)){
			throw new CHttpException(404,'The specified post cannot be found.');
		}

		return $item;
	}



    static function getItemById($id){
        $model = new Product();

        $item = $model::model()->findByPk($id);

        if(!isset($item)){
            throw new CHttpException(404,'The specified post cannot be found.');
        }

        return $item;
    }


    static function getItems($limit = 5,$condition = array('status'=>true)){
        $model = new Product();
        $criteria = new CDbcriteria();
        if(!isset($limit)) $limit = 10;
        if($limit != 0) $criteria->limit = $limit;

        if(!isset($condition['status'])) $condition['status'] = true;

        foreach($condition as $key=>$value){
            if(array_key_exists($key,$model->attributes) && $value != null)
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
		$model = new Product();
		$criteria = new CDbcriteria();

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

	static function getPager($pageSize = 5, $pageVar = 'page', $condition = array('status'=>true)){
		$model = new Product();
		$criteria = new CDbcriteria();

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


    public function getRelatedItems($limit = 6){
        if ($this->id > 0 ){
            $criteria=new CDbCriteria();
            $criteria->compare('product_id',$this->id);
            $criteria->limit = $limit;
            $tmp=SuggestProduct::model()->findAll($criteria);
            $result=array();
            foreach ($tmp as $item) {
                $product=Product::model()->findByPk($item->to_product_id);
                if(isset($product))
                    $result[]=$product;
            }
        }
        else {
            $result = array();
        }
        return $result;
    }


    static function getSearchItemsWithPager($pageSize = 5, $pageVar = 'page', $keyword, $condition = array('status'=>true)){
        $model = new Product();
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
        $model = new Product();
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
    
    public function getAttributeImageStatus($attribute)
    {
        if($this->$attribute) 
            return Yii::app()->theme->baseUrl.'/images/enable.png';
        else
            return Yii::app()->theme->baseUrl.'/images/disable.png';
    }
}