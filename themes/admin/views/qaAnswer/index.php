<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>QA Answer management</h1>
		<div class="header-menu">
			<ul>
				<li class="ex-show"><a class="activities-icon" href=""><span>List QA Answers</span></a></li>
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content">
		<!--begin box search-->
		<?php 
		Yii::app()->clientScript->registerScript('search', "
			$('#qa-search').submit(function(){
			$.fn.yiiGridView.update('qa-list', {
				data: $(this).serialize()});
				return false;
			});");
		?>	
	   <?php 
		$this->widget('iPhoenixGridView', array(
			'iclass'=>'QaAnswer',
			'id'=>'qa-answer-list',
			'dataProvider'=>$model->search(),		
			'columns'=>array(
				array(
					'class'=>'CCheckBoxColumn',
					'selectableRows'=>2,
					'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
					'checked'=>'in_array($data->id,Yii::app()->session["checked-qa-list"])'
				),		
				array(
					'header'=>'Question',
					'value'=>'$data->qaTitle',
					'type'=>'raw',
					'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
				),
				array(
					'name'=>'content',
					'value'=>'iPhoenixString::createIntrotext($data->content, 80)',
					'headerHtmlOptions'=>array('width'=>'30%','class'=>'table-title'),		
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
					'header'=>'Status',
					'class'=>'iPhoenixStatusButtonColumn',
					'template'=>'{reverse_status}',
					'buttons'=>array
					(
						'reverse_status' => array
						(
							'label'=>$model->getAttributeLabel('status'),
							'imageUrl'=>'$data->imageStatus',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/reverseStatus", array("id"=>$data->id))',
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
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-qa'),
				),    	   										   	   
				array(
					'header'=>'Tools',
					'class'=>'iPhoenixToolButtonColumn',
					'template'=>'{update}{delete}',
					'deleteConfirmation'=>'Are you sure you want to delete this QA Answer?',
					'afterDelete'=>'function(link,success,data){ if(success) jAlert("Delete successfully"); }',
					'buttons'=>array
					(
						'update' => array(
							'label'=>'Update',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/update",array("id"=>$data->id))'
						),
						'delete' => array(
							'label'=>'Delete',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/delete",array("id"=>$data->id))'
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
				),    				
			),
			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
			'summaryText'=>'{count} QA Answers',
			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Previous','nextPageLabel'=>'Next >','htmlOptions'=>array('class'=>'pages fr')),
			'actions'=>array(
				'delete'=>array(
					'action'=>'delete',
					'label'=>'Delete',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
					'url'=>'admin/qa/checkbox'
				),
			),
			)); ?>
	</div>
</div>
<!--end inside content-->
<script type="text/javascript">
	$("body").ajaxComplete(function() {
		$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/qaAnswer/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
						},
			indicator : "Saving...",
			width : '20%',
			tooltip   : "Click to edit...",
			type : "text",
			submit   : "Save",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	});

	$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/qaAnswer/edit')?>", {
		submitdata : function (value,settings){
						return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
					},
		indicator : "Saving...",
		width : '20%',
		tooltip   : "Click to edit...",
		type : "text",
		submit   : "Save",
		name : "value",
		ajaxoptions : {"type":"GET"}
	 });
</script>