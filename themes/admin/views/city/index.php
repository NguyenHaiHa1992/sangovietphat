<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php iPhoenixLang::admin_t('City management');?></h1>
		<div class="header-menu">
			<ul>
				<li class="ex-show"><a class="activities-icon"><span><?php iPhoenixLang::admin_t('List cities');?></span></a></li>
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content">
		<div>
			<input type="button" class="button" value="<?php iPhoenixLang::admin_t('Add city');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/city/create')?>'"/>
			<div class="line top bottom"></div>	
		</div>
		<!--begin box search-->
		<?php 
		Yii::app()->clientScript->registerScript('search', "
			$('#city-search').submit(function(){
			$.fn.yiiGridView.update('city-list', {
				data: $(this).serialize()});
				return false;
			});");
		?>
		<div class="box-search">            
			<h2>Search</h2>
			<?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'city-search')); ?>
			<!--begin left content-->
			<div class="fl" style="width:600px;">
				<ul>
					<li>
						<?php echo $form->label($model,'name'); ?>
						<?php $this->widget('CAutoComplete', array(
						'model'=>$model,
						'attribute'=>'name',
						'url'=>array('city/suggestTitle'),
						'htmlOptions'=>array(
							'style'=>'width:230px;',
							),
					)); ?>								
					</li>   
				</ul>
			</div>
			<!--end left content-->
			<!--begin right content-->
			<div class="fr" style="width:600px;">
				<ul>                   
					<li>
						<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
						<?php echo $form->dropDownList($model,'status',array(''=>iPhoenixLang::admin_t('All','main'), 0=>iPhoenixLang::admin_t('Hide','main'),1=>iPhoenixLang::admin_t('Show','main')),array('style'=>'width:200px')); ?>
					</li> 	                 
					<li>
						<?php echo $form->label($model,'type',array('style'=>'width:200px')); ?>
						<?php echo $form->dropDownList($model,'type',array(''=>iPhoenixLang::admin_t('District'), 0=>iPhoenixLang::admin_t('Province/City'), 1 =>iPhoenixLang::admin_t('All','main')),array('style'=>'width:200px')); ?>
					</li> 
				</ul>
			</div>
			<div>
			<div class="row"></div>
				<?php 
					echo CHtml::submitButton(iPhoenixLang::admin_t('Filter'),
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
			'iclass'=>'City',
			'id'=>'city-list',
			'dataProvider'=>$model->search(),		
			'columns'=>array(
				array(
					'class'=>'CCheckBoxColumn',
					'selectableRows'=>2,
					'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
					'checked'=>'in_array($data->id,Yii::app()->session["checked-city-list"])'
				),			
				array(
					'name'=>'name',
					'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
				),
				array(
					'name'=>'type',
					'value' => '$data->type == 0 ? "Province / City" : "District"',
					'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
				),
				array(
					'name'=>'cost',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				),
				array(
					'name'=>'order_view',
					'type'=>'html',
					'value' => '"<a class=\'edit-order-view-".$data->id."\'>$data->order_view</a>"',
					'headerHtmlOptions'=>array('width'=>'6%','class'=>'table-title'),		
				), 	
				array(
					'name'=>'created_by',
					'value'=>'isset($data->author)?$data->author->fullname:""',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				), 						
				array(
					'name'=>'created_time',
					'value'=>'date("H:i d/m/Y",$data->created_time)',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				), 	
				
				array(
					'header'=>iPhoenixLang::admin_t('Display'),
					'class'=>'iPhoenixStatusButtonColumn',
					'template'=>'{reverse_status}',
					'buttons'=>array
					(
						'reverse_status' => array
						(
							'label'=>$model->getAttributeLabel('status'),
							'imageUrl'=>'$data->imageStatus',
							'url'=>'iPhoenixUrl::createUrl("admin/city/reverseStatus", array("id"=>$data->id))',
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
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-city'),
				),    	   										   	   
				array(
					'header'=>iPhoenixLang::admin_t('Function'),
					'class'=>'iPhoenixToolButtonColumn',
					'template'=>'{update}{delete}',
					'deleteConfirmation'=>iPhoenixLang::admin_t('Are you sure you want to delete this item?','main'),
					'afterDelete'=>'function(link,success,data){ if(success) jAlert("'.iPhoenixLang::admin_t("Delete successfully","main").'"); }',
					'buttons'=>array
					(
						'update' => array(
							'label'=>iPhoenixLang::admin_t('Update','main'),
							'url'=>'iPhoenixUrl::createUrl("admin/city/update",array("id"=>$data->id))'
						),
						'delete' => array(
							'label'=>iPhoenixLang::admin_t('Delete','main'),
							'url'=>'iPhoenixUrl::createUrl("admin/city/delete",array("id"=>$data->id))'
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
				),    				
			),
			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
			'summaryText'=>'{count} '.iPhoenixLang::admin_t('Province/City'),
			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
			'actions'=>array(
				'delete'=>array(
					'action'=>'delete',
					'label'=>iPhoenixLang::admin_t('Delete','main'),
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
					'url'=>'admin/city/checkbox'
				),
				'copy'=>array(
					'action'=>'copy',
					'label'=>iPhoenixLang::admin_t('Copy','main'),
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
					'url'=>'admin/city/checkbox'					)
			),
			)); ?>
	</div>
</div>
<!--end inside content-->
<script type="text/javascript">
	$("body").ajaxComplete(function() {
		$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/city/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
						},
			indicator : "<?php echo iPhoenixLang::admin_t('Saving...','main');?>",
			width : '20%',
			tooltip   : "<?php echo iPhoenixLang::admin_t('Click to edit...','main');?>",
			type : "text",
			submit   : "<?php echo iPhoenixLang::admin_t('Save','main');?>",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	});

	$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/city/edit')?>", {
		submitdata : function (value,settings){
						return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
					},
		indicator : "<?php echo iPhoenixLang::admin_t('Saving...','main');?>",
		width : '20%',
		tooltip   : "<?php echo iPhoenixLang::admin_t('Click to edit...','main');?>",
		type : "text",
		submit   : "<?php echo iPhoenixLang::admin_t('Save','main');?>",
		name : "value",
		ajaxoptions : {"type":"GET"}
	 });
</script>