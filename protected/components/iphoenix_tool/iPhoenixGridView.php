<?php
Yii::import('zii.widgets.grid.CGridView');
Yii::import('application.components.iphoenix_tool.iPhoenixLinkPager');
class iPhoenixGridView extends CGridView
{
	public $checkboxCssClass = 'list-action-checbox';
	public $displayboxCssClass = 'display-box';
	public $actions = array ();
	public $iclass;
	public function init() {
		parent::init ();
		if(strpos($this->template, 'checkbox')){
			if(isset($this->iclass) && $this->iclass != '')
				$this->beforeAjaxUpdate = 'function(id,options){
									name=$("#'.$this->id.' thead :checkbox").attr("name");
									name=name.substring(0, name.length - 4) + "[]";
									list_checked=new Array();
									$("input[name=\'"+name+"\']:checked").each(function(i){
										list_checked[i] = $(this).val();
									});	
									list_unchecked = new Array();
            						$("input[name=\'"+name+"\']").not(":checked").each(function(i){
            							list_unchecked[i]=$(this).val();
									});	
									options.data={
										"'.$this->iclass.'[list-checked]":list_checked.toString(),
										"'.$this->iclass.'[list-unchecked]":list_unchecked.toString()
        							};
        							options.type="POST";
        							return true;
        						}';
			else
				$this->beforeAjaxUpdate = 'function(id,options){
									name=$("#'.$this->id.' thead :checkbox").attr("name");
									name=name.substring(0, name.length - 4) + "[]";
									list_checked=new Array();
									$("input[name=\'"+name+"\']:checked").each(function(i){
										list_checked[i] = $(this).val();
									});	
									list_unchecked = new Array();
            						$("input[name=\'"+name+"\']").not(":checked").each(function(i){
            							list_unchecked[i]=$(this).val();
									});	
									options.data={
										"list-checked":list_checked.toString(),
										"list-unchecked":list_unchecked.toString()
        							};
        							options.type="POST";
        							return true;
        						}';
		}
	}
	public function renderCheckbox() {
		$cs = Yii::app ()->getClientScript ();
		$cs->registerScript ( 'js-checkbox', "jQuery(function($) { $('body').on('click','.action-checkbox',	
  		function(){
  			var url=$(this).attr('href');
  			var r=jConfirm('Xác nhận thực hiện thao tác','Xác nhận thực hiện thao tác',function(r){
  				if(r==true){
	  				$.fn.yiiGridView.update('{$this->id}', {
						type:'GET',
						dataType: 'json',
						url:url,
						success:function(data) {
							if(data.success){
								name=$('thead :checkbox').attr('name');
								name=name.substring(0, name.length - 4) + '[]';
								list_checked=new Array();
								$('input[name=\''+name+'\']:checked').each(function(i){
									$(this).removeAttr('checked');
								});	
								jAlert(data.message);
							}
							else{
								jAlert(data.message);
							}	
							$.fn.yiiGridView.update('{$this->id}');
							return true;						
						},
					});	
  				}
			});    			
			return false;
        });
        })", CClientScript::POS_END );
		
		if (sizeof ( $this->actions ) > 0) {
			echo '<div class="' . $this->checkboxCssClass . '">';
			echo 'Công cụ: ';
			foreach ( $this->actions as $action ) {
				$this->renderAction ( $action );
				echo " ";
			}
			echo '</div>';
		}
	}

	protected function renderAction($action)
	{
		$url=iPhoenixUrl::createUrl($action['url'],array('action'=>$action['action']));
		$label=$action['label'];
		if(isset($action['imageUrl']) && is_string($action['imageUrl']))
			echo 
			CHtml::link(
				CHtml::image($action['imageUrl'],$label),
				$url,
				array(
					'class'=>'action-checkbox'
				)
			);
		else
			echo CHtml::link($label,$url);
	}
	
	public function renderDisplaybox()
	{
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(
  			'js-displaybox',
  			"jQuery(function($) { $('body').on('change','#pageSize',	
  			function(){
  				$.fn.yiiGridView.update('{$this->id}', {
				type:'GET',
				data:{'pageSize':$(this).val()},
				success:function(data) {
					$.fn.yiiGridView.update('{$this->id}');
					return false;
				},
			});
			return false;
        	});
        })",
  		CClientScript::POS_END
		);
		echo CHtml::dropDownList ( 'pageSize', Yii::app()->user->getState('pageSize',10), array ('10'=>'10','25'=>'25','50'=>'50'),array ('class' => $this->displayboxCssClass ));
	}
}
?>