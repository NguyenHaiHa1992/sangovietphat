<?php

/**
 * This is the model class for table "{{product_image}}".
 *
 * The followings are the available columns in table '{{product_image}}':
 * @property integer $id
 * @property integer $product_id
 * @property integer $image_id
 * @property integer $type
 */
class ProductImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImage the static model class
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
		return '{{product_image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, image_id', 'required'),
			array('product_id, image_id, type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, image_id, type', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'image_id' => 'Image',
			'type' => 'Type',
		);
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('image_id',$this->image_id);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}