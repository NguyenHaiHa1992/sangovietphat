<?php

/**
 * This is the model class for table "{{suggest_recruitment}}".
 *
 * The followings are the available columns in table '{{suggest_recruitment}}':
 * @property integer $id
 * @property integer $recruitment_id
 * @property integer $to_recruitment_id
 */
class SuggestRecruitment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuggestRecruitment the static model class
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
		return '{{suggest_recruitment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recruitment_id, to_recruitment_id', 'required'),
			array('recruitment_id, to_recruitment_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, recruitment_id, to_recruitment_id', 'safe', 'on'=>'search'),
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
			'recruitment_id' => 'Recruitment',
			'to_recruitment_id' => 'To Recruitment',
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
		$criteria->compare('recruitment_id',$this->recruitment_id);
		$criteria->compare('to_recruitment_id',$this->to_recruitment_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}