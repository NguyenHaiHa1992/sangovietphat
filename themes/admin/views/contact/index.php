<?php
Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Contact management');?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List contacts');?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
         <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#contact-search').submit(function(){
				$.fn.yiiGridView.update('contact-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'contact-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:430px;">
                    <ul>
                  		<li>
							<?php echo $form->label($model,'status',array('style'=>'width:200px')); ?>
							<?php echo $form->dropDownList($model,'status',array(''=>iPhoenixLang::admin_t('All','main'), 0=>iPhoenixLang::admin_t('Pending'),1=>iPhoenixLang::admin_t('Finish')),array('style'=>'width:200px')); ?>
						</li> 				                              
                    </ul>
                </div>
                <!--end left content-->
                <!--begin right content-->
                <div class="fr" style="width:430px;">
                    <ul>                   
						<li>
						<?php echo $form->labelEx($model,'search_end_time'); ?>
	                 	<?php
	                 	$this->widget('CJuiDateTimePicker',array(
					        'model'=>$model, //Model object
					        'attribute'=>'search_end_time', //attribute name
					        'mode'=>'datetime', //use "time","date" or "datetime" (default)
							'htmlOptions'=>array('style'=>'width:100px;','maxlength'=>'256'),
					    ));		
					    ?>		
						</li>
						<li>
		                 	<?php echo $form->labelEx($model,'search_start_time'); ?>
		                 	<?php
		                 	$this->widget('CJuiDateTimePicker',array(
						        'model'=>$model, //Model object
						        'attribute'=>'search_start_time', //attribute name
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
				'iclass'=>'Contact',
  				'id'=>'contact-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-contact-list"])'
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
						'name'=>'tel',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 						
					array(
						'name'=>'address',
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
						'header'=>iPhoenixLang::admin_t('Status'),
						'class'=>'iPhoenixStatusButtonColumn',
    					'template'=>'{reverse_status}',
    					'buttons'=>array
    					(
        					'reverse_status' => array
    						(
            					'label'=>$model->getAttributeLabel('status'),
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'iPhoenixUrl::createUrl("admin/contact/reverseStatus", array("id"=>$data->id))',
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
						'header'=>iPhoenixLang::admin_t('Function','main'),
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{view}{reply}{send-mail}{delete}',
						'deleteConfirmation'=>iPhoenixLang::admin_t('Are you sure you want to delete this item?','main'),
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("'.iPhoenixLang::admin_t("Delete successfully","main").'"); }',
    					'buttons'=>array
    					(
    						'reply' => array(
    							'label'=>iPhoenixLang::admin_t('Reply contact'),
    							'imageUrl'=>Yii::app()->theme->baseUrl.'/images/reply.png',
    							'url'=>'iPhoenixUrl::createUrl("admin/contact/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetContactForm();
											$("#form-contact #Contact_id").val(data.id);
											$("#form-contact #Contact_name").text(data.name);
											$("#form-contact #Contact_email").text(data.email);											
											$("#form-contact #Contact_tel").text(data.tel);
											$("#form-contact #Contact_address").text(data.address);
											$("#form-contact #Contact_content").text(data.content);	
											$("#form-contact #Contact_reply").val(data.reply);
											$("#form-contact #input_reply").show();									
							               	$("#form-contact .button").show();
											showPopUp("form-contact");
										},
										});
									return false;
								}',
    						),
    						'view' => array(
    							'label'=>iPhoenixLang::admin_t('View contact'),
    							'url'=>'iPhoenixUrl::createUrl("admin/contact/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetContactForm();
											$("#form-contact #Contact_id").val(data.id);
											$("#form-contact #Contact_name").text(data.name);
											$("#form-contact #Contact_email").text(data.email);											
											$("#form-contact #Contact_tel").text(data.tel);
											$("#form-contact #Contact_address").text(data.address);
											$("#form-contact #Contact_content").text(data.content);	
											$("#form-contact #Contact_view_reply").text(data.reply);	
											$("#form-contact #view_reply").show();								
											showPopUp("form-contact");
										},
										});
									return false;
								}',
    						),
    						'send-mail' => array
    						(
            					'label'=>iPhoenixLang::admin_t('Reply via email'),
            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/send_email.png',
            					'url'=>'iPhoenixUrl::createUrl("admin/contact/sendMail", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success)
												jAlert("'.iPhoenixLang::admin_t('Sending successfully').'");
											else
												jAlert("'.iPhoenixLang::admin_t('Oop...Sending unsuccessfully').'");
										},
										error: function (request, status, error) {
        										jAlert(request.responseText);
    									}
										});
								return false;}',
        					),
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Delete','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/contact/delete",array("id"=>$data->id))'
    						),
        				),
						'headerHtmlOptions'=>array('width'=>'12%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('Contact'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/contact/checkbox'
					),
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	<?php	echo $this->renderPartial('_form',array('model'=>$model));?>