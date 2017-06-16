<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>Image management</h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon" href=""><span>List images</span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<!-- <input type="button" class="button" value="Thêm ảnh" style="width:180px;" onClick="parent.location='<?php echo Yii::app()->createUrl('admin/image/create')?>'"/> -->
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#image-search').submit(function(){
				$.fn.yiiGridView.update('image-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2>Search</h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'image-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:430px;">
                    <ul>
                        <li>
                         	<?php echo $form->labelEx($model,'name'); ?>
                         	<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'name',
							'url'=>array('image/suggestName'),
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
							<?php echo $form->label($model,'parent_id'); ?>
							<?php echo $form->dropDownList($model,'parent_id',$list_news,array('style'=>'width:200px')); ?>
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
  				'id'=>'image-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-news'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-image-list"])'
    				),		
    				array(
						'name'=>'id',
						'headerHtmlOptions'=>array('width'=>'3%','class'=>'table-news'),		
					),	
					array(
						'name'=>'Image',
	 		            'type'=>'html',
	            		'value'=>'"<img src=\'".$data->getAbsoluteThumbUrl(100,50,false)."\' />"',
 						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-news'),
					),	
    				array(
						'name'=>'name',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-news'),		
					), 	
					array(
						'name'=>'News',
						'value'=>'$data->news->name',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-news'),		
					),	
					array(
						'name'=>'intro',
						'headerHtmlOptions'=>array('width'=>'30%','class'=>'table-news'),
                		'type'=>'html',
                		'value' => '"<a class=\'edit-intro-".$data->id."\'>$data->intro</a>"',		
					),
					// array(
						// 'name'=>'created_by',
						// 'value'=>'isset($data->author)?$data->author->fullname:""',
						// 'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-news'),		
					// ), 						
					array(
						'name'=>'created_time',
						'value'=>'date("H:i d/m/Y",$data->created_time)',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-news'),		
					), 	
					// array(
						// 'header'=>'Trạng thái',
						// 'class'=>'iPhoenixStatusButtonColumn',
    					// 'template'=>'{reverse}',
    					// 'buttons'=>array
    					// (
        					// 'reverse' => array
    						// (
            					// 'label'=>'Thay đổi trạng thái',
            					// 'imageUrl'=>'$data->imageStatus',
            					// 'url'=>'Yii::app()->createUrl("admin/image/reverseStatus", array("id"=>$data->id))',
    							// 'click'=>'function(){
									// var th=this;									
									// jQuery.ajax({
										// type:"POST",
										// dataType:"json",
										// url:$(this).attr("href"),
										// success:function(data) {
											// if(data.success){
												// $(th).find("img").attr("src",data.src);
												// }
										// },
										// error: function (request, status, error) {
        										// alert(request.responseText);
    									// }
										// });
								// return false;}',
        					// ),
        				// ),
						// 'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-news'),
					// ),    	  										   	   
					array(
						'header'=>'Tools',
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{update}{delete}',
						'deleteConfirmation'=>'Are you sure you want to delete this image?',
						'afterDelete'=>'function(link,success,data){ if(success) alert("Delete successfully"); }',
    					'buttons'=>array
    					(
    						'update' => array(
    							'label'=>'Update',
    						),
        					'delete' => array(
    							'label'=>'Delete',
    						),
    						// 'copy' => array
    						// (
            					// 'label'=>'Copy ảnh',
            					// 'imageUrl'=>Yii::app()->theme->baseUrl.'/admin/images/css/copy.gif',
            					// 'url'=>'Yii::app()->createUrl("admin/image/copy", array("id"=>$data->id))',
        					// ),
        				),
						'headerHtmlOptions'=>array('width'=>'5%','class'=>'table-news'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} images',
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Previous','nextPageLabel'=>'Next >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>'Delete',
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/image/checkbox'
					),
					// 'copy'=>array(
						// 'action'=>'copy',
						// 'label'=>'Copy',
						// 'imageUrl' => Yii::app()->theme->baseUrl.'/admin/images/css/copy.gif',
						// 'url'=>'admin/image/checkbox'
					// )
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<script type="text/javascript">
		$("body").ajaxComplete(function() {
			$("a[class^=edit-intro-]").editable("<?php echo iPhoenixUrl::createUrl('admin/image/edit')?>", {
				submitdata : function (value,settings){
								return {"id":$(this).attr("class").substr("11"),"attribute":"intro"};
							},
				indicator : "Saving...",
				width : '80%',
				tooltip   : "Click to edit...",
				type : "text",
				submit   : "Save",
				name : "value",
				ajaxoptions : {"type":"GET"}
			 });
		});
	
		$("a[class^=edit-intro-]").editable("<?php echo iPhoenixUrl::createUrl('admin/image/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("11"),"attribute":"intro"};
						},
			indicator : "Saving...",
			width : '80%',
			tooltip   : "Click to edit...",
			type : "text",
			submit   : "Save",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	</script>	