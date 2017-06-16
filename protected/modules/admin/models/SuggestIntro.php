<?php

/**
 * This is the model class for table "{{suggest_intro}}".
 *
 * The followings are the available columns in table '{{suggest_intro}}':
 * @property integer $id
 * @property integer $intro_id
 * @property integer $to_intro_id
 */
class SuggestIntro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuggestIntro the static model class
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
		return '{{suggest_intro}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intro_id, to_intro_id', 'required'),
			array('intro_id, to_intro_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, intro_id, to_intro_id', 'safe', 'on'=>'search'),
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
			'intro_id' => 'Intro',
			'to_intro_id' => 'To Intro',
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
		$criteria->compare('intro_id',$this->intro_id);
		$criteria->compare('to_intro_id',$this->to_intro_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}