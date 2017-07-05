<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $id
 * @property integer $type
 * @property integer $status
 * @property string $name
 * @property integer $parent_id
 * @property integer $order_view
 * @property string $other
 * @property integer $created_by
 * @property integer $created_time
 */
class ProductCategory extends CActiveRecord
{
	public $old_order_view;
	public $old_parent_id;	
	const MAX_RANK=2;
	const TYPE=4;
	
	const STATUS_DISABLE=0;
	const STATUS_ENABLE=1;
	
	const DELETE_OK=1;
	const DELETE_HAS_CHILD=2;
	const DELETE_HAS_ITEMS=3;
	
	const FAIR_TRAVEL = 5;

	private $config_other_attributes=array('meta_keyword','meta_description','meta_title','catimage_id','introimage_id','boximage_id','description','extra','other_field_title','other_field_content');
	
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
	 * @return ProductCategory the static model class
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
		return '{{category}}';
	}
	
	/*
	 * Config scope of news
	 */
	public function defaultScope(){
		$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
		return array(
			'condition'=>'type = '.self::TYPE.' AND language = "'.$language.'"',
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
			array('status, name,introimage_id, parent_id, order_view, meta_keyword,meta_description,meta_title', 'required'),
			array('parent_id','validatorParent'),
			array('order_view','validatorOrder_view'),
			array('status, parent_id, order_view,introimage_id,boximage_id', 'numerical', 'integerOnly'=>true),
			array('introimage_id','validatorIntroimage'),
            array('boximage_id','validatorBoximage'),
			array('alias, name,meta_keyword,meta_description,meta_title', 'length', 'max'=>256),
			array('description, extra, other_field_title, other_field_content', 'length', 'max'=>80000),			
		);
	}
	
	/**
	 *
	 * Function validator category
	 */
	public function validatorIntroimage($attributes,$params){
		if(isset($this->introimage_id)&&!isset($this->introimage)){
			$this->addError('introimage_id', 'Introimage invalid');
		}
	}


    public function validatorCatimage($attributes,$params){
        if(isset($this->catimage_id)&&!isset($this->catimage)){
            $this->addError('catimage_id', 'Catimage invalid');
        }
    }


    public function validatorBoximage($attributes,$params){
        if(isset($this->boximage_id)&&!isset($this->boximage)){
            $this->addError('boximage_id', 'Boximage invalid');
        }
    }
	
	/**
	 *
	 * Function validator parent
	 */
	public function validatorParent($attributes,$params){
		if(!$this->isNewRecord){
			$black_list=array();
			$black_list[]=$this->id;
			//Remove all child of menu
			$list_child_nodes=$this->child_nodes;
			$max=0;
			foreach ($list_child_nodes as $node_id=>$level){
				$black_list[]=$node_id;
				if($level>$max)
					$max=$level;
			}
			if(in_array($this->parent_id,$black_list))
				$this->addError('parent_id', 'Parent_id invalid');
			
			$parent_level=($this->parent_id > 0)?$this->parent->level:0;
			if(($max+1+$parent_level) > self::MAX_RANK)
				$this->addError('parent_id', 'Max rank');
		}
	}
	
	/**
	 *
	 * Function validator order view
	 */
	public function validatorOrder_view($attributes,$params){
		if($this->isNewRecord){
			//Check order view
			if($this->order_view > (sizeof($this->list_order_view)+1))
				$this->addError('order_view', 'Order_view invalid');
		}
		else{
			if($this->old_parent_id == $this->parent_id){
				//Check order view
				if($this->order_view > (sizeof($this->list_order_view)))
					$this->addError('order_view', 'Order_view invalid');
			}
			else{
				//Check order view
				if($this->order_view > (sizeof($this->list_order_view)+1))
					$this->addError('order_view', 'Order_view invalid');
			}
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
			'parent'=>array(self::BELONGS_TO,'ProductCategory','parent_id'),
			'introimage'=>array(self::BELONGS_TO,'Image','introimage_id'),
            'boximage'=>array(self::BELONGS_TO,'Image','boximage_id'),
            'catimage'=>array(self::BELONGS_TO,'Image','catimage_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => iPhoenixLang::admin_t('All','product'),
			'name' => iPhoenixLang::admin_t('Name','product'),
			'parent_id' => iPhoenixLang::admin_t('Parent category','product'),
			'order_view' => iPhoenixLang::admin_t('Order view','product'),
			'introimage_id' => iPhoenixLang::admin_t('Thumb image','product'),
			'description' => iPhoenixLang::admin_t('Description','product'),
			'extra' => iPhoenixLang::admin_t('Extra','product'),
			'alias'=>iPhoenixLang::admin_t('Alias','product'),
            'boximage_id' => 'Ảnh box trang chủ',
            'catimage_id' => 'Ảnh danh mục',
		);
	}
		
	
	/**
	 * This event is raised after the record is instantiated by a find method.
	 * @param CEvent $event the event parameter
	 */
	protected function afterFind(){		
			
		if(isset($this->other))
			$this->other=json_decode($this->other,true);
		
		//Store old order view
		$this->old_order_view=$this->order_view;
		//Store old parent id
		$this->old_parent_id=$this->parent_id;
		
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
				$this->type=self::TYPE;
				$this->created_time=time();
				$this->created_by=Yii::app()->user->id;
				$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
				$this->language=$language;
				if(!is_array($this->other))
					$this->other=array();
			}

			$this->alias = iPhoenixString::createAlias($this->name);
			$this->other = json_encode( $this->other );
			return true;
		}
	}
	
	protected function afterSave()
	{
		$this->updateOrderView();
		
		if(isset($this->other))
			$this->other=json_decode($this->other,true);
		
		//Store old order view
		$this->old_order_view=$this->order_view;
		//Store old parent id
		$this->old_parent_id=$this->parent_id;

	    parent::afterSave();
	}
	
	/**
	 * Returns all categorys
	 * @return array $result all categorys
	 */
	static function getList_nodes(){
		$result=array();
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id', 0);
		$criteria->order='order_view';
		$list_nodes=self::model()->findAll($criteria);
		foreach ($list_nodes as $node){
			$result += array($node->id => 1);
			//$this->tmp_list=array();
			$result += self::treeTraversal($node->id, 1, PHP_INT_MAX);
			//$result += $this->tmp_list;
		}
		return $result;
	}
	
	/**
	 * Returns all nodes in the type
	 * @return array $result all nodes in the type
	 */
	public function getList_active_nodes(){
		$list_nodes=$this->getList_nodes();
		foreach ($list_nodes as $id=>$level) {
			$node=self::model()->findByPk($id);	
			if($node->status == self::STATUS_DISABLE){
				unset($list_nodes[$id]);	
				foreach($node->child_nodes as $child_node_id => $level){
					unset($list_nodes[$child_node_id]);	
				}			
			}		
		}
		return $list_nodes;
	}
	
	/**
	 * Returns all sub-categorys of the category.
	 * @return array $result array of sub-categorys of this node
	 */
	public function getChild_nodes(){
		return self::treeTraversal($this->id, 0, PHP_INT_MAX);
	}
	
	/**
	 * Return ancestor categorys of the category
	 * @return array $result array of ancestor categorys of this category
	 */
	public function getAncestor_nodes(){
		$result=array();
		$check=true;
		$current_id=$this->id;
		while ($check&&$current_id>0){
			$current=self::model()->findByPk($current_id);
			$result[]=$current_id;
			if($current->parent_id==0){
				$check=false;
			}
			else
				$current_id=$current->parent_id;
		}
		return $result;
	}
		
	/**
	 * Returns order view of brother nodes
	 * @return array $result, the array sibling of this node
	 */
	public function getList_order_view(){
		$result=array();
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id', $this->parent_id);
		$list=self::model()->findAll($criteria);
	
		foreach ($list as $cat){
			$result[$cat->id]=$cat->order_view;
		}
		return $result;
	}
	
	/**
	 * Recursive algorithms for tree traversals
	 */
	static function treeTraversal($node_id,$level,$rank){
		$tmp_list=array();
		if($node_id > 0){
			$new_level=$level+1;
			$criteria=new CDbCriteria;
			$criteria->compare('parent_id', $node_id);
			$criteria->order='order_view';
			$list_menu=self::model()->findAll($criteria);
			foreach ($list_menu as $menu){
				//Get route and params if type is menu
				//$this->tmp_list[$menu->id]=$new_level;
				$tmp_list[$menu->id]=$new_level;
				if($new_level<$rank){
					$tmp_list += self::treeTraversal($menu->id, $new_level, $rank);
				}
			}
		}
		return $tmp_list;
	}


    static function getActiveMenu(){
        $list_menu = array();
        $list_nodes = self::getList_nodes();
        foreach ($list_nodes as $id=>$level) {
            $node=self::model()->findByPk($id);
            if($node->status != self::STATUS_DISABLE){
                $list_menu[$node->id] = $node;
            }
        }
        return $list_menu;
    }
	
	/*
	 * Returns the level of the node in group
	*/
	public function getLevel(){
		$list_nodes=$this->list_nodes;
		foreach ($list_nodes as $id=>$level) {
			if($this->id==$id) return $level;
		}
	}
	
	/**
	 * Update order view of a category
	 */
	public function changeOrderview($new_order_view) {
		$table_name=$this->tableName();
		$sql='UPDATE '.$table_name.' SET order_view = '.$new_order_view.' WHERE id = '.$this->id.' AND type = '.self::TYPE;
		$command=Yii::app()->db->createCommand($sql);
		if($command->execute()) 
			return true;
		else 
			return false;
	}
	
	/**
	 * Change order view of a category
	 * @return boolean false if it is not changed successfully
	 * otherwise, it changed the order of this category
	 */
	
	public function updateOrderView() {
		if($this->isNewRecord)
		{
			//Fix order view in new parent category
			$list_order_view=$this->list_order_view;
			foreach ( $list_order_view as $id => $order ) {
				if ($id != $this->id && $order >= $this->order_view) {
					$category = ProductCategory::model ()->findByPk ( $id );
					if($order < sizeof($list_order_view)){
						$order_view = $order + 1;
						$category->changeOrderview($order_view);
					}
				}
			}
		}
		else{
			//Change order view
			if ($this->parent_id == $this->old_parent_id) {
				if ($this->order_view < $this->old_order_view) {
					$list_order_view=$this->list_order_view;
					foreach ( $list_order_view as $id => $order ) {
						if ($id != $this->id && $order >= $this->order_view) {
							$category = ProductCategory::model ()->findByPk ( $id );
							if ($category->order_view < $this->old_order_view ){
								if($order < sizeof($list_order_view)){
									$order_view = $order + 1;
									$category->changeOrderview($order_view);
								}
							}
						}
					}
				}
				
				if ($this->order_view > $this->old_order_view) {
					$list_order_view=$this->list_order_view;
					foreach ( $list_order_view as $id => $order ) {
						if ($id != $this->id && $order <= $this->order_view) {
							$category = ProductCategory::model ()->findByPk ( $id );
							if ($category->order_view > $this->old_order_view ){
								if($order > 1){
									$order_view = $order - 1;
									$category->changeOrderview($order_view);
								}
							}
						}
					}
				}
			} 
			else {
				//Fix order view in old parent category
				$list = ProductCategory::model ()->findAll ( 'parent_id=' . $this->old_parent_id );
				foreach ( $list as $category ) {
					if ($category->order_view > $this->old_order_view) {
						if($category->order_view > 1){
							$order_view = $category->order_view - 1;
							$category->changeOrderview($order_view);
						}
					}
				}
				//Fix order view in new parent category
				$list_order_view=$this->list_order_view;
				foreach ( $list_order_view as $id => $order ) {
					if ($id != $this->id && $order >= $this->order_view) {
						$category = ProductCategory::model ()->findByPk ( $id );
						if($order < sizeof($list_order_view)){
							$order_view = $order + 1;
							$category->changeOrderview($order_view);
						}
					}
				}
			}
		}
	}
	public function checkDelete($id){
		$list_category=ProductCategory::model()->findAll('parent_id = '.$id);
		if(sizeof($list_category)>0){
			return self::DELETE_HAS_CHILD;
		}
		$list=Product::model()->findAll('cat_id = '. $id);
		if(sizeof($list)>0) 
			return self::DELETE_HAS_ITEMS;
		return self::DELETE_OK;
	}
	/*
	 * Get detail url
	 */
	 /*public function getDetail_url(){
	 	return iPhoenixUrl::createUrl('product/listByCategory',array('alias'=>iPhoenixString::createAlias($this->name)));
	 }*/

    public function getDetail_url(){
        return iPhoenixUrl::createUrl('product/list',array('cat_id'=>$this->id,'alias'=>iPhoenixString::createAlias($this->name)));
    }


    public function getIntroimage_src(){
        return $this->introimage->getAbsoluteThumbUrl(100,100,false);
    }


    public function getIntroimage_thumb($width,$height,$ratio = true){
        if(isset($this->introimage))
            return $this->introimage->getAbsoluteThumbUrl($width,$height,$ratio);
        return null;
    }


    public function getBoximage_thumb($width,$height,$ratio = true){
        if(isset($this->boximage))
            return $this->boximage->getAbsoluteThumbUrl($width,$height,$ratio);
        return null;
    }


    /*
     * Get all products
     */
	 public function getAllProducts(){
	 	$criteria=new CDbCriteria();
	 	$criteria->compare('status',true);
	 	$criteria->compare('cat_id',$this->id);
		$criteria->order='order_view DESC, id DESC';
	 	return Product::model()->findAll($criteria);
	 }

	 /*
	  * Count all products
	  */
	 public function getCountProducts(){
	 	$criteria=new CDbCriteria();
	 	$criteria->compare('status',true);
	 	$criteria->compare('cat_id',$this->id);
		$criteria->order='order_view DESC, id DESC';
	 	$list_product = Product::model()->findAll($criteria);
		return count($list_product);
	 }

	 /**
	 * Get active menu
	 * @return array $result, the active menu in admin board
	 */
	public function findActiveMenu(){
		$list=$this->list_nodes;	
		$result=array();
		foreach ($list as $id=>$level){
			$menu=self::model()->findByPk($id);
			$list_url=array();
			$list_url[]="$_SERVER[REQUEST_URI]";
		
			if(in_array($menu->detail_url,$list_url))
			{
				$result=$menu->ancestor_nodes;
			}
		}
		return $result;
	}

	static function getItem($condition = array('status'=>true)){
		$model = new ProductCategory();
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

	static function getItems($limit = 5,$condition = array('status'=>true)){
		$model = new ProductCategory();
		$criteria = new CDbcriteria();
		if(!isset($limit)) $limit = 10;
		if($limit != 0) $criteria->limit = $limit;

		if(!isset($condition['status'])) $condition['status'] = true;

		foreach($condition as $key=>$value){
			if(array_key_exists($key,$model->attributes))
				$criteria->compare($key, $value);
		}
		$criteria->order = "order_view";
		$list_item = $model::model()->findAll($criteria);
		if(!isset($list_item)){
			throw new CHttpException(404,'The specified post cannot be found.');
		}

		return $list_item;
	}
}