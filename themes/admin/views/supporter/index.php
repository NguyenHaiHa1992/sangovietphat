<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>Supporter management</h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span>List supporters</span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<input type="button" class="button" value="Add supporter" style="width:180px;" onclick="showPopUp('form-supporter');resetSupporterForm();$('#form-supporter .create').show();return false;"/>
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         	<?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#supporter-search').submit(function(){
				$.fn.yiiGridView.update('supporter-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2>Search</h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'supporter-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:430px;">
                    <ul>
                        <li>
                         	<?php echo $form->label($model,'name'); ?>
                         	<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'name',
							'url'=>array('supporter/suggestName'),
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
				'iclass'=>'Supporter',
  				'id'=>'supporter-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-supporter-list"])'
    				),			
    				array(
						'name'=>'title',
						'value' => '$data->title',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
					),
					array(
						'name'=>'yahoo',
						'value' => '$data->yahoo',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 		
					array(
						'name'=>'skype',
						'value' => '$data->skype',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'phone',
						'value' => '$data->phone',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'email',
						'value' => '$data->email',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'order_view',
						'type'=>'html',
                		'value' => '"<a class=\'edit-order-view-".$data->id."\'>$data->order_view</a>"',
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),		
					),					
					array(
						'name'=>'created_time',
						'value'=>'date("d/m/Y H:i",$data->created_time)',
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
            					'url'=>'iPhoenixUrl::createUrl("admin/supporter/reverseStatus", array("id"=>$data->id))',
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
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-title'),
					),     	   	  										   	   
					array(
						'header'=>'Tools',
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{copy}{update}{delete}',
						'deleteConfirmation'=>'Are you sure you wantto delete this supporter?',
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("Bạn đã xóa thành công"); }',
    					'buttons'=>array
    					(
    						'update' => array(
    							'label'=>'Update',
    							'url'=>'iPhoenixUrl::createUrl("admin/supporter/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetSupporterForm();
											$("#form-supporter #Supporter_yahoo").val(data.yahoo);
											$("#form-supporter #Supporter_name").val(data.name);											
											$("#form-supporter #Supporter_skype").val(data.skype);
											$("#form-supporter #Supporter_order_view").val(data.order_view);
											$("#form-supporter #Supporter_id").val(data.id);
											$("#form-supporter #Supporter_title").val(data.title);
											$("#form-supporter #Supporter_phone").val(data.phone);
											$("#form-supporter #Supporter_email").val(data.email);									
							               	$("#form-supporter .update").show();
											showPopUp("form-supporter");
										},
										});
									return false;
								}',
    						),
        					'delete' => array(
    							'label'=>'Delete',
    							'url'=>'iPhoenixUrl::createUrl("admin/supporter/delete",array("id"=>$data->id))'
    						),
    						'copy' => array
    						(
            					'label'=>'Copy supporter',
            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/copy.png',
            					'url'=>'iPhoenixUrl::createUrl("admin/supporter/copy", array("id"=>$data->id))',
            					'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success){
												$.fn.yiiGridView.update("supporter-list");
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
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'Có {count} supporter',
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Trước','nextPageLabel'=>'Sau >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>'Delete',
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/supporter/checkbox'
					),
					'copy'=>array(
						'action'=>'copy',
						'label'=>'Copy',
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
						'url'=>'admin/supporter/checkbox'					)
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	<?php	echo $this->renderPartial('_form',array('model'=>$model));?>
		<script type="text/javascript">
		$("body").ajaxComplete(function() {
			$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/supporter/edit')?>", {
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
	
		$("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/supporter/edit')?>", {
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