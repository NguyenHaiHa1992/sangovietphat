<!--begin inside content-->
<div class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Booking Management</h1>
		<div class="header-menu">
			<ul>
				<li class="ex-show"><a class="activities-icon" href=""><span>List Booking</span></a></li>
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content">
		<!--begin box search-->
	 	<?php
		Yii::app()->clientScript->registerScript('search', "
			$('#booking-search').submit(function(){
			$.fn.yiiGridView.update('booking-list', {
				data: $(this).serialize()});
				return false;
			});");
		?>
		<div class="box-search">            
			<h2>Search</h2>
			<?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'booking-search')); ?>
			<!--begin left content-->
			<div class="fl" style="width:600px;">
				<ul>
					<li>
						<?php echo $form->label($model,'first_name'); ?>
						<?php $this->widget('CAutoComplete', array(
						'model'=>$model,
						'attribute'=>'first_name',
						'url'=>array('booking/suggestName'),
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
						<?php echo $form->dropDownList($model,'status',array(''=>'All', 0=>'Hide',1=>'Show'),array('style'=>'width:200px')); ?>
					</li>
				</ul>
			</div>
			<div>
			<div class="row"></div>
					<?php 
						echo CHtml::submitButton('Filter',
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
			'iclass'=>'Booking',
			'id'=>'booking-list',
			'dataProvider'=>$model->search(),		
			'columns'=>array(
				array(
					'class'=>'CCheckBoxColumn',
					'selectableRows'=>2,
					'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
					'checked'=>'in_array($data->id,Yii::app()->session["checked-booking-list"])'
				),			
				array(
					'name'=>'first_name',
					'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
				),
				array(
					'name'=>'last_name',
					'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
				),
				array(
					'name'=>'created_time',
					'value'=>'date("H:i d/m/Y",$data->created_time)',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				),
				array(
					'header'=>'Status',
					'class'=>'iPhoenixStatusButtonColumn',
					'template'=>'{reverse_status}',
					'buttons'=>array
					(
						'reverse_status' => array
						(
							'label'=>$model->getAttributeLabel('status'),
							'imageUrl'=>'$data->imageStatus',
							'url'=>'iPhoenixUrl::createUrl("admin/booking/reverseStatus", array("id"=>$data->id))',
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
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-booking'),
				),    	   										   	   
				array(
					'header'=>'Tools',
					'class'=>'iPhoenixToolButtonColumn',
					'template'=>'{update}{delete}',
					'deleteConfirmation'=>'Are you sure you want to delete it?',
					'afterDelete'=>'function(link,success,data){ if(success) jAlert("Delete successfully"); }',
					'buttons'=>array
					(
						'update' => array(
							'label'=>'Edit',
							'url'=>'iPhoenixUrl::createUrl("admin/booking/update",array("id"=>$data->id))'
						),
						'delete' => array(
							'label'=>'Delete',
							'url'=>'iPhoenixUrl::createUrl("admin/booking/delete",array("id"=>$data->id))'
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
				),    				
			),
			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
			'summaryText'=>'{count} booking',
			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Previous','nextPageLabel'=>'Next >','htmlOptions'=>array('class'=>'pages fr')),
			'actions'=>array(
				'delete'=>array(
					'action'=>'delete',
					'label'=>'Delete',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
					'url'=>'admin/booking/checkbox'
				),
				'copy'=>array(
					'action'=>'copy',
					'label'=>'Copy',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
					'url'=>'admin/booking/checkbox'					)
			),
			)); ?>
	</div>
</div>
<!--end inside content-->