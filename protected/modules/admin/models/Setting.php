<?php
/**
 * 
 * Setting class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
/**
 * This is the model class for table "setting".
 */
class Setting extends CActiveRecord
{
	public $list=array('SEO'=>'SEO','ADMIN'=>'ADMIN','INFORMATION'=>'INFORMATION');
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return string the associated database table name
	 */	
	public function tableName()
	{
		return 'tbl_setting';
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
		return array(
			array('name,value,category','required'),
			array('name','validateName'),
			array('description,introimage_id, language','safe')
		);
	}
	
	/**
	 *
	 * Function validator category
	 */
	public function validateName($attributes,$params){
		$criteria=new CDbCriteria();
		$criteria->compare('name',$this->name);
		$criteria->compare('category',$this->category);
		$model=Setting::model()->find($criteria);
		if($this->isNewRecord && isset($model))
			$this->addError('name', iPhoenixLang::admin_t('This name has been used'));
		if(!$this->isNewRecord && isset($model) && $model->id != $this->id)
			$this->addError('name', iPhoenixLang::admin_t('This name has been used'));
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */	
	public function attributeLabels()
	{
		return array(
			'name' => iPhoenixLang::admin_t('Name'),
			'value' => iPhoenixLang::admin_t('Value'),
			'category'=> iPhoenixLang::admin_t('Category'),
			'description'=> iPhoenixLang::admin_t('Description'),
			'introimage_id'=> iPhoenixLang::admin_t('Thumb image'),
			'language'=> iPhoenixLang::admin_t('Language')
		);
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		if (isset($_GET['pageSize'])) {
	        Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
	        unset($_GET['pageSize']);
	    }
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
		if(isset($condition_search))
			$criteria->addCondition($condition_search);
	
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('language',$this->language);
	
		$sort = new CSort();
		$sort->defaultOrder = 'category';
		$sort->attributes = array(
		    'name',
			'category',
		);
		$sort->applyOrder($criteria);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=> Yii::app()->user->getState('pageSize',10)),
			'sort'=>$sort,				
		));
	}
	/**
	 * Suggests a list of existing names matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching username names
	 */
	public function suggestName($keyword,$category=NULL,$limit=20)
	{
		$list_setting=$this->findAll(array(
			'condition'=>isset($category)?'name LIKE :keyword AND category="'.$category.'"':'name LIKE :keyword',
			'order'=>'name DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($list_setting as $setting)
			$names[]=$setting->name;
			return $names;
	}	
	public static function s($name,$category) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'name', $name );
		$criteria->compare ( 'category', $category );
		$model = self::model ()->find ( $criteria );
		if (isset ( $model ))
			return $model->value;
		else
		{
			throw new CHttpException(400,'Trong nhóm '.$category.' không tồn tại tham số cấu hình '.$name);
		}

	}

	protected function beforeSave()
	{
		if(parent::beforeSave()){
			if($this->isNewRecord)
			{
				$language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
				var_dump($language);exit;
				$this->language=$language;
			}

			return true;
		}
	}
}