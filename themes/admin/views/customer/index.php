	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>Customer Management</h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon" href=""><span>List customers</span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<input type="button" class="button" value="Add customer" style="width:180px;" onclick="showPopUp('form-customer');resetCustomerForm();$('#form-customer .create').show();return false;"/>
                <div class="line top bottom"></div>	
            </div>
             <!--begin box search-->
         	<?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#customer-search').submit(function(){
				$.fn.yiiGridView.update('customer-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2>Tìm kiếm</h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'customer-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:480px;">
                    <ul>
                        <li>
                          	<?php echo $form->label($model,'email'); ?>
							<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'email',
							'url'=>array('customer/suggestEmail'),
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
				'iclass'=>'Customer',
  				'id'=>'customer-list',
  				'dataProvider'=>$model->search(),
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-customer-list"])'
    				),	
					array(
						'name'=>'email',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					), 
					array(
						'name'=>'fullname',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					array(
						'name'=>'phone',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'tel',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'province_id',
						'value'=>'$data->province->name',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'district_id',
						'value'=>'$data->district->name',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					),
					array(
						'name'=>'address',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					),
					// array(
						// 'name'=>'created_by',
						// 'value'=>'isset($data->author)?$data->author->fullname:""',
						// 'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
					// ), 						
					array(
						'name'=>'created_time',
						'value'=>'date("d/m/Y H:i",$data->created_time)',
						'headerHtmlOptions'=>array('width'=>'8%','class'=>'table-title'),		
					), 	
					array(
						'header'=>'Status',
						'class'=>'iPhoenixStatusButtonColumn',
    					'template'=>'{reverse}',
    					'buttons'=>array
    					(
        					'reverse' => array
    						(
            					'label'=>'Change status',
            					'imageUrl'=>'$data->imageStatus',
            					'url'=>'iPhoenixUrl::createUrl("admin/customer/reverseStatus", array("id"=>$data->id))',
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
    					'template'=>'{view_cart}{reset_password}{update}{delete}',
						'deleteConfirmation'=>'Are you sure you want to delete this costumer?',
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("Delete successfully"); }',
    					'buttons'=>array
    					(
							'view_cart' => array
	    					(
	            					'label'=>'Purchase history',
	            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/view-cart.png',
	            					'url'=>'iPhoenixUrl::createUrl("admin/order/index", array("customer_id"=>$data->id))'
	        				),
	    					'reset_password' => array
	    					(
	            					'label'=>'Reset password',
	            					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/reset_password.png',
	            					'url'=>'iPhoenixUrl::createUrl("admin/customer/resetPassword", array("id"=>$data->id))',
	    							'click'=>'function(){
										var th=this;									
										jQuery.ajax({
											type:"POST",
											dataType:"json",
											url:$(this).attr("href"),
											success:function(data) {
												if(data.success){
													jAlert("Reset successfully");
													}
											},
											error: function (request, status, error) {
	        										jAlert(request.responseText);
	    									}
											});
									return false;}',
	        					),
    						 'update' => array(
    							'label'=>'Edit',
    							'url'=>'iPhoenixUrl::createUrl("admin/customer/updateForm", array("id"=>$data->id))',
    							'click'=>'function(){
									var th=this;									
									jQuery.ajax({
										type:"GET",
										dataType:"json",
										url:$(this).attr("href"),
										success:function(data) {
											resetCustomerForm();
											$("#form-customer #Customer_id").val(data.id);
											$("#form-customer #Customer_email").val(data.email);											
											$("#form-customer #Customer_firstname").val(data.firstname);
											$("#form-customer #Customer_lastname").val(data.lastname);
											$("#form-customer #Customer_phone").val(data.phone);	
											$("#form-customer #Customer_address").val(data.address);

							               	$("#form-customer .update").show();
											showPopUp("form-customer");
										},
										});
									return false;
								}',
    						),
        					'delete' => array(
    							'label'=>'Delete',
    							'url'=>'iPhoenixUrl::createUrl("admin/customer/delete",array("id"=>$data->id))'
    						),
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} customers',
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Previous','nextPageLabel'=>'Next >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>'Delete',
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/customer/checkbox'
					),
				),
				)); ?>
		</div>
	</div>
	<!--end inside content-->
	<?php	echo $this->renderPartial('_form',array('model'=>$model));?>