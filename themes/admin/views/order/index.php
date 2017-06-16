<?php
Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Order management');?></h1>
			<div class="header-menu">
				<ul>
					<?php if($customer_id == ''):?>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List orders');?></span></a></li>
					<?php else: 
					$customer = Customer::model()->findbyPk($customer_id);
					if(isset($customer)):
					?>
					<li class="ex-show">
						<a class="activities-icon">
							<span>Customer: <?php echo $customer->fullname.' | Email: '.$customer->email;?></span>
						</a>
					</li>
					<?php endif;?>
					<?php endif;?>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
         <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#order-search').submit(function(){
				$.fn.yiiGridView.update('order-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2><?php iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'order-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:430px;">
                    <ul>
                    	<li>
							<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
							<?php echo $form->dropDownList($model,'status',array(''=>iPhoenixLang::admin_t('All','main'), 0=>iPhoenixLang::admin_t('Pending'),1=>iPhoenixLang::admin_t('Finish')),array('style'=>'width:200px')); ?>
						</li>
						<li>
							<?php echo $form->label($model,'name',array('style'=>'width:200px')); ?>
							<?php $this->widget('CAutoComplete', array(
							'model'=>$model,
							'attribute'=>'name',
							'url'=>array('order/suggestName'),
							'htmlOptions'=>array(
								'style'=>'width:200px;',
								),
						)); ?>
						</li>
						<li>
							<?php echo $form->label($model,'email',array('style'=>'width:200px')); ?>
							<?php $this->widget('CAutoComplete', array(
							'model'=>$model,
							'attribute'=>'email',
							'url'=>array('order/suggestEmail'),
							'htmlOptions'=>array(
								'style'=>'width:200px;',
								),
						)); ?>
						</li>
						<li>
							<?php echo $form->label($model,'phone',array('style'=>'width:200px')); ?>
							<?php $this->widget('CAutoComplete', array(
							'model'=>$model,
							'attribute'=>'phone',
							'url'=>array('order/suggestPhone'),
							'htmlOptions'=>array(
								'style'=>'width:200px;',
								),
						)); ?>
						</li>
                    </ul>
                </div>
                <!--end left content-->
                <!--begin right content-->
                <div class="fr" style="width:500px;">
                    <ul>
						<li>
							<?php echo $form->label($model,'province_id',array('style'=>'width:120px')); ?>
							<?php echo $form->dropDownList($model,'province_id', $list_city, array('style'=>'width:208px')); ?>
						</li>
						<li>
							<script type="text/javascript">
								$(function($){
									$('#Order_province_id').live('change', function(){
										$.ajax({
											'type' : 'POST',
											'url' : '<?php echo Yii::app()->createUrl('admin/city/updateListCity');?>',
											'cache' : false,
											'data' : {'province_id':$('#Order_province_id option:selected').val()},
											'success' : function(html) {
												$("#Order_district_id").html(html)
											}
										});
										return false;
									});
								});
							</script>
							<?php echo $form->label($model,'district_id', array('style'=>'width:120px')); ?>
							<?php echo $form->dropDownList($model, 'district_id', array(''=>iPhoenixLang::admin_t('Province/City')),array('style'=>'width: 208px','class'=>'select')); ?>
						</li>
						<li>
							<?php echo $form->label($model,'address',array('style'=>'width:120px')); ?>
							<input style="width:200px;" id="Order_address" name="Order[address]" type="text" maxlength="256" autocomplete="off" class="ac_input">
						</li>
                    	<li>
                         	<?php echo $form->label($model,'search_start_time'); ?>
                         	<?php
                         	if($model->search_start_time == 0) $model->search_start_time = time() - 31536000;
                         	$this->widget('CJuiDateTimePicker',array(
						        'model'=>$model, //Model object
						        'attribute'=>'search_start_time', //attribute name
						        'mode'=>'datetime', //use "time","date" or "datetime" (default)
						        'language'=>Yii::app()->params['admin_lang'],
								'options'=>array('dateFormat'=>'yy-m-d'), // jquery plugin options
								'htmlOptions'=>array('style'=>'width:100px;','maxlength'=>'256'),
						    ));			
						    ?>		
							&nbsp; &nbsp; &nbsp;
		                 	<?php
		                 	if($model->search_end_time == 0) $model->search_end_time = time();
		                 	$this->widget('CJuiDateTimePicker',array(
						        'model'=>$model, //Model object
						        'attribute'=>'search_end_time', //attribute name
						        'mode'=>'datetime', //use "time","date" or "datetime" (default)
						        'language'=>Yii::app()->params['admin_lang'],
								'options'=>array('dateFormat'=>'yy-m-d'), // jquery plugin options
								'htmlOptions'=>array('style'=>'width:100px;','maxlength'=>'256'),
						    ));
						    ?>
						</li>
                    </ul>
                </div>
                <div>
                	<div class="row"></div>
					<?php 
						echo CHtml::submitButton(iPhoenixLang::admin_t('Filter','main'),
						array(
							'class'=>'button',
							''
						)); 						
					?>   
                </div>
                <?php $this->endWidget(); ?>
                <div class="clear"></div>
                <div class="line top bottom"></div>
            </div>
            <!--end box search-->		
			<?php
			$this->widget('iPhoenixGridView', array(
				'iclass'=>'Order',
  				'id'=>'order-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-order-list"])'
    				),			
    				array(
						'name'=>'name',
						'value'=>'$data->name',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'email',
						'value'=>'$data->email',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'phone',
						'value'=>'$data->phone',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'tel',
						'value'=>'$data->tel',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'address',
						'value'=>'$data->address',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'district_id',
						'value'=>'isset($data->district)?$data->district->name:""',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'province_id',
						'value'=>'isset($data->province)?$data->province->name:""',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'address',
						'value'=>'$data->address',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'value',
						'value'=>'$data->value',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),
					array(
						'name'=>'note',
						'value'=>'iPhoenixString::createIntrotext($data->note,68)',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
					),
					array(
						'name'=>'created_time',
						'value'=>'date("d/m/Y H:i",$data->created_time)',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					), 	
					array(
						'header'=>iPhoenixLang::admin_t('Status'),
						'class'=>'iPhoenixStatusButtonColumn',
    					'template'=>'{reverse_status}',
    					'buttons'=>array
    					(
        					'reverse_status' => array
    						(
            					'label'=>$model->getAttributeLabel('status'),
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'iPhoenixUrl::createUrl("admin/order/reverseStatus", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success){
												$(th).find("img").attr("src",data.src);
												}
										},
										error: function (request, status, error) {
        										jAlert(request.responseText);
    									}
										});
								return false;}',
        					),
        				),
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),
					),     	  										   	   
					array(
						'header'=>'Tools',
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{view}{delete}',
						'deleteConfirmation'=>iPhoenixLang::admin_t('Are you sure you want to delete this item?','main'),
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("'.iPhoenixLang::admin_t("Delete successfully","main").'"); }',
    					'buttons'=>array
    					(
    						'view' => array(
    							'label'=>iPhoenixLang::admin_t('Reply'),    						
    							'url'=>'iPhoenixUrl::createUrl("admin/order/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									$.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											$("#Order_name", $(".main-popup")).text(data.name);
											$("#Order_email", $(".main-popup")).text(data.email);
											$("#Order_phone", $(".main-popup")).text(data.phone);											
											$("#Order_tel", $(".main-popup")).text(data.tel);
											$("#Order_address", $(".main-popup")).text(data.address);
											$("#Order_content", $(".main-popup")).text(data.content);
											$("#Order_note", $(".main-popup")).text(data.note);
							               	$(".update").show();
											showPopUp("form-order");
										},
										});
									return false;
								}',
    						),
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Delete','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/order/delete",array("id"=>$data->id))'
    						),
        				),
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('Order'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/order/checkbox'
					),
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	<?php echo $this->renderPartial('_form',array('model'=>$model));?>