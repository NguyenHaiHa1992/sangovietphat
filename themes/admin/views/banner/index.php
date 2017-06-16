<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Banner management');?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List banners');?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('Add banner');?>" style="width:180px;" onclick="showPopUp('form-banner');resetBannerForm();$('#form-banner .create').show();return false;"/>
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         	<?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#banner-search').submit(function(){
				$.fn.yiiGridView.update('banner-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">
                <h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'banner-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:600px;">
                    <ul>
                        <li>
                         	<?php echo $form->label($model,'name'); ?>
                         	<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'name',
							'url'=>array('banner/suggestName'),
							'htmlOptions'=>array(
								'style'=>'width:230px;',
								),
						)); ?>								
                        </li>   
                        <li>
							<?php echo $form->label($model,'cat'); ?>
							<?php echo $form->dropDownList($model,'cat',array(''=>iPhoenixLang::admin_t('All banner categories'))+Banner::$view_list_cat,array('style'=>'width:200px')); ?>
					</li>					                              
                    </ul>
                </div>
                <!--end left content-->
                <!--begin right content-->
                <div class="fr" style="width:600px;">
                    <ul>                   
						<li>
							<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
							<?php echo $form->dropDownList($model,'status',array(''=>iPhoenixLang::admin_t('All'), 0=>'Ẩn',1=>'Hiện'),array('style'=>'width:200px')); ?>
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
				'iclass'=>'Banner',
  				'id'=>'banner-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-banner-list"])'
    				),			
    				array(
						'name'=>'name',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
					),
					array(
						'name'=>'cat',
						'value'=>'Banner::$view_list_cat[$data->cat]',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 	
					array(
						'name'=>'slogan',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
					),	
					array(
						'name'=>'order_view',
						'type'=>'html',
                		'value' => '"<a class=\'edit-order-view-".$data->id."\'>$data->order_view</a>"',
						'headerHtmlOptions'=>array('width'=>'6%','class'=>'table-title'),		
					), 	
					array(
						'name'=>'clicks',
						'headerHtmlOptions'=>array('width'=>'6%','class'=>'table-title'),		
					), 	
					array(
						'name'=>'created_by',
						'value'=>'isset($data->author)?$data->author->fullname:""',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 						
					array(
						'name'=>'created_time',
						'value'=>'date("d/m/Y H:i",$data->created_time)',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 	
					array(
						'header'=>iPhoenixLang::admin_t('Display','main'),
						'class'=>'iPhoenixStatusButtonColumn',
    					'template'=>'{reverse_status}',
    					'buttons'=>array
    					(
        					'reverse_status' => array
    						(
            					'label'=>$model->getAttributeLabel('status'),
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'iPhoenixUrl::createUrl("admin/banner/reverseStatus", array("id"=>$data->id))',
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
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    	  										   	   
					array(
						'header'=>iPhoenixLang::admin_t('Function','main'),
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{copy}{update}{delete}',
    					'deleteConfirmation'=>'Are you sure you want to delete this banner?',
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("Delete successfully"); }',
    					'buttons'=>array
    					(
    						'update' => array(
    							'label'=>iPhoenixLang::admin_t('Update','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/banner/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetBannerForm();
											$("#form-banner #Banner_cat").val(data.cat);
											$("#form-banner #Banner_name").val(data.name);
											$("#form-banner #Banner_slogan").val(data.slogan);											
											$("#form-banner #Banner_url").val(data.url);
											$("#form-banner #Banner_order_view").val(data.order_view);
											$("#form-banner #Banner_id").val(data.id);
											$("#form-banner #Banner_description").val(data.description);
											if (typeof data.image.id != "undefined")  
							        		{
							        			$("#store_data_upload_image_id").val(data.image.id);
							               		if(test_hide_upload_list_image_id == 0)
							               			$("#form_upload_image_id .qq-upload-list").hide();
							               		$("#preview_upload_image_id").html("<div class=\"item-image\" id=\""+data.image.id+"\"><img style=\"height:60px; width:120px\" src=\""+data.image.url+"\" /></div>");
							               	} 
							               	$("#form-banner .update").show();
											showPopUp("form-banner");
										},
										});
									return false;
								}',
    						),
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Delete','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/banner/delete",array("id"=>$data->id))'
    						),
    						'copy' => array
    						(
            					'label'=>iPhoenixLang::admin_t('Copy','main'),
            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/copy.png',
            					'url'=>'iPhoenixUrl::createUrl("admin/banner/copy", array("id"=>$data->id))',
            					'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success){
												$.fn.yiiGridView.update("banner-list");
												return false;
											}
										},
										error: function (request, status, error) {
        										jAlert(request.responseText);
    									}
										});
								return false;}',
        					),
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('Banner'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/banner/checkbox'
					),
					'copy'=>array(
						'action'=>'copy',
						'label'=>iPhoenixLang::admin_t('Copy','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
						'url'=>'admin/banner/checkbox'					
					)
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	<?php	echo $this->renderPartial('_form',array('model'=>$model));?>
	<script type="text/javascript">
		$("body").ajaxComplete(function() {
			$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/banner/edit')?>", {
				submitdata : function (value,settings){
								return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
							},
				indicator : "Saving...",
				width : '50%',
				tooltip   : "Click to edit...",
				type : "text",
				submit   : "Save",
				name : "value",
				ajaxoptions : {"type":"GET"}
			 });
		});
	
		$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/banner/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("16"),"attribute":"order_view"};
						},
			indicator : "Saving...",
			width : '50%',
			tooltip   : "Click to edit...",
			type : "text",
			submit   : "Save",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	</script>		