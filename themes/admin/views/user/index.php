	<!--begin inside content-->
	<div class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('User management');?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List users');?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('Add user');?>" style="width:180px;" onclick="showPopUp('form-user');resetUserForm();$('#form-user .create').show();return false;"/>
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         <?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#user-search').submit(function(){
				$.fn.yiiGridView.update('user-list', {
					data: $(this).serialize()});
					return false;
				});");
		?>
            <div class="box-search">            
                <h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'user-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:480px;">
                    <ul>
                        <li>
                          	<?php echo $form->label($model,'email'); ?>
							<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'email',
							'url'=>array('user/suggestEmail'),
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
                    </ul>
                </div>
                <div>
                	<div class="row"></div>
                    <?php 
						echo CHtml::submitButton(iPhoenixLang::admin_t('Filter','main'),
						array(
							'class'=>'button',
							'style'=>'margin-left:153px; width:95px;',
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
				'iclass'=>'User',
  				'id'=>'user-list',
  				'dataProvider'=>$model->search(),
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-user-list"])'
    				),	
					array(
						'name'=>'email',
						'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
					), 
					array(
						'name'=>'fullname',
						'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
					),		
					array(
						'name'=>'role',
						'value'=>'implode(", ",$data->role)',
						'headerHtmlOptions'=>array('width'=>'15%','class'=>'table-title'),		
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
						'header'=>iPhoenixLang::admin_t('Status'),
						'class'=>'iPhoenixStatusButtonColumn',
    					'template'=>'{reverse}',
    					'buttons'=>array
    					(
        					'reverse' => array
    						(
            					'label'=>iPhoenixLang::admin_t('Change status'),
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'iPhoenixUrl::createUrl("admin/user/reverseStatus", array("id"=>$data->id))',
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
						'header'=>iPhoenixLang::admin_t('Function','main'),
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{reset_password}{update}{delete}',
						'deleteConfirmation'=>iPhoenixLang::admin_t('Are you sure you want to delete this item?','main'),
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("'.iPhoenixLang::admin_t('Delete successfully','main').'"); }',
    					'buttons'=>array
    					(
	    					'reset_password' => array
    						(
            					'label'=>iPhoenixLang::admin_t('Reset password'),
            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/reset_password.png',
            					'url'=>'iPhoenixUrl::createUrl("admin/user/resetPassword", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											if(data.success){
												jAlert("'.iPhoenixLang::admin_t('Reset successfully','main').'");
											}
										},
										error: function (request, status, error) {
        										jAlert(request.responseText);
    									}
										});
								return false;}',
        					),
    						 'update' => array(
    							'label'=>iPhoenixLang::admin_t('Update','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/user/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"POST",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetUserForm();
											$("#form-user #User_id").val(data.id);
											$("#form-user #User_email").val(data.email);											
											$("#form-user #User_firstname").val(data.firstname);
											$("#form-user #User_lastname").val(data.lastname);
											$("#form-user #User_phone").val(data.phone);	
											$("#form-user #User_address").val(data.address);
											$.each(data.role,function(key,value){
												$("#User_role option[value=\"" + value + "\"]").attr("selected", "selected");
											});											
							               	$("#form-user .update").show();
											showPopUp("form-user");
										},
										});
									return false;
								}',
    						),
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Delete','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/user/delete",array("id"=>$data->id))'
    						),
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('User'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/user/checkbox'
					),
				),
				)); ?>
		</div>
	</div>
	<!--end inside content-->
	<?php	echo $this->renderPartial('_form',array('model'=>$model));?>