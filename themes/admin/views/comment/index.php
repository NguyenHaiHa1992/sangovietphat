<?php
Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Comment management');?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List comments');?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
         <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#comment-search').submit(function(){
				$.fn.yiiGridView.update('comment-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'comment-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:430px;">
                    <ul>
                    	<li>
							<?php echo $form->label($model,'parent_class',array('style'=>'width:200px')); ?>
							<?php echo $form->dropDownList($model,'parent_class',array(''=>iPhoenixLang::admin_t('All','main'))+$model->list_parent_classes,array('style'=>'width:200px')); ?>
						</li> 
						<li>
							<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
							<?php echo $form->dropDownList($model,'status',array(''=>iPhoenixLang::admin_t('All','main'), 0=>iPhoenixLang::admin_t('Hide','main'),1=>iPhoenixLang::admin_t('Show','main')),array('style'=>'width:200px')); ?>
						</li> 		                     				                              
                    </ul>
                </div>
                <!--end left content-->
                <!--begin right content-->
                <div class="fr" style="width:430px;">
                    <ul> 
                    	 <li>
                         	<?php echo $form->labelEx($model,'search_start_time',array('style'=>'width:200px')); ?>
                         	<?php
                         	$this->widget('CJuiDateTimePicker',array(
						        'model'=>$model, //Model object
						        'attribute'=>'search_start_time', //attribute name
						        'mode'=>'datetime', //use "time","date" or "datetime" (default)
								'htmlOptions'=>array('style'=>'width:100px;','maxlength'=>'256'),
						    ));			
						    ?>		
                        </li>                     
						<li>
						<?php echo $form->labelEx($model,'search_end_time',array('style'=>'width:200px')); ?>
	                 	<?php
	                 	$this->widget('CJuiDateTimePicker',array(
					        'model'=>$model, //Model object
					        'attribute'=>'search_end_time', //attribute name
					        'mode'=>'datetime', //use "time","date" or "datetime" (default)
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
				'iclass'=>'Comment',
  				'id'=>'comment-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-comment-list"])'
    				),		
    				array(
						'name'=>'name',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'email',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 							
					array(
						'name'=>'parent_class',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),		
					array(
						'name'=>'content',
						'value'=>'iPhoenixString::createIntrotext($data->content,68)',
						'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
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
            					'url'=>'iPhoenixUrl::createUrl("admin/comment/reverseStatus", array("id"=>$data->id))',
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
    					'template'=>'{delete}{view}',
						'deleteConfirmation'=>iPhoenixLang::admin_t('Are you sure you want to delete this item?','main'),
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("'.iPhoenixLang::admin_t("Delete successfully","main").'"); }',
    					'buttons'=>array
    					(    						
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Update','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/comment/delete",array("id"=>$data->id))'
    						),
    						'view'=>array(
    							'label'=>iPhoenixLang::admin_t('View','main'),
    							'url'=>'$data->getParent_url()',
    						)
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('Comment'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/comment/checkbox'
					),					
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>