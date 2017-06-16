<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
<!--begin inside content-->
<div class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>quản trị Nhà thuốc</h1>
		<div class="header-menu">
			<ul>
				<li class="ex-show"><a class="activities-icon" href=""><span>Danh sách Nhà thuốc</span></a></li>
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content">
		<div>
			<input type="button" class="button" value="Thêm Nhà thuốc" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/store/create')?>'"/>
			<div class="line top bottom"></div>	
		</div>
		 <!--begin box search-->
	 <?php 
		Yii::app()->clientScript->registerScript('search', "
			$('#store-search').submit(function(){
			$.fn.yiiGridView.update('store-list', {
				data: $(this).serialize()});
				return false;
			});");
		?>
		<div class="box-search">            
			<h2>Tìm kiếm</h2>
			<?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'store-search')); ?>
			<!--begin left content-->
			<div class="fl" style="width:600px;">
				<ul>
					<li>
						<?php echo $form->label($model,'name'); ?>
						<?php $this->widget('CAutoComplete', array(
						'model'=>$model,
						'attribute'=>'name',
						'url'=>array('store/suggestName'),
						'htmlOptions'=>array(
							'style'=>'width:230px;',
							),
					)); ?>								
					</li>   
					<li>
						<label >Tỉnh / Thành Phố: </label>
						<?php echo CHtml::dropDownList('location_id','',$list_city,array('style'=>'width: 240px')); ?>
					</li>
					<script type="text/javascript">
							jQuery(function($) {
								$('#location_id').live('change', function() {
									jQuery.ajax({
										'type' : 'POST',
										'url' : '<?php echo CController::createUrl('store/updateListCity');?>',
										'cache' : false,
										'data' : jQuery(this).parents("form").serialize(),
										'success' : function(html) {
											jQuery("#Store_city_id").html(html)
										}
									});
									return false;
								});
							});
					</script>
					<li>
						<label >Quận / Huyện: </label>
						<?php echo $form->dropDownList($model,'city_id',array(),array('style'=>'width: 240px')); ?>							
						<?php echo $form->error($model, 'city_id',array('style'=>'color: red; font-style: italic')); ?>	
						<div id="newsRental_id_errors" class="validation error" style="display: none;">Quận huyện không được để trống !</div>						
					</li>			                              
				</ul>
			</div>
			<!--end left content-->
			<!--begin right content-->
			<div class="fr" style="width:600px;">
				<ul>                   
					<li>
						<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
						<?php echo $form->dropDownList($model,'status',array(''=>'Tất cả', 0=>'Ẩn',1=>'Hiện'),array('style'=>'width:200px')); ?>
					</li> 	                 
					<li>
						<?php echo $form->label($model,'new',array('style'=>'width:200px')); ?>
						<?php echo $form->dropDownList($model,'new',array(''=>'Tất cả', 1=>'Hiển thị ở mục Nhà thuốc mới'),array('style'=>'width:200px')); ?>
					</li> 
					<li>
						<?php echo $form->label($model,'home',array('style'=>'width:200px')); ?>
						<?php echo $form->dropDownList($model,'home',array(''=>'Tất cả', 1=>'Hiển thị ở trang chủ'),array('style'=>'width:200px')); ?>
					</li> 
				</ul>
			</div>
			<div>
			<div class="row"></div>
					<?php 
						echo CHtml::submitButton('Lọc kết quả',
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
			'iclass'=>'Store',
			'id'=>'store-list',
			'dataProvider'=>$model->search(),		
			'columns'=>array(
				array(
					'class'=>'CCheckBoxColumn',
					'selectableRows'=>2,
					'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
					'checked'=>'in_array($data->id,Yii::app()->session["checked-store-list"])'
				),			
				array(
					'name'=>'name',
					'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
				),
				array(
					'name'=>'city_id',
					'value'=>'$data->city->name',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				), 		
				array(
					'name'=>'order_view',
					'type'=>'html',
					'value' => '"<a class=\'edit-order-view-".$data->id."\'>$data->order_view</a>"',
					'headerHtmlOptions'=>array('width'=>'6%','class'=>'table-title'),		
				), 	
									
				array(
					'name'=>'created_time',
					'value'=>'date("H:i d/m/Y",$data->created_time)',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				), 	
				array(
					'name'=>'visits',
					'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-store'),		
				),
				array(
					'header'=>'Nhóm công cụ hiển thị',
					'class'=>'iPhoenixStatusButtonColumn',
					'template'=>'{reverse_status}{reverse_new}{reverse_home}',
					'buttons'=>array
					(
						'reverse_status' => array
						(
							'label'=>$model->getAttributeLabel('status'),
							'imageUrl'=>'$data->imageStatus',
							'url'=>'iPhoenixUrl::createUrl("admin/store/reverseStatus", array("id"=>$data->id))',
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
						'reverse_new' => array
						(
							'label'=>$model->getAttributeLabel('new'),
							'imageUrl'=>'$data->imageNew',
							'url'=>'iPhoenixUrl::createUrl("admin/store/reverseNew", array("id"=>$data->id))',
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
						'reverse_home' => array
						(
							'label'=>$model->getAttributeLabel('home'),
							'imageUrl'=>'$data->imageHome',
							'url'=>'iPhoenixUrl::createUrl("admin/store/reverseHome", array("id"=>$data->id))',
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
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-store'),
				),    	   										   	   
				array(
					'header'=>'Nhóm công cụ thao tác',
					'class'=>'iPhoenixToolButtonColumn',
					'template'=>'{clipboard}{copy}{update}{delete}',
					'deleteConfirmation'=>'Bạn muốn xóa Nhà thuốc này?',
					'afterDelete'=>'function(link,success,data){ if(success) jAlert("Bạn đã xóa thành công"); }',
					'buttons'=>array
					(
						'update' => array(
							'label'=>'Chỉnh sửa Nhà thuốc',
							'url'=>'iPhoenixUrl::createUrl("admin/store/update",array("id"=>$data->id))'
						),
						'delete' => array(
							'label'=>'Xóa Nhà thuốc',
							'url'=>'iPhoenixUrl::createUrl("admin/store/delete",array("id"=>$data->id))'
						),
						'copy' => array
						(
							'label'=>'Copy Nhà thuốc',
							'imageUrl'=>Yii::app()->theme->baseUrl.'/images/copy.png',
							'url'=>'iPhoenixUrl::createUrl("admin/store/copy", array("id"=>$data->id))',
						),
						'clipboard' => array
						(
							'label'=>'Copy to clipboard',
							'url'=>'$data->detail_url',
							'imageUrl'=>Yii::app()->theme->baseUrl.'/images/clipboard.png',
							'options'=>array(
								'class'=>'clipboard'
							)
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
				),    				
			),
			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
			'summaryText'=>'Có {count} Nhà thuốc',
			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Trước','nextPageLabel'=>'Sau >','htmlOptions'=>array('class'=>'pages fr')),
			'actions'=>array(
				'delete'=>array(
					'action'=>'delete',
					'label'=>'Xóa',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
					'url'=>'admin/store/checkbox'
				),
				'copy'=>array(
					'action'=>'copy',
					'label'=>'Copy',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
					'url'=>'admin/store/checkbox'					)
			),
			)); ?>
	</div>
</div>
<!--end inside content-->
<script type="text/javascript">
	$("body").ajaxComplete(function() {
		$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/store/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
						},
			indicator : "Saving...",
			width : '20%',
			tooltip   : "Click to edit...",
			type : "text",
			submit   : "Lưu",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	});

	$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/store/edit')?>", {
		submitdata : function (value,settings){
						return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
					},
		indicator : "Saving...",
		width : '20%',
		tooltip   : "Click to edit...",
		type : "text",
		submit   : "Lưu",
		name : "value",
		ajaxoptions : {"type":"GET"}
	 });
</script>