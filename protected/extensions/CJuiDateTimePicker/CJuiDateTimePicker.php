<?php
/**
 * CJuiDateTimePicker class file.
 *
 * @author Anatoly Ivanchin <van4in@gmail.com>
 */

Yii::import('zii.widgets.jui.CJuiDatePicker');
class CJuiDateTimePicker extends CJuiDatePicker
{
	const ASSETS_NAME='/jquery-ui-timepicker-addon';
	
	public $mode='datetime';
	
	public function init()
	{
		if(!in_array($this->mode, array('date','time','datetime')))
			throw new CException('unknow mode "'.$this->mode.'"');
		if(!isset($this->language))
			$this->language=Yii::app()->getLanguage();
		return parent::init();
	}
	
	public function run()
	{
		list($name,$id)=$this->resolveNameID();

		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		else
			$this->htmlOptions['name']=$name;

		if(isset($this->htmlOptions['value'])){
			$this->value=strtotime($this->htmlOptions['value']);
		}

		if($this->hasModel()){
			echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
			$model=$this->model;
			$attribute=$this->attribute;
			$value=$model->$attribute;
		}
		else{
			echo CHtml::textField($name,$this->value,$this->htmlOptions);
			$value=$this->value;
		}

		$year=date('Y',$value);
		$month=date('n',$value)-1;
		$date=date('j',$value);
		$hour=date('H',$value);
		$minute=date('i',$value);
		$my_js = "var year={$year};
				var month={$month};
				var date={$date};
				var hour={$hour};
				var minute={$minute};
				$('#{$id}').datepicker('setDate',new Date(year,month,date,hour,minute));";


		$options=CJavaScript::encode($this->options);

		$js = "jQuery('#{$id}').{$this->mode}picker($options);";

		if (isset($this->language)){
			$this->registerScriptFile($this->i18nScriptFile);
			$js = "jQuery('#{$id}').{$this->mode}picker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['{$this->language}'], {$options}));";
		}

		$cs = Yii::app()->getClientScript();
		
		$assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
		$cs->registerCssFile($assets.self::ASSETS_NAME.'.css');
		$cs->registerScriptFile($assets.self::ASSETS_NAME.'.js',CClientScript::POS_END);
		
		$cs->registerScript(__CLASS__, 	$this->defaultOptions?'jQuery.{$this->mode}picker.setDefaults('.CJavaScript::encode($this->defaultOptions).');':'');
		$cs->registerScript(__CLASS__.'#'.$id, $js);
		$cs->registerScript(__CLASS__.'#my_'.$id, $my_js);

	}
}