<?php

/**
 * This is the model class for table "{{booking}}".
 *
 * The followings are the available columns in table '{{booking}}':
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
class Booking extends CActiveRecord
{
	public $tmp_suggest_ids;
	
	private $config_other_attributes=array('content');	
	
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
	 * @return Booking the static model class
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
		return '{{booking}}';
	}
	
	/**
	 * Config scope of booking
	 */
	// public function defaultScope(){
		// $language=isset($_GET['iphoenix_language'])?$_GET['iphoenix_language']:Yii::app()->language;
		// return array(
			// 'condition'=>'language = "'.$language.'"',
		// );	
	// }
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('places, first_name, last_name, sex, nationality, address, country, email,allow_call', 'required'),
			array('plan_adult, plan_child, plan_days,plan_budget', 'required'),
			array('plan_adult, plan_child, plan_days,plan_budget, travel_style, travel_activity, travel_homestay, travel_beach,service_transport, service_room, service_meal, group, nationality', 'numerical', 'integerOnly'=>true),
			array('status,allow_call', 'boolean'),
			array('email','email'),
			array('content', 'length', 'max'=>1000),
			array('first_name, last_name, address, email, places, country, phone', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status, places, plan_date,plan_month, nationlity, country', 'safe', 'on'=>'search'),
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
			'status' => 'Status',
			'content' => 'Content',
			'created_time' => 'Created time',
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

		if(isset($condition_search))
			$criteria->addCondition($condition_search);
		
	 	  $sort = new CSort();
		  $sort->defaultOrder = 'id DESC';
		  $sort->attributes = array(
		    'created_time',
		    'status',
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

	    parent::afterSave();
	}
	
	protected function afterDelete()
    {
    	parent::afterDelete();
	}
	
	public function getList_current_suggest_ids(){
		$list=$this->list_suggest_booking;
		$result=array();
		foreach ($list as $booking) {
			$result[]=$booking->id;
		}
		return $result;
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
		$list_booking=$this->findAll(array(
			'condition'=>'title LIKE :keyword',
			'order'=>'title DESC',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$titles=array();
		foreach($list_booking as $booking)
			$titles[]=$booking->title;
			return $titles;
	}

	static function listCountry(){
		return array(
			"0"=>"Choose",
			"42"=>"Afghanistan",
			"43"=>"Albania",
			"44"=>"Algeria",
			"45"=>"Andorra",
			"46"=>"Angola",
			"47"=>"Argentina",
			"48"=>"Armenia",
			"49"=>"Australia",
			"50"=>"Austria",
			"51"=>"Azerbaijan",
			"52"=>"Bahamas",
			"53"=>"Bahrain",
			"54"=>"Bangladesh",
			"55"=>"Barbados",
			"56"=>"Belarus",
			"57"=>"Belgium",
			"58"=>"Belize",
			"59"=>"Benin",
			"60"=>"Bhutan",
			"61"=>"Bolivia",
			"62"=>"Bosnia-Herzegovina",
			"63"=>"Botswana",
			"64"=>"Brazil",
			"65"=>"Britain",
			"66"=>"Brunei",
			"67"=>"Bulgaria",
			"68"=>"Burkina",
			"69"=>"Burma (official name Myanmar)",
			"70"=>"Burundi",
			"71"=>"Cambodia",
			"72"=>"Cameroon",
			"73"=>"Canada",
			"74"=>"Cape Verde Islands",
			"75"=>"Chad",
			"76"=>"Chile",
			"77"=>"China",
			"78"=>"Colombia",
			"79"=>"Congo",
			"80"=>"Costa Rica",
			"81"=>"Croatia",
			"82"=>"Cuba",
			"83"=>"Cyprus",
			"84"=>"Czech Republic",
			"85"=>"Denmark",
			"86"=>"Djibouti",
			"87"=>"Dominica",
			"88"=>"Dominican Republic",
			"89"=>"Ecuador",
			"90"=>"Egypt",
			"91"=>"El Salvador",
			"92"=>"England",
			"93"=>"Eritrea",
			"94"=>"Estonia",
			"95"=>"Ethiopia",
			"96"=>"Fiji",
			"97"=>"Finland",
			"98"=>"France",
			"99"=>"Gabon",
			"100"=>"Gambia, the",
			"101"=>"Georgia",
			"102"=>"Germany",
			"103"=>"Ghana",
			"104"=>"Greece",
			"105"=>"Grenada",
			"106"=>"Guatemala",
			"107"=>"Guinea",
			"108"=>"Guyana",
			"109"=>"Haiti",
			"110"=>"Holland (also Netherlands)",
			"111"=>"Honduras",
			"112"=>"Hungary",
			"113"=>"Iceland",
			"114"=>"India",
			"115"=>"Indonesia",
			"116"=>"Iran",
			"117"=>"Iraq",
			"118"=>"Ireland, Republic of",
			"223"=>"Israel",
			"119"=>"Italy",
			"120"=>"Jamaica",
			"121"=>"Japan",
			"122"=>"Jordan",
			"123"=>"Kazakhstan",
			"124"=>"Kenya",
			"125"=>"Kuwait",
			"126"=>"Laos",
			"127"=>"Latvia",
			"128"=>"Lebanon",
			"129"=>"Liberia",
			"130"=>"Libya",
			"131"=>"Liechtenstein",
			"132"=>"Lithuania",
			"133"=>"Luxembourg",
			"134"=>"Macedonia",
			"135"=>"Madagascar",
			"136"=>"Malawi",
			"137"=>"Malaysia",
			"138"=>"Maldives",
			"139"=>"Mali",
			"140"=>"Malta",
			"141"=>"Mauritania",
			"142"=>"Mauritius",
			"143"=>"Mexico",
			"144"=>"Moldova",
			"145"=>"Monaco",
			"146"=>"Mongolia",
			"147"=>"Montenegro",
			"148"=>"Morocco",
			"149"=>"Mozambique",
			"150"=>"Myanmar",
			"151"=>"Namibia",
			"152"=>"Nepal",
			"153"=>"Netherlands",
			"154"=>"New Zealand",
			"155"=>"Nicaragua",
			"156"=>"Niger",
			"157"=>"Nigeria",
			"158"=>"North Korea",
			"159"=>"Norway",
			"160"=>"Oman",
			"161"=>"Pakistan",
			"162"=>"Panama",
			"163"=>"Papua New Guinea",
			"164"=>"Paraguay",
			"165"=>"Peru",
			"166"=>"the Philippines",
			"167"=>"Poland",
			"168"=>"Portugal",
			"169"=>"Qatar",
			"170"=>"Romania",
			"171"=>"Russia",
			"172"=>"Rwanda",
			"173"=>"Saudi Arabia",
			"174"=>"Scotland",
			"175"=>"Senegal",
			"176"=>"Serbia",
			"177"=>"Seychelles, the",
			"178"=>"Sierra Leone",
			"179"=>"Singapore",
			"180"=>"Slovakia",
			"181"=>"Slovenia",
			"182"=>"Solomon Islands",
			"183"=>"Somalia",
			"184"=>"South Africa",
			"185"=>"South Korea",
			"186"=>"Spain",
			"187"=>"Sri Lanka",
			"188"=>"Sudan",
			"189"=>"Suriname",
			"190"=>"Swaziland",
			"191"=>"Sweden",
			"192"=>"Switzerland",
			"193"=>"Syria",
			"194"=>"Taiwan",
			"195"=>"Tajikistan",
			"196"=>"Tanzania",
			"197"=>"Thailand",
			"198"=>"Togo",
			"199"=>"Trinidad and Tobago",
			"201"=>"Tunisia",
			"202"=>"Turkey",
			"203"=>"Turkmenistan",
			"204"=>"Tuvalu",
			"205"=>"Uganda",
			"206"=>"Ukraine",
			"207"=>"United Arab Emirates (UAE)",
			"208"=>"United Kingdom (UK)",
			"209"=>"United States of America (USA)",
			"210"=>"Uruguay",
			"211"=>"Uzbekistan",
			"212"=>"Vanuatu",
			"213"=>"Vatican City",
			"214"=>"Venezuela",
			"215"=>"Vietnam",
			"216"=>"Wales",
			"217"=>"Western Samoa",
			"218"=>"Yemen",
			"219"=>"Yugoslavia",
			"220"=>"Zaire",
			"221"=>"Zambia",
			"222"=>"Zimbabwe"
		);
	}
}